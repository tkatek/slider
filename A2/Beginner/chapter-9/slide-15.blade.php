<?php
$content = [
    'page_title' => "It's Your Turn",
    'title' => "Writing",
    'subtitle'             => 'Describe yourself in writing. You can write about your physical appearance, personality, or both!',
    'cards' => [
        [
            'id' => 'look',
            'question' => 'What do you look like?',
            'placeholder' => "I am ...\nI have ...\nI wear ...",
        ],
        [
            'id' => 'like',
            'question' => 'What are you like?',
            'placeholder' => "I am ...\nMy personality is ...\nPeople say I am ...",
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .turn-shell {
            max-width: 900px;
        }

        .turn-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            justify-content: center;
            justify-items: center;
        }

        @media (min-width: 860px) {
            .turn-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: .9rem;
            }
        }

        .turn-card {
            border: 1px solid #e2e8f0;
            border-radius: 2rem;
            background: #ffffff;
            box-shadow: 0 12px 28px -20px rgba(15, 23, 42, .25);
            width: 100%;
            max-width: 390px;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: .75rem;
            min-height: 350px;
        }

        .dark .turn-card {
            border-color: #334155;
            background: #0f172a;
            box-shadow: none;
        }

        .turn-head {
            display: flex;
            align-items: center;
            gap: .7rem;
        }

        .turn-avatar {
            width: 46px;
            height: 46px;
            border-radius: 999px;
            border: 2px solid #ffffff;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            color: #334155;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: .82rem;
            letter-spacing: .04em;
            flex-shrink: 0;
            box-shadow: 0 3px 10px rgba(15, 23, 42, .08);
        }

        .dark .turn-avatar {
            border-color: #1e293b;
            background: linear-gradient(135deg, #334155 0%, #1e293b 100%);
            color: #f8fafc;
        }

        .turn-name {
            margin: 0;
            font-size: 1.5rem;
            line-height: .95;
            letter-spacing: -0.02em;
            font-weight: 900;
            color: #0f172a;
        }

        .dark .turn-name {
            color: #f8fafc;
        }

        .turn-role {
            margin-top: .12rem;
            font-size: .72rem;
            font-weight: 900;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #94a3b8;
        }

        .turn-question {
            margin: .1rem 0 0;
            font-size: .92rem;
            font-weight: 900;
            color: #334155;
            padding: .5rem .75rem;
            border-radius: 999px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
        }

        .dark .turn-question {
            color: #e2e8f0;
            border-color: #334155;
            background: rgba(15, 23, 42, .75);
        }

        .turn-answer {
            width: 100%;
            min-height: 148px;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background: #f8fafc;
            padding: .9rem;
            resize: vertical;
            outline: none;
            font-size: .95rem;
            font-weight: 700;
            line-height: 1.5;
            color: #1f2937;
            transition: border-color .15s ease, box-shadow .15s ease, background-color .15s ease;
        }

        .turn-answer:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, .13);
            background: #ffffff;
        }

        .turn-answer::placeholder {
            color: #94a3b8;
            font-weight: 600;
        }

        .dark .turn-answer {
            border-color: #334155;
            background: #1e293b;
            color: #f8fafc;
        }

        .dark .turn-answer:focus {
            border-color: #818cf8;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, .22);
            background: #1e293b;
        }

        .dark .turn-answer::placeholder {
            color: #cbd5e1;
        }

        .submit-btn {
            margin-top: auto;
            width: 100%;
            border: 1px solid transparent;
            border-radius: 999px;
            padding: .72rem .95rem;
            font-size: .95rem;
            font-weight: 900;
            color: #ffffff;
            background: #cbd5e1;
            cursor: not-allowed;
            transition: transform .15s ease, background-color .15s ease, box-shadow .15s ease;
        }

        .submit-btn.is-ready {
            cursor: pointer;
            background: #4f46e5;
            box-shadow: 0 12px 24px -16px rgba(79, 70, 229, .7);
        }

        .submit-btn.is-ready:hover {
            transform: translateY(-1px);
            background: #4338ca;
        }

        .submit-btn.is-done {
            background: #22c55e;
            cursor: pointer;
            box-shadow: 0 12px 24px -16px rgba(34, 197, 94, .75);
        }

        .dark .submit-btn {
            color: #e2e8f0;
            background: #334155;
        }

        .dark .submit-btn.is-ready {
            background: #6366f1;
        }

        .dark .submit-btn.is-ready:hover {
            background: #4f46e5;
        }

        .dark .submit-btn.is-done {
            background: #16a34a;
            color: #f0fdf4;
        }
    </style>
@endsection

@section('content')
    <main class="w-full min-h-[100dvh] px-3 sm:px-6 py-5 sm:py-6">
        <section class="turn-shell mx-auto">
            <header class="mb-4 sm:mb-5 text-center">
                @include('slider.components.title-subtitle')
            </header>

            <div class="turn-grid">
                @foreach($content['cards'] as $card)
                    <article class="turn-card">
                        <header class="turn-head">
                            <span class="turn-avatar" aria-hidden="true">YOU</span>
                            <div>
                                <p class="turn-name">You</p>
                                <div class="turn-role">Student</div>
                            </div>
                        </header>

                        <p class="turn-question">{{ $card['question'] }}</p>

                        <textarea
                            id="answer_{{ $card['id'] }}"
                            class="turn-answer js-turn-answer"
                            placeholder="{{ $card['placeholder'] }}"
                            aria-label="{{ $card['question'] }}"
                        ></textarea>

                        <button
                            type="button"
                            class="submit-btn js-submit-btn"
                            data-target="answer_{{ $card['id'] }}"
                        >
                            Submit Answer
                        </button>
                    </article>
                @endforeach
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
            const buttons = Array.from(document.querySelectorAll('.js-submit-btn'));
            const textareas = Array.from(document.querySelectorAll('.js-turn-answer'));

            function syncButtonState(button) {
                const targetId = button.getAttribute('data-target');
                const textarea = targetId ? document.getElementById(targetId) : null;
                const value = (textarea?.value || '').trim();

                if (value.length > 0) {
                    button.classList.add('is-ready');
                } else {
                    button.classList.remove('is-ready');
                    button.classList.remove('is-done');
                    button.textContent = 'Submit Answer';
                }
            }

            textareas.forEach((textarea) => {
                textarea.addEventListener('input', () => {
                    const button = buttons.find((btn) => btn.getAttribute('data-target') === textarea.id);
                    if (button) syncButtonState(button);
                });
            });

            buttons.forEach((button) => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-target');
                    const textarea = targetId ? document.getElementById(targetId) : null;
                    const value = (textarea?.value || '').trim();

                    if (!value) {
                        textarea?.focus();
                        return;
                    }

                    button.classList.add('is-done');
                    button.classList.remove('is-ready');
                    button.textContent = 'Submitted';
                });

                syncButtonState(button);
            });
        });
    </script>
@endsection

