<?php
$content = [
    'page_title' => 'Grammar',
    'title'      => 'Grammar',
    'subtitle'   => 'There is / There are',
    'theme_class' => 'grammar-theme-modern',
    'header_wrap_class' => 'mb-5 text-center flex flex-col items-center gap-[0.55rem]',
    'title_class' => 'font-black leading-[1.08] tracking-[-0.04em] text-4xl sm:text-5xl lg:text-6xl pb-[0.08em]',
    'title_gradient_class' => 'bg-gradient-to-br from-indigo-600 to-blue-500',
    'subtitle_class' => 'text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-600 dark:text-slate-200',
    'center_shell' => true,

    'cards' => [
        [
            'title' => 'Point 1',
            'badge_class' => 'badge-positive',
            'intro' => 'Use there is with singular countable nouns.',
            'examples' => [
                ['subject' => '', 'highlight' => 'There is', 'rest' => ' a department store in town.'],
                ['subject' => '', 'highlight' => 'There is', 'rest' => ' a big mall in this city.'],
                ['subject' => '', 'highlight' => 'There is not', 'rest' => ' a place to sit.'],
                ['subject' => '', 'highlight' => 'There is no', 'rest' => ' park near my house.'],
            ],
            'highlight_class' => 'text-rose-500',
        ],
        [
            'title' => 'Point 2',
            'badge_class' => 'badge-question',
            'intro' => 'Use there are with plural countable nouns.',
            'examples' => [
                ['subject' => '', 'highlight' => 'There are', 'rest' => ' two cars parked outside my house.'],
                ['subject' => '', 'highlight' => 'There are', 'rest' => ' some books on the table.'],
                ['subject' => '', 'highlight' => 'There are not', 'rest' => ' many tall buildings in my town.'],
                ['subject' => '', 'highlight' => 'There are no', 'rest' => ' new students this year.'],
            ],
            'highlight_class' => 'text-rose-500',
        ],
        [
            'title' => 'Point 3',
            'badge_class' => 'badge-negative',
            'intro' => 'Use there is with non-countable nouns.',
            'examples' => [
                ['subject' => '', 'highlight' => 'There is', 'rest' => ' crime in the city.'],
                ['subject' => '', 'highlight' => 'There is', 'rest' => ' money on the table.'],
                ['subject' => '', 'highlight' => 'There is not', 'rest' => ' any cheese in the fridge.'],
                ['subject' => '', 'highlight' => 'There is no', 'rest' => ' ice cream in the freezer.'],
            ],
            'highlight_class' => 'text-rose-500',
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'] ?? 'Slide')

@section('style')
    <style>
        :root{
            --g-card:#ffffff;
            --g-border:#dbe3f2;
            --g-text:#243046;
            --g-muted:#64748b;
            --g-primary:#4f63f3;
            --g-primary-2:#6c63ff;
            --g-primary-soft:#eef2ff;
            --g-blue-soft:#eff6ff;
            --g-success:#22c55e;
            --g-success-soft:#dcfce7;
            --g-warning:#f59e0b;
            --g-warning-soft:#fef3c7;
            --g-shadow:0 16px 42px rgba(79,99,243,.08);
        }

        .dark{
            --g-card:#0f172a;
            --g-border:#243041;
            --g-text:#e5eefc;
            --g-muted:#94a3b8;
            --g-primary:#7c8cff;
            --g-primary-2:#9a8cff;
            --g-primary-soft:#192336;
            --g-blue-soft:#102033;
            --g-success:#4ade80;
            --g-success-soft:#183524;
            --g-warning:#fbbf24;
            --g-warning-soft:#3f2d12;
            --g-shadow:0 18px 48px rgba(0,0,0,.28);
        }

        .grammar-page{
            background: transparent;
        }

        .grammar-theme-modern{
            font-family: "Plus Jakarta Sans", sans-serif;
            background:
                    radial-gradient(980px 560px at 8% 10%, rgba(103,63,231,.14), transparent 55%),
                    radial-gradient(900px 560px at 92% 14%, rgba(59,130,246,.12), transparent 56%),
                    radial-gradient(880px 640px at 50% 100%, rgba(16,185,129,.08), transparent 60%);
        }

        .dark .grammar-theme-modern{
            background:
                    radial-gradient(980px 560px at 8% 10%, rgba(96,165,250,.18), transparent 55%),
                    radial-gradient(900px 560px at 92% 14%, rgba(192,132,252,.16), transparent 56%),
                    radial-gradient(880px 640px at 50% 100%, rgba(99,102,241,.12), transparent 60%),
                    linear-gradient(180deg, #020617 0%, #0f172a 100%);
        }

        .glass-shell{
            position: relative;
            overflow: hidden;
            border-radius: 26px;
            border: 1px solid rgba(226,232,240,.8);
            background: rgba(255,255,255,.9);
            box-shadow: 0 20px 55px rgba(2,6,23,.08);
            backdrop-filter: blur(18px);
        }

        .dark .glass-shell{
            border-color: rgba(51,65,85,.75);
            background: rgba(15,23,42,.7);
            box-shadow: 0 20px 55px rgba(0,0,0,.24);
        }

        .glass-shell::before{
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .7;
            background:
                    radial-gradient(120% 120% at 0% 0%, rgba(59,130,246,.08) 0%, transparent 46%),
                    radial-gradient(120% 120% at 100% 0%, rgba(99,102,241,.08) 0%, transparent 48%),
                    radial-gradient(100% 100% at 50% 100%, rgba(147,51,234,.08) 0%, transparent 58%);
        }

        .mini-card{
            position: relative;
            border-radius: 22px;
            border: 1px solid rgba(226,232,240,.78);
            background: rgba(255,255,255,.82);
            box-shadow: 0 12px 28px rgba(2,6,23,.06);
            backdrop-filter: blur(14px);
        }

        .dark .mini-card{
            border-color: rgba(51,65,85,.72);
            background: rgba(15,23,42,.58);
            box-shadow: 0 12px 28px rgba(0,0,0,.2);
        }

        .badge-positive{
            background: var(--g-success-soft);
            color: var(--g-success);
            border: 1px solid rgba(34,197,94,.18);
        }

        .badge-question{
            background: var(--g-primary-soft);
            color: var(--g-primary);
            border: 1px solid rgba(79,99,243,.18);
        }

        .badge-negative{
            background: var(--g-warning-soft);
            color: var(--g-warning);
            border: 1px solid rgba(245,158,11,.18);
        }

        .grammar-theme-modern .glass-shell{
            border-radius: 28px;
            border: 1px solid rgba(255,255,255,.72);
            background: rgba(255,255,255,.72);
            box-shadow: 0 16px 34px -24px rgba(15,23,42,.18);
            backdrop-filter: blur(18px);
        }

        .dark .grammar-theme-modern .glass-shell{
            border-color: rgba(255,255,255,.10);
            background: rgba(255,255,255,.05);
            box-shadow: 0 16px 34px -24px rgba(2,6,23,.34);
        }

        .grammar-theme-modern .mini-card{
            border-radius: 24px;
            border: 1px solid rgba(255,255,255,.72);
            background: rgba(255,255,255,.74);
            box-shadow: 0 16px 34px -24px rgba(15,23,42,.16);
            backdrop-filter: blur(14px);
        }

        .dark .grammar-theme-modern .mini-card{
            border-color: rgba(255,255,255,.10);
            background: rgba(255,255,255,.05);
            box-shadow: 0 16px 34px -24px rgba(2,6,23,.3);
        }
    </style>
@endsection

@section('content')
    @php
        $themeClass = trim((string)($content['theme_class'] ?? ''));
        $headerWrapClass = trim((string)($content['header_wrap_class'] ?? 'mb-4 text-center'));
        $titleClass = trim((string)($content['title_class'] ?? 'font-black leading-[1.03] tracking-[-0.05em] text-2xl sm:text-3xl lg:text-5xl'));
        $titleGradientClass = trim((string)($content['title_gradient_class'] ?? 'bg-gradient-to-r from-blue-600 via-indigo-500 to-purple-600'));
        $subtitleClass = trim((string)($content['subtitle_class'] ?? 'mt-1 text-xs sm:text-sm font-semibold text-slate-600 dark:text-slate-300'));
        $cards = is_array($content['cards'] ?? null) ? $content['cards'] : [];
        $centerShell = (bool)($content['center_shell'] ?? false);
    @endphp

    <main class="grammar-page {{ $themeClass }} w-full min-h-[100dvh] py-4 sm:py-6 {{ $centerShell ? 'flex items-center justify-center' : '' }}">
        <div class="mx-auto w-full max-w-7xl px-3 sm:px-5">
            <header class="{{ $headerWrapClass }}">
                <h1 class="{{ $titleClass }}">
                    <span class="{{ $titleGradientClass }} bg-clip-text text-transparent">
                        {{ $content['title'] }}
                    </span>
                </h1>

                @if(!empty($content['subtitle']))
                    <p class="{{ $subtitleClass }}">
                        {{ $content['subtitle'] }}
                    </p>
                @endif
            </header>

            <section class="glass-shell">
                <div class="relative p-3 sm:p-4 lg:p-5">
                    <div class="grid gap-3 md:grid-cols-2 lg:grid-cols-3 lg:gap-4">
                        @foreach($cards as $card)
                            @php
                                $badgeClass = trim((string)($card['badge_class'] ?? 'badge-positive'));
                                $cardTitle = trim((string)($card['title'] ?? ''));
                                $intro = trim((string)($card['intro'] ?? ''));
                                $examples = is_array($card['examples'] ?? null) ? $card['examples'] : [];
                                $highlightClass = trim((string)($card['highlight_class'] ?? 'text-rose-500'));
                            @endphp

                            <div class="mini-card p-4 sm:p-5">
                                <div class="inline-flex items-center rounded-full px-3 py-1.5 text-[11px] sm:text-xs font-black uppercase tracking-[0.12em] {{ $badgeClass }}">
                                    {{ $cardTitle }}
                                </div>

                                <h2 class="mt-4 text-base sm:text-lg lg:text-[1.1rem] font-black tracking-[-0.03em] leading-[1.45] text-slate-900 dark:text-slate-50">
                                    {{ $intro }}
                                </h2>

                                <div class="mt-4 grid gap-2.5">
                                    @foreach($examples as $example)
                                        <div class="flex items-start gap-3 text-sm sm:text-base lg:text-[1.02rem] font-extrabold leading-[1.55] text-slate-800 dark:text-slate-100">
                                            <span class="shrink-0 text-indigo-600 dark:text-indigo-300">✓</span>
                                            <span>
                                                {{ $example['subject'] ?? '' }}<span class="{{ $highlightClass }}">{{ $example['highlight'] ?? '' }}</span>{{ $example['rest'] ?? '' }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (() => {
            const cards = Array.from(document.querySelectorAll('.mini-card'));
            const title = document.querySelector('header');

            if (!window.gsap) return;
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

            gsap.timeline({ defaults: { ease: 'power2.out' } })
                .from(title, { opacity: 0, y: 10, duration: 0.4 }, 0)
                .from(cards, { opacity: 0, y: 12, duration: 0.34, stagger: 0.06 }, 0.08);
        })();
    </script>
@endsection
