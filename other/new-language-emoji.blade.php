@extends('slider.simple-layout')

@section('title', $content['page_title'] ?? $content['title'] ?? '')

@section('content')
    @php
        $primaryGradient = trim((string)($theme['primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));
        $buttonGradient = trim((string)($theme['button_primary_color'] ?? 'bg-gradient-to-tr from-blue-500 via-indigo-500 to-purple-600'));

        $imageAlt = trim((string)($content['image_alt'] ?? 'Slide image'));
        $playLabel = trim((string)($content['play_label'] ?? 'Play audio'));

        $hideImage = (bool)($content['hide_image'] ?? false);
        $hasImage = !$hideImage && !empty($content['image']);

        $noteLabel = trim((string)($content['note_label'] ?? ''));
        $noteTitle = trim((string)($content['note_title'] ?? ''));

        $rawNoteContent = $content['note_content'] ?? [];

        if (!is_array($rawNoteContent)) {
            $rawNoteContent = trim((string)$rawNoteContent) !== ''
                ? [trim((string)$rawNoteContent)]
                : [];
        }

        $noteParagraphs = array_values(array_filter(
            array_map(static fn ($item) => trim((string)$item), $rawNoteContent),
            static fn ($item) => $item !== ''
        ));

        $hasNoteCard = $noteTitle !== '' || count($noteParagraphs);

        $contentGridClass = trim((string)($content['content_grid_class'] ?? (
            $hasImage
                ? 'grid grid-cols-1 items-center gap-5 md:grid-cols-[minmax(0,1fr)_minmax(240px,340px)] lg:grid-cols-[minmax(0,1fr)_minmax(300px,390px)] xl:grid-cols-[minmax(0,1fr)_minmax(330px,430px)] md:gap-6 lg:gap-8'
                : 'mx-auto grid w-full max-w-5xl grid-cols-1'
        )));

        $itemsGridClass = trim((string)($content['items_grid_class'] ?? (
            $hasImage
                ? 'grid grid-cols-1 gap-3.5 text-left sm:gap-4'
                : 'grid grid-cols-1 gap-3.5 text-left sm:grid-cols-2 sm:gap-4'
        )));

        $itemTextClass = trim((string)($content['item_text_class'] ?? 'text-base sm:text-lg lg:text-xl'));
    @endphp

    <main class="relative min-h-[100dvh] w-full overflow-hidden">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center px-4 py-5 sm:px-6 sm:py-6 lg:px-8">
            <section class="w-full">
                <div class="{{ $contentGridClass }}">
                    <div class="w-full space-y-4 sm:space-y-5">
                        @include('slider.components.title-subtitle')

                        @if($hasNoteCard)
                            <div class="relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white/80 p-4 shadow-[0_16px_34px_-30px_rgba(15,23,42,0.35)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/55 sm:p-5">
                                <div class="absolute inset-y-0 left-0 w-1.5 {{ $primaryGradient }}"></div>

                                <div class="relative pl-2 sm:pl-3">
                                    @if($noteLabel !== '')
                                        <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-slate-200/80 bg-white/85 px-3 py-1.5 text-[0.68rem] font-black uppercase tracking-[0.18em] text-slate-500 shadow-sm dark:border-slate-700/70 dark:bg-slate-950/50 dark:text-slate-300">
                                            <span class="h-2 w-2 rounded-full {{ $buttonGradient }}"></span>
                                            <span>{{ $noteLabel }}</span>
                                        </div>
                                    @endif

                                    @if($noteTitle !== '')
                                        <h2 class="text-lg font-black leading-tight tracking-[-0.03em] text-slate-950 dark:text-slate-50 sm:text-xl">
                                            {!! $noteTitle !!}
                                        </h2>
                                    @endif

                                    @if(count($noteParagraphs))
                                        <div class="mt-2 grid gap-1.5">
                                            @foreach($noteParagraphs as $paragraph)
                                                <p class="text-sm font-extrabold leading-[1.45] text-slate-700 dark:text-slate-200 sm:text-base">
                                                    {!! $paragraph !!}
                                                </p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <section id="cards" class="w-full">
                            <div class="{{ $itemsGridClass }}">
                                @foreach($content['items'] ?? [] as $item)
                                    @php
                                        $itemSound = trim((string)($item['sound'] ?? ''));
                                    @endphp

                                    <article class="rounded-2xl border border-slate-200/75 bg-white/80 p-3.5 text-left shadow-[0_14px_30px_-28px_rgba(15,23,42,0.38)] backdrop-blur-xl transition duration-200 hover:-translate-y-0.5 hover:shadow-[0_20px_40px_-32px_rgba(15,23,42,0.45)] dark:border-slate-700/55 dark:bg-slate-900/55 sm:p-4">
                                        <div class="flex items-center gap-3 sm:gap-3.5">
                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-slate-200/80 bg-slate-50 text-xl shadow-sm dark:border-slate-700/70 dark:bg-slate-950/45 sm:h-11 sm:w-11 sm:text-2xl">
                                                {{ $item['emoji'] ?? '🎉' }}
                                            </div>

                                            <div class="min-w-0 flex-1">
                                                <div class="{{ $itemTextClass }} font-black leading-snug tracking-[-0.025em] text-slate-900 dark:text-slate-50">
                                                    {!! $item['text'] ?? '' !!}
                                                </div>
                                            </div>

                                            @if($itemSound !== '')
                                                <button
                                                        type="button"
                                                        class="audio-btn inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full {{ $buttonGradient }} text-white shadow-lg shadow-slate-900/15 ring-1 ring-white/25 transition hover:scale-105 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-slate-300/40 dark:shadow-black/25 sm:h-10 sm:w-10"
                                                        aria-label="{{ $playLabel }}"
                                                        data-sound="{{ $itemSound }}"
                                                >
                                                    <svg class="js-static-icon h-4 w-4 sm:h-5 sm:w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                        <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                    </svg>

                                                    <span class="js-wave-wrap hidden items-center gap-0.5" aria-hidden="true">
                                                        <span class="h-1.5 w-[2px] animate-pulse rounded-full bg-current"></span>
                                                        <span class="h-3.5 w-[2px] animate-pulse rounded-full bg-current [animation-delay:120ms]"></span>
                                                        <span class="h-2.5 w-[2px] animate-pulse rounded-full bg-current [animation-delay:240ms]"></span>
                                                    </span>
                                                </button>
                                            @endif
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </section>
                    </div>

                    @if($hasImage)
                        <div class="mx-auto w-full max-w-[320px] sm:max-w-[380px] md:max-w-none">
                            <div class="overflow-hidden rounded-[28px] border border-white/70 bg-white/65 p-2 shadow-[0_22px_50px_-38px_rgba(15,23,42,0.5)] backdrop-blur-xl dark:border-white/10 dark:bg-white/5">
                                <img
                                        src="{{ $content['image'] }}"
                                        alt="{{ $imageAlt }}"
                                        class="block aspect-[5/6] w-full rounded-[22px] object-cover"
                                        loading="lazy"
                                        draggable="false"
                                />
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
        (function () {
            const KEY = "__BEC_GLOBAL_SLIDER_AUDIO__";

            if (!window[KEY]) {
                const audio = new Audio();
                audio.preload = "auto";
                audio.crossOrigin = "anonymous";

                let activeButton = null;

                function setPlaying(button, isPlaying) {
                    if (!button) return;

                    button.querySelector(".js-static-icon")?.classList.toggle("hidden", isPlaying);
                    button.querySelector(".js-wave-wrap")?.classList.toggle("hidden", !isPlaying);
                    button.querySelector(".js-wave-wrap")?.classList.toggle("flex", isPlaying);
                }

                function clearActive() {
                    if (activeButton) {
                        setPlaying(activeButton, false);
                        activeButton = null;
                    }
                }

                function stop() {
                    try {
                        audio.pause();
                        audio.currentTime = 0;
                    } catch (e) {}

                    clearActive();
                }

                function play(src, button) {
                    if (!src) return;

                    const resolved = new URL(src, window.location.href).toString();

                    if (activeButton === button && !audio.paused && audio.src === resolved) {
                        stop();
                        return;
                    }

                    stop();

                    try {
                        if (audio.src !== resolved) audio.src = resolved;

                        audio.currentTime = 0;
                        activeButton = button;
                        setPlaying(activeButton, true);

                        const promise = audio.play();

                        if (promise && typeof promise.catch === "function") {
                            promise.catch(() => stop());
                        }
                    } catch (e) {
                        stop();
                    }
                }

                audio.addEventListener("ended", stop);
                audio.addEventListener("pause", () => {
                    if (audio.currentTime === 0 || audio.ended) {
                        clearActive();
                    }
                });
                audio.addEventListener("error", stop);

                window[KEY] = { audio, play, stop };
            }

            window.stopSlideAudio = function () {
                window[KEY].stop();
            };

            if (!window.__BEC_AUDIO_DELEGATE__) {
                window.__BEC_AUDIO_DELEGATE__ = true;

                document.addEventListener("click", (event) => {
                    const button = event.target.closest(".audio-btn");
                    if (!button) return;

                    event.preventDefault();

                    const src = button.dataset.sound || button.getAttribute("data-sound") || "";
                    window[KEY].play(src, button);
                });
            }
        })();

        window.resetSlide = function () {};
    </script>
@endsection