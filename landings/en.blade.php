@php
    $currentLang = request()->route('lang') ?? 'en';
    \Illuminate\Support\Facades\App::setLocale($currentLang);
    $languageRoute = \Illuminate\Support\Facades\Route::currentRouteName() ?: 'landing';

    $languages = [
        ['code' => 'en', 'short' => 'EN', 'name' => 'English', 'native' => 'English', 'flag' => 'https://flagcdn.com/w40/us.png'],
        ['code' => 'ar', 'short' => 'AR', 'name' => 'Arabic', 'native' => 'العربية', 'flag' => 'https://flagcdn.com/w40/ma.png'],
        ['code' => 'fr', 'short' => 'FR', 'name' => 'French', 'native' => 'Français', 'flag' => 'https://flagcdn.com/w40/fr.png'],
        ['code' => 'es', 'short' => 'ES', 'name' => 'Spanish', 'native' => 'Español', 'flag' => 'https://flagcdn.com/w40/es.png'],
        ['code' => 'pt', 'short' => 'PT', 'name' => 'Portuguese', 'native' => 'Português', 'flag' => 'https://flagcdn.com/w40/pt.png'],
        ['code' => 'tr', 'short' => 'TR', 'name' => 'Turkish', 'native' => 'Türkçe', 'flag' => 'https://flagcdn.com/w40/tr.png'],
        ['code' => 'zh', 'short' => 'ZH', 'name' => 'Chinese', 'native' => '简体中文', 'flag' => 'https://flagcdn.com/w40/cn.png'],
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

    $features = [
        ['title' => 'Conversation Rooms', 'description' => 'Practice speaking English with other students online.', 'image' => materialAsset('landing-page/img/conversation-rooms.webp')],
        ['title' => 'Practice Groups', 'description' => 'Join guided sessions with teachers every week.', 'image' => materialAsset('landing-page/img/practice-groups.webp')],
        ['title' => 'English Materials', 'description' => 'Access lessons, vocabulary, and practice activities.', 'image' => materialAsset('landing-page/img/english-materials.webp')],
        ['title' => 'Online Community', 'description' => 'Stay connected to English every day.', 'image' => materialAsset('landing-page/img/online-community.webp')],
        ['title' => 'Mobile Access', 'description' => 'Practice from your phone, tablet, or computer.', 'image' => materialAsset('landing-page/img/mobile-access.webp')],
        ['title' => 'Stay Motivated', 'description' => 'Build confidence through regular speaking practice.', 'image' => materialAsset('landing-page/img/stay-motivated.webp')],
    ];

    $students = [
        ['path' => '1-encrypted/1.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/3.webp'), 'name' => 'Nada', 'duration' => 'Student for 9 months', 'city' => 'New Jersey', 'country' => 'USA', 'flag' => 'https://flagcdn.com/w40/us.png'],
        ['path' => '2-encrypted/2.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/2.webp'), 'name' => 'Sara', 'duration' => 'Practicing for 1 year', 'city' => 'Toronto', 'country' => 'Canada', 'flag' => 'https://flagcdn.com/w40/ca.png'],
        ['path' => '3-encrypted/3.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/4.webp'), 'name' => 'Mohamed', 'duration' => 'Student for 6 months', 'city' => 'Texas', 'country' => 'USA', 'flag' => 'https://flagcdn.com/w40/us.png'],
        ['path' => '4-encrypted/4.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/1.webp'), 'name' => 'Abir', 'duration' => 'Practicing for 4 months', 'city' => 'New York', 'country' => 'USA', 'flag' => 'https://flagcdn.com/w40/us.png'],
    ];

    $reviews = [
        [
            'name' => 'Ahmed',
            'location' => 'New Jersey, USA',
            'avatar' => materialAsset('landing-page/img/review-ahmed.webp'),
            'quote' => '“The <strong class="text-[#1d4ed8] dark:text-[#93c5fd]">live conversation rooms</strong> helped me finally start speaking English <strong class="text-[#0f172a] dark:text-white">confidently</strong>.”'
        ],
        [
            'name' => 'Sara',
            'location' => 'Toronto, Canada',
            'avatar' => materialAsset('landing-page/img/review-sara.webp'),
            'quote' => '“I practice English <strong class="text-[#1d4ed8] dark:text-[#93c5fd]">almost every day</strong> now and feel much more comfortable <strong class="text-[#0f172a] dark:text-white">speaking</strong>.”'
        ],
        [
            'name' => 'Mohamed',
            'location' => 'Texas, USA',
            'avatar' => materialAsset('landing-page/img/review-mohamed.webp'),
            'quote' => '“The teachers understand our needs very well and help us <strong class="text-[#1d4ed8] dark:text-[#93c5fd]">improve consistently</strong>.”'
        ],
    ];

    $countries = ['United States', 'Canada', 'Saudi Arabia', 'UAE'];

    $phoneCountries = [
        ['name' => 'Morocco', 'code' => '+212', 'flag' => 'https://flagcdn.com/w40/ma.png'],
        ['name' => 'India', 'code' => '+91', 'flag' => 'https://flagcdn.com/w40/in.png'],
        ['name' => 'Afghanistan', 'code' => '+93', 'flag' => 'https://flagcdn.com/w40/af.png'],
        ['name' => 'USA', 'code' => '+1', 'flag' => 'https://flagcdn.com/w40/us.png'],
        ['name' => 'Germany', 'code' => '+49', 'flag' => 'https://flagcdn.com/w40/de.png'],
        ['name' => 'Canada', 'code' => '+1', 'flag' => 'https://flagcdn.com/w40/ca.png'],
        ['name' => 'Saudi Arabia', 'code' => '+966', 'flag' => 'https://flagcdn.com/w40/sa.png'],
        ['name' => 'UAE', 'code' => '+971', 'flag' => 'https://flagcdn.com/w40/ae.png'],
        ['name' => 'France', 'code' => '+33', 'flag' => 'https://flagcdn.com/w40/fr.png'],
        ['name' => 'Spain', 'code' => '+34', 'flag' => 'https://flagcdn.com/w40/es.png'],
        ['name' => 'Turkey', 'code' => '+90', 'flag' => 'https://flagcdn.com/w40/tr.png'],
        ['name' => 'China', 'code' => '+86', 'flag' => 'https://flagcdn.com/w40/cn.png'],
        ['name' => 'United Kingdom', 'code' => '+44', 'flag' => 'https://flagcdn.com/w40/gb.png'],
    ];

    $steps = [
        ['title' => 'Join', 'description' => 'Create your account and get access to your membership area.', 'tags' => ['Account access', 'Membership area', 'Next steps shown inside']],
        ['title' => 'Take your placement test', 'description' => 'Complete the online placement test so we can determine your level from A1 to C1.', 'tags' => ['Online test', 'Level result', 'Right group match']],
        ['title' => 'Choose your group', 'description' => 'Once your level is ready, choose up to 2 groups based on your level and schedule.', 'tags' => ['Level-based groups', 'Choose schedule', 'Up to 2 groups']],
        ['title' => 'Start practicing', 'description' => 'Join conversation rooms daily, attend your live group classes, and improve every week.', 'tags' => ['Daily conversation room', 'Live group classes', 'Weekly progress']],
    ];

    $faqs = [
        ['question' => 'Is this a private class?', 'answer' => 'No. This is an English Practice Membership. It includes conversation rooms, practice groups, materials, and community access. Private classes are separate.'],
        ['question' => 'Is this good for beginners?', 'answer' => 'Yes. Beginners can use the materials and join appropriate practice groups. Students should not worry about speaking perfectly.'],
        ['question' => 'Do teachers join the practice groups?', 'answer' => 'Yes. Practice groups are teacher-led, but they are not the same as private lessons. The focus is practice, topics, vocabulary, and confidence.'],
        ['question' => 'Can I upgrade later?', 'answer' => 'Yes. If you want a fixed teacher, private lessons, small-group classes, homework correction, or a structured plan, you can upgrade later.'],
        ['question' => 'Can I cancel anytime?', 'answer' => 'Yes. The membership is monthly and flexible.'],
        ['question' => 'Is the trial class really free?', 'answer' => 'Yes, at Boston English Center, the trial class is 100% free — with no obligation to continue afterward.'],
        ['question' => 'What happens after the trial?', 'answer' => 'Step-by-Step After the Trial:<br><br>You Receive Feedback<br><br>You’ll get a report from the teacher about your level, strengths, and areas to improve — plus a free level certificate.'],
        ['question' => 'Are the teachers native?', 'answer' => 'At Boston English Center, most of our teachers are highly qualified bilingual instructors who specialize in teaching English to Arabic-speaking students.'],
        ['question' => 'How do I schedule classes?', 'answer' => 'After payment, one of our advisors will contact you via WhatsApp or email to help you choose the best time and match you with the right group or teacher.'],
        ['question' => 'What age groups do you teach?', 'answer' => 'We teach pre-teens, young teens, and adults. Students are grouped by both age and level to ensure the best learning experience.'],
        ['question' => 'How do I know my English level?', 'answer' => 'You can take our free online placement test and receive a level certificate immediately. Your teacher can also evaluate your speaking during the trial class.'],
        ['question' => 'How long is the course?', 'answer' => 'Each English level is designed to be completed in 3 months. Most students attend 2–3 sessions per week, with each session lasting 1 hour.'],
        ['question' => 'Can I become fluent?', 'answer' => 'Yes. With consistent practice, structured lessons, and speaking sessions, many students reach strong fluency within 9–12 months.'],
    ];
@endphp
        <!DOCTYPE html>
<html lang="{{ $currentLang }}" dir="{{ $currentLang === 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Boston English Center</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    <script>
        window.tailwind = window.tailwind || {};
        window.tailwind.config = {
            darkMode: 'media',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Manrope', 'Plus Jakarta Sans', 'Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'Manrope', 'ui-sans-serif', 'system-ui', 'sans-serif'],
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
    <script defer src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    @vite(['resources/js/app.js'])
</head>

<body id="top" class="min-h-screen bg-[radial-gradient(circle_at_0_0,rgba(37,99,235,.10),transparent_30rem),radial-gradient(circle_at_100%_8rem,rgba(96,165,250,.14),transparent_28rem),linear-gradient(180deg,#f8fbff_0%,#eff6ff_45%,#ffffff_100%)] font-sans text-[#0f172a] antialiased selection:bg-[#2563eb] selection:text-white dark:bg-[radial-gradient(circle_at_0_0,rgba(59,130,246,.18),transparent_28rem),linear-gradient(180deg,#020617_0%,#0f172a_48%,#020617_100%)] dark:text-[#f8fafc]">
<header x-data="{ openMenu: false, langMenu: false }" class="sticky top-0 z-50 border-b border-[#dbeafe] bg-white/92 text-[#0f172a] shadow-[0_10px_30px_rgba(15,23,42,.06)] backdrop-blur-xl dark:border-white/10 dark:bg-[#061225]/95 dark:text-white dark:shadow-none">
    <nav class="mx-auto flex min-h-[66px] max-w-[1440px] items-center justify-between gap-3 px-4 sm:px-6 xl:px-8" aria-label="Main navigation">
        <a href="{{ route('landing', ['lang' => $currentLang]) }}" class="flex min-w-0 items-center">
            <img src="{{ $lightLogo }}" alt="Boston English Center" width="150" height="54" class="h-9 w-auto object-contain dark:hidden">
            <img src="{{ $darkLogo }}" alt="Boston English Center" width="150" height="54" class="hidden h-9 w-auto object-contain dark:block">
        </a>

        <div class="hidden items-center gap-1 lg:flex">
            <a href="{{ route('landing', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[13px] font-extrabold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-[#dbeafe] dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Home</a>
            <a href="{{ route('contactUs', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[13px] font-extrabold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-[#dbeafe] dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Free for Orphans</a>
            <a href="{{ route('booking.index', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[13px] font-extrabold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-[#dbeafe] dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Book Trial</a>
            <a href="{{ route('placementTest.index', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[13px] font-extrabold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-[#dbeafe] dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Placement Test</a>
            <a href="{{ route('team') }}" class="rounded-full px-3 py-2 text-[13px] font-extrabold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-[#dbeafe] dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Our Team</a>
            <a href="{{ route('login') }}" class="rounded-full px-3 py-2 text-[13px] font-extrabold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-[#dbeafe] dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Login</a>
        </div>

        <div class="flex items-center gap-2">
            <div class="relative hidden sm:block" @click.outside="langMenu = false">
                <button type="button" @click="langMenu = !langMenu" :aria-expanded="langMenu.toString()" aria-controls="language-menu" class="inline-flex h-10 items-center gap-2 rounded-full border border-[#dbeafe] bg-white px-3 text-xs font-extrabold text-[#1e3a8a] shadow-sm transition hover:bg-[#eff6ff] active:bg-[#dbeafe] dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 dark:active:bg-white/10">
                    <img width="24" height="18" src="{{ $currentLanguage['flag'] }}" loading="lazy" alt="{{ $currentLanguage['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]">
                    <span class="hidden sm:inline">{{ $currentLanguage['native'] }}</span>
                    <svg class="h-3.5 w-3.5 transition" :class="langMenu ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m6 9 6 6 6-6" /></svg>
                </button>
                <div id="language-menu" hidden x-show="langMenu" x-bind:hidden="!langMenu" x-transition class="absolute right-0 z-50 mt-3 w-56 overflow-hidden rounded-[22px] border border-[#bfdbfe] bg-[#f8fbff] p-2 shadow-soft dark:border-white/10 dark:bg-[#0f172a]">
                    @foreach($languages as $language)
                        <a href="{{ route($languageRoute, ['lang' => $language['code']]) }}" class="flex items-center gap-3 rounded-2xl px-3 py-2.5 text-sm font-extrabold text-[#1e293b] transition hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">
                            <img width="24" height="18" src="{{ $language['flag'] }}" loading="lazy" alt="{{ $language['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]"><span>{{ $language['native'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <a href="#membership-section" class="inline-flex h-10 items-center justify-center rounded-full bg-[#1d4ed8] px-4 text-xs font-black text-white shadow-[0_12px_24px_rgba(37,99,235,.22)] transition hover:-translate-y-0.5 hover:bg-[#1e40af] dark:bg-[#2563eb] dark:hover:bg-[#3b82f6] sm:px-5"><span class="sm:hidden">Start Membership</span><span class="hidden sm:inline">Start Membership</span></a>
            <button type="button" @click="openMenu = !openMenu" :aria-expanded="openMenu.toString()" aria-controls="mobile-navigation" aria-label="Toggle navigation menu" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#dbeafe] bg-white text-[#1e3a8a] shadow-sm transition hover:bg-[#eff6ff] active:bg-[#dbeafe] dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 dark:active:bg-white/10 lg:hidden">
                <svg x-show="!openMenu" x-bind:hidden="openMenu" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 7h16M4 12h16M4 17h16" /></svg>
                <svg hidden x-show="openMenu" x-bind:hidden="!openMenu" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18 18 6M6 6l12 12" /></svg>
            </button>
        </div>
    </nav>

    <div id="mobile-navigation" hidden x-show="openMenu" x-bind:hidden="!openMenu" x-transition class="border-t border-[#dbeafe] bg-white px-4 py-5 shadow-xl dark:border-slate-800 dark:bg-slate-950 lg:hidden">
        <div class="mx-auto grid max-w-[1440px] gap-3">
            <a href="{{ route('landing', ['lang' => $currentLang]) }}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-sm font-extrabold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Home</a>
            <a href="{{ route('contactUs', ['lang' => $currentLang]) }}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-sm font-extrabold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Free for Orphans</a>
            <a href="{{ route('booking.index', ['lang' => $currentLang]) }}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-sm font-extrabold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Book Trial</a>
            <a href="{{ route('placementTest.index', ['lang' => $currentLang]) }}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-sm font-extrabold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Placement Test</a>
            <a href="{{ route('team') }}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-sm font-extrabold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Our Team</a>
            <a href="{{ route('login') }}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-sm font-extrabold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Login</a>
            <a href="#membership-section" @click="openMenu = false" class="mt-2 inline-flex min-h-12 items-center justify-center rounded-full bg-[#1d4ed8] px-5 text-sm font-black text-white transition hover:bg-[#1e40af]">Start Membership</a>
        </div>
    </div>
</header>

<div x-data="{ langMenu: false }" class="fixed bottom-4 right-4 z-50 sm:hidden" @click.outside="langMenu = false">
    <button type="button" @click="langMenu = !langMenu" :aria-expanded="langMenu.toString()" aria-controls="floating-language-menu" class="flex h-12 items-center gap-2 rounded-full border border-blue-100 bg-white px-3 text-xs font-black text-[#0b2a5b] shadow-[0_16px_34px_rgba(15,23,42,.18)] transition active:scale-95 dark:border-white/10 dark:bg-[#0b1220] dark:text-white">
        <img width="24" height="18" src="{{ $currentLanguage['flag'] }}" loading="lazy" alt="{{ $currentLanguage['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]">
        <span>{{ $currentLanguage['short'] }}</span>
        <svg class="h-3.5 w-3.5 transition" :class="langMenu ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m6 9 6 6 6-6" /></svg>
    </button>
    <div id="floating-language-menu" hidden x-show="langMenu" x-bind:hidden="!langMenu" x-transition class="absolute bottom-14 right-0 w-52 overflow-hidden rounded-[22px] border border-blue-100 bg-white p-2 shadow-[0_20px_50px_rgba(15,23,42,.24)] dark:border-white/10 dark:bg-[#0b1220]">
        @foreach($languages as $language)
            <a href="{{ route($languageRoute, ['lang' => $language['code']]) }}" class="flex items-center gap-3 rounded-2xl px-3 py-2.5 text-sm font-extrabold text-[#0b2a5b] transition hover:bg-[#eff6ff] dark:text-white dark:hover:bg-white/10">
                <img width="24" height="18" src="{{ $language['flag'] }}" loading="lazy" alt="{{ $language['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]"><span>{{ $language['native'] }}</span>
            </a>
        @endforeach
    </div>
</div>

<main>
    <!-- HERO -->
    <section class="relative overflow-hidden bg-[#eaf3ff] px-4 py-10 dark:bg-[#071326] sm:px-6 lg:py-20">
        <div class="absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-white/60 to-transparent dark:from-white/5"></div>
        <div class="mx-auto grid max-w-[1440px] items-center gap-12 lg:grid-cols-[1fr_.9fr]">
            <div class="relative z-10 max-w-[680px]">

                <h1 class="font-display max-w-[680px] text-[2.35rem] font-black leading-[1.02] tracking-[-0.045em] text-[#061b3a] dark:text-white sm:text-6xl xl:text-7xl">Practice Speaking English <span class="text-[#1d4ed8] dark:text-[#93c5fd]">Every Day</span></h1>
                <p class="mt-5 max-w-[570px] text-[15px] font-bold leading-7 text-[#334155] dark:text-[#e2e8f0] sm:text-lg sm:leading-8">Join live conversation rooms, practice groups, and interactive English activities for only <strong class="text-[#0f172a] dark:text-white">$35/month.</strong></p>
                <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                    <a href="#membership-section" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#1d4ed8] px-7 text-sm font-black text-white shadow-[0_16px_34px_rgba(37,99,235,.26)] transition hover:-translate-y-0.5 hover:bg-[#1e40af] dark:hover:bg-[#2563eb]">Start Membership</a>
                    <a href="#platform-preview" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#bfdbfe] bg-white px-7 text-sm font-black text-[#1e3a8a] transition hover:-translate-y-0.5 hover:bg-[#eff6ff] dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15">Watch How It Works</a>
                </div>
                <p class="mt-5 flex flex-wrap items-center gap-2 text-sm font-semibold text-[#64748b] dark:text-[#cbd5e1]"><span class="text-[#f59e0b] tracking-[.12em]">★★★★★</span><span>Affordable English speaking practice with real humans every week.</span></p>
            </div>
            <div class="relative mx-auto w-full max-w-[560px] lg:mx-0 lg:ml-auto">
                <div class="absolute -left-5 -top-5 h-24 w-24 rounded-full bg-[#93c5fd]/50 blur-2xl"></div>
                <div class="relative rounded-[32px] border border-white/70 bg-white/55 p-3 shadow-soft backdrop-blur dark:border-white/10 dark:bg-white/10">
                    <img src="{{ materialAsset('landing-page/img/hero.webp') }}" alt="Students practicing English online" class="aspect-[4/3] w-full rounded-[24px] object-cover">
                    <div class="absolute -bottom-5 right-5 rounded-[22px] bg-[#1d4ed8] px-5 py-4 text-white shadow-[0_20px_38px_rgba(30,64,175,.22)]">
                        <strong class="block text-3xl font-black leading-none">500+</strong>
                        <span class="mt-1 block max-w-[150px] text-xs font-extrabold leading-4 text-white/85">Students practicing English online every week</span>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="bg-[#f8fbff] px-4 py-12 dark:bg-[#020617] sm:px-6 lg:py-20">
        <div class="mx-auto max-w-[1180px]">
            <div class="max-w-[760px]">
                <h2 class="font-display text-[2rem] font-black leading-[1.05] tracking-[-0.04em] text-[#061b3a] dark:text-white sm:text-5xl">Everything You Need To Practice English</h2>
                <p class="mt-3 max-w-xl text-[15px] font-bold leading-7 text-[#475569] dark:text-[#cbd5e1]">Built to help you speak English consistently.</p>
            </div>

            <div class="mt-8 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($features as $feature)
                    <article class="flex items-start gap-4 rounded-[24px] border border-slate-200 bg-white p-4 shadow-[0_10px_26px_rgba(15,23,42,.055)] transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-[0_16px_34px_rgba(15,23,42,.08)] dark:border-white/10 dark:bg-white/[.055] dark:shadow-none">
                        <span class="mt-1 grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-[#ecfdf5] text-sm font-black text-[#059669] dark:bg-emerald-400/10 dark:text-emerald-300">✓</span>
                        <div>
                            <h3 class="text-base font-black leading-tight tracking-[-0.02em] text-[#061b3a] dark:text-white">{{ $feature['title'] }}</h3>
                            <p class="mt-1.5 text-sm font-bold leading-6 text-[#64748b] dark:text-[#cbd5e1]">{{ $feature['description'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- STUDENTS -->
    <section class="bg-[#eef6ff] px-4 py-12 text-[#0f172a] dark:bg-[#071326] dark:text-white sm:px-6 lg:py-20">
        <div class="mx-auto max-w-[1180px]">
            <div class="max-w-[760px]">
                <h2 class="font-display text-[2rem] font-black leading-[1.05] tracking-[-0.04em] text-[#061b3a] dark:text-white sm:text-5xl">Real Students. Real Progress.</h2>
                <p class="mt-3 max-w-2xl text-[15px] font-bold leading-7 text-[#475569] dark:text-[#cbd5e1]">Watch real Boston English Center students practicing consistently and building confidence over time.</p>
            </div>

            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($students as $student)
                    <article data-video-card class="relative mx-auto aspect-[9/16] w-full max-w-[360px] overflow-hidden rounded-[28px] bg-[#111827] shadow-[0_22px_46px_rgba(15,23,42,.22)] dark:shadow-[0_22px_46px_rgba(0,0,0,.35)]">
                        <video class="absolute inset-0 h-full w-full object-cover" playsinline preload="none" poster="{{ $student['thumbnail'] }}" data-hls-src="https://material-media.s3.us-east-1.amazonaws.com/landing-page/videos/{{ $student['path'] }}"></video>
                        <div class="absolute inset-0 bg-gradient-to-b from-black/15 via-transparent to-black/85"></div>
                        <div data-video-overlay class="absolute inset-0 transition duration-300">
                            <button type="button" data-play-video aria-label="Play {{ $student['name'] }} video" class="absolute left-1/2 top-1/2 grid h-14 w-14 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full border border-white/40 bg-white/35 text-white shadow-lg backdrop-blur-md transition hover:scale-105 hover:bg-white/50">
                                <svg class="ml-0.5 h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                            </button>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 p-5">
                            <h3 class="text-xl font-black tracking-[-0.03em] text-white">{{ $student['name'] }}</h3>
                            <p class="mt-1 text-xs font-bold text-white/75">{{ $student['duration'] }}</p>
                            <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-white/16 px-3 py-2 text-xs font-black text-white backdrop-blur-md">
                                <img src="{{ $student['flag'] }}" alt="{{ $student['country'] }} flag" loading="lazy" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]"><span>{{ $student['city'] }}, {{ $student['country'] }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- REVIEWS -->
    <section class="bg-[#eff6ff] px-4 py-14 dark:bg-[#020617] sm:px-6 lg:py-20">
        <div class="mx-auto max-w-[1440px]">
            <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
                <div>
                    <h2 class="font-display tracking-[-0.045em] text-3xl font-black leading-tight text-[#0b2a5b] dark:text-white sm:text-5xl">Trusted by Thousands of Learners Worldwide</h2>
                    <p class="mt-4 max-w-2xl text-sm font-bold leading-7 text-[#475569] dark:text-[#cbd5e1]">Reviews rated <strong class="text-[#1d4ed8] dark:text-[#93c5fd]">4.9/5</strong> by over <strong class="text-[#0f172a] dark:text-white">3,876 learners</strong> across the US, Canada, and the Gulf.</p>
                </div>
                <div class="rounded-[28px] border border-[#bfdbfe] bg-white p-5 text-center shadow-card dark:border-white/10 dark:bg-white/5">
                    <div class="text-6xl font-black tracking-[-.09em] text-[#0f172a] dark:text-white">4.9</div>
                    <div class="mt-3 flex justify-center gap-1">
                        @for($i = 0; $i < 5; $i++)<span class="grid h-6 w-6 place-items-center rounded-md bg-[#00b67a] text-xs text-white">★</span>@endfor
                    </div>
                    <p class="mt-2 text-xs font-bold text-[#64748b] dark:text-[#cbd5e1]">Based on student reviews</p>
                </div>
            </div>
            <div class="mt-8 grid gap-4 lg:grid-cols-3">
                @foreach($reviews as $review)
                    <article class="rounded-[28px] border border-[#bfdbfe] bg-white p-5 shadow-card transition hover:-translate-y-1 hover:border-[#93c5fd] hover:shadow-soft dark:border-white/10 dark:bg-white/[.06]">
                        <div class="flex items-center gap-3">
                            <img src="{{ $review['avatar'] }}" alt="{{ $review['name'] }}" loading="lazy" class="h-12 w-12 rounded-full object-cover ring-4 ring-[#eaf3ff] dark:ring-white/10">
                            <div>
                                <strong class="block text-base font-black text-[#0f172a] dark:text-white">{{ $review['name'] }}</strong>
                                <span class="text-xs font-bold text-[#64748b] dark:text-[#cbd5e1]">{{ $review['location'] }}</span>
                            </div>
                        </div>
                        <p class="mt-5 text-sm font-bold leading-7 text-[#334155] dark:text-[#e2e8f0]">{!! $review['quote'] !!}</p>
                    </article>
                @endforeach
            </div>
            <div class="mt-7 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="flex w-full flex-nowrap justify-center gap-1 sm:w-auto sm:flex-wrap sm:justify-start sm:gap-2">
                    @foreach($countries as $country)
                        <span class="whitespace-nowrap rounded-full border border-blue-200 bg-blue-50/90 px-2 py-1.5 text-[8px] font-black uppercase tracking-[.04em] text-[#0b2a5b] shadow-sm shadow-blue-950/5 dark:border-blue-400/20 dark:bg-blue-400/10 dark:text-blue-100 min-[380px]:px-2.5 min-[380px]:text-[9px] sm:px-3.5 sm:py-2 sm:text-[11px] sm:tracking-[.12em]">{{ $country }}</span>
                    @endforeach
                </div>
                <a href="{{ route('home.reviews', ['lang' => $currentLang]) }}" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#1d4ed8] px-7 text-sm font-black text-white shadow-[0_16px_30px_rgba(59,130,246,.22)] transition hover:-translate-y-0.5 hover:bg-[#1e40af] dark:hover:bg-[#2563eb]">Browse all reviews</a>
            </div>
        </div>
    </section>

    <!-- STEPS -->
    <section id="how-it-works" class="relative overflow-hidden bg-[#071326] px-4 py-12 text-white sm:px-6 lg:py-20">
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-blue-300/40 to-transparent"></div>
        <div class="mx-auto max-w-[1180px]">
            <div class="max-w-[760px]"> 
                
                <h2 class="font-display mt-5 text-[2rem] font-black leading-[1.05] tracking-[-0.04em] text-white sm:text-5xl">Clear steps before you start.</h2>
                <p class="mt-3 max-w-2xl text-[15px] font-bold leading-7 text-blue-100/80">Know exactly what happens after joining — no confusion, no waiting, and no need to contact support to understand the next step.</p>
            </div>

            <div class="mt-9 grid gap-4 lg:grid-cols-4"> 
                @foreach($steps as $index => $step)
                    <article class="relative rounded-[28px] border border-white/10 bg-white/[.07] p-5 shadow-[0_20px_50px_rgba(0,0,0,.20)] backdrop-blur-sm transition hover:-translate-y-1 hover:bg-white/[.09]">
                        <div class="flex items-center gap-4">
                            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-white text-lg font-black text-[#061b3a]">{{ $index + 1 }}</div>
                            <div>
                                <span class="text-[10px] font-black uppercase tracking-[.16em] text-blue-200">Step {{ $index + 1 }}</span>
                                <h3 class="mt-1 text-xl font-black leading-tight tracking-[-0.03em] text-white">{{ $step['title'] }}</h3>
                            </div>
                        </div>
                        <p class="mt-4 text-sm font-bold leading-7 text-blue-100/80">{{ $step['description'] }}</p>
                        <div class="mt-5 flex flex-wrap gap-2">
                            @foreach($step['tags'] as $tag)
                                <span class="rounded-full border border-white/10 bg-white/10 px-3 py-1.5 text-[11px] font-extrabold text-blue-50">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PLATFORM PREVIEW -->
    <section id="platform-preview" class="bg-[#eaf3ff] px-4 py-12 text-[#0f172a] dark:bg-[#0f172a] dark:text-white sm:px-6 lg:py-20">
        <div class="mx-auto max-w-[1080px] text-center">
            <h2 class="font-display text-[2rem] font-black leading-[1.05] tracking-[-0.04em] text-[#061b3a] dark:text-white sm:text-5xl">See Inside The Platform</h2>
            <p class="mx-auto mt-3 max-w-2xl text-[15px] font-bold leading-7 text-[#475569] dark:text-[#cbd5e1]">Watch how students practice English online.</p>
            <div class="mx-auto mt-8 max-w-[620px] rounded-[26px] border border-blue-200 bg-white p-1.5 shadow-[0_18px_45px_rgba(15,23,42,.09)] dark:border-white/10 dark:bg-white/[.06] dark:shadow-none">
                <div class="relative aspect-square overflow-hidden rounded-[20px] bg-slate-950">
                    <img src="{{ materialAsset('landing-page/img/platform-preview.webp') }}" alt="Boston English Center platform video thumbnail" loading="lazy" class="absolute inset-0 h-full w-full object-cover opacity-90">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/25 to-transparent"></div>
                    <button class="absolute left-1/2 top-1/2 grid h-16 w-16 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full bg-blue-600 text-white shadow-[0_0_50px_rgba(37,99,235,.45)] transition hover:scale-105 hover:bg-blue-700" aria-label="Play platform video">
                        <svg class="ml-1 h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- MEMBERSHIP -->
    <section id="membership-section" class="bg-[#f8fbff] px-4 py-12 dark:bg-[#020617] sm:px-6 lg:py-20">
        <div class="mx-auto max-w-[900px]">
            <div class="rounded-[34px] bg-gradient-to-br from-[#061b3a] via-[#1e3a8a] to-[#2563eb] p-5 text-white shadow-[0_26px_70px_rgba(30,64,175,.26)] sm:p-8 lg:p-10">
                <div class="grid gap-8 lg:grid-cols-[.9fr_1fr] lg:items-center">
                    <div>
                        <div class="mb-5 inline-flex rounded-full bg-white px-4 py-2 text-xs font-black uppercase tracking-[.14em] text-[#1d4ed8]">Most Popular</div>
                        <h2 class="font-display text-[2.15rem] font-black leading-[1.02] tracking-[-0.045em] sm:text-5xl">Don’t Study English Alone</h2>
                        <div class="mt-6 flex items-end gap-2">
                            <strong class="text-6xl font-black tracking-[-.08em] sm:text-7xl">$35</strong><span class="pb-2 text-lg font-black">/ month</span>
                        </div>
                        <div class="mt-7 grid gap-3 text-sm font-black sm:text-base">
                            <div class="flex items-center gap-3"><span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-white text-[#1d4ed8]">✓</span>Join live English practice groups</div>
                            <div class="flex items-center gap-3"><span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-white text-[#1d4ed8]">✓</span>Practice online every week</div>
                            <div class="flex items-center gap-3"><span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-white text-[#1d4ed8]">✓</span>No long-term contract</div>
                        </div>
                    </div>

                    <div class="rounded-[28px] bg-white p-5 text-[#0f172a] shadow-[0_18px_45px_rgba(15,23,42,.16)] dark:bg-[#0b1220] dark:text-white sm:p-6">
                        <form method="GET" action="{{ route('booking.index', ['lang' => $currentLang]) }}" x-data="{ phoneOpen: false, selectedFlag: '{{ $phoneCountries[0]['flag'] }}', selectedCode: '{{ $phoneCountries[0]['code'] }}', selectedCountry: '{{ $phoneCountries[0]['name'] }}' }" @click.outside="phoneOpen = false" class="grid gap-4">
                            <div>
                                <label for="membership-name" class="mb-2 block text-sm font-black">Full Name</label>
                                <input id="membership-name" name="full_name" type="text" required autocomplete="name" placeholder="Enter your full name" class="h-14 w-full rounded-2xl border border-[#bfdbfe] bg-[#f8fbff] px-4 text-sm font-bold text-[#0f172a] outline-none transition placeholder:text-[#94a3b8] focus:border-[#1d4ed8] focus:ring-4 focus:ring-[#1d4ed8]/10 dark:border-white/10 dark:bg-white/10 dark:text-white dark:placeholder:text-slate-400">
                            </div>

                            <div>
                                <label for="membership-phone" class="mb-2 block text-sm font-black">Phone Number</label>
                                <div class="relative">
                                    <div class="flex min-h-14 items-center overflow-hidden rounded-2xl border border-[#bfdbfe] bg-[#f8fbff] transition focus-within:border-[#1d4ed8] focus-within:ring-4 focus-within:ring-[#1d4ed8]/10 dark:border-white/10 dark:bg-white/10">
                                        <button type="button" @click="phoneOpen = !phoneOpen" :aria-expanded="phoneOpen.toString()" aria-controls="phone-code-menu" class="flex h-14 shrink-0 items-center gap-2 border-r border-[#bfdbfe] px-3 text-sm font-black text-[#0f172a] transition hover:bg-[#eaf3ff] dark:border-white/10 dark:text-white dark:hover:bg-white/10 sm:px-4">
                                            <img :src="selectedFlag" alt="Selected country flag" class="h-[18px] w-7 rounded bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.12)]">
                                            <span x-text="selectedCode"></span>
                                            <svg class="h-4 w-4 transition" :class="phoneOpen ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m6 9 6 6 6-6" /></svg>
                                        </button>
                                        <input id="membership-phone" name="phone" type="tel" required inputmode="tel" autocomplete="tel" placeholder="612345678" class="h-14 min-w-0 flex-1 bg-transparent px-4 text-sm font-bold text-[#0f172a] outline-none placeholder:text-[#94a3b8] dark:text-white dark:placeholder:text-slate-400">
                                    </div>

                                    <input type="hidden" name="country_code" :value="selectedCode">
                                    <input type="hidden" name="country_name" :value="selectedCountry">

                                    <div id="phone-code-menu" hidden x-show="phoneOpen" x-bind:hidden="!phoneOpen" x-transition class="absolute left-0 right-0 z-50 mt-3 max-h-64 overflow-y-auto rounded-[24px] border border-[#bfdbfe] bg-white p-2 shadow-soft dark:border-white/10 dark:bg-[#0f172a] sm:max-h-72">
                                        @foreach($phoneCountries as $country)
                                            <button type="button" @click="selectedFlag = '{{ $country['flag'] }}'; selectedCode = '{{ $country['code'] }}'; selectedCountry = '{{ $country['name'] }}'; phoneOpen = false" class="flex w-full items-center gap-3 rounded-2xl px-3 py-3 text-left text-sm font-extrabold text-[#334155] transition hover:bg-[#eaf3ff] dark:text-white dark:hover:bg-white/10">
                                                <img src="{{ $country['flag'] }}" alt="{{ $country['name'] }} flag" loading="lazy" class="h-[18px] w-7 rounded bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.12)]">
                                                <span class="min-w-0 flex-1 truncate">{{ $country['name'] }}</span>
                                                <span class="text-[#64748b] dark:text-[#cbd5e1]">{{ $country['code'] }}</span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="mt-1 h-14 w-full rounded-full bg-[#1d4ed8] text-sm font-black text-white shadow-[0_12px_28px_rgba(37,99,235,.24)] transition hover:-translate-y-0.5 hover:bg-[#1e40af] dark:bg-[#2563eb] dark:hover:bg-[#3b82f6]">Start Membership for $35</button>
                            <p class="text-center text-sm font-bold leading-6 text-[#64748b] dark:text-[#cbd5e1]">No long-term contract. Start with your placement test.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="bg-[#eaf3ff] px-4 py-12 dark:bg-[#071326] sm:px-6 lg:py-20" id="faq">
        <div class="mx-auto grid max-w-[1280px] gap-8 lg:grid-cols-[.72fr_1fr] lg:items-start">
            <div class="lg:sticky lg:top-28">
                <span class="inline-flex rounded-full bg-white px-4 py-2 text-xs font-black uppercase tracking-[.16em] text-[#1d4ed8] shadow-sm dark:bg-white/10 dark:text-[#93c5fd]">FAQ</span>
                <h2 class="font-display mt-5 text-[2rem] font-black leading-[1.05] tracking-[-0.04em] text-[#061b3a] dark:text-white sm:text-5xl">Questions before joining?</h2>
            </div>
            <div class="grid gap-3">
                @foreach($faqs as $index => $faq)
                    <details data-faq-details class="group rounded-[22px] border border-[#bfdbfe] bg-white px-5 py-4 shadow-card transition open:border-[#93c5fd] open:bg-[#eff6ff] open:shadow-[0_16px_36px_rgba(37,99,235,.10)] dark:border-white/10 dark:bg-white/[.06] dark:open:border-[#93c5fd]/40 dark:open:bg-[#1d4ed8]/10 dark:open:shadow-none" @if($index === 0) open @endif>
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 text-left text-sm font-black text-[#0f172a] transition dark:text-white sm:text-base">
                            <span>{{ $faq['question'] }}</span>
                            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-[#eaf3ff] text-lg leading-none text-[#1d4ed8] transition group-open:rotate-45 group-open:bg-[#1d4ed8] group-open:text-white dark:bg-white/10 dark:text-[#bfdbfe] dark:group-open:bg-[#3b82f6] dark:group-open:text-white">+</span>
                        </summary>
                        <p class="mt-4 border-t border-[#bfdbfe] pt-4 text-sm font-bold leading-7 text-[#475569] dark:border-white/10 dark:text-[#e2e8f0]">{!! $faq['answer'] !!}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>
</main>

<footer class="border-t border-slate-200 bg-white px-4 py-6 text-center dark:border-white/10 dark:bg-slate-950">
    <div class="mx-auto max-w-[1440px]">
        <p class="text-sm font-black text-[#0b2a5b] dark:text-white">© Boston English Center</p>
        <p class="mt-1 text-xs font-bold text-[#64748b] dark:text-[#cbd5e1]">English Practice Membership • $35/month • Cancel anytime</p>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-carousel]').forEach((carousel) => {
            const track = carousel.querySelector('[data-carousel-track]');
            if (!track) return;
            const scrollNext = () => {
                const card = track.querySelector(':scope > *');
                const gap = parseFloat(getComputedStyle(track).columnGap || getComputedStyle(track).gap || 16);
                const amount = card ? card.getBoundingClientRect().width + gap : track.clientWidth * .8;
                track.scrollBy({ left: amount, behavior: 'smooth' });
            };
            const scrollPrev = () => {
                const card = track.querySelector(':scope > *');
                const gap = parseFloat(getComputedStyle(track).columnGap || getComputedStyle(track).gap || 16);
                const amount = card ? card.getBoundingClientRect().width + gap : track.clientWidth * .8;
                track.scrollBy({ left: -amount, behavior: 'smooth' });
            };
            carousel.querySelectorAll('[data-carousel-next]').forEach((btn) => btn.addEventListener('click', scrollNext));
            carousel.querySelectorAll('[data-carousel-prev]').forEach((btn) => btn.addEventListener('click', scrollPrev));
        });

        document.querySelectorAll('[data-faq-details]').forEach((details) => {
            details.addEventListener('toggle', () => {
                if (!details.open) return;
                document.querySelectorAll('[data-faq-details]').forEach((other) => {
                    if (other !== details) other.open = false;
                });
            });
        });

        const cards = Array.from(document.querySelectorAll('[data-video-card]'));
        const setVideoOverlay = (card, hidden) => {
            const overlay = card.querySelector('[data-video-overlay]');
            if (!overlay) return;
            overlay.classList.toggle('opacity-0', hidden);
            overlay.classList.toggle('pointer-events-none', hidden);
        };
        const pauseOtherVideos = (activeVideo) => {
            cards.forEach((card) => {
                const video = card.querySelector('video');
                if (video && video !== activeVideo) {
                    video.pause();
                    video.controls = false;
                    setVideoOverlay(card, false);
                }
            });
        };
        const prepareVideo = (video) => {
            if (video.dataset.ready === 'true') return;
            const source = video.dataset.hlsSrc;
            if (!source) return;
            if (video.canPlayType('application/vnd.apple.mpegurl')) {
                video.src = source;
            } else if (window.Hls && window.Hls.isSupported()) {
                const hls = new Hls({ maxBufferLength: 18, capLevelToPlayerSize: true, autoStartLoad: false });
                hls.loadSource(source); hls.attachMedia(video); video._hls = hls;
            } else { video.src = source; }
            video.dataset.ready = 'true';
        };
        cards.forEach((card) => {
            const video = card.querySelector('video');
            const button = card.querySelector('[data-play-video]');
            if (!video || !button) return;
            button.addEventListener('click', async (event) => {
                event.preventDefault(); event.stopPropagation(); prepareVideo(video); pauseOtherVideos(video);
                try { if (video._hls) video._hls.startLoad(); video.controls = true; await video.play(); setVideoOverlay(card, true); }
                catch (error) { setVideoOverlay(card, false); video.controls = false; }
            });
            video.addEventListener('click', () => { if (!video.paused) video.pause(); });
            video.addEventListener('play', () => { pauseOtherVideos(video); setVideoOverlay(card, true); });
            video.addEventListener('pause', () => { setVideoOverlay(card, false); video.controls = false; });
        });
    });
</script>
</body>
</html>
