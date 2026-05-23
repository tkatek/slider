{{\Illuminate\Support\Facades\App::setLocale('en')}}
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Boston English Center</title>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js'])

    <style>
        body{
            background:#0b1020;
            font-family:Inter,sans-serif;
        }

        .glass{
            background:rgba(255,255,255,0.06);
            backdrop-filter:blur(12px);
            border:1px solid rgba(255,255,255,0.08);
        }

        .gradient{
            background:linear-gradient(135deg,#2563eb,#7c3aed);
        }

        .hero-bg{
            background:
                    radial-gradient(circle at top left,#2563eb33,transparent 35%),
                    radial-gradient(circle at bottom right,#7c3aed33,transparent 35%);
        }
    </style>
</head>

<body class="text-white">
<div x-data="{ openMenu: false, langMenu: false }"
     class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 text-slate-950 shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-[#07111f]/90 dark:text-white">
    <nav class="flex min-h-[76px] w-full items-center justify-between gap-2 px-4 sm:gap-4 sm:px-6 xl:px-8" dir="ltr" aria-label="Main navigation">
        <a href="{{route('landing', ['lang' => request()->route('lang')])}}" class="flex min-w-0 items-center gap-3">
            <img src="https://bostonenglishcenter.com/img/home/logo2.webp"
                 alt="Boston English Center"
                 width="150"
                 height="54"
                 class=" object-contain dark:hidden">
            <img src="https://bostonenglishcenter.com/img/booking/logo1.webp"
                 alt="Boston English Center"
                 width="150"
                 height="54"
                 class="hidden  object-contain dark:block">
        </a>

        <div class="hidden items-center gap-1 lg:flex">
            <a href="{{route('landing', ['lang' => request()->route('lang')])}}" class="whitespace-nowrap rounded-full px-3 py-2 text-md font-bold text-slate-700 transition hover:bg-slate-100 hover:text-slate-950 dark:text-slate-200 dark:hover:bg-white/10 dark:hover:text-white">Home</a>
            <a href="{{route('contactUs', ['lang' => request()->route('lang')])}}" class="whitespace-nowrap rounded-full px-3 py-2 text-md font-bold text-slate-700 transition hover:bg-slate-100 hover:text-slate-950 dark:text-slate-200 dark:hover:bg-white/10 dark:hover:text-white">Free for Orphans</a>
            <a href="{{route('booking.index',['lang'=>request()->route('lang')])}}" class="whitespace-nowrap rounded-full px-3 py-2 text-md font-bold text-slate-700 transition hover:bg-slate-100 hover:text-slate-950 dark:text-slate-200 dark:hover:bg-white/10 dark:hover:text-white">Book Trial</a>
            <a href="{{route('placementTest.index',['lang'=>request()->route('lang')])}}" class="whitespace-nowrap rounded-full px-3 py-2 text-md font-bold text-slate-700 transition hover:bg-slate-100 hover:text-slate-950 dark:text-slate-200 dark:hover:bg-white/10 dark:hover:text-white">Placement Test</a>
            <a href="{{route('team')}}" class="whitespace-nowrap rounded-full px-3 py-2 text-md font-bold text-slate-700 transition hover:bg-slate-100 hover:text-slate-950 dark:text-slate-200 dark:hover:bg-white/10 dark:hover:text-white">Our Team</a>
            <a href="{{route('login')}}" class="whitespace-nowrap rounded-full px-3 py-2 text-md font-bold text-slate-700 transition hover:bg-slate-100 hover:text-slate-950 dark:text-slate-200 dark:hover:bg-white/10 dark:hover:text-white">Login</a>
        </div>

        <div class="flex items-center gap-2">
            <div class="relative hidden sm:block" @click.outside="langMenu = false">
                <button type="button"
                        id="lang-button"
                        class="inline-flex h-11 items-center gap-2 rounded-full border border-slate-200 bg-white px-3 text-md font-bold text-slate-700 shadow-sm transition hover:border-slate-300 hover:bg-slate-50 dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15"
                        @click="langMenu = !langMenu"
                        :aria-expanded="langMenu.toString()"
                        aria-controls="lang-menu">
                    <svg class="h-5 w-5 text-sky-600 dark:text-sky-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18m0 18c2.5-2.4 3.75-5.4 3.75-9S14.5 5.4 12 3m0 18c-2.5-2.4-3.75-5.4-3.75-9S9.5 5.4 12 3m-8.25 9h16.5" />
                    </svg>
                    English
                    <svg class="h-4 w-4 transition" :class="langMenu ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6" />
                    </svg>
                </button>

                <div id="lang-menu"
                     x-show="langMenu"
                     x-cloak
                     x-transition
                     class="absolute right-0 z-20 mt-3 w-56 overflow-hidden rounded-2xl border border-slate-200 bg-white py-2 shadow-xl dark:border-white/10 dark:bg-slate-900">
                    <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'en'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                        <img width="20" src="{{ asset('img/language/us.svg') }}" loading="lazy" alt="English"> English
                    </a>
                    <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'ar'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                        <img width="20" src="{{ asset('img/language/ma.svg') }}" loading="lazy" alt="Arabic"> العربية
                    </a>
                    <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'fr'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                        <img width="20" src="{{ asset('img/language/fr.svg') }}" loading="lazy" alt="French"> Français
                    </a>
                    <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'es'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                        <img width="20" src="{{ asset('img/language/es.svg') }}" loading="lazy" alt="Spanish"> Español
                    </a>
                    <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'pt'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                        <img width="20" src="{{ asset('img/language/pt.svg') }}" loading="lazy" alt="Portuguese"> Português
                    </a>
                    <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'tr'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                        <img width="20" src="{{ asset('img/language/tr.svg') }}" loading="lazy" alt="Turkish"> Türkçe
                    </a>
                    <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'zh'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                        <img width="20" src="{{ asset('img/language/zh.svg') }}" loading="lazy" alt="Chinese"> 简体中文
                    </a>
                </div>
            </div>

            <a href="#membership-section" class="inline-flex min-h-11 items-center justify-center whitespace-nowrap rounded-full bg-orange-500 px-6 py-2.5 text-base font-extrabold text-white shadow-[0_12px_28px_rgba(249,115,22,0.22)] transition hover:-translate-y-0.5 hover:bg-orange-600 focus:outline-none focus:ring-4 focus:ring-orange-200 dark:focus:ring-orange-500/20">Start membership</a>

            <button type="button"
                    class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-slate-300 hover:bg-slate-50 dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 lg:hidden"
                    @click="openMenu = !openMenu"
                    :aria-expanded="openMenu.toString()"
                    aria-controls="mobile-navigation"
                    aria-label="Toggle navigation menu">
                <svg x-show="!openMenu" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16" />
                </svg>
                <svg x-show="openMenu" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </nav>

    <div id="mobile-navigation"
         x-show="openMenu"
         x-cloak
         x-transition
         class="border-t border-slate-200 bg-white px-4 py-5 shadow-xl dark:border-white/10 dark:bg-[#07111f] lg:hidden">
        <div class="mx-auto grid max-w-[1180px] gap-5">
            <div class="grid gap-2">
                <a href="{{route('landing', ['lang' => request()->route('lang')])}}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-100 dark:text-slate-100 dark:hover:bg-white/10">Home</a>
                <a href="{{route('contactUs', ['lang' => request()->route('lang')])}}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-100 dark:text-slate-100 dark:hover:bg-white/10">Free for Orphans</a>
                <a href="{{route('booking.index',['lang'=>request()->route('lang')])}}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-100 dark:text-slate-100 dark:hover:bg-white/10">Book a Free Trial</a>
                <a href="{{route('placementTest.index',['lang'=>request()->route('lang')])}}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-100 dark:text-slate-100 dark:hover:bg-white/10">Placement Test</a>
                <a href="{{route('career')}}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-100 dark:text-slate-100 dark:hover:bg-white/10">Career</a>
                <a href="{{route('team')}}" @click="openMenu = false" class="rounded-2xl px-4 py-3 text-base font-bold text-slate-700 hover:bg-slate-100 dark:text-slate-100 dark:hover:bg-white/10">Our Team</a>
            </div>

            <div class="grid gap-3 rounded-3xl border border-slate-200 bg-slate-50 p-4 dark:border-white/10 dark:bg-white/[0.06] sm:grid-cols-3">
                <a href="tel:+16178482317" class="inline-flex min-h-11 items-center justify-center rounded-full border border-slate-200 bg-white px-4 py-2.5 text-md font-extrabold text-slate-700 dark:border-white/10 dark:bg-white/10 dark:text-white">
                    +1 617-848-2317
                </a>
                <a href="{{route('login')}}" class="inline-flex min-h-11 items-center justify-center rounded-full border border-slate-200 bg-white px-4 py-2.5 text-md font-extrabold text-slate-700 dark:border-white/10 dark:bg-white/10 dark:text-white">
                    Login
                </a>
                <div class="relative flex min-h-11 items-center justify-center rounded-full border border-slate-200 bg-white px-4 py-2.5 text-md font-extrabold text-slate-700 dark:border-white/10 dark:bg-white/10 dark:text-white sm:hidden" @click.outside="langMenu = false">
                    <button type="button"
                            id="lang-button"
                            class="inline-flex w-fit items-center justify-center gap-2"
                            @click="langMenu = !langMenu"
                            :aria-expanded="langMenu.toString()"
                            aria-controls="lang-menu">
                        <svg class="h-5 w-5 text-sky-600 dark:text-sky-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18m0 18c2.5-2.4 3.75-5.4 3.75-9S14.5 5.4 12 3m0 18c-2.5-2.4-3.75-5.4-3.75-9S9.5 5.4 12 3m-8.25 9h16.5" />
                        </svg>
                        English
                        <svg class="h-4 w-4 transition" :class="langMenu ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div id="lang-menu"
                         x-show="langMenu"
                         x-cloak
                         x-transition
                         class="absolute right-0 z-20 mt-3 w-56 overflow-hidden rounded-2xl border border-slate-200 bg-white py-2 shadow-xl dark:border-white/10 dark:bg-slate-900">
                        <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'en'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                            <img width="20" src="{{ asset('img/language/us.svg') }}" loading="lazy" alt="English"> English
                        </a>
                        <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'ar'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                            <img width="20" src="{{ asset('img/language/ma.svg') }}" loading="lazy" alt="Arabic"> العربية
                        </a>
                        <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'fr'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                            <img width="20" src="{{ asset('img/language/fr.svg') }}" loading="lazy" alt="French"> Français
                        </a>
                        <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'es'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                            <img width="20" src="{{ asset('img/language/es.svg') }}" loading="lazy" alt="Spanish"> Español
                        </a>
                        <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'pt'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                            <img width="20" src="{{ asset('img/language/pt.svg') }}" loading="lazy" alt="Portuguese"> Português
                        </a>
                        <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'tr'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                            <img width="20" src="{{ asset('img/language/tr.svg') }}" loading="lazy" alt="Turkish"> Türkçe
                        </a>
                        <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),['lang'=>'zh'])}}" class="flex items-center gap-2 px-4 py-2.5 text-md font-semibold text-slate-700 hover:bg-slate-50 dark:text-white dark:hover:bg-white/10">
                            <img width="20" src="{{ asset('img/language/zh.svg') }}" loading="lazy" alt="Chinese"> 简体中文
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- HERO -->
<section class="hero-bg min-h-screen flex items-center px-3 pt-20">

    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-center">

        <!-- LEFT -->
        <div>


            <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-6">
                Practice English
                <span class="text-blue-400">
          Every Day
        </span>
            </h1>

            <p class="text-xl text-gray-300 leading-relaxed mb-8 max-w-xl">
                Join live conversation rooms, practice groups,
                and interactive English activities for only
                $35/month.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 mb-10">

                <a class="gradient px-8 py-4 rounded-2xl text-lg font-semibold shadow-2xl hover:scale-105 transition text-center" href="#membership-section">
                    Start Membership
                </a>

                <a class="glass px-8 py-4 rounded-2xl text-lg hover:bg-white/10 transition text-center" href="#how-it-works">
                    Watch How It Works
                </a>

            </div>

            <div class="flex items-start text-gray-400 text-sm ">

                <div class="flex w-full max-w-[1120px]  flex-wrap justify-between ">
                    <div>Affordable English speaking practice with real humans every week.</div>
                </div>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="relative">

            <div class="glass rounded-3xl p-5 shadow-2xl">

                <img
                        src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1200"
                        class="rounded-2xl w-full object-cover"
                />

            </div>

            <!-- FLOATING CARD -->
            <div class="absolute -bottom-8 -left-8 glass p-5 rounded-2xl w-64">

                <div class="text-3xl font-bold mb-1">
                    500+
                </div>

                <div class="text-gray-300">
                    Students practicing English online every week
                </div>

            </div>

        </div>

    </div>

</section>


<!-- FEATURES -->
<section class="py-24 px-6">

    <div class="max-w-7xl mx-auto">

        <div class="text-center mb-16">

            <h2 class="text-4xl font-bold mb-4">
                Everything You Need To Practice
            </h2>

            <p class="text-gray-400 text-lg">
                Built to help you speak English consistently.
            </p>

        </div>
        <div class="flex md:hidden gap-4  flex-col">
            <div class="grid grid-cols-[28px_1fr] min-w-[280px] text-start">
                <div class="text-2xl leading-tight me-2">✅</div>

                <div>
                    <h3 class="text-2xl font-semibold leading-tight">
                        Conversation Rooms
                    </h3>
                    <p class="text-gray-400 mt-2 mb-3">
                        Practice speaking English with other students online.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-[28px_1fr] min-w-[280px] text-start">
                <div class="text-2xl leading-tight">✅</div>
                <div>
                    <h3 class="text-2xl font-semibold leading-tight">Practice Groups</h3>
                    <p class="text-gray-400 mt-2 mb-3">Join guided sessions with teachers every week.</p>
                </div>
            </div>

            <div class="grid grid-cols-[28px_1fr] min-w-[280px] text-start">
                <div class="text-2xl leading-tight">✅</div>
                <div>
                    <h3 class="text-2xl font-semibold leading-tight">English Materials</h3>
                    <p class="text-gray-400 mt-2 mb-3">Access lessons, vocabulary, and practice activities.</p>
                </div>
            </div>

            <div class="grid grid-cols-[28px_1fr] min-w-[280px] text-start">
                <div class="text-2xl leading-tight">✅</div>
                <div>
                    <h3 class="text-2xl font-semibold leading-tight">Online Community</h3>
                    <p class="text-gray-400 mt-2 mb-3">Stay connected to English every day.</p>
                </div>
            </div>

            <div class="grid grid-cols-[28px_1fr] min-w-[280px] text-start">
                <div class="text-2xl leading-tight">✅</div>
                <div>
                    <h3 class="text-2xl font-semibold leading-tight">Mobile Access</h3>
                    <p class="text-gray-400 mt-2 mb-3">Practice from your phone, tablet, or computer.</p>
                </div>
            </div>

            <div class="grid grid-cols-[28px_1fr] min-w-[280px] text-start">
                <div class="text-2xl leading-tight">✅</div>
                <div>
                    <h3 class="text-2xl font-semibold leading-tight">Stay Motivated</h3>
                    <p class="text-gray-400 mt-2">Build confidence through regular speaking practice.</p>
                </div>
            </div>
        </div>
        <div class="hidden sm:grid grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="glass rounded-3xl p-8">
                <h3 class="text-2xl font-semibold mb-3">
                    Conversation Rooms
                </h3>
                <p class="text-gray-400">
                    Practice speaking English with other students online.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h3 class="text-2xl font-semibold mb-3">
                    Practice Groups
                </h3>
                <p class="text-gray-400">
                    Join guided sessions with teachers every week.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h3 class="text-2xl font-semibold mb-3">
                    English Materials
                </h3>
                <p class="text-gray-400">
                    Access lessons, vocabulary, and practice activities.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h3 class="text-2xl font-semibold mb-3">
                    Online Community
                </h3>
                <p class="text-gray-400">
                    Stay connected to English every day.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h3 class="text-2xl font-semibold mb-3">
                    Mobile Access
                </h3>
                <p class="text-gray-400">
                    Practice from your phone, tablet, or computer.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h3 class="text-2xl font-semibold mb-3">
                    Stay Motivated
                </h3>
                <p class="text-gray-400">
                    Build confidence through regular speaking practice.
                </p>
            </div>

        </div>

    </div>

</section>
<section class="px-5 pb-12 bg-[radial-gradient(circle_at_top,rgba(59,130,246,.06),transparent_32%),#ffffff] ">
    <div class="max-w-[1240px] mx-auto">

        <div class="max-w-[860px] mx-auto mb-[58px] text-center">
            {{--<div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-full bg-[#eff6ff] text-[#2563eb] text-[13px] font-extrabold mb-5">
                <span class="w-2 h-2 rounded-full bg-[#22c55e]"></span>
                Student video testimonials
            </div>--}}

            <h2 class="text-4xl font-bold mb-4">
                Real students Real progress.
            </h2>

            <p class="max-w-[700px] mx-auto text-lg lg:text-[22px] leading-[1.7] text-gray-400">
                Watch real Boston English Center students practicing consistently
                and building confidence over time.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">
            {{--<div class="group relative aspect-square overflow-hidden rounded-[24px] lg:rounded-[32px] bg-[#0f172a] shadow-[0_18px_45px_rgba(15,23,42,.08)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_28px_60px_rgba(15,23,42,.14)]">
                <video
                    class="absolute inset-0 w-full h-full object-cover"
                    controls
                    preload="metadata"
                    poster=""
                >
                    <source src="https://material-media.s3.us-east-1.amazonaws.com/landing-page/videos/1.mov" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>--}}
            <?php
            $students=[
                [
                    'path'=>'1-encrypted/1.m3u8',
                    'name'=>'Nada',
                    'duration'=>'Student for 9 months',
                    'city'=>'New Jersey',
                    'country'=>'USA'
                ],
                [
                    'path'=>'2-encrypted/2.m3u8',
                    'name'=>'Sara',
                    'duration'=>'Practicing for 1 year',
                    'city'=>'Toronto',
                    'country'=>'Canada'
                ],
                [
                    'path'=>'3-encrypted/3.m3u8',
                    'name'=>'Mohamed',
                    'duration'=>'Student for 6 months',
                    'city'=>'Texas',
                    'country'=>'USA'
                ],
                [
                    'path'=>'4-encrypted/4.m3u8',
                    'name'=>'Fatima',
                    'duration'=>'Practicing for 4 months',
                    'city'=>'New York',
                    'country'=>'USA'
                ],/*
                    [
                        'path'=>'5.mov',
                        'name'=>'Fatima',
                        'duration'=>'Practicing for 4 months',
                        'city'=>'New York',
                        'country'=>'USA'
                    ],
                    [
                        'path'=>'6.mp4',
                        'name'=>'Fatima',
                        'duration'=>'Practicing for 4 months',
                        'city'=>'New York',
                        'country'=>'USA'
                    ],
                    [
                        'path'=>'7.mov',
                        'name'=>'Fatima',
                        'duration'=>'Practicing for 4 months',
                        'city'=>'New York',
                        'country'=>'USA'
                    ],*/
            ];
            ?>
            @foreach($students as $student)
                <div class="video-card group relative aspect-square overflow-hidden rounded-[24px] lg:rounded-[32px] bg-[#0f172a] shadow-[0_18px_45px_rgba(15,23,42,.08)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_28px_60px_rgba(15,23,42,.14)]">

                    <video
                            class="absolute inset-0 w-full h-full object-cover"
                            playsinline
                            preload="metadata"
                            poster="https://bostonenglishcenter.com/img/booking/reviews2.webp"
                    >
                        <source src="https://material-media.s3.us-east-1.amazonaws.com/landing-page/videos/{{$student['path']}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    <div class="absolute inset-0 pointer-events-none bg-[linear-gradient(180deg,rgba(15,23,42,.05),rgba(15,23,42,.78))]"></div>

                    <div class="relative z-[2] h-full p-[18px] flex flex-col justify-between text-white pointer-events-none">
                        <div class="flex justify-between items-start">
                            <div class="px-[11px] py-2 rounded-full bg-white/15 backdrop-blur-xl text-[11px] font-extrabold">
                                VIDEO
                            </div>
                        </div>
                        <button
                                type="button"
                                class="play-btn w-[52px] h-[52px] rounded-full bg-white/15 border border-white/20 backdrop-blur-xl grid place-items-center text-[18px] text-white mx-auto cursor-pointer"
                        >
                            ▶
                        </button>
                        <div>
                            <h3 class="text-[28px] leading-none tracking-[-0.05em] mb-3 font-extrabold">
                                {{$student['name']}}
                            </h3>

                            <div class="inline-flex items-center px-3 py-2 rounded-full bg-white/15 backdrop-blur-xl text-xs font-extrabold mb-4">
                                {{$student['duration']}}
                            </div>

                            <div class="flex items-center gap-2.5">
                                <div class="w-[38px] h-[38px] rounded-full bg-white/20"></div>

                                <div>
                                    <strong class="block text-[13px]">{{$student['city']}}</strong>
                                    <small class="block text-white/60 text-xs mt-0.5">{{$student['country']}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>


    </div>
</section>

<section class="min-h-screen flex items-center justify-center bg-[#f8fafc] px-5 py-4 text-[#111827]">
    <div class="w-full max-w-7xl mx-auto">

        <div class="  ">

            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-[30px]">

                <div class="max-w-[720px]">


                    <h2 class="text-4xl font-bold mb-4 text-center">
                        Trusted by Thousands of Learners Worldwide
                    </h2>

                    <p class="text-gray-400 text-lg">
                        Reviews rated <strong class="text-[#0f172a]">4.9/5</strong> by over
                        <strong class="text-[#0f172a]">3,876 learners</strong> across the US, Canada, and the Gulf.
                    </p>
                </div>

                <div class="min-w-[220px] text-left lg:text-right">
                    <div class="text-[72px] lg:text-[88px] leading-[0.82] tracking-[-0.10em] font-black text-[#0f172a]">
                        4.9
                    </div>

                    <div class="mt-3 flex gap-1 justify-start lg:justify-end">
                        <div class="w-[26px] h-[26px] rounded-md bg-[#00b67a] text-white grid place-items-center text-[13px]">★</div>
                        <div class="w-[26px] h-[26px] rounded-md bg-[#00b67a] text-white grid place-items-center text-[13px]">★</div>
                        <div class="w-[26px] h-[26px] rounded-md bg-[#00b67a] text-white grid place-items-center text-[13px]">★</div>
                        <div class="w-[26px] h-[26px] rounded-md bg-[#00b67a] text-white grid place-items-center text-[13px]">★</div>
                        <div class="w-[26px] h-[26px] rounded-md bg-[#00b67a] text-white grid place-items-center text-[13px]">★</div>
                    </div>

                    <small class="block mt-3 text-gray-400 text-sm">
                        Based on student reviews
                    </small>
                </div>

            </div>

            <div class="mt-9 grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="bg-white border border-[#e5e7eb] rounded-3xl p-8 transition duration-200 hover:border-[#d1d5db] hover:-translate-y-0.5">
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex items-center gap-2.5">
                            <div class="w-[42px] h-[42px] rounded-full bg-[#e2e8f0]"></div>

                            <div>
                                <strong class="block text-2xl font-semibold mb-1">
                                    Ahmed
                                </strong>
                                <small class="block text-gray-400">
                                    New Jersey, USA
                                </small>
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-400">
                        “The live conversation rooms helped me finally start speaking English confidently.”
                    </p>
                </div>

                <div class="bg-white border border-[#e5e7eb] rounded-3xl p-8 transition duration-200 hover:border-[#d1d5db] hover:-translate-y-0.5">
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex items-center gap-2.5">
                            <div class="w-[42px] h-[42px] rounded-full bg-[#e2e8f0]"></div>

                            <div>
                                <strong class="block text-2xl font-semibold mb-1">
                                    Sara
                                </strong>
                                <small class="block text-gray-400">
                                    Toronto, Canada
                                </small>
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-400">
                        “I practice English almost every day now and feel much more comfortable speaking.”
                    </p>
                </div>

                <div class="bg-white border border-[#e5e7eb] rounded-3xl p-8 transition duration-200 hover:border-[#d1d5db] hover:-translate-y-0.5">
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex items-center gap-2.5">
                            <div class="w-[42px] h-[42px] rounded-full bg-[#e2e8f0]"></div>

                            <div>
                                <strong class="block text-2xl font-semibold mb-1">
                                    Mohamed
                                </strong>
                                <small class="block text-gray-400">
                                    Texas, USA
                                </small>
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-400">
                        “The teachers understand our needs very well and help us improve consistently.”
                    </p>
                </div>

            </div>

            <div class="mt-8 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 flex-wrap">

                <div class="flex gap-2.5 flex-wrap">
                    <div class="px-3.5 py-2.5 rounded-full bg-[#f8fafc] border border-[#e5e7eb] text-[#475569] text-[13px] font-bold">
                        United States
                    </div>
                    <div class="px-3.5 py-2.5 rounded-full bg-[#f8fafc] border border-[#e5e7eb] text-[#475569] text-[13px] font-bold">
                        Canada
                    </div>
                    <div class="px-3.5 py-2.5 rounded-full bg-[#f8fafc] border border-[#e5e7eb] text-[#475569] text-[13px] font-bold">
                        Saudi Arabia
                    </div>
                    <div class="px-3.5 py-2.5 rounded-full bg-[#f8fafc] border border-[#e5e7eb] text-[#475569] text-[13px] font-bold">
                        UAE
                    </div>
                </div>

                <a href="{{route('home.reviews',['lang'=>request()->route('lang')])}}" class="min-h-14 px-7 rounded-full bg-[#0f172a] text-white no-underline inline-flex items-center justify-center font-black shadow-[0_18px_40px_rgba(15,23,42,.08)] w-full lg:w-auto">
                    Browse all reviews
                </a>

            </div>

        </div>

    </div>
</section>

<!-- HOW IT WORKS -->
<section class="px-5 py-12 bg-[radial-gradient(circle_at_top_left,rgba(37,99,235,.06),transparent_32%),#ffffff] text-[#0f172a]" id="how-it-works">
    <div class="max-w-[1160px] mx-auto">

        <div class="text-center max-w-[780px] mx-auto mb-[70px]">


            <h2 class="text-[60px] lg:text-[clamp(48px,8vw,92px)] leading-[0.88] tracking-[-0.09em] mb-[22px] font-extrabold">
                Clear steps before you start.
            </h2>

            <p class="text-lg lg:text-[22px] leading-[1.7] text-[#64748b]">
                Know exactly what happens after joining — no confusion, no waiting,
                and no need to contact support to understand the next step.
            </p>
        </div>

        <div class="relative max-w-[940px] mx-auto before:absolute before:left-[27px] lg:before:left-[39px] before:top-[18px] before:bottom-[18px] before:w-[2px] before:bg-[#e5e7eb]">

            <div class="relative grid grid-cols-[56px_1fr] lg:grid-cols-[80px_1fr] gap-4 lg:gap-[26px] pb-7 lg:pb-[38px]">

                <div class="relative z-[2] w-14 h-14 lg:w-20 lg:h-20 rounded-full bg-[#0f172a] text-white grid place-items-center text-xl lg:text-[26px] font-black tracking-[-0.04em] shadow-[0_18px_38px_rgba(15,23,42,.13)]">
                    1
                </div>

                <div class="p-[22px] lg:p-[30px_32px] border border-[#e5e7eb] rounded-[24px] lg:rounded-[30px] bg-white shadow-[0_16px_46px_rgba(15,23,42,.045)]">

                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-[18px] mb-[14px]">
                        <h3 class="text-[32px] lg:text-[clamp(30px,4vw,46px)] leading-[0.94] tracking-[-0.065em] font-extrabold">
                            Join
                        </h3>

                        <div class="px-3 py-2 rounded-full bg-[#f8fafc] border border-[#e5e7eb] text-[#64748b] text-xs font-extrabold w-fit">
                            Step 1
                        </div>
                    </div>

                    <p class="text-[#64748b] text-[16.5px] leading-[1.75] max-w-[700px]">
                        Create your account and get access to your membership area.
                    </p>

                    <div class="mt-[18px] flex flex-wrap gap-2.5">
                        <div class="px-3 py-[9px] rounded-full bg-[#f8fafc] text-[#475569] border border-[#e5e7eb] text-[13px] font-[750]">
                            Account access
                        </div>

                        <div class="px-3 py-[9px] rounded-full bg-[#f8fafc] text-[#475569] border border-[#e5e7eb] text-[13px] font-[750]">
                            Membership area
                        </div>

                        <div class="px-3 py-[9px] rounded-full bg-[#f8fafc] text-[#475569] border border-[#e5e7eb] text-[13px] font-[750]">
                            Next steps shown inside
                        </div>
                    </div>

                </div>

            </div>

            <div class="relative grid grid-cols-[56px_1fr] lg:grid-cols-[80px_1fr] gap-4 lg:gap-[26px] pb-7 lg:pb-[38px]">

                <div class="relative z-[2] w-14 h-14 lg:w-20 lg:h-20 rounded-full bg-[#0f172a] text-white grid place-items-center text-xl lg:text-[26px] font-black tracking-[-0.04em] shadow-[0_18px_38px_rgba(15,23,42,.13)]">
                    2
                </div>

                <div class="p-[22px] lg:p-[30px_32px] border border-[#e5e7eb] rounded-[24px] lg:rounded-[30px] bg-white shadow-[0_16px_46px_rgba(15,23,42,.045)]">

                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-[18px] mb-[14px]">
                        <h3 class="text-[32px] lg:text-[clamp(30px,4vw,46px)] leading-[0.94] tracking-[-0.065em] font-extrabold">
                            Take your placement test
                        </h3>

                        <div class="px-3 py-2 rounded-full bg-[#f8fafc] border border-[#e5e7eb] text-[#64748b] text-xs font-extrabold w-fit">
                            Step 2
                        </div>
                    </div>

                    <p class="text-[#64748b] text-[16.5px] leading-[1.75] max-w-[700px]">
                        Complete the online placement test so we can determine your level from A1 to C1.
                    </p>

                    <div class="mt-[18px] flex flex-wrap gap-2.5">
                        <div class="px-3 py-[9px] rounded-full bg-[#f8fafc] text-[#475569] border border-[#e5e7eb] text-[13px] font-[750]">
                            Online test
                        </div>

                        <div class="px-3 py-[9px] rounded-full bg-[#f8fafc] text-[#475569] border border-[#e5e7eb] text-[13px] font-[750]">
                            Level result
                        </div>

                        <div class="px-3 py-[9px] rounded-full bg-[#f8fafc] text-[#475569] border border-[#e5e7eb] text-[13px] font-[750]">
                            Right group match
                        </div>
                    </div>

                </div>

            </div>

            <div class="relative grid grid-cols-[56px_1fr] lg:grid-cols-[80px_1fr] gap-4 lg:gap-[26px] pb-7 lg:pb-[38px]">

                <div class="relative z-[2] w-14 h-14 lg:w-20 lg:h-20 rounded-full bg-[#0f172a] text-white grid place-items-center text-xl lg:text-[26px] font-black tracking-[-0.04em] shadow-[0_18px_38px_rgba(15,23,42,.13)]">
                    3
                </div>

                <div class="p-[22px] lg:p-[30px_32px] border border-[#e5e7eb] rounded-[24px] lg:rounded-[30px] bg-white shadow-[0_16px_46px_rgba(15,23,42,.045)]">

                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-[18px] mb-[14px]">
                        <h3 class="text-[32px] lg:text-[clamp(30px,4vw,46px)] leading-[0.94] tracking-[-0.065em] font-extrabold">
                            Choose your group
                        </h3>

                        <div class="px-3 py-2 rounded-full bg-[#f8fafc] border border-[#e5e7eb] text-[#64748b] text-xs font-extrabold w-fit">
                            Step 3
                        </div>
                    </div>

                    <p class="text-[#64748b] text-[16.5px] leading-[1.75] max-w-[700px]">
                        Once your level is ready, choose up to 2 groups based on your level and schedule.
                    </p>

                    <div class="mt-[18px] flex flex-wrap gap-2.5">
                        <div class="px-3 py-[9px] rounded-full bg-[#f8fafc] text-[#475569] border border-[#e5e7eb] text-[13px] font-[750]">
                            Level-based groups
                        </div>

                        <div class="px-3 py-[9px] rounded-full bg-[#f8fafc] text-[#475569] border border-[#e5e7eb] text-[13px] font-[750]">
                            Choose schedule
                        </div>

                        <div class="px-3 py-[9px] rounded-full bg-[#f8fafc] text-[#475569] border border-[#e5e7eb] text-[13px] font-[750]">
                            Up to 2 groups
                        </div>
                    </div>

                </div>

            </div>

            <div class="relative grid grid-cols-[56px_1fr] lg:grid-cols-[80px_1fr] gap-4 lg:gap-[26px]">

                <div class="relative z-[2] w-14 h-14 lg:w-20 lg:h-20 rounded-full bg-[#0f172a] text-white grid place-items-center text-xl lg:text-[26px] font-black tracking-[-0.04em] shadow-[0_18px_38px_rgba(15,23,42,.13)]">
                    4
                </div>

                <div class="p-[22px] lg:p-[30px_32px] border border-[#e5e7eb] rounded-[24px] lg:rounded-[30px] bg-white shadow-[0_16px_46px_rgba(15,23,42,.045)]">

                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-[18px] mb-[14px]">
                        <h3 class="text-[32px] lg:text-[clamp(30px,4vw,46px)] leading-[0.94] tracking-[-0.065em] font-extrabold">
                            Start practicing
                        </h3>

                        <div class="px-3 py-2 rounded-full bg-[#f8fafc] border border-[#e5e7eb] text-[#64748b] text-xs font-extrabold w-fit">
                            Step 4
                        </div>
                    </div>

                    <p class="text-[#64748b] text-[16.5px] leading-[1.75] max-w-[700px]">
                        Join conversation rooms daily, attend your live group classes, and improve every week.
                    </p>

                    <div class="mt-[18px] flex flex-wrap gap-2.5">
                        <div class="px-3 py-[9px] rounded-full bg-[#f8fafc] text-[#475569] border border-[#e5e7eb] text-[13px] font-[750]">
                            Daily conversation room
                        </div>

                        <div class="px-3 py-[9px] rounded-full bg-[#f8fafc] text-[#475569] border border-[#e5e7eb] text-[13px] font-[750]">
                            Live group classes
                        </div>

                        <div class="px-3 py-[9px] rounded-full bg-[#f8fafc] text-[#475569] border border-[#e5e7eb] text-[13px] font-[750]">
                            Weekly progress
                        </div>
                    </div>

                </div>

            </div>

        </div>



    </div>
</section>



<!-- VIDEO -->
<section class="py-24 px-6" >

    <div class="max-w-5xl mx-auto text-center">

        <h2 class="text-4xl font-bold mb-5">
            See Inside The Platform
        </h2>

        <p class="text-gray-400 text-lg mb-12">
            Watch how students practice English online.
        </p>

        <div class="glass rounded-3xl p-4">

            <div class="aspect-square bg-black rounded-2xl flex items-center justify-center">

                <button class="w-24 h-24 rounded-full gradient text-4xl">
                    ▶️
                </button>

            </div>

        </div>

    </div>

</section>
<section class="min-h-screen flex items-center bg-[#f7f9fc] px-5 py-12 text-[#111827]"  id="membership-section">
    <div class="w-full max-w-[1060px] mx-auto">
        <div>


            <h1 class="max-w-[620px] text-[46px] lg:text-[clamp(42px,6vw,72px)] leading-none tracking-[-0.045em] lg:tracking-[-0.055em] text-[#0f172a] mb-[22px] font-extrabold">
                Don’t Study English Alone
            </h1>

            <p class="max-w-[560px] text-lg lg:text-xl leading-[1.65] text-[#475569]">
                For <strong class="text-[#0f172a] font-extrabold">$35/month</strong>, students can practice more, speak more,
                and stay connected to English every day.
            </p>

            <div class="mt-[30px] grid gap-3">
                <div class="flex items-center gap-2.5 text-[#475569] text-[15px]">
                    <div class="w-[22px] h-[22px] rounded-full bg-[#eefcf5] text-[#00a36c] grid place-items-center text-[13px] font-black shrink-0">✓</div>
                    Start with your placement test
                </div>

                <div class="flex items-center gap-2.5 text-[#475569] text-[15px]">
                    <div class="w-[22px] h-[22px] rounded-full bg-[#eefcf5] text-[#00a36c] grid place-items-center text-[13px] font-black shrink-0">✓</div>
                    Join live English practice groups
                </div>

                <div class="flex items-center gap-2.5 text-[#475569] text-[15px]">
                    <div class="w-[22px] h-[22px] rounded-full bg-[#eefcf5] text-[#00a36c] grid place-items-center text-[13px] font-black shrink-0">✓</div>
                    Practice online every week
                </div>
            </div>
        </div>

        <div class=" rounded-3xl p-5 lg:p-6 max-w-[480px] w-full">

            <div class="mb-[22px]" >
                <small class="block text-[#64748b] text-sm mb-2">
                    Membership price
                </small>

                <div class="flex items-end gap-2">
                    <strong class="text-[50px] lg:text-[56px] leading-[0.9] tracking-[-0.055em] text-[#0f172a] font-black">
                        $35
                    </strong>

                    <span class="text-[#64748b] text-lg pb-1.5">
              / month
            </span>
                </div>
            </div>

            <div class="mb-3.5">
                <label class="block text-[#334155] text-sm font-bold mb-2">
                    Full name
                </label>

                <input
                        type="text"
                        placeholder="Enter your full name"
                        class="w-full h-14 rounded-2xl border border-[#dbe3ef] bg-white px-4 text-[#0f172a] text-base outline-none placeholder:text-[#94a3b8] focus:border-[#94a3b8]"
                >
            </div>

            <div class="mb-3.5">
                <label class="block text-[#334155] text-sm font-bold mb-2">
                    Phone number
                </label>

                <input
                        type="text"
                        placeholder="Enter your phone number"
                        class="w-full h-14 rounded-2xl border border-[#dbe3ef] bg-white px-4 text-[#0f172a] text-base outline-none placeholder:text-[#94a3b8] focus:border-[#94a3b8]"
                >
            </div>

            <button class="w-full h-[58px] border-0 rounded-2xl bg-[#0f172a] text-white text-base font-black cursor-pointer mt-1">
                Start Membership for $35
            </button>

            <div class="mt-3.5 text-center text-[#64748b] text-[13px] leading-[1.55]">
                No long-term contract. Start with your placement test.
            </div>

        </div>



    </div>
</section>
<section class="py-12" id="faq">
    <div class="mx-auto w-full max-w-[1120px] px-[18px]">
        <div class="mx-auto mb-10 max-w-[760px] text-center">
            <h2 class="mb-3.5 text-[clamp(32px,5vw,52px)] font-black leading-[1.02] tracking-[-0.055em]">Questions before joining?</h2>
        </div>

        <div class="mx-auto grid max-w-[860px] gap-3.5">
            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]" open>
                <summary class="cursor-pointer text-lg font-extrabold">Is this a private class?</summary>
                <p class="mt-3 text-[#b9c6d8]">No. This is an English Practice Membership. It includes conversation rooms, practice groups, materials, and community access. Private classes are separate.</p>
            </details>

            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]">
                <summary class="cursor-pointer text-lg font-extrabold">Is this good for beginners?</summary>
                <p class="mt-3 text-[#b9c6d8]">Yes. Beginners can use the materials and join appropriate practice groups. Students should not worry about speaking perfectly.</p>
            </details>

            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]">
                <summary class="cursor-pointer text-lg font-extrabold">Do teachers join the practice groups?</summary>
                <p class="mt-3 text-[#b9c6d8]">Yes. Practice groups are teacher-led, but they are not the same as private lessons. The focus is practice, topics, vocabulary, and confidence.</p>
            </details>

            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]">
                <summary class="cursor-pointer text-lg font-extrabold">Can I upgrade later?</summary>
                <p class="mt-3 text-[#b9c6d8]">Yes. If you want a fixed teacher, private lessons, small-group classes, homework correction, or a structured plan, you can upgrade later.</p>
            </details>

            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]">
                <summary class="cursor-pointer text-lg font-extrabold">Can I cancel anytime?</summary>
                <p class="mt-3 text-[#b9c6d8]">Yes. The membership is monthly and flexible.</p>
            </details>
            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]">
                <summary class="cursor-pointer text-lg font-extrabold">Is the trial class really free?</summary>
                <p class="mt-3 text-[#b9c6d8]">Yes, at Boston English Center, the trial class is 100% free — with no obligation to continue afterward.</p>
            </details>

            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]">
                <summary class="cursor-pointer text-lg font-extrabold">What happens after the trial?</summary>
                <div class="mt-3 space-y-3 text-[#b9c6d8]">
                    <p>Step-by-Step After the Trial:</p>
                    <p>You Receive Feedback</p>
                    <p>You’ll get a report from the teacher about your level, strengths, and areas to improve — plus a free level certificate.</p>
                </div>
            </details>

            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]">
                <summary class="cursor-pointer text-lg font-extrabold">Are the teachers native?</summary>
                <p class="mt-3 text-[#b9c6d8]">At Boston English Center, most of our teachers are highly qualified bilingual instructors who specialize in teaching English to Arabic-speaking students.</p>
            </details>

            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]">
                <summary class="cursor-pointer text-lg font-extrabold">How do I schedule classes?</summary>
                <p class="mt-3 text-[#b9c6d8]">After payment, one of our advisors will contact you via WhatsApp or email to help you choose the best time and match you with the right group or teacher.</p>
            </details>

            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]">
                <summary class="cursor-pointer text-lg font-extrabold">What age groups do you teach?</summary>
                <p class="mt-3 text-[#b9c6d8]">We teach pre-teens, young teens, and adults. Students are grouped by both age and level to ensure the best learning experience.</p>
            </details>

            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]">
                <summary class="cursor-pointer text-lg font-extrabold">How do I know my English level?</summary>
                <p class="mt-3 text-[#b9c6d8]">You can take our free online placement test and receive a level certificate immediately. Your teacher can also evaluate your speaking during the trial class.</p>
            </details>

            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]">
                <summary class="cursor-pointer text-lg font-extrabold">How long is the course?</summary>
                <p class="mt-3 text-[#b9c6d8]">Each English level is designed to be completed in 3 months. Most students attend 2–3 sessions per week, with each session lasting 1 hour.</p>
            </details>

            <details class="rounded-[18px] border border-white/10 bg-white/5 px-5 py-[18px]">
                <summary class="cursor-pointer text-lg font-extrabold">Can I become fluent?</summary>
                <p class="mt-3 text-[#b9c6d8]">Yes. With consistent practice, structured lessons, and speaking sessions, many students reach strong fluency within 9–12 months.</p>
            </details>
        </div>
    </div>
</section>

<footer class="border-t border-white/10 py-7 text-sm text-[#b9c6d8]">
    <div class="mx-auto flex w-full max-w-[1120px] px-[18px] flex-wrap justify-between gap-5">
        <div>© Boston English Center</div>
        <div>English Practice Membership • $35/month • Cancel anytime</div>
    </div>
</footer>

<!-- FINAL CTA -->
<script>
    document.querySelectorAll('.video-card').forEach((card) => {
        const video = card.querySelector('video');
        const playBtn = card.querySelector('.play-btn');

        card.addEventListener('click', () => {
            document.querySelectorAll('.video-card video').forEach((otherVideo) => {
                if (otherVideo !== video) otherVideo.pause();
            });

            if (video.paused) {
                video.play();
                playBtn.style.display = 'none';
            } else {
                video.pause();
                playBtn.style.display = 'grid';
            }
        });

        video.addEventListener('play', () => {
            playBtn.style.display = 'none';
        });

        video.addEventListener('pause', () => {
            playBtn.style.display = 'grid';
        });
    });

</script>
</body>
</html>
