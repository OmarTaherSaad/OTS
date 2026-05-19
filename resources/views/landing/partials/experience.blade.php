@php
    // Derive compact year range from each period string, e.g.
    // "Sep 2024 – Present" -> "2024 → Now"
    // "Aug 2021 – Jun 2022" -> "2021 → 2022"
    $compact = function ($period) {
        preg_match_all('/\d{4}/', $period, $m);
        $years = $m[0] ?? [];
        if (empty($years)) return $period;
        if (stripos($period, 'present') !== false) {
            return $years[0] . ' → Now';
        }
        if (count($years) >= 2) return $years[0] . ' → ' . end($years);
        return $years[0];
    };
@endphp
<section id="experience" class="relative py-24 bg-white dark:bg-ink-900 text-ink-900 dark:text-ink-50 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-20">
        <div class="blob w-[22rem] h-[22rem] bg-brand-500/30 top-10 -left-10 animate-blob"></div>
        <div class="blob w-[18rem] h-[18rem] bg-accent-500/30 bottom-10 -right-10 animate-blob" style="animation-delay: -8s;"></div>
    </div>

    <div class="container relative mx-auto px-6 max-w-6xl">
        <x-landing.section-heading
            eyebrow="Experience"
            title="8+ years building <span class='gradient-text'>production systems</span>"
            subtitle="Pick a role to see what I owned." />

        <div x-data="{ active: 0 }" class="grid md:grid-cols-[1fr_1.6fr] gap-6 reveal">

            {{-- LEFT: role list --}}
            <ul class="space-y-2" role="tablist" aria-label="Work history">
                @foreach ($experiences as $i => $exp)
                    @php
                        $initial = strtoupper(substr($exp['company'], 0, 1));
                        $short = $compact($exp['period']);
                    @endphp
                    <li>
                        <button
                            type="button"
                            role="tab"
                            :aria-selected="active === {{ $i }}"
                            @click="active = {{ $i }}"
                            @keydown.arrow-down.prevent="active = (active + 1) % {{ count($experiences) }}"
                            @keydown.arrow-up.prevent="active = (active - 1 + {{ count($experiences) }}) % {{ count($experiences) }}"
                            class="w-full text-left rounded-2xl p-3 transition-all focus-ring flex items-center gap-3 ring-1"
                            :class="active === {{ $i }}
                                ? 'bg-gradient-to-r from-brand-500/10 to-accent-500/10 ring-brand-500/40 shadow-sm'
                                : 'bg-ink-50 dark:bg-ink-800/40 ring-ink-200/60 dark:ring-ink-700/60 hover:bg-ink-100 dark:hover:bg-ink-800'">
                            <span
                                class="shrink-0 inline-flex items-center justify-center w-10 h-10 rounded-xl font-extrabold text-sm transition-all"
                                :class="active === {{ $i }}
                                    ? 'bg-gradient-to-br from-brand-500 to-accent-500 text-white shadow-md'
                                    : 'bg-white dark:bg-ink-900 text-ink-700 dark:text-ink-200 ring-1 ring-ink-200 dark:ring-ink-700'">
                                {{ $initial }}
                            </span>
                            <span class="min-w-0 flex-1">
                                <span class="block text-sm font-bold leading-tight truncate">{{ $exp['company'] }}</span>
                                <span class="block text-xs text-ink-500 dark:text-ink-400 truncate">{{ $exp['role'] }}</span>
                            </span>
                            <span class="shrink-0 text-[10px] font-bold uppercase tracking-widest text-ink-400 dark:text-ink-500 whitespace-nowrap">
                                {{ $short }}
                            </span>
                        </button>
                    </li>
                @endforeach
            </ul>

            {{-- RIGHT: details panel --}}
            <div class="relative">
                @foreach ($experiences as $i => $exp)
                    <div
                        x-show="active === {{ $i }}"
                        x-cloak
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        role="tabpanel"
                        class="rounded-2xl bg-ink-50 dark:bg-ink-800/50 ring-1 ring-ink-200 dark:ring-ink-700 p-6 lg:p-7">
                        <div class="flex items-start justify-between flex-wrap gap-3 mb-4">
                            <div class="min-w-0">
                                <div class="text-[10px] font-bold uppercase tracking-[0.2em] text-brand-500 mb-1">{{ $exp['period'] }}</div>
                                <h3 class="text-xl sm:text-2xl font-extrabold leading-tight">{{ $exp['role'] }}</h3>
                                <div class="text-sm font-semibold text-ink-600 dark:text-ink-300 mt-1">
                                    {{ $exp['company'] }} <span class="text-ink-400">·</span> <span class="font-normal">{{ $exp['location'] }}</span>
                                </div>
                            </div>
                        </div>

                        <ul class="space-y-2.5 text-sm text-ink-700 dark:text-ink-200">
                            @foreach ($exp['highlights'] as $h)
                                <li class="flex gap-2.5">
                                    <span class="shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-accent-500"></span>
                                    <span class="leading-relaxed">{{ $h }}</span>
                                </li>
                            @endforeach
                        </ul>

                        @if (!empty($exp['tags']))
                            <div class="mt-5 flex flex-wrap gap-2">
                                @foreach ($exp['tags'] as $tag)
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold leading-none bg-white dark:bg-ink-900 ring-1 ring-ink-200 dark:ring-ink-700 text-ink-700 dark:text-ink-200">{{ $tag }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Education --}}
        <div class="reveal mt-10">
            <div class="relative rounded-2xl p-5 bg-gradient-to-br from-brand-500/5 via-transparent to-accent-500/5 ring-1 ring-ink-200 dark:ring-ink-700 flex flex-col sm:flex-row sm:items-center gap-4">
                <div class="inline-flex shrink-0 items-center gap-2 px-3 py-1.5 rounded-full text-[11px] font-semibold uppercase tracking-widest bg-brand-500/10 text-brand-600 dark:text-brand-300 ring-1 ring-brand-500/20 w-fit">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.4 1.2a1 1 0 00-.8 0L1 5l9 4 9-4-8.6-3.8zM1 7.5V13a1 1 0 00.5.9c1 .6 4 2.1 8.5 2.1s7.5-1.5 8.5-2.1A1 1 0 0019 13V7.5l-9 4-9-4z"/>
                    </svg>
                    Education
                </div>
                <div class="min-w-0 flex-1">
                    <h3 class="text-sm sm:text-base font-extrabold leading-tight">{{ $education['degree'] }}</h3>
                    <p class="text-xs text-ink-600 dark:text-ink-300 mt-0.5">{{ $education['duration'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
