@extends("slider.simple-layout")

@section("title", $content['page_title'] ?? 'Slide')

@section("style")
    <style type="text/tailwindcss">
        .section-card {
            @apply rounded-2xl border border-slate-200 bg-white
            dark:border-slate-700 dark:bg-slate-900;
        }

        .question-card {
            @apply rounded-xl border border-slate-200 bg-white p-3 sm:p-4
            dark:border-slate-700 dark:bg-slate-900;
        }

        .number-badge {
            @apply grid h-8 w-8 sm:h-9 sm:w-9 shrink-0 place-items-center rounded-lg
            bg-indigo-600 text-xs sm:text-sm font-black text-white;
        }

        .option-pill {
            @apply rounded-lg border border-slate-200 bg-slate-50 px-3 py-2
            text-xs sm:text-sm font-bold tracking-[-0.01em] text-slate-700
            dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100;
        }

        .reading-text {
            @apply text-sm sm:text-[15px] lg:text-base leading-6 sm:leading-7
            font-semibold tracking-[-0.01em] text-slate-700 dark:text-slate-200;
        }

        .question-text {
            @apply text-sm sm:text-base lg:text-lg font-extrabold tracking-[-0.02em]
            text-slate-900 dark:text-white leading-snug;
        }

        .helper-label {
            @apply inline-flex items-center rounded-full border border-slate-200 bg-slate-50
            px-2.5 py-1 text-[11px] sm:text-xs font-bold tracking-[-0.01em]
            text-slate-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300;
        }

        .answer-line {
            @apply mt-3 h-10 sm:h-11 rounded-lg border border-dashed border-slate-300 bg-slate-50
            dark:border-slate-600 dark:bg-slate-800;
        }

        .reading-highlight {
            @apply text-indigo-600 dark:text-indigo-400;
        }

        .section-label {
            @apply text-xs sm:text-sm font-black uppercase tracking-[0.12em]
            text-slate-500 dark:text-slate-400;
        }
    </style>
@endsection

@section("content")
    <main class="min-h-[100dvh] w-full px-3 sm:px-5 lg:px-6 py-3 sm:py-5">
        <div class="mx-auto w-full max-w-6xl">
            <div class="p-3 sm:p-5 lg:p-6">
                <header id="titleBlock" class="text-center mb-5 sm:mb-8">
                    <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-3xl sm:text-5xl lg:text-6xl">
                        <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                            {{ $content['title'] }}
                        </span>
                    </h1>

                    @if(!empty($content['subtitle']))
                        <p class="mt-2 text-sm sm:text-base lg:text-lg font-extrabold tracking-[-0.02em] text-slate-700 dark:text-slate-200">
                            {{ $content['subtitle'] }}
                        </p>
                    @endif
                </header>

                <div class="grid grid-cols-1 xl:grid-cols-12 gap-3 sm:gap-4">
                    {{-- Passage --}}
                    <section id="passageCard" class="section-card xl:col-span-5 p-3 sm:p-4 lg:p-5">
                        <div class="section-label">Passage</div>

                        <div class="mt-3 space-y-3">
                            @foreach($content['passage'] as $paragraph)
                                <p class="reading-text">
                                    {!! preg_replace(
                                        ["/shouldn’t/u", "/shouldn't/u", "/\bshould\b/u"],
                                        [
                                            '<span class="reading-highlight">shouldn’t</span>',
                                            '<span class="reading-highlight">shouldn’t</span>',
                                            '<span class="reading-highlight">should</span>'
                                        ],
                                        e($paragraph)
                                    ) !!}
                                </p>
                            @endforeach
                        </div>
                    </section>

                    {{-- Questions --}}
                    <section id="questionsWrap" class="xl:col-span-7 space-y-3">
                        @foreach($content['questions'] as $question)
                            <article class="question-card">
                                <div class="flex items-start gap-3">
                                    <div class="number-badge">
                                        {{ $question['number'] }}
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <div class="mb-2">
                                            <span class="helper-label">
                                                {{ $question['type'] === 'mcq' ? 'Multiple Choice' : 'Short Answer' }}
                                            </span>
                                        </div>

                                        <h3 class="question-text">
                                            {{ $question['question'] }}
                                        </h3>

                                        @if($question['type'] === 'mcq' && !empty($question['options']))
                                            <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-2">
                                                @foreach($question['options'] as $option)
                                                    <div class="option-pill">
                                                        {{ $option }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="answer-line"></div>
                                        @endif
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const title = document.getElementById("titleBlock");
            const passage = document.getElementById("passageCard");
            const wrap = document.getElementById("questionsWrap");
            const questions = Array.from(wrap?.children || []);

            function playIn() {
                if (!window.gsap) return;
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

                const items = [title, passage, ...questions].filter(Boolean);
                gsap.killTweensOf(items);
                gsap.set(items, { clearProps: "all" });

                gsap.timeline({ defaults: { ease: "power2.out" } })
                    .from(title, { opacity: 0, y: 10, duration: 0.45 }, 0)
                    .from(passage, { opacity: 0, y: 10, duration: 0.4 }, 0.08)
                    .from(questions, { opacity: 0, y: 10, duration: 0.35, stagger: 0.06 }, 0.12);
            }

            window.resetSlide = playIn;
            playIn();
        });
    </script>
@endsection