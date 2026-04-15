@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = $content['page_title'] ?? 'Slide';
    $title = $content['title'] ?? '';
    $subtitle = $content['subtitle'] ?? '';
    $bubbles = $content['bubbles'] ?? [];
    $sentences = $content['sentences'] ?? [];
    $items = $content['items'] ?? [];
    $gridClass = $content['grid_class'] ?? 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-6';
    $sentenceGridClass = trim((string) ($content['sentence_grid_class'] ?? 'grid-cols-1 sm:grid-cols-3'));
    $defaultTone = $content['default_tone'] ?? '';
    $defaultGroup = $content['default_group'] ?? '';
    $showSentencePill = $content['show_sentence_pill'] ?? true;
    $showItemGroupBadge = $content['show_item_group_badge'] ?? true;
    $useObjectivesTypography = !empty($content['use_objectives_typography']);
    $wordLabelStyle = trim((string) ($content['word_label_style'] ?? 'font-size: 0.9rem; line-height: 1.05;'));
    $extraCss = trim((string) ($content['extra_css'] ?? ''));
    $normalizeToneKey = static fn ($value) => strtolower(trim((string) preg_replace('/\s+/', ' ', strip_tags((string) $value))));
    $toneAliases = [
        'blue' => 'play',
        'indigo' => 'play',
        'play' => 'play',
        'purple' => 'violet',
        'violet' => 'violet',
        'green' => 'go',
        'teal' => 'go',
        'go' => 'go',
        'orange' => 'do',
        'amber' => 'do',
        'do' => 'do',
    ];
    $knownTones = array_values(array_unique(array_values($toneAliases)));
    $resolveTone = static function ($tone) use ($normalizeToneKey, $toneAliases) {
        $toneKey = $normalizeToneKey($tone);

        return $toneAliases[$toneKey] ?? $toneKey;
    };
    $groupToneMap = [];

    foreach ($sentences as $sentence) {
        $sentenceLabel = $normalizeToneKey($sentence['text'] ?? '');
        $sentenceTone = $resolveTone($sentence['tone'] ?? '');

        if ($sentenceLabel !== '' && in_array($sentenceTone, $knownTones, true)) {
            $groupToneMap[$sentenceLabel] = $sentenceTone;
        }
    }

    $sentenceGridBreakpoints = [
        'base' => null,
        'sm' => '640px',
        'md' => '768px',
        'lg' => '1024px',
        'xl' => '1280px',
        '2xl' => '1536px',
    ];

    $sentenceGridColumns = [];
    foreach (preg_split('/\s+/', $sentenceGridClass) as $token) {
        if (preg_match('/^(?:(sm|md|lg|xl|2xl):)?grid-cols-(\d+)$/', $token, $matches)) {
            $breakpoint = $matches[1] ?: 'base';
            $sentenceGridColumns[$breakpoint] = (int) $matches[2];
        }
    }
@endphp

@extends('slider.simple-layout')

@section('title', $pageTitle)

@section('style')
    <style>
        :root {
            --play-a: #6366f1;
            --play-b: #3b82f6;
            --violet-a: #8b5cf6;
            --violet-b: #7c3aed;
            --go-a: #10b981;
            --go-b: #14b8a6;
            --do-a: #f59e0b;
            --do-b: #f97316;
            --neutral-a: #64748b;
            --neutral-b: #475569;
        }

        .vocab-shell {
            min-height: 100dvh;
            width: 100%;
            overflow-x: hidden;
            background:
                    radial-gradient(980px 560px at 8% 10%, rgba(103,63,231,.14), transparent 55%),
                    radial-gradient(900px 560px at 92% 14%, rgba(59,130,246,.12), transparent 56%),
                    radial-gradient(880px 640px at 50% 100%, rgba(16,185,129,.08), transparent 60%);
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .vocab-inner {
            min-height: 100dvh;
            width: 100%;
            max-width: 80rem;
            margin: 0 auto;
            padding: 2rem 1rem 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .vocab-main {
            width: 100%;
        }

        .vocab-head {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: .55rem;
            text-align: center;
            margin: 2rem 0;
        }

        .vocab-title {
            margin: 0;
            font-size: 2.25rem;
            line-height: 1.08;
            font-weight: 900;
            letter-spacing: -0.04em;
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            padding-bottom: .08em;
        }

        .vocab-subtitle {
            margin: 0 auto;
            max-width: 42rem;
            font-size: 1rem;
            line-height: 1.45;
            font-weight: 700;
            color: #0f172a;
        }

        .bubble-row {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            justify-content: center;
            gap: .5rem;
            margin: 0 auto 1.5rem;
            max-width: 78rem;
        }

        .bubble {
            position: relative;
            border-radius: 22px;
            padding: 14px 16px;
            font-weight: 900;
            line-height: 1.15;
            letter-spacing: -0.02em;
            box-shadow: 0 12px 32px -24px rgba(15,23,42,.45);
            white-space: pre-line;
        }

        .bubble::after {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border: 12px solid transparent;
        }

        .bubble-soft {
            background: rgba(255,255,255,.92);
            color: #0f172a;
            border: 1px solid rgba(226,232,240,.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .bubble-soft::after {
            left: 26px;
            bottom: -18px;
            border-top-color: rgba(255,255,255,.92);
            border-left-color: rgba(255,255,255,.92);
        }

        .bubble-outline {
            background: rgba(239,246,255,.96);
            color: #1e3a8a;
            border: 2px solid rgba(79,70,229,.16);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .bubble-outline::after {
            left: 32px;
            bottom: -22px;
            border-top-color: rgba(79,70,229,.16);
            border-left-color: rgba(79,70,229,.16);
            transform: rotate(10deg);
        }

        .bubble-outline::before {
            content: "";
            position: absolute;
            left: 36px;
            bottom: -16px;
            width: 0;
            height: 0;
            border: 10px solid transparent;
            border-top-color: rgba(239,246,255,.96);
            border-left-color: rgba(239,246,255,.96);
            transform: rotate(10deg);
        }

        .bubble-bold {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: #fff;
            border: 1px solid rgba(255,255,255,.22);
            border-radius: 18px;
            box-shadow: 0 18px 38px -24px rgba(79,70,229,.75);
        }

        .bubble-bold::after {
            left: 58px;
            bottom: -22px;
            border-top-color: #4f46e5;
            border-right-color: #4f46e5;
            transform: rotate(-12deg);
        }

        .bubble-bold::before {
            content: "";
            position: absolute;
            left: 58px;
            bottom: -16px;
            width: 0;
            height: 0;
            border: 10px solid transparent;
            border-top-color: #4f46e5;
            border-right-color: #4f46e5;
            transform: rotate(-12deg);
        }

        .dark .vocab-shell {
            background:
                    radial-gradient(980px 560px at 8% 10%, rgba(96,165,250,.18), transparent 55%),
                    radial-gradient(900px 560px at 92% 14%, rgba(192,132,252,.16), transparent 56%),
                    radial-gradient(880px 640px at 50% 100%, rgba(99,102,241,.12), transparent 60%),
                    linear-gradient(180deg, #020617 0%, #0f172a 100%);
        }

        .dark .vocab-subtitle {
            color: #f1f5f9;
        }

        .vocab-shell.vocab-objectives .vocab-title {
            font-size: 2.25rem;
            line-height: 1.08;
            font-weight: 900;
            letter-spacing: -0.04em;
        }

        .vocab-shell.vocab-objectives .vocab-subtitle {
            font-size: 1rem;
            line-height: 1.45;
            font-weight: 700;
            color: #0f172a;
        }

        .dark .vocab-shell.vocab-objectives .vocab-subtitle {
            color: #f8fafc;
        }

        .vocab-shell.vocab-objectives .sentence-title {
            margin-top: 0;
            font-size: 1rem;
            line-height: 1.45;
            font-weight: 700;
            letter-spacing: 0;
            color: #0f172a;
        }

        .dark .vocab-shell.vocab-objectives .sentence-title {
            color: #ffffff;
        }

        .vocab-shell.vocab-objectives .word-label {
            font-size: 1rem;
            line-height: 1.15;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .vocab-shell.vocab-objectives .sentence-pill {
            font-size: .68rem;
            letter-spacing: .12em;
        }

        @media (min-width: 768px) {
            .vocab-shell.vocab-objectives .vocab-title {
                font-size: 3rem;
            }
        }

        @media (min-width: 1024px) {
            .vocab-shell.vocab-objectives .vocab-title {
                font-size: 3.75rem;
            }

            .vocab-shell.vocab-objectives .vocab-subtitle,
            .vocab-shell.vocab-objectives .sentence-title {
                font-size: 1.15rem;
            }

            .vocab-shell.vocab-objectives .word-label {
                font-size: 1.05rem;
            }
        }

        .sentence-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 1rem;
            max-width: 78rem;
            margin: 0 auto 1.5rem;
        }

        @if(isset($sentenceGridColumns['base']))
        .sentence-grid {
            grid-template-columns: repeat({{ $sentenceGridColumns['base'] }}, minmax(0, 1fr));
        }
        @endif

        @foreach($sentenceGridBreakpoints as $breakpoint => $minWidth)
            @if($breakpoint !== 'base' && isset($sentenceGridColumns[$breakpoint]))
        @media (min-width: {{ $minWidth }}) {
            .sentence-grid {
                grid-template-columns: repeat({{ $sentenceGridColumns[$breakpoint] }}, minmax(0, 1fr));
            }
        }
            @endif
        @endforeach

        .sentence-card,
        .vocab-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.72);
            background: rgba(255,255,255,.72);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 16px 34px -24px rgba(15,23,42,.18);
        }

        .dark .sentence-card,
        .dark .vocab-card {
            border-color: rgba(148,163,184,.18);
            background: rgba(15,23,42,.72);
            box-shadow: 0 18px 44px -24px rgba(2,6,23,.72);
        }

        .dark .sentence-card {
            border-color: rgba(129,140,248,.18);
            background: linear-gradient(180deg, rgba(30,41,59,.88) 0%, rgba(15,23,42,.92) 100%);
        }

        .sentence-card {
            border-radius: 1.5rem;
            padding: 1.1rem 1.15rem;
        }

        .vocab-card { 
            border-radius: 1.5rem;
            display: flex;
            width: 100%;
            max-width: 19rem;
            justify-self: center;
        }

        .vocab-card--empty {
            display: none;
            pointer-events: none;
        }

        @media (min-width: 640px) {
            .vocab-card--empty {
                display: flex;
                visibility: hidden;
            }
        }

        .sentence-card::before,
        .sentence-card::after,
        .vocab-card::before,
        .vocab-card::after {
            content: "";
            position: absolute;
            border-radius: 9999px;
            pointer-events: none;
            filter: blur(10px);
            opacity: .9;
        }

        .sentence-card::before,
        .vocab-card::before {
            width: 110px;
            height: 110px;
            top: -34px;
            right: -22px;
        }

        .sentence-card::after,
        .vocab-card::after {
            width: 84px;
            height: 84px;
            bottom: -34px;
            left: -18px;
            opacity: .55;
        }

        .tone-play::before,
        .group-play::before {
            background: radial-gradient(circle, rgba(99,102,241,.22) 0%, rgba(99,102,241,0) 72%);
        }

        .tone-play::after,
        .group-play::after {
            background: radial-gradient(circle, rgba(59,130,246,.16) 0%, rgba(59,130,246,0) 72%);
        }

        .tone-violet::before,
        .group-violet::before {
            background: radial-gradient(circle, rgba(139,92,246,.22) 0%, rgba(139,92,246,0) 72%);
        }

        .tone-violet::after,
        .group-violet::after {
            background: radial-gradient(circle, rgba(124,58,237,.16) 0%, rgba(124,58,237,0) 72%);
        }

        .tone-go::before,
        .group-go::before {
            background: radial-gradient(circle, rgba(16,185,129,.22) 0%, rgba(16,185,129,0) 72%);
        }

        .tone-go::after,
        .group-go::after {
            background: radial-gradient(circle, rgba(20,184,166,.16) 0%, rgba(20,184,166,0) 72%);
        }

        .tone-do::before,
        .group-do::before {
            background: radial-gradient(circle, rgba(245,158,11,.22) 0%, rgba(245,158,11,0) 72%);
        }

        .tone-do::after,
        .group-do::after {
            background: radial-gradient(circle, rgba(249,115,22,.14) 0%, rgba(249,115,22,0) 72%);
        }

        .tone-neutral::before,
        .group-neutral::before {
            background: radial-gradient(circle, rgba(100,116,139,.22) 0%, rgba(100,116,139,0) 72%);
        }

        .tone-neutral::after,
        .group-neutral::after {
            background: radial-gradient(circle, rgba(71,85,105,.16) 0%, rgba(71,85,105,0) 72%);
        }

        .sentence-row {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            gap: 14px;
        }

        .speak-btn {
            -webkit-tap-highlight-color: transparent;
            border: 0;
            cursor: pointer;
        }

        .speak-btn:focus-visible {
            outline: none;
        }

        .sentence-btn,
        .audio-main {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            border-radius: 999px;
        }

        .sentence-btn {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
        }

        .audio-main {
            width: 38px;
            height: 38px;
            color: #ffffff;
            border: 1px solid rgba(255,255,255,.68);
            background: rgba(255,255,255,.10);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            box-shadow: 0 12px 24px -16px rgba(15,23,42,.45);
        }

        .audio-main .static-icon {
            width: 16px;
            height: 16px;
        }

        .btn-play { background: linear-gradient(135deg, var(--play-a), var(--play-b)); }
        .btn-violet { background: linear-gradient(135deg, var(--violet-a), var(--violet-b)); }
        .btn-go { background: linear-gradient(135deg, var(--go-a), var(--go-b)); }
        .btn-do { background: linear-gradient(135deg, var(--do-a), var(--do-b)); }
        .btn-neutral { background: linear-gradient(135deg, var(--neutral-a), var(--neutral-b)); }

        .audio-main.btn-play {
            background: linear-gradient(135deg, rgba(99,102,241,.18), rgba(59,130,246,.14));
            border-color: rgba(191,219,254,.78);
            box-shadow:
                    0 16px 30px -16px rgba(15,23,42,.45),
                    inset 0 1px 0 rgba(255,255,255,.28),
                    0 0 0 1px rgba(99,102,241,.10);
        }

        .audio-main.btn-violet {
            background: linear-gradient(135deg, rgba(139,92,246,.18), rgba(124,58,237,.14));
            border-color: rgba(221,214,254,.78);
            box-shadow:
                    0 16px 30px -16px rgba(15,23,42,.45),
                    inset 0 1px 0 rgba(255,255,255,.28),
                    0 0 0 1px rgba(139,92,246,.10);
        }

        .audio-main.btn-go {
            background: linear-gradient(135deg, rgba(16,185,129,.18), rgba(20,184,166,.14));
            border-color: rgba(167,243,208,.78);
            box-shadow:
                    0 16px 30px -16px rgba(15,23,42,.45),
                    inset 0 1px 0 rgba(255,255,255,.28),
                    0 0 0 1px rgba(16,185,129,.10);
        }

        .audio-main.btn-do {
            background: linear-gradient(135deg, rgba(245,158,11,.20), rgba(249,115,22,.16));
            border-color: rgba(253,230,138,.8);
            box-shadow:
                    0 16px 30px -16px rgba(15,23,42,.45),
                    inset 0 1px 0 rgba(255,255,255,.28),
                    0 0 0 1px rgba(245,158,11,.10);
        }

        .audio-main.btn-neutral {
            background: linear-gradient(135deg, rgba(100,116,139,.18), rgba(71,85,105,.14));
            border-color: rgba(226,232,240,.78);
            box-shadow:
                    0 16px 30px -16px rgba(15,23,42,.45),
                    inset 0 1px 0 rgba(255,255,255,.28),
                    0 0 0 1px rgba(100,116,139,.10);
        }

        .sentence-pill,
        .tile-badge {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            padding: .35rem .75rem;
            font-size: .72rem;
            line-height: 1;
            font-weight: 900;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #fff;
        }

        .sentence-pill {
            display: inline-block;
            max-width: 100%;
            white-space: normal;
            line-height: 1.3;
            text-transform: none;
            letter-spacing: .02em;
        }

        .pill-play { background: linear-gradient(to right, #6366f1, #3b82f6); }
        .pill-violet { background: linear-gradient(to right, #8b5cf6, #7c3aed); }
        .pill-go { background: linear-gradient(to right, #10b981, #14b8a6); }
        .pill-do { background: linear-gradient(to right, #f59e0b, #f97316); }
        .pill-neutral { background: linear-gradient(to right, #64748b, #475569); }

        .tile-badge {
            padding: .26rem .58rem;
            font-size: .62rem;
            letter-spacing: .06em;
            border: 1px solid rgba(255,255,255,.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 8px 20px -14px rgba(15,23,42,.45);
        }

        .tile-badge.pill-play {
            background: linear-gradient(to right, rgba(99,102,241,.45), rgba(59,130,246,.38));
        }

        .tile-badge.pill-violet {
            background: linear-gradient(to right, rgba(139,92,246,.45), rgba(124,58,237,.38));
        }

        .tile-badge.pill-go {
            background: linear-gradient(to right, rgba(16,185,129,.45), rgba(20,184,166,.38));
        }

        .tile-badge.pill-do {
            background: linear-gradient(to right, rgba(245,158,11,.45), rgba(249,115,22,.38));
        }

        .tile-badge.pill-neutral {
            background: linear-gradient(to right, rgba(100,116,139,.45), rgba(71,85,105,.38));
        }

        .sentence-title {
            margin-top: 8px;
            font-size: 1.05rem;
            line-height: 1.5;
            font-weight: 700;
            letter-spacing: 0;
            color: #0f172a;
            text-align: left;
        }

        .sentence-copy {
            min-width: 0;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .sentence-title-wrap {
            overflow: visible;
            min-width: 0;
            position: relative;
            padding-inline: 2px;
        }

        .sentence-title-text {
            display: block;
            white-space: normal;
            overflow-wrap: anywhere;
            word-break: break-word;
            will-change: auto;
            transform: none;
        }

        .dark .sentence-title {
            color: #ffffff;
        }

        .dark .sentence-pill {
            color: #ffffff;
        }

        .vocab-grid {
            display: grid;
            gap: 1rem;
            justify-items: center;
        }

        .media-box {
            position: relative;
            width: 100%;
            height: 100%;
            aspect-ratio: 4 / 3;
            min-height: 150px;
            overflow: hidden;
            border-radius: inherit;
            border: 1px solid rgba(226,232,240,.8);
            background: #f1f5f9;
        }

        .dark .media-box {
            border-color: rgba(148,163,184,.18);
            background: #0f172a;
        }

        .card-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(2,6,23,.78), rgba(2,6,23,.12) 42%, transparent 72%);
        }

        .dark .card-overlay {
            background:
                    linear-gradient(to top, rgba(2,6,23,.82), rgba(2,6,23,.08)),
                    linear-gradient(135deg, rgba(96,165,250,.16), transparent 58%);
        }

        .group-play .card-overlay {
            background:
                    linear-gradient(to top, rgba(30,41,59,.48), rgba(30,41,59,.02)),
                    linear-gradient(135deg, rgba(99,102,241,.18), transparent 58%);
        }

        .group-go .card-overlay {
            background:
                    linear-gradient(to top, rgba(15,23,42,.44), rgba(15,23,42,.02)),
                    linear-gradient(135deg, rgba(16,185,129,.18), transparent 58%);
        }

        .group-do .card-overlay {
            background:
                    linear-gradient(to top, rgba(15,23,42,.42), rgba(15,23,42,.02)),
                    linear-gradient(135deg, rgba(245,158,11,.18), transparent 58%);
        }

        .group-neutral .card-overlay {
            background:
                    linear-gradient(to top, rgba(15,23,42,.44), rgba(15,23,42,.02)),
                    linear-gradient(135deg, rgba(100,116,139,.18), transparent 58%);
        }

        .card-center-btn {
            position: absolute;
            inset: 0;
            z-index: 2;
            pointer-events: none;
        }

        .card-center-btn .audio-main {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: auto;
        }

        .card-bottom {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 2;
            padding: 12px;
        }

        .txt-shadow {
            text-shadow: 0 10px 28px rgba(0,0,0,.55), 0 2px 10px rgba(0,0,0,.45);
        }

        .title-wrap {
            overflow: visible;
            min-width: 0;
            position: relative;
            padding-inline: 2px;
        }

        .title-text {
            display: block;
            white-space: normal;
            overflow-wrap: anywhere;
            word-break: break-word;
            will-change: auto;
            transform: none;
        }

        .word-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 8px;
        }

        .word-label {
            color: #ffffff;
            font-size: 1rem;
            line-height: 1.15;
            font-weight: 900;
            letter-spacing: -0.02em;
        }

        .word-subtitle {
            display: block;
            margin-top: 4px;
            color: rgba(255,255,255,.88);
            font-size: .72rem;
            line-height: 1.28;
            font-weight: 600;
            letter-spacing: 0;
        }

        .word-label .hot,
        .sentence-title .hot,
        .sentence-pill .hot {
            color: #fb923c;
            font-weight: 900;
            text-shadow:
                    0 0 18px rgba(251, 146, 60, .35),
                    0 2px 12px rgba(0, 0, 0, .35);
        }

        .tile-emoji {
            font-size: 1.05rem;
            line-height: 1;
            filter: drop-shadow(0 3px 10px rgba(0,0,0,.25));
        }

        .dark .tile-emoji {
            filter: drop-shadow(0 6px 16px rgba(2,6,23,.8));
        }

        .wave-bar {
            display: none;
            width: 3px;
            height: 12px;
            background: currentColor;
            border-radius: 2px;
            margin: 0 1px;
        }

        .speak-btn.speaking .wave-bar {
            display: block;
            animation: waveGrowth .6s infinite ease-in-out;
        }

        .speak-btn.speaking .static-icon {
            display: none;
        }

        @keyframes waveGrowth {
            0%,100% { height: 6px; }
            50% { height: 16px; }
        }

        @media (min-width: 640px) {
            .vocab-inner {
                padding: 2.5rem 2rem;
            }

            .vocab-title {
                font-size: 3rem;
            }

            .sentence-grid,
            .vocab-grid {
                gap: 1.25rem;
            }

            .sentence-card {
                padding: 1.2rem 1.25rem;
            }
        }

        @media (min-width: 1024px) {
            .vocab-inner {
                min-height: 100dvh;
            }

            .vocab-title {
                font-size: 3.75rem;
            }

            .vocab-subtitle,
            .word-label {
                font-size: 1.15rem;
            }

            .sentence-title {
                font-size: 1.15rem;
            }
        }

        @media (max-width: 639px) {
            .vocab-title {
                font-size: 1.85rem;
            }

            .sentence-card {
                padding: 12px;
            }

            .sentence-pill {
                display: none;
            }

            .sentence-title {
                margin-top: 0;
                font-size: .95rem;
            }

            .sentence-btn {
                width: 36px;
                height: 36px;
            }

            .media-box {
                min-height: 138px;
            }

            .word-label {
                font-size: .88rem;
            }

            .word-subtitle {
                font-size: .68rem;
            }

            .hide-mobile {
                display: none !important;
            }
        }

        @if($extraCss !== '')
            {!! $extraCss !!}
        @endif
    </style>
@endsection

@section('content')
    <div class="vocab-shell{{ $useObjectivesTypography ? ' vocab-objectives' : '' }}">
        <div class="vocab-inner">
            <main class="vocab-main">
                @include('slider.components.title-subtitle')

            @if(!empty($bubbles))
                    <div class="bubble-row">
                        @foreach($bubbles as $bubble)
                            @php
                                $variant = $bubble['variant'] ?? 'soft';
                                $bubbleClass = match($variant) {
                                    'outline' => 'bubble bubble-outline',
                                    'bold' => 'bubble bubble-bold',
                                    default => 'bubble bubble-soft',
                                };
                                $hideClass = !empty($bubble['hide_on_mobile']) ? 'hide-mobile' : '';
                            @endphp
                            <div class="{{ $bubbleClass }} {{ $hideClass }}">{{ $bubble['text'] ?? '' }}</div>
                        @endforeach
                    </div>
                @endif

                @if(!empty($sentences))
                    <section class="sentence-grid">
                        @foreach($sentences as $s)
                            @php
                                $sentenceText = (string) ($s['text'] ?? '');
                                $sentenceTextHtml = strip_tags($sentenceText, '<span><strong><em><b><i><br>');
                                $sentenceTextPlain = trim((string) preg_replace('/\s+/', ' ', strip_tags($sentenceText)));
                                $sentenceSound = trim((string) ($s['sound'] ?? ''));
                                $hasSentenceAudio = $sentenceSound !== '';
                                $tone = $resolveTone($s['tone'] ?? $defaultTone);

                                $sentenceClass = match($tone) {
                                    'play' => 'tone-play',
                                    'violet' => 'tone-violet',
                                    'go' => 'tone-go',
                                    'do' => 'tone-do',
                                    default => ($tone === '' ? '' : 'tone-neutral'),
                                };

                                $btnClass = match($tone) {
                                    'play' => 'btn-play',
                                    'violet' => 'btn-violet',
                                    'go' => 'btn-go',
                                    'do' => 'btn-do',
                                    default => 'btn-neutral',
                                };

                                $pillClass = match($tone) {
                                    'play' => 'pill-play',
                                    'violet' => 'pill-violet',
                                    'go' => 'pill-go',
                                    'do' => 'pill-do',
                                    default => 'pill-neutral',
                                };
                            @endphp

                            <article class="sentence-card {{ $sentenceClass }}" data-tone="{{ $tone }}">
                                <div class="sentence-row">
                                    @if($hasSentenceAudio)
                                        <button
                                                type="button"
                                                class="speak-btn sentence-btn {{ $btnClass }}"
                                                data-audio="{{ $sentenceSound }}"
                                                aria-label="Play sentence audio"
                                        >
                                            <svg class="static-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>
                                            <div class="wave-bar" style="animation-delay:.1s"></div>
                                            <div class="wave-bar" style="animation-delay:.2s"></div>
                                            <div class="wave-bar" style="animation-delay:.3s"></div>
                                        </button>
                                    @endif

                                    <div class="sentence-copy">
                                        @if($showSentencePill)
                                            <span class="sentence-pill {{ $pillClass }}">{!! $sentenceTextHtml !!}</span>
                                        @endif
                                        <div class="sentence-title" aria-label="{{ $sentenceTextPlain }}">
                                            <div class="sentence-title-wrap">
                                                <span class="sentence-title-text">{!! $sentenceTextHtml !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </section>
                @endif

                <section class="vocab-grid grid {{ $gridClass }}">
                    @foreach($items as $item)
                        @if(!empty($item['placeholder']))
                            <article class="vocab-card vocab-card--empty" aria-hidden="true"></article>
                            @continue
                        @endif

                        @php
                            $itemText = (string) ($item['text'] ?? '');
                            $itemTextHtml = strip_tags($itemText, '<span><strong><em><b><i><br>');
                            $itemTextPlain = trim((string) preg_replace('/\s+/', ' ', strip_tags($itemText)));
                            $itemSubtitle = trim((string) ($item['subtitle'] ?? ''));
                            $itemSubtitleHtml = strip_tags($itemSubtitle, '<span><strong><em><b><i><br>');
                            $itemSound = trim((string) ($item['sound'] ?? ''));
                            $hasItemAudio = $itemSound !== '';
                            preg_match('/^\X/u', $item['emoji'] ?? '', $m);
                            $oneEmoji = $m[0] ?? '';
                            $rawGroup = trim((string) ($item['group'] ?? $defaultGroup));
                            $groupLabel = trim((string) ($item['group_label'] ?? $rawGroup));
                            $mappedGroupTone = $groupToneMap[$normalizeToneKey($groupLabel)] ?? '';
                            $groupTone = $resolveTone($item['tone'] ?? $item['group_tone'] ?? $mappedGroupTone);

                            if ($groupTone === '' && in_array($resolveTone($rawGroup), $knownTones, true)) {
                                $groupTone = $resolveTone($rawGroup);
                            }

                            $groupClass = match($groupTone) {
                                'play' => 'group-play',
                                'violet' => 'group-violet',
                                'go' => 'group-go',
                                'do' => 'group-do',
                                default => ($groupTone === '' ? '' : 'group-neutral'),
                            };

                            $btnClass = match($groupTone) {
                                'play' => 'btn-play',
                                'violet' => 'btn-violet',
                                'go' => 'btn-go',
                                'do' => 'btn-do',
                                default => 'btn-neutral',
                            };

                            $pillClass = match($groupTone) {
                                'play' => 'pill-play',
                                'violet' => 'pill-violet',
                                'go' => 'pill-go',
                                'do' => 'pill-do',
                                default => 'pill-neutral',
                            };
                        @endphp

                        <article class="vocab-card {{ $groupClass }}" data-tone="{{ $groupTone }}">
                            <div class="media-box">
                                <img src="{{ $item['image'] ?? '' }}" alt="{{ $itemTextPlain }}" class="card-img" loading="lazy" draggable="false">
                                <div class="card-overlay"></div>

                                @if($showItemGroupBadge && $groupLabel !== '')
                                    <span class="tile-badge {{ $pillClass }}" style="position:absolute;left:10px;top:10px;z-index:2;">
                                        {{ $groupLabel }}
                                    </span>
                                @endif

                                @if($hasItemAudio)
                                    <div class="card-center-btn">
                                        <button
                                                type="button"
                                                class="speak-btn audio-main {{ $btnClass }}"
                                                data-audio="{{ $itemSound }}"
                                                aria-label="Play item audio"
                                        >
                                            <svg class="static-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>
                                            <div class="wave-bar" style="animation-delay:.1s"></div>
                                            <div class="wave-bar" style="animation-delay:.2s"></div>
                                            <div class="wave-bar" style="animation-delay:.3s"></div>
                                        </button>
                                    </div>
                                @endif

                                <div class="card-bottom">
                                    <div class="word-row">
                                        <div class="title-wrap min-w-0 flex-1 txt-shadow">
                                            <span class="title-text word-label" @if($wordLabelStyle !== '') style="{{ $wordLabelStyle }}" @endif aria-label="{{ $itemTextPlain }}">{!! $itemTextHtml !!}</span>
                                            @if($itemSubtitleHtml !== '')
                                                <span class="word-subtitle">{!! $itemSubtitleHtml !!}</span>
                                            @endif
                                        </div>
                                        @if($oneEmoji !== '')
                                            <span class="tile-emoji txt-shadow">{{ $oneEmoji }}</span>
                                        @endif
                                    </div>
                                </div>
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
        (() => {
            const buttons = Array.from(document.querySelectorAll('.speak-btn'));
            let activeAudio = null;
            let activeButton = null;

            const stopActive = () => {
                if (activeAudio) {
                    activeAudio.pause();
                    activeAudio.currentTime = 0;
                    activeAudio = null;
                }

                if (activeButton) {
                    activeButton.classList.remove('speaking');
                    activeButton = null;
                }
            };

            buttons.forEach((btn) => {
                btn.addEventListener('click', () => {
                    const src = btn.dataset.audio;
                    if (!src) return;

                    if (activeButton === btn && activeAudio) {
                        stopActive();
                        return;
                    }

                    stopActive();

                    const audio = new Audio(src);
                    activeAudio = audio;
                    activeButton = btn;
                    btn.classList.add('speaking');

                    audio.addEventListener('ended', stopActive);
                    audio.addEventListener('error', stopActive);
                    audio.play().catch(stopActive);
                });
            });

        })();
    </script>
@endsection
