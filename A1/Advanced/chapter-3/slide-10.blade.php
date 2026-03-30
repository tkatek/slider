@php
    $content = [
        'page_title' => 'Check-Out Questions',
        'title'      => 'Check-Out Questions',
        'subtitle'   => 'Choose the best option for each question.',

        'questions' => [
            [
                'question' => 'What do you say when you want to leave the hotel and pay?',
                'options'  => [
                    'I’d like to check in.',
                    'I’d like to check out.',
                    'Here is your receipt.',
                ],
                'answer'   => 1,
                'emoji'    => '🧳',
            ],
            [
                'question' => 'What is a bill?',
                'options'  => [
                    'A paper showing how much you pay.',
                    'A room key.',
                    'A travel ID document.',
                ],
                'answer'   => 0,
                'emoji'    => '🧾',
            ],
            [
                'question' => 'What does charge mean?',
                'options'  => [
                    'Extra money for a service.',
                    'Money you get back.',
                    'A paper that shows payment.',
                ],
                'answer'   => 0,
                'emoji'    => '💳',
            ],
            [
                'question' => 'What do you ask to check the total money to pay?',
                'options'  => [
                    'May I see your passport?',
                    'Is the amount correct?',
                    'Here is the key.',
                ],
                'answer'   => 1,
                'emoji'    => '💰',
            ],
            [
                'question' => 'What is a receipt?',
                'options'  => [
                    'A room key.',
                    'A paper that shows payment.',
                    'A hotel charge.',
                ],
                'answer'   => 1,
                'emoji'    => '📄',
            ],
            [
                'question' => 'What do you call the money you get back?',
                'options'  => [
                    'Payment',
                    'Charge',
                    'Change',
                ],
                'answer'   => 2,
                'emoji'    => '🪙',
            ],
        ],
    ];

    $questions = $content['questions'] ?? [];
@endphp

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .checkout-quiz-shell{
            min-height:100dvh;
            height:100dvh;
            overflow:hidden;
            font-family:"Plus Jakarta Sans",sans-serif;
            background:transparent;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:0.85rem;
        }

        .checkout-quiz-wrap{
            width:100%;
            max-width:1360px;
            height:100%;
            max-height:100dvh;
            display:grid;
            grid-template-rows:auto minmax(0,1fr);
            gap:0.85rem;
            margin-inline:auto;
        }

        .quiz-hero{
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            text-align:center;
            gap:0.45rem;
            padding-inline:0.35rem;
        }

        .title-glow{
            filter:drop-shadow(0 10px 26px rgba(99,102,241,.12));
        }

        .quiz-title{
            font-family:"Plus Jakarta Sans",sans-serif;
            font-weight:900;
            font-size:2.25rem;
            line-height:1.05;
            letter-spacing:-0.04em;
        }

        .quiz-title span{
            background-image:linear-gradient(to bottom right, #4f46e5, #3b82f6);
            -webkit-background-clip:text;
            background-clip:text;
            color:transparent;
        }

        .quiz-subtitle{
            font-family:"Plus Jakarta Sans",sans-serif;
            font-weight:500;
            font-size:1rem;
            line-height:1.6;
            color:#334155;
            max-width:860px;
            margin:0 auto;
        }

        .dark .quiz-subtitle{
            color:#e2e8f0;
        }

        .quiz-grid{
            min-height:0;
            display:grid;
            grid-template-columns:1fr;
            gap:0.7rem;
            align-content:stretch;
        }

        .quiz-card{
            position:relative;
            min-height:0;
            overflow:hidden;
            border-radius:1.35rem;
            border:1px solid rgba(226,232,240,.95);
            background:rgba(255,255,255,.92);
            backdrop-filter:blur(10px);
            box-shadow:
                    0 14px 34px rgba(15,23,42,.07),
                    0 8px 20px rgba(99,102,241,.07);
            transition:transform .18s ease, box-shadow .18s ease, border-color .18s ease;
        }

        .dark .quiz-card{
            border-color:rgba(71,85,105,.45);
            background:rgba(15,23,42,.82);
            box-shadow:
                    0 14px 34px rgba(0,0,0,.20),
                    0 8px 20px rgba(99,102,241,.10);
        }

        .quiz-card:hover{
            transform:translateY(-2px);
            box-shadow:
                    0 18px 40px rgba(15,23,42,.10),
                    0 10px 24px rgba(99,102,241,.10);
        }

        .dark .quiz-card:hover{
            box-shadow:
                    0 18px 40px rgba(0,0,0,.26),
                    0 10px 24px rgba(99,102,241,.14);
        }

        .quiz-card-inner{
            height:100%;
            display:flex;
            flex-direction:column;
            gap:0.75rem;
            padding:0.9rem;
        }

        .question-head{
            display:flex;
            align-items:flex-start;
            gap:0.75rem;
            min-width:0;
        }

        .question-badge{
            flex-shrink:0;
            width:2.85rem;
            height:2.85rem;
            border-radius:0.95rem;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-size:1.45rem;
            background:linear-gradient(135deg, rgba(99,102,241,.14), rgba(14,165,233,.12));
            box-shadow:inset 0 1px 0 rgba(255,255,255,.45);
        }

        .dark .question-badge{
            background:linear-gradient(135deg, rgba(99,102,241,.20), rgba(14,165,233,.16));
            box-shadow:inset 0 1px 0 rgba(255,255,255,.04);
        }

        .question-copy{
            min-width:0;
            display:flex;
            flex-direction:column;
            gap:0.25rem;
        }

        .question-number{
            font-family:"Plus Jakarta Sans",sans-serif;
            font-size:0.82rem;
            line-height:1.2;
            font-weight:800;
            letter-spacing:0.08em;
            text-transform:uppercase;
            color:#6366f1;
        }

        .dark .question-number{
            color:#a5b4fc;
        }

        .question-text{
            font-family:"Plus Jakarta Sans",sans-serif;
            font-size:1rem;
            line-height:1.45;
            font-weight:700;
            color:#0f172a;
        }

        .dark .question-text{
            color:#f8fafc;
        }

        .options-list{
            display:grid;
            gap:0.5rem;
            min-height:0;
        }

        .option-btn{
            width:100%;
            text-align:left;
            border:none;
            outline:none;
            cursor:pointer;
            border-radius:1rem;
            padding:0.72rem 0.8rem;
            background:linear-gradient(180deg, rgba(248,250,252,.98), rgba(241,245,249,.92));
            border:1px solid rgba(203,213,225,.9);
            color:#0f172a;
            display:flex;
            align-items:flex-start;
            gap:0.65rem;
            transition:transform .16s ease, box-shadow .16s ease, border-color .16s ease, background .16s ease;
        }

        .option-btn:hover{
            transform:translateY(-1px);
            border-color:rgba(99,102,241,.45);
            box-shadow:0 10px 20px rgba(99,102,241,.08);
        }

        .option-btn:focus-visible{
            border-color:rgba(79,70,229,.7);
            box-shadow:0 0 0 4px rgba(99,102,241,.14);
        }

        .dark .option-btn{
            background:linear-gradient(180deg, rgba(30,41,59,.96), rgba(15,23,42,.92));
            border-color:rgba(71,85,105,.9);
            color:#f8fafc;
        }

        .dark .option-btn:hover{
            border-color:rgba(129,140,248,.5);
            box-shadow:0 10px 20px rgba(0,0,0,.18);
        }

        .option-pill{
            flex-shrink:0;
            width:1.8rem;
            height:1.8rem;
            border-radius:999px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Plus Jakarta Sans",sans-serif;
            font-size:0.88rem;
            font-weight:800;
            line-height:1;
            color:#4f46e5;
            background:rgba(99,102,241,.10);
            border:1px solid rgba(99,102,241,.18);
            margin-top:0.02rem;
        }

        .dark .option-pill{
            color:#c7d2fe;
            background:rgba(99,102,241,.16);
            border-color:rgba(129,140,248,.24);
        }

        .option-text{
            min-width:0;
            font-family:"Plus Jakarta Sans",sans-serif;
            font-size:1rem;
            line-height:1.45;
            font-weight:700;
            color:#0f172a;
        }

        .dark .option-text{
            color:#f8fafc;
        }

        @media (max-width: 639px){
            .checkout-quiz-shell{
                padding:0.8rem 0.75rem;
                height:auto;
                min-height:100dvh;
                overflow:auto;
            }

            .checkout-quiz-wrap{
                height:auto;
                max-height:none;
                gap:0.8rem;
            }

            .quiz-grid{
                grid-template-columns:1fr;
                gap:0.7rem;
            }

            .quiz-card-inner{
                padding:0.85rem;
                gap:0.68rem;
            }

            .question-text{
                font-size:0.96rem;
                line-height:1.42;
            }

            .option-btn{
                padding:0.7rem 0.74rem;
            }

            .option-text{
                font-size:0.96rem;
                line-height:1.42;
            }
        }

        @media (min-width: 640px){
            .checkout-quiz-shell{
                padding:1rem 1rem;
            }

            .checkout-quiz-wrap{
                gap:0.95rem;
            }

            .quiz-title{
                font-size:3rem;
            }

            .quiz-subtitle{
                font-size:1.125rem;
            }

            .question-text{
                font-size:1.02rem;
            }

            .option-text{
                font-size:1rem;
            }
        }

        @media (min-width: 768px){
            .quiz-grid{
                grid-template-columns:repeat(2, minmax(0, 1fr));
                gap:0.8rem;
            }

            .quiz-card-inner{
                padding:0.95rem;
            }
        }

        @media (min-width: 1024px){
            .checkout-quiz-shell{
                padding:1.05rem 1.2rem;
            }

            .checkout-quiz-wrap{
                gap:1rem;
            }

            .quiz-title{
                font-size:5.5rem;
            }

            .quiz-subtitle{
                font-size:1.25rem;
            }

            .question-text{
                font-size:1.04rem;
                line-height:1.42;
            }

            .option-btn{
                padding:0.7rem 0.78rem;
            }

            .option-text{
                font-size:0.97rem;
                line-height:1.38;
            }
        }

        @media (min-width: 1280px) and (max-height: 820px){
            .checkout-quiz-shell{
                padding:0.8rem 1rem;
            }

            .checkout-quiz-wrap{
                gap:0.75rem;
            }

            .quiz-hero{
                gap:0.32rem;
            }

            .quiz-subtitle{
                max-width:900px;
            }

            .quiz-card-inner{
                padding:0.8rem 0.82rem;
                gap:0.62rem;
            }

            .question-badge{
                width:2.55rem;
                height:2.55rem;
                border-radius:0.85rem;
                font-size:1.22rem;
            }

            .question-number{
                font-size:0.75rem;
            }

            .question-text{
                font-size:0.97rem;
                line-height:1.34;
            }

            .options-list{
                gap:0.42rem;
            }

            .option-btn{
                padding:0.58rem 0.68rem;
                border-radius:0.9rem;
            }

            .option-pill{
                width:1.62rem;
                height:1.62rem;
                font-size:0.8rem;
            }

            .option-text{
                font-size:0.91rem;
                line-height:1.32;
            }
        }

        @media (prefers-reduced-motion: reduce){
            .quiz-card,
            .option-btn{
                transition:none !important;
            }
        }
    </style>
@endsection

@section('content')
    <main class="checkout-quiz-shell">
        <div class="checkout-quiz-wrap">
            <section class="quiz-hero">
                <h1 class="title-glow quiz-title">
                    <span>{{ $content['title'] ?? 'Questions' }}</span>
                </h1>

                @if(!empty($content['subtitle']))
                    <p class="quiz-subtitle">
                        {{ $content['subtitle'] }}
                    </p>
                @endif
            </section>

            <section class="quiz-grid">
                @foreach($questions as $index => $question)
                    <article class="quiz-card">
                        <div class="quiz-card-inner">
                            <div class="question-head">
                                <span class="question-badge" aria-hidden="true">
                                    {{ $question['emoji'] ?? '❓' }}
                                </span>

                                <div class="question-copy">
                                    <span class="question-number">
                                        Question {{ $index + 1 }}
                                    </span>
                                    <h2 class="question-text">
                                        {{ $question['question'] ?? '' }}
                                    </h2>
                                </div>
                            </div>

                            <div class="options-list">
                                @foreach(($question['options'] ?? []) as $optionIndex => $option)
                                    <button type="button" class="option-btn">
                                        <span class="option-pill">
                                            {{ chr(65 + $optionIndex) }}
                                        </span>
                                        <span class="option-text">{{ $option }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </section>
        </div>
    </main>
@endsection