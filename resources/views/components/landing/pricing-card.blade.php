@props(['package'])
@php
    $highlighted = $package['highlighted'] ?? false;
    $isCustom = is_null($package['price_usd']);
@endphp
<div
    class="reveal relative flex flex-col h-full rounded-3xl p-6 xl:p-8 transition-all duration-500
        {{ $highlighted
            ? 'bg-gradient-to-br from-ink-900 via-brand-900 to-ink-950 text-white ring-2 ring-brand-500/60 shadow-2xl shadow-brand-500/30 lg:scale-[1.04] lg:-translate-y-2'
            : 'bg-white dark:bg-ink-900 text-ink-900 dark:text-ink-50 ring-1 ring-ink-200 dark:ring-ink-700 hover:-translate-y-1 hover:shadow-xl' }}">
    @if ($highlighted)
        <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-gradient-to-r from-brand-500 to-accent-500 text-white shadow-lg animate-pulse-glow">
            Most Popular
        </div>
    @endif
    <div class="flex items-baseline gap-2 mb-2">
        <h3 class="text-2xl font-extrabold">{{ $package['name'] }}</h3>
    </div>
    <p class="text-sm {{ $highlighted ? 'text-ink-300' : 'text-ink-500 dark:text-ink-300' }} mb-6 min-h-[3rem]">
        {{ $package['tagline'] }}
    </p>
    <div class="mb-6">
        @if ($isCustom)
            <div class="text-4xl font-extrabold">Let's talk</div>
            <div class="text-sm mt-1 {{ $highlighted ? 'text-ink-300' : 'text-ink-500' }}">Custom scoping</div>
        @else
            <div class="flex items-end gap-1">
                <span class="text-sm font-semibold pb-2">$</span>
                <span class="text-5xl font-extrabold tracking-tight">{{ $package['price_usd'] }}</span>
                <span class="text-sm pb-2 {{ $highlighted ? 'text-ink-300' : 'text-ink-500' }}">
                    /{{ $package['period'] }}
                </span>
            </div>
        @endif
    </div>
    <ul class="flex-1 space-y-3 mb-8">
        @foreach ($package['features'] as $feature)
            <li class="flex items-start gap-3 text-sm">
                <svg class="shrink-0 w-5 h-5 mt-0.5 {{ $highlighted ? 'text-accent-300' : 'text-brand-500' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0L3.3 9.7a1 1 0 011.4-1.4L8.5 12l6.8-6.7a1 1 0 011.4 0z"/>
                </svg>
                <span>{{ $feature }}</span>
            </li>
        @endforeach
    </ul>
    <a
        href="#contact?subject=Pricing+{{ urlencode($package['name']) }}"
        class="block text-center px-6 py-3 rounded-full font-bold transition-all duration-300 focus-ring
            {{ $highlighted
                ? 'bg-gradient-to-r from-brand-500 to-accent-500 text-white hover:scale-[1.02] shadow-lg'
                : 'bg-brand-500/10 dark:bg-white/10 text-brand-600 dark:text-brand-300 ring-1 ring-brand-500/30 hover:bg-brand-500 hover:text-white hover:ring-brand-500' }}">
        {{ $package['cta'] }}
    </a>
</div>
