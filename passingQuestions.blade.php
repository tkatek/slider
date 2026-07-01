{{-- SECTION: PHP data for slider questions and menu layout contract. --}}
<?php
$questionData = require base_path('resources/views/slider/questions.php');

$appData = [
    'topics' => $questionData['topics'] ?? [],
    'debug' => (bool) config('app.debug'),
    'environment' => app()->environment(),
    'tailwindBuild' => 'cdn-tailwind-browser',
];

$passingQuestionsMenuContract = [
    // Menu layout variables shared with the slider shell.
    'mobileHeaderCssVar' => '--pq-menu-mobile-height',
    'desktopSidebarCssVar' => '--pq-sidebar-width',
];
?>
{{-- SECTION: HTML document head and external assets. --}}
        <!doctype html>
<html lang="en" class="h-full bg-[#f4f6ff]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Passing Questions Card</title>
    {{-- SECTION: Tailwind CDN config for this slider page. --}}
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
                        mobileShort: {raw: '(max-width: 520px) and (max-height: 740px)'},
                        short: {raw: '(min-width: 768px) and (max-height: 760px)'},
                        laptop: {raw: '(min-width: 1280px) and (max-height: 840px)'},
                        desktop: {raw: '(min-width: 1440px)'},
                        wide: {raw: '(min-width: 1536px)'},
                        ultra: {raw: '(min-width: 1800px)'},
                        sidebar: {raw: '(min-width: 1280px)'},
                    },
                },
            },
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        window.PASSING_QUESTIONS_BOOTSTRAP = {
            debug: @json($appData['debug'] ?? false),
            environment: @json($appData['environment'] ?? 'production'),
            tailwindBuild: @json($appData['tailwindBuild'] ?? 'cdn'),
            menuContract: @json($passingQuestionsMenuContract),
        };
    </script>
    <link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @include("slider.sections.language", ["sectionStyles" => true])
    @include("slider.sections.listening", ["sectionStyles" => true])
    @include("slider.sections.practice", ["sectionStyles" => true])
    @include("slider.sections.revision-test", ["sectionStyles" => true])
    {{-- SECTION: Custom CSS for slider UI, animation states, video fixes, and responsive rules. --}}
    <style>
        /* Custom CSS for slider UI, animations, media, and responsive fixes. */

        :root {
            --pq-ease: cubic-bezier(.2, .8, .2, 1);
            --pq-menu-mobile-height: 0px;
            --pq-sidebar-width: 340px;
        }

        button:focus-visible,
        [tabindex]:focus-visible {
            outline: 3px solid rgba(102, 93, 232, .32);
            outline-offset: 3px;
        }

        [data-question-content],
        .pq-transcript-panel {
            scrollbar-width: thin;
            scrollbar-color: rgba(102, 93, 232, .24) transparent;
        }

        [data-question-content]::-webkit-scrollbar {
            width: 6px;
        }

        [data-question-content]::-webkit-scrollbar-thumb,
        .pq-transcript-panel::-webkit-scrollbar-thumb {
            border-radius: 999px;
            background: rgba(102, 93, 232, .24);
        }

        .pq-transcript-panel::-webkit-scrollbar {
            width: 5px;
        }

        @media (max-width: 520px) {
            [data-question-content], .pq-transcript-panel {
                scrollbar-width: none;
                -ms-overflow-style: none;
            }

            [data-question-content]::-webkit-scrollbar, .pq-transcript-panel::-webkit-scrollbar {
                display: none;
                width: 0;
                height: 0;
            }

            .pq-reveal-caret {
                font-size: .9em !important;
                vertical-align: baseline !important;
            }
        }

        .pq-panel.is-page-transitioning [data-question-content],
        .pq-panel.is-page-transitioning [data-section-title] {
            animation: pqPageOut 180ms ease-in both;
        }

        .pq-panel.is-revealing [data-question-content],
        .pq-panel.is-revealing [data-section-title],
        .pq-panel.is-revealing [data-page-counter] {
            animation: pqPageIn 420ms var(--pq-ease) both;
        }

        .pq-progress-bar::after {
            position: absolute;
            inset: 0;
            background: linear-gradient(100deg, transparent 20%, rgba(255, 255, 255, .72) 48%, transparent 74%);
            content: "";
            transform: translateX(-120%);
            animation: pqProgressShine 2.8s ease-in-out infinite;
        }

        [data-progress-track]::before {
            position: absolute;
            inset: 50% 0 auto;
            height: .42rem;
            border-radius: 999px;
            background: #eceafd;
            content: "";
            transform: translateY(-50%);
            transition: background-color 180ms ease;
        }

        [data-progress-track]:hover::before {
            background: #e2dfff;
        }

        [data-progress-track][aria-disabled="true"] {
            cursor: not-allowed;
        }

        [data-progress-track][aria-disabled="true"]::before {
            background: #f0eeff;
        }

        .pq-section-dot {
            animation: pqSectionDot 2.8s ease-in-out infinite;
        }

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

        .pq-audio-btn > * {
            position: relative;
            z-index: 1;
        }

        .pq-audio-wave {
            display: none;
        }

        .pq-audio-wave span {
            transform-origin: center bottom;
            animation: pqAudioBar .58s ease-in-out infinite alternate;
        }

        .pq-audio-wave span:nth-child(2) {
            animation-delay: 120ms;
        }

        .pq-audio-wave span:nth-child(3) {
            animation-delay: 240ms;
        }

        .pq-audio-btn.is-playing::before {
            animation: pqAudioRing 1.45s ease-out infinite;
        }

        .pq-audio-btn.is-playing .pq-audio-icon {
            display: none;
        }

        .pq-audio-btn.is-playing .pq-audio-wave {
            display: inline-flex;
        }

        [data-audio-text], [data-audio-copy] {
            transition: color 180ms ease, text-shadow 180ms ease;
        }

        .is-audio-playing [data-audio-text],
        [data-audio-text].is-audio-text-active {
            color: #554bd2 !important;
        }

        .is-audio-playing [data-audio-copy],
        [data-audio-copy].is-audio-copy-active {
            color: #665de8 !important;
        }

        .pq-reveal-caret {
            display: inline-block;
            margin-left: .08em;
            color: #665de8;
            font-weight: 900;
            animation: pqRevealCaretBlink .82s steps(1) infinite;
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .001ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .001ms !important;
            }

            .pq-panel.is-page-transitioning [data-question-content],
            .pq-panel.is-page-transitioning [data-section-title],
            .pq-panel.is-revealing [data-question-content],
            .pq-panel.is-revealing [data-section-title],
            .pq-panel.is-revealing [data-page-counter],
            .pq-list-row,
            .pq-image-frame img,
            .pq-audio-btn::before,
            .pq-section-dot,
            .pq-reveal-caret {
                animation: none !important;
                transform: none !important;
            }

            .pq-audio-btn.is-playing .pq-audio-wave span,
            [data-audio-text],
            [data-audio-copy] {
                animation: none !important;
            }
        }

        @keyframes pqPageOut {
            to {
                opacity: 0;
                transform: translateX(-16px) scale(.988);
            }
        }

        @keyframes pqPageIn {
            from {
                opacity: 0;
                transform: translateX(22px) scale(.985);
            }
            to {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }

        @keyframes pqImageReveal {
            from {
                opacity: 0;
                transform: scale(1.035);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes pqOptionEnter {
            from {
                opacity: 0;
                transform: translateY(11px) scale(.985);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes pqAudioRing {
            0% {
                opacity: .75;
                transform: scale(.84);
            }
            100% {
                opacity: 0;
                transform: scale(1.34);
            }
        }

        @keyframes pqAudioBar {
            from {
                transform: scaleY(.48);
                opacity: .72;
            }
            to {
                transform: scaleY(1.14);
                opacity: 1;
            }
        }

        @keyframes pqTextPulse {
            from {
                text-shadow: 0 0 0 rgba(102, 93, 232, 0);
            }
            to {
                text-shadow: 0 7px 20px rgba(102, 93, 232, .2);
            }
        }

        @keyframes pqTextPulseSoft {
            from {
                text-shadow: 0 0 0 rgba(102, 93, 232, 0);
            }
            to {
                text-shadow: 0 5px 16px rgba(102, 93, 232, .14);
            }
        }

        @keyframes pqRevealCaretBlink {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
        }

        @keyframes pqProgressShine {
            0%, 55% {
                transform: translateX(-120%);
            }
            82%, 100% {
                transform: translateX(120%);
            }
        }

        @keyframes pqSectionDot {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 0 0 4px rgba(255, 138, 122, .12);
            }
            50% {
                transform: scale(1.08);
                box-shadow: 0 0 0 7px rgba(255, 138, 122, .06);
            }
        }

        @keyframes pqOrbOne {
            from {
                transform: translate3d(0, 0, 0) scale(1);
            }
            to {
                transform: translate3d(2.8rem, 1.8rem, 0) scale(1.08);
            }
        }

        @keyframes pqOrbTwo {
            from {
                transform: translate3d(0, 0, 0) scale(1.05);
            }
            to {
                transform: translate3d(-2.2rem, -1.5rem, 0) scale(.96);
            }
        }

        @keyframes pqOrbThree {
            from {
                transform: translate3d(0, -.5rem, 0);
            }
            to {
                transform: translate3d(-1.5rem, 1.5rem, 0);
            }
        }

        @keyframes pqShake {
            0%, 100% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-4px);  
            }
            75% {
                transform: translateX(4px);
            }
        }
    </style> 
</head>
{{-- SECTION: Static HTML shell for background, menu, card, content outlet, and navigation. --}}
<body class="relative min-h-dvh overflow-hidden overscroll-none bg-[radial-gradient(circle_at_12%_10%,rgba(124,127,246,.16),transparent_29rem),radial-gradient(circle_at_92%_88%,rgba(255,138,122,.14),transparent_28rem),linear-gradient(145deg,#fbfcff_0%,#f4f5ff_48%,#eef3ff_100%)] font-sans text-[#1a1b2e] antialiased">
{{-- Background visuals. --}}
<div class="pointer-events-none fixed inset-0 z-0 bg-[linear-gradient(rgba(102,93,232,.035)_1px,transparent_1px),linear-gradient(90deg,rgba(102,93,232,.035)_1px,transparent_1px)] bg-[length:34px_34px] [mask-image:linear-gradient(to_bottom,rgba(0,0,0,.5),transparent_78%)]"
     aria-hidden="true"></div>

<div class="fixed inset-0 z-0 overflow-hidden pointer-events-none" aria-hidden="true">
    <span class="pq-orb pq-orb-one pointer-events-none absolute -top-32 -left-28 h-80 w-80 rounded-full bg-[radial-gradient(circle_at_35%_35%,rgba(255,255,255,.98),rgba(124,127,246,.22)_48%,transparent_72%)] opacity-90 blur-[3px] will-change-transform [animation:pqOrbOne_12s_ease-in-out_infinite_alternate]"></span>
    <span class="pq-orb pq-orb-two pointer-events-none absolute -right-32 -bottom-36 h-[25rem] w-[25rem] rounded-full bg-[radial-gradient(circle_at_42%_42%,rgba(255,255,255,.58),rgba(255,138,122,.2)_48%,transparent_73%)] opacity-90 blur-[3px] will-change-transform [animation:pqOrbTwo_15s_ease-in-out_infinite_alternate]"></span>
    <span class="pq-orb pq-orb-three pointer-events-none absolute right-[5%] top-[40%] h-32 w-32 rounded-full bg-[radial-gradient(circle,rgba(66,207,162,.14),transparent_68%)] opacity-90 blur-[3px] will-change-transform [animation:pqOrbThree_10s_ease-in-out_infinite_alternate]"></span>
</div>
@include("slider.menu", ["active" => "speaking"])
{{-- External menu/header contract: slider.menu may set --pq-menu-mobile-height and --pq-sidebar-width. --}}
<main class="pq-page fixed top-[var(--pq-menu-mobile-height)] right-0 bottom-[calc(72px+env(safe-area-inset-bottom,0px))] left-0 z-[1] grid min-h-0 w-auto place-items-center overflow-hidden p-[max(8px,env(safe-area-inset-top,0px))_max(8px,env(safe-area-inset-right,0px))_8px_max(8px,env(safe-area-inset-left,0px))] min-[1280px]:top-0 min-[1280px]:bottom-0 min-[1280px]:left-[var(--pq-sidebar-width)] sm:p-[max(14px,env(safe-area-inset-top,0px))_max(14px,env(safe-area-inset-right,0px))_14px_max(14px,env(safe-area-inset-left,0px))] lg:p-[max(20px,env(safe-area-inset-top,0px))_max(20px,env(safe-area-inset-right,0px))_max(20px,env(safe-area-inset-bottom,0px))_max(20px,env(safe-area-inset-left,0px))] 2xl:p-[max(26px,env(safe-area-inset-top,0px))_max(26px,env(safe-area-inset-right,0px))_max(26px,env(safe-area-inset-bottom,0px))_max(26px,env(safe-area-inset-left,0px))] laptop:!p-[max(12px,env(safe-area-inset-top,0px))_max(12px,env(safe-area-inset-right,0px))_max(12px,env(safe-area-inset-bottom,0px))_max(12px,env(safe-area-inset-left,0px))] short:!p-[max(10px,env(safe-area-inset-top,0px))_max(10px,env(safe-area-inset-right,0px))_max(10px,env(safe-area-inset-bottom,0px))_max(10px,env(safe-area-inset-left,0px))]">
    <section
            class="pq-panel grid h-full min-h-0 w-full max-w-[1280px] grid-rows-[auto_minmax(0,1fr)_auto] overflow-hidden rounded-[1.5rem] border border-[#e8e6f2] bg-white/95 p-[clamp(.58rem,1.15dvh,.9rem)] shadow-[0_18px_46px_rgba(38,35,92,.09)] backdrop-blur-xl max-[520px]:!rounded-[1.15rem] max-[520px]:!p-[.7rem] sm:rounded-[1.75rem] sm:p-4 sm:shadow-[0_28px_80px_rgba(38,35,92,.14)] md:p-5 lg:max-w-[1440px] lg:rounded-[2rem] lg:p-6 xl:max-w-[1520px] xl:p-7 2xl:max-w-[1600px] laptop:!rounded-[1.5rem] laptop:!p-4 short:!rounded-[1.35rem] short:!p-[clamp(.78rem,2vh,1rem)]"
            data-question-card
    >
        <header class="grid min-w-0 grid-cols-[minmax(0,1fr)_auto] items-center gap-x-2 gap-y-1.5 py-0 md:gap-x-4 md:gap-y-2.5 short:!gap-y-[.35rem]"
                data-question-heading>
            <div class="inline-flex min-h-[2.25rem] w-fit max-w-full min-w-0 items-center gap-1.5 overflow-visible rounded-full border border-[#dfdcff] bg-gradient-to-br from-white to-[#f1efff] px-2.5 py-1.5 text-[.82rem] font-bold leading-[1.25] tracking-[-.02em] text-[#665de8] shadow-[0_8px_20px_rgba(64,58,153,.08)] sm:min-h-[2.65rem] sm:gap-2 sm:px-3.5 sm:py-2 sm:text-[.95rem] md:min-h-[2.85rem] md:px-4 md:text-[1rem] short:!min-h-[2.25rem]"
                 data-section-title>
                <span class="pq-section-dot h-2 w-2 shrink-0 rounded-full border-2 border-white bg-gradient-to-br from-[#ff8a7a] to-[#ffb37c] sm:h-2.5 sm:w-2.5"></span>
                <span class="min-w-0 overflow-hidden text-ellipsis whitespace-nowrap leading-[1.35] pb-[2px] pt-[1px]"
                      data-section-name></span>
            </div>

            <div class="inline-flex min-h-[2.25rem] min-w-[3.2rem] items-center justify-center rounded-full border border-[#e4e1fb] bg-white/90 px-2.5 py-1.5 text-[.76rem] font-bold leading-[1.25] text-[#665de8] shadow-[0_8px_18px_rgba(38,35,92,.06)] transition focus-within:border-[#cfc9ff] focus-within:ring-4 focus-within:ring-[#766cff]/10 sm:min-h-[2.65rem] sm:min-w-[3.75rem] sm:px-3 sm:py-2 sm:text-[.9rem] md:min-h-[2.85rem] md:min-w-[4.25rem] md:text-[.96rem] short:!min-h-[2.25rem]"
                 data-page-counter></div>

            <div class="relative col-span-2 h-5 cursor-pointer touch-none select-none overflow-visible rounded-full bg-transparent outline-none ring-offset-2 ring-offset-white focus-visible:ring-4 focus-visible:ring-[#766cff]/20"
                 data-progress-track role="slider" tabindex="0" aria-label="Go to page" aria-valuemin="1"
                 aria-valuemax="1" aria-valuenow="1">
                <div class="pq-progress-bar absolute left-0 top-1/2 z-[1] h-[.42rem] w-0 -translate-y-1/2 rounded-full bg-gradient-to-r from-[#7c7ff6] to-[#ff8a7a] shadow-[0_0_16px_rgba(102,93,232,.28)] transition-[width] duration-[420ms] ease-out md:h-[.48rem]"
                     data-progress-bar></div>
                <div class="pointer-events-none absolute inset-x-0 top-1/2 z-10 -translate-y-1/2" data-level-markers></div>
            </div>
        </header>

        <div class="h-full min-h-0 overflow-y-auto overflow-x-hidden overscroll-contain pt-[clamp(.5rem,1dvh,.75rem)] pr-1 pb-3 touch-pan-y sm:pt-2.5 sm:pr-2 md:px-1 md:pb-4 lg:px-3 lg:pt-3 xl:px-4 laptop:!pt-2 laptop:!px-2 laptop:!pb-3 short:!pt-[.45rem] short:!pb-[.45rem]"
             data-question-content></div>

        <nav class="grid grid-cols-2 gap-2 pt-2 max-[520px]:!gap-[.6rem] max-[520px]:!pt-[.55rem] max-[520px]:[&_button]:!min-h-[2.85rem] max-[520px]:[&_button]:!rounded-[.95rem] max-[520px]:[&_button]:!text-[.86rem] mobileShort:!gap-[.5rem] mobileShort:!pt-[.45rem] mobileShort:[&_button]:!min-h-[2.75rem] mobileShort:[&_button]:!rounded-[.9rem] sm:gap-3 sm:pt-3 md:mx-auto md:w-full md:max-w-[34rem] lg:ml-auto lg:mr-0 lg:max-w-[36rem] laptop:!max-w-[32rem] laptop:!pt-2 laptop:[&_button]:!min-h-[3rem] short:!max-w-[30rem] short:!gap-[.65rem] short:!pt-[.45rem] short:[&_button]:!min-h-[2.75rem] short:[&_button]:!rounded-[.9rem] short:[&_button]:!px-4 short:[&_button]:!text-[.86rem]"
             data-nav-actions>
            <button type="button"
                    class="pq-action-button relative flex min-h-[2.9rem] items-center justify-center gap-2 overflow-hidden rounded-[1rem] border border-[#dcd8ff] bg-[#fbfbff] px-4 text-[.82rem] font-bold text-[#554bd2] transition hover:border-[#cfc9ff] hover:bg-[#f1efff] hover:text-[#4f46d5] disabled:cursor-not-allowed disabled:opacity-45 disabled:hover:border-[#dcd8ff] disabled:hover:bg-[#fbfbff] disabled:hover:text-[#554bd2] sm:min-h-[3.25rem] sm:text-sm lg:min-h-[3.5rem] lg:text-[.95rem]"
                    data-prev-button>
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                <span>Previous</span>
            </button>
            <button type="button"
                    class="pq-action-button relative flex min-h-[2.9rem] items-center justify-center gap-2 overflow-hidden rounded-[1rem] border border-transparent bg-gradient-to-br from-[#546be6] via-[#6258e4] to-[#6b4ed5] px-4 text-[.82rem] font-bold text-white shadow-[0_12px_28px_rgba(91,80,220,.24)] transition hover:from-[#4f63dc] hover:via-[#5b51d8] hover:to-[#6046c8] disabled:cursor-not-allowed disabled:opacity-45 disabled:shadow-none disabled:hover:from-[#546be6] disabled:hover:via-[#6258e4] disabled:hover:to-[#6b4ed5] sm:min-h-[3.25rem] sm:text-sm lg:min-h-[3.5rem] lg:text-[.95rem]"
                    data-next-button>
                <span>Next</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </button>
        </nav>
    </section>
</main>

{{-- SECTION: JavaScript libraries and page application logic. --}}
<script src="https://vjs.zencdn.net/8.16.1/video.min.js"></script>
<script>
    // SECTION: Browser app data and DOM references.
    const appData = @json($appData);

    const els = {
        card: document.querySelector('[data-question-card]'),
        sectionName: document.querySelector('[data-section-name]'),
        counter: document.querySelector('[data-page-counter]'),
        progressTrack: document.querySelector('[data-progress-track]'),
        progress: document.querySelector('[data-progress-bar]'),
        levelMarkers: document.querySelector('[data-level-markers]'),
        content: document.querySelector('[data-question-content]'),
        previous: document.querySelector('[data-prev-button]'),
        next: document.querySelector('[data-next-button]'),
    };

    const ui = {
        audioButton: 'pq-audio-btn relative isolate inline-flex h-[3.05rem] w-[3.05rem] shrink-0 items-center justify-center overflow-visible rounded-full border border-white/60 bg-gradient-to-br from-[#6f73ea] to-[#554bd2] text-white shadow-[0_12px_26px_rgba(91,80,220,.26)] sm:h-[3.2rem] sm:w-[3.2rem] short:!h-[2.8rem] short:!w-[2.8rem]',
        title: 'break-words text-balance font-bold leading-[1.06] tracking-[-.04em] text-[#191a2b]',
        copy: 'max-w-xl space-y-2 text-[clamp(.98rem,4vw,1.1rem)] font-bold leading-[1.48] text-[#70748a] sm:text-lg lg:max-w-2xl',
        option: 'pq-quiz-option min-h-[2.95rem] w-full rounded-[.95rem] border-2 border-[#eceafa] bg-white px-4 text-center text-[.92rem] font-bold leading-tight text-[#55576a] shadow-[0_4px_0_rgba(102,93,232,.06)] disabled:cursor-not-allowed mobileShort:min-h-[2.75rem] mobileShort:px-3 mobileShort:text-[.88rem] sm:min-h-[3.2rem] sm:text-base lg:min-h-[3.35rem] lg:px-5 short:!min-h-[2.65rem] short:!text-[.86rem]',
        videoOption: 'pq-quiz-option min-h-[2.85rem] w-full rounded-[.82rem] border-2 border-[#eceafa] bg-white px-[.95rem] text-center text-[.9rem] font-bold leading-tight text-[#55576a] shadow-[0_4px_0_rgba(102,93,232,.06)] disabled:cursor-not-allowed min-[1280px]:min-h-[3rem] min-[1280px]:px-4 min-[1280px]:text-[.9rem] min-[1536px]:min-h-[3.25rem] min-[1536px]:text-[.96rem] short:!min-h-[2.85rem] short:!text-[.86rem]',
    };

    const stateClasses = {
        quizCorrectOption: ['!border-green-500', '!bg-green-50', '!text-green-700', '!shadow-[0_8px_20px_rgba(34,197,94,.12)]'],
        quizWrongOption: ['!border-red-400', '!bg-red-50', '!text-red-700', 'animate-[pqShake_320ms_ease]'],
        quizQuestionCorrect: ['!text-green-700'],
        quizQuestionWrong: ['!text-red-700'],
        transcriptRowActive: ['bg-[linear-gradient(135deg,rgba(102,93,232,.12),rgba(255,255,255,.98))]'],
        transcriptTextActive: ['!text-[#554bd2]'],
        audioButtonPlaying: ['scale-[1.055]', '!shadow-[0_16px_32px_rgba(91,80,220,.34)]'],
        audioRowPlaying: ['!border-[rgba(102,93,232,.3)]', '!bg-[linear-gradient(135deg,rgba(245,244,255,.98),rgba(255,249,248,.96))]', '!shadow-[0_14px_30px_rgba(91,80,220,.14)]'],
        audioTextPlaying: ['is-audio-text-active'],
        audioCopyPlaying: ['is-audio-copy-active'],
        conversationActiveFrame: ['!border-[rgba(102,93,232,.72)]', '!shadow-[0_14px_32px_rgba(91,80,220,.16)]'],
        conversationActiveLine: ['!bg-[linear-gradient(135deg,rgba(245,244,255,.98),rgba(255,249,248,.96))]'],
        conversationTextActive: ['!text-[#554bd2]'],
    };


    // SECTION: Runtime lifecycle helpers, debug reporting, and page cleanup.
    const runtime = {
        debug: Boolean(appData.debug || window.PASSING_QUESTIONS_BOOTSTRAP?.debug),
        pageDisposers: new Set(),
        pageTimeouts: new Set(),
        pageFrames: new Set(),
    };

    function reportError(error, context = 'Runtime error') {
        if (!runtime.debug) return;
        const detail = error instanceof Error ? error : new Error(String(error || 'Unknown error'));
        console.warn(`[PassingQuestions] ${context}`, detail);
    }

    function reportMediaError(error, context = 'Media error', statusTarget = null) {
        reportError(error, context);

        if (!statusTarget) return;
        statusTarget.classList.remove('hidden');
        statusTarget.textContent = context;
    }

    function registerPageDisposer(dispose) {
        if (typeof dispose !== 'function') return () => {};
        runtime.pageDisposers.add(dispose);
        return () => {
            if (!runtime.pageDisposers.has(dispose)) return;
            runtime.pageDisposers.delete(dispose);
            try {
                dispose();
            } catch (error) {
                reportError(error, 'Page cleanup failed');
            }
        };
    }

    function listenPage(target, type, handler, options) {
        if (!target || typeof target.addEventListener !== 'function') return () => {};
        target.addEventListener(type, handler, options);
        return registerPageDisposer(() => target.removeEventListener(type, handler, options));
    }

    function setPageTimeout(callback, delay = 0) {
        const id = window.setTimeout(() => {
            runtime.pageTimeouts.delete(id);
            callback();
        }, delay);
        runtime.pageTimeouts.add(id);
        return id;
    }

    function requestPageFrame(callback) {
        const id = window.requestAnimationFrame((time) => {
            runtime.pageFrames.delete(id);
            callback(time);
        });
        runtime.pageFrames.add(id);
        return id;
    }

    function waitPageDelay(delay = 0) {
        return new Promise((resolve) => {
            let settled = false;
            const finish = () => {
                if (settled) return;
                settled = true;
                runtime.pageTimeouts.delete(id);
                resolve();
            };
            const id = window.setTimeout(finish, delay);
            runtime.pageTimeouts.add(id);
            registerPageDisposer(() => {
                if (settled) return;
                window.clearTimeout(id);
                finish();
            });
        });
    }

    function clearPageLifecycle() {
        runtime.pageTimeouts.forEach((id) => window.clearTimeout(id));
        runtime.pageFrames.forEach((id) => window.cancelAnimationFrame(id));
        runtime.pageTimeouts.clear();
        runtime.pageFrames.clear();

        runtime.pageDisposers.forEach((dispose) => {
            try {
                dispose();
            } catch (error) {
                reportError(error, 'Page listener cleanup failed');
            }
        });
        runtime.pageDisposers.clear();
    }

    function isEditableTarget(target) {
        const element = target instanceof Element ? target : null;
        if (!element) return false;
        return Boolean(element.closest('input, textarea, select, [contenteditable="true"], [role="textbox"]'));
    }

    function syncExternalMenuSpace() {
        const explicitHeader = document.querySelector('[data-slider-mobile-header], [data-mobile-header], .slider-mobile-header');
        const desktop = window.matchMedia('(min-width: 1280px)').matches;
        const height = !desktop && explicitHeader ? Math.ceil(explicitHeader.getBoundingClientRect().height) : 0;
        document.documentElement.style.setProperty('--pq-menu-mobile-height', `${Math.max(0, height)}px`);
    }

    // SECTION: Data normalization helpers for clean page objects.
    function firstFilled(...values) {
        return values.find(fieldHasValue) ?? '';
    }

    function normalizePageItem(item = {}, sectionTitle = 'Practice', options = {}) {
        const normalized = {...item};
        normalized.sectionTitle = firstFilled(normalized.sectionTitle, sectionTitle, 'Practice');
        normalized.title = firstFilled(normalized.title, normalized.question, normalized.page_title, normalized.pageTitle, normalized.title);
        normalized.paragraph = firstFilled(normalized.paragraph, normalized.description, normalized.subtitle, normalized.instruction, normalized.paragraph);
        normalized.image = firstFilled(normalized.image, normalized.media_image, normalized.mediaImage, normalized.image);
        normalized.audio = firstFilled(normalized.audio, normalized.sound, normalized.media_audio, normalized.mediaAudio, normalized.audio);
        normalized.video = firstFilled(normalized.video, normalized.media_video, normalized.mediaVideo, normalized.video);

        if (!options.keepType) {
            normalized.type = pageTypeForItem(normalized);
        }

        return normalized;
    }

    // SECTION: Visual state helpers for audio, quiz, transcript, and conversation UI.
    function addClasses(element, classes = []) {
        if (!element || !classes.length) return;
        element.classList.add(...classes);
    }

    function removeClasses(element, classes = []) {
        if (!element || !classes.length) return;
        element.classList.remove(...classes);
    }

    function setAudioVisualState(button, scope, isPlaying) {
        (isPlaying ? addClasses : removeClasses)(button, stateClasses.audioButtonPlaying);

        if (scope?.classList?.contains('pq-list-row')) {
            (isPlaying ? addClasses : removeClasses)(scope, stateClasses.audioRowPlaying);
        }

        scope?.querySelectorAll?.('[data-audio-text]').forEach((target) => {
            (isPlaying ? addClasses : removeClasses)(target, stateClasses.audioTextPlaying);
        });

        scope?.querySelectorAll?.('[data-audio-copy]').forEach((target) => {
            (isPlaying ? addClasses : removeClasses)(target, stateClasses.audioCopyPlaying);
        });
    }

    function setConversationLineVisualState(line, isActive) {
        (isActive ? addClasses : removeClasses)(line, stateClasses.conversationActiveFrame);
        (isActive ? addClasses : removeClasses)(line, stateClasses.conversationActiveLine);

        line?.querySelectorAll?.('[data-conversation-text]').forEach((target) => {
            (isActive ? addClasses : removeClasses)(target, stateClasses.conversationTextActive);
        });
    }

    function setConversationSpeakerVisualState(speaker, isActive) {
        const frame = speaker?.querySelector?.('figure');
        (isActive ? addClasses : removeClasses)(frame, stateClasses.conversationActiveFrame);
    }

    // SECTION: Revision/test game handlers loaded from the existing Blade partial.
    @include("slider.sections.language")
    @include("slider.sections.listening")
    @include("slider.sections.practice")
    @include("slider.sections.revision-test")

    // Runtime state for pages, media, video, quizzes, and conversations.
    // SECTION: Global page, media, quiz, video, and conversation state.
    const lastSlideStorageKey = `passingQuestions:lastSlide:${window.location.pathname}`;
    let pages = buildPages(appData.topics || []);
    let pageIndex = loadLastSlideIndex(pages.length);
    let audio = null;
    let activeAudioButton = null;
    let activeAudioScope = null;
    let activeQuizAudio = null;
    let videoJsPlayer = null;
    let videoInstanceId = 0;
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

    // SECTION: Practice sound effects for correct, wrong, and success feedback.
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
            if (promise && typeof promise.catch === 'function') {
                promise.catch((error) => reportError(error, `Practice sound "${name}" could not play`));
            }
        } catch (error) {
            reportError(error, `Practice sound "${name}" failed`);
        }
    }

    function stopPracticeSfx() {
        Object.values(practiceSfx.audio).forEach((sound) => {
            if (!sound) return;
            try {
                sound.pause();
                sound.currentTime = 0;
            } catch (error) {
                reportError(error, 'Practice sound cleanup failed');
            }
        });
    }

    // SECTION: General text, media, escaping, and page-type helper functions.
    function fieldHasValue(value) {
        return value !== null && value !== undefined && String(value).trim() !== '';
    }

    function flagIsEnabled(value) {
        if (value === true || value === 1) return true;
        if (value === false || value === 0 || value === undefined || value === null) return false;
        return ['1', 'true', 'yes', 'on'].includes(String(value).trim().toLowerCase());
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
        const rawType = String(item.type || item.layout || item.activity || '').toLowerCase().replace(/[\s_]+/g, '-');
        const activityType = String(item.activity?.type || '').toLowerCase().replace(/[\s_]+/g, '-');
        const isPracticeGame = rawType === 'practice' && [
            'unjumble-sentence',
            'unscramble-sentence',
            'unjumble-letters',
            'unscramble-letters',
        ].includes(activityType);

        return ['revision', 'test'].includes(rawType) ? rawType
            : isPracticeGame ? 'practice'
                : hasConversation(item) ? 'image-conversation'
                    : hasShortVideo(item) ? 'short-video'
                        : hasVideo(item) ? 'video'
                            : hasQuiz(item) ? 'quiz'
                                : hasImage(item) ? 'image'
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

    function groupChunkSize(items = [], hasImages = false) {
        if (!hasImages) return 9;

        const hasTextCopy = items.some((item) => fieldHasValue(item.paragraph || item.description || item.subtitle));

        return hasTextCopy ? 6 : 8;
    }

    function isSupportedAssessmentPractice(activity = {}) {
        return [
            'multiple_choice',
            'audio_choice',
            'reading_choice',
            'fill_blank_typing',
            'word_bank_fill',
            'unscramble_sentence',
            'unjumble_sentence',
            'unscramble_letters',
            'unjumble_letters',
        ].includes(String(activity.type || '').toLowerCase());
    }

    function assessmentPracticeGroupKey(activity = {}) {
        const type = String(activity.type || '').toLowerCase();

        if (type === 'audio_choice' || fieldHasValue(activity.audio)) return 'audio';
        if (type === 'reading_choice' || fieldHasValue(activity.passage)) return 'reading';
        if (type === 'word_bank_fill') return 'word-bank';
        if (type === 'fill_blank_typing') return 'missing-letters';
        if (['unscramble_sentence', 'unjumble_sentence', 'unscramble_letters', 'unjumble_letters'].includes(type)) return 'unscramble';
        if (type === 'multiple_choice' && fieldHasValue(activity.image)) return 'image-choice';

        return 'choice';
    }

    function assessmentPracticeGroupTitle(groupKey = '') {
        return {
            audio: 'Listening Practice',
            reading: 'Reading Practice',
            'word-bank': 'Dialogue Practice',
            'missing-letters': 'Missing Letters',
            unscramble: 'Word Order Practice',
            'image-choice': 'Image Practice',
            choice: 'Practice',
        }[groupKey] || 'Practice';
    }

    function assessmentPracticePagesFrom(page = {}, sectionTitle = 'Practice') {
        const sourceLabel = page.label || page.title || sectionTitle || 'Practice';
        const groups = [];
        const groupIndexByKey = new Map();

        function groupFor(activity) {
            const key = assessmentPracticeGroupKey(activity);
            if (groupIndexByKey.has(key)) return groups[groupIndexByKey.get(key)];

            const group = {
                key,
                title: assessmentPracticeGroupTitle(key),
                items: [],
            };
            groupIndexByKey.set(key, groups.length);
            groups.push(group);
            return group;
        }

        (page.sections || []).forEach((section) => {
            let sectionPassage = section.passage || '';
            const activities = Array.isArray(section.activities) ? section.activities : [];

            activities.forEach((activity) => {
                if (!activity || !isSupportedAssessmentPractice(activity)) return;

                const nextActivity = {
                    ...activity,
                    sectionTitle: section.title || sourceLabel,
                };

                if (fieldHasValue(nextActivity.passage)) sectionPassage = nextActivity.passage;
                if (!fieldHasValue(nextActivity.passage) && nextActivity.type === 'reading_choice' && fieldHasValue(sectionPassage)) {
                    nextActivity.passage = sectionPassage;
                }

                groupFor(nextActivity).items.push(nextActivity);
            });
        });

        return groups.filter((group) => group.items.length).map((group) => ({
            type: 'practice',
            sectionTitle: 'Practice',
            title: '',
            label: `${page.title || sourceLabel} - ${group.title}`,
            activity: {
                type: 'assessment_sequence',
                items: group.items,
            },
            practiceGroup: group.key,
            sourceAssessmentType: page.type || '',
            sourceAssessmentTitle: page.title || sourceLabel,
        }));
    }

    // Normalizes topic/question data into renderable pages.
    // SECTION: Page builder that normalizes topic/group/question data before rendering.
    function buildPages(topics) {
        const output = [];

        topics.forEach((topic) => {
            const sectionTitle = topic.title || 'Practice';

            if (Array.isArray(topic.groups) && topic.groups.length) {
                topic.groups.forEach((group) => {
                    const groupItems = Array.isArray(group.questions)
                        ? group.questions.map((item) => normalizePageItem(item, sectionTitle, {keepType: true}))
                        : [];
                    const groupHasImages = groupItems.some((item) => hasImage(item));
                    const groupTitle = Object.prototype.hasOwnProperty.call(group, 'title') ? group.title : sectionTitle;
                    const groupSubtitle = firstFilled(group.paragraph, group.description, group.subtitle);

                    if (groupHasImages) {
                        groupItems.forEach((item) => {
                            output.push(normalizePageItem(item, sectionTitle));
                        });
                        return;
                    }

                    output.push({
                        type: 'group',
                        sectionTitle,
                        title: groupTitle,
                        subtitle: groupSubtitle,
                        items: groupItems,
                        itemOffset: 0,
                    });
                });
            }

            if (Array.isArray(topic.questions) && topic.questions.length) {
                topic.questions.forEach((question) => {
                    const page = normalizePageItem(question, sectionTitle);
                    if (isAssessmentType(page.type)) {
                        output.push(...assessmentPracticePagesFrom(page, sectionTitle));
                        return;
                    }
                    output.push(page);
                });
            }
        });

        return output;
    }

    // SECTION: Page progress, header labels, and level marker controls.
    function currentPage() {
        return pages[pageIndex] || null;
    }

    function loadLastSlideIndex(total = 0) {
        try {
            const raw = window.localStorage?.getItem(lastSlideStorageKey);
            if (raw === null || raw === undefined || raw === '') return 0;

            const saved = Number(raw);
            if (!Number.isInteger(saved) || saved < 0 || saved >= total) return 0;

            return saved;
        } catch (error) {
            reportError(error, 'Could not load saved slide');
            return 0;
        }
    }

    function saveLastSlideIndex(index = pageIndex) {
        try {
            if (!Number.isInteger(index) || index < 0 || index >= pages.length) return;
            window.localStorage?.setItem(lastSlideStorageKey, String(index));
        } catch (error) {
            reportError(error, 'Could not save current slide');
        }
    }

    function pageDisplayTitle(page = {}) {
        return String(
            fieldHasValue(page.title)
                ? page.title
                : fieldHasValue(page.question)
                    ? page.question
                    : fieldHasValue(page.sectionTitle)
                        ? page.sectionTitle
                        : ''
        ).trim();
    }

    function levelMarkerTargets() {
        const labels = ['A1 Intermediate', 'A1 Advanced'];

        return labels.map((label) => {
            const index = pages.findIndex((page) => pageDisplayTitle(page).toLowerCase() === label.toLowerCase());
            return index >= 0 ? {label, index} : null;
        }).filter(Boolean);
    }

    function updateLevelMarkers() {
        if (!els.levelMarkers) return;

        els.levelMarkers.querySelectorAll('[data-level-marker]').forEach((marker) => {
            const markerIndex = Number(marker.dataset.levelIndex || -1);
            const isReached = markerIndex <= pageIndex;
            const isCurrent = markerIndex === pageIndex;

            marker.classList.toggle('!bg-[#665de8]', isReached);
            marker.classList.toggle('!border-white', isReached);
            marker.classList.toggle('!text-white', isReached);
            marker.classList.toggle('!bg-white', !isReached);
            marker.classList.toggle('!border-[#766cff]', !isReached);
            marker.classList.toggle('ring-2', isCurrent);
            marker.classList.toggle('ring-[#766cff]/20', isCurrent);
            marker.setAttribute('aria-current', isCurrent ? 'page' : 'false');
        });
    }

    function renderLevelMarkers() {
        if (!els.levelMarkers || !pages.length) return;

        const maxIndex = Math.max(1, pages.length - 1);
        const markers = levelMarkerTargets();

        els.levelMarkers.innerHTML = markers.map(({label, index}) => {
            const left = (index / maxIndex) * 100;

            return `
                <button
                    type="button"
                    class="pointer-events-auto absolute top-1/2 grid h-3 w-3 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full border-2 border-white bg-[#665de8] text-[0] text-white shadow-[0_3px_8px_rgba(91,80,220,.20)] transition hover:scale-125 hover:bg-[#554bd2] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[#766cff]/20 md:h-4 md:w-4 md:shadow-[0_6px_14px_rgba(91,80,220,.22)]"
                    style="left: ${left}%;"
                    data-level-marker
                    data-level-index="${index}"
                    aria-label="Go to ${escapeHtml(label)}"
                    title="${escapeHtml(label)}"
                >
                    <span class="sr-only">${escapeDisplay(label)}</span>
                </button>
            `;
        }).join('');

        updateLevelMarkers();
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
        return text || fallback;
    }

    function badgeGlyphCount(value) {
        const text = String(value ?? '').trim();
        if (!text) return 0;

        if (typeof Intl !== 'undefined' && Intl.Segmenter) {
            return Array.from(new Intl.Segmenter(undefined, {granularity: 'grapheme'}).segment(text)).length;
        }

        return Array.from(text).length;
    }

    function badgeTextSize(value, singleClass, multiClass) {
        return badgeGlyphCount(value) > 1 ? multiClass : singleClass;
    }

    function contentImageFitClass(context = 'learning') {
        return ['portrait', 'thumbnail'].includes(context) ? 'object-cover' : 'object-contain';
    }

    // SECTION: Reusable HTML render helpers for badges, audio buttons, and group cards.
    function groupCardBadge(item, itemTitle, sectionTitle, index) {
        const image = item.image || '';

        if (fieldHasValue(image)) {
            return `
                <span class="grid h-12 w-12 shrink-0 place-items-center overflow-hidden rounded-[.95rem] border border-[#e4e1fb] bg-[#f0eeff] shadow-sm sm:h-14 sm:w-14">
                    <img class="h-full w-full ${contentImageFitClass('thumbnail')}" src="${escapeHtml(image)}" alt="${escapeHtml(itemTitle)}" loading="lazy" decoding="async">
                </span>
            `;
        }

        if (isEmojiBadgeSection(sectionTitle)) {
            const emoji = fieldHasValue(item.emoji)
                ? firstEmoji(item.emoji)
                : firstEmoji(defaultEmojiForText(itemTitle, sectionTitle));
            const emojiSize = badgeTextSize(emoji, 'text-[1.45rem] sm:text-[1.65rem]', 'text-[1.02rem] leading-none sm:text-[1.12rem]');

            return `
                <span class="grid h-12 w-12 shrink-0 place-items-center rounded-[.95rem] bg-[#f0eeff] ${emojiSize} font-bold text-[#665de8] sm:h-14 sm:w-14">${escapeHtml(emoji)}</span>
            `;
        }

        return `
            <span class="grid h-10 w-10 shrink-0 place-items-center rounded-[.86rem] bg-[#f0eeff] text-sm font-bold text-[#665de8]">${index + 1}</span>
        `;
    }

    function audioButton(src, label = 'Play audio', size = 'default') {
        if (!fieldHasValue(src)) return '';

        const buttonClass = size === 'compact'
            ? 'pq-audio-btn relative isolate inline-flex h-9 w-9 shrink-0 items-center justify-center overflow-visible rounded-full border border-white/60 bg-gradient-to-br from-[#6f73ea] to-[#554bd2] text-white shadow-[0_10px_20px_rgba(91,80,220,.24)] sm:h-10 sm:w-10 min-[1536px]:!h-11 min-[1536px]:!w-11 min-[1800px]:!h-12 min-[1800px]:!w-12 short:!h-9 short:!w-9'
            : size === 'media'
                ? 'pq-audio-btn relative isolate inline-flex h-11 w-11 shrink-0 items-center justify-center overflow-visible rounded-full border border-white/60 bg-gradient-to-br from-[#6f73ea] to-[#554bd2] text-white shadow-[0_10px_22px_rgba(91,80,220,.24)] sm:h-[2.95rem] sm:w-[2.95rem] short:!h-10 short:!w-10'
                : ui.audioButton;

        const iconClass = size === 'compact' ? 'h-4 w-4' : size === 'media' ? 'h-[1.1rem] w-[1.1rem] sm:h-5 sm:w-5' : 'h-5 w-5';

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

    function renderTitlePage(page) {
        const title = fieldHasValue(page.title)
            ? page.title
            : fieldHasValue(page.question)
                ? page.question
                : fieldHasValue(page.sectionTitle)
                    ? page.sectionTitle
                    : '';
        const paragraph = textHtml(page.paragraph || page.description || '');
        const levelMatch = String(title).trim().match(/^A1\s+(Beginner|Intermediate|Advanced)$/i);

        if (levelMatch) {
            const levelName = levelMatch[1];
            const levelCopy = {
                Beginner: 'Start with everyday words, simple listening, and the phrases you will use right away.',
                Intermediate: 'You finished the beginner stage. Now practise longer phrases, real conversations, and stronger listening.',
                Advanced: 'You are ready for richer vocabulary, faster listening, and more confident speaking practice.',
            };
            const levelTone = {
                Beginner: {
                    eyebrow: 'from-[#6f73ea] to-[#554bd2]',
                    glow: 'bg-[#766cff]/14',
                    accent: 'text-[#554bd2]',
                },
                Intermediate: {
                    eyebrow: 'from-[#5d7cf6] to-[#665de8]',
                    glow: 'bg-[#6f73ea]/14',
                    accent: 'text-[#554bd2]',
                },
                Advanced: {
                    eyebrow: 'from-[#665de8] to-[#ff8a4f]',
                    glow: 'bg-[#ff8a4f]/16',
                    accent: 'text-[#d9602f]',
                },
            }[levelName] || {
                eyebrow: 'from-[#6f73ea] to-[#554bd2]',
                glow: 'bg-[#766cff]/14',
                accent: 'text-[#554bd2]',
            };
            const copy = paragraph || `<p>${escapeHtml(levelCopy[levelName] || 'Get ready for the next stage of practice.')}</p>`;

            return `
                <article class="mx-auto flex min-h-full w-full max-w-[78rem] flex-col justify-center px-2 py-4 text-center sm:px-4 lg:px-8">
                    <div class="relative mx-auto w-full overflow-hidden py-8 sm:py-10 lg:py-14">
                        <div class="pointer-events-none absolute left-1/2 top-1/2 h-56 w-56 -translate-x-1/2 -translate-y-1/2 rounded-full ${levelTone.glow} blur-3xl"></div>
                        <div class="relative mx-auto mb-5 grid h-20 w-20 place-items-center rounded-[1.35rem] bg-gradient-to-br ${levelTone.eyebrow} text-white shadow-[0_18px_42px_rgba(91,80,220,.22)] sm:h-24 sm:w-24 sm:rounded-[1.65rem]">
                            <span class="text-[1.75rem] font-bold leading-none sm:text-[2.15rem]">A1</span>
                        </div>
                        <p class="relative mx-auto mb-3 w-fit rounded-full border border-[#dfdcff] bg-white/82 px-4 py-2 text-sm font-bold text-[#665de8] shadow-[0_10px_24px_rgba(91,80,220,.08)]">
                            Level unlocked
                        </p>
                        <h1 class="${ui.title} relative mx-auto max-w-[52rem] text-[clamp(2.35rem,9vw,5.2rem)] leading-[.98]">
                            ${escapeDisplay(title)}
                        </h1>
                        <div class="relative mx-auto mt-5 max-w-[44rem] text-[clamp(1rem,3.8vw,1.22rem)] font-semibold leading-[1.58] text-[#70748a]">
                            ${copy}
                        </div>
                    </div>
                </article>
            `;
        }

        return `
                <article class="mx-auto w-full max-w-[60rem] px-1 py-3 text-left sm:px-3 sm:py-5 lg:px-7 lg:py-10">
                    ${fieldHasValue(title) ? `<h1 class="${ui.title} text-[clamp(1.85rem,6vw,4.2rem)] lg:text-[clamp(3rem,4.2vw,5rem)]">${escapeDisplay(title)}</h1>` : ''}
                    ${paragraph ? `<div class="${ui.copy} ${fieldHasValue(title) ? 'mt-4 lg:mt-6' : ''} lg:text-xl">${paragraph}</div>` : ''}
                </article>
            `;
    }

    // Selects the right renderer for each page type.
    // SECTION: Render dispatcher and card layout state management.
    function renderPageContent(page) {
        if (!page) {
            return `<article class="w-full p-6 text-center"><h1 class="text-2xl font-bold text-[#191a2b]">No questions found.</h1></article>`;
        }

        switch (page.type) {
            case 'group':
                return renderGroupPage(page);
            case 'image-conversation':
                return renderConversationPage(page);
            case 'image':
                return renderImagePage(page);
            case 'short-video':
                return renderShortVideoPage(page);
            case 'video':
                return renderVideoPage(page);
            case 'quiz':
                return renderQuizPage(page);
            case 'revision':
            case 'test':
                return renderAssessmentPage(page);
            case 'practice':
                return renderPracticePage(page);
            case 'audio':
                return renderAudioPage(page);
            default:
                return renderTitlePage(page);
        }
    }

    function applyPageClass(page) {
        els.card.classList.toggle('is-group-page', page?.type === 'group');
        els.card.classList.toggle('is-image-page', page?.type === 'image');
        els.card.classList.toggle('is-video-card', page?.type === 'video');
        els.card.classList.toggle('is-short-video-card', page?.type === 'short-video');
        els.card.classList.toggle('is-image-conversation-page', page?.type === 'image-conversation');

        const groupItems = Array.isArray(page?.items) ? page.items : [];
        const isSmallImageGroup = page?.type === 'group'
            && groupItems.length > 0
            && groupItems.length <= 6
            && groupItems.some((item) => hasImage(item));
        const shouldCenterOnDesktop = ['image', 'audio', 'short-video', 'title', 'quiz', 'practice'].includes(page?.type) || isSmallImageGroup;
        const isVideoPage = page?.type === 'video';
        const isConversationPage = page?.type === 'image-conversation';
        const isQuizLikePage = ['quiz', 'practice'].includes(page?.type);
        const centerClass = page?.type === 'image'
            ? 'justify-start lg:justify-center'
            : shouldCenterOnDesktop ? 'justify-start md:justify-center' : 'justify-start';

        els.content.className = [
            'flex h-full min-h-0 flex-col overflow-y-auto overflow-x-hidden overscroll-contain',
            'pt-[clamp(.58rem,1.15dvh,.9rem)] pr-1 pb-3 touch-pan-y max-[520px]:!pt-[.55rem] max-[520px]:!pb-[.65rem]',
            'sm:pt-4 sm:pr-2 md:px-1 md:pb-4 lg:px-3 lg:pt-5 xl:px-4',
            'laptop:!pt-3 laptop:!px-2 laptop:!pb-3 short:!py-[.45rem]',
            isQuizLikePage ? 'pq-quiz-content max-[520px]:!pt-5' : '',
            centerClass,
            isVideoPage ? 'pq-video-content' : '',
            isConversationPage ? 'pq-conversation-content' : '',
        ].filter(Boolean).join(' ');
    }

    function counterDisplayHtml() {
        const label = pages.length ? `${pageIndex + 1} / ${pages.length}` : '0 / 0';
        return `
            <button type="button" class="group inline-flex min-h-full w-full cursor-pointer items-center justify-center gap-1.5 rounded-full px-0 text-inherit outline-none transition hover:text-[#554bd2] focus-visible:ring-4 focus-visible:ring-[#766cff]/15" data-page-counter-button aria-label="Jump to slide. Current slide ${pageIndex + 1} of ${pages.length}" title="Jump to slide">
                <span>${escapeDisplay(label)}</span>
                <i class="fa-solid fa-pen-to-square text-[.78rem] opacity-75 transition group-hover:opacity-100 sm:text-[.86rem]" aria-hidden="true"></i>
            </button>
        `;
    }

    function showCounterInput() {
        if (!els.counter || !pages.length) return;

        els.counter.innerHTML = `
            <input
                type="number"
                min="1"
                max="${pages.length}"
                value="${pageIndex + 1}"
                class="h-[1.7rem] w-[4.5rem] rounded-full border-0 bg-transparent px-1 text-center text-inherit outline-none sm:h-[2rem] sm:w-[5.25rem]"
                data-page-counter-input
                aria-label="Slide number"
            >
        `;

        const input = els.counter.querySelector('[data-page-counter-input]');
        input?.focus();
        input?.select();
    }

    function restoreCounterDisplay() {
        if (!els.counter) return;
        els.counter.innerHTML = counterDisplayHtml();
    }

    function commitCounterInput(input) {
        if (!input) {
            restoreCounterDisplay();
            return;
        }

        if (input.dataset.committed === 'true') return;
        input.dataset.committed = 'true';

        const requested = Number(input.value);
        if (!Number.isFinite(requested)) {
            restoreCounterDisplay();
            return;
        }

        const nextIndex = Math.max(0, Math.min(pages.length - 1, Math.round(requested) - 1));
        restoreCounterDisplay();
        goTo(nextIndex);
    }

    function updateHeader(page) {
        els.sectionName.textContent = displayText(page?.sectionTitle || 'Practice');
        restoreCounterDisplay();
        const progress = pages.length ? ((pageIndex + 1) / pages.length) * 100 : 0;
        els.progress.style.width = `${progress}%`;
        if (els.progressTrack) {
            const progressLocked = typeof isCurrentAssessment === 'function' && isCurrentAssessment(page);
            els.progressTrack.setAttribute('aria-valuemin', '1');
            els.progressTrack.setAttribute('aria-valuemax', String(Math.max(1, pages.length)));
            els.progressTrack.setAttribute('aria-valuenow', String(pages.length ? pageIndex + 1 : 1));
            els.progressTrack.setAttribute('aria-valuetext', pages.length ? `Page ${pageIndex + 1} of ${pages.length}` : 'No pages');
            els.progressTrack.setAttribute('aria-disabled', progressLocked ? 'true' : 'false');
            els.progressTrack.setAttribute('title', progressLocked ? 'Progress is locked during this test/revision step' : (pages.length ? 'Click the progress bar to jump to a page' : 'No pages'));
        }
        updateLevelMarkers();
        els.previous.disabled = pageIndex <= 0;
        els.next.disabled = pageIndex >= pages.length - 1;
    }

    function render({animate = false} = {}) {
        const page = currentPage();
        saveLastSlideIndex();
        cleanupMedia();
        syncExternalMenuSpace();
        applyPageClass(page);
        updateHeader(page);
        syncAssessmentMode(page);
        els.content.innerHTML = renderPageContent(page);
        els.content.scrollTop = 0;
        els.content.scrollLeft = 0;

        bindAudioButtons();
        bindConversationInteractions();
        bindQuizAudioPlayers();
        bindQuizInteractions();
        bindTranscriptInteractions();
        bindAssessmentInteractions();
        syncShortVideoSize();
        setupVideoPlayer();
        bindShortVideoOverlay();
        bindShortVideoCenterToggle();
        requestPageFrame(syncShortVideoSize);
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

        els.card.classList.add('is-page-transitioning', 'pointer-events-none');
        window.setTimeout(() => {
            pageIndex = nextIndex;
            saveLastSlideIndex();
            els.card.classList.remove('is-page-transitioning', 'pointer-events-none');
            render({animate: true});
        }, 170);
    }

    // SECTION: Media cleanup for videos, audio, quiz audio, conversation audio, and effects.
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
            } catch (error) {
                reportError(error, 'Video.js player cleanup failed');
            }

            videoJsPlayer = null;
        }

        if (window.videojs && typeof window.videojs.getPlayers === 'function') {
            try {
                Object.entries(window.videojs.getPlayers()).forEach(([id, playerInstance]) => {
                    if (!String(id).startsWith('passingQuestionVideo')) return;
                    const isDisposed = typeof playerInstance.isDisposed === 'function'
                        ? playerInstance.isDisposed()
                        : false;
                    if (!isDisposed && typeof playerInstance.dispose === 'function') {
                        playerInstance.dispose();
                    }
                });
            } catch (error) {
                reportError(error, 'Stale Video.js player cleanup failed');
            }
        }

        els.content.querySelectorAll('video').forEach((video) => {
            try {
                video.pause();
                video.currentTime = 0;
                video.removeAttribute('src');
                video.querySelectorAll('source').forEach((source) => source.removeAttribute('src'));
                video.load();
            } catch (error) {
                reportError(error, 'Native video cleanup failed');
            }
        });
    }

    function disposeQuizAudioPlayers() {
        els.content.querySelectorAll('[data-quiz-audio-player]').forEach((player) => {
            const media = player.pqAudio;
            if (!media) return;

            try {
                media.pause();
                media.removeAttribute('src');
                media.load();
            } catch (error) {
                reportError(error, 'Quiz audio cleanup failed');
            }

            player.pqAudio = null;
        });
    }

    // Stops page-specific media before rendering another page.
    function cleanupMedia() {
        clearPageLifecycle();
        window.clearTimeout(revealTimer);
        els.card?.classList?.remove('is-revealing', 'is-page-transitioning', 'pointer-events-none');
        stopAssessmentRecording();
        stopConversation(true);
        stopAudio();
        stopQuizAudio(true);
        disposeQuizAudioPlayers();
        stopPracticeSfx();
        stopVideoPlayer();
    }

    function stopAudio() {
        if (audio) {
            try {
                audio.pause();
                audio.currentTime = 0;
            } catch (error) {
                reportError(error, 'Audio cleanup failed');
            }
        }

        stopTextReveal(true);

        if (activeAudioButton) {
            activeAudioButton.classList.remove('is-playing');
            setAudioVisualState(activeAudioButton, activeAudioScope, false);
        }
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

        if (scope?.hasAttribute?.('data-static-audio-text')) {
            return;
        }

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

    // SECTION: Standard audio playback and text reveal behavior.
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
        setAudioVisualState(button, scope, true);
        startTextReveal(scope, audio);

        audio.addEventListener('ended', stopAudio, {once: true});
        audio.addEventListener('error', stopAudio, {once: true});

        try {
            await audio.play();
        } catch (error) {
            reportMediaError(error, 'Audio playback failed');
            stopAudio();
        }
    }

    function bindAudioButtons() {
        els.content.querySelectorAll('[data-audio-button]').forEach((button) => {
            listenPage(button, 'click', () => playAudioButton(button));
        });
    }

    // SECTION: Quiz audio player setup, controls, seek behavior, and autoplay.
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
            (isPlaying ? addClasses : removeClasses)(toggle, stateClasses.audioButtonPlaying);
            toggle.setAttribute('aria-label', isPlaying ? 'Pause question audio' : 'Play question audio');
        }
    }

    function stopQuizAudio(reset = false, options = {}) {
        if (!activeQuizAudio?.player) return;

        const {player, media} = activeQuizAudio;
        const requestedScope = options.scope || 'all';
        const playerScope = player.dataset.quizAudioScope || 'question';

        if (requestedScope !== 'all' && requestedScope !== playerScope) return;

        try {
            media.pause();
            if (reset) media.currentTime = 0;
        } catch (error) {
            reportError(error, 'Quiz audio stop failed');
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

        activeQuizAudio = {player, media};
        syncQuizAudioPlayer(player);

        try {
            await media.play();
        } catch (error) {
            reportMediaError(error, 'Quiz audio playback failed');
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

        setPageTimeout(() => {
            if (!item.classList.contains('is-current')) return;
            playQuizAudioPlayer(player, {forcePlay: true});
        }, 140);
    }

    function pageIndexFromProgressPosition(clientX) {
        if (!els.progressTrack || !pages.length) return pageIndex;

        const rect = els.progressTrack.getBoundingClientRect();
        if (!rect.width) return pageIndex;

        const ratio = Math.max(0, Math.min(1, (clientX - rect.left) / rect.width));
        return Math.max(0, Math.min(pages.length - 1, Math.floor(ratio * pages.length)));
    }

    function jumpToPageImmediately(index, {animate = false} = {}) {
        const nextIndex = Math.max(0, Math.min(pages.length - 1, index));
        if (nextIndex === pageIndex) return;

        cleanupMedia();

        window.clearTimeout(revealTimer);
        els.card.classList.remove('is-page-transitioning', 'pointer-events-none');
        pageIndex = nextIndex;
        saveLastSlideIndex();
        render({animate});
    }

    function jumpToProgressClientX(clientX, options = {}) {
        if (!els.progressTrack || !pages.length) return;
        if (isCurrentAssessment(currentPage())) return;
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
            els.progressTrack.classList.remove('cursor-grabbing');

            if (event && Number.isFinite(event.clientX)) {
                jumpToProgressClientX(event.clientX, {animate: true});
            }

            if (event?.pointerId !== undefined && els.progressTrack.releasePointerCapture) {
                try {
                    els.progressTrack.releasePointerCapture(event.pointerId);
                } catch (error) {
                    reportError(error, 'Progress pointer release failed');
                }
            }
        };

        els.progressTrack.addEventListener('pointerdown', (event) => {
            if (!pages.length) return;

            event.preventDefault();
            event.stopPropagation();

            if (isCurrentAssessment(currentPage())) {
                return;
            }

            isScrubbing = true;
            els.progressTrack.classList.add('is-scrubbing');
            els.progressTrack.classList.add('cursor-grabbing');

            if (els.progressTrack.setPointerCapture) {
                try {
                    els.progressTrack.setPointerCapture(event.pointerId);
                } catch (error) {
                    reportError(error, 'Progress pointer capture failed');
                }
            }

            requestProgressJump(event.clientX, {animate: false});
        });

        els.levelMarkers?.addEventListener('pointerdown', (event) => {
            const marker = event.target.closest('[data-level-marker]');
            if (!marker) return;

            event.preventDefault();
            event.stopPropagation();
        });

        els.levelMarkers?.addEventListener('click', (event) => {
            const marker = event.target.closest('[data-level-marker]');
            if (!marker) return;

            event.preventDefault();
            event.stopPropagation();

            if (isCurrentAssessment(currentPage())) return;

            const index = Number(marker.dataset.levelIndex);
            if (Number.isFinite(index)) goTo(index);
        });

        els.progressTrack.addEventListener('pointermove', (event) => {
            if (!isScrubbing) return;

            event.preventDefault();
            event.stopPropagation();
            requestProgressJump(event.clientX, {animate: false});
        });

        els.progressTrack.addEventListener('pointerup', stopScrubbing);
        els.progressTrack.addEventListener('pointercancel', stopScrubbing);
        els.progressTrack.addEventListener('lostpointercapture', stopScrubbing);

        els.progressTrack.addEventListener('keydown', (event) => {
            if (!pages.length) return;

            if (isCurrentAssessment(currentPage())) {
                if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
                    event.preventDefault();
                    navigateAssessmentStep(event.key === 'ArrowLeft' ? -1 : 1);
                }
                return;
            }

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

    // Handles buttons, keyboard, progress bar, and swipe navigation.
    function bindNavigation() {
        bindProgressNavigation();
        els.previous.addEventListener('click', () => goTo(pageIndex - 1));
        els.next.addEventListener('click', () => goTo(pageIndex + 1));

        els.counter?.addEventListener('click', (event) => {
            if (event.target.closest('[data-page-counter-input]')) return;
            if (!event.target.closest('[data-page-counter-button]')) return;
            showCounterInput();
        });

        els.counter?.addEventListener('keydown', (event) => {
            const input = event.target.closest('[data-page-counter-input]');
            if (!input) return;

            if (event.key === 'Enter') {
                event.preventDefault();
                event.stopPropagation();
                commitCounterInput(input);
            }

            if (event.key === 'Escape') {
                event.preventDefault();
                event.stopPropagation();
                input.dataset.committed = 'true';
                restoreCounterDisplay();
            }
        });

        els.counter?.addEventListener('focusout', (event) => {
            const input = event.target.closest('[data-page-counter-input]');
            if (!input) return;
            commitCounterInput(input);
        });

        document.addEventListener('keydown', (event) => {
            if (event.defaultPrevented || event.altKey || event.ctrlKey || event.metaKey || isEditableTarget(event.target)) {
                return;
            }

            if (isCurrentAssessment(currentPage())) {
                if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
                    event.preventDefault();
                    navigateAssessmentStep(event.key === 'ArrowLeft' ? -1 : 1);
                }
                return;
            }

            if (event.key === 'ArrowLeft') {
                event.preventDefault();
                goTo(pageIndex - 1);
            }

            if (event.key === 'ArrowRight') {
                event.preventDefault();
                goTo(pageIndex + 1);
            }
        });

        let startX = 0;
        let startY = 0;
        let tracking = false;

        els.card.addEventListener('touchstart', (event) => {
            if (isEditableTarget(event.target) || event.target.closest?.('button, a, [role="button"], .vjs-control-bar, .vjs-big-play-button, [data-progress-track]')) {
                tracking = false;
                return;
            }

            const touch = event.touches[0];
            if (!touch) return;
            startX = touch.clientX;
            startY = touch.clientY;
            tracking = true;
        }, {passive: true});

        els.card.addEventListener('touchend', (event) => {
            if (!tracking) return;
            tracking = false;
            const touch = event.changedTouches[0];
            if (!touch) return;

            const dx = touch.clientX - startX;
            const dy = touch.clientY - startY;
            if (Math.abs(dx) < 56 || Math.abs(dx) < Math.abs(dy) * 1.25) return;

            if (isCurrentAssessment(currentPage())) {
                navigateAssessmentStep(dx < 0 ? 1 : -1);
                return;
            }

            if (dx < 0) goTo(pageIndex + 1);
            if (dx > 0) goTo(pageIndex - 1);
        }, {passive: true});
    }

    // Starts the slider after dependencies are ready.
    // SECTION: App bootstrapping for markers, navigation, resize handling, and first render.
    renderLevelMarkers();
    bindNavigation();
    window.addEventListener('pagehide', cleanupMedia, {passive: true});
    window.addEventListener('beforeunload', cleanupMedia, {passive: true});
    window.addEventListener('resize', () => {
        syncExternalMenuSpace();
        window.requestAnimationFrame(syncShortVideoSize);
    }, {passive: true});
    window.addEventListener('orientationchange', () => {
        window.setTimeout(() => {
            syncExternalMenuSpace();
            syncShortVideoSize();
        }, 180);
    }, {passive: true});
    syncExternalMenuSpace();
    render({animate: true});
</script>
</body>
</html>
