@php
    $phrases = [
        'Senior Software Engineer',
        'Shopify Developer',
        'WordPress Developer',
        'Laravel Architect',
        'API Integrations Expert',
        'Founder of Thanawya Helwa',
    ];
@endphp
<section id="home" class="relative min-h-screen flex items-center overflow-hidden mesh-bg text-white">
    {{-- Animated blobs --}}
    <div class="blob w-[34rem] h-[34rem] bg-brand-500/55 top-[-8rem] left-[-8rem] animate-blob" style="animation-delay: 0s;"></div>
    <div class="blob w-[28rem] h-[28rem] bg-accent-500/45 top-[20%] right-[-6rem] animate-blob" style="animation-delay: -6s;"></div>
    <div class="blob w-[26rem] h-[26rem] bg-brand-700/50 bottom-[-6rem] left-[30%] animate-blob" style="animation-delay: -12s;"></div>

    {{-- Particle layer --}}
    <div id="hero-particles" class="absolute inset-0 z-[1]" aria-hidden="true"></div>

    {{-- Subtle grid overlay --}}
    <div class="absolute inset-0 z-[2] opacity-[0.06] pointer-events-none"
         style="background-image: linear-gradient(rgba(255,255,255,0.6) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.6) 1px, transparent 1px); background-size: 48px 48px;"></div>

    <div class="relative z-10 container mx-auto px-6 py-24 max-w-6xl">
        <div
            x-data="heroTilt"
            @mousemove="onMove($event)"
            @mouseleave="onLeave()"
            class="tilt grid lg:grid-cols-[1.4fr_1fr] gap-10 items-center">
            <div class="reveal">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 ring-1 ring-white/20 backdrop-blur-md text-sm font-semibold mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full rounded-full bg-lime-400 opacity-75 animate-ping"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-lime-400"></span>
                    </span>
                    Available for select projects · 2026
                </div>

                <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-extrabold leading-[0.95] mb-6">
                    <span class="block opacity-90 text-2xl sm:text-3xl font-semibold mb-3">Hello, I'm</span>
                    <span class="gradient-text">Omar Taher Saad</span>
                </h1>

                <div class="text-xl sm:text-2xl md:text-3xl font-bold mb-8 min-h-[2.5rem]"
                     x-data="typewriter({phrases: {{ json_encode($phrases) }} })">
                    <span x-text="text"></span><span class="inline-block w-[3px] h-[1em] align-[-0.15em] bg-accent-500 ml-1 animate-pulse"></span>
                </div>

                <p class="text-lg text-white/80 max-w-2xl mb-10 leading-relaxed">
                    7+ years building production systems. PHP, Python, C++, Laravel, Vue, Shopify, WordPress.
                    I ship clean code, integrate any API you throw at me, and respect deadlines.
                </p>

                <div class="flex flex-wrap gap-4">
                    <x-landing.gradient-button href="#work" size="lg">
                        View My Work
                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3 3.3a1 1 0 011.4 0l6 6a1 1 0 010 1.4l-6 6a1 1 0 01-1.4-1.4L14.6 11H3a1 1 0 110-2h11.6l-4.3-4.3a1 1 0 010-1.4z"/>
                        </svg>
                    </x-landing.gradient-button>
                    <x-landing.gradient-button href="#pricing" variant="outline" size="lg">
                        Book a Call
                    </x-landing.gradient-button>
                </div>

                <div class="flex items-center gap-8 mt-12 text-sm text-white/70">
                    <div>
                        <div class="text-3xl font-extrabold text-white">7+</div>
                        <div>Years experience</div>
                    </div>
                    <div class="h-10 w-px bg-white/20"></div>
                    <div>
                        <div class="text-3xl font-extrabold text-white">50+</div>
                        <div>Projects delivered</div>
                    </div>
                    <div class="h-10 w-px bg-white/20"></div>
                    <div>
                        <div class="text-3xl font-extrabold text-white">15+</div>
                        <div>APIs integrated</div>
                    </div>
                </div>
            </div>

            {{-- Right column: floating code card --}}
            <div class="reveal hidden lg:block">
                <div class="relative animate-float">
                    <div class="absolute -inset-1 bg-gradient-to-br from-brand-500 to-accent-500 rounded-3xl blur-2xl opacity-50"></div>
                    <div class="relative rounded-3xl bg-ink-900/95 ring-1 ring-white/10 p-6 backdrop-blur shadow-2xl">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="w-3 h-3 rounded-full bg-red-400"></span>
                            <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
                            <span class="w-3 h-3 rounded-full bg-green-400"></span>
                            <span class="ml-auto text-xs text-white/40 font-mono">~/ots.php</span>
                        </div>
                        <pre class="font-mono text-sm leading-relaxed text-white/90 overflow-x-auto"><code><span class="text-brand-300">class</span> <span class="text-lime-400">Omar</span> <span class="text-brand-300">extends</span> <span class="text-accent-400">Engineer</span> {
  <span class="text-brand-300">public</span> <span class="text-white">$stack</span> = [
    <span class="text-lime-300">'Laravel'</span>, <span class="text-lime-300">'Vue'</span>,
    <span class="text-lime-300">'Shopify'</span>, <span class="text-lime-300">'WP'</span>,
  ];

  <span class="text-brand-300">public function</span> <span class="text-accent-400">build</span>(<span class="text-white">$idea</span>) {
    <span class="text-brand-300">return</span> <span class="text-white">$idea</span>
      -><span class="text-accent-400">ship</span>()
      -><span class="text-accent-400">scale</span>();
  }
}</code></pre>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 text-white/50 text-xs flex flex-col items-center gap-2">
            <span class="uppercase tracking-widest">Scroll</span>
            <svg class="w-4 h-4 animate-bounce" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 16a1 1 0 01-.7-.3l-6-6a1 1 0 011.4-1.4L10 13.6l5.3-5.3a1 1 0 011.4 1.4l-6 6a1 1 0 01-.7.3z"/>
            </svg>
        </div>
    </div>
</section>
