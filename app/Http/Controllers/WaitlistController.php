<?php

namespace App\Http\Controllers;

use App\Http\Requests\WaitlistSignupRequest;
use App\Mail\WaitlistSignupConfirmation;
use App\Models\WaitlistSignup;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class WaitlistController extends Controller
{
    public function store(WaitlistSignupRequest $request)
    {
        $ipKey = 'waitlist:' . $request->ip();

        if (RateLimiter::tooManyAttempts($ipKey, 8)) {
            $seconds = RateLimiter::availableIn($ipKey);
            return back()->withErrors([
                'waitlist' => "Too many submissions. Please try again in {$seconds} seconds.",
            ])->withInput();
        }

        RateLimiter::hit($ipKey, 600);

        $validated = $request->validated();

        $signup = WaitlistSignup::firstOrCreate(
            ['email' => $validated['email']],
            [
                'name' => $validated['name'],
                'role' => $validated['role'],
                'source' => 'app-landing',
                'ip_address' => $request->ip(),
                'user_agent' => substr((string) $request->userAgent(), 0, 255),
            ]
        );

        if (! $signup->wasRecentlyCreated) {
            return back()->with('waitlist_success', 'This email is already on the waitlist. We will keep you updated.');
        }

        try {
            Mail::to($signup->email)->queue(new WaitlistSignupConfirmation($signup));
        } catch (\Throwable $exception) {
            Log::error('Waitlist confirmation email dispatch failed.', [
                'waitlist_signup_id' => $signup->id,
                'error' => $exception->getMessage(),
            ]);
        }

        return back()->with('waitlist_success', 'You are on the waitlist. We will notify you as launch gets closer.');
    }
}
