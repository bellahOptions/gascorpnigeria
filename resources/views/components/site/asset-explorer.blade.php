<?php

use Livewire\Component;

/**
 * Filterable asset inventory for the Our Assets page. Filtering, sorting and
 * the selected detail panel are all held in Livewire state so the list
 * updates without a page reload.
 */
new class extends Component
{
    /** @var array<int, array<string, mixed>> */
    public array $assets = [];

    public string $filter = 'all';

    public ?string $selected = null;

    public function mount(?array $assets = null, string $filter = 'all'): void
    {
        $this->assets = $assets ?? [];
        $this->filter = $filter;
        $this->selected = null;
    }

    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
        $this->selected = null;
    }

    /**
     * Stable identifier for a register row, derived from its position so it
     * stays unique even when two assets share a name.
     */
    public function assetKey(int $index): string
    {
        return 'asset-'.$index;
    }

    /** @return array<int, string> */
    public function categories(): array
    {
        $categories = [];

        foreach ($this->assets as $asset) {
            $category = (string) ($asset['category'] ?? 'other');
            $categories[$category] = (string) ($asset['category_label'] ?? ucfirst($category));
        }

        return $categories;
    }

    /**
     * Visible rows paired with their index in the full asset list, so row
     * actions keep addressing the right asset once a filter is applied.
     *
     * @return array<int, array{index: int, key: string, asset: array<string, mixed>}>
     */
    public function rows(): array
    {
        $rows = [];

        foreach ($this->assets as $index => $asset) {
            if ($this->filter !== 'all' && ($asset['category'] ?? 'other') !== $this->filter) {
                continue;
            }

            $rows[] = ['index' => $index, 'key' => $this->assetKey($index), 'asset' => $asset];
        }

        return $rows;
    }

    public function toggleRow(string $key): void
    {
        $this->selected = $this->selected === $key ? null : $key;
    }

    public function isSelected(string $key): bool
    {
        return $this->selected === $key;
    }
};
?>

<div>
    {{-- Filters --}}
    <div class="flex flex-wrap items-center gap-2 border-y border-[#e6e9ee] py-4" role="tablist" aria-label="Filter assets by category">
        <button
            type="button"
            role="tab"
            aria-selected="{{ $filter === 'all' ? 'true' : 'false' }}"
            wire:click="setFilter('all')"
            @class([
                'rounded-sm px-4 py-2 font-[Manrope] text-xs font-bold uppercase tracking-[0.12em] transition',
                'bg-[#1E3A8A] text-white' => $filter === 'all',
                'text-[#475069] hover:bg-[#F9FAFB] hover:text-[#1E3A8A]' => $filter !== 'all',
            ])
        >
            All assets
            <span class="ml-1.5 opacity-60">{{ count($assets) }}</span>
        </button>

        @foreach ($this->categories() as $key => $label)
            <button
                type="button"
                role="tab"
                aria-selected="{{ $filter === $key ? 'true' : 'false' }}"
                wire:click="setFilter('{{ $key }}')"
                @class([
                    'rounded-sm px-4 py-2 font-[Manrope] text-xs font-bold uppercase tracking-[0.12em] transition',
                    'bg-[#1E3A8A] text-white' => $filter === $key,
                    'text-[#475069] hover:bg-[#F9FAFB] hover:text-[#1E3A8A]' => $filter !== $key,
                ])
            >
                {{ $label }}
            </button>
        @endforeach
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full border-collapse text-left">
            <caption class="sr-only">GASCORP asset inventory</caption>
            <thead>
                <tr class="border-b border-[#e6e9ee]">
                    <th scope="col" class="py-4 pr-4 font-[DM_Mono,monospace] text-[0.6875rem] font-medium uppercase tracking-[0.18em] text-[#475069]">Asset</th>
                    <th scope="col" class="hidden py-4 pr-4 font-[DM_Mono,monospace] text-[0.6875rem] font-medium uppercase tracking-[0.18em] text-[#475069] sm:table-cell">Category</th>
                    <th scope="col" class="hidden py-4 pr-4 font-[DM_Mono,monospace] text-[0.6875rem] font-medium uppercase tracking-[0.18em] text-[#475069] md:table-cell">Coverage</th>
                    <th scope="col" class="py-4 pr-4 font-[DM_Mono,monospace] text-[0.6875rem] font-medium uppercase tracking-[0.18em] text-[#475069]">Capacity</th>
                    <th scope="col" class="py-4 text-right font-[DM_Mono,monospace] text-[0.6875rem] font-medium uppercase tracking-[0.18em] text-[#475069]">Detail</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($this->rows() as $row)
                    @php
                        $key = $row['key'];
                        $asset = $row['asset'];
                    @endphp

                    <tr class="border-b border-[#e6e9ee] align-top transition hover:bg-[#F9FAFB]" wire:key="asset-row-{{ $filter }}-{{ $key }}">
                        <th scope="row" class="py-5 pr-4 font-[Manrope] text-[0.9375rem] font-bold text-[#0f172a]">
                            {{ $asset['name'] ?? '' }}
                            <span class="mt-1 block text-xs font-normal text-[#475069] sm:hidden">{{ $asset['category_label'] ?? '' }}</span>
                        </th>
                        <td class="hidden py-5 pr-4 text-sm text-[#475069] sm:table-cell">{{ $asset['category_label'] ?? '' }}</td>
                        <td class="hidden py-5 pr-4 text-sm text-[#475069] md:table-cell">{{ $asset['coverage'] ?? '' }}</td>
                        <td class="py-5 pr-4 text-sm font-semibold text-[#1E3A8A] tabular">{{ $asset['capacity'] ?? '' }}</td>
                        <td class="py-5 text-right">
                            <button
                                type="button"
                                wire:click="toggleRow('{{ $key }}')"
                                aria-expanded="{{ $this->isSelected($key) ? 'true' : 'false' }}"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-[#e6e9ee] text-[#1E3A8A] transition hover:border-[#F59E0B] hover:bg-[#F59E0B] hover:text-white"
                                aria-label="Show detail for {{ $asset['name'] ?? 'asset' }}"
                            >
                                <svg class="h-3.5 w-3.5 transition-transform {{ $this->isSelected($key) ? 'rotate-45' : '' }}" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M8 3v10M3 8h10" stroke-linecap="round" />
                                </svg>
                            </button>
                        </td>
                    </tr>

                    @if ($this->isSelected($key))
                        <tr class="border-b border-[#e6e9ee] bg-[#F9FAFB]" wire:key="asset-detail-{{ $filter }}-{{ $key }}">
                            <td colspan="5" class="px-0 py-7">
                                <div class="grid gap-6 lg:grid-cols-12">
                                    <div class="lg:col-span-7">
                                        <p class="label text-[#F59E0B]">Asset detail</p>
                                        <p class="mt-3 max-w-2xl text-[0.9375rem] leading-7 text-[#475069]">{{ $asset['detail'] ?? '' }}</p>
                                    </div>
                                    <div class="lg:col-span-5">
                                        <p class="label text-[#475069]">Role in the corridor</p>
                                        <ul class="mt-3 space-y-2">
                                            @foreach (($asset['roles'] ?? []) as $role)
                                                <li class="flex items-start gap-2.5 text-sm text-[#0f172a]">
                                                    <span class="mt-1.5 inline-block h-1.5 w-1.5 shrink-0 rounded-full bg-[#0D9488]"></span>
                                                    {{ $role }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center text-sm text-[#475069]">
                            No assets recorded in this category yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
