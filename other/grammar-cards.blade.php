@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = trim((string)($content['page_title'] ?? 'Slide'));
    $pageHeading = is_scalar($content['title'] ?? null) ? trim((string)($content['title'] ?? '')) : '';
    $pageSubtitle = is_scalar($content['subtitle'] ?? null) ? trim((string)($content['subtitle'] ?? '')) : '';
    $themeClass = trim((string)($content['theme_class'] ?? 'grammar-theme-editorial'));
    $headerWrapClass = trim((string)($content['header_wrap_class'] ?? 'mb-5 text-center flex flex-col items-center gap-[0.55rem]'));
    $titleClass = trim((string)($content['title_class'] ?? 'font-black leading-[1.04] tracking-[-0.05em] text-4xl sm:text-5xl lg:text-6xl'));
    $titleGradientClass = trim((string)($content['title_gradient_class'] ?? 'bg-gradient-to-r from-indigo-700 via-violet-600 to-blue-500'));
    $subtitleClass = trim((string)($content['subtitle_class'] ?? 'text-base sm:text-lg lg:text-[1.12rem] font-bold leading-[1.5] text-slate-600 dark:text-slate-300'));
    $cardsGridClass = trim((string)($content['cards_grid_class'] ?? 'grid gap-3 md:grid-cols-2 lg:grid-cols-3 lg:gap-4'));
    $centerShell = (bool)($content['center_shell'] ?? false);
    $useCardWrapper = array_key_exists('use_card_wrapper', $content) ? (bool)$content['use_card_wrapper'] : true;
    $cards = is_array($content['cards'] ?? null) ? $content['cards'] : [];
    $playLabel = trim((string)($content['play_label'] ?? 'Play audio'));
@endphp

@section('title', $pageTitle)

@section('style')
    <style>
        :root{
            --g-paper:#ffffff;
            --g-paper-soft:#f8fafc;
            --g-line:#d9e2f1;
            --g-line-strong:#cbd5e1;
            --g-ink:#1e293b;
            --g-muted:#64748b;
            --g-accent:#4f46e5;
            --g-accent-soft:#eef2ff;
            --g-accent-2:#38bdf8;
            --g-warm:#f59e0b;
            --g-warm-soft:#fff7ed;
            --g-danger:#ef4444;
        }

        .dark{
            --g-paper:#0f172a;
            --g-paper-soft:#111827;
            --g-line:#334155;
            --g-line-strong:#475569;
            --g-ink:#e5eefc;
            --g-muted:#94a3b8;
            --g-accent:#93c5fd;
            --g-accent-soft:#172554;
            --g-accent-2:#818cf8;
            --g-warm:#fbbf24;
            --g-warm-soft:#3a2b12;
            --g-danger:#fb7185;
        }

        .grammar-page{
            background: transparent;
        }

        .grammar-theme-editorial{
            font-family: "Plus Jakarta Sans", sans-serif;
            background:
                    linear-gradient(180deg, rgba(255,255,255,0.65) 0%, rgba(248,250,252,0.88) 100%),
                    radial-gradient(900px 420px at 8% 6%, rgba(79,70,229,.08), transparent 55%),
                    radial-gradient(720px 420px at 100% 0%, rgba(59,130,246,.08), transparent 55%);
        }

        .dark .grammar-theme-editorial{
            background:
                    linear-gradient(180deg, rgba(2,6,23,0.88) 0%, rgba(15,23,42,0.96) 100%),
                    radial-gradient(900px 420px at 8% 6%, rgba(99,102,241,.16), transparent 55%),
                    radial-gradient(720px 420px at 100% 0%, rgba(59,130,246,.14), transparent 55%);
        }

        .glass-shell{
            position: relative;
            overflow: hidden;
            border-radius: 28px;
            border: 1px solid rgba(217,226,241,.9);
            background: rgba(255,255,255,.72);
            box-shadow: 0 18px 44px -34px rgba(15,23,42,.16);
            backdrop-filter: blur(8px);
        }

        .dark .glass-shell{
            border-color: rgba(71,85,105,.8);
            background: rgba(15,23,42,.6);
            box-shadow: 0 18px 44px -34px rgba(2,6,23,.45);
        }

        .glass-shell::before{
            content:"";
            position:absolute;
            inset:0;
            pointer-events:none;
            background:
                    radial-gradient(120% 90% at 0% 0%, rgba(79,70,229,.06), transparent 42%),
                    radial-gradient(120% 90% at 100% 0%, rgba(56,189,248,.05), transparent 44%);
        }

        .mini-card{
            position: relative;
            height: 100%;
            border-radius: 20px;
            border: 1px solid rgba(217,226,241,.9);
            background: linear-gradient(180deg, rgba(255,255,255,.95) 0%, rgba(248,250,252,.94) 100%);
            box-shadow: 0 12px 28px -24px rgba(15,23,42,.12);
        }

        .dark .mini-card{
            border-color: rgba(71,85,105,.8);
            background: linear-gradient(180deg, rgba(15,23,42,.94) 0%, rgba(17,24,39,.94) 100%);
            box-shadow: 0 12px 28px -24px rgba(2,6,23,.35);
        }

        .cards-grid > *{
            min-width: 0;
        }

        .badge-positive,
        .badge-question,
        .badge-negative{
            display:inline-flex;
            align-items:center;
            border-radius:999px;
            padding:.4rem .78rem;
            font-size:.7rem;
            font-weight:900;
            letter-spacing:.12em;
            text-transform:uppercase;
            border:1px solid transparent;
        }

        .badge-positive{
            background: #ecfdf5;
            color: #15803d;
            border-color: rgba(34,197,94,.14);
        }

        .badge-question{
            background: var(--g-accent-soft);
            color: var(--g-accent);
            border-color: rgba(79,70,229,.14);
        }

        .badge-negative{
            background: var(--g-warm-soft);
            color: var(--g-warm);
            border-color: rgba(245,158,11,.18);
        }

        .dark .badge-positive{
            background: rgba(34,197,94,.12);
            color: #86efac;
        }

        .dark .badge-question{
            background: rgba(99,102,241,.16);
            color: #c7d2fe;
        }

        .dark .badge-negative{
            background: rgba(245,158,11,.14);
            color: #fcd34d;
        }

        .section-block + .section-block{
            margin-top: 1.15rem;
            padding-top: 1rem;
            border-top: 1px dashed rgba(203,213,225,.95);
        }

        .dark .section-block + .section-block{
            border-top-color: rgba(71,85,105,.84);
        }


        .section-heading{
            font-size: 1.32rem;
            line-height: 1.25;
            font-weight: 900;
            letter-spacing: -0.03em;
            color: var(--g-ink);
        }

        .dark .section-heading{
            color: #f8fafc;
        }

        .example-list{
            display:grid;
            gap:.62rem;
            margin-top:.8rem;
        }

        .example-item{
            display:flex;
            align-items:flex-start;
            gap:.62rem;
            font-size:.98rem;
            line-height:1.58;
            font-weight:700;
            color:#475569;
        }

        .dark .example-item{
            color:#cbd5e1;
        }

        .example-mark-check,
        .example-mark-bullet{
            flex:none;
            color: var(--g-accent);
        }

        .dark .example-mark-check,
        .dark .example-mark-bullet{
            color: #c7d2fe;
        }

        .example-mark-check{
            font-size:1rem;
            line-height:1.25;
        }

        .example-mark-bullet{
            font-size:1.05rem;
            line-height:1.15;
        }

        .example-mark-dot{
            flex:none;
            width:.38rem;
            height:.38rem;
            margin-top:.56rem;
            border-radius:999px;
            background: linear-gradient(135deg, #38bdf8, #6366f1);
        }

        .table-intro{
            margin-top:.35rem;
            font-size:.96rem;
            line-height:1.52;
            font-weight:800;
            color:#475569;
        }

        .dark .table-intro{
            color:#cbd5e1;
        }

        .grammar-table-wrap,
        .table-shell{
            position:relative;
            margin-top:.28rem;
            overflow:hidden;
            border-radius:16px;
            border:1px solid rgba(217,226,241,.95);
            background: rgba(255,255,255,.96);
            width:100%;
            max-width:100%;
            box-shadow:none;
        }

        .dark .grammar-table-wrap,
        .dark .table-shell{
            border-color: rgba(71,85,105,.88);
            background: rgba(15,23,42,.84);
        }

        .table-wrap{
            position:relative;
            width:100%;
            max-width:100%;
            overflow-x:auto;
        }

        .grammar-table{
            width:100%;
            border-collapse:separate;
            border-spacing:0;
        }

        .grammar-table.simple th,
        .grammar-table.simple td,
        .grammar-table.rich thead th,
        .grammar-table.rich tbody td{
            border-right: 1px solid rgba(217,226,241,.95);
            border-bottom: 1px solid rgba(217,226,241,.95);
        }

        .dark .grammar-table.simple th,
        .dark .grammar-table.simple td,
        .dark .grammar-table.rich thead th,
        .dark .grammar-table.rich tbody td{
            border-right-color: rgba(71,85,105,.88);
            border-bottom-color: rgba(71,85,105,.88);
        }

        .grammar-table.simple th,
        .grammar-table.rich thead th{
            padding:.62rem .74rem;
            background:#f8fafc;
            color:#0f172a;
            font-size:.72rem;
            font-weight:900;
            letter-spacing:.04em;
            text-transform:uppercase;
            text-align:left;
        }

        .dark .grammar-table.simple th,
        .dark .grammar-table.rich thead th{
            background:#1e293b;
            color:#f8fafc;
        }

        .grammar-table.simple td,
        .grammar-table.rich tbody td{
            padding:.62rem .74rem;
            background:#ffffff;
            color:#334155;
            font-size:.84rem;
            line-height:1.45;
            font-weight:700;
            text-align:left;
            vertical-align:top;
            overflow-wrap:anywhere;
        }

        .dark .grammar-table.simple td,
        .dark .grammar-table.rich tbody td{
            background: rgba(15,23,42,.92);
            color:#e2e8f0;
        }

        .grammar-table th:last-child,
        .grammar-table td:last-child{
            border-right:none;
        }

        .grammar-table tbody tr:last-child td{
            border-bottom:none;
        }

        .grammar-table.simple tbody td:first-child,
        .grammar-table.rich tbody td:first-child{
            font-weight:900;
            color:#0f172a;
            background:#f8fafc;
        }

        .dark .grammar-table.simple tbody td:first-child,
        .dark .grammar-table.rich tbody td:first-child{
            color:#f8fafc;
            background:#172033;
        }

        .grammar-table.rich{
            table-layout:fixed;
        }

        .grammar-table.rich thead th:first-child,
        .grammar-table.rich tbody td:first-child{
            width:18%;
        }

        .grammar-table.rich thead th:nth-child(2),
        .grammar-table.rich tbody td:nth-child(2){
            width:28%;
            white-space:nowrap;
        }

        .grammar-table.rich thead th:nth-child(3),
        .grammar-table.rich tbody td:nth-child(3){
            width:54%;
        }

        .grammar-table.is-large.simple th,
        .grammar-table.is-large.rich thead th{
            padding:.8rem .95rem;
            font-size:.82rem;
        }

        .grammar-table.is-large.simple td,
        .grammar-table.is-large.rich tbody td{
            padding:.82rem .95rem;
            font-size:.96rem;
            line-height:1.52;
        }

        .grammar-table.is-large.rich thead th:first-child,
        .grammar-table.is-large.rich tbody td:first-child{
            width:20%;
        }

        .grammar-table.is-large.rich thead th:nth-child(2),
        .grammar-table.is-large.rich tbody td:nth-child(2){
            width:32%;
        }

        .grammar-table.is-large.rich thead th:nth-child(3),
        .grammar-table.is-large.rich tbody td:nth-child(3){
            width:48%;
        }

        .grammar-table.is-xlarge.simple th,
        .grammar-table.is-xlarge.rich thead th{
            padding: .95rem 1.1rem;
            font-size: .92rem;
        }

        .grammar-table.is-xlarge.simple td,
        .grammar-table.is-xlarge.rich tbody td{
            padding: 1rem 1.1rem;
            font-size: 1.05rem;
            line-height: 1.58;
        }

        .table-mobile-stack{
            display:grid;
            gap:.55rem;
            margin-top:.3rem;
        }

        .table-mobile-card{
            overflow:hidden;
            border-radius:14px;
            border:1px solid rgba(217,226,241,.95);
            background: rgba(255,255,255,.96);
        }

        .dark .table-mobile-card{
            border-color: rgba(71,85,105,.84);
            background: rgba(15,23,42,.9);
        }

        .table-mobile-lead{
            display:flex;
            align-items:baseline;
            justify-content:space-between;
            gap:.65rem;
            padding:.55rem .65rem;
            background:#f8fafc;
            border-bottom:1px solid rgba(217,226,241,.95);
        }

        .dark .table-mobile-lead{
            background:#1e293b;
            border-bottom-color: rgba(71,85,105,.84);
        }

        .table-mobile-kicker,
        .table-mobile-label{
            font-size:.58rem;
            line-height:1.1;
            font-weight:900;
            letter-spacing:.05em;
            text-transform:uppercase;
            color:#64748b;
        }

        .dark .table-mobile-kicker,
        .dark .table-mobile-label{
            color:#94a3b8;
        }

        .table-mobile-lead-value{
            font-size:.76rem;
            line-height:1.2;
            font-weight:900;
            color:#0f172a;
            text-align:right;
        }

        .dark .table-mobile-lead-value{
            color:#f8fafc;
        }

        .table-mobile-pair{
            display:grid;
            grid-template-columns:minmax(0,.95fr) minmax(0,1.55fr);
            gap:.45rem;
            padding:.46rem .65rem;
            border-top:1px solid rgba(217,226,241,.95);
        }

        .dark .table-mobile-pair{
            border-top-color: rgba(71,85,105,.84);
        }

        .table-mobile-content{
            min-width:0;
            font-size:.72rem;
            line-height:1.34;
            font-weight:800;
            color:#334155;
            overflow-wrap:anywhere;
        }

        .dark .table-mobile-content{
            color:#e2e8f0;
        }

        .hl-gold{
            background: linear-gradient(135deg, #f97316 0%, #f59e0b 55%, #facc15 100%);
            -webkit-background-clip:text;
            background-clip:text;
            color:transparent !important;
        }

        .hl-red{
            color: var(--g-danger) !important;
        }

        .hl-blue{
            color: #60a5fa !important;
        }

        .play-hit { -webkit-tap-highlight-color: transparent; }
        .play-hit:focus-visible { outline: none; }

        .audio-btn {
            position: relative;
            overflow: hidden;
        }

        .audio-btn .static-icon {
            display: block;
        }

        .audio-btn .wave-wrap {
            display: none;
            align-items: center;
            justify-content: center;
            gap: 2px;
            height: 16px;
        }

        .audio-btn .wave-bar {
            width: 3px;
            height: 8px;
            background: currentColor;
            border-radius: 999px;
        }

        .audio-btn.speaking .static-icon {
            display: none;
        }

        .audio-btn.speaking .wave-wrap {
            display: inline-flex;
        }

        .audio-btn.speaking .wave-bar:nth-child(1) {
            animation: waveBounce 0.7s ease-in-out infinite;
        }

        .audio-btn.speaking .wave-bar:nth-child(2) {
            animation: waveBounce 0.7s ease-in-out 0.12s infinite;
        }

        .audio-btn.speaking .wave-bar:nth-child(3) {
            animation: waveBounce 0.7s ease-in-out 0.24s infinite;
        }

        .audio-inline{
            display:flex;
            align-items:flex-start;
            justify-content:space-between;
            gap:.65rem;
        }

        .audio-inline-text{
            min-width:0;
            flex:1;
        }

        .audio-inline .audio-btn{
            flex:none;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            width:2.25rem;
            height:2.25rem;
            border-radius:999px;
            background:linear-gradient(to bottom right, rgba(99,102,241,.8), rgba(139,92,246,.8), rgba(59,130,246,.8));
            color:#fff;
            backdrop-filter:blur(8px);
            border:1px solid rgba(255,255,255,.25);
            box-shadow:0 10px 24px rgba(49,46,129,.18);
        }

        .dark .audio-inline .audio-btn{
            box-shadow:0 10px 24px rgba(15,23,42,.35);
        }

        @keyframes waveBounce {
            0%, 100% {
                height: 7px;
                opacity: 0.7;
            }
            50% {
                height: 16px;
                opacity: 1;
            }
        }

        @media (max-width: 1024px){
            .stack-on-tablet{
                grid-template-columns:1fr;
            }
        }

        @media (max-width: 640px){
            .glass-shell{
                border-radius:22px;
            }

            .mini-card{
                border-radius:18px;
            }

            .section-heading{
                font-size:1.12rem;
            }

            .example-item{
                font-size:.92rem;
                line-height:1.5;
            }
        }

        @media (max-width: 1400px) and (max-height: 820px){
            .grammar-table.simple th,
            .grammar-table.simple td{
                padding:.48rem .58rem;
                font-size:.76rem;
                line-height:1.32;
            }

            .grammar-table.rich thead th{
                padding:.48rem .58rem;
                font-size:.62rem;
            }

            .grammar-table.rich tbody td{
                padding:.48rem .58rem;
                font-size:.74rem;
                line-height:1.3;
            }

            .grammar-table.is-large.simple th,
            .grammar-table.is-large.rich thead th{
                padding:.58rem .7rem;
                font-size:.7rem;
            }

            .grammar-table.is-large.simple td,
            .grammar-table.is-large.rich tbody td{
                padding:.6rem .7rem;
                font-size:.82rem;
                line-height:1.38;
            }

            .section-heading{
                font-size:1.12rem;
            }

            .example-item{
                font-size:.84rem;
                line-height:1.4;
            }
        }
    </style>
@endsection

@section('content')
    <main class="grammar-page {{ $themeClass }} w-full min-h-[100dvh]">
        <div class="mx-auto w-full {{ $centerShell ? 'max-w-6xl' : 'max-w-7xl' }} px-4 sm:px-6 lg:px-8 py-6 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <header class="{{ $headerWrapClass }}">
                    <h1 class="{{ $titleClass }}">
                        <span class="{{ $titleGradientClass }} bg-clip-text text-transparent">
                            {{ $pageHeading }}
                        </span>
                    </h1>

                    @if($pageSubtitle !== '')
                        <p class="{{ $subtitleClass }}">
                            {{ $pageSubtitle }}
                        </p>
                    @endif
                </header>

                <section class="glass-shell p-2.5 sm:p-3.5 lg:p-4">
                    <div class="{{ $cardsGridClass }}">
                        @foreach($cards as $card)
                            @php
                                $type = trim((string)($card['type'] ?? 'examples'));
                                $badgeClass = trim((string)($card['badge_class'] ?? 'badge-positive'));
                                $cardTitle = trim((string)($card['title'] ?? ''));
                                $cardClass = trim((string)($card['card_class'] ?? ''));
                                $intro = (string)($card['intro'] ?? '');
                                $examples = is_array($card['examples'] ?? null) ? $card['examples'] : [];
                                $highlightClass = trim((string)($card['highlight_class'] ?? ''));
                                $tableHeaders = is_array($card['table_headers'] ?? null) ? $card['table_headers'] : [];
                                $tableRows = is_array($card['table_rows'] ?? null) ? $card['table_rows'] : [];
                                $sections = is_array($card['sections'] ?? null) ? $card['sections'] : [];
                                $tableVariant = trim((string)($card['table_variant'] ?? 'simple'));
                                $tableSize = trim((string)($card['table_size'] ?? ''));
                                $exampleMarker = trim((string)($card['example_marker'] ?? 'check'));
                            @endphp

                            @if($useCardWrapper)
                                <div class="{{ trim('mini-card p-2.5 sm:p-3 ' . $cardClass) }}">
                                    @elseif($cardClass !== '')
                                        <div class="{{ $cardClass }}">
                                            @endif

                                            @if($cardTitle !== '')
                                                <div class="inline-flex items-center rounded-full {{ $badgeClass }}">
                                                    {{ $cardTitle }}
                                                </div>
                                            @endif

                                            @if($type === 'sections')
                                                <div class="mt-3.5">
                                                    @foreach($sections as $section)
                                                        @php
                                                            $items = is_array($section['items'] ?? null) ? $section['items'] : [];
                                                        @endphp
                                                        <div class="section-block">
                                                            <h2 class="section-heading">{!! $section['heading'] ?? '' !!}</h2>

                                                            <div class="example-list">
                                                                @foreach($items as $item)
                                                                    <div class="example-item">
                                                                        <span class="example-mark-dot"></span>
                                                                        <span>{!! $item !!}</span>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                @if($intro !== '')
                                                    <h2 class="mt-3.5 text-lg sm:text-xl lg:text-[1.22rem] font-black tracking-[-0.03em] leading-[1.35] text-slate-900 dark:text-slate-50">
                                                        {!! $intro !!}
                                                    </h2>
                                                @endif

                                                @if($type === 'table')
                                                    <div class="hidden sm:block {{ $tableVariant === 'rich' ? 'table-shell' : 'grammar-table-wrap' }}">
                                                        @if($tableVariant === 'rich')
                                                            <div class="table-wrap">
                                                                @endif

                                                                <table class="grammar-table {{ $tableVariant === 'rich' ? 'rich' : 'simple' }}{{ $tableSize === 'large' ? ' is-large' : '' }}{{ $tableSize === 'xlarge' ? ' is-xlarge' : '' }}">
                                                                    @if(!empty($tableHeaders))
                                                                        <thead>
                                                                        <tr>
                                                                            @foreach($tableHeaders as $header)
                                                                                <th>{{ $header }}</th>
                                                                            @endforeach
                                                                        </tr>
                                                                        </thead>
                                                                    @endif

                                                                    <tbody>
                                                                    @foreach($tableRows as $row)
                                                                        <tr>
                                                                            @foreach($row as $cell)
                                                                                @php
                                                                                    $cellText = is_array($cell) ? (string)($cell['text'] ?? '') : (string)$cell;
                                                                                    $cellSound = is_array($cell) ? trim((string)($cell['sound'] ?? '')) : '';
                                                                                    $cellSpeech = is_array($cell) ? trim((string)($cell['speech'] ?? '')) : '';
                                                                                @endphp
                                                                                <td>
                                                                                    @if($cellSound !== '' || $cellSpeech !== '')
                                                                                        <div class="audio-inline">
                                                                                            <span class="audio-inline-text">{!! $cellText !!}</span>
                                                                                            <button
                                                                                                type="button"
                                                                                                class="audio-btn play-hit"
                                                                                                aria-label="{{ $playLabel }}"
                                                                                                @if($cellSound !== '') data-sound="{{ $cellSound }}" @endif
                                                                                                @if($cellSpeech !== '') data-speech="{{ $cellSpeech }}" @endif
                                                                                            >
                                                                                                <svg class="static-icon w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                                                                    <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                                                                </svg>
                                                                                                <span class="wave-wrap" aria-hidden="true">
                                                                                                    <span class="wave-bar"></span>
                                                                                                    <span class="wave-bar"></span>
                                                                                                    <span class="wave-bar"></span>
                                                                                                </span>
                                                                                            </button>
                                                                                        </div>
                                                                                    @else
                                                                                        {!! $cellText !!}
                                                                                    @endif
                                                                                </td>
                                                                            @endforeach
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>

                                                                @if($tableVariant === 'rich')
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="table-mobile-stack sm:hidden">
                                                        @foreach($tableRows as $row)
                                                            @php
                                                                $leadValueRaw = $row[0] ?? '';
                                                                $leadValue = is_array($leadValueRaw) ? (string)($leadValueRaw['text'] ?? '') : $leadValueRaw;
                                                                $remainingCells = array_slice($row, 1);
                                                                $remainingHeaders = !empty($tableHeaders) ? array_slice($tableHeaders, 1) : [];
                                                            @endphp

                                                            <div class="table-mobile-card">
                                                                @if(!empty($tableHeaders) && $leadValue !== '')
                                                                    <div class="table-mobile-lead">
                                                                        <span class="table-mobile-kicker">{{ $tableHeaders[0] }}</span>
                                                                        <span class="table-mobile-lead-value">{!! $leadValue !!}</span>
                                                                    </div>
                                                                @endif

                                                                @foreach($remainingCells as $index => $cell)
                                                                    @php
                                                                        $cellText = is_array($cell) ? (string)($cell['text'] ?? '') : (string)$cell;
                                                                        $cellSound = is_array($cell) ? trim((string)($cell['sound'] ?? '')) : '';
                                                                        $cellSpeech = is_array($cell) ? trim((string)($cell['speech'] ?? '')) : '';
                                                                    @endphp
                                                                    <div class="table-mobile-pair">
                                                                        <span class="table-mobile-label">{{ $remainingHeaders[$index] ?? ('Column ' . ($index + 2)) }}</span>
                                                                        <span class="table-mobile-content">
                                                                            @if($cellSound !== '' || $cellSpeech !== '')
                                                                                <span class="audio-inline">
                                                                                    <span class="audio-inline-text">{!! $cellText !!}</span>
                                                                                    <button
                                                                                        type="button"
                                                                                        class="audio-btn play-hit"
                                                                                        aria-label="{{ $playLabel }}"
                                                                                        @if($cellSound !== '') data-sound="{{ $cellSound }}" @endif
                                                                                        @if($cellSpeech !== '') data-speech="{{ $cellSpeech }}" @endif
                                                                                    >
                                                                                        <svg class="static-icon w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                                                        </svg>
                                                                                        <span class="wave-wrap" aria-hidden="true">
                                                                                            <span class="wave-bar"></span>
                                                                                            <span class="wave-bar"></span>
                                                                                            <span class="wave-bar"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                </span>
                                                                            @else
                                                                                {!! $cellText !!}
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="mt-3.5 grid gap-2.5">
                                                        @foreach($examples as $example)
                                                            <div class="example-item">
                                                                @if($exampleMarker === 'dot')
                                                                    <span class="example-mark-dot"></span>
                                                                @elseif($exampleMarker === 'bullet')
                                                                    <span class="example-mark-bullet">•</span>
                                                                @else
                                                                    <span class="example-mark-check">✓</span>
                                                                @endif

                                                                <span>
                                                    {!! $example['subject'] ?? '' !!}<span class="{{ $highlightClass }}">{!! $example['highlight'] ?? '' !!}</span>{!! $example['rest'] ?? '' !!}
                                                </span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endif

                                            @if($useCardWrapper)
                                        </div>
                                    @elseif($cardClass !== '')
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            const KEY = "__BEC_GLOBAL_SLIDER_AUDIO__";

            if (!window[KEY]) {
                const audio = new Audio();
                audio.preload = "auto";
                audio.crossOrigin = "anonymous";

                const synth = "speechSynthesis" in window ? window.speechSynthesis : null;
                let activeButton = null;
                let activeMode = null;

                function setSpeaking(button, isSpeaking) {
                    if (!button) return;
                    button.classList.toggle("speaking", isSpeaking);
                }

                function clearActive() {
                    if (activeButton) {
                        setSpeaking(activeButton, false);
                        activeButton = null;
                        activeMode = null;
                    }
                }

                function stop() {
                    try {
                        audio.pause();
                        audio.currentTime = 0;
                    } catch (e) {}

                    if (synth) {
                        try { synth.cancel(); } catch (e) {}
                    }

                    clearActive();
                }

                function play(src, button) {
                    if (!src) return;

                    const resolved = new URL(src, window.location.href).toString();

                    if (activeButton === button && activeMode === "audio" && !audio.paused && audio.src === resolved) {
                        stop();
                        return;
                    }

                    stop();

                    try {
                        if (audio.src !== resolved) audio.src = resolved;
                        audio.currentTime = 0;
                        activeButton = button;
                        activeMode = "audio";
                        setSpeaking(activeButton, true);

                        const p = audio.play();
                        if (p && typeof p.catch === "function") {
                            p.catch(() => stop());
                        }
                    } catch (e) {
                        stop();
                    }
                }

                function speak(text, button) {
                    if (!synth || !text) return;

                    if (activeButton === button && activeMode === "speech") {
                        stop();
                        return;
                    }

                    stop();

                    try {
                        const utterance = new SpeechSynthesisUtterance(text);
                        utterance.onend = () => clearActive();
                        utterance.onerror = () => stop();
                        activeButton = button;
                        activeMode = "speech";
                        setSpeaking(activeButton, true);
                        synth.speak(utterance);
                    } catch (e) {
                        stop();
                    }
                }

                audio.addEventListener("ended", stop);
                audio.addEventListener("pause", () => {
                    if (audio.currentTime === 0 || audio.ended) {
                        clearActive();
                    }
                });
                audio.addEventListener("error", stop);

                window[KEY] = { audio, play, speak, stop };
            }

            window.stopSlideAudio = function () {
                window[KEY].stop();
            };

            if (!window.__BEC_AUDIO_DELEGATE__) {
                window.__BEC_AUDIO_DELEGATE__ = true;

                document.addEventListener("click", (e) => {
                    const btn = e.target.closest(".audio-btn");
                    if (!btn) return;

                    e.preventDefault();
                    const src = btn.dataset.sound || "";
                    const speech = btn.dataset.speech || "";

                    if (src) {
                        window[KEY].play(src, btn);
                    } else if (speech) {
                        window[KEY].speak(speech, btn);
                    }
                });
            }
        })();
    </script>
@endsection
