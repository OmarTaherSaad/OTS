<section id="retainer" class="relative py-28 bg-white dark:bg-ink-950 text-ink-900 dark:text-ink-50 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-25">
        <div class="blob w-[26rem] h-[26rem] bg-accent-500/40 top-10 -right-20 animate-blob"></div>
        <div class="blob w-[22rem] h-[22rem] bg-brand-500/30 bottom-10 -left-20 animate-blob" style="animation-delay: -7s;"></div>
    </div>

    <div class="relative mx-auto px-6 max-w-6xl">
        <x-landing.section-heading
            eyebrow="Monthly retainer"
            title="Need <span class='gradient-text'>ongoing</span> help?"
            subtitle="Beyond one-off projects — bring me in monthly to fix bugs, ship features, and keep your system healthy." />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 items-stretch">
            @foreach ($retainers as $retainer)
                <x-landing.pricing-card :package="$retainer" />
            @endforeach
        </div>

        <p class="text-center text-sm text-ink-500 dark:text-ink-400 reveal" style="margin-top: 5rem;">
            Different hours or scope?
            <a href="#contact" class="font-bold text-brand-500 hover:text-accent-500 underline underline-offset-4">Tell me what you need.</a>
        </p>
    </div>
</section>
