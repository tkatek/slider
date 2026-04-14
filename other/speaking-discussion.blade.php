@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        @media (prefers-reduced-motion: reduce) {
            .float-orb,
            .question-card,
            .question-glow {
                animation: none !important;
                transition: none !important;
            }
        }

        .page-bg {
            font-family: "Plus Jakarta Sans", sans-serif;
            background:
                    radial-gradient(980px 560px at 8% 10%, rgba(103,63,231,.14), transparent 55%),
                    radial-gradient(900px 560px at 92% 14%, rgba(59,130,246,.12), transparent 56%),
                    radial-gradient(880px 640px at 50% 100%, rgba(16,185,129,.08), transparent 60%);
        }

        .dark .page-bg {
            background:
                    radial-gradient(980px 560px at 8% 10%, rgba(96,165,250,.18), transparent 55%),
                    radial-gradient(900px 560px at 92% 14%, rgba(192,132,252,.16), transparent 56%),
                    radial-gradient(880px 640px at 50% 100%, rgba(99,102,241,.12), transparent 60%),
                    linear-gradient(180deg, #020617 0%, #0f172a 100%);
        }

        .float-orb {
            animation: softFloat 6s ease-in-out infinite;
        }

        @keyframes softFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(18px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            animation: fadeUp .7s cubic-bezier(.22,.9,.24,1) both;
        }

        .fade-up-delay-1 { animation-delay: .10s; }
        .fade-up-delay-2 { animation-delay: .20s; }
        .fade-up-delay-3 { animation-delay: .30s; }
        .fade-up-delay-4 { animation-delay: .40s; }

        .question-card {
            transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
            backdrop-filter: blur(14px);
        }

        .question-card:hover {
            transform: translateY(-5px);
        }

        .question-glow {
            transition: transform .28s ease, opacity .28s ease;
        }

        .question-card:hover .question-glow {
            transform: scale(1.08);
            opacity: .95;
        }

        .theme-indigo {
            background: linear-gradient(180deg, rgba(255,255,255,0.96) 0%, rgba(238,242,255,0.98) 100%);
            border-color: rgba(99, 102, 241, 0.20);
            box-shadow: 0 14px 36px rgba(99, 102, 241, 0.10);
        }

        .theme-violet {
            background: linear-gradient(180deg, rgba(255,255,255,0.96) 0%, rgba(245,243,255,0.98) 100%);
            border-color: rgba(139, 92, 246, 0.20);
            box-shadow: 0 14px 36px rgba(139, 92, 246, 0.10);
        }

        .theme-blue {
            background: linear-gradient(180deg, rgba(255,255,255,0.96) 0%, rgba(239,246,255,0.98) 100%);
            border-color: rgba(59, 130, 246, 0.20);
            box-shadow: 0 14px 36px rgba(59, 130, 246, 0.10);
        }

        .theme-sky {
            background: linear-gradient(180deg, rgba(255,255,255,0.96) 0%, rgba(240,249,255,0.98) 100%);
            border-color: rgba(14, 165, 233, 0.20);
            box-shadow: 0 14px 36px rgba(14, 165, 233, 0.10);
        }

        .dark .theme-indigo {
            background: linear-gradient(180deg, rgba(15,23,42,0.94) 0%, rgba(49,46,129,0.26) 100%);
            border-color: rgba(99, 102, 241, 0.24);
        }

        .dark .theme-violet {
            background: linear-gradient(180deg, rgba(15,23,42,0.94) 0%, rgba(76,29,149,0.26) 100%);
            border-color: rgba(139, 92, 246, 0.24);
        }

        .dark .theme-blue {
            background: linear-gradient(180deg, rgba(15,23,42,0.94) 0%, rgba(30,64,175,0.24) 100%);
            border-color: rgba(59, 130, 246, 0.24);
        }

        .dark .theme-sky {
            background: linear-gradient(180deg, rgba(15,23,42,0.94) 0%, rgba(3,105,161,0.24) 100%);
            border-color: rgba(14, 165, 233, 0.24);
        }

        .discussion-highlight {
            background: linear-gradient(90deg, #4f46e5 0%, #7c3aed 55%, #3b82f6 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 900;
        }
    </style>
@endsection

@section('content')
    @php
        $questions = is_array($content['questions'] ?? null)
            ? $content['questions']
            : (is_array($content['examples'] ?? null) ? $content['examples'] : []);
        $gridClass = $content['grid_class'] ?? 'grid-cols-1 md:grid-cols-2';
        $headerWrapClass = $content['header_wrap_class'] ?? 'header-spacing text-center flex flex-col items-center gap-[0.55rem] my-8 mx-auto max-w-4xl';
        $titleClass = $content['title_class'] ?? 'hero-title fade-up w-full font-black tracking-[-0.04em] text-4xl md:text-5xl lg:text-6xl leading-[1.08] pb-[0.08em]';
        $subtitleClass = $content['subtitle_class'] ?? 'hero-subtitle fade-up fade-up-delay-1 max-w-2xl mx-auto text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100';
        $highlightWords = function ($text, $words = []) {
            $formatted = htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8');

            foreach ($words as $word) {
                $safeWord = preg_quote((string)$word, '/');
                $formatted = preg_replace(
                    '/\b(' . $safeWord . ')\b/u',
                    '<span class="discussion-highlight">$1</span>',
                    $formatted,
                    1
                );
            }

            return $formatted;
        };
    @endphp

    <main class="page-bg relative w-full min-h-[100dvh] overflow-hidden">
        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="float-orb absolute top-8 left-4 h-14 w-14 sm:top-10 sm:left-6 sm:h-20 sm:w-20 rounded-full bg-violet-400/10 blur-2xl"></div>
            <div class="float-orb absolute top-20 right-4 h-16 w-16 sm:top-24 sm:right-10 sm:h-24 sm:w-24 rounded-full bg-blue-400/10 blur-2xl" style="animation-delay: .9s;"></div>
            <div class="float-orb absolute bottom-12 left-1/4 h-16 w-16 sm:bottom-16 sm:h-24 sm:w-24 rounded-full bg-indigo-400/10 blur-2xl" style="animation-delay: 1.2s;"></div>
        </div>

        <div class="relative mx-auto w-full max-w-6xl px-4 sm:px-7 lg:px-10 py-8 sm:py-12 lg:py-14 min-h-[100dvh] flex items-center">
            <section class="w-full">
                @include('slider.components.title-subtitle')

                <div class="mt-8 sm:mt-11 lg:mt-12 grid {{ $gridClass }} gap-4 sm:gap-6">
                    @foreach($questions as $index => $question)
                        @php
                            $theme = $question['theme'] ?? match($index % 4) {
                                0 => 'indigo',
                                1 => 'violet',
                                2 => 'blue',
                                default => 'sky',
                            };

                            $themeClasses = match($theme) {
                                'violet' => [
                                    'card'  => 'theme-violet',
                                    'top'   => 'from-violet-500 to-fuchsia-500',
                                    'pill'  => 'bg-violet-500/10 text-violet-700 dark:text-violet-300',
                                    'icon'  => 'bg-violet-500/12 ring-violet-400/20',
                                    'glow'  => 'bg-violet-400/12',
                                ],
                                'blue' => [
                                    'card'  => 'theme-blue',
                                    'top'   => 'from-blue-500 to-indigo-500',
                                    'pill'  => 'bg-blue-500/10 text-blue-700 dark:text-blue-300',
                                    'icon'  => 'bg-blue-500/12 ring-blue-400/20',
                                    'glow'  => 'bg-blue-400/12',
                                ],
                                'sky' => [
                                    'card'  => 'theme-sky',
                                    'top'   => 'from-sky-500 to-cyan-500',
                                    'pill'  => 'bg-sky-500/10 text-sky-700 dark:text-sky-300',
                                    'icon'  => 'bg-sky-500/12 ring-sky-400/20',
                                    'glow'  => 'bg-sky-400/12',
                                ],
                                default => [
                                    'card'  => 'theme-indigo',
                                    'top'   => 'from-indigo-500 to-violet-500',
                                    'pill'  => 'bg-indigo-500/10 text-indigo-700 dark:text-indigo-300',
                                    'icon'  => 'bg-indigo-500/12 ring-indigo-400/20',
                                    'glow'  => 'bg-indigo-400/12',
                                ],
                            };

                            $formattedText = $highlightWords($question['text'] ?? '', $question['highlight'] ?? []);
                        @endphp

                        <article class="question-card fade-up {{ $index === 0 ? 'fade-up-delay-1' : ($index === 1 ? 'fade-up-delay-2' : ($index === 2 ? 'fade-up-delay-3' : 'fade-up-delay-4')) }} relative overflow-hidden rounded-[1.35rem] sm:rounded-[1.75rem] border p-4 sm:p-6 min-h-[145px] sm:min-h-[205px] lg:min-h-[220px] {{ $themeClasses['card'] }}">
                            <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r {{ $themeClasses['top'] }}"></div>
                            <div class="question-glow absolute -right-3 -top-3 h-16 w-16 sm:-right-4 sm:-top-4 sm:h-24 sm:w-24 rounded-full blur-2xl {{ $themeClasses['glow'] }}"></div>

                            <div class="relative flex h-full flex-col">
                                <div class="flex items-start justify-between gap-2 sm:gap-3">
                                    <div class="flex items-center gap-2.5 sm:gap-3">
                                        <div class="flex h-11 w-11 sm:h-14 sm:w-14 items-center justify-center rounded-xl sm:rounded-2xl text-[1.35rem] sm:text-[1.9rem] ring-1 {{ $themeClasses['icon'] }}">
                                            {{ $question['emoji'] ?? '✈️' }}
                                        </div>

                                        <div class="inline-flex items-center rounded-full px-2.5 py-1 sm:px-3.5 sm:py-1.5 text-[10px] sm:text-xs font-black uppercase tracking-[0.14em] sm:tracking-[0.18em] {{ $themeClasses['pill'] }}">
                                            {{ $question['label'] ?? ('Question ' . ($index + 1)) }}
                                        </div>
                                    </div>

                                    <div class="text-base sm:text-2xl opacity-40">
                                        💬
                                    </div>
                                </div>

                                <div class="mt-3 sm:mt-5">
                                    <h2 class="text-[1rem] sm:text-[1.35rem] lg:text-[1.55rem] font-black tracking-[-0.03em] leading-[1.3] sm:leading-[1.34] text-slate-900 dark:text-slate-50">
                                        {!! $formattedText !!}
                                    </h2>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReduced || !window.gsap) return;

            const heading = document.querySelector('.hero-title');
            const subtitle = document.querySelector('.hero-subtitle');
            const cards = document.querySelectorAll('.question-card');

            const animatedItems = [heading, subtitle, ...cards].filter(Boolean);
            gsap.set(animatedItems, { clearProps: 'all' });

            const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

            if (heading) tl.from(heading, { opacity: 0, y: 18, duration: 0.65 });
            if (subtitle) tl.from(subtitle, { opacity: 0, y: 14, duration: 0.5 }, '-=0.35');
            if (cards.length) {
                tl.from(cards, {
                    opacity: 0,
                    y: 18,
                    scale: 0.985,
                    duration: 0.55,
                    stagger: 0.10
                }, '-=0.2');
            }
        });
    </script>
@endsection
