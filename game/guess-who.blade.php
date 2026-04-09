@extends("slider.simple-layout")
@section("title", $content['page_title'] ?? $content['title'] ?? 'Guess Who')

@php
    $gridClass = trim((string)($content['grid_class'] ?? 'grid-cols-2 md:grid-cols-5'));
@endphp

@section("style")
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <style>
        .question-mask {
            height: 80px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            width: 100%;
        }

        .card-shake { border-color: #ef4444; }
        .correct-glow {
            border-color: #10b981;
            filter: brightness(1.08);
            opacity: 0.75;
        }

        .wrong-x {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            font-size: 4rem;
            font-weight: 900;
            opacity: 0;
            pointer-events: none;
            z-index: 10;
        }
        .show-x { opacity: 1; }

        .correct-check {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(16, 185, 129, 0.12);
            color: #10b981;
            font-size: 4rem;
            font-weight: 900;
            opacity: 0;
            pointer-events: none;
            z-index: 10;
        }
        .show-check { opacity: 1; }

        .bg-card-blue { background-color: #e3f2fd; }
        .bg-card-green { background-color: #e8f5e9; }
        .bg-card-pink { background-color: #fce4ec; }
        .bg-card-orange { background-color: #fff3e0; }
        .bg-card-purple { background-color: #f3e5f5; }
        .bg-card-teal { background-color: #e0f2f1; }
        .bg-card-indigo { background-color: #e8eaf6; }

        .dark .bg-card-blue { background-color: rgba(227, 242, 253, 0.1); border-color: rgba(33, 150, 243, 0.2); }
        .dark .bg-card-green { background-color: rgba(232, 245, 233, 0.1); border-color: rgba(76, 175, 80, 0.2); }
        .dark .bg-card-pink { background-color: rgba(252, 228, 236, 0.1); border-color: rgba(233, 30, 99, 0.2); }
        .dark .bg-card-orange { background-color: rgba(255, 243, 224, 0.1); border-color: rgba(255, 152, 0, 0.2); }
        .dark .bg-card-purple { background-color: rgba(243, 229, 245, 0.1); border-color: rgba(156, 39, 176, 0.2); }
        .dark .bg-card-teal { background-color: rgba(224, 242, 241, 0.1); border-color: rgba(0, 150, 136, 0.2); }
        .dark .bg-card-indigo { background-color: rgba(232, 234, 246, 0.1); border-color: rgba(63, 81, 181, 0.2); }
    </style>
@endsection

@section("script")
    <script>
        const professions = @json($content['professions']);

        const SFX = {
            src: {
                correct: "/slider/sounds/correct.wav",
                wrong: "/slider/sounds/wrong.wav",
                success: "/slider/sounds/success.wav",
            },
            volume: {
                correct: 1,
                wrong: 1,
                success: 1,
            }
        };

        const audio = {
            correct: new Audio(SFX.src.correct),
            wrong: new Audio(SFX.src.wrong),
            success: new Audio(SFX.src.success),
        };

        Object.entries(audio).forEach(([k, a]) => {
            a.preload = "auto";
            a.volume = SFX.volume[k] ?? 1;
        });

        function playSfx(name){
            const a = audio[name];
            if (!a) return;
            try{
                a.pause();
                a.currentTime = 0;
                a.volume = SFX.volume[name] ?? 1;
                a.play().catch(() => {});
            }catch(e){}
        }

        window.stopSlideAudio = function(){
            Object.values(audio).forEach(a => {
                try{ a.pause(); a.currentTime = 0; }catch(e){}
            });
        };

        let state = {
            shuffled: [],
            curIndex: 0,
            busy: false
        };

        function startGame() {
            const overlay = document.getElementById("victoryOverlay");
            if (overlay) {
                overlay.style.opacity = "0";
                overlay.style.pointerEvents = "none";
            }
            state.curIndex = 0;
            state.shuffled = [...professions].sort(() => Math.random() - 0.5);
            renderCards();
            showNext();
        }

        function renderCards() {
            const grid = document.getElementById('cardGrid');
            grid.innerHTML = '';
            professions.forEach((p, idx) => {
                const card = document.createElement('div');
                card.id = `card-${p.id}`;
                card.className = `prof-card ${p.color} group relative flex cursor-pointer flex-col items-center gap-2 rounded-xl border-2 border-transparent bg-white p-3 shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)] dark:bg-slate-800`;
                card.style.opacity = '1';
                card.style.transform = 'none';
                card.onclick = () => handleChoice(p.id, card);
                card.innerHTML = `
                    <img class="h-[140px] w-full rounded-lg object-contain dark:brightness-90 dark:contrast-110" src="${p.img}" alt="${p.label}">
                    <span class="text-base font-bold text-slate-500 dark:text-slate-100">${p.label}</span>
                    <div class="correct-check">✅</div>
                    <div class="wrong-x">❌</div>
                `;
                grid.appendChild(card);
            });
        }

        function showNext() {
            if (state.curIndex >= professions.length) { endGame(); return; }
            const q = state.shuffled[state.curIndex];
            animateQuestionSlide(q.desc);
        }

        function animateQuestionSlide(newText) {
            const el = document.getElementById('questionText');
            el.textContent = newText;
            el.style.opacity = '1';
            el.style.transform = 'none';
        }

        function handleChoice(id, el) {
            if (state.busy) return;
            const correctObj = state.shuffled[state.curIndex];

            if (id === correctObj.id) {
                state.busy = true;
                playSfx("correct");
                el.classList.add('correct-glow');
                el.querySelector('.correct-check').classList.add('show-check');
                setTimeout(() => {
                    el.remove();
                    state.curIndex++;
                    state.busy = false;
                    showNext();
                }, 800);
            } else {
                state.busy = true;
                playSfx("wrong");
                el.classList.add('card-shake');
                el.querySelector('.wrong-x').classList.add('show-x');

                if (state.curIndex < state.shuffled.length - 1) {
                    const nextRand = Math.floor(Math.random() * (state.shuffled.length - 1 - state.curIndex)) + state.curIndex + 1;
                    const temp = state.shuffled[state.curIndex];
                    state.shuffled[state.curIndex] = state.shuffled[nextRand];
                    state.shuffled[nextRand] = temp;
                }

                setTimeout(() => {
                    const newQ = state.shuffled[state.curIndex];
                    animateQuestionSlide(newQ.desc);
                    setTimeout(() => {
                        el.classList.remove('card-shake');
                        el.querySelector('.wrong-x').classList.remove('show-x');
                        state.busy = false;
                    }, 400);
                }, 100);
            }
        }

        function endGame() {
            playSfx("success");
            const overlay = document.getElementById("victoryOverlay");
            if (overlay) {
                overlay.style.opacity = "1";
                overlay.style.pointerEvents = "auto";
            }
            confetti({ particleCount: 150, spread: 70, origin: { y: 0.6 } });
        }

        document.addEventListener('DOMContentLoaded', startGame);
    </script>
@endsection

@section("content")
    <div class="relative min-h-[100dvh] w-full overflow-x-hidden overflow-y-auto">
        @if(!empty($content['title']) || !empty($content['subtitle']))
            <div class="mx-auto w-full max-w-5xl px-4 sm:px-8 pt-6 sm:pt-8 lg:pt-10">
                <div class="header-spacing text-center space-y-4 sm:space-y-5 mb-4 sm:mb-5">
                    @if(!empty($content['title']))
                        <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $content['title'] }}
                            </span>
                        </h1>
                    @endif

                    @if(!empty($content['subtitle']))
                        <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                            {{ $content['subtitle'] }}
                        </p>
                    @endif
                </div>
            </div>
        @endif

        <section class="relative mx-auto w-full max-w-5xl px-4 sm:px-8">
            <div class="rounded-[2rem] border border-slate-200/80 bg-white/60 px-4 py-5 backdrop-blur dark:border-slate-700 dark:bg-slate-800/60 sm:px-6 sm:py-6 md:px-8">
                <div class="question-mask">
                    <h2 id="questionText" class="text-center text-2xl font-extrabold leading-tight text-slate-700 dark:text-slate-100 md:text-4xl lg:text-4xl"></h2>
                </div>
            </div>
        </section>

        <main class="mx-auto flex max-w-7xl items-center justify-center px-4 py-5 sm:px-8 sm:py-6 md:px-8">
            <div id="cardGrid" class="grid w-full {{ $gridClass }} gap-6"></div>
        </main>

        <div id="victoryOverlay" class="fixed inset-0 z-50 flex items-center justify-center bg-white/95 backdrop-blur-xl opacity-0 pointer-events-none dark:bg-slate-900/95">
            <div class="max-w-lg p-8 text-center">
                <div class="mb-8 text-8xl">🎉</div>
                <h2 class="mb-6 text-4xl font-black text-slate-800 dark:text-slate-100 sm:text-5xl">Excellent!</h2>
                <p class="mb-10 text-lg text-slate-500 dark:text-slate-300 sm:text-xl">You identified all professions correctly.</p>
                <button onclick="startGame()" class="rounded-2xl bg-blue-500 px-12 py-5 text-xl font-bold text-white shadow-lg">
                    Play Again
                </button>
            </div>
        </div>
    </div>
@endsection
