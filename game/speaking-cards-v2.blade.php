@extends("slider.simple-layout")

@php
    $content = is_array($content ?? null) ? $content : [];
    $pageTitle = $content['page_title'] ?? ($content['title'] ?? 'Speaking Cards');
    $cards = is_array($content['cards'] ?? null) ? $content['cards'] : [];
    $dealButtonClass = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 via-indigo-600 to-blue-600'));
    $requestedCardType = strtolower(trim((string) ($content['card_type'] ?? $content['type'] ?? 'auto')));
    $cardType = in_array($requestedCardType, ['auto', 'text', 'image', 'image-audio', 'image_audio', 'audio-image', 'audio_image'], true)
        ? $requestedCardType
        : 'auto';
    $imageAspectRatio = trim((string) ($content['image_aspect_ratio'] ?? '5 / 4'));

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

            @if(!empty($content['example']))
                <div class="mx-auto mt-4 max-w-3xl rounded-2xl border border-white/70 bg-white/80 px-4 py-3 text-center shadow-sm ring-1 ring-slate-200/70 backdrop-blur-xl dark:border-slate-700/40 dark:bg-slate-950/55 dark:ring-slate-700/45">
                    <div class="text-[11px] font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
                        Example
                    </div>
                    <div class="mt-1 text-base font-bold text-slate-900 dark:text-slate-50 sm:text-lg">
                        {{ $content['example'] }}
                    </div>
                </div>
            @endif

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
            const REQUESTED_CARD_TYPE = @json($cardType);
            const CARD_LABEL = @json($content['card_label'] ?? 'Speaking');
            const IMAGE_ASPECT_RATIO = @json($imageAspectRatio);

            const rawCards = Array.isArray(RAW) ? RAW : [];
            const hasImages = rawCards.some(card => String(card.image ?? '').trim() !== '');
            const hasAudio = rawCards.some(card => String(card.audio ?? card.sound ?? '').trim() !== '');
            const normalizedType = REQUESTED_CARD_TYPE === 'image_audio' || REQUESTED_CARD_TYPE === 'audio-image' || REQUESTED_CARD_TYPE === 'audio_image'
                ? 'image-audio'
                : REQUESTED_CARD_TYPE;
            const cardType = normalizedType === 'auto'
                ? (hasAudio ? 'image-audio' : (hasImages ? 'image' : 'text'))
                : normalizedType;
            const showImages = cardType === 'image' || cardType === 'image-audio';
            const showAudio = cardType === 'image-audio';

            const CARDS = rawCards.map((card, index) => ({
                id: index + 1,
                sentence: String(card.sentence ?? card.title ?? ''),
                answer: String(card.answer ?? card.description ?? ''),
                title: String(card.title ?? card.sentence ?? ''),
                description: String(card.description ?? card.answer ?? ''),
                image: String(card.image ?? ''),
                audio: String(card.audio ?? card.sound ?? '')
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
            const promptAudio = new Audio();
            promptAudio.preload = 'auto';
            sfx.click.volume = Number(SFX_CONFIG.volume ?? 1);

            let deck = [];
            let dealt = [];
            let animating = false;
            let unlocked = false;
            let activeAudioButton = null;

            const classes = {
                activeTextCard: 'relative mx-auto flex min-h-[24rem] w-full max-w-[34rem] flex-col justify-center rounded-[1.5rem] border border-slate-200 bg-gradient-to-br from-white via-slate-50 to-slate-200 p-6 text-center shadow-[0_22px_55px_-38px_rgba(15,23,42,0.65)] ring-1 ring-white/80 dark:border-slate-700 dark:from-slate-900 dark:via-slate-900 dark:to-slate-800 dark:ring-slate-700/60 sm:p-8',
                activeImageCard: 'relative mx-auto w-full max-w-[24rem] rounded-[1.5rem] border border-slate-200 bg-gradient-to-br from-white via-slate-50 to-slate-200 p-3 shadow-[0_22px_55px_-38px_rgba(15,23,42,0.65)] ring-1 ring-white/80 dark:border-slate-700 dark:from-slate-900 dark:via-slate-900 dark:to-slate-800 dark:ring-slate-700/60',
                countPill: 'absolute right-5 top-5 z-10 rounded-full bg-white/90 px-3 py-1.5 text-xs font-black text-slate-700 shadow-sm ring-1 ring-slate-200/80 dark:bg-slate-950/75 dark:text-slate-200 dark:ring-slate-700/60',
                imageWrap: 'rounded-[1.15rem] bg-gradient-to-br from-slate-100 via-slate-200 to-slate-400 p-3 dark:from-slate-800 dark:via-slate-800 dark:to-slate-950',
                imageFrame: 'overflow-hidden rounded-[0.9rem] border border-white bg-white ring-1 ring-slate-200/90 dark:border-slate-700 dark:bg-slate-950 dark:ring-slate-700/70',
                image: 'h-full w-full object-cover',
                fallback: 'flex h-full w-full items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 text-7xl text-white dark:from-slate-900 dark:via-slate-900 dark:to-slate-800 dark:text-slate-500',
                cardBody: 'space-y-4 px-4 pb-3 pt-5 sm:px-5',
                title: 'text-center text-xl font-black leading-tight tracking-tight text-slate-950 dark:text-slate-50 sm:text-2xl',
                description: 'mx-auto max-w-xs text-center text-sm font-bold leading-relaxed text-slate-600 dark:text-slate-300 sm:text-base',
                audioRow: 'flex justify-center',
                audioBtn: 'group flex h-14 w-14 items-center justify-center rounded-xl border border-slate-300/90 bg-gradient-to-br from-white via-slate-100 to-slate-200 text-slate-700 shadow-sm ring-1 ring-slate-400/20 transition hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 dark:border-slate-600/70 dark:from-slate-800 dark:via-slate-900 dark:to-slate-950 dark:text-slate-100 dark:ring-slate-500/40 sm:h-16 sm:w-16',
                audioBtnPlaying: 'scale-105 ring-slate-500/70 dark:ring-slate-300/55',
                audioIcon: 'h-8 w-8'
            };

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

            function stopPromptAudio() {
                try {
                    promptAudio.pause();
                    promptAudio.currentTime = 0;
                    promptAudio.removeAttribute('src');
                    promptAudio.load();
                } catch (e) {}

                if (activeAudioButton) {
                    activeAudioButton.classList.remove(...classes.audioBtnPlaying.split(' '));
                    activeAudioButton.setAttribute('aria-label', 'Play audio');
                }

                activeAudioButton = null;
            }

            function playPromptAudio(source, button) {
                if (!source) return;

                if (activeAudioButton === button && !promptAudio.paused) {
                    stopPromptAudio();
                    return;
                }

                stopPromptAudio();
                activeAudioButton = button;
                activeAudioButton.classList.add(...classes.audioBtnPlaying.split(' '));
                activeAudioButton.setAttribute('aria-label', 'Stop audio');

                try {
                    promptAudio.src = source;
                    promptAudio.currentTime = 0;
                    const play = promptAudio.play();
                    if (play && typeof play.catch === 'function') play.catch(() => stopPromptAudio());
                } catch (e) {
                    stopPromptAudio();
                }
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

            function createCount(index, total) {
                const count = document.createElement('div');
                count.className = classes.countPill;
                count.textContent = `Card ${index}/${total}`;
                return count;
            }

            function createSpeakerIcon() {
                const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                svg.setAttribute('viewBox', '0 0 24 24');
                svg.setAttribute('fill', 'none');
                svg.setAttribute('stroke', 'currentColor');
                svg.setAttribute('stroke-width', '2.4');
                svg.setAttribute('stroke-linecap', 'round');
                svg.setAttribute('stroke-linejoin', 'round');
                svg.classList.add(...classes.audioIcon.split(' '));

                const pathOne = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                pathOne.setAttribute('d', 'M11 5 6 9H3v6h3l5 4V5Z');

                const pathTwo = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                pathTwo.setAttribute('d', 'M15.54 8.46a5 5 0 0 1 0 7.08');

                const pathThree = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                pathThree.setAttribute('d', 'M19.07 4.93a10 10 0 0 1 0 14.14');

                svg.append(pathOne, pathTwo, pathThree);
                return svg;
            }

            function makeTextCard(card, index, total) {
                const shell = document.createElement('article');
                shell.className = classes.activeTextCard;

                const label = document.createElement('div');
                label.className = 'mx-auto rounded-full bg-slate-900 px-4 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-white dark:bg-slate-100 dark:text-slate-950';
                label.textContent = CARD_LABEL;

                const sentence = document.createElement('h2');
                sentence.className = 'mt-8 text-2xl font-black leading-tight tracking-tight text-slate-950 dark:text-slate-50 sm:text-3xl';
                sentence.textContent = card.sentence || card.title;

                shell.append(createCount(index, total), label, sentence);

                if (card.answer || card.description) {
                    const answer = document.createElement('p');
                    answer.className = 'mx-auto mt-5 max-w-md text-base font-bold leading-relaxed text-slate-600 dark:text-slate-300';
                    answer.textContent = card.answer || card.description;
                    shell.appendChild(answer);
                }

                return shell;
            }

            function makeImageCard(card, index, total) {
                const shell = document.createElement('article');
                shell.className = classes.activeImageCard;

                const imageWrap = document.createElement('div');
                imageWrap.className = classes.imageWrap;

                const imageFrame = document.createElement('div');
                imageFrame.className = classes.imageFrame;
                imageFrame.style.aspectRatio = IMAGE_ASPECT_RATIO;

                if (card.image) {
                    const image = document.createElement('img');
                    image.className = classes.image;
                    image.src = card.image;
                    image.alt = card.title || card.sentence || `Speaking card ${index}`;
                    image.loading = 'lazy';
                    imageFrame.appendChild(image);
                } else {
                    const fallback = document.createElement('div');
                    fallback.className = classes.fallback;
                    fallback.textContent = '?';
                    imageFrame.appendChild(fallback);
                }

                imageWrap.appendChild(imageFrame);

                const body = document.createElement('div');
                body.className = classes.cardBody;

                if (card.title || card.sentence || card.description || card.answer) {
                    const textBlock = document.createElement('div');
                    textBlock.className = 'space-y-2';

                    if (card.title || card.sentence) {
                        const title = document.createElement('div');
                        title.className = classes.title;
                        title.textContent = card.title || card.sentence;
                        textBlock.appendChild(title);
                    }

                    if (card.description || card.answer) {
                        const description = document.createElement('div');
                        description.className = classes.description;
                        description.textContent = card.description || card.answer;
                        textBlock.appendChild(description);
                    }

                    body.appendChild(textBlock);
                }

                if (showAudio && card.audio) {
                    const audioRow = document.createElement('div');
                    audioRow.className = classes.audioRow;

                    const audioButton = document.createElement('button');
                    audioButton.type = 'button';
                    audioButton.className = classes.audioBtn;
                    audioButton.setAttribute('aria-label', 'Play audio');
                    audioButton.appendChild(createSpeakerIcon());
                    audioButton.addEventListener('click', (event) => {
                        event.preventDefault();
                        event.stopPropagation();
                        playPromptAudio(card.audio, audioButton);
                    });

                    audioRow.appendChild(audioButton);
                    body.appendChild(audioRow);
                }

                shell.append(createCount(index, total), imageWrap, body);
                return shell;
            }

            function makeActiveCard(card, index, total) {
                return showImages ? makeImageCard(card, index, total) : makeTextCard(card, index, total);
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
                stopPromptAudio();

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

                stopPromptAudio();
                const previousCard = dealt.pop();
                deck.push(previousCard);

                playClick();
                renderPlayArea();
            }

            function shuffleAll() {
                unlockAudioOnce();

                if (animating || CARDS.length === 0) return;

                stopPromptAudio();
                deck = shuffleArray(CARDS);
                dealt = [];

                playClick();
                renderPlayArea();
            }

            function resetGame() {
                stopPromptAudio();
                deck = shuffleArray(CARDS);
                dealt = [];
                renderPlayArea();
            }

            promptAudio.addEventListener('ended', stopPromptAudio);
            promptAudio.addEventListener('error', stopPromptAudio);

            document.addEventListener('pointerdown', unlockAudioOnce, { once: true, passive: true });
            document.addEventListener('keydown', unlockAudioOnce, { once: true });
            document.addEventListener('visibilitychange', () => {
                if (document.hidden) stopPromptAudio();
            });
            window.addEventListener('beforeunload', stopPromptAudio);
            window.addEventListener('pagehide', stopPromptAudio);

            btnDeal.addEventListener('click', dealOne);
            btnUndo.addEventListener('click', undoOne);
            btnShuffle.addEventListener('click', shuffleAll);

            window.stopSlideAudio = stopPromptAudio;
            window.resetSlide = resetGame;

            resetGame();
        })();
    </script>
@endsection
