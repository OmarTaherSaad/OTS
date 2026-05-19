<section id="apis" class="relative py-20 bg-ink-100 dark:bg-ink-950 text-ink-900 dark:text-ink-50 overflow-hidden">
    <div class="container mx-auto px-6 max-w-7xl">
        <x-landing.section-heading
            eyebrow="Integrations"
            title="APIs I've connected in <span class='gradient-text'>production</span>"
            subtitle="Payments, messaging, KYC, POS, custom protocols — if it has docs, I've shipped it." />
    </div>

    <div class="marquee-wrapper relative overflow-hidden mask-fade">
        <div class="marquee-track flex items-center gap-8 w-max">
            @php
                // Duplicate logos for seamless loop
                $allLogos = array_merge($logos, $logos);
            @endphp
            @foreach ($allLogos as $logo)
                <div class="shrink-0 h-24 w-44 px-5 flex items-center justify-center rounded-2xl bg-white ring-1 ring-ink-200 dark:ring-ink-300/40 hover:ring-brand-500 transition-all hover:-translate-y-1 hover:shadow-xl dark:shadow-md">
                    <img src="{{ Storage::url($logo) }}"
                         alt=""
                         loading="lazy"
                         decoding="async"
                         class="h-14 max-w-[140px] object-contain">
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .mask-fade {
        -webkit-mask-image: linear-gradient(90deg, transparent, #000 8%, #000 92%, transparent);
                mask-image: linear-gradient(90deg, transparent, #000 8%, #000 92%, transparent);
    }
</style>
