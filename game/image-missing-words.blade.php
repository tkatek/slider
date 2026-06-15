@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = $content['page_title'] ?? 'Slide';
    $title = $content['title'] ?? '';
    $subtitle = $content['subtitle'] ?? '';
    $items = is_array($content['items'] ?? null) ? $content['items'] : [];
    $squareImages = !empty($content['square_images']);
    $imageAspectRatio = trim((string) ($content['image_aspect_ratio'] ?? ''));
    $playerAudio = !empty($content['audio']) ? $content['audio'] : null;

    $normalizeScriptLines = static function ($rawScript) {
        return is_array($rawScript)
            ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawScript), static fn ($line) => $line !== ''))
            : array_values(array_filter(
                array_map('trim', preg_split('/(?<=[.!?])\s+/', trim((string) $rawScript)) ?: []),
                static fn ($line) => $line !== ''
            ));
    };

    $scriptLines = $normalizeScriptLines($content['script'] ?? []);
    $hasScript = $scriptLines !== [];

    $normalizeWordBank = static function ($rawWordBank) {
        if (is_string($rawWordBank)) {
            $rawWordBank = preg_split('/\s*(?:,|;|\||\/|–|—|-)\s*/u', $rawWordBank) ?: [];
        }

        if (!is_array($rawWordBank)) {
            return [];
        }

        $words = array_map(static function ($word) {
            if (is_array($word)) {
                $word = $word['text'] ?? $word['label'] ?? $word['word'] ?? '';
            }

            return trim((string) $word);
        }, $rawWordBank);

        return array_values(array_unique(array_filter($words, static fn ($word) => $word !== '')));
    };

    $wordBank = $normalizeWordBank($content['word_bank'] ?? $content['words'] ?? []);
    $wordBankSourceText = null;

    if ($wordBank === [] && $subtitle !== '') {
        preg_match_all('/\(([^()]*(?:,|;|\||\/|–|—|-)[^()]*)\)/u', $subtitle, $wordBankMatches);

        if (!empty($wordBankMatches[1])) {
            $lastBankIndex = array_key_last($wordBankMatches[1]);
            $candidateWordBank = $normalizeWordBank($wordBankMatches[1][$lastBankIndex] ?? '');

            if (count($candidateWordBank) >= 3) {
                $wordBank = $candidateWordBank;
                $wordBankSourceText = $wordBankMatches[0][$lastBankIndex] ?? null;
            }
        }
    }

    if ($wordBank !== [] && $wordBankSourceText && ($content['separate_word_bank_from_subtitle'] ?? true)) {
        $subtitle = preg_replace('/\s*:?\s*' . preg_quote($wordBankSourceText, '/') . '\s*/u', ' ', $subtitle, 1) ?? $subtitle;
        $subtitle = trim(preg_replace('/\s{2,}/u', ' ', $subtitle) ?? $subtitle);
    }

    $showWordBank = $wordBank !== [] && ($content['show_word_bank'] ?? true);
    $storageKey = 'missing-word-game-' . md5(request()->path());
    $checkButtonClass = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));
    $defaultCardFlexClass = 'flex-[1_1_355px] max-w-[640px]';
    $cardFlexClass = trim((string) ($content['card_flex_class'] ?? $content['flex_class'] ?? $defaultCardFlexClass));
    $imageFrameClass = $squareImages ? 'aspect-square' : 'aspect-[4/3]';

    if (!$squareImages && $imageAspectRatio !== '') {
        $imageFrameClass = match (preg_replace('/\s+/', '', $imageAspectRatio)) {
            '3/2' => 'aspect-[3/2]',
            '4/3' => 'aspect-[4/3]',
            '16/9' => 'aspect-video',
            '1/1' => 'aspect-square',
            default => $imageFrameClass,
        };
    }

    $defaultImageWidthClass = $squareImages
        ? 'w-[112px] sm:w-[136px] lg:w-[148px] xl:w-[156px]'
        : 'w-[124px] sm:w-[148px] lg:w-[160px] xl:w-[168px]';
    $imageWidthClass = trim((string) ($content['image_width_class'] ?? $defaultImageWidthClass));
@endphp

@section('title', $pageTitle)

@section('content')
    <div class="min-h-[100dvh] w-full overflow-x-hidden font-sans">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1440px] items-center justify-center px-3 pb-4 pt-3 sm:px-4 sm:pb-5 sm:pt-4">
            <main class="w-full">
                @include('slider.components.title-subtitle')

                @include('slider.components.game-status')

                @if(!empty($playerAudio))
                    <div class="mx-auto mb-4 mt-3 max-w-4xl px-1 sm:px-0">
                        @include('slider.components.audio-player')
                    </div>
                @endif

                <div class="mx-auto mb-3 flex w-full max-w-[1360px] flex-col items-center justify-center gap-2.5 px-1 sm:flex-row sm:items-center {{ $showWordBank ? 'sm:justify-between' : 'sm:justify-center' }} sm:px-0">
                    @if($showWordBank)
                        <div class="flex min-w-0 flex-1 flex-wrap items-center justify-center gap-1.5 rounded-2xl border border-slate-200/80 bg-white/85 px-2.5 py-2 shadow-[0_14px_34px_-30px_rgba(15,23,42,0.32)] backdrop-blur-md dark:border-slate-700/80 dark:bg-slate-900/75 sm:justify-start sm:px-3">
                            @foreach($wordBank as $word)
                                <span class="inline-flex items-center justify-center rounded-full border border-orange-200 bg-orange-50 px-3 py-1.5 text-[0.76rem] font-black leading-none text-orange-700 shadow-sm dark:border-orange-700/60 dark:bg-orange-950/35 dark:text-orange-200 sm:text-[0.82rem]">
                                    {{ $word }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <div class="flex shrink-0 flex-wrap items-center justify-center gap-2.5">
                        <button type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-orange-300 bg-orange-50 px-3.5 py-2 text-[0.74rem] font-black text-orange-800 shadow-[0_8px_22px_-18px_rgba(234,88,12,0.42)] transition duration-200 hover:scale-105 hover:bg-orange-100 active:scale-95 dark:border-orange-700/60 dark:bg-orange-950/40 dark:text-orange-200 dark:hover:bg-orange-900/50" id="btnRevealAnswers">Reveal answers</button>
                        <button type="button" class="hidden inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-3.5 py-2 text-[0.74rem] font-black text-slate-900 shadow-[0_8px_22px_-18px_rgba(2,6,23,0.35)] transition duration-200 hover:scale-105 hover:bg-slate-50 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800" id="btnRetakeTest">Retake test</button>
                        <button type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/20 px-3.5 py-2 text-[0.74rem] font-black text-white shadow-[0_10px_24px_-18px_rgba(79,70,229,0.45)] transition duration-200 hover:scale-105 hover:shadow-[0_12px_28px_-18px_rgba(59,130,246,0.55)] active:scale-95 {{ $checkButtonClass }}" id="checkAnswersBtn">Check Answers</button>
                    </div>
                </div>

                <section class="word-grid mx-auto flex w-full max-w-[1360px] flex-wrap items-stretch justify-center gap-2.5 sm:gap-3">
                    @foreach($items as $index => $item)
                        @php
                            $parts = $item['parts'] ?? null;

                            if (!is_array($parts)) {
                                $parts = [];

                                if (($item['prefix'] ?? '') !== '') {
                                    $parts[] = ['text' => $item['prefix']];
                                }

                                $parts[] = ['answer' => (string) ($item['answer'] ?? '')];

                                if (($item['suffix'] ?? '') !== '') {
                                    $parts[] = ['text' => $item['suffix']];
                                }
                            }

                            $normalizedParts = [];
                            $pendingHint = null;

                            foreach ($parts as $part) {
                                if (!is_array($part)) {
                                    continue;
                                }

                                if (array_key_exists('hint', $part) && !array_key_exists('answer', $part) && !array_key_exists('text', $part)) {
                                    $lastPartIndex = count($normalizedParts) - 1;

                                    if ($lastPartIndex >= 0 && array_key_exists('answer', $normalizedParts[$lastPartIndex])) {
                                        $normalizedParts[$lastPartIndex]['placeholder'] = $normalizedParts[$lastPartIndex]['placeholder'] ?? $part['hint'];
                                    } else {
                                        $pendingHint = $part['hint'];
                                    }

                                    continue;
                                }

                                if (array_key_exists('answer', $part) && $pendingHint !== null) {
                                    $part['placeholder'] = $part['placeholder'] ?? $part['hint'] ?? $pendingHint;
                                    $pendingHint = null;
                                }

                                $normalizedParts[] = $part;
                            }

                            $parts = $normalizedParts;
                            $imageFit = strtolower(trim((string) ($item['image_fit'] ?? $content['image_fit'] ?? 'cover')));
                            $imageFitClass = $imageFit === 'contain' ? 'object-contain p-1.5' : 'object-cover';
                            $itemKeySource = json_encode([
                                $item['id'] ?? '',
                                $item['image'] ?? '',
                                $item['name'] ?? '',
                                $item['prefix'] ?? '',
                                $item['answer'] ?? '',
                                $item['suffix'] ?? '',
                            ], JSON_UNESCAPED_UNICODE);
                            $itemStorageKey = md5($itemKeySource ?: (string) $index);
                        @endphp

                        <article
                                role="button"
                                tabindex="0"
                                aria-label="Open card"
                                data-card-key="{{ $itemStorageKey }}"
                                data-image="{{ $item['image'] ?? '' }}"
                                data-image-alt="{{ $item['name'] ?? ($item['prefix'] ?? ('Item ' . ($item['number'] ?? ($index + 1)))) }}"
                                class="word-card group {{ $cardFlexClass }} flex min-h-[132px] cursor-pointer flex-row items-stretch gap-2.5 rounded-2xl border border-slate-200/90 bg-white/95 p-2.5 shadow-[0_14px_34px_-26px_rgba(15,23,42,0.24)] outline-none transition duration-200 hover:-translate-y-0.5 hover:border-indigo-300/60 hover:shadow-[0_20px_44px_-30px_rgba(37,99,235,0.36)] focus-visible:ring-4 focus-visible:ring-indigo-500/20 dark:border-slate-700/80 dark:bg-slate-900/90 dark:focus-visible:ring-indigo-400/20 sm:min-h-[148px] sm:gap-3 sm:p-3"
                        >
                            @if(!empty($item['image']))
                                <div class="relative flex {{ $imageWidthClass }} shrink-0 items-center justify-center overflow-hidden rounded-2xl border border-indigo-100 bg-slate-100 shadow-inner dark:border-indigo-400/20 dark:bg-slate-800/70 {{ $imageFrameClass }}">
                                    <img
                                            src="{{ $item['image'] }}"
                                            alt="{{ $item['name'] ?? ('Item ' . ($item['number'] ?? ($index + 1))) }}"
                                            loading="lazy"
                                            class="h-full w-full {{ $imageFitClass }} transition duration-300 group-hover:scale-[1.03]"
                                    />

                                    <span class="pointer-events-none absolute bottom-1.5 left-1.5 inline-flex h-7 w-7 items-center justify-center rounded-full border border-white/70 bg-slate-950/35 text-white shadow-[0_10px_20px_-14px_rgba(15,23,42,0.8)] backdrop-blur-md" aria-hidden="true">
                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                                            <path d="M21 21l-4.35-4.35m1.1-5.15a6.25 6.25 0 11-12.5 0 6.25 6.25 0 0112.5 0z"/>
                                            <path d="M11.5 8.5v6M8.5 11.5h6"/>
                                        </svg>
                                    </span>

                                    @if(!empty($item['sound']))
                                        <div class="absolute right-1.5 top-1.5 z-10">
                                            <button
                                                    type="button"
                                                    class="speak-btn cursor-pointer bg-transparent p-0 focus-visible:outline-none"
                                                    aria-label="Play Audio"
                                                    data-audio="{{ $item['sound'] }}"
                                            >
                                                <span class="js-speak-shell inline-flex h-8 w-8 items-center justify-center rounded-full border border-white/60 bg-slate-950/30 text-white shadow-[0_12px_24px_-18px_rgba(15,23,42,0.8)] backdrop-blur-md transition duration-150 hover:scale-105 hover:bg-slate-950/40 sm:h-9 sm:w-9">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                        <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <div class="flex min-w-0 flex-1 items-center">
                                <div class="js-card-sentence flex w-full min-w-0 flex-wrap items-center gap-x-1.5 gap-y-2.5 text-[0.9rem] font-extrabold leading-[1.45] text-slate-900 [overflow-wrap:anywhere] dark:text-slate-50 sm:text-[0.98rem] lg:text-[1rem]">
                                    @php $inputCounter = 0; @endphp

                                    @foreach($parts as $part)
                                        @if(array_key_exists('text', $part))
                                            <span class="js-card-text-part min-w-0 max-w-full flex-none whitespace-pre-wrap tracking-[0.005em] [overflow-wrap:anywhere]">{{ $part['text'] }}</span>
                                        @endif

                                        @if(array_key_exists('answer', $part))
                                            @php
                                                $fieldId = 'missing-word-' . $itemStorageKey . '-' . $inputCounter;
                                                $answerValue = (string) $part['answer'];
                                                $maxLength = max(1, mb_strlen((string) $part['answer']));
                                                $inputWidthCh = min(18, max($maxLength <= 2 ? 4.5 : 7, $maxLength + 2));
                                                $placeholder = (string) ($part['placeholder'] ?? $part['hint'] ?? $item['placeholder'] ?? $item['hint'] ?? '');
                                            @endphp

                                            <input
                                                    id="{{ $fieldId }}"
                                                    type="text"
                                                    class="js-word-input h-8 min-w-[4ch] max-w-[18ch] shrink-0 rounded-none border-0 border-b-[3px] border-dashed border-indigo-600 bg-indigo-50/50 px-1 text-center text-[0.88rem] font-black leading-none text-indigo-800 outline-none transition duration-150 placeholder:text-[0.64rem] placeholder:font-black placeholder:uppercase placeholder:tracking-[0.10em] placeholder:text-indigo-400/70 focus:ring-4 focus:ring-indigo-500/10 dark:border-indigo-300 dark:bg-indigo-950/30 dark:text-indigo-100 dark:placeholder:text-indigo-200/45 sm:h-9 sm:text-[0.94rem]"
                                                    style="width: {{ $inputWidthCh }}ch; min-width: {{ $inputWidthCh }}ch; max-width: 18ch;"
                                                    maxlength="{{ $maxLength }}"
                                                    placeholder="{{ $placeholder }}"
                                                    data-key="{{ $itemStorageKey }}-{{ $inputCounter }}"
                                                    data-group="{{ $index }}"
                                                    data-answer="{{ $answerValue }}"
                                                    autocomplete="off"
                                                    autocapitalize="none"
                                                    spellcheck="false"
                                            />

                                            @php $inputCounter++; @endphp
                                        @endif
                                    @endforeach

                                    <span class="js-word-result inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full text-lg font-black leading-none" aria-live="polite"></span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </section>

                <div
                        id="wordCardFocusOverlay"
                        class="pointer-events-none invisible fixed inset-0 z-[120] flex items-end justify-center bg-slate-950/70 px-3 py-3 opacity-0 backdrop-blur-md transition-opacity duration-200 ease-out sm:items-center sm:px-5 sm:py-6"
                        aria-hidden="true"
                >
                    <article
                            id="wordCardFocusPanel"
                            role="dialog"
                            aria-modal="true"
                            aria-labelledby="wordCardFocusTitle"
                            class="relative w-full max-w-[62rem] translate-y-4 scale-95 overflow-hidden rounded-[1.8rem] border border-white/75 bg-white shadow-2xl shadow-slate-950/30 transition-transform duration-200 ease-out dark:border-white/10 dark:bg-slate-950 sm:rounded-[2rem]"
                    >
                        <button
                                id="wordCardFocusClose"
                                type="button"
                                class="absolute right-3 top-3 z-20 inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-slate-600 shadow-lg ring-1 ring-slate-200/80 backdrop-blur transition hover:bg-slate-950 hover:text-white focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-300/35 dark:bg-slate-900/90 dark:text-slate-200 dark:ring-slate-700/80 dark:hover:bg-white dark:hover:text-slate-950"
                                aria-label="Close"
                        >
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M6 6l12 12M18 6L6 18"/>
                            </svg>
                        </button>

                        <div class="max-h-[88dvh] overflow-y-auto p-3 sm:p-4">
                            <div class="flex flex-col gap-4 md:flex-row md:items-stretch">
                                <div id="wordCardFocusImageWrap" class="relative flex w-full items-center justify-center overflow-hidden rounded-[1.45rem] border border-slate-200 bg-slate-100 shadow-inner dark:border-slate-700 dark:bg-slate-800 md:w-[46%] {{ $imageFrameClass }}">
                                    <img id="wordCardFocusImage" src="" alt="" class="h-full w-full object-cover">
                                </div>

                                <div class="flex min-w-0 flex-1 flex-col justify-center rounded-[1.45rem] border border-slate-200/80 bg-slate-50/80 px-4 py-5 dark:border-slate-700/80 dark:bg-slate-900/70 sm:px-5 sm:py-6">
                                    <p id="wordCardFocusTitle" class="mb-3 text-xs font-black uppercase tracking-[0.18em] text-slate-400 dark:text-slate-500">Answer</p>

                                    <div id="wordCardFocusSentence" class="flex min-w-0 flex-wrap items-center gap-x-2 gap-y-3 text-[1.15rem] font-black leading-[1.55] text-slate-900 [overflow-wrap:anywhere] dark:text-slate-50 sm:text-[1.35rem]"></div>

                                    <div class="mt-5 flex flex-wrap items-center justify-center gap-2.5 sm:justify-start">
                                        <button
                                                id="wordCardFocusAudio"
                                                type="button"
                                                class="speak-btn hidden items-center justify-center gap-2 rounded-xl border border-indigo-200 bg-indigo-50 px-3.5 py-2 text-sm font-black text-indigo-700 shadow-sm transition hover:bg-indigo-100 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-300/25 dark:border-indigo-700/60 dark:bg-indigo-950/35 dark:text-indigo-200 dark:hover:bg-indigo-900/45"
                                                aria-label="Play Audio"
                                                data-audio=""
                                        >
                                            <span class="js-speak-shell inline-flex h-6 w-6 items-center justify-center rounded-full bg-indigo-600 text-white dark:bg-indigo-400 dark:text-slate-950">
                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                </svg>
                                            </span>
                                            Audio
                                        </button>

                                        <button
                                                id="wordCardFocusDone"
                                                type="button"
                                                class="inline-flex items-center justify-center rounded-xl border border-white/20 px-4 py-2 text-sm font-black text-white shadow-[0_12px_26px_-18px_rgba(79,70,229,0.5)] transition hover:scale-105 active:scale-95 {{ $checkButtonClass }}"
                                        >
                                            Done
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const storageKey = @json($storageKey);
            const inputs = Array.from(document.querySelectorAll('.js-word-input'));
            const cards = Array.from(document.querySelectorAll('.word-card'));
            const answerCards = cards.filter((card) => card.querySelector('.js-word-input'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const btnRevealAnswers = document.getElementById('btnRevealAnswers');
            const btnRetakeTest = document.getElementById('btnRetakeTest');
            const progressCountEl = document.getElementById('tilesCount');
            const correctCountEl = document.getElementById('correctCount');
            const mistakesCountEl = document.getElementById('mistakesCount');
            const timerEl = document.getElementById('gameTimer');
            const focusOverlay = document.getElementById('wordCardFocusOverlay');
            const focusPanel = document.getElementById('wordCardFocusPanel');
            const focusClose = document.getElementById('wordCardFocusClose');
            const focusDone = document.getElementById('wordCardFocusDone');
            const focusImageWrap = document.getElementById('wordCardFocusImageWrap');
            const focusImage = document.getElementById('wordCardFocusImage');
            const focusSentence = document.getElementById('wordCardFocusSentence');
            const focusAudioBtn = document.getElementById('wordCardFocusAudio');
            let activePopupCard = null;
            let lastFocusedElement = null;
            let popupCloseTimer = null;
            const popupInputsByKey = new Map();

            const audio = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav')
            };
            const vocabAudio = new Audio();
            vocabAudio.preload = 'auto';
            vocabAudio.crossOrigin = 'anonymous';
            let currentAudioBtn = null;
            let currentAudioCard = null;
            let currentAudioSrc = '';

            Object.values(audio).forEach((sound) => {
                sound.preload = 'auto';
                sound.volume = 1;
            });

            const play = (sound) => {
                if (!sound) return;
                try {
                    sound.pause();
                    sound.currentTime = 0;
                    sound.play().catch(() => {});
                } catch (e) {}
            };

            const inputBaseClasses = [
                'border-indigo-600', 'bg-indigo-50/50', 'text-indigo-800',
                'dark:border-indigo-300', 'dark:bg-indigo-950/30', 'dark:text-indigo-100'
            ];
            const inputCorrectClasses = [
                'border-emerald-500', 'bg-emerald-50/70', 'text-emerald-800',
                'dark:border-emerald-300', 'dark:bg-emerald-950/30', 'dark:text-emerald-200'
            ];
            const inputWrongClasses = [
                'border-rose-500', 'bg-rose-50/70', 'text-rose-800',
                'dark:border-rose-300', 'dark:bg-rose-950/30', 'dark:text-rose-200'
            ];
            const resultStateClasses = ['text-emerald-600', 'text-rose-600', 'dark:text-emerald-300', 'dark:text-rose-300'];

            const setInputState = (input, state = 'base') => {
                input.classList.remove(...inputBaseClasses, ...inputCorrectClasses, ...inputWrongClasses);
                input.classList.add(...(state === 'correct' ? inputCorrectClasses : state === 'wrong' ? inputWrongClasses : inputBaseClasses));
            };

            const setResultState = (result, state = 'base') => {
                if (!result) return;
                result.classList.remove(...resultStateClasses);

                if (state === 'correct') {
                    result.classList.add('text-emerald-600', 'dark:text-emerald-300');
                } else if (state === 'wrong') {
                    result.classList.add('text-rose-600', 'dark:text-rose-300');
                }
            };

            const setAudioBtnState = (btn, isPlaying) => {
                const shell = btn?.querySelector('.js-speak-shell');
                if (!shell) return;
                shell.classList.toggle('scale-105', isPlaying);
                shell.classList.toggle('bg-indigo-600/70', isPlaying);
                shell.classList.toggle('shadow-indigo-900/30', isPlaying);
            };

            const setAudioCardState = (card, isPlaying) => {
                if (!card) return;
                card.classList.toggle('ring-2', isPlaying);
                card.classList.toggle('ring-indigo-500/30', isPlaying);
                card.classList.toggle('dark:ring-indigo-400/20', isPlaying);
            };

            const resetCurrentAudio = () => {
                if (currentAudioBtn) setAudioBtnState(currentAudioBtn, false);
                if (currentAudioCard) setAudioCardState(currentAudioCard, false);
                currentAudioBtn = null;
                currentAudioCard = null;
                currentAudioSrc = '';
            };

            const stopVocabAudio = () => {
                try {
                    vocabAudio.pause();
                    vocabAudio.currentTime = 0;
                    vocabAudio.removeAttribute('src');
                    vocabAudio.load();
                } catch (e) {}

                resetCurrentAudio();
            };

            const playOrToggleVocabAudio = (btn) => {
                const src = btn.getAttribute('data-audio') || '';
                const card = btn.closest('.word-card');
                if (!src) return;

                if (currentAudioSrc === src && !vocabAudio.paused) {
                    stopVocabAudio();
                    return;
                }

                stopVocabAudio();
                window.stopAudioPlayer?.();

                currentAudioBtn = btn;
                currentAudioCard = card;
                currentAudioSrc = src;

                setAudioBtnState(currentAudioBtn, true);
                setAudioCardState(currentAudioCard, true);

                try {
                    vocabAudio.src = src;
                    vocabAudio.currentTime = 0;
                    const playPromise = vocabAudio.play();
                    if (playPromise && typeof playPromise.catch === 'function') {
                        playPromise.catch(() => stopVocabAudio());
                    }
                } catch (e) {
                    stopVocabAudio();
                }
            };

            let savedData = {};
            let isRevealed = false;
            let wrongTries = 0;
            let startTime = Date.now();
            let timerInt = null;

            try {
                const rawSavedData = JSON.parse(localStorage.getItem(storageKey) || '{}') || {};

                if (rawSavedData && typeof rawSavedData === 'object' && rawSavedData.values && typeof rawSavedData.values === 'object') {
                    savedData = rawSavedData.values || {};
                    isRevealed = Boolean(rawSavedData.revealed);
                } else {
                    savedData = rawSavedData;
                }
            } catch (e) {
                savedData = {};
                isRevealed = false;
            }

            const saveAll = () => {
                const payload = {};
                inputs.forEach((input) => {
                    payload[input.dataset.key] = input.value || '';
                });

                localStorage.setItem(storageKey, JSON.stringify({
                    values: payload,
                    revealed: isRevealed
                }));
            };

            const normalizeValue = (value) => {
                return String(value || '')
                    .replace(/[\u2018\u2019]/g, "'")
                    .replace(/[\u201c\u201d]/g, '"')
                    .replace(/\s+/g, ' ')
                    .trim()
                    .toUpperCase();
            };

            const formatTime = (seconds) => {
                if (!isFinite(seconds) || seconds < 0) seconds = 0;
                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
            };

            const updateTimer = () => {
                if (!timerEl) return;
                timerEl.textContent = formatTime((Date.now() - startTime) / 1000);
            };

            const stopTimer = () => {
                clearInterval(timerInt);
                timerInt = null;
            };

            const startTimer = () => {
                stopTimer();
                updateTimer();
                timerInt = setInterval(updateTimer, 1000);
            };

            const clearCardFeedback = (card) => {
                const cardInputs = Array.from(card.querySelectorAll('.js-word-input'));
                const result = card.querySelector('.js-word-result');

                cardInputs.forEach((input) => {
                    setInputState(input);
                });

                if (result) {
                    result.textContent = '';
                    setResultState(result);
                }
            };

            const isCardCorrect = (card) => {
                const cardInputs = Array.from(card.querySelectorAll('.js-word-input'));
                if (!cardInputs.length) return false;

                return cardInputs.every((input) => {
                    const userValue = normalizeValue(input.value);
                    const correctValue = normalizeValue(input.dataset.answer);
                    return userValue !== '' && userValue === correctValue;
                });
            };

            const getCorrectTotal = () => {
                return answerCards.filter((card) => isCardCorrect(card)).length;
            };

            const updateStatusUI = () => {
                const correctTotal = getCorrectTotal();
                const totalCards = answerCards.length;

                if (progressCountEl) progressCountEl.textContent = `${correctTotal}/${totalCards}`;
                if (correctCountEl) correctCountEl.textContent = String(correctTotal);
                if (mistakesCountEl) mistakesCountEl.textContent = String(wrongTries);
            };

            const updateActionButtons = ({ revealed = false } = {}) => {
                if (btnRevealAnswers) {
                    btnRevealAnswers.classList.toggle('hidden', revealed);
                }
                if (btnRetakeTest) {
                    btnRetakeTest.classList.toggle('hidden', !revealed);
                }
            };

            const revealAnswers = ({ persist = true, playSound = true } = {}) => {
                cards.forEach((card) => {
                    const cardInputs = Array.from(card.querySelectorAll('.js-word-input'));
                    const result = card.querySelector('.js-word-result');

                    if (!cardInputs.length) {
                        if (result) {
                            result.textContent = '';
                            setResultState(result);
                        }
                        return;
                    }

                    cardInputs.forEach((input) => {
                        const correctValue = input.dataset.answer || '';
                        input.value = correctValue;
                        setInputState(input, 'correct');
                    });

                    if (result) {
                        result.textContent = '\u2713';
                        setResultState(result, 'correct');
                    }
                });

                isRevealed = true;
                updateStatusUI();
                updateActionButtons({ revealed: true });
                syncOpenPopupFromSource();
                stopTimer();

                if (persist) saveAll();
                if (playSound) play(audio.success);
            };

            const focusNextInput = (currentInput) => {
                const currentIndex = inputs.indexOf(currentInput);
                const nextInput = currentIndex >= 0 ? inputs[currentIndex + 1] : null;

                if (nextInput) {
                    try {
                        nextInput.focus({ preventScroll: true });
                    } catch (e) {
                        nextInput.focus();
                    }
                }
            };

            const getInputState = (input) => {
                if (!input) return 'base';
                if (input.classList.contains('border-emerald-500')) return 'correct';
                if (input.classList.contains('border-rose-500')) return 'wrong';
                return 'base';
            };

            const findSourceInputByKey = (key) => {
                return inputs.find((sourceInput) => sourceInput.dataset.key === key) || null;
            };

            const syncPopupResultFromCard = () => {
                if (!activePopupCard || !focusSentence) return;

                const cardResult = activePopupCard.querySelector('.js-word-result');
                const popupResult = focusSentence.querySelector('.js-word-popup-result');

                if (!popupResult) return;

                popupResult.textContent = cardResult?.textContent || '';
                setResultState(popupResult);

                if (cardResult?.classList.contains('text-emerald-600')) {
                    setResultState(popupResult, 'correct');
                } else if (cardResult?.classList.contains('text-rose-600')) {
                    setResultState(popupResult, 'wrong');
                }
            };

            const syncOpenPopupFromSource = () => {
                if (!activePopupCard || !focusSentence) return;

                activePopupCard.querySelectorAll('.js-word-input').forEach((sourceInput) => {
                    const popupInput = popupInputsByKey.get(sourceInput.dataset.key);
                    if (!popupInput) return;

                    popupInput.value = sourceInput.value || '';
                    setInputState(popupInput, getInputState(sourceInput));
                });

                syncPopupResultFromCard();
            };

            const focusNextPopupInput = (currentPopupInput) => {
                const popupInputs = Array.from(focusSentence?.querySelectorAll('.js-word-popup-input') || []);
                const currentIndex = popupInputs.indexOf(currentPopupInput);
                const nextInput = currentIndex >= 0 ? popupInputs[currentIndex + 1] : null;

                if (nextInput) {
                    try {
                        nextInput.focus({ preventScroll: true });
                    } catch (e) {
                        nextInput.focus();
                    }
                }
            };

            const handleSourceInputChanged = (input, { focusNext = false } = {}) => {
                const answer = input.dataset.answer || '';
                input.value = input.value.slice(0, answer.length);

                const card = input.closest('.word-card');
                if (card) clearCardFeedback(card);

                if (isRevealed) {
                    isRevealed = false;
                    updateActionButtons({ revealed: false });
                }

                if (timerInt === null) {
                    startTimer();
                }

                saveAll();
                updateStatusUI();
                syncOpenPopupFromSource();

                if (focusNext && input.value.length >= answer.length && normalizeValue(input.value) === normalizeValue(answer)) {
                    focusNextInput(input);
                }
            };

            const buildPopupInput = (sourceInput) => {
                const answer = sourceInput.dataset.answer || '';
                const maxLength = Number.parseInt(sourceInput.getAttribute('maxlength') || String(answer.length || 1), 10);
                const inputWidthCh = Math.min(22, Math.max(answer.length <= 2 ? 5 : 8, answer.length + 3));
                const popupInput = document.createElement('input');

                popupInput.type = 'text';
                popupInput.className = 'js-word-popup-input h-10 min-w-[5ch] max-w-[22ch] shrink-0 rounded-none border-0 border-b-[3px] border-dashed border-indigo-600 bg-indigo-50/50 px-1.5 text-center text-[1rem] font-black leading-none text-indigo-800 outline-none transition duration-150 placeholder:text-[0.68rem] placeholder:font-black placeholder:uppercase placeholder:tracking-[0.10em] placeholder:text-indigo-400/70 focus:ring-4 focus:ring-indigo-500/10 dark:border-indigo-300 dark:bg-indigo-950/30 dark:text-indigo-100 dark:placeholder:text-indigo-200/45 sm:h-11 sm:text-[1.12rem]';
                popupInput.style.width = `${inputWidthCh}ch`;
                popupInput.style.minWidth = `${inputWidthCh}ch`;
                popupInput.style.maxWidth = '22ch';
                popupInput.maxLength = Number.isFinite(maxLength) ? maxLength : Math.max(1, answer.length);
                popupInput.placeholder = sourceInput.getAttribute('placeholder') || '';
                popupInput.dataset.key = sourceInput.dataset.key || '';
                popupInput.dataset.answer = answer;
                popupInput.autocomplete = 'off';
                popupInput.autocapitalize = 'none';
                popupInput.spellcheck = false;
                popupInput.value = sourceInput.value || '';
                setInputState(popupInput, getInputState(sourceInput));

                popupInput.addEventListener('click', (event) => event.stopPropagation());
                popupInput.addEventListener('input', () => {
                    const source = findSourceInputByKey(popupInput.dataset.key);
                    if (!source) return;

                    popupInput.value = popupInput.value.slice(0, answer.length);
                    source.value = popupInput.value;
                    handleSourceInputChanged(source, { focusNext: false });
                    popupInput.value = source.value;
                    setInputState(popupInput, getInputState(source));

                    if (popupInput.value.length >= answer.length && normalizeValue(popupInput.value) === normalizeValue(answer)) {
                        focusNextPopupInput(popupInput);
                    }
                });
                popupInput.addEventListener('blur', () => {
                    const source = findSourceInputByKey(popupInput.dataset.key);
                    if (!source) return;

                    source.value = popupInput.value.slice(0, answer.length);
                    popupInput.value = source.value;
                    saveAll();
                });

                popupInputsByKey.set(popupInput.dataset.key, popupInput);
                return popupInput;
            };

            const openCardPopup = (card) => {
                if (!card || !focusOverlay || !focusPanel || !focusSentence) return;

                window.stopAudioPlayer?.();
                clearTimeout(popupCloseTimer);
                activePopupCard = card;
                lastFocusedElement = document.activeElement instanceof HTMLElement ? document.activeElement : null;
                popupInputsByKey.clear();
                focusSentence.innerHTML = '';

                const imageSrc = card.dataset.image || '';
                const imageAlt = card.dataset.imageAlt || '';

                if (focusImage && imageSrc) {
                    focusImage.src = imageSrc;
                    focusImage.alt = imageAlt;
                }

                focusImageWrap?.classList.toggle('hidden', !imageSrc);

                const sourceAudioButton = card.querySelector('.speak-btn[data-audio]');
                const audioSrc = sourceAudioButton?.getAttribute('data-audio') || '';
                if (focusAudioBtn) {
                    focusAudioBtn.dataset.audio = audioSrc;
                    focusAudioBtn.classList.toggle('hidden', !audioSrc);
                    focusAudioBtn.classList.toggle('inline-flex', Boolean(audioSrc));
                }

                const sourceSentence = card.querySelector('.js-card-sentence');
                Array.from(sourceSentence?.children || []).forEach((child) => {
                    if (child.classList.contains('js-card-text-part')) {
                        const span = document.createElement('span');
                        span.className = 'min-w-0 max-w-full flex-none whitespace-pre-wrap tracking-[0.005em] [overflow-wrap:anywhere]';
                        span.textContent = child.textContent || '';
                        focusSentence.appendChild(span);
                        return;
                    }

                    if (child.classList.contains('js-word-input')) {
                        focusSentence.appendChild(buildPopupInput(child));
                    }
                });

                const result = document.createElement('span');
                result.className = 'js-word-popup-result inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full text-2xl font-black leading-none';
                focusSentence.appendChild(result);
                syncPopupResultFromCard();

                focusOverlay.classList.remove('invisible', 'pointer-events-none');
                focusOverlay.setAttribute('aria-hidden', 'false');
                document.body.classList.add('overflow-hidden');

                requestAnimationFrame(() => {
                    focusOverlay.classList.remove('opacity-0');
                    focusOverlay.classList.add('opacity-100');
                    focusPanel.classList.remove('translate-y-4', 'scale-95');
                    focusPanel.classList.add('translate-y-0', 'scale-100');

                    const firstEmptyInput = Array.from(focusSentence.querySelectorAll('.js-word-popup-input')).find((input) => !input.value) || focusSentence.querySelector('.js-word-popup-input');
                    if (firstEmptyInput) {
                        try {
                            firstEmptyInput.focus({ preventScroll: true });
                        } catch (e) {
                            firstEmptyInput.focus();
                        }
                    }
                });
            };

            const closeCardPopup = ({ restoreFocus = true } = {}) => {
                if (!focusOverlay || !focusPanel) return;

                if (currentAudioBtn === focusAudioBtn) {
                    stopVocabAudio();
                }

                focusOverlay.classList.add('opacity-0', 'pointer-events-none');
                focusOverlay.classList.remove('opacity-100');
                focusPanel.classList.add('translate-y-4', 'scale-95');
                focusPanel.classList.remove('translate-y-0', 'scale-100');
                focusOverlay.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('overflow-hidden');

                popupCloseTimer = window.setTimeout(() => {
                    focusOverlay.classList.add('invisible');
                    if (focusImage) {
                        focusImage.removeAttribute('src');
                        focusImage.alt = '';
                    }
                    focusSentence && (focusSentence.innerHTML = '');
                    popupInputsByKey.clear();
                    activePopupCard = null;

                    if (restoreFocus && lastFocusedElement && document.contains(lastFocusedElement)) {
                        try {
                            lastFocusedElement.focus({ preventScroll: true });
                        } catch (e) {
                            lastFocusedElement.focus();
                        }
                    }

                    lastFocusedElement = null;
                }, 180);
            };

            inputs.forEach((input) => {
                const key = input.dataset.key;
                const answer = input.dataset.answer || '';

                if (typeof savedData[key] === 'string') {
                    input.value = savedData[key].slice(0, answer.length);
                }

                input.addEventListener('input', () => {
                    handleSourceInputChanged(input, { focusNext: true });
                });

                input.addEventListener('blur', () => {
                    input.value = input.value.slice(0, answer.length);
                    saveAll();
                });
            });

            document.querySelectorAll('.speak-btn').forEach((btn) => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    playOrToggleVocabAudio(btn);
                });
            });

            cards.forEach((card) => {
                card.addEventListener('click', (event) => {
                    if (event.target.closest('input, button, a, textarea, select, label')) return;
                    openCardPopup(card);
                });

                card.addEventListener('keydown', (event) => {
                    if (event.target !== card) return;
                    if (event.key !== 'Enter' && event.key !== ' ') return;

                    event.preventDefault();
                    openCardPopup(card);
                });
            });

            focusClose?.addEventListener('click', () => closeCardPopup());
            focusDone?.addEventListener('click', () => closeCardPopup());

            focusOverlay?.addEventListener('click', (event) => {
                if (event.target === focusOverlay) closeCardPopup();
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && activePopupCard) closeCardPopup();
            });

            vocabAudio.addEventListener('ended', stopVocabAudio);
            vocabAudio.addEventListener('error', stopVocabAudio);

            document.addEventListener('visibilitychange', () => {
                if (document.hidden) stopVocabAudio();
            });

            window.addEventListener('beforeunload', stopVocabAudio);
            window.addEventListener('pagehide', stopVocabAudio);

            checkBtn?.addEventListener('click', () => {
                let hasWrong = false;
                let hasCorrect = false;
                let allCorrect = true;
                let checkedCards = 0;

                cards.forEach((card) => {
                    const cardInputs = Array.from(card.querySelectorAll('.js-word-input'));
                    const result = card.querySelector('.js-word-result');

                    if (!cardInputs.length) {
                        if (result) {
                            result.textContent = '';
                            setResultState(result);
                        }
                        return;
                    }

                    checkedCards += 1;
                    let cardCorrect = true;

                    cardInputs.forEach((input) => {
                        const userValue = normalizeValue(input.value);
                        const correctValue = normalizeValue(input.dataset.answer);

                        if (userValue !== '' && userValue === correctValue) {
                            setInputState(input, 'correct');
                        } else {
                            setInputState(input, 'wrong');
                            cardCorrect = false;
                        }
                    });

                    if (result) {
                        setResultState(result);

                        if (cardCorrect) {
                            result.textContent = '\u2713';
                            setResultState(result, 'correct');
                            hasCorrect = true;
                        } else {
                            result.textContent = '\u00d7';
                            setResultState(result, 'wrong');
                            hasWrong = true;
                            allCorrect = false;
                        }
                    }
                });

                isRevealed = false;

                if (allCorrect && checkedCards > 0) {
                    play(audio.success);
                    stopTimer();
                } else if (hasWrong) {
                    wrongTries += 1;
                    play(audio.wrong);
                } else if (hasCorrect) {
                    play(audio.correct);
                }

                updateActionButtons({ revealed: false });
                updateStatusUI();
                syncOpenPopupFromSource();
                saveAll();
            });

            btnRevealAnswers?.addEventListener('click', () => {
                revealAnswers();
            });

            btnRetakeTest?.addEventListener('click', () => {
                window.resetSlide?.();
            });

            if (isRevealed) {
                revealAnswers({ persist: false, playSound: false });
            } else {
                updateActionButtons({ revealed: false });
                updateStatusUI();
                startTimer();
            }

            window.resetSlide = function () {
                stopVocabAudio();
                window.stopAudioPlayer?.();

                closeCardPopup({ restoreFocus: false });

                inputs.forEach((input) => {
                    input.value = '';
                });

                cards.forEach((card) => clearCardFeedback(card));

                isRevealed = false;
                wrongTries = 0;
                startTime = Date.now();
                localStorage.removeItem(storageKey);
                updateActionButtons({ revealed: false });
                updateStatusUI();
                startTimer();
            };

            window.stopSlideAudio = () => {
                stopTimer();
                closeCardPopup({ restoreFocus: false });
                stopVocabAudio();
                window.stopAudioPlayer?.();
                Object.values(audio).forEach((sound) => {
                    try {
                        sound.pause();
                        sound.currentTime = 0;
                    } catch (e) {}
                });
            };
        });
    </script>
@endsection
