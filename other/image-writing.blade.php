@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = $content['page_title'] ?? 'Slide';
    $title = $content['title'] ?? '';
    $subtitle = $content['subtitle'] ?? '';
    $gridClass = (string) ($content['grid_class'] ?? 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4');
    $imageRatio = (string) ($content['image_ratio'] ?? '1 / 1');
    $imageFit = (string) ($content['image_fit'] ?? 'contain');
    $items = is_array($content['items'] ?? null) ? $content['items'] : [];

    $normalizeCols = static fn ($cols) => max(1, min(6, (int) $cols));

    $extractCols = static function (?string $breakpoint, string $classString, int $fallback) use ($normalizeCols) {
        $pattern = $breakpoint
            ? '/(?:^|\s)' . preg_quote($breakpoint, '/') . ':grid-cols-(\d+)/'
            : '/(?:^|\s)grid-cols-(\d+)/';

        if (preg_match($pattern, $classString, $match)) {
            return $normalizeCols($match[1]);
        }

        return $fallback;
    };

    $baseCols = $extractCols(null, $gridClass, 1);
    $smCols = $extractCols('sm', $gridClass, $baseCols);
    $lgCols = $extractCols('lg', $gridClass, $smCols);
    $xlCols = $extractCols('xl', $gridClass, $lgCols);

    $storageKey = 'sign-meanings-' . md5(request()->path());
@endphp

@section('title', $pageTitle)

@section('style')
    <style>
        .sign-writing-shell{
            min-height:100dvh;
            width:100%;
            overflow-x:hidden;
            font-family:"Plus Jakarta Sans", sans-serif;
            background:
                    linear-gradient(180deg, rgba(255,255,255,.65) 0%, rgba(248,250,252,.88) 100%),
                    radial-gradient(900px 420px at 8% 6%, rgba(79,70,229,.08), transparent 55%),
                    radial-gradient(720px 420px at 100% 0%, rgba(59,130,246,.08), transparent 55%);
        }

        .dark .sign-writing-shell{
            background:
                    linear-gradient(180deg, rgba(2,6,23,.88) 0%, rgba(15,23,42,.96) 100%),
                    radial-gradient(900px 420px at 8% 6%, rgba(99,102,241,.16), transparent 55%),
                    radial-gradient(720px 420px at 100% 0%, rgba(59,130,246,.14), transparent 55%);
        }

        .sign-writing-inner{
            min-height:100dvh;
            width:100%;
            max-width:1320px;
            margin:0 auto;
            padding:20px 16px 28px;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .sign-writing-main{
            width:100%;
        }

        .sign-writing-grid{
            display:grid;
            width:100%;
            max-width:1240px;
            margin:0 auto;
            gap:14px;
            grid-template-columns:repeat(1, minmax(0, 1fr));
        }

        .sign-writing-grid[data-base-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
        .sign-writing-grid[data-base-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
        .sign-writing-grid[data-base-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
        .sign-writing-grid[data-base-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
        .sign-writing-grid[data-base-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}

        .sign-card{
            display:flex;
            flex-direction:column;
            min-height:100%;
            border-radius:24px;
            border:1px solid rgba(217,226,241,.9);
            background:linear-gradient(180deg, rgba(255,255,255,.95) 0%, rgba(248,250,252,.94) 100%);
            box-shadow:0 12px 28px -24px rgba(15,23,42,.12);
            padding:16px;
            transition:transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .dark .sign-card{
            border-color:rgba(71,85,105,.8);
            background:linear-gradient(180deg, rgba(15,23,42,.94) 0%, rgba(17,24,39,.94) 100%);
            box-shadow:0 12px 28px -24px rgba(2,6,23,.35);
        }

        .sign-card:hover{
            transform:translateY(-2px);
            border-color:rgba(99,102,241,.28);
            box-shadow:0 18px 40px -28px rgba(37,99,235,.18);
        }

        .sign-image-frame{
            width:100%;
            aspect-ratio:var(--sign-image-ratio, 1 / 1);
            box-sizing:border-box;
            padding:8px;
            border-radius:18px;
            background:rgba(238,242,255,.72);
            border:1px solid rgba(199,210,254,.65);
        }

        .dark .sign-image-frame{
            background:rgba(30,41,59,.72);
            border-color:rgba(99,102,241,.18);
        }

        .sign-image{
            display:block;
            width:100%;
            aspect-ratio:var(--sign-image-ratio, 1 / 1);
            object-fit:var(--sign-image-fit, contain);
            transform:scale(var(--sign-image-scale, 1));
            transform-origin:center;
        }

        .sign-image-empty{
            display:flex;
            align-items:center;
            justify-content:center;
            width:100%;
            border-radius:16px;
            border:1px dashed rgba(148,163,184,.7);
            color:#94a3b8;
            font-size:.95rem;
            line-height:1.35;
            font-weight:800;
            text-align:center;
            padding:12px;
            background:rgba(255,255,255,.45);
        }

        .dark .sign-image-empty{
            border-color:rgba(100,116,139,.75);
            color:#94a3b8;
            background:rgba(15,23,42,.35);
        }

        .sign-label{
            margin-top:12px;
            font-size:1.05rem;
            line-height:1.3;
            font-weight:900;
            letter-spacing:-0.02em;
            color:#0f172a;
            text-align:left;
        }

        .dark .sign-label{
            color:#f8fafc;
        }

        .sign-answer-line{
            margin-top:10px;
            display:flex;
            flex-direction:column;
            gap:8px;
        }

        .sign-example{
            font-size:1rem;
            line-height:1.45;
            font-weight:800;
            color:#4f46e5;
        }

        .dark .sign-example{
            color:#c7d2fe;
        }

        .sign-input{
            width:100%;
            min-height:50px;
            border-radius:16px;
            border:1.5px solid #cbd5e1;
            background:rgba(255,255,255,.96);
            color:#0f172a;
            padding:12px 14px;
            font-size:.98rem;
            line-height:1.45;
            font-weight:700;
            outline:none;
            transition:border-color .18s ease, box-shadow .18s ease, background-color .18s ease;
        }

        .sign-input::placeholder{
            color:#94a3b8;
            font-weight:600;
        }

        .sign-input:focus{
            border-color:#6366f1;
            box-shadow:0 0 0 4px rgba(99,102,241,.12);
        }

        .sign-input[readonly]{
            background:rgba(248,250,252,.98);
            color:#0f172a;
            cursor:default;
        }

        .dark .sign-input{
            border-color:#334155;
            background:rgba(15,23,42,.98);
            color:#f8fafc;
        }

        .dark .sign-input[readonly]{
            background:rgba(15,23,42,.98);
            color:#f8fafc;
        }

        .dark .sign-input::placeholder{
            color:#64748b;
        }

        .top-note{
            margin:0 auto 10px;
            max-width:1240px;
            font-size:1.1rem;
            line-height:1.35;
            font-weight:900;
            color:#4f46e5;
        }

        .dark .top-note{
            color:#c7d2fe;
        }

        @media (min-width: 640px){
            .sign-writing-inner{
                padding:24px 20px 32px;
            }

            .sign-writing-grid{
                gap:16px;
            }

            .sign-writing-grid[data-sm-cols="1"]{grid-template-columns:repeat(1, minmax(0, 1fr));}
            .sign-writing-grid[data-sm-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
            .sign-writing-grid[data-sm-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
            .sign-writing-grid[data-sm-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
            .sign-writing-grid[data-sm-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
            .sign-writing-grid[data-sm-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}
        }

        @media (min-width: 1024px){
            .sign-writing-grid{
                gap:18px;
            }

            .sign-writing-grid[data-lg-cols="1"]{grid-template-columns:repeat(1, minmax(0, 1fr));}
            .sign-writing-grid[data-lg-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
            .sign-writing-grid[data-lg-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
            .sign-writing-grid[data-lg-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
            .sign-writing-grid[data-lg-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
            .sign-writing-grid[data-lg-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}
        }

        @media (min-width: 1280px){
            .sign-writing-grid[data-xl-cols="1"]{grid-template-columns:repeat(1, minmax(0, 1fr));}
            .sign-writing-grid[data-xl-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
            .sign-writing-grid[data-xl-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
            .sign-writing-grid[data-xl-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
            .sign-writing-grid[data-xl-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
            .sign-writing-grid[data-xl-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}
        }

        @media (max-width: 639px){
            .top-note{
                font-size:1rem;
                margin-bottom:8px;
            }

            .sign-card{
                padding:14px;
                border-radius:24px;
            }

        }
    </style>
@endsection

@section('content')
    <div class="sign-writing-shell">
        <div class="sign-writing-inner">
            <main class="sign-writing-main">
                <div class="header-spacing text-center space-y-6 my-8">
                    @if($title !== '')
                        <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $title }}
                            </span>
                        </h1>
                    @endif

                    @if($subtitle !== '')
                        <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                            {{ $subtitle }}
                        </p>
                    @endif
                </div>



                <section
                        class="sign-writing-grid"
                        data-base-cols="{{ $baseCols }}"
                        data-sm-cols="{{ $smCols }}"
                        data-lg-cols="{{ $lgCols }}"
                        data-xl-cols="{{ $xlCols }}"
                >
                    @foreach($items as $index => $item)
                        @php
                            $isExample = (bool) ($item['example'] ?? false);
                            $fieldId = 'sign-answer-' . $index;
                        @endphp

                        <article class="sign-card">
                            @if(!empty($item['image']))
                                <img
                                        src="{{ $item['image'] }}"
                                        alt="{{ $item['text'] }}"
                                        loading="lazy"
                                        class="sign-image sign-image-frame"
                                        style="--sign-image-scale: {{ $item['image_scale'] ?? 1 }}; --sign-image-ratio: {{ $imageRatio }}; --sign-image-fit: {{ $imageFit }};"
                                />
                            @else
                                <div class="sign-image-empty sign-image-frame" style="--sign-image-ratio: {{ $imageRatio }};">Image not available</div>
                            @endif

                            <div class="sign-label">{{ $item['text'] }} =</div>

                            <div class="sign-answer-line">
                                @if($isExample)
                                    @if(!empty($item['show_answer_in_input']))
                                        <input
                                            type="text"
                                            class="sign-input"
                                            value="{{ $item['answer'] ?? '' }}"
                                            readonly
                                            tabindex="-1"
                                        />
                                    @else
                                        <div class="sign-example">{{ $item['answer'] ?? '' }}</div>
                                    @endif
                                @else
                                    <input
                                            id="{{ $fieldId }}"
                                            type="text"
                                            class="sign-input js-sign-input"
                                            placeholder="{{ $item['placeholder'] ?? 'Write here...' }}"
                                            data-index="{{ $index }}"
                                            data-label="{{ $item['text'] }}"
                                            autocomplete="off"
                                    />
                                @endif
                            </div>
                        </article>
                    @endforeach
                </section>
            </main>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const storageKey = @json($storageKey);
            const inputs = Array.from(document.querySelectorAll('.js-sign-input'));

            let savedData = {};
            try {
                savedData = JSON.parse(localStorage.getItem(storageKey) || '{}') || {};
            } catch (e) {
                savedData = {};
            }

            const saveAll = () => {
                const payload = {};
                inputs.forEach((input) => {
                    payload[input.dataset.index] = input.value || '';
                });
                localStorage.setItem(storageKey, JSON.stringify(payload));
            };

            inputs.forEach((input) => {
                const index = input.dataset.index;

                if (typeof savedData[index] === 'string') {
                    input.value = savedData[index];
                }

                const markSaved = () => {
                    saveAll();
                };

                input.addEventListener('input', markSaved);
                input.addEventListener('change', markSaved);
                input.addEventListener('blur', markSaved);
            });

            window.resetSlide = () => {
                inputs.forEach((input) => {
                    input.value = '';
                });
                localStorage.removeItem(storageKey);
            };
        });
    </script>
@endsection
