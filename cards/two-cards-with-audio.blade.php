@extends("slider.simple-layout")
@section("style")
    <style>
        /* 🌊 Dynamic Wave effect */
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
    <div class="relative min-h-[100dvh] w-full overflow-x-hidden overflow-y-auto flex items-center">
        <main class="mx-auto w-full max-w-[1000px] px-4 pt-8 pb-4 sm:px-8 ">
            <div class="text-center space-y-6">
                @if(!empty($content['title']))
                    <span class="text-[11px] font-black uppercase tracking-[0.3em] text-indigo-500 bg-indigo-50 dark:bg-indigo-900/30 dark:text-indigo-400 px-4 py-1.5 rounded-full border border-indigo-100 dark:border-indigo-800/50">
                        {{ $content['title'] }}
                    </span>
                @endif
                <h1 class="w-full tracking-tight font-black transition-colors {{ !empty($content['title']) ? 'text-4xl md:text-5xl lg:text-6xl' : 'text-3xl md:text-4xl lg:text-5xl' }}">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        {{ $content['subtitle'] }}
                    </span>
                </h1>
            </div>

            <div class="grid-layout mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 md:gap-12">
                <!-- Formal Section -->
                <div class="category-card flex w-full max-w-none flex-col gap-6 rounded-[2.5rem] border border-white/70 bg-white/70 p-6 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.05)] backdrop-blur-2xl dark:border-white/10 dark:bg-slate-900/70 sm:p-10">
                    <div class="cat-title rounded-2xl bg-gradient-to-br from-indigo-600 to-blue-500 px-6 py-3 text-center text-lg font-extrabold text-white shadow-[0_10px_20px_-5px_rgba(79,70,229,0.3)] sm:text-xl">
                        {{ $content['card1Title'] }}
                    </div>
                    <div id="formalContainer" class="space-y-4"></div>
                </div>

                <!-- Informal Section -->
                <div class="category-card flex w-full max-w-none flex-col gap-6 rounded-[2.5rem] border border-white/70 bg-white/70 p-6 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.05)] backdrop-blur-2xl dark:border-white/10 dark:bg-slate-900/70 sm:p-10">
                    <div class="cat-title rounded-2xl bg-gradient-to-br from-indigo-600 to-blue-500 px-6 py-3 text-center text-lg font-extrabold text-white shadow-[0_10px_20px_-5px_rgba(79,70,229,0.3)] sm:text-xl">
                        {{ $content['card2Title'] }}
                    </div>
                    <div id="informalContainer" class="space-y-4"></div>
                </div>
            </div>
        </main>
    </div>
@endsection
@section("script")
    <script>
        const formalGreetings = @json($content['card1']);

        const informalGreetings = @json($content['card2']);

        function renderGreetings(items, containerId) {
            const container = document.getElementById(containerId);
            items.forEach((item, index) => {
                const div = document.createElement('div');
                div.className = "greeting-item group relative overflow-hidden flex items-center justify-between gap-4 rounded-2xl border border-slate-100 bg-white px-4 py-2 dark:border-slate-700 dark:bg-slate-800";
                div.onclick = () => handleInteraction(item, div);
                div.innerHTML = `
                    <span class="greeting-label text-base font-bold text-slate-900 dark:text-slate-100 sm:text-lg">${item.label}</span>
                    <div class="audio-btn flex h-8 w-8 items-center justify-center rounded-lg border border-slate-100 bg-slate-50 text-slate-500 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-300 sm:h-9 sm:w-9">
                        <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>
                        <div class="wave-bar" style="animation-delay: 0.1s"></div>
                        <div class="wave-bar" style="animation-delay: 0.2s"></div>
                        <div class="wave-bar" style="animation-delay: 0.3s"></div>
                    </div>
                    <div class="playing-indicator absolute bottom-0 left-0 h-[3px] w-0 bg-indigo-500 transition-[width] duration-100"></div>
                `;
                container.appendChild(div);
            });
        }

        renderGreetings(formalGreetings, 'formalContainer');
        renderGreetings(informalGreetings, 'informalContainer');

        let currentAudio = null;
        let currentSpeakingElement = null;

        // Expose globally for parent navigation
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
                    let elapsed = Date.now() - startTime;
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
                    let elapsed = Date.now() - startTime;
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
