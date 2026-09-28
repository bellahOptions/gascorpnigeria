{{--
    Placeholder app screen for the mockup frames.

    These are illustrative wireframe-style mockups — flat surfaces, the site's
    palette and no product screenshots — so a reader can see the shape of each
    role's workflow before the app ships.

    Usage: <x-phone-screen variant="customer" />
--}}
@props(['variant' => 'customer'])

@php
    $variant = in_array($variant, ['customer', 'driver', 'investor', 'admin'], true) ? $variant : 'customer';
@endphp

@if ($variant === 'customer')
    <div class="scr">
        <div class="scr-top">
            <span class="scr-title">New booking</span>
            <span class="scr-chip scr-chip-blue">Draft</span>
        </div>

        <div class="scr-body">
            <div class="scr-map">
                <span class="scr-map-route"></span>
                <span class="scr-map-pin"></span>
            </div>

            <div>
                <p class="scr-label">Pickup</p>
                <div class="scr-field mt-1.5">
                    <span class="scr-dot scr-dot-green"></span>
                    Apapa depot, Lagos
                </div>
            </div>

            <div>
                <p class="scr-label">Drop-off</p>
                <div class="scr-field mt-1.5">
                    <span class="scr-dot scr-dot-gold"></span>
                    Ibadan hub, Oyo
                </div>
            </div>

            <div>
                <p class="scr-label">Cargo</p>
                <div class="scr-input mt-1.5">
                    <span>LPG &middot; 20 tonnes</span>
                    <span class="scr-muted">Edit</span>
                </div>
            </div>

            <div class="scr-row">
                <span class="scr-muted">Estimated price</span>
                <span class="scr-strong">&#8358;1,480,000</span>
            </div>
        </div>

        <div class="scr-foot">
            <div class="scr-btn">Confirm booking</div>
        </div>
    </div>
@elseif ($variant === 'driver')
    <div class="scr">
        <div class="scr-top">
            <span class="scr-title">Trip #4821</span>
            <span class="scr-chip scr-chip-live">On trip</span>
        </div>

        <div class="scr-body">
            <div class="scr-card">
                <div class="scr-row">
                    <span class="scr-muted">Route</span>
                    <span class="scr-strong">Apapa &rarr; Ibadan</span>
                </div>
                <div class="scr-row mt-2">
                    <span class="scr-muted">Distance</span>
                    <span class="scr-strong">129 km</span>
                </div>
                <div class="scr-row mt-2">
                    <span class="scr-muted">ETA</span>
                    <span class="scr-strong">14:20</span>
                </div>

                <div class="scr-track mt-3">
                    <div class="scr-track-fill" style="width: 62%"></div>
                </div>
            </div>

            <div class="scr-grid-2">
                <div class="scr-card" style="border-color: var(--accent-teal); background: rgba(13, 148, 136, 0.06)">
                    <p class="scr-label">Loaded</p>
                    <p class="scr-strong mt-1 text-[0.6875rem]">07:40</p>
                </div>
                <div class="scr-card" style="border-color: var(--line)">
                    <p class="scr-label">In transit</p>
                    <p class="scr-strong mt-1 text-[0.6875rem]">Now</p>
                </div>
                <div class="scr-card" style="border-color: var(--line)">
                    <p class="scr-label">Delivery</p>
                    <p class="scr-strong mt-1 text-[0.6875rem]">&mdash;</p>
                </div>
                <div class="scr-card" style="border-color: var(--line)">
                    <p class="scr-label">Proof</p>
                    <p class="scr-strong mt-1 text-[0.6875rem]">&mdash;</p>
                </div>
            </div>
        </div>

        <div class="scr-foot">
            <div class="scr-btn scr-btn-ghost">Update trip status</div>
        </div>
    </div>
@elseif ($variant === 'investor')
    <div class="scr">
        <div class="scr-top">
            <span class="scr-title">Fleet performance</span>
            <span class="scr-chip scr-chip-gold">30 days</span>
        </div>

        <div class="scr-body">
            <div class="scr-metrics">
                <div class="scr-metric">
                    <p class="scr-label">Utilisation</p>
                    <p class="scr-metric-value mt-1.5">82%</p>
                </div>
                <div class="scr-metric">
                    <p class="scr-label">Revenue</p>
                    <p class="scr-metric-value scr-metric-value-gold mt-1.5">&#8358;4.2m</p>
                </div>
            </div>

            <div class="scr-card">
                <p class="scr-label">Revenue by asset</p>
                <div class="scr-bars mt-2.5">
                    <div class="scr-bar" style="height: 42%"></div>
                    <div class="scr-bar" style="height: 66%"></div>
                    <div class="scr-bar" style="height: 38%"></div>
                    <div class="scr-bar scr-bar-on" style="height: 88%"></div>
                    <div class="scr-bar" style="height: 54%"></div>
                    <div class="scr-bar scr-bar-gold" style="height: 72%"></div>
                </div>
            </div>

            <div class="scr-list">
                <div class="scr-list-row">
                    <span class="scr-muted">TR-01</span>
                    <span class="scr-strong">Active</span>
                </div>
                <div class="scr-list-row">
                    <span class="scr-muted">TR-02</span>
                    <span class="scr-muted">Idle</span>
                </div>
            </div>
        </div>

        <div class="scr-foot">
            <div class="scr-row">
                <span class="scr-muted">Owner wallet</span>
                <span class="scr-strong">&#8358;1,120,000</span>
            </div>
        </div>
    </div>
@else
    <div class="scr">
        <div class="scr-top">
            <span class="scr-title">Operations</span>
            <span class="scr-chip scr-chip-live">Live</span>
        </div>

        <div class="scr-body">
            <div class="scr-metrics">
                <div class="scr-metric">
                    <p class="scr-label">Ready</p>
                    <p class="scr-metric-value mt-1.5">18</p>
                </div>
                <div class="scr-metric">
                    <p class="scr-label">In transit</p>
                    <p class="scr-metric-value mt-1.5">07</p>
                </div>
            </div>

            <div class="scr-list">
                <div class="scr-list-row">
                    <span class="scr-muted">TR-04 &middot; Kaduna</span>
                    <span class="scr-chip scr-chip-live">OK</span>
                </div>
                <div class="scr-list-row">
                    <span class="scr-muted">TR-11 &middot; Warri</span>
                    <span class="scr-chip scr-chip-gold">Pending</span>
                </div>
                <div class="scr-list-row">
                    <span class="scr-muted">TR-07 &middot; Abuja</span>
                    <span class="scr-chip scr-chip-blue">Service</span>
                </div>
                <div class="scr-list-row">
                    <span class="scr-muted">TR-09 &middot; Kano</span>
                    <span class="scr-chip scr-chip-live">OK</span>
                </div>
            </div>

            <div class="scr-card scr-card-ink">
                <p class="scr-label">Compliance expiring</p>
                <p class="scr-strong mt-1 text-[0.6875rem]">2 assets within 30 days</p>
            </div>
        </div>

        <div class="scr-foot">
            <div class="scr-btn">Review dispatch queue</div>
        </div>
    </div>
@endif
