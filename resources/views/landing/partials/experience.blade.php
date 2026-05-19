<section id="experience" class="relative py-28 bg-white dark:bg-ink-900 text-ink-900 dark:text-ink-50 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-30">
        <div class="blob w-[24rem] h-[24rem] bg-brand-500/20 top-20 -left-10 animate-blob"></div>
        <div class="blob w-[20rem] h-[20rem] bg-accent-500/20 bottom-10 -right-10 animate-blob" style="animation-delay: -8s;"></div>
    </div>

    <div class="container relative mx-auto px-6 max-w-5xl">
        <x-landing.section-heading
            eyebrow="Experience"
            title="8+ years building <span class='gradient-text'>production systems</span>"
            subtitle="A snapshot of where I've shipped and what I've owned." />

        <ol class="relative">
            {{-- Vertical line --}}
            <span class="absolute left-4 sm:left-1/2 top-2 bottom-2 w-px bg-gradient-to-b from-brand-500/0 via-brand-500/40 to-accent-500/0 sm:-translate-x-1/2" aria-hidden="true"></span>

            @foreach ($experiences as $i => $exp)
                @php $alignRight = $i % 2 === 1; @endphp
                <li class="relative reveal mb-12 last:mb-0 pl-12 sm:pl-0 sm:grid sm:grid-cols-2 sm:gap-10" style="transition-delay: {{ $i * 60 }}ms;">
                    {{-- Dot marker --}}
                    <span class="absolute left-4 sm:left-1/2 top-6 w-3 h-3 rounded-full bg-gradient-to-br from-brand-500 to-accent-500 ring-4 ring-white dark:ring-ink-900 sm:-translate-x-1/2 z-10" aria-hidden="true"></span>

                    {{-- Card placed in left or right column on sm+ --}}
                    <div class="{{ $alignRight ? 'sm:col-start-2' : 'sm:col-start-1 sm:text-right' }}">
                        <article class="group rounded-2xl bg-ink-50 dark:bg-ink-800/60 ring-1 ring-ink-200 dark:ring-ink-700 hover:ring-brand-500/50 hover:shadow-xl transition-all p-6">
                            <div class="flex flex-col {{ $alignRight ? '' : 'sm:items-end' }} gap-1 mb-3">
                                <div class="text-xs uppercase tracking-widest font-bold text-brand-500">{{ $exp['period'] }}</div>
                                <h3 class="text-lg sm:text-xl font-extrabold leading-tight">{{ $exp['role'] }}</h3>
                                <div class="text-sm font-semibold text-ink-700 dark:text-ink-200">{{ $exp['company'] }}</div>
                                <div class="text-xs text-ink-500 dark:text-ink-400">{{ $exp['location'] }}</div>
                            </div>

                            <ul class="space-y-2 text-sm text-ink-700 dark:text-ink-200 text-left {{ $alignRight ? '' : 'sm:text-right' }}">
                                @foreach ($exp['highlights'] as $h)
                                    <li class="flex gap-2 {{ $alignRight ? '' : 'sm:flex-row-reverse' }}">
                                        <span class="shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-accent-500"></span>
                                        <span class="leading-relaxed">{{ $h }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            @if (!empty($exp['tags']))
                                <div class="mt-4 flex flex-wrap gap-2 {{ $alignRight ? '' : 'sm:justify-end' }}">
                                    @foreach ($exp['tags'] as $tag)
                                        <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-white dark:bg-ink-900 ring-1 ring-ink-200 dark:ring-ink-700 text-ink-700 dark:text-ink-200">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </article>
                    </div>
                </li>
            @endforeach
        </ol>

        {{-- Education --}}
        <div class="reveal mt-16">
            <div class="relative rounded-3xl p-7 bg-gradient-to-br from-brand-500/5 via-transparent to-accent-500/5 ring-1 ring-ink-200 dark:ring-ink-700">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-widest bg-brand-500/10 text-brand-600 dark:text-brand-300 ring-1 ring-brand-500/20 mb-4">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.4 1.2a1 1 0 00-.8 0L1 5l9 4 9-4-8.6-3.8zM1 7.5V13a1 1 0 00.5.9c1 .6 4 2.1 8.5 2.1s7.5-1.5 8.5-2.1A1 1 0 0019 13V7.5l-9 4-9-4z"/>
                    </svg>
                    Education
                </div>
                <h3 class="text-lg font-extrabold mb-1">{{ $education['degree'] }}</h3>
                <div class="text-sm font-semibold text-ink-700 dark:text-ink-200">{{ $education['university'] }} · {{ $education['location'] }}</div>
                <div class="text-xs text-ink-500 dark:text-ink-400 mb-3">{{ $education['duration'] }}</div>
                <p class="text-sm text-ink-700 dark:text-ink-200 leading-relaxed">{{ $education['project'] }}</p>
            </div>
        </div>
    </div>
</section>
