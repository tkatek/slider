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

        .formula-box{
            border-radius: 16px;
            border: 1px solid rgba(79,99,243,.12);
            background: var(--g-primary-soft);
            color: var(--g-primary);
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            font-weight: 800;
            letter-spacing: -.01em;
        }

        .line-chip{
            border-radius: 16px;
            border: 1px solid rgba(79,99,243,.12);
            background: linear-gradient(180deg, var(--g-primary-soft), transparent);
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

        .grammar-theme-modern .formula-box{
            border-color: rgba(99,102,241,.16);
            background: rgba(238,242,255,.95);
            color: #4338ca;
            font-family: "Plus Jakarta Sans", sans-serif;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .dark .grammar-theme-modern .formula-box{
            background: rgba(49,46,129,.24);
            color: #c7d2fe;
        }

        .grammar-theme-modern .line-chip{
            border-color: rgba(99,102,241,.12);
            background: linear-gradient(180deg, rgba(238,242,255,.92), rgba(255,255,255,.3));
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .dark .grammar-theme-modern .line-chip{
            background: linear-gradient(180deg, rgba(49,46,129,.18), rgba(15,23,42,.12));
        }

        .grammar-theme-modern .mini-card h2{
            font-family: "Plus Jakarta Sans", sans-serif;
            letter-spacing: -0.03em;
            line-height: 1.3;
        }

        .grammar-theme-modern .grammar-kicker::before{
            content: "\1F4D8";
            margin-right: .45rem;
        }

        .grammar-theme-modern .mini-card .badge-positive,
        .grammar-theme-modern .mini-card .badge-question,
        .grammar-theme-modern .mini-card .badge-negative,
        .grammar-theme-modern .mini-card .inline-flex.border-blue-200{
            font-family: "Plus Jakarta Sans", sans-serif;
            letter-spacing: 0.12em;
        }

        .grammar-theme-modern .badge-positive::before{
            content: "\2705";
            margin-right: .45rem;
        }

        .grammar-theme-modern .badge-question::before{
            content: "\2753";
            margin-right: .45rem;
        }

        .grammar-theme-modern .badge-negative::before{
            content: "\274C";
            margin-right: .45rem;
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
        <div class="mx-auto w-full max-w-6xl px-3 sm:px-5">
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
                    @if(count($cards))
                        <div class="grid gap-3 lg:grid-cols-2 lg:gap-4">
                            @foreach($cards as $card)
                                @php
                                    $badgeClass = trim((string)($card['badge_class'] ?? 'badge-positive'));
                                    $icon = trim((string)($card['icon'] ?? ''));
                                    $usesBadgeIcon = in_array($badgeClass, ['badge-positive', 'badge-question', 'badge-negative'], true);
                                    $cardTitle = trim((string)($card['title'] ?? ''));
                                    $introTop = trim((string)($card['intro_top'] ?? ''));
                                    $intro = trim((string)($card['intro'] ?? ''));
                                    $bullets = is_array($card['bullets'] ?? null) ? $card['bullets'] : [];
                                    $structureLabel = trim((string)($card['structure_label'] ?? 'Structure:'));
                                    $structureRule = trim((string)($card['structure_rule'] ?? ''));
                                    $examples = is_array($card['examples'] ?? null) ? $card['examples'] : [];
                                    $highlightClass = trim((string)($card['highlight_class'] ?? 'text-rose-500'));
                                    $bulletDotClass = trim((string)($card['bullet_dot_class'] ?? 'text-black dark:text-white'));
                                @endphp

                                <div class="mini-card p-4 sm:p-5">
                                    <div class="inline-flex items-center rounded-full px-3 py-1.5 text-[11px] sm:text-xs font-black uppercase tracking-[0.12em] {{ $badgeClass }}">
                                        @if($icon !== '' && !$usesBadgeIcon)
                                            <span class="mr-2">{{ $icon }}</span>
                                        @endif
                                        {{ $cardTitle }}
                                    </div>

                                    @if($introTop !== '')
                                        <p class="mt-4 text-base sm:text-lg lg:text-[1.1rem] font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50">
                                            {{ $introTop }}
                                        </p>
                                    @endif

                                    @if($intro !== '')
                                        <h2 class="mt-4 text-base sm:text-lg lg:text-[1.1rem] font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50">
                                            {{ $intro }}
                                        </h2>
                                    @endif

                                    @if(count($bullets))
                                        <div class="mt-3 grid gap-2">
                                            @foreach($bullets as $line)
                                                <div class="flex items-start gap-3 text-sm sm:text-base font-extrabold leading-[1.5] text-slate-700 dark:text-slate-100">
                                                    <span class="{{ $bulletDotClass }}">•</span>
                                                    <span>{{ $line }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if($structureRule !== '')
                                        <div class="mt-4">
                                            <h3 class="text-base sm:text-lg lg:text-[1.1rem] font-black tracking-[-0.03em] text-rose-500">
                                                {{ $structureLabel }}
                                            </h3>

                                            <div class="formula-box mt-3 px-3 py-3 text-sm sm:text-base lg:text-[1.05rem] leading-[1.5]">
                                                {{ $structureRule }}
                                            </div>
                                        </div>
                                    @endif

                                    @if(count($examples))
                                        <div class="mt-4 grid gap-2.5">
                                            @foreach($examples as $example)
                                                <div class="flex items-start gap-3 text-base sm:text-lg lg:text-[1.2rem] font-black tracking-[-0.03em] leading-[1.45] text-slate-900 dark:text-slate-50">
                                                    <span class="text-indigo-600 dark:text-indigo-300">✓</span>
                                                    <span>
                                                        @if(is_array($example))
                                                            {{ $example['subject'] ?? '' }}
                                                            @if(!empty($example['highlight']))
                                                                <span class="{{ $highlightClass }}">{{ $example['highlight'] }}</span>
                                                            @endif{{ $example['rest'] ?? '' }}
                                                        @else
                                                            {{ $example }}
                                                        @endif
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="grid gap-3 lg:grid-cols-12 lg:gap-4">
                            <div class="lg:col-span-5">
                                <div class="mini-card p-3 sm:p-4">
                                    <div class="grammar-kicker inline-flex items-center rounded-xl border border-blue-200 bg-blue-50 px-3 py-1.5 text-[11px] sm:text-xs font-black uppercase tracking-[0.14em] text-blue-700 dark:border-blue-400/20 dark:bg-blue-500/10 dark:text-blue-200">
                                        Grammar
                                    </div>

                                    <h2 class="mt-3 text-base sm:text-lg font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50">
                                        {{ $content['uses_title'] }}
                                    </h2>

                                    <div class="mt-3 grid gap-2">
                                        @foreach($content['uses'] as $line)
                                            <div class="line-chip px-3 py-3 text-sm sm:text-base font-extrabold leading-[1.5] text-slate-700 dark:text-slate-100">
                                                {{ $line }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-7">
                                <div class="grid gap-3">
                                    <div class="mini-card p-3 sm:p-4">
                                        <div class="inline-flex items-center rounded-full px-3 py-1.5 text-[11px] sm:text-xs font-black uppercase tracking-[0.12em] badge-positive">
                                            {{ $content['structure_title'] }}
                                        </div>

                                        <div class="formula-box mt-3 px-3 py-3 text-sm sm:text-base lg:text-[1.05rem] leading-[1.5]">
                                            {{ $content['structure_rule'] }}
                                        </div>
                                    </div>

                                    <div class="mini-card p-3 sm:p-4">
                                        <div class="inline-flex items-center rounded-full px-3 py-1.5 text-[11px] sm:text-xs font-black uppercase tracking-[0.12em] badge-question">
                                            {{ $content['question_title'] }}
                                        </div>

                                        <div class="formula-box mt-3 px-3 py-3 text-sm sm:text-base lg:text-[1.05rem] leading-[1.5]">
                                            {{ $content['question_rule'] }}
                                        </div>

                                        <div class="mt-3 grid gap-2">
                                            @foreach($content['question_examples'] as $line)
                                                <div class="line-chip px-3 py-3 text-sm sm:text-base font-extrabold leading-[1.5] text-slate-700 dark:text-slate-100">
                                                    {{ $line }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="mini-card p-3 sm:p-4">
                                        <div class="inline-flex items-center rounded-full px-3 py-1.5 text-[11px] sm:text-xs font-black uppercase tracking-[0.12em] badge-negative">
                                            {{ $content['negative_title'] }}
                                        </div>

                                        <div class="formula-box mt-3 px-3 py-3 text-sm sm:text-base lg:text-[1.05rem] leading-[1.5]">
                                            {{ $content['negative_rule'] }}
                                        </div>

                                        <div class="mt-3 grid gap-2">
                                            @foreach($content['negative_examples'] as $line)
                                                <div class="line-chip px-3 py-3 text-sm sm:text-base font-extrabold leading-[1.5] text-slate-700 dark:text-slate-100">
                                                    {{ $line }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
