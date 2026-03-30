@extends("slider.simple-layout")

@php
    $gameType = $content['type'] ?? 'emoji';
    $initialAudio = $content['audio'] ?? ($content['questions'][0]['audio'] ?? null);
    $optionType = $content['option_type'] ?? 'text';
    $characters = $content['characters'] ?? [];
    $readingTitle = trim((string) ($content['reading_title'] ?? $content['reading_heading'] ?? ''));
    $readingAlign = trim((string) ($content['reading_align'] ?? ($gameType === 'reading' ? 'left' : '')));
    $readingPlain = array_key_exists('reading_plain', $content)
        ? !empty($content['reading_plain'])
        : $gameType === 'reading';
    $readingCompact = array_key_exists('reading_compact', $content)
        ? !empty($content['reading_compact'])
        : $gameType === 'reading';
    $headerWrapClass = trim((string) ($content['header_wrap_class'] ?? 'header-spacing w-full text-center space-y-2 mt-1 mb-2 sm:mt-2 sm:mb-3'));
    $titleClass = trim((string) ($content['title_class'] ?? 'w-full whitespace-normal lg:whitespace-nowrap tracking-tight text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-black mb-2'));
    $subtitleClass = trim((string) ($content['subtitle_class'] ?? 'text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100'));
    $rawReadingPassage = $content['passage'] ?? $content['reading'] ?? $content['reading_passage'] ?? [];
    $readingPassage = is_array($rawReadingPassage)
        ? array_values(array_filter(array_map(static fn ($paragraph) => trim((string) $paragraph), $rawReadingPassage), static fn ($paragraph) => $paragraph !== ''))
        : array_values(array_filter(
            array_map('trim', preg_split('/\R{2,}/', trim((string) $rawReadingPassage)) ?: []),
            static fn ($paragraph) => $paragraph !== ''
        ));
    $enableImageZoom = $content['enable_image_zoom'] ?? true; 
    $imagePlain = $content['image_plain'] ?? false;
    $imageScale = (float) ($content['image_scale'] ?? 1);
    $imageExtraScale = (float) ($content['image_extra_scale'] ?? 1);
    $imageRadius = $content['image_radius'] ?? 'rounded-[1.6rem]';
    $imagePanelColClass = $content['image_panel_col_class']
        ?? ($gameType === 'image' ? 'sm:col-span-7' : ($gameType === 'emoji' ? '' : ($gameType === 'reading' ? 'sm:col-span-6' : 'sm:col-span-5')));
    $answerPanelColClass = $content['answer_panel_col_class']
        ?? ($gameType === 'image' ? 'sm:col-span-5' : ($gameType === 'emoji' ? '' : ($gameType === 'reading' ? 'sm:col-span-6' : (($gameType != 'questions_only' && $gameType !== 'audio') ? 'sm:col-span-7' : 'col-span-12'))));
    $imagePanelInnerClass = $content['image_panel_inner_class'] ?? 'h-full p-2 sm:p-4 lg:p-5';
    $answerPanelInnerClass = $content['answer_panel_inner_class'] ?? 'h-full p-5 sm:p-6 text-left';
    $questionPromptLabel = $content['question_prompt_label'] ?? 'Choose the correct answer:';
    $optionsBank = $content['optionsBank'] ?? [];
    $optionsGridClass = $content['options_grid_class'] ?? 'mt-5 grid grid-cols-1 sm:grid-cols-2 gap-4';
    $statusRowWidth = $content['status_row_width'] ?? 'max-w-5xl';
    $gameCardWidth = $content['game_card_width'] ?? ($gameType === 'emoji' ||  $gameType === 'audio'||  $gameType === 'questions_only'? 'max-w-5xl' : 'max-w-[92rem]');
    $imageOptionTileClass = trim((string) ($content['image_option_tile_class'] ?? ''));
    $rawScript = $content['script'] ?? [];
    $scriptLines = is_array($rawScript)
        ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawScript), static fn ($line) => $line !== ''))
        : array_values(array_filter(
            array_map('trim', preg_split('/(?<=[.!?])\s+/', trim((string) $rawScript)) ?: []),
            static fn ($line) => $line !== ''
        ));
    $hasQuestionScript = false;
    foreach (($content['questions'] ?? []) as $question) {
        if (!empty($question['script'])) {
            $hasQuestionScript = true;
            break;
        }
    }
    $hasAnyScript = $scriptLines !== [] || $hasQuestionScript;
@endphp

@section("style")
    <style>
        .modal-scroll::-webkit-scrollbar{height:10px;width:10px}
        .modal-scroll::-webkit-scrollbar-thumb{background:rgba(148,163,184,.55);border-radius:999px}
        .dark .modal-scroll::-webkit-scrollbar-thumb{background:rgba(51,65,85,.7)}

        .game-modal-shell{
            position:relative;
            min-height:100%;
            width:100%;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:1rem;
        }

        .game-modal-card{
            position:relative;
            width:100%;
            overflow:hidden;
            border-radius:1.5rem;
            border:1px solid rgba(226,232,240,.9);
            background:rgba(255,255,255,.98);
            box-shadow:0 24px 70px -40px rgba(15,23,42,.28);
        }

        .dark .game-modal-card{
            border-color:rgba(51,65,85,.9);
            background:rgba(15,23,42,.98);
            box-shadow:0 24px 70px -40px rgba(0,0,0,.55);
        }

        .game-modal-stat{
            border-radius:1rem;
            border:1px solid rgba(226,232,240,.9);
            background:rgba(248,250,252,.9);
        }

        .dark .game-modal-stat{
            border-color:rgba(51,65,85,.9);
            background:rgba(15,23,42,.86);
        }

        .game-modal-close{
            display:inline-flex;
            height:2.9rem;
            width:2.9rem;
            align-items:center;
            justify-content:center;
            border-radius:.9rem;
            border:1px solid rgba(226,232,240,.9);
            background:rgba(255,255,255,.98);
            color:#334155;
            transition:background-color .18s ease, border-color .18s ease, color .18s ease;
        }

        .game-modal-close:hover{
            background:#f8fafc;
        }

        .dark .game-modal-close{
            border-color:rgba(51,65,85,.9);
            background:rgba(15,23,42,.98);
            color:#f8fafc;
        }

        .mca-btn-primary,
        .game-modal-primary-btn{
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
            transition:transform .2s ease, box-shadow .2s ease, opacity .2s ease, background-color .2s ease;
        }

        .mca-btn-primary:hover,
        .game-modal-primary-btn:hover{
            transform:scale(1.05);
        }

        .mca-btn-primary:active,
        .game-modal-primary-btn:active{
            transform:scale(.95);
        }

        .mca-btn-reveal{
            color:rgb(154 52 18);
            border-color:rgb(253 186 116);
            background:rgb(255 237 213);
            box-shadow:0 8px 22px rgba(234,88,12,.10);
        }

        .mca-btn-reveal:hover{
            background:rgb(254 215 170);
            box-shadow:0 10px 24px rgba(234,88,12,.14);
        }

        .mca-btn-script{
            background:linear-gradient(135deg, #4f46e5, #3b82f6);
            box-shadow:0 10px 24px rgba(59,130,246,.14);
        }

        .mca-btn-script:hover{
            box-shadow:0 12px 28px rgba(59,130,246,.20);
        }

        .mca-btn-secondary,
        .action-btn-soft,
        .game-modal-secondary-btn{
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
            transition:transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease, color .2s ease, border-color .2s ease;
        }

        .mca-btn-secondary:hover,
        .action-btn-soft:hover,
        .game-modal-secondary-btn:hover{
            transform:scale(1.05);
            background:rgb(248 250 252);
        }

        .mca-btn-secondary:active,
        .action-btn-soft:active,
        .game-modal-secondary-btn:active{
            transform:scale(.98);
        }

        .mca-btn-warning{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            border-radius:.5rem;
            padding:.375rem .75rem;
            font-size:.75rem;
            font-weight:900;
            color:rgb(120 53 15);
            border:1px solid rgb(253 186 116);
            background:rgb(254 243 199);
            box-shadow:0 8px 22px rgba(120,53,15,.10);
            transition:transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease, color .2s ease, border-color .2s ease;
        }

        .mca-btn-warning:hover{
            transform:scale(1.05);
            background:rgb(253 230 138);
        }

        .mca-btn-warning:active{
            transform:scale(.98);
        }

        .play-hit {
            -webkit-tap-highlight-color: transparent;
        }

        .play-hit:focus-visible {
            outline: none;
        }

        .wave-bar {
            display: none;
            width: 3px;
            height: 10px;
            background: currentColor;
            border-radius: 999px;
            margin: 0 1px;
        }

        .audio-listen-btn.playing .wave-bar {
            display: block;
            animation: waveGrowth .6s infinite ease-in-out;
        }

        .audio-listen-btn.playing .static-icon {
            display: none;
        }

        .mca-native-audio {
            display: none;
        }

        .mca-audio-track {
            position: relative;
            height: 10px;
            width: 100%;
            border-radius: 999px;
            overflow: hidden;
            background: rgba(199,210,254,0.55);
        }

        .dark .mca-audio-track {
            background: rgba(99,102,241,0.25);
        }

        .mca-audio-fill {
            height: 100%;
            width: 0%;
            border-radius: 999px;
            background: linear-gradient(90deg, #4f46e5 0%, #8b5cf6 100%);
        }

        .mca-audio-knob {
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 14px;
            height: 14px;
            border-radius: 9999px;
            background: white;
            border: 2px solid #4f46e5;
            box-shadow: 0 6px 14px rgba(2,6,23,0.18);
            left: 0%;
            pointer-events: none;
        }

        .game-modal-primary-btn{
            background:linear-gradient(135deg, #9333ea, #4f46e5, #2563eb);
        }

        .reading-pane{
            height:100%;
            padding:1rem;
        }

        .reading-pane.is-left{
            text-align:left;
        }

        .reading-pane.is-plain{
            padding:.9rem 1rem;
        }

        .reading-pane.is-compact{
            padding:.85rem .95rem;
        }

        .reading-card{
            position:relative;
            height:100%;
            overflow:auto;
            border-radius:1.65rem;
            border:1px solid rgba(226,232,240,.82);
            background:
                radial-gradient(120% 120% at 0% 0%, rgba(191,219,254,.42) 0%, transparent 46%),
                radial-gradient(120% 120% at 100% 0%, rgba(199,210,254,.34) 0%, transparent 44%),
                linear-gradient(180deg, rgba(255,255,255,.95) 0%, rgba(248,250,252,.92) 100%);
            padding:1.2rem;
            box-shadow:0 22px 60px -38px rgba(15,23,42,.28);
        }

        .dark .reading-card{
            border-color:rgba(71,85,105,.88);
            background:
                radial-gradient(120% 120% at 0% 0%, rgba(59,130,246,.18) 0%, transparent 46%),
                radial-gradient(120% 120% at 100% 0%, rgba(129,140,248,.14) 0%, transparent 44%),
                linear-gradient(180deg, rgba(15,23,42,.96) 0%, rgba(2,6,23,.94) 100%);
            box-shadow:0 24px 64px -38px rgba(0,0,0,.52);
        }

        .reading-card::before{
            content:"";
            position:absolute;
            inset:0 auto 0 0;
            width:6px;
            background:linear-gradient(180deg, #38bdf8 0%, #4f46e5 52%, #8b5cf6 100%);
            opacity:.9;
        }

        .reading-card.is-plain-mode{
            border-color:rgba(226,232,240,.72);
            box-shadow:0 18px 52px -40px rgba(15,23,42,.25);
        }

        .dark .reading-card.is-plain-mode{
            border-color:rgba(71,85,105,.78);
        }

        .reading-header{
            position:relative;
            padding-left:.35rem;
        }

        .reading-badge{
            display:inline-flex;
            align-items:center;
            gap:.45rem;
            border-radius:999px;
            border:1px solid rgba(148,163,184,.22);
            background:rgba(255,255,255,.72);
            padding:.45rem .78rem;
            font-size:.7rem;
            font-weight:900;
            letter-spacing:.18em;
            text-transform:uppercase;
            color:#475569;
            box-shadow:0 10px 24px rgba(15,23,42,.06);
        }

        .dark .reading-badge{
            border-color:rgba(148,163,184,.18);
            background:rgba(15,23,42,.64);
            color:#cbd5e1;
        }

        .reading-badge-dot{
            height:.5rem;
            width:.5rem;
            border-radius:999px;
            background:linear-gradient(135deg, #38bdf8 0%, #6366f1 100%);
        }

        .reading-label{
            font-size:.78rem;
            font-weight:900;
            letter-spacing:.16em;
            text-transform:uppercase;
            color:#64748b;
        }

        .dark .reading-label{
            color:#94a3b8;
        }

        .reading-title{
            margin-top:.9rem;
            max-width:24ch;
            font-size:1.4rem;
            line-height:1.06;
            font-weight:800;
            letter-spacing:-.05em;
            color:#0f172a;
        }

        .dark .reading-title{
            color:#f8fafc;
        }

        .reading-copy{
            margin-top:1.1rem;
            display:grid;
            gap:.95rem;
        }

        .reading-pane.is-compact .reading-copy{
            margin-top:.9rem;
            gap:.75rem;
        }

        .reading-copy p{
            margin:0;
            position:relative;
            padding:0 .1rem;
            font-size:.9rem;
            line-height:1.7;
            font-weight:600;
            letter-spacing:-.012em;
            color:#334155;
        }

        .dark .reading-copy p{
            color:#e2e8f0;
        }

        .reading-copy p:first-child::first-letter{
            float:left;
            margin:.08rem .5rem 0 0;
            font-size:2.35rem;
            line-height:.86;
            font-weight:900;
            color:#4338ca;
        }

        .dark .reading-copy p:first-child::first-letter{
            color:#93c5fd;
        }

        .reading-pane.is-compact .reading-copy p{
            line-height:1.62;
        }

        .dark .mca-btn-secondary,
        .dark .action-btn-soft,
        .dark .game-modal-secondary-btn{
            color:#fff;
            border-color:rgb(51 65 85);
            background:rgb(30 41 59);
        }

        .dark .mca-btn-secondary:hover,
        .dark .action-btn-soft:hover,
        .dark .game-modal-secondary-btn:hover{
            background:rgb(51 65 85);
        }

        .dark .mca-btn-warning{
            color:rgb(254 243 199);
            border-color:rgba(180, 83, 9, .45);
            background:rgba(120, 53, 15, .35);
        }

        .dark .mca-btn-warning:hover{
            background:rgba(120, 53, 15, .5);
        }

        .dark .mca-btn-reveal{
            color:rgb(254 215 170);
            border-color:rgba(194, 65, 12, .45);
            background:rgba(154, 52, 18, .35);
        }

        .dark .mca-btn-reveal:hover{
            background:rgba(154, 52, 18, .5);
        }

        @media (min-width: 640px){
            .game-modal-shell{
                padding:1.5rem;
            }

            .reading-pane{
                padding:1.15rem;
            }

            .reading-pane.is-plain,
            .reading-pane.is-compact{
                padding:1rem 1.1rem;
            }

            .reading-card{
                padding:1.45rem 1.5rem;
            }

            .reading-title{
                font-size:1.75rem;
            }

            .reading-copy p{
                font-size:.97rem;
            }
        }

        @media (min-width: 1024px){
            .reading-pane{
                padding:1.25rem;
            }

            .reading-pane.is-plain,
            .reading-pane.is-compact{
                padding:1.05rem 1.15rem;
            }

            .reading-card{
                padding:1.55rem 1.65rem;
            }

            .reading-copy p{
                font-size:1rem;
            }
        }
    </style>
@endsection

@section("content")
    <div class="font-sans relative isolate min-h-[100dvh] overflow-x-hidden overflow-y-auto dark:text-slate-100 transition-colors duration-300">
        <main id="app" class="w-full max-w-[96rem] min-h-[100dvh] px-4 sm:px-8 lg:px-10 mx-auto pt-3 sm:pt-4 pb-16 sm:pb-20 flex flex-col">
            <section class="p-2 sm:p-4 lg:p-5 flex-1 flex flex-col">
                <div class="grid place-items-center text-center gap-3 sm:gap-4 flex-1 auto-rows-max">

                    <div class="{{ $headerWrapClass }}">

                        <h1 class="{{ $titleClass }}">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $title ?? ($content['title'] ?? 'Practice') }}
                            </span>
                        </h1>
                        <p class="{{ $subtitleClass }}">
                            {{ $subtitle ?? ($content['subtitle'] ?? 'Good luck!') }}
                        </p>
                    </div>
                    <div id="statusRow" class="w-full {{ $statusRowWidth }} rounded-3xl border border-slate-200/70 dark:border-slate-800 bg-white/60 dark:bg-slate-900/60 backdrop-blur-xl shadow-lg overflow-hidden">
                        <div class="grid grid-cols-4">
                            @foreach(['Question' => 'qCount', 'Correct' => 'correctCount', 'Mistakes' => 'mistakesCount', 'Time' => 'timer'] as $label => $id)
                                <div class="px-2 py-2 sm:px-4 sm:py-4 @if(!$loop->last) border-r border-slate-200/70 dark:border-slate-800 @endif">
                                    <div class="hidden sm:inline-block text-[11px] sm:text-xs font-extrabold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                        {{ $label }}
                                    </div>
                                    <div class="font-black text-xs sm:text-lg">
                                        @if($label == 'Correct')
                                            ✅
                                        @elseif($label == 'Mistakes')
                                            ❌
                                        @elseif($label == 'Time')
                                            ⏱️
                                        @endif
                                        <span id="{{ $id }}">
                                            {{ $label == 'Question' ? '1/'.count($content['questions']) : ($label == 'Time' ? '00:00' : '0') }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <section id="gameCard" class="relative w-full {{ $gameCardWidth }} p-1 sm:p-3 lg:p-4 flex-1 min-h-[460px] select-none">
                        <div id="questionPanel" class="grid h-full grid-cols-1 {{ $gameType === 'emoji' ? 'sm:grid-cols-[minmax(0,30%)_minmax(0,70%)]' : 'sm:grid-cols-12' }} gap-0 items-stretch overflow-hidden rounded-2xl border border-slate-200/70 dark:border-slate-800 bg-white/60 dark:bg-slate-900/60 backdrop-blur-xl shadow-xl">
                            @if($gameType!="questions_only" && $gameType !== 'audio')
                                <div class="{{ $imagePanelColClass }}">
                                    @if($gameType === 'character_audios')
                                        <div class="h-full p-4 sm:p-5">
                                            <div class="mt-4 space-y-3">
                                                @foreach($characters as $character)
                                                    <div class="rounded-2xl border border-slate-200/70 bg-white/80 p-3 dark:border-slate-700 dark:bg-slate-800/80">
                                                        <div class="text-sm font-black text-slate-900 dark:text-white">
                                                            {{ $character['name'] ?? 'Character' }}
                                                        </div>

                                                        @if(!empty($character['audio']))
                                                            <audio
                                                                    class="character-audio mt-2 w-full"
                                                                    controls
                                                                    preload="auto"
                                                                    controlsList="nodownload noplaybackrate noremoteplayback"
                                                                    disableRemotePlayback
                                                                    oncontextmenu="return false;"
                                                                    src="{{ $character['audio'] }}"
                                                            ></audio>
                                                        @else
                                                            <div class="mt-2 text-xs font-bold text-slate-600 dark:text-slate-300">
                                                                Audio unavailable.
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @elseif($gameType === 'reading')
                                        <div class="reading-pane{{ $readingAlign === 'left' ? ' is-left' : '' }}{{ $readingPlain ? ' is-plain' : '' }}{{ $readingCompact ? ' is-compact' : '' }}">
                                            <div class="reading-card{{ $readingPlain ? ' is-plain-mode' : '' }}">
                                                <div class="reading-header">
                                                    <div class="reading-badge">
                                                        <span class="reading-badge-dot"></span>
                                                        <span>Reading Passage</span>
                                                    </div>

                                                @if($readingTitle !== '')
                                                    <h2 class="reading-title">{{ $readingTitle }}</h2>
                                                @endif
                                                </div>

                                                <div class="reading-copy">
                                                    @forelse($readingPassage as $paragraph)
                                                        <p>{{ $paragraph }}</p>
                                                    @empty
                                                        <p>Add `passage` or `reading` in `$content` to show the reading text here.</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($gameType=="image")
                                        <div class="{{ $imagePanelInnerClass }}">
                                            @if($imagePlain)
                                                <div
                                                        id="imageViewport"
                                                        class="relative mx-auto w-full overflow-hidden {{ $imageRadius }} {{ $enableImageZoom ? 'cursor-zoom-in' : '' }}"
                                                        style="aspect-ratio: 4 / 3;"
                                                >
                                                    <img
                                                            id="questionImage"
                                                            src="{{ $content['image'] ?? '' }}"
                                                            data-default-src="{{ $content['image'] ?? '' }}"
                                                            alt="{{ $content['title'] ?? 'Question image' }}"
                                                            draggable="false"
                                                            class="h-full w-full object-contain {{ $imageRadius }} {{ $enableImageZoom ? 'transition-transform duration-150 ease-out will-change-transform' : '' }}"
                                                    >
                                                </div>
                                            @else
                                                <div
                                                        id="imageStage"
                                                        class="relative mx-auto flex h-full w-full items-center justify-center rounded-3xl border border-slate-200/70 bg-white/85 p-2 shadow-xl dark:border-slate-700 dark:bg-slate-900/85"
                                                >
                                                    <div
                                                            id="imageViewport"
                                                            class="relative w-full max-w-full overflow-hidden rounded-[1.6rem] bg-slate-100 {{ $enableImageZoom ? 'cursor-zoom-in' : '' }} dark:bg-slate-950/60"
                                                            style="aspect-ratio: 4 / 3;"
                                                    >
                                                        <img
                                                                id="questionImage"
                                                                src="{{ $content['image'] ?? '' }}"
                                                                data-default-src="{{ $content['image'] ?? '' }}"
                                                                alt="{{ $content['title'] ?? 'Question image' }}"
                                                                draggable="false"
                                                                class="h-full w-full object-contain {{ $enableImageZoom ? 'transition-transform duration-150 ease-out will-change-transform' : '' }}"
                                                        >
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                    @else
                                        <div class="h-full flex items-center justify-center min-h-[140px] px-4 py-4">
                                            <div id="qEmoji" class="text-6xl sm:text-7xl leading-none select-none">👋</div>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <div class="{{ $answerPanelColClass }} {{ ($gameType !== 'questions_only' && $gameType !== 'audio') ? 'border-t border-slate-200/70 dark:border-slate-800 sm:border-t-0 sm:border-l' : '' }}">
                                <div class="{{ $answerPanelInnerClass }}">
                                    <div class="flex flex-wrap items-center justify-between gap-3">
                                        <div class="text-sm sm:text-base font-extrabold text-slate-500 dark:text-slate-400">
                                            {{ $questionPromptLabel }}
                                        </div>

                                        <button
                                                id="btnRevealCorrection"
                                                class="mca-btn-primary mca-btn-reveal"
                                        >
                                                Reveal correction
                                        </button>
                                    </div>

                                    <div id="inlineAudioBox" class="hidden mt-4 mb-4 rounded-2xl border border-indigo-100 bg-indigo-50/90 px-4 py-3 shadow-sm dark:border-indigo-700/60 dark:bg-indigo-900/30 sm:px-5 sm:py-3.5">
                                        <div class="flex items-start gap-4">
                                            <button
                                                    id="btnPlayInlineAudio"
                                                    type="button"
                                                    class="play-hit audio-listen-btn inline-flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-blue-500 text-white shadow-lg shadow-indigo-900/20 transition-all duration-150 active:scale-95 hover:scale-[1.06] focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                                                    aria-label="Play audio"
                                            >
                                                <svg class="static-icon h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M8 5v14l11-7-11-7z"/>
                                                </svg>

                                                <span class="wave-bar" style="animation-delay:.1s"></span>
                                                <span class="wave-bar" style="animation-delay:.2s"></span>
                                                <span class="wave-bar" style="animation-delay:.3s"></span>
                                            </button>

                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center gap-3">
                                                    <div class="flex-1 flex flex-col gap-2 min-w-0">
                                                        <div class="mca-audio-track mt-1 cursor-pointer" id="inlineQuestionAudioProgressTrack" aria-label="Audio progress">
                                                            <div class="mca-audio-fill" id="inlineQuestionAudioProgressFill"></div>
                                                            <div class="mca-audio-knob" id="inlineQuestionAudioProgressKnob"></div>
                                                        </div>

                                                        <div class="flex justify-between text-[11px] font-extrabold text-indigo-700 dark:text-indigo-200">
                                                            <span id="inlineQuestionAudioCurrentTime">0:00</span>
                                                            <span id="inlineQuestionAudioTotalTime">0:00</span>
                                                        </div>
                                                    </div>
                                                    @if($hasAnyScript)
                                                        <button id="btnReplayAudio"
                                                                type="button"
                                                                class="mca-btn-primary mca-btn-script shrink-0">
                                                            <span>Script</span>
                                                            <span>📄</span>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @if(false && $hasAnyScript)
                                            <div class="mt-3 flex justify-end">
                                                <button id="btnReplayAudio"
                                                        type="button"
                                                        class="mca-btn-primary mca-btn-script">
                                                    <span>Script</span>
                                                    <span>📄</span>
                                                </button>
                                            </div>
                                        @endif
                                        <audio id="inlineQuestionAudio" class="mca-native-audio" preload="auto"></audio>
                                    </div>

                                    <div id="qPrompt" class="my-4 flex items-start gap-3 text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                        <span id="qPromptNumber" class="inline-flex shrink-0 items-center justify-center rounded-full bg-slate-100 px-3 py-1 text-sm font-black text-slate-700 dark:bg-slate-800 dark:text-slate-100">
                                            1.
                                        </span>
                                        <span id="qPromptText" class="min-w-0">
                                            ...
                                        </span>
                                    </div>

                                    <div id="optionsGrid" class="{{ $optionsGridClass }}"></div>
                                </div>
                            </div>

                            <div class="col-span-full border-t border-slate-200/70 dark:border-slate-800 px-5 py-5 sm:px-6 sm:py-6">
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                    <button
                                            id="btnRestart"
                                            class="w-full action-btn-soft py-3"
                                    >
                                        Restart 🔁
                                    </button>

                                    <button
                                            id="btnHint"
                                            class="w-full mca-btn-warning py-3"
                                    >
                                        Hint 💡 (<span id="hintBadge">2</span>)
                                    </button>

                                    <button
                                            id="btnPrev"
                                            class="w-full action-btn-soft py-3"
                                    >
                                        Previous
                                    </button>

                                    <button
                                            id="btnNext"
                                            class="w-full mca-btn-primary py-3"
                                    >
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="resultsOverlay" class="hidden fixed inset-0 z-50">
                            <div class="absolute inset-0 bg-slate-950/40 dark:bg-black/70 backdrop-blur-sm"></div>

                            <div class="game-modal-shell">
                                <div class="game-modal-card max-w-3xl max-h-[88dvh] overflow-y-auto">
                                    <div class="relative p-6 sm:p-8 lg:p-10 text-center">
                                        <div class="text-5xl sm:text-6xl">🎉</div>

                                        <h2 class="mt-5 text-3xl sm:text-4xl lg:text-[2.6rem] leading-none font-black text-slate-900 dark:text-white">
                                            Done
                                        </h2>

                                        <p class="mt-3 mx-auto max-w-xl text-sm sm:text-base font-semibold leading-[1.7] text-slate-500 dark:text-slate-400">
                                            Review your results, then continue when you are ready.
                                        </p>

                                        <div class="mt-8 w-full grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                                            @foreach(['Score' => 'finalScore', 'Time' => 'finalTime', 'Mistakes' => 'finalMistakes'] as $l => $id)
                                                <div class="game-modal-stat p-4 sm:p-5">
                                                    <div class="text-[11px] sm:text-xs font-extrabold uppercase tracking-[0.14em] text-slate-500 dark:text-slate-400">{{ $l }}</div>
                                                    <div id="{{ $id }}" class="mt-2 text-2xl sm:text-3xl font-black text-slate-900 dark:text-white">0</div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="mt-6 rounded-2xl border border-slate-200/70 bg-white/80 p-4 text-left shadow dark:border-slate-700 dark:bg-slate-800/80">
                                            <div class="text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                                Corrections
                                            </div>
                                            <div id="finalCorrection" class="mt-3 text-base font-bold leading-[1.85] text-slate-900 dark:text-white"></div>
                                        </div>

                                        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                            <button
                                                    id="btnRestartPopup"
                                                    class="game-modal-secondary-btn w-full px-8 py-4"
                                            >
                                                Restart 🔁
                                            </button>

                                            <button
                                                    id="btnContinue"
                                                    class="game-modal-primary-btn w-full px-8 py-4"
                                            >
                                                Continue ⚡
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($hasAnyScript)
                            <div id="scriptOverlay" class="hidden fixed inset-0 z-50">
                                <div id="scriptBackdrop" class="absolute inset-0 bg-slate-950/40 dark:bg-black/70 backdrop-blur-sm"></div>

                                <div class="game-modal-shell">
                                    <div class="game-modal-card max-w-3xl text-left">
                                        <div class="flex items-center justify-between p-3 sm:p-4 border-b border-slate-200/60 dark:border-slate-700/40">
                                                <div class="min-w-0">
                                                    <div class="font-black text-sm sm:text-base text-slate-900 dark:text-slate-50">
                                                        Script
                                                    </div>
                                                </div>

                                                <button
                                                        id="btnCloseScript"
                                                        type="button"
                                                        class="mca-btn-secondary"
                                                        aria-label="Close script"
                                                >
                                                    Close
                                                </button>
                                            </div>

                                            <div class="modal-scroll max-h-[70vh] overflow-auto p-3 sm:p-4">
                                                <div id="scriptList" class="space-y-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </section>
                </div>
            </section>
        </main>

        <div id="toastOne" class="fixed left-1/2 -translate-x-1/2 bottom-24 opacity-0 pointer-events-none z-50">
            <div class="px-6 py-2 rounded-full bg-white dark:bg-slate-800 shadow-2xl border border-slate-200 dark:border-slate-700 font-black dark:text-white">
                <span id="toastIcon"></span>
                <span id="toastText"></span>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        (() => {
            const GAME_TYPE = @json($gameType);
            const OPTION_TYPE = @json($optionType);
            const QUESTIONS = @json($content['questions']);
            const DEFAULT_AUDIO = @json($content['audio'] ?? null);
            const ENABLE_IMAGE_ZOOM = @json($enableImageZoom);
            const IMAGE_SCALE = @json($imageScale);
            const IMAGE_EXTRA_SCALE = @json($imageExtraScale);
            const OPTIONS_BANK = @json($optionsBank);
            const OPTIONS_GRID_CLASS = @json($optionsGridClass);
            const IMAGE_OPTION_TILE_CLASS = @json($imageOptionTileClass);
            const GLOBAL_SCRIPT_LINES = @json($scriptLines);
            const HAS_SCRIPT = @json($hasAnyScript);

            let idx = 0;
            let firstTryCorrect = 0;
            let wrongTries = 0;
            let hintsLeft = 2;
            let startTime = Date.now();
            let timerInt = null;
            let wrongedQuestions = new Set();
            let completedQuestions = new Set();
            let revealedQuestions = new Set();

            const optionLabelMap = (OPTIONS_BANK || []).reduce((acc, item) => {
                const key = String(item?.key ?? item?.value ?? '');
                const label = String(item?.word ?? item?.label ?? item?.value ?? key);
                if (key) acc[key] = label;
                return acc;
            }, {});

            const audio = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav')
            };
            const questionAudio = document.getElementById('questionAudio');
            const btnPlayAudio = document.getElementById('btnPlayAudio');
            const btnReplayAudio = document.getElementById('btnReplayAudio');
            const scriptOverlay = document.getElementById('scriptOverlay');
            const scriptBackdrop = document.getElementById('scriptBackdrop');
            const btnCloseScript = document.getElementById('btnCloseScript');
            const scriptList = document.getElementById('scriptList');
            const inlineAudioBox = document.getElementById('inlineAudioBox');
            const inlineQuestionAudio = document.getElementById('inlineQuestionAudio');
            const btnPlayInlineAudio = document.getElementById('btnPlayInlineAudio');
            const finalCorrection = document.getElementById('finalCorrection');
            const btnRevealCorrection = document.getElementById('btnRevealCorrection');
            const btnPrev = document.getElementById('btnPrev');
            const btnNext = document.getElementById('btnNext');
            const characterAudios = Array.from(document.querySelectorAll('.character-audio'));
            const imageViewport = document.getElementById('imageViewport');
            const questionImage = document.getElementById('questionImage');
            const IMAGE_HOVER_ZOOM = 2.4;

            characterAudios.forEach((currentAudio) => {
                currentAudio.addEventListener('play', () => {
                    characterAudios.forEach((otherAudio) => {
                        if (otherAudio !== currentAudio) {
                            otherAudio.pause();
                        }
                    });
                });
            });

            function play(sound) {
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function formatTime(seconds) {
                if (!isFinite(seconds) || seconds < 0) seconds = 0;
                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${mins}:${String(secs).padStart(2, '0')}`;
            }

            function syncCustomAudioUI(audioEl, refs) {
                if (!audioEl) return;

                const duration = isFinite(audioEl.duration) ? audioEl.duration : 0;
                const current = isFinite(audioEl.currentTime) ? audioEl.currentTime : 0;
                const pct = duration > 0 ? (current / duration) * 100 : 0;

                if (refs.currentTimeEl) refs.currentTimeEl.textContent = formatTime(current);
                if (refs.totalTimeEl) refs.totalTimeEl.textContent = duration ? formatTime(duration) : '0:00';
                if (refs.progressFill) refs.progressFill.style.width = `${pct}%`;
                if (refs.progressKnob) refs.progressKnob.style.left = `${pct}%`;
                if (refs.playBtn) refs.playBtn.classList.toggle('playing', !audioEl.paused);
            }

            function bindCustomAudioUI(audioEl, refs) {
                if (!audioEl) return;

                if (refs.playBtn) {
                    refs.playBtn.addEventListener('click', () => {
                        if (audioEl.paused) audioEl.play().catch(() => {});
                        else audioEl.pause();
                    });
                }

                if (refs.progressTrack) {
                    refs.progressTrack.addEventListener('click', (event) => {
                        const rect = event.currentTarget.getBoundingClientRect();
                        const x = Math.min(Math.max(0, event.clientX - rect.left), rect.width);
                        const ratio = rect.width > 0 ? x / rect.width : 0;

                        if (isFinite(audioEl.duration) && audioEl.duration > 0) {
                            audioEl.currentTime = ratio * audioEl.duration;
                            syncCustomAudioUI(audioEl, refs);
                        }
                    });
                }

                audioEl.preload = 'metadata';
                ['loadedmetadata', 'timeupdate', 'ended', 'play', 'pause'].forEach((eventName) => {
                    audioEl.addEventListener(eventName, () => syncCustomAudioUI(audioEl, refs));
                });
            }

            const mainAudioRefs = {
                playBtn: btnPlayAudio,
                progressTrack: document.getElementById('questionAudioProgressTrack'),
                progressFill: document.getElementById('questionAudioProgressFill'),
                progressKnob: document.getElementById('questionAudioProgressKnob'),
                currentTimeEl: document.getElementById('questionAudioCurrentTime'),
                totalTimeEl: document.getElementById('questionAudioTotalTime')
            };

            const inlineAudioRefs = {
                playBtn: btnPlayInlineAudio,
                progressTrack: document.getElementById('inlineQuestionAudioProgressTrack'),
                progressFill: document.getElementById('inlineQuestionAudioProgressFill'),
                progressKnob: document.getElementById('inlineQuestionAudioProgressKnob'),
                currentTimeEl: document.getElementById('inlineQuestionAudioCurrentTime'),
                totalTimeEl: document.getElementById('inlineQuestionAudioTotalTime')
            };

            function stopQuestionAudio() {
                if (!questionAudio) return;
                questionAudio.pause();
                questionAudio.currentTime = 0;
                syncCustomAudioUI(questionAudio, mainAudioRefs);
            }

            function stopInlineQuestionAudio() {
                if (!inlineQuestionAudio) return;
                inlineQuestionAudio.pause();
                inlineQuestionAudio.currentTime = 0;
                syncCustomAudioUI(inlineQuestionAudio, inlineAudioRefs);
            }

            function stopCharacterAudios() {
                characterAudios.forEach((characterAudio) => {
                    characterAudio.pause();
                    characterAudio.currentTime = 0;
                });
            }

            function normalizeScriptLines(rawScript) {
                if (Array.isArray(rawScript)) {
                    return rawScript
                        .map((line) => String(line ?? '').trim())
                        .filter((line) => line !== '');
                }

                if (typeof rawScript === 'string') {
                    return rawScript
                        .split(/\r?\n+/)
                        .map((line) => line.trim())
                        .filter((line) => line !== '');
                }

                return [];
            }

            function getCurrentScriptLines() {
                const questionScriptLines = normalizeScriptLines(QUESTIONS[idx]?.script);
                if (questionScriptLines.length > 0) {
                    return questionScriptLines;
                }

                return normalizeScriptLines(GLOBAL_SCRIPT_LINES);
            }

            function renderScriptContent() {
                if (!scriptList) return 0;

                const lines = getCurrentScriptLines();
                scriptList.innerHTML = '';

                lines.forEach((line, lineIndex) => {
                    const item = document.createElement('div');
                    item.className = 'rounded-2xl border border-slate-200/60 bg-white/70 dark:border-slate-700/30 dark:bg-slate-900/20 p-2.5';

                    const row = document.createElement('div');
                    row.className = 'flex items-start gap-2.5';

                    const badge = document.createElement('div');
                    badge.className = 'h-7 w-7 rounded-2xl flex items-center justify-center font-black text-xs border border-slate-200/70 bg-white/70 text-slate-700 dark:border-slate-700/35 dark:bg-slate-900/20 dark:text-slate-200';
                    badge.textContent = String(lineIndex + 1);

                    const textWrap = document.createElement('div');
                    textWrap.className = 'min-w-0 flex-1';

                    const text = document.createElement('div');
                    text.className = 'text-xs sm:text-sm font-semibold text-slate-700 dark:text-slate-200';
                    text.textContent = line;

                    textWrap.appendChild(text);
                    row.appendChild(badge);
                    row.appendChild(textWrap);
                    item.appendChild(row);
                    scriptList.appendChild(item);
                });

                return lines.length;
            }

            function setQuestionImage(src, alt = 'Question image') {
                if (!questionImage) return;

                const nextSrc = src || questionImage.dataset.defaultSrc || '';
                if (questionImage.getAttribute('src') !== nextSrc) {
                    questionImage.src = nextSrc;
                }

                questionImage.alt = alt;
                syncImageViewportAspectRatio();
                resetImageZoom();
            }

            function syncImageViewportAspectRatio() {
                if (!imageViewport || !questionImage) return;

                const { naturalWidth, naturalHeight } = questionImage;
                if (!naturalWidth || !naturalHeight) return;

                const ratio = naturalWidth / naturalHeight;
                imageViewport.style.aspectRatio = `${naturalWidth} / ${naturalHeight}`;
                imageViewport.style.width = `min(100%, calc(72vh * ${ratio} * ${IMAGE_SCALE}))`;
            }

            function resetImageZoom() {
                if (!questionImage) return;

                questionImage.style.transformOrigin = '50% 50%';
                questionImage.style.transform = `scale(${IMAGE_EXTRA_SCALE})`;
            }

            function updateImageZoom(event) {
                if (!imageViewport || !questionImage) return;

                const rect = imageViewport.getBoundingClientRect();
                if (!rect.width || !rect.height) return;

                const x = Math.max(0, Math.min(event.clientX - rect.left, rect.width));
                const y = Math.max(0, Math.min(event.clientY - rect.top, rect.height));

                questionImage.style.transformOrigin = `${(x / rect.width) * 100}% ${(y / rect.height) * 100}%`;
                questionImage.style.transform = `scale(${IMAGE_HOVER_ZOOM * IMAGE_EXTRA_SCALE})`;
            }

            function hideImageZoom() {
                if (!questionImage) return;

                questionImage.style.transformOrigin = '50% 50%';
                questionImage.style.transform = `scale(${IMAGE_EXTRA_SCALE})`;
            }

            function startTimer() {
                clearInterval(timerInt);
                timerInt = setInterval(() => {
                    const elapsed = Math.floor((Date.now() - startTime) / 1000);
                    const mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                    const secs = String(elapsed % 60).padStart(2, '0');
                    document.getElementById('timer').textContent = `${mins}:${secs}`;
                }, 1000);
            }

            function showToast(text, icon = "✨") {
                document.getElementById('toastIcon').textContent = icon;
                document.getElementById('toastText').textContent = text;

                gsap.timeline()
                    .to("#toastOne", { opacity: 1, y: 0, duration: 0.3 })
                    .to("#toastOne", { opacity: 0, y: -10, duration: 0.3 }, "+=1");
            }

            function restartGame() {
                stopQuestionAudio();
                stopInlineQuestionAudio();
                stopCharacterAudios();
                if (scriptOverlay) scriptOverlay.classList.add('hidden');
                document.getElementById('resultsOverlay').classList.add('hidden');
                idx = 0;
                firstTryCorrect = 0;
                wrongTries = 0;
                hintsLeft = 2;
                wrongedQuestions = new Set();
                completedQuestions = new Set();
                revealedQuestions = new Set();
                startTime = Date.now();
                document.getElementById('correctCount').textContent = '0';
                document.getElementById('mistakesCount').textContent = '0';
                startTimer();
                renderQuestion();
            }

            function finishGame() {
                clearInterval(timerInt);

                document.getElementById('finalScore').textContent = `${firstTryCorrect}/${QUESTIONS.length}`;
                document.getElementById('finalTime').textContent = document.getElementById('timer').textContent;
                document.getElementById('finalMistakes').textContent = wrongTries;
                if (finalCorrection) finalCorrection.innerHTML = buildAllCorrectionsHTML();

                document.getElementById('resultsOverlay').classList.remove('hidden');

                play(audio.success);
            }

            function shuffle(items) {
                const copy = [...items];

                for (let index = copy.length - 1; index > 0; index--) {
                    const swapIndex = Math.floor(Math.random() * (index + 1));
                    [copy[index], copy[swapIndex]] = [copy[swapIndex], copy[index]];
                }

                return copy;
            }

            function normalizeOption(option) {
                if (typeof option === 'string') {
                    return {
                        value: option,
                        label: optionLabelMap[option] || option.replace(/_/g, ' '),
                        image: null,
                        alt: optionLabelMap[option] || option.replace(/_/g, ' '),
                    };
                }

                return {
                    value: option?.value ?? option?.label ?? '',
                    label: option?.label ?? optionLabelMap[option?.value] ?? option?.value ?? '',
                    image: option?.image ?? null,
                    alt: option?.alt ?? option?.label ?? optionLabelMap[option?.value] ?? option?.value ?? '',
                };
            }

            function getQuestionPrompt(question) {
                return String(question?.prompt ?? 'Choose the correct answer.');
            }

            function escapeHtml(value) {
                return String(value ?? '')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;');
            }

            function getExpectedOption(question) {
                const options = Array.isArray(question?.options) ? question.options.map(normalizeOption) : [];
                const expectedValue = String(question?.correct ?? '');
                const matchedOption = options.find((option) =>
                    String(option.value) === expectedValue || String(option.label) === expectedValue
                );

                if (matchedOption) {
                    return matchedOption;
                }

                return normalizeOption(expectedValue);
            }

            function getExpectedValue(question) {
                const expectedOption = getExpectedOption(question);
                return String(expectedOption?.value ?? '');
            }

            function buildCorrectionHTML(question, isRevealed) {
                if (!question) return '';

                const answer = getExpectedOption(question);
                const answerClass = isRevealed
                    ? 'bg-rose-100/80 text-rose-900 ring-1 ring-rose-300/70 dark:bg-rose-400/10 dark:text-rose-100 dark:ring-rose-300/30'
                    : 'bg-emerald-100/80 text-emerald-900 ring-1 ring-emerald-300/70 dark:bg-emerald-400/10 dark:text-emerald-100 dark:ring-emerald-300/30';

                return `
                    <span>${escapeHtml(getQuestionPrompt(question))}</span>
                    <span class="inline-flex rounded-xl px-3 py-1 ${answerClass}">${escapeHtml(answer.label || answer.value || '')}</span>
                `;
            }

            function buildAllCorrectionsHTML() {
                return QUESTIONS.map((question, questionIndex) => `
                    <div class="mb-2 flex items-baseline">
                        <span class="pt-1 text-xs font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                            ${questionIndex + 1}.
                        </span>
                        <span class="flex flex-wrap items-center gap-x-2 gap-y-2 min-w-0">${buildCorrectionHTML(question, revealedQuestions.has(questionIndex))}</span>
                    </div>
                `).join('');
            }

            function setNavDisabledState(button, disabled) {
                if (!button) return;
                button.disabled = disabled;
                button.classList.toggle('opacity-60', disabled);
                button.classList.toggle('pointer-events-none', disabled);
                button.classList.toggle('cursor-not-allowed', disabled);
            }

            function updateStatusUI() {
                document.getElementById('qCount').textContent = `${Math.min(idx + 1, Math.max(QUESTIONS.length, 1))}/${Math.max(QUESTIONS.length, 1)}`;
                document.getElementById('correctCount').textContent = String(firstTryCorrect);
                document.getElementById('mistakesCount').textContent = String(wrongTries);
                document.getElementById('hintBadge').textContent = String(hintsLeft);
                setNavDisabledState(btnPrev, idx <= 0);
                setNavDisabledState(btnNext, idx >= QUESTIONS.length - 1);
            }

            function renderTextOption(option) {
                const button = document.createElement('button');
                button.type = 'button';
                button.dataset.value = String(option.value);
                button.className = "p-4 text-left text-sm sm:text-base font-bold rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white leading-[1.35] hover:scale-[1.02] transition-all shadow-sm active:scale-95";
                button.textContent = option.label;
                button.onclick = () => answerChoice(option.value, button);
                return button;
            }

            function renderImageOption(option, visualIndex) {
                const button = document.createElement('button');
                button.type = 'button';
                button.dataset.value = String(option.value);
                button.dataset.label = option.label;
                button.className =
                    "group relative w-full aspect-square overflow-hidden rounded-2xl p-1.5 sm:p-2 " +
                    "border border-slate-200/70 bg-white/60 shadow-lg backdrop-blur-xl dark:border-slate-700/30 dark:bg-slate-950/35 " +
                    "transition-transform duration-200 hover:scale-[1.02] active:scale-[0.98] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500/30" +
                    (IMAGE_OPTION_TILE_CLASS ? ` ${IMAGE_OPTION_TILE_CLASS}` : '');

                const inner = document.createElement('div');
                inner.className = "relative h-full w-full overflow-hidden rounded-[18px] bg-slate-100 dark:bg-slate-900/60";

                if (option.image) {
                    const image = document.createElement('img');
                    image.src = option.image;
                    image.alt = option.alt || option.label || '';
                    image.draggable = false;
                    image.className = "h-full w-full object-cover transition-transform duration-300 group-hover:scale-[1.03]";
                    inner.appendChild(image);
                } else {
                    const fallback = document.createElement('div');
                    fallback.className = "flex h-full w-full items-center justify-center px-3 text-center text-sm font-extrabold text-slate-700 dark:text-slate-200";
                    fallback.textContent = option.label || 'Option';
                    inner.appendChild(fallback);
                }

                const badge = document.createElement('div');
                badge.className =
                    "absolute left-3 top-3 z-10 inline-flex h-8 w-8 items-center justify-center rounded-full border border-white/70 " +
                    "bg-white/90 text-xs font-black text-slate-900 shadow-md dark:border-slate-700/50 dark:bg-slate-900/85 dark:text-slate-50";
                badge.textContent = String.fromCharCode(65 + visualIndex);

                const label = document.createElement('div');
                label.className =
                    "pointer-events-none absolute inset-x-2 bottom-2 rounded-xl border border-white/70 bg-white/90 px-3 py-2 text-center text-xs font-black " +
                    "text-slate-900 shadow-md dark:border-slate-700/50 dark:bg-slate-900/85 dark:text-slate-50";
                label.textContent = option.label || option.value || 'Option';

                const srOnly = document.createElement('span');
                srOnly.className = 'sr-only';
                srOnly.textContent = option.label || option.value || 'Option';

                button.appendChild(srOnly);
                button.appendChild(inner);
                button.appendChild(badge);
                button.appendChild(label);
                button.onclick = () => answerChoice(option.value, button);

                return button;
            }

            function setOptionsGridLayout(grid) {
                grid.className = OPTIONS_GRID_CLASS;
            }

            function markCorrect(button) {
                if (OPTION_TYPE === 'image') {
                    button.classList.add('ring-4', 'ring-emerald-400/70', 'border-emerald-400');
                    return;
                }

                button.classList.add('bg-emerald-500', 'text-white', 'border-emerald-600');
                button.classList.remove('dark:bg-slate-800', 'dark:text-white');
            }

            function markWrong(button) {
                if (OPTION_TYPE === 'image') {
                    button.classList.add('ring-4', 'ring-rose-400/70', 'border-rose-400', 'opacity-60');
                    return;
                }

                button.classList.add('bg-rose-500', 'text-white', 'opacity-50', 'border-rose-600');
                button.classList.remove('dark:bg-slate-800', 'dark:text-white');
            }

            function renderQuestion() {
                const q = QUESTIONS[idx];

                if (GAME_TYPE === 'emoji') {
                    const qEmoji = document.getElementById('qEmoji');
                    if (qEmoji) qEmoji.textContent = q.emoji || q.img || '👋';
                }

                if (inlineAudioBox && inlineQuestionAudio) {
                    const nextAudioSrc = q.audio || DEFAULT_AUDIO || '';
                    const shouldShowInlineAudio = !!nextAudioSrc;

                    inlineAudioBox.classList.toggle('hidden', !shouldShowInlineAudio);

                    if (shouldShowInlineAudio) {
                        if (inlineQuestionAudio.getAttribute('src') !== nextAudioSrc) {
                            inlineQuestionAudio.src = nextAudioSrc;
                            inlineQuestionAudio.load();
                        }
                        syncCustomAudioUI(inlineQuestionAudio, inlineAudioRefs);
                    } else if (inlineQuestionAudio.getAttribute('src')) {
                        stopInlineQuestionAudio();
                        inlineQuestionAudio.removeAttribute('src');
                        inlineQuestionAudio.load();
                    }
                }

                if (GAME_TYPE === 'image') {
                    setQuestionImage(
                        q.image || questionImage?.dataset.defaultSrc || '',
                        q.alt || getQuestionPrompt(q) || 'Question image'
                    );
                }

                const qPromptNumber = document.getElementById('qPromptNumber');
                const qPromptText = document.getElementById('qPromptText');
                if (qPromptNumber) qPromptNumber.textContent = `${idx + 1}.`;
                if (qPromptText) qPromptText.textContent = getQuestionPrompt(q);
                if (btnReplayAudio) {
                    btnReplayAudio.classList.toggle('hidden', getCurrentScriptLines().length === 0);
                }
                updateStatusUI();

                const grid = document.getElementById('optionsGrid');
                grid.innerHTML = "";
                setOptionsGridLayout(grid);

                shuffle((q.options || []).map(normalizeOption)).forEach((option, visualIndex) => {
                    const button = OPTION_TYPE === 'image'
                        ? renderImageOption(option, visualIndex)
                        : renderTextOption(option);

                    grid.appendChild(button);
                });
            }

            function answerChoice(selectedValue, button) {
                const q = QUESTIONS[idx];
                const expectedValue = getExpectedValue(q);
                const actualValue = String(selectedValue);

                if (actualValue === expectedValue) {
                    play(audio.correct);
                    markCorrect(button);
                    completedQuestions.add(idx);

                    if (!wrongedQuestions.has(idx)) {
                        firstTryCorrect++;
                    }

                    updateStatusUI();

                    Array.from(document.getElementById('optionsGrid').children).forEach((optionButton) => {
                        optionButton.disabled = true;
                    });

                    setTimeout(() => {
                        if (idx < QUESTIONS.length - 1) {
                            idx += 1;
                            renderQuestion();
                        } else {
                            finishGame();
                        }
                    }, 600);
                } else {
                    play(audio.wrong);

                    wrongTries++;
                    wrongedQuestions.add(idx);

                    markWrong(button);
                    button.disabled = true;

                    updateStatusUI();
                }
            }

            document.getElementById('btnHint').onclick = () => {
                if (hintsLeft <= 0) return;

                const btns = Array.from(document.getElementById('optionsGrid').children);
                const expectedValue = getExpectedValue(QUESTIONS[idx]);
                const wrong = btns.find((btn) => btn.dataset.value !== expectedValue && !btn.disabled);

                if (wrong) {
                    hintsLeft--;
                    wrong.disabled = true;
                    wrong.classList.add('opacity-30', 'grayscale');
                    updateStatusUI();
                    showToast("Hint used!", "💡");
                }
            };

            function revealCorrection() {
                if (!QUESTIONS.length) return;

                let newlyRevealed = 0;
                for (let i = 0; i < QUESTIONS.length; i++) {
                    if (!completedQuestions.has(i) && !revealedQuestions.has(i)) {
                        revealedQuestions.add(i);
                        newlyRevealed += 1;
                    }
                }

                wrongTries += newlyRevealed;
                updateStatusUI();
                clearInterval(timerInt);
                document.getElementById('finalScore').textContent = `${firstTryCorrect}/${QUESTIONS.length}`;
                document.getElementById('finalTime').textContent = document.getElementById('timer').textContent;
                document.getElementById('finalMistakes').textContent = wrongTries;
                if (finalCorrection) finalCorrection.innerHTML = buildAllCorrectionsHTML();
                document.getElementById('resultsOverlay').classList.remove('hidden');
                showToast("Corrections revealed", "📘");
            }

            document.getElementById('btnRestart').onclick = restartGame;
            document.getElementById('btnRestartPopup').onclick = restartGame;
            btnRevealCorrection?.addEventListener('click', revealCorrection);
            btnPrev?.addEventListener('click', () => {
                if (idx <= 0) return;
                idx -= 1;
                renderQuestion();
            });
            btnNext?.addEventListener('click', () => {
                if (idx >= QUESTIONS.length - 1) return;
                idx += 1;
                renderQuestion();
            });

            bindCustomAudioUI(questionAudio, mainAudioRefs);
            bindCustomAudioUI(inlineQuestionAudio, inlineAudioRefs);

            if (btnReplayAudio) {
                btnReplayAudio.onclick = () => {
                    if (HAS_SCRIPT && renderScriptContent() > 0) {
                        scriptOverlay?.classList.remove('hidden');
                        return;
                    }

                    const activeAudio = inlineQuestionAudio || questionAudio;
                    if (!activeAudio) return;
                    activeAudio.currentTime = 0;
                    activeAudio.play().catch(() => {});
                };
            }

            if (btnCloseScript) {
                btnCloseScript.onclick = () => {
                    scriptOverlay?.classList.add('hidden');
                };
            }

            if (scriptBackdrop) {
                scriptBackdrop.onclick = () => {
                    scriptOverlay?.classList.add('hidden');
                };
            }

            document.getElementById('btnContinue').onclick = () => {
                stopQuestionAudio();
                stopCharacterAudios();
                if (window.parent?.nextSlide) {
                    window.parent.nextSlide();
                }
            };

            window.stopSlideAudio = () => {
                stopQuestionAudio();
                stopInlineQuestionAudio();
                stopCharacterAudios();
            };

            window.addEventListener('pagehide', window.stopSlideAudio);
            window.addEventListener('beforeunload', window.stopSlideAudio);

            if (questionImage) {
                questionImage.addEventListener('load', () => {
                    syncImageViewportAspectRatio();
                    resetImageZoom();
                });
            }  

            if (ENABLE_IMAGE_ZOOM && imageViewport && questionImage) {
                imageViewport.addEventListener('mouseenter', (event) => {
                    updateImageZoom(event);
                });

                imageViewport.addEventListener('mousemove', updateImageZoom);
                imageViewport.addEventListener('mouseleave', hideImageZoom);
                window.addEventListener('resize', () => {
                    syncImageViewportAspectRatio();
                    resetImageZoom();
                });
            }

            renderQuestion();
            updateStatusUI();
            startTimer();
        })();
    </script>
@endsection
