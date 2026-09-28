<?php

use Livewire\Livewire;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

test('contact form rejects an invalid payload', function () {
    Livewire::test('site.contact-form')
        ->set('name', 'A')
        ->set('email', 'not-an-email')
        ->set('phone', 'abc')
        ->set('subject', 'hi')
        ->set('message', 'too short')
        ->call('submit')
        ->assertHasErrors(['name', 'email', 'phone', 'subject', 'message'])
        ->assertSet('submitted', false);
});

test('contact form stores a valid enquiry and resets', function () {
    Illuminate\Support\Facades\Mail::fake();

    Livewire::test('site.contact-form')
        ->set('name', 'Jane Doe')
        ->set('email', 'jane.doe@gmail.com')
        ->set('phone', '+234 803 000 0000')
        ->set('subject', 'Gas logistics partnership')
        ->set('message', 'We need help moving LPG volumes into Ondo State on a monthly basis.')
        // Backdate the mount timestamp so the anti-bot timing check passes.
        ->set('formStartedAt', time() - 30)
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true)
        ->assertSet('name', '')
        ->assertSet('email', '');

    expect(App\Models\ContactMessage::count())->toBe(1);

    Illuminate\Support\Facades\Mail::assertQueued(App\Mail\ContactSubmissionNotification::class);
    Illuminate\Support\Facades\Mail::assertQueued(App\Mail\ContactSubmissionConfirmation::class);
});

test('contact form rejects a submission that arrives too quickly', function () {
    Livewire::test('site.contact-form')
        ->set('name', 'Jane Doe')
        ->set('email', 'jane.doe@gmail.com')
        ->set('phone', '+234 803 000 0000')
        ->set('subject', 'Gas logistics partnership')
        ->set('message', 'We need help moving LPG volumes into Ondo State on a monthly basis.')
        ->set('formStartedAt', time())
        ->call('submit')
        ->assertHasErrors('form_started_at')
        ->assertSet('submitted', false);
});

test('contact form silently absorbs a honeypot hit', function () {
    Illuminate\Support\Facades\Mail::fake();

    Livewire::test('site.contact-form')
        ->set('name', 'Spam Bot')
        ->set('email', 'bot.test@gmail.com')
        ->set('phone', '+234 803 000 0000')
        ->set('subject', 'Cheap backlinks')
        ->set('message', 'Buy backlinks from our network of very high quality sites today.')
        ->set('website', 'https://spam.example.com')
        ->set('formStartedAt', time() - 30)
        ->call('submit')
        ->assertSet('submitted', true);

    expect(App\Models\ContactMessage::count())->toBe(0);
});
