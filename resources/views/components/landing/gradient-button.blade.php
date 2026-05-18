@props([
    'href' => '#',
    'variant' => 'solid',
    'size' => 'md',
])
@php
    $sizes = [
        'sm' => 'px-4 py-2 text-sm',
        'md' => 'px-6 py-3 text-base',
        'lg' => 'px-8 py-4 text-lg',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $base = 'inline-flex items-center justify-center gap-2 rounded-full font-bold tracking-tight transition-all duration-300 focus-ring will-change-transform';
    if ($variant === 'outline') {
        $classes = "$base $sizeClass relative gradient-border bg-white/80 dark:bg-ink-900/80 text-ink-900 dark:text-ink-50 hover:scale-[1.03] hover:-translate-y-0.5 backdrop-blur";
    } else {
        $classes = "$base $sizeClass bg-gradient-to-r from-brand-500 to-accent-500 bg-[length:200%_100%] hover:bg-[position:100%_0] text-white shadow-lg shadow-brand-500/30 hover:shadow-xl hover:shadow-accent-500/40 hover:-translate-y-0.5";
    }
@endphp
<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
