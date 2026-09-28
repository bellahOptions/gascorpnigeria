<?php

use Livewire\Livewire;

test('announcement modal is dismissible and accessible', function () {
    $component = Livewire::test('site.app-announcement');

    $component
        ->assertSee('role="dialog"', escape: false)
        ->assertSee('aria-modal="true"', escape: false)
        ->assertSee('id="app-announcement-title"', escape: false)
        ->assertSee('id="app-announcement-body"', escape: false)
        ->assertSee('aria-label="Close announcement"', escape: false);

    // Open/close state, ESC handling and persistence are Alpine-driven.
    $html = $component->html();

    expect($html)
        ->toContain('x-data=')
        ->toContain('x-show="open"')
        ->toContain('x-cloak')
        ->toContain('keydown.escape.window')
        ->toContain('localStorage.setItem')
        ->toContain('sessionStorage.setItem')
        ->toContain("key: 'gascorp.app-announcement'")
        ->toContain("sessionKey: 'gascorp.app-announcement.session'");
});

test('announcement modal links to the app page and the waitlist anchor', function () {
    Livewire::test('site.app-announcement')
        ->assertSee(route('app.landing'), escape: false)
        ->assertSee(route('app.landing').'#launch', escape: false)
        ->assertSee('Join the waitlist');
});

test('announcement modal states the coming soon message', function () {
    Livewire::test('site.app-announcement')
        ->assertSee('Coming soon')
        ->assertSee('The GASCORP App is on the way.');
});

test('announcement modal snooze window is at least a day', function () {
    $component = Livewire::test('site.app-announcement');

    expect($component->get('snoozeDays'))->toBeGreaterThanOrEqual(1);
    expect($component->instance()->snoozeMs())->toBe(30 * 86400 * 1000);
    expect($component->instance()->sessionKey())->not->toBe($component->instance()->storageKey());
});

test('announcement modal is rendered on the marketing pages but not the app page', function () {
    foreach (['/', '/about', '/services', '/our-assets', '/contact'] as $path) {
        $this->get($path)->assertSee('app-announcement-title', escape: false);
    }

    $this->get(route('app.landing'))->assertDontSee('app-announcement-title', escape: false);
});
