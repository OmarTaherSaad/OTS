@php
    $levelStyles = [
        'Expert'       => ['ring' => 'ring-lime-500/40',   'badge' => 'bg-lime-500/15 text-lime-600 dark:text-lime-300'],
        'Advanced'     => ['ring' => 'ring-brand-500/40',  'badge' => 'bg-brand-500/15 text-brand-600 dark:text-brand-300'],
        'Intermediate' => ['ring' => 'ring-accent-500/40', 'badge' => 'bg-accent-500/15 text-accent-700 dark:text-accent-300'],
        'Beginner'     => ['ring' => 'ring-ink-300/40',    'badge' => 'bg-ink-200 text-ink-700 dark:bg-ink-700 dark:text-ink-200'],
    ];
@endphp
<section id="about" class="relative py-28 bg-ink-50 dark:bg-ink-950 text-ink-900 dark:text-ink-50 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-50 dark:opacity-30">
        <div class="blob w-[26rem] h-[26rem] bg-brand-500/30 -top-20 -right-20 animate-blob"></div>
        <div class="blob w-[22rem] h-[22rem] bg-accent-500/25 bottom-0 -left-20 animate-blob" style="animation-delay: -8s;"></div>
    </div>

    <div class="container relative mx-auto px-6 max-w-7xl">
        <x-landing.section-heading
            eyebrow="About me"
            title="Engineer first. <span class='gradient-text'>Problem-solver</span> always."
            subtitle="More than 7 years turning ideas into reliable, scalable products." />

        <div class="grid lg:grid-cols-[1fr_1.3fr] gap-10 items-start">
            <div class="reveal">
                <x-landing.card>
                    <div class="flex items-start gap-5 mb-6">
                        <div class="relative shrink-0">
                            <div class="absolute -inset-1.5 rounded-full bg-gradient-to-br from-brand-500 to-accent-500 blur-md opacity-70"></div>
                            <img src="{{ Storage::url('assets/images/Personal Photo.webp') }}"
                                 alt="Omar Taher Saad"
                                 class="relative w-28 h-28 rounded-full object-cover ring-4 ring-white dark:ring-ink-900">
                        </div>
                        <div>
                            <h3 class="text-2xl font-extrabold">Omar Taher Saad</h3>
                            <p class="text-sm text-ink-500 dark:text-ink-300 mb-3">Senior Software Engineer</p>
                            <a href="{{ config('ots.social-media.linkedin') }}"
                               class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-sm font-semibold bg-brand-500/10 text-brand-600 dark:text-brand-300 hover:bg-brand-500 hover:text-white transition-colors focus-ring"
                               target="_blank" rel="noopener">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="M19 0H5a5 5 0 00-5 5v14a5 5 0 005 5h14a5 5 0 005-5V5a5 5 0 00-5-5zM8 19H5V8h3v11zM6.5 6.7a1.8 1.8 0 110-3.5 1.8 1.8 0 010 3.5zM20 19h-3v-5.6c0-1.4-.5-2.3-1.7-2.3a1.9 1.9 0 00-1.8 1.3c-.1.2-.1.5-.1.8V19h-3V8h3v1.3a3 3 0 012.7-1.5c2 0 3.5 1.3 3.5 4.1V19z"/>
                                </svg>
                                LinkedIn
                            </a>
                        </div>
                    </div>

                    <div x-data="{ category: '{{ array_keys($skills)[0] ?? 'Backend Development' }}' }" class="mt-6">
                        <div class="flex flex-wrap gap-2 mb-5">
                            @foreach ($skills as $category => $items)
                                <button
                                    type="button"
                                    @click="category = '{{ $category }}'"
                                    :class="category === '{{ $category }}'
                                        ? 'bg-gradient-to-r from-brand-500 to-accent-500 text-white shadow-md'
                                        : 'bg-ink-100 dark:bg-ink-800 text-ink-700 dark:text-ink-200 hover:bg-ink-200 dark:hover:bg-ink-700'"
                                    class="px-3 py-1.5 rounded-full text-xs font-semibold transition-all focus-ring">
                                    {{ $category }}
                                </button>
                            @endforeach
                        </div>

                        @foreach ($skills as $category => $items)
                            <div x-show="category === '{{ $category }}'" x-cloak class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                @foreach ($items as $name => $skill)
                                    @php
                                        $style = $levelStyles[$skill['level']] ?? $levelStyles['Beginner'];
                                        $logo = $skill['logo'] ?? null;
                                    @endphp
                                    <div
                                        class="group relative flex flex-col items-center gap-2 p-3 rounded-2xl bg-white dark:bg-ink-800/60 ring-1 {{ $style['ring'] }} hover:-translate-y-1 hover:shadow-lg transition-all"
                                        title="{{ $skill['description'] ?? $name }}">
                                        <div class="absolute -inset-px rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"
                                             style="background: radial-gradient(circle at 50% 0%, {{ $skill['color'] }}33, transparent 70%);"></div>
                                        @if ($logo)
                                            <div class="relative w-10 h-10 flex items-center justify-center rounded-xl"
                                                 style="background-color: {{ $skill['color'] }}1A;">
                                                <img src="{{ Storage::url($logo) }}"
                                                     alt="{{ $name }}"
                                                     loading="lazy"
                                                     decoding="async"
                                                     class="max-w-7 max-h-7 object-contain">
                                            </div>
                                        @else
                                            <div class="relative w-10 h-10 flex items-center justify-center rounded-xl text-sm font-extrabold text-white"
                                                 style="background-color: {{ $skill['color'] }};">
                                                {{ strtoupper(substr($name, 0, 2)) }}
                                            </div>
                                        @endif
                                        <div class="relative text-xs font-bold text-center text-ink-900 dark:text-ink-50 leading-tight">{{ $name }}</div>
                                        <div class="relative text-[10px] uppercase tracking-widest font-bold px-2 py-0.5 rounded-full {{ $style['badge'] }}">
                                            {{ $skill['level'] }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </x-landing.card>
            </div>

            <div class="reveal">
                <div x-data="{ tab: 'story' }" class="space-y-5">
                    <div class="flex flex-wrap gap-2">
                        @foreach (['story' => 'My Story', 'challenges' => 'Challenges', 'apis' => 'APIs', 'languages' => 'Languages'] as $key => $label)
                            <button
                                type="button"
                                @click="tab = '{{ $key }}'"
                                :class="tab === '{{ $key }}'
                                    ? 'bg-ink-900 dark:bg-ink-50 text-white dark:text-ink-900'
                                    : 'bg-white dark:bg-ink-900 ring-1 ring-ink-200 dark:ring-ink-700 text-ink-700 dark:text-ink-200 hover:bg-ink-50 dark:hover:bg-ink-800'"
                                class="px-4 py-2 rounded-full text-sm font-semibold transition-all focus-ring">
                                {{ $label }}
                            </button>
                        @endforeach
                    </div>

                    <x-landing.card>
                        <div x-show="tab === 'story'" x-cloak class="space-y-4 text-ink-700 dark:text-ink-200 leading-relaxed">
                            <p>
                                I'm <strong>Omar Taher Saad</strong> — Senior Software Engineer, WordPress & Shopify developer,
                                with 7+ years across <strong>PHP, Python, C++ and C#</strong>. I'm also a YouTube content creator
                                and founder of Thanawya Helwa.
                            </p>
                            <p>
                                I build full systems from scratch, integrate any third-party API, design clean UIs, and handle
                                everything between the database and the browser. I'm a deadline-respecting, friendly remote
                                collaborator who keeps clients in the loop.
                            </p>
                        </div>

                        <div x-show="tab === 'challenges'" x-cloak>
                            <ul class="grid sm:grid-cols-2 gap-3">
                                @foreach (['Payment Gateway Integrations', 'API Integrations (Auth & Data)', 'UI/UX Design', 'Full website builds from scratch', 'Webhooks & background jobs', 'Performance optimization'] as $item)
                                    <li class="flex items-start gap-3 p-3 rounded-xl bg-ink-50 dark:bg-ink-800/50">
                                        <span class="shrink-0 w-8 h-8 rounded-full bg-gradient-to-br from-brand-500 to-accent-500 flex items-center justify-center text-white text-sm font-bold">✓</span>
                                        <span class="font-medium pt-1">{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div x-show="tab === 'apis'" x-cloak class="space-y-3">
                            @php
                                $apiGroups = [
                                    'Payments' => ['Stripe', 'PayPal', 'Paymob', 'Tap', 'Fawry', 'NBE', 'Banque Misr'],
                                    'Messaging' => ['Twilio', 'Cequens', 'Zipwhip', 'Telnyx'],
                                    'POS' => ['Cova', 'Flowhub', 'Vend'],
                                    'KYC' => ['Sumsub'],
                                    'Others' => ['Kraken', 'Egyptian eInvoicing', 'Telegram', 'Jandrozd'],
                                ];
                            @endphp
                            @foreach ($apiGroups as $group => $items)
                                <div>
                                    <div class="text-xs uppercase tracking-widest font-bold text-ink-500 dark:text-ink-400 mb-2">{{ $group }}</div>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($items as $item)
                                            <span class="px-3 py-1 rounded-full text-sm bg-ink-100 dark:bg-ink-800 ring-1 ring-ink-200 dark:ring-ink-700 text-ink-800 dark:text-ink-100 font-medium">{{ $item }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div x-show="tab === 'languages'" x-cloak>
                            <ul class="space-y-3">
                                @foreach ($languages as $lang => $level)
                                    <li class="flex items-center justify-between p-3 rounded-xl bg-ink-50 dark:bg-ink-800/50">
                                        <span class="font-semibold">{{ $lang }}</span>
                                        <span class="text-sm px-3 py-1 rounded-full bg-gradient-to-r from-brand-500 to-accent-500 text-white font-semibold">{{ $level }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </x-landing.card>
                </div>
            </div>
        </div>
    </div>
</section>
