@extends("slider.simple-layout")

@section('title', $content['title'] ?? 'Slide')

@php
    $audioBtnClass = ($theme['name'] ?? null) === 'orange'
        ? 'bg-gradient-to-br from-amber-400 via-orange-400 to-orange-500 shadow-lg shadow-orange-500/20'
        : 'bg-gradient-to-br from-indigo-500 via-blue-500 to-violet-500 shadow-lg shadow-indigo-500/20';

    $audioBtnRingClass = ($theme['name'] ?? null) === 'orange'
        ? 'focus-visible:ring-orange-300/40'
        : 'focus-visible:ring-indigo-300/40';
@endphp

@section("style")
    <style>
        .slide-font {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .hl-gold {
            color: #facc15;
            font-weight: 800;
        }

        .hl-red {
            color: #ef4444;
            font-weight: 800;
        }

        .dark .hl-gold {
            color: #fde68a;
        }

        .dark .hl-red {
            color: #f87171;
        }

        .grammar-audio-item{
            position:relative;
            overflow:hidden;
        }

        .grammar-audio-btn{
            flex:none;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            width:2.3rem;
            height:2.3rem;
            border-radius:999px;
            color:#fff;
            transition:transform .16s ease, box-shadow .16s ease, opacity .16s ease;
        }

        .grammar-audio-btn:hover{
            transform:scale(1.04);
        }

        .grammar-audio-btn:active{
            transform:scale(.96);
        }

        .grammar-audio-btn:disabled{
            opacity:.42;
            cursor:default;
            box-shadow:none !important;
        }

        .grammar-audio-btn .wave-bar{
            display:none;
            width:2.5px;
            height:10px;
            border-radius:999px;
            background:currentColor;
            margin:0 1px;
        }

        .grammar-audio-btn.speaking .static-icon{
            display:none;
        }

        .grammar-audio-btn.speaking .wave-bar{
            display:block;
            animation:grammarWaveBounce .6s infinite ease-in-out;
        }

        @keyframes grammarWaveBounce{
            0%,100% { height:5px; }
            50% { height:13px; }
        }
    </style>
@endsection

@section("content")
    <div class="slide-font min-h-[100dvh] overflow-x-hidden overflow-y-auto">
        <main class="relative z-10 mx-auto flex min-h-[100dvh] w-full max-w-[1320px] items-center px-4 py-8 sm:px-8 sm:py-12 lg:px-12">
            <section class="w-full">
                @include('slider.components.title-subtitle')

                <div class="{{ $content['cards_grid_class'] ?? 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2' }}">
                    @foreach(($content['cards'] ?? []) as $card)
                        <article class="{{ $card['card_class'] ?? '' }} rounded-[24px] border border-slate-200 bg-white p-4 shadow-xl sm:p-5 dark:border-slate-700 dark:bg-slate-900/95">
                            @if(!empty($card['title']))
                                @if(!empty($card['title_plain']))
                                    <div class="mb-4">
                                        <p class="text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-slate-900 dark:text-slate-50">
                                            {!! $card['title'] !!}
                                        </p>
                                    </div>
                                @else
                                    <div class="rounded-2xl bg-gradient-to-r {{ $card['tone'] ?? 'from-sky-400 to-blue-500' }} px-4 py-3 mb-4">
                                        <p class="text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-white">
                                            {!! $card['title'] !!}
                                        </p>
                                    </div>
                                @endif
                            @endif

                            @if(($card['type'] ?? '') === 'question')
                                @php
                                    $answer = (string) ($card['answer'] ?? '');
                                    $answerHtml = $card['answer_html'] ?? null;
                                    $highlightWord = trim((string) ($card['highlight_word'] ?? ''));

                                    if ($answerHtml === null) {
                                        $answerHtml = e($answer);

                                        if ($highlightWord !== '') {
                                            $answerHtml = preg_replace(
                                                '/\b(' . preg_quote($highlightWord, '/') . ')\b/i',
                                                '<span class="hl-gold">$1</span>',
                                                $answerHtml
                                            );
                                        }
                                    }
                                @endphp

                                <div class="grid grid-cols-1 gap-3">
                                    <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                                        <p class="text-sm sm:text-base font-bold leading-[1.45] text-slate-700 dark:text-slate-200">
                                            {!! $answerHtml !!}
                                        </p>
                                    </div>
                                </div>
                            @elseif(($card['type'] ?? '') === 'audio-list')
                                <div class="space-y-3">
                                    @foreach(($card['items'] ?? []) as $item)
                                        @php
                                            $itemLabel = (string) ($item['label'] ?? '');
                                            $itemHtml = $item['label_html'] ?? e($itemLabel);
                                            $itemSound = trim((string) ($item['sound'] ?? ''));
                                            $itemSpeech = trim((string) ($item['speech'] ?? $itemLabel));
                                        @endphp

                                        <div class="grammar-audio-item rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                                            <div class="flex items-center justify-between gap-3">
                                                <p class="min-w-0 flex-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-700 dark:text-slate-200">
                                                    {!! $itemHtml !!}
                                                </p>

                                                <button
                                                        type="button"
                                                        class="grammar-audio-btn {{ $audioBtnClass }} focus-visible:ring-4 {{ $audioBtnRingClass }}"
                                                        aria-label="Play audio"
                                                        @if($itemSound !== '') data-sound="{{ $itemSound }}" @endif
                                                        @if($itemSpeech !== '') data-speech="{{ $itemSpeech }}" @endif
                                                >
                                                    <svg class="static-icon h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                                        <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                    </svg>
                                                    <span class="wave-bar" style="animation-delay:.1s" aria-hidden="true"></span>
                                                    <span class="wave-bar" style="animation-delay:.2s" aria-hidden="true"></span>
                                                    <span class="wave-bar" style="animation-delay:.3s" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @elseif(($card['type'] ?? '') === 'sections')
                                <div class="space-y-4">
                                    @foreach(($card['sections'] ?? []) as $section)
                                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-950/40">
                                            @if(!empty($section['heading']))
                                                <p class="text-xl sm:text-2xl font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50">
                                                    {!! $section['heading'] !!}
                                                </p>
                                            @endif

                                            <div class="{{ !empty($section['heading']) ? 'mt-4' : '' }} space-y-3">
                                                @foreach(($section['items'] ?? []) as $item)
                                                    <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                                                        <p class="text-sm sm:text-base font-bold leading-[1.45] text-slate-700 dark:text-slate-200">
                                                            {!! $item !!}
                                                        </p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @elseif(($card['type'] ?? '') === 'table')
                                @php
                                    $useMobileCards = !empty($card['mobile_cards']);
                                    $tableHeaders = $card['table_headers'] ?? [];
                                @endphp

                                @if(!empty($card['intro']))
                                    <p class="mb-4 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                        {{ $card['intro'] }}
                                    </p>
                                @endif

                                @if($useMobileCards)
                                    <div class="space-y-3 md:hidden">
                                        @foreach(($card['table_rows'] ?? []) as $row)
                                            @php
                                                $titleCell = $row[0] ?? '';
                                                $isTitleAudioCell = is_array($titleCell);
                                                $titleText = $isTitleAudioCell ? (string) ($titleCell['text'] ?? '') : e((string) $titleCell);
                                            @endphp

                                            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/70">
                                                <p class="rounded-xl bg-gradient-to-r {{ $card['tone'] ?? 'from-sky-400 to-blue-500' }} px-4 py-3 text-base font-black leading-[1.25] text-white">
                                                    {!! $titleText !!}
                                                </p>

                                                <div class="mt-3 space-y-2">
                                                    @foreach($row as $cellIndex => $cell)
                                                        @if($cellIndex > 0)
                                                            @php
                                                                $isAudioCell = is_array($cell);
                                                                $cellText = $isAudioCell ? (string) ($cell['text'] ?? '') : e((string) $cell);
                                                                $cellSound = $isAudioCell ? trim((string) ($cell['sound'] ?? '')) : '';
                                                                $cellSpeech = $isAudioCell ? trim((string) ($cell['speech'] ?? '')) : '';
                                                                $cellHeader = (string) ($tableHeaders[$cellIndex] ?? '');
                                                            @endphp

                                                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 dark:border-slate-700 dark:bg-slate-950/40">
                                                                @if($cellHeader !== '')
                                                                    <p class="text-xs font-black uppercase tracking-[0.08em] text-sky-600 dark:text-sky-300">
                                                                        {{ $cellHeader }}
                                                                    </p>
                                                                @endif

                                                                <div class="{{ $cellHeader !== '' ? 'mt-1' : '' }} text-sm font-bold leading-[1.45] text-slate-700 dark:text-slate-200">
                                                                    @if($cellSound !== '' || $cellSpeech !== '')
                                                                        <div class="flex items-start justify-between gap-3">
                                                                            <span class="min-w-0 flex-1">{!! $cellText !!}</span>
                                                                            <button
                                                                                    type="button"
                                                                                    class="grammar-audio-btn {{ $audioBtnClass }} focus-visible:ring-4 {{ $audioBtnRingClass }}"
                                                                                    aria-label="{{ $content['play_label'] ?? 'Play audio' }}"
                                                                                    @if($cellSound !== '') data-sound="{{ $cellSound }}" @endif
                                                                                    @if($cellSpeech !== '') data-speech="{{ $cellSpeech }}" @endif
                                                                            >
                                                                                <svg class="static-icon h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                                                                    <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                                                </svg>
                                                                                <span class="wave-bar" style="animation-delay:.1s" aria-hidden="true"></span>
                                                                                <span class="wave-bar" style="animation-delay:.2s" aria-hidden="true"></span>
                                                                                <span class="wave-bar" style="animation-delay:.3s" aria-hidden="true"></span>
                                                                            </button>
                                                                        </div>
                                                                    @else
                                                                        {!! $cellText !!}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="{{ $useMobileCards ? 'hidden md:block' : '' }} overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700">
                                    <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                                        <thead class="bg-gradient-to-r {{ $card['tone'] ?? 'from-sky-400 to-blue-500' }}">
                                        <tr>
                                            @foreach($tableHeaders as $header)
                                                <th class="px-4 py-3 text-left text-sm sm:text-base font-black tracking-[-0.02em] text-white">
                                                    {{ $header }}
                                                </th>
                                            @endforeach
                                        </tr>
                                        </thead>

                                        <tbody class="divide-y divide-slate-200 bg-white dark:divide-slate-700 dark:bg-slate-900/70">
                                        @foreach(($card['table_rows'] ?? []) as $row)
                                            <tr class="odd:bg-white even:bg-sky-50/55 dark:odd:bg-slate-900/70 dark:even:bg-slate-800/50">
                                                @foreach($row as $cell)
                                                    @php
                                                        $isAudioCell = is_array($cell);
                                                        $cellText = $isAudioCell ? (string) ($cell['text'] ?? '') : e((string) $cell);
                                                        $cellSound = $isAudioCell ? trim((string) ($cell['sound'] ?? '')) : '';
                                                        $cellSpeech = $isAudioCell ? trim((string) ($cell['speech'] ?? '')) : '';
                                                    @endphp
                                                    <td class="px-4 py-3 text-sm sm:text-base font-bold leading-[1.45] text-slate-700 dark:text-slate-200">
                                                        @if($cellSound !== '' || $cellSpeech !== '')
                                                            <div class="flex items-start justify-between gap-3">
                                                                <span class="min-w-0 flex-1">{!! $cellText !!}</span>
                                                                <button
                                                                        type="button"
                                                                        class="grammar-audio-btn {{ $audioBtnClass }} focus-visible:ring-4 {{ $audioBtnRingClass }}"
                                                                        aria-label="{{ $content['play_label'] ?? 'Play audio' }}"
                                                                        @if($cellSound !== '') data-sound="{{ $cellSound }}" @endif
                                                                        @if($cellSpeech !== '') data-speech="{{ $cellSpeech }}" @endif
                                                                >
                                                                    <svg class="static-icon h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                                                        <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                                    </svg>
                                                                    <span class="wave-bar" style="animation-delay:.1s" aria-hidden="true"></span>
                                                                    <span class="wave-bar" style="animation-delay:.2s" aria-hidden="true"></span>
                                                                    <span class="wave-bar" style="animation-delay:.3s" aria-hidden="true"></span>
                                                                </button>
                                                            </div>
                                                        @else
                                                            {!! $cellText !!}
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </article>
                    @endforeach
                </div>
            </section>
        </main>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const audio = new Audio();
            audio.preload = "auto";
            let activeButton = null;

            const setSpeaking = (button, isSpeaking) => {
                button?.classList.toggle("speaking", isSpeaking);
            };

            const stopAudio = () => {
                try {
                    audio.pause();
                    audio.currentTime = 0;
                } catch (e) {}

                if (window.speechSynthesis?.speaking) {
                    window.speechSynthesis.cancel();
                }

                if (activeButton) {
                    setSpeaking(activeButton, false);
                    activeButton = null;
                }
            };

            const speakText = (text, button) => {
                if (!window.speechSynthesis || !text) return;

                const utterance = new SpeechSynthesisUtterance(text);
                utterance.onend = stopAudio;
                utterance.onerror = stopAudio;
                activeButton = button;
                setSpeaking(button, true);
                window.speechSynthesis.speak(utterance);
            };

            document.addEventListener("click", (event) => {
                const button = event.target.closest(".grammar-audio-btn");
                if (!button) return;

                event.preventDefault();

                const sound = button.dataset.sound || "";
                const speech = button.dataset.speech || "";
                const isCurrent = activeButton === button && !audio.paused;

                if (isCurrent || button.classList.contains("speaking")) {
                    stopAudio();
                    return;
                }

                stopAudio();

                if (sound) {
                    try {
                        audio.src = sound;
                        activeButton = button;
                        setSpeaking(button, true);
                        audio.currentTime = 0;
                        const playPromise = audio.play();
                        if (playPromise && typeof playPromise.catch === "function") {
                            playPromise.catch(() => {
                                stopAudio();
                                speakText(speech, button);
                            });
                        }
                    } catch (e) {
                        stopAudio();
                        speakText(speech, button);
                    }
                } else {
                    speakText(speech, button);
                }
            });

            audio.addEventListener("ended", stopAudio);
            audio.addEventListener("error", stopAudio);

            window.stopSlideAudio = stopAudio;
            window.resetSlide = () => {
                stopAudio();
            };
        });
    </script>
@endsection
