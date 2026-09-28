<?php

use Livewire\Component;

/**
 * Accordion used for the service directory. Holds the open panel in Livewire
 * state so only one section expands at a time and the state survives
 * wire:navigate transitions.
 */
new class extends Component
{
    /** @var array<int, array<string, mixed>> */
    public array $services = [];

    public ?string $open = null;

    public function mount(?array $services = null, ?string $open = null): void
    {
        $this->services = $services ?? [];
        $this->open = $open;
    }

    public function toggle(string $id): void
    {
        $this->open = $this->open === $id ? null : $id;
    }

    public function isOpen(string $id): bool
    {
        return $this->open === $id;
    }
};
?>

<div class="border-t border-[#e6e9ee]">
    @foreach ($services as $index => $service)
        @php
            $id = (string) ($service['id'] ?? $index);
        @endphp

        <div class="acc-item" wire:key="service-{{ $id }}">
            <h3>
                <button
                    type="button"
                    class="acc-trigger"
                    wire:click="toggle('{{ $id }}')"
                    aria-expanded="{{ $this->isOpen($id) ? 'true' : 'false' }}"
                    aria-controls="service-panel-{{ $id }}"
                    id="service-trigger-{{ $id }}"
                >
                    <span class="acc-title">{{ $service['title'] ?? '' }}</span>
                    <span class="acc-icon" aria-hidden="true">
                        <svg class="h-4 w-4" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M8 3v10M3 8h10" stroke-linecap="round" />
                        </svg>
                    </span>
                </button>
            </h3>

            @if ($this->isOpen($id))
                <div
                    class="acc-body"
                    id="service-panel-{{ $id }}"
                    role="region"
                    aria-labelledby="service-trigger-{{ $id }}"
                >
                    <div class="grid gap-6 lg:grid-cols-12 lg:gap-10">
                        <div class="lg:col-span-6">
                            <p class="lede">{{ $service['summary'] ?? '' }}</p>
                        </div>

                        @if (! empty($service['points']))
                            <div class="lg:col-span-3">
                                <p class="label text-[#475069]">What it covers</p>
                                <ul class="mt-4 space-y-2.5">
                                    @foreach ($service['points'] as $point)
                                        <li class="flex items-start gap-2.5 text-[0.9375rem] text-[#475069]">
                                            <span class="mt-2 inline-block h-1.5 w-1.5 shrink-0 rounded-full bg-[#F59E0B]"></span>
                                            <span>{{ $point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (! empty($service['outcomes']))
                            <div class="lg:col-span-3">
                                <p class="label text-[#475069]">Outcome</p>
                                <ul class="mt-4 space-y-3">
                                    @foreach ($service['outcomes'] as $outcome)
                                        <li class="border-l-2 border-[#0D9488] pl-3 text-[0.9375rem] font-semibold text-[#0f172a]">
                                            {{ $outcome }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="mt-7 flex flex-wrap items-center gap-4">
                        <a href="{{ route('contact') }}" class="link-arrow" wire:navigate>
                            Discuss this service
                            <svg class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
</div>
