@php
    $content = [
        'title' => 'Practice 5: Synonyms & Antonyms',
        'subtitle' => 'Drag each word to match it with its synonym or antonym!',

        'groups' => [
            [
                'key' => 'synonyms',
                'title' => 'Synonyms',
                'tone' => 'green',
                'items' => [
                    ['emoji' => '👭', 'word' => 'empathy', 'answer' => 'kindness'],
                    ['emoji' => '⚖️', 'word' => 'judging', 'answer' => 'criticizing, evaluating unfairly'],
                    ['emoji' => '🗑️', 'word' => 'worthless', 'answer' => 'useless'],
                    ['emoji' => '❤️', 'word' => 'compassion', 'answer' => 'understanding, compassion'],
                    ['emoji' => '👨‍👩‍👧', 'word' => 'tolerance', 'answer' => 'acceptance, openness'],
                    ['emoji' => '🧨', 'word' => 'ignite', 'answer' => 'start, trigger, spark'],
                    ['emoji' => '🚶', 'word' => 'outcasted', 'answer' => 'excluded, isolated'],
                ],
            ],
            [
                'key' => 'antonyms',
                'title' => 'Antonyms',
                'tone' => 'purple',
                'items' => [
                    ['emoji' => '👭', 'word' => 'empathy', 'answer' => 'intolerance'],
                    ['emoji' => '🤲', 'word' => 'compassion', 'answer' => 'disrespect'],
                    ['emoji' => '👨‍👩‍👧', 'word' => 'tolerance', 'answer' => 'cruelty / coldness'],
                    ['emoji' => '🤝', 'word' => 'respect', 'answer' => 'harshness'],
                    ['emoji' => '🫂', 'word' => 'inclusion', 'answer' => 'exclusion'],
                    ['emoji' => '💞', 'word' => 'kindness', 'answer' => 'selfishness, apathy'],
                    ['emoji' => '🤷', 'word' => 'indifference', 'answer' => 'hatred'],
                ],
            ],
        ],
    ];

    $cards = [];

    foreach ($content['groups'] as $group) {
        foreach ($group['items'] as $item) {
            $cards[] = [
                ...$item,
                'group_key' => $group['key'],
                'group_title' => $group['title'],
                'group_tone' => $group['tone'],
            ];
        }
    }

    $totalItems = count($cards);
@endphp

@extends('slider.simple-layout')

@section('content')
    <style>
        #synonymAntonymGame .sa-tile {
            touch-action: none;
            user-select: none;
            -webkit-user-select: none;
        }

        #synonymAntonymGame .sa-tile[data-group="synonyms"].is-selected {
            border-color: rgb(16 185 129);
            outline: 3px solid rgba(16, 185, 129, .18);
        }

        #synonymAntonymGame .sa-tile[data-group="antonyms"].is-selected {
            border-color: rgb(139 92 246);
            outline: 3px solid rgba(139, 92, 246, .18);
        }

        #synonymAntonymGame .sa-tile.is-used {
            width: 100%;
            min-height: 44px;
            cursor: default;
            pointer-events: none;
            box-shadow: none;
        }

        #synonymAntonymGame .sa-dropzone[data-group="synonyms"].is-ready {
            border-color: rgb(16 185 129);
            outline: 3px solid rgba(16, 185, 129, .16);
        }

        #synonymAntonymGame .sa-dropzone[data-group="antonyms"].is-ready {
            border-color: rgb(139 92 246);
            outline: 3px solid rgba(139, 92, 246, .16);
        }

        #synonymAntonymGame .sa-dropzone.is-correct {
            border-style: solid;
            border-color: rgba(34, 197, 94, .55);
            background: rgba(240, 253, 244, .92);
            color: #14532d;
        }

        .dark #synonymAntonymGame .sa-dropzone.is-correct {
            border-color: rgba(74, 222, 128, .35);
            background: rgba(20, 83, 45, .22);
            color: #dcfce7;
        }

        #synonymAntonymGame .sa-shake {
            animation: saShake .22s ease-in-out 2;
        }

        .sa-drag-ghost {
            position: fixed;
            z-index: 9999;
            pointer-events: none;
            opacity: .98;
            transform: translate(-50%, -50%) scale(1.03);
            box-shadow: 0 20px 55px -28px rgba(15, 23, 42, .65);
        }

        @keyframes saShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
    </style>

    <main
            id="synonymAntonymGame"
            class="min-h-[100dvh] w-full overflow-x-hidden px-3 py-3 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8"
            data-total="{{ $totalItems }}"
    >
        <section class="mx-auto flex min-h-[calc(100dvh-1.5rem)] w-full max-w-[1180px] flex-col justify-center">
            @include('slider.components.title-subtitle', [
                'titleClass' => 'text-[clamp(1.9rem,5vw,3.8rem)]',
            ])

            <div class="mx-auto mt-4 w-full rounded-[1.4rem] border border-slate-200 bg-white p-3 shadow-lg shadow-slate-200/60 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-4 lg:p-5">

                {{-- Top controls --}}
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-1.5">
                        <button
                                type="button"
                                id="saPrev"
                                class="grid h-9 w-9 place-items-center rounded-full border border-slate-200 bg-white text-xl font-black text-slate-600 shadow-sm transition hover:bg-slate-50 disabled:cursor-not-allowed disabled:opacity-35 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100"
                                aria-label="Previous"
                        >
                            ‹
                        </button>

                        <div class="rounded-full bg-slate-100 px-3 py-2 text-sm font-black text-slate-800 dark:bg-slate-800 dark:text-slate-100">
                            <span id="saScore">0</span>/<span>{{ $totalItems }}</span>
                        </div>

                        <button
                                type="button"
                                id="saNext"
                                class="grid h-9 w-9 place-items-center rounded-full border border-slate-200 bg-white text-xl font-black text-slate-600 shadow-sm transition hover:bg-slate-50 disabled:cursor-not-allowed disabled:opacity-35 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100"
                                aria-label="Next"
                        >
                            ›
                        </button>
                    </div>

                    <div class="flex items-center gap-1.5">
                        <div class="rounded-full bg-rose-50 px-2.5 py-2 text-xs font-black text-rose-700 dark:bg-rose-500/10 dark:text-rose-200 sm:text-sm">
                            Mistakes: <span id="saMistakes">0</span>
                        </div>

                        <button
                                type="button"
                                id="saReset"
                                class="rounded-full border border-slate-200 bg-white px-3 py-2 text-xs font-black text-slate-700 shadow-sm transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 sm:text-sm"
                        >
                            Retake
                        </button>
                    </div>
                </div>

                <div class="mt-2.5 h-1.5 overflow-hidden rounded-full bg-slate-100 dark:bg-slate-800">
                    <div id="saProgress" class="h-full w-0 rounded-full bg-emerald-500 transition-all duration-300"></div>
                </div>

                {{-- Desktop uses empty width: left game / right answers --}}
                <div class="mt-3 grid gap-3 xl:grid-cols-[minmax(0,1fr)_380px] xl:items-stretch">
                    <div class="rounded-2xl bg-slate-50/80 p-3 dark:bg-slate-950/35 sm:p-4">
                        @foreach($cards as $card)
                            @php
                                $isPurple = $card['group_tone'] === 'purple';

                                $badgeClass = $isPurple
                                    ? 'bg-violet-600 text-white'
                                    : 'bg-emerald-600 text-white';

                                $dropClass = $isPurple
                                    ? 'border-violet-200 bg-violet-50/50 text-violet-700 dark:border-violet-400/25 dark:bg-violet-500/10 dark:text-violet-200'
                                    : 'border-emerald-200 bg-emerald-50/50 text-emerald-700 dark:border-emerald-400/25 dark:bg-emerald-500/10 dark:text-emerald-200';

                                $cardSurfaceClass = $isPurple
                                    ? 'border-violet-200 bg-violet-50/30 dark:border-violet-500/20 dark:bg-violet-950/10'
                                    : 'border-emerald-200 bg-emerald-50/30 dark:border-emerald-500/20 dark:bg-emerald-950/10';

                                $wordBoxClass = $isPurple
                                    ? 'bg-violet-50/70 dark:bg-violet-950/20'
                                    : 'bg-emerald-50/70 dark:bg-emerald-950/20';

                                $iconBoxClass = $isPurple
                                    ? 'bg-violet-100 text-violet-700 dark:bg-violet-500/15 dark:text-violet-200'
                                    : 'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-200';

                                $instructionText = $isPurple
                                    ? 'Match each word with a word that has the opposite meaning.'
                                    : 'Match each word with a word that has a similar meaning.';

                                $instructionClass = $isPurple
                                    ? 'text-violet-700 dark:text-violet-300'
                                    : 'text-emerald-700 dark:text-emerald-300';
                            @endphp

                            <article
                                    class="sa-card {{ $loop->first ? '' : 'hidden' }} rounded-2xl border p-3 {{ $cardSurfaceClass }}"
                                    data-index="{{ $loop->index }}"
                                    data-group="{{ $card['group_key'] }}"
                                    data-answer="{{ $card['answer'] }}"
                                    data-filled="0"
                            >
                                <div class="mb-3 flex flex-wrap items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                                        <span class="rounded-full px-3 py-1.5 text-xs font-black uppercase tracking-wide {{ $badgeClass }}">
                                            {{ $card['group_title'] }}
                                        </span>

                                        <span class="rounded-full bg-white px-2.5 py-1.5 text-xs font-black text-slate-600 dark:bg-slate-800 dark:text-slate-300">
                                            {{ $loop->iteration }}/{{ $totalItems }}
                                        </span>
                                    </div>

                                    <p class="text-xs font-black leading-snug sm:text-sm {{ $instructionClass }}">
                                        {{ $instructionText }}
                                    </p>
                                </div>

                                <div class="grid gap-3 md:grid-cols-[minmax(0,0.85fr)_minmax(0,1.15fr)] xl:grid-cols-1 2xl:grid-cols-[minmax(0,0.85fr)_minmax(0,1.15fr)]">
                                    <div class="flex min-h-[110px] items-center gap-3 rounded-2xl p-4 shadow-sm sm:min-h-[130px] {{ $wordBoxClass }}">
                                        <span class="grid h-14 w-14 shrink-0 place-items-center rounded-2xl text-3xl shadow-sm sm:h-16 sm:w-16 sm:text-4xl {{ $iconBoxClass }}">
                                            {{ $card['emoji'] }}
                                        </span>

                                        <h3 class="min-w-0 break-words text-[1.55rem] font-black leading-tight text-slate-950 dark:text-white sm:text-4xl">
                                            {{ $card['word'] }}
                                        </h3>
                                    </div>

                                    <div
                                            class="sa-dropzone flex min-h-[96px] cursor-pointer items-center justify-center rounded-2xl border-2 border-dashed px-4 py-5 text-center text-sm font-black leading-snug transition sm:min-h-[130px] sm:text-base {{ $dropClass }}"
                                            data-group="{{ $card['group_key'] }}"
                                            data-answer="{{ $card['answer'] }}"
                                            data-filled="0"
                                            role="button"
                                            tabindex="0"
                                    >
                                        Drop answer here
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    {{-- Answer bank --}}
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-2.5 dark:border-slate-700 dark:bg-slate-950/40 sm:p-3 xl:flex xl:flex-col">
                        <div class="mb-2 flex items-center justify-between gap-2">
                            <p class="text-[0.7rem] font-black uppercase tracking-wide text-slate-500 dark:text-slate-400">
                                Answers
                            </p>

                            <p class="text-[0.7rem] font-bold text-slate-400">
                                Tap or drag
                            </p>
                        </div>

                        @foreach($content['groups'] as $group)
                            @php
                                $answers = array_values($group['items']);
                                shuffle($answers);

                                $isPurpleBank = $group['tone'] === 'purple';

                                $bankWrapClass = $isPurpleBank
                                    ? 'border-violet-200 bg-violet-50/30 dark:border-violet-500/20 dark:bg-violet-950/10'
                                    : 'border-emerald-200 bg-emerald-50/30 dark:border-emerald-500/20 dark:bg-emerald-950/10';

                                $tileClass = $isPurpleBank
                                    ? 'border-violet-200 bg-white text-violet-700 hover:border-violet-400 hover:bg-violet-50 dark:border-violet-500/25 dark:bg-slate-900 dark:text-violet-200 dark:hover:bg-violet-950/30'
                                    : 'border-emerald-200 bg-white text-emerald-700 hover:border-emerald-400 hover:bg-emerald-50 dark:border-emerald-500/25 dark:bg-slate-900 dark:text-emerald-200 dark:hover:bg-emerald-950/30';
                            @endphp

                            <div
                                    class="sa-bank {{ $loop->first ? '' : 'hidden' }} grid grid-cols-2 gap-1.5 rounded-2xl border p-2 sm:grid-cols-3 sm:gap-2 xl:grid-cols-1 xl:content-start {{ $bankWrapClass }}"
                                    data-bank="{{ $group['key'] }}"
                            >
                                @foreach($answers as $answerItem)
                                    <button
                                            type="button"
                                            class="sa-tile min-h-[38px] rounded-xl border px-2 py-1.5 text-center text-[0.76rem] font-black leading-snug shadow-sm transition sm:min-h-[42px] sm:px-3 sm:text-sm xl:min-h-[48px] {{ $tileClass }}"
                                            data-group="{{ $group['key'] }}"
                                            data-answer="{{ $answerItem['answer'] }}"
                                            data-used="0"
                                    >
                                        {{ $answerItem['answer'] }}
                                    </button>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="saDone" class="pointer-events-none fixed inset-x-4 top-24 z-50 hidden justify-center">
                <div class="rounded-3xl border border-white/80 bg-white/95 px-7 py-5 text-center text-xl font-black text-slate-950 shadow-2xl backdrop-blur-xl dark:border-white/10 dark:bg-slate-950/90 dark:text-white">
                    🎉 Great job!
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            const game = document.getElementById('synonymAntonymGame');
            if (!game) return;

            const total = Number(game.dataset.total || 0);
            const scoreEl = document.getElementById('saScore');
            const mistakesEl = document.getElementById('saMistakes');
            const progressEl = document.getElementById('saProgress');
            const prevBtn = document.getElementById('saPrev');
            const nextBtn = document.getElementById('saNext');
            const resetBtn = document.getElementById('saReset');
            const doneEl = document.getElementById('saDone');

            const cards = Array.from(game.querySelectorAll('.sa-card'));
            const banks = Array.from(game.querySelectorAll('.sa-bank'));

            let currentIndex = 0;
            let mistakes = 0;
            let selectedTile = null;

            let pointerTile = null;
            let dragGhost = null;
            let dragging = false;
            let startX = 0;
            let startY = 0;

            function normalize(value) {
                return String(value || '').replace(/\s+/g, ' ').trim().toLowerCase();
            }

            function score() {
                return cards.filter(card => card.dataset.filled === '1').length;
            }

            function updateStats() {
                const currentScore = score();

                scoreEl.textContent = String(currentScore);
                mistakesEl.textContent = String(mistakes);

                if (progressEl) {
                    progressEl.style.width = total ? `${(currentScore / total) * 100}%` : '0%';
                }

                prevBtn.disabled = currentIndex === 0;
                nextBtn.disabled = currentIndex === cards.length - 1;
            }

            function clearSelection() {
                if (selectedTile) {
                    selectedTile.classList.remove('is-selected');
                }

                selectedTile = null;
            }

            function activeCard() {
                return cards[currentIndex];
            }

            function showBank(groupKey) {
                banks.forEach(bank => {
                    bank.classList.toggle('hidden', bank.dataset.bank !== groupKey);
                });
            }

            function showCard(index) {
                currentIndex = Math.max(0, Math.min(index, cards.length - 1));

                cards.forEach((card, cardIndex) => {
                    card.classList.toggle('hidden', cardIndex !== currentIndex);
                });

                showBank(activeCard().dataset.group);
                clearSelection();
                updateStats();
            }

            function nextUnansweredIndex(fromIndex) {
                for (let i = fromIndex; i < cards.length; i++) {
                    if (cards[i].dataset.filled !== '1') return i;
                }

                for (let i = 0; i < fromIndex; i++) {
                    if (cards[i].dataset.filled !== '1') return i;
                }

                return null;
            }

            function markWrong(tile, dropzone) {
                mistakes += 1;
                updateStats();

                [tile, dropzone].filter(Boolean).forEach(el => {
                    el.classList.add('sa-shake');
                    setTimeout(() => el.classList.remove('sa-shake'), 520);
                });
            }

            function placeTile(tile, dropzone) {
                if (!tile || !dropzone || tile.dataset.used === '1' || dropzone.dataset.filled === '1') return;

                const card = dropzone.closest('.sa-card');
                const sameGroup = tile.dataset.group === dropzone.dataset.group;
                const correct = normalize(tile.dataset.answer) === normalize(dropzone.dataset.answer);

                if (!sameGroup || !correct) {
                    markWrong(tile, dropzone);
                    clearSelection();
                    return;
                }

                card.dataset.filled = '1';
                dropzone.dataset.filled = '1';
                dropzone.innerHTML = '';
                dropzone.classList.add('is-correct');

                tile.dataset.used = '1';
                tile.disabled = true;
                tile.classList.remove('is-selected');
                tile.classList.add('is-used');

                dropzone.appendChild(tile);
                clearSelection();
                updateStats();

                if (score() === total) {
                    doneEl.classList.remove('hidden');
                    doneEl.classList.add('flex');

                    setTimeout(() => {
                        doneEl.classList.add('hidden');
                        doneEl.classList.remove('flex');
                    }, 1800);

                    return;
                }

                setTimeout(() => {
                    const nextIndex = nextUnansweredIndex(currentIndex + 1);
                    if (nextIndex !== null) showCard(nextIndex);
                }, 550);
            }

            function selectTile(tile) {
                if (!tile || tile.disabled || tile.dataset.used === '1') return;

                if (selectedTile === tile) {
                    clearSelection();
                    return;
                }

                clearSelection();
                selectedTile = tile;
                tile.classList.add('is-selected');
            }

            function createGhost(tile, x, y) {
                removeGhost();

                dragGhost = tile.cloneNode(true);
                dragGhost.classList.add('sa-drag-ghost');
                dragGhost.style.width = `${tile.getBoundingClientRect().width}px`;
                dragGhost.style.left = `${x}px`;
                dragGhost.style.top = `${y}px`;

                document.body.appendChild(dragGhost);
            }

            function moveGhost(x, y) {
                if (!dragGhost) return;

                dragGhost.style.left = `${x}px`;
                dragGhost.style.top = `${y}px`;

                game.querySelectorAll('.sa-dropzone').forEach(zone => zone.classList.remove('is-ready'));

                const element = document.elementFromPoint(x, y);
                const zone = element?.closest?.('.sa-dropzone');

                if (zone && zone.dataset.filled !== '1') {
                    zone.classList.add('is-ready');
                }
            }

            function removeGhost() {
                if (dragGhost) {
                    dragGhost.remove();
                    dragGhost = null;
                }

                game.querySelectorAll('.sa-dropzone').forEach(zone => zone.classList.remove('is-ready'));
            }

            function resetGame() {
                mistakes = 0;
                clearSelection();
                removeGhost();

                game.querySelectorAll('.sa-tile').forEach(tile => {
                    const bank = game.querySelector(`.sa-bank[data-bank="${tile.dataset.group}"]`);

                    tile.disabled = false;
                    tile.dataset.used = '0';
                    tile.classList.remove('is-used', 'is-selected', 'sa-shake');

                    if (bank) bank.appendChild(tile);
                });

                cards.forEach(card => {
                    card.dataset.filled = '0';

                    const dropzone = card.querySelector('.sa-dropzone');
                    dropzone.dataset.filled = '0';
                    dropzone.classList.remove('is-correct', 'is-ready', 'sa-shake');
                    dropzone.innerHTML = 'Drop answer here';
                });

                showCard(0);
                updateStats();
            }

            prevBtn.addEventListener('click', () => showCard(currentIndex - 1));
            nextBtn.addEventListener('click', () => showCard(currentIndex + 1));
            resetBtn.addEventListener('click', resetGame);

            game.querySelectorAll('.sa-dropzone').forEach(dropzone => {
                dropzone.addEventListener('click', () => {
                    if (selectedTile) placeTile(selectedTile, dropzone);
                });

                dropzone.addEventListener('keydown', event => {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        if (selectedTile) placeTile(selectedTile, dropzone);
                    }
                });
            });

            game.querySelectorAll('.sa-tile').forEach(tile => {
                tile.addEventListener('pointerdown', event => {
                    if (tile.disabled || tile.dataset.used === '1') return;

                    pointerTile = tile;
                    dragging = false;
                    startX = event.clientX;
                    startY = event.clientY;

                    tile.setPointerCapture?.(event.pointerId);
                });

                tile.addEventListener('pointermove', event => {
                    if (pointerTile !== tile) return;

                    const distance = Math.hypot(event.clientX - startX, event.clientY - startY);

                    if (!dragging && distance > 6) {
                        dragging = true;
                        clearSelection();
                        createGhost(tile, event.clientX, event.clientY);
                    }

                    if (dragging) {
                        event.preventDefault();
                        moveGhost(event.clientX, event.clientY);
                    }
                });

                tile.addEventListener('pointerup', event => {
                    if (pointerTile !== tile) return;

                    tile.releasePointerCapture?.(event.pointerId);

                    if (dragging) {
                        const element = document.elementFromPoint(event.clientX, event.clientY);
                        const dropzone = element?.closest?.('.sa-dropzone');

                        if (dropzone) {
                            placeTile(tile, dropzone);
                        }

                        removeGhost();
                    } else {
                        selectTile(tile);
                    }

                    pointerTile = null;
                    dragging = false;
                });

                tile.addEventListener('pointercancel', () => {
                    pointerTile = null;
                    dragging = false;
                    removeGhost();
                });
            });

            showCard(0);
            updateStats();

            window.resetSlide = resetGame;
        })();
    </script>
@endsection