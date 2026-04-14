@extends('slider.simple-layout')

@section('style')
    <style>
        :root{
            --pool-safe-space: 300px;
        }

        @keyframes popIn {
            0% { transform: scale(.96); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes shake {
            0%,100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }

        @keyframes waveGrowth {
            0%,100% { height: 7px; }
            50% { height: 15px; }
        }

        #ddShell,
        #ddShell *{
            user-select: none;
            -webkit-user-select: none;
            -webkit-touch-callout: none;
        }

        body.dragging-active {
            overflow: hidden !important;
            touch-action: none !important;
            overscroll-behavior: none !important;
        }

        .dragging {
            position: fixed !important;
            pointer-events: none !important;
            z-index: 9999 !important;
            cursor: grabbing !important;
            transition: none !important;
            will-change: left, top, transform;
        }

        .returning {
            transition:
                    top .36s cubic-bezier(.23,1,.32,1),
                    left .36s cubic-bezier(.23,1,.32,1),
                    transform .36s;
            z-index: 9000;
        }

        .shake { animation: shake .35s ease-in-out; }
        .locked-pop { animation: popIn .28s cubic-bezier(.175,.885,.32,1.275); }

        .word-tile {
            touch-action: none;
            user-select: none;
            -webkit-user-select: none;
            -webkit-touch-callout: none;
        }

        .play-hit {
            -webkit-tap-highlight-color: transparent;
        }

        .play-hit:focus-visible {
            outline: none;
        }

        .game-btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            border-radius:.5rem;
            padding:.375rem .75rem;
            font-size:.75rem;
            font-weight:900;
            transition:transform .2s ease, box-shadow .2s ease, background .2s ease, opacity .2s ease;
        }

        .ddt-btn-primary{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            border-radius:.5rem;
            padding:.375rem .75rem;
            font-size:.75rem;
            font-weight:900;
            color:#fff;
            border:1px solid rgba(255,255,255,.2);
            background:linear-gradient(135deg, #9333ea, #4f46e5, #2563eb);
            box-shadow:0 10px 24px rgba(79,70,229,.10);
            transition:transform .2s ease, box-shadow .2s ease, opacity .2s ease;
        }

        .game-btn:hover,
        .ddt-btn-primary:hover{
            transform:scale(1.05);
        }

        .game-btn:active,
        .ddt-btn-primary:active{
            transform:scale(.98);
        }

        .ddt-btn-reveal{
            color:rgb(154 52 18);
            border-color:rgb(253 186 116);
            background:rgb(255 237 213);
            box-shadow:0 8px 22px rgba(234,88,12,.10);
        }

        .ddt-btn-reveal:hover{
            background:rgb(254 215 170);
            box-shadow:0 10px 24px rgba(234,88,12,.14);
        }

        .ddt-btn-secondary{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            border-radius:.5rem;
            padding:.375rem .75rem;
            font-size:.75rem;
            font-weight:900;
            color:rgb(15 23 42);
            border:1px solid rgb(226 232 240);
            background:#fff;
            box-shadow:0 8px 22px rgba(2,6,23,.05);
            transition:transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease;
        }

        .ddt-btn-secondary:hover{
            transform:scale(1.05);
            background:rgb(248 250 252);
        }

        .ddt-btn-secondary:active{
            transform:scale(.98);
        }

        .dark .ddt-btn-secondary{
            color:#fff;
            border-color:rgb(51 65 85);
            background:rgb(30 41 59);
        }

        .dark .ddt-btn-secondary:hover{
            background:rgb(51 65 85);
        }

        .ddt-btn-script{
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            box-shadow: 0 10px 24px rgba(59,130,246,.14);
        }

        .ddt-btn-script:hover{
            box-shadow: 0 12px 28px rgba(59,130,246,.20);
        }

        .dark .ddt-btn-reveal{
            color:rgb(254 215 170);
            border-color:rgba(194, 65, 12, .45);
            background:rgba(154, 52, 18, .35);
        }

        .dark .ddt-btn-reveal:hover{
            background:rgba(154, 52, 18, .5);
        }

        .ddt-modal-close{
            display:inline-flex;
            height:2.9rem;
            width:2.9rem;
            align-items:center;
            justify-content:center;
            border-radius:.9rem;
            border:1px solid rgba(251,146,60,.35);
            background:rgba(255,237,213,.95);
            color:#c2410c;
            box-shadow:0 8px 22px rgba(234,88,12,.10);
            transition:background-color .18s ease, border-color .18s ease, color .18s ease, transform .18s ease, box-shadow .18s ease;
        }

        .ddt-modal-close:hover{
            background:rgb(254 215 170);
            border-color:rgb(253 186 116);
            color:#9a3412;
            transform:scale(1.04);
            box-shadow:0 10px 24px rgba(234,88,12,.14);
        }

        .dark .ddt-modal-close{
            border-color:rgba(194,65,12,.45);
            background:rgba(154,52,18,.35);
            color:rgb(254 215 170);
            box-shadow:0 8px 22px rgba(120,53,15,.16);
        }

        .dark .ddt-modal-close:hover{
            background:rgba(154,52,18,.5);
            color:rgb(254 237 213);
        }

        .wave-bar{
            display:none;
            width:3px;
            height:10px;
            background:currentColor;
            border-radius:999px;
            margin:0 1px;
        }

        .audio-listen-btn.playing .wave-bar{
            display:block;
            animation:waveGrowth .6s infinite ease-in-out;
        }

        .audio-listen-btn.playing .static-icon{
            display:none;
        }

        .ddt-native-audio{
            display:none;
        }

        .ddt-audio-track{
            position:relative;
            height:10px;
            width:100%;
            border-radius:999px;
            overflow:hidden;
            background:rgba(199,210,254,0.55);
        }

        .dark .ddt-audio-track{
            background:rgba(99,102,241,0.25);
        }

        .ddt-audio-fill{
            height:100%;
            width:0%;
            border-radius:999px;
            background:linear-gradient(90deg, #4f46e5 0%, #8b5cf6 100%);
        }

        .ddt-audio-knob{
            position:absolute;
            top:50%;
            transform:translate(-50%, -50%);
            width:14px;
            height:14px;
            border-radius:9999px;
            background:white;
            border:2px solid #4f46e5;
            box-shadow:0 6px 14px rgba(2,6,23,0.18);
            left:0%;
            pointer-events:none;
        }

        .dropzone.active-drop {
            box-shadow: 0 0 0 4px rgba(99,102,241,.16);
            border-color: rgba(99,102,241,.32);
            transform: translateY(-1px);
        }

        .table-head-chip{
            border-radius: 1.15rem;
            border: 1px solid rgba(110,231,183,.55);
            background: linear-gradient(135deg, rgba(16,185,129,.92), rgba(6,182,212,.88));
            box-shadow: 0 14px 28px -20px rgba(13,148,136,.45);
            backdrop-filter: blur(14px);
        }

        .dark .table-head-chip{
            border-color: rgba(45,212,191,.22);
            background: linear-gradient(135deg, rgba(13,148,136,.78), rgba(8,145,178,.74));
        }

        .table-place-panel{
            border-radius: 1.1rem;
            border: 1px solid rgba(199,210,254,.7);
            background: linear-gradient(135deg, rgba(79,70,229,.92), rgba(59,130,246,.88));
            box-shadow: 0 14px 28px -22px rgba(79,70,229,.55);
        }

        .dark .table-place-panel{
            border-color: rgba(129,140,248,.22);
            box-shadow: none;
        }

        .table-corner-panel{
            border-color: rgba(196,181,253,.5);
            background: linear-gradient(135deg, rgba(147,51,234,.95), rgba(99,102,241,.9));
            box-shadow: 0 14px 28px -22px rgba(109,40,217,.48);
        }

        .dark .table-corner-panel{
            border-color: rgba(167,139,250,.3);
            background: linear-gradient(135deg, rgba(107,33,168,.88), rgba(79,70,229,.82));
            box-shadow: none;
        }

        .table-cell-shell{
            border-radius: 1rem;
            border: 1px solid rgba(226,232,240,.82);
            background: rgba(255,255,255,.42);
            backdrop-filter: blur(10px);
        }

        .dark .table-cell-shell{
            border-color: rgba(71,85,105,.62);
            background: rgba(15,23,42,.18);
        }

        .table-mobile-chip{
            border-radius: 999px;
            background: rgba(226,232,240,.78);
        }

        .dark .table-mobile-chip{
            background: rgba(30,41,59,.82);
        }

        .table-dropzone{
            min-height: 50px;
            width: 100%;
            align-items: flex-start;
        }

        .table-dropzone .empty-state{
            min-height: 30px;
        }

        .table-dropzone .word-tile{
            max-width: 100%;
            flex: 0 1 auto;
            white-space: normal;
            overflow-wrap: anywhere;
            word-break: break-word;
        }

        .mobile-row-nav{
            display: none;
        }

        .mobile-row-tabs{
            display: flex;
            gap: .55rem;
            overflow-x: auto;
            padding-bottom: .1rem;
            scrollbar-width: none;
        }

        .mobile-row-tabs::-webkit-scrollbar{
            display: none;
        }

        .mobile-row-tab{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .4rem;
            min-width: max-content;
            border-radius: 999px;
            border: 1px solid rgba(165,180,252,.5);
            background: rgba(255,255,255,.88);
            color: rgb(51 65 85);
            padding: .55rem .9rem;
            font-size: .7rem;
            font-weight: 900;
            letter-spacing: .08em;
            text-transform: uppercase;
            box-shadow: 0 10px 24px rgba(15,23,42,.08);
            transition: transform .18s ease, background .18s ease, color .18s ease, border-color .18s ease, box-shadow .18s ease;
        }

        .mobile-row-tab.is-active{
            border-color: rgba(79,70,229,.65);
            background: linear-gradient(135deg, rgba(79,70,229,.96), rgba(59,130,246,.94));
            color: #fff;
            box-shadow: 0 14px 28px rgba(79,70,229,.18);
        }

        .mobile-row-status{
            border-radius: 999px;
            border: 1px solid rgba(226,232,240,.85);
            background: rgba(255,255,255,.8);
            padding: .35rem .7rem;
            font-size: .65rem;
            font-weight: 900;
            color: rgb(71 85 105);
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .dark .mobile-row-tab{
            border-color: rgba(99,102,241,.28);
            background: rgba(15,23,42,.78);
            color: rgb(226 232 240);
        }

        .dark .mobile-row-tab.is-active{
            border-color: rgba(129,140,248,.55);
            color: #fff;
        }

        .dark .mobile-row-status{
            border-color: rgba(71,85,105,.8);
            background: rgba(15,23,42,.72);
            color: rgb(203 213 225);
        }

        .table-scroll-shell{
            border-radius: 2rem;
            border: 1px solid rgba(226,232,240,.82);
            background: rgba(255,255,255,.7);
            box-shadow: 0 20px 48px rgba(2,6,23,.08);
            backdrop-filter: blur(18px);
            overflow-x: auto;
        }

        .dark .table-scroll-shell{
            border-color: rgba(71,85,105,.72);
            background: rgba(2,6,23,.34);
        }

        .dd-table{
            width: 100%;
            min-width: 0;
            table-layout: fixed;
            border-collapse: separate;
            border-spacing: 0;
        }

        .dd-table thead th{
            position: sticky;
            top: 0;
            z-index: 2;
            padding: .9rem .75rem;
            background: rgba(248,250,252,.96);
            backdrop-filter: blur(16px);
        }

        .dark .dd-table thead th{
            background: rgba(15,23,42,.94);
        }

        .dd-table tbody th,
        .dd-table tbody td{
            padding: .85rem;
            vertical-align: top;
            border-top: 1px solid rgba(226,232,240,.72);
        }

        .dd-table tbody th{
            min-width: 220px;
            width: 220px;
        }

        .dd-table tbody td{
            min-width: 220px;
            width: 220px;
            overflow: hidden;
        }

        .dark .dd-table tbody th,
        .dark .dd-table tbody td{
            border-top-color: rgba(71,85,105,.62);
        }

        .table-corner-head{
            min-width: 220px;
            width: 220px;
        }

        .table-column-title{
            min-width: 220px;
            width: 220px;
        }

        .revealed-answer{
            background: #f43f5e !important;
            color: #ffffff !important;
            border-color: rgba(255,255,255,.22) !important;
            box-shadow: 0 0 0 2px rgba(148,163,184,.24);
        }

        @media (min-width: 1280px){
            #ddGameColumn{
                width: var(--dd-game-width, 76%);
                max-width: var(--dd-game-width, 76%);
                flex: none;
            }

            #poolBar{
                width: var(--dd-pool-width, 24%);
                max-width: var(--dd-pool-width, 24%);
                flex: none;
            }
        }

        @media (min-width: 1280px) {
            .table-dropzone{
                min-height: 54px;
            }

            .dd-table tbody th,
            .table-corner-head{
                min-width: 250px;
                width: 250px;
            }

            .dd-table tbody td,
            .table-column-title{
                min-width: 250px;
                width: 250px;
            }
        }

        @media (max-width: 1279.98px) {
            #ddbWordBankPanel {
                max-height: min(35vh, 310px);
            }

            #poolContent {
                max-height: calc(min(35vh, 310px) - 112px);
                overflow-y: auto;
                overflow-x: hidden;
                align-content: start;
            }
        }

        @media (max-width: 1023.98px) {
            .mobile-row-nav{
                display: grid;
                gap: .7rem;
            }

            .table-scroll-shell{
                overflow: visible;
                border: 0;
                background: transparent;
                box-shadow: none;
                backdrop-filter: none;
            }

            .dd-table,
            .dd-table tbody,
            .dd-table tr,
            .dd-table th,
            .dd-table td{
                display: block;
                width: 100%;
            }

            .dd-table{
                min-width: 0;
            }

            .dd-table thead{
                display: none;
            }

            .dd-table tbody{
                display: grid;
                gap: .65rem;
            }

            .dd-table .table-row{
                border-radius: 1.15rem;
                border: 1px solid rgba(226,232,240,.85);
                background: rgba(255,255,255,.72);
                box-shadow: 0 12px 26px rgba(15,23,42,.07);
                padding: .6rem;
                backdrop-filter: blur(14px);
            }

            .dark .dd-table .table-row{
                border-color: rgba(71,85,105,.72);
                background: rgba(2,6,23,.38);
                box-shadow: none;
            }

            .dd-table .table-row.mobile-row-hidden{
                display: none;
            }

            .dd-table tbody th,
            .dd-table tbody td{
                min-width: 0;
                width: 100%;
                padding: 0;
                border-top: 0;
            }

            .dd-table tbody th{
                margin-bottom: .48rem;
            }

            .dd-table tbody td + td{
                margin-top: .42rem;
            }

            .table-place-panel{
                border-radius: 1rem;
            }

            .table-cell-shell{
                border-radius: .95rem;
            }
        }

        @media (max-width: 640px) {
            .word-tile {
                min-height: 34px !important;
                font-size: 10px !important;
                line-height: 1 !important;
                padding: .4rem .52rem !important;
                border-radius: .75rem !important;
            }

            .table-dropzone{
                min-height: 44px;
            }

            .dd-table thead th{
                padding: .7rem .55rem;
            }

            .dd-table tbody th,
            .dd-table tbody td{
                padding: .6rem;
            }

            .mobile-row-nav{
                gap: .55rem;
            }

            .mobile-row-tab{
                padding: .48rem .78rem;
                font-size: .62rem;
            }

            .mobile-row-status{
                padding: .28rem .58rem;
                font-size: .58rem;
            }

            .dd-table .table-row{
                padding: .5rem;
                border-radius: 1rem;
            }

            .table-place-panel{
                padding: .55rem !important;
            }

            .table-cell-shell{
                padding: .45rem !important;
            }

            .table-dropzone{
                min-height: 40px;
                padding: .45rem !important;
                gap: .35rem !important;
            }

            .empty-state{
                min-height: 24px !important;
                font-size: 8px !important;
                letter-spacing: .14em !important;
            }
        }
    </style>
@endsection

@section('content')
    @php
        $placedByZone = [];
        $itemsForJs = [];
        $desktopGameWidth = (float) ($content['desktop_game_width'] ?? 76);
        $desktopPoolWidth = (float) ($content['desktop_pool_width'] ?? 24);
        $audioPosition = (string) ($content['audio_position'] ?? 'below-stats');
        $audioBelowStats = $audioPosition === 'below-stats';
        $playerAudio = !empty($content['audio']) ? $content['audio'] : (!empty($content['audio_src']) ? $content['audio_src'] : null);
        $rawScript = $content['script'] ?? ($content['audio_transcript'] ?? []);
        $scriptLines = is_array($rawScript)
            ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawScript), static fn ($line) => $line !== ''))
            : array_values(array_filter(
                array_map('trim', preg_split('/(?<=[.!?])\s+/', trim((string) $rawScript)) ?: []),
                static fn ($line) => $line !== ''
            ));
        $hasScript = $scriptLines !== [];
        $rawRows = $content['rows'] ?? $content['places'] ?? [];
        $rawColumns = $content['columns'] ?? $content['phrases'] ?? [];

        $rows = [];
        foreach (array_values($rawRows) as $index => $row) {
            $label = trim((string) ($row['title'] ?? $row['label'] ?? $row['name'] ?? $row['short'] ?? ('Row ' . ($index + 1))));
            $key = trim((string) ($row['key'] ?? ''));

            if ($key === '') {
                $key = \Illuminate\Support\Str::slug($label, '_');
            }

            if ($key === '') {
                $key = 'row_' . ($index + 1);
            }

            $row['key'] = $key;
            $row['label'] = $label;
            $row['short_label'] = trim((string) ($row['short'] ?? $row['short_label'] ?? $label));
            $rows[] = $row;
        }

        $columns = [];
        foreach (array_values($rawColumns) as $index => $column) {
            $label = trim((string) ($column['title'] ?? $column['label'] ?? $column['name'] ?? $column['short'] ?? ('Column ' . ($index + 1))));
            $key = trim((string) ($column['key'] ?? ''));

            if ($key === '') {
                $key = \Illuminate\Support\Str::slug($label, '_');
            }

            if ($key === '') {
                $key = 'column_' . ($index + 1);
            }

            $column['key'] = $key;
            $column['label'] = $label;
            $column['short_label'] = trim((string) ($column['short'] ?? $column['short_label'] ?? $label));
            $columns[] = $column;
        }

        foreach (($content['items'] ?? []) as $index => $item) {
            $key = 'item-' . $index;
            $itemRow = (string) ($item['row'] ?? $item['place'] ?? '');
            $itemColumn = (string) ($item['column'] ?? $item['phrase'] ?? '');
            $zoneKey = $itemRow . '__' . $itemColumn;

            $item['key'] = $key;
            $item['place'] = $itemRow;
            $item['phrase'] = $itemColumn;

            $itemsForJs[] = [
                'key'    => $key,
                'text'   => $item['text'],
                'place'  => $itemRow,
                'phrase' => $itemColumn,
                'placed' => (bool)($item['placed'] ?? false),
            ];

            if (!empty($item['placed'])) {
                $placedByZone[$zoneKey][] = $item;
            }
        }
    @endphp

    <main class="w-full" style="--dd-game-width: {{ $desktopGameWidth }}%; --dd-pool-width: {{ $desktopPoolWidth }}%;">
        @include('slider.components.title-subtitle')

        @if(!empty($playerAudio) && !$audioBelowStats)
            <div class="mx-auto mb-4 w-full max-w-5xl px-4 sm:px-6 lg:px-8">
                <div class="rounded-2xl border border-indigo-100 bg-indigo-50/90 px-3 py-2 shadow-sm dark:border-indigo-700/60 dark:bg-indigo-900/30 sm:px-4 sm:py-3">
                    <div class="flex items-center gap-2.5 sm:gap-3">
                        <button
                                id="ddtPlayAudioBtn"
                                type="button"
                                class="play-hit audio-listen-btn inline-flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-blue-500 text-white shadow-lg shadow-indigo-900/20 transition-all duration-150 active:scale-95 hover:scale-[1.06] focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                                aria-label="Play audio"
                        >
                            <svg class="static-icon h-4 w-4 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8 5v14l11-7-11-7z"/>
                            </svg>

                            <span class="wave-bar" style="animation-delay:.1s"></span>
                            <span class="wave-bar" style="animation-delay:.2s"></span>
                            <span class="wave-bar" style="animation-delay:.3s"></span>
                        </button>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 sm:gap-2.5">
                                <div class="flex-1 min-w-0 flex flex-col gap-1 sm:gap-1.5">
                                    <div class="ddt-audio-track cursor-pointer" id="ddtProgressTrack" aria-label="Audio progress">
                                        <div class="ddt-audio-fill" id="ddtProgressFill"></div>
                                        <div class="ddt-audio-knob" id="ddtProgressKnob"></div>
                                    </div>

                                    <div class="flex justify-between text-[10px] sm:text-[11px] font-extrabold text-indigo-700 dark:text-indigo-200">
                                        <span id="ddtCurrentTime">0:00</span>
                                        <span id="ddtTotalTime">0:00</span>
                                    </div>
                                </div>

                                @if($hasScript)
                                    <button
                                            id="ddtShowScriptBtn"
                                            type="button"
                                            class="ddt-btn-primary ddt-btn-script shrink-0 px-2.5 py-1.5 text-[11px] sm:px-3 sm:text-xs"
                                    >
                                        <span>Script</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <audio id="ddtPromptAudio" class="ddt-native-audio" preload="metadata">
                        <source src="{{ $playerAudio }}" type="audio/mpeg">
                    </audio>
                </div>
            </div>
        @endif
        @include('slider.components.game-status')

        @if(!empty($playerAudio) && $audioBelowStats)
            <div class="mx-auto mb-3 sm:mb-4 w-full max-w-5xl px-4 sm:px-6 lg:px-8">
                <div class="rounded-2xl border border-indigo-100 bg-indigo-50/90 px-3 py-2 shadow-sm dark:border-indigo-700/60 dark:bg-indigo-900/30 sm:px-4 sm:py-3">
                    <div class="flex items-center gap-2.5 sm:gap-3">
                        <button
                                id="ddtPlayAudioBtn"
                                type="button"
                                class="play-hit audio-listen-btn inline-flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-blue-500 text-white shadow-lg shadow-indigo-900/20 transition-all duration-150 active:scale-95 hover:scale-[1.06] focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                                aria-label="Play audio"
                        >
                            <svg class="static-icon h-4 w-4 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8 5v14l11-7-11-7z"/>
                            </svg>

                            <span class="wave-bar" style="animation-delay:.1s"></span>
                            <span class="wave-bar" style="animation-delay:.2s"></span>
                            <span class="wave-bar" style="animation-delay:.3s"></span>
                        </button>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 sm:gap-2.5">
                                <div class="flex-1 min-w-0 flex flex-col gap-1 sm:gap-1.5">
                                    <div class="ddt-audio-track cursor-pointer" id="ddtProgressTrack" aria-label="Audio progress">
                                        <div class="ddt-audio-fill" id="ddtProgressFill"></div>
                                        <div class="ddt-audio-knob" id="ddtProgressKnob"></div>
                                    </div>

                                    <div class="flex justify-between text-[10px] sm:text-[11px] font-extrabold text-indigo-700 dark:text-indigo-200">
                                        <span id="ddtCurrentTime">0:00</span>
                                        <span id="ddtTotalTime">0:00</span>
                                    </div>
                                </div>

                                @if($hasScript)
                                    <button
                                            id="ddtShowScriptBtn"
                                            type="button"
                                            class="ddt-btn-primary ddt-btn-script shrink-0 px-2.5 py-1.5 text-[11px] sm:px-3 sm:text-xs"
                                    >
                                        <span>Script</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <audio id="ddtPromptAudio" class="ddt-native-audio" preload="metadata">
                        <source src="{{ $playerAudio }}" type="audio/mpeg">
                    </audio>
                </div>
            </div>
        @endif

        <div id="ddShell" class="mx-auto flex w-full flex-col px-4 {{ $audioBelowStats && !empty($playerAudio) ? 'pt-4 pb-[calc(min(35vh,310px)+12px)] sm:pt-5 sm:pb-[calc(min(35vh,310px)+16px)]' : 'py-5 pb-[calc(min(35vh,310px)+16px)] sm:py-6 sm:pb-[calc(min(35vh,310px)+20px)]' }} sm:px-6 xl:flex-row xl:items-start xl:justify-center xl:gap-5 lg:px-8 xl:pb-0">
            <section id="ddGameColumn" class="w-full flex-1 flex flex-col">
                <div class="grid place-items-center text-center gap-3 sm:gap-4">
                    <div class="mobile-row-nav w-full max-w-[1520px]">
                        <div class="flex items-center justify-between gap-2">
                            <div class="text-[10px] font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
                                Pick a row
                            </div>
                            <div id="mobileRowStatus" class="mobile-row-status">
                                {{ count($rows) }} rows
                            </div>
                        </div>

                        <div class="mobile-row-tabs">
                            @foreach($rows as $row)
                                <button
                                        type="button"
                                        class="mobile-row-tab"
                                        data-row-key="{{ $row['key'] }}"
                                        data-row-label="{{ $row['label'] }}"
                                >
                                    <span>{{ $row['emoji'] ?? '[]' }}</span>
                                    <span>{{ $row['short_label'] }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="table-scroll-shell w-full max-w-[1520px]">
                        <table class="dd-table" id="categoriesContainer">
                            <thead>
                                <tr>
                                    <th scope="col" class="table-corner-head">
                                        <div class="table-place-panel table-corner-panel p-3 sm:p-3.5 text-left">
                                            <div class="font-black leading-tight text-sm lg:text-[15px] text-white tracking-[-0.01em]">
                                                {{ $content['row_heading'] ?? $content['table_corner_title'] ?? 'Categories' }}
                                            </div>
                                        </div>
                                    </th>
                                    @foreach($columns as $column)
                                        <th scope="col" class="table-column-title">
                                            <div class="table-head-chip px-4 py-2.5 text-center">
                                                <div class="font-black text-white text-sm lg:text-[15px] leading-tight tracking-[-0.02em]">
                                                    {{ $column['label'] }}
                                                </div>
                                            </div>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows as $row)
                                    <tr class="table-row" data-row-key="{{ $row['key'] }}" data-row-label="{{ $row['label'] }}">
                                        <th scope="row">
                                            <div class="table-place-panel p-2.5 sm:p-3 text-left">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-lg sm:text-xl leading-none shrink-0">
                                                        {{ $row['emoji'] ?? '[]' }}
                                                    </span>
                                                    <div class="font-black leading-tight text-[13px] lg:text-sm text-white tracking-[-0.01em]">
                                                        {{ $row['label'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                        @foreach($columns as $column)
                                            @php
                                                $zoneKey = $row['key'] . '__' . $column['key'];
                                                $zoneItems = $placedByZone[$zoneKey] ?? [];
                                            @endphp

                                            <td>
                                                <div class="lg:hidden mb-1.5 text-center">
                                                    <span class="table-mobile-chip inline-flex items-center justify-center px-2.5 py-1 text-[9px] font-black uppercase tracking-[0.16em] text-slate-700 dark:text-slate-200">
                                                        {{ $column['short_label'] }}
                                                    </span>
                                                </div>

                                                <div
                                                        class="dropzone table-dropzone rounded-[1rem] border border-dashed border-slate-200/80 bg-white/40 p-2 sm:p-2.5 flex flex-wrap content-start gap-1.5 dark:border-slate-700/60 dark:bg-slate-900/20"
                                                        data-place="{{ $row['key'] }}"
                                                        data-phrase="{{ $column['key'] }}"
                                                >
                                                    @foreach($zoneItems as $it)
                                                        <div class="word-tile placed-tile locked-pop inline-flex items-center justify-center text-center rounded-xl px-2.5 py-2 sm:px-3 sm:py-2 text-[10px] sm:text-xs font-black text-white shadow-md border border-white/20 bg-gradient-to-br from-indigo-500 to-violet-600">
                                                            {{ $it['text'] }}
                                                        </div>
                                                    @endforeach

                                                    <div class="empty-state {{ !empty($zoneItems) ? 'hidden' : '' }} w-full min-h-[34px] rounded-lg border border-dashed border-slate-200/80 bg-slate-50 text-slate-400 font-extrabold uppercase tracking-[0.18em] text-[9px] grid place-items-center text-center px-2 dark:border-slate-700/60 dark:bg-slate-900/25 dark:text-slate-500">
                                                        Drop here
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('slider.components.game-win-modal')

                    @if($hasScript)
                        <div id="ddtScriptModal" class="hidden fixed inset-0 z-[3000]">
                            <div id="ddtScriptBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

                            <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
                                <div class="relative w-full max-w-3xl max-h-[85dvh] overflow-y-auto rounded-3xl border border-slate-200/70 bg-white/95 shadow-2xl dark:border-slate-700/70 dark:bg-slate-900/95 text-left">
                                    <button
                                            id="ddtCloseScriptBtn"
                                            type="button"
                                            class="ddt-modal-close absolute right-4 top-4 z-10"
                                            aria-label="Close script"
                                    >
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18"/>
                                        </svg>
                                    </button>

                                    <div class="flex items-center justify-between border-b border-slate-200/70 px-4 py-3 pr-16 dark:border-slate-700/70 sm:px-5 sm:py-4 sm:pr-16">
                                        <div class="font-black text-sm text-slate-900 dark:text-slate-50 sm:text-base">
                                            Script
                                        </div>
                                    </div>

                                    <div class="max-h-[70vh] overflow-auto p-3 sm:p-4">
                                        <div class="space-y-2">
                                            @foreach($scriptLines as $i => $line)
                                                <div class="rounded-2xl border border-slate-200/60 bg-white/70 p-2.5 dark:border-slate-700/30 dark:bg-slate-900/20">
                                                    <div class="flex items-start gap-2.5">
                                                        <div class="flex h-7 w-7 items-center justify-center rounded-2xl border border-slate-200/70 bg-white/70 text-xs font-black text-slate-700 dark:border-slate-700/35 dark:bg-slate-900/20 dark:text-slate-200">
                                                            {{ $i + 1 }}
                                                        </div>

                                                        <div class="min-w-0 flex-1">
                                                            <div class="text-xs font-semibold text-slate-700 dark:text-slate-200 sm:text-sm">
                                                                {{ $line }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <template id="tileTpl">
                        <div
                                class="word-tile draggable-item select-none touch-none cursor-grab rounded-xl px-2 py-2 sm:px-2.5 sm:py-2.5 text-base inline-flex min-h-[42px] w-auto max-w-full items-center justify-center text-center leading-snug font-black text-white shadow-[0_10px_20px_rgba(2,6,23,0.16)] border border-white/20 transition-transform duration-150 hover:-translate-y-0.5 active:translate-y-0"
                                style="touch-action:none;"
                        ></div>
                    </template>
                </div>
            </section>

            <div id="poolBar" class="fixed inset-x-0 bottom-0 z-[1500] xl:order-first xl:sticky xl:inset-x-auto xl:top-4 xl:bottom-auto xl:self-start">
                <div class="mx-auto w-full px-3 sm:px-6 xl:px-0 pb-0">
                    <div id="ddbWordBankPanel"
                         class="relative overflow-hidden rounded-t-3xl sm:rounded-3xl border border-slate-200/70 bg-white/90 backdrop-blur-xl shadow-[0_-18px_55px_rgba(2,6,23,0.16)] dark:border-slate-700/60 dark:bg-slate-950/75 xl:rounded-3xl xl:shadow-[0_18px_45px_rgba(2,6,23,0.10)]">
                        <div class="pointer-events-none absolute inset-0 opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.12)_0%,transparent_55%)]"></div>

                        <div class="relative px-3 pt-3 pb-4 sm:px-4 sm:py-4 xl:px-6">
                            <div class="flex items-center justify-center">
                                <div class="h-1.5 w-14 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                            </div>

                            <div class="mt-3 flex items-center justify-between gap-2">
                                <div class="flex items-center gap-2">
                                    <button
                                            id="poolPrevBtn"
                                            type="button"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] xl:hidden"
                                            aria-label="Previous words"
                                    >
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                            <path fill-rule="evenodd" d="M12.79 4.23a.75.75 0 0 1-.02 1.06L8.06 10l4.71 4.71a.75.75 0 1 1-1.06 1.06l-5.24-5.24a.75.75 0 0 1 0-1.06l5.24-5.24a.75.75 0 0 1 1.08-.02Z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>

                                    <div id="poolCount" class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/70 bg-white/80 px-3 py-1.5 text-[10px] sm:text-xs font-black text-slate-700 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100">
                                        0/0
                                    </div>

                                    <button
                                            id="poolNextBtn"
                                            type="button"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] xl:hidden"
                                            aria-label="Next words"
                                    >
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                            <path fill-rule="evenodd" d="M7.21 15.77a.75.75 0 0 1 .02-1.06L11.94 10 7.23 5.29a.75.75 0 0 1 1.06-1.06l5.24 5.24c.3.3.3.77 0 1.06l-5.24 5.24a.75.75 0 0 1-1.08.02Z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>

                                <div class="flex flex-wrap items-center justify-end gap-2">
                                    <button
                                            type="button"
                                            id="revealAnswersBtn"
                                            class="ddt-btn-primary ddt-btn-reveal"
                                    >
                                        Reveal answers
                                    </button>

                                    <button
                                            type="button"
                                            id="retakeTestBtn"
                                            class="ddt-btn-secondary hidden"
                                    >
                                        Retake test
                                    </button>
                                </div>
                            </div>

                            <div class="mt-3 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                            <div class="relative mt-3">
                                <div id="poolContent" class="mx-auto flex w-fit max-w-full flex-wrap items-start justify-start gap-2 sm:gap-2.5 xl:w-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        const ITEMS = @json($itemsForJs);
        const promptAudio = document.getElementById('ddtPromptAudio');
        const playAudioBtn = document.getElementById('ddtPlayAudioBtn');
        const progressTrack = document.getElementById('ddtProgressTrack');
        const showScriptBtn = document.getElementById('ddtShowScriptBtn');
        const scriptModal = document.getElementById('ddtScriptModal');
        const scriptBackdrop = document.getElementById('ddtScriptBackdrop');
        const closeScriptBtn = document.getElementById('ddtCloseScriptBtn');

        const audio = {
            correct: new Audio('/slider/sounds/correct.wav'),
            wrong: new Audio('/slider/sounds/wrong.wav'),
            success: new Audio('/slider/sounds/success.wav'),
        };

        function play(sound) {
            if (sound) {
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }
        }

        function formatPromptTime(seconds) {
            if (!Number.isFinite(seconds) || seconds < 0) seconds = 0;
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${mins}:${String(secs).padStart(2, '0')}`;
        }

        function syncPromptPlayerUI() {
            if (!promptAudio) return;

            const duration = Number.isFinite(promptAudio.duration) ? promptAudio.duration : 0;
            const current = Number.isFinite(promptAudio.currentTime) ? promptAudio.currentTime : 0;
            const pct = duration > 0 ? (current / duration) * 100 : 0;

            const currentTimeEl = document.getElementById('ddtCurrentTime');
            const totalTimeEl = document.getElementById('ddtTotalTime');
            const progressFill = document.getElementById('ddtProgressFill');
            const progressKnob = document.getElementById('ddtProgressKnob');

            if (currentTimeEl) currentTimeEl.textContent = formatPromptTime(current);
            if (totalTimeEl) totalTimeEl.textContent = duration ? formatPromptTime(duration) : '0:00';
            if (progressFill) progressFill.style.width = `${pct}%`;
            if (progressKnob) progressKnob.style.left = `${pct}%`;
            if (playAudioBtn) playAudioBtn.classList.toggle('playing', !promptAudio.paused);
        }

        function isEmbedded() {
            try { return window.top !== window.self; } catch(e) { return true; }
        }

        function goNextSlide() {
            if (isEmbedded()) {
                try { if (window.parent?.nextSlide) { window.parent.nextSlide(); return; } } catch (e) {}
                try { window.parent.postMessage({ type: "BEC_NAV", action: "next" }, "*"); return; } catch (e) {}
            }
        }

        window.stopSlideAudio = function () {
            Object.values(audio).forEach((sound) => {
                sound.pause();
                sound.currentTime = 0;
            });

            if (promptAudio) {
                promptAudio.pause();
                promptAudio.currentTime = 0;
                syncPromptPlayerUI();
            }
        };

        if (playAudioBtn && promptAudio) {
            playAudioBtn.addEventListener('click', () => {
                if (promptAudio.paused) promptAudio.play().catch(() => {});
                else promptAudio.pause();
            });
        }

        if (progressTrack && promptAudio) {
            progressTrack.addEventListener('click', (e) => {
                const rect = e.currentTarget.getBoundingClientRect();
                const x = Math.min(Math.max(0, e.clientX - rect.left), rect.width);
                const ratio = rect.width > 0 ? x / rect.width : 0;

                if (Number.isFinite(promptAudio.duration) && promptAudio.duration > 0) {
                    promptAudio.currentTime = ratio * promptAudio.duration;
                    syncPromptPlayerUI();
                }
            });
        }

        if (promptAudio) {
            promptAudio.preload = 'metadata';
            promptAudio.addEventListener('loadedmetadata', syncPromptPlayerUI);
            promptAudio.addEventListener('timeupdate', syncPromptPlayerUI);
            promptAudio.addEventListener('ended', syncPromptPlayerUI);
            promptAudio.addEventListener('play', syncPromptPlayerUI);
            promptAudio.addEventListener('pause', syncPromptPlayerUI);
        }

        if (showScriptBtn) {
            showScriptBtn.addEventListener('click', () => {
                if (scriptModal) scriptModal.classList.remove('hidden');
            });
        }

        if (closeScriptBtn) {
            closeScriptBtn.addEventListener('click', () => {
                if (scriptModal) scriptModal.classList.add('hidden');
            });
        }

        if (scriptBackdrop) {
            scriptBackdrop.addEventListener('click', () => {
                if (scriptModal) scriptModal.classList.add('hidden');
            });
        }

        function updatePoolSafeSpace() {
            const poolBar = document.getElementById('poolBar');
            const shell = document.getElementById('ddShell');
            if (!poolBar || !shell) return;

            if ((window.innerWidth || 0) >= 1280) {
                shell.style.paddingBottom = '';
                return;
            }

            shell.style.paddingBottom = `${Math.ceil(poolBar.getBoundingClientRect().height || 0) + 20}px`;
        }

        class Game {
            constructor() {
                this.poolContent = document.getElementById('poolContent');
                this.poolCount = document.getElementById('poolCount');
                this.poolPrevBtn = document.getElementById('poolPrevBtn');
                this.poolNextBtn = document.getElementById('poolNextBtn');
                this.revealAnswersBtn = document.getElementById('revealAnswersBtn');
                this.retakeTestBtn = document.getElementById('retakeTestBtn');
                this.winModal = document.getElementById('winModal');
                this.restartBtnModal = document.getElementById('restartBtnModal');
                this.continueBtnModal = document.getElementById('continueBtnModal');
                this.tileTpl = document.getElementById('tileTpl');
                this.mobileRowStatus = document.getElementById('mobileRowStatus');

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.offsetX = 0;
                this.offsetY = 0;
                this.pointerId = null;

                this.scrollThreshold = 80;
                this.scrollSpeed = 10;
                this._scrollInterval = null;
                this.timerInt = null;
                this.startTime = null;
                this.correctCount = 0;
                this.mistakeCount = 0;
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.isRevealingAnswers = false;
                this.poolStartIndex = 0;
                this.playableTileTotal = ITEMS.filter(item => !item.placed).length;

                this.tileSkins = [
                    'bg-gradient-to-br from-sky-500 to-blue-600',
                    'bg-gradient-to-br from-rose-500 to-fuchsia-600',
                    'bg-gradient-to-br from-emerald-500 to-teal-600',
                    'bg-gradient-to-br from-amber-500 to-orange-600',
                    'bg-gradient-to-br from-indigo-500 to-violet-600',
                    'bg-gradient-to-br from-cyan-500 to-sky-600'
                ];

                this.dropzones = Array.from(document.querySelectorAll('.dropzone'));
                this.initialDropzonesHTML = this.dropzones.map(zone => zone.innerHTML);
                this.tableRows = Array.from(document.querySelectorAll('.table-row'));
                this.mobileRowButtons = Array.from(document.querySelectorAll('.mobile-row-tab'));
                this.activeMobileRowKey = this.mobileRowButtons[0]?.dataset.rowKey || this.tableRows[0]?.dataset.rowKey || null;

                this.handlePointerMove = this.handlePointerMove.bind(this);
                this.handlePointerUp = this.handlePointerUp.bind(this);
                this.handlePointerCancel = this.handlePointerCancel.bind(this);
                this.handleRevealAnswers = this.handleRevealAnswers.bind(this);
                this.handleRetakeTest = this.handleRetakeTest.bind(this);
                this.handlePoolPrev = this.handlePoolPrev.bind(this);
                this.handlePoolNext = this.handlePoolNext.bind(this);
                this.handleMobileRowSelect = this.handleMobileRowSelect.bind(this);

                this.revealAnswersBtn?.addEventListener('click', this.handleRevealAnswers);
                this.retakeTestBtn?.addEventListener('click', this.handleRetakeTest);
                this.poolPrevBtn?.addEventListener('click', this.handlePoolPrev);
                this.poolNextBtn?.addEventListener('click', this.handlePoolNext);
                this.restartBtnModal?.addEventListener('click', () => this.init());
                this.continueBtnModal?.addEventListener('click', goNextSlide);
                this.mobileRowButtons.forEach((button) => button.addEventListener('click', this.handleMobileRowSelect));
            }

            init() {
                this.winModal.classList.add('hidden');

                this.dropzones.forEach((zone, index) => {
                    zone.innerHTML = this.initialDropzonesHTML[index];
                });

                this.poolContent.innerHTML = '';
                this.poolStartIndex = 0;

                const items = ITEMS.filter(item => !item.placed);
                this.shuffle(items).forEach((data, i) => {
                    const node = this.tileTpl.content.firstElementChild.cloneNode(true);
                    node.textContent = data.text;
                    node.dataset.place = data.place;
                    node.dataset.phrase = data.phrase;
                    node.dataset.key = data.key;
                    node.classList.add(...this.tileSkins[i % this.tileSkins.length].split(' '));
                    node.addEventListener('pointerdown', (e) => this.handlePointerDown(e, node));
                    this.poolContent.appendChild(node);
                });

                this.correctCount = 0;
                this.mistakeCount = 0;
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.isRevealingAnswers = false;
                this.startTimer();
                this.refreshPoolVisibility();
                this.updateStats();
                this.updatePoolCount();
                this.updateActionButtons();
                this.syncMobileRowView();
                this.checkWin();
                updatePoolSafeSpace();
            }

            shuffle(a) {
                const arr = [...a];
                for (let i = arr.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [arr[i], arr[j]] = [arr[j], arr[i]];
                }
                return arr;
            }

            getTotalTiles() {
                return this.playableTileTotal;
            }

            getVisibleCap() {
                const w = window.innerWidth || 1024;
                if (w >= 1280) return Number.POSITIVE_INFINITY;
                if (w < 640) return 8;
                return 9;
            }

            isMobileRowMode() {
                return (window.innerWidth || 0) < 1024;
            }

            updateMobileRowStatus() {
                if (!this.mobileRowStatus) return;

                if (!this.isMobileRowMode()) {
                    this.mobileRowStatus.textContent = `${this.tableRows.length} rows`;
                    return;
                }

                const activeRow = this.tableRows.find((row) => row.dataset.rowKey === this.activeMobileRowKey) || this.tableRows[0] || null;
                this.mobileRowStatus.textContent = activeRow?.dataset.rowLabel || `${this.tableRows.length} rows`;
            }

            syncMobileRowView() {
                if (!this.tableRows.length) return;

                if (!this.activeMobileRowKey || !this.tableRows.some((row) => row.dataset.rowKey === this.activeMobileRowKey)) {
                    this.activeMobileRowKey = this.tableRows[0]?.dataset.rowKey || null;
                }

                const mobileMode = this.isMobileRowMode();

                this.tableRows.forEach((row) => {
                    const shouldHide = mobileMode && row.dataset.rowKey !== this.activeMobileRowKey;
                    row.classList.toggle('mobile-row-hidden', shouldHide);
                });

                this.mobileRowButtons.forEach((button) => {
                    const isActive = button.dataset.rowKey === this.activeMobileRowKey;
                    button.classList.toggle('is-active', isActive);
                    button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
                });

                this.updateMobileRowStatus();
            }

            handleMobileRowSelect(e) {
                const rowKey = e.currentTarget?.dataset?.rowKey;
                if (!rowKey) return;
                this.activeMobileRowKey = rowKey;
                this.syncMobileRowView();
            }

            isRowComplete(rowElement) {
                if (!rowElement) return false;

                const zones = Array.from(rowElement.querySelectorAll('.dropzone'));
                return zones.length > 0 && zones.every((zone) => zone.querySelector('.empty-state')?.classList.contains('hidden'));
            }

            focusNextIncompleteMobileRow() {
                if (!this.isMobileRowMode()) return;

                const nextRow = this.tableRows.find((row) => !this.isRowComplete(row));
                if (!nextRow) return;

                this.activeMobileRowKey = nextRow.dataset.rowKey || this.activeMobileRowKey;
                this.syncMobileRowView();
            }

            refreshPoolVisibility() {
                const cap = this.getVisibleCap();
                const tiles = Array.from(this.poolContent.querySelectorAll('.draggable-item'));
                const isPaged = Number.isFinite(cap);

                if (!isPaged) {
                    this.poolStartIndex = 0;
                    tiles.forEach(tile => tile.classList.remove('hidden'));
                    this.updatePoolPager(tiles.length, cap, false);
                    return;
                }

                const maxStart = Math.max(0, tiles.length - cap);
                this.poolStartIndex = Math.min(this.poolStartIndex, maxStart);

                tiles.forEach((tile, index) => {
                    const visible = index >= this.poolStartIndex && index < this.poolStartIndex + cap;
                    tile.classList.toggle('hidden', !visible);
                });

                this.updatePoolPager(tiles.length, cap, true);
            }

            updatePoolPager(totalTiles, cap, enabled) {
                if (!this.poolPrevBtn || !this.poolNextBtn) return;

                const shouldShow = enabled && totalTiles > cap;
                this.poolPrevBtn.classList.toggle('hidden', !shouldShow);
                this.poolNextBtn.classList.toggle('hidden', !shouldShow);

                if (!shouldShow) return;

                const maxStart = Math.max(0, totalTiles - cap);
                this.poolPrevBtn.disabled = this.poolStartIndex <= 0;
                this.poolNextBtn.disabled = this.poolStartIndex >= maxStart;
            }

            handlePoolPrev() {
                const cap = this.getVisibleCap();
                if (!Number.isFinite(cap)) return;
                this.poolStartIndex = Math.max(0, this.poolStartIndex - 1);
                this.refreshPoolVisibility();
            }

            handlePoolNext() {
                const cap = this.getVisibleCap();
                if (!Number.isFinite(cap)) return;
                const tiles = Array.from(this.poolContent.querySelectorAll('.draggable-item'));
                const maxStart = Math.max(0, tiles.length - cap);
                this.poolStartIndex = Math.min(maxStart, this.poolStartIndex + 1);
                this.refreshPoolVisibility();
            }

            formatElapsedTime() {
                if (!this.startTime) return '00:00';
                const elapsed = Math.max(0, Math.floor((Date.now() - this.startTime) / 1000));
                const mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                const secs = String(elapsed % 60).padStart(2, '0');
                return `${mins}:${secs}`;
            }

            startTimer() {
                clearInterval(this.timerInt);
                this.startTime = Date.now();
                this.updateTimer();
                this.timerInt = setInterval(() => this.updateTimer(), 1000);
            }

            updateTimer() {
                const timerEl = document.getElementById('gameTimer');
                if (timerEl) timerEl.textContent = this.formatElapsedTime();
            }

            updateStats() {
                const progressEl = document.getElementById('tilesCount');
                const correctEl = document.getElementById('correctCount');
                const mistakesEl = document.getElementById('mistakesCount');
                const total = this.getTotalTiles();

                if (progressEl) progressEl.textContent = `${this.correctCount}/${total}`;
                if (correctEl) correctEl.textContent = this.correctCount;
                if (mistakesEl) mistakesEl.textContent = this.mistakeCount;
            }

            updatePoolCount() {
                if (!this.poolCount) return;
                const total = this.getTotalTiles();
                const remaining = this.poolContent.querySelectorAll('.draggable-item').length;
                this.poolCount.textContent = `${remaining}/${total}`;
            }

            getRemainingTileCount() {
                return this.poolContent.querySelectorAll('.draggable-item').length;
            }

            updateActionButtons() {
                const remaining = this.getRemainingTileCount();

                if (this.revealAnswersBtn) {
                    const canReveal = remaining > 0 && !this.hasUsedReveal && !this.isRevealingAnswers && !this.gameCompleted;
                    this.revealAnswersBtn.classList.toggle('hidden', !canReveal);
                    this.revealAnswersBtn.disabled = !canReveal;
                }

                if (this.retakeTestBtn) {
                    this.retakeTestBtn.classList.toggle('hidden', !this.hasUsedReveal);
                }
            }

            handlePointerDown(e, item) {
                if (!item || item.classList.contains('locked') || this.gameCompleted || this.isRevealingAnswers) return;

                this.draggedItem = item;
                this.originalParent = item.parentElement;
                this.pointerId = e.pointerId;

                document.body.classList.add('dragging-active');

                const rect = item.getBoundingClientRect();

                this.placeholder = document.createElement('div');
                this.placeholder.className = 'rounded-xl border border-dashed border-slate-300/80 bg-slate-200/35 dark:border-slate-700/70 dark:bg-slate-800/30';
                this.placeholder.style.width = rect.width + 'px';
                this.placeholder.style.height = rect.height + 'px';
                this.originalParent.insertBefore(this.placeholder, item);

                item.classList.add('dragging');
                item.style.width = rect.width + 'px';

                this.offsetX = e.clientX - rect.left;
                this.offsetY = e.clientY - rect.top;

                try { item.setPointerCapture(e.pointerId); } catch (_) {}

                document.body.appendChild(item);
                this.updatePosition(e.clientX, e.clientY);

                document.addEventListener('pointermove', this.handlePointerMove, { passive: false });
                document.addEventListener('pointerup', this.handlePointerUp);
                document.addEventListener('pointercancel', this.handlePointerCancel);
            }

            updatePosition(x, y) {
                if (!this.draggedItem) return;
                this.draggedItem.style.left = (x - this.offsetX) + 'px';
                this.draggedItem.style.top = (y - this.offsetY) + 'px';
            }

            handlePointerMove(e) {
                if (!this.draggedItem) return;
                if (this.pointerId !== null && e.pointerId !== this.pointerId) return;

                e.preventDefault();
                this.updatePosition(e.clientX, e.clientY);

                clearInterval(this._scrollInterval);

                const vy = e.clientY;
                const vh = window.innerHeight;
                let scroll = 0;

                if (vy < this.scrollThreshold) scroll = -this.scrollSpeed;
                else if (vy > vh - this.scrollThreshold) scroll = this.scrollSpeed;

                if (scroll !== 0) {
                    this._scrollInterval = setInterval(() => {
                        window.scrollBy(0, scroll);
                        this.checkHover(e.clientX, e.clientY);
                    }, 16);
                }

                this.checkHover(e.clientX, e.clientY);
            }

            checkHover(x, y) {
                document.querySelectorAll('.dropzone').forEach(zone => zone.classList.remove('active-drop'));
                const drop = this.getDropTarget(x, y);
                if (drop?.zone) drop.zone.classList.add('active-drop');
            }

            getDropTarget(x, y) {
                if (!this.draggedItem) return null;

                this.draggedItem.hidden = true;
                const below = document.elementFromPoint(x, y);
                this.draggedItem.hidden = false;

                if (!below) return null;

                return {
                    zone: below.closest('.dropzone')
                };
            }

            handlePointerUp(e) {
                if (!this.draggedItem) return;
                if (this.pointerId !== null && e.pointerId !== this.pointerId) return;

                clearInterval(this._scrollInterval);

                document.body.classList.remove('dragging-active');
                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);
                document.removeEventListener('pointercancel', this.handlePointerCancel);

                document.querySelectorAll('.dropzone').forEach(zone => zone.classList.remove('active-drop'));

                const drop = this.getDropTarget(e.clientX, e.clientY);
                const droppedOnZone = Boolean(drop?.zone);

                if (
                    droppedOnZone &&
                    drop.zone.dataset.place === this.draggedItem.dataset.place &&
                    drop.zone.dataset.phrase === this.draggedItem.dataset.phrase
                ) {
                    this.lock(drop.zone);
                } else {
                    this.fail({ countAsMistake: droppedOnZone });
                }
            }

            handlePointerCancel() {
                if (!this.draggedItem) return;

                clearInterval(this._scrollInterval);

                document.body.classList.remove('dragging-active');
                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);
                document.removeEventListener('pointercancel', this.handlePointerCancel);

                document.querySelectorAll('.dropzone').forEach(zone => zone.classList.remove('active-drop'));

                this.fail({ countAsMistake: false });
            }

            lock(zone) {
                play(audio.correct);

                const tile = this.draggedItem;
                const emptyState = zone.querySelector('.empty-state');
                if (emptyState) emptyState.classList.add('hidden');

                tile.classList.remove('dragging', 'cursor-grab');
                tile.classList.add('placed-tile', 'locked-pop');
                tile.style.cssText = '';

                zone.appendChild(tile);

                if (this.placeholder) this.placeholder.remove();

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.pointerId = null;

                this.correctCount++;
                this.updateStats();
                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateActionButtons();
                this.focusNextIncompleteMobileRow();
                this.checkWin();
                updatePoolSafeSpace();
            }

            fail(options = {}) {
                const shouldCountMistake = options.countAsMistake === true;

                if (shouldCountMistake) {
                    play(audio.wrong);
                    this.mistakeCount++;
                    this.updateStats();
                }

                const item = this.draggedItem;
                if (!item || !this.placeholder || !this.originalParent) return;

                const pr = this.placeholder.getBoundingClientRect();

                item.classList.add('returning', 'shake');
                item.style.left = pr.left + 'px';
                item.style.top = pr.top + 'px';

                setTimeout(() => {
                    if (!item || !this.placeholder || !this.originalParent) return;

                    item.classList.remove('dragging', 'returning', 'shake');
                    item.style.cssText = '';
                    this.originalParent.insertBefore(item, this.placeholder);
                    this.placeholder.remove();

                    this.draggedItem = null;
                    this.placeholder = null;
                    this.originalParent = null;
                    this.pointerId = null;

                    this.refreshPoolVisibility();
                    updatePoolSafeSpace();
                }, 360);
            }

            findDropzone(place, phrase) {
                return this.dropzones.find((zone) => zone.dataset.place === place && zone.dataset.phrase === phrase) || null;
            }

            markTileAsRevealed(tile) {
                if (!tile) return;
                tile.classList.remove(...this.tileSkins.flatMap(skin => skin.split(' ')));
                tile.classList.add('revealed-answer');
            }

            handleRevealAnswers() {
                if (this.draggedItem || this.isRevealingAnswers || this.gameCompleted || this.hasUsedReveal) return;

                const remainingTiles = Array.from(this.poolContent.querySelectorAll('.draggable-item'));
                if (!remainingTiles.length) return;

                this.isRevealingAnswers = true;
                this.hasUsedReveal = true;
                this.updateActionButtons();

                remainingTiles.forEach((tile) => {
                    const zone = this.findDropzone(tile.dataset.place, tile.dataset.phrase);
                    if (!zone) return;

                    const emptyState = zone.querySelector('.empty-state');
                    if (emptyState) emptyState.classList.add('hidden');

                    tile.classList.remove('cursor-grab');
                    tile.classList.add('placed-tile', 'locked-pop');
                    this.markTileAsRevealed(tile);
                    zone.appendChild(tile);
                    this.mistakeCount++;
                });

                this.isRevealingAnswers = false;
                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();
                this.focusNextIncompleteMobileRow();
                this.checkWin({ showModal: false, delay: 0 });
                updatePoolSafeSpace();
            }

            handleRetakeTest() {
                this.init();
            }

            checkWin(options = {}) {
                const total = this.getTotalTiles();
                const remaining = this.getRemainingTileCount();
                const showModal = options.showModal ?? true;
                const delay = options.delay ?? 420;

                if (total > 0 && remaining === 0 && !this.gameCompleted) {
                    this.gameCompleted = true;
                    clearInterval(this.timerInt);

                    const finalCorrect = document.getElementById('finalCorrect');
                    const finalTime = document.getElementById('finalTime');
                    const finalMistakes = document.getElementById('finalMistakes');
                    if (finalCorrect) finalCorrect.textContent = `${this.correctCount}/${total}`;
                    if (finalTime) finalTime.textContent = this.formatElapsedTime();
                    if (finalMistakes) finalMistakes.textContent = this.mistakeCount;
                    this.updateActionButtons();

                    setTimeout(() => {
                        if (showModal) {
                            play(audio.success);
                            this.winModal.classList.remove('hidden');  
                        }
                    }, delay);
                }
            }
        }

        const game = new Game();

        document.addEventListener('DOMContentLoaded', () => {
            game.init();
            syncPromptPlayerUI();
            updatePoolSafeSpace();
            window.addEventListener('resize', () => {
                game.refreshPoolVisibility();
                game.syncMobileRowView();
                syncPromptPlayerUI();
                updatePoolSafeSpace();
            }, { passive: true });
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && scriptModal) scriptModal.classList.add('hidden');
            });
            setTimeout(updatePoolSafeSpace, 200);
            setTimeout(updatePoolSafeSpace, 500);
        });
    </script>
@endsection
