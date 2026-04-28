@extends('slider.simple-layout')

@php
    $content = array_replace_recursive([
        'page_title' => 'Warming Up',
        'title' => 'Warming Up',
        'subtitle' => '',
        'instruction' => 'Choose a paper and answer the question.',
        'box_label' => 'Box',
        'retake_label' => 'Retake',
        'complete_title' => 'All questions opened',
        'complete_subtitle' => 'Great speaking practice.',
        'close_label' => 'Close',
        'grid' => [
            'cols' => [
                'base' => 2,
                'sm' => 3,
                'md' => 4,
                'lg' => 6,
            ],
            'gap' => 'gap-3 sm:gap-4 lg:gap-5',
            'card_height' => 'h-32 sm:h-36 lg:h-40',
        ],
        'sounds' => [
            'open' => materialAsset('slider/sounds/tap.wav'),
            'done' => materialAsset('slider/sounds/correct.wav'),
            'reset' => materialAsset('slider/sounds/click.wav'),
        ],
        'items' => [],
    ], $content ?? []);

    $cols = $content['grid']['cols'];
    $gridCols = "grid-cols-{$cols['base']} sm:grid-cols-{$cols['sm']} md:grid-cols-{$cols['md']} lg:grid-cols-{$cols['lg']}";

    $items = collect($content['items'] ?? [])->map(function ($item) {
        if (is_array($item)) {
            return [
                'question' => (string) ($item['question'] ?? $item['text'] ?? ''),
            ];
        }

        return [
            'question' => (string) $item,
        ];
    })->filter(fn ($item) => trim($item['question']) !== '')->values();

    $tones = ['sun', 'lime', 'sky', 'pink', 'orange', 'violet'];
@endphp

@section('title', $content['page_title'])

@section('style')
    <style>
        [data-warmup-game] {
            --wu-ink: #1f1a36;
        }

        @keyframes wuCardIn {
            0% { opacity: 0; transform: translateY(14px) scale(.96); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes wuCoverAway {
            0% { opacity: 1; transform: translateY(0) rotate(0deg) scale(1); }
            100% { opacity: 0; transform: translateY(-14px) rotate(-3deg) scale(.94); }
        }

        @keyframes wuQuestionIn {
            0% { opacity: .15; transform: scale(.98); }
            100% { opacity: 1; transform: scale(1); }
        }

        @keyframes wuPop {
            0% { opacity: 0; transform: translateY(12px) scale(.97); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        [data-warmup-game] .wu-board {
            border: 1px solid rgba(255, 255, 255, .74);
            background: rgba(255, 255, 255, .38);
            box-shadow: 0 20px 52px rgba(31, 41, 55, .12);
            backdrop-filter: blur(10px);
        }

        [data-warmup-game] .wu-card {
            --wu-accent: #fbbf24;
            --wu-accent-dark: #f59e0b;
            --wu-soft: #fef3c7;
            position: relative;
            isolation: isolate;
            border: 5px solid var(--wu-ink);
            background: linear-gradient(180deg, var(--wu-soft), #fff);
            box-shadow:
                7px 7px 0 rgba(31, 26, 54, .42),
                inset 0 0 0 5px var(--wu-accent);
            animation: wuCardIn .34s cubic-bezier(.2,.8,.2,1) both;
            transition: transform .16s ease, box-shadow .16s ease;
        }

        [data-warmup-game] .wu-card:hover {
            transform: translateY(-4px);
            box-shadow:
                9px 10px 0 rgba(31, 26, 54, .38),
                inset 0 0 0 5px var(--wu-accent);
        }

        [data-warmup-game] .wu-card:focus-visible {
            outline: none;
            box-shadow:
                0 0 0 4px rgba(15, 23, 42, .16),
                7px 7px 0 rgba(31, 26, 54, .42),
                inset 0 0 0 5px var(--wu-accent);
        }

        [data-warmup-game] .wu-card[data-tone="sun"] {
            --wu-accent: #fde047;
            --wu-accent-dark: #f59e0b;
            --wu-soft: #fffbeb;
        }

        [data-warmup-game] .wu-card[data-tone="lime"] {
            --wu-accent: #86efac;
            --wu-accent-dark: #22c55e;
            --wu-soft: #f0fdf4;
        }

        [data-warmup-game] .wu-card[data-tone="sky"] {
            --wu-accent: #67e8f9;
            --wu-accent-dark: #06b6d4;
            --wu-soft: #ecfeff;
        }

        [data-warmup-game] .wu-card[data-tone="pink"] {
            --wu-accent: #f472b6;
            --wu-accent-dark: #db2777;
            --wu-soft: #fdf2f8;
        }

        [data-warmup-game] .wu-card[data-tone="orange"] {
            --wu-accent: #fb923c;
            --wu-accent-dark: #ea580c;
            --wu-soft: #fff7ed;
        }

        [data-warmup-game] .wu-card[data-tone="violet"] {
            --wu-accent: #c4b5fd;
            --wu-accent-dark: #7c3aed;
            --wu-soft: #f5f3ff;
        }

        [data-warmup-game] .wu-question {
            position: absolute;
            inset: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            padding: .7rem;
            background: linear-gradient(180deg, var(--wu-accent), var(--wu-accent-dark));
            color: #111827;
            font-size: clamp(.86rem, 1.3vw, 1.12rem);
            font-weight: 900;
            line-height: 1.15;
            text-align: center;
            opacity: 0;
            transform: scale(.98);
        }

        [data-warmup-game] .wu-card.is-opened .wu-question {
            animation: wuQuestionIn .2s ease both;
        }

        [data-warmup-game] .wu-cover {
            position: absolute;
            inset: 11px;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 4px solid var(--wu-ink);
            border-radius: 13px;
            background: #f8fafc;
            color: #020617;
            box-shadow: inset 0 -5px 0 rgba(15, 23, 42, .06);
            font-size: clamp(1.9rem, 4vw, 3rem);
            font-weight: 900;
            transition: opacity .18s ease, transform .18s ease;
        }

        [data-warmup-game] .wu-cover::after {
            content: "";
            position: absolute;
            right: -4px;
            bottom: -4px;
            width: 29px;
            height: 29px;
            border-top: 4px solid var(--wu-ink);
            border-left: 4px solid var(--wu-ink);
            border-radius: 13px 0 13px 0;
            background: linear-gradient(135deg, #fff 0%, #fff 48%, #e9d5ff 49%, #f8fafc 100%);
        }

        [data-warmup-game] .wu-card.is-opened .wu-cover {
            pointer-events: none;
            animation: wuCoverAway .24s ease forwards;
        }

        [data-warmup-game] .wu-progress {
            border: 2px solid rgba(31, 26, 54, .12);
            background: rgba(255, 255, 255, .78);
            box-shadow: 0 8px 20px rgba(31, 41, 55, .08);
        }

        [data-warmup-game] .wu-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .45rem;
            border-radius: 999px;
            padding: .66rem 1rem;
            border: 2px solid var(--wu-ink);
            background: #fff;
            color: var(--wu-ink);
            font-size: .82rem;
            font-weight: 900;
            box-shadow: 4px 4px 0 rgba(31, 26, 54, .26);
            transition: transform .16s ease, box-shadow .16s ease;
        }

        [data-warmup-game] .wu-btn:hover {
            transform: translateY(-2px);
            box-shadow: 5px 6px 0 rgba(31, 26, 54, .22);
        }

        [data-warmup-game] .wu-btn:active {
            transform: translateY(1px);
            box-shadow: 2px 2px 0 rgba(31, 26, 54, .22);
        }

        [data-warmup-game] .wu-modal-card {
            animation: wuPop .24s cubic-bezier(.2,.8,.2,1) both;
        }

        .dark [data-warmup-game] .wu-board,
        .dark [data-warmup-game] .wu-progress {
            border-color: rgba(255, 255, 255, .12);
            background: rgba(15, 23, 42, .62);
        }

        .dark [data-warmup-game] .wu-question {
            color: #0f172a;
        }

        @media (max-width: 640px) {
            [data-warmup-game] .wu-card {
                border-width: 4px;
                box-shadow:
                    4px 5px 0 rgba(31, 26, 54, .34),
                    inset 0 0 0 4px var(--wu-accent);
            }

            [data-warmup-game] .wu-cover,
            [data-warmup-game] .wu-question {
                inset: 8px;
            }
        }
    </style>
@endsection

@section('content')
    <main data-warmup-game class="min-h-[100dvh] overflow-x-hidden overflow-y-auto">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[96rem] items-center px-4 py-5 sm:px-8 lg:px-10">
            <section class="w-full">
                <div class="grid place-items-center gap-4 text-center">
                    @include('slider.components.title-subtitle')

                    <section class="w-full max-w-[92rem]">
                        <div class="wu-board rounded-[1.75rem] p-4 sm:p-5 lg:p-6">
                            <div class="mb-4 flex flex-wrap items-center justify-between gap-3 text-left">
                                <div class="wu-progress rounded-2xl px-4 py-3">
                                    <p class="text-sm font-black text-slate-950 dark:text-white sm:text-lg">
                                        {{ $content['instruction'] }}
                                    </p>
                                    <p class="mt-1 text-xs font-black text-slate-600 dark:text-slate-300">
                                        <span data-open-count>0</span>/<span>{{ $items->count() }}</span> opened
                                    </p>
                                </div>

                                <button type="button" class="wu-btn" data-reset-warmup>
                                    {{ $content['retake_label'] }}
                                </button>
                            </div>

                            <div class="grid {{ $gridCols }} {{ $content['grid']['gap'] }}">
                                @foreach($items as $index => $item)
                                    @php($tone = $tones[$index % count($tones)])
                                    <button
                                            type="button"
                                            class="wu-card {{ $content['grid']['card_height'] }} rounded-[1.15rem]"
                                            data-warmup-box
                                            data-index="{{ $index }}"
                                            data-tone="{{ $tone }}"
                                            style="animation-delay: {{ $index * .025 }}s"
                                            aria-label="{{ $content['box_label'] }} {{ $index + 1 }}"
                                    >
                                        <span class="wu-question">{{ $item['question'] }}</span>
                                        <span class="wu-cover">{{ $index + 1 }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>

        <div class="fixed inset-0 z-[3000] hidden" data-complete-modal>
            <div class="absolute inset-0 bg-slate-900/45 backdrop-blur-sm dark:bg-black/65"></div>

            <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
                <div class="wu-modal-card w-full max-w-xl rounded-[1.75rem] border-4 border-slate-950 bg-white p-7 text-center shadow-2xl dark:border-slate-200 dark:bg-slate-900">
                    <h2 class="text-3xl font-black text-slate-950 dark:text-white">
                        {{ $content['complete_title'] }}
                    </h2>
                    <p class="mt-2 text-sm font-bold text-slate-500 dark:text-slate-400">
                        {{ $content['complete_subtitle'] }}
                    </p>

                    <div class="mt-6 flex flex-wrap justify-center gap-2">
                        <button type="button" class="wu-btn" data-close-complete>
                            {{ $content['close_label'] }}
                        </button>
                        <button type="button" class="wu-btn" data-reset-warmup>
                            {{ $content['retake_label'] }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const root = document.querySelector('[data-warmup-game]');
            if (!root) return;

            const ITEMS = @json($items);
            const SOUNDS = @json($content['sounds']);

            const state = {
                opened: new Set(),
                completedShown: false,
            };

            const audio = new Audio();
            const boxes = Array.from(root.querySelectorAll('[data-warmup-box]'));
            const openCount = root.querySelector('[data-open-count]');
            const completeModal = root.querySelector('[data-complete-modal]');

            function playSound(key) {
                if (!SOUNDS?.[key]) return;

                try {
                    audio.pause();
                    audio.currentTime = 0;
                    audio.src = SOUNDS[key];
                    audio.play().catch(() => {});
                } catch (error) {}
            }

            function stopAudio() {
                try {
                    audio.pause();
                    audio.currentTime = 0;
                } catch (error) {}
            }

            function updateOpenedCount() {
                if (openCount) openCount.textContent = String(state.opened.size);
            }

            function closeComplete() {
                completeModal?.classList.add('hidden');
            }

            function maybeComplete() {
                if (state.completedShown || state.opened.size !== ITEMS.length) return;

                state.completedShown = true;
                setTimeout(() => {
                    completeModal?.classList.remove('hidden');
                    playSound('done');
                }, 260);
            }

            function openBox(index) {
                if (!ITEMS[index] || state.opened.has(index)) return;

                state.opened.add(index);
                boxes[index]?.classList.add('is-opened');
                boxes[index]?.setAttribute('aria-label', ITEMS[index].question);
                updateOpenedCount();
                playSound('open');
                maybeComplete();
            }

            function resetGame() {
                state.opened.clear();
                state.completedShown = false;
                boxes.forEach((box, index) => {
                    box.classList.remove('is-opened');
                    box.setAttribute('aria-label', `{{ $content['box_label'] }} ${index + 1}`);
                    box.style.animationDelay = `${index * .025}s`;
                });
                updateOpenedCount();
                closeComplete();
                stopAudio();
                //playSound('reset');
            }

            boxes.forEach((box) => {
                box.addEventListener('click', () => {
                    openBox(Number(box.dataset.index));
                });
            });

            root.querySelectorAll('[data-reset-warmup]').forEach((button) => {
                button.addEventListener('click', resetGame);
            });

            root.querySelector('[data-close-complete]')?.addEventListener('click', closeComplete);

            window.stopSlideAudio = stopAudio;
            window.destroySlide = stopAudio;
            window.resetSlide = resetGame;

            updateOpenedCount();
        });
    </script>
@endsection
