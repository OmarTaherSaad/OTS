<section id="testimonials" class="relative py-28 bg-ink-50 dark:bg-ink-950 text-ink-900 dark:text-ink-50 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-40">
        <div class="blob w-[24rem] h-[24rem] bg-brand-500/30 top-10 left-1/4 animate-blob"></div>
        <div class="blob w-[20rem] h-[20rem] bg-lime-500/25 bottom-10 right-1/4 animate-blob" style="animation-delay: -7s;"></div>
    </div>

    <div x-data="testimonialsScroller" class="relative">
        <div class="container mx-auto px-6 max-w-7xl">
            <x-landing.section-heading
                eyebrow="Client love"
                title="Don't take it from <span class='gradient-text'>me</span>"
                subtitle="What founders and CTOs say after we ship together." />
        </div>

        <div class="relative">
            <div
                x-ref="track"
                class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth scrollbar-none px-6 lg:px-12 pb-6"
                tabindex="0"
                aria-label="Testimonials carousel">
                <div class="shrink-0 w-2 sm:w-8"></div>
                @foreach ($testimonials as $testimonial)
                    <x-landing.testimonial-card :testimonial="$testimonial" />
                @endforeach
                <div class="shrink-0 w-2 sm:w-8"></div>
            </div>

            <div class="flex justify-center gap-3 mt-6">
                <button
                    type="button"
                    @click="scrollBy(-1)"
                    aria-label="Previous testimonial"
                    class="w-11 h-11 rounded-full bg-white dark:bg-ink-900 ring-1 ring-ink-200 dark:ring-ink-700 hover:ring-brand-500 hover:bg-brand-500 hover:text-white transition-all focus-ring">
                    <svg class="w-5 h-5 mx-auto" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.7 16.7a1 1 0 01-1.4 0l-6-6a1 1 0 010-1.4l6-6a1 1 0 011.4 1.4L5.4 9H17a1 1 0 110 2H5.4l4.3 4.3a1 1 0 010 1.4z"/>
                    </svg>
                </button>
                <button
                    type="button"
                    @click="scrollBy(1)"
                    aria-label="Next testimonial"
                    class="w-11 h-11 rounded-full bg-white dark:bg-ink-900 ring-1 ring-ink-200 dark:ring-ink-700 hover:ring-brand-500 hover:bg-brand-500 hover:text-white transition-all focus-ring">
                    <svg class="w-5 h-5 mx-auto" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3 3.3a1 1 0 011.4 0l6 6a1 1 0 010 1.4l-6 6a1 1 0 01-1.4-1.4L14.6 11H3a1 1 0 110-2h11.6l-4.3-4.3a1 1 0 010-1.4z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
