@extends("slider.simple-layout")

@php
    $content = $content ?? [];
    $isOrangeTheme = ($theme['name'] ?? null) === 'orange';
    $accentGradient = $isOrangeTheme
        ? 'linear-gradient(135deg, rgba(249,115,22,.95), rgba(234,88,12,.92))'
        : 'linear-gradient(135deg, rgba(79,70,229,.95), rgba(37,99,235,.92))';
    $accentShadow = $isOrangeTheme ? 'rgba(249,115,22,.45)' : 'rgba(79,70,229,.55)';
    $accentSolid = $isOrangeTheme ? 'rgb(234 88 12)' : 'rgb(79 70 229)';
    $accentSoft = $isOrangeTheme ? 'rgba(249,115,22,.12)' : 'rgba(79,70,229,.12)';
    $dealButtonClass = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 via-indigo-600 to-blue-600'));

    $SFX = [
        'click'  => asset('slider/sounds/tap.wav'),
        'volume' => 1, // ✅ volume = 1
    ];
@endphp

@section('title', $content['page_title'] ?? ($content['title'] ?? 'Speaking Cards'))

@section("style")
    <style>
        :root { --controlsH: 92px; }

        .surface{
            border-radius: 24px;
            border: 1px solid rgba(226,232,240,.65);
            background: rgba(255,255,255,.72);
            backdrop-filter: blur(14px);
            box-shadow: 0 18px 40px -26px rgba(15,23,42,.35);
        }
        .dark .surface{
            border-color: rgba(51,65,85,.45);
            background: rgba(2,6,23,.42);
        }

        .deck-back{
            border-radius: 28px;
            border: 2px solid rgba(255,255,255,.18);
            background: {{ $accentGradient }};
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px -28px {{ $accentShadow }};
        }
        .deck-back::before{
            content:"";
            position:absolute; inset:0;
            background-image:
                    repeating-linear-gradient(45deg, rgba(255,255,255,.14) 0px, rgba(255,255,255,.14) 10px, transparent 10px, transparent 20px),
                    radial-gradient(circle, rgba(255,255,255,.16) 12%, transparent 12%);
            background-size: 28px 28px, 28px 28px;
            opacity: .9;
        }
        .deck-back::after{
            content:"";
            position:absolute; inset:12px;
            border: 2px dashed rgba(255,255,255,.30);
            border-radius: 18px;
        }

        .blank{
            display:inline-flex;
            align-items:flex-end;
            justify-content:center;
            padding:.08rem .55rem;
            border-bottom: 3px solid {{ $accentSolid }};
            color: {{ $accentSolid }};
            font-weight: 700;
            letter-spacing: .06em;
            background: {{ $accentSoft }};
            border-radius: 14px;
            min-width: calc(var(--chars) * 0.65em + 1.35em);
            line-height: 1.05;
            vertical-align: baseline;
        }
        .answer-pill{
            display:inline-flex;
            align-items:center;
            gap:.45rem;
            padding:.35rem .7rem;
            border-radius: 999px;
            border: 1px solid rgba(226,232,240,.8);
            background: rgba(255,255,255,.8);
            color: rgb(15 23 42);
            font-weight: 700;
            box-shadow: 0 18px 30px -24px rgba(15,23,42,.35);
        }
        .dark .answer-pill{
            border-color: rgba(51,65,85,.55);
            background: rgba(15,23,42,.6);
            color: rgb(248 250 252);
        }

        #toastOverlay{
            position: fixed;
            left: 50%;
            transform: translateX(-50%);
            bottom: calc(var(--controlsH) + env(safe-area-inset-bottom) + 18px);
            z-index: 60;
            width: min(100%, 64rem);
            pointer-events: none;
            padding: 0 1rem;
        }
        .toast{
            pointer-events: auto;
            border-radius: 18px;
            border: 1px solid rgba(226,232,240,.65);
            background: rgba(255,255,255,.78);
            backdrop-filter: blur(14px);
            box-shadow: 0 18px 40px -26px rgba(15,23,42,.35);
        }
        .dark .toast{
            border-color: rgba(51,65,85,.45);
            background: rgba(2,6,23,.42);
        }

        .ghost{
            position: fixed;
            z-index: 9999;
            transform-origin: center;
            pointer-events: none;
            filter: drop-shadow(0 18px 26px rgba(0,0,0,.22));
        }

        .person-image-frame{
            overflow: hidden;
            border-radius: 1.5rem;
            border: 1px solid rgba(226,232,240,.75);
            background: rgba(255,255,255,.88);
            box-shadow: 0 18px 30px -24px rgba(15,23,42,.35);
        }
        .dark .person-image-frame{
            border-color: rgba(51,65,85,.55);
            background: rgba(15,23,42,.6);
        }

        .person-image{
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        @media (prefers-reduced-motion: reduce){
            *{ animation: none !important; transition: none !important; }
        }
    </style>
@endsection

@section("content")
    <main class="w-full">
        <div id="app" class="mx-auto w-full max-w-6xl px-4 sm:px-8 pt-6 sm:pt-8 pb-32 lg:pb-12">
            @include('slider.components.title-subtitle')

            <main class="grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-6 items-stretch">
                <section id="deckPanel" class="lg:col-span-4 surface p-4 sm:p-5 hidden md:flex flex-col">
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <span class="text-xl">🂠</span>
                            <div class="font-black text-lg text-slate-900 dark:text-slate-50">Deck</div>
                        </div>
                        <div class="px-3 py-1.5 rounded-full text-sm font-black
                                    ring-1 ring-slate-200/60 dark:ring-slate-700/40
                                    bg-white/70 dark:bg-slate-900/25
                                    text-slate-900 dark:text-slate-50">
                            <span id="deckCount">0</span> left
                        </div>
                    </div>

                    <div class="mt-4 flex-1 flex items-center justify-center">
                        <div class="relative w-full max-w-[300px] aspect-[3/4]">
                            <div id="deckStack" class="absolute inset-0"></div>

                            <div id="deckEmpty"
                                 class="absolute inset-0 hidden items-center justify-center text-center px-6 rounded-[28px]
                                        border-2 border-dashed border-slate-200/70 dark:border-slate-700/40
                                        bg-white/55 dark:bg-slate-950/30 text-slate-600 dark:text-slate-300">
                                <div>
                                    <div class="text-4xl mb-2">📭</div>
                                    <div class="font-black">No more cards</div>
                                    <div class="text-sm font-medium mt-1">Press Shuffle to restart</div>
                                </div>
                            </div>

                            <div id="deckAnchor" class="absolute inset-0"></div>
                        </div>
                    </div>

                    <div class="mt-4 text-sm font-medium text-slate-600 dark:text-slate-300">
                        Tap <span class="text-slate-900 dark:text-slate-50 font-black">Deal</span> to flip a card.
                    </div>
                </section>

                <section id="playPanel" class="lg:col-span-8 surface p-4 sm:p-6 flex flex-col">
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <span class="text-xl">🎤</span>
                            <div class="font-black text-lg text-slate-900 dark:text-slate-50">Cards</div>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="px-3 py-1.5 rounded-full text-sm font-black
                                        ring-1 ring-slate-200/60 dark:ring-slate-700/40
                                        bg-white/70 dark:bg-slate-900/25
                                        text-slate-900 dark:text-slate-50">
                                ⏱️ <span id="timer" class="tabular-nums">00:00</span>
                            </div>
                            <div class="px-3 py-1.5 rounded-full text-sm font-black
                                        ring-1 ring-slate-200/60 dark:ring-slate-700/40
                                        bg-white/70 dark:bg-slate-900/25
                                        text-slate-900 dark:text-slate-50">
                                <span id="progress">0</span>/<span id="totalCards">0</span>
                            </div>
                        </div>
                    </div>

                    @if(!empty($content['example']))
                        <div class="mt-4 rounded-2xl border border-slate-200/70 dark:border-slate-700/40 bg-white/70 dark:bg-slate-900/25 px-4 py-3 text-left">
                            <div class="text-[11px] font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
                                Example
                            </div>
                            <div class="mt-1 text-base sm:text-lg font-bold text-slate-900 dark:text-slate-50">
                                {{ $content['example'] }}
                            </div>
                        </div>
                    @endif

                    <div id="emptyPlay" class="mt-5 flex-1 flex items-center justify-center text-center px-4">
                        <div class="max-w-md">
                            <div class="mx-auto w-16 h-16 rounded-2xl flex items-center justify-center text-3xl
                                        ring-1 ring-slate-200/60 dark:ring-slate-700/40
                                        bg-white/70 dark:bg-slate-900/25">
                                🗣️
                            </div>
                            <h2 class="mt-4 text-2xl font-black text-slate-900 dark:text-slate-50">Ready?</h2>
                            <p class="mt-2 text-base font-medium text-slate-600 dark:text-slate-300">
                                Press <span class="text-slate-900 dark:text-slate-50 font-black">Deal</span>.
                            </p>
                        </div>
                    </div>

                    <div id="cardSlot" class="mt-5 hidden"></div>
                    <div id="playAnchor" class="h-0"></div>
                </section>
            </main>
        </div>

        <div id="toastOverlay">
            <div id="toastArea" class="space-y-2"></div>
        </div>

        <div id="bottomBar" class="fixed bottom-4 left-1/2 -translate-x-1/2 w-full max-w-6xl px-4 sm:px-8 z-50"
             style="padding-bottom: env(safe-area-inset-bottom);">
            <div id="controlsCard" class="surface p-2 sm:p-4">
                <div class="flex items-center justify-center gap-2 sm:gap-3">
                    <button id="btnDeal"
                            class="w-24 sm:w-28 rounded-2xl font-black
                                   flex flex-col items-center justify-center gap-1 py-2.5 sm:py-3.5 text-white
                                   shadow-xl {{ $dealButtonClass }}">
                        <div class="text-xl sm:text-2xl leading-none">✨</div>
                        <div class="text-[11px] sm:text-sm leading-none">Deal</div>
                    </button>

                    <button id="btnShuffle"
                            class="w-24 sm:w-28 rounded-2xl font-black
                                   flex flex-col items-center justify-center gap-1 py-2.5 sm:py-3.5
                                   ring-1 ring-slate-200/60 dark:ring-slate-700/40
                                   bg-white/70 dark:bg-slate-900/25
                                   text-slate-900 dark:text-slate-50 opacity-60 pointer-events-none"
                            disabled>
                        <div class="text-xl sm:text-2xl leading-none">🔀</div>
                        <div class="text-[11px] sm:text-sm leading-none">Shuffle</div>
                    </button>

                    <button id="btnUndo"
                            class="w-24 sm:w-28 rounded-2xl font-black
                                   flex flex-col items-center justify-center gap-1 py-2.5 sm:py-3.5
                                   ring-1 ring-slate-200/60 dark:ring-slate-700/40
                                   bg-white/70 dark:bg-slate-900/25
                                   text-slate-900 dark:text-slate-50 opacity-60 pointer-events-none"
                            disabled>
                        <div class="text-xl sm:text-2xl leading-none">↩️</div>
                        <div class="text-[11px] sm:text-sm leading-none">Undo</div>
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection

@section("script")
    <script>
        (() => {
            const LABEL = @json($content['label'] ?? 'Possessive Adjectives');
            const RAW   = @json($content['cards'] ?? []);


            const SFX_CONFIG = @json($SFX);


            const sfx = {
                click: new Audio(SFX_CONFIG.click),
            };

            sfx.click.volume = 1;

            function playClick(){
                try{
                    sfx.click.pause();
                    sfx.click.currentTime = 0;
                    const p = sfx.click.play();
                    if (p && typeof p.catch === "function") p.catch(()=>{});
                }catch(e){}
            }

            // Unlock on first user gesture (mobile autoplay policies)
            let unlocked = false;
            function unlockAudioOnce(){
                if (unlocked) return;
                unlocked = true;
                try{
                    // Prime the audio element
                    sfx.click.muted = true;
                    const p = sfx.click.play();
                    if (p && typeof p.then === "function"){
                        p.then(()=>{
                            sfx.click.pause();
                            sfx.click.currentTime = 0;
                            sfx.click.muted = false;
                        }).catch(()=>{
                            sfx.click.muted = false;
                        });
                    } else {
                        sfx.click.muted = false;
                    }
                }catch(e){}
            }
            document.addEventListener("pointerdown", unlockAudioOnce, { once:true, passive:true });
            document.addEventListener("keydown", unlockAudioOnce, { once:true });

            const CARDS = (Array.isArray(RAW) ? RAW : []).map((c, i) => ({
                id: i + 1,
                image: c.image ?? "",
                answer: String(c.answer ?? ""),
                sentence: String(c.sentence ?? "{blank}")
            }));

            const titleBlock = document.getElementById("titleBlock");
            const deckPanel  = document.getElementById("deckPanel");
            const playPanel  = document.getElementById("playPanel");

            const deckStackEl = document.getElementById("deckStack");
            const deckEmptyEl = document.getElementById("deckEmpty");
            const deckCountEl = document.getElementById("deckCount");

            const cardSlotEl  = document.getElementById("cardSlot");
            const emptyPlayEl = document.getElementById("emptyPlay");

            const progressEl  = document.getElementById("progress");
            const totalCardsEl= document.getElementById("totalCards");
            const timerEl     = document.getElementById("timer");

            const toastArea   = document.getElementById("toastArea");

            const btnDeal     = document.getElementById("btnDeal");
            const btnShuffle  = document.getElementById("btnShuffle");
            const btnUndo     = document.getElementById("btnUndo");

            const deckAnchor  = document.getElementById("deckAnchor");
            const playAnchor  = document.getElementById("playAnchor");

            const bottomBar   = document.getElementById("bottomBar");
            const controlsCard= document.getElementById("controlsCard");

            let deck = [];
            let dealt = [];
            let animating = false;
            const revealed = new Set();

            let startTime = 0;
            let timerInt = null;

            const shuffle = (arr) => {
                const a = [...arr];
                for (let i=a.length-1;i>0;i--){
                    const j = Math.floor(Math.random()*(i+1));
                    [a[i],a[j]] = [a[j],a[i]];
                }
                return a;
            };

            function formatTime(ms){
                const s = Math.max(0, Math.floor(ms/1000));
                const m = Math.floor(s/60);
                const r = s%60;
                return `${String(m).padStart(2,'0')}:${String(r).padStart(2,'0')}`;
            }
            function startTimer(){
                startTime = Date.now();
                if (timerInt) clearInterval(timerInt);
                timerInt = setInterval(()=> timerEl.textContent = formatTime(Date.now() - startTime), 250);
            }

            function syncControlsHeight(){
                const h = Math.ceil(bottomBar.getBoundingClientRect().height);
                document.documentElement.style.setProperty("--controlsH", `${h}px`);
            }

            function toast(text, icon="✨"){
                const el = document.createElement("div");
                el.className = "toast px-4 py-3 font-black flex items-center gap-2 text-slate-900 dark:text-slate-50";
                el.innerHTML = `<span class="text-xl">${icon}</span><span>${text}</span>`;
                toastArea.prepend(el);
                setTimeout(() => el.remove(), 2000);
            }

            function currentCard(){
                return dealt.length ? dealt[dealt.length - 1] : null;
            }

            function setEnabled(btn, enabled){
                if (!btn) return;
                btn.disabled = !enabled;
                btn.classList.toggle("opacity-60", !enabled);
                btn.classList.toggle("pointer-events-none", !enabled);
            }

            function setButtonState(){
                setEnabled(btnDeal, deck.length > 0 && !animating);
                const hasDealt = dealt.length > 0;
                setEnabled(btnUndo, hasDealt && !animating);
                setEnabled(btnShuffle, hasDealt && !animating);
            }

            function renderDeckStack(){
                deckStackEl.innerHTML = "";

                if (deck.length === 0){
                    deckEmptyEl.classList.remove("hidden");
                    deckEmptyEl.classList.add("flex");
                } else {
                    deckEmptyEl.classList.add("hidden");
                    deckEmptyEl.classList.remove("flex");
                }

                const count = Math.min(deck.length, 5);
                for (let i=0;i<count;i++){
                    const layer = document.createElement("div");
                    layer.className = "absolute inset-0 deck-back flex items-center justify-center";
                    layer.style.transform = `translateY(${-i*3}px) rotate(${(Math.random()*2-1).toFixed(2)}deg) scale(${1 - i*0.02})`;
                    layer.style.opacity = String(1 - i*0.06);
                    layer.innerHTML = `<div class="relative z-10 text-white text-3xl drop-shadow">🂠</div>`;
                    deckStackEl.appendChild(layer);
                }
            }

            function makeCardHTML(card, index, total){
                const isRevealed = revealed.has(card.id);

                const blank = isRevealed
                    ? `<span class="answer-pill"><span style="color:#22c55e">✅</span> ${card.answer}</span>`
                    : `<span class="blank" style="--chars:${card.answer.length}">${"&nbsp;".repeat(Math.max(1, card.answer.length))}</span>`;

                const text = card.sentence.replace("{blank}", blank);

                const wrap = document.createElement("div");
                wrap.innerHTML = `
                    <div class="rounded-[28px] overflow-hidden
                                ring-1 ring-slate-200/60 dark:ring-slate-700/40
                                bg-white/70 dark:bg-slate-950/25
                                shadow-xl shadow-slate-900/10 dark:shadow-black/40">
                        <div class="px-4 sm:px-5 py-3 flex items-center justify-between gap-3
                                    bg-white/70 dark:bg-slate-900/20
                                    border-b border-slate-200/60 dark:border-slate-700/35">
                            <div class="flex items-center gap-2">
                                <span class="text-lg">📘</span>
                                <span class="font-black text-slate-900 dark:text-slate-50">${LABEL}</span>
                            </div>
                            <div class="text-sm font-medium text-slate-600 dark:text-slate-300">
                                Card ${index}/${total}
                            </div>
                        </div>

                        <div class="p-4 sm:p-6">
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-6 items-center">
                                <div class="md:col-span-8">
                                    <div class="text-[clamp(1.15rem,3.0vw,1.9rem)] font-medium leading-tight text-slate-900 dark:text-slate-50">
                                        ${text}
                                    </div>
                                </div>

                                <div class="md:col-span-4">
                                    <div class="rounded-[24px] p-5 sm:p-6 text-center
                                                ring-1 ring-slate-200/60 dark:ring-slate-700/40
                                                bg-gradient-to-br from-white/80 to-white/50
                                                dark:from-slate-900/40 dark:to-slate-900/20">
                                        <div class="person-image-frame mx-auto w-[160px] h-[190px] sm:w-[180px] sm:h-[220px]">
                                            ${card.image ? `<img src="${card.image}" alt="${card.answer}" class="person-image">` : `<div class="flex h-full items-center justify-center text-6xl sm:text-7xl leading-none">✨</div>`}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                return wrap;
            }

            function renderPlayArea(){
                const total = CARDS.length;

                totalCardsEl.textContent = String(total);
                progressEl.textContent = String(dealt.length);
                deckCountEl.textContent = String(deck.length);

                const card = currentCard();

                if (!card){
                    emptyPlayEl.classList.remove("hidden");
                    cardSlotEl.classList.add("hidden");
                    cardSlotEl.innerHTML = "";
                } else {
                    emptyPlayEl.classList.add("hidden");
                    cardSlotEl.classList.remove("hidden");
                    cardSlotEl.innerHTML = "";
                    cardSlotEl.appendChild(makeCardHTML(card, dealt.length, total));
                }

                setButtonState();
                requestAnimationFrame(syncControlsHeight);
            }

            async function dealOne(){
                unlockAudioOnce();
                if (animating || deck.length === 0) return;
                animating = true;
                setButtonState();

                const next = deck.pop();
                playClick();

                dealt.push(next);
                renderDeckStack();
                renderPlayArea();

                animating = false;
                setButtonState();

                if (deck.length === 0) toast("Deck is empty. Shuffle to restart.", "📭");
            }

            function undoOne(){
                unlockAudioOnce();
                if (animating) return;
                if (dealt.length === 0) return;

                const last = dealt.pop();
                deck.push(last);

                renderDeckStack();
                renderPlayArea();

                playClick();
                toast("Went back one card.", "↩️");
            }

            function shuffleAll(){
                unlockAudioOnce();
                if (animating) return;

                deck = shuffle(CARDS);
                dealt = [];
                revealed.clear();

                renderDeckStack();
                renderPlayArea();
                startTimer();

                playClick();
                toast("Shuffled!", "🔀");
            }

            function init(){
                deck = shuffle(CARDS);
                dealt = [];
                revealed.clear();

                renderDeckStack();
                renderPlayArea();
                startTimer();
                requestAnimationFrame(syncControlsHeight);

                if (CARDS.length === 0){
                    toast("No cards found. Add cards in the slide content.", "🤷");
                } else {
                    toast("Ready! Deal the first card.", "✨");
                }
            }

            window.resetSlide = () => {};

            btnDeal.addEventListener("click", dealOne);
            btnUndo.addEventListener("click", undoOne);
            btnShuffle.addEventListener("click", shuffleAll);

            window.addEventListener("resize", ()=> requestAnimationFrame(syncControlsHeight));
            window.addEventListener("orientationchange", ()=> setTimeout(syncControlsHeight, 60));

            init();
        })();
    </script>
@endsection
