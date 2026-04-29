@extends('slider.simple-layout')

@php
    $content = [
        'page_title'  => "It's Your Turn",
        'title'       => "It's your turn",
        'subtitle'    => 'Write about yourself!',
        'left_title'  => 'What do you look like?',
        'right_title' => 'What are you like?',
    ];
@endphp

@section('title', $content['page_title'] ?? 'Writing')

@section('style')
    <style>
        .write-about-yourself-page {
            min-height: 100dvh;
            width: 100%;
            overflow-x: hidden;
            font-family: "Plus Jakarta Sans", sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .write-about-yourself-shell {
            width: 100%;
            max-width: 1120px;
            margin: 0 auto;
            padding: 24px 14px;
        }

        .write-about-yourself-header {
            text-align: center;
            margin-bottom: 26px;
        }

        .write-about-yourself-board {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 120px minmax(0, 1fr);
            align-items: center;
            justify-content: center;
            gap: 22px;
        }

        .writing-card {
            min-height: 390px;
            border: 5px solid #111827;
            border-radius: 30px;
            background: #ffffff;
            padding: 24px 22px;
            box-shadow: 0 14px 28px -24px rgba(15, 23, 42, 0.35);
        }

        .writing-card-title {
            margin-bottom: 16px;
            font-size: 1.08rem;
            line-height: 1.2;
            font-weight: 900;
            color: #1f2937;
            font-style: italic;
        }

        .writing-area-wrap {
            min-height: 290px;
            border-radius: 18px;
            background-image: repeating-linear-gradient(
                    to bottom,
                    transparent 0,
                    transparent 34px,
                    rgba(100, 116, 139, 0.55) 34px,
                    rgba(100, 116, 139, 0.55) 35px
            );
        }

        .writing-area {
            width: 100%;
            min-height: 290px;
            resize: none;
            border: none;
            outline: none;
            background: transparent;
            color: #0f172a;
            font-size: 1rem;
            line-height: 35px;
            font-weight: 700;
            padding: 0;
        }

        .writing-area::placeholder {
            color: transparent;
        }

        .question-mark-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .question-mark {
            font-size: clamp(4.5rem, 8vw, 6.5rem);
            line-height: 1;
            font-weight: 900;
            color: #6b7280;
            user-select: none;
        }

        .dark .writing-card {
            background: #0f172a;
            border-color: #f8fafc;
        }

        .dark .writing-card-title {
            color: #f8fafc;
        }

        .dark .writing-area {
            color: #f8fafc;
        }

        .dark .writing-area-wrap {
            background-image: repeating-linear-gradient(
                    to bottom,
                    transparent 0,
                    transparent 34px,
                    rgba(148, 163, 184, 0.55) 34px,
                    rgba(148, 163, 184, 0.55) 35px
            );
        }

        .dark .question-mark {
            color: #94a3b8;
        }

        @media (max-width: 1024px) {
            .write-about-yourself-page {
                align-items: flex-start;
            }

            .write-about-yourself-shell {
                max-width: 760px;
                padding: 24px 14px 32px;
            }

            .write-about-yourself-board {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .question-mark-wrap {
                order: 2;
            }

            .writing-card:first-child {
                order: 1;
            }

            .writing-card:last-child {
                order: 3;
            }

            .writing-card {
                min-height: 330px;
            }

            .writing-area-wrap,
            .writing-area {
                min-height: 230px;
            }
        }

        @media (max-width: 640px) {
            .write-about-yourself-shell {
                padding: 18px 12px 26px;
            }

            .write-about-yourself-header {
                margin-bottom: 18px;
            }

            .writing-card {
                min-height: 310px;
                padding: 20px 16px;
                border-width: 4px;
                border-radius: 24px;
            }

            .writing-card-title {
                font-size: 1rem;
                margin-bottom: 14px;
            }

            .writing-area-wrap {
                min-height: 220px;
                background-image: repeating-linear-gradient(
                        to bottom,
                        transparent 0,
                        transparent 31px,
                        rgba(100, 116, 139, 0.55) 31px,
                        rgba(100, 116, 139, 0.55) 32px
                );
            }

            .writing-area {
                min-height: 220px;
                font-size: 0.95rem;
                line-height: 32px;
            }

            .question-mark {
                font-size: 4rem;
            }
        }
    </style>
@endsection

@section('content')
    <main class="write-about-yourself-page">
        <div class="write-about-yourself-shell">
            <header class="write-about-yourself-header">
                @include('slider.components.title-subtitle')
            </header>

            <section class="write-about-yourself-board">
                <article class="writing-card">
                    <h2 class="writing-card-title">{{ $content['left_title'] }}</h2>

                    <div class="writing-area-wrap">
                        <textarea
                                class="writing-area js-writing-area"
                                aria-label="{{ $content['left_title'] }}"
                                spellcheck="true"
                        ></textarea>
                    </div>
                </article>

                <div class="question-mark-wrap" aria-hidden="true">
                    <div class="question-mark">?</div>
                </div>

                <article class="writing-card">
                    <h2 class="writing-card-title">{{ $content['right_title'] }}</h2>

                    <div class="writing-area-wrap">
                        <textarea
                                class="writing-area js-writing-area"
                                aria-label="{{ $content['right_title'] }}"
                                spellcheck="true"
                        ></textarea>
                    </div>
                </article>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (() => {
            const areas = Array.from(document.querySelectorAll('.js-writing-area'));

            areas.forEach((area) => {
                area.value = '';
            });

            window.resetSlide = () => {
                areas.forEach((area) => {
                    area.value = '';
                });
            };
        })();
    </script>
@endsection