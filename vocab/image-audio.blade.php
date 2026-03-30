
@extends("slider.simple-layout")
@section("style")
    <style>
        .wave-bar {
            width: 3px;
            height: 12px;
            background: currentColor;
            border-radius: 2px;
            animation: waveGrowth 0.6s infinite ease-in-out;
        }

        @keyframes waveGrowth {

            0%,
            100% {
                height: 8px;
            }

            50% {
                height: 18px;
            }
        }

        .word-span {
            display: inline-block;
            margin: 0 0.12rem;
            padding: 0.2rem 0.4rem;
            border-radius: 0.6rem;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            opacity: 0.6;
        }

        .word-span.active {
            color: #4f46e5;
            background: rgba(79, 70, 229, 0.4);
            opacity: 1;
            transform: scale(1.08);
            z-index: 10;
        }

        .subtitle-active {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .prof-card.speaking .wave-container { display: flex; }
        .prof-card.speaking .static-icon { display: none; }

        .img-container::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, transparent 60%, rgba(255, 255, 255, 0.9));
            opacity: 0.5;
        }

        .dark .img-container::after {
            background: linear-gradient(to bottom, transparent 60%, rgba(15, 23, 42, 0.8));
        }
    </style>

@endsection
@section("script")
    <script>
        const professions = @json($content['professions']);


        const grid = document.getElementById("professionGrid");
        const subtitleOverlay = document.createElement("div");
        subtitleOverlay.id = "subtitleOverlay";
        subtitleOverlay.className = "fixed bottom-[100px] left-1/2 z-[100] w-[calc(100%-80px)] -translate-x-1/2 rounded-2xl border border-white/60 bg-white/75 px-6 py-3.5 text-center opacity-0 pointer-events-none backdrop-blur-2xl transition-all duration-500 sm:bottom-12 sm:w-auto sm:max-w-[85vw] sm:rounded-[2rem] sm:px-10 sm:py-6 dark:border-white/10 dark:bg-slate-900/80";
        subtitleOverlay.innerHTML = `<p id="subtitleText" class="text-xl font-bold leading-snug tracking-tight sm:text-3xl sm:leading-[1.4] text-slate-900 dark:text-slate-100"></p>`;
        document.body.appendChild(subtitleOverlay);



        let currentAudio = null;
        let currentCard = null;
        let syncAnimationFrame = null;

        professions.forEach(prof => {
            const card = document.createElement("div");
            card.className = "prof-card group relative overflow-hidden rounded-[2rem] border border-white/70 bg-white/75 shadow-[0_15px_30px_-10px_rgba(0,0,0,0.05)] backdrop-blur-2xl transition-all duration-400 hover:-translate-y-2 hover:scale-[1.02] hover:border-indigo-500 hover:shadow-[0_30px_60px_-15px_rgba(79,70,229,0.4)] dark:border-white/10 dark:bg-slate-900/80 cursor-pointer";
            card.onclick = () => handleInteraction(prof, card);

            card.innerHTML = `
            <div class="img-container relative flex aspect-square w-full items-center justify-center overflow-hidden bg-slate-100 dark:bg-slate-800">
                <img src="${prof.image}" alt="${prof.label}" class="prof-img h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
            </div>

            <div class="prof-content flex items-center justify-between bg-white px-4 py-4 transition-colors duration-300 dark:bg-slate-900 sm:px-5 sm:py-5">
                <span class="prof-label text-sm font-extrabold tracking-tight text-slate-900 dark:text-slate-100 sm:text-base">${prof.label}</span>

                <div class="audio-btn flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 bg-slate-100 text-slate-500 transition-all duration-300 group-hover:-rotate-6 group-hover:border-indigo-500 group-hover:bg-indigo-500 group-hover:text-white dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 sm:h-11 sm:w-11 sm:rounded-xl">
                    <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                    </svg>

                    <div class="wave-container hidden items-center gap-0.5">
                        <div class="wave-bar" style="animation-delay: 0.1s"></div>
                        <div class="wave-bar" style="animation-delay: 0.2s"></div>
                        <div class="wave-bar" style="animation-delay: 0.3s"></div>
                    </div>
                </div>
            </div>

            <div class="playing-indicator absolute bottom-0 left-0 h-1 w-0 bg-indigo-500 transition-[width] duration-100"></div>
        `;

            grid.appendChild(card);
        });

        // Expose globally for parent navigation
        window.stopAll = function() {
            if (currentAudio) {
                currentAudio.pause();
                currentAudio.currentTime = 0; // Reset
                currentAudio = null;
            }
            if (window.speechSynthesis.speaking) {
                window.speechSynthesis.cancel();
            }
            if (currentCard) {
                currentCard.classList.remove('speaking');
                const indicator = currentCard.querySelector('.playing-indicator');
                if (indicator) indicator.style.width = '0%';
                currentCard = null;
            }
            if (syncAnimationFrame) {
                cancelAnimationFrame(syncAnimationFrame);
                syncAnimationFrame = null;
            }
            if (subtitleOverlay) {
                subtitleOverlay.classList.remove('subtitle-active');
                subtitleOverlay.classList.add('opacity-0');
            }
        };

        // For backward compatibility or external calls
        window.stopSlideAudio = window.stopAll;

        function handleInteraction(prof, el) {
            if (el.classList.contains('speaking')) {
                window.stopAll();
                return;
            }

            window.stopAll();

            currentCard = el;
            el.classList.add('speaking');

            const script = prof.script || prof.label;
            const words = script.split(' ');
            const subtitleText = document.getElementById('subtitleText');

            // Wrap words in spans
            subtitleText.innerHTML = words.map((word, i) => `<span class="word-span transition-colors duration-200" data-index="${i}">${word}</span>`).join(' ');

            subtitleOverlay.classList.remove('opacity-0');
            subtitleOverlay.classList.add('subtitle-active');

            if (prof.sound && prof.sound.trim() !== "") {
                const audio = new Audio(prof.sound);
                currentAudio = audio;

                audio.onplay = () => {
                    syncSubtitles(audio, words.length);
                };

                audio.onended = () => {
                    stopAll();
                };

                audio.onerror = () => {
                    console.warn("Audio failed, falling back to TTS");
                    runTTS(script);
                };

                audio.play().catch(err => {
                    console.error("Audio play failed:", err);
                    runTTS(script);
                });
            } else {
                runTTS(script);
            }
        }

        function syncSubtitles(audio, wordCount) {
            const indicator = currentCard.querySelector('.playing-indicator');
            const wordSpans = document.querySelectorAll('.word-span');

            function update() {
                if (!currentAudio || currentAudio.paused) return;

                const progress = (audio.currentTime / audio.duration) || 0;
                if (indicator) indicator.style.width = (progress * 100) + '%';

                // Heuristic word highlighting
                const currentWordIndex = Math.floor(progress * wordCount);
                wordSpans.forEach((span, i) => {
                    if (i === currentWordIndex) {
                        span.classList.add('active');
                    } else {
                        span.classList.remove('active');
                    }
                });

                syncAnimationFrame = requestAnimationFrame(update);
            }
            update();
        }

        function runTTS(text) {
            const synth = window.speechSynthesis;
            const utterance = new SpeechSynthesisUtterance(text);
            const voices = synth.getVoices();
            const indicator = currentCard.querySelector('.playing-indicator');
            const subtitleText = document.getElementById('subtitleText');
            const words = text.split(' ');

            subtitleText.innerHTML = words.map((word, i) => `<span class="word-span transition-colors duration-200 text-slate-800 dark:text-white/60" data-index="${i}">${word}</span>`).join(' ');

            const preferredVoice = voices.find(v =>
                v.name.includes('Google US English') ||
                v.name.includes('Google UK English Female') ||
                v.name.includes('Samantha')
            ) || voices[0];

            if (preferredVoice) utterance.voice = preferredVoice;
            utterance.rate = 0.9;

            let startTime = 0;
            const estimatedDuration = (text.length * 0.1) + 0.5; // Seconds

            utterance.onstart = () => {
                startTime = performance.now();
                const wordSpans = document.querySelectorAll('.word-span');

                function updateTTS() {
                    if (!synth.speaking) return;

                    const elapsed = (performance.now() - startTime) / 1000;
                    const progress = Math.min(elapsed / estimatedDuration, 1);

                    if (indicator) indicator.style.width = (progress * 100) + '%';

                    const currentWordIndex = Math.floor(progress * words.length);
                    wordSpans.forEach((span, i) => {
                        if (i === currentWordIndex) {
                            span.classList.add('active');
                        } else {
                            span.classList.remove('active');
                        }
                    });

                    if (progress < 1) {
                        syncAnimationFrame = requestAnimationFrame(updateTTS);
                    }
                }
                updateTTS();
            };

            utterance.onend = stopAll;
            utterance.onerror = stopAll;

            synth.speak(utterance);
        }

        document.addEventListener('DOMContentLoaded', () => {
            window.speechSynthesis.getVoices();
        });
    </script>

@endsection
@section("content")
    <div class="relative min-h-[100dvh] w-full overflow-x-hidden overflow-y-auto">
        <main class="mx-auto w-full max-w-[1200px] px-4 py-10 sm:px-8 sm:py-12">
            <div class="header-spacing text-center space-y-6 my-8">

                <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        {{$content['subtitle']}}
                    </span>
                </h1>
                <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                    {{$content['paragraph']}}
                </p>
            </div>
            <div class="profession-grid grid grid-cols-2 gap-3 sm:gap-4 lg:grid-cols-6 lg:gap-4 w-full" id="professionGrid"></div>
        </main>
    </div>
@endsection
