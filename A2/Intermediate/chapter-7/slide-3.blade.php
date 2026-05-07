<?php

$content = [
    'page_title' => 'Practice 1',
    'title'      => 'Practice 1: Warm-up Discussion',
    'subtitle'   => 'What do you think?',
    'card_label' => 'Future Plans',
    'example'    => '',
    'cards'      => [
        [
            'answer'   => '',
            'sentence' => 'What are you eating for dinner tonight?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What are you going to do tomorrow?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What time does your English lesson start?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What are you doing after the lesson?',
        ],
        [
            'answer'   => '',
            'sentence' => 'Do you think robots will replace humans in the future?',
        ],
        [
            'answer'   => '',
            'sentence' => 'Do you think people will live on the moon in 50 years?',
        ],
        [
            'answer'   => '',
            'sentence' => 'Will you be rich in the future?',
        ],
    ],
];

?>

@extends("slider.simple-layout")

@php
    $pageTitle = $content['page_title'] ?? ($content['title'] ?? 'Speaking Cards');
    $cards = is_array($content['cards'] ?? null) ? $content['cards'] : [];
    $dealButtonClass = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 via-indigo-600 to-blue-600'));

    $SFX = [
        'click' => asset('slider/sounds/tap.wav'),
        'volume' => 1,
    ];
@endphp

@section('title', $pageTitle)

@section("content")
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center px-4 py-4">
        <div class="relative mx-auto w-full max-w-5xl px-0 sm:px-4 lg:px-6">
            <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
                <div class="absolute left-10 top-10 h-48 w-48 rounded-full bg-[var(--ambient-one)] opacity-20 blur-3xl"></div>
                <div class="absolute bottom-10 right-10 h-48 w-48 rounded-full bg-[var(--ambient-two)] opacity-20 blur-3xl"></div>
            </div>

            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-4 flex max-w-4xl items-center justify-center gap-2 text-xs font-black text-slate-500 dark:text-slate-400 sm:mt-5">
                <span><span id="progress">0</span>/<span id="totalCards">0</span></span>
                <span class="h-1 w-1 rounded-full bg-slate-300 dark:bg-slate-600"></span>
                <span><span id="deckCount">0</span> left</span>
            </div>

            <div class="mx-auto mt-4 grid w-full max-w-4xl grid-cols-1 items-center gap-5 md:grid-cols-[minmax(12rem,16rem)_minmax(0,1fr)] md:gap-8">
                <section class="hidden justify-center md:flex">
                    <div class="relative aspect-[3/4] w-full max-w-[15rem]">
                        <div id="deckStack" class="absolute inset-0">
                            <div class="absolute inset-x-1 top-9 h-full rounded-[1.55rem] border border-slate-300 bg-slate-300 shadow-xl dark:border-slate-700 dark:bg-slate-800"></div>
                            <div class="absolute inset-x-0 top-6 h-full rounded-[1.55rem] border border-slate-300 bg-slate-200 shadow-xl dark:border-slate-700 dark:bg-slate-800"></div>
                            <div class="absolute inset-x-0 top-3 h-full rounded-[1.55rem] border border-slate-300 bg-slate-100 shadow-xl dark:border-slate-700 dark:bg-slate-800"></div>
                            <div class="absolute inset-0 rounded-[1.55rem] border-[10px] border-slate-100 bg-gradient-to-br from-slate-200 via-slate-500 to-slate-800 p-4 shadow-[0_30px_70px_-42px_rgba(15,23,42,0.75)] dark:border-slate-700">
                                <div class="relative flex h-full w-full items-center justify-center overflow-hidden rounded-[1rem] border-2 border-white/45 bg-white/10 px-4 text-center">
                                    <div class="absolute inset-3 rounded-[0.8rem] border-2 border-white/30"></div>
                                    <div class="absolute left-1/2 top-1/2 h-32 w-32 -translate-x-1/2 -translate-y-1/2 rotate-45 rounded-3xl border-2 border-white/20 bg-white/10"></div>
                                    <div class="relative text-xl font-black leading-tight text-white">
                                        {{ $content['card_label'] ?? 'Speaking Cards' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="deckEmpty"
                             class="absolute inset-0 hidden items-center justify-center rounded-[2rem] border-2 border-dashed border-slate-300/80 bg-white/80 p-6 text-center shadow-inner dark:border-slate-700/70 dark:bg-slate-950/40">
                            <div>
                                <div class="text-xl font-black text-slate-950 dark:text-slate-50">No more cards</div>
                                <div class="mt-1 text-sm font-bold text-slate-500 dark:text-slate-400">Shuffle to start again.</div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="min-h-[24rem]">
                    <div id="emptyPlay" class="flex min-h-[24rem] items-center justify-center rounded-[1.6rem] border border-white/70 bg-white/75 px-4 py-8 text-center shadow-[0_20px_55px_-42px_rgba(15,23,42,0.6)] ring-1 ring-slate-200/70 backdrop-blur-xl dark:border-slate-700/40 dark:bg-slate-950/45 dark:ring-slate-700/45">
                        <div class="mx-auto max-w-md">
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

        <div class="z-50 mx-auto mt-4 w-full max-w-xl px-0">
            <div class="rounded-2xl border border-white/70 bg-white/86 p-2 shadow-[0_18px_45px_-34px_rgba(15,23,42,0.55)] ring-1 ring-slate-200/70 backdrop-blur-xl dark:border-slate-700/40 dark:bg-slate-950/70 dark:ring-slate-700/45">
                <div class="grid grid-cols-3 gap-2 sm:gap-3">
                    <button id="btnShuffle"
                            type="button"
                            class="flex min-h-12 items-center justify-center rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-black text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 disabled:pointer-events-none disabled:opacity-45 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
                        Shuffle
                    </button>

                    <button id="btnUndo"
                            type="button"
                            class="flex min-h-12 items-center justify-center rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-black text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 disabled:pointer-events-none disabled:opacity-45 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
                        Undo
                    </button>

                    <button id="btnDeal"
                            type="button"
                            class="flex min-h-12 items-center justify-center rounded-xl px-3 py-2 text-sm font-black text-white shadow-lg shadow-indigo-900/15 transition hover:-translate-y-0.5 hover:shadow-xl active:translate-y-0 disabled:pointer-events-none disabled:opacity-45 {{ $dealButtonClass }}">
                        Deal
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
                sentence: String(card.sentence ?? card.title ?? ''),
                answer: String(card.answer ?? card.description ?? ''),
            }));

            const deckStackEl = document.getElementById('deckStack');
            const deckEmptyEl = document.getElementById('deckEmpty');
            const deckCountEl = document.getElementById('deckCount');
            const cardSlotEl = document.getElementById('cardSlot');
            const emptyPlayEl = document.getElementById('emptyPlay');
            const emptyTitleEl = document.getElementById('emptyTitle');
            const emptyMessageEl = document.getElementById('emptyMessage');
            const progressEl = document.getElementById('progress');
            const totalCardsEl = document.getElementById('totalCards');
            const btnDeal = document.getElementById('btnDeal');
            const btnUndo = document.getElementById('btnUndo');
            const btnShuffle = document.getElementById('btnShuffle');

            const sfx = {
                click: new Audio(SFX_CONFIG.click)
            };

            sfx.click.volume = Number(SFX_CONFIG.volume ?? 1);

            let deck = [];
            let dealt = [];
            let animating = false;
            let unlocked = false;

            function playClick() {
                try {
                    sfx.click.pause();
                    sfx.click.currentTime = 0;
                    const play = sfx.click.play();
                    if (play && typeof play.catch === 'function') play.catch(() => {});
                } catch (e) {}
            }

            function unlockAudioOnce() {
                if (unlocked) return;
                unlocked = true;

                try {
                    sfx.click.muted = true;
                    const play = sfx.click.play();

                    if (play && typeof play.then === 'function') {
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

            function renderDeck() {
                const hasCards = deck.length > 0;

                deckStackEl.classList.toggle('hidden', !hasCards);
                deckEmptyEl.classList.toggle('hidden', hasCards);
                deckEmptyEl.classList.toggle('flex', !hasCards);
            }

            function renderEmptyState() {
                const noCardsAtAll = CARDS.length === 0;
                const noMoreCards = CARDS.length > 0 && deck.length === 0 && dealt.length === 0;

                cardSlotEl.classList.add('hidden');
                cardSlotEl.innerHTML = '';
                emptyPlayEl.classList.remove('hidden');

                if (noCardsAtAll) {
                    emptyTitleEl.textContent = 'No cards';
                    emptyMessageEl.textContent = 'Add cards to the slide content.';
                    return;
                }

                if (noMoreCards) {
                    emptyTitleEl.textContent = 'No more cards';
                    emptyMessageEl.textContent = 'Shuffle to restart.';
                    return;
                }

                emptyTitleEl.textContent = 'Ready?';
                emptyMessageEl.textContent = 'Press Deal.';
            }

            function makeActiveCard(card, index, total) {
                const shell = document.createElement('article');
                shell.className = 'relative mx-auto flex min-h-[24rem] w-full max-w-[34rem] flex-col justify-center rounded-[1.5rem] border border-slate-200 bg-gradient-to-br from-white via-slate-50 to-slate-200 p-6 text-center shadow-[0_22px_55px_-38px_rgba(15,23,42,0.65)] ring-1 ring-white/80 dark:border-slate-700 dark:from-slate-900 dark:via-slate-900 dark:to-slate-800 dark:ring-slate-700/60 sm:p-8';

                const count = document.createElement('div');
                count.className = 'absolute right-5 top-5 rounded-full bg-white/90 px-3 py-1.5 text-xs font-black text-slate-700 shadow-sm ring-1 ring-slate-200/80 dark:bg-slate-950/75 dark:text-slate-200 dark:ring-slate-700/60';
                count.textContent = `Card ${index}/${total}`;

                const label = document.createElement('div');
                label.className = 'mx-auto rounded-full bg-slate-900 px-4 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-white dark:bg-slate-100 dark:text-slate-950';
                label.textContent = @json($content['card_label'] ?? 'Speaking');

                const sentence = document.createElement('h2');
                sentence.className = 'mt-8 text-2xl font-black leading-tight tracking-tight text-slate-950 dark:text-slate-50 sm:text-3xl';
                sentence.textContent = card.sentence;

                shell.append(count, label, sentence);

                if (card.answer) {
                    const answer = document.createElement('p');
                    answer.className = 'mx-auto mt-5 max-w-md text-base font-bold leading-relaxed text-slate-600 dark:text-slate-300';
                    answer.textContent = card.answer;
                    shell.appendChild(answer);
                }

                return shell;
            }

            function renderPlayArea() {
                const card = currentCard();
                const total = CARDS.length;

                totalCardsEl.textContent = String(total);
                progressEl.textContent = String(dealt.length);
                deckCountEl.textContent = String(deck.length);

                renderDeck();

                if (!card) {
                    renderEmptyState();
                    setButtonState();
                    return;
                }

                emptyPlayEl.classList.add('hidden');
                cardSlotEl.classList.remove('hidden');
                cardSlotEl.innerHTML = '';
                cardSlotEl.appendChild(makeActiveCard(card, dealt.length, total));

                setButtonState();
            }

            function dealOne() {
                unlockAudioOnce();

                if (animating || deck.length === 0) return;

                animating = true;
                setButtonState();

                const nextCard = deck.pop();
                dealt.push(nextCard);

                playClick();
                renderPlayArea();

                animating = false;
                setButtonState();
            }

            function undoOne() {
                unlockAudioOnce();

                if (animating || dealt.length === 0) return;

                const previousCard = dealt.pop();
                deck.push(previousCard);

                playClick();
                renderPlayArea();
            }

            function shuffleAll() {
                unlockAudioOnce();

                if (animating || CARDS.length === 0) return;

                deck = shuffleArray(CARDS);
                dealt = [];

                playClick();
                renderPlayArea();
            }

            function resetGame() {
                deck = shuffleArray(CARDS);
                dealt = [];
                renderPlayArea();
            }

            document.addEventListener('pointerdown', unlockAudioOnce, { once: true, passive: true });
            document.addEventListener('keydown', unlockAudioOnce, { once: true });

            btnDeal.addEventListener('click', dealOne);
            btnUndo.addEventListener('click', undoOne);
            btnShuffle.addEventListener('click', shuffleAll);

            window.stopSlideAudio = () => {};
            window.resetSlide = resetGame;

            resetGame();
        })();
    </script>
@endsection
