@php
    $sectionLinks = [
        ['href' => '#about', 'label' => 'About'],
        ['href' => '#service', 'label' => 'Services'],
        ['href' => '#work', 'label' => 'Work'],
        ['href' => '#testimonials', 'label' => 'Testimonials'],
        ['href' => '#pricing', 'label' => 'Pricing'],
        ['href' => '#contact', 'label' => 'Contact'],
    ];
@endphp
<header
    x-data="{ open: false, scrolled: false }"
    @scroll.window="scrolled = window.scrollY > 24"
    class="fixed top-0 inset-x-0 z-50 transition-all duration-300"
    :class="scrolled ? 'py-2' : 'py-4'">
    <div class="container mx-auto px-4 max-w-7xl">
        <nav
            class="flex items-center gap-4 rounded-2xl px-4 sm:px-6 transition-all duration-300"
            :class="scrolled
                ? 'h-14 bg-white/85 dark:bg-ink-950/85 ring-1 ring-ink-200/70 dark:ring-ink-800/70 shadow-lg backdrop-blur-xl'
                : 'h-16 bg-white/60 dark:bg-ink-950/40 ring-1 ring-white/20 dark:ring-white/5 backdrop-blur-md'"
            aria-label="Primary">

            {{-- Logo --}}
            <a href="#home" class="flex items-center gap-2 shrink-0 focus-ring rounded-lg" aria-label="Omar Taher Saad — Home">
                <span class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-gradient-to-br from-brand-500 to-accent-500 text-white font-extrabold text-sm shadow-md">
                    OTS
                </span>
                <span class="hidden sm:flex flex-col leading-none">
                    <span class="text-sm font-extrabold text-ink-900 dark:text-ink-50 tracking-tight">Omar Taher Saad</span>
                    <span class="text-[10px] uppercase tracking-[0.18em] text-ink-500 dark:text-ink-400">Senior Engineer</span>
                </span>
            </a>

            {{-- Desktop links --}}
            <ul class="hidden lg:flex items-center gap-1 mx-auto">
                @foreach ($sectionLinks as $link)
                    <li>
                        <a href="{{ $link['href'] }}"
                           class="px-3 py-2 rounded-lg text-sm font-semibold text-ink-700 dark:text-ink-200 hover:text-brand-500 dark:hover:text-brand-300 hover:bg-ink-100 dark:hover:bg-ink-800/60 transition-colors focus-ring">
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="ml-auto lg:ml-0 flex items-center gap-2 shrink-0">
                <a href="{{ route('media') }}"
                   class="hidden md:inline-flex px-3 py-2 rounded-lg text-sm font-semibold text-ink-700 dark:text-ink-200 hover:text-brand-500 dark:hover:text-brand-300 transition-colors focus-ring">
                    In Media
                </a>

                {{-- Theme toggle --}}
                <button
                    type="button"
                    id="theme-toggle-landing"
                    aria-label="Toggle dark mode"
                    class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-ink-100 dark:bg-ink-800 text-ink-700 dark:text-ink-100 hover:bg-ink-200 dark:hover:bg-ink-700 transition-colors focus-ring">
                    <svg class="w-5 h-5 dark:hidden" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M21.64 13a1 1 0 00-1.05-.14 8.05 8.05 0 01-3.37.73 8.15 8.15 0 01-8.14-8.1 8.59 8.59 0 01.25-2A1 1 0 008 2.36a10.14 10.14 0 1014 11.69 1 1 0 00-.36-1.05z"/>
                    </svg>
                    <svg class="w-5 h-5 hidden dark:block" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M12 7a5 5 0 100 10 5 5 0 000-10zm0-5a1 1 0 011 1v2a1 1 0 11-2 0V3a1 1 0 011-1zm0 17a1 1 0 011 1v2a1 1 0 11-2 0v-2a1 1 0 011-1zM4.22 4.22a1 1 0 011.42 0l1.4 1.42a1 1 0 11-1.4 1.4L4.22 5.64a1 1 0 010-1.42zm12.72 12.72a1 1 0 011.42 0l1.4 1.42a1 1 0 11-1.42 1.4l-1.4-1.42a1 1 0 010-1.4zM2 12a1 1 0 011-1h2a1 1 0 110 2H3a1 1 0 01-1-1zm17 0a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1zM4.22 19.78a1 1 0 010-1.42l1.42-1.4a1 1 0 111.4 1.4l-1.4 1.42a1 1 0 01-1.42 0zm12.72-12.72a1 1 0 010-1.42l1.42-1.4a1 1 0 111.4 1.42l-1.4 1.4a1 1 0 01-1.42 0z"/>
                    </svg>
                </button>

                {{-- Auth-aware CTA --}}
                @auth
                    <a href="{{ route('users.home') }}"
                       class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-sm font-bold bg-ink-900 dark:bg-ink-50 text-white dark:text-ink-900 hover:bg-brand-500 dark:hover:bg-brand-500 dark:hover:text-white transition-colors focus-ring">
                        Dashboard
                    </a>
                @else
                    <a href="#contact"
                       class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-sm font-bold bg-gradient-to-r from-brand-500 to-accent-500 text-white shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all focus-ring">
                        Hire Me
                    </a>
                @endauth

                {{-- Mobile menu trigger --}}
                <button
                    type="button"
                    @click="open = !open"
                    aria-label="Toggle menu"
                    :aria-expanded="open"
                    class="lg:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg bg-ink-100 dark:bg-ink-800 text-ink-700 dark:text-ink-100 hover:bg-ink-200 dark:hover:bg-ink-700 transition-colors focus-ring">
                    <svg x-show="!open" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h16"/>
                    </svg>
                    <svg x-show="open" x-cloak class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <path d="M6 6l12 12M18 6L6 18"/>
                    </svg>
                </button>
            </div>
        </nav>

        {{-- Mobile menu sheet --}}
        <div
            x-show="open"
            x-cloak
            x-transition.opacity
            @click.outside="open = false"
            @keydown.escape.window="open = false"
            class="lg:hidden mt-2 rounded-2xl bg-white/95 dark:bg-ink-950/95 ring-1 ring-ink-200 dark:ring-ink-800 shadow-2xl backdrop-blur-xl p-4">
            <ul class="flex flex-col gap-1">
                @foreach ($sectionLinks as $link)
                    <li>
                        <a href="{{ $link['href'] }}" @click="open = false"
                           class="block px-4 py-3 rounded-xl text-base font-semibold text-ink-800 dark:text-ink-100 hover:bg-ink-100 dark:hover:bg-ink-800 transition-colors focus-ring">
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
                <li>
                    <a href="{{ route('media') }}" @click="open = false"
                       class="block px-4 py-3 rounded-xl text-base font-semibold text-ink-800 dark:text-ink-100 hover:bg-ink-100 dark:hover:bg-ink-800 transition-colors focus-ring">
                        In Media
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('users.home') }}" @click="open = false"
                           class="block px-4 py-3 rounded-xl text-base font-bold bg-ink-900 dark:bg-ink-50 text-white dark:text-ink-900 text-center">
                            Dashboard
                        </a>
                    </li>
                @else
                    <li class="mt-2">
                        <a href="#contact" @click="open = false"
                           class="block px-4 py-3 rounded-xl text-base font-bold bg-gradient-to-r from-brand-500 to-accent-500 text-white text-center shadow-md">
                            Hire Me
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</header>
