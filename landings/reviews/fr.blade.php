@php
    $currentLang = request()->route('lang') ?? 'fr';
    \Illuminate\Support\Facades\App::setLocale($currentLang);
    $languageRoute = \Illuminate\Support\Facades\Route::currentRouteName() ?: 'home.reviews';
    $currentRouteParams = request()->route()?->parameters() ?? [];

    $languages = [
        ['code' => 'en', 'short' => 'EN', 'name' => 'Anglais', 'native' => 'English', 'flag' => 'https://flagcdn.com/w40/us.png'],
        ['code' => 'ar', 'short' => 'AR', 'name' => 'Arabe', 'native' => 'العربية', 'flag' => 'https://flagcdn.com/w40/ma.png'],
        ['code' => 'fr', 'short' => 'FR', 'name' => 'Français', 'native' => 'Français', 'flag' => 'https://flagcdn.com/w40/fr.png'],
        ['code' => 'es', 'short' => 'ES', 'name' => 'Espagnol', 'native' => 'Español', 'flag' => 'https://flagcdn.com/w40/es.png'],
        ['code' => 'pt', 'short' => 'PT', 'name' => 'Portugais', 'native' => 'Português', 'flag' => 'https://flagcdn.com/w40/pt.png'],
        ['code' => 'tr', 'short' => 'TR', 'name' => 'Turc', 'native' => 'Türkçe', 'flag' => 'https://flagcdn.com/w40/tr.png'],
        ['code' => 'zh', 'short' => 'ZH', 'name' => 'Chinois', 'native' => '简体中文', 'flag' => 'https://flagcdn.com/w40/cn.png'],
    ];

    $lightLogo = materialAsset('landing-page/img/logo2.webp');
    $darkLogo = materialAsset('landing-page/img/logo1.webp');

    $currentLanguage = $languages[0];
    foreach ($languages as $language) {
        if ($language['code'] === $currentLang) {
            $currentLanguage = $language;
            break;
        }
    }

    $landingUrl = route('landingPage', ['lang' => $currentLang]);
    $membershipUrl = $landingUrl . '#membership-section';

    $reviews = collect($reviews ?? []);
    $reviewPercent = $reviewPercent ?? [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
    $reviewsCount = (int) ($reviewsCount ?? $reviews->count());
    $reviewsAvg = (float) ($reviewsAvg ?? 0);

    $ratingSummary = [
        'average' => number_format($reviewsAvg, 2),
        'total' => number_format($reviewsCount),
        'distribution' => collect(range(5, 1))->map(fn ($rating) => [
            'label' => $rating . ' étoile',
            'value' => (float) ($reviewPercent[$rating] ?? 0),
        ])->values()->all(),
    ];

    $studentReviews = $reviews->map(function ($review) {
        $displayName = trim(collect([
            data_get($review, 'student.user.name'),
            data_get($review, 'student.user.last_name'),
        ])->filter()->implode(' '));
        $quote = trim((string) data_get($review, 'review_body', ''));
        $createdAt = data_get($review, 'created_at');

        if ($quote === '') {
            return null;
        }

        return [
            'name' => $displayName !== '' ? $displayName : 'Student',
            'time' => $createdAt instanceof \Carbon\CarbonInterface ? $createdAt->diffForHumans() : '',
            'rating' => max(1, min(5, (int) round((float) data_get($review, 'review', 5)))),
            'quote' => $quote,
        ];
    })->filter()->values();

@endphp
        <!DOCTYPE html>
<html lang="{{ $currentLang }}" dir="{{ $currentLang === 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Avis des étudiants Boston English Center</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        (() => {
            const storedTheme = localStorage.getItem('theme') || localStorage.getItem('color-theme') || localStorage.getItem('darkMode');
            const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            const shouldUseDark = storedTheme === 'dark' || storedTheme === 'true' || (!storedTheme && prefersDark);
            document.documentElement.classList.toggle('dark', shouldUseDark);
        })();

        window.tailwind = window.tailwind || {};
        window.tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        cream: '#f8fbff',
                        creamSoft: '#eff6ff',
                        clay: '#1d4ed8',
                        clayDark: '#1e3a8a',
                        cocoa: '#0f172a',
                        ink: '#0f172a',
                    },
                    boxShadow: {
                        soft: '0 18px 45px rgba(15, 23, 42, .10)',
                        card: '0 12px 30px rgba(15, 23, 42, .07)',
                    },
                }
            }
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
        body { text-rendering: geometricPrecision; }
        h1, h2, h3, .font-display { letter-spacing: -0.025em; }
        .bec-dot-bg { position: relative; isolation: isolate; }
        .bec-dot-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -2;
            pointer-events: none;
            background-image: radial-gradient(rgba(37, 99, 235, .34) 1px, transparent 1.2px);
            background-size: 22px 22px;
            opacity: .26;
            mask-image: radial-gradient(circle at 50% 18%, black 0%, transparent 70%);
        }
        .dark .bec-dot-bg::before { background-image: radial-gradient(rgba(148, 163, 184, .48) .9px, transparent 1.2px); opacity: .18; }
        .bec-dot-bg::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            pointer-events: none;
            background:
                    radial-gradient(circle at 15% 12%, rgba(59, 130, 246, .16), transparent 26rem),
                    radial-gradient(circle at 85% 18%, rgba(14, 165, 233, .13), transparent 28rem),
                    linear-gradient(180deg, rgba(255,255,255,.42), rgba(255,255,255,0));
        }
        .dark .bec-dot-bg::after {
            background:
                    radial-gradient(circle at 15% 12%, rgba(59, 130, 246, .18), transparent 26rem),
                    radial-gradient(circle at 85% 18%, rgba(14, 165, 233, .10), transparent 28rem),
                    linear-gradient(180deg, rgba(255,255,255,.035), rgba(255,255,255,0));
        }
        .bec-premium-card { position: relative; overflow: hidden; }
        .bec-premium-card::before {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            background: linear-gradient(135deg, rgba(255,255,255,.66), transparent 42%);
            opacity: .7;
        }
        .dark .bec-premium-card::before { background: linear-gradient(135deg, rgba(255,255,255,.08), transparent 46%); opacity: 1; }
    </style>
</head>

<body id="top" x-data="{ openMenu: false, desktopLangMenu: false, floatingLangMenu: false }" class="min-h-screen overflow-x-hidden bg-[radial-gradient(circle_at_0_0,rgba(37,99,235,.12),transparent_30rem),radial-gradient(circle_at_100%_8rem,rgba(14,165,233,.12),transparent_28rem),linear-gradient(180deg,#f8fbff_0%,#eef6ff_44%,#ffffff_100%)] font-sans text-[#0f172a] antialiased selection:bg-[#2563eb] selection:text-white dark:bg-[radial-gradient(circle_at_50%_0,rgba(59,130,246,.18),transparent_30rem),radial-gradient(circle_at_100%_18rem,rgba(14,165,233,.10),transparent_28rem),linear-gradient(180deg,#020617_0%,#071326_48%,#020617_100%)] dark:text-[#f8fafc]">
<header class="sticky top-0 z-50 border-b border-[#dbeafe]/80 bg-white/90 text-[#0f172a] shadow-[0_10px_34px_rgba(15,23,42,.07)] backdrop-blur-2xl dark:border-white/10 dark:bg-[#05070d]/95 dark:text-white dark:shadow-[0_18px_50px_rgba(0,0,0,.22)]">
    <nav class="mx-auto flex min-h-[76px] max-w-[1320px] items-center justify-between gap-3 px-4 sm:px-6 xl:px-0" aria-label="Main navigation">
        <a href="{{ $landingUrl }}" class="flex min-w-0 items-center">
            <img src="{{ $lightLogo }}" alt="Boston English Center" width="150" height="54" class="h-9 w-auto object-contain dark:hidden">
            <img src="{{ $darkLogo }}" alt="Boston English Center" width="150" height="54" class="hidden h-9 w-auto object-contain dark:block">
        </a>

        <div class="hidden items-center gap-1 xl:flex">
            <a href="{{ $landingUrl }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Accueil</a>
            <a href="{{ route('contactUs', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Gratuit pour les orphelins</a>
            <a href="{{ route('booking.index', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Réserver un essai</a>
            <a href="{{ route('placementTest.index', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Test de niveau</a>
            <a href="{{ route('team') }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Notre équipe</a>
            <a href="{{ route('login') }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Connexion</a>
        </div>

        <div class="flex items-center gap-2">
            <div class="relative hidden sm:block" @click.outside="desktopLangMenu = false">
                <button type="button" @click="desktopLangMenu = !desktopLangMenu; openMenu = false; floatingLangMenu = false" :aria-expanded="desktopLangMenu.toString()" aria-controls="language-menu" class="inline-flex h-10 items-center gap-2 rounded-full border border-[#dbeafe] bg-white px-3 text-sm font-semibold text-[#1e3a8a] shadow-sm transition hover:bg-[#eff6ff] active:bg-[#dbeafe] dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 dark:active:bg-white/10">
                    <img width="24" height="18" src="{{ $currentLanguage['flag'] }}" loading="lazy" alt="{{ $currentLanguage['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]">
                    <span class="hidden sm:inline">{{ $currentLanguage['native'] }}</span>
                    <svg class="h-3.5 w-3.5 transition" :class="desktopLangMenu ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m6 9 6 6 6-6" /></svg>
                </button>
                <div id="language-menu" hidden x-show="desktopLangMenu" x-bind:hidden="!desktopLangMenu" x-transition class="absolute {{ $currentLang === 'ar' ? 'left-0' : 'right-0' }} z-50 mt-3 w-56 overflow-hidden rounded-[22px] border border-[#bfdbfe] bg-[#f8fbff] p-2 shadow-soft dark:border-white/10 dark:bg-[#0f172a]">
                    @foreach($languages as $language)
                        <a href="{{ route($languageRoute, array_merge($currentRouteParams, ['lang' => $language['code']])) }}" class="flex items-center gap-3 rounded-2xl px-3 py-2.5 text-sm font-semibold text-[#1e293b] transition hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">
                            <img width="24" height="18" src="{{ $language['flag'] }}" loading="lazy" alt="{{ $language['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]"><span>{{ $language['native'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <a href="{{ $membershipUrl }}" class="inline-flex min-h-11 shrink-0 items-center justify-center whitespace-nowrap rounded-full bg-gradient-to-r from-[#1d4ed8] via-[#2563eb] to-[#3b82f6] px-4 text-[14px] font-semibold text-white shadow-[0_12px_24px_rgba(37,99,235,.24)] transition hover:-translate-y-0.5 hover:from-[#1e40af] hover:via-[#1d4ed8] hover:to-[#2563eb] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:bg-white dark:bg-none dark:text-[#020617] dark:shadow-[0_18px_40px_rgba(255,255,255,.12)] dark:hover:bg-[#eaf3ff] dark:focus:ring-white/20 min-[380px]:px-5 min-[380px]:text-[15px] sm:px-6 sm:text-[17px]">Commencer Maintenant</a>
            <button type="button" @click="openMenu = !openMenu; desktopLangMenu = false; floatingLangMenu = false" :aria-expanded="openMenu.toString()" aria-controls="mobile-navigation" aria-label="Ouvrir ou fermer le menu" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#dbeafe] bg-white text-[#1e3a8a] shadow-sm transition hover:bg-[#eff6ff] active:bg-[#dbeafe] dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 dark:active:bg-white/10 xl:hidden">
                <svg x-show="!openMenu" x-bind:hidden="openMenu" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 7h16M4 12h16M4 17h16" /></svg>
                <svg hidden x-show="openMenu" x-bind:hidden="!openMenu" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18 18 6M6 6l12 12" /></svg>
            </button>
        </div>
    </nav>

    <div id="mobile-navigation" hidden x-show="openMenu" x-bind:hidden="!openMenu" x-transition class="max-h-[calc(100vh-76px)] overflow-y-auto border-t border-[#dbeafe] bg-white px-4 py-5 shadow-xl dark:border-slate-800 dark:bg-slate-950 xl:hidden">
        <div class="mx-auto grid max-w-[1320px] gap-3">
            <a href="{{ $landingUrl }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Accueil</a>
            <a href="{{ route('contactUs', ['lang' => $currentLang]) }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Gratuit pour les orphelins</a>
            <a href="{{ route('booking.index', ['lang' => $currentLang]) }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Réserver un essai</a>
            <a href="{{ route('placementTest.index', ['lang' => $currentLang]) }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Test de niveau</a>
            <a href="{{ route('team') }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Notre équipe</a>
            <div class="mt-2 grid gap-3 sm:grid-cols-2">
                <a href="tel:+16178482317" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#bfdbfe] bg-[#eff6ff] px-5 text-base font-semibold text-[#1e3a8a] shadow-sm transition hover:-translate-y-0.5 hover:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/10 dark:focus:ring-white/10">+1 617-848-2317</a>
                <a href="{{ route('login') }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#bfdbfe] bg-white px-5 text-base font-semibold text-[#1e3a8a] shadow-sm transition hover:-translate-y-0.5 hover:bg-[#eff6ff] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/10 dark:focus:ring-white/10">Connexion</a>
            </div>
            <a href="{{ $membershipUrl }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="mt-2 inline-flex min-h-12 items-center justify-center rounded-full bg-gradient-to-r from-[#1d4ed8] via-[#2563eb] to-[#3b82f6] px-7 text-base font-semibold text-white shadow-[0_12px_24px_rgba(37,99,235,.24)] transition hover:-translate-y-0.5 hover:from-[#1e40af] hover:via-[#1d4ed8] hover:to-[#2563eb] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:focus:ring-white/10">Commencer Maintenant</a>
        </div>
    </div>
</header>

<div class="fixed right-4 top-[88px] z-[60] sm:hidden" @click.outside="floatingLangMenu = false">
    <button type="button" @click="floatingLangMenu = !floatingLangMenu; openMenu = false; desktopLangMenu = false" :aria-expanded="floatingLangMenu.toString()" aria-controls="floating-language-menu" class="flex h-12 items-center gap-2 rounded-full border border-blue-100 bg-white px-3 text-base font-semibold text-[#0b2a5b] shadow-[0_16px_34px_rgba(15,23,42,.18)] transition active:scale-95 dark:border-white/10 dark:bg-[#0b1220] dark:text-white">
        <img width="24" height="18" src="{{ $currentLanguage['flag'] }}" loading="lazy" alt="{{ $currentLanguage['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]">
        <span>{{ $currentLanguage['short'] }}</span>
        <svg class="h-3.5 w-3.5 transition" :class="floatingLangMenu ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m6 9 6 6 6-6" /></svg>
    </button>
    <div id="floating-language-menu" hidden x-show="floatingLangMenu" x-bind:hidden="!floatingLangMenu" x-transition class="absolute right-0 top-14 w-52 overflow-hidden rounded-[22px] border border-blue-100 bg-white p-2 shadow-[0_20px_50px_rgba(15,23,42,.24)] dark:border-white/10 dark:bg-[#0b1220]">
        @foreach($languages as $language)
            <a href="{{ route($languageRoute, array_merge($currentRouteParams, ['lang' => $language['code']])) }}" class="flex items-center gap-3 rounded-2xl px-3 py-2.5 text-sm font-semibold text-[#0b2a5b] transition hover:bg-[#eff6ff] dark:text-white dark:hover:bg-white/10">
                <img width="24" height="18" src="{{ $language['flag'] }}" loading="lazy" alt="{{ $language['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]"><span>{{ $language['native'] }}</span>
            </a>
        @endforeach
    </div>
</div>

<main>
    <section class="bec-dot-bg relative overflow-hidden bg-[#eef7ff] px-5 py-16 text-[#071326] dark:bg-[#040814] dark:text-white sm:px-6 lg:py-24">
        <div class="mx-auto max-w-[1320px]">
            <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end xl:gap-12">
                <div class="max-w-[820px]">
                    <p class="text-sm font-semibold uppercase tracking-[.16em] text-[#1d4ed8] dark:text-[#93c5fd]">Avis des étudiants</p>
                    <h1 class="font-display mt-4 text-[36px] font-bold leading-[1.16] tracking-[-0.025em] text-[#001d44] dark:text-white sm:text-[50px] lg:text-[62px]">Approuvé Par Des Milliers D’apprenants</h1>
                    <p class="mt-5 max-w-3xl text-lg font-medium leading-[1.8] text-[#475569] dark:text-[#cbd5e1] sm:text-xl">De vrais avis d’étudiants qui apprennent, pratiquent et progressent avec Boston English Center.</p>
                </div>

                <div class="bec-premium-card rounded-[28px] border border-[#bfdbfe] bg-white/90 p-5 text-center shadow-[0_18px_44px_rgba(15,23,42,.08)] backdrop-blur-xl dark:border-white/10 dark:bg-white/[.06] lg:p-6">
                    <div class="text-[72px] font-bold leading-[0.85] tracking-[-.09em] text-[#0f172a] dark:text-white">{{ $ratingSummary['average'] }}</div>
                    <div class="mt-3 flex justify-center gap-1 text-[#f59e0b]" aria-label="Étoiles de la note moyenne">
                        @for($i = 0; $i < 5; $i++)
                            <span class="grid h-6 w-6 place-items-center rounded-md bg-[#f59e0b] text-xs text-white">&#9733;</span>
                        @endfor
                    </div>
                    <p class="mt-2 text-sm font-normal text-[#64748b] dark:text-[#cbd5e1]">Basé sur {{ $ratingSummary['total'] }} avis</p>
                </div>
            </div>

            <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-3 xl:gap-6">
                @foreach($studentReviews as $index => $review)
                    @php
                        $displayName = trim($review['name']);
                        $initial = mb_substr($displayName, 0, 1);
                        $hasArabic = preg_match('/\p{Arabic}/u', $review['quote']);
                    @endphp
                    <article class="bec-premium-card group flex h-full flex-col rounded-[28px] border border-[#bfdbfe] bg-white/90 p-5 shadow-[0_16px_42px_rgba(15,23,42,.07)] backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-[#93c5fd] hover:shadow-[0_24px_54px_rgba(30,64,175,.12)] dark:border-white/10 dark:bg-white/[.06]">
                        <div class="relative z-10 flex items-start gap-3">
                            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-[#eaf3ff] text-lg font-bold uppercase text-[#1d4ed8] shadow-[0_10px_22px_rgba(37,99,235,.10)] ring-1 ring-[#bfdbfe] dark:bg-blue-400/15 dark:text-blue-100 dark:shadow-[0_10px_24px_rgba(37,99,235,.16)] dark:ring-blue-300/25">{{ $initial }}</div>
                            <div class="min-w-0 flex-1">
                                <div class="flex flex-wrap items-start justify-between gap-x-3 gap-y-1">
                                    <div>
                                        <h3 class="text-lg font-bold leading-[1.25] tracking-[-0.005em] text-[#0f172a] dark:text-white">{{ $displayName }}</h3>
                                    </div>
                                    <span class="text-xs font-semibold text-[#94a3b8] dark:text-[#cbd5e1]/75">{{ $review['time'] }}</span>
                                </div>
                                <div class="mt-3 flex gap-1 text-[#f59e0b]" aria-label="{{ $review['rating'] }} étoiles sur 5">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span class="text-lg leading-none {{ $i <= $review['rating'] ? 'text-[#f59e0b]' : 'text-slate-300 dark:text-white/25' }}">&#9733;</span>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <p dir="{{ $hasArabic ? 'rtl' : 'ltr' }}" class="relative z-10 mt-5 flex-1 text-[15px] font-medium italic leading-[1.75] text-[#475569] dark:text-[#e2e8f0] sm:text-base {{ $hasArabic ? 'text-right' : 'text-left' }}">&ldquo;{{ $review['quote'] }}&rdquo;</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section> 
</main>

<footer class="border-t border-[#dbeafe] bg-white/90 px-5 py-8 text-center backdrop-blur-xl dark:border-white/10 dark:bg-slate-950">
    <div class="mx-auto max-w-[1320px]"> 
        <p class="text-base font-semibold text-[#0b2a5b] dark:text-white">© Boston English Center</p>
        <p class="mt-1 text-[14px] font-normal text-[#64748b] dark:text-[#cbd5e1]">Adhésion de pratique de l’anglais • 35 $/mois • Annulation à tout moment</p>
    </div> 
</footer> 

</body> 
</html>
