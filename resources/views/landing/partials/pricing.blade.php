<section id="pricing" class="relative py-28 bg-gradient-to-b from-white via-ink-50 to-white dark:from-ink-900 dark:via-ink-950 dark:to-ink-900 text-ink-900 dark:text-ink-50 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-30">
        <div class="blob w-[28rem] h-[28rem] bg-brand-500/40 top-20 -left-20 animate-blob"></div>
        <div class="blob w-[24rem] h-[24rem] bg-accent-500/30 bottom-10 -right-20 animate-blob" style="animation-delay: -9s;"></div>
    </div>

    <div class="relative mx-auto px-6 max-w-[1600px]">
        <x-landing.section-heading
            eyebrow="Pricing"
            title="Straightforward <span class='gradient-text'>packages</span>"
            subtitle="Per-project pricing. No hidden fees. Custom scopes welcome — just ask." />

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 lg:gap-8 items-stretch mt-12">
            @foreach ($packages as $package)
                <x-landing.pricing-card :package="$package" />
            @endforeach
        </div>

        <p class="text-center text-sm text-ink-500 dark:text-ink-400 reveal" style="margin-top: 5rem;">
            Need something different?
            <a href="#contact" class="font-bold text-brand-500 hover:text-accent-500 underline underline-offset-4">Let's chat about a custom scope.</a>
        </p>
    </div>
</section>
