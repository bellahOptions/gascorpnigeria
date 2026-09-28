<?php

use Carbon\CarbonImmutable;
use Livewire\Livewire;

/** @return array<string, string> */
function countdownUnits(string $html): array
{
    preg_match_all(
        '/data-countdown-unit="(?<unit>[a-z]+)"[^>]*>\s*(?<value>[0-9]+)\s*</',
        $html,
        $matches,
        PREG_SET_ORDER
    );

    $units = [];

    foreach ($matches as $match) {
        $units[$match['unit']] = $match['value'];
    }

    return $units;
}

test('launch countdown renders server-computed units and a client anchor', function () {
    $component = Livewire::test('site.launch-countdown', ['monthsAhead' => 9]);

    // The deadline and the server's clock are exposed for the client-side ticker…
    $component->assertSee('data-countdown-target', escape: false);
    $component->assertSee('data-countdown-server', escape: false);

    // …and the units are already correct on first paint for no-JS visitors.
    $units = countdownUnits($component->html());

    expect($units)->toHaveKeys(['days', 'hours', 'minutes', 'seconds']);
    expect((int) $units['days'])->toBeGreaterThan(250);
    expect((int) $units['hours'])->toBeLessThan(24);
    expect((int) $units['minutes'])->toBeLessThan(60);
    expect((int) $units['seconds'])->toBeLessThan(60);
});

test('launch countdown pads values for a stable display width', function () {
    $units = countdownUnits(Livewire::test('site.launch-countdown', ['monthsAhead' => 9])->html());

    expect($units['days'])->toHaveLength(3);
    expect($units['hours'])->toHaveLength(2);
    expect($units['minutes'])->toHaveLength(2);
    expect($units['seconds'])->toHaveLength(2);
});

test('launch countdown never renders a negative remaining time', function () {
    $units = countdownUnits(Livewire::test('site.launch-countdown', ['monthsAhead' => 1])->html());

    foreach ($units as $value) {
        expect((int) $value)->toBeGreaterThanOrEqual(0);
    }
});

test('launch countdown states the launch window', function () {
    Livewire::test('site.launch-countdown', ['monthsAhead' => 9])
        ->assertSee(CarbonImmutable::now()->addMonthsNoOverflow(9)->format('F Y'));
});

test('launch countdown clamps its horizon to at least one month', function () {
    $component = Livewire::test('site.launch-countdown', ['monthsAhead' => 0]);

    expect($component->get('monthsAhead'))->toBe(1);
});
