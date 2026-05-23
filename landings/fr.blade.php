@php
    \Illuminate\Support\Facades\App::setLocale('en');

    $currentLang = request()->route('lang') ?? 'en';
    $languageRoute = \Illuminate\Support\Facades\Route::currentRouteName() ?: 'landing';

    $languages = [
        ['code' => 'en', 'short' => 'EN', 'name' => 'English', 'native' => 'English', 'flag' => 'img/language/us.svg'],
        ['code' => 'ar', 'short' => 'AR', 'name' => 'Arabic', 'native' => 'العربية', 'flag' => 'img/language/ma.svg'],
        ['code' => 'fr', 'short' => 'FR', 'name' => 'French', 'native' => 'Français', 'flag' => 'img/language/fr.svg'],
        ['code' => 'es', 'short' => 'ES', 'name' => 'Spanish', 'native' => 'Español', 'flag' => 'img/language/es.svg'],
        ['code' => 'pt', 'short' => 'PT', 'name' => 'Portuguese', 'native' => 'Português', 'flag' => 'img/language/pt.svg'],
        ['code' => 'tr', 'short' => 'TR', 'name' => 'Turkish', 'native' => 'Türkçe', 'flag' => 'img/language/tr.svg'],
        ['code' => 'zh', 'short' => 'ZH', 'name' => 'Chinese', 'native' => '简体中文', 'flag' => 'img/language/zh.svg'],
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
        ['path' => '1-encrypted/1.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/3.webp'), 'name' => 'Nada', 'duration' => 'Student for 9 months', 'city' => 'New Jersey', 'country' => 'USA', 'flag' => '🇺🇸'],
        ['path' => '2-encrypted/2.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/2.webp'), 'name' => 'Sara', 'duration' => 'Practicing for 1 year', 'city' => 'Toronto', 'country' => 'Canada', 'flag' => '🇨🇦'],
        ['path' => '3-encrypted/3.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/4.webp'), 'name' => 'Mohamed', 'duration' => 'Student for 6 months', 'city' => 'Texas', 'country' => 'USA', 'flag' => '🇺🇸'],
        ['path' => '4-encrypted/4.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/1.webp'), 'name' => 'Abir', 'duration' => 'Practicing for 4 months', 'city' => 'New York', 'country' => 'USA', 'flag' => '🇺🇸'],
    ];

    $reviews = [
        [
            'name' => 'Ahmed',
            'location' => 'New Jersey, USA',
            'avatar' => materialAsset('landing-page/img/review-ahmed.webp'),
            'quote' => '“The <strong class="text-[#a8562c] dark:text-[#ffbd8f]">live conversation rooms</strong> helped me finally start speaking English <strong class="text-[#211411] dark:text-white">confidently</strong>.”'
        ],
        [
            'name' => 'Sara',
            'location' => 'Toronto, Canada',
            'avatar' => materialAsset('landing-page/img/review-sara.webp'),
            'quote' => '“I practice English <strong class="text-[#a8562c] dark:text-[#ffbd8f]">almost every day</strong> now and feel much more comfortable <strong class="text-[#211411] dark:text-white">speaking</strong>.”'
        ],
        [
            'name' => 'Mohamed',
            'location' => 'Texas, USA',
            'avatar' => materialAsset('landing-page/img/review-mohamed.webp'),
            'quote' => '“The teachers understand our needs very well and help us <strong class="text-[#a8562c] dark:text-[#ffbd8f]">improve consistently</strong>.”'
        ],
    ];

    $countries = ['United States', 'Canada', 'Saudi Arabia', 'UAE'];

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
<html lang="{{ $currentLang }}" dir="{{ $currentLang === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Boston English Center</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    <script>
        (() => {
            const savedTheme = localStorage.getItem('bec-theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.documentElement.classList.toggle('dark', savedTheme === 'dark' || (!savedTheme && prefersDark));
        })();
    </script>

    <script>
        window.tailwind = window.tailwind || {};
        window.tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Manrope', 'Plus Jakarta Sans', 'Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'Manrope', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        cream: '#fff7f0',
                        creamSoft: '#fffaf6',
                        clay: '#b35d31',
                        clayDark: '#7b351c',
                        cocoa: '#301b16',
                        ink: '#1c1715',
                    },
                    boxShadow: {
                        soft: '0 18px 55px rgba(62, 34, 24, .12)',
                        card: '0 14px 34px rgba(62, 34, 24, .10)',
                    },
                }
            }
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    @vite(['resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Manrope', 'Plus Jakarta Sans', Inter, system-ui, sans-serif; }
        ::selection { background:#b35d31; color:#fff; }
        .page-bg {
            background:
                    radial-gradient(circle at 0 0, rgba(179,93,49,.12), transparent 30rem),
                    radial-gradient(circle at 100% 8rem, rgba(255,195,117,.18), transparent 28rem),
                    linear-gradient(180deg, #fffaf6 0%, #fff6ee 42%, #fffaf6 100%);
        }
        .dark .page-bg {
            background:
                    radial-gradient(circle at 0 0, rgba(179,93,49,.20), transparent 28rem),
                    radial-gradient(circle at 100% 8rem, rgba(255,195,117,.10), transparent 24rem),
                    #100908;
        }
        .edu-title { font-family:'Plus Jakarta Sans','Manrope',system-ui,sans-serif; letter-spacing:-.06em; }
        .display-title { font-family:'Plus Jakarta Sans','Manrope',system-ui,sans-serif; letter-spacing:-.075em; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        .card-gradient::after {
            content:""; position:absolute; inset:auto 0 0 0; height:58%;
            background:linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(32,16,11,.65) 46%, rgba(32,16,11,.92) 100%);
        }
        details[open] { border-color:#b35d31; background:#fff2e9; box-shadow:0 18px 45px rgba(179,93,49,.12); }
        details[open] summary span:first-child { color:#9b4824; }
        details[open] .faq-icon { background:#b35d31; color:white; transform:rotate(45deg); }
        .dark details[open] { border-color:#ffbd8f; background:rgba(179,93,49,.16); box-shadow:none; }
        .dark details[open] summary span:first-child { color:#ffbd8f; }
        [data-video-card].video-playing [data-video-overlay] { opacity:0; pointer-events:none; }
        .pay-icon { display:inline-flex; align-items:center; justify-content:center; height:24px; min-width:36px; border-radius:8px; background:#fff; border:1px solid #eee; padding:0 7px; box-shadow:0 5px 14px rgba(0,0,0,.045); }
        .pay-icon svg { display:block; height:14px; width:auto; }
        .theme-sun { display:none; }
        .dark .theme-sun { display:block; }
        .dark .theme-moon { display:none; }
        .top-link-tab { clip-path: polygon(10px 0, calc(100% - 10px) 0, 100% 100%, 0 100%); }
        @media (min-width:1024px) {
            .snap-desktop { scroll-snap-type:x mandatory; }
        }
    </style>
</head>

<body id="top" class="page-bg text-[#1c1715] antialiased dark:text-[#fff7ef]">
<header x-data="{ openMenu: false, langMenu: false }" class="sticky top-0 z-50 border-b border-[#edd8c9]/80 bg-[#fffaf6]/90 text-[#291712] shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-[#100908]/92 dark:text-white">
    <nav class="mx-auto flex min-h-[66px] max-w-[1440px] items-center justify-between gap-3 px-4 sm:px-6 xl:px-8" aria-label="Main navigation">
        <a href="{{ route('landing', ['lang' => $currentLang]) }}" class="flex min-w-0 items-center">
            <img src="{{ $lightLogo }}" alt="Boston English Center" width="150" height="54" class="h-9 w-auto object-contain dark:hidden">
            <img src="{{ $darkLogo }}" alt="Boston English Center" width="150" height="54" class="hidden h-9 w-auto object-contain dark:block">
        </a>

        <div class="hidden items-center gap-1 lg:flex">
            <a href="{{ route('landing', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[13px] font-extrabold text-[#5c3729] transition hover:bg-[#f3ddcd] focus:bg-[#f3ddcd] active:bg-[#f3ddcd] dark:text-[#f7ded0] dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Home</a>
            <a href="{{ route('contactUs', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[13px] font-extrabold text-[#5c3729] transition hover:bg-[#f3ddcd] focus:bg-[#f3ddcd] active:bg-[#f3ddcd] dark:text-[#f7ded0] dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Free for Orphans</a>
            <a href="{{ route('booking.index', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[13px] font-extrabold text-[#5c3729] transition hover:bg-[#f3ddcd] focus:bg-[#f3ddcd] active:bg-[#f3ddcd] dark:text-[#f7ded0] dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Book Trial</a>
            <a href="{{ route('placementTest.index', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[13px] font-extrabold text-[#5c3729] transition hover:bg-[#f3ddcd] focus:bg-[#f3ddcd] active:bg-[#f3ddcd] dark:text-[#f7ded0] dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Placement Test</a>
            <a href="{{ route('team') }}" class="rounded-full px-3 py-2 text-[13px] font-extrabold text-[#5c3729] transition hover:bg-[#f3ddcd] focus:bg-[#f3ddcd] active:bg-[#f3ddcd] dark:text-[#f7ded0] dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Our Team</a>
            <a href="{{ route('login') }}" class="rounded-full px-3 py-2 text-[13px] font-extrabold text-[#5c3729] transition hover:bg-[#f3ddcd] focus:bg-[#f3ddcd] active:bg-[#f3ddcd] dark:text-[#f7ded0] dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Login</a>
        </div>

        <div class="flex items-center gap-2">
            <button type="button" data-theme-toggle aria-label="Switch color theme" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#e5c6b3] bg-white text-[#5c3729] shadow-sm transition hover:bg-[#f7e7db] active:bg-[#f3ddcd] dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 dark:active:bg-white/10">
                <svg class="theme-moon h-[18px] w-[18px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z" /></svg>
                <svg class="theme-sun h-[18px] w-[18px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4V2m0 20v-2m8-8h2M2 12h2m14.95 6.95 1.42 1.42M3.64 3.64l1.41 1.41m0 13.9-1.41 1.42M20.36 3.64l-1.41 1.41M12 16a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" /></svg>
            </button>
            <div class="relative" @click.outside="langMenu = false">
                <button type="button" @click="langMenu = !langMenu" :aria-expanded="langMenu.toString()" aria-controls="language-menu" class="inline-flex h-10 items-center gap-2 rounded-full border border-[#e5c6b3] bg-white px-3 text-xs font-extrabold text-[#5c3729] shadow-sm transition hover:bg-[#f7e7db] active:bg-[#f3ddcd] dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 dark:active:bg-white/10">
                    <img width="18" height="18" src="{{ asset($currentLanguage['flag']) }}" loading="lazy" alt="{{ $currentLanguage['name'] }}" class="rounded-sm">
                    <span class="hidden sm:inline">{{ $currentLanguage['native'] }}</span><span class="sm:hidden">{{ $currentLanguage['short'] }}</span>
                    <svg class="h-3.5 w-3.5 transition" :class="langMenu ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m6 9 6 6 6-6" /></svg>
                </button>
                <div id="language-menu" x-cloak x-show="langMenu" x-transition class="absolute right-0 z-50 mt-3 w-56 overflow-hidden rounded-[22px] border border-[#ead7c8] bg-[#fffaf7] p-2 shadow-soft dark:border-white/10 dark:bg-[#1d1210]">
                    @foreach($languages as $language)
                        <a href="{{ route($languageRoute, ['lang' => $language['code']]) }}" class="flex items-center gap-3 rounded-2xl px-3 py-2.5 text-sm font-extrabold text-[#54352d] transition hover:bg-[#f6e6dc] active:bg-[#f6e6dc] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">
                            <img width="22" height="22" src="{{ asset($language['flag']) }}" loading="lazy" alt="{{ $language['name'] }}" class="rounded-sm"><span>{{ $language['native'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <a href="#membership-section" class="hidden h-10 items-center justify-center rounded-full bg-[#b35d31] px-5 text-xs font-black text-white shadow-[0_12px_24px_rgba(179,93,49,.22)] transition hover:-translate-y-0.5 hover:bg-[#8f4725] dark:hover:bg-[#cf7340] sm:inline-flex">Start membership</a>
            <button type="button" @click="openMenu = !openMenu" :aria-expanded="openMenu.toString()" aria-controls="mobile-navigation" aria-label="Toggle navigation menu" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#e5c6b3] bg-white text-[#5c3729] shadow-sm transition hover:bg-[#f7e7db] active:bg-[#f3ddcd] dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 dark:active:bg-white/10 lg:hidden">
                <svg x-show="!openMenu" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 7h16M4 12h16M4 17h16" /></svg>
                <svg x-show="openMenu" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18 18 6M6 6l12 12" /></svg>
            </button>
        </div>
    </nav>

    <div id="mobile-navigation" x-show="openMenu" x-cloak x-transition class="border-t border-[#ead7c8] bg-[#fffaf6] px-4 py-5 shadow-xl dark:border-white/10 dark:bg-[#100908] lg:hidden">
        <div class="mx-auto grid max-w-[1440px] gap-3">
            <a href="{{ route('landing', ['lang' => $currentLang]) }}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-sm font-extrabold text-[#54352d] hover:bg-[#f6e6dc] active:bg-[#f6e6dc] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Home</a>
            <a href="{{ route('contactUs', ['lang' => $currentLang]) }}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-sm font-extrabold text-[#54352d] hover:bg-[#f6e6dc] active:bg-[#f6e6dc] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Free for Orphans</a>
            <a href="{{ route('booking.index', ['lang' => $currentLang]) }}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-sm font-extrabold text-[#54352d] hover:bg-[#f6e6dc] active:bg-[#f6e6dc] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Book Trial</a>
            <a href="{{ route('placementTest.index', ['lang' => $currentLang]) }}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-sm font-extrabold text-[#54352d] hover:bg-[#f6e6dc] active:bg-[#f6e6dc] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Placement Test</a>
            <a href="{{ route('team') }}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-sm font-extrabold text-[#54352d] hover:bg-[#f6e6dc] active:bg-[#f6e6dc] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Our Team</a>
            <a href="{{ route('login') }}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-sm font-extrabold text-[#54352d] hover:bg-[#f6e6dc] active:bg-[#f6e6dc] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Login</a>
            <a href="#membership-section" @click="openMenu = false" class="mt-2 inline-flex min-h-12 items-center justify-center rounded-full bg-[#b35d31] px-5 text-sm font-black text-white transition hover:bg-[#8f4725]">Start membership</a>
        </div>
    </div>
</header>

<main>
    <!-- HERO -->
    <section class="relative overflow-hidden bg-[#fff0e4] px-4 py-12 dark:bg-[#21120f] sm:px-6 lg:py-20">
        <div class="absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-white/60 to-transparent dark:from-white/5"></div>
        <div class="mx-auto grid max-w-[1440px] items-center gap-12 lg:grid-cols-[1fr_.9fr]">
            <div class="relative z-10 max-w-[680px]">
                <div class="mb-5 inline-flex rounded-full border border-[#e3b99c] bg-white/75 px-3 py-2 text-[11px] font-black uppercase tracking-[.18em] text-[#9a4d27] shadow-sm dark:border-white/10 dark:bg-white/10 dark:text-[#ffd1b2]">English Practice Membership</div>
                <h1 class="display-title max-w-[680px] text-5xl font-black leading-[.92] text-[#211411] dark:text-white sm:text-6xl xl:text-7xl">Practice English <span class="text-[#b35d31] dark:text-[#ffbd8f]">Every Day</span></h1>
                <p class="mt-5 max-w-[570px] text-base font-bold leading-8 text-[#604238] dark:text-[#ead5c9] sm:text-lg">Join live conversation rooms, practice groups, and interactive English activities for only <strong class="text-[#211411] dark:text-white">$35/month.</strong></p>
                <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                    <a href="#membership-section" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#b35d31] px-7 text-sm font-black text-white shadow-[0_16px_34px_rgba(179,93,49,.26)] transition hover:-translate-y-0.5 hover:bg-[#8f4725] dark:hover:bg-[#d97745]">Start Membership</a>
                    <a href="#platform-preview" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#e2c4b1] bg-white px-7 text-sm font-black text-[#4d2d23] transition hover:-translate-y-0.5 hover:bg-[#f8e7dc] dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15">Watch How It Works</a>
                </div>
                <p class="mt-5 text-sm font-semibold text-[#8d6b5e] dark:text-[#cdb5aa]">★★★★★ Affordable English speaking practice with real humans every week.</p>
            </div>
            <div class="relative mx-auto w-full max-w-[560px] lg:mx-0 lg:ml-auto">
                <div class="absolute -left-5 -top-5 h-24 w-24 rounded-full bg-[#ffcb89]/50 blur-2xl"></div>
                <div class="relative rounded-[32px] border border-white/70 bg-white/55 p-3 shadow-soft backdrop-blur dark:border-white/10 dark:bg-white/10">
                    <img src="{{ materialAsset('landing-page/img/hero.webp') }}" alt="Students practicing English online" class="aspect-[4/3] w-full rounded-[24px] object-cover">
                    <div class="absolute -bottom-5 right-5 rounded-[22px] bg-[#b35d31] px-5 py-4 text-white shadow-[0_20px_38px_rgba(76,31,15,.22)]">
                        <strong class="block text-3xl font-black leading-none">500+</strong>
                        <span class="mt-1 block max-w-[150px] text-xs font-extrabold leading-4 text-white/85">Students practicing English online every week</span>
                    </div>
                    <div class="absolute left-5 top-5 rounded-2xl bg-white/92 px-4 py-3 text-xs font-black text-[#533327] shadow-card dark:bg-[#170d0b]/90 dark:text-white">Accessible live conversation rooms every week</div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="bg-[#fffaf6] px-4 py-14 dark:bg-[#100908] sm:px-6 lg:py-20">
        <div class="mx-auto max-w-[1440px]" data-carousel>
            <div class="mb-7 flex items-end justify-between gap-5">
                <div>
                    <h2 class="edu-title text-3xl font-black leading-tight text-[#211411] dark:text-white sm:text-5xl">Everything You Need To Practice</h2>
                    <p class="mt-3 max-w-xl text-sm font-bold leading-7 text-[#7a5a4f] dark:text-[#d9bfb1]">Built to help you speak English consistently.</p>
                </div>
                <div class="hidden gap-2 sm:flex">
                    <button type="button" data-carousel-prev class="grid h-11 w-11 place-items-center rounded-full border border-[#e5c6b3] bg-white text-[#6a3e2f] transition hover:bg-[#b35d31] hover:text-white dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-[#b35d31]">‹</button>
                    <button type="button" data-carousel-next class="grid h-11 w-11 place-items-center rounded-full border border-[#e5c6b3] bg-white text-[#6a3e2f] transition hover:bg-[#b35d31] hover:text-white dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-[#b35d31]">›</button>
                </div>
            </div>
            <div data-carousel-track class="scrollbar-hide snap-x snap-mandatory snap-desktop flex gap-4 overflow-x-auto pb-3 lg:gap-5">
                @foreach($features as $feature)
                    <article class="group relative h-[310px] min-w-[82vw] snap-start overflow-hidden rounded-[28px] border border-[#ead5c7] bg-white shadow-card transition hover:-translate-y-1 hover:shadow-soft dark:border-white/10 dark:bg-white/5 sm:min-w-[360px] lg:min-w-[390px] xl:min-w-[420px]">
                        <img src="{{ $feature['image'] }}" alt="{{ $feature['title'] }}" loading="lazy" class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="card-gradient absolute inset-0"></div>
                        <div class="absolute bottom-0 left-0 right-0 z-10 p-5 sm:p-6">
                            <div class="mb-3 h-1.5 w-20 rounded-full bg-gradient-to-r from-[#ffcf83] via-[#e58a48] to-[#b35d31]"></div>
                            <h3 class="text-2xl font-black tracking-[-.04em] text-white">{{ $feature['title'] }}</h3>
                            <p class="mt-2 text-sm font-bold leading-6 text-white/82">{{ $feature['description'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="mt-4 flex justify-center gap-2 sm:hidden">
                <button type="button" data-carousel-prev class="grid h-11 w-11 place-items-center rounded-full border border-[#e5c6b3] bg-white text-[#6a3e2f] transition hover:bg-[#b35d31] hover:text-white dark:border-white/10 dark:bg-white/10 dark:text-white">‹</button>
                <button type="button" data-carousel-next class="grid h-11 w-11 place-items-center rounded-full border border-[#e5c6b3] bg-white text-[#6a3e2f] transition hover:bg-[#b35d31] hover:text-white dark:border-white/10 dark:bg-white/10 dark:text-white">›</button>
            </div>
        </div>
    </section>

    <!-- STUDENTS -->
    <section class="bg-[#170d0b] px-4 py-14 text-white sm:px-6 lg:py-20">
        <div class="mx-auto max-w-[1440px]" data-carousel>
            <div class="mb-8 flex items-end justify-between gap-5">
                <div class="max-w-2xl">
                    <h2 class="edu-title text-3xl font-black leading-tight sm:text-5xl">Real students Real progress.</h2>
                    <p class="mt-3 text-sm font-bold leading-7 text-[#d8bfb4]">Watch real Boston English Center students practicing consistently and building confidence over time.</p>
                </div>
                <div class="hidden gap-2 sm:flex">
                    <button type="button" data-carousel-prev class="grid h-11 w-11 place-items-center rounded-full border border-white/10 bg-white/10 text-white transition hover:bg-[#b35d31]">‹</button>
                    <button type="button" data-carousel-next class="grid h-11 w-11 place-items-center rounded-full border border-white/10 bg-white/10 text-white transition hover:bg-[#b35d31]">›</button>
                </div>
            </div>
            <div data-carousel-track class="scrollbar-hide flex snap-x snap-mandatory gap-4 overflow-x-auto pb-3 sm:gap-5">
                @foreach($students as $student)
                    <article data-video-card class="relative aspect-[9/16] min-w-[68vw] snap-start overflow-hidden rounded-[28px] bg-[#241513] shadow-[0_20px_40px_rgba(0,0,0,.25)] sm:min-w-[250px] lg:min-w-[270px]">
                        <video class="absolute inset-0 h-full w-full object-cover" playsinline preload="none" poster="{{ $student['thumbnail'] }}" data-hls-src="https://material-media.s3.us-east-1.amazonaws.com/landing-page/videos/{{ $student['path'] }}"></video>
                        <div class="absolute inset-0 bg-gradient-to-b from-black/15 via-transparent to-black/80"></div>
                        <div data-video-overlay class="absolute inset-0 transition duration-300">
                            <button type="button" data-play-video aria-label="Play {{ $student['name'] }} video" class="absolute left-1/2 top-1/2 grid h-12 w-12 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full border border-white/40 bg-white/35 text-white shadow-lg backdrop-blur-md transition hover:scale-105 hover:bg-white/50 sm:h-11 sm:w-11">
                                <svg class="ml-0.5 h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                            </button>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 p-4">
                            <h3 class="text-lg font-black text-white">{{ $student['name'] }}</h3>
                            <p class="mt-1 text-xs font-bold text-white/75">{{ $student['duration'] }}</p>
                            <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-white/16 px-3 py-2 text-xs font-black text-white backdrop-blur-md">
                                <span class="text-base leading-none">{{ $student['flag'] }}</span><span>{{ $student['city'] }}, {{ $student['country'] }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="mt-4 flex justify-center gap-2 sm:hidden">
                <button type="button" data-carousel-prev class="grid h-11 w-11 place-items-center rounded-full border border-white/10 bg-white/10 text-white transition hover:bg-[#b35d31]">‹</button>
                <button type="button" data-carousel-next class="grid h-11 w-11 place-items-center rounded-full border border-white/10 bg-white/10 text-white transition hover:bg-[#b35d31]">›</button>
            </div>
        </div>
    </section>

    <!-- REVIEWS -->
    <section class="bg-[#fff6ee] px-4 py-14 dark:bg-[#140b09] sm:px-6 lg:py-20">
        <div class="mx-auto max-w-[1440px]">
            <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
                <div>
                    <h2 class="edu-title text-3xl font-black leading-tight text-[#211411] dark:text-white sm:text-5xl">Trusted by Thousands of Learners Worldwide</h2>
                    <p class="mt-4 max-w-2xl text-sm font-bold leading-7 text-[#7a5a4f] dark:text-[#d9bfb1]">Reviews rated <strong class="text-[#b35d31] dark:text-[#ffbd8f]">4.9/5</strong> by over <strong class="text-[#211411] dark:text-white">3,876 learners</strong> across the US, Canada, and the Gulf.</p>
                </div>
                <div class="rounded-[28px] border border-[#ead5c7] bg-white p-5 text-center shadow-card dark:border-white/10 dark:bg-white/5">
                    <div class="text-6xl font-black tracking-[-.09em] text-[#211411] dark:text-white">4.9</div>
                    <div class="mt-3 flex justify-center gap-1">
                        @for($i = 0; $i < 5; $i++)<span class="grid h-6 w-6 place-items-center rounded-md bg-[#00b67a] text-xs text-white">★</span>@endfor
                    </div>
                    <p class="mt-2 text-xs font-bold text-[#8d6b5e] dark:text-[#d9bfb1]">Based on student reviews</p>
                </div>
            </div>
            <div class="mt-8 grid gap-4 lg:grid-cols-3">
                @foreach($reviews as $review)
                    <article class="rounded-[28px] border border-[#ead5c7] bg-white p-5 shadow-card transition hover:-translate-y-1 hover:border-[#d7a98f] hover:shadow-soft dark:border-white/10 dark:bg-white/[.06]">
                        <div class="flex items-center gap-3">
                            <img src="{{ $review['avatar'] }}" alt="{{ $review['name'] }}" loading="lazy" class="h-12 w-12 rounded-full object-cover ring-4 ring-[#fff0e4] dark:ring-white/10">
                            <div>
                                <strong class="block text-base font-black text-[#211411] dark:text-white">{{ $review['name'] }}</strong>
                                <span class="text-xs font-bold text-[#8d6b5e] dark:text-[#d9bfb1]">{{ $review['location'] }}</span>
                            </div>
                        </div>
                        <p class="mt-5 text-sm font-bold leading-7 text-[#604238] dark:text-[#ead5c9]">{!! $review['quote'] !!}</p>
                    </article>
                @endforeach
            </div>
            <div class="mt-7 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="flex flex-wrap gap-2">
                    @foreach($countries as $country)
                        <span class="rounded-full border border-[#ead5c7] bg-white px-4 py-2 text-xs font-black text-[#6a3e2f] dark:border-white/10 dark:bg-white/5 dark:text-white">{{ $country }}</span>
                    @endforeach
                </div>
                <a href="{{ route('home.reviews', ['lang' => $currentLang]) }}" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#b35d31] px-7 text-sm font-black text-white shadow-[0_16px_30px_rgba(179,93,49,.20)] transition hover:-translate-y-0.5 hover:bg-[#8f4725] dark:hover:bg-[#d97745]">Browse all reviews</a>
            </div>
        </div>
    </section>

    <!-- STEPS -->
    <section id="how-it-works" class="relative overflow-hidden bg-[#fffaf6] px-4 py-14 dark:bg-[#100908] sm:px-6 lg:py-20">
        <div class="absolute left-0 top-20 hidden h-72 w-72 rounded-full bg-[#ffd6ab]/40 blur-3xl lg:block"></div>
        <div class="mx-auto max-w-[1440px]">
            <div class="mx-auto max-w-[760px] text-center">
                <h2 class="edu-title text-4xl font-black leading-[.95] text-[#211411] dark:text-white sm:text-6xl">Clear steps before you start.</h2>
                <p class="mt-4 text-sm font-bold leading-7 text-[#7a5a4f] dark:text-[#d9bfb1]">Know exactly what happens after joining — no confusion, no waiting, and no need to contact support to understand the next step.</p>
            </div>
            <div class="relative mx-auto mt-10 grid max-w-[1180px] gap-4 lg:grid-cols-4">
                @foreach($steps as $index => $step)
                    <article class="group relative overflow-hidden rounded-[30px] border border-[#ead5c7] bg-white p-5 shadow-card transition hover:-translate-y-1 hover:shadow-soft dark:border-white/10 dark:bg-white/[.06]">
                        <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-gradient-to-br from-[#ffd19a] to-[#b35d31] opacity-20 transition group-hover:scale-125"></div>
                        <div class="relative z-10 flex items-start justify-between gap-4">
                            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-[#211411] text-lg font-black text-white dark:bg-[#b35d31]">{{ $index + 1 }}</div>
                            <span class="rounded-full bg-[#fff1e8] px-3 py-1.5 text-[10px] font-black uppercase tracking-[.12em] text-[#b35d31] dark:bg-white/10 dark:text-[#ffbd8f]">Step {{ $index + 1 }}</span>
                        </div>
                        <h3 class="relative z-10 mt-5 text-2xl font-black tracking-[-.05em] text-[#211411] dark:text-white">{{ $step['title'] }}</h3>
                        <p class="relative z-10 mt-3 text-sm font-bold leading-7 text-[#6d5046] dark:text-[#e4c8ba]">{{ $step['description'] }}</p>
                        <div class="relative z-10 mt-5 flex flex-wrap gap-2">
                            @foreach($step['tags'] as $tag)
                                <span class="rounded-full border border-[#ead5c7] bg-[#fffaf6] px-3 py-1.5 text-[11px] font-extrabold text-[#6a3e2f] dark:border-white/10 dark:bg-white/5 dark:text-[#f7ded0]">{{ $tag }}</span>
                            @endforeach
                        </div>
                        @if(!$loop->last)
                            <div class="absolute -right-3 top-1/2 z-20 hidden h-8 w-8 -translate-y-1/2 place-items-center rounded-full bg-[#b35d31] text-white shadow-lg lg:grid">→</div>
                        @endif
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PLATFORM PREVIEW -->
    <section id="platform-preview" class="bg-[#fff0e4] text-[#211411] dark:bg-[#21120f] dark:text-white">
        <div class="mx-auto grid max-w-[1440px] lg:grid-cols-2">
            <div class="min-h-[360px] bg-cover bg-center" style="background-image:url('{{ materialAsset('landing-page/img/platform-preview.webp') }}')"></div>
            <div class="flex items-center px-4 py-14 sm:px-8 lg:px-14 lg:py-20">
                <div class="w-full max-w-[580px]">
                    <h2 class="edu-title text-4xl font-black leading-[.95] sm:text-5xl">See Inside The Platform</h2>
                    <p class="mt-4 text-sm font-bold leading-7 text-[#7a5a4f] dark:text-[#d9bfb1]">Watch how students practice English online.</p>
                    <div class="mt-7 rounded-[28px] border border-[#dfc0ad] bg-white p-3 shadow-card dark:border-white/10 dark:bg-black/25">
                        <div class="grid aspect-video place-items-center rounded-[22px] bg-[#160d0b] text-white">
                            <button class="grid h-14 w-14 place-items-center rounded-full bg-[#b35d31]/90 text-white shadow-[0_0_50px_rgba(179,93,49,.42)] transition hover:scale-105 hover:bg-[#8f4725]" aria-label="Play platform video">
                                <svg class="ml-1 h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MEMBERSHIP -->
    <section id="membership-section" class="bg-[#fffaf6] px-4 py-14 dark:bg-[#100908] sm:px-6 lg:py-20">
        <div class="mx-auto grid max-w-[1440px] items-center gap-10 lg:grid-cols-[.9fr_1fr]">
            <div class="overflow-hidden rounded-[34px] border border-[#ead5c7] bg-white shadow-card dark:border-white/10 dark:bg-white/[.06]">
                <img src="{{ materialAsset('landing-page/img/membership.webp') }}" alt="Students practicing English together" class="h-full min-h-[420px] w-full object-cover">
            </div>
            <div class="mx-auto w-full max-w-[620px] rounded-[42px] bg-[#b35d31] p-6 text-white shadow-[0_26px_70px_rgba(86,38,16,.26)] sm:p-8 lg:p-10">
                <div class="mb-7 inline-flex rounded-full bg-white px-4 py-2 text-xs font-black uppercase tracking-[.16em] text-[#b35d31]">Most Popular</div>
                <h2 class="edu-title text-4xl font-black leading-[.95] sm:text-5xl">Don’t Study English Alone</h2>
                <div class="mt-6 flex items-end gap-2">
                    <strong class="text-7xl font-black tracking-[-.08em] sm:text-8xl">$35</strong><span class="pb-3 text-xl font-black">/ month</span>
                </div>
                <div class="mt-7 grid gap-4 text-base font-black">
                    <div class="flex items-center gap-3"><span class="grid h-8 w-8 place-items-center rounded-full bg-white text-[#b35d31]">✓</span>Join live English practice groups</div>
                    <div class="flex items-center gap-3"><span class="grid h-8 w-8 place-items-center rounded-full bg-white text-[#b35d31]">✓</span>Practice online every week</div>
                    <div class="flex items-center gap-3"><span class="grid h-8 w-8 place-items-center rounded-full bg-white text-[#b35d31]">✓</span>No long-term contract</div>
                </div>
                <div class="mt-8 rounded-[30px] bg-white p-5 text-[#211411] shadow-[0_18px_45px_rgba(54,22,12,.14)] sm:p-7">
                    <div class="mb-4">
                        <label class="mb-2 block text-sm font-black">Full name</label>
                        <input type="text" placeholder="Enter your full name" class="h-14 w-full rounded-2xl border border-[#ddbda9] bg-[#fffaf6] px-4 text-sm font-bold outline-none transition placeholder:text-[#b89b90] focus:border-[#b35d31] focus:ring-4 focus:ring-[#b35d31]/10">
                    </div>
                    <div class="mb-5">
                        <label class="mb-2 block text-sm font-black">Phone number</label>
                        <input type="text" placeholder="Enter your phone number" class="h-14 w-full rounded-2xl border border-[#ddbda9] bg-[#fffaf6] px-4 text-sm font-bold outline-none transition placeholder:text-[#b89b90] focus:border-[#b35d31] focus:ring-4 focus:ring-[#b35d31]/10">
                    </div>
                    <button class="h-14 w-full rounded-full bg-[#321a16] text-sm font-black text-white transition hover:bg-[#4b241d]">Start Membership for $35</button>
                    <p class="mt-4 text-center text-sm font-bold leading-6 text-[#9b776b]">No long-term contract. Start with your placement test.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="bg-[#fff0e4] px-4 py-14 dark:bg-[#21120f] sm:px-6 lg:py-20" id="faq">
        <div class="mx-auto grid max-w-[1280px] gap-8 lg:grid-cols-[.72fr_1fr] lg:items-start">
            <div class="lg:sticky lg:top-28">
                <span class="inline-flex rounded-full bg-white px-4 py-2 text-xs font-black uppercase tracking-[.16em] text-[#b35d31] shadow-sm dark:bg-white/10 dark:text-[#ffbd8f]">FAQ</span>
                <h2 class="edu-title mt-5 text-4xl font-black leading-[.95] text-[#211411] dark:text-white sm:text-6xl">Questions before joining?</h2>
                <p class="mt-4 max-w-md text-sm font-bold leading-7 text-[#7a5a4f] dark:text-[#d9bfb1]">Open a question to see the answer. The active question is highlighted so mobile reading stays clear.</p>
            </div>
            <div class="grid gap-3">
                @foreach($faqs as $index => $faq)
                    <details data-faq-details class="group rounded-[22px] border border-[#ead5c7] bg-white px-5 py-4 shadow-card transition dark:border-white/10 dark:bg-white/[.06]" @if($index === 0) open @endif>
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 text-left text-sm font-black text-[#211411] transition dark:text-white sm:text-base">
                            <span>{{ $faq['question'] }}</span>
                            <span class="faq-icon grid h-8 w-8 shrink-0 place-items-center rounded-full bg-[#fff0e4] text-lg leading-none text-[#b35d31] transition dark:bg-white/10 dark:text-[#ffd8bf]">+</span>
                        </summary>
                        <p class="mt-4 border-t border-[#ead5c7] pt-4 text-sm font-bold leading-7 text-[#6d5046] dark:border-white/10 dark:text-[#ead5c9]">{!! $faq['answer'] !!}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>
</main>

<footer class="bg-[#321b16] text-[#f8e4d8] dark:bg-[#0b0504]">
    <div class="px-4 py-12 sm:px-6 lg:py-14">
        <div class="mx-auto grid max-w-[1440px] gap-9 lg:grid-cols-[1.4fr_.8fr_.8fr_.8fr]">
            <div>
                <img src="{{ $darkLogo }}" alt="Boston English Center" width="150" height="54" class="h-10 w-auto object-contain">
                <p class="mt-4 max-w-[340px] text-sm font-bold leading-7 text-[#d9bbac]">English Practice Membership • $35/month • Cancel anytime</p>
            </div>
            <div>
                <h3 class="mb-4 text-xs font-black uppercase tracking-[.18em] text-white">Navigation</h3>
                <div class="grid gap-2 text-sm font-bold text-[#d9bbac]">
                    <a href="{{ route('landing', ['lang' => $currentLang]) }}" class="transition hover:text-white">Home</a>
                    <a href="{{ route('booking.index', ['lang' => $currentLang]) }}" class="transition hover:text-white">Book Trial</a>
                    <a href="{{ route('placementTest.index', ['lang' => $currentLang]) }}" class="transition hover:text-white">Placement Test</a>
                    <a href="{{ route('team') }}" class="transition hover:text-white">Our Team</a>
                </div>
            </div>
            <div>
                <h3 class="mb-4 text-xs font-black uppercase tracking-[.18em] text-white">Membership</h3>
                <div class="grid gap-2 text-sm font-bold text-[#d9bbac]">
                    <a href="#membership-section" class="transition hover:text-white">Start Membership</a>
                    <a href="#how-it-works" class="transition hover:text-white">How It Works</a>
                    <a href="#faq" class="transition hover:text-white">FAQ</a>
                    <a href="{{ route('home.reviews', ['lang' => $currentLang]) }}" class="transition hover:text-white">Reviews</a>
                </div>
            </div>
            <div>
                <h3 class="mb-4 text-xs font-black uppercase tracking-[.18em] text-white">Contact</h3>
                <div class="grid gap-2 text-sm font-bold text-[#d9bbac]">
                    <a href="tel:+16178482317" class="transition hover:text-white">+1 617-848-2317</a>
                    <a href="{{ route('login') }}" class="transition hover:text-white">Login</a>
                </div>
            </div>
        </div>
    </div>

    <div class="relative border-t border-white/10 bg-[#fffaf6] px-3 py-5 text-[#120907] dark:bg-[#fffaf6] sm:px-6">
        <a href="#top" class="top-link-tab absolute right-4 top-0 -translate-y-full bg-[#fffaf6] px-6 py-3 text-xs font-black text-[#120907] shadow-[0_-8px_22px_rgba(0,0,0,.08)] transition hover:bg-[#fff1e8] sm:right-[15%]">
            <span class="mr-1 inline-block text-base leading-none">↑</span> Back to top
        </a>
        <div class="mx-auto flex max-w-[1440px] flex-col items-center gap-3 text-center">
            <div class="whitespace-nowrap text-[11px] font-semibold leading-none sm:text-xs">Copyright © 2025 Boston English Center | All Rights Reserved.</div>
            <div class="flex flex-nowrap items-center justify-center gap-2" aria-label="Payment options">
                <span class="pay-icon" title="Mastercard" aria-label="Mastercard"><svg viewBox="0 0 44 28"><circle cx="18" cy="14" r="9" fill="#EB001B"/><circle cx="26" cy="14" r="9" fill="#F79E1B" fill-opacity=".92"/><path d="M22 7.2a9 9 0 0 1 0 13.6 9 9 0 0 1 0-13.6Z" fill="#FF5F00"/></svg></span>
                <span class="pay-icon" title="PayPal" aria-label="PayPal"><svg viewBox="0 0 86 24"><text x="0" y="18" fill="#003087" font-size="18" font-weight="800" font-family="Arial, sans-serif">Pay</text><text x="31" y="18" fill="#009CDE" font-size="18" font-weight="800" font-family="Arial, sans-serif">Pal</text></svg></span>
                <span class="pay-icon" title="Visa" aria-label="Visa"><svg viewBox="0 0 64 24"><text x="0" y="18" fill="#1A1F71" font-size="18" font-weight="900" font-style="italic" font-family="Arial Black, Arial, sans-serif">VISA</text></svg></span>
                <span class="pay-icon" title="Google Pay" aria-label="Google Pay"><svg viewBox="0 0 78 24"><text x="0" y="18" fill="#4285F4" font-size="18" font-weight="800" font-family="Arial, sans-serif">G</text><text x="17" y="18" fill="#3C4043" font-size="16" font-weight="700" font-family="Arial, sans-serif">Pay</text></svg></span>
                <span class="pay-icon" title="Apple Pay" aria-label="Apple Pay"><svg viewBox="0 0 86 24"><path d="M12.9 5.4c.9-1.1 1.5-2.6 1.3-4-1.3.1-2.8.9-3.7 2-.8 1-1.6 2.6-1.4 4 1.4.1 2.8-.8 3.8-2Z" fill="#000"/><path d="M14.2 7.7c-2-.1-3.7 1.1-4.6 1.1-1 0-2.4-1-4-1-2.1 0-4 1.2-5.1 3.1-2.2 3.8-.6 9.4 1.6 12.5 1 1.5 2.3 3.2 3.9 3.1 1.6-.1 2.2-1 4-1s2.4 1 4.1 1c1.7 0 2.8-1.5 3.8-3 1.2-1.7 1.7-3.4 1.7-3.5 0-.1-3.3-1.3-3.3-5 0-3.1 2.5-4.6 2.6-4.7-1.5-2.1-3.7-2.5-4.7-2.6Z" fill="#000"/><text x="26" y="18" fill="#000" font-size="16" font-weight="700" font-family="Arial, sans-serif">Pay</text></svg></span>
            </div>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const themeButton = document.querySelector('[data-theme-toggle]');
        if (themeButton) {
            themeButton.addEventListener('click', () => {
                const isDark = document.documentElement.classList.toggle('dark');
                localStorage.setItem('bec-theme', isDark ? 'dark' : 'light');
            });
        }

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
        const pauseOtherVideos = (activeVideo) => {
            cards.forEach((card) => {
                const video = card.querySelector('video');
                if (video && video !== activeVideo) {
                    video.pause(); video.controls = false; card.classList.remove('video-playing');
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
                try { if (video._hls) video._hls.startLoad(); video.controls = true; await video.play(); card.classList.add('video-playing'); }
                catch (error) { card.classList.remove('video-playing'); video.controls = false; }
            });
            video.addEventListener('click', () => { if (!video.paused) video.pause(); });
            video.addEventListener('play', () => { pauseOtherVideos(video); card.classList.add('video-playing'); });
            video.addEventListener('pause', () => { card.classList.remove('video-playing'); video.controls = false; });
        });
    });
</script>
</body>
</html>
