@extends('slider.simple-layout')

@php
    $theme = is_array($theme ?? null) ? $theme : [];
    $theme['name'] = trim((string)($theme['name'] ?? '')) !== '' ? $theme['name'] : 'default';

    $content = array_replace_recursive([
        'page_title' => 'Warming Up',
        'title' => 'Warming Up',
        'subtitle' => '',
        'instruction' => 'Choose a paper and answer the question.',
        'box_label' => 'Box',
        'retake_label' => 'Retake',
        'close_label' => 'Close',
        'grid' => [
            'cols' => [
                'base' => 2,
                'sm' => 3,
                'md' => 3,
                'lg' => 3,
            ],
            'gap' => 'gap-3 sm:gap-4 lg:gap-5',
            'card_height' => 'h-36 sm:h-40 md:h-44 lg:h-48',
        ],
        'sounds' => [
            'open' => materialAsset('slider/sounds/tap.wav'),
            'reset' => materialAsset('slider/sounds/click.wav'),
        ],
        'items' => [],
    ], $content ?? []);

    $cols = is_array($content['grid']['cols'] ?? null) ? $content['grid']['cols'] : [];

    $baseCols = (int)($cols['base'] ?? 2);
    $smCols = (int)($cols['sm'] ?? 3);
    $mdCols = (int)($cols['md'] ?? 4);
    $lgCols = (int)($cols['lg'] ?? 6);

    $gridBaseMap = [
        1 => 'grid-cols-1',
        2 => 'grid-cols-2',
        3 => 'grid-cols-3',
        4 => 'grid-cols-4',
        5 => 'grid-cols-5',
        6 => 'grid-cols-6',
    ];

    $gridSmMap = [
        1 => 'sm:grid-cols-1',
        2 => 'sm:grid-cols-2',
        3 => 'sm:grid-cols-3',
        4 => 'sm:grid-cols-4',
        5 => 'sm:grid-cols-5',
        6 => 'sm:grid-cols-6',
    ];

    $gridMdMap = [
        1 => 'md:grid-cols-1',
        2 => 'md:grid-cols-2',
        3 => 'md:grid-cols-3',
        4 => 'md:grid-cols-4',
        5 => 'md:grid-cols-5',
        6 => 'md:grid-cols-6',
    ];

    $gridLgMap = [
        1 => 'lg:grid-cols-1',
        2 => 'lg:grid-cols-2',
        3 => 'lg:grid-cols-3',
        4 => 'lg:grid-cols-4',
        5 => 'lg:grid-cols-5',
        6 => 'lg:grid-cols-6',
    ];

    $gridCols = trim(
        ($gridBaseMap[$baseCols] ?? 'grid-cols-2') . ' ' .
        ($gridSmMap[$smCols] ?? 'sm:grid-cols-3') . ' ' .
        ($gridMdMap[$mdCols] ?? 'md:grid-cols-4') . ' ' .
        ($gridLgMap[$lgCols] ?? 'lg:grid-cols-6')
    );

    $items = collect($content['items'] ?? [])->map(function ($item) {
        if (is_array($item)) {
            return [
                'question' => (string) ($item['question'] ?? $item['text'] ?? ''),
                'image' => (string) ($item['image'] ?? ''),
                'image_alt' => (string) ($item['image_alt'] ?? $item['alt'] ?? $item['question'] ?? $item['text'] ?? ''),
            ];
        }

        return [
            'question' => (string) $item,
            'image' => '',
            'image_alt' => '',
        ];
    })->filter(fn ($item) => trim($item['question']) !== '' || trim($item['image']) !== '')->values();

    $tones = ['butter', 'sage', 'sky', 'rose', 'peach', 'lavender'];

    $toneStyles = [
        'butter' => [
            'outer' => 'bg-amber-100 dark:bg-amber-100/95',
            'surface' => 'from-amber-50 via-white to-amber-100 dark:from-amber-50 dark:via-white dark:to-amber-100',
            'fold' => 'bg-amber-100 dark:bg-amber-100',
            'ring' => 'ring-amber-100/80 dark:ring-amber-100/70',
        ],
        'sage' => [
            'outer' => 'bg-emerald-100 dark:bg-emerald-100/95',
            'surface' => 'from-emerald-50 via-white to-emerald-100 dark:from-emerald-50 dark:via-white dark:to-emerald-100',
            'fold' => 'bg-emerald-100 dark:bg-emerald-100',
            'ring' => 'ring-emerald-100/80 dark:ring-emerald-100/70',
        ],
        'sky' => [
            'outer' => 'bg-sky-100 dark:bg-sky-100/95',
            'surface' => 'from-sky-50 via-white to-sky-100 dark:from-sky-50 dark:via-white dark:to-sky-100',
            'fold' => 'bg-sky-100 dark:bg-sky-100',
            'ring' => 'ring-sky-100/80 dark:ring-sky-100/70',
        ],
        'rose' => [
            'outer' => 'bg-rose-100 dark:bg-rose-100/95',
            'surface' => 'from-rose-50 via-white to-rose-100 dark:from-rose-50 dark:via-white dark:to-rose-100',
            'fold' => 'bg-rose-100 dark:bg-rose-100',
            'ring' => 'ring-rose-100/80 dark:ring-rose-100/70',
        ],
        'peach' => [
            'outer' => 'bg-orange-100 dark:bg-orange-100/95',
            'surface' => 'from-orange-50 via-white to-orange-100 dark:from-orange-50 dark:via-white dark:to-orange-100',
            'fold' => 'bg-orange-100 dark:bg-orange-100',
            'ring' => 'ring-orange-100/80 dark:ring-orange-100/70',
        ],
        'lavender' => [
            'outer' => 'bg-violet-100 dark:bg-violet-100/95',
            'surface' => 'from-violet-50 via-white to-violet-100 dark:from-violet-50 dark:via-white dark:to-violet-100',
            'fold' => 'bg-violet-100 dark:bg-violet-100',
            'ring' => 'ring-violet-100/80 dark:ring-violet-100/70',
        ],
    ];
@endphp

@section('title', $content['page_title'])

@section('content')
    <main data-warmup-game class="min-h-[100dvh] overflow-x-hidden overflow-y-auto font-['Plus_Jakarta_Sans']">
        <div
                class="fixed inset-0 z-[3000] hidden items-center justify-center bg-slate-950/35 p-4 backdrop-blur-sm"
                data-warmup-popup
                aria-hidden="true"
        >
            <button
                    type="button"
                    class="absolute inset-0 cursor-default"
                    data-close-popup
                    aria-label="{{ $content['close_label'] }}"
            ></button>

            <section class="relative w-full max-w-[600px] rounded-[2rem] border-[5px] border-slate-800 bg-white p-3 shadow-[10px_12px_0_rgba(30,41,59,0.18),0_28px_80px_rgba(15,23,42,0.24)] dark:border-slate-700 dark:bg-white dark:shadow-[8px_10px_0_rgba(15,23,42,0.55),0_24px_70px_rgba(15,23,42,0.45)] sm:p-4">
                <button
                        type="button"
                        class="absolute -right-3 -top-3 z-10 flex h-10 w-10 items-center justify-center rounded-full border-[3px] border-slate-800 bg-white text-xl font-black leading-none text-slate-900 shadow-[3px_4px_0_rgba(30,41,59,0.18)] transition hover:-translate-y-0.5"
                        data-close-popup
                        aria-label="{{ $content['close_label'] }}"
                >
                    ×
                </button>

                <div data-popup-panel class="rounded-[1.5rem] bg-gradient-to-br from-slate-50 via-white to-slate-100 p-4 ring-8 ring-slate-100/80 dark:from-slate-50 dark:via-white dark:to-slate-100 dark:ring-slate-100/80 sm:p-5">
                    <div data-popup-image-frame class="hidden h-[230px] w-full overflow-hidden rounded-[1.25rem] border border-white bg-white shadow-sm sm:h-[280px] md:h-[320px]">
                        <img
                                src=""
                                alt=""
                                class="h-full w-full object-cover"
                                draggable="false"
                                data-popup-image
                        >
                    </div>

                    <p data-popup-text class="mt-4 text-center text-2xl font-black leading-[1.08] tracking-[-0.04em] text-slate-950 sm:text-3xl md:text-4xl"></p>
                </div>
            </section>
        </div>

        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[90rem] items-center px-4 py-4 sm:px-6 sm:py-5 lg:px-10 lg:py-6">
            <section class="w-full">
                <div class="grid place-items-center gap-4 text-center sm:gap-5">
                    @include('slider.components.title-subtitle')

                    <section class="w-full max-w-[86rem]">
                        <div class="rounded-[2rem] border border-white/70 bg-white/55 p-3 shadow-[0_24px_70px_-44px_rgba(15,23,42,0.45)] backdrop-blur-md dark:border-white/10 dark:bg-slate-900/62 dark:shadow-[0_24px_70px_-44px_rgba(15,23,42,0.8)] sm:p-4 lg:p-5">
                            <div class="mb-4 flex flex-wrap items-center justify-between gap-3 text-left">
                                <div class="rounded-2xl border border-white/80 bg-white/80 px-4 py-3 shadow-sm backdrop-blur-sm dark:border-white/10 dark:bg-slate-800/80 dark:shadow-none">
                                    <p class="text-sm font-black leading-[1.35] tracking-[-0.01em] text-slate-900 dark:text-white sm:text-base lg:text-lg">
                                        {{ $content['instruction'] }}
                                    </p>
                                    <p class="mt-1 text-xs font-black text-slate-500 dark:text-slate-300 sm:text-sm">
                                        <span data-open-count>0</span>/<span>{{ $items->count() }}</span> opened
                                    </p>
                                </div>

                                <button
                                        type="button"
                                        class="inline-flex items-center justify-center rounded-full border-[3px] border-slate-800 bg-white px-5 py-2.5 text-sm font-black text-slate-900 shadow-[4px_5px_0_rgba(30,41,59,0.18)] transition duration-150 hover:-translate-y-0.5 hover:shadow-[5px_6px_0_rgba(30,41,59,0.16)] active:translate-y-0 active:shadow-[2px_2px_0_rgba(30,41,59,0.16)] dark:border-slate-500/80 dark:bg-slate-700 dark:text-slate-50 dark:shadow-[3px_4px_0_rgba(15,23,42,0.35)] dark:hover:bg-slate-600"
                                        data-reset-warmup
                                >
                                    {{ $content['retake_label'] }}
                                </button>
                            </div>

                            <div class="grid {{ $gridCols }} {{ $content['grid']['gap'] }}">
                                @foreach($items as $index => $item)
                                    @php
                                        $tone = $tones[$index % count($tones)];
                                        $toneStyle = $toneStyles[$tone] ?? $toneStyles['butter'];
                                        $hasImage = trim((string)($item['image'] ?? '')) !== '';
                                        $hasQuestion = trim((string)($item['question'] ?? '')) !== '';
                                    @endphp

                                    <button
                                            type="button"
                                            class="group relative isolate {{ $content['grid']['card_height'] }} overflow-hidden rounded-[1.55rem] border-[5px] border-slate-800 {{ $toneStyle['outer'] }} p-2 text-left shadow-[5px_6px_0_rgba(30,41,59,0.18)] transition duration-150 hover:-translate-y-1 hover:shadow-[6px_8px_0_rgba(30,41,59,0.16)] focus:outline-none focus-visible:ring-4 focus-visible:ring-slate-900/20 dark:border-slate-700 dark:shadow-[5px_6px_0_rgba(15,23,42,0.42)] dark:hover:shadow-[6px_8px_0_rgba(15,23,42,0.36)]"
                                            data-warmup-box
                                            data-index="{{ $index }}"
                                            data-popup-surface="{{ $toneStyle['surface'] }}"
                                            data-popup-ring="{{ $toneStyle['ring'] }}"
                                            aria-label="{{ $content['box_label'] }} {{ $index + 1 }}"
                                    >
                                        <span
                                                class="absolute inset-2 z-10 flex rounded-[1.1rem] bg-gradient-to-br {{ $toneStyle['surface'] }} p-2 opacity-0 scale-[0.98] shadow-inner transition duration-200 ease-out"
                                                data-open-content
                                        >
                                            <span class="flex h-full w-full flex-col items-center justify-center gap-2 overflow-hidden rounded-xl">
                                                @if($hasImage)
                                                    <span class="block h-[58%] w-full shrink-0 overflow-hidden rounded-xl border border-white bg-white shadow-sm">
                                                        <img
                                                                src="{{ $item['image'] }}"
                                                                alt="{{ $item['image_alt'] }}"
                                                                class="h-full w-full object-cover"
                                                                loading="lazy"
                                                                draggable="false"
                                                        >
                                                    </span>
                                                @else
                                                    <span class="hidden h-[58%] w-full shrink-0"></span>
                                                @endif

                                                @if($hasQuestion)
                                                    <span class="flex min-h-0 w-full flex-1 items-center justify-center overflow-hidden px-1 text-center text-[0.74rem] font-black leading-[1.06] tracking-[-0.035em] text-slate-950 sm:text-[0.82rem] md:text-[0.9rem] lg:text-[0.98rem] xl:text-[1.05rem]">
                                                        {{ $item['question'] }}
                                                    </span>
                                                @endif
                                            </span>
                                        </span>

                                        <span
                                                class="absolute inset-2 z-20 flex items-center justify-center overflow-hidden rounded-[1.1rem] border-[3px] border-slate-800 bg-slate-50 text-slate-950 shadow-[inset_0_-5px_0_rgba(15,23,42,0.05)] transition duration-200 ease-out group-hover:bg-white dark:border-slate-700 dark:bg-slate-50 dark:text-slate-950"
                                                data-cover
                                        >
                                            <span class="text-4xl font-black leading-none tracking-[-0.06em] sm:text-5xl lg:text-6xl">
                                                {{ $index + 1 }}
                                            </span>

                                            <span class="absolute bottom-0 right-0 h-10 w-10 overflow-hidden rounded-tl-2xl">
                                                <span class="absolute bottom-0 right-0 h-full w-full rounded-tl-2xl border-l-[3px] border-t-[3px] border-slate-800 bg-white shadow-[-3px_-3px_0_rgba(30,41,59,0.08)] dark:border-slate-700 dark:bg-white"></span>
                                                <span class="absolute -bottom-5 -right-5 h-12 w-12 rotate-45 border border-white/70 {{ $toneStyle['fold'] }} dark:border-white/10"></span>
                                            </span>
                                        </span>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var root = document.querySelector('[data-warmup-game]');
            if (!root) return;

            var ITEMS = @json($items);
            var SOUNDS = @json($content['sounds']);

            var state = {
                opened: {},
                openedCount: 0,
                zoomedIndex: null
            };

            var audio = new Audio();
            var boxes = Array.prototype.slice.call(root.querySelectorAll('[data-warmup-box]'));
            var openCount = root.querySelector('[data-open-count]');
            var popup = root.querySelector('[data-warmup-popup]');
            var popupPanel = root.querySelector('[data-popup-panel]');
            var popupImageFrame = root.querySelector('[data-popup-image-frame]');
            var popupImage = root.querySelector('[data-popup-image]');
            var popupText = root.querySelector('[data-popup-text]');

            var popupPanelBaseClass = 'rounded-[1.5rem] bg-gradient-to-br p-4 ring-8 sm:p-5';
            var popupImageFrameBaseClass = 'h-[230px] w-full overflow-hidden rounded-[1.25rem] border border-white bg-white shadow-sm dark:border-white/10 dark:bg-slate-900 sm:h-[280px] md:h-[320px]';

            function playSound(key) {
                if (!SOUNDS || !SOUNDS[key]) return;

                try {
                    audio.pause();
                    audio.currentTime = 0;
                    audio.src = SOUNDS[key];
                    audio.play().catch(function () {});
                } catch (error) {}
            }

            function stopAudio() {
                try {
                    audio.pause();
                    audio.currentTime = 0;
                } catch (error) {}
            }

            function updateOpenedCount() {
                if (openCount) {
                    openCount.textContent = String(state.openedCount);
                }
            }

            function revealCard(box) {
                var cover = box.querySelector('[data-cover]');
                var content = box.querySelector('[data-open-content]');

                if (content) {
                    content.classList.remove('opacity-0', 'scale-[0.98]');
                    content.classList.add('opacity-100', 'scale-100');
                }

                if (cover) {
                    cover.classList.add('opacity-0', '-translate-y-2', 'scale-95', 'pointer-events-none');
                }
            }

            function hideCard(box) {
                var cover = box.querySelector('[data-cover]');
                var content = box.querySelector('[data-open-content]');

                if (content) {
                    content.classList.add('opacity-0', 'scale-[0.98]');
                    content.classList.remove('opacity-100', 'scale-100');
                }

                if (cover) {
                    cover.classList.remove('opacity-0', '-translate-y-2', 'scale-95', 'pointer-events-none');
                }
            }

            function openPopup(index) {
                if (!ITEMS[index] || !popup) return;

                var item = ITEMS[index];
                var box = boxes[index];
                var surfaceClass = box ? box.getAttribute('data-popup-surface') : 'from-slate-50 via-white to-slate-100';
                var ringClass = box ? box.getAttribute('data-popup-ring') : 'ring-slate-100/80';

                if (popupPanel) {
                    popupPanel.className = popupPanelBaseClass + ' ' + surfaceClass + ' ' + ringClass;
                }

                if (popupText) {
                    popupText.textContent = item.question || '';
                    if (item.question) {
                        popupText.classList.remove('hidden');
                    } else {
                        popupText.classList.add('hidden');
                    }
                }

                if (popupImage && popupImageFrame) {
                    if (item.image) {
                        popupImage.src = item.image;
                        popupImage.alt = item.image_alt || item.question || '';
                        popupImageFrame.className = popupImageFrameBaseClass;
                    } else {
                        popupImage.removeAttribute('src');
                        popupImage.alt = '';
                        popupImageFrame.className = popupImageFrameBaseClass + ' hidden';
                    }
                }

                state.zoomedIndex = index;
                popup.classList.remove('hidden');
                popup.classList.add('flex');
                popup.setAttribute('aria-hidden', 'false');
            }

            function closePopup() {
                if (!popup) return;

                state.zoomedIndex = null;
                popup.classList.add('hidden');
                popup.classList.remove('flex');
                popup.setAttribute('aria-hidden', 'true');
            }

            function openBox(index) {
                if (!ITEMS[index]) return;

                var box = boxes[index];
                if (!box) return;

                if (!state.opened[index]) {
                    state.opened[index] = true;
                    state.openedCount += 1;
                    box.setAttribute('aria-label', ITEMS[index].question || '{{ $content['box_label'] }} ' + (index + 1));
                    revealCard(box);
                    updateOpenedCount();
                    playSound('open');
                }

                openPopup(index);
            }

            function resetGame() {
                state.opened = {};
                state.openedCount = 0;
                state.zoomedIndex = null;

                boxes.forEach(function (box, index) {
                    hideCard(box);
                    box.setAttribute('aria-label', '{{ $content['box_label'] }} ' + (index + 1));
                });

                updateOpenedCount();
                closePopup();
                stopAudio();
            }

            boxes.forEach(function (box) {
                box.addEventListener('click', function () {
                    openBox(Number(box.getAttribute('data-index')));
                });
            });

            var resetButtons = root.querySelectorAll('[data-reset-warmup]');
            Array.prototype.forEach.call(resetButtons, function (button) {
                button.addEventListener('click', resetGame);
            });

            var closeButtons = root.querySelectorAll('[data-close-popup]');
            Array.prototype.forEach.call(closeButtons, function (button) {
                button.addEventListener('click', closePopup);
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    closePopup();
                }
            });

            window.stopSlideAudio = stopAudio;
            window.destroySlide = stopAudio;
            window.resetSlide = resetGame;

            updateOpenedCount();
        });
    </script>
@endsection
