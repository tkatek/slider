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
    $readingAllowHtml = array_key_exists('reading_allow_html', $content)
        ? !empty($content['reading_allow_html'])
        : false;
    $showReadingBadge = array_key_exists('show_reading_badge', $content)
        ? !empty($content['show_reading_badge'])
        : true;
    $isOrangeTheme = ($theme['name'] ?? null) === 'orange';
    $rawReadingPassage = $content['passage'] ?? $content['reading'] ?? $content['reading_passage'] ?? [];
    $readingPassage = is_array($rawReadingPassage)
        ? array_values(array_filter(array_map(static fn ($paragraph) => trim((string) $paragraph), $rawReadingPassage), static fn ($paragraph) => $paragraph !== ''))
        : array_values(array_filter(
            array_map('trim', preg_split('/\R{2,}/', trim((string) $rawReadingPassage)) ?: []),
            static fn ($paragraph) => $paragraph !== ''
        ));
    $enableImageZoom = true;
    if (array_key_exists('enable_image_zoom', $content)) {
        $normalizedEnableImageZoom = filter_var($content['enable_image_zoom'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        $enableImageZoom = $normalizedEnableImageZoom ?? (bool) $content['enable_image_zoom'];
    }
    $imagePlain = $content['image_plain'] ?? false;
    $imageScale = (float) ($content['image_scale'] ?? 1);
    $imageExtraScale = (float) ($content['image_extra_scale'] ?? 1);
    $imageAspectRatio = trim((string) ($content['image_aspect_ratio'] ?? ''));
    $imageFitClass = trim((string) ($content['image_fit_class'] ?? 'object-contain'));
    $imageRadius = $content['image_radius'] ?? 'rounded-[1.6rem]';
    $imagePanelColClass = $content['image_panel_col_class']
        ?? ($gameType === 'image' ? 'sm:col-span-7' : ($gameType === 'emoji' ? '' : ($gameType === 'reading' ? 'sm:col-span-6' : 'sm:col-span-5')));
    $answerPanelColClass = $content['answer_panel_col_class']
        ?? ($gameType === 'image' ? 'sm:col-span-5' : ($gameType === 'emoji' ? '' : ($gameType === 'reading' ? 'sm:col-span-6' : (($gameType != 'questions_only' && $gameType !== 'audio') ? 'sm:col-span-7' : 'col-span-12'))));
    $imagePanelInnerClass = $content['image_panel_inner_class'] ?? 'h-full p-2 sm:p-4 lg:p-5';
    $answerPanelInnerClass = $content['answer_panel_inner_class'] ?? 'h-full p-5 sm:p-6 text-left';
    $questionPromptLabel = $content['question_prompt_label'] ?? 'Choose the correct answer:';
    $readingCardLightGlowOne = $isOrangeTheme ? 'rgba(254, 215, 170, .42)' : 'rgba(191,219,254,.42)';
    $readingCardLightGlowTwo = $isOrangeTheme ? 'rgba(253, 186, 116, .30)' : 'rgba(199,210,254,.34)';
    $readingCardDarkGlowOne = $isOrangeTheme ? 'rgba(249, 115, 22, .18)' : 'rgba(59,130,246,.18)';
    $readingCardDarkGlowTwo = $isOrangeTheme ? 'rgba(251, 146, 60, .14)' : 'rgba(129,140,248,.14)';
    $readingAccentGradient = $isOrangeTheme
        ? 'linear-gradient(180deg, #fb923c 0%, #f97316 52%, #ea580c 100%)'
        : 'linear-gradient(180deg, #38bdf8 0%, #4f46e5 52%, #8b5cf6 100%)';
    $readingBadgeBorder = $isOrangeTheme ? 'rgba(251, 146, 60, .24)' : 'rgba(148,163,184,.22)';
    $readingBadgeBg = $isOrangeTheme ? 'rgba(255, 247, 237, .82)' : 'rgba(255,255,255,.72)';
    $readingBadgeDarkBorder = $isOrangeTheme ? 'rgba(251, 146, 60, .24)' : 'rgba(148,163,184,.18)';
    $readingBadgeDarkBg = $isOrangeTheme ? 'rgba(124, 45, 18, .34)' : 'rgba(15,23,42,.64)';
    $readingBadgeText = $isOrangeTheme ? '#c2410c' : '#475569';
    $readingBadgeDarkText = $isOrangeTheme ? '#fdba74' : '#cbd5e1';
    $readingDotGradient = $isOrangeTheme
        ? 'linear-gradient(135deg, #fb923c 0%, #f97316 100%)'
        : 'linear-gradient(135deg, #38bdf8 0%, #6366f1 100%)';
    $readingDropCapLight = $isOrangeTheme ? '#c2410c' : '#4338ca';
    $readingDropCapDark = $isOrangeTheme ? '#fdba74' : '#93c5fd';
    $optionsBank = $content['optionsBank'] ?? [];
    $optionsGridClass = $content['options_grid_class'] ?? 'mt-5 grid grid-cols-1 sm:grid-cols-2 gap-4';
    $gameCardWidth = $content['game_card_width'] ?? ($gameType === 'emoji' ||  $gameType === 'audio'||  $gameType === 'questions_only'? 'max-w-5xl' : 'max-w-[92rem]');
    $imageOptionTileClass = trim((string) ($content['image_option_tile_class'] ?? ''));
    $showImageOptionLabel = array_key_exists('show_image_option_label', $content)
        ? (bool) $content['show_image_option_label']
        : true;
    $shuffleOptions = array_key_exists('shuffle_options', $content)
        ? (bool) $content['shuffle_options']
        : true;
    $normalizeScriptLines = static function ($rawScript) {
        return is_array($rawScript)
            ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawScript), static fn ($line) => $line !== ''))
            : array_values(array_filter(
                array_map('trim', preg_split('/(?<=[.!?])\s+/', trim((string) $rawScript)) ?: []),
                static fn ($line) => $line !== ''
            ));
    };

    $rawScript = $content['script'] ?? [];
    $globalScriptLines = $normalizeScriptLines($rawScript);

    $firstAvailableQuestionAudio = null;
    $firstQuestionScriptLines = [];
    $hasQuestionScript = false;

    foreach (($content['questions'] ?? []) as $questionIndex => $question) {
        if ($firstAvailableQuestionAudio === null && !empty($question['audio'])) {
            $firstAvailableQuestionAudio = $question['audio'];
        }

        $questionScriptLines = $normalizeScriptLines($question['script'] ?? []);
        if ($questionScriptLines !== []) {
            $hasQuestionScript = true;
        }

        if ($questionIndex === 0) {
            $firstQuestionScriptLines = $questionScriptLines;
        }
    }

    $playerAudio = $initialAudio ?: $firstAvailableQuestionAudio;
    $scriptLines = $firstQuestionScriptLines !== [] ? $firstQuestionScriptLines : $globalScriptLines;
    $hasAnyScript = $globalScriptLines !== [] || $hasQuestionScript;
    $hasScript = $hasAnyScript;
@endphp

@section("style")
    <style>
        .modal-scroll{
            scrollbar-width:thin;
            scrollbar-color:rgba(99,102,241,.72) rgba(226,232,240,.42);
            scrollbar-gutter:stable;
        }

        .modal-scroll::-webkit-scrollbar{
            height:12px;
            width:12px;
        }

        .modal-scroll::-webkit-scrollbar-track{
            margin-block:14px;
            border-radius:999px;
            background:rgba(226,232,240,.42);
            border:4px solid transparent;
            background-clip:content-box;
        }

        .modal-scroll::-webkit-scrollbar-thumb{
            border-radius:999px;
            border:3px solid transparent;
            background:
                    linear-gradient(135deg, #38bdf8 0%, #6366f1 54%, #8b5cf6 100%)
                    content-box;
            box-shadow:inset 0 0 0 1px rgba(255,255,255,.28);
        }

        .modal-scroll::-webkit-scrollbar-thumb:hover{
            background:
                    linear-gradient(135deg, #0ea5e9 0%, #4f46e5 54%, #7c3aed 100%)
                    content-box;
        }

        .dark .modal-scroll{
            scrollbar-color:rgba(129,140,248,.82) rgba(30,41,59,.66);
        }

        .dark .modal-scroll::-webkit-scrollbar-track{
            background:rgba(30,41,59,.66);
        }

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
            border:1px solid rgba(251,146,60,.35);
            background:rgba(255,237,213,.95);
            color:#c2410c;
            box-shadow:0 8px 22px rgba(234,88,12,.10);
            cursor:pointer;
            user-select:none;
            -webkit-tap-highlight-color:transparent;
            touch-action:manipulation;
            transition:background-color .18s ease, border-color .18s ease, color .18s ease, transform .18s ease, box-shadow .18s ease;
        }

        .game-modal-close:focus-visible{
            outline:2px solid rgba(249,115,22,.45);
            outline-offset:2px;
        }

        .game-modal-close:hover{
            background:rgb(254 215 170);
            border-color:rgb(253 186 116);
            color:#9a3412;
            transform:scale(1.04);
            box-shadow:0 10px 24px rgba(234,88,12,.14);
        }

        .dark .game-modal-close{
            border-color:rgba(194,65,12,.45);
            background:rgba(154,52,18,.35);
            color:rgb(254 215 170);
            box-shadow:0 8px 22px rgba(120,53,15,.16);
        }

        .dark .game-modal-close:hover{
            background:rgba(154,52,18,.5);
            color:rgb(254 237 213);
        }

        .game-modal-close-sm{
            height:2.25rem;
            width:2.25rem;
            border-radius:.75rem;
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
            transition:transform .2s ease, box-shadow .2s ease, opacity .2s ease, background-color .2s ease;
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

        .mca-inline-audio-box{
            padding:.75rem .85rem;
        }

        .mca-inline-audio-row{
            display:flex;
            align-items:center;
            gap:.75rem;
        }

        .mca-inline-audio-main{
            flex:1;
            min-width:0;
            display:flex;
            align-items:center;
            gap:.65rem;
        }

        .mca-inline-audio-progress{
            flex:1;
            min-width:0;
            display:flex;
            flex-direction:column;
            gap:.35rem;
        }

        .mca-inline-audio-btn{
            height:2.5rem;
            width:2.5rem;
            flex-shrink:0;
        }

        .mca-inline-audio-icon{
            height:1rem;
            width:1rem;
        }

        .mca-inline-audio-track{
            margin-top:0;
            height:8px;
        }

        .mca-inline-audio-times{
            font-size:10px;
        }

        .mca-inline-script-btn{
            flex-shrink:0;
            padding:.32rem .62rem;
            font-size:.7rem;
        }

        .game-modal-primary-btn{
            color:#fff;
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
                    radial-gradient(120% 120% at 0% 0%, {{ $readingCardLightGlowOne }} 0%, transparent 46%),
                    radial-gradient(120% 120% at 100% 0%, {{ $readingCardLightGlowTwo }} 0%, transparent 44%),
                    linear-gradient(180deg, rgba(255,255,255,.95) 0%, rgba(248,250,252,.92) 100%);
            padding:1.2rem;
            box-shadow:0 22px 60px -38px rgba(15,23,42,.28);
        }

        .dark .reading-card{
            border-color:rgba(71,85,105,.88);
            background:
                    radial-gradient(120% 120% at 0% 0%, {{ $readingCardDarkGlowOne }} 0%, transparent 46%),
                    radial-gradient(120% 120% at 100% 0%, {{ $readingCardDarkGlowTwo }} 0%, transparent 44%),
                    linear-gradient(180deg, rgba(15,23,42,.96) 0%, rgba(2,6,23,.94) 100%);
            box-shadow:0 24px 64px -38px rgba(0,0,0,.52);
        }

        .reading-card::before{
            content:"";
            position:absolute;
            inset:0 auto 0 0;
            width:6px;
            background:{{ $readingAccentGradient }};
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
            border:1px solid {{ $readingBadgeBorder }};
            background:{{ $readingBadgeBg }};
            padding:.45rem .78rem;
            font-size:.7rem;
            font-weight:900;
            letter-spacing:.18em;
            text-transform:uppercase;
            color:{{ $readingBadgeText }};
            box-shadow:0 10px 24px rgba(15,23,42,.06);
        }

        .dark .reading-badge{
            border-color:{{ $readingBadgeDarkBorder }};
            background:{{ $readingBadgeDarkBg }};
            color:{{ $readingBadgeDarkText }};
        }

        .reading-badge-dot{
            height:.5rem;
            width:.5rem;
            border-radius:999px;
            background:{{ $readingDotGradient }};
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
            color:#475569;
        }

        .dark .reading-copy p{
            color:#cbd5e1;
        }

        .reading-rich-block{
            margin:0;
            min-width:0;
        }

        .reading-rich-block + .reading-rich-block{
            margin-top:.4rem;
        }

        .reading-rich-block table{
            width:100%;
            border-collapse:separate;
            border-spacing:0;
            overflow:hidden;
            border-radius:1rem;
            border:1px solid rgba(148,163,184,.28);
            background:rgba(255,255,255,.92);
            box-shadow:0 16px 40px -34px rgba(15,23,42,.28);
        }

        .dark .reading-rich-block table{
            border-color:rgba(71,85,105,.78);
            background:rgba(15,23,42,.86);
        }

        .reading-rich-block th,
        .reading-rich-block td{
            padding:.72rem .8rem;
            text-align:left;
            font-size:.88rem;
            line-height:1.4;
            border-right:1px solid rgba(226,232,240,.82);
            border-bottom:1px solid rgba(226,232,240,.82);
        }

        .dark .reading-rich-block th,
        .dark .reading-rich-block td{
            border-right-color:rgba(71,85,105,.82);
            border-bottom-color:rgba(71,85,105,.82);
        }

        .reading-rich-block th{
            background:linear-gradient(135deg, rgba(59,130,246,.13), rgba(99,102,241,.10));
            font-weight:900;
            color:#0f172a;
            letter-spacing:.02em;
        }

        .dark .reading-rich-block th{
            background:linear-gradient(135deg, rgba(59,130,246,.18), rgba(99,102,241,.16));
            color:#f8fafc;
        }

        .reading-rich-block td{
            font-weight:700;
            color:#334155;
        }

        .dark .reading-rich-block td{
            color:#e2e8f0;
        }

        .reading-rich-block tr:last-child td{
            border-bottom:none;
        }

        .reading-rich-block th:last-child,
        .reading-rich-block td:last-child{
            border-right:none;
        }

        .reading-copy p:first-child::first-letter{
            float:left;
            margin:.08rem .5rem 0 0;
            font-size:2.35rem;
            line-height:.86;
            font-weight:900;
            color:{{ $readingDropCapLight }};
        }

        .dark .reading-copy p:first-child::first-letter{
            color:{{ $readingDropCapDark }};
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

            .mca-inline-audio-box{
                padding:.875rem 1.1rem;
            }

            .mca-inline-audio-row{
                gap:1rem;
            }

            .mca-inline-audio-main{
                gap:.75rem;
            }

            .mca-inline-audio-btn{
                height:3rem;
                width:3rem;
            }

            .mca-inline-audio-icon{
                height:1.25rem;
                width:1.25rem;
            }

            .mca-inline-audio-track{
                height:10px;
            }

            .mca-inline-audio-times{
                font-size:11px;
            }

            .mca-inline-script-btn{
                padding:.375rem .75rem;
                font-size:.75rem;
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
                font-size:1.2rem;
            }
        }
    </style>
@endsection

@section("content")
    <div class="font-sans relative isolate min-h-[100dvh] overflow-x-hidden overflow-y-auto dark:text-slate-100 transition-colors duration-300">
        <main id="app" class="w-full max-w-[96rem] min-h-[100dvh] px-4 sm:px-8 lg:px-10 mx-auto pt-3 sm:pt-4 pb-6 sm:pb-8 flex flex-col justify-center">
            <section class="p-2 sm:p-3 lg:p-4 flex-none flex flex-col">
                <div class="grid place-items-center text-center gap-2 sm:gap-3 auto-rows-max">
                    @include('slider.components.title-subtitle', [
                        'titleWrapClass' => 'header-spacing my-2 px-4 text-center sm:my-3 sm:px-6 lg:px-8',
                        'titleSpacingClass' => 'space-y-2',
                    ])

                    @include('slider.components.game-status')

                    <section id="gameCard" class="relative w-full {{ $gameCardWidth }} p-1 sm:p-2.5 lg:p-3 flex-none min-h-[420px] select-none">
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
                                                    @if($showReadingBadge)
                                                        <div class="reading-badge">
                                                            <span class="reading-badge-dot"></span>
                                                            <span>Reading Passage</span>
                                                        </div>
                                                    @endif

                                                    @if($readingTitle !== '')
                                                        <h2 class="reading-title">{{ $readingTitle }}</h2>
                                                    @endif
                                                </div>

                                                <div class="reading-copy">
                                                    @forelse($readingPassage as $paragraph)
                                                        @if($readingAllowHtml)
                                                            <div class="reading-rich-block">{!! $paragraph !!}</div>
                                                        @else
                                                            <p>{{ $paragraph }}</p>
                                                        @endif
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
                                                            class="h-full w-full {{ $imageFitClass }} {{ $imageRadius }} {{ $enableImageZoom ? 'transition-transform duration-150 ease-out will-change-transform' : '' }}"
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
                                                                class="h-full w-full {{ $imageFitClass }} {{ $enableImageZoom ? 'transition-transform duration-150 ease-out will-change-transform' : '' }}"
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
                                    <div class="flex items-center justify-between gap-2 sm:gap-3">
                                        <div id="questionPromptLabel" class="min-w-0 text-[11px] sm:text-base font-extrabold text-slate-500 dark:text-slate-400">
                                            {{ $questionPromptLabel }}
                                        </div>

                                        <button
                                                id="btnRevealCorrection"
                                                class="mca-btn-primary mca-btn-reveal shrink-0 whitespace-nowrap"
                                        >
                                            Reveal correction
                                        </button>
                                    </div>

                                    <div id="sharedAudioPlayerWrap" class="mt-4 mb-4{{ empty($playerAudio) ? ' hidden' : '' }}">
                                        @include('slider.components.audio-player')
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
                                            class="w-full mca-btn-primary py-3 {{ $theme['button_primary_color'] }}"
                                    >
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>
                        @include('slider.components.game-win-modal-correction')

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
            const IMAGE_ASPECT_RATIO = @json($imageAspectRatio);
            const OPTIONS_BANK = @json($optionsBank);
            const OPTIONS_GRID_CLASS = @json($optionsGridClass);
            const IMAGE_OPTION_TILE_CLASS = @json($imageOptionTileClass);
            const SHOW_IMAGE_OPTION_LABEL = @json($showImageOptionLabel);
            const SHUFFLE_OPTIONS = @json($shuffleOptions);
            const QUESTION_PROMPT_LABEL = @json($questionPromptLabel);
            const GLOBAL_SCRIPT_LINES = @json($globalScriptLines);

            let idx = 0;
            let firstTryCorrect = 0;
            let wrongTries = 0;
            let hintsLeft = 2;
            let startTime = Date.now();
            let timerInt = null;
            let wrongedQuestions = new Set();
            let completedQuestions = new Set();
            let revealedQuestions = new Set();
            let selectedCorrectValues = new Map();
            const scoredQuestionCount = QUESTIONS.filter((question) => !isPersonalQuestion(question)).length;

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
            const winModal = document.getElementById('winModal');
            const btnRevealCorrection = document.getElementById('btnRevealCorrection');
            const resultsCorrectionCard = document.getElementById('resultsCorrectionCard');
            const finalCorrection = document.getElementById('finalCorrection');
            const restartBtnModal = document.getElementById('restartBtnModal');
            const continueBtnModal = document.getElementById('continueBtnModal');
            const btnPrev = document.getElementById('btnPrev');
            const btnNext = document.getElementById('btnNext');
            const characterAudios = Array.from(document.querySelectorAll('.character-audio'));
            const imageViewport = document.getElementById('imageViewport');
            const questionImage = document.getElementById('questionImage');
            const IMAGE_HOVER_ZOOM = 2.4;

            const sharedAudioPlayerWrap = document.getElementById('sharedAudioPlayerWrap');
            const sharedAudioPlayerRoot = document.querySelector('[data-audio-player]');
            const sharedAudioPlayerMedia = sharedAudioPlayerRoot ? sharedAudioPlayerRoot.querySelector('[data-audio-player-media]') : null;
            const sharedAudioPlayerSource = sharedAudioPlayerMedia ? sharedAudioPlayerMedia.querySelector('source') : null;
            const sharedAudioPlayerScriptBtn = sharedAudioPlayerRoot ? sharedAudioPlayerRoot.querySelector('[data-audio-player-script-open]') : null;
            const sharedAudioPlayerModal = document.querySelector('[data-audio-player-modal]');
            const sharedAudioPlayerScriptList = sharedAudioPlayerModal ? sharedAudioPlayerModal.querySelector('.space-y-2') : null;

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

            function syncSharedAudioPlayerUI() {
                if (typeof window.syncAudioPlayerUI === 'function') {
                    window.syncAudioPlayerUI();
                }
            }

            function stopSharedAudioPlayer() {
                if (typeof window.stopAudioPlayer === 'function') {
                    window.stopAudioPlayer();
                    return;
                }

                if (!sharedAudioPlayerMedia) return;

                sharedAudioPlayerMedia.pause();
                sharedAudioPlayerMedia.currentTime = 0;
                syncSharedAudioPlayerUI();
            }

            function setSharedAudioPlayerSource(src) {
                if (!sharedAudioPlayerMedia) return;

                const nextSrc = String(src || '');
                const currentSrc = sharedAudioPlayerSource
                    ? String(sharedAudioPlayerSource.getAttribute('src') || '')
                    : String(sharedAudioPlayerMedia.getAttribute('src') || '');

                if (currentSrc === nextSrc) {
                    syncSharedAudioPlayerUI();
                    return;
                }

                stopSharedAudioPlayer();

                if (sharedAudioPlayerSource) {
                    sharedAudioPlayerSource.setAttribute('src', nextSrc);
                    sharedAudioPlayerMedia.load();
                } else {
                    sharedAudioPlayerMedia.src = nextSrc;
                    sharedAudioPlayerMedia.load();
                }

                syncSharedAudioPlayerUI();
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

            function renderAudioPlayerScriptContent(lines) {
                if (!sharedAudioPlayerScriptList) return 0;

                sharedAudioPlayerScriptList.innerHTML = '';

                lines.forEach((line, lineIndex) => {
                    const item = document.createElement('div');
                    item.className = 'rounded-2xl border border-slate-200/60 bg-white/70 p-2.5 dark:border-slate-700/30 dark:bg-slate-900/20';

                    const row = document.createElement('div');
                    row.className = 'flex items-start gap-2.5';

                    const badge = document.createElement('div');
                    badge.className = 'flex h-7 w-7 items-center justify-center rounded-2xl border border-slate-200/70 bg-white/70 text-xs font-black text-slate-700 dark:border-slate-700/35 dark:bg-slate-900/20 dark:text-slate-200';
                    badge.textContent = String(lineIndex + 1);

                    const textWrap = document.createElement('div');
                    textWrap.className = 'min-w-0 flex-1';

                    const text = document.createElement('div');
                    text.className = 'text-xs font-semibold text-slate-700 dark:text-slate-200 sm:text-sm';
                    text.textContent = line;

                    textWrap.appendChild(text);
                    row.appendChild(badge);
                    row.appendChild(textWrap);
                    item.appendChild(row);
                    sharedAudioPlayerScriptList.appendChild(item);
                });

                return lines.length;
            }

            function updateSharedAudioPlayer(question) {
                const nextAudioSrc = question?.audio || DEFAULT_AUDIO || '';
                const lines = getCurrentScriptLines();
                const hasAudio = !!nextAudioSrc;
                const scriptCount = renderAudioPlayerScriptContent(lines);

                if (sharedAudioPlayerWrap) {
                    sharedAudioPlayerWrap.classList.toggle('hidden', !hasAudio);
                }

                if (sharedAudioPlayerRoot) {
                    sharedAudioPlayerRoot.classList.toggle('hidden', !hasAudio);
                }

                if (sharedAudioPlayerScriptBtn) {
                    sharedAudioPlayerScriptBtn.classList.toggle('hidden', scriptCount === 0);
                }

                if (!hasAudio) {
                    if (sharedAudioPlayerModal) {
                        sharedAudioPlayerModal.classList.add('hidden');
                    }
                    stopSharedAudioPlayer();
                    return;
                }

                setSharedAudioPlayerSource(nextAudioSrc);

                if (scriptCount === 0 && sharedAudioPlayerModal) {
                    sharedAudioPlayerModal.classList.add('hidden');
                }
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

                if (IMAGE_ASPECT_RATIO) {
                    const parts = String(IMAGE_ASPECT_RATIO).split('/').map((part) => Number(part.trim()));
                    const forcedWidth = parts[0];
                    const forcedHeight = parts[1];
                    const forcedRatio = forcedWidth > 0 && forcedHeight > 0 ? forcedWidth / forcedHeight : 1;

                    imageViewport.style.aspectRatio = IMAGE_ASPECT_RATIO;
                    imageViewport.style.width = `min(100%, calc(72vh * ${forcedRatio} * ${IMAGE_SCALE}))`;
                    return;
                }

                const { naturalWidth, naturalHeight } = questionImage;
                if (!naturalWidth || !naturalHeight) return;

                const ratio = naturalWidth / naturalHeight;
                imageViewport.style.aspectRatio = `${naturalWidth} / ${naturalHeight}`;
                imageViewport.style.width = `min(100%, calc(72vh * ${ratio} * ${IMAGE_SCALE}))`;
            }

            function applyImageBaseTransform() {
                if (!questionImage) return;

                questionImage.style.transformOrigin = '50% 50%';
                questionImage.style.transform = ENABLE_IMAGE_ZOOM
                    ? `scale(${IMAGE_EXTRA_SCALE})`
                    : 'none';
            }

            function resetImageZoom() {
                applyImageBaseTransform();
            }

            function updateImageZoom(event) {
                if (!ENABLE_IMAGE_ZOOM || !imageViewport || !questionImage) return;

                const rect = imageViewport.getBoundingClientRect();
                if (!rect.width || !rect.height) return;

                const x = Math.max(0, Math.min(event.clientX - rect.left, rect.width));
                const y = Math.max(0, Math.min(event.clientY - rect.top, rect.height));

                questionImage.style.transformOrigin = `${(x / rect.width) * 100}% ${(y / rect.height) * 100}%`;
                questionImage.style.transform = `scale(${IMAGE_HOVER_ZOOM * IMAGE_EXTRA_SCALE})`;
            }

            function hideImageZoom() {
                applyImageBaseTransform();
            }

            function startTimer() {
                clearInterval(timerInt);
                timerInt = setInterval(() => {
                    const elapsed = Math.floor((Date.now() - startTime) / 1000);
                    const mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                    const secs = String(elapsed % 60).padStart(2, '0');
                    document.getElementById('gameTimer').textContent = `${mins}:${secs}`;
                }, 1000);
            }

            function showToast(text, icon = "✨") {
                document.getElementById('toastIcon').textContent = icon;
                document.getElementById('toastText').textContent = text;

                gsap.timeline()
                    .to("#toastOne", { opacity: 1, y: 0, duration: 0.3 })
                    .to("#toastOne", { opacity: 0, y: -10, duration: 0.3 }, "+=1");
            }

            function escapeHtml(value) {
                return String(value ?? '')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;');
            }

            function buildCorrectionHTML(question, isRevealed) {
                if (!question) return '';

                if (isPersonalQuestion(question)) {
                    return `
                        <span>${escapeHtml(getQuestionPrompt(question))}</span>
                        <span class="inline-flex rounded-xl bg-indigo-100/80 px-3 py-1 text-indigo-900 ring-1 ring-indigo-300/70 dark:bg-indigo-400/10 dark:text-indigo-100 dark:ring-indigo-300/30">Personal answer</span>
                    `;
                }

                const answers = getExpectedOptions(question);
                const answerClass = isRevealed
                    ? 'bg-rose-100/80 text-rose-900 ring-1 ring-rose-300/70 dark:bg-rose-400/10 dark:text-rose-100 dark:ring-rose-300/30'
                    : 'bg-emerald-100/80 text-emerald-900 ring-1 ring-emerald-300/70 dark:bg-emerald-400/10 dark:text-emerald-100 dark:ring-emerald-300/30';

                return `
                    <span>${escapeHtml(getQuestionPrompt(question))}</span>
                    ${answers.map((answer) => `
                        <span class="inline-flex rounded-xl px-3 py-1 ${answerClass}">${escapeHtml(answer.label || answer.value || '')}</span>
                    `).join('')}
                `;
            }

            function buildAllCorrectionsHTML() {
                return QUESTIONS.map((question, questionIndex) => `
                    <div class="mb-2 flex items-baseline gap-2">
                        <span class="pt-1 text-xs font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                            ${questionIndex + 1}.
                        </span>
                        <span class="flex min-w-0 flex-wrap items-center gap-x-2 gap-y-2">${buildCorrectionHTML(question, revealedQuestions.has(questionIndex))}</span>
                    </div>
                `).join('');
            }

            function setResultsCorrectionVisible(visible) {
                if (!resultsCorrectionCard) return;

                resultsCorrectionCard.classList.toggle('hidden', !visible);

                if (visible && finalCorrection) {
                    finalCorrection.innerHTML = buildAllCorrectionsHTML();
                }
            }

            function openResultsOverlay(showCorrection = false) {
                document.getElementById('finalCorrect').textContent = `${firstTryCorrect}/${scoredQuestionCount}`;
                document.getElementById('finalTime').textContent = document.getElementById('gameTimer').textContent;
                document.getElementById('finalMistakes').textContent = wrongTries;
                setResultsCorrectionVisible(showCorrection);
                winModal?.classList.remove('hidden');
            }

            function closeResultsOverlay() {
                winModal?.classList.add('hidden');
            }

            function restartGame() {
                stopSharedAudioPlayer();
                stopCharacterAudios();
                sharedAudioPlayerModal?.classList.add('hidden');
                closeResultsOverlay();
                setResultsCorrectionVisible(false);
                idx = 0;
                firstTryCorrect = 0;
                wrongTries = 0;
                hintsLeft = 2;
                wrongedQuestions = new Set();
                completedQuestions = new Set();
                revealedQuestions = new Set();
                selectedCorrectValues = new Map();
                startTime = Date.now();
                document.getElementById('tilesCount').textContent = `0/${QUESTIONS.length}`;
                document.getElementById('correctCount').textContent = '0';
                document.getElementById('mistakesCount').textContent = '0';
                startTimer();
                renderQuestion();
            }

            function finishGame() {
                clearInterval(timerInt);
                openResultsOverlay(false);
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

            function isPersonalQuestion(question) {
                return String(question?.type ?? '').toLowerCase() === 'personal'
                    || question?.is_personal === true;
            }

            function getExpectedOptions(question) {
                if (isPersonalQuestion(question)) return [];

                const options = Array.isArray(question?.options) ? question.options.map(normalizeOption) : [];
                const rawCorrectValues = Array.isArray(question?.correct)
                    ? question.correct
                    : [question?.correct];

                const seen = new Set();

                return rawCorrectValues
                    .map((correctValue) => {
                        const expectedValue = String(correctValue ?? '');
                        const matchedOption = options.find((option) =>
                            String(option.value) === expectedValue || String(option.label) === expectedValue
                        );

                        return matchedOption || normalizeOption(expectedValue);
                    })
                    .filter((option) => {
                        const key = String(option?.value ?? option?.label ?? '');
                        if (!key || seen.has(key)) return false;
                        seen.add(key);
                        return true;
                    });
            }

            function getExpectedValues(question) {
                return new Set(
                    getExpectedOptions(question).map((option) => String(option?.value ?? ''))
                );
            }

            function setNavDisabledState(button, disabled) {
                if (!button) return;
                button.disabled = disabled;
                button.classList.toggle('opacity-60', disabled);
                button.classList.toggle('pointer-events-none', disabled);
                button.classList.toggle('cursor-not-allowed', disabled);
            }

            function getProgressCount() {
                const progressedQuestions = new Set([...completedQuestions, ...revealedQuestions]);
                return Math.min(progressedQuestions.size, QUESTIONS.length);
            }

            function updateStatusUI() {
                document.getElementById('tilesCount').textContent = `${getProgressCount()}/${QUESTIONS.length}`;
                document.getElementById('correctCount').textContent = String(firstTryCorrect);
                document.getElementById('mistakesCount').textContent = String(wrongTries);
                document.getElementById('hintBadge').textContent = String(hintsLeft);
                setNavDisabledState(document.getElementById('btnHint'), hintsLeft <= 0 || isPersonalQuestion(QUESTIONS[idx]));
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

                const srOnly = document.createElement('span');
                srOnly.className = 'sr-only';
                srOnly.textContent = option.label || option.value || 'Option';

                button.appendChild(srOnly);
                button.appendChild(inner);
                button.appendChild(badge);
                if (SHOW_IMAGE_OPTION_LABEL) {
                    const label = document.createElement('div');
                    label.className =
                        "pointer-events-none absolute inset-x-2 bottom-2 rounded-xl border border-white/70 bg-white/90 px-3 py-2 text-center text-xs font-black " +
                        "text-slate-900 shadow-md dark:border-slate-700/50 dark:bg-slate-900/85 dark:text-slate-50";
                    label.textContent = option.label || option.value || 'Option';
                    button.appendChild(label);
                }
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

            function markSelected(button) {
                if (OPTION_TYPE === 'image') {
                    button.classList.add('ring-4', 'ring-indigo-400/70', 'border-indigo-400');
                    return;
                }

                button.classList.add('bg-indigo-500', 'text-white', 'border-indigo-600');
                button.classList.remove('dark:bg-slate-800', 'dark:text-white');
            }

            function renderQuestion() {
                const q = QUESTIONS[idx];

                if (GAME_TYPE === 'emoji') {
                    const qEmoji = document.getElementById('qEmoji');
                    if (qEmoji) qEmoji.textContent = q.emoji || q.img || '👋';
                }

                updateSharedAudioPlayer(q);

                if (GAME_TYPE === 'image') {
                    setQuestionImage(
                        q.image || questionImage?.dataset.defaultSrc || '',
                        q.alt || getQuestionPrompt(q) || 'Question image'
                    );
                }

                const qPromptNumber = document.getElementById('qPromptNumber');
                const qPromptText = document.getElementById('qPromptText');
                const promptLabel = document.getElementById('questionPromptLabel');
                if (qPromptNumber) qPromptNumber.textContent = `${idx + 1}.`;
                if (qPromptText) qPromptText.textContent = getQuestionPrompt(q);
                if (promptLabel) promptLabel.textContent = isPersonalQuestion(q) ? 'Choose your answer:' : QUESTION_PROMPT_LABEL;
                updateStatusUI();

                const grid = document.getElementById('optionsGrid');
                grid.innerHTML = "";
                setOptionsGridLayout(grid);
                const expectedValues = getExpectedValues(q);
                const selectedValues = selectedCorrectValues.get(idx) || new Set();
                const isCompletedQuestion = completedQuestions.has(idx);

                const renderedOptions = SHUFFLE_OPTIONS
                    ? shuffle((q.options || []).map(normalizeOption))
                    : (q.options || []).map(normalizeOption);

                renderedOptions.forEach((option, visualIndex) => {
                    const button = OPTION_TYPE === 'image'
                        ? renderImageOption(option, visualIndex)
                        : renderTextOption(option);

                    const optionValue = String(option.value);
                    if (isPersonalQuestion(q) && selectedValues.has(optionValue)) {
                        markSelected(button);
                        button.disabled = true;
                    } else if (selectedValues.has(optionValue) || (isCompletedQuestion && expectedValues.has(optionValue))) {
                        markCorrect(button);
                        button.disabled = true;
                    } else if (isCompletedQuestion) {
                        button.disabled = true;
                    }

                    grid.appendChild(button);
                });
            }

            function answerChoice(selectedValue, button) {
                const q = QUESTIONS[idx];
                const actualValue = String(selectedValue);

                if (isPersonalQuestion(q)) {
                    if (completedQuestions.has(idx)) return;

                    selectedCorrectValues.set(idx, new Set([actualValue]));
                    completedQuestions.add(idx);
                    markSelected(button);
                    updateStatusUI();

                    Array.from(document.getElementById('optionsGrid').children).forEach((optionButton) => {
                        optionButton.disabled = true;
                    });

                    showToast("Answer saved", "OK");

                    setTimeout(() => {
                        if (idx < QUESTIONS.length - 1) {
                            idx += 1;
                            renderQuestion();
                        } else {
                            finishGame();
                        }
                    }, 600);
                    return;
                }

                const expectedValues = getExpectedValues(q);

                if (expectedValues.has(actualValue)) {
                    const selectedValues = selectedCorrectValues.get(idx) || new Set();
                    if (selectedValues.has(actualValue)) return;

                    selectedValues.add(actualValue);
                    selectedCorrectValues.set(idx, selectedValues);

                    play(audio.correct);
                    markCorrect(button);
                    button.disabled = true;

                    if (selectedValues.size >= expectedValues.size) {
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
                        updateStatusUI();
                    }
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
                if (isPersonalQuestion(QUESTIONS[idx])) return;
                if (hintsLeft <= 0) return;

                const btns = Array.from(document.getElementById('optionsGrid').children);
                const expectedValues = getExpectedValues(QUESTIONS[idx]);
                const wrong = btns.find((btn) => !expectedValues.has(String(btn.dataset.value)) && !btn.disabled);

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
                    if (isPersonalQuestion(QUESTIONS[i])) continue;

                    if (!completedQuestions.has(i) && !revealedQuestions.has(i)) {
                        revealedQuestions.add(i);
                        newlyRevealed += 1;
                    }
                }

                wrongTries += newlyRevealed;
                updateStatusUI();
                clearInterval(timerInt);
                openResultsOverlay(true);
                showToast("Corrections revealed", "📘");
            }

            document.getElementById('btnRestart').onclick = restartGame;
            restartBtnModal?.addEventListener('click', restartGame);
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

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    closeResultsOverlay();
                    sharedAudioPlayerModal?.classList.add('hidden');
                }
            });

            continueBtnModal?.addEventListener('click', () => {
                stopSharedAudioPlayer();
                stopCharacterAudios();
                if (window.parent?.nextSlide) {
                    window.parent.nextSlide();
                }
            });

            window.stopSlideAudio = () => {
                stopSharedAudioPlayer();
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

            if (imageViewport && questionImage) {
                window.addEventListener('resize', () => {
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
            }

            renderQuestion();
            updateStatusUI();
            startTimer();
        })();
    </script>
@endsection
