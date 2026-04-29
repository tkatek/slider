<?php
$content = [
    'title' => 'Reading comprehension',
    'subtitle' => 'Read the conversation between David and Jessica. Then type the names under the picture.<br>Practice the dialogue',

    'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide11/slide11.webp'),

    'labels' => [
        ['text' => '', 'x' => 18.0, 'y' => 86.5, 'answer' => 'Diana'],
        ['text' => '', 'x' => 84.0, 'y' => 86.0, 'answer' => 'Brian'],
    ],

];

$dialogue = [
    [
        'speaker' => 'Jessica',
        'text' => 'What do you look like?',
    ],
    [
        'speaker' => 'David',
        'text' => "I'm tall and slim. I have got short curly black hair and brown eyes. I have sunglasses.",
    ],
    [
        'speaker' => 'Jessica',
        'text' => 'What does Brian look like?',
    ],
    [
        'speaker' => 'David',
        'text' => 'He is short with straight blonde hair. He has got blue eyes and a small mouth.',
    ],
    [
        'speaker' => 'Jessica',
        'text' => 'What does Diana look like?',
    ],
    [
        'speaker' => 'David',
        'text' => 'She is a young girl. She has got long straight brown hair and brown eyes. She is wearing blue jeans.',
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['title'])

@section('style')
    <style>
        .read-write-shell {
            max-width: 1220px;
        }

        .lesson-card {
            display: flex;
            min-height: 0;
            flex-direction: column;
            border: 1px solid rgba(226, 232, 240, .9);
            border-radius: 24px;
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 18px 45px rgba(2, 6, 23, .08);
        }

        .dark .lesson-card {
            border-color: rgba(51, 65, 85, .75);
            background: rgba(15, 23, 42, .86);
        }

        .dialogue-wrap {
            flex: 1 1 auto;
            min-height: 0;
            overflow: visible;
            padding-right: .25rem;
        }

        .dialogue-wrap::-webkit-scrollbar {
            width: 8px;
        }

        .dialogue-wrap::-webkit-scrollbar-thumb {
            border-radius: 999px;
            background: rgba(148, 163, 184, .6);
        }

        .dialogue-row {
            border: 1px solid rgba(226, 232, 240, .9);
            border-radius: 16px;
            padding: .58rem .72rem;
            background: rgba(248, 250, 252, .74);
            margin-bottom: .45rem;
        }

        .dark .dialogue-row {
            border-color: #475569;
            background: rgba(15, 23, 42, .72);
        }

        .speaker-name {
            display: inline-block;
            margin-bottom: .16rem;
            font-size: .76rem;
            text-transform: uppercase;
            letter-spacing: .06em;
            font-weight: 1000;
        }

        .speaker-name.speaker-jessica {
            color: #db2777;
        }

        .speaker-name.speaker-david {
            color: #2563eb;
        }

        .dialogue-row p {
            margin: 0;
            color: #0f172a;
            font-size: .92rem;
            line-height: 1.42;
            font-weight: 800;
        }

        .dark .dialogue-row p {
            color: #f8fafc;
        }

        .image-stage {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, .9);
            border-radius: 22px;
            background: rgba(248, 250, 252, .72);
        }

        .dark .image-stage {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(2, 6, 23, .28);
        }

        .image-stage img {
            width: 100%;
            height: auto;
            object-fit: contain;
            display: block;
        }

        .label-marker {
            position: absolute;
            transform: translate(-50%, -50%);
            z-index: 5;
        }

        .label-input {
            width: clamp(120px, 14vw, 190px);
            height: 44px;
            border-radius: 12px;
            border: 2px solid #0f172a;
            background: rgba(255, 255, 255, .97);
            color: #0f172a;
            font-size: .95rem;
            font-weight: 900;
            padding: 0 .75rem;
            outline: none;
            text-align: center;
        }

        .label-input:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, .25);
        }

        .label-input.is-correct {
            border-color: #16a34a;
            background: #f0fdf4;
            color: #166534;
        }

        .label-input.is-wrong {
            border-color: #dc2626;
            background: #fef2f2;
            color: #991b1b;
        }

        .dark .label-input {
            border-color: #e2e8f0;
            background: rgba(15, 23, 42, .95);
            color: #ffffff;
        }

        .dark .label-input::placeholder {
            color: #cbd5e1;
        }

        .dark .label-input.is-correct {
            border-color: #22c55e;
            background: rgba(20, 83, 45, 0.65);
            color: #bbf7d0;
        }

        .dark .label-input.is-wrong {
            border-color: #ef4444;
            background: rgba(127, 29, 29, 0.65);
            color: #fecaca;
        }

        .image-header {
            display: flex;
            flex-wrap: wrap;
            gap: .6rem;
            align-items: center;
            justify-content: flex-end;
            margin-bottom: .75rem;
        }

        .image-actions {
            display: flex;
            flex-wrap: wrap;
            gap: .6rem;
            align-items: center;
        }

        .image-btn {
            border-radius: 14px;
            padding: .65rem 1rem;
            font-size: .82rem;
            font-weight: 900;
            transition: transform .16s ease, box-shadow .16s ease, background-color .16s ease;
        }

        .image-btn:hover {
            transform: translateY(-1px);
        }

        .image-btn-primary {
            border: 1px solid rgba(255, 255, 255, .14);
            background: linear-gradient(135deg, #fdba74, #f97316);
            color: #fff;
            box-shadow: 0 10px 22px rgba(234, 88, 12, .16);
        }

        .image-btn-neutral {
            border: 1px solid rgba(71, 85, 105, .25);
            background: linear-gradient(135deg, #475569, #18181b);
            color: #fff;
            box-shadow: 0 10px 22px rgba(15, 23, 42, .14);
        }

        .image-btn-soft {
            border: 1px solid rgba(226, 232, 240, 1);
            background: #fff;
            color: #334155;
            box-shadow: 0 8px 22px rgba(2, 6, 23, .05);
        }

        .dark .image-btn-soft {
            border-color: rgba(51, 65, 85, 1);
            background: #0f172a;
            color: #e2e8f0;
        }

        .dark .image-btn-neutral {
            border-color: rgba(226, 232, 240, .16);
            background: linear-gradient(135deg, #64748b, #334155);
        }

        @media (max-width: 768px) {
            .image-header {
                gap: .5rem;
            }

            .label-input {
                width: clamp(104px, 25vw, 160px);
                height: 40px;
                font-size: .9rem;
            }

            .image-actions {
                gap: .45rem;
            }

            .image-btn {
                padding: .44rem .72rem;
                font-size: .72rem;
            }
        }
    </style>
@endsection

@section('content')
    <main class="w-full min-h-[100dvh] py-4 sm:py-6 px-3 sm:px-6">
        <section class="read-write-shell mx-auto">
            <header class="mb-4 sm:mb-5">
                @include('slider.components.title-subtitle')
            </header>

            <div class="grid grid-cols-1 items-stretch lg:grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
                <section class="lesson-card lg:col-span-6 p-4 sm:p-5">
                    <h3 class="text-slate-900 dark:text-slate-100 font-black text-lg sm:text-xl mb-3">Conversation</h3>
                    <div class="dialogue-wrap">
                        @foreach($dialogue as $line)
                            <article class="dialogue-row">
                                <span class="speaker-name speaker-{{ strtolower($line['speaker']) }}">{{ $line['speaker'] }}</span>
                                <p>{{ $line['text'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="lesson-card lg:col-span-6 p-4 sm:p-5">
                    <div class="image-header">
                        <div class="image-actions">
                            <button id="checkAnswersBtn" type="button" class="image-btn image-btn-primary">Check Answers</button>
                            <button id="revealAnswersBtn" type="button" class="image-btn image-btn-neutral">Reveal answers</button>
                            <button id="retakeAnswersBtn" type="button" class="image-btn image-btn-soft">Retake</button>
                        </div>
                    </div>

                    <div class="image-stage" id="imageStage">
                        <img src="{{ $content['image'] }}" alt="People in the picture" loading="lazy" decoding="async">

                        @foreach($content['labels'] as $index => $label)
                            <div
                                class="label-marker js-label-marker"
                                style="left: {{ $label['x'] }}%; top: {{ $label['y'] }}%;"
                                data-index="{{ $index + 1 }}"
                            >
                                <input
                                    id="label_input_{{ $index }}"
                                    class="label-input js-name-input"
                                    data-answer="{{ strtolower($label['answer']) }}"
                                    data-display-answer="{{ $label['answer'] }}"
                                    type="text"
                                    value="{{ $label['text'] }}"
                                    placeholder="Write the answer"
                                    autocomplete="off"
                                >
                            </div>
                        @endforeach
                    </div>
                </section>
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
            const inputs = Array.from(document.querySelectorAll('.js-name-input'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const revealBtn = document.getElementById('revealAnswersBtn');
            const retakeBtn = document.getElementById('retakeAnswersBtn');
            const sounds = @json($content['sounds'] ?? []);
            const sfx = {
                tap: new Audio(sounds.tap || '/slider/sounds/tap.wav'),
                correct: new Audio(sounds.correct || '/slider/sounds/correct.wav'),
                wrong: new Audio(sounds.wrong || '/slider/sounds/wrong.wav'),
                success: new Audio(sounds.success || '/slider/sounds/success.wav'),
            };

            const normalize = (value) => value.trim().toLowerCase().replace(/\s+/g, ' ');

            function playSfx(type) {
                const sound = sfx[type];
                if (!sound) return;

                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            const clearState = () => {
                inputs.forEach((input) => {
                    input.classList.remove('is-correct', 'is-wrong');
                });
            };

            checkBtn?.addEventListener('click', () => {
                let correct = 0;
                let filled = 0;

                clearState();

                inputs.forEach((input) => {
                    const expected = normalize(input.dataset.answer || '');
                    const actual = normalize(input.value || '');

                    if (actual.length > 0) {
                        filled++;
                    }

                    if (actual === expected) {
                        input.classList.add('is-correct');
                        correct++;
                    } else {
                        input.classList.add('is-wrong');
                    }
                });

                if (filled < inputs.length) {
                    playSfx('wrong');
                    return;
                }

                playSfx(correct === inputs.length ? 'correct' : 'wrong');
            });

            revealBtn?.addEventListener('click', () => {
                inputs.forEach((input) => {
                    input.value = input.dataset.displayAnswer || input.dataset.answer || '';
                    input.classList.remove('is-wrong');
                    input.classList.add('is-correct');
                });

                playSfx('success');
            });

            retakeBtn?.addEventListener('click', () => {
                inputs.forEach((input) => {
                    input.value = '';
                });
                clearState();
            });

            inputs.forEach((input) => {
                input.addEventListener('focus', () => {
                    playSfx('tap');
                });

                input.addEventListener('input', () => {
                    input.classList.remove('is-correct', 'is-wrong');
                });
            });
        });
    </script>
@endsection
