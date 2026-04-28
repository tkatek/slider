@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $columns = is_array($content['columns'] ?? null) ? $content['columns'] : [];
    $words = is_array($content['words'] ?? null) ? $content['words'] : [];
    $sounds = is_array($content['sounds'] ?? null) ? $content['sounds'] : [];
@endphp

@section('title', $content['page_title'] ?? $content['title'] ?? 'Reading Comprehension')

@section('style')
    <style>
        .lt-card {
            border-radius: 24px;
            border: 1px solid rgba(226, 232, 240, .9);
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 18px 45px rgba(2, 6, 23, .08);
        }

        .dark .lt-card {
            border-color: rgba(51, 65, 85, .75);
            background: rgba(15, 23, 42, .86);
        }

        .lt-title-panel {
            border-radius: 20px;
            border: 1px solid rgba(251, 146, 60, .22);
            background: linear-gradient(135deg, rgba(255, 247, 237, .92), rgba(255, 255, 255, .82));
            padding: .9rem 1rem;
        }

        .dark .lt-title-panel {
            border-color: rgba(251, 146, 60, .18);
            background: linear-gradient(135deg, rgba(67, 20, 7, .34), rgba(15, 23, 42, .66));
        }

        .lt-btn {
            border-radius: 14px;
            padding: .65rem 1rem;
            font-size: .82rem;
            font-weight: 900;
            transition: transform .16s ease, box-shadow .16s ease, background-color .16s ease;
        }

        .lt-btn:hover {
            transform: translateY(-1px);
        }

        .lt-btn-primary {
            border: 1px solid rgba(255, 255, 255, .14);
            background: linear-gradient(135deg, #fdba74, #f97316);
            color: #fff;
            box-shadow: 0 10px 22px rgba(234, 88, 12, .16);
        }

        .lt-btn-soft {
            border: 1px solid rgba(226, 232, 240, 1);
            background: #fff;
            color: #334155;
            box-shadow: 0 8px 22px rgba(2, 6, 23, .05);
        }

        .dark .lt-btn-soft {
            border-color: rgba(51, 65, 85, 1);
            background: #0f172a;
            color: #e2e8f0;
        }

        .rc-shell {
            width: 100%;
        }

        .rc-main-card {
            overflow: hidden;
        }

        .rc-content-grid {
            display: grid;
            grid-template-columns: minmax(300px, .85fr) minmax(0, 1.35fr);
            gap: 1rem;
            align-items: stretch;
        }

        .rc-reading-panel,
        .rc-organizer-panel {
            border-radius: 22px;
            border: 1px solid rgba(226, 232, 240, .9);
            background: rgba(248, 250, 252, .72);
        }

        .dark .rc-reading-panel,
        .dark .rc-organizer-panel {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(2, 6, 23, .28);
        }

        .rc-reading-panel {
            padding: 1rem;
        }

        .rc-organizer-panel {
            padding: 1rem;
        }

        .rc-photo-wrap {
            position: relative;
            margin-bottom: .85rem;
            overflow: hidden;
            border-radius: 20px;
            border: 1px solid rgba(251, 146, 60, .24);
            background: linear-gradient(135deg, rgba(255, 247, 237, .9), rgba(248, 250, 252, .82));
            padding: .45rem;
        }

        .dark .rc-photo-wrap {
            border-color: rgba(251, 146, 60, .18);
            background: linear-gradient(135deg, rgba(67, 20, 7, .24), rgba(15, 23, 42, .64));
        }

        .rc-photo {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 16px;
            background: #e2e8f0;
        }

        .dark .rc-photo {
            background: #1e293b;
        }

        .rc-student-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .45rem;
            border-radius: 999px;
            background: rgba(251, 146, 60, .12);
            color: #9a3412;
            padding: .45rem .72rem;
            font-size: .86rem;
            font-weight: 1000;
            line-height: 1.15;
        }

        .dark .rc-student-badge {
            background: rgba(251, 146, 60, .14);
            color: #fed7aa;
        }

        .rc-paragraph {
            margin-top: .8rem;
            color: #0f172a;
            font-size: .96rem;
            font-weight: 750;
            line-height: 1.72;
        }

        .dark .rc-paragraph {
            color: #f8fafc;
        }

        .word-red {
            display: inline;
            color: #ea580c;
            font-weight: 1000;
        }

        .dark .word-red {
            color: #fdba74;
        }

        .rc-mini-title {
            color: #0f172a;
            font-size: .95rem;
            font-weight: 1000;
            line-height: 1.2;
        }

        .dark .rc-mini-title {
            color: #f8fafc;
        }

        .rc-mini-note {
            margin-top: .2rem;
            color: #64748b;
            font-size: .78rem;
            font-weight: 800;
            line-height: 1.45;
        }

        .dark .rc-mini-note {
            color: #94a3b8;
        }

        .rc-word-bank {
            min-height: 66px;
            display: flex;
            flex-wrap: wrap;
            align-content: flex-start;
            align-items: flex-start;
            gap: .5rem;
            border-radius: 18px;
            border: 1px dashed rgba(251, 146, 60, .42);
            background: rgba(255, 247, 237, .54);
            padding: .75rem;
        }

        .dark .rc-word-bank {
            border-color: rgba(251, 146, 60, .24);
            background: rgba(67, 20, 7, .18);
        }

        .rc-chip {
            display: inline-flex;
            min-height: 34px;
            cursor: grab;
            user-select: none;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            border: 1px solid rgba(226, 232, 240, .95);
            background: rgba(255, 255, 255, .92);
            color: #334155;
            padding: .4rem .78rem;
            font-size: .83rem;
            font-weight: 950;
            line-height: 1.1;
            text-align: center;
            white-space: nowrap;
            transition: transform .16s ease, box-shadow .16s ease, border-color .16s ease, background-color .16s ease, color .16s ease;
        }

        .rc-chip:hover {
            transform: translateY(-1px);
            border-color: rgba(249, 115, 22, .52);
            box-shadow: 0 10px 22px rgba(234, 88, 12, .10);
        }

        .rc-chip:active {
            cursor: grabbing;
        }

        .dark .rc-chip {
            border-color: rgba(51, 65, 85, .95);
            background: rgba(15, 23, 42, .82);
            color: #e2e8f0;
        }

        .rc-chip.is-selected {
            border-color: #f97316 !important;
            color: #c2410c;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, .18);
        }

        .dark .rc-chip.is-selected {
            color: #fdba74;
        }

        .rc-chip.is-correct {
            border-color: #16a34a !important;
            background: rgba(220, 252, 231, .9) !important;
            color: #166534 !important;
        }

        .dark .rc-chip.is-correct {
            background: rgba(20, 83, 45, .42) !important;
            color: #bbf7d0 !important;
        }

        .rc-chip.is-wrong {
            border-color: #dc2626 !important;
            background: rgba(254, 226, 226, .95) !important;
            color: #991b1b !important;
        }

        .dark .rc-chip.is-wrong {
            background: rgba(127, 29, 29, .42) !important;
            color: #fecaca !important;
        }

        .rc-columns-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: .65rem;
            margin-top: .75rem;
        }

        .rc-column {
            overflow: hidden;
            min-height: 132px;
            display: flex;
            flex-direction: column;
            border-radius: 18px;
            border: 1px solid rgba(226, 232, 240, .9);
            background: rgba(255, 255, 255, .74);
            transition: border-color .16s ease, box-shadow .16s ease, background-color .16s ease;
        }

        .dark .rc-column {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(15, 23, 42, .44);
        }

        .rc-column-head {
            border-bottom: 1px solid rgba(226, 232, 240, .9);
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
            color: #9a3412;
            padding: .62rem .5rem;
            text-align: center;
            font-size: .8rem;
            font-weight: 1000;
            line-height: 1.15;
        }

        .dark .rc-column-head {
            border-bottom-color: rgba(51, 65, 85, .85);
            background: linear-gradient(135deg, rgba(67, 20, 7, .34), rgba(15, 23, 42, .66));
            color: #fed7aa;
        }

        .rc-drop-zone {
            flex: 1;
            min-height: 86px;
            display: flex;
            flex-wrap: wrap;
            align-content: flex-start;
            align-items: flex-start;
            gap: .42rem;
            padding: .55rem;
            transition: background-color .16s ease;
        }

        .rc-drop-zone.is-over {
            background: rgba(251, 146, 60, .12);
        }

        .dark .rc-drop-zone.is-over {
            background: rgba(251, 146, 60, .16);
        }

        .rc-feedback {
            min-height: 1.2rem;
            margin-top: .8rem;
            color: #64748b;
            font-size: .86rem;
            font-weight: 900;
            line-height: 1.35;
        }

        .dark .rc-feedback {
            color: #cbd5e1;
        }

        @media (max-width: 1180px) {
            .rc-content-grid {
                grid-template-columns: minmax(260px, .82fr) minmax(0, 1.18fr);
            }

            .rc-photo {
                height: 154px;
            }

            .rc-paragraph {
                font-size: .9rem;
                line-height: 1.62;
            }

            .rc-column {
                min-height: 120px;
            }

            .rc-drop-zone {
                min-height: 78px;
            }
        }

        @media (max-width: 1023px) {
            .rc-content-grid {
                grid-template-columns: 1fr;
            }

            .rc-photo {
                height: 210px;
            }

            .rc-reading-panel {
                display: grid;
                grid-template-columns: minmax(170px, 240px) minmax(0, 1fr);
                gap: 1rem;
                align-items: start;
            }

            .rc-photo-wrap {
                margin-bottom: 0;
            }

            .rc-paragraph {
                margin-top: .7rem;
            }

            .rc-columns-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 640px) {
            .lt-card {
                border-radius: 20px;
                padding: .85rem !important;
            }

            .lt-title-panel {
                padding: .8rem;
            }

            .lt-btn {
                flex: 1 1 100%;
                padding: .72rem .85rem;
            }

            .rc-reading-panel,
            .rc-organizer-panel {
                border-radius: 18px;
                padding: .85rem;
            }

            .rc-reading-panel {
                display: block;
            }

            .rc-photo {
                height: 190px;
            }

            .rc-paragraph {
                font-size: .9rem;
                line-height: 1.62;
            }

            .rc-word-bank {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .rc-chip {
                width: 100%;
                white-space: normal;
                border-radius: 14px;
                padding: .48rem .55rem;
            }

            .rc-drop-zone .rc-chip {
                width: auto;
            }

            .rc-columns-grid {
                grid-template-columns: 1fr;
            }

            .rc-column {
                min-height: auto;
            }

            .rc-drop-zone {
                min-height: 72px;
            }
        }
    </style>
@endsection

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center">
        @include('slider.components.title-subtitle')

        <section class="rc-shell mx-auto w-full max-w-6xl px-4 py-4 sm:px-8">
            <div class="lt-card rc-main-card p-4 sm:p-5">
                <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
                    <div class="lt-title-panel min-w-0 flex-1">
                        <h2 class="text-sm font-black leading-snug text-slate-900 dark:text-white sm:text-lg">
                            {{ $content['instruction'] ?? 'Read and complete the activity.' }}
                        </h2>

                        @if(($content['instruction_note'] ?? '') !== '')
                            <p class="mt-1 text-xs font-bold text-slate-500 dark:text-slate-400 sm:text-sm">
                                {{ $content['instruction_note'] }}
                            </p>
                        @endif
                    </div>

                    <div class="flex flex-wrap items-center justify-end gap-2">
                        <button id="checkAnswersBtn" type="button" class="lt-btn lt-btn-primary">Check Answers</button>
                        <button id="revealAnswersBtn" type="button" class="lt-btn lt-btn-soft">Reveal answers</button>
                        <button id="retakeBtn" type="button" class="lt-btn lt-btn-soft">Retake</button>
                    </div>
                </div>

                <div class="rc-content-grid">
                    <section class="rc-reading-panel">
                        @if(!empty($content['student_image']))
                            <div class="rc-photo-wrap">
                                <img
                                        src="{{ $content['student_image'] }}"
                                        alt="{{ $content['student_name'] ?? 'Student' }}"
                                        class="rc-photo"
                                        loading="lazy"
                                        decoding="async"
                                >
                            </div>
                        @endif

                        <div class="min-w-0">
                            @if(($content['student_name'] ?? '') !== '')
                                <div class="rc-student-badge">
                                    {{ $content['student_name'] }}
                                </div>
                            @endif

                            <p class="rc-paragraph">
                                {!! $content['student_text'] ?? '' !!}
                            </p>
                        </div>
                    </section>

                    <section class="rc-organizer-panel">
                        <div class="mb-3">
                            <h3 class="rc-mini-title">
                                Organize the adjectives
                            </h3>
                            <p class="rc-mini-note">
                                Move each word into the correct category.
                            </p>
                        </div>

                        <div class="rc-word-bank rc-drop-zone" data-column="bank" id="wordBank">
                            @foreach($words as $idx => $word)
                                @php
                                    $correctColumns = is_array($word['correct'] ?? null)
                                        ? implode('|', $word['correct'])
                                        : (string) ($word['correct'] ?? '');
                                @endphp

                                <button
                                        type="button"
                                        id="{{ $word['id'] ?? 'word_' . $idx }}"
                                        class="rc-chip adjective-chip"
                                        draggable="true"
                                        data-order="{{ $idx }}"
                                        data-correct="{{ $correctColumns }}"
                                >
                                    {{ $word['text'] ?? '' }}
                                </button>
                            @endforeach
                        </div>

                        <div class="rc-columns-grid">
                            @foreach($columns as $column)
                                <article class="rc-column">
                                    <div class="rc-column-head">
                                        {{ $column['label'] ?? '' }}
                                    </div>

                                    <div
                                            class="rc-drop-zone"
                                            data-column="{{ $column['key'] ?? '' }}"
                                    ></div>
                                </article>
                            @endforeach
                        </div>

                        <p id="feedbackText" class="rc-feedback"></p>
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        function onReady(fn) {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', fn, { once: true });
            } else {
                fn();
            }
        }

        onReady(() => {
            const chips = Array.from(document.querySelectorAll('.adjective-chip'));
            const zones = Array.from(document.querySelectorAll('.rc-drop-zone'));
            const bank = document.getElementById('wordBank');
            const checkBtn = document.getElementById('checkAnswersBtn');
            const revealBtn = document.getElementById('revealAnswersBtn');
            const retakeBtn = document.getElementById('retakeBtn');
            const feedback = document.getElementById('feedbackText');
            const zoneMap = new Map(zones.map(zone => [zone.dataset.column, zone]));

            const sounds = @json($sounds);
            const sfx = {
                click: new Audio(sounds.click || '/slider/sounds/tap.wav'),
                drop: new Audio(sounds.drop || '/slider/sounds/tap.wav'),
                correct: new Audio(sounds.correct || '/slider/sounds/correct.wav'),
                wrong: new Audio(sounds.wrong || '/slider/sounds/wrong.wav'),
                success: new Audio(sounds.success || '/slider/sounds/success.wav')
            };

            let selectedChip = null;

            function playSfx(type) {
                const sound = sfx[type];
                if (!sound) return;

                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function normalize(value) {
                return String(value || '').trim().toLowerCase();
            }

            function acceptedColumns(chip) {
                return String(chip?.dataset?.correct || '')
                    .split('|')
                    .map(normalize)
                    .filter(Boolean);
            }

            function currentColumn(chip) {
                return normalize(chip?.parentElement?.dataset?.column || 'bank');
            }

            function isChipCorrect(chip) {
                const column = currentColumn(chip);
                return column !== 'bank' && acceptedColumns(chip).includes(column);
            }

            function clearFeedback() {
                if (!feedback) return;
                feedback.textContent = '';
                feedback.className = 'rc-feedback';
            }

            function clearChipStates() {
                chips.forEach(chip => {
                    chip.classList.remove('is-correct', 'is-wrong');
                });
            }

            function setSelected(chip) {
                if (selectedChip) {
                    selectedChip.classList.remove('is-selected');
                }

                selectedChip = chip;

                if (selectedChip) {
                    selectedChip.classList.add('is-selected');
                }
            }

            function moveChipToZone(chip, zone, options = {}) {
                if (!chip || !zone) return;

                zone.appendChild(chip);
                chip.classList.remove('is-selected');
                selectedChip = null;

                if (!options.silent) {
                    playSfx('drop');
                }
            }

            function resetToBank() {
                clearChipStates();
                clearFeedback();
                setSelected(null);

                chips
                    .slice()
                    .sort((a, b) => Number(a.dataset.order) - Number(b.dataset.order))
                    .forEach(chip => bank?.appendChild(chip));
            }

            chips.forEach(chip => {
                chip.addEventListener('click', event => {
                    event.preventDefault();
                    clearChipStates();
                    clearFeedback();

                    if (selectedChip === chip) {
                        setSelected(null);
                        return;
                    }

                    setSelected(chip);
                    playSfx('click');
                });

                chip.addEventListener('dragstart', event => {
                    event.dataTransfer.setData('text/plain', chip.id);
                    event.dataTransfer.effectAllowed = 'move';

                    setSelected(chip);
                    clearChipStates();
                    clearFeedback();

                    setTimeout(() => chip.classList.add('opacity-60'), 0);
                    playSfx('click');
                });

                chip.addEventListener('dragend', () => {
                    chip.classList.remove('opacity-60');
                    chip.classList.remove('is-selected');
                    selectedChip = null;
                });
            });

            zones.forEach(zone => {
                zone.addEventListener('click', () => {
                    if (!selectedChip) return;

                    clearChipStates();
                    clearFeedback();
                    moveChipToZone(selectedChip, zone);
                });

                zone.addEventListener('dragover', event => {
                    event.preventDefault();
                    zone.classList.add('is-over');
                    event.dataTransfer.dropEffect = 'move';
                });

                zone.addEventListener('dragleave', () => {
                    zone.classList.remove('is-over');
                });

                zone.addEventListener('drop', event => {
                    event.preventDefault();
                    zone.classList.remove('is-over');

                    const chipId = event.dataTransfer.getData('text/plain');
                    const chip = document.getElementById(chipId) || selectedChip;

                    if (!chip) return;

                    clearChipStates();
                    clearFeedback();
                    moveChipToZone(chip, zone);
                });
            });

            checkBtn?.addEventListener('click', () => {
                clearChipStates();
                setSelected(null);

                let correctCount = 0;

                chips.forEach(chip => {
                    if (isChipCorrect(chip)) {
                        chip.classList.add('is-correct');
                        correctCount++;
                    } else {
                        chip.classList.add('is-wrong');
                    }
                });

                if (correctCount === chips.length && chips.length > 0) {
                    playSfx('correct');
                    feedback.textContent = 'Excellent! All adjectives are in the correct columns.';
                    feedback.className = 'rc-feedback text-green-700 dark:text-green-300';
                    return;
                }

                playSfx('wrong');
                feedback.textContent = `${correctCount}/${chips.length} correct. Try again or reveal the answers.`;
                feedback.className = 'rc-feedback text-rose-700 dark:text-rose-300';
            });

            revealBtn?.addEventListener('click', () => {
                clearChipStates();
                setSelected(null);

                chips
                    .slice()
                    .sort((a, b) => Number(a.dataset.order) - Number(b.dataset.order))
                    .forEach(chip => {
                        const firstCorrectColumn = acceptedColumns(chip)[0];
                        const targetZone = zoneMap.get(firstCorrectColumn) || bank;

                        moveChipToZone(chip, targetZone, { silent: true });

                        if (targetZone !== bank) {
                            chip.classList.add('is-correct');
                        }
                    });

                playSfx('success');
                feedback.textContent = 'Correct answers are now displayed.';
                feedback.className = 'rc-feedback text-indigo-700 dark:text-indigo-300';
            });

            retakeBtn?.addEventListener('click', () => {
                resetToBank();
                playSfx('click');
            });

            window.stopSlideAudio = () => {};
            window.destroySlide = () => {};

            window.resetSlide = () => {
                resetToBank();
            };
        });
    </script>
@endsection
