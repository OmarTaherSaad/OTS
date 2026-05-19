<footer class="relative bg-ink-100 dark:bg-ink-950 border-t border-ink-200 dark:border-ink-800 text-ink-700 dark:text-ink-300">
    <div class="container mx-auto px-6 max-w-7xl py-10">
        <div class="grid gap-6 md:grid-cols-3 items-center">
            <div class="flex items-center gap-3 md:justify-start justify-center">
                <img src="{{ Storage::url('assets/images/logo.png') }}"
                     alt=""
                     style="background:#fff;"
                     class="h-9 w-9 rounded-full object-contain p-1 ring-1 ring-ink-200 dark:ring-white/30">
                <div class="leading-tight">
                    <div class="text-sm font-extrabold text-ink-900 dark:text-ink-50">Omar Taher Saad</div>
                    <div class="text-[11px] uppercase tracking-[0.18em] text-ink-500 dark:text-ink-400">Senior Backend Engineer</div>
                </div>
            </div>

            <div class="text-center text-xs text-ink-500 dark:text-ink-400">
                {{ __('main.copyrights') }}
            </div>

            <div class="flex flex-wrap items-center justify-center md:justify-end gap-x-5 gap-y-2 text-xs">
                <a href="{{ route('privacy-policy') }}" target="_blank" rel="noopener"
                   class="text-ink-600 dark:text-ink-300 hover:text-brand-500 dark:hover:text-brand-300 transition-colors no-underline">
                    Privacy Policy
                </a>
                <a href="{{ route('terms-and-conditions') }}" target="_blank" rel="noopener"
                   class="text-ink-600 dark:text-ink-300 hover:text-brand-500 dark:hover:text-brand-300 transition-colors no-underline">
                    Terms &amp; Conditions
                </a>
                <a href="{{ config('ots.social-media.linkedin') }}" target="_blank" rel="noopener"
                   aria-label="LinkedIn"
                   class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white dark:bg-ink-800 ring-1 ring-ink-200 dark:ring-ink-700 hover:bg-brand-500 hover:text-white hover:ring-brand-500 transition-all no-underline">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M19 0H5a5 5 0 00-5 5v14a5 5 0 005 5h14a5 5 0 005-5V5a5 5 0 00-5-5zM8 19H5V8h3v11zM6.5 6.7a1.8 1.8 0 110-3.5 1.8 1.8 0 010 3.5zM20 19h-3v-5.6c0-1.4-.5-2.3-1.7-2.3a1.9 1.9 0 00-1.8 1.3c-.1.2-.1.5-.1.8V19h-3V8h3v1.3a3 3 0 012.7-1.5c2 0 3.5 1.3 3.5 4.1V19z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
