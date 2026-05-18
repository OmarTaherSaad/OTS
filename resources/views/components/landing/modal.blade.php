@props(['name' => 'modal'])
<div
    x-show="open"
    x-cloak
    x-transition.opacity
    @keydown.escape.window="close()"
    class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-ink-950/85 backdrop-blur-sm"
    role="dialog"
    aria-modal="true"
    aria-label="{{ $name }}">
    <div
        @click.outside="close()"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        class="relative max-w-5xl w-full">
        {{ $slot }}
        <button
            type="button"
            @click="close()"
            aria-label="Close"
            class="absolute -top-4 -right-4 w-10 h-10 rounded-full bg-white text-ink-900 shadow-lg hover:scale-110 transition-transform focus-ring">
            <svg class="w-5 h-5 mx-auto" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M5 5l10 10M15 5L5 15"/>
            </svg>
        </button>
    </div>
</div>
