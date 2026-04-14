@php
    $content = $content ?? [];
    $title = $content['title'] ?? "Let's Get to Know You!";

    $contentQuestions = $content['questions'] ?? [
        "Where are you from?",
        "What do you do?",
        "Why do you need English?",
        "Do you like sports?",
        "What’s your favourite hobby?",
    ];

    $questions = is_array($contentQuestions)
        ? array_values($contentQuestions)
        : collect($contentQuestions)->values()->all();

    $students = $content['students'] ?? [];
    $students = is_array($students) ? array_values($students) : collect($students)->values()->all();

    $palette = $content['palette'] ?? ['#6366f1', '#10b981', '#f59e0b', '#ef4444', '#f97316'];
    $palette = is_array($palette) ? array_values($palette) : collect($palette)->values()->all();

    $spinButtonText = $content['spin_button_text'] ?? 'Spin wheel';
    $spinningText = $content['spinning_text'] ?? 'Spinning...';
    $spinAgainText = $content['spin_again_text'] ?? 'Spin Again';
    $playAgainText = $content['play_again_text'] ?? 'Play Again';
    $keepText = $content['keep_text'] ?? 'Keep on wheel';
    $removeText = $content['remove_text'] ?? 'Remove Item';
    $selectedLabel = $content['selected_label'] ?? 'Next Challenge Selected';
@endphp
@extends("slider.simple-layout")
@section("style")
    <style>
        .turn-banner-container {
            margin-bottom: 2rem;
            animation: animatePop 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes animatePop {
            0% { transform: scale(0.9); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .action-area {
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.4s;
            pointer-events: none;
        }

        .action-area.active {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .popout-overlay {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .popout-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .popout-question::before {
            content: '';
            position: absolute;
            inset: -20px;
            background: linear-gradient(135deg, #22d3ee, #a855f7, #f43f5e);
            filter: blur(80px);
            opacity: 0.4;
            z-index: -1;
            animation: pulse-aura 4s infinite alternate;
        }

        @keyframes pulse-aura {
            0% { opacity: 0.3; transform: scale(1); }
            100% { opacity: 0.6; transform: scale(1.1); }
        }

        .btn-pro::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .btn-pro:hover::before {
            left: 100%;
        }
    </style>
@endsection
@section("content")
    <div class="slide-container relative min-h-[100dvh] w-full overflow-x-hidden overflow-y-auto">
        <div class="mx-auto grid w-full max-w-[1200px] grid-cols-1 gap-4 px-4 py-6 lg:min-h-[100dvh] lg:grid-cols-[1fr_1.2fr] lg:items-center lg:gap-8 lg:px-12 lg:py-12">
            <div class="side-panel z-10 flex flex-col justify-center text-center lg:text-left lg:items-start items-center w-full">
                @include('slider.components.title-subtitle')

                <div id="turn-banner" class="turn-banner-container w-full max-w-sm">
                    <div class="bg-indigo-600 dark:bg-indigo-700 text-white rounded-3xl p-6 shadow-2xl flex items-center justify-between border-4 border-indigo-400 dark:border-indigo-500 ring-8 ring-indigo-500/10">
                        <div class="space-y-1">
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] opacity-80">Current Speaker</p>
                            <h3 id="playerName" class="text-2xl font-black tracking-tight capitalize">---</h3>
                        </div>
                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center text-white animate-bounce shrink-0 ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"/>
                                <path d="m12 5 7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-4 w-full max-w-sm mx-auto">
                    <button id="spin-btn" class="spin-btn w-full rounded-2xl bg-gradient-to-br from-indigo-600 to-indigo-700 px-10 py-5 text-sm font-extrabold uppercase tracking-[0.05em] text-white shadow-[0_10px_20px_rgba(79,70,229,0.2)] transition-all hover:-translate-y-0.5 hover:shadow-[0_15px_30px_rgba(79,70,229,0.2)] active:translate-y-0 disabled:cursor-not-allowed disabled:opacity-50">
                        {{ $spinButtonText }}
                    </button>

                    <div id="action-area" class="action-area mt-6 flex gap-4 hidden">
                        <button id="resume-btn" class="btn-secondary flex-1 rounded-xl border border-slate-200 bg-slate-100 px-6 py-4 text-sm font-bold text-slate-600 transition-colors hover:bg-slate-200 hover:text-slate-900 dark:border-slate-700 dark:bg-slate-700 dark:text-slate-200 dark:hover:bg-slate-600 dark:hover:text-white">
                            {{ $keepText }}
                        </button>

                        <button id="eliminate-btn" class="btn-secondary flex-1 rounded-xl border border-rose-100 bg-rose-50 px-6 py-4 text-sm font-bold text-rose-600 transition-colors hover:bg-rose-100 hover:text-rose-700 dark:border-rose-900/40 dark:bg-rose-900/30 dark:text-rose-200 dark:hover:bg-rose-900/50">
                            {{ $removeText }}
                        </button>
                    </div>
                </div>
            </div>

            <div class="wheel-section relative flex items-center justify-center max-lg:items-start max-lg:pb-8">
                <div class="wheel-wrapper relative w-[80%] aspect-square drop-shadow-[0_40px_80px_rgba(0,0,0,0.15)] max-lg:w-[95%] max-lg:max-w-[380px]">
                    <svg class="pointer-marker absolute left-[-1rem] top-1/2 z-[60] w-[45px] -translate-y-1/2 fill-[#1e1b4b] drop-shadow-[4px_0_4px_rgba(0,0,0,0.1)]" viewBox="0 0 60 40">
                        <path d="M60 20L0 40L10 20L0 0L60 20Z" />
                    </svg>

                    <svg id="wheel-svg" class="h-full w-full origin-center" viewBox="0 0 1000 1000"></svg>

                    <div class="center-hub absolute left-1/2 top-1/2 z-50 flex aspect-square w-[32%] -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full border-4 border-white bg-white/90 p-6 text-center shadow-[0_10px_25px_-5px_rgba(0,0,0,0.1)] backdrop-blur transition-colors dark:border-slate-800 dark:bg-slate-800/90">
                        <div id="hub-message" class="text-sm font-black text-indigo-600 uppercase tracking-widest">Ready?</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="popout-reveal" class="popout-overlay fixed inset-0 z-[1000] flex items-center justify-center bg-[radial-gradient(circle_at_center,rgba(15,23,42,0.85)_0%,rgba(2,6,23,0.98)_100%)] backdrop-blur-2xl saturate-150">
        <div class="popout-card relative w-[90%] max-w-[1000px] px-6 py-12 text-center sm:px-12 sm:py-20">
            <span class="popout-label mb-8 block translate-y-5 text-[0.85rem] font-extrabold uppercase tracking-[0.5em] text-cyan-300 opacity-0">
                {{ $selectedLabel }}
            </span>

            <h1 id="popout-text" class="popout-question relative z-10 mb-12 text-[2.8rem] font-black leading-[1.1] tracking-[-0.04em] opacity-0 blur-[20px] scale-90 text-transparent bg-clip-text bg-gradient-to-br from-cyan-300 via-purple-500 to-rose-500 sm:text-[6.5rem] sm:leading-none sm:mb-20">
                ---
            </h1>

            <div class="popout-actions flex flex-col items-center justify-center gap-4 opacity-0 translate-y-8 sm:flex-row sm:gap-10">
                <button id="popout-keep-btn" class="btn-pro btn-keep-pro relative flex items-center gap-3 overflow-hidden whitespace-nowrap rounded-xl border-2 border-cyan-300/30 bg-white/5 px-8 py-4 text-xs font-extrabold uppercase tracking-[0.05em] text-white backdrop-blur transition-all duration-300 hover:-translate-y-0.5 hover:bg-white/10 hover:border-cyan-300 hover:shadow-[0_0_40px_rgba(34,211,238,0.4)] sm:rounded-2xl sm:px-14 sm:py-6 sm:text-sm sm:tracking-[0.1em] shadow-[0_0_20px_rgba(34,211,238,0.1)]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6L9 17L4 12"/>
                    </svg>
                    <span>{{ $keepText }}</span>
                </button>

                <button id="popout-remove-btn" class="btn-pro btn-remove-pro relative flex items-center gap-3 overflow-hidden whitespace-nowrap rounded-xl border-2 border-rose-500/30 bg-white/5 px-8 py-4 text-xs font-extrabold uppercase tracking-[0.05em] text-white backdrop-blur transition-all duration-300 hover:-translate-y-0.5 hover:bg-white/10 hover:border-rose-500 hover:shadow-[0_0_40px_rgba(244,63,94,0.4)] sm:rounded-2xl sm:px-14 sm:py-6 sm:text-sm sm:tracking-[0.1em] shadow-[0_0_20px_rgba(244,63,94,0.1)]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 6h18"/>
                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                        <line x1="10" y1="11" x2="10" y2="17"/>
                        <line x1="14" y1="11" x2="14" y2="17"/>
                    </svg>
                    <span>{{ $removeText }}</span>
                </button>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        const originalQuestions = @json($questions);
        let questions = [...originalQuestions];

        const students = @json($students);
        if (!students.length) {
            document.getElementById("turn-banner").classList.add("hidden");
        }

        let playerIx = 0;
        let spinning = false;
        let selectedIx = -1;
        const PALETTE = @json($palette);

        const wheelSvg = document.getElementById('wheel-svg');
        const spinBtn = document.getElementById('spin-btn');
        const hubMessage = document.getElementById('hub-message');
        const playerNameEl = document.getElementById('playerName');
        const actionArea = document.getElementById('action-area');
        const popoutReveal = document.getElementById('popout-reveal');
        const popoutText = document.getElementById('popout-text');
        const keepBtn = document.getElementById('popout-keep-btn');
        const removeBtn = document.getElementById('popout-remove-btn');

        const SPIN_BUTTON_TEXT = @json($spinButtonText);
        const SPINNING_TEXT = @json($spinningText);
        const SPIN_AGAIN_TEXT = @json($spinAgainText);
        const PLAY_AGAIN_TEXT = @json($playAgainText);

        const audio = {
            spin: new Audio('/slider/sounds/spin.wav'),
            win: new Audio('/slider/sounds/success.wav'),
            click: new Audio('/slider/sounds/click.wav')
        };

        audio.spin.volume = 0.5;
        audio.win.volume = 0.4;
        audio.click.volume = 0.3;

        function init() {
            renderPlayer();
            renderWheel();

            spinBtn.addEventListener('click', startSpin);

            keepBtn.addEventListener('click', () => {
                audio.click.currentTime = 0;
                audio.click.play().catch(() => {});
                nextTurn(false);
            });

            removeBtn.addEventListener('click', () => {
                audio.click.currentTime = 0;
                audio.click.play().catch(() => {});
                nextTurn(true);
            });
        }

        function renderPlayer() {
            if (!students.length) return;

            gsap.to(playerNameEl, {
                opacity: 0,
                y: -10,
                duration: 0.2,
                onComplete: () => {
                    playerNameEl.textContent = students[playerIx] ?? '---';
                    gsap.to(playerNameEl, {
                        opacity: 1,
                        y: 0,
                        duration: 0.4,
                        ease: "back.out(2)"
                    });
                }
            });
        }

        function wrapSliceText(text, maxCharsPerLine, maxLines) {
            const words = (text || "").split(/\s+/).filter(Boolean);
            if (!words.length) return [""];

            const lines = [];
            let current = "";

            words.forEach((word) => {
                const next = current ? `${current} ${word}` : word;
                if (next.length <= maxCharsPerLine) {
                    current = next;
                    return;
                }

                if (current) {
                    lines.push(current);
                    current = word;
                    return;
                }

                lines.push(word.slice(0, Math.max(1, maxCharsPerLine - 3)) + "...");
                current = "";
            });

            if (current) lines.push(current);

            if (lines.length > maxLines) {
                const clipped = lines.slice(0, maxLines);
                clipped[maxLines - 1] = clipped[maxLines - 1].replace(/[.,;:!?]?\s*$/, "") + "...";
                return clipped;
            }

            return lines;
        }

        function renderWheel() {
            gsap.set(wheelSvg, { rotation: 0 });
            wheelSvg.innerHTML = '';
            if (questions.length === 0) return;

            const total = questions.length;
            const sliceAngle = 360 / total;
            const radius = 480;
            const center = 500;

            if (total === 1) {
                const circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
                circle.setAttribute("cx", center);
                circle.setAttribute("cy", center);
                circle.setAttribute("r", radius);
                circle.setAttribute("fill", PALETTE[0] || '#6366f1');
                circle.setAttribute("stroke", "#020617");
                circle.setAttribute("stroke-width", "4");
                wheelSvg.appendChild(circle);

                const textEl = document.createElementNS("http://www.w3.org/2000/svg", "text");
                textEl.setAttribute("x", center);
                textEl.setAttribute("y", center - radius * 0.7);
                textEl.setAttribute("fill", "white");
                textEl.setAttribute("font-size", "28");
                textEl.setAttribute("font-weight", "900");
                textEl.setAttribute("text-anchor", "middle");
                textEl.setAttribute("dominant-baseline", "middle");
                textEl.textContent = questions[0];
                wheelSvg.appendChild(textEl);
                return;
            }

            questions.forEach((q, i) => {
                const startAngle = i * sliceAngle;
                const endAngle = (i + 1) * sliceAngle;
                const midAngle = startAngle + (sliceAngle / 2);

                const radStart = Math.PI * startAngle / 180;
                const radEnd = Math.PI * endAngle / 180;

                const x1 = center + radius * Math.cos(radStart);
                const y1 = center + radius * Math.sin(radStart);
                const x2 = center + radius * Math.cos(radEnd);
                const y2 = center + radius * Math.sin(radEnd);

                const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
                path.setAttribute("d", `M ${center} ${center} L ${x1} ${y1} A ${radius} ${radius} 0 ${sliceAngle > 180 ? 1 : 0} 1 ${x2} ${y2} Z`);
                path.setAttribute("fill", PALETTE[i % PALETTE.length] || '#6366f1');
                path.setAttribute("stroke", "#020617");
                path.setAttribute("stroke-width", "4");
                wheelSvg.appendChild(path);

                const maxCharsPerLine = total > 10 ? 10 : total > 8 ? 12 : 14;
                const maxLines = total > 8 ? 2 : 3;
                const lines = wrapSliceText(q, maxCharsPerLine, maxLines);
                const textRadius = lines.length >= 3 ? radius * 0.62 : radius * 0.65;
                const tx = center + textRadius * Math.cos(Math.PI * midAngle / 180);
                const ty = center + textRadius * Math.sin(Math.PI * midAngle / 180);

                let textRotation = midAngle;
                if (midAngle > 90 && midAngle < 270) textRotation += 180;

                const textEl = document.createElementNS("http://www.w3.org/2000/svg", "text");
                textEl.setAttribute("x", tx);
                textEl.setAttribute("y", ty);
                textEl.setAttribute("fill", "white");
                const fontSize = total > 10 ? 15 : total > 8 ? 18 : (lines.length >= 3 ? 19 : 22);
                textEl.setAttribute("font-size", String(fontSize));
                textEl.setAttribute("font-weight", "800");
                textEl.setAttribute("text-anchor", "middle");
                textEl.setAttribute("dominant-baseline", "middle");
                textEl.setAttribute("transform", `rotate(${textRotation}, ${tx}, ${ty})`);

                const firstDy = -((lines.length - 1) * 0.55);
                lines.forEach((line, idx) => {
                    const tspan = document.createElementNS("http://www.w3.org/2000/svg", "tspan");
                    tspan.setAttribute("x", tx);
                    tspan.setAttribute("dy", idx === 0 ? `${firstDy}em` : "1.1em");
                    tspan.textContent = line;
                    textEl.appendChild(tspan);
                });

                wheelSvg.appendChild(textEl);
            });
        }

        function startSpin() {
            if (questions.length === 0) {
                resetSession();
                return;
            }

            if (spinning) return;

            spinning = true;
            spinBtn.disabled = true;
            spinBtn.textContent = SPINNING_TEXT;
            hubMessage.textContent = "WAIT...";
            actionArea.classList.remove('active');
            popoutReveal.classList.remove('active');

            if (questions.length === 1) {
                finalizeSpin();
                return;
            }

            audio.spin.currentTime = 0;
            audio.spin.play().catch(() => {});

            const extra = 1800 + Math.random() * 1800;
            gsap.to(wheelSvg, {
                rotation: `+=${extra}`,
                duration: 5,
                ease: "power4.out",
                onComplete: finalizeSpin
            });
        }

        function finalizeSpin() {
            spinning = false;
            audio.spin.pause();

            const currentRotation = gsap.getProperty(wheelSvg, "rotation");
            const normalized = ((currentRotation % 360) + 360) % 360;
            const winningAngle = (180 - normalized + 360) % 360;
            selectedIx = Math.floor(winningAngle / (360 / questions.length));

            const question = questions[selectedIx];
            popoutText.textContent = String(question || '').toUpperCase();
            hubMessage.textContent = "DONE!";

            popoutReveal.classList.add('active');

            const tl = gsap.timeline();
            tl.to('.popout-label', { opacity: 1, y: 0, duration: 0.6, ease: "power3.out" })
                .to('.popout-question', {
                    opacity: 1,
                    filter: "blur(0px)",
                    scale: 1,
                    duration: 0.8,
                    ease: "expo.out"
                }, "-=0.3")
                .to('.popout-actions', { opacity: 1, y: 0, duration: 0.6, ease: "back.out(1.7)" }, "-=0.4");

            gsap.to(popoutText, {
                y: -15,
                duration: 3,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut"
            });

            spinBtn.textContent = SPIN_AGAIN_TEXT;
        }

        function nextTurn(eliminate) {
            if (eliminate && selectedIx > -1) {
                questions.splice(selectedIx, 1);
                renderWheel();
            }

            if (questions.length === 0) {
                popoutReveal.classList.remove('active');
                gsap.to('.wheel-section', { opacity: 0, scale: 0.8, duration: 0.8, ease: "power3.inOut" });

                audio.win.currentTime = 0;
                audio.win.play().catch(() => {});

                setTimeout(() => {
                    const winScreen = document.getElementById('win-screen');
                    if (winScreen) {
                        winScreen.classList.add('active');
                    }
                    if (typeof confetti === 'function') {
                        confetti({ particleCount: 150, spread: 70, origin: { y: 0.6 } });
                    }
                }, 400);

                spinBtn.disabled = false;
                spinBtn.textContent = PLAY_AGAIN_TEXT;
                return;
            }

            if (students.length) {
                playerIx = (playerIx + 1) % students.length;
                renderPlayer();
            }

            hubMessage.textContent = "GO!";
            hubMessage.style.fontSize = "0.875rem";
            hubMessage.classList.remove('font-black');

            spinBtn.disabled = false;
            spinBtn.textContent = SPIN_BUTTON_TEXT;

            popoutReveal.classList.remove('active');
            gsap.set(['.popout-label', '.popout-question', '.popout-actions'], { clearProps: "all" });

            actionArea.classList.remove('active');
        }

        function resetSession() {
            questions = [...originalQuestions];
            playerIx = 0;
            spinning = false;
            selectedIx = -1;

            const winScreen = document.getElementById('win-screen');
            if (winScreen) {
                winScreen.classList.remove('active');
            }

            gsap.to('.wheel-section', { opacity: 1, scale: 1, duration: 0.8, ease: "power3.out" });
            hubMessage.textContent = "Ready?";
            hubMessage.style.fontSize = "0.875rem";
            hubMessage.classList.remove('font-black');

            renderWheel();
            renderPlayer();

            spinBtn.disabled = false;
            spinBtn.textContent = SPIN_BUTTON_TEXT;
            actionArea.classList.remove('active');
            popoutReveal.classList.remove('active');
        }

        window.stopSlideAudio = function() {
            if (audio) {
                Object.values(audio).forEach(a => {
                    if (a) {
                        a.pause();
                        a.currentTime = 0;
                    }
                });
            }

            gsap.killTweensOf(wheelSvg);
            spinning = false;
            spinBtn.disabled = false;
            spinBtn.textContent = SPIN_BUTTON_TEXT;

            if (window.speechSynthesis.speaking) {
                window.speechSynthesis.cancel();
            }
        };

        init();
    </script>
@endsection