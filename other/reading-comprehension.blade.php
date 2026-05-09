@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    @php
        $theme = $theme ?? [];
        $isOrangeTheme = ($theme['name'] ?? null) === 'orange';

        $heading = trim((string)($content['heading'] ?? ''));
        $showPointDots = $content['show_point_dots'] ?? true;
        $pointTextClass = trim((string)($content['point_text_class'] ?? 'text-base font-bold leading-relaxed text-slate-800 dark:text-slate-100 sm:text-lg'));
        $passageTitle = trim((string)($content['passage_title'] ?? $content['reading_title'] ?? ''));
        $passageLabel = trim((string)($content['passage_label'] ?? 'Reading Passage'));
        $rawPassage = $content['passage'] ?? $content['reading'] ?? [];
        $passageParagraphs = is_array($rawPassage)
            ? array_values(array_filter(array_map(static fn ($paragraph) => trim((string) $paragraph), $rawPassage), static fn ($paragraph) => $paragraph !== ''))
            : array_values(array_filter(
                array_map('trim', preg_split('/\R{2,}/', trim((string) $rawPassage)) ?: []),
                static fn ($paragraph) => $paragraph !== ''
            ));
        $usePassageCard = $passageParagraphs !== [];
        $images = is_array($content['images'] ?? null) ? array_values($content['images']) : [];
        $questions = is_array($content['questions'] ?? null) ? array_values($content['questions']) : [];

        $accentClass = $isOrangeTheme
            ? 'bg-gradient-to-b from-orange-400 via-orange-500 to-orange-600'
            : 'bg-gradient-to-b from-sky-400 via-indigo-500 to-violet-500';

        $badgeClass = $isOrangeTheme
            ? 'border-orange-200 bg-orange-50 text-orange-700 dark:border-orange-400/20 dark:bg-orange-500/10 dark:text-orange-200'
            : 'border-slate-200 bg-white/80 text-slate-600 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-300';

        $dotClass = $isOrangeTheme
            ? 'bg-gradient-to-br from-orange-400 to-orange-600'
            : 'bg-gradient-to-br from-sky-400 to-indigo-600';

        $dropCapClass = $isOrangeTheme
            ? 'first-letter:text-orange-700 dark:first-letter:text-orange-300'
            : 'first-letter:text-indigo-700 dark:first-letter:text-sky-300';

        $questionNumberClass = trim((string)($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));
    @endphp

    <main class="w-full">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-6xl items-center px-4 py-8 sm:px-8 sm:py-10">
            <section class="w-full">
                <div class="grid items-center gap-8 lg:grid-cols-[0.95fr_1.05fr] lg:gap-12">
                    <div class="order-1 space-y-6 text-center lg:order-2 lg:text-left">
                        @include('slider.components.title-subtitle')

                        @if(count($questions))
                            <div class="grid gap-3 text-left">
                                @foreach($questions as $index => $question)
                                    <div class="reading-question-card rounded-2xl border border-slate-200/80 bg-white/80 p-4 shadow-[0_16px_38px_-30px_rgba(15,23,42,0.26)] backdrop-blur-md dark:border-slate-700/80 dark:bg-slate-900/75 sm:p-5">
                                        <div class="flex items-start gap-3">
                                            <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-xl text-sm font-black text-white shadow-lg shadow-slate-900/10 {{ $questionNumberClass }}">
                                                {{ $index + 1 }}
                                            </span>
                                            <p class="text-sm font-extrabold leading-[1.45] text-slate-800 dark:text-slate-100 sm:text-base">
                                                {!! $question !!}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @elseif(count($images))
                            <div class="flex flex-wrap justify-center gap-4 lg:justify-start">
                                @foreach($images as $index => $img)
                                    @if(!empty($img['html']))
                                        <div class="{{ $img['class'] ?? 'w-full max-w-xl' }}">
                                            {!! $img['html'] !!}
                                        </div>
                                    @elseif(!empty($img['src']))
                                        <div class="aspect-square w-24 overflow-hidden rounded-[36%_64%_41%_59%/57%_37%_63%_43%] shadow-[0_16px_34px_-24px_rgba(15,23,42,0.28)] sm:w-28 lg:w-32">
                                            <img
                                                    src="{{ $img['src'] }}"
                                                    alt="{{ $img['alt'] ?? '' }}"
                                                    class="h-full w-full object-cover"
                                            >
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>

                    @if($usePassageCard)
                        <div id="contentCard" class="order-2 max-h-[76dvh] overflow-auto rounded-[1.65rem] border border-slate-200/80 bg-white/85 p-5 text-left shadow-[0_24px_55px_-42px_rgba(15,23,42,0.22)] backdrop-blur dark:border-slate-700/80 dark:bg-slate-900/80 sm:p-6 lg:order-1">
                            <div class="flex gap-4">
                                <div class="w-1.5 shrink-0 rounded-full {{ $accentClass }}"></div>

                                <div class="min-w-0 flex-1">
                                    <div class="inline-flex items-center gap-2 rounded-full border px-3 py-1.5 text-[0.7rem] font-black uppercase tracking-[0.18em] shadow-sm {{ $badgeClass }}">
                                        <span class="h-2 w-2 rounded-full {{ $dotClass }}"></span>
                                        <span>{{ $passageLabel }}</span>
                                    </div>

                                    @if($passageTitle !== '')
                                        <h2 class="mt-3 max-w-[24ch] text-2xl font-black leading-[1.06] tracking-[-0.05em] text-slate-950 dark:text-slate-50 sm:text-3xl">
                                            {{ $passageTitle }}
                                        </h2>
                                    @endif

                                    <div class="mt-4 grid gap-3">
                                        @foreach($passageParagraphs as $index => $paragraph)
                                            <p class="{{ $index === 0 ? 'first-letter:float-left first-letter:mr-2 first-letter:mt-1 first-letter:text-[2.2rem] first-letter:font-black first-letter:leading-[0.85] ' . $dropCapClass : '' }} text-[0.84rem] font-semibold leading-[1.52] tracking-[-0.012em] text-slate-700 dark:text-slate-200 sm:text-[0.94rem] lg:text-[1rem]">
                                                {!! $paragraph !!}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div id="contentCard" class="order-2 rounded-[28px] border border-slate-200/70 bg-white/70 p-5 shadow-[0_14px_40px_-28px_rgba(15,23,42,0.35)] dark:border-slate-700/40 dark:bg-slate-950/35 sm:p-6 lg:order-1">
                            <div class="space-y-4">
                                @foreach(($content['points'] ?? []) as $point)
                                    <div class="flex items-start gap-3">
                                        @if($showPointDots)
                                            <span class="mt-2 block h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        @endif
                                        <p class="{{ $pointTextClass }}">
                                            {!! $point !!}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        function onReady(fn) {
            if (document.readyState === "loading") {
                document.addEventListener("DOMContentLoaded", fn, { once: true });
            } else {
                fn();
            }
        }

        onReady(() => {
            const titleBlock = document.getElementById("titleBlock");
            const contentCard = document.getElementById("contentCard");
            const imageCards = Array.from(document.querySelectorAll(".reading-question-card"));

            function playIn() {
                if (!window.gsap) return;
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

                const items = [titleBlock, ...imageCards, contentCard].filter(Boolean);
                gsap.killTweensOf(items);
                gsap.set(items, { clearProps: "all" });

                gsap.timeline({ defaults: { ease: "power3.out" } })
                    .from(titleBlock, { opacity: 0, y: 16, duration: 0.7 }, 0.06)
                    .from(imageCards, { opacity: 0, y: 10, scale: 0.96, duration: 0.45, stagger: 0.08 }, 0.16)
                    .from(contentCard, { opacity: 0, y: 16, duration: 0.55 }, 0.22);
            }

            window.resetSlide = playIn;
            playIn();
        });
    </script>
@endsection
