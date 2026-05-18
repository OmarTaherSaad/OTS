@props([
    'eyebrow' => null,
    'title' => '',
    'subtitle' => null,
    'align' => 'center',
])
@php
    $alignClass = $align === 'left' ? 'text-left items-start' : 'text-center items-center';
@endphp
<div class="flex flex-col gap-3 mb-12 reveal {{ $alignClass }}">
    @if ($eyebrow)
        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-widest bg-brand-500/10 text-brand-600 dark:text-brand-300 ring-1 ring-brand-500/20">
            <span class="w-1.5 h-1.5 rounded-full bg-brand-500 animate-pulse"></span>
            {{ $eyebrow }}
        </span>
    @endif
    <h2 class="text-4xl sm:text-5xl font-extrabold leading-tight">
        {!! $title !!}
    </h2>
    @if ($subtitle)
        <p class="max-w-2xl text-lg text-ink-500 dark:text-ink-300">{{ $subtitle }}</p>
    @endif
</div>
