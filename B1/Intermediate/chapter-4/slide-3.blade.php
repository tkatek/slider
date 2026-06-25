@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Pronunciation',
        'title'      => 'Can you pronounce it right?',
        'subtitle'   => 'Listen and choose the right pronunciation of these brands.',
        'note'       => 'Can you tell what each brand is about?',

        'brands' => [
            [
                'name' => 'Nike',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/nike.webp'),
                'correct' => 'a',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/nike-c.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/nike-w.mp3')],
                ],
            ],
            [
                'name' => 'Samsung',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/samsung.webp'),
                'correct' => 'b',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/samsung-w.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/samsung-c.mp3')],
                ],
            ],
            [
                'name' => 'Adobe',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/adobe.webp'),
                'correct' => 'a',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/adobe-c.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/adobe-w.mp3')],
                ],
            ],
            [
                'name' => 'Adidas',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/adidas.webp'),
                'correct' => 'b',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/adidas-w.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/adidas-c.mp3')],
                ],
            ],
            [
                'name' => 'Porche',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/porche.webp'),
                'correct' => 'a',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/porche-c.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/porche-w.mp3')],
                ],
            ],
            [
                'name' => 'Yves Saint Laurent',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/yves-saint-laurent.webp'),
                'correct' => 'b',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/yves-saint-laurent-w.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/yves-saint-laurent-c.mp3')],
                ],
            ],
            [
                'name' => 'Huawei',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/huawei.webp'),
                'correct' => 'a',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/huawei-c.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/huawei-w.mp3')],
                ],
            ],
            [
                'name' => 'Chevrolet',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/chevrolet.webp'),
                'correct' => 'b',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/chevrolet-w.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/chevrolet-c.mp3')],
                ],
            ],
            [
                'name' => 'BMW',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/bmw.webp'),
                'correct' => 'a',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/bmw-c.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/bmw-w.mp3')],
                ],
            ],
            [
                'name' => 'Moschino',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/moschino.webp'),
                'correct' => 'b',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/moschino-w.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/moschino-c.mp3')],
                ],
            ],
            [
                'name' => 'Peugeot',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/peugeot.webp'),
                'correct' => 'a',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/peugeot-c.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/peugeot-w.mp3')],
                ],
            ],
            [
                'name' => 'Volkswagen',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/volkswagen.webp'),
                'correct' => 'b',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/volkswagen-w.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/volkswagen-c.mp3')],
                ],
            ],
            [
                'name' => 'Audi',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/audi.webp'),
                'correct' => 'a',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/audi-c.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/audi-w.mp3')],
                ],
            ],
            [
                'name' => 'Hublot',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/hublot.webp'),
                'correct' => 'b',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/hublot-w.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/hublot-c.mp3')],
                ],
            ],
            [
                'name' => 'Asus',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/asus.webp'),
                'correct' => 'a',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/asus-c.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/asus-w.mp3')],
                ],
            ],
            [
                'name' => 'Miu Miu',
                'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide3/miu-miu.webp'),
                'correct' => 'b',
                'options' => [
                    ['key' => 'a', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/miu-miu-w.mp3')],
                    ['key' => 'b', 'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide3/miu-miu-c.mp3')],
                ],
            ],
        ],
    ];

    $sfx = [
        'correct' => materialAsset('slider/sounds/correct.wav'),
        'wrong'   => materialAsset('slider/sounds/wrong.wav'),
    ];
@endphp

@section('content')
    <main
            id="brandPronunciationGame"
            class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8"
            data-brands='@json($content['brands'])'
            data-sfx='@json($sfx)'
    >
        <section class="mx-auto flex min-h-[calc(100dvh-2.5rem)] w-full max-w-[1120px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-5 grid w-full max-w-5xl gap-4 lg:grid-cols-[0.85fr_1.15fr]">
                <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white/90 shadow-sm dark:border-slate-700 dark:bg-slate-900/85">
                    <div class="flex items-center justify-between gap-3 border-b border-slate-200 px-4 py-3 dark:border-slate-700">
                        <div>
                            <p class="text-[0.65rem] font-black uppercase tracking-[0.18em] text-emerald-600 dark:text-emerald-300">
                                Brand
                            </p>
                            <h2 id="brandName" class="mt-1 text-xl font-black leading-tight text-slate-950 dark:text-white sm:text-2xl">
                                Nike
                            </h2>
                        </div>

                        <div id="progressText" class="rounded-full bg-slate-100 px-3 py-1 text-xs font-black text-slate-600 dark:bg-slate-800 dark:text-slate-200">
                            1 / 16
                        </div>
                    </div>

                    <div class="p-4">
                        <div class="mx-auto aspect-[5/4] w-full max-w-[17rem] overflow-hidden rounded-xl border border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-950 sm:max-w-[19rem]">
                            <img
                                    id="brandImage"
                                    src=""
                                    alt=""
                                    class="h-full w-full object-contain p-5"
                            >
                        </div>

                        <p class="mt-4 rounded-xl bg-slate-50 px-4 py-3 text-center text-sm font-black leading-snug text-slate-700 dark:bg-slate-950/60 dark:text-slate-200 sm:text-base">
                            {{ $content['note'] }}
                        </p>
                    </div>
                </section>

                <section class="rounded-2xl border border-slate-200 bg-white/90 p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/85">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-400">
                        Choose the correct pronunciation
                    </p>

                    <div id="optionsWrap" class="mt-4 grid gap-3 sm:grid-cols-2"></div>

                    <div class="mt-5 flex items-center justify-between gap-3">
                        <button
                                id="prevBtn"
                                type="button"
                                class="rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-black text-slate-700 transition hover:bg-slate-50 disabled:cursor-not-allowed disabled:opacity-40 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:hover:bg-slate-800"
                        >
                            Previous
                        </button>

                        <button
                                id="nextBtn"
                                type="button"
                                class="rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-black text-white shadow-sm transition hover:bg-emerald-500 disabled:cursor-not-allowed disabled:opacity-40"
                        >
                            Next
                        </button>
                    </div>

                    <div class="mt-5 rounded-xl bg-slate-50 p-4 dark:bg-slate-950/60">
                        <div class="grid grid-cols-3 gap-2 text-center">
                            <div class="rounded-xl bg-white px-3 py-2 shadow-sm dark:bg-slate-900">
                                <p class="text-[0.65rem] font-black uppercase tracking-[0.12em] text-slate-500 dark:text-slate-400">
                                    Correct
                                </p>
                                <p id="correctText" class="mt-1 text-xl font-black text-emerald-600 dark:text-emerald-300">0</p>
                            </div>

                            <div class="rounded-xl bg-white px-3 py-2 shadow-sm dark:bg-slate-900">
                                <p class="text-[0.65rem] font-black uppercase tracking-[0.12em] text-slate-500 dark:text-slate-400">
                                    Mistakes
                                </p>
                                <p id="mistakesText" class="mt-1 text-xl font-black text-rose-600 dark:text-rose-300">0</p>
                            </div>

                            <div class="rounded-xl bg-white px-3 py-2 shadow-sm dark:bg-slate-900">
                                <p class="text-[0.65rem] font-black uppercase tracking-[0.12em] text-slate-500 dark:text-slate-400">
                                    Answered
                                </p>
                                <p id="answeredText" class="mt-1 text-xl font-black text-slate-900 dark:text-slate-100">0 / 16</p>
                            </div>
                        </div>

                        <div class="mt-3 h-2 overflow-hidden rounded-full bg-slate-200 dark:bg-slate-800">
                            <div id="progressBar" class="h-full w-0 rounded-full bg-emerald-500 transition-all"></div>
                        </div>
                    </div>
                </section>
            </div>

            @include('slider.components.game-win-modal', [
                'modalId' => 'brandPronunciationWinModal',
                'modalTitle' => 'Great job!',
                'modalStats' => [
                    ['label' => 'Correct', 'id' => 'finalCorrect', 'icon_class' => 'fa-solid fa-check'],
                    ['label' => 'Total', 'id' => 'finalTotal', 'icon_class' => 'fa-solid fa-list-check'],
                    ['label' => 'Mistakes', 'id' => 'finalMistakes', 'icon_class' => 'fa-solid fa-xmark'],
                ],
                'modalActions' => [
                    [
                        'label' => 'Retake',
                        'id' => 'restartBtnModal',
                        'class' => 'game-win-action game-win-secondary-action w-full',
                    ],
                    [
                        'label' => 'Continue',
                        'id' => 'continueBtnModal',
                        'class' => 'game-win-action game-win-primary-action w-full',
                    ],
                ],
            ])
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const root = document.getElementById('brandPronunciationGame');
            if (!root) return;

            const brands = JSON.parse(root.dataset.brands || '[]');
            const sfx = JSON.parse(root.dataset.sfx || '{}');
            const brandName = document.getElementById('brandName');
            const brandImage = document.getElementById('brandImage');
            const progressText = document.getElementById('progressText');
            const optionsWrap = document.getElementById('optionsWrap');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const correctText = document.getElementById('correctText');
            const mistakesText = document.getElementById('mistakesText');
            const answeredText = document.getElementById('answeredText');
            const progressBar = document.getElementById('progressBar');
            const answers = new Map();
            const sounds = {};
            let index = 0;
            let winModalShown = false;

            Object.keys(sfx).forEach((key) => {
                sounds[key] = new Audio(sfx[key]);
                sounds[key].preload = 'auto';
            });

            function playSound(key) {
                const sound = sounds[key];
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function stopAllAudio() {
                document.querySelectorAll('#brandPronunciationGame audio').forEach((audio) => {
                    audio.pause();
                    audio.currentTime = 0;
                });
            }

            function score() {
                let correct = 0;
                answers.forEach((value, brandIndex) => {
                    if (brands[brandIndex] && value === brands[brandIndex].correct) {
                        correct += 1;
                    }
                });
                return correct;
            }

            function mistakes() {
                return answers.size - score();
            }

            function updateScore() {
                const correctCount = score();
                const mistakesCount = mistakes();

                correctText.textContent = correctCount;
                mistakesText.textContent = mistakesCount;
                answeredText.textContent = `${answers.size} / ${brands.length}`;
                progressBar.style.width = brands.length ? `${(answers.size / brands.length) * 100}%` : '0%';
            }

            function getWinModal() {
                return document.getElementById('brandPronunciationWinModal');
            }

            function showWinModal() {
                const modal = getWinModal();
                if (!modal) return;

                const finalCorrect = document.getElementById('finalCorrect');
                const finalTotal = document.getElementById('finalTotal');
                const finalMistakes = document.getElementById('finalMistakes');

                if (finalCorrect) finalCorrect.textContent = score();
                if (finalTotal) finalTotal.textContent = brands.length;
                if (finalMistakes) finalMistakes.textContent = mistakes();

                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            function hideWinModal() {
                const modal = getWinModal();
                if (!modal) return;

                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }

            function choose(optionKey, button) {
                if (!brands[index]) return;
                if (answers.has(index)) return;

                answers.set(index, optionKey);

                const isCorrect = optionKey === brands[index].correct;
                button.classList.add(
                    isCorrect ? 'border-emerald-400' : 'border-rose-400',
                    isCorrect ? 'bg-emerald-50' : 'bg-rose-50',
                    isCorrect ? 'dark:bg-emerald-500/10' : 'dark:bg-rose-500/10'
                );

                Array.from(optionsWrap.querySelectorAll('[data-option-key]')).forEach((optionButton) => {
                    optionButton.dataset.locked = 'true';
                    if (optionButton.dataset.optionKey === brands[index].correct) {
                        optionButton.classList.add('border-emerald-400', 'ring-4', 'ring-emerald-300/30');
                    }
                });

                playSound(isCorrect ? 'correct' : 'wrong');
                updateScore();

                if (answers.size === brands.length && !winModalShown) {
                    winModalShown = true;
                    setTimeout(showWinModal, 450);
                }
            }

            function render() {
                const brand = brands[index];
                if (!brand) return;

                stopAllAudio();
                brandName.textContent = brand.name;
                brandImage.src = brand.image;
                brandImage.alt = brand.name;
                progressText.textContent = `${index + 1} / ${brands.length}`;
                optionsWrap.innerHTML = '';

                const savedAnswer = answers.get(index);

                brand.options.forEach((option, optionIndex) => {
                    const button = document.createElement('button');
                    button.type = 'button';
                    button.dataset.optionKey = option.key;
                    button.className = 'group rounded-2xl border border-slate-200 bg-white p-4 text-left shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-200 hover:shadow-md dark:border-slate-700 dark:bg-slate-950/50 dark:hover:border-emerald-400/60';

                    button.innerHTML = `
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-sm font-black text-slate-700 transition group-hover:bg-emerald-50 group-hover:text-emerald-700 dark:bg-slate-800 dark:text-slate-200 dark:group-hover:bg-emerald-500/10 dark:group-hover:text-emerald-200">
                                ${optionIndex === 0 ? 'A' : 'B'}
                            </span>
                            <div class="min-w-0 flex-1">
                                <p class="text-xs font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-400">
                                    Option ${optionIndex === 0 ? 'A' : 'B'}
                                </p>
                                <p class="mt-1 text-sm font-black text-slate-900 dark:text-slate-100">
                                    Listen
                                </p>
                            </div>
                            <span
                                    class="listen-btn inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-emerald-100 bg-emerald-50 text-emerald-700 transition hover:scale-105 hover:bg-emerald-100 dark:border-emerald-400/20 dark:bg-emerald-500/10 dark:text-emerald-200"
                                    aria-label="Play option ${optionIndex === 0 ? 'A' : 'B'}"
                            >
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 5v14l11-7-11-7z"></path>
                                </svg>
                            </span>
                        </div>
                        <audio class="hidden" preload="none" src="${option.audio}"></audio>
                    `;

                    button.addEventListener('click', (event) => {
                        if (event.target.closest('audio')) return;
                        choose(option.key, button);
                    });

                    const audio = button.querySelector('audio');
                    const listenBtn = button.querySelector('.listen-btn');

                    listenBtn.addEventListener('click', (event) => {
                        event.preventDefault();
                        event.stopPropagation();

                        if (!audio.paused) {
                            audio.pause();
                            audio.currentTime = 0;
                            return;
                        }

                        audio.play().catch(() => {});
                    });

                    audio.addEventListener('play', () => {
                        document.querySelectorAll('#brandPronunciationGame audio').forEach((otherAudio) => {
                            if (otherAudio !== audio) {
                                otherAudio.pause();
                                otherAudio.currentTime = 0;
                            }
                        });

                        listenBtn.classList.remove('border-emerald-100', 'bg-emerald-50', 'text-emerald-700', 'dark:border-emerald-400/20', 'dark:bg-emerald-500/10', 'dark:text-emerald-200');
                        listenBtn.classList.add('border-emerald-500', 'bg-emerald-600', 'text-white');
                    });

                    audio.addEventListener('pause', () => {
                        listenBtn.classList.add('border-emerald-100', 'bg-emerald-50', 'text-emerald-700', 'dark:border-emerald-400/20', 'dark:bg-emerald-500/10', 'dark:text-emerald-200');
                        listenBtn.classList.remove('border-emerald-500', 'bg-emerald-600', 'text-white');
                    });

                    audio.addEventListener('ended', () => {
                        audio.currentTime = 0;
                    });

                    if (savedAnswer) {
                        button.dataset.locked = 'true';
                        if (option.key === brand.correct) {
                            button.classList.add('border-emerald-400', 'ring-4', 'ring-emerald-300/30');
                        } else if (option.key === savedAnswer) {
                            button.classList.add('border-rose-400', 'bg-rose-50', 'dark:bg-rose-500/10');
                        }
                    }

                    optionsWrap.appendChild(button);
                });

                prevBtn.disabled = index === 0;
                nextBtn.disabled = index === brands.length - 1;
                updateScore();
            }

            prevBtn.addEventListener('click', () => {
                if (index <= 0) return;
                index -= 1;
                render();
            });

            nextBtn.addEventListener('click', () => {
                if (index >= brands.length - 1) return;
                index += 1;
                render();
            });

            window.resetSlide = () => {
                answers.clear();
                index = 0;
                winModalShown = false;
                hideWinModal();
                render();
            };

            window.stopSlideAudio = stopAllAudio;

            document.getElementById('restartBtnModal')?.addEventListener('click', () => {
                window.resetSlide();
            });

            document.getElementById('continueBtnModal')?.addEventListener('click', hideWinModal);

            render();
        });
    </script>
@endsection
