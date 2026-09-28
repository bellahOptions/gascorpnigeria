<?php

use Livewire\Component;

new class extends Component
{
    public function mount(): void {}

    public function year(): int
    {
        return (int) date('Y');
    }
};
?>

<footer class="site-footer" role="contentinfo">
    <div class="shell grid grid-cols-1 gap-12 py-16 md:grid-cols-2 lg:grid-cols-12 lg:gap-8 lg:py-20">
        <div class="lg:col-span-4">
            <img src="{{ asset('2.png') }}" class="h-12 w-auto" alt="GASCORP Nigeria" width="937" height="281">
            <p class="mt-6 max-w-md text-sm leading-7 text-white/60">
                Gas Corridor and Penetration Ltd develops the infrastructure, logistics, and last-mile systems that make
                LPG, CNG, and LNG more accessible across Nigeria and West Africa.
            </p>

            <div class="mt-8 flex items-center gap-3">
                <a href="https://www.linkedin.com/company/gascorpnigeria" class="social-dot" aria-label="GASCORP on LinkedIn" rel="noopener noreferrer" target="_blank">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M4.98 3.5A2.5 2.5 0 1 0 5 8.5a2.5 2.5 0 0 0-.02-5ZM3 9.75h4v11H3v-11Zm6.5 0h3.83v1.5h.05a4.2 4.2 0 0 1 3.78-2.08c4.04 0 4.79 2.66 4.79 6.11v5.47h-4v-4.85c0-1.16-.02-2.65-1.62-2.65-1.62 0-1.87 1.26-1.87 2.57v4.93h-4v-11Z"/></svg>
                </a>
                <a href="https://www.facebook.com/gascorpnigeria" class="social-dot" aria-label="GASCORP on Facebook" rel="noopener noreferrer" target="_blank">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.55-1.5h1.65V3.6c-.29-.04-1.27-.13-2.4-.13-2.38 0-4 1.45-4 4.11v2.32H7.6V13h2.7v8h3.2Z"/></svg>
                </a>
                <a href="https://www.twitter.com/gascorpnigeria" class="social-dot" aria-label="GASCORP on X" rel="noopener noreferrer" target="_blank">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.53 3h3.1l-6.77 7.74L21.9 21h-6.2l-4.86-6.36L5.27 21H2.16l7.24-8.28L2.1 3h6.36l4.4 5.82L17.53 3Zm-1.09 16.13h1.72L7.6 4.77H5.76l10.68 14.36Z"/></svg>
                </a>
            </div>
        </div>

        <div class="lg:col-span-2">
            <h2 class="footer-heading">Company</h2>
            <a href="{{ route('about') }}" class="footer-link" wire:navigate>About GASCORP</a>
            <a href="{{ route('assets') }}" class="footer-link" wire:navigate>Our Assets</a>
            <a href="{{ route('services') }}" class="footer-link" wire:navigate>Services</a>
            <a href="{{ route('app.landing') }}" class="footer-link" wire:navigate>GASCORP App</a>
            <a href="{{ route('contact') }}" class="footer-link" wire:navigate>Contact</a>
        </div>

        <div class="lg:col-span-3">
            <h2 class="footer-heading">Capabilities</h2>
            <a href="{{ route('services') }}#storage" class="footer-link" wire:navigate>Gas storage infrastructure</a>
            <a href="{{ route('services') }}#logistics" class="footer-link" wire:navigate>Virtual pipeline logistics</a>
            <a href="{{ route('services') }}#penetration" class="footer-link" wire:navigate>LPG, CNG &amp; LNG distribution</a>
            <a href="{{ route('services') }}#fleet" class="footer-link" wire:navigate>Fleet &amp; dispatch management</a>
            <a href="{{ route('services') }}#advisory" class="footer-link" wire:navigate>Energy access advisory</a>
        </div>

        <div class="lg:col-span-3">
            <h2 class="footer-heading">Get in touch</h2>
            <address class="not-italic text-sm leading-7 text-white/60">
                Ocean Parade Towers, 1st Avenue,<br>
                Banana Island, Ikoyi,<br>
                Lagos State, Nigeria
            </address>
            <div class="mt-4 space-y-1.5 text-sm">
                <a href="tel:+2347038392520" class="block font-bold text-white transition hover:text-[#F59E0B]">+234 703 839 2520</a>
                <a href="mailto:info@gascorpnigeria.com" class="block text-white/70 transition hover:text-white">info@gascorpnigeria.com</a>
            </div>
            <a href="{{ route('contact') }}" class="btn btn-gold btn-sm mt-6" wire:navigate>
                Start a conversation
            </a>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="shell flex flex-col gap-4 py-6 text-xs text-white/45 md:flex-row md:items-center md:justify-between">
            <p>&copy; {{ $this->year() }} Gas Corridor and Penetration Ltd. All rights reserved.</p>
            <div class="flex flex-wrap items-center gap-x-6 gap-y-2">
                <a href="{{ url('/sitemap.xml') }}" class="transition hover:text-white">Sitemap</a>
                <a href="{{ url('/llms.txt') }}" class="transition hover:text-white">LLMs.txt</a>
                <a href="{{ url('/ai.txt') }}" class="transition hover:text-white">AI Usage Policy</a>
                <a href="{{ route('app.landing') }}" class="transition hover:text-white" wire:navigate>Pre-launch App</a>
            </div>
        </div>
    </div>
</footer>
