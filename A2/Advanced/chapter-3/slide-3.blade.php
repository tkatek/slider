<?php

$content = [
    'page_title' => 'Speaking Cards',
    'title' => 'Speaking Cards',
    'subtitle' => '',

    'cards' => [
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/singer.webp'),
            'audio' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Nurse.mpeg'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/nurse.webp'),
            'audio' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Nurse.mpeg'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/police.webp'),
            'audio' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/police.mp3'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/firefighter.webp'),
            'audio' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Firefighter.mpeg'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A1/Advanced/chapter-4/img/slide7/taxi.webp'),
            'audio' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Firefighter.mpeg'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/farmer.webp'),
            'audio' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Firefighter.mpeg'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/veterinarian.webp'),
            'audio' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Firefighter.mpeg'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/doctor.webp'),
            'audio' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/doctor.mpeg'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/hairdresser.webp'),
            'audio' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Hairdresser.mpeg'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/barber.webp'),
            'audio' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Barber.mpeg'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/salesperson.webp'),
            'audio' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Firefighter.mpeg'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/cook.webp'),
            'audio' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Firefighter.mpeg'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/pet-food-taster.webp'),
            'audio' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/pet-food-taster.mp3'),
        ],
        [
            'title' => '',
            'description' => '',
            'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/professional-sleeper.webp'),
            'audio' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/professional-sleeper.mp3'),
        ],
    ],
];

?>

@extends("slider.simple-layout")

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = $content['page_title'] ?? ($content['title'] ?? 'Speaking Cards');
    $cards = is_array($content['cards'] ?? null) ? $content['cards'] : [];

    $isOrangeTheme = ($theme['name'] ?? null) === 'orange';
    $dealButtonClass = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 via-indigo-600 to-blue-600'));

    $SFX = [
        'click' => asset('slider/sounds/tap.wav'),
        'volume' => 1,
    ];
@endphp

@section('title', $pageTitle)

@section("content")
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center px-4 py-4">
        <div id="app" class="relative mx-auto w-full max-w-5xl px-0 sm:px-4 lg:px-6">
            <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
                <div class="absolute left-10 top-10 h-48 w-48 rounded-full bg-[var(--ambient-one)] opacity-20 blur-3xl"></div>
                <div class="absolute bottom-10 right-10 h-48 w-48 rounded-full bg-[var(--ambient-two)] opacity-20 blur-3xl"></div>
            </div>

            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-4 flex max-w-4xl items-center justify-center gap-2 text-xs font-black text-slate-500 dark:text-slate-400 sm:mt-5">
                <span><span id="progress">0</span>/<span id="totalCards">0</span></span>
                <span class="h-1 w-1 rounded-full bg-slate-300 dark:bg-slate-600"></span>
                <span><span id="deckCount">0</span> left</span>
                <span class="hidden"><span id="mobileDeckCount">0</span></span>
            </div>

            <div class="mx-auto mt-4 grid w-full max-w-4xl grid-cols-1 items-center gap-5 md:grid-cols-[minmax(12rem,16rem)_minmax(0,1fr)] md:gap-8">
                <section id="deckPanel"
                         class="hidden justify-center md:flex">
                    <div class="hidden">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-100 text-2xl shadow-sm ring-1 ring-slate-200/70 dark:bg-slate-900/70 dark:ring-slate-700/50">
                                🃏
                            </div>
                            <div>
                                <div class="text-sm font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-400">
                                    Card Deck
                                </div>
                                <div class="text-lg font-black text-slate-950 dark:text-slate-50">
                                    Speaking prompts
                                </div>
                            </div>
                        </div>

                        <div class="rounded-full bg-white px-3 py-1.5 text-sm font-black text-slate-800 shadow-sm ring-1 ring-slate-200/70 dark:bg-slate-900/70 dark:text-slate-100 dark:ring-slate-700/50">
                            <span>0</span> left
                        </div>
                    </div>

                    <div class="relative aspect-[3/4] w-full max-w-[15rem]">
                        <div id="deckStack" class="absolute inset-0">
                            <div class="absolute inset-x-1 top-9 h-full rounded-[1.55rem] border border-slate-300 bg-slate-300 shadow-xl dark:border-slate-700 dark:bg-slate-800"></div>
                            <div class="absolute inset-x-0 top-6 h-full rounded-[1.55rem] border border-slate-300 bg-slate-200 shadow-xl dark:border-slate-700 dark:bg-slate-800"></div>
                            <div class="absolute inset-x-0 top-3 h-full rounded-[1.55rem] border border-slate-300 bg-slate-100 shadow-xl dark:border-slate-700 dark:bg-slate-800"></div>
                            <div class="absolute inset-0 rounded-[1.55rem] border-[10px] border-slate-100 bg-gradient-to-br from-slate-200 via-slate-500 to-slate-800 p-4 shadow-[0_30px_70px_-42px_rgba(15,23,42,0.75)] dark:border-slate-700">
                                <div class="relative h-full w-full overflow-hidden rounded-[1rem] border-2 border-white/45 bg-white/10">
                                    <div class="absolute inset-3 rounded-[0.8rem] border-2 border-white/30"></div>
                                    <div class="absolute left-1/2 top-1/2 h-32 w-32 -translate-x-1/2 -translate-y-1/2 rotate-45 rounded-3xl border-2 border-white/20 bg-white/10"></div>
                                    <div class="absolute left-1/2 top-1/2 h-20 w-20 -translate-x-1/2 -translate-y-1/2 rounded-full bg-white/10"></div>
                                    <div class="absolute left-5 top-5 h-8 w-8 rounded-md border-2 border-white/25"></div>
                                    <div class="absolute right-5 top-5 h-8 w-8 rounded-md border-2 border-white/25"></div>
                                    <div class="absolute bottom-5 left-5 h-8 w-8 rounded-md border-2 border-white/25"></div>
                                    <div class="absolute bottom-5 right-5 h-8 w-8 rounded-md border-2 border-white/25"></div>
                                </div>
                            </div>
                        </div>

                        <div id="deckEmpty"
                             class="absolute inset-0 hidden items-center justify-center rounded-[2rem] border-2 border-dashed border-slate-300/80 bg-white/80 p-6 text-center shadow-inner dark:border-slate-700/70 dark:bg-slate-950/40">
                            <div>
                                <div class="text-5xl">✅</div>
                                <div class="mt-3 text-xl font-black text-slate-950 dark:text-slate-50">No more cards</div>
                                <div class="mt-1 text-sm font-bold text-slate-500 dark:text-slate-400">Shuffle to start again.</div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden">
                        Deal one card, look at the image, listen if needed, then speak.
                    </div>
                </section>

                <section id="playPanel"
                         class="min-h-[24rem]">
                    <div class="hidden">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-100 text-2xl shadow-sm ring-1 ring-slate-200/70 dark:bg-slate-900/70 dark:ring-slate-700/50">
                                🗣️
                            </div>
                            <div>
                                <div class="text-sm font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-400">
                                    Active Card
                                </div>
                                <div class="text-lg font-black text-slate-950 dark:text-slate-50">
                                    Image prompt
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="rounded-full bg-white px-3 py-1.5 text-sm font-black text-slate-800 shadow-sm ring-1 ring-slate-200/70 dark:bg-slate-900/70 dark:text-slate-100 dark:ring-slate-700/50 md:hidden">
                                <span>0</span> left
                            </div>
                            <div class="rounded-full bg-white px-3 py-1.5 text-sm font-black text-slate-800 shadow-sm ring-1 ring-slate-200/70 dark:bg-slate-900/70 dark:text-slate-100 dark:ring-slate-700/50">
                                <span>0</span>/<span>0</span>
                            </div>
                        </div>
                    </div>

                    <div id="emptyPlay" class="flex min-h-[24rem] items-center justify-center rounded-[1.6rem] border border-white/70 bg-white/75 px-4 py-8 text-center shadow-[0_20px_55px_-42px_rgba(15,23,42,0.6)] ring-1 ring-slate-200/70 backdrop-blur-xl dark:border-slate-700/40 dark:bg-slate-950/45 dark:ring-slate-700/45">
                        <div class="mx-auto max-w-md">
                            <div class="hidden">
                                ✨
                            </div>
                            <h2 id="emptyTitle" class="text-3xl font-black tracking-tight text-slate-950 dark:text-slate-50">
                                Ready?
                            </h2>
                            <p id="emptyMessage" class="mt-2 text-sm font-bold leading-relaxed text-slate-500 dark:text-slate-400">
                                Press Deal.
                            </p>
                        </div>
                    </div>

                    <div id="cardSlot" class="hidden"></div>
                </section>
            </div>
        </div>

        <div id="bottomBar" class="z-50 mx-auto mt-4 w-full max-w-xl px-0">
            <div class="rounded-2xl border border-white/70 bg-white/86 p-2 shadow-[0_18px_45px_-34px_rgba(15,23,42,0.55)] ring-1 ring-slate-200/70 backdrop-blur-xl dark:border-slate-700/40 dark:bg-slate-950/70 dark:ring-slate-700/45">
                <div class="grid grid-cols-3 gap-2 sm:gap-3">
                    <button id="btnShuffle"
                            type="button"
                            class="flex min-h-12 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-black text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 disabled:pointer-events-none disabled:opacity-45 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
                        <span>Shuffle</span>
                    </button>

                    <button id="btnUndo"
                            type="button"
                            class="flex min-h-12 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-black text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 disabled:pointer-events-none disabled:opacity-45 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
                        <span>Undo</span>
                    </button>

                    <button id="btnDeal"
                            type="button"
                            class="flex min-h-12 items-center justify-center gap-2 rounded-xl px-3 py-2 text-sm font-black text-white shadow-lg shadow-indigo-900/15 transition hover:-translate-y-0.5 hover:shadow-xl active:translate-y-0 disabled:pointer-events-none disabled:opacity-45 {{ $dealButtonClass }}">
                        <span>Deal</span>
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection

@section("script")
    <script>
        (() => {
            const RAW = @json($cards);
            const SFX_CONFIG = @json($SFX);

            const CARDS = (Array.isArray(RAW) ? RAW : []).map((card, index) => ({
                id: index + 1,
                image: String(card.image ?? ""),
                title: card.title == null ? "" : String(card.title),
                description: card.description == null ? "" : String(card.description),
                audio: String(card.audio ?? card.sound ?? "")
            }));

            const deckStackEl = document.getElementById("deckStack");
            const deckEmptyEl = document.getElementById("deckEmpty");
            const deckCountEl = document.getElementById("deckCount");
            const mobileDeckCountEl = document.getElementById("mobileDeckCount");

            const cardSlotEl = document.getElementById("cardSlot");
            const emptyPlayEl = document.getElementById("emptyPlay");
            const emptyTitleEl = document.getElementById("emptyTitle");
            const emptyMessageEl = document.getElementById("emptyMessage");

            const progressEl = document.getElementById("progress");
            const totalCardsEl = document.getElementById("totalCards");
            const btnDeal = document.getElementById("btnDeal");
            const btnUndo = document.getElementById("btnUndo");
            const btnShuffle = document.getElementById("btnShuffle");

            const sfx = {
                click: new Audio(SFX_CONFIG.click)
            };

            sfx.click.volume = Number(SFX_CONFIG.volume ?? 1);

            const promptAudio = new Audio();
            promptAudio.preload = "auto";

            let deck = [];
            let dealt = [];
            let animating = false;
            let activeAudioButton = null;
            let unlocked = false;

            const classNames = {
                activeCard: "relative mx-auto w-full max-w-[24rem] rounded-[1.5rem] border border-slate-200 bg-gradient-to-br from-white via-slate-50 to-slate-200 p-3 shadow-[0_22px_55px_-38px_rgba(15,23,42,0.65)] ring-1 ring-white/80 dark:border-slate-700 dark:from-slate-900 dark:via-slate-900 dark:to-slate-800 dark:ring-slate-700/60",
                imageWrap: "rounded-[1.15rem] bg-gradient-to-br from-slate-100 via-slate-200 to-slate-400 p-3 dark:from-slate-800 dark:via-slate-800 dark:to-slate-950",
                imageFrame: "aspect-square overflow-hidden rounded-[0.9rem] border border-white bg-white ring-1 ring-slate-200/90 dark:border-slate-200 dark:bg-slate-100",
                image: "h-full w-full object-cover",
                fallback: "flex h-full w-full items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 text-7xl",
                cardBody: "space-y-4 px-4 pb-3 pt-5 sm:px-5",
                title: "text-center text-xl font-black leading-tight tracking-tight text-slate-950 dark:text-slate-50 sm:text-2xl",
                description: "mx-auto max-w-xs text-center text-sm font-bold leading-relaxed text-slate-600 dark:text-slate-300 sm:text-base",
                audioRow: "flex justify-center",
                audioBtn: "group flex h-14 w-14 items-center justify-center rounded-xl border border-slate-300/90 bg-gradient-to-br from-white via-slate-100 to-slate-200 text-slate-700 shadow-sm ring-1 ring-slate-400/20 transition hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 dark:border-slate-600/70 dark:from-slate-800 dark:via-slate-900 dark:to-slate-950 dark:text-slate-100 dark:ring-slate-500/40 sm:h-16 sm:w-16",
                audioBtnPlaying: "scale-105 ring-slate-500/70 dark:ring-slate-300/55",
                audioIcon: "h-8 w-8",
                countPill: "absolute right-5 top-5 rounded-full bg-white/90 px-3 py-1.5 text-xs font-black text-slate-700 shadow-sm ring-1 ring-slate-200/80 dark:bg-slate-950/75 dark:text-slate-200 dark:ring-slate-700/60"
            };

            function playClick() {
                try {
                    sfx.click.pause();
                    sfx.click.currentTime = 0;
                    const play = sfx.click.play();
                    if (play && typeof play.catch === "function") play.catch(() => {});
                } catch (e) {}
            }

            function unlockAudioOnce() {
                if (unlocked) return;
                unlocked = true;

                try {
                    sfx.click.muted = true;
                    const play = sfx.click.play();

                    if (play && typeof play.then === "function") {
                        play.then(() => {
                            sfx.click.pause();
                            sfx.click.currentTime = 0;
                            sfx.click.muted = false;
                        }).catch(() => {
                            sfx.click.muted = false;
                        });
                    } else {
                        sfx.click.muted = false;
                    }
                } catch (e) {}
            }

            function shuffleArray(items) {
                const shuffled = [...items];

                for (let index = shuffled.length - 1; index > 0; index -= 1) {
                    const randomIndex = Math.floor(Math.random() * (index + 1));
                    [shuffled[index], shuffled[randomIndex]] = [shuffled[randomIndex], shuffled[index]];
                }

                return shuffled;
            }

            function currentCard() {
                return dealt.length ? dealt[dealt.length - 1] : null;
            }

            function setEnabled(button, enabled) {
                if (!button) return;
                button.disabled = !enabled;
            }

            function setButtonState() {
                setEnabled(btnDeal, deck.length > 0 && !animating);
                setEnabled(btnUndo, dealt.length > 0 && !animating);
                setEnabled(btnShuffle, CARDS.length > 0 && !animating && (dealt.length > 0 || deck.length === 0));
            }

            function stopPromptAudio() {
                try {
                    promptAudio.pause();
                    promptAudio.currentTime = 0;
                    promptAudio.removeAttribute("src");
                    promptAudio.load();
                } catch (e) {}

                if (activeAudioButton) {
                    activeAudioButton.classList.remove(...classNames.audioBtnPlaying.split(" "));
                    activeAudioButton.setAttribute("aria-label", "Play audio");
                }

                activeAudioButton = null;
            }

            function setActiveAudioButton(button) {
                activeAudioButton = button;
                activeAudioButton.classList.add(...classNames.audioBtnPlaying.split(" "));
                activeAudioButton.setAttribute("aria-label", "Stop audio");
            }

            function playPromptAudio(source, button) {
                if (!source) return;

                if (activeAudioButton === button && !promptAudio.paused) {
                    stopPromptAudio();
                    return;
                }

                stopPromptAudio();
                setActiveAudioButton(button);

                try {
                    promptAudio.src = source;
                    promptAudio.currentTime = 0;
                    const play = promptAudio.play();

                    if (play && typeof play.catch === "function") {
                        play.catch(() => stopPromptAudio());
                    }
                } catch (e) {
                    stopPromptAudio();
                }
            }

            function toast(message, icon = "✨") {
                return;

                const element = document.createElement("div");
                element.className = classNames.toast;

                const iconElement = document.createElement("span");
                iconElement.className = "text-lg";
                iconElement.textContent = icon;

                const textElement = document.createElement("span");
                textElement.textContent = message;

                element.append(iconElement, textElement);
                toastArea.prepend(element);

                window.setTimeout(() => element.remove(), 2200);
            }

            function renderDeck() {
                const hasCards = deck.length > 0;

                deckStackEl.classList.toggle("hidden", !hasCards);
                deckEmptyEl.classList.toggle("hidden", hasCards);
                deckEmptyEl.classList.toggle("flex", !hasCards);
            }

            function renderEmptyState() {
                const noCardsAtAll = CARDS.length === 0;
                const noMoreCards = CARDS.length > 0 && deck.length === 0 && dealt.length === 0;

                cardSlotEl.classList.add("hidden");
                cardSlotEl.innerHTML = "";
                emptyPlayEl.classList.remove("hidden");

                if (noCardsAtAll) {
                    emptyTitleEl.textContent = "No cards";
                    emptyMessageEl.textContent = "Add cards to the slide content.";
                    return;
                }

                if (noMoreCards) {
                    emptyTitleEl.textContent = "No more cards";
                    emptyMessageEl.textContent = "Shuffle to restart.";
                    return;
                }

                emptyTitleEl.textContent = "Ready?";
                emptyMessageEl.textContent = "Press Deal.";
            }

            function createSpeakerIcon() {
                const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                svg.setAttribute("viewBox", "0 0 24 24");
                svg.setAttribute("fill", "none");
                svg.setAttribute("stroke", "currentColor");
                svg.setAttribute("stroke-width", "2.4");
                svg.setAttribute("stroke-linecap", "round");
                svg.setAttribute("stroke-linejoin", "round");
                svg.classList.add(...classNames.audioIcon.split(" "));

                const pathOne = document.createElementNS("http://www.w3.org/2000/svg", "path");
                pathOne.setAttribute("d", "M11 5 6 9H3v6h3l5 4V5Z");

                const pathTwo = document.createElementNS("http://www.w3.org/2000/svg", "path");
                pathTwo.setAttribute("d", "M15.54 8.46a5 5 0 0 1 0 7.08");

                const pathThree = document.createElementNS("http://www.w3.org/2000/svg", "path");
                pathThree.setAttribute("d", "M19.07 4.93a10 10 0 0 1 0 14.14");

                svg.append(pathOne, pathTwo, pathThree);
                return svg;
            }

            function makeActiveCard(card, index, total) {
                const shell = document.createElement("article");
                shell.className = classNames.activeCard;

                const count = document.createElement("div");
                count.className = classNames.countPill;
                count.textContent = `Card ${index}/${total}`;

                const imageWrap = document.createElement("div");
                imageWrap.className = classNames.imageWrap;

                const imageFrame = document.createElement("div");
                imageFrame.className = classNames.imageFrame;

                if (card.image) {
                    const image = document.createElement("img");
                    image.className = classNames.image;
                    image.src = card.image;
                    image.alt = `Speaking card ${index}`;
                    image.loading = "lazy";
                    imageFrame.appendChild(image);
                } else {
                    const fallback = document.createElement("div");
                    fallback.className = classNames.fallback;
                    fallback.textContent = "🖼️";
                    imageFrame.appendChild(fallback);
                }

                imageWrap.appendChild(imageFrame);

                const body = document.createElement("div");
                body.className = classNames.cardBody;

                if (card.title || card.description) {
                    const textBlock = document.createElement("div");
                    textBlock.className = "space-y-2";

                    if (card.title) {
                        const title = document.createElement("div");
                        title.className = classNames.title;
                        title.textContent = card.title;
                        textBlock.appendChild(title);
                    }

                    if (card.description) {
                        const description = document.createElement("div");
                        description.className = classNames.description;
                        description.textContent = card.description;
                        textBlock.appendChild(description);
                    }

                    body.appendChild(textBlock);
                }

                if (card.audio) {
                    const audioRow = document.createElement("div");
                    audioRow.className = classNames.audioRow;

                    const audioButton = document.createElement("button");
                    audioButton.type = "button";
                    audioButton.className = classNames.audioBtn;
                    audioButton.setAttribute("aria-label", "Play audio");
                    audioButton.appendChild(createSpeakerIcon());
                    audioButton.addEventListener("click", (event) => {
                        event.preventDefault();
                        event.stopPropagation();
                        playPromptAudio(card.audio, audioButton);
                    });

                    audioRow.appendChild(audioButton);
                    body.appendChild(audioRow);
                }

                shell.append(count, imageWrap, body);
                return shell;
            }

            function renderPlayArea() {
                const card = currentCard();
                const total = CARDS.length;

                totalCardsEl.textContent = String(total);
                progressEl.textContent = String(dealt.length);
                deckCountEl.textContent = String(deck.length);
                mobileDeckCountEl.textContent = String(deck.length);

                renderDeck();

                if (!card) {
                    renderEmptyState();
                    setButtonState();
                    return;
                }

                emptyPlayEl.classList.add("hidden");
                cardSlotEl.classList.remove("hidden");
                cardSlotEl.innerHTML = "";
                cardSlotEl.appendChild(makeActiveCard(card, dealt.length, total));

                setButtonState();
            }

            function dealOne() {
                unlockAudioOnce();

                if (animating || deck.length === 0) {
                    if (deck.length === 0 && CARDS.length > 0) {
                        toast("No more cards. Shuffle to restart.", "✅");
                    }
                    return;
                }

                animating = true;
                setButtonState();
                stopPromptAudio();

                const nextCard = deck.pop();
                dealt.push(nextCard);

                playClick();
                renderPlayArea();

                animating = false;
                setButtonState();

                if (deck.length === 0) {
                    toast("No more cards. Shuffle to restart.", "✅");
                }
            }

            function undoOne() {
                unlockAudioOnce();

                if (animating || dealt.length === 0) return;

                stopPromptAudio();

                const previousCard = dealt.pop();
                deck.push(previousCard);

                playClick();
                renderPlayArea();
                toast("Went back one card.", "↩️");
            }

            function shuffleAll() {
                unlockAudioOnce();

                if (animating || CARDS.length === 0) return;

                stopPromptAudio();

                deck = shuffleArray(CARDS);
                dealt = [];

                playClick();
                renderPlayArea();
                toast("Shuffled!", "🔀");
            }

            function resetGame() {
                stopPromptAudio();
                deck = shuffleArray(CARDS);
                dealt = [];
                renderPlayArea();
            }

            function init() {
                deck = shuffleArray(CARDS);
                dealt = [];
                renderPlayArea();

                if (CARDS.length === 0) {
                    toast("No cards found.", "🃏");
                }
            }

            promptAudio.addEventListener("ended", stopPromptAudio);
            promptAudio.addEventListener("error", stopPromptAudio);

            document.addEventListener("pointerdown", unlockAudioOnce, { once: true, passive: true });
            document.addEventListener("keydown", unlockAudioOnce, { once: true });

            document.addEventListener("visibilitychange", () => {
                if (document.hidden) stopPromptAudio();
            });

            window.addEventListener("beforeunload", stopPromptAudio);
            window.addEventListener("pagehide", stopPromptAudio);

            btnDeal.addEventListener("click", dealOne);
            btnUndo.addEventListener("click", undoOne);
            btnShuffle.addEventListener("click", shuffleAll);

            window.stopSlideAudio = stopPromptAudio;
            window.resetSlide = resetGame;

            init();
        })();
    </script>
@endsection
