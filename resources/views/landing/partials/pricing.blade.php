<section id="pricing" class="relative py-28 bg-gradient-to-b from-white via-ink-50 to-white dark:from-ink-900 dark:via-ink-950 dark:to-ink-900 text-ink-900 dark:text-ink-50 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-30">
        <div class="blob w-[28rem] h-[28rem] bg-brand-500/40 top-20 -left-20 animate-blob"></div>
        <div class="blob w-[24rem] h-[24rem] bg-accent-500/30 bottom-10 -right-20 animate-blob" style="animation-delay: -9s;"></div>
    </div>

    <div x-data="pricingToggle" class="container relative mx-auto px-6 max-w-7xl">
        <x-landing.section-heading
            eyebrow="Pricing"
            title="Straightforward <span class='gradient-text'>packages</span>"
            subtitle="No hidden fees. Custom scopes welcome — just ask." />

        <div class="flex justify-center mb-12 reveal">
            <div class="inline-flex p-1 rounded-full bg-ink-100 dark:bg-ink-800 ring-1 ring-ink-200 dark:ring-ink-700">
                <button
                    type="button"
                    @click="mode = 'project'"
                    :class="!isMonthly() ? 'bg-white dark:bg-ink-900 shadow text-ink-900 dark:text-ink-50' : 'text-ink-500 dark:text-ink-400'"
                    class="px-5 py-2 rounded-full text-sm font-semibold transition-all focus-ring">
                    Per project
                </button>
                <button
                    type="button"
                    @click="mode = 'monthly'"
                    :class="isMonthly() ? 'bg-white dark:bg-ink-900 shadow text-ink-900 dark:text-ink-50' : 'text-ink-500 dark:text-ink-400'"
                    class="px-5 py-2 rounded-full text-sm font-semibold transition-all focus-ring">
                    Monthly retainer
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 items-stretch">
            @foreach ($packages as $package)
                <x-landing.pricing-card :package="$package" />
            @endforeach
        </div>

        <p class="text-center text-sm text-ink-500 dark:text-ink-400 mt-10 reveal">
            Need something different?
            <a href="#contact" class="font-bold text-brand-500 hover:text-accent-500 underline underline-offset-4">Let's chat about a custom scope.</a>
        </p>
    </div>
</section>
