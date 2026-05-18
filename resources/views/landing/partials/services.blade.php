@php
    $from = 'from-brand-500';
    $to   = 'to-accent-500';
@endphp
<section id="service" class="relative py-28 bg-gradient-to-b from-ink-50 to-white dark:from-ink-950 dark:to-ink-900 text-ink-900 dark:text-ink-50 overflow-hidden">
    <div class="container relative mx-auto px-6 max-w-7xl">
        <x-landing.section-heading
            eyebrow="What I do"
            title="Services built for <span class='gradient-text'>real businesses</span>"
            subtitle="Pick what fits — or mix them. Most clients end up using all four." />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($services as $i => $service)
                <div class="reveal group relative" style="transition-delay: {{ $i * 80 }}ms;">
                    <div class="absolute -inset-0.5 rounded-3xl bg-gradient-to-br {{ $from }} {{ $to }} opacity-0 group-hover:opacity-100 blur transition-opacity duration-500"></div>
                    <article class="relative h-full rounded-3xl p-7 bg-white dark:bg-ink-900 ring-1 ring-ink-200 dark:ring-ink-700 group-hover:-translate-y-2 transition-transform duration-500">
                        <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-br {{ $from }} {{ $to }} text-white text-2xl shadow-lg mb-5 group-hover:rotate-6 transition-transform duration-500">
                            <span class="{{ $service['icon'] }}"></span>
                        </div>
                        <h3 class="text-xl font-extrabold mb-3 group-hover:text-brand-500 transition-colors">{{ $service['title'] }}</h3>
                        <p class="text-sm text-ink-600 dark:text-ink-300 leading-relaxed">{{ $service['desc'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
