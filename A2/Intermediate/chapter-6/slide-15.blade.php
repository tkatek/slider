<?php
$content = [
    'page_title' => 'Practice',
    'title'      => 'Speaking Time!',
    'subtitle'   => 'Look at the picture and describe what was going on. Use past continuous',
    'image'      => materialAsset('slider/A2/Intermediate/chapter-6/img/slide15.webp'),
    'image_alt'  => 'Past continuous picture',
    'image_ratio'=> '1 / 1',
    'image_fit'  => 'cover',

    'word_bank'  => [
        'cry',
        'bark',
        'play',
        'dance',
        'ring',
        'boil',
        'fight',
    ],

    'rows' => [
        ['label' => 'The dog'],
        ['label' => 'The baby'],
        ['label' => 'The boys'],
        ['label' => 'The girl'],
        ['label' => 'The phone'],
        ['label' => 'The water'],
        ['label' => 'The radio'],
    ],
];
?>

@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle  = trim((string) ($content['page_title'] ?? 'Writing'));
    $title      = trim((string) ($content['title'] ?? 'Writing'));
    $subtitle   = trim((string) ($content['subtitle'] ?? ''));
    $image      = trim((string) ($content['image'] ?? ''));
    $imageAlt   = trim((string) ($content['image_alt'] ?? 'Picture'));
    $imageRatio = trim((string) ($content['image_ratio'] ?? '1 / 1'));
    $imageFit   = trim((string) ($content['image_fit'] ?? 'cover'));
    $wordBank   = array_values(is_array($content['word_bank'] ?? null) ? $content['word_bank'] : []);
    $rows       = array_values(is_array($content['rows'] ?? null) ? $content['rows'] : []);
@endphp

@section('title', $pageTitle)

@section('style')
    <style>
        .pwl-page {
            min-height: 100dvh;
            width: 100%;
            overflow-x: hidden;
            font-family: "Plus Jakarta Sans", sans-serif;
            background:
                    radial-gradient(900px 480px at 0% 0%, rgba(99,102,241,.10), transparent 58%),
                    radial-gradient(760px 420px at 100% 0%, rgba(245,158,11,.12), transparent 58%),
                    linear-gradient(180deg, #f8fafc 0%, #eef2ff 100%);
        }

        .dark .pwl-page {
            background:
                    radial-gradient(900px 480px at 0% 0%, rgba(99,102,241,.18), transparent 58%),
                    radial-gradient(760px 420px at 100% 0%, rgba(245,158,11,.14), transparent 58%),
                    linear-gradient(180deg, #020617 0%, #0f172a 100%);
        }

        .pwl-shell {
            width: 100%;
            max-width: 1220px;
            margin: 0 auto;
            padding: 24px 16px 32px;
        }

        .pwl-stage {
            position: relative;
            max-width: 1120px;
            margin: 0 auto;
            border-radius: 32px;
            border: 1px solid rgba(226,232,240,.95);
            background: rgba(255,255,255,.78);
            box-shadow:
                    0 28px 80px -42px rgba(15,23,42,.24),
                    0 14px 34px -28px rgba(15,23,42,.12);
            backdrop-filter: blur(14px);
            overflow: hidden;
        }

        .dark .pwl-stage {
            border-color: rgba(71,85,105,.78);
            background: rgba(15,23,42,.72);
            box-shadow:
                    0 28px 80px -42px rgba(2,6,23,.70),
                    inset 0 1px 0 rgba(255,255,255,.03);
        }

        .pwl-stage::before {
            content: "";
            position: absolute;
            inset: 0 auto auto 0;
            width: 100%;
            height: 140px;
            background: linear-gradient(135deg, rgba(99,102,241,.10), rgba(245,158,11,.08), transparent 72%);
            pointer-events: none;
        }

        .dark .pwl-stage::before {
            background: linear-gradient(135deg, rgba(99,102,241,.18), rgba(245,158,11,.10), transparent 72%);
        }

        .pwl-grid {
            position: relative;
            display: grid;
            grid-template-columns: 1fr;
            gap: 18px;
            padding: 18px;
        }

        .pwl-visual-column,
        .pwl-work-column {
            display: flex;
            flex-direction: column;
            gap: 16px;
            min-width: 0;
        }

        .pwl-card {
            position: relative;
            border-radius: 24px;
            border: 1px solid rgba(226,232,240,.95);
            background: rgba(255,255,255,.88);
            box-shadow: 0 14px 34px -28px rgba(15,23,42,.20);
        }

        .dark .pwl-card {
            border-color: rgba(71,85,105,.72);
            background: rgba(15,23,42,.82);
            box-shadow: 0 14px 34px -28px rgba(2,6,23,.65);
        }

        .pwl-card-pad {
            padding: 16px;
        }

        .pwl-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            width: fit-content;
            border-radius: 999px;
            padding: .45rem .75rem;
            font-size: .72rem;
            font-weight: 900;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #4338ca;
            background: rgba(79,70,229,.10);
        }

        .dark .pwl-eyebrow {
            color: #c7d2fe;
            background: rgba(99,102,241,.18);
        }

        .pwl-section-title {
            margin: 12px 0 6px;
            font-size: 1.28rem;
            line-height: 1.15;
            font-weight: 900;
            letter-spacing: -.03em;
            color: #0f172a;
        }

        .dark .pwl-section-title {
            color: #f8fafc;
        }

        .pwl-section-text {
            margin: 0;
            font-size: .95rem;
            line-height: 1.6;
            font-weight: 700;
            color: #475569;
        }

        .dark .pwl-section-text {
            color: #cbd5e1;
        }

        .pwl-image-frame {
            position: relative;
            overflow: hidden;
            border-radius: 22px;
            border: 1px solid rgba(99,102,241,.14);
            background:
                    linear-gradient(180deg, rgba(255,255,255,.85), rgba(248,250,252,.95));
        }

        .dark .pwl-image-frame {
            border-color: rgba(99,102,241,.18);
            background:
                    linear-gradient(180deg, rgba(30,41,59,.92), rgba(15,23,42,.98));
        }

        .pwl-image {
            display: block;
            width: 100%;
            aspect-ratio: var(--pwl-image-ratio, 1 / 1);
            object-fit: var(--pwl-image-fit, cover);
        }

        .pwl-image-empty {
            aspect-ratio: var(--pwl-image-ratio, 1 / 1);
            background:
                    linear-gradient(135deg, rgba(226,232,240,.9), rgba(248,250,252,1));
        }

        .dark .pwl-image-empty {
            background:
                    linear-gradient(135deg, rgba(30,41,59,.95), rgba(15,23,42,1));
        }

        .pwl-word-bank-head {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 12px;
        }

        .pwl-mini-label {
            font-size: .78rem;
            line-height: 1;
            font-weight: 900;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #b45309;
        }

        .dark .pwl-mini-label {
            color: #fdba74;
        }

        .pwl-tip {
            font-size: .82rem;
            line-height: 1.45;
            font-weight: 800;
            color: #64748b;
        }

        .dark .pwl-tip {
            color: #94a3b8;
        }

        .pwl-bank {
            display: flex;
            flex-wrap: wrap;
            gap: .6rem;
        }

        .pwl-chip {
            appearance: none;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 38px;
            border-radius: 999px;
            padding: .58rem .95rem;
            font-size: .84rem;
            line-height: 1;
            font-weight: 900;
            color: #9a3412;
            background:
                    linear-gradient(180deg, rgba(255,247,237,1), rgba(255,237,213,.95));
            border: 1px solid rgba(251,146,60,.28);
            box-shadow: 0 8px 18px -16px rgba(194,65,12,.55);
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease, background .18s ease;
        }

        .pwl-chip:hover,
        .pwl-chip:focus-visible {
            transform: translateY(-1px);
            border-color: rgba(249,115,22,.45);
            box-shadow: 0 12px 22px -18px rgba(194,65,12,.6);
            outline: none;
        }

        .dark .pwl-chip {
            color: #fed7aa;
            background:
                    linear-gradient(180deg, rgba(154,52,18,.24), rgba(124,45,18,.20));
            border-color: rgba(251,146,60,.20);
            box-shadow: none;
        }

        .pwl-work-header {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }

        .pwl-work-title {
            margin: 0;
            font-size: 1.2rem;
            line-height: 1.15;
            font-weight: 900;
            letter-spacing: -.03em;
            color: #0f172a;
        }

        .dark .pwl-work-title {
            color: #f8fafc;
        }

        .pwl-grammar-note {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            border-radius: 999px;
            padding: .5rem .8rem;
            font-size: .78rem;
            line-height: 1;
            font-weight: 900;
            color: #1d4ed8;
            background: rgba(219,234,254,.72);
            white-space: nowrap;
        }

        .dark .pwl-grammar-note {
            color: #bfdbfe;
            background: rgba(30,64,175,.22);
        }

        .pwl-rows {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .pwl-row {
            border-radius: 18px;
            border: 1px solid rgba(226,232,240,.95);
            background: rgba(248,250,252,.86);
            padding: 12px 14px;
            transition: border-color .18s ease, box-shadow .18s ease, transform .18s ease, background .18s ease;
        }

        .dark .pwl-row {
            border-color: rgba(51,65,85,.95);
            background: rgba(15,23,42,.76);
        }

        .pwl-row.is-active {
            border-color: rgba(99,102,241,.42);
            box-shadow: 0 12px 24px -22px rgba(79,70,229,.55);
            background: rgba(255,255,255,.98);
            transform: translateY(-1px);
        }

        .dark .pwl-row.is-active {
            border-color: rgba(129,140,248,.45);
            background: rgba(15,23,42,.94);
            box-shadow: 0 12px 24px -22px rgba(99,102,241,.38);
        }

        .pwl-row-top {
            display: flex;
            align-items: center;
            gap: .7rem;
            margin-bottom: 9px;
        }

        .pwl-row-index {
            flex: 0 0 auto;
            width: 28px;
            height: 28px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: .78rem;
            line-height: 1;
            font-weight: 900;
            color: #4338ca;
            background: rgba(79,70,229,.10);
        }

        .dark .pwl-row-index {
            color: #c7d2fe;
            background: rgba(99,102,241,.18);
        }

        .pwl-label {
            margin: 0;
            font-size: 1rem;
            line-height: 1.35;
            font-weight: 900;
            color: #111827;
        }

        .dark .pwl-label {
            color: #f8fafc;
        }

        .pwl-answer-wrap {
            display: grid;
            grid-template-columns: 1fr;
            gap: 8px;
        }

        .pwl-input-shell {
            display: flex;
            align-items: center;
            min-height: 52px;
            border-radius: 14px;
            border: 1px solid rgba(203,213,225,.9);
            background: rgba(255,255,255,.96);
            padding: 0 14px;
        }

        .dark .pwl-input-shell {
            border-color: rgba(71,85,105,.9);
            background: rgba(2,6,23,.42);
        }

        .pwl-input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            padding: 0;
            font-size: .98rem;
            line-height: 1.5;
            font-weight: 800;
            color: #0f172a;
        }

        .pwl-input::placeholder {
            color: #94a3b8;
            font-weight: 700;
        }

        .dark .pwl-input {
            color: #f8fafc;
        }

        .dark .pwl-input::placeholder {
            color: #64748b;
        }

        .pwl-hint {
            margin: 0;
            font-size: .78rem;
            line-height: 1.45;
            font-weight: 700;
            color: #64748b;
        }

        .dark .pwl-hint {
            color: #94a3b8;
        }

        @media (min-width: 960px) {
            .pwl-grid {
                grid-template-columns: minmax(340px, 410px) minmax(0, 1fr);
                gap: 20px;
                padding: 20px;
            }

            .pwl-visual-column {
                position: sticky;
                top: 16px;
                align-self: start;
            }
        }

        @media (max-width: 768px) {
            .pwl-shell {
                padding: 18px 12px 24px;
            }

            .pwl-stage {
                border-radius: 24px;
            }

            .pwl-grid {
                padding: 14px;
                gap: 14px;
            }

            .pwl-card-pad {
                padding: 14px;
            }

            .pwl-section-title {
                font-size: 1.16rem;
            }

            .pwl-work-title {
                font-size: 1.08rem;
            }

            .pwl-row {
                padding: 11px 12px;
            }

            .pwl-input-shell {
                min-height: 48px;
                padding: 0 12px;
            }

            .pwl-input {
                font-size: .94rem;
            }
        }

        @media (max-width: 480px) {
            .pwl-word-bank-head,
            .pwl-work-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .pwl-section-text,
            .pwl-tip,
            .pwl-hint {
                font-size: .8rem;
            }
        }
    </style>
@endsection

@section('content')
    <main class="pwl-page">
        <div class="pwl-shell">
            @include('slider.components.title-subtitle')

            <section class="pwl-stage">
                <div class="pwl-grid">
                    <aside class="pwl-visual-column">
                        <div class="pwl-card pwl-card-pad">
                            <span class="pwl-eyebrow">Scene Study</span>
                            <h2 class="pwl-section-title">Look carefully at the picture</h2>
                            <p class="pwl-section-text">
                                Observe each action, then complete the sentences using past continuous.
                            </p>

                            <div
                                    class="pwl-image-frame mt-4"
                                    style="--pwl-image-ratio: {{ $imageRatio }}; --pwl-image-fit: {{ $imageFit }};"
                            >
                                @if($image !== '')
                                    <img src="{{ $image }}" alt="{{ $imageAlt }}" class="pwl-image">
                                @else
                                    <div class="pwl-image-empty"></div>
                                @endif
                            </div>
                        </div>

                        @if(!empty($wordBank))
                            <div class="pwl-card pwl-card-pad">
                                <div class="pwl-word-bank-head">
                                    <div>
                                        <div class="pwl-mini-label">Word Bank</div>
                                        <p class="pwl-section-text" style="margin-top: 6px;">
                                            Click a word to add it to the active answer.
                                        </p>
                                    </div>
                                    <span class="pwl-tip">Use: was/were + verb-ing</span>
                                </div>

                                <div class="pwl-bank">
                                    @foreach($wordBank as $word)
                                        <button
                                                type="button"
                                                class="pwl-chip js-pwl-chip"
                                                data-word="{{ $word }}"
                                        >
                                            {{ $word }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </aside>

                    <div class="pwl-work-column">
                        <div class="pwl-card pwl-card-pad">
                            <div class="pwl-work-header">
                                <div>
                                    <h3 class="pwl-work-title">Complete the sentences</h3>
                                    <p class="pwl-section-text" style="margin-top: 6px;">
                                        Write a full past continuous action for each person or thing.
                                    </p>
                                </div>
                                <span class="pwl-grammar-note">Grammar cue: was / were + verb-ing</span>
                            </div>

                            <div class="pwl-rows">
                                @foreach($rows as $index => $row)
                                    @php
                                        $label = trim((string) ($row['label'] ?? ''));
                                        $inputId = 'pwl-input-' . $index;
                                    @endphp

                                    <div class="pwl-row js-pwl-row">
                                        <div class="pwl-row-top">
                                            <span class="pwl-row-index">{{ $index + 1 }}</span>
                                            <p class="pwl-label">{{ $label }}</p>
                                        </div>

                                        <div class="pwl-answer-wrap">
                                            <label for="{{ $inputId }}" class="sr-only">{{ $label }}</label>
                                            <div class="pwl-input-shell">
                                                <input
                                                        id="{{ $inputId }}"
                                                        type="text"
                                                        class="pwl-input js-pwl-input"
                                                        data-index="{{ $index }}"
                                                        placeholder="was / were + verb-ing..."
                                                        autocomplete="off"
                                                        spellcheck="false"
                                                        aria-label="{{ $label }}"
                                                >
                                            </div>
                                            <p class="pwl-hint">Example structure: was barking / were playing</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            var inputs = Array.prototype.slice.call(document.querySelectorAll('.js-pwl-input'));
            var rows = Array.prototype.slice.call(document.querySelectorAll('.js-pwl-row'));
            var chips = Array.prototype.slice.call(document.querySelectorAll('.js-pwl-chip'));
            var activeInput = inputs.length ? inputs[0] : null;

            function setActiveInput(input) {
                activeInput = input;

                rows.forEach(function (row) {
                    row.classList.remove('is-active');
                });

                if (!input) {
                    return;
                }

                var parentRow = input.closest('.js-pwl-row');
                if (parentRow) {
                    parentRow.classList.add('is-active');
                }
            }

            function focusNextInput(currentInput) {
                var currentIndex = inputs.indexOf(currentInput);
                if (currentIndex > -1 && inputs[currentIndex + 1]) {
                    inputs[currentIndex + 1].focus();
                }
            }

            function insertWord(word) {
                if (!activeInput) {
                    return;
                }

                var currentValue = activeInput.value.trim();
                activeInput.value = currentValue ? (currentValue + ' ' + word) : word;
                activeInput.focus();
            }

            inputs.forEach(function (input) {
                input.addEventListener('focus', function () {
                    setActiveInput(input);
                });

                input.addEventListener('click', function () {
                    setActiveInput(input);
                });

                input.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        focusNextInput(input);
                    }
                });
            });

            rows.forEach(function (row, index) {
                row.addEventListener('click', function (event) {
                    if (event.target.closest('.js-pwl-input')) {
                        return;
                    }

                    if (inputs[index]) {
                        inputs[index].focus();
                    }
                });
            });

            chips.forEach(function (chip) {
                chip.addEventListener('click', function () {
                    insertWord(chip.getAttribute('data-word') || '');
                });
            });

            if (activeInput) {
                setActiveInput(activeInput);
            }

            window.resetSlide = function () {
                inputs.forEach(function (input) {
                    input.value = '';
                });

                if (inputs.length) {
                    inputs[0].focus();
                    setActiveInput(inputs[0]);
                }
            };
        })();
    </script>
@endsection