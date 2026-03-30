@extends('slider.simple-layout')
@section('style')
    <style>
        :root{
            --bubble-bg: rgba(255,255,255,.78);
            --bubble-line: rgba(99,102,241,.18);
            --bubble-shadow: 0 16px 38px rgba(2,6,23,.10);

            --card-bg: rgba(255,255,255,.86);
            --card-line: rgba(99,102,241,.14);
            --card-shadow: 0 18px 46px rgba(2,6,23,.10);
        }
        .dark{
            --bubble-bg: rgba(2,6,23,.58);
            --bubble-line: rgba(148,163,184,.14);
            --bubble-shadow: 0 22px 52px rgba(0,0,0,.36);

            --card-bg: rgba(2,6,23,.62);
            --card-line: rgba(148,163,184,.12);
            --card-shadow: 0 24px 58px rgba(0,0,0,.40);
        }

        .speech{
            position: relative;
            border-radius: 22px;
            padding: 12px 14px;
            background:
                    radial-gradient(120% 120% at 0% 0%, rgba(99,102,241,.10), transparent 60%),
                    radial-gradient(120% 120% at 100% 0%, rgba(59,130,246,.10), transparent 60%),
                    var(--bubble-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: var(--bubble-shadow);
        }
        .speech::after{
            content:"";
            position:absolute;
            inset:0;
            border-radius: 22px;
            pointer-events:none;
            box-shadow: inset 0 0 0 1px var(--bubble-line);
        }
        .speech__tail{
            position:absolute;
            width:14px;
            height:14px;
            transform: rotate(45deg);
            background: var(--bubble-bg);
        }
        .speech__tail::after{
            content:"";
            position:absolute;
            inset:-1px;
            border-radius: 6px;
            box-shadow: inset 0 0 0 1px var(--bubble-line);
        }
        .speech--down .speech__tail{
            left: 50%;
            bottom: -7px;
            transform: translateX(-50%) rotate(45deg);
        }
        .speech--up .speech__tail{
            left: 50%;
            top: -7px;
            transform: translateX(-50%) rotate(45deg);
        }

        .game-card{
            position: relative;
            border-radius: 26px;
            background:
                    radial-gradient(120% 120% at 0% 0%, rgba(99,102,241,.10), transparent 60%),
                    radial-gradient(120% 120% at 100% 0%, rgba(59,130,246,.10), transparent 60%),
                    var(--card-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: var(--card-shadow);
        }
        .game-card::after{
            content:"";
            position:absolute;
            inset:0;
            border-radius: 26px;
            pointer-events:none;
            box-shadow: inset 0 0 0 1px var(--card-line);
        }
    </style>
@endsection

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-5xl px-4 sm:px-8 py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-3 sm:gap-4">
                    <div id="titleBlock" class="space-y-1 sm:space-y-2">
                        <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-4xl sm:text-5xl lg:text-6xl">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $content['title'] }}
                            </span>
                        </h1>

                        <p class="font-extrabold tracking-[-0.02em] text-base sm:text-lg text-slate-700 dark:text-slate-200">
                            {{ $content['subtitle'] }}
                        </p>

                        <div class="flex items-center justify-center gap-2 pt-2">
                            <span class="inline-flex items-center gap-2 rounded-full border border-slate-200/70 dark:border-slate-700/70 bg-white/70 dark:bg-slate-900/45 px-3 py-1 text-xs sm:text-sm font-extrabold text-slate-700 dark:text-slate-200">
                                🧩 {{ $content['label'] }}
                            </span>
                        </div>
                    </div>

                    <div id="stage" class="relative w-full max-w-4xl mt-8 space-y-4 sm:space-y-6">
                        <div class="sm:hidden mx-auto w-full max-w-md">
                            <div class="speech speech--down">
                                <span class="speech__tail" aria-hidden="true"></span>
                                <p id="bubbleTop" class="text-slate-900 dark:text-slate-50 font-extrabold leading-snug text-sm text-center"></p>
                            </div>
                        </div>

                        <div class="hidden lg:block pointer-events-none">
                            <div class="absolute -top-16 left-0 w-[320px]">
                                <div class="speech">
                                    <p data-bubble class="text-slate-900 dark:text-slate-50 font-extrabold leading-snug text-sm text-center"></p>
                                </div>
                            </div>
                            <div class="absolute -top-16 right-0 w-[320px]">
                                <div class="speech">
                                    <p data-bubble class="text-slate-900 dark:text-slate-50 font-extrabold leading-snug text-sm text-center"></p>
                                </div>
                            </div>
                            <div class="absolute -bottom-16 left-0 w-[320px]">
                                <div class="speech">
                                    <p data-bubble class="text-slate-900 dark:text-slate-50 font-extrabold leading-snug text-sm text-center"></p>
                                </div>
                            </div>
                            <div class="absolute -bottom-16 right-0 w-[320px]">
                                <div class="speech">
                                    <p data-bubble class="text-slate-900 dark:text-slate-50 font-extrabold leading-snug text-sm text-center"></p>
                                </div>
                            </div>
                        </div>

                        <div id="cardGrid" class="w-full grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5 lg:pt-16 lg:pb-16">
                            @for ($i = 0; $i < 4; $i++)
                                <button type="button"
                                        data-card
                                        class="game-card px-5 sm:px-6 py-6 sm:py-7 text-left focus:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500/25">
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="min-w-0">
                                            <div class="text-xs font-black text-slate-500 dark:text-slate-300">Person</div>
                                            <div data-person class="mt-1 text-2xl sm:text-3xl font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50 truncate"></div>
                                        </div>
                                        <div data-emoji class="text-5xl sm:text-6xl leading-none"></div>
                                    </div>

                                    <div class="mt-4">
                                        <div class="text-xs font-black text-slate-500 dark:text-slate-300">Adjective</div>
                                        <div data-adj class="mt-1 text-xl sm:text-2xl font-extrabold text-slate-900 dark:text-slate-50"></div>
                                    </div>

                                    <div class="mt-5 text-sm font-bold text-slate-600 dark:text-slate-300">
                                        Say: <span data-say class="font-extrabold text-slate-900 dark:text-slate-50"></span>
                                    </div>
                                </button>
                            @endfor
                        </div>

                        <div class="sm:hidden mx-auto w-full max-w-md">
                            <div class="speech speech--up">
                                <span class="speech__tail" aria-hidden="true"></span>
                                <p id="bubbleBottom" class="text-slate-900 dark:text-slate-50 font-extrabold leading-snug text-sm text-center"></p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cards = @json($content['cards'] ?? []);
            const cardEls = Array.from(document.querySelectorAll("[data-card]"));
            const desktopBubbles = Array.from(document.querySelectorAll("[data-bubble]"));
            const bubbleTop = document.getElementById("bubbleTop");
            const bubbleBottom = document.getElementById("bubbleBottom");

            function shuffle(arr){
                const a = arr.slice();
                for (let i = a.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [a[i], a[j]] = [a[j], a[i]];
                }
                return a;
            }

            function makeSentence(person, adj){
                return `My ${String(person).toLowerCase()} is ${String(adj).toLowerCase()}.`;
            }

            function deal(){
                const picked = shuffle(cards).slice(0, cardEls.length);

                cardEls.forEach((btn, i) => {
                    const item = picked[i] || { person: "Person", answer: "adjective", emoji: "🙂" };

                    btn.querySelector("[data-person]").textContent = item.person;
                    btn.querySelector("[data-adj]").textContent = item.answer;
                    btn.querySelector("[data-emoji]").textContent = item.emoji;
                    btn.querySelector("[data-say]").textContent = makeSentence(item.person, item.answer);

                    btn.dataset.person = item.person;
                    btn.dataset.adj = item.answer;
                });

                if (desktopBubbles.length) {
                    desktopBubbles.forEach((b, i) => {
                        const item = picked[i % picked.length];
                        b.textContent = `Say: ${makeSentence(item.person, item.answer)} 💬`;
                    });
                }

                if (bubbleTop && bubbleBottom && picked.length) {
                    bubbleTop.textContent = `Say: ${makeSentence(picked[0].person, picked[0].answer)} 💬`;
                    bubbleBottom.textContent = `Now pick another card 👀✨`;
                }
            }

            function clickCard(btn){
                const p = btn.dataset.person || "person";
                const a = btn.dataset.adj || "adjective";
                const line = `Say: ${makeSentence(p, a)} 💬`;

                if (bubbleTop) bubbleTop.textContent = line;
                if (bubbleBottom) bubbleBottom.textContent = `Good! ✅ Pick another card 👀`;

                if (desktopBubbles.length) {
                    desktopBubbles[0].textContent = line;
                }

                if (window.gsap && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
                    gsap.fromTo(btn, { y: 0 }, { y: -4, duration: 0.12, yoyo: true, repeat: 1, ease: "power2.out" });
                }
            }

            cardEls.forEach(btn => btn.addEventListener("click", () => clickCard(btn)));

            function playIn(){
                deal();

                if (!window.gsap) return;
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

                gsap.killTweensOf([cardEls, desktopBubbles, bubbleTop, bubbleBottom]);
                gsap.set([cardEls, desktopBubbles, bubbleTop, bubbleBottom], { clearProps: "all" });

                gsap.from(cardEls, { opacity: 0, y: 12, duration: 0.55, ease: "power3.out", stagger: 0.08 });
                gsap.from([bubbleTop, bubbleBottom, ...desktopBubbles].filter(Boolean), { opacity: 0, y: 10, duration: 0.45, ease: "power3.out", stagger: 0.06, delay: 0.08 });
            }

            window.resetSlide = playIn;
            playIn();
        });
    </script>
@endsection
