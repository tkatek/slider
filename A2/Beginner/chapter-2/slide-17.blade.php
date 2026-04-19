@extends('slider.simple-layout')

@php
    $content = [
        'title' => 'Quick wrap-up',
        'subtitle' => 'Speaking Time: “Talk about what you do in summer.”',
    ];

    $verbs = [
        'Swim',
        'Play',
        'Drink',
        'Have',
    ];
@endphp

@section('style')
    <style>
        .wrap-up-page {
            min-height: 100dvh;
            width: 100%;
            display: flex;
            align-items: center;
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .wrap-up-stage {
            width: 100%;
            max-width: 78rem;
            margin: 0 auto;
            padding: 1.5rem 1rem 2rem;
        }

        .wrap-up-shell {
            position: relative;
            overflow: hidden;
            border-radius: 2rem;
            border: 1px solid rgba(226, 232, 240, 0.95);
            background:
                    radial-gradient(120% 120% at 0% 0%, rgba(251, 146, 60, 0.12) 0%, transparent 44%),
                    radial-gradient(120% 120% at 100% 100%, rgba(249, 115, 22, 0.10) 0%, transparent 42%),
                    linear-gradient(180deg, rgba(255,255,255,0.98) 0%, rgba(250,250,249,0.96) 100%);
            box-shadow: 0 24px 70px -48px rgba(15, 23, 42, 0.22);
            backdrop-filter: blur(10px);
        }

        .dark .wrap-up-shell {
            border-color: rgba(71, 85, 105, 0.88);
            background:
                    radial-gradient(120% 120% at 0% 0%, rgba(251, 146, 60, 0.16) 0%, transparent 44%),
                    radial-gradient(120% 120% at 100% 100%, rgba(249, 115, 22, 0.12) 0%, transparent 42%),
                    linear-gradient(180deg, rgba(15,23,42,0.96) 0%, rgba(2,6,23,0.94) 100%);
            box-shadow: 0 24px 70px -48px rgba(0, 0, 0, 0.55);
        }

        .wrap-up-shell::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 4px;
            background: linear-gradient(90deg, #fed7aa 0%, #fb923c 34%, #f59e0b 67%, #78716c 100%);
        }

        .wrap-up-layout {
            display: grid;
            grid-template-columns: 1fr;
        }

        .wrap-up-copy,
        .wrap-up-verbs {
            position: relative;
            padding: 1.5rem;
        }

        .wrap-up-copy {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 1.15rem;
        }

        .instruction {
            margin: 0;
            max-width: 34rem;
            font-size: 1rem;
            line-height: 1.6;
            font-weight: 700;
            letter-spacing: -0.01em;
            color: #475569;
        }

        .dark .instruction {
            color: #cbd5e1;
        }

        .sentence-starter {
            margin: 0;
            max-width: 36rem;
            font-size: 1.45rem;
            line-height: 1.16;
            font-weight: 800;
            letter-spacing: -0.04em;
            color: #0f172a;
        }

        .dark .sentence-starter {
            color: #f8fafc;
        }

        .sentence-highlight {
            display: inline;
            background: linear-gradient(180deg, transparent 58%, rgba(253, 186, 116, 0.30) 58%);
            padding: 0 0.08em;
        }

        .sentence-break {
            display: block;
            margin-top: 0.35rem;
            background: linear-gradient(180deg, transparent 58%, rgba(253, 186, 116, 0.26) 58%);
            width: fit-content;
            padding: 0 0.08em;
        }

        .wrap-up-verbs {
            display: flex;
            align-items: center;
            background: linear-gradient(180deg, rgba(248,250,252,0.65) 0%, rgba(255,255,255,0.35) 100%);
        }

        .dark .wrap-up-verbs {
            background: linear-gradient(180deg, rgba(15,23,42,0.38) 0%, rgba(2,6,23,0.18) 100%);
        }

        .verbs-block {
            width: 100%;
        }

        .verb-title {
            margin: 0 0 1rem;
            font-size: 0.92rem;
            line-height: 1.4;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #64748b;
        }

        .dark .verb-title {
            color: #94a3b8;
        }

        .verb-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.85rem 1rem;
        }

        .verb-item {
            position: relative;
            padding: 0.95rem 1rem 0.95rem 1rem;
            border-radius: 1rem;
            border: 1px solid transparent;
            font-size: 1.2rem;
            line-height: 1.05;
            font-weight: 800;
            letter-spacing: -0.04em;
            background: rgba(255,255,255,0.72);
            box-shadow: 0 14px 34px -28px rgba(15, 23, 42, 0.18);
        }

        .dark .verb-item {
            background: rgba(15,23,42,0.72);
            box-shadow: none;
        }

        .verb-item:nth-child(1) {
            color: #c2410c;
            border-color: rgba(251, 146, 60, 0.30);
            background: linear-gradient(180deg, rgba(255,247,237,0.98) 0%, rgba(254,215,170,0.78) 100%);
        }

        .verb-item:nth-child(2) {
            color: #44403c;
            border-color: rgba(168, 162, 158, 0.35);
            background: linear-gradient(180deg, rgba(250,250,249,0.98) 0%, rgba(231,229,228,0.85) 100%);
        }

        .verb-item:nth-child(3) {
            color: #9a3412;
            border-color: rgba(245, 158, 11, 0.30);
            background: linear-gradient(180deg, rgba(255,251,235,0.98) 0%, rgba(253,230,138,0.78) 100%);
        }

        .verb-item:nth-child(4) {
            color: #57534e;
            border-color: rgba(120, 113, 108, 0.28);
            background: linear-gradient(180deg, rgba(250,250,249,0.98) 0%, rgba(214,211,209,0.80) 100%);
        }

        .dark .verb-item:nth-child(1) {
            color: #fdba74;
            border-color: rgba(251, 146, 60, 0.24);
            background: linear-gradient(180deg, rgba(67,20,7,0.82) 0%, rgba(124,45,18,0.70) 100%);
        }

        .dark .verb-item:nth-child(2) {
            color: #e7e5e4;
            border-color: rgba(168, 162, 158, 0.24);
            background: linear-gradient(180deg, rgba(41,37,36,0.82) 0%, rgba(68,64,60,0.70) 100%);
        }

        .dark .verb-item:nth-child(3) {
            color: #fcd34d;
            border-color: rgba(245, 158, 11, 0.24);
            background: linear-gradient(180deg, rgba(69,26,3,0.82) 0%, rgba(120,53,15,0.70) 100%);
        }

        .dark .verb-item:nth-child(4) {
            color: #d6d3d1;
            border-color: rgba(120, 113, 108, 0.22);
            background: linear-gradient(180deg, rgba(28,25,23,0.82) 0%, rgba(68,64,60,0.70) 100%);
        }

        @media (min-width: 640px) {
            .wrap-up-stage {
                padding: 2rem 1.5rem 2.5rem;
            }

            .wrap-up-copy,
            .wrap-up-verbs {
                padding: 2rem;
            }

            .instruction {
                font-size: 1.08rem;
            }

            .sentence-starter {
                font-size: 2rem;
            }

            .verb-item {
                font-size: 1.45rem;
                padding: 1.05rem 1.1rem;
            }
        }

        @media (min-width: 1024px) {
            .wrap-up-layout {
                grid-template-columns: minmax(0, 1.18fr) minmax(320px, 0.82fr);
                align-items: stretch;
            }

            .wrap-up-copy,
            .wrap-up-verbs {
                padding: 2.4rem 2.5rem;
            }

            .wrap-up-copy {
                min-height: 24rem;
            }

            .wrap-up-verbs {
                border-left: 1px solid rgba(226, 232, 240, 0.85);
            }

            .dark .wrap-up-verbs {
                border-left-color: rgba(71, 85, 105, 0.78);
            }

            .sentence-starter {
                font-size: 2.55rem;
                max-width: 39rem;
            }

            .verb-list {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .verb-item {
                font-size: 2rem;
                padding: 1.15rem 1.2rem;
            }
        }
    </style>
@endsection

@section('content')
    <main class="wrap-up-page">
        <div class="wrap-up-stage">
            @include('slider.components.title-subtitle')

            <section class="wrap-up-shell">
                <div class="wrap-up-layout">
                    <div class="wrap-up-copy">
                        <p class="instruction">
                            Use the verbs provided to say what you do/don’t do in the summer.
                        </p>

                        <p class="sentence-starter">
                            <span class="sentence-highlight">In summer, I..........,</span>
                            <span class="sentence-break">but I don’t.........</span>
                        </p>
                    </div>

                    <div class="wrap-up-verbs">
                        <div class="verbs-block">
                            <h2 class="verb-title">What do you do in the summer?</h2>

                            <div class="verb-list">
                                @foreach($verbs as $verb)
                                    <div class="verb-item">{{ $verb }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
