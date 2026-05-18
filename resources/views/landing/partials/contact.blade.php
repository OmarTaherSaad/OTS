<section id="contact" class="relative py-28 bg-ink-950 text-white overflow-hidden">
    <div class="absolute inset-0 mesh-bg opacity-90"></div>
    <div class="absolute inset-0 pointer-events-none opacity-60">
        <div class="blob w-[32rem] h-[32rem] bg-brand-500/40 top-0 -right-20 animate-blob"></div>
        <div class="blob w-[28rem] h-[28rem] bg-accent-500/35 bottom-0 -left-20 animate-blob" style="animation-delay: -10s;"></div>
    </div>

    <div class="container relative mx-auto px-6 max-w-7xl">
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            <div class="reveal">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-widest bg-white/10 ring-1 ring-white/20 backdrop-blur-md mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full rounded-full bg-lime-400 opacity-75 animate-ping"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-lime-400"></span>
                    </span>
                    Let's build something
                </div>

                <h2 class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight mb-6">
                    Got an idea?
                    <span class="gradient-text block">Let's ship it.</span>
                </h2>
                <p class="text-lg text-white/70 max-w-lg mb-8 leading-relaxed">
                    {{ __("It's hard to answer immediately, but I will do as fast as possible") }}. Usually within 24 hours on business days.
                </p>

                <ul class="space-y-3 max-w-md text-white/80">
                    <li class="flex items-start gap-3">
                        <span class="shrink-0 mt-1 w-2 h-2 rounded-full bg-brand-500"></span>
                        <span>Replies typically within 24 hours on business days</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="shrink-0 mt-1 w-2 h-2 rounded-full bg-accent-500"></span>
                        <span>Free 30-min discovery call after we connect</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="shrink-0 mt-1 w-2 h-2 rounded-full bg-brand-500"></span>
                        <span>NDA-ready &mdash; details stay confidential</span>
                    </li>
                </ul>
            </div>

            <div class="reveal">
                <div class="relative">
                    <div class="absolute -inset-1 bg-gradient-to-br from-brand-500 to-accent-500 rounded-3xl blur-2xl opacity-40"></div>
                    <form class="relative rounded-3xl bg-ink-900/90 ring-1 ring-white/10 backdrop-blur-xl p-8 needs-validation"
                          novalidate
                          action="{{ route('contact-submit') }}"
                          method="POST"
                          id="ContactForm">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div class="sm:col-span-2">
                                <label for="contact-name" class="block text-xs uppercase tracking-widest font-bold text-white/60 mb-2">{{ __('Name') }}</label>
                                <input
                                    id="contact-name"
                                    class="w-full px-4 py-3 rounded-xl bg-white/5 ring-1 ring-white/10 text-white placeholder-white/30 focus:ring-2 focus:ring-brand-500 focus:bg-white/10 outline-none transition-all {{ $errors->has('name') ? 'ring-red-500/60' : '' }}"
                                    type="text" name="name" value="{{ old('name') }}" placeholder="Your name" required>
                                @error('name')<div class="mt-1 text-xs text-red-300">{{ $message }}</div>@enderror
                            </div>

                            <div>
                                <label for="contact-phone" class="block text-xs uppercase tracking-widest font-bold text-white/60 mb-2">{{ __('Mobile Number') }}</label>
                                <input
                                    id="contact-phone"
                                    class="w-full px-4 py-3 rounded-xl bg-white/5 ring-1 ring-white/10 text-white placeholder-white/30 focus:ring-2 focus:ring-brand-500 focus:bg-white/10 outline-none transition-all"
                                    type="tel" name="phone" value="{{ old('phone') }}" required>
                            </div>

                            <div>
                                <label for="contact-email" class="block text-xs uppercase tracking-widest font-bold text-white/60 mb-2">{{ __('Email Address') }}</label>
                                <input
                                    id="contact-email"
                                    class="w-full px-4 py-3 rounded-xl bg-white/5 ring-1 ring-white/10 text-white placeholder-white/30 focus:ring-2 focus:ring-brand-500 focus:bg-white/10 outline-none transition-all {{ $errors->has('email') ? 'ring-red-500/60' : '' }}"
                                    type="email" name="email" value="{{ old('email') }}" placeholder="you@company.com" required>
                                @error('email')<div class="mt-1 text-xs text-red-300">{{ $message }}</div>@enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="contact-subject" class="block text-xs uppercase tracking-widest font-bold text-white/60 mb-2">{{ __('What are you sending me about?') }}</label>
                                <input
                                    id="contact-subject"
                                    class="w-full px-4 py-3 rounded-xl bg-white/5 ring-1 ring-white/10 text-white placeholder-white/30 focus:ring-2 focus:ring-brand-500 focus:bg-white/10 outline-none transition-all {{ $errors->has('subject') ? 'ring-red-500/60' : '' }}"
                                    type="text" name="subject" value="{{ old('subject') }}" minlength="5" placeholder="Project idea, question, etc." required>
                                @error('subject')<div class="mt-1 text-xs text-red-300">{{ $message }}</div>@enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="contact-message" class="block text-xs uppercase tracking-widest font-bold text-white/60 mb-2">@lang('Message')</label>
                                <textarea
                                    id="contact-message"
                                    class="w-full px-4 py-3 rounded-xl bg-white/5 ring-1 ring-white/10 text-white placeholder-white/30 focus:ring-2 focus:ring-brand-500 focus:bg-white/10 outline-none transition-all resize-none {{ $errors->has('message') ? 'ring-red-500/60' : '' }}"
                                    name="message" rows="5" minlength="10" placeholder="Tell me what you're building...">{{ old('message') }}</textarea>
                                @error('message')<div class="mt-1 text-xs text-red-300">{{ $message }}</div>@enderror
                            </div>

                            <div class="sm:col-span-2">
                                <button type="submit"
                                        class="w-full px-6 py-4 rounded-xl font-bold text-base bg-gradient-to-r from-brand-500 to-accent-500 bg-[length:200%_100%] hover:bg-[position:100%_0] text-white shadow-lg shadow-brand-500/30 hover:shadow-xl hover:-translate-y-0.5 transition-all focus-ring">
                                    @lang('Send Message')
                                    <svg class="inline-block w-5 h-5 ml-2 -mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3 3.3a1 1 0 011.4 0l6 6a1 1 0 010 1.4l-6 6a1 1 0 01-1.4-1.4L14.6 11H3a1 1 0 110-2h11.6l-4.3-4.3a1 1 0 010-1.4z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                        <p class="mt-4 text-xs text-white/40 text-center">
                            Protected by reCAPTCHA. Your information stays private.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
