<?php
$content = [
    'page_title'    => 'Warm-up',
    'title'         => 'Warm-up:',
    'subtitle'      => "Let’s remember some of the hotel vocabulary",

    'layout' => [
        'categories_grid' => 'grid-cols-1',
        'pool_grid'       => 'grid-cols-3 sm:grid-cols-4 md:grid-cols-6',
        'slot_grid'       => 'grid-cols-3 sm:grid-cols-4 md:grid-cols-4',
    ],

    'categories' => [
        [
            'name'      => 'Hotel vocabulary',
            'emoji'     => '🏨',
            'slots'     => 12,
            'slot_grid' => 'grid-cols-3 sm:grid-cols-4 md:grid-cols-4',
        ],
    ],

    'tiles' => [
        [
            'alt'      => 'Lift',
            'category' => 'Hotel vocabulary',
            'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/lift.webp'),
        ],
        [
            'alt'      => 'Double room',
            'category' => 'Hotel vocabulary',
            'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/double-room.webp'),
        ],
        [
            'alt'      => 'Corridor',
            'category' => 'Hotel vocabulary',
            'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/corridor.webp'),
        ],
        [
            'alt'      => 'Registration form',
            'category' => 'Hotel vocabulary',
            'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/registration-form.webp'),
        ],
        [
            'alt'      => 'Towel',
            'category' => 'Hotel vocabulary',
            'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/towel.webp'),
        ],
        [
            'alt'      => 'Fitness center',
            'category' => 'Hotel vocabulary',
            'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/fitness-center.webp'),
        ],
        [
            'alt'      => 'Bathroom',
            'category' => 'Hotel vocabulary',
            'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/bathroom.webp'),
        ],
        [
            'alt'      => 'Blanket',
            'category' => 'Hotel vocabulary',
            'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/blanket.webp'),
        ],
        [
            'alt'      => 'Parking place',
            'category' => 'Hotel vocabulary',
            'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/parking-place.webp'),
        ],
        [
            'alt'      => 'Swimming pool',
            'category' => 'Hotel vocabulary',
            'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/swimming-pool.webp'),
        ],
        [
            'alt'      => 'Pillow',
            'category' => 'Hotel vocabulary',
            'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/pillow.webp'),
        ],
        [
            'alt'      => 'Toilet',
            'category' => 'Hotel vocabulary',
            'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/toilet.webp'),
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'] ?? 'Warm-up')

@section('style')
    @parent
    <style>
        :root{
            --game-gap: clamp(0.55rem, 0.75vw, 0.8rem);
            --panel-pad: clamp(0.78rem, 1vw, 1rem);
            --panel-radius: 24px;
            --panel-head-h: clamp(3rem, 5vw, 3.45rem);
        }

        #hotelMatchGame{
            font-family: "Plus Jakarta Sans", sans-serif;
            background: transparent !important;
        }

        @keyframes popIn {
            0% { transform: scale(.94); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes shake {
            0%,100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }

        .game-shell{
            min-height: 100dvh;
            height: 100dvh;
            overflow: hidden;
            background:
                    radial-gradient(980px 560px at 8% 10%, rgba(103,63,231,.14), transparent 55%),
                    radial-gradient(900px 560px at 92% 14%, rgba(59,130,246,.12), transparent 56%),
                    radial-gradient(880px 640px at 50% 100%, rgba(16,185,129,.08), transparent 60%);
        }

        .slide-viewport{
            height: 100dvh;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .slide-shell{
            min-height: 100dvh;
            display: flex;
            align-items: center;
            transition: padding 0.2s ease, align-items 0.2s ease;
        }

        .slide-shell.is-scrollable{
            align-items: flex-start;
        }

        .glass-panel{
            position: relative;
            overflow: hidden;
            border-radius: var(--panel-radius);
            border: 1px solid rgba(255,255,255,0.7);
            background: rgba(255,255,255,0.7);
            box-shadow: 0 16px 34px -24px rgba(15,23,42,0.18);
            backdrop-filter: blur(16px);
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
        }

        .glass-panel:hover{
            transform: translateY(-2px);
            box-shadow: 0 24px 44px -30px rgba(15, 23, 42, 0.22);
        }

        .glass-panel::before,
        .glass-panel::after{
            content: "";
            position: absolute;
            border-radius: 9999px;
            pointer-events: none;
            filter: blur(10px);
            opacity: 0.9;
        }

        .glass-panel::before{
            width: 110px;
            height: 110px;
            top: -34px;
            right: -22px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.22) 0%, rgba(99, 102, 241, 0) 72%);
        }

        .glass-panel::after{
            width: 84px;
            height: 84px;
            bottom: -34px;
            left: -18px;
            opacity: 0.55;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.16) 0%, rgba(59, 130, 246, 0) 72%);
        }

        .dark .glass-panel{
            border-color: rgba(255,255,255,0.10);
            background: rgba(255,255,255,0.05);
            box-shadow: 0 16px 34px -24px rgba(2,6,23,0.35);
        }

        .panel-head{
            position: relative;
            z-index: 1;
            min-height: var(--panel-head-h);
        }

        .game-grid{
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            grid-template-rows: repeat(3, minmax(0, 1fr));
            gap: var(--game-gap);
            height: 100%;
            min-height: 0;
            align-content: stretch;
        }

        .drag-card,
        .match-target{
            position: relative;
            min-width: 0;
            min-height: 0;
            height: 100%;
            width: 100%;
            overflow: hidden;
            border-radius: 1.1rem;
        }

        .drag-card{
            border: 1px solid rgba(226,232,240,0.8);
            background: rgba(255,255,255,0.9);
            box-shadow: 0 10px 22px rgba(15,23,42,0.1);
            cursor: grab;
            user-select: none;
            touch-action: none;
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
        }

        .drag-card:hover{
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(15,23,42,0.14);
            border-color: rgba(129,140,248,0.65);
        }

        .dark .drag-card{
            border-color: rgba(71,85,105,0.82);
            background: rgba(15,23,42,0.76);
            box-shadow: 0 12px 26px rgba(2,6,23,0.22);
        }

        .drag-card img,
        .target-media img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none;
            user-select: none;
        }

        .drag-card.returning{
            transition:
                    top .38s cubic-bezier(.23,1,.32,1),
                    left .38s cubic-bezier(.23,1,.32,1),
                    transform .38s cubic-bezier(.23,1,.32,1);
            z-index: 9000;
        }

        .drag-card.dragging{
            position: fixed !important;
            z-index: 9999 !important;
            pointer-events: none !important;
            cursor: grabbing !important;
            transition: none !important;
            will-change: left, top, transform;
            box-shadow: 0 22px 46px rgba(15,23,42,0.22);
        }

        .drag-card.locked{
            cursor: default;
            animation: popIn .28s cubic-bezier(.175,.885,.32,1.2);
        }

        .drag-card.shake{
            animation: shake .34s ease-in-out;
        }

        .tile-placeholder{
            border-radius: 1.1rem;
            border: 1px dashed rgba(148,163,184,0.85);
            background: rgba(226,232,240,0.22);
        }

        .dark .tile-placeholder{
            border-color: rgba(71,85,105,0.88);
            background: rgba(30,41,59,0.25);
        }

        .match-target{
            border: 1px dashed rgba(148,163,184,0.82);
            background: rgba(255,255,255,0.22);
            transition: border-color .16s ease, box-shadow .16s ease, background .16s ease, transform .16s ease;
        }

        .dark .match-target{
            border-color: rgba(71,85,105,0.9);
            background: rgba(15,23,42,0.34);
        }

        .match-target.is-hover{
            border-color: rgba(99,102,241,0.88);
            box-shadow: 0 0 0 2px rgba(99,102,241,0.18);
            background: rgba(224,231,255,0.32);
        }

        .dark .match-target.is-hover{
            background: rgba(49,46,129,0.28);
        }

        .match-target.is-correct{
            border-color: rgba(16,185,129,0.72);
            box-shadow: 0 0 0 2px rgba(16,185,129,0.14);
        }

        .target-inner{
            position: absolute;
            inset: 0;
            padding: clamp(0.38rem, 0.7vw, 0.5rem);
        }

        .target-media{
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity .22s ease;
        }

        .target-label{
            position: absolute;
            inset: 0.38rem;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0.45rem 0.5rem;
            border-radius: 0.95rem;
            font-weight: 800;
            font-size: clamp(0.62rem, 1vw, 0.88rem);
            line-height: 1.18;
            letter-spacing: -0.02em;
            color: rgb(15 23 42);
            background: rgba(255,255,255,0.58);
            backdrop-filter: blur(10px);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.38);
            transition: inset .18s ease, transform .18s ease, font-size .18s ease, background .18s ease, color .18s ease, box-shadow .18s ease;
        }

        .dark .target-label{
            color: rgb(248 250 252);
            background: rgba(15,23,42,0.54);
            box-shadow: inset 0 0 0 1px rgba(51,65,85,0.56);
        }

        .match-target.filled .target-media{
            opacity: 1;
        }

        .match-target.filled .target-label{
            inset: auto 0.42rem 0.42rem 0.42rem;
            min-height: 2rem;
            padding: 0.28rem 0.5rem;
            font-size: clamp(0.58rem, 0.9vw, 0.74rem);
            transform: translateY(0);
            background: rgba(15,23,42,0.72);
            color: #fff;
            box-shadow: 0 8px 18px rgba(15,23,42,0.18);
        }

        .dark .match-target.filled .target-label{
            background: rgba(2,6,23,0.74);
            color: rgb(248 250 252);
        }

        .counter-pill{
            border: 1px solid rgba(99,102,241,0.2);
            background: rgba(99,102,241,0.08);
            color: rgb(67 56 202);
        }

        .dark .counter-pill{
            border-color: rgba(129,140,248,0.2);
            background: rgba(99,102,241,0.12);
            color: rgb(224 231 255);
        }

        .win-modal-card{
            border: 1px solid rgba(191,219,254,0.7);
            background:
                    radial-gradient(120% 120% at 0% 0%, rgba(99,102,241,0.16) 0%, transparent 48%),
                    radial-gradient(120% 120% at 100% 0%, rgba(14,165,233,0.14) 0%, transparent 52%),
                    rgba(255,255,255,0.78);
            box-shadow: 0 30px 90px rgba(2,6,23,0.18);
            backdrop-filter: blur(18px);
        }

        .dark .win-modal-card{
            border-color: rgba(71,85,105,0.8);
            background:
                    radial-gradient(120% 120% at 0% 0%, rgba(99,102,241,0.2) 0%, transparent 50%),
                    radial-gradient(120% 120% at 100% 0%, rgba(14,165,233,0.16) 0%, transparent 54%),
                    rgba(15,23,42,0.78);
            box-shadow: 0 30px 90px rgba(2,6,23,0.32);
        }

        .win-badge{
            background: linear-gradient(135deg, rgba(16,185,129,0.16), rgba(59,130,246,0.14));
            color: rgb(5 150 105);
            box-shadow: inset 0 0 0 1px rgba(16,185,129,0.14);
        }

        .dark .win-badge{
            color: rgb(167 243 208);
            box-shadow: inset 0 0 0 1px rgba(110,231,183,0.16);
        }

        .win-primary-btn{
            background-image: linear-gradient(135deg, rgb(79,70,229), rgb(37,99,235));
            color: white;
            box-shadow: 0 14px 34px rgba(79,70,229,0.24);
        }

        .win-primary-btn:hover{
            transform: translateY(-2px);
            box-shadow: 0 18px 38px rgba(79,70,229,0.28);
        }

        .win-secondary-btn{
            border: 1px solid rgba(148,163,184,0.34);
            background: rgba(255,255,255,0.62);
            color: rgb(30 41 59);
        }

        .win-secondary-btn:hover{
            transform: translateY(-2px);
            background: rgba(255,255,255,0.78);
        }

        .dark .win-secondary-btn{
            border-color: rgba(71,85,105,0.82);
            background: rgba(15,23,42,0.56);
            color: rgb(226 232 240);
        }

        .dark .win-secondary-btn:hover{
            background: rgba(15,23,42,0.72);
        }

        @media (max-width: 1023px){
            .board-grid{
                grid-template-columns: 1fr;
                grid-template-rows: minmax(0, 0.92fr) minmax(0, 1.08fr);
            }
        }

        @media (min-width: 1024px){
            .board-grid{
                grid-template-columns: repeat(2, minmax(0, 1fr));
                grid-template-rows: 1fr;
            }
        }

        @media (min-width: 1024px) and (max-height: 840px) {
            #hotelMatchGame.game-shell{
                height: auto !important;
                min-height: 100dvh;
                overflow-y: auto;
                overflow-x: hidden;
                -webkit-overflow-scrolling: touch;
            }

            #hotelMatchGame > .slide-viewport{
                height: auto !important;
                min-height: 100dvh;
            }

            #hotelMatchGame #slideShell{
                min-height: 100dvh;
                align-items: flex-start;
            }

            #hotelMatchGame #titleBlock{
                margin-bottom: 0.15rem;
            }

            #hotelMatchGame #titleBlock h1{
                font-size: clamp(2.7rem, 4.4vw, 4.5rem);
                line-height: 1.02;
            }

            #hotelMatchGame #titleBlock .warmup-subtitle{
                font-size: 0.95rem;
                line-height: 1.45;
                margin-top: 0.2rem;
            }

            #hotelMatchGame .panel-head{
                min-height: 2.8rem;
            }

            #hotelMatchGame .game-grid{
                height: auto;
                grid-template-columns: repeat(4, minmax(0, 1fr));
                grid-template-rows: none;
                grid-auto-rows: auto;
                align-content: start;
            }

            #hotelMatchGame .drag-card,
            #hotelMatchGame .match-target{
                aspect-ratio: 1 / 1;
                height: auto;
            }

            #hotelMatchGame .target-label{
                inset: 0.3rem;
                padding: 0.3rem 0.36rem;
                font-size: clamp(0.52rem, 0.72vw, 0.7rem);
                line-height: 1.12;
                border-radius: 0.78rem;
            }

            #hotelMatchGame .match-target.filled .target-label{
                inset: auto 0.3rem 0.3rem 0.3rem;
                min-height: 1.5rem;
                padding: 0.18rem 0.34rem;
                font-size: clamp(0.48rem, 0.66vw, 0.6rem);
            }
        }

        @media (max-width: 639px){
            :root{
                --game-gap: 0.45rem;
                --panel-pad: 0.68rem;
                --panel-head-h: 2.8rem;
            }

            .target-label{
                font-size: 0.64rem;
                padding: 0.34rem 0.38rem;
            }

            .match-target.filled .target-label{
                font-size: 0.58rem;
                min-height: 1.7rem;
            }
        }

        @media (prefers-reduced-motion: reduce){
            .slide-shell,
            .glass-panel,
            .drag-card,
            .match-target,
            .target-label,
            .target-media,
            .drag-card.returning,
            .drag-card.locked,
            .drag-card.shake{
                transition: none !important;
                animation: none !important;
            }
        }
    </style>
@endsection

@section('content')
    @php
        $tiles = $content['tiles'] ?? [];
        $tileCount = count($tiles);
    @endphp

    <main id="hotelMatchGame" class="game-shell w-full overflow-hidden text-slate-900 dark:text-slate-100">
        <div id="slideViewport" class="slide-viewport">
            <div id="slideShell" class="slide-shell mx-auto w-full max-w-[1280px] px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
                <div class="w-full">
                    <section class="grid items-center gap-4 sm:gap-5">
                        <section id="titleBlock" class="flex-shrink-0 text-center">
                            <div class="mx-auto w-full max-w-[42rem]">
                                <h1 class="mt-3 mx-auto max-w-4xl font-black leading-[1.02] tracking-tight text-4xl sm:mt-4 sm:text-5xl lg:mt-5 lg:text-6xl">
                                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                        {{ $content['title'] ?? 'Warm-up:' }}
                                    </span>
                                </h1>

                                @if(!empty($content['subtitle']))
                                    <p class="warmup-subtitle mx-auto mt-3 max-w-2xl font-bold tracking-[-0.01em] text-base sm:text-lg leading-[1.45] text-slate-600 dark:text-slate-200 lg:mt-4 lg:max-w-[31rem]">
                                        {{ $content['subtitle'] }}
                                    </p>
                                @endif
                            </div>
                        </section>

                        <section class="min-h-0 flex-1">
                            <div id="boardGrid" class="board-grid grid h-full min-h-0 gap-3 sm:gap-4 lg:gap-4">
                                <div class="glass-panel flex min-h-0 flex-col p-[var(--panel-pad)]">
                                    <div class="panel-head flex items-center justify-between gap-3">
                                        <div class="min-w-0 relative z-10">
                                            <p class="text-[0.68rem] font-black uppercase tracking-[0.24em] text-slate-500 dark:text-slate-300">
                                                Image Bank
                                            </p>
                                            <p class="mt-0.5 text-sm sm:text-base font-black tracking-[-0.02em] leading-[1.45] text-slate-800 dark:text-slate-50 lg:text-[1.05rem]">
                                                Pick the correct picture
                                            </p>
                                        </div>

                                        <div class="counter-pill relative z-10 inline-flex items-center justify-center rounded-full px-3 py-1 text-[0.72rem] font-black uppercase tracking-[0.16em]">
                                            <span id="poolCount">0/{{ $tileCount }}</span>
                                        </div>
                                    </div>

                                    <div class="my-2 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/16"></div>

                                    <div class="min-h-0 flex-1 relative z-10">
                                        <div id="poolGrid" class="game-grid"></div>
                                    </div>
                                </div>

                                <div class="glass-panel flex min-h-0 flex-col p-[var(--panel-pad)]">
                                    <div class="panel-head flex items-center justify-between gap-3">
                                        <div class="min-w-0 relative z-10">
                                            <p class="text-[0.68rem] font-black uppercase tracking-[0.24em] text-slate-500 dark:text-slate-300">
                                                Answer Boxes
                                            </p>
                                            <p class="mt-0.5 text-sm sm:text-base font-black tracking-[-0.02em] leading-[1.45] text-slate-800 dark:text-slate-50 lg:text-[1.05rem]">
                                                Drop each image in the right box
                                            </p>
                                        </div>

                                        <div class="relative z-10 inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500/15 to-blue-500/15 text-xl">
                                            🏨
                                        </div>
                                    </div>

                                    <div class="my-2 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/16"></div>

                                    <div class="min-h-0 flex-1 relative z-10">
                                        <div id="targetsGrid" class="game-grid">
                                            @for($i = 0; $i < $tileCount; $i++)
                                                <div class="match-target" data-target="1" data-answer="">
                                                    <div class="target-inner">
                                                        <div class="target-media"></div>
                                                        <div class="target-label">...</div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>
                </div>
            </div>
        </div>

        <div id="winModal" class="fixed inset-0 z-[2000] hidden items-center justify-center bg-slate-900/45 backdrop-blur-xl dark:bg-slate-950/64">
            <div class="win-modal-card w-[92%] max-w-md rounded-[1.9rem] p-5 text-center">
                <div class="win-badge mx-auto grid h-12 w-12 place-items-center rounded-2xl">✅</div>

                <h2 class="mt-3 text-2xl font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50">
                    Great job!
                </h2>

                <p class="mt-1 text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-300">
                    You matched all images correctly.
                </p>

                <div class="mt-4 grid grid-cols-1 gap-2.5 sm:grid-cols-2">
                    <button
                            type="button"
                            class="win-primary-btn inline-flex w-full items-center justify-center rounded-2xl px-5 py-3 text-sm font-black uppercase tracking-[0.12em] transition-transform active:translate-y-0"
                            onclick="goNextSlide()"
                    >
                        Continue
                    </button>

                    <button
                            type="button"
                            class="win-secondary-btn inline-flex w-full items-center justify-center rounded-2xl px-5 py-3 text-sm font-black uppercase tracking-[0.12em] shadow-sm transition-transform active:translate-y-0"
                            onclick="game.init()"
                    >
                        Restart
                    </button>
                </div>
            </div>
        </div>

        <template id="tileTpl">
            <div
                    class="drag-card"
                    style="touch-action:none;"
                    role="img"
                    aria-label=""
            >
                <img src="" alt="" draggable="false">
            </div>
        </template>
    </main>
@endsection

@section('script')
    <script>
        const tilesData = @json($tiles);

        const SFX = {
            enabled: true,
            sources: {
                correct: '/slider/sounds/correct.wav',
                wrong: '/slider/sounds/wrong.wav',
                success: '/slider/sounds/success.wav',
            },
            volume: { correct: 1, wrong: 1, success: 1 }
        };

        const audio = {
            correct: new Audio(SFX.sources.correct),
            wrong: new Audio(SFX.sources.wrong),
            success: new Audio(SFX.sources.success),
        };

        function clamp01(v){
            v = Number(v);
            if (!Number.isFinite(v)) return 0.5;
            return Math.max(0, Math.min(1, v));
        }

        function applyVolumes(){
            audio.correct.volume = clamp01(SFX.volume.correct);
            audio.wrong.volume = clamp01(SFX.volume.wrong);
            audio.success.volume = clamp01(SFX.volume.success);
        }
        applyVolumes();

        function play(sound){
            if (!SFX.enabled || !sound) return;
            sound.pause();
            sound.currentTime = 0;
            sound.play().catch(() => {});
        }

        function playCorrect(){ play(audio.correct); }
        function playWrong(){ play(audio.wrong); }
        function playWin(){ play(audio.success); }

        function isEmbedded(){
            try { return window.top !== window.self; }
            catch(e){ return true; }
        }

        function goNextSlide(){
            if (isEmbedded()) {
                try {
                    if (window.parent && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (e) {}

                try {
                    window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                    return;
                } catch (e) {}
            }

        }

        window.stopSlideAudio = function(){
            Object.values(audio).forEach(a => {
                if (a) {
                    a.pause();
                    a.currentTime = 0;
                }
            });
        };

        function normalizeText(value){
            return String(value || '')
                .trim()
                .toLowerCase()
                .replace(/\s+/g, ' ');
        }

        class Game {
            constructor(){
                this.poolGrid = document.getElementById('poolGrid');
                this.targetsGrid = document.getElementById('targetsGrid');
                this.targetNodes = Array.from(this.targetsGrid.querySelectorAll('.match-target'));
                this.poolCount = document.getElementById('poolCount');
                this.winModal = document.getElementById('winModal');
                this.tileTpl = document.getElementById('tileTpl');

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.offsetX = 0;
                this.offsetY = 0;

                this._raf = null;
                this._mx = 0;
                this._my = 0;

                this.handlePointerMove = this.handlePointerMove.bind(this);
                this.handlePointerUp = this.handlePointerUp.bind(this);
            }

            shuffle(arr){
                const a = arr.slice();
                for (let i = a.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [a[i], a[j]] = [a[j], a[i]];
                }
                return a;
            }

            init(){
                this.winModal.classList.add('hidden');
                this.winModal.classList.remove('flex');

                this.clearHoverState();
                this.poolGrid.innerHTML = '';

                this.targetNodes.forEach(node => {
                    node.dataset.answer = '';
                    node.classList.remove('filled', 'is-correct', 'is-hover');
                    const media = node.querySelector('.target-media');
                    const label = node.querySelector('.target-label');
                    if (media) media.innerHTML = '';
                    if (label) label.textContent = '';
                });

                const shuffledTiles = this.shuffle(tilesData.slice());
                const shuffledLabels = this.shuffle(
                    tilesData.map(item => ({
                        answer: item.alt,
                    }))
                );

                shuffledTiles.forEach((itemData) => {
                    const node = this.tileTpl.content.firstElementChild.cloneNode(true);

                    node.dataset.answer = itemData.alt;
                    node.dataset.id = Math.random().toString(36).slice(2, 11);

                    const img = node.querySelector('img');
                    img.src = itemData.image;
                    img.alt = itemData.alt;

                    node.setAttribute('aria-label', itemData.alt);
                    node.title = itemData.alt;

                    node.addEventListener('pointerdown', (e) => this.handlePointerDown(e, node));
                    this.poolGrid.appendChild(node);
                });

                this.targetNodes.forEach((node, index) => {
                    const answer = shuffledLabels[index]?.answer || '';
                    node.dataset.answer = answer;

                    const label = node.querySelector('.target-label');
                    if (label) {
                        label.textContent = answer;
                    }
                });

                this.updatePoolCount();
            }

            updatePoolCount(){
                const total = Array.isArray(tilesData) ? tilesData.length : 0;
                const placed = this.targetsGrid.querySelectorAll('.match-target.filled').length;
                const remaining = total - placed;
                if (this.poolCount) this.poolCount.textContent = `${remaining}/${total}`;
            }

            handlePointerDown(e, item){
                if (item.classList.contains('locked')) return;

                e.preventDefault();
                item.setPointerCapture?.(e.pointerId);

                this.draggedItem = item;
                this.originalParent = item.parentElement;

                const rect = item.getBoundingClientRect();

                this.placeholder = document.createElement('div');
                this.placeholder.className = 'tile-placeholder';
                this.placeholder.style.width = rect.width + 'px';
                this.placeholder.style.height = rect.height + 'px';

                this.originalParent.insertBefore(this.placeholder, item);

                item.classList.add('dragging');
                item.style.width = rect.width + 'px';
                item.style.height = rect.height + 'px';

                this.offsetX = e.clientX - rect.left;
                this.offsetY = e.clientY - rect.top;

                document.body.appendChild(item);

                item.style.left = (e.clientX - this.offsetX) + 'px';
                item.style.top = (e.clientY - this.offsetY) + 'px';
                item.style.transform = 'scale(1.04)';

                document.addEventListener('pointermove', this.handlePointerMove, { passive: false });
                document.addEventListener('pointerup', this.handlePointerUp, { passive: false });
            }

            handlePointerMove(e){
                if (!this.draggedItem) return;
                e.preventDefault();

                this._mx = e.clientX - this.offsetX;
                this._my = e.clientY - this.offsetY;

                if (!this._raf) {
                    this._raf = requestAnimationFrame(() => {
                        if (!this.draggedItem) {
                            this._raf = null;
                            return;
                        }

                        this.draggedItem.style.left = this._mx + 'px';
                        this.draggedItem.style.top = this._my + 'px';
                        this._raf = null;
                    });
                }

                this.checkHover(e.clientX, e.clientY);
            }

            handlePointerUp(e){
                if (!this.draggedItem) return;

                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);

                if (this._raf) {
                    cancelAnimationFrame(this._raf);
                    this._raf = null;
                }

                const target = this.getTargetAtPoint(e.clientX, e.clientY);
                const itemAnswer = normalizeText(this.draggedItem.dataset.answer);
                const targetAnswer = normalizeText(target?.dataset.answer);

                if (target && !target.classList.contains('filled') && itemAnswer === targetAnswer) {
                    this.handleCorrectDrop(target);
                } else {
                    this.handleWrongDrop(target);
                }

                this.draggedItem = null;
                this.clearHoverState();
            }

            getTargetAtPoint(x, y){
                if (!this.draggedItem) return null;

                this.draggedItem.hidden = true;
                const below = document.elementFromPoint(x, y);
                this.draggedItem.hidden = false;

                return below ? below.closest('.match-target') : null;
            }

            clearHoverState(){
                this.targetNodes.forEach(node => node.classList.remove('is-hover'));
            }

            checkHover(x, y){
                this.clearHoverState();

                const target = this.getTargetAtPoint(x, y);
                if (target && !target.classList.contains('filled')) {
                    target.classList.add('is-hover');
                }
            }

            placeItemIntoTarget(target, item){
                const media = target.querySelector('.target-media');
                if (!media) return;

                item.classList.remove('dragging', 'returning', 'shake');
                item.classList.add('locked');

                item.style.position = '';
                item.style.left = '';
                item.style.top = '';
                item.style.width = '';
                item.style.height = '';
                item.style.zIndex = '';
                item.style.transform = '';
                item.style.cursor = 'default';

                media.innerHTML = '';
                media.appendChild(item);

                target.classList.add('filled', 'is-correct');
                target.classList.remove('is-hover');
            }

            handleCorrectDrop(target){
                const item = this.draggedItem;
                playCorrect();

                this.placeItemIntoTarget(target, item);

                if (this.placeholder && this.placeholder.parentNode) {
                    this.placeholder.remove();
                }
                this.placeholder = null;
                this.originalParent = null;

                this.updatePoolCount();
                this.checkWin();
            }

            handleWrongDrop(target){
                const item = this.draggedItem;
                playWrong();

                if (target) {
                    item.classList.add('shake');
                    setTimeout(() => item.classList.remove('shake'), 340);
                }

                const phRect = this.placeholder.getBoundingClientRect();
                item.classList.add('returning');
                item.style.transform = 'scale(1)';
                item.style.left = phRect.left + 'px';
                item.style.top = phRect.top + 'px';

                setTimeout(() => {
                    item.classList.remove('dragging', 'returning', 'shake');
                    item.style.position = '';
                    item.style.left = '';
                    item.style.top = '';
                    item.style.width = '';
                    item.style.height = '';
                    item.style.zIndex = '';
                    item.style.transform = '';

                    if (this.originalParent && this.placeholder) {
                        this.originalParent.insertBefore(item, this.placeholder);
                        this.placeholder.remove();
                    }

                    this.placeholder = null;
                    this.originalParent = null;
                }, 390);
            }

            checkWin(){
                const total = Array.isArray(tilesData) ? tilesData.length : 0;
                const placed = this.targetsGrid.querySelectorAll('.match-target.filled').length;

                if (total > 0 && placed === total) {
                    setTimeout(() => {
                        playWin();
                        this.winModal.classList.remove('hidden');
                        this.winModal.classList.add('flex');
                    }, 220);
                }
            }
        }

        const game = new Game();

        document.addEventListener('DOMContentLoaded', () => {
            game.init();

            const titleBlock = document.getElementById('titleBlock');
            const boardGrid = document.getElementById('boardGrid');
            const modal = document.getElementById('winModal');
            const viewport = document.getElementById('slideViewport');
            const shell = document.getElementById('slideShell');

            function syncLayoutMode() {
                if (!viewport || !shell) return;

                shell.classList.remove('is-scrollable');

                requestAnimationFrame(() => {
                    const needsScroll = viewport.scrollHeight > viewport.clientHeight + 2;
                    shell.classList.toggle('is-scrollable', needsScroll);
                });
            }

            function playIn(){
                syncLayoutMode();

                if (!window.gsap) return;

                if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                    if (titleBlock) {
                        titleBlock.style.opacity = 1;
                        titleBlock.style.transform = 'none';
                    }
                    if (boardGrid) {
                        boardGrid.style.opacity = 1;
                        boardGrid.style.transform = 'none';
                    }
                    return;
                }

                const items = [titleBlock, boardGrid].filter(Boolean);
                gsap.killTweensOf(items);
                gsap.set(items, { clearProps: 'all' });

                gsap.timeline({ defaults: { ease: 'power3.out' } })
                    .from(titleBlock, { opacity: 0, y: 10, duration: 0.58 }, 0.04)
                    .from(boardGrid, { opacity: 0, y: 14, duration: 0.62 }, 0.10);

                if (modal) gsap.set(modal, { clearProps: 'all' });
            }

            let resizeRaf = null;

            function handleResize() {
                if (resizeRaf) cancelAnimationFrame(resizeRaf);
                resizeRaf = requestAnimationFrame(() => {
                    syncLayoutMode();
                });
            }

            window.addEventListener('resize', handleResize);
            window.addEventListener('load', syncLayoutMode);

            if (document.fonts && document.fonts.ready) {
                document.fonts.ready.then(syncLayoutMode);
            }

            window.resetSlide = () => {
                syncLayoutMode();
                playIn();
            };

            playIn();
        });
    </script>
@endsection