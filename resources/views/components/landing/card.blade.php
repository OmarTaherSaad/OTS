@props([
    'gradient' => true,
    'padding' => 'p-6 md:p-8',
])
@php
    $wrapperClasses = $gradient
        ? 'relative gradient-border rounded-3xl overflow-hidden bg-white/90 dark:bg-ink-900/90 backdrop-blur-sm'
        : 'relative rounded-3xl overflow-hidden bg-white dark:bg-ink-900 ring-1 ring-ink-200/50 dark:ring-ink-700/50';
@endphp
<div {{ $attributes->merge(['class' => "$wrapperClasses $padding shadow-sm hover:shadow-2xl transition-shadow duration-500"]) }}>
    {{ $slot }}
</div>
