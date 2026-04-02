<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactSubmissionConfirmation;
use App\Mail\ContactSubmissionNotification;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function submit(ContactRequest $request)
    {
        // ── Rate limiting ──────────────────────────────────────────────
        $ipKey = 'contact-form:' . $request->ip();

        if (RateLimiter::tooManyAttempts($ipKey, 5)) {
            $seconds = RateLimiter::availableIn($ipKey);
            throw ValidationException::withMessages([
                'rate_limit' => "Too many attempts. Please try again in {$seconds} seconds.",
            ]);
        }

        RateLimiter::hit($ipKey, 600); // 10-minute window

        // ── Timing check (bots submit instantly) ──────────────────────
        $submittedAt  = (int) $request->input('form_started_at');
        $elapsed      = time() - $submittedAt;

        if ($elapsed < 4 || $elapsed > 3600) {
            // Too fast = bot; too old = stale/replayed submission
            throw ValidationException::withMessages([
                'form_started_at' => 'Invalid form submission. Please refresh and try again.',
            ]);
        }

        // ── Cloudflare Turnstile verification ─────────────────────────
        $turnstile = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret'   => config('services.turnstile.secret_key'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ])->json();

        if (! ($turnstile['success'] ?? false)) {
            throw ValidationException::withMessages([
                'captcha' => 'Security verification failed. Please try again.',
            ]);
        }

        // ── Persist ───────────────────────────────────────────────────
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

        // ── Mail ──────────────────────────────────────────────────────
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