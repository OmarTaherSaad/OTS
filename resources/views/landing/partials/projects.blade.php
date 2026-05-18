@php
    $categories = array_values(array_unique(array_column($projects, 'category')));
@endphp
<section id="work" class="relative py-28 bg-gradient-to-b from-white via-ink-50 to-white dark:from-ink-900 dark:via-ink-950 dark:to-ink-900 text-ink-900 dark:text-ink-50 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-30">
        <div class="blob w-[28rem] h-[28rem] bg-accent-500/30 top-1/3 -right-20 animate-blob"></div>
        <div class="blob w-[24rem] h-[24rem] bg-lime-500/25 bottom-0 -left-20 animate-blob" style="animation-delay: -10s;"></div>
    </div>

    <div
        x-data="{ ...projectFilter({{ json_encode($categories) }}), ...lightbox() }"
        class="container relative mx-auto px-6 max-w-7xl">
        <x-landing.section-heading
            eyebrow="Selected work"
            title="Recent <span class='gradient-text'>builds & ships</span>"
            subtitle="A snapshot of what I've delivered. More confidential work I can share on call." />

        <div class="flex flex-wrap justify-center gap-2 mb-10 reveal">
            <template x-for="cat in categories" :key="cat">
                <button
                    type="button"
                    @click="active = cat"
                    :class="active === cat
                        ? 'bg-gradient-to-r from-brand-500 to-accent-500 text-white shadow-lg shadow-brand-500/30'
                        : 'bg-white dark:bg-ink-900 ring-1 ring-ink-200 dark:ring-ink-700 text-ink-700 dark:text-ink-200 hover:bg-ink-50 dark:hover:bg-ink-800'"
                    class="px-5 py-2 rounded-full text-sm font-semibold transition-all focus-ring"
                    x-text="cat"></button>
            </template>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($projects as $project)
                <article
                    x-show="is('{{ $project['category'] }}')"
                    x-transition.opacity.duration.400ms
                    class="reveal group relative rounded-3xl overflow-hidden bg-white dark:bg-ink-900 ring-1 ring-ink-200 dark:ring-ink-700 hover:ring-brand-500/40 transition-all hover:-translate-y-2 hover:shadow-2xl">
                    <button
                        type="button"
                        @click="show('{{ $project['img'] }}', '{{ addslashes($project['title']) }}')"
                        class="block w-full aspect-[4/3] overflow-hidden bg-ink-100 dark:bg-ink-800 focus-ring">
                        <img
                            src="{{ $project['img_progressive'] }}"
                            data-full="{{ $project['img'] }}"
                            alt="{{ $project['title'] }}"
                            loading="lazy"
                            decoding="async"
                            onload="this.src=this.dataset.full"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </button>

                    <div class="p-5">
                        <div class="flex items-start justify-between gap-3 mb-2">
                            <h3 class="text-lg font-extrabold leading-snug">{{ $project['title'] }}</h3>
                            @if (!array_key_exists('link', $project))
                                <span class="shrink-0 px-2 py-0.5 rounded-full text-[10px] uppercase tracking-widest font-bold bg-ink-100 dark:bg-ink-800 text-ink-500 dark:text-ink-400">
                                    Confidential
                                </span>
                            @endif
                        </div>
                        <div class="text-xs text-brand-500 font-semibold uppercase tracking-widest mb-4">{{ $project['category'] }}</div>
                        @if (array_key_exists('link', $project))
                            <a href="{{ $project['link'] }}" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-1 text-sm font-bold text-ink-900 dark:text-ink-50 hover:text-brand-500 transition-colors focus-ring">
                                Visit site
                                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M11 3a1 1 0 100 2h2.6L6.3 12.3a1 1 0 101.4 1.4L15 6.4V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"/>
                                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 100-2H5z"/>
                                </svg>
                            </a>
                        @else
                            <span class="text-sm italic text-ink-400">Available on request</span>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Lightbox modal --}}
        <x-landing.modal name="Project preview">
            <div class="rounded-3xl overflow-hidden bg-ink-950 ring-1 ring-white/10">
                <img :src="src" :alt="title" class="w-full h-auto max-h-[80vh] object-contain">
                <div class="p-4 text-white text-center font-semibold" x-text="title"></div>
            </div>
        </x-landing.modal>
    </div>
</section>
