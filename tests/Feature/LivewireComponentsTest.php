<?php

use Livewire\Livewire;

test('services accordion opens the first item by default', function () {
    Livewire::test('site.services-accordion', [
        'services' => [
            ['id' => 'storage', 'title' => 'Gas Storage Solutions', 'summary' => 'Storage summary'],
            ['id' => 'fleet', 'title' => 'Fleet Management', 'summary' => 'Fleet summary'],
        ],
        'open' => 'storage',
    ])
        ->assertSet('open', 'storage')
        ->assertSee('Storage summary')
        ->assertDontSee('Fleet summary');
});

test('services accordion toggles and closes', function () {
    Livewire::test('site.services-accordion', [
        'services' => [
            ['id' => 'storage', 'title' => 'Gas Storage Solutions', 'summary' => 'Storage summary'],
            ['id' => 'fleet', 'title' => 'Fleet Management', 'summary' => 'Fleet summary'],
        ],
        'open' => 'storage',
    ])
        ->call('toggle', 'fleet')
        ->assertSet('open', 'fleet')
        ->assertSee('Fleet summary')
        ->call('toggle', 'fleet')
        ->assertSet('open', null);
});

test('asset explorer filters by category', function () {
    $assets = [
        ['name' => 'Regional depots', 'category' => 'storage', 'category_label' => 'Storage'],
        ['name' => 'Trailers', 'category' => 'fleet', 'category_label' => 'Fleet'],
        ['name' => 'Skid plants', 'category' => 'penetration', 'category_label' => 'Penetration'],
    ];

    Livewire::test('site.asset-explorer', ['assets' => $assets])
        ->assertSee('Regional depots')
        ->assertSee('Trailers')
        ->call('setFilter', 'fleet')
        ->assertSet('filter', 'fleet')
        ->assertSee('Trailers')
        ->assertDontSee('Regional depots')
        ->call('setFilter', 'all')
        ->assertSee('Regional depots');
});

test('asset explorer reveals a detail row on demand', function () {
    $assets = [
        ['name' => 'Regional depots', 'category' => 'storage', 'category_label' => 'Storage', 'detail' => 'Bulk reserves at strategic locations.', 'roles' => ['Absorb peaks']],
    ];

    Livewire::test('site.asset-explorer', ['assets' => $assets])
        ->assertSet('selected', null)
        ->assertDontSee('Bulk reserves at strategic locations.')
        ->call('toggleRow', 'asset-0')
        ->assertSet('selected', 'asset-0')
        ->assertSee('Bulk reserves at strategic locations.')
        ->call('toggleRow', 'asset-0')
        ->assertSet('selected', null)
        ->assertDontSee('Bulk reserves at strategic locations.');
});

test('waitlist form validates and flashes a success status', function () {
    Illuminate\Support\Facades\Mail::fake();

    Livewire::test('site.waitlist-form')
        ->set('name', 'T')
        ->set('email', 'nope')
        ->set('role', 'nobody')
        ->call('submit')
        ->assertHasErrors(['name', 'email', 'role']);

    Livewire::test('site.waitlist-form')
        ->set('name', 'Test User')
        ->set('email', 'waitlist.tester@gmail.com')
        ->set('role', 'customer')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('statusTone', 'success')
        ->assertSet('name', '');

    expect(App\Models\WaitlistSignup::where('email', 'waitlist.tester@gmail.com')->exists())->toBeTrue();
});

test('callback request stores a contact message', function () {
    Livewire::test('site.callback-request')
        ->set('name', 'Ada Obi')
        ->set('phone', '+234 802 111 2222')
        ->set('topic', 'CNG station rollout')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('done', true);

    expect(App\Models\ContactMessage::where('subject', '[Callback request] CNG station rollout')->exists())->toBeTrue();
});
