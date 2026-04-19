@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $pageTitle = trim((string) ($content['page_title'] ?? 'Writing'));
    $title = trim((string) ($content['title'] ?? 'Writing'));
    $subtitle = trim((string) ($content['subtitle'] ?? ''));
    $subtitle2 = trim((string) ($content['subtitle_2'] ?? ''));
    $rows = array_values(is_array($content['rows'] ?? null) ? $content['rows'] : []);
@endphp

@section('title', $pageTitle)

@section('style')
    <style>
        .writing-page {
            min-height: 100dvh;
            width: 100%;
            overflow-x: hidden;
            font-family: "Plus Jakarta Sans", sans-serif;
            background:
                linear-gradient(180deg, rgba(255,255,255,.65) 0%, rgba(248,250,252,.88) 100%),
                radial-gradient(900px 420px at 8% 6%, rgba(79,70,229,.08), transparent 55%),
                radial-gradient(720px 420px at 100% 0%, rgba(59,130,246,.08), transparent 55%);
        }

        .dark .writing-page {
            background:
                linear-gradient(180deg, rgba(2,6,23,.88) 0%, rgba(15,23,42,.96) 100%),
                radial-gradient(900px 420px at 8% 6%, rgba(99,102,241,.16), transparent 55%),
                radial-gradient(720px 420px at 100% 0%, rgba(59,130,246,.14), transparent 55%);
        }

        .writing-shell {
            max-width: 1080px;
            margin: 0 auto;
            padding: 28px 16px 36px;
        }

        .writing-table-wrap {
            margin: 28px auto 0;
            max-width: 900px;
            border-radius: 26px;
            border: 1px solid rgba(217,226,241,.9);
            background: rgba(255,255,255,.75);
            box-shadow: 0 18px 44px -34px rgba(15,23,42,.16);
            overflow: hidden;
            backdrop-filter: blur(8px);
        }

        .dark .writing-table-wrap {
            border-color: rgba(71,85,105,.8);
            background: rgba(15,23,42,.62);
            box-shadow: 0 18px 44px -34px rgba(2,6,23,.45);
        }

        .writing-grid {
            display: grid;
            grid-template-columns: 280px minmax(0, 1fr);
        }

        .writing-cell-label,
        .writing-cell-input {
            min-height: 138px;
            border-right: 1px solid rgba(251, 191, 36, .55);
            border-bottom: 1px solid rgba(251, 191, 36, .55);
        }

        .writing-cell-label {
            display: flex;
            align-items: center;
            padding: 18px 20px;
            background: linear-gradient(180deg, #fff2db 0%, #fde9c6 100%);
            font-size: 1.05rem;
            line-height: 1.25;
            font-weight: 900;
            color: #3f2c12;
        }

        .writing-cell-input {
            border-right: none;
            background: rgba(255,255,255,.92);
            padding: 14px 16px;
        }

        .dark .writing-cell-label {
            background: linear-gradient(180deg, rgba(120, 53, 15, .34) 0%, rgba(146, 64, 14, .28) 100%);
            color: #fed7aa;
        }

        .dark .writing-cell-input {
            background: rgba(15,23,42,.88);
        }

        .writing-grid > :nth-last-child(-n+2) {
            border-bottom: none;
        }

        .writing-area {
            width: 100%;
            min-height: 108px;
            resize: none;
            border: none;
            outline: none;
            background: transparent;
            color: #0f172a;
            font-size: 1.05rem;
            line-height: 1.6;
            font-weight: 700;
            padding: 0;
        }

        .writing-area::placeholder {
            color: #475569;
            opacity: 1;
            font-weight: 700;
        }

        .dark .writing-area {
            color: #f8fafc;
        }

        .dark .writing-area::placeholder {
            color: #cbd5e1;
        }

        @media (max-width: 900px) {
            .writing-instruction {
                font-size: 1.35rem;
            }

            .writing-grid {
                grid-template-columns: 220px minmax(0, 1fr);
            }
        }

        @media (max-width: 640px) {
            .writing-shell {
                padding: 22px 14px 28px;
            }

            .writing-instruction {
                font-size: 1.15rem;
            }

            .writing-grid {
                grid-template-columns: 1fr;
            }

            .writing-cell-label,
            .writing-cell-input {
                min-height: auto;
                border-right: none;
            }

            .writing-cell-label {
                padding-bottom: 12px;
            }

            .writing-cell-input {
                padding-top: 0;
            }

            .writing-area {
                min-height: 96px;
            }
        }
    </style>
@endsection

@section('content')
    <main class="writing-page">
        <div class="writing-shell">
            <header class="mb-6 flex flex-col items-center gap-[0.55rem] text-center">
                @include('slider.components.title-subtitle')
                @if($subtitle2 !== '')
                    <p class="text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-lg lg:text-[1.15rem]">
                        {{ $subtitle2 }}
                    </p>
                @endif
            </header>

            <section class="writing-table-wrap">
                <div class="writing-grid">
                    @foreach($rows as $index => $row)
                        @php
                            $label = trim((string) ($row['label'] ?? ''));
                            $placeholder = trim((string) ($row['placeholder'] ?? ''));
                        @endphp
                        <div class="writing-cell-label">{{ $label }}</div>
                        <div class="writing-cell-input">
                            <textarea
                                class="writing-area js-writing-area"
                                data-index="{{ $index }}"
                                placeholder="{{ $placeholder }}"
                            ></textarea>
                        </div>
                    @endforeach
                </div>
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
