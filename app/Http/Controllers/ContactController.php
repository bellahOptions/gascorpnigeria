<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactSubmissionConfirmation;
use App\Mail\ContactSubmissionNotification;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function submit(ContactRequest $request)
    {
        $ipKey = 'contact-form:' . $request->ip();

        if (RateLimiter::tooManyAttempts($ipKey, 5)) {
            $seconds = RateLimiter::availableIn($ipKey);
            throw ValidationException::withMessages([
                'rate_limit' => "Too many attempts. Please try again in {$seconds} seconds.",
            ]);
        }

        RateLimiter::hit($ipKey, 600); // 10-minute window

        $submittedAt = (int) $request->input('form_started_at');
        $elapsed = time() - $submittedAt;

        if ($elapsed < 4 || $elapsed > 3600) {
            throw ValidationException::withMessages([
                'form_started_at' => 'Invalid form submission. Please refresh and try again.',
            ]);
        }

        $turnstileEnabled = filled(config('services.turnstile.site_key')) && filled(config('services.turnstile.secret_key'));

        if ($turnstileEnabled) {
            $turnstile = Http::asForm()
                ->timeout(8)
                ->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'secret' => config('services.turnstile.secret_key'),
                    'response' => $request->input('cf-turnstile-response'),
                    'remoteip' => $request->ip(),
                ])
                ->json();

            if (! ($turnstile['success'] ?? false)) {
                throw ValidationException::withMessages([
                    'captcha' => 'Security verification failed. Please try again.',
                ]);
            }
        }

        $validated = $request->validated();

        $contactMessage = ContactMessage::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'phone'      => $validated['phone'],
            'subject'    => $validated['subject'],
            'message'    => $validated['message'],
            'ip_address' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 255),
        ]);

        $internalRecipients = [
            'okey.ndukwe@gascorpnigeria.com',
            'elder.o.ndukwe@gmail.com',
            'info@gascorpnigeria.com',
            'muyiwadavis65@gmail.com',
        ];

        try {
            Mail::to($internalRecipients)->queue(new ContactSubmissionNotification($contactMessage));
            Mail::to($contactMessage->email)->queue(new ContactSubmissionConfirmation($contactMessage));
        } catch (\Throwable $exception) {
            Log::error('Contact form email dispatch failed.', [
                'contact_message_id' => $contactMessage->id,
                'error' => $exception->getMessage(),
            ]);
        }

        return back()->with('success', 'Your message has been received. A member of our team will review it and respond shortly.');
    }
}
