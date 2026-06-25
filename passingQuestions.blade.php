<?php
$questionData = require base_path('resources/views/slider/questions.php');

$appData = [
    'topics' => $questionData['topics'] ?? [],
];
?>
        <!doctype html>
<html lang="en" class="h-full bg-[#f4f6ff]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Passing Questions Card</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Manrope', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'sans-serif'],
                    },
                    colors: {
                        pq: {
                            canvas: '#f4f6ff',
                            text: '#1a1b2e',
                            primary: '#665de8',
                            primaryDark: '#554bd2',
                            accent: '#ff8a7a',
                        },
                    },
                    boxShadow: {
                        pqPanel: '0 28px 80px rgba(38,35,92,.14)',
                    },
                    screens: {
                        short: { raw: '(min-width: 768px) and (max-height: 760px)' },
                        laptop: { raw: '(min-width: 1280px) and (max-height: 840px)' },
                        desktop: { raw: '(min-width: 1440px)' },
                        wide: { raw: '(min-width: 1536px)' },
                        ultra: { raw: '(min-width: 1800px)' },
                        sidebar: { raw: '(min-width: 1280px)' },
                    },
                },
            },
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root { --pq-ease: cubic-bezier(.2, .8, .2, 1); }

        button:focus-visible,
        [tabindex]:focus-visible {
            outline: 3px solid rgba(102, 93, 232, .32);
            outline-offset: 3px;
        }

        [data-question-content],
        .pq-transcript-panel {
            scrollbar-width: thin;
            scrollbar-color: rgba(102,93,232,.24) transparent;
        }
        [data-question-content]::-webkit-scrollbar { width: 6px; }
        [data-question-content]::-webkit-scrollbar-thumb,
        .pq-transcript-panel::-webkit-scrollbar-thumb {
            border-radius: 999px;
            background: rgba(102,93,232,.24);
        }
        .pq-transcript-panel::-webkit-scrollbar { width: 5px; }
        @media (max-width: 520px) {
            [data-question-content], .pq-transcript-panel { scrollbar-width: none; -ms-overflow-style: none; }
            [data-question-content]::-webkit-scrollbar, .pq-transcript-panel::-webkit-scrollbar { display: none; width: 0; height: 0; }
        }

        .pq-panel.is-page-transitioning { pointer-events: none; }
        .pq-panel.is-page-transitioning [data-question-content],
        .pq-panel.is-page-transitioning [data-section-title] { animation: pqPageOut 180ms ease-in both; }
        .pq-panel.is-revealing [data-question-content],
        .pq-panel.is-revealing [data-section-title],
        .pq-panel.is-revealing [data-page-counter] { animation: pqPageIn 420ms var(--pq-ease) both; }

        .pq-progress-bar::after {
            position: absolute;
            inset: 0;
            background: linear-gradient(100deg, transparent 20%, rgba(255,255,255,.72) 48%, transparent 74%);
            content: "";
            transform: translateX(-120%);
            animation: pqProgressShine 2.8s ease-in-out infinite;
        }
        [data-progress-track] { touch-action: none; user-select: none; }
        [data-progress-track].is-scrubbing { cursor: grabbing; }
        .pq-section-dot { animation: pqSectionDot 2.8s ease-in-out infinite; }
        .pq-image-frame img { animation: pqImageReveal 560ms var(--pq-ease) both; }
        @media (hover:hover) and (pointer:fine) { .pq-image-frame:hover img { filter: saturate(1.04) contrast(1.015); transform: scale(1.018); } }

        .pq-list-row { position: relative; overflow: hidden; animation: pqOptionEnter 430ms var(--pq-ease) both; }
        .pq-list-row:nth-child(1) { animation-delay: 30ms; }
        .pq-list-row:nth-child(2) { animation-delay: 70ms; }
        .pq-list-row:nth-child(3) { animation-delay: 110ms; }
        .pq-list-row:nth-child(4) { animation-delay: 150ms; }
        .pq-list-row:nth-child(5) { animation-delay: 190ms; }
        .pq-list-row:nth-child(6) { animation-delay: 230ms; }
        .pq-list-row:nth-child(n+7) { animation-delay: 270ms; }
        .pq-list-row::before {
            position: absolute;
            inset: 0 auto 0 0;
            width: 4px;
            border-radius: 0 999px 999px 0;
            background: linear-gradient(to bottom, #7c7ff6, #ff8a7a);
            content: "";
            opacity: 0;
            transform: scaleY(.35);
            transition: opacity 180ms ease, transform 180ms var(--pq-ease);
        }
        .is-audio-playing.pq-list-row { border-color: rgba(102,93,232,.3) !important; background: linear-gradient(135deg, rgba(245,244,255,.98), rgba(255,249,248,.96)) !important; box-shadow: 0 14px 30px rgba(91,80,220,.14) !important; }
        .is-audio-playing.pq-list-row::before { opacity: 1; transform: scaleY(1); }

        .pq-audio-btn { position: relative; isolation: isolate; overflow: visible; }
        .pq-audio-btn::before {
            position: absolute;
            inset: -6px;
            z-index: -1;
            border: 2px solid rgba(102, 93, 232, .34);
            border-radius: inherit;
            content: "";
            opacity: 0;
            transform: scale(.8);
            pointer-events: none;
        }
        .pq-audio-btn > * { position: relative; z-index: 1; }
        .pq-audio-wave { display: none; }
        .pq-audio-wave span { transform-origin: center bottom; animation: pqAudioBar .58s ease-in-out infinite alternate; }
        .pq-audio-wave span:nth-child(2) { animation-delay: 120ms; }
        .pq-audio-wave span:nth-child(3) { animation-delay: 240ms; }
        .pq-audio-btn.is-playing { transform: scale(1.055); box-shadow: 0 16px 32px rgba(91,80,220,.34) !important; }
        .pq-audio-btn.is-playing::before { animation: pqAudioRing 1.45s ease-out infinite; }
        .pq-audio-btn.is-playing .pq-audio-icon { display: none; }
        .pq-audio-btn.is-playing .pq-audio-wave { display: inline-flex; }
        [data-audio-text], [data-audio-copy] { transition: color 180ms ease, text-shadow 180ms ease; }
        .is-audio-playing [data-audio-text] { color: #554bd2 !important; animation: pqTextPulse 1.05s ease-in-out infinite alternate; }
        .is-audio-playing [data-audio-copy] { color: #665de8 !important; animation: pqTextPulseSoft 1.15s ease-in-out infinite alternate; }
        .pq-reveal-caret { display: inline-block; margin-left: .08em; color: #665de8; font-weight: 900; animation: pqRevealCaretBlink .82s steps(1) infinite; }

        [data-conversation-mobile-button] { display: inline-flex !important; }
        .pq-conversation-line [data-conversation-bubble-button] { display: none !important; position: absolute; top: .95rem; right: .95rem; }
        @media (min-width: 1024px) {
            [data-conversation-mobile-button] { display: none !important; }
            .pq-conversation-line.is-active [data-conversation-bubble-button],
            .is-conversation-idle .pq-conversation-line[data-conversation-starter="true"] [data-conversation-bubble-button] { display: inline-flex !important; }
            .pq-conversation-line[data-side="left"]::after,
            .pq-conversation-line[data-side="right"]::after { position: absolute; top: 1.55rem; width: 0; height: 0; content: ""; border-top: .6rem solid transparent; border-bottom: .6rem solid transparent; }
            .pq-conversation-line[data-side="left"]::after { left: -.72rem; border-right: .72rem solid #111827; }
            .pq-conversation-line[data-side="right"]::after { right: -.72rem; border-left: .72rem solid #111827; }
        }
        .pq-conversation-speaker.is-active figure,
        .pq-conversation-line.is-active { border-color: rgba(102, 93, 232, .72) !important; box-shadow: 0 14px 32px rgba(91, 80, 220, .16) !important; }
        .pq-conversation-line.is-active { background: linear-gradient(135deg, rgba(245,244,255,.98), rgba(255,249,248,.96)) !important; }
        .pq-conversation-line.is-active [data-conversation-text] { color: #554bd2 !important; }

        .pq-video-wrap .video-js,
        .pq-video-wrap > video,
        .pq-short-video-wrap .video-js,
        .pq-short-video-wrap > video { width: 100% !important; height: 100% !important; margin: 0 auto; background: #090910; font-family: inherit; }
        .pq-video-wrap .video-js .vjs-tech,
        .pq-video-wrap .video-js .vjs-poster,
        .pq-video-wrap .video-js .vjs-poster img,
        .pq-short-video-wrap .video-js .vjs-tech,
        .pq-short-video-wrap .video-js .vjs-poster,
        .pq-short-video-wrap .video-js .vjs-poster img { width: 100%; height: 100%; object-fit: contain !important; object-position: center center !important; }
        .pq-video-wrap .vjs-picture-in-picture-control,
        .pq-short-video-wrap .vjs-picture-in-picture-control { display: none !important; }
        .pq-video-wrap .video-js .vjs-big-play-button {
            top: 50% !important; left: 50% !important; width: 3.75rem; height: 3.75rem; margin: 0;
            transform: translate(-50%, -50%); border: 0; border-radius: 999px;
            background: linear-gradient(145deg, rgba(124,127,246,.96), rgba(102,93,232,.96));
            box-shadow: 0 14px 34px rgba(18,18,40,.32); line-height: 3.75rem;
        }
        .pq-video-wrap .video-js:hover .vjs-big-play-button,
        .pq-video-wrap .video-js .vjs-big-play-button:focus { filter: brightness(1.06); transform: translate(-50%, -50%) scale(1.06); }
        .pq-video-wrap .video-js .vjs-big-play-button .vjs-icon-placeholder::before { font-size: 2.25rem; line-height: 3.75rem; text-shadow: none; }
        @media (min-width: 1024px) {
            .pq-video-wrap .video-js .vjs-big-play-button { width: 4.35rem; height: 4.35rem; line-height: 4.35rem; }
            .pq-video-wrap .video-js .vjs-big-play-button .vjs-icon-placeholder::before { font-size: 2.5rem; line-height: 4.35rem; }
        }
        .pq-video-wrap .pq-vjs-cc-button .vjs-icon-placeholder,
        .pq-short-video-wrap .pq-vjs-cc-button .vjs-icon-placeholder { display: grid; place-items: center; width: 100%; height: 100%; font-size: .78rem; font-weight: 950; letter-spacing: .02em; line-height: 1; text-shadow: none; }
        .pq-video-wrap .pq-vjs-cc-button .vjs-icon-placeholder::before,
        .pq-short-video-wrap .pq-vjs-cc-button .vjs-icon-placeholder::before { content: "" !important; }
        .pq-video-wrap .pq-vjs-cc-button.is-active,
        .pq-video-wrap .pq-vjs-cc-button:hover,
        .pq-short-video-wrap .pq-vjs-cc-button.is-active,
        .pq-short-video-wrap .pq-vjs-cc-button:hover { color: #fff; background: rgba(102, 93, 232, .92); }
        .pq-video-wrap .video-js .vjs-control-bar,
        .pq-short-video-wrap .video-js .vjs-control-bar { transition: opacity 120ms ease, visibility 120ms ease, transform 120ms ease !important; }
        .pq-video-wrap .video-js.vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar,
        .pq-short-video-wrap .video-js.vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar { opacity: 0 !important; visibility: hidden !important; transform: translateY(100%) !important; pointer-events: none !important; }
        .pq-video-caption-overlay.is-visible .pq-video-caption-text { opacity: 1; transform: translateY(0) scale(1); }
        .pq-video-wrap .video-js.vjs-user-active .pq-video-caption-overlay,
        .pq-video-wrap .video-js.vjs-paused .pq-video-caption-overlay { bottom: clamp(3.85rem, 12%, 5rem); }
        .pq-video-wrap .video-js.vjs-user-inactive.vjs-playing .pq-video-caption-overlay { bottom: clamp(.8rem, 4%, 1.75rem); }
        .pq-short-video-wrap .video-js.vjs-user-active .pq-video-caption-overlay,
        .pq-short-video-wrap .video-js.vjs-paused .pq-video-caption-overlay { bottom: clamp(4rem, 12%, 5.5rem); }
        .pq-short-video-wrap .video-js.vjs-user-inactive.vjs-playing .pq-video-caption-overlay { bottom: clamp(2.25rem, 8%, 4.75rem); }
        .video-js.vjs-fullscreen .pq-video-caption-overlay { bottom: clamp(2.1rem, 7%, 5.2rem); z-index: 10000; width: min(86%, 70rem); }
        .video-js.vjs-fullscreen .pq-video-caption-text { border-radius: 1rem; padding: .7rem 1.1rem; font-size: clamp(1.05rem, 2.1vw, 1.7rem); }

        .pq-short-video-overlay.is-hidden { opacity: 0; visibility: hidden; pointer-events: none; }
        .pq-short-video-overlay:hover .pq-short-play-circle { transform: scale(1.045); }

        .pq-transcript-row.is-active { background: linear-gradient(135deg, rgba(102,93,232,.12), rgba(255,255,255,.98)); }
        .pq-transcript-row.is-active .pq-transcript-time,
        .pq-transcript-row.is-active .pq-transcript-text,
        .pq-transcript-row.is-active .pq-transcript-chevron { color: #554bd2; }

        .pq-quiz-item { display: none; }
        .pq-quiz-item.is-current { display: block; animation: pqPageIn 300ms var(--pq-ease) both; }
        .pq-quiz-option.is-correct { border-color: rgba(34,197,94,.9) !important; background: rgba(240,253,244,.96) !important; color: #15803d !important; box-shadow: 0 8px 20px rgba(34,197,94,.12) !important; }
        .pq-quiz-option.is-wrong { border-color: rgba(239,68,68,.88) !important; background: rgba(254,242,242,.96) !important; color: #b91c1c !important; animation: pqShake 320ms ease; }
        .pq-quiz-item.is-correct-flash .pq-quiz-question { color: #15803d; }
        .pq-quiz-item.is-wrong-flash .pq-quiz-question { color: #b91c1c; }

        .pq-action-button,
        .pq-action-button *,
        button[data-prev-button],
        button[data-next-button],
        button[data-quiz-submit] { transition: none !important; }
        .pq-action-button::before { display: none !important; content: none !important; }
        .pq-action-button:hover,
        .pq-action-button:active,
        button[data-prev-button]:hover,
        button[data-prev-button]:active,
        button[data-next-button]:hover,
        button[data-next-button]:active,
        button[data-quiz-submit]:hover,
        button[data-quiz-submit]:active { transform: none !important; }


        /* RESPONSIVE_FIXES_V2: laptop video, transcript, and short-mobile behavior */
        @media (min-width: 1280px) and (max-height: 840px) {
            .pq-video-no-quiz .pq-video-main-column {
                max-width: min(100%, 48rem) !important;
            }

            .pq-video-no-quiz .pq-video-wrap {
                max-height: min(44dvh, 22rem) !important;
            }

            .pq-video-no-quiz.is-transcript-open .pq-video-wrap {
                height: min(37dvh, 18rem) !important;
                max-height: min(37dvh, 18rem) !important;
            }

            .pq-video-no-quiz.is-transcript-open .pq-transcript-panel {
                max-height: 5.25rem !important;
            }

            .pq-video-no-quiz.is-transcript-open .pq-transcript-row {
                min-height: 1.8rem !important;
                padding-top: .25rem !important;
                padding-bottom: .25rem !important;
            }

            .pq-video-has-quiz .pq-video-wrap {
                max-height: min(48dvh, 24rem) !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-video-wrap {
                max-height: min(42dvh, 21rem) !important;
            }

            .pq-video-has-quiz .pq-transcript-panel {
                max-height: 5rem !important;
            }

            .pq-video-has-quiz .pq-transcript-row {
                min-height: 1.8rem !important;
                padding-top: .25rem !important;
                padding-bottom: .25rem !important;
            }
        }

        @media (max-width: 767px) {
            .pq-video-has-quiz .pq-video-inner-layout {
                gap: .85rem !important;
            }

            .pq-video-has-quiz .pq-video-main-column,
            .pq-video-has-quiz .pq-video-side-column {
                flex-shrink: 0 !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-video-wrap {
                height: min(27dvh, 11.75rem) !important;
                max-height: min(27dvh, 11.75rem) !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-transcript-panel {
                max-height: 4.6rem !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-transcript-row {
                min-height: 1.72rem !important;
                padding-top: .24rem !important;
                padding-bottom: .24rem !important;
            }

            .pq-video-has-quiz .pq-video-side-column {
                margin-top: .35rem !important;
            }

            .pq-video-has-quiz .pq-quiz-question {
                margin-bottom: .55rem !important;
                font-size: clamp(1.02rem, 4.8vw, 1.22rem) !important;
                line-height: 1.06 !important;
            }
        }

        @media (max-width: 420px) and (max-height: 700px) {
            .pq-short-video-shell {
                height: min(100%, calc(100dvh - 15.75rem), 24.5rem) !important;
                max-width: min(100%, 15.75rem) !important;
                border-radius: 1.35rem !important;
            }

            [data-short-video-page] {
                padding-top: .25rem !important;
                padding-bottom: .25rem !important;
            }

            [data-nav-actions] {
                padding-top: .45rem !important;
                gap: .5rem !important;
            }

            [data-nav-actions] button {
                min-height: 2.75rem !important;
                border-radius: .9rem !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-video-wrap {
                height: min(25dvh, 10.75rem) !important;
                max-height: min(25dvh, 10.75rem) !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-transcript-panel {
                max-height: 3.85rem !important;
            }

            .pq-video-has-quiz .pq-quiz-question {
                font-size: 1rem !important;
                line-height: 1.05 !important;
            }
        }

        @media (max-width: 420px) and (min-height: 701px) {
            .pq-short-video-shell {
                height: min(100%, calc(100dvh - 14.25rem), 31rem) !important;
                max-width: min(100%, 18.25rem) !important;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation-duration: .001ms !important; animation-iteration-count: 1 !important; scroll-behavior: auto !important; transition-duration: .001ms !important; }
        }

        @keyframes pqPageOut { to { opacity: 0; transform: translateX(-16px) scale(.988); } }
        @keyframes pqPageIn { from { opacity: 0; transform: translateX(22px) scale(.985); } to { opacity: 1; transform: translateX(0) scale(1); } }
        @keyframes pqImageReveal { from { opacity: 0; transform: scale(1.035); } to { opacity: 1; transform: scale(1); } }
        @keyframes pqOptionEnter { from { opacity: 0; transform: translateY(11px) scale(.985); } to { opacity: 1; transform: translateY(0) scale(1); } }
        @keyframes pqAudioRing { 0% { opacity: .75; transform: scale(.84); } 100% { opacity: 0; transform: scale(1.34); } }
        @keyframes pqAudioBar { from { transform: scaleY(.48); opacity: .72; } to { transform: scaleY(1.14); opacity: 1; } }
        @keyframes pqTextPulse { from { text-shadow: 0 0 0 rgba(102,93,232,0); } to { text-shadow: 0 7px 20px rgba(102,93,232,.2); } }
        @keyframes pqTextPulseSoft { from { text-shadow: 0 0 0 rgba(102,93,232,0); } to { text-shadow: 0 5px 16px rgba(102,93,232,.14); } }
        @keyframes pqRevealCaretBlink { 0%,100% { opacity: 1; } 50% { opacity: 0; } }
        @keyframes pqProgressShine { 0%,55% { transform: translateX(-120%); } 82%,100% { transform: translateX(120%); } }
        @keyframes pqSectionDot { 0%,100% { transform: scale(1); box-shadow: 0 0 0 4px rgba(255,138,122,.12); } 50% { transform: scale(1.08); box-shadow: 0 0 0 7px rgba(255,138,122,.06); } }
        @keyframes pqOrbOne { from { transform: translate3d(0,0,0) scale(1); } to { transform: translate3d(2.8rem,1.8rem,0) scale(1.08); } }
        @keyframes pqOrbTwo { from { transform: translate3d(0,0,0) scale(1.05); } to { transform: translate3d(-2.2rem,-1.5rem,0) scale(.96); } }
        @keyframes pqOrbThree { from { transform: translate3d(0,-.5rem,0); } to { transform: translate3d(-1.5rem,1.5rem,0); } }
        @keyframes pqShake { 0%,100% { transform: translateX(0); } 25% { transform: translateX(-4px); } 75% { transform: translateX(4px); } }
    </style>
</head>
<body class="relative min-h-dvh overflow-hidden overscroll-none bg-[radial-gradient(circle_at_12%_10%,rgba(124,127,246,.16),transparent_29rem),radial-gradient(circle_at_92%_88%,rgba(255,138,122,.14),transparent_28rem),linear-gradient(145deg,#fbfcff_0%,#f4f5ff_48%,#eef3ff_100%)] font-sans text-[#1a1b2e] antialiased">
{{-- TAILWIND-FIRST BUILD 2026-06-25: sidebar menu + stable video frame transcript + compact video quiz + no-crop shorts + no action-button animation --}}
<div class="pointer-events-none fixed inset-0 z-0 bg-[linear-gradient(rgba(102,93,232,.035)_1px,transparent_1px),linear-gradient(90deg,rgba(102,93,232,.035)_1px,transparent_1px)] bg-[length:34px_34px] [mask-image:linear-gradient(to_bottom,rgba(0,0,0,.5),transparent_78%)]" aria-hidden="true"></div>
@include("slider.menu", ["active" => "speaking"])
<div class="fixed inset-0 z-0 overflow-hidden pointer-events-none" aria-hidden="true">
    <span class="pq-orb pq-orb-one pointer-events-none absolute -top-32 -left-28 h-80 w-80 rounded-full bg-[radial-gradient(circle_at_35%_35%,rgba(255,255,255,.98),rgba(124,127,246,.22)_48%,transparent_72%)] opacity-90 blur-[3px] will-change-transform [animation:pqOrbOne_12s_ease-in-out_infinite_alternate]"></span>
    <span class="pq-orb pq-orb-two pointer-events-none absolute -right-32 -bottom-36 h-[25rem] w-[25rem] rounded-full bg-[radial-gradient(circle_at_42%_42%,rgba(255,255,255,.58),rgba(255,138,122,.2)_48%,transparent_73%)] opacity-90 blur-[3px] will-change-transform [animation:pqOrbTwo_15s_ease-in-out_infinite_alternate]"></span>
    <span class="pq-orb pq-orb-three pointer-events-none absolute right-[5%] top-[40%] h-32 w-32 rounded-full bg-[radial-gradient(circle,rgba(66,207,162,.14),transparent_68%)] opacity-90 blur-[3px] will-change-transform [animation:pqOrbThree_10s_ease-in-out_infinite_alternate]"></span>
</div>

<main class="pq-page fixed top-0 right-0 bottom-[calc(72px+env(safe-area-inset-bottom))] left-0 z-[1] grid min-h-0 w-auto place-items-center overflow-hidden p-[max(8px,env(safe-area-inset-top,0px))_max(8px,env(safe-area-inset-right,0px))_max(8px,env(safe-area-inset-bottom,0px))_max(8px,env(safe-area-inset-left,0px))] min-[421px]:bottom-[calc(96px+env(safe-area-inset-bottom))] min-[681px]:bottom-[calc(96px+env(safe-area-inset-bottom))] min-[1280px]:bottom-0 min-[1280px]:left-[340px] sm:p-[max(14px,env(safe-area-inset-top,0px))_max(14px,env(safe-area-inset-right,0px))_max(14px,env(safe-area-inset-bottom,0px))_max(14px,env(safe-area-inset-left,0px))] lg:p-[max(20px,env(safe-area-inset-top,0px))_max(20px,env(safe-area-inset-right,0px))_max(20px,env(safe-area-inset-bottom,0px))_max(20px,env(safe-area-inset-left,0px))] 2xl:p-[max(26px,env(safe-area-inset-top,0px))_max(26px,env(safe-area-inset-right,0px))_max(26px,env(safe-area-inset-bottom,0px))_max(26px,env(safe-area-inset-left,0px))] laptop:!p-[max(12px,env(safe-area-inset-top,0px))_max(12px,env(safe-area-inset-right,0px))_max(12px,env(safe-area-inset-bottom,0px))_max(12px,env(safe-area-inset-left,0px))] short:!p-[max(10px,env(safe-area-inset-top,0px))_max(10px,env(safe-area-inset-right,0px))_max(10px,env(safe-area-inset-bottom,0px))_max(10px,env(safe-area-inset-left,0px))]">
    <section
            class="pq-panel grid h-full min-h-0 w-full max-w-[1280px] grid-rows-[auto_minmax(0,1fr)_auto] overflow-hidden rounded-[1.5rem] border border-[#e8e6f2] bg-white/95 p-[clamp(.58rem,1.15dvh,.9rem)] shadow-[0_18px_46px_rgba(38,35,92,.09)] backdrop-blur-xl sm:rounded-[1.75rem] sm:p-4 sm:shadow-[0_28px_80px_rgba(38,35,92,.14)] md:p-5 lg:max-w-[1440px] lg:rounded-[2rem] lg:p-6 xl:max-w-[1520px] xl:p-7 2xl:max-w-[1600px] laptop:!rounded-[1.5rem] laptop:!p-4 short:!rounded-[1.35rem] short:!p-[clamp(.78rem,2vh,1rem)]"
            data-question-card
    >
        <header class="grid min-w-0 grid-cols-[minmax(0,1fr)_auto] grid-areas-none items-center gap-x-2 gap-y-2 py-[.12rem] md:gap-x-4 md:gap-y-3 short:!gap-y-[.45rem]" data-question-heading>
            <div class="inline-flex min-h-[2.75rem] w-fit max-w-full min-w-0 items-center gap-2 overflow-visible rounded-full border border-[#dfdcff] bg-gradient-to-br from-white to-[#f1efff] px-3 py-2.5 text-[clamp(.9rem,4.4vw,1.12rem)] font-black leading-[1.35] tracking-[-.026em] text-[#665de8] shadow-[0_10px_26px_rgba(64,58,153,.09)] sm:min-h-[3rem] sm:px-4 md:min-h-[3.2rem] md:px-5 md:text-[1.05rem] short:!min-h-[2.55rem]" data-section-title>
                <span class="pq-section-dot h-2.5 w-2.5 shrink-0 rounded-full border-2 border-white bg-gradient-to-br from-[#ff8a7a] to-[#ffb37c]"></span>
                <span class="min-w-0 overflow-hidden text-ellipsis whitespace-nowrap leading-[1.35] pb-[2px] pt-[1px]" data-section-name></span>
            </div>

            <div class="inline-flex min-h-[2.75rem] min-w-[3.75rem] items-center justify-center rounded-full border border-[#e4e1fb] bg-white/90 px-3 py-2.5 text-[.84rem] font-black leading-[1.35] text-[#665de8] shadow-[0_10px_24px_rgba(38,35,92,.07)] sm:min-h-[3rem] sm:min-w-[4.15rem] sm:text-base md:min-h-[3.2rem] md:min-w-[4.75rem] short:!min-h-[2.55rem]" data-page-counter></div>

            <div class="relative col-span-2 h-[.42rem] cursor-pointer overflow-hidden rounded-full bg-[#eceafd] outline-none ring-offset-2 ring-offset-white hover:bg-[#e2dfff] focus-visible:ring-4 focus-visible:ring-[#766cff]/20 md:h-[.48rem]" data-progress-track role="slider" tabindex="0" aria-label="Go to page" aria-valuemin="1" aria-valuemax="1" aria-valuenow="1">
                <div class="pq-progress-bar absolute inset-y-0 left-0 w-0 rounded-full bg-gradient-to-r from-[#7c7ff6] to-[#ff8a7a] shadow-[0_0_16px_rgba(102,93,232,.28)] transition-[width] duration-[420ms] ease-out" data-progress-bar></div>
            </div>
        </header>

        <div class="h-full min-h-0 overflow-y-auto overflow-x-hidden overscroll-contain pt-[clamp(.58rem,1.15dvh,.9rem)] pr-1 pb-3 touch-pan-y sm:pt-4 sm:pr-2 md:px-1 md:pb-4 lg:px-3 lg:pt-5 xl:px-4 laptop:!pt-3 laptop:!px-2 laptop:!pb-3 short:!py-[.45rem]" data-question-content></div>

        <nav class="grid grid-cols-2 gap-2 pt-2 sm:gap-3 sm:pt-3 md:mx-auto md:w-full md:max-w-[34rem] lg:ml-auto lg:mr-0 lg:max-w-[36rem] laptop:!max-w-[32rem] laptop:!pt-2 laptop:[&_button]:!min-h-[3rem] short:!max-w-[30rem] short:!gap-[.65rem] short:!pt-[.45rem] short:[&_button]:!min-h-[2.75rem] short:[&_button]:!rounded-[.9rem] short:[&_button]:!px-4 short:[&_button]:!text-[.86rem]" data-nav-actions>
            <button type="button" class="pq-action-button relative flex min-h-[2.9rem] items-center justify-center gap-2 overflow-hidden rounded-[1rem] border border-[#dcd8ff] bg-[#fbfbff] px-4 text-[.82rem] font-extrabold text-[#554bd2] hover:border-[#cfc9ff] hover:bg-[#f1efff] hover:text-[#4f46d5] sm:min-h-[3.25rem] sm:text-sm lg:min-h-[3.5rem] lg:text-[.95rem]" data-prev-button>
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                <span>Previous</span>
            </button>
            <button type="button" class="pq-action-button relative flex min-h-[2.9rem] items-center justify-center gap-2 overflow-hidden rounded-[1rem] border border-transparent bg-gradient-to-br from-[#546be6] via-[#6258e4] to-[#6b4ed5] px-4 text-[.82rem] font-extrabold text-white shadow-[0_12px_28px_rgba(91,80,220,.24)] hover:from-[#4f63dc] hover:via-[#5b51d8] hover:to-[#6046c8] sm:min-h-[3.25rem] sm:text-sm lg:min-h-[3.5rem] lg:text-[.95rem]" data-next-button>
                <span>Next</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </button>
        </nav>
    </section>
</main>

<script src="https://vjs.zencdn.net/8.16.1/video.min.js"></script>
<script>
    const appData = @json($appData);

    const els = {
        card: document.querySelector('[data-question-card]'),
        sectionName: document.querySelector('[data-section-name]'),
        counter: document.querySelector('[data-page-counter]'),
        progressTrack: document.querySelector('[data-progress-track]'),
        progress: document.querySelector('[data-progress-bar]'),
        content: document.querySelector('[data-question-content]'),
        previous: document.querySelector('[data-prev-button]'),
        next: document.querySelector('[data-next-button]'),
    };

    const ui = {
        audioButton: 'pq-audio-btn inline-flex h-[3.05rem] w-[3.05rem] shrink-0 items-center justify-center rounded-full border border-white/60 bg-gradient-to-br from-[#6f73ea] to-[#554bd2] text-white shadow-[0_12px_26px_rgba(91,80,220,.26)] sm:h-[3.2rem] sm:w-[3.2rem] short:!h-[2.8rem] short:!w-[2.8rem]',
        title: 'break-words text-balance font-black leading-[1.05] tracking-[-.045em] text-[#191a2b]',
        copy: 'max-w-xl space-y-2 text-[clamp(.98rem,4vw,1.1rem)] font-bold leading-[1.48] text-[#70748a] sm:text-lg lg:max-w-2xl',
        option: 'pq-quiz-option min-h-[2.95rem] w-full rounded-[.95rem] border-2 border-[#eceafa] bg-white px-4 text-center text-[.92rem] font-black leading-tight text-[#55576a] shadow-[0_4px_0_rgba(102,93,232,.06)] sm:min-h-[3.2rem] sm:text-base lg:min-h-[3.35rem] lg:px-5 short:!min-h-[2.65rem] short:!text-[.86rem]',
        videoOption: 'pq-quiz-option min-h-[2.7rem] w-full rounded-[.82rem] border-2 border-[#eceafa] bg-white px-[.9rem] text-center text-[.86rem] font-black leading-tight text-[#55576a] shadow-[0_4px_0_rgba(102,93,232,.06)] min-[1280px]:min-h-[2.35rem] min-[1280px]:px-[.8rem] min-[1280px]:text-[.8rem] short:!min-h-[2.25rem] short:!text-[.78rem]',
    };

    let pages = buildPages(appData.topics || []);
    let pageIndex = 0;
    let audio = null;
    let activeAudioButton = null;
    let activeAudioScope = null;
    let activeQuizAudio = null;
    let videoJsPlayer = null;
    let revealTimer = null;
    let activeTextReveal = null;
    let conversationState = {
        running: false,
        stopRequested: false,
        currentAudio: null,
        revealTimer: null,
        activeRoot: null,
        activeButton: null,
    };

    const practiceSfx = {
        enabled: true,
        sources: {
            correct: '/slider/sounds/correct.wav',
            wrong: '/slider/sounds/wrong.wav',
            success: '/slider/sounds/success.wav',
        },
        volume: {
            correct: 1,
            wrong: 1,
            success: 1,
        },
        audio: {},
    };

    Object.entries(practiceSfx.sources).forEach(([name, src]) => {
        const sound = new Audio(src);
        sound.preload = 'auto';
        sound.volume = Math.max(0, Math.min(1, Number(practiceSfx.volume[name] ?? 1)));
        practiceSfx.audio[name] = sound;
    });

    function playPracticeSfx(name) {
        if (!practiceSfx.enabled) return;

        const sound = practiceSfx.audio[name];
        if (!sound) return;

        try {
            sound.pause();
            sound.currentTime = 0;
            const promise = sound.play();
            if (promise && typeof promise.catch === 'function') promise.catch(() => {});
        } catch (error) {
        }
    }

    function stopPracticeSfx() {
        Object.values(practiceSfx.audio).forEach((sound) => {
            if (!sound) return;
            try {
                sound.pause();
                sound.currentTime = 0;
            } catch (error) {}
        });
    }

    function fieldHasValue(value) {
        return value !== null && value !== undefined && String(value).trim() !== '';
    }

    function capitalizeFirstLetter(value) {
        const text = String(value ?? '');
        return text.replace(/^(\s*)([a-zà-öø-ÿ])/iu, (_, prefix, letter) => prefix + letter.toLocaleUpperCase());
    }

    function displayText(value) {
        return capitalizeFirstLetter(value);
    }

    function escapeDisplay(value) {
        return escapeHtml(displayText(value));
    }

    function escapeHtml(value) {
        return String(value ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function textHtml(value) {
        if (!fieldHasValue(value)) return '';
        return String(value)
            .split(/\n{2,}/)
            .map((part) => `<p>${escapeHtml(displayText(part)).replace(/\n/g, '<br>')}</p>`)
            .join('');
    }

    function stripHtml(value) {
        const temp = document.createElement('div');
        temp.innerHTML = String(value ?? '');
        return temp.textContent || temp.innerText || '';
    }

    function buildPartialHtml(html, visibleChars) {
        if (visibleChars <= 0) return '';

        const source = document.createElement('div');
        const output = document.createElement('div');
        let remaining = visibleChars;

        source.innerHTML = String(html ?? '');

        function appendNodes(fromNode, toNode) {
            for (const child of fromNode.childNodes) {
                if (remaining <= 0) break;

                if (child.nodeType === Node.TEXT_NODE) {
                    const text = child.textContent || '';
                    if (!text) continue;

                    const slice = text.slice(0, remaining);
                    toNode.appendChild(document.createTextNode(slice));
                    remaining -= slice.length;

                    if (slice.length < text.length) break;
                    continue;
                }

                if (child.nodeType === Node.ELEMENT_NODE) {
                    const clone = child.cloneNode(false);
                    toNode.appendChild(clone);
                    appendNodes(child, clone);
                }
            }
        }

        appendNodes(source, output);
        return output.innerHTML;
    }

    function formatTime(seconds) {
        const value = Number(seconds);
        if (!Number.isFinite(value) || value < 0) return '00:00';
        const minutes = Math.floor(value / 60);
        const secs = Math.floor(value % 60);
        return `${String(minutes).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
    }

    function mediaType(src) {
        return /\.m3u8(?:[?#]|$)/i.test(String(src || '')) ? 'application/x-mpegURL' : 'video/mp4';
    }

    function hasAudio(item = {}) {
        return fieldHasValue(item.audio);
    }

    function hasImage(item = {}) {
        return fieldHasValue(item.image);
    }

    function hasVideo(item = {}) {
        return fieldHasValue(item.video);
    }

    function isShortVideoType(item = {}) {
        const rawType = String(item.type || item.layout || item.activity || '').toLowerCase().replace(/[\s_]+/g, '-');
        return ['short-video', 'short', 'reel', 'reels', 'vertical-video', 'youtube-short', 'youtube-shorts'].includes(rawType);
    }

    function hasShortVideo(item = {}) {
        return isShortVideoType(item) && hasVideo(item);
    }

    function isQuizType(item = {}) {
        const rawType = String(item.type || item.layout || item.activity || '').toLowerCase().replace(/[\s_]+/g, '-');
        return ['quiz', 'practice', 'audio-quiz', 'listening-quiz'].includes(rawType);
    }

    function hasQuiz(item = {}) {
        return (Array.isArray(item.quiz) && item.quiz.length)
            || (isQuizType(item) && Array.isArray(item.questions) && item.questions.length)
            || (Array.isArray(item.options) && item.options.length > 1);
    }

    function isConversationType(item = {}) {
        const rawType = String(item.type || item.layout || item.activity || '').toLowerCase().replace(/[\s_]+/g, '-');
        return ['image-conversation', 'conversation-listening', 'dialogue-listening', 'conversation', 'dialogue'].includes(rawType);
    }

    function hasConversation(item = {}) {
        return isConversationType(item) || (item.people && Array.isArray(item.dialogues) && item.dialogues.length);
    }

    function pageTypeForItem(item = {}) {
        return hasConversation(item) ? 'image-conversation'
            : hasShortVideo(item) ? 'short-video'
                : hasVideo(item) ? 'video'
                    : hasImage(item) ? 'image'
                        : hasQuiz(item) ? 'quiz'
                            : hasAudio(item) ? 'audio'
                                : 'title';
    }

    function chunkArray(items = [], size = 8) {
        const chunks = [];
        const safeSize = Math.max(1, Number(size) || 8);

        for (let index = 0; index < items.length; index += safeSize) {
            chunks.push(items.slice(index, index + safeSize));
        }

        return chunks;
    }

    function groupChunkSize(items = []) {
        const hasTextCopy = items.some((item) => fieldHasValue(item.paragraph || item.description || item.subtitle));

        return hasTextCopy ? 6 : 8;
    }

    function buildPages(topics) {
        const output = [];

        topics.forEach((topic) => {
            const sectionTitle = topic.title || 'Practice';

            if (Array.isArray(topic.groups) && topic.groups.length) {
                topic.groups.forEach((group) => {
                    const groupItems = Array.isArray(group.questions) ? group.questions : [];
                    const groupHasImages = groupItems.some((item) => hasImage(item));
                    const groupTitle = Object.prototype.hasOwnProperty.call(group, 'title') ? group.title : sectionTitle;
                    const groupSubtitle = group.paragraph || group.description || '';

                    if (groupHasImages) {
                        groupItems.forEach((item) => {
                            output.push({
                                ...item,
                                type: pageTypeForItem(item),
                                sectionTitle,
                            });
                        });
                        return;
                    }

                    const chunkSize = groupChunkSize(groupItems);
                    const groupChunks = groupItems.length > chunkSize ? chunkArray(groupItems, chunkSize) : [groupItems];

                    groupChunks.forEach((items, chunkIndex) => {
                        output.push({
                            type: 'group',
                            sectionTitle,
                            title: groupTitle,
                            subtitle: groupSubtitle,
                            items,
                            itemOffset: chunkIndex * chunkSize,
                        });
                    });
                });
            }

            if (Array.isArray(topic.questions) && topic.questions.length) {
                topic.questions.forEach((question) => {
                    output.push({
                        ...question,
                        type: pageTypeForItem(question),
                        sectionTitle,
                    });
                });
            }
        });

        return output;
    }

    function currentPage() {
        return pages[pageIndex] || null;
    }

    function normalizedLabel(value) {
        return String(value ?? '').trim().toLowerCase();
    }

    function isEmojiBadgeSection(sectionTitle) {
        return ['new language', 'vocabulary'].includes(normalizedLabel(sectionTitle));
    }

    function defaultEmojiForText(text, sectionTitle = '') {
        return normalizedLabel(sectionTitle) === 'vocabulary' ? '📚' : '✨';
    }

    function firstEmoji(value, fallback = '✨') {
        const text = String(value ?? '').trim();
        if (!text) return fallback;

        if (typeof Intl !== 'undefined' && Intl.Segmenter) {
            const segmenter = new Intl.Segmenter(undefined, { granularity: 'grapheme' });
            for (const part of segmenter.segment(text)) {
                const segment = String(part.segment || '').trim();
                if (fieldHasValue(segment)) return segment;
            }
        }

        const match = text.match(/\p{Extended_Pictographic}(?:\uFE0F|\uFE0E)?(?:\u200D\p{Extended_Pictographic}(?:\uFE0F|\uFE0E)?)*|\S/u);
        return match?.[0] || fallback;
    }

    function groupCardBadge(item, itemTitle, sectionTitle, index) {
        const image = item.image || '';

        if (fieldHasValue(image)) {
            return `
                <span class="grid h-12 w-12 shrink-0 place-items-center overflow-hidden rounded-[.95rem] border border-[#e4e1fb] bg-[#f0eeff] shadow-sm sm:h-14 sm:w-14">
                    <img class="h-full w-full object-cover" src="${escapeHtml(image)}" alt="${escapeHtml(itemTitle)}" loading="lazy" decoding="async">
                </span>
            `;
        }

        if (isEmojiBadgeSection(sectionTitle)) {
            const emoji = fieldHasValue(item.emoji)
                ? firstEmoji(item.emoji)
                : firstEmoji(defaultEmojiForText(itemTitle, sectionTitle));

            return `
                <span class="grid h-12 w-12 shrink-0 place-items-center rounded-[.95rem] bg-[#f0eeff] text-[1.45rem] font-black text-[#665de8] sm:h-14 sm:w-14 sm:text-[1.65rem]">${escapeHtml(emoji)}</span>
            `;
        }

        return `
            <span class="grid h-10 w-10 shrink-0 place-items-center rounded-[.86rem] bg-[#f0eeff] text-sm font-black text-[#665de8]">${index + 1}</span>
        `;
    }

    function audioButton(src, label = 'Play audio', size = 'default') {
        if (!fieldHasValue(src)) return '';

        const buttonClass = size === 'compact'
            ? 'pq-audio-btn inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/60 bg-gradient-to-br from-[#6f73ea] to-[#554bd2] text-white shadow-[0_10px_20px_rgba(91,80,220,.24)] sm:h-10 sm:w-10 short:!h-9 short:!w-9'
            : ui.audioButton;

        const iconClass = size === 'compact' ? 'h-4 w-4' : 'h-5 w-5';

        return `
            <button type="button" class="${buttonClass}" data-audio-button data-audio-src="${escapeHtml(src)}" aria-label="${escapeHtml(label)}">
                <svg class="pq-audio-icon ${iconClass}" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M4.75 9.35v5.3c0 .52.42.95.95.95h3.05l4.58 3.58c.62.49 1.54.04 1.54-.75V5.57c0-.79-.92-1.24-1.54-.75L8.75 8.4H5.7a.95.95 0 0 0-.95.95Z" fill="currentColor"/>
                    <path d="M17.25 8.4a4.85 4.85 0 0 1 0 7.2M19.55 6.2a8.05 8.05 0 0 1 0 11.6" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/>
                </svg>
                <span class="pq-audio-wave items-center gap-[2px]" aria-hidden="true">
                    <span class="block h-4 w-[3px] rounded-full bg-current"></span>
                    <span class="block h-5 w-[3px] rounded-full bg-current"></span>
                    <span class="block h-3.5 w-[3px] rounded-full bg-current"></span>
                </span>
            </button>
        `;
    }

    function groupImageGridClass(rows = []) {
        const count = rows.length;

        if (count <= 4) return 'grid-cols-2 sm:grid-cols-2 md:grid-cols-4';
        if (count <= 5) return 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-5';
        if (count <= 6) return 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-6';
        if (count <= 10) return 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5';
        return 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6';
    }

    function renderGroupImageCard(item, itemTitle, page, index) {
        const image = item.image || '';
        const paragraph = textHtml(item.paragraph || item.description || item.subtitle || '');
        const rowAudio = hasAudio(item) ? audioButton(item.audio, `Play ${itemTitle}`) : '';
        const emoji = fieldHasValue(item.emoji)
            ? firstEmoji(item.emoji)
            : firstEmoji(defaultEmojiForText(itemTitle, page.sectionTitle));

        const visual = fieldHasValue(image)
            ? `<img class="h-full w-full object-contain object-center transition duration-500 group-hover:scale-[1.015]" src="${escapeHtml(image)}" alt="${escapeHtml(itemTitle)}" loading="lazy" decoding="async">`
            : `<div class="grid h-full w-full place-items-center bg-gradient-to-br from-[#f7f6ff] via-white to-[#eef3ff]"><span class="text-[clamp(2.6rem,13vw,5rem)] leading-none drop-shadow-[0_10px_22px_rgba(91,80,220,.14)]">${escapeHtml(emoji)}</span></div>`;

        return `
            <article class="pq-list-row pq-image-card group w-full justify-self-center overflow-hidden rounded-[1.25rem] border border-[#eceafa] bg-white shadow-[0_12px_28px_rgba(38,35,92,.07)] hover:-translate-y-0.5 hover:border-[#dad6ff] hover:shadow-[0_18px_38px_rgba(91,80,220,.12)] sm:rounded-[1.45rem] lg:!max-w-[13.75rem] xl:!max-w-[14.75rem] short:!max-w-[12.25rem]" ${hasAudio(item) ? 'data-audio-scope' : ''}>
                <figure class="pq-image-card-media aspect-[4/3] w-full overflow-hidden bg-[#f0eeff] lg:!aspect-square">
                    ${visual}
                </figure>

                <div class="flex min-h-[4.75rem] items-center gap-3 px-3 py-3 sm:min-h-[5.25rem] sm:px-4 sm:py-3.5 short:!min-h-[4.15rem] short:!py-[.7rem]">
                    <div class="min-w-0 flex-1">
                        <h2 class="line-clamp-2 text-[clamp(.95rem,3.6vw,1.15rem)] font-black short:!text-[1.05rem] leading-tight text-[#242538]" data-audio-text>${escapeDisplay(itemTitle)}</h2>
                        ${paragraph ? `<div class="mt-1 line-clamp-2 text-xs font-bold leading-snug text-[#85889a] sm:text-sm short:!text-[.78rem]" data-audio-copy>${paragraph}</div>` : ''}
                    </div>
                    ${rowAudio}
                </div>
            </article>
        `;
    }

    function renderGroupListRow(item, itemTitle, page, index) {
        const paragraph = textHtml(item.paragraph || item.description || '');
        const isSimplePhraseCard = !paragraph && !hasImage(item);
        const itemTextLength = String(itemTitle || '').length;
        const isLongPhraseCard = isSimplePhraseCard && itemTextLength > 22;

        const rowAudio = hasAudio(item)
            ? audioButton(item.audio, `Play ${itemTitle}`, isSimplePhraseCard ? 'compact' : 'default')
            : '';

        const compactEmoji = fieldHasValue(item.emoji)
            ? firstEmoji(item.emoji)
            : firstEmoji(defaultEmojiForText(itemTitle, page.sectionTitle));

        const badge = isSimplePhraseCard
            ? `
            <span class="grid h-10 w-10 shrink-0 place-items-center rounded-[.8rem] bg-[#f0eeff] text-[1.15rem] font-black text-[#665de8] sm:h-11 sm:w-11 sm:text-[1.28rem] short:!h-10 short:!w-10">${escapeHtml(compactEmoji)}</span>
        `
            : groupCardBadge(item, itemTitle, page.sectionTitle, index);

        const rowClass = isSimplePhraseCard
            ? isLongPhraseCard
                ? 'pq-list-row flex min-h-[3.55rem] w-full items-center gap-2.5 rounded-[1rem] border border-[#eceafa] bg-gradient-to-br from-white to-[#fbfbff] px-3.5 py-2.5 shadow-[0_8px_20px_rgba(38,35,92,.055)] sm:min-h-[3.75rem] laptop:!min-h-[3.35rem] laptop:!px-3 laptop:!py-2 short:!min-h-[3.2rem] short:!py-[.55rem]'
                : 'pq-list-row flex min-h-[3.25rem] w-full items-center gap-2 rounded-[1rem] border border-[#eceafa] bg-gradient-to-br from-white to-[#fbfbff] px-3 py-2 shadow-[0_8px_20px_rgba(38,35,92,.055)] sm:min-h-[3.45rem] laptop:!min-h-[3.2rem] laptop:!px-3 laptop:!py-2 short:!min-h-[3.05rem] short:!py-[.5rem]'
            : 'pq-list-row flex min-h-[4.1rem] items-center gap-3 rounded-[1.1rem] short:!min-h-[4.05rem] short:!py-[.72rem] border border-[#eceafa] bg-gradient-to-br from-white to-[#fbfbff] px-4 py-3 shadow-[0_8px_20px_rgba(38,35,92,.055)] sm:min-h-[4.8rem] sm:px-5 md:min-h-[5.15rem] laptop:!min-h-[4.25rem] laptop:!px-4 laptop:!py-3';

        const titleClass = isSimplePhraseCard
            ? isLongPhraseCard
                ? 'line-clamp-2 text-[.84rem] font-black leading-[1.12] text-[#242538] sm:text-[.92rem] xl:text-[.98rem] short:!text-[.84rem]'
                : 'line-clamp-2 text-[.86rem] font-black leading-[1.08] text-[#242538] sm:text-[.92rem] xl:text-[.98rem] short:!text-[.84rem]'
            : 'line-clamp-2 text-[clamp(1rem,3.8vw,1.28rem)] font-black short:!text-[1.05rem] leading-tight text-[#242538]';

        const copyClass = 'mt-1 line-clamp-2 text-sm font-bold leading-snug text-[#85889a] short:!text-[.78rem]';

        return `
        <div class="${rowClass}" ${hasAudio(item) ? 'data-audio-scope' : ''}>
            ${badge}
            <div class="min-w-0 flex-1">
                <h2 class="${titleClass}" data-audio-text>${escapeDisplay(itemTitle)}</h2>
                ${paragraph ? `<div class="${copyClass}" data-audio-copy>${paragraph}</div>` : ''}
            </div>
            ${rowAudio}
        </div>
    `;
    }

    function renderGroupPage(page) {
        const rows = page.items || [];
        const title = fieldHasValue(page.title) ? page.title : '';
        const hasDescriptions = rows.some((item) => fieldHasValue(item.paragraph || item.description));
        const shouldUseImageCards = rows.some((item) => hasImage(item));
        const isSimplePhraseGroup = !shouldUseImageCards && !hasDescriptions;

        const averageTitleLength = rows.length
            ? rows.reduce((sum, item, index) => {
            const value = String(item.title || item.question || `Item ${index + 1}` || '');
            return sum + value.length;
        }, 0) / rows.length
            : 0;

        const isLongPhraseGroup = isSimplePhraseGroup && averageTitleLength > 22;

        const gridClass = shouldUseImageCards
            ? groupImageGridClass(rows)
            : hasDescriptions
                ? 'grid-cols-1 min-[760px]:grid-cols-[repeat(auto-fit,minmax(18rem,1fr))]'
                : isLongPhraseGroup
                    ? 'grid-cols-1 min-[700px]:grid-cols-[repeat(auto-fit,minmax(19rem,1fr))]'
                    : 'grid-cols-1 min-[560px]:grid-cols-[repeat(auto-fit,minmax(15rem,1fr))]';

        const groupGridKind = shouldUseImageCards
            ? 'pq-group-grid--images'
            : hasDescriptions
                ? 'pq-group-grid--text'
                : isLongPhraseGroup
                    ? 'pq-group-grid--long-phrases'
                    : 'pq-group-grid--simple';

        const groupMaxWidth = shouldUseImageCards
            ? 'max-w-[88rem]'
            : hasDescriptions
                ? 'max-w-[76rem]'
                : isLongPhraseGroup
                    ? 'max-w-[72rem]'
                    : 'max-w-[60rem]';

        return `
            <article class="pq-group-page mx-auto flex min-h-0 w-full ${groupMaxWidth} flex-col px-1 py-2 text-left sm:px-3 sm:py-4 lg:px-5 lg:py-5 xl:px-6 xl:py-6 laptop:!px-3 laptop:!py-3 short:!max-w-[min(76rem,calc(100vw-5rem))] short:!py-[.65rem]" data-audio-scope>
                ${title ? `<h1 class="${ui.title} text-[clamp(1.65rem,6vw,2.65rem)] lg:text-[2.75rem] laptop:!text-[clamp(1.8rem,3.4vw,2.35rem)] short:!text-[clamp(1.8rem,4.2vw,2.45rem)]">${escapeDisplay(title)}</h1>` : ''}
                ${fieldHasValue(page.subtitle) ? `<div class="${ui.copy} ${title ? 'mt-2' : ''}">${textHtml(page.subtitle)}</div>` : ''}

                <div class="pq-group-grid ${groupGridKind} mt-5 grid items-stretch gap-3 pr-1 sm:mt-6 sm:gap-4 ${gridClass} ${shouldUseImageCards ? 'justify-center lg:!grid-cols-[repeat(auto-fit,minmax(10.5rem,13.75rem))] xl:!grid-cols-[repeat(auto-fit,minmax(11.5rem,14.75rem))] short:!grid-cols-[repeat(auto-fit,minmax(9.75rem,12.25rem))]' : ''} xl:gap-5 laptop:!mt-4 laptop:!gap-3 short:!mt-4 short:!gap-[.78rem]" data-group-list>
                    ${rows.map((item, index) => {
            const globalIndex = Number(page.itemOffset || 0) + index;
            const itemTitle = item.title || item.question || `Item ${globalIndex + 1}`;
            return shouldUseImageCards
                ? renderGroupImageCard(item, itemTitle, page, globalIndex)
                : renderGroupListRow(item, itemTitle, page, globalIndex);
        }).join('')}
                </div>
            </article>
        `;
    }

    function speakerFromSide(page, side) {
        const people = page.people || {};
        if (people[side]) return people[side];
        if (side === 'left') return people.doctor || people.male || {};
        if (side === 'right') return people.teacher || people.female || {};
        return {};
    }

    function speakerName(page, side) {
        const speaker = speakerFromSide(page, side);
        return speaker.name || (side === 'left' ? 'Speaker 1' : 'Speaker 2');
    }

    function speakerImage(page, side) {
        const speaker = speakerFromSide(page, side);
        return speaker.image || '';
    }

    function renderConversationSpeaker(page, side) {
        const name = speakerName(page, side);
        const image = speakerImage(page, side);
        const rotate = side === 'left' ? '-rotate-[2deg]' : 'rotate-[2deg]';
        const shadow = side === 'left' ? 'shadow-[8px_8px_0_rgba(15,23,42,.10)]' : 'shadow-[10px_10px_0_rgba(15,23,42,.10)]';

        return `
                <aside class="pq-conversation-speaker flex items-center justify-center ${side === 'left' ? 'lg:order-1' : 'lg:order-3'}" data-conversation-speaker="${escapeHtml(side)}">
                    <figure class="relative mx-auto w-full max-w-[9.8rem] rounded-[1.35rem] border-[3px] border-slate-900 bg-white p-1 ${shadow} ${rotate} sm:max-w-[11.5rem] md:max-w-[13rem] lg:max-w-[12rem] lg:rounded-[1.75rem] lg:border-[4px] xl:max-w-[14rem]">
                        ${image ? `<img class="aspect-square w-full rounded-[1rem] object-cover lg:rounded-[1.35rem]" src="${escapeHtml(image)}" alt="${escapeHtml(name)}" loading="lazy" decoding="async">` : `<div class="aspect-square w-full rounded-[1rem] bg-[#eeedff]"></div>`}
                        <figcaption class="absolute -bottom-2 left-1/2 -translate-x-1/2 rounded-lg bg-slate-900 px-3 py-1 text-[.62rem] font-black uppercase leading-none text-white lg:-bottom-3 lg:px-4 lg:py-1.5 lg:text-[.7rem]">
                            ${escapeDisplay(name)}
                        </figcaption>
                    </figure>
                </aside>
            `;
    }

    function normalizeDialogueLine(page, line = {}, index = 0) {
        const side = String(line.side || '').toLowerCase() === 'right' ? 'right' : 'left';
        return {
            index,
            side,
            text: String(line.text || line.title || line.sentence || ''),
            sound: line.sound || line.audio || '',
            speaker: line.speaker || speakerName(page, side),
        };
    }

    function renderConversationPage(page) {
        const title = page.title || page.page_title || page.sectionTitle || 'Conversation';
        const instruction = textHtml(page.paragraph || page.description || page.subtitle || page.instruction || '');
        const dialogues = Array.isArray(page.dialogues)
            ? page.dialogues.map((line, index) => normalizeDialogueLine(page, line, index)).filter((line) => fieldHasValue(line.text))
            : [];
        const encodedDialogues = escapeHtml(JSON.stringify(dialogues));
        const starterSide = dialogues[0]?.side || 'left';

        function conversationBubble(side) {
            const sideAlign = side === 'right'
                ? 'self-end rounded-[1.35rem_1.35rem_.65rem_1.35rem] bg-[#faf5ff] lg:after:right-[-.72rem] lg:after:border-l-[.72rem] lg:after:border-l-slate-900'
                : 'self-start rounded-[1.35rem_1.35rem_1.35rem_.65rem] bg-[#eef2ff] lg:after:left-[-.72rem] lg:after:border-r-[.72rem] lg:after:border-r-slate-900';

            return `
                    <div class="pq-conversation-line relative w-full max-w-[34rem] border-2 border-slate-900 px-4 py-3 shadow-[6px_6px_0_rgba(15,23,42,.08)] sm:px-5 sm:py-4 lg:max-w-none lg:pr-[4.9rem] ${sideAlign}" data-conversation-line data-side="${escapeHtml(side)}" ${side === starterSide ? 'data-conversation-starter="true"' : ''}>
                        <button type="button" class="${ui.audioButton} h-[2.55rem] w-[2.55rem] sm:h-[2.85rem] sm:w-[2.85rem]" data-conversation-toggle data-conversation-bubble-button aria-label="Play full conversation">
                            <svg class="pq-audio-icon h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M4.75 9.35v5.3c0 .52.42.95.95.95h3.05l4.58 3.58c.62.49 1.54.04 1.54-.75V5.57c0-.79-.92-1.24-1.54-.75L8.75 8.4H5.7a.95.95 0 0 0-.95.95Z" fill="currentColor"/>
                                <path d="M17.25 8.4a4.85 4.85 0 0 1 0 7.2M19.55 6.2a8.05 8.05 0 0 1 0 11.6" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/>
                            </svg>
                            <span class="pq-audio-wave items-center gap-[2px]" aria-hidden="true">
                                <span class="block h-4 w-[3px] rounded-full bg-current"></span>
                                <span class="block h-5 w-[3px] rounded-full bg-current"></span>
                                <span class="block h-3.5 w-[3px] rounded-full bg-current"></span>
                            </span>
                        </button>
                        <div class="mb-2 inline-flex rounded-full bg-slate-900 px-3 py-1 text-[.66rem] font-black uppercase leading-none text-white" data-conversation-speaker-name>
                            ${escapeDisplay(speakerName(page, side))}
                        </div>
                        <div class="min-h-[1.65rem] text-[clamp(1rem,4vw,1.2rem)] font-black leading-tight text-slate-900 md:text-[1.15rem] xl:text-[1.25rem]">
                            <span data-conversation-text></span>
                        </div>
                    </div>
                `;
        }

        return `
                <article class="is-conversation-idle mx-auto w-full max-w-[80rem] px-1 py-1 text-left sm:px-3 sm:py-3 lg:px-5 lg:py-5 laptop:!py-3" data-conversation-page data-conversation-lines="${encodedDialogues}">
                    <h1 class="sr-only">${escapeDisplay(title)}</h1>
                    ${instruction ? `<div class="mx-auto mb-4 max-w-[56rem] rounded-2xl border border-[#eceafa] bg-white/75 px-4 py-3 text-sm font-extrabold leading-snug text-[#70748a] sm:px-5 sm:text-base md:text-center">${instruction}</div>` : ''}

                    <div class="grid grid-cols-2 items-start gap-3 sm:gap-5 md:gap-8 lg:grid-cols-[minmax(9rem,12rem)_minmax(22rem,1fr)_minmax(9rem,12rem)] lg:items-center lg:gap-5 xl:grid-cols-[minmax(10rem,13rem)_minmax(25rem,1fr)_minmax(10rem,13rem)] xl:gap-7">
                        ${renderConversationSpeaker(page, 'left')}
                        ${renderConversationSpeaker(page, 'right')}

                        <section class="col-span-2 mx-auto flex w-full max-w-[42rem] min-w-0 flex-col gap-3 lg:order-2 lg:col-span-1 lg:max-w-none" data-conversation-script>
                            <div class="flex justify-center pb-1 lg:hidden">
                                <button type="button" class="${ui.audioButton}" data-conversation-toggle data-conversation-mobile-button aria-label="Play full conversation">
                                    <svg class="pq-audio-icon h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M4.75 9.35v5.3c0 .52.42.95.95.95h3.05l4.58 3.58c.62.49 1.54.04 1.54-.75V5.57c0-.79-.92-1.24-1.54-.75L8.75 8.4H5.7a.95.95 0 0 0-.95.95Z" fill="currentColor"/>
                                        <path d="M17.25 8.4a4.85 4.85 0 0 1 0 7.2M19.55 6.2a8.05 8.05 0 0 1 0 11.6" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/>
                                    </svg>
                                    <span class="pq-audio-wave items-center gap-[2px]" aria-hidden="true">
                                        <span class="block h-4 w-[3px] rounded-full bg-current"></span>
                                        <span class="block h-5 w-[3px] rounded-full bg-current"></span>
                                        <span class="block h-3.5 w-[3px] rounded-full bg-current"></span>
                                    </span>
                                </button>
                            </div>

                            <div class="flex flex-col gap-3 sm:gap-4" data-conversation-bubbles>
                                ${conversationBubble('left')}
                                ${conversationBubble('right')}
                            </div>
                        </section>
                    </div>
                </article>
            `;
    }

    function renderImagePage(page) {
        const title = page.title || page.question || page.sectionTitle || 'Practice';
        const paragraph = textHtml(page.paragraph || page.description || '');
        const image = page.image;

        return `
            <article class="pq-single-image-layout mx-auto grid min-h-0 w-full max-w-[76rem] items-start gap-[clamp(.95rem,1.75dvh,1.25rem)] px-1 text-left sm:px-3 md:grid-cols-[minmax(15rem,.95fr)_minmax(16rem,1.05fr)] md:gap-7 lg:max-w-[76rem] lg:grid-cols-[minmax(20rem,1fr)_minmax(20rem,.92fr)] lg:items-center lg:gap-10 lg:py-6 xl:max-w-[82rem] xl:gap-10 2xl:grid-cols-[minmax(24rem,1fr)_minmax(22rem,.9fr)] laptop:!max-w-[min(68rem,calc(100vw-5rem))] laptop:!gap-7 laptop:!py-3 short:!max-w-[min(68rem,calc(100vw-5rem))] short:!grid-cols-[minmax(17rem,.9fr)_minmax(17rem,1.1fr)] short:!gap-7 short:!py-[.65rem]" data-audio-scope>
                <figure class="pq-image-frame pq-single-image-figure aspect-[5/4] w-full justify-self-center overflow-hidden rounded-[1.25rem] border border-[#eceafa] bg-gradient-to-br from-[#eeedff] to-white shadow-[0_14px_34px_rgba(38,35,92,.09)] md:max-h-[30rem] xl:max-h-[34rem] xl:max-w-[36rem] laptop:!max-h-[calc(100dvh-12.5rem)] laptop:!max-w-[31rem] short:!max-h-[calc(100dvh-13rem)] short:!max-w-[28rem] short:!justify-self-end">
                    ${image ? `<img class="h-full w-full object-contain object-center" src="${escapeHtml(image)}" alt="${escapeHtml(title)}" loading="lazy" decoding="async">` : ''}
                </figure>

                <div class="min-w-0 pt-[clamp(.24rem,.65dvh,.42rem)] md:self-center md:pt-0">
                    <div class="flex min-w-0 items-center justify-between gap-4 lg:gap-6">
                        <h1 class="${ui.title} text-[clamp(2rem,8.8vw,2.9rem)] md:text-[clamp(2.35rem,4vw,3.45rem)] lg:text-[clamp(2.65rem,3.1vw,4rem)] laptop:!text-[clamp(2.2rem,3vw,3.25rem)] short:!text-[clamp(2.1rem,3.6vw,3.3rem)]" data-audio-text>${escapeDisplay(title)}</h1>
                        ${audioButton(page.audio, `Play ${title}`)}
                    </div>
                    ${paragraph ? `<div class="${ui.copy} mt-3 lg:mt-5 lg:text-xl short:!text-base short:!leading-[1.45]" data-audio-copy>${paragraph}</div>` : ''}
                </div>
            </article>
        `;
    }

    function renderAudioPage(page) {
        const title = page.title || page.question || page.sectionTitle || 'Practice';
        const paragraph = textHtml(page.paragraph || page.description || '');

        return `
                <article class="mx-auto flex w-full max-w-[60rem] flex-col justify-start px-1 py-3 text-left sm:px-3 sm:py-5 lg:justify-center lg:px-7 lg:py-10" data-audio-scope>
                    <div class="flex items-center justify-between gap-4 lg:gap-7">
                        <h1 class="${ui.title} text-[clamp(1.85rem,6vw,4.2rem)] lg:text-[clamp(2.75rem,4vw,4.75rem)]" data-audio-text>${escapeDisplay(title)}</h1>
                        ${audioButton(page.audio, `Play ${title}`)}
                    </div>
                    ${paragraph ? `<div class="${ui.copy} mt-4 lg:mt-6 lg:text-xl" data-audio-copy>${paragraph}</div>` : ''}
                </article>
            `;
    }

    function normalizeQuizQuestion(item = {}, index = 0) {
        const options = Array.isArray(item.options) ? item.options : [];
        const rawType = String(item.type || '').toLowerCase();
        const rawCorrect = item.correct_answer ?? item.correctAnswer ?? item.correct ?? item.answer ?? 0;
        const acceptedRaw = item.accepted_answers ?? item.acceptedAnswers ?? item.accepted ?? item.correct ?? rawCorrect;
        const acceptedAnswers = (Array.isArray(acceptedRaw) ? acceptedRaw : [acceptedRaw])
            .filter(fieldHasValue)
            .map((answer) => String(answer).trim());

        let correctAnswer = Number(rawCorrect);

        if ((!Number.isFinite(correctAnswer) || correctAnswer < 0) && options.length) {
            const normalizedCorrect = String(rawCorrect ?? '').trim().toLowerCase();
            correctAnswer = options.findIndex((option) => String(option).trim().toLowerCase() === normalizedCorrect);
        }

        if (!Number.isFinite(correctAnswer) || correctAnswer < 0) correctAnswer = 0;

        const isInput = rawType === 'input' || (!options.length && acceptedAnswers.length > 0);
        const questionText = item.prompt || item.question || item.title || `Question ${index + 1}`;
        const emoji = fieldHasValue(item.emoji) ? String(item.emoji).trim() : '';
        const image = item.image || item.media_image || item.mediaImage || item.thumbnail || item.poster || '';
        const audioSrc = item.audio || item.sound || item.media_audio || item.mediaAudio || '';

        return {
            type: isInput ? 'input' : 'multiple_choice',
            emoji,
            image,
            audio: audioSrc,
            question: questionText,
            displayQuestion: emoji ? `${emoji} ${questionText}` : questionText,
            options,
            correctAnswer,
            acceptedAnswers,
        };
    }

    function quizQuestionsFrom(page = {}) {
        if (Array.isArray(page.quiz) && page.quiz.length) {
            return page.quiz
                .map(normalizeQuizQuestion)
                .filter((item) => item.type === 'input' || item.options.length > 1);
        }

        if (Array.isArray(page.questions) && page.questions.length) {
            return page.questions
                .map(normalizeQuizQuestion)
                .filter((item) => item.type === 'input' || item.options.length > 1);
        }

        if (Array.isArray(page.options) && page.options.length > 1) {
            return [normalizeQuizQuestion(page, 0)];
        }

        return [];
    }

    function quizMediaHtml(item = {}, options = {}) {
        if (!options.showMedia) return '';

        const image = item.image || options.mediaImage || '';
        const emoji = item.emoji || options.mediaEmoji || '';
        const mediaLabel = item.question || options.title || 'Quiz media';
        const splitMedia = Boolean(options.splitMedia);

        if (fieldHasValue(image)) {
            return `
                    <div class="pq-quiz-media mb-4 aspect-video w-full overflow-hidden rounded-[1.05rem] border border-[#eceafa] bg-[#090910] shadow-[0_14px_30px_rgba(20,18,48,.16)] ring-1 ring-black/5 sm:mb-5 ${splitMedia ? 'lg:mb-0' : ''}">
                        <img class="h-full w-full object-contain object-center" src="${escapeHtml(image)}" alt="${escapeHtml(mediaLabel)}" loading="lazy" decoding="async">
                    </div>
                `;
        }

        if (fieldHasValue(emoji)) {
            return `
                    <div class="pq-quiz-emoji-media mb-3 flex justify-start sm:mb-4" aria-label="${escapeHtml(mediaLabel)}">
                        <div class="inline-flex min-h-[3.4rem] max-w-full items-center justify-center rounded-[1rem] border border-[#eceafa] bg-gradient-to-br from-[#f7f6ff] via-white to-[#eef3ff] px-4 py-3 shadow-[0_10px_24px_rgba(91,80,220,.10)] sm:min-h-[3.85rem] sm:px-5 sm:py-3.5 lg:min-h-[4.1rem] lg:px-6">
                            <span class="text-[clamp(2.05rem,8vw,3.35rem)] leading-none drop-shadow-[0_8px_18px_rgba(91,80,220,.14)]" aria-hidden="true">${escapeHtml(emoji)}</span>
                        </div>
                    </div>
                `;
        }

        return '';
    }

    function quizAudioPlayerHtml(item = {}) {
        if (!fieldHasValue(item.audio)) return '';

        return `
                <div class="mx-auto mb-4 w-full max-w-[56rem] rounded-[1.05rem] border border-[#eceafa] bg-white/88 px-3 py-3 shadow-[0_10px_24px_rgba(38,35,92,.07)] sm:mb-5 sm:px-4 md:px-5 md:py-4 lg:max-w-[52rem]" data-quiz-audio-player data-quiz-audio-scope="${escapeHtml(item.scope || 'question')}" data-audio-src="${escapeHtml(item.audio)}">
                    <div class="flex items-center gap-3">
                        <button type="button" class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-[#e3e0fb] bg-[#fbfbff] text-[#554bd2] shadow-[0_8px_18px_rgba(91,80,220,.10)]" data-quiz-audio-back aria-label="Go back 10 seconds">
                            <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                        </button>

                        <button type="button" class="${ui.audioButton} h-[3.15rem] w-[3.15rem]" data-quiz-audio-toggle aria-label="Play question audio">
                            <svg class="pq-audio-icon h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M4.75 9.35v5.3c0 .52.42.95.95.95h3.05l4.58 3.58c.62.49 1.54.04 1.54-.75V5.57c0-.79-.92-1.24-1.54-.75L8.75 8.4H5.7a.95.95 0 0 0-.95.95Z" fill="currentColor"/>
                                <path d="M17.25 8.4a4.85 4.85 0 0 1 0 7.2M19.55 6.2a8.05 8.05 0 0 1 0 11.6" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/>
                            </svg>
                            <span class="pq-audio-wave items-center gap-[2px]" aria-hidden="true">
                                <span class="block h-4 w-[3px] rounded-full bg-current"></span>
                                <span class="block h-5 w-[3px] rounded-full bg-current"></span>
                                <span class="block h-3.5 w-[3px] rounded-full bg-current"></span>
                            </span>
                        </button>

                        <button type="button" class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-[#e3e0fb] bg-[#fbfbff] text-[#554bd2] shadow-[0_8px_18px_rgba(91,80,220,.10)]" data-quiz-audio-forward aria-label="Go forward 10 seconds">
                            <i class="fa-solid fa-rotate-right" aria-hidden="true"></i>
                        </button>

                        <div class="min-w-0 flex-1">
                            <div class="relative h-2 cursor-pointer overflow-hidden rounded-full bg-[#eceafd]" data-quiz-audio-track aria-label="Audio progress">
                                <div class="h-full w-0 rounded-full bg-gradient-to-r from-[#7c7ff6] to-[#ff8a7a] transition-[width] duration-100" data-quiz-audio-fill></div>
                            </div>
                            <div class="mt-1 flex justify-between text-[.68rem] font-black tabular-nums text-[#70748a]">
                                <span data-quiz-audio-current>00:00</span>
                                <span data-quiz-audio-total>00:00</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
    }

    function renderQuizBlock(items, options = {}) {
        const questions = items
            .map(normalizeQuizQuestion)
            .filter((item) => item.type === 'input' || item.options.length > 1);

        if (!questions.length) return '';

        const showTitle = Boolean(options.showTitle);
        const title = fieldHasValue(options.title) ? options.title : '';
        const sharedAudio = options.sharedAudio || '';
        const hasImageMedia = questions.some((item) => fieldHasValue(item.image)) || fieldHasValue(options.mediaImage);
        const isVideoMode = Boolean(options.videoMode);
        const sectionWidth = isVideoMode
            ? 'max-w-[42rem] min-[1280px]:max-w-[18rem] min-[1536px]:max-w-[24rem] short:!max-w-[18rem]'
            : (hasImageMedia ? 'max-w-[76rem]' : 'max-w-[60rem]');

        return `
                <section class="pq-quiz-block mx-auto w-full ${sectionWidth} text-left" data-quiz-block>
                    ${showTitle ? `<h1 class="${ui.title} mb-4 text-[clamp(1.65rem,5.5vw,2.45rem)] lg:mb-6 lg:text-[2.65rem]">${escapeDisplay(title)}</h1>` : ''}
                    ${fieldHasValue(sharedAudio) ? quizAudioPlayerHtml({ audio: sharedAudio, scope: 'page' }) : ''}
                    ${questions.map((item, questionIndex) => {
            const imageSrc = item.image || options.mediaImage || '';
            const splitMedia = options.showMedia && fieldHasValue(imageSrc) && !fieldHasValue(item.audio);
            const mediaHtml = fieldHasValue(item.audio)
                ? quizAudioPlayerHtml(item)
                : quizMediaHtml(item, { ...options, splitMedia });
            const contentClass = splitMedia ? 'min-w-0 lg:self-center' : '';
            const layoutClass = splitMedia
                ? 'lg:grid lg:grid-cols-[minmax(18rem,.9fr)_minmax(22rem,1.1fr)] lg:items-center lg:gap-8 xl:grid-cols-[minmax(22rem,.95fr)_minmax(24rem,1.05fr)] xl:gap-10'
                : '';
            const questionClass = isVideoMode
                ? 'pq-quiz-question ' + ui.title + ' mb-[.58rem] text-[clamp(1rem,1.45vw,1.34rem)] leading-[1.08] tracking-[-.035em] short:!mb-2 short:!text-[clamp(.95rem,1.55vw,1.2rem)]'
                : 'pq-quiz-question ' + ui.title + ' mb-4 text-[clamp(1.45rem,5.8vw,2.05rem)] sm:mb-5 lg:text-[2.15rem]';
            const optionGridClass = isVideoMode
                ? 'grid grid-cols-1 gap-[.48rem] sm:grid-cols-2 min-[1280px]:grid-cols-1'
                : 'grid gap-2.5 sm:gap-3 md:grid-cols-2 lg:gap-4';
            const optionClass = isVideoMode ? ui.videoOption : ui.option;

            return `
                        <article
                            class="pq-quiz-item ${questionIndex === 0 ? 'is-current' : ''}"
                            data-quiz-item
                            data-quiz-index="${questionIndex}"
                            data-quiz-type="${escapeHtml(item.type)}"
                            data-correct-answer="${escapeHtml(item.correctAnswer)}"
                            data-accepted-answers="${escapeHtml(JSON.stringify(item.acceptedAnswers))}"
                        >
                            <div class="${layoutClass}">
                                ${mediaHtml}
                                <div class="${contentClass}">
                                    <h2 class="${questionClass}">${escapeDisplay(item.question)}</h2>
                                    ${item.type === 'input' ? `
                                        <div class="grid gap-3">
                                            <input
                                                type="text"
                                                class="min-h-[3rem] w-full rounded-[.95rem] border-2 border-[#eceafa] bg-white px-4 text-[1rem] font-black text-[#242538] shadow-[0_4px_0_rgba(102,93,232,.06)] outline-none placeholder:text-[#b8b8c9] focus:border-[#766cff] focus:ring-4 focus:ring-[#766cff]/10 lg:min-h-[3.35rem]"
                                                data-quiz-input
                                                placeholder="Type your answer..."
                                                autocomplete="off"
                                            >
                                            <button type="button" class="pq-action-button relative flex min-h-[2.95rem] items-center justify-center gap-2 overflow-hidden rounded-[1rem] border border-transparent bg-gradient-to-br from-[#546be6] via-[#6258e4] to-[#6b4ed5] px-4 text-[.9rem] font-extrabold text-white shadow-[0_12px_28px_rgba(91,80,220,.24)] hover:from-[#4f63dc] hover:via-[#5b51d8] hover:to-[#6046c8] lg:min-h-[3.25rem]" data-quiz-submit>
                                                Check
                                                <i class="fa-solid fa-check" aria-hidden="true"></i>
                                            </button>
                                            <p class="hidden text-sm font-black" data-quiz-feedback></p>
                                        </div>
                                    ` : `
                                        <div class="${optionGridClass}" role="group" aria-label="${escapeHtml(item.question)}">
                                            ${item.options.map((option, optionIndex) => {
                const isLastOddOption = !isVideoMode && item.options.length % 2 === 1 && optionIndex === item.options.length - 1;
                return `<button type="button" class="${optionClass} ${isLastOddOption ? 'md:col-span-2' : ''}" data-quiz-option data-option-index="${optionIndex}">${escapeDisplay(option)}</button>`;
            }).join('')}
                                        </div>
                                    `}
                                </div>
                            </div>
                        </article>
                    `;
        }).join('')}
                    <div class="hidden rounded-[1.25rem] border border-[#eceafa] bg-gradient-to-br from-white via-[#fbfbff] to-[#f3f1ff] px-5 py-8 text-center shadow-[0_14px_32px_rgba(91,80,220,.10)] sm:px-7 lg:px-10 lg:py-12" data-quiz-complete>
                        <div class="text-[clamp(3rem,16vw,5.5rem)] leading-none" aria-hidden="true">🎉</div>
                        <h2 class="${ui.title} mt-3 text-[clamp(1.6rem,6vw,2.35rem)]">Nice work!</h2>
                        <p class="mx-auto mt-2 max-w-md text-[clamp(.95rem,3.8vw,1.1rem)] font-extrabold leading-snug text-[#70748a]">You finished this practice</p>
                    </div>
                </section>
            `;
    }

    function renderQuizPage(page) {
        const title = fieldHasValue(page.title) ? page.title : '';
        const mediaImage = page.image || page.media_image || page.mediaImage || page.thumbnail || '';
        const mediaEmoji = page.emoji || page.emojis || '';

        return `
            <article class="mx-auto flex min-h-full w-full max-w-[72rem] flex-col justify-center px-1 py-2 text-left sm:px-3 sm:py-5 lg:px-5 lg:py-6 laptop:justify-start laptop:py-3 short:justify-start short:py-2">
                ${renderQuizBlock(quizQuestionsFrom(page), {
            showTitle: fieldHasValue(title),
            title,
            showMedia: true,
            mediaImage,
            mediaEmoji,
            sharedAudio: page.audio || page.sound || page.media_audio || page.mediaAudio || '',
        })}
            </article>
        `;
    }

    function transcriptHtml(script = []) {
        if (!Array.isArray(script) || !script.length) return '';

        return `
                <div class="pq-transcript-shell overflow-hidden rounded-b-[1.05rem] border border-t-0 border-[#e4e1fb] bg-[#f7f6ff]" data-transcript-shell>
                    <button type="button" class="flex min-h-[2.35rem] w-full items-center justify-between gap-3 px-3 py-1.5 text-left text-[.82rem] font-black text-[#7168ee]" data-transcript-toggle>
                        <span class="inline-flex items-center gap-2">
                            <i class="fa-regular fa-closed-captioning text-[.86rem]" aria-hidden="true"></i>
                            <span data-transcript-label>Show transcript</span>
                        </span>
                        <i class="fa-solid fa-chevron-down" data-transcript-icon aria-hidden="true"></i>
                    </button>
                    <div class="pq-transcript-panel hidden max-h-[6.06rem] overflow-y-auto overflow-x-hidden bg-white/80 short:!max-h-[5.85rem]" data-transcript-panel>
                        ${script.map((line) => {
            const text = line.text || line.caption || '';
            const start = Number(line.start ?? 0);
            const end = Number(line.end ?? 0);
            return `
                                <button type="button" class="pq-transcript-row grid min-h-[2.02rem] w-full grid-cols-[2.4rem_minmax(0,1fr)_auto] items-center gap-[.38rem] border-t border-[#eeeafa] px-[.68rem] py-[.34rem] text-left short:!min-h-[1.95rem] short:!py-[.28rem]" data-transcript-row data-transcript-start="${escapeHtml(start)}" data-transcript-end="${escapeHtml(end)}">
                                    <span class="pq-transcript-time text-[.7rem] font-black text-[#766cff]">${formatTime(start)}</span>
                                    <p class="pq-transcript-text line-clamp-1 text-[.76rem] font-bold leading-[1.16] text-[#777b90]">${escapeDisplay(text)}</p>
                                    <span class="pq-transcript-chevron text-[#b7b3ce]" aria-hidden="true">›</span>
                                </button>
                            `;
        }).join('')}
                    </div>
                </div>
            `;
    }

    function transcriptLinesFrom(page = {}) {
        if (Array.isArray(page.script) && page.script.length) return page.script;
        if (Array.isArray(page.subtitles) && page.subtitles.length) return page.subtitles;
        if (Array.isArray(page.transcript) && page.transcript.length) return page.transcript;
        return [];
    }

    function renderShortVideoPage(page) {
        const video = page.video;
        const title = fieldHasValue(page.title) ? page.title : (fieldHasValue(page.page_title) ? page.page_title : 'Short video');
        const thumbnail = page.thumbnail || page.poster || '';
        const captionLines = transcriptLinesFrom(page);
        const captionPayload = escapeHtml(JSON.stringify(captionLines));

        return `
                <article class="mx-auto grid h-full min-h-0 w-full place-items-center overflow-hidden px-0 py-1" data-short-video-page>
                    <h1 class="sr-only">${escapeDisplay(title)}</h1>

                    <div class="pq-short-video-stage grid h-full min-h-0 w-full place-items-center overflow-hidden">
                        <div class="pq-video-wrap pq-short-video-wrap pq-short-video-shell relative isolate aspect-[9/16] h-[min(100%,calc(100dvh-12.5rem),50rem)] max-h-full max-w-[min(100%,28rem)] laptop:!h-[min(100%,calc(100dvh-13rem),34rem)] laptop:!max-w-[min(100%,21rem)] short:!h-[min(100%,calc(100dvh-13.25rem),31rem)] short:!max-w-[min(100%,19rem)] overflow-hidden rounded-[1.75rem] bg-[#090910] shadow-[0_24px_60px_rgba(20,18,48,.22)] ring-1 ring-black/5 max-[767px]:h-[min(100%,calc(100dvh-10.75rem),38rem)] max-[767px]:max-w-[min(100%,22rem)]" data-video-captions="${captionPayload}">
                            <video
                                id="passingQuestionVideo"
                                class="video-js vjs-default-skin h-full w-full bg-black object-contain"
                                controls
                                playsinline
                                webkit-playsinline
                                preload="auto"
                                autoplay
                                disablePictureInPicture
                                controlsList="nodownload noremoteplayback noplaybackrate"
                                ${fieldHasValue(thumbnail) ? `poster="${escapeHtml(thumbnail)}"` : ''}
                                data-video-src="${escapeHtml(video)}"
                            >
                                <source src="${escapeHtml(video)}" type="${mediaType(video)}">
                            </video>
                            <div class="pq-video-caption-overlay pointer-events-none absolute left-1/2 bottom-[clamp(2.25rem,8%,4.75rem)] z-[80] flex w-[min(88%,22rem)] -translate-x-1/2 justify-center text-center" data-video-caption-overlay aria-live="polite" aria-hidden="true">
                                <span class="pq-video-caption-text inline-block max-w-full rounded-[.72rem] border border-white/10 bg-slate-950/85 px-[.68rem] py-[.44rem] text-[clamp(.86rem,3.6vw,1.05rem)] font-extrabold leading-[1.32] tracking-[-.012em] text-white opacity-0 shadow-[0_12px_34px_rgba(0,0,0,.34)] backdrop-blur-md transition duration-300 [transform:translateY(12px)_scale(.96)]" data-video-caption-text></span>
                            </div>

                            ${fieldHasValue(thumbnail) ? `
                                <button type="button" class="pq-short-video-overlay absolute inset-0 z-[4] flex cursor-pointer flex-col items-center justify-center gap-[.78rem] border-0 bg-[rgba(8,8,18,.22)] text-white transition-opacity duration-200" data-short-video-overlay aria-label="Tap to play short video">
                                    <img class="absolute inset-0 -z-[2] h-full w-full scale-[1.045] object-cover blur-[1.6px] brightness-[.7]" src="${escapeHtml(thumbnail)}" alt="" loading="lazy" decoding="async" aria-hidden="true">
                                    <span class="absolute inset-0 -z-[1] bg-[linear-gradient(180deg,rgba(5,5,14,.18),rgba(5,5,14,.34))]" aria-hidden="true"></span>
                                    <span class="pq-short-play-circle grid h-[5.05rem] w-[5.05rem] place-items-center rounded-full border-2 border-white/60 bg-white/15 shadow-[0_18px_46px_rgba(0,0,0,.26)] backdrop-blur">
                                        <i class="fa-solid fa-play ml-1 text-3xl text-white"></i>
                                    </span>
                                    <span class="text-base font-black text-white drop-shadow-[0_2px_10px_rgba(0,0,0,.45)]">Tap to Play</span>
                                </button>
                            ` : ''}

                            <p class="hidden bg-amber-50 px-4 py-3 text-sm font-bold text-amber-800" data-video-status></p>
                        </div>
                    </div>
                </article>
            `;
    }

    function renderVideoPage(page) {
        const video = page.video;
        const title = fieldHasValue(page.title) ? page.title : (fieldHasValue(page.page_title) ? page.page_title : '');
        const description = textHtml(page.paragraph || page.description || page.subtitle || '');
        const captionLines = transcriptLinesFrom(page);
        const captionPayload = escapeHtml(JSON.stringify(captionLines));
        const headingHtml = (fieldHasValue(title) || description)
            ? `<div class="mb-3 sm:mb-4 lg:mb-5">
                    ${fieldHasValue(title) ? `<h1 class="${ui.title} text-[clamp(1.55rem,5.6vw,2.2rem)] lg:text-[2.55rem]">${escapeDisplay(title)}</h1>` : ''}
                    ${description ? `<div class="${ui.copy} mt-2 text-[clamp(.92rem,3.7vw,1.05rem)] lg:text-lg">${description}</div>` : ''}
                </div>`
            : '';
        const quizHtml = renderQuizBlock(quizQuestionsFrom(page), { showTitle: false, videoMode: true });
        const hasQuizArea = fieldHasValue(quizHtml);
        const articleWidth = hasQuizArea ? 'max-w-[100rem] short:!max-w-[min(100%,90rem)]' : 'max-w-[96rem] short:!max-w-[min(100%,90rem)]';
        const contentLayout = hasQuizArea
            ? 'pq-video-inner-layout flex min-h-0 flex-col gap-4 sm:gap-5 min-[1280px]:grid min-[1280px]:grid-cols-[minmax(0,1fr)_minmax(14rem,18rem)] min-[1280px]:items-start min-[1280px]:gap-5 min-[1536px]:grid-cols-[minmax(0,1fr)_minmax(18rem,24rem)] min-[1536px]:gap-6 2xl:grid-cols-[minmax(0,1fr)_minmax(20rem,25rem)] short:!gap-4'
            : 'pq-video-inner-layout flex flex-col';
        const videoPageState = hasQuizArea ? 'pq-video-has-quiz' : 'pq-video-no-quiz';

        return `
                <article class="pq-mobile-video-card pq-video-page-layout ${videoPageState} mx-auto flex h-full min-h-0 w-full ${articleWidth} flex-col px-1 text-left sm:px-3 lg:px-5" data-video-page>
                    ${headingHtml}
                    <div class="${contentLayout}">
                        <div class="pq-video-main-column w-full min-h-0 shrink-0 sm:mx-auto sm:max-w-[86rem] min-[1280px]:mx-0 min-[1280px]:max-w-none">
                            <div class="pq-video-wrap relative aspect-video w-full max-h-[calc(100dvh-13rem)] overflow-hidden rounded-t-[1.05rem] bg-[#090910] shadow-[0_14px_30px_rgba(20,18,48,.16)] ring-1 ring-black/5 max-[520px]:max-h-[min(31dvh,15.8rem)] short:!max-h-[calc(100dvh-13rem)] lg:rounded-t-[1.25rem]" data-video-captions="${captionPayload}">
                                <video
                                    id="passingQuestionVideo"
                                    class="video-js vjs-default-skin h-full w-full bg-black object-contain"
                                    controls
                                    playsinline
                                    webkit-playsinline
                                    preload="auto"
                                    autoplay
                                    disablePictureInPicture
                                    controlsList="nodownload noremoteplayback noplaybackrate"
                                    ${fieldHasValue(page.thumbnail) ? `poster="${escapeHtml(page.thumbnail)}"` : ''}
                                    data-video-src="${escapeHtml(video)}"
                                >
                                    <source src="${escapeHtml(video)}" type="${mediaType(video)}">
                                </video>
                                <div class="pq-video-caption-overlay pointer-events-none absolute left-1/2 bottom-[clamp(.8rem,4%,1.75rem)] z-[80] flex w-[min(90%,54rem)] -translate-x-1/2 justify-center text-center" data-video-caption-overlay aria-live="polite" aria-hidden="true">
                                    <span class="pq-video-caption-text inline-block max-w-full rounded-[.8rem] border border-white/10 bg-slate-950/85 px-[.82rem] py-2 text-[clamp(.88rem,3.4vw,1.16rem)] font-extrabold leading-[1.32] tracking-[-.012em] text-white opacity-0 shadow-[0_12px_34px_rgba(0,0,0,.34)] backdrop-blur-md transition duration-300 [transform:translateY(12px)_scale(.96)] lg:rounded-[.95rem] lg:px-[1.05rem] lg:py-[.62rem] lg:text-[clamp(1rem,1.35vw,1.35rem)]" data-video-caption-text></span>
                                </div>
                                <p class="hidden bg-amber-50 px-4 py-3 text-sm font-bold text-amber-800" data-video-status></p>
                            </div>
                            ${transcriptHtml(captionLines)}
                        </div>

                        ${hasQuizArea ? `
                            <div class="pq-video-side-column w-full min-h-0 shrink-0 sm:mx-auto sm:max-w-[72rem] min-[1280px]:mx-0 min-[1280px]:max-w-[18rem] min-[1536px]:max-w-[24rem] 2xl:max-w-[25rem] short:!max-w-[18.5rem]">
                                ${quizHtml}
                            </div>
                        ` : ''}
                    </div>
                </article>
            `;
    }

    function renderTitlePage(page) {
        const title = fieldHasValue(page.title) ? page.title : (fieldHasValue(page.question) ? page.question : '');
        const paragraph = textHtml(page.paragraph || page.description || '');

        return `
                <article class="mx-auto w-full max-w-[60rem] px-1 py-3 text-left sm:px-3 sm:py-5 lg:px-7 lg:py-10">
                    ${fieldHasValue(title) ? `<h1 class="${ui.title} text-[clamp(1.85rem,6vw,4.2rem)] lg:text-[clamp(3rem,4.2vw,5rem)]">${escapeDisplay(title)}</h1>` : ''}
                    ${paragraph ? `<div class="${ui.copy} ${fieldHasValue(title) ? 'mt-4 lg:mt-6' : ''} lg:text-xl">${paragraph}</div>` : ''}
                </article>
            `;
    }

    function renderPageContent(page) {
        if (!page) {
            return `<article class="w-full p-6 text-center"><h1 class="text-2xl font-black text-[#191a2b]">No questions found.</h1></article>`;
        }

        switch (page.type) {
            case 'group': return renderGroupPage(page);
            case 'image-conversation': return renderConversationPage(page);
            case 'image': return renderImagePage(page);
            case 'short-video': return renderShortVideoPage(page);
            case 'video': return renderVideoPage(page);
            case 'quiz': return renderQuizPage(page);
            case 'audio': return renderAudioPage(page);
            default: return renderTitlePage(page);
        }
    }

    function applyPageClass(page) {
        els.card.classList.toggle('is-group-page', page?.type === 'group');
        els.card.classList.toggle('is-image-page', page?.type === 'image');
        els.card.classList.toggle('is-video-card', page?.type === 'video');
        els.card.classList.toggle('is-short-video-card', page?.type === 'short-video');
        els.card.classList.toggle('is-image-conversation-page', page?.type === 'image-conversation');

        const shouldCenterOnDesktop = ['image', 'audio', 'short-video', 'title'].includes(page?.type);
        const isVideoPage = page?.type === 'video';
        const isConversationPage = page?.type === 'image-conversation';

        els.content.className = [
            'h-full min-h-0 overflow-y-auto overflow-x-hidden overscroll-contain',
            'pt-[clamp(.58rem,1.15dvh,.9rem)] pr-1 pb-3 touch-pan-y',
            'sm:pt-4 sm:pr-2 md:px-1 md:pb-4 lg:px-3 lg:pt-5 xl:px-4',
            'laptop:!pt-3 laptop:!px-2 laptop:!pb-3 short:!py-[.45rem]',
            shouldCenterOnDesktop ? 'pq-center-content' : '',
            isVideoPage ? 'pq-video-content' : '',
            isConversationPage ? 'pq-conversation-content' : '',
        ].filter(Boolean).join(' ');
    }

    function updateHeader(page) {
        els.sectionName.textContent = displayText(page?.sectionTitle || 'Practice');
        els.counter.textContent = pages.length ? `${pageIndex + 1} / ${pages.length}` : '0 / 0';
        const progress = pages.length ? ((pageIndex + 1) / pages.length) * 100 : 0;
        els.progress.style.width = `${progress}%`;
        if (els.progressTrack) {
            els.progressTrack.setAttribute('aria-valuemin', '1');
            els.progressTrack.setAttribute('aria-valuemax', String(Math.max(1, pages.length)));
            els.progressTrack.setAttribute('aria-valuenow', String(pages.length ? pageIndex + 1 : 1));
            els.progressTrack.setAttribute('aria-valuetext', pages.length ? `Page ${pageIndex + 1} of ${pages.length}` : 'No pages');
            els.progressTrack.setAttribute('title', pages.length ? 'Click the progress bar to jump to a page' : 'No pages');
        }
        els.previous.disabled = pageIndex <= 0;
        els.next.disabled = pageIndex >= pages.length - 1;
    }

    function render({ animate = false } = {}) {
        const page = currentPage();
        cleanupMedia();
        applyPageClass(page);
        updateHeader(page);
        els.content.innerHTML = renderPageContent(page);

        bindAudioButtons();
        bindConversationInteractions();
        bindQuizAudioPlayers();
        bindQuizInteractions();
        bindTranscriptInteractions();
        setupVideoPlayer();
        bindShortVideoOverlay();
        autoplayCurrentPageMedia();

        if (animate) {
            els.card.classList.remove('is-revealing');
            void els.card.offsetWidth;
            els.card.classList.add('is-revealing');
            window.clearTimeout(revealTimer);
            revealTimer = window.setTimeout(() => els.card.classList.remove('is-revealing'), 460);
        }
    }

    function goTo(index) {
        const nextIndex = Math.max(0, Math.min(pages.length - 1, index));
        if (nextIndex === pageIndex) return;

        cleanupMedia();

        els.card.classList.add('is-page-transitioning');
        window.setTimeout(() => {
            pageIndex = nextIndex;
            els.card.classList.remove('is-page-transitioning');
            render({ animate: true });
        }, 170);
    }

    function stopVideoPlayer() {
        const player = videoJsPlayer;

        if (player) {
            try {
                if (typeof player.pause === 'function') player.pause();
                if (typeof player.currentTime === 'function') player.currentTime(0);

                const isDisposed = typeof player.isDisposed === 'function'
                    ? player.isDisposed()
                    : false;

                if (typeof player.dispose === 'function' && !isDisposed) {
                    player.dispose();
                }
            } catch (error) {}

            videoJsPlayer = null;
        }

        els.content.querySelectorAll('video').forEach((video) => {
            try {
                video.pause();
                video.currentTime = 0;
                video.removeAttribute('src');
                video.querySelectorAll('source').forEach((source) => source.removeAttribute('src'));
                video.load();
            } catch (error) {}
        });
    }

    function cleanupMedia() {
        stopConversation(true);
        stopAudio();
        stopQuizAudio(true);
        stopPracticeSfx();
        stopVideoPlayer();
    }

    function stopAudio() {
        if (audio) {
            try {
                audio.pause();
                audio.currentTime = 0;
            } catch (error) {
            }
        }

        stopTextReveal(true);

        if (activeAudioButton) activeAudioButton.classList.remove('is-playing');
        if (activeAudioScope) activeAudioScope.classList.remove('is-audio-playing');

        audio = null;
        activeAudioButton = null;
        activeAudioScope = null;
    }

    function rememberTextTargets(scope) {
        if (!scope) return [];

        return Array.from(scope.querySelectorAll('[data-audio-text], [data-audio-copy]'))
            .filter((target) => {
                if (target.dataset.originalHtml === undefined) {
                    target.dataset.originalHtml = target.innerHTML;
                }

                const plainText = stripHtml(target.dataset.originalHtml);
                const measuredHeight = Math.ceil(target.getBoundingClientRect().height);
                target.dataset.plainLength = String(plainText.length);
                target.setAttribute('aria-label', plainText);
                target.setAttribute('aria-live', 'off');

                if (measuredHeight > 0) {
                    target.dataset.revealMinHeight = String(measuredHeight);
                    target.style.minHeight = `${measuredHeight}px`;
                }

                return plainText.trim().length > 0;
            });
    }

    function restoreTextTargets(scope) {
        if (!scope) return;

        scope.querySelectorAll('[data-audio-text], [data-audio-copy]').forEach((target) => {
            if (target.dataset.originalHtml !== undefined) {
                target.innerHTML = target.dataset.originalHtml;
            }

            if (target.dataset.revealMinHeight !== undefined) {
                target.style.minHeight = '';
                delete target.dataset.revealMinHeight;
            }
        });
    }

    function stopTextReveal(showFull = true) {
        if (!activeTextReveal) return;

        window.cancelAnimationFrame(activeTextReveal.frameId);

        if (showFull) {
            restoreTextTargets(activeTextReveal.scope);
        }

        activeTextReveal = null;
    }

    function startTextReveal(scope, mediaAudio) {
        stopTextReveal(true);

        const targets = rememberTextTargets(scope);
        if (!scope || !targets.length) return;

        const totalChars = targets.reduce((sum, target) => sum + Number(target.dataset.plainLength || 0), 0);
        if (!totalChars) return;

        targets.forEach((target) => {
            target.innerHTML = '';
        });

        const fallbackDuration = Math.max(1600, Math.min(6500, totalChars * 42));
        const startedAt = performance.now();

        activeTextReveal = {
            audio: mediaAudio,
            scope,
            frameId: 0,
        };

        const draw = (now) => {
            if (!activeTextReveal || activeTextReveal.audio !== mediaAudio) return;

            const elapsed = Math.max(0, now - startedAt);
            const hasMediaDuration = mediaAudio && Number.isFinite(mediaAudio.duration) && mediaAudio.duration > 0;
            const progress = hasMediaDuration ? mediaAudio.currentTime / mediaAudio.duration : elapsed / fallbackDuration;
            const visibleChars = Math.min(totalChars, Math.ceil(Math.max(0, Math.min(1, progress)) * totalChars));
            let remaining = visibleChars;
            let caretPlaced = false;

            targets.forEach((target, index) => {
                const originalHtml = target.dataset.originalHtml || '';
                const plainLength = Number(target.dataset.plainLength || 0);
                const visibleInTarget = Math.max(0, Math.min(plainLength, remaining));
                const isActiveTarget = !caretPlaced && visibleInTarget < plainLength;
                const shouldPlaceCaret = isActiveTarget || (index === targets.length - 1 && visibleChars >= totalChars);

                target.innerHTML = buildPartialHtml(originalHtml, visibleInTarget)
                    + (shouldPlaceCaret ? '<span class="pq-reveal-caret" aria-hidden="true">▍</span>' : '');

                if (shouldPlaceCaret) caretPlaced = true;
                remaining -= plainLength;
            });

            if (mediaAudio && !mediaAudio.paused && !mediaAudio.ended && visibleChars < totalChars) {
                activeTextReveal.frameId = window.requestAnimationFrame(draw);
                return;
            }

            if (!mediaAudio || mediaAudio.ended || visibleChars >= totalChars) {
                restoreTextTargets(scope);
                activeTextReveal = null;
            }
        };

        activeTextReveal.frameId = window.requestAnimationFrame(draw);
    }

    async function playAudioButton(button) {
        if (!button) return;

        const src = button.dataset.audioSrc;
        const scope = button.closest('[data-audio-scope]');

        if (!fieldHasValue(src)) return;

        if (activeAudioButton === button && audio && !audio.paused) {
            stopAudio();
            return;
        }

        stopAudio();
        stopQuizAudio(true);

        audio = new Audio(src);
        audio.preload = 'auto';
        activeAudioButton = button;
        activeAudioScope = scope;
        button.classList.add('is-playing');
        scope?.classList.add('is-audio-playing');
        startTextReveal(scope, audio);

        audio.addEventListener('ended', stopAudio, { once: true });
        audio.addEventListener('error', stopAudio, { once: true });

        try {
            await audio.play();
        } catch (error) {
            stopAudio();
        }
    }

    function bindAudioButtons() {
        els.content.querySelectorAll('[data-audio-button]').forEach((button) => {
            button.addEventListener('click', () => playAudioButton(button));
        });
    }

    function ensureQuizAudioPlayer(player) {
        if (!player || player.pqAudio) return player?.pqAudio || null;

        const src = player.dataset.audioSrc || '';
        if (!fieldHasValue(src)) return null;

        const media = new Audio(src);
        media.preload = 'auto';
        player.pqAudio = media;

        media.addEventListener('loadedmetadata', () => syncQuizAudioPlayer(player));
        media.addEventListener('timeupdate', () => syncQuizAudioPlayer(player));
        media.addEventListener('play', () => syncQuizAudioPlayer(player));
        media.addEventListener('pause', () => syncQuizAudioPlayer(player));
        media.addEventListener('ended', () => {
            syncQuizAudioPlayer(player);
            if (activeQuizAudio?.player === player) activeQuizAudio = null;
        });
        media.addEventListener('error', () => {
            if (activeQuizAudio?.player === player) activeQuizAudio = null;
            syncQuizAudioPlayer(player);
        });

        syncQuizAudioPlayer(player);
        return media;
    }

    function syncQuizAudioPlayer(player) {
        if (!player) return;

        const media = player.pqAudio;
        const toggle = player.querySelector('[data-quiz-audio-toggle]');
        const fill = player.querySelector('[data-quiz-audio-fill]');
        const currentEl = player.querySelector('[data-quiz-audio-current]');
        const totalEl = player.querySelector('[data-quiz-audio-total]');
        const duration = media && Number.isFinite(media.duration) ? media.duration : 0;
        const current = media && Number.isFinite(media.currentTime) ? media.currentTime : 0;
        const pct = duration > 0 ? Math.max(0, Math.min(100, (current / duration) * 100)) : 0;
        const isPlaying = !!media && !media.paused && !media.ended;

        if (fill) fill.style.width = `${pct}%`;
        if (currentEl) currentEl.textContent = formatTime(current);
        if (totalEl) totalEl.textContent = duration ? formatTime(duration) : '00:00';
        if (toggle) {
            toggle.classList.toggle('is-playing', isPlaying);
            toggle.setAttribute('aria-label', isPlaying ? 'Pause question audio' : 'Play question audio');
        }
    }

    function stopQuizAudio(reset = false, options = {}) {
        if (!activeQuizAudio?.player) return;

        const { player, media } = activeQuizAudio;
        const requestedScope = options.scope || 'all';
        const playerScope = player.dataset.quizAudioScope || 'question';

        if (requestedScope !== 'all' && requestedScope !== playerScope) return;

        try {
            media.pause();
            if (reset) media.currentTime = 0;
        } catch (error) {
        }
        syncQuizAudioPlayer(player);
        activeQuizAudio = null;
    }

    async function playQuizAudioPlayer(player, options = {}) {
        if (!player) return;

        const media = ensureQuizAudioPlayer(player);
        if (!media) return;

        const forcePlay = Boolean(options.forcePlay);
        if (activeQuizAudio?.player === player && !media.paused && !forcePlay) {
            stopQuizAudio(false);
            return;
        }

        stopAudio();
        stopQuizAudio(false);

        activeQuizAudio = { player, media };
        syncQuizAudioPlayer(player);

        try {
            await media.play();
        } catch (error) {
            syncQuizAudioPlayer(player);
        }
    }

    function seekQuizAudioPlayer(player, delta) {
        const media = ensureQuizAudioPlayer(player);
        if (!media) return;

        const duration = Number.isFinite(media.duration) ? media.duration : 0;
        let nextTime = Math.max(0, media.currentTime + delta);
        if (duration > 0) nextTime = Math.min(duration, nextTime);
        media.currentTime = nextTime;
        syncQuizAudioPlayer(player);
    }

    function autoplayQuizItemAudio(item) {
        const player = item?.querySelector?.('[data-quiz-audio-player]');
        if (!player) return;

        window.setTimeout(() => {
            if (!item.classList.contains('is-current')) return;
            playQuizAudioPlayer(player, { forcePlay: true });
        }, 140);
    }

    function bindQuizAudioPlayers() {
        els.content.querySelectorAll('[data-quiz-audio-player]').forEach((player) => {
            ensureQuizAudioPlayer(player);

            player.querySelector('[data-quiz-audio-toggle]')?.addEventListener('click', () => playQuizAudioPlayer(player));
            player.querySelector('[data-quiz-audio-back]')?.addEventListener('click', () => seekQuizAudioPlayer(player, -10));
            player.querySelector('[data-quiz-audio-forward]')?.addEventListener('click', () => seekQuizAudioPlayer(player, 10));
            player.querySelector('[data-quiz-audio-track]')?.addEventListener('click', (event) => {
                const media = ensureQuizAudioPlayer(player);
                if (!media || !Number.isFinite(media.duration) || media.duration <= 0) return;

                const rect = event.currentTarget.getBoundingClientRect();
                const x = Math.min(Math.max(0, event.clientX - rect.left), rect.width);
                const ratio = rect.width > 0 ? x / rect.width : 0;
                media.currentTime = ratio * media.duration;
                syncQuizAudioPlayer(player);
            });
        });
    }

    function bindQuizInteractions() {
        els.content.querySelectorAll('[data-quiz-block]').forEach((block) => {
            const items = Array.from(block.querySelectorAll('[data-quiz-item]'));

            function showItem(index) {
                const complete = block.querySelector('[data-quiz-complete]');
                if (complete) {
                    complete.classList.add('hidden');
                    complete.classList.remove('block');
                }

                stopQuizAudio(true, { scope: 'question' });
                items.forEach((item, itemIndex) => {
                    item.classList.toggle('is-current', itemIndex === index);
                });
                autoplayQuizItemAudio(items[index]);
            }

            function showCompletion() {
                stopQuizAudio(true);
                playPracticeSfx('success');
                items.forEach((item) => item.classList.remove('is-current'));

                const complete = block.querySelector('[data-quiz-complete]');
                if (!complete) return;

                complete.classList.remove('hidden');
                complete.classList.add('block');
                complete.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
            }

            function flash(item, className) {
                item.classList.remove('is-correct-flash', 'is-wrong-flash');
                void item.offsetWidth;
                item.classList.add(className);
                window.setTimeout(() => item.classList.remove(className), 600);
            }

            function normalizeAnswer(value) {
                return String(value ?? '')
                    .trim()
                    .toLowerCase()
                    .replace(/[’‘]/g, "'")
                    .replace(/[“”]/g, '"')
                    .replace(/\s+/g, ' ');
            }

            function completeItem(item, itemIndex) {
                item.classList.add('is-locked', 'is-complete');
                playPracticeSfx('correct');
                flash(item, 'is-correct-flash');

                const nextItem = items[itemIndex + 1];
                if (nextItem) {
                    window.setTimeout(() => showItem(itemIndex + 1), 740);
                    return;
                }

                window.setTimeout(showCompletion, 740);
            }

            items.forEach((item, itemIndex) => {
                const quizType = item.dataset.quizType || 'multiple_choice';

                if (quizType === 'input') {
                    const input = item.querySelector('[data-quiz-input]');
                    const submit = item.querySelector('[data-quiz-submit]');
                    const feedback = item.querySelector('[data-quiz-feedback]');
                    let acceptedAnswers = [];

                    try {
                        acceptedAnswers = JSON.parse(item.dataset.acceptedAnswers || '[]');
                    } catch (error) {
                        acceptedAnswers = [];
                    }

                    const checkInput = () => {
                        if (item.classList.contains('is-locked')) return;
                        if (!input) return;

                        const value = input.value.trim();
                        if (!value) {
                            input.focus();
                            return;
                        }

                        const isCorrect = acceptedAnswers.some((answer) => normalizeAnswer(answer) === normalizeAnswer(value));

                        input.classList.remove('border-red-400', 'bg-red-50', 'text-red-700', 'border-green-500', 'bg-green-50', 'text-green-700');
                        if (feedback) feedback.classList.add('hidden');

                        if (!isCorrect) {
                            playPracticeSfx('wrong');
                            input.classList.add('border-red-400', 'bg-red-50', 'text-red-700');
                            if (feedback) {
                                feedback.textContent = 'Try again.';
                                feedback.classList.remove('hidden', 'text-green-700');
                                feedback.classList.add('text-red-700');
                            }
                            flash(item, 'is-wrong-flash');
                            return;
                        }

                        input.classList.add('border-green-500', 'bg-green-50', 'text-green-700');
                        input.disabled = true;
                        if (submit) submit.disabled = true;
                        if (feedback) {
                            feedback.textContent = 'Correct.';
                            feedback.classList.remove('hidden', 'text-red-700');
                            feedback.classList.add('text-green-700');
                        }
                        completeItem(item, itemIndex);
                    };

                    if (submit) submit.addEventListener('click', checkInput);
                    if (input) {
                        input.addEventListener('keydown', (event) => {
                            if (event.key === 'Enter') checkInput();
                        });
                    }

                    return;
                }

                const correctAnswer = Number(item.dataset.correctAnswer || 0);
                const options = Array.from(item.querySelectorAll('[data-quiz-option]'));

                options.forEach((option) => {
                    option.addEventListener('click', () => {
                        if (item.classList.contains('is-locked')) return;

                        const selectedIndex = Number(option.dataset.optionIndex || 0);
                        options.forEach((button) => button.classList.remove('is-wrong'));

                        if (selectedIndex !== correctAnswer) {
                            playPracticeSfx('wrong');
                            option.classList.add('is-wrong');
                            flash(item, 'is-wrong-flash');
                            window.setTimeout(() => option.classList.remove('is-wrong'), 720);
                            return;
                        }

                        option.classList.add('is-correct');
                        options.forEach((button) => { button.disabled = true; });
                        completeItem(item, itemIndex);
                    });
                });
            });
        });
    }

    function transcriptRows() {
        return Array.from(els.content.querySelectorAll('[data-transcript-row][data-transcript-start]'));
    }

    function updateTranscriptHighlight(time) {
        const rows = transcriptRows();
        rows.forEach((row, index) => {
            const start = Number(row.dataset.transcriptStart || 0);
            const endRaw = Number(row.dataset.transcriptEnd || 0);
            const nextStart = Number(rows[index + 1]?.dataset.transcriptStart || Number.POSITIVE_INFINITY);
            const end = Number.isFinite(endRaw) && endRaw > start ? endRaw : nextStart;
            const isActive = time >= start && time < end;
            row.classList.toggle('is-active', isActive);
        });

    }

    function videoCaptionLines() {
        const wrap = els.content.querySelector('[data-video-captions]');
        if (!wrap) return [];

        try {
            const parsed = JSON.parse(wrap.getAttribute('data-video-captions') || '[]');
            return Array.isArray(parsed) ? parsed.filter((line) => fieldHasValue(line.text || line.caption)) : [];
        } catch (error) {
            return [];
        }
    }

    function videoCaptionOverlay() {
        const playerOverlay = videoJsPlayer?.el?.()?.querySelector?.('[data-video-caption-overlay]');
        return playerOverlay || els.content.querySelector('[data-video-caption-overlay]');
    }

    function ensureVideoCaptionOverlay() {
        const playerEl = videoJsPlayer?.el?.();
        if (!playerEl) return videoCaptionOverlay();

        let overlay = playerEl.querySelector('[data-video-caption-overlay]');
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.className = 'pq-video-caption-overlay pointer-events-none absolute left-1/2 bottom-[clamp(.8rem,4%,1.75rem)] z-[80] flex w-[min(90%,54rem)] -translate-x-1/2 justify-center text-center';
            overlay.setAttribute('data-video-caption-overlay', '');
            overlay.setAttribute('aria-live', 'polite');
            overlay.setAttribute('aria-hidden', 'true');
            overlay.innerHTML = '<span class="pq-video-caption-text inline-block max-w-full rounded-[.8rem] border border-white/10 bg-slate-950/85 px-[.82rem] py-2 text-[clamp(.88rem,3.4vw,1.16rem)] font-extrabold leading-[1.32] tracking-[-.012em] text-white opacity-0 shadow-[0_12px_34px_rgba(0,0,0,.34)] backdrop-blur-md transition duration-300 [transform:translateY(12px)_scale(.96)]" data-video-caption-text></span>';
            playerEl.appendChild(overlay);
        }

        return overlay;
    }

    function videoCaptionTextNode(overlay) {
        return overlay?.querySelector?.('[data-video-caption-text]') || overlay || null;
    }

    function videoCcButton() {
        return videoJsPlayer?.el?.()?.querySelector?.('[data-video-cc-button]')
            || els.content.querySelector('[data-video-cc-button]');
    }

    function currentVideoPageRoot() {
        return els.content.querySelector('[data-video-page], [data-short-video-page]');
    }

    function isVideoCcEnabled() {
        return currentVideoPageRoot()?.classList.contains('is-cc-enabled') || false;
    }

    function updateVideoCcButtonState(enabled) {
        const button = videoCcButton();
        if (!button) return;

        button.classList.toggle('is-active', enabled);
        button.setAttribute('aria-pressed', enabled ? 'true' : 'false');
        button.setAttribute('title', enabled ? 'Hide captions' : 'Show captions');
        button.setAttribute('aria-label', enabled ? 'Hide captions' : 'Show captions');
    }

    function setVideoCaptionsEnabled(enabled) {
        const page = currentVideoPageRoot();
        const overlay = ensureVideoCaptionOverlay();
        if (!page || !overlay) return;

        page.classList.toggle('is-cc-enabled', enabled);
        videoJsPlayer?.el?.()?.classList.toggle?.('is-cc-enabled', enabled);
        overlay.setAttribute('aria-hidden', enabled ? 'false' : 'true');
        updateVideoCcButtonState(enabled);

        if (!enabled) {
            const textNode = videoCaptionTextNode(overlay);
            if (textNode) textNode.textContent = '';
            overlay.classList.remove('is-visible');
            return;
        }

        const nativeVideo = els.content.querySelector('#passingQuestionVideo');
        const currentTime = videoJsPlayer
            ? Number(videoJsPlayer.currentTime() || 0)
            : Number(nativeVideo?.currentTime || 0);
        updateVideoCaptionOverlay(currentTime);
    }

    function updateVideoCaptionOverlay(time) {
        const overlay = ensureVideoCaptionOverlay();
        if (!overlay || !isVideoCcEnabled()) return;

        const rows = videoCaptionLines();
        const current = rows.find((line, index) => {
            const start = Number(line.start ?? 0);
            const endRaw = Number(line.end ?? 0);
            const nextStart = Number(rows[index + 1]?.start ?? Number.POSITIVE_INFINITY);
            const end = Number.isFinite(endRaw) && endRaw > start ? endRaw : nextStart;
            return time >= start && time < end;
        });

        const textNode = videoCaptionTextNode(overlay);
        const text = current ? displayText(current.text || current.caption || '') : '';
        if (textNode) textNode.textContent = text;
        overlay.classList.toggle('is-visible', fieldHasValue(text));
    }

    function installVideoCcButton() {
        if (!videoJsPlayer || !videoCaptionLines().length) return;

        videoJsPlayer.ready(() => {
            const playerEl = videoJsPlayer.el?.();
            const controlBar = playerEl?.querySelector?.('.vjs-control-bar');
            if (!controlBar || controlBar.querySelector('[data-video-cc-button]')) return;

            controlBar.querySelector('.vjs-picture-in-picture-control')?.remove();
            ensureVideoCaptionOverlay();

            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'vjs-control vjs-button pq-vjs-cc-button';
            button.setAttribute('data-video-cc-button', '');
            button.setAttribute('aria-pressed', 'false');
            button.setAttribute('aria-label', 'Show captions');
            button.setAttribute('title', 'Show captions');
            button.innerHTML = '<span class="vjs-icon-placeholder" aria-hidden="true">CC</span><span class="vjs-control-text" aria-live="polite">Show captions</span>';

            button.addEventListener('click', (event) => {
                event.preventDefault();
                event.stopPropagation();
                setVideoCaptionsEnabled(!isVideoCcEnabled());
            });

            const fullscreenButton = controlBar.querySelector('.vjs-fullscreen-control');
            if (fullscreenButton) controlBar.insertBefore(button, fullscreenButton);
            else controlBar.appendChild(button);

            setVideoCaptionsEnabled(false);
        });
    }

    function bindTranscriptInteractions() {
        const shell = els.content.querySelector('[data-transcript-shell]');
        const toggle = els.content.querySelector('[data-transcript-toggle]');
        const label = els.content.querySelector('[data-transcript-label]');
        const videoPage = els.content.querySelector('[data-video-page]');

        if (!shell || !toggle) return;

        const syncTranscriptState = () => {
            const isOpen = shell.classList.contains('is-open');
            const panel = shell.querySelector('[data-transcript-panel]');
            const icon = shell.querySelector('[data-transcript-icon]');

            if (label) label.textContent = isOpen ? 'Hide transcript' : 'Show transcript';
            if (panel) panel.classList.toggle('hidden', !isOpen);
            if (icon) icon.classList.toggle('rotate-180', isOpen);

            if (videoPage) {
                videoPage.classList.toggle('is-transcript-open', isOpen);
            }

            if (isOpen) {
                const activeRow = shell.querySelector('.pq-transcript-row.is-active');
                activeRow?.scrollIntoView({ block: 'nearest' });
            }
        };

        toggle.addEventListener('click', () => {
            shell.classList.toggle('is-open');
            syncTranscriptState();
        });

        syncTranscriptState();

        els.content.querySelectorAll('[data-transcript-row]').forEach((row) => {
            row.addEventListener('click', () => {
                const start = Number(row.dataset.transcriptStart || 0);
                if (!Number.isFinite(start)) return;

                if (videoJsPlayer) {
                    try {
                        videoJsPlayer.currentTime(start);
                        videoJsPlayer.play();
                    } catch (error) {}
                    return;
                }

                const video = els.content.querySelector('video');
                if (video) {
                    video.currentTime = start;
                    video.play().catch(() => {});
                }
            });
        });
    }

    function setupVideoPlayer() {
        const video = els.content.querySelector('#passingQuestionVideo');
        if (!video) return;

        const status = els.content.querySelector('[data-video-status]');
        const src = video.dataset.videoSrc || video.querySelector('source')?.getAttribute('src') || '';
        const type = mediaType(src);
        const canUseNativeHls = !!video.canPlayType('application/vnd.apple.mpegurl');

        video.setAttribute('playsinline', '');
        video.setAttribute('webkit-playsinline', '');
        video.preload = 'auto';

        if (window.videojs) {
            try {
                videoJsPlayer = window.videojs(video, {
                    controls: true,
                    autoplay: false,
                    fluid: false,
                    responsive: true,
                    preload: 'auto',
                    inactivityTimeout: 650,
                    controlBar: {
                        pictureInPictureToggle: false,
                    },
                    html5: {
                        vhs: {
                            overrideNative: !canUseNativeHls,
                        },
                        nativeAudioTracks: canUseNativeHls,
                        nativeVideoTracks: canUseNativeHls,
                    },
                });

                videoJsPlayer.ready(() => {
                    if (fieldHasValue(src) && typeof videoJsPlayer.src === 'function') {
                        videoJsPlayer.src({ src, type });
                        videoJsPlayer.load();
                    }
                    installVideoCcButton();
                });

                videoJsPlayer.on('fullscreenchange', () => {
                    const currentTime = Number(videoJsPlayer.currentTime() || 0);
                    updateVideoCaptionOverlay(currentTime);
                });

                videoJsPlayer.on('loadedmetadata', () => {
                    const currentTime = Number(videoJsPlayer.currentTime() || 0);
                    updateTranscriptHighlight(currentTime);
                    updateVideoCaptionOverlay(currentTime);
                });
                videoJsPlayer.on('timeupdate', () => {
                    const currentTime = Number(videoJsPlayer.currentTime() || 0);
                    updateTranscriptHighlight(currentTime);
                    updateVideoCaptionOverlay(currentTime);
                });
                videoJsPlayer.on('error', () => {
                    const error = typeof videoJsPlayer.error === 'function' ? videoJsPlayer.error() : null;
                    if (status) {
                        status.classList.remove('hidden');
                        status.textContent = error?.message || 'Video could not be loaded. Please check the video source.';
                    }
                });
                return;
            } catch (error) {
            }
        }

        if (fieldHasValue(src)) {
            const source = video.querySelector('source');
            if (source) {
                source.setAttribute('src', src);
                source.setAttribute('type', type);
            } else {
                video.src = src;
            }
            try { video.load(); } catch (error) {}
        }

        video.addEventListener('timeupdate', () => {
            const currentTime = Number(video.currentTime || 0);
            updateTranscriptHighlight(currentTime);
            updateVideoCaptionOverlay(currentTime);
        });
        video.addEventListener('error', () => {
            if (status) {
                status.classList.remove('hidden');
                status.textContent = 'Video could not be loaded. Please check the video source.';
            }
        });
    }

    function bindShortVideoOverlay() {
        const overlay = els.content.querySelector('[data-short-video-overlay]');
        const video = els.content.querySelector('#passingQuestionVideo');
        if (!overlay || !video) return;

        const hideOverlay = () => overlay.classList.add('is-hidden');
        const showOverlay = () => overlay.classList.remove('is-hidden');

        overlay.addEventListener('click', () => {
            hideOverlay();

            if (videoJsPlayer && typeof videoJsPlayer.play === 'function') {
                attemptPromise(videoJsPlayer.play(), 'short video');
                return;
            }

            try {
                attemptPromise(video.play(), 'short video');
            } catch (error) {
                showOverlay();
            }
        });

        if (videoJsPlayer) {
            videoJsPlayer.on('play', hideOverlay);
            videoJsPlayer.on('playing', hideOverlay);
            videoJsPlayer.on('ended', showOverlay);
            videoJsPlayer.on('error', showOverlay);
            return;
        }

        video.addEventListener('play', hideOverlay);
        video.addEventListener('playing', hideOverlay);
        video.addEventListener('ended', showOverlay);
        video.addEventListener('error', showOverlay);
    }

    function conversationLinesFromRoot(root) {
        if (!root) return [];

        try {
            const raw = root.getAttribute('data-conversation-lines') || '[]';
            const parsed = JSON.parse(raw);
            return Array.isArray(parsed) ? parsed.filter((line) => fieldHasValue(line.text)) : [];
        } catch (error) {
            return [];
        }
    }

    function resetConversationText(root, keepCompleted = false) {
        if (!root) return;

        root.querySelectorAll('[data-conversation-line]').forEach((line) => {
            line.classList.remove('is-active');
            if (!keepCompleted) {
                const target = line.querySelector('[data-conversation-text]');
                if (target) target.innerHTML = '';
            }
        });

        root.querySelectorAll('[data-conversation-speaker]').forEach((speaker) => speaker.classList.remove('is-active'));
        root.querySelectorAll('[data-conversation-toggle]').forEach((button) => {
            button.classList.remove('is-playing');
            button.setAttribute('aria-label', 'Play full conversation');
        });
    }

    function setConversationActive(root, side, lineEl = null) {
        if (!root) return;

        root.querySelectorAll('[data-conversation-line]').forEach((line) => line.classList.toggle('is-active', line === lineEl));
        root.querySelectorAll('[data-conversation-speaker]').forEach((speaker) => {
            speaker.classList.toggle('is-active', speaker.dataset.conversationSpeaker === side);
        });
        root.querySelectorAll('[data-conversation-toggle]').forEach((button) => {
            const isMobileButton = button.hasAttribute('data-conversation-mobile-button');
            const isActiveBubbleButton = !!lineEl && lineEl.contains(button);
            const shouldAnimate = isMobileButton ? conversationState.running : isActiveBubbleButton;

            button.classList.toggle('is-playing', shouldAnimate);
            button.setAttribute('aria-label', conversationState.running ? 'Stop conversation' : 'Play full conversation');

            if (isActiveBubbleButton || isMobileButton) conversationState.activeButton = button;
        });
    }

    function stopConversation(soft = false) {
        conversationState.stopRequested = true;
        conversationState.running = false;

        if (conversationState.revealTimer) {
            window.clearInterval(conversationState.revealTimer);
            conversationState.revealTimer = null;
        }

        if (conversationState.currentAudio) {
            try {
                conversationState.currentAudio.pause();
                conversationState.currentAudio.currentTime = 0;
            } catch (error) {
            }
            conversationState.currentAudio = null;
        }

        if (conversationState.activeRoot) {
            conversationState.activeRoot.classList.add('is-conversation-idle');
            conversationState.activeRoot.querySelectorAll('[data-conversation-toggle]').forEach((button) => {
                button.classList.remove('is-playing');
                button.setAttribute('aria-label', 'Play full conversation');
            });
            resetConversationText(conversationState.activeRoot, soft);
        }

        conversationState.activeRoot = null;
        conversationState.activeButton = null;
    }

    function revealConversationLine(lineEl, mediaAudio) {
        return new Promise((resolve) => {
            if (!lineEl) {
                resolve();
                return;
            }

            const target = lineEl.querySelector('[data-conversation-text]');
            const originalText = lineEl.dataset.lineText || '';
            const originalHtml = escapeHtml(displayText(originalText));
            const plainText = stripHtml(originalHtml);

            if (!target || !plainText.trim()) {
                resolve();
                return;
            }

            target.innerHTML = '';
            let index = 0;
            let finished = false;

            function finish() {
                if (finished) return;
                finished = true;
                if (conversationState.revealTimer) {
                    window.clearInterval(conversationState.revealTimer);
                    conversationState.revealTimer = null;
                }
                target.innerHTML = originalHtml;
                resolve();
            }

            conversationState.revealTimer = window.setInterval(() => {
                if (conversationState.stopRequested) {
                    finish();
                    return;
                }

                index = Math.min(plainText.length, index + 1);
                target.innerHTML = buildPartialHtml(originalHtml, index)
                    + (index < plainText.length ? '<span class="pq-reveal-caret" aria-hidden="true">▍</span>' : '');

                if (index >= plainText.length && (!mediaAudio || !Number.isFinite(mediaAudio.duration) || mediaAudio.duration <= 0)) {
                    finish();
                }
            }, 40);

            if (mediaAudio) {
                mediaAudio.addEventListener('ended', finish, { once: true });
                mediaAudio.addEventListener('error', finish, { once: true });
            }
        });
    }

    async function playConversation(root, button) {
        if (!root || !button || conversationState.running) return;

        stopAudio();
        stopConversation(false);

        const dialogueLines = conversationLinesFromRoot(root);
        if (!dialogueLines.length) return;

        conversationState.running = true;
        conversationState.stopRequested = false;
        conversationState.activeRoot = root;
        conversationState.activeButton = button;
        root.classList.remove('is-conversation-idle');
        resetConversationText(root, false);
        root.querySelectorAll('[data-conversation-toggle]').forEach((control) => {
            control.classList.remove('is-playing');
            control.setAttribute('aria-label', 'Stop conversation');
        });

        for (const dialogueLine of dialogueLines) {
            if (conversationState.stopRequested) break;

            const side = dialogueLine.side || 'left';
            const lineEl = root.querySelector(`[data-conversation-line][data-side="${side === 'right' ? 'right' : 'left'}"]`);
            if (!lineEl) continue;

            const speakerLabel = lineEl.querySelector('[data-conversation-speaker-name]');
            if (speakerLabel) speakerLabel.textContent = displayText(dialogueLine.speaker || speakerLabel.textContent);

            lineEl.dataset.lineText = dialogueLine.text || '';
            lineEl.dataset.lineSound = dialogueLine.sound || '';

            setConversationActive(root, side, lineEl);

            if (fieldHasValue(dialogueLine.sound)) {
                const lineAudio = new Audio(dialogueLine.sound);
                conversationState.currentAudio = lineAudio;

                const revealPromise = revealConversationLine(lineEl, lineAudio);

                try {
                    await lineAudio.play();
                } catch (error) {
                }

                await revealPromise;
                conversationState.currentAudio = null;
            } else {
                await revealConversationLine(lineEl, null);
            }

            if (conversationState.stopRequested) break;
            await new Promise((resolve) => window.setTimeout(resolve, 420));
        }

        if (!conversationState.stopRequested) {
            conversationState.running = false;
            root.classList.add('is-conversation-idle');
            resetConversationText(root, true);
            conversationState.activeRoot = null;
            conversationState.activeButton = null;
        }
    }

    function bindConversationInteractions() {
        els.content.querySelectorAll('[data-conversation-page]').forEach((root) => {
            const buttons = Array.from(root.querySelectorAll('[data-conversation-toggle]'));
            if (!buttons.length) return;

            buttons.forEach((button) => {
                button.addEventListener('click', () => {
                    if (conversationState.running && conversationState.activeRoot === root) {
                        stopConversation(true);
                        return;
                    }

                    playConversation(root, button);
                });
            });
        });
    }

    function attemptPromise(promise, label = 'media') {
        if (promise && typeof promise.catch === 'function') {
            promise.catch((error) => {
            });
        }
    }

    function autoplayCurrentPageMedia() {
        const pageAtRequest = currentPage();

        window.setTimeout(() => {
            if (currentPage() !== pageAtRequest) return;

            const conversationButton = els.content.querySelector('[data-conversation-toggle]');
            if (conversationButton) {
                conversationButton.click();
                return;
            }

            if (videoJsPlayer) {
                try {
                    const playVideo = () => {
                        if (typeof videoJsPlayer.muted === 'function') {
                            videoJsPlayer.muted(false);
                        }
                        if (typeof videoJsPlayer.play === 'function') {
                            attemptPromise(videoJsPlayer.play(), 'video');
                        }
                    };

                    if (typeof videoJsPlayer.ready === 'function') {
                        videoJsPlayer.ready(() => window.setTimeout(playVideo, 60));
                    } else {
                        playVideo();
                    }
                } catch (error) {
                }
                return;
            }

            const nativeVideo = els.content.querySelector('#passingQuestionVideo');
            if (nativeVideo) {
                try {
                    nativeVideo.muted = false;
                    attemptPromise(nativeVideo.play(), 'video');
                } catch (error) {
                }
                return;
            }

            const sharedQuizAudioPlayer = els.content.querySelector('[data-quiz-audio-player][data-quiz-audio-scope="page"]');
            if (sharedQuizAudioPlayer) {
                playQuizAudioPlayer(sharedQuizAudioPlayer, { forcePlay: true });
                return;
            }

            const currentQuizAudioPlayer = els.content.querySelector('[data-quiz-item].is-current [data-quiz-audio-player]');
            if (currentQuizAudioPlayer) {
                playQuizAudioPlayer(currentQuizAudioPlayer, { forcePlay: true });
                return;
            }

            const firstAudioButton = els.content.querySelector('[data-audio-button]');
            if (firstAudioButton) {
                playAudioButton(firstAudioButton);
            }
        }, 260);
    }

    function pageIndexFromProgressPosition(clientX) {
        if (!els.progressTrack || !pages.length) return pageIndex;

        const rect = els.progressTrack.getBoundingClientRect();
        if (!rect.width) return pageIndex;

        const ratio = Math.max(0, Math.min(1, (clientX - rect.left) / rect.width));
        return Math.max(0, Math.min(pages.length - 1, Math.floor(ratio * pages.length)));
    }

    function jumpToPageImmediately(index, { animate = false } = {}) {
        const nextIndex = Math.max(0, Math.min(pages.length - 1, index));
        if (nextIndex === pageIndex) return;

        cleanupMedia();

        window.clearTimeout(revealTimer);
        els.card.classList.remove('is-page-transitioning');
        pageIndex = nextIndex;
        render({ animate });
    }

    function jumpToProgressClientX(clientX, options = {}) {
        if (!els.progressTrack || !pages.length) return;
        jumpToPageImmediately(pageIndexFromProgressPosition(clientX), options);
    }

    function bindProgressNavigation() {
        if (!els.progressTrack) return;

        let isScrubbing = false;
        let pendingClientX = 0;
        let scrubFrame = 0;

        const requestProgressJump = (clientX, options = {}) => {
            pendingClientX = clientX;
            if (scrubFrame) return;

            scrubFrame = window.requestAnimationFrame(() => {
                scrubFrame = 0;
                jumpToProgressClientX(pendingClientX, options);
            });
        };

        const stopScrubbing = (event) => {
            if (!isScrubbing) return;

            event?.preventDefault?.();
            event?.stopPropagation?.();

            isScrubbing = false;
            els.progressTrack.classList.remove('is-scrubbing');

            if (event && Number.isFinite(event.clientX)) {
                jumpToProgressClientX(event.clientX, { animate: true });
            }

            if (event?.pointerId !== undefined && els.progressTrack.releasePointerCapture) {
                try { els.progressTrack.releasePointerCapture(event.pointerId); } catch (error) {}
            }
        };

        els.progressTrack.addEventListener('pointerdown', (event) => {
            if (!pages.length) return;

            event.preventDefault();
            event.stopPropagation();

            isScrubbing = true;
            els.progressTrack.classList.add('is-scrubbing');

            if (els.progressTrack.setPointerCapture) {
                try { els.progressTrack.setPointerCapture(event.pointerId); } catch (error) {}
            }

            requestProgressJump(event.clientX, { animate: false });
        });

        els.progressTrack.addEventListener('pointermove', (event) => {
            if (!isScrubbing) return;

            event.preventDefault();
            event.stopPropagation();
            requestProgressJump(event.clientX, { animate: false });
        });

        els.progressTrack.addEventListener('pointerup', stopScrubbing);
        els.progressTrack.addEventListener('pointercancel', stopScrubbing);
        els.progressTrack.addEventListener('lostpointercapture', stopScrubbing);

        els.progressTrack.addEventListener('keydown', (event) => {
            if (!pages.length) return;

            if (event.key === 'ArrowLeft') {
                event.preventDefault();
                goTo(pageIndex - 1);
                return;
            }

            if (event.key === 'ArrowRight') {
                event.preventDefault();
                goTo(pageIndex + 1);
                return;
            }

            if (event.key === 'Home') {
                event.preventDefault();
                goTo(0);
                return;
            }

            if (event.key === 'End') {
                event.preventDefault();
                goTo(pages.length - 1);
            }
        });
    }

    function bindNavigation() {
        bindProgressNavigation();
        els.previous.addEventListener('click', () => goTo(pageIndex - 1));
        els.next.addEventListener('click', () => goTo(pageIndex + 1));

        document.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowLeft') goTo(pageIndex - 1);
            if (event.key === 'ArrowRight') goTo(pageIndex + 1);
        });

        let startX = 0;
        let startY = 0;
        let tracking = false;

        els.card.addEventListener('touchstart', (event) => {
            const touch = event.touches[0];
            if (!touch) return;
            startX = touch.clientX;
            startY = touch.clientY;
            tracking = true;
        }, { passive: true });

        els.card.addEventListener('touchend', (event) => {
            if (!tracking) return;
            tracking = false;
            const touch = event.changedTouches[0];
            if (!touch) return;

            const dx = touch.clientX - startX;
            const dy = touch.clientY - startY;
            if (Math.abs(dx) < 56 || Math.abs(dx) < Math.abs(dy) * 1.25) return;

            if (dx < 0) goTo(pageIndex + 1);
            if (dx > 0) goTo(pageIndex - 1);
        }, { passive: true });
    }

    bindNavigation();
    render({ animate: true });
</script>
</body>
</html>
