@extends("slider.simple-layout")
@section("style")
    <style>
        /* Dynamic Wave effect */
        .wave-bar {
            display: none;
            width: 3px;
            height: 12px;
            background: currentColor;
            border-radius: 2px;
            margin: 0 1px;
        }

        .speaking .wave-bar { display: block; animation: waveGrowth 0.6s infinite ease-in-out; }
        .speaking .static-icon { display: none; }

        @keyframes waveGrowth {
            0%, 100% { height: 6px; }
            50% { height: 16px; }
        }
    </style>
@endsection
@section("content")
    @php
        $mobileTwoCols = (bool) ($content['mobile_two_cols'] ?? false);
        $compactMobile = (bool) ($content['compact_mobile'] ?? false);
        $card1Items = array_values($content['card1'] ?? []);
        $card2Items = array_values($content['card2'] ?? []);
        $rowCount = max(count($card1Items), count($card2Items));
        $pairedRows = [];

        for ($rowIndex = 0; $rowIndex < $rowCount; $rowIndex++) {
            $pairedRows[] = [
                'left' => $card1Items[$rowIndex] ?? null,
                'right' => $card2Items[$rowIndex] ?? null,
            ];
        }

        $mainClass = $mobileTwoCols
            ? 'mx-auto w-full max-w-[1000px] px-3 pt-6 pb-4 sm:px-8'
            : 'mx-auto w-full max-w-[1000px] px-4 pt-8 pb-4 sm:px-8';
        $headerSpacingClass = $compactMobile ? 'text-center space-y-4 sm:space-y-6' : 'text-center space-y-6';
        $titleClass = trim((string) ($content['title_class'] ?? ''));
        if ($titleClass === '') {
            $titleClass = !empty($content['title'])
                ? ($compactMobile ? 'text-3xl sm:text-4xl md:text-5xl lg:text-6xl' : 'text-4xl md:text-5xl lg:text-6xl')
                : ($compactMobile ? 'text-2xl sm:text-3xl md:text-4xl lg:text-5xl' : 'text-3xl md:text-4xl lg:text-5xl');
        }

        $tableShellClass = $compactMobile
            ? 'mt-8 overflow-hidden rounded-[1.6rem] border border-white/70 bg-white/75 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.05)] backdrop-blur-2xl dark:border-white/10 dark:bg-slate-900/75 sm:mt-10 sm:rounded-[2.4rem]'
            : 'mt-10 overflow-hidden rounded-[2.4rem] border border-white/70 bg-white/75 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.05)] backdrop-blur-2xl dark:border-white/10 dark:bg-slate-900/75';
        $tablePadClass = $compactMobile ? 'p-3 sm:p-5' : 'p-4 sm:p-6';
        $headerGridClass = $mobileTwoCols
            ? 'grid grid-cols-2 gap-2.5 sm:gap-4'
            : 'grid grid-cols-1 gap-2.5 md:grid-cols-2 md:gap-4';
        $rowGridClass = $headerGridClass;
        $rowListClass = $compactMobile ? 'mt-2.5 space-y-2 sm:mt-4 sm:space-y-3' : 'mt-3 space-y-3 sm:mt-5';
        $headerCellClass = $compactMobile
            ? 'rounded-xl bg-gradient-to-br from-indigo-600 to-blue-500 px-3 py-2 text-center text-sm font-extrabold text-white shadow-[0_10px_20px_-5px_rgba(79,70,229,0.3)] sm:rounded-2xl sm:px-5 sm:py-3 sm:text-xl'
            : 'rounded-2xl bg-gradient-to-br from-indigo-600 to-blue-500 px-6 py-3 text-center text-lg font-extrabold text-white shadow-[0_10px_20px_-5px_rgba(79,70,229,0.3)] sm:text-xl';
        $itemClass = $compactMobile
            ? 'greeting-item group relative overflow-hidden flex min-h-[4.2rem] items-stretch justify-between gap-2 rounded-xl border border-slate-200/80 bg-white/90 px-2.5 py-2 shadow-sm dark:border-slate-700 dark:bg-slate-800/90 sm:min-h-[5rem] sm:gap-3 sm:rounded-2xl sm:px-3.5'
            : 'greeting-item group relative overflow-hidden flex min-h-[5rem] items-stretch justify-between gap-4 rounded-2xl border border-slate-200/80 bg-white/90 px-4 py-3 shadow-sm dark:border-slate-700 dark:bg-slate-800/90';
        $labelClass = $compactMobile
            ? 'greeting-label flex min-h-full flex-1 items-center rounded-lg bg-slate-50 px-2.5 py-1.5 text-[0.72rem] font-bold leading-[1.2] text-slate-900 dark:bg-slate-700/70 dark:text-slate-100 sm:rounded-xl sm:px-4 sm:text-lg'
            : 'greeting-label flex min-h-full flex-1 items-center rounded-xl bg-slate-50 px-4 py-2 text-[0.9rem] font-bold leading-[1.25] text-slate-900 dark:bg-slate-700/70 dark:text-slate-100 sm:text-lg';
        $audioBtnClass = $compactMobile
            ? 'audio-btn flex h-7 w-7 shrink-0 self-center items-center justify-center rounded-lg border border-slate-100 bg-slate-50 text-slate-500 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-300 sm:h-9 sm:w-9'
            : 'audio-btn flex h-8 w-8 shrink-0 self-center items-center justify-center rounded-lg border border-slate-100 bg-slate-50 text-slate-500 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-300 sm:h-9 sm:w-9';
        $iconClass = $compactMobile ? 'static-icon h-4 w-4 sm:h-5 sm:w-5' : 'static-icon w-5 h-5';
        $emptyCellClass = $mobileTwoCols
            ? ($compactMobile
                ? 'invisible pointer-events-none min-h-[4.2rem] rounded-xl sm:min-h-[5rem] sm:rounded-2xl'
                : 'invisible pointer-events-none min-h-[5rem] rounded-2xl')
            : ($compactMobile
                ? 'hidden md:block invisible pointer-events-none min-h-[5rem] rounded-2xl'
                : 'hidden md:block invisible pointer-events-none min-h-[5rem] rounded-2xl');
    @endphp

    <div class="relative flex min-h-[100dvh] w-full items-center overflow-x-hidden overflow-y-auto">
        <main class="{{ $mainClass }}">
            <div class="{{ $headerSpacingClass }}">
                @if(!empty($content['title']))
                    <span class="rounded-full border border-indigo-100 bg-indigo-50 px-4 py-1.5 text-[11px] font-black uppercase tracking-[0.3em] text-indigo-500 dark:border-indigo-800/50 dark:bg-indigo-900/30 dark:text-indigo-400">
                        {{ $content['title'] }}
                    </span>
                @endif
                <h1 class="w-full tracking-tight font-black transition-colors {{ $titleClass }}">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        {{ $content['subtitle'] }}
                    </span>
                </h1>
            </div>

            <div class="{{ $tableShellClass }}">
                <div class="{{ $tablePadClass }}">
                    <div class="{{ $headerGridClass }}">
                        <div class="{{ $headerCellClass }}">{{ $content['card1Title'] }}</div>
                        <div class="{{ $headerCellClass }}">{{ $content['card2Title'] }}</div>
                    </div>

                    <div id="pairedRowsContainer" class="{{ $rowListClass }}"></div>
                </div>
            </div>
        </main>
    </div>
@endsection

@section("script")
    <script>
        const pairedRows = @json($pairedRows);

        function createGreetingCell(item) {
            const itemClass = @json($itemClass);
            const labelClass = @json($labelClass);
            const audioBtnClass = @json($audioBtnClass);
            const iconClass = @json($iconClass);
            const emptyCellClass = @json($emptyCellClass);

            if (!item) {
                const placeholder = document.createElement('div');
                placeholder.className = emptyCellClass;
                return placeholder;
            }

            const div = document.createElement('div');
            div.className = itemClass;
            div.onclick = () => handleInteraction(item, div);
            div.innerHTML = `
                <span class="${labelClass}">${item.label}</span>
                <div class="${audioBtnClass}">
                    <svg class="${iconClass}" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>
                    <div class="wave-bar" style="animation-delay: 0.1s"></div>
                    <div class="wave-bar" style="animation-delay: 0.2s"></div>
                    <div class="wave-bar" style="animation-delay: 0.3s"></div>
                </div>
                <div class="playing-indicator absolute bottom-0 left-0 h-[3px] w-0 bg-indigo-500 transition-[width] duration-100"></div>
            `;

            return div;
        }

        function renderPairedRows() {
            const container = document.getElementById('pairedRowsContainer');
            const rowGridClass = @json($rowGridClass);
            if (!container) return;

            pairedRows.forEach((row) => {
                const rowEl = document.createElement('div');
                rowEl.className = rowGridClass;
                rowEl.appendChild(createGreetingCell(row.left));
                rowEl.appendChild(createGreetingCell(row.right));
                container.appendChild(rowEl);
            });
        }

        renderPairedRows();

        let currentAudio = null;
        let currentSpeakingElement = null;

        window.setTheme = function(mode) {
            if (mode === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        };

        window.stopSlideAudio = function() {
            if (currentAudio) {
                currentAudio.pause();
                currentAudio.currentTime = 0;
                currentAudio = null;
            }
            if (window.speechSynthesis.speaking) {
                window.speechSynthesis.cancel();
            }
            if (currentSpeakingElement) {
                currentSpeakingElement.classList.remove('speaking');
                if (currentSpeakingElement._progressInterval) clearInterval(currentSpeakingElement._progressInterval);
                const indicator = currentSpeakingElement.querySelector('.playing-indicator');
                if (indicator) indicator.style.width = '0%';
                currentSpeakingElement = null;
            }
        };

        function handleInteraction(item, el) {
            if (el.classList.contains('speaking')) {
                window.stopSlideAudio();
                return;
            }

            window.stopSlideAudio();
            currentSpeakingElement = el;

            const cleanup = () => {
                el.classList.remove('speaking');
                if (el._progressInterval) clearInterval(el._progressInterval);
                const indicator = el.querySelector('.playing-indicator');
                if (indicator) indicator.style.width = '0%';
                if (currentSpeakingElement === el) currentSpeakingElement = null;
            };

            const startProgress = (duration) => {
                el.classList.add('speaking');
                const indicator = el.querySelector('.playing-indicator');
                let startTime = Date.now();
                const totalDuration = (duration || 1) * 1000;

                el._progressInterval = setInterval(() => {
                    const elapsed = Date.now() - startTime;
                    if (indicator) indicator.style.width = Math.min(elapsed / totalDuration * 100, 100) + '%';
                    if (elapsed >= totalDuration) clearInterval(el._progressInterval);
                }, 16);
            };

            if (item.sound && item.sound.trim() !== "") {
                const audio = new Audio(item.sound);
                currentAudio = audio;
                audio.onloadedmetadata = () => startProgress(audio.duration);
                audio.onended = () => {
                    cleanup();
                    currentAudio = null;
                };
                audio.onerror = () => {
                    currentAudio = null;
                    runTTS(item.label, cleanup);
                };
                audio.play().catch(() => {
                    currentAudio = null;
                    runTTS(item.label, cleanup);
                });
            } else {
                el.classList.add('speaking');
                runTTS(item.label, cleanup);
            }
        }

        function runTTS(text, onComplete) {
            const synth = window.speechSynthesis;
            const utterance = new SpeechSynthesisUtterance(text);
            const voices = synth.getVoices();
            const estimatedDuration = (text.length * 0.15) + 0.3;

            const preferredVoice = voices.find(v =>
                v.name.includes('Samantha') ||
                v.name.includes('David') ||
                v.name.includes('Google US English')
            ) || voices[0];

            if (preferredVoice) utterance.voice = preferredVoice; 
            utterance.rate = 0.95;

            if (currentSpeakingElement) {
                let startTime = Date.now();
                const totalDuration = estimatedDuration * 1000;
                const indicator = currentSpeakingElement.querySelector('.playing-indicator');
                if (currentSpeakingElement._progressInterval) clearInterval(currentSpeakingElement._progressInterval);
                currentSpeakingElement._progressInterval = setInterval(() => {
                    const elapsed = Date.now() - startTime;
                    if (indicator) indicator.style.width = Math.min(elapsed / totalDuration * 100, 100) + '%';
                    if (elapsed >= totalDuration) clearInterval(currentSpeakingElement._progressInterval);
                }, 16);
            }

            utterance.onend = onComplete;
            utterance.onerror = onComplete;
            synth.speak(utterance);
        }

        document.addEventListener('DOMContentLoaded', () => {
            window.speechSynthesis.getVoices();
            window.resetSlide = () => {};
        });
    </script>
@endsection
