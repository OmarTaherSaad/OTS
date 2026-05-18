@props(['testimonial'])
<article
    data-card
    class="snap-start shrink-0 w-[88vw] sm:w-[420px] rounded-3xl p-7 bg-white dark:bg-ink-900 ring-1 ring-ink-200 dark:ring-ink-700 shadow-sm hover:shadow-xl transition-shadow duration-500">
    <div class="flex items-center gap-3 mb-4">
        <div class="flex" aria-label="Rating: {{ $testimonial['rating'] }} of 5">
            @for ($i = 0; $i < 5; $i++)
                <svg class="w-5 h-5 {{ $i < $testimonial['rating'] ? 'text-accent-500' : 'text-ink-200 dark:text-ink-700' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10 1.5l2.6 5.3 5.9.9-4.3 4.1 1 5.9L10 14.9l-5.3 2.8 1-5.9L1.5 7.7l5.9-.9L10 1.5z"/>
                </svg>
            @endfor
        </div>
    </div>
    <svg class="w-8 h-8 text-brand-500/40 mb-3" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true">
        <path d="M9.4 8C5.3 8 2 11.3 2 15.4c0 4 3 7.2 6.9 7.2.6 0 1-.1 1.4-.2-.6 2-2 3.6-4 4.5l1.3 2.6c4.8-2 8-6.4 8-12.3C15.6 11.5 12.8 8 9.4 8zm14 0c-4.1 0-7.4 3.3-7.4 7.4 0 4 3 7.2 6.9 7.2.6 0 1-.1 1.4-.2-.6 2-2 3.6-4 4.5l1.3 2.6c4.8-2 8-6.4 8-12.3C29.6 11.5 26.8 8 23.4 8z"/>
    </svg>
    <p class="text-ink-700 dark:text-ink-200 leading-relaxed mb-6">
        {{ $testimonial['quote'] }}
    </p>
    <div class="flex items-center gap-3 pt-4 border-t border-ink-100 dark:border-ink-800">
        <div class="w-11 h-11 rounded-full bg-gradient-to-br from-brand-500 to-accent-500 flex items-center justify-center text-white font-bold ring-2 ring-white dark:ring-ink-900">
            {{ strtoupper(substr($testimonial['name'], 0, 1)) }}
        </div>
        <div>
            <div class="font-bold text-ink-900 dark:text-ink-50">{{ $testimonial['name'] }}</div>
            <div class="text-sm text-ink-500 dark:text-ink-400">
                {{ $testimonial['role'] }} · {{ $testimonial['company'] }}
            </div>
        </div>
    </div>
</article>
