<?php

use App\Mail\WaitlistSignupConfirmation;
use App\Models\WaitlistSignup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

test('waitlist signup queues confirmation email', function () {
    Mail::fake();

    $response = $this->post(route('waitlist.store'), [
        'name' => 'Test User',
        'email' => 'test.user@gmail.com',
        'role' => 'customer',
    ]);

    $response->assertSessionHas('waitlist_success');

    $signup = WaitlistSignup::where('email', 'test.user@gmail.com')->first();

    expect($signup)->not->toBeNull();

    Mail::assertQueued(WaitlistSignupConfirmation::class, function ($mail) use ($signup) {
        return $mail->waitlistSignup->is($signup);
    });
});
