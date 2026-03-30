@extends("slider.simple-layout")

@section("title", $content['page_title'] ?? 'Slide')

@section("style")
    <style type="text/tailwindcss">
        .grammar-page {
            background: transparent;
        }

        .grammar-theme-modern {
            font-family: "Plus Jakarta Sans", sans-serif;
            background:
                radial-gradient(980px 560px at 8% 10%, rgba(103,63,231,.14), transparent 55%),
                radial-gradient(900px 560px at 92% 14%, rgba(59,130,246,.12), transparent 56%),
                radial-gradient(880px 640px at 50% 100%, rgba(16,185,129,.08), transparent 60%);
        }

        .dark .grammar-theme-modern {
            background:
                radial-gradient(980px 560px at 8% 10%, rgba(96,165,250,.18), transparent 55%),
                radial-gradient(900px 560px at 92% 14%, rgba(192,132,252,.16), transparent 56%),
                radial-gradient(880px 640px at 50% 100%, rgba(99,102,241,.12), transparent 60%),
                linear-gradient(180deg, #020617 0%, #0f172a 100%);
        }

        .grammar-card {
            @apply relative overflow-hidden rounded-[28px] border border-slate-200/70 bg-white/80 backdrop-blur-xl shadow-xl
            dark:border-slate-700/30 dark:bg-slate-950/40;
        }

        .grammar-bullet {
            @apply flex items-start gap-3 text-base sm:text-xl font-black tracking-[-0.02em] text-slate-900 dark:text-slate-100;
        }

        .grammar-example {
            @apply flex items-start gap-3 text-lg sm:text-2xl font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50;
        }

        .tick {
            @apply shrink-0 text-emerald-600 dark:text-emerald-400;
        }

        .grammar-theme-modern .grammar-card {
            @apply border border-white/70 bg-white/75 shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-[18px]
            dark:border-white/10 dark:bg-white/5 dark:shadow-[0_16px_34px_-24px_rgba(2,6,23,0.34)];
        }

        .grammar-theme-modern .grammar-bullet {
            @apply text-sm sm:text-base lg:text-[1.05rem] leading-[1.5] tracking-[-0.02em];
        }

        .grammar-theme-modern .grammar-example {
            @apply text-base sm:text-lg lg:text-[1.2rem] leading-[1.45] tracking-[-0.03em];
        }

        .grammar-theme-modern .tick {
            @apply text-indigo-600 dark:text-indigo-300;
        }
    </style>
@endsection

@section("content")
    @php
        $themeClass = trim((string)($content['theme_class'] ?? ''));
        $headerWrapClass = trim((string)($content['header_wrap_class'] ?? 'text-center mb-5 sm:mb-8'));
        $titleClass = trim((string)($content['title_class'] ?? 'font-black leading-[1.02] tracking-[-0.05em] text-3xl sm:text-5xl lg:text-6xl'));
        $titleGradientClass = trim((string)($content['title_gradient_class'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));
        $subtitleClass = trim((string)($content['subtitle_class'] ?? 'mt-2 text-sm sm:text-base lg:text-lg font-extrabold tracking-[-0.02em] text-slate-700 dark:text-slate-200'));
    @endphp

    <main class="grammar-page {{ $themeClass }} min-h-[100dvh] w-full flex items-center justify-center px-3 sm:px-6 lg:px-8 py-5 sm:py-8">
        <div class="w-full max-w-7xl">
            <header id="titleBlock" class="{{ $headerWrapClass }}">
                <h1 class="{{ $titleClass }}">
                    <span class="{{ $titleGradientClass }} bg-clip-text text-transparent">
                        {{ $content['title'] }}
                    </span>
                </h1>

                @if(!empty($content['subtitle']))
                    <p class="{{ $subtitleClass }}">
                        {{ $content['subtitle'] }}
                    </p>
                @endif
            </header>

            <section id="grammarWrap" class="grid grid-cols-1 xl:grid-cols-2 gap-4 sm:gap-6">
                @foreach($content['sections'] as $section)
                    <article class="grammar-card p-4 sm:p-6 lg:p-7">
                        <div class="absolute inset-x-0 top-0 h-2 bg-gradient-to-r {{ $section['accent_class'] }}"></div>

                        <div class="flex items-start gap-3 sm:gap-4">
                            <div class="shrink-0 grid h-12 w-12 sm:h-14 sm:w-14 place-items-center rounded-2xl bg-white shadow-md ring-1 ring-black/5 text-2xl dark:bg-slate-900 dark:ring-white/10">
                                {{ $section['icon'] }}
                            </div>

                            <div class="min-w-0">
                                <h2 class="text-2xl sm:text-3xl lg:text-[2rem] font-black tracking-[-0.04em] text-slate-950 dark:text-white leading-tight">
                                    {{ $section['title'] }}
                                </h2>

                                @if(!empty($section['intro_top']))
                                    <p class="mt-2 text-lg sm:text-2xl font-black tracking-[-0.03em] text-slate-900 dark:text-slate-100">
                                        {{ $section['intro_top'] }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="mt-5 sm:mt-6 space-y-5 sm:space-y-6">
                            <div>
                                <p class="text-xl sm:text-3xl font-black tracking-[-0.03em] text-slate-950 dark:text-white">
                                    {{ $section['intro'] }}
                                </p>

                                <div class="mt-3 sm:mt-4 space-y-2.5 sm:space-y-3">
                                    @foreach($section['bullets'] as $bullet)
                                        <div class="grammar-bullet">
                                            <span class="shrink-0 text-black dark:text-white">•</span>
                                            <span class="{{ $section['bullet_color'] }}">{{ $bullet }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <h3 class="text-2xl sm:text-4xl font-black tracking-[-0.04em] text-rose-500">
                                    Structure:
                                </h3>

                                <p class="mt-2 text-xl sm:text-3xl font-black tracking-[-0.03em] text-slate-950 dark:text-white">
                                    {{ $section['structure'] }}
                                </p>
                            </div>

                            <div class="space-y-2.5 sm:space-y-3.5">
                                @foreach($section['examples'] as $example)
                                    <div class="grammar-example">
                                        <span class="tick">✓</span>
                                        <span>
                                            {{ $example['subject'] }}
                                            <span class="text-rose-500">{{ $example['highlight'] }}</span>{{ $example['rest'] }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </section>
        </div>
    </main>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const title = document.getElementById("titleBlock");
            const wrap = document.getElementById("grammarWrap");
            const cards = Array.from(wrap?.children || []);

            function playIn() {
                if (!window.gsap) return;
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

                const items = [title, ...cards].filter(Boolean);
                gsap.killTweensOf(items);
                gsap.set(items, { clearProps: "all" });

                gsap.timeline({ defaults: { ease: "power3.out" } })
                    .from(title, { opacity: 0, y: 18, duration: 0.75 }, 0.05)
                    .from(cards, { opacity: 0, y: 18, duration: 0.6, stagger: 0.12 }, 0.18);
            }

            window.resetSlide = playIn;
            playIn();
        });
    </script>
@endsection
