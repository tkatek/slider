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
                radial-gradient(700px 280px at 0% 0%, rgba(59,130,246,.08), transparent 58%),
                radial-gradient(700px 280px at 100% 0%, rgba(249,115,22,.08), transparent 58%),
                #f8fafc;
        }

        .dark .pwl-page {
            background:
                radial-gradient(700px 280px at 0% 0%, rgba(59,130,246,.12), transparent 58%),
                radial-gradient(700px 280px at 100% 0%, rgba(249,115,22,.10), transparent 58%),
                #020617;
        }

        .pwl-shell {
            width: 100%;
            max-width: 1220px;
            margin: 0 auto;
            padding: 24px 16px 32px;
        }

        .pwl-stage {
            max-width: 1120px;
            margin: 0 auto;
            border-radius: 20px;
            border: 1px solid rgba(226,232,240,.95);
            background: #ffffff;
            overflow: hidden;
            box-shadow: 0 18px 40px -34px rgba(15,23,42,.18);
        }

        .dark .pwl-stage {
            border-color: rgba(71,85,105,.78);
            background: #0f172a;
        }

        .pwl-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            padding: 16px;
        }

        .pwl-visual-column,
        .pwl-work-column {
            display: flex;
            flex-direction: column;
            gap: 16px;
            min-width: 0;
        }

        .pwl-card {
            border-radius: 16px;
            border: 1px solid rgba(226,232,240,.95);
            background: rgba(255,255,255,.96);
        }

        .dark .pwl-card {
            border-color: rgba(71,85,105,.72);
            background: #0f172a;
        }

        .pwl-card-pad {
            padding: 14px;
        }

        .pwl-image-frame {
            overflow: hidden;
            border-radius: 12px;
            border: 1px solid rgba(191,219,254,.95);
            background: linear-gradient(180deg, #eff6ff 0%, #f8fafc 100%);
        }

        .dark .pwl-image-frame {
            border-color: rgba(59,130,246,.28);
            background: #020617;
        }

        .pwl-image {
            display: block;
            width: 100%;
            aspect-ratio: var(--pwl-image-ratio, 1 / 1);
            object-fit: var(--pwl-image-fit, cover);
        }

        .pwl-image-empty {
            aspect-ratio: var(--pwl-image-ratio, 1 / 1);
            background: #f1f5f9;
        }

        .dark .pwl-image-empty {
            background: #020617;
        }

        .pwl-word-bank-head {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 10px;
        }

        .pwl-mini-label {
            font-size: .8rem;
            line-height: 1;
            font-weight: 900;
            letter-spacing: .04em;
            text-transform: uppercase;
            color: #2563eb;
        }

        .dark .pwl-mini-label {
            color: #93c5fd;
        }

        .pwl-bank {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
        }

        .pwl-chip {
            appearance: none;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 34px;
            border-radius: 999px;
            padding: .45rem .8rem;
            font-size: .8rem;
            line-height: 1;
            font-weight: 900;
            color: #1e3a8a;
            background: linear-gradient(180deg, #eff6ff 0%, #f8fafc 100%);
            border: 1px solid rgba(147,197,253,.9);
            transition: border-color .18s ease, background-color .18s ease;
        }

        .pwl-chip:hover,
        .pwl-chip:focus-visible {
            border-color: rgba(96,165,250,.95);
            background: #dbeafe;
            outline: none;
        }

        .dark .pwl-chip {
            color: #f8fafc;
            background: rgba(30,64,175,.22);
            border-color: rgba(59,130,246,.35);
        }

        .pwl-rows {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .pwl-row {
            padding: 8px 0;
        }

        .dark .pwl-row {
            background: transparent;
        }

        .pwl-row.is-active {
            background: transparent;
        }

        .dark .pwl-row.is-active {
            background: transparent;
        }

        .pwl-row-top {
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        .pwl-label {
            margin: 0;
            font-size: .98rem;
            line-height: 1.35;
            font-weight: 900;
            color: #0f172a;
        }

        .dark .pwl-label {
            color: #f8fafc;
        }

        .pwl-answer-wrap {
            display: block;
        }

        .pwl-input-shell {
            display: flex;
            align-items: center;
            min-height: 40px;
            border: none;
            border-bottom: 1.5px solid rgba(251,146,60,.55);
            background: transparent;
            padding: 0;
            border-radius: 0;
        }

        .dark .pwl-input-shell {
            border-bottom-color: rgba(251,146,60,.55);
            background: transparent;
        }

        .pwl-input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            padding: 0;
            font-size: .96rem;
            line-height: 1.5;
            font-weight: 800;
            color: #0f172a;
        }

        .dark .pwl-input {
            color: #f8fafc;
        }

        @media (min-width: 960px) {
            .pwl-grid {
                grid-template-columns: minmax(340px, 410px) minmax(0, 1fr);
                gap: 16px;
                padding: 16px;
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
                border-radius: 18px;
            }

            .pwl-grid {
                padding: 12px;
                gap: 14px;
            }

            .pwl-card-pad {
                padding: 12px;
            }

            .pwl-row {
                padding: 7px 0;
            }

            .pwl-input-shell {
                min-height: 36px;
            }

            .pwl-input {
                font-size: .94rem;
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
                            <div
                                    class="pwl-image-frame"
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
                                    <div class="pwl-mini-label">Word Bank</div>
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
                            <div class="pwl-rows">
                                @foreach($rows as $index => $row)
                                    @php
                                        $label = trim((string) ($row['label'] ?? ''));
                                        $inputId = 'pwl-input-' . $index;
                                    @endphp

                                    <div class="pwl-row js-pwl-row">
                                        <div class="pwl-row-top">
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
                                                        autocomplete="off"
                                                        spellcheck="false"
                                                        aria-label="{{ $label }}"
                                                >
                                            </div>
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
