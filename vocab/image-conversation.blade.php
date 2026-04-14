@extends("slider.simple-layout")



@section("style")
    <style>
        .wave-bar {
            display: none;
            width: 3px;
            height: 12px;
            background: #000000;
            border-radius: 2px;
            margin: 0 1px;
        }

        .dark .wave-bar {
            background: #ffffff;
        }

        .ctrl-btn.speaking .wave-bar {
            display: block;
            animation: waveGrowth 0.6s infinite ease-in-out;
        }

        .ctrl-btn.speaking .static-icon {
            display: none;
        }

        .ctrl-btn {
            color: #000000;
        }

        .dark .ctrl-btn {
            color: #ffffff;
        }

        @keyframes waveGrowth {
            0%, 100% { height: 6px; }
            50% { height: 16px; }
        }

        .dialog-modal-open {
            overflow: hidden;
        }
    </style>
@endsection

@section("content")
    <main class="w-full max-w-6xl min-h-[100dvh] px-4 sm:px-8 mx-auto py-4 sm:py-6 flex flex-col justify-center">
        <section class="w-full p-2 sm:p-4 lg:p-0">

            @include('slider.components.title-subtitle')

            {{-- Mobile: speaker cards side-by-side | Desktop: left | center | right --}}
            <div class="mt-4 grid grid-cols-2 items-start gap-3 lg:flex lg:flex-nowrap lg:items-center lg:justify-center lg:gap-8">

                <aside id="nancyCard" class="col-span-1 flex w-full lg:w-[220px] justify-center lg:justify-end flex-shrink-0 lg:order-1">
                    <div class="w-full max-w-[180px] lg:max-w-[220px] p-1 sm:p-2">
                        <div class="relative">
                            <img src="{{ $content['people']['left']['image'] }}" class="w-full aspect-square rounded-[22px] lg:rounded-[28px] border-[4px] lg:border-[5px] border-slate-900 bg-white object-cover shadow-[8px_8px_0_rgba(2,6,23,0.1)] rotate-[-2deg]" draggable="false" />
                            <div class="absolute -bottom-2 lg:-bottom-3 left-1/2 -translate-x-1/2 px-3 lg:px-4 py-1 lg:py-1.5 rounded-lg lg:rounded-xl font-black uppercase text-[0.65rem] lg:text-[0.70rem] bg-slate-900 text-white whitespace-nowrap">
                                {{ $content['people']['left']['name'] }}
                            </div>
                        </div>
                    </div>
                </aside>

                <aside id="gordonCard" class="col-span-1 flex w-full lg:w-[220px] justify-center lg:justify-start flex-shrink-0 lg:order-3">
                    <div class="w-full max-w-[180px] lg:max-w-[220px] p-1 sm:p-2">
                        <div class="relative">
                            <img src="{{ $content['people']['right']['image'] }}" class="w-full aspect-square rounded-[22px] lg:rounded-[28px] border-[4px] lg:border-[5px] border-slate-900 bg-white object-cover shadow-[10px_10px_0_rgba(2,6,23,0.10)] rotate-[2deg]" draggable="false" />
                            <div class="absolute -bottom-2 lg:-bottom-3 left-1/2 -translate-x-1/2 px-3 lg:px-4 py-1 lg:py-1.5 rounded-lg lg:rounded-xl font-black uppercase text-[0.65rem] lg:text-[0.70rem] bg-slate-900 text-white whitespace-nowrap">
                                {{ $content['people']['right']['name'] }}
                            </div>
                        </div>
                    </div>
                </aside>

                <section id="centerPane" class="col-span-2 w-full max-w-[700px] mx-auto p-2 lg:order-2">
                    <div class="space-y-4">
                        <div class="flex justify-start">
                            <div id="nancyBubble" class="relative w-full sm:w-[92%] rounded-[24px_24px_24px_10px] border-2 border-slate-900 bg-indigo-50/90 shadow-[7px_7px_0_rgba(2,6,23,0.08)] px-4 py-4 dark:border-slate-100 dark:bg-indigo-950/80 dark:shadow-none lg:after:absolute lg:after:left-[-16px] lg:after:top-7 lg:after:w-0 lg:after:h-0 lg:after:border-y-[10px] lg:after:border-y-transparent lg:after:border-r-[16px] lg:after:border-r-slate-900 dark:lg:after:border-r-slate-100">
                                <div class="flex items-center justify-between gap-3">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[0.70rem] font-black uppercase bg-slate-900 text-white">
                                        {{ $content['people']['left']['name'] }}
                                    </span>
                                    <button id="nancyCtrlBtn" class="ctrl-btn inline-flex items-center justify-center h-10 w-10 rounded-full border-2 border-slate-900 bg-white shadow-[4px_4px_0_rgba(2,6,23,0.10)] transition active:scale-95 dark:border-slate-100 dark:bg-slate-900 dark:text-slate-100 dark:shadow-none">
                                        <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                        </svg>
                                        <div class="wave-bar" style="animation-delay: 0.1s"></div>
                                        <div class="wave-bar" style="animation-delay: 0.2s"></div>
                                        <div class="wave-bar" style="animation-delay: 0.3s"></div>
                                    </button>
                                </div>
                                <div class="mt-2 text-[1.05rem] sm:text-[1.2rem] font-extrabold text-slate-900 leading-tight dark:text-slate-100">
                                    <span id="nancyText"></span><span id="nancyCaret" class="hidden ml-1 inline-block animate-pulse">▍</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <div id="gordonBubble" class="relative w-full sm:w-[92%] rounded-[24px_24px_10px_24px] border-2 border-slate-900 bg-purple-50/90 shadow-[7px_7px_0_rgba(2,6,23,0.08)] px-4 py-4 dark:border-slate-100 dark:bg-purple-950/80 dark:shadow-none lg:after:absolute lg:after:right-[-16px] lg:after:top-7 lg:after:w-0 lg:after:h-0 lg:after:border-y-[10px] lg:after:border-y-transparent lg:after:border-l-[16px] lg:after:border-l-slate-900 dark:lg:after:border-l-slate-100">
                                <div class="flex items-center justify-between gap-3">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[0.70rem] font-black uppercase bg-slate-900 text-white">
                                        {{ $content['people']['right']['name'] }}
                                    </span>
                                    <button id="gordonCtrlBtn" class="ctrl-btn inline-flex items-center justify-center h-10 w-10 rounded-full border-2 border-slate-900 bg-white shadow-[4px_4px_0_rgba(2,6,23,0.10)] transition active:scale-95 dark:border-slate-100 dark:bg-slate-900 dark:text-slate-100 dark:shadow-none">
                                        <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                        </svg>
                                        <div class="wave-bar" style="animation-delay: 0.1s"></div>
                                        <div class="wave-bar" style="animation-delay: 0.2s"></div>
                                        <div class="wave-bar" style="animation-delay: 0.3s"></div>
                                    </button>
                                </div>
                                <div class="mt-2 text-[1.05rem] sm:text-[1.2rem] font-extrabold text-slate-900 leading-tight dark:text-slate-100">
                                    <span id="gordonText"></span><span id="gordonCaret" class="hidden ml-1 inline-block animate-pulse">▍</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <div class="mt-5 sm:mt-6 flex justify-center">
                <button id="showDialogBtn" type="button" class="inline-flex items-center gap-2 rounded-xl border-2 border-slate-900 bg-white px-5 py-3 text-sm sm:text-base font-black uppercase tracking-[0.08em] text-slate-900 shadow-[6px_6px_0_rgba(2,6,23,0.1)] transition hover:-translate-y-0.5 active:translate-y-0 dark:bg-slate-900 dark:text-slate-100 dark:border-slate-100">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" stroke-width="2.3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h8m-8 4h5m-7 7 1.884-3.768A2 2 0 0 1 9.553 16H18a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2z"/>
                    </svg>
                    <span>Show Dialog</span>
                </button>
            </div>

            @if(($content['show_footer_image'] ?? 0) == 1 && !empty($content['footer_image']))
                <div id="footerImageContainer" class="mt-4 sm:mt-5 flex justify-center">
                    <div class="relative w-full max-w-[680px] lg:w-[540px] lg:max-w-[540px] p-1 sm:p-2">
                        <img src="{{ $content['footer_image'] }}" class="block w-full h-auto rounded-[24px] object-contain" draggable="false" />
                    </div>
                </div>
            @endif

        </section>
    </main>

    <div id="dialogModal" class="fixed inset-0 z-[120] hidden items-center justify-center bg-slate-950/60 px-4 py-6 backdrop-blur-sm">
        <div id="dialogModalBackdrop" class="absolute inset-0"></div>
        <div class="relative z-10 w-full max-w-2xl overflow-hidden rounded-[28px] border-[3px] border-slate-900 bg-white shadow-[14px_14px_0_rgba(2,6,23,0.14)] dark:border-slate-100 dark:bg-slate-900">
            <div class="flex items-center justify-between gap-4 border-b-2 border-slate-900 bg-indigo-50 px-5 py-4 dark:border-slate-100 dark:bg-slate-800">
                <div>
                    <h3 class="text-lg sm:text-xl font-black uppercase tracking-[0.06em] text-slate-900 dark:text-slate-100">Conversation</h3>
                    <p class="text-xs sm:text-sm font-semibold text-slate-600 dark:text-slate-300">Read the full dialogue together.</p>
                </div>
                <button id="closeDialogModalBtn" type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-full border-2 border-slate-900 bg-white text-slate-900 transition hover:bg-slate-100 dark:border-slate-100 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6 6 18"/>
                    </svg>
                </button>
            </div>

            <div id="dialogModalList" class="max-h-[70vh] overflow-y-auto px-4 py-4 sm:px-6 sm:py-6 space-y-3 sm:space-y-4"></div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        const dialogues = @json($content['dialogues']);

        const els = {
            nBtn: document.getElementById("nancyCtrlBtn"),
            gBtn: document.getElementById("gordonCtrlBtn"),
            nBubble: document.getElementById("nancyBubble"),
            gBubble: document.getElementById("gordonBubble"),
            nText: document.getElementById("nancyText"),
            gText: document.getElementById("gordonText"),
            nCaret: document.getElementById("nancyCaret"),
            gCaret: document.getElementById("gordonCaret"),
            showDialogBtn: document.getElementById("showDialogBtn"),
            dialogModal: document.getElementById("dialogModal"),
            dialogModalBackdrop: document.getElementById("dialogModalBackdrop"),
            closeDialogModalBtn: document.getElementById("closeDialogModalBtn"),
            dialogModalList: document.getElementById("dialogModalList"),
        };

        const state = {
            idx: 0,
            running: false,
            stopRequested: false,
            fallbackTimer: null,
            currentAudio: null,
        };

        function stopAudio() {
            if (state.fallbackTimer) clearInterval(state.fallbackTimer);
            if (state.currentAudio) {
                try {
                    state.currentAudio.pause();
                    state.currentAudio.currentTime = 0;
                } catch (_) {}
                state.currentAudio = null;
            }
        }

        window.stopSlideAudio = function () {
            stopConversation();
        };

        function updateButtonsIdle() {
            els.nBtn.classList.remove("hidden", "speaking");
            els.gBtn.classList.remove("hidden", "speaking");
        }

        function updateButtonsDuring(activeSide) {
            if (activeSide === "left") {
                els.nBtn.classList.remove("hidden");
                els.nBtn.classList.add("speaking");
                els.gBtn.classList.add("hidden");
            } else {
                els.gBtn.classList.remove("hidden");
                els.gBtn.classList.add("speaking");
                els.nBtn.classList.add("hidden");
            }
        }

        function setActive(side) {
            const ring = ["ring-4", "ring-indigo-500/20"];

            els.nBubble.classList.remove(...ring);
            els.gBubble.classList.remove(...ring);
            els.nCaret.classList.add("hidden");
            els.gCaret.classList.add("hidden");

            if (side === "left") {
                els.nBubble.classList.add(...ring);
                els.nCaret.classList.remove("hidden");
            } else if (side === "right") {
                els.gBubble.classList.add(...ring);
                els.gCaret.classList.remove("hidden");
            }

            if (state.running) updateButtonsDuring(side);
            else updateButtonsIdle();
        }

        function stripHtml(html) {
            const temp = document.createElement("div");
            temp.innerHTML = html;
            return temp.textContent || temp.innerText || "";
        }

        function buildPartialHtml(html, visibleChars) {
            if (visibleChars <= 0) return "";

            const source = document.createElement("div");
            const output = document.createElement("div");
            let remaining = visibleChars;

            source.innerHTML = html;

            function appendNodes(fromNode, toNode) {
                for (const child of fromNode.childNodes) {
                    if (remaining <= 0) break;

                    if (child.nodeType === Node.TEXT_NODE) {
                        const text = child.textContent || "";
                        if (!text) continue;

                        const slice = text.slice(0, remaining);
                        toNode.appendChild(document.createTextNode(slice));
                        remaining -= slice.length;

                        if (slice.length < text.length) break;
                    } else if (child.nodeType === Node.ELEMENT_NODE) {
                        const clone = child.cloneNode(false);
                        toNode.appendChild(clone);
                        appendNodes(child, clone);
                    }
                }
            }

            appendNodes(source, output);
            return output.innerHTML;
        }

        function speakAndReveal(line) {
            return new Promise((resolve) => {
                const { text, side, sound } = line;
                const targetTextEl = side === "left" ? els.nText : els.gText;
                const plainText = stripHtml(text);
                targetTextEl.innerHTML = "";

                const finish = () => {
                    stopAudio();
                    targetTextEl.innerHTML = text;
                    resolve();
                };

                if (sound) {
                    const audio = new Audio(sound);
                    state.currentAudio = audio;
                    audio.onended = finish;
                    audio.onerror = finish;

                    let i = 0;
                    state.fallbackTimer = setInterval(() => {
                        i = Math.min(plainText.length, i + 1);
                        targetTextEl.innerHTML = buildPartialHtml(text, i);
                    }, 40);

                    audio.play().catch(finish);
                } else {
                    finish();
                }
            });
        }

        async function runConversation() {
            if (state.running) return;

            state.running = true;
            state.stopRequested = false;
            state.idx = 0;
            els.nText.innerHTML = "";
            els.gText.innerHTML = "";

            while (state.idx < dialogues.length && !state.stopRequested) {
                const line = dialogues[state.idx];
                setActive(line.side);
                await speakAndReveal(line);

                if (state.stopRequested) break;

                await new Promise(r => setTimeout(r, 450));
                state.idx++;
            }

            state.running = false;
            setActive("none");
        }

        function stopConversation() {
            state.stopRequested = true;
            stopAudio();
            state.running = false;
            updateButtonsIdle();
            setActive("none");
        }

        function renderDialogModal() {
            if (!els.dialogModalList) return;

            els.dialogModalList.innerHTML = "";

            dialogues.forEach((line) => {
                const item = document.createElement("div");
                const isLeft = line.side === "left";

                item.className = `rounded-[22px] border-2 px-4 py-3 sm:px-5 sm:py-4 shadow-[5px_5px_0_rgba(2,6,23,0.08)] ${
                    isLeft
                        ? "border-slate-900 bg-indigo-50 text-slate-900 dark:border-slate-100 dark:bg-indigo-950 dark:text-slate-100"
                        : "border-slate-900 bg-purple-50 text-slate-900 dark:border-slate-100 dark:bg-purple-950 dark:text-slate-100"
                }`;

                const speakerName = isLeft ? @json($content['people']['left']['name']) : @json($content['people']['right']['name']);

                item.innerHTML = `
                    <div class="mb-2 text-[0.7rem] sm:text-[0.78rem] font-black uppercase tracking-[0.08em] text-slate-600 dark:text-slate-300">${speakerName}</div>
                    <div class="text-base sm:text-lg font-extrabold leading-snug">${line.text}</div>
                `;

                els.dialogModalList.appendChild(item);
            });
        }

        function openDialogModal() {
            renderDialogModal();
            els.dialogModal.classList.remove("hidden");
            els.dialogModal.classList.add("flex");
            document.body.classList.add("dialog-modal-open");
        }

        function closeDialogModal() {
            els.dialogModal.classList.add("hidden");
            els.dialogModal.classList.remove("flex");
            document.body.classList.remove("dialog-modal-open");
        }

        els.nBtn.onclick = () => state.running ? stopConversation() : runConversation();
        els.gBtn.onclick = () => state.running ? stopConversation() : runConversation();
        els.showDialogBtn.onclick = openDialogModal;
        els.closeDialogModalBtn.onclick = closeDialogModal;
        els.dialogModalBackdrop.onclick = closeDialogModal;

        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape" && els.dialogModal.classList.contains("flex")) {
                closeDialogModal();
            }
        });
    </script>
@endsection
