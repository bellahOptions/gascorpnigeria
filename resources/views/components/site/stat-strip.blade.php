<?php

use Livewire\Component;

/**
 * The headline evidence strip. Figures count up the first time they enter
 * the viewport (see site.counter-figure).
 */
new class extends Component
{
    /** @var array<int, array<string, mixed>> */
    public array $figures = [];

    public string $tone = 'dark';

    public function mount(?array $figures = null, string $tone = 'dark'): void
    {
        $this->tone = in_array($tone, ['dark', 'light'], true) ? $tone : 'dark';

        $this->figures = $figures ?? [
            ['target' => 774, 'label' => 'Local Government Areas targeted', 'suffix' => ''],
            ['target' => 300, 'label' => 'Specialised gas trailers by scale-out', 'prefix' => ''],
            ['target' => 3, 'label' => 'Fuel streams: LPG, CNG and LNG'],
            ['target' => 16, 'label' => 'West African corridor markets in view'],
        ];
    }
};
?>

<div class="grid grid-cols-2 gap-x-6 gap-y-10 lg:grid-cols-4 lg:gap-x-10">
    @foreach ($figures as $index => $figure)
        <div @class([
            'border-t pt-6',
            'border-white/15' => $tone === 'light',
            'border-[#e6e9ee]' => $tone === 'dark',
        ])>
            <livewire:site.counter-figure
                :target="(float) ($figure['target'] ?? 0)"
                :decimals="(int) ($figure['decimals'] ?? 0)"
                :pad="(int) ($figure['pad'] ?? 0)"
                :prefix="$figure['prefix'] ?? ''"
                :suffix="$figure['suffix'] ?? ''"
                :variant="$tone === 'light' ? 'light' : 'dark'"
                :label="$figure['label'] ?? ''"
                :key="'figure-'.$index.'-'.($figure['label'] ?? $index)"
            />
        </div>
    @endforeach
</div>
