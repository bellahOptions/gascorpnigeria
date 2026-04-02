<?php

namespace App\Http\Controllers;

use App\Mail\ContactSubmissionConfirmation;
use App\Mail\ContactSubmissionNotification;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $ipKey = 'contact-form:' . $request->ip();

        if (RateLimiter::tooManyAttempts($ipKey, 5)) {
            $seconds = RateLimiter::availableIn($ipKey);

            throw ValidationException::withMessages([
                'rate_limit' => "Too many attempts. Please try again in {$seconds} seconds.",
            ]);
        }

        RateLimiter::hit($ipKey, 600);

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:120', 'regex:/^[a-zA-Z\s\.\-]+$/'],
            'email' => ['required', 'email:rfc,dns', 'max:150'],
            'phone' => ['required', 'string', 'min:7', 'max:20', 'regex:/^\+?[0-9\-\s\(\)]+$/'],
            'subject' => ['required', 'string', 'min:5', 'max:150'],
            'message' => ['required', 'string', 'min:20', 'max:3000'],
            'cf-turnstile-response' => ['required', 'string'],
            'website' => ['nullable', 'max:0'],
        ], [
            'website.max' => 'Spam detected.',
            'cf-turnstile-response.required' => 'Please complete the security check.',
        ]);

        $turnstile = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => config('services.turnstile.secret_key'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ])->json();

        if (!($turnstile['success'] ?? false)) {
            throw ValidationException::withMessages([
                'captcha' => 'Security verification failed. Please try again.',
            ]);
        }

        $contactMessage = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 255),
        ]);

        $internalRecipients = [
            'okey.ndukwe@gascorpnigeria.com',
            'elder.o.ndukwe@gmail.com',
            'info@gascorpnigeria.com',
            'muyiwadavis65@gmail.com',
        ];

        Mail::to($internalRecipients)->queue(new ContactSubmissionNotification($contactMessage));
Mail::to($contactMessage->email)->queue(new ContactSubmissionConfirmation($contactMessage));

        return back()->with('success', 'Your message has been sent successfully. Please check your email for confirmation.');
    }
}