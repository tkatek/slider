@php
    $baseUrl = 'https://remtoo.net';

    $materials = [
        'title' => 'A1 Beginner Curriculum',
        'subtitle' => 'Select a unit, preview lessons',

        'units' => [
            // ===================== UNIT 1 =====================
            [
                'id' => 'unit1',
                'label' => 'Unit 1',
                'name' => 'About Me',
                'tab_line' => 'Meet & Greet • Resume • Interview',
                'level' => 'A1',
                'image' => asset('slider/landing-page/units/unit1.webp'),
                'lessons' => [
                    [
                        'title' => 'Meet and Greet',
                        'desc' => 'Introductions and greetings.',
                        'list_title' => 'Lesson 1 — Meet and Greet',
                        'list_subtitle' => 'Hello • Nice to meet you',
                        'img' => asset('slider/landing-page/u1-lesson-1.webp'),
                        'thumb' => asset('slider/landing-page/u1-lesson-1.webp'),
                        'href' => $baseUrl . '/slider/16744',
                    ],
                    [
                        'title' => 'My Information & My Resume',
                        'desc' => 'Personal details and résumé basics.',
                        'list_title' => 'Lesson 2 — My Information & My Resume',
                        'list_subtitle' => 'Name • Address • Experience',
                        'img' => asset('slider/landing-page/u1-lesson-2.webp'),
                        'thumb' => asset('slider/landing-page/u1-lesson-2.webp'),
                        'href' => $baseUrl . '/slider/16745',
                    ],
                    [
                        'title' => 'Job Interview',
                        'desc' => 'Common interview questions and answers.',
                        'list_title' => 'Lesson 3 — Job Interview',
                        'list_subtitle' => 'Tell me about yourself',
                        'img' => asset('slider/landing-page/u1-lesson-3.webp'),
                        'thumb' => asset('slider/landing-page/u1-lesson-3.webp'),
                        'href' => $baseUrl . '/slider/16746',
                    ],
                ],
            ],

            // ===================== UNIT 2 =====================
            [
                'id' => 'unit2',
                'label' => 'Unit 2',
                'name' => 'Family and Daily Life',
                'tab_line' => 'Family • Home • Routine',
                'level' => 'A1',
                'image' => asset('slider/landing-page/units/unit2.webp'),
                'lessons' => [
                    [
                        'title' => 'My Family',
                        'desc' => 'Talk about family members.',
                        'list_title' => 'Lesson 1 — My Family',
                        'list_subtitle' => 'Parents • Siblings • Relatives',
                        'img' => asset('slider/landing-page/u2-lesson-1.webp'),
                        'thumb' => asset('slider/landing-page/u2-lesson-1.webp'),
                        'href' => $baseUrl . '/slider/16747',
                    ],
                    [
                        'title' => 'My Home',
                        'desc' => 'Rooms and furniture.',
                        'list_title' => 'Lesson 2 — My Home',
                        'list_subtitle' => 'Kitchen • Bedroom • Living room',
                        'img' => asset('slider/landing-page/u2-lesson-2.webp'),
                        'thumb' => asset('slider/landing-page/u2-lesson-2.webp'),
                        'href' => $baseUrl . '/slider/16748',
                    ],
                    [
                        'title' => 'A Day in My Life',
                        'desc' => 'Daily routine and time.',
                        'list_title' => 'Lesson 3 — A Day in My Life',
                        'list_subtitle' => 'Wake up • Work • Sleep',
                        'img' => asset('slider/landing-page/u2-lesson-3.webp'),
                        'thumb' => asset('slider/landing-page/u2-lesson-3.webp'),
                        'href' => $baseUrl . '/slider/16749',
                    ],
                ],
            ],

            // ===================== UNIT 3 =====================
            [
                'id' => 'unit3',
                'label' => 'Unit 3',
                'name' => 'Around Town',
                'tab_line' => 'Directions • Transport • Shopping',
                'level' => 'A1',
                'image' => asset('slider/landing-page/units/unit3.webp'),
                'lessons' => [
                    [
                        'title' => 'Where’s the Bank?',
                        'desc' => 'Asking for directions.',
                        'list_title' => 'Lesson 1 — Where’s the Bank?',
                        'list_subtitle' => 'Near • Far • Turn left/right',
                        'img' => asset('slider/landing-page/u3-lesson-1.webp'),
                        'thumb' => asset('slider/landing-page/u3-lesson-1.webp'),
                        'href' => $baseUrl . '/slider/16750',
                    ],
                    [
                        'title' => 'How Do You Go to Work?',
                        'desc' => 'Transportation and routine.',
                        'list_title' => 'Lesson 2 — How Do You Go to Work?',
                        'list_subtitle' => 'Bus • Train • Drive • Walk',
                        'img' => asset('slider/landing-page/u3-lesson-2.webp'),
                        'thumb' => asset('slider/landing-page/u3-lesson-2.webp'),
                        'href' => $baseUrl . '/slider/16751',
                    ],
                    [
                        'title' => 'At the Supermarket',
                        'desc' => 'Shopping basics.',
                        'list_title' => 'Lesson 3 — At the Supermarket',
                        'list_subtitle' => 'Prices • Items • Where is…?',
                        'img' => asset('slider/landing-page/u3-lesson-3.webp'),
                        'thumb' => asset('slider/landing-page/u3-lesson-3.webp'),
                        'href' => $baseUrl . '/slider/16752',
                    ],
                ],
            ],

            // ===================== UNIT 4 =====================
            [
                'id' => 'unit4',
                'label' => 'Unit 4',
                'name' => 'Home and Daily Needs',
                'tab_line' => 'Shopping • Problems • Bills',
                'level' => 'A1',
                'image' => asset('slider/landing-page/units/unit4.webp'),
                'lessons' => [
                    [
                        'title' => 'Shopping at the Mall',
                        'desc' => 'Clothes, sizes, and getting help.',
                        'list_title' => 'Lesson 1 — Shopping at the Mall',
                        'list_subtitle' => 'Sizes • Colors • How much…?',
                        'img' => asset('slider/landing-page/u4-lesson-1.webp'),
                        'thumb' => asset('slider/landing-page/u4-lesson-1.webp'),
                        'href' => $baseUrl . '/slider/16753',
                    ],
                    [
                        'title' => 'House Issues',
                        'desc' => 'Common home problems.',
                        'list_title' => 'Lesson 2 — House Issues',
                        'list_subtitle' => 'Broken • Clogged • Loud',
                        'img' => asset('slider/landing-page/u4-lesson-2.webp'),
                        'thumb' => asset('slider/landing-page/u4-lesson-2.webp'),
                        'href' => $baseUrl . '/slider/16754',
                    ],
                    [
                        'title' => 'Paying Bills',
                        'desc' => 'Utility bills and payments.',
                        'list_title' => 'Lesson 3 — Paying Bills',
                        'list_subtitle' => 'Electricity • Water • Due date',
                        'img' => asset('slider/landing-page/u4-lesson-3.webp'),
                        'thumb' => asset('slider/landing-page/u4-lesson-3.webp'),
                        'href' => $baseUrl . '/slider/16755',
                    ],
                ],
            ],
        ],
    ];
@endphp

        <!doctype html>
<html lang="en" class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Boston English Center | Teach English Online</title>

    <!-- Theme bootstrap (runs before paint to prevent flash) -->
    <script>
        (function () {
            const saved = localStorage.getItem("theme");
            const prefersDark = window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches;
            const useDark = saved ? saved === "dark" : prefersDark;
            document.documentElement.classList.toggle("dark", useDark);
        })();
    </script>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>

    <!-- Tailwind (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    fontFamily: { sans: ["Manrope", "ui-sans-serif", "system-ui"] },
                    borderRadius: { blob: "28px" },
                    colors: {
                        brandPurple: "#7C3AED",
                        brandOrange: "#F97316",
                    },
                    boxShadow: {
                        soft: "0 18px 50px rgba(0,0,0,.08)",
                        softDark: "0 18px 50px rgba(0,0,0,.45)",
                    },
                },
            },
        };
    </script>

    <style>
        :root {
            --bg: #f4f6ff;
            --surface: rgba(255, 255, 255, 0.78);
            --card: rgba(255, 255, 255, 0.92);

            --text: #0b1220;
            --muted: rgba(11, 18, 32, 0.68);

            --border: rgba(11, 18, 32, 0.12);
            --borderStrong: rgba(11, 18, 32, 0.18);

            --ring: rgba(124, 58, 237, 0.28);
            --ringDark: rgba(167, 139, 250, 0.35);

            --shadowLift: 0 22px 70px rgba(0, 0, 0, 0.12);

            --p1: #dfe6ff;
            --p2: #ffd4e5;
            --p3: #fff2a8;
            --p4: #def3cf;
            --p5: #e8e6ff;

            --applyImg: url("{{ asset('slider/landing-page/hero-image.webp') }}");
        }

        .dark {
            --bg: #0b1024;
            --surface: rgba(22, 25, 46, 0.84);
            --card: rgba(30, 34, 62, 0.88);

            --text: rgba(255, 255, 255, 0.96);
            --muted: rgba(231, 233, 255, 0.74);

            --border: rgba(167, 139, 250, 0.16);
            --borderStrong: rgba(167, 139, 250, 0.24);

            --ringDark: rgba(167, 139, 250, 0.45);

            --p1: rgba(124, 58, 237, 0.22);
            --p2: rgba(192, 132, 252, 0.18);
            --p3: rgba(99, 102, 241, 0.18);
            --p4: rgba(167, 139, 250, 0.14);
            --p5: rgba(236, 72, 153, 0.10);
        }

        html { color-scheme: light dark; }
        * { -webkit-tap-highlight-color: transparent; }

        .noise {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='180' height='180'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='180' height='180' filter='url(%23n)' opacity='.20'/%3E%3C/svg%3E");
        }

        @keyframes floaty {
            0%, 100% { transform: translate3d(0, 0, 0); }
            50% { transform: translate3d(0, -10px, 0); }
        }
        .pointer-events-none.fixed.inset-0.-z-10 > div.blur-3xl { animation: floaty 10s ease-in-out infinite; }
        .pointer-events-none.fixed.inset-0.-z-10 > div.blur-3xl:nth-child(2) {
            animation-duration: 13s;
            animation-delay: -2s;
        }

        :where(a, button, input, textarea, summary):focus-visible {
            outline: none;
            box-shadow: 0 0 0 4px var(--ring);
        }
        .dark :where(a, button, input, textarea, summary):focus-visible {
            box-shadow: 0 0 0 4px var(--ringDark);
        }

        :where(a, button) {
            transition: transform 180ms cubic-bezier(0.16, 1, 0.3, 1),
            box-shadow 180ms cubic-bezier(0.16, 1, 0.3, 1),
            background-color 180ms cubic-bezier(0.16, 1, 0.3, 1),
            color 180ms cubic-bezier(0.16, 1, 0.3, 1),
            border-color 180ms cubic-bezier(0.16, 1, 0.3, 1),
            opacity 180ms cubic-bezier(0.16, 1, 0.3, 1);
        }
        :where(a, button):active { transform: translateY(1px) scale(0.99); }

        .dark p.text-slate-600 { color: rgba(255, 255, 255, 0.68) !important; }

        /* =========================
           Curriculum UX + Unit Colors
        ========================== */
        .unit-tab {
            cursor: pointer;
            will-change: transform, box-shadow, filter;
        }

        .unit-media-overlay {
            background: linear-gradient(
                    180deg,
                    rgba(var(--unitAccentRgb), 0.28) 0%,
                    rgba(0,0,0,0.35) 45%,
                    rgba(0,0,0,0.78) 100%
            );
        }
        .dark .unit-media-overlay {
            background: linear-gradient(
                    180deg,
                    rgba(var(--unitAccentRgb), 0.30) 0%,
                    rgba(0,0,0,0.40) 45%,
                    rgba(0,0,0,0.80) 100%
            );
        }

        .unit-tab::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(
                    circle at 20% 15%,
                    rgba(var(--unitAccentRgb), 0.35),
                    transparent 55%
            );
            opacity: 0;
            transition: opacity 220ms cubic-bezier(0.16, 1, 0.3, 1);
            pointer-events: none;
        }
        .unit-tab:hover::before { opacity: 1; }

        .unit-tab.is-active {
            transform: translateY(-2px) scale(1.03);
            filter: saturate(1.08) contrast(1.05);
            box-shadow:
                    0 0 0 6px rgba(var(--unitAccentRgb), 0.75),
                    0 18px 70px rgba(var(--unitAccentRgb), 0.35);
        }
        .dark .unit-tab.is-active {
            box-shadow:
                    0 0 0 6px rgba(var(--unitAccentRgb), 0.78),
                    0 22px 80px rgba(0,0,0,0.55);
        }

        @media (max-width: 640px) {
            .unit-tab.is-active {
                transform: translateY(-1px) scale(1.01);
                box-shadow:
                        0 0 0 4px rgba(var(--unitAccentRgb), 0.68),
                        0 14px 50px rgba(var(--unitAccentRgb), 0.26);
            }
        }

        .lesson-card { border: 1px solid rgba(var(--unitAccentRgb), 0.18); }
        .lesson-card:hover { box-shadow: 0 18px 55px rgba(var(--unitAccentRgb), 0.18); }
        .dark .lesson-card { border-color: rgba(var(--unitAccentRgb), 0.22); }

        .lesson-accent-strip {
            height: 4px;
            background: linear-gradient(90deg, rgba(var(--unitAccentRgb), 0.95), rgba(var(--unitAccentRgb), 0.45));
        }
        .lesson-chip {
            background: rgba(var(--unitAccentRgb), 0.55);
            border: 1px solid rgba(255,255,255,0.18);
        }

        /* Apply section */
        #apply {
            position: relative;
            overflow: hidden;
            background-image:
                    linear-gradient(
                            120deg,
                            rgba(124, 58, 237, 0.78),
                            rgba(99, 102, 241, 0.62),
                            rgba(12, 14, 30, 0.22)
                    ),
                    var(--applyImg);
            background-size: cover;
            background-position: center;
            border-top: 1px solid rgba(167, 139, 250, 0.18);
        }
        #apply::before {
            content: "";
            position: absolute;
            inset: -40%;
            background: radial-gradient(circle at 20% 10%, rgba(167, 139, 250, 0.35), transparent 55%);
            filter: blur(10px);
            opacity: 0.9;
            pointer-events: none;
        }
        #apply > * { position: relative; z-index: 1; }

        #apply form {
            border-radius: 28px;
            padding: 18px;
            background: rgba(0, 0, 0, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
        }
        #apply input, #apply textarea {
            background: rgba(255, 255, 255, 0.92);
            color: #0b1220;
            border: 1px solid rgba(11, 18, 32, 0.12);
            transition: box-shadow 180ms cubic-bezier(0.16, 1, 0.3, 1),
            border-color 180ms cubic-bezier(0.16, 1, 0.3, 1),
            transform 180ms cubic-bezier(0.16, 1, 0.3, 1);
        }
        #apply input::placeholder, #apply textarea::placeholder {
            color: rgba(11, 18, 32, 0.55);
            font-weight: 600;
        }
        #apply input:focus, #apply textarea:focus {
            border-color: rgba(124, 58, 237, 0.55);
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.22);
        }
        #apply button[type="submit"] {
            box-shadow: 0 16px 40px rgba(124, 58, 237, 0.35);
        }
        #apply button[type="submit"]:hover {
            transform: translateY(-1px) scale(1.01);
            box-shadow: 0 22px 60px rgba(124, 58, 237, 0.42);
        }

        /* Reveal animations */
        .reveal {
            opacity: 0;
            transform: translateY(14px);
            filter: blur(2px);
            transition: opacity 700ms cubic-bezier(0.16, 1, 0.3, 1),
            transform 700ms cubic-bezier(0.16, 1, 0.3, 1),
            filter 700ms cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .pointer-events-none.fixed.inset-0.-z-10 > div.blur-3xl { animation: none !important; }
            :where(a, button) { transition: none !important; }
            .reveal { opacity: 1 !important; transform: none !important; filter: none !important; transition: none !important; }
        }

        /* Scroll-to-top */
        #toTop {
            position: fixed;
            right: 12px;
            bottom: 12px;
            z-index: 50;
            opacity: 0;
            transform: translateY(10px) scale(0.98);
            pointer-events: none;
        }
        #toTop.is-visible {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }
    </style>
</head>

<body id="top" class="h-full font-sans text-[color:var(--text)] bg-[color:var(--bg)]">
<div class="pointer-events-none fixed inset-0 -z-10">
    <div class="absolute -top-28 -left-28 h-80 w-80 rounded-full bg-brandPurple/30 blur-3xl"></div>
    <div class="absolute -bottom-36 -right-28 h-96 w-96 rounded-full bg-brandOrange/20 blur-3xl"></div>
    <div class="absolute inset-0 noise opacity-[.05]"></div>
</div>

<div class="mx-auto max-w-[1440px] px-3 py-6 sm:px-6 sm:py-12">
    <main class="overflow-hidden rounded-blob bg-[color:var(--surface)] shadow-soft ring-1 ring-[color:var(--border)] backdrop-blur dark:shadow-softDark">

        <!-- HEADER -->
        <header class="px-4 pt-4 sm:px-10 sm:pt-8">
            <div class="flex items-center justify-between gap-3 sm:gap-4">
                <a
                        href="https://remtoo.net/landing-page"
                        class="inline-flex items-center rounded-full bg-black/5 px-2.5 py-2 ring-1 ring-black/10
                           dark:bg-white/5 dark:ring-white/10 hover:ring-black/20 dark:hover:ring-white/20"
                        aria-label="Boston English Center"
                >
                    <img
                            src="{{ asset('slider/landing-page/logo-dark.webp') }}"
                            alt="Boston English Center"
                            class="h-7 w-auto dark:hidden sm:h-8"
                            loading="lazy"
                    />
                    <img
                            src="{{ asset('slider/landing-page/logo-light.webp') }}"
                            alt="Boston English Center"
                            class="hidden h-7 w-auto dark:block sm:h-8"
                            loading="lazy"
                    />
                </a>

                <nav class="hidden items-center gap-8 text-sm font-semibold text-black/60 sm:flex dark:text-white/70">
                    <a href="#reasons" class="hover:text-black dark:hover:text-white">Curriculum</a>
                    <a href="#features" class="hover:text-black dark:hover:text-white">How it works</a>
                    <a href="#faq" class="hover:text-black dark:hover:text-white">FAQ</a>
                    <a href="#apply" class="hover:text-black dark:hover:text-white">Apply</a>
                </nav>

                <div class="flex items-center gap-2 sm:gap-3">
                    <button
                            id="themeToggle"
                            class="p-2 rounded-full bg-black/5 ring-1 ring-black/10 dark:bg-white/5 dark:ring-white/10 hover:ring-black/20 dark:hover:ring-white/20"
                            aria-label="Toggle theme"
                            title="Toggle theme"
                            type="button"
                    >
                        <svg class="hidden h-5 w-5 dark:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="4" />
                            <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41" />
                        </svg>
                        <svg class="h-5 w-5 dark:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" />
                        </svg>
                    </button>

                    <a
                            href="#apply"
                            class="rounded-full bg-black px-3 py-1.5 text-[11px] font-extrabold uppercase text-white
                                   dark:bg-white dark:text-black hover:shadow-[0_14px_40px_rgba(0,0,0,.18)] dark:hover:shadow-[0_18px_50px_rgba(0,0,0,.55)]
                                   sm:px-4 sm:py-2 sm:text-xs"
                    >
                        Apply
                    </a>
                </div>
            </div>
        </header>

        <!-- HERO -->
        <section class="px-4 pb-8 pt-6 sm:px-10 sm:pb-14 sm:pt-10">
            <div class="grid gap-4 sm:gap-6 lg:grid-cols-12">
                <div class="lg:col-span-7">
                    <div class="relative h-full overflow-hidden rounded-blob bg-[color:var(--p1)] p-5 ring-1 ring-black/10 dark:ring-white/10 sm:p-10">
                        <p class="text-[10px] font-extrabold uppercase tracking-wider text-brandPurple sm:text-xs">
                            Hiring Online ESL Teachers
                        </p>

                        <h1 class="mt-3 text-3xl font-black leading-[1.12] tracking-tight sm:mt-4 sm:text-6xl">
                            Teach English online.
                            <span class="block text-black/50 dark:text-white/40">We handle the prep.</span>
                        </h1>

                        <p class="mt-4 max-w-xl text-base font-medium text-black/65 dark:text-white/70 sm:mt-6 sm:text-lg">
                            Ready-to-teach slides, audio, and lesson flow—so you can focus on your students.
                        </p>

                        <div class="mt-6 flex flex-col gap-2.5 sm:mt-8 sm:flex-row sm:gap-3">
                            <a
                                    href="#apply"
                                    class="inline-flex items-center justify-center rounded-2xl bg-black px-5 py-3 text-sm font-extrabold text-white
                                           dark:bg-white dark:text-black hover:shadow-[0_18px_60px_rgba(0,0,0,.22)] dark:hover:shadow-[0_22px_70px_rgba(0,0,0,.55)]
                                           sm:px-8 sm:py-4"
                            >
                                Apply now →
                            </a>
                            <a
                                    href="#reasons"
                                    class="inline-flex items-center justify-center rounded-2xl bg-white/70 px-5 py-3 text-sm font-extrabold text-black ring-1 ring-black/10 hover:bg-white
                                           dark:bg-white/10 dark:text-white dark:ring-white/10 dark:hover:bg-white/15
                                           sm:px-8 sm:py-4"
                            >
                                Preview curriculum ↓
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 grid gap-4 sm:gap-6">
                    <div class="rounded-blob bg-[color:var(--p2)] overflow-hidden ring-1 ring-black/10 dark:ring-white/10">
                        <img
                                class="h-40 w-full object-cover sm:h-48"
                                src="{{ asset('slider/landing-page/hero-image.webp') }}"
                                alt="Teacher teaching online"
                                loading="lazy"
                        />
                        <div class="p-4 sm:p-6">
                            <p class="font-bold text-[13px] sm:text-sm">
                                “I save hours every week—just open a lesson and teach.”
                            </p>
                        </div>
                    </div>

                    <!-- ✅ Desktop/tablet only (hidden on mobile) -->
                    <div class="hidden sm:block rounded-blob bg-[color:var(--p3)] p-4 ring-1 ring-black/10 dark:ring-white/10 sm:p-6">
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-white/50 px-2.5 py-1 rounded-full text-[9px] font-bold dark:bg-white/10 sm:px-3 sm:text-[10px]">1:1 classes</span>
                            <span class="bg-white/50 px-2.5 py-1 rounded-full text-[9px] font-bold dark:bg-white/10 sm:px-3 sm:text-[10px]">International students</span>
                        </div>
                        <h3 class="mt-3 text-lg font-black sm:mt-4 sm:text-xl">Flexible schedule</h3>
                        <p class="text-[13px] opacity-80 sm:text-sm">Teach from anywhere, at times that work for you.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CURRICULUM -->
        <section class="px-4 py-12 sm:px-10 sm:py-14" id="reasons">
            @php
                $unitTheme = [
                    'unit1' => ['rgb' => '124,58,237'],
                    'unit2' => ['rgb' => '249,115,22'],
                    'unit3' => ['rgb' => '99,102,241'],
                    'unit4' => ['rgb' => '236,72,153'],
                ];
            @endphp

            <div class="mb-6 sm:mb-8">
                <h2 class="text-2xl font-black tracking-tight sm:text-4xl">{{ $materials['title'] }}</h2>
                <p class="mt-2 text-[13px] text-slate-600 dark:text-white/65 sm:text-base">{{ $materials['subtitle'] }}</p>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:gap-4 lg:grid-cols-4" role="tablist" aria-label="Units">
                @foreach($materials['units'] as $i => $unit)
                    @php $accentRgb = $unitTheme[$unit['id']]['rgb'] ?? '124,58,237'; @endphp

                    <button
                            type="button"
                            style="--unitAccentRgb: {{ $accentRgb }};"
                            class="unit-tab {{ $i === 0 ? 'is-active' : '' }} group relative overflow-hidden rounded-3xl transition ring-1 ring-black/10 dark:ring-white/10"
                            data-unit="{{ $unit['id'] }}"
                            role="tab"
                            aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                    >
                        <img
                                src="{{ $unit['image'] }}"
                                alt="{{ $unit['label'] }}"
                                class="h-18 w-full object-cover sm:h-28"
                                loading="lazy"
                        />

                        <div class="unit-media-overlay absolute inset-0"></div>

                        <div class="absolute bottom-2 left-2 right-2 sm:bottom-3 sm:left-3 sm:right-3">
                            <span
                                    class="inline-flex items-center rounded-full px-2 py-1 text-[9px] font-extrabold text-white backdrop-blur sm:px-2.5 sm:text-[10px]"
                                    style="background: rgba({{ $accentRgb }}, .80); border: 1px solid rgba(255,255,255,.22);"
                            >
                                {{ $unit['label'] }}
                            </span>

                            <div class="mt-1.5 text-[12px] font-black text-white sm:mt-2 sm:text-sm">
                                {{ $unit['name'] }}
                            </div>

                            <div class="mt-0.5 text-[10px] font-semibold text-white/80 truncate sm:text-[11px]">
                                {{ $unit['tab_line'] ?? '' }}
                            </div>
                        </div>
                    </button>
                @endforeach
            </div>

            <div class="mt-6 sm:mt-8">
                @foreach($materials['units'] as $i => $unit)
                    @php $accentRgb = $unitTheme[$unit['id']]['rgb'] ?? '124,58,237'; @endphp

                    <div
                            class="unit-panel {{ $i !== 0 ? 'hidden' : '' }}"
                            data-unit="{{ $unit['id'] }}"
                            role="tabpanel"
                            style="--unitAccentRgb: {{ $accentRgb }};"
                    >
                        <div class="mb-4 flex flex-col gap-2 sm:mb-5 sm:flex-row sm:items-end sm:justify-between">
                            <div class="flex items-center gap-2.5 sm:gap-3">
                                <span class="h-2.5 w-2.5 rounded-full sm:h-3 sm:w-3" style="background: rgb({{ $accentRgb }});"></span>
                                <h3 class="text-xl font-black tracking-tight sm:text-2xl">
                                    {{ $unit['label'] }} — {{ $unit['name'] }}
                                </h3>
                            </div>
                            <div class="text-[12px] font-semibold text-[color:var(--muted)] sm:text-sm">
                                {{ $unit['tab_line'] ?? '' }}
                            </div>
                        </div>

                        <div class="grid gap-4 sm:gap-5 sm:grid-cols-2 lg:grid-cols-3">
                            @forelse($unit['lessons'] as $j => $lesson)
                                @php $subtitle = $lesson['list_subtitle'] ?? $lesson['desc'] ?? ''; @endphp

                                <a
                                        href="{{ $lesson['href'] }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="lesson-card group overflow-hidden rounded-blob bg-[color:var(--card)] hover:-translate-y-[1px]"
                                        aria-label="Open {{ $unit['label'] }} Lesson {{ $j + 1 }}: {{ $lesson['title'] }}"
                                >
                                    <div class="lesson-accent-strip"></div>

                                    <div class="relative h-28 sm:h-44">
                                        <img
                                                src="{{ $lesson['img'] }}"
                                                alt="{{ $lesson['title'] }}"
                                                class="absolute inset-0 h-full w-full object-cover"
                                                loading="lazy"
                                        />
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>

                                        <div class="absolute left-3 bottom-3 right-3 sm:left-5 sm:bottom-5 sm:right-5 text-white">
                                            <span class="lesson-chip inline-flex items-center rounded-full px-2.5 py-1 text-[9px] font-extrabold sm:px-3 sm:text-[10px]">
                                                Lesson {{ $j + 1 }}
                                            </span>
                                            <h4 class="mt-1.5 text-base font-black leading-tight sm:mt-2 sm:text-xl">
                                                {{ $lesson['title'] }}
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="p-3 sm:p-6">
                                        <p class="text-[13px] font-black sm:text-sm">{{ $lesson['title'] }}</p>
                                        <p class="mt-1 text-[12px] font-semibold text-[color:var(--muted)] sm:text-sm">
                                            {{ $subtitle }}
                                        </p>

                                        <div class="mt-3 flex items-center justify-between sm:mt-5">
                                            <div class="flex gap-2">
                                                <span class="rounded-full bg-black/5 px-2.5 py-1 text-[9px] font-extrabold ring-1 ring-black/10 dark:bg-white/5 dark:ring-white/10 sm:px-3 sm:text-[10px]">
                                                    {{ $unit['level'] ?? 'A1' }}
                                                </span>
                                                <span
                                                        class="rounded-full px-2.5 py-1 text-[9px] font-extrabold sm:px-3 sm:text-[10px]"
                                                        style="background: rgba({{ $accentRgb }}, .14); border: 1px solid rgba({{ $accentRgb }}, .25);"
                                                >
                                                    {{ $unit['label'] }}
                                                </span>
                                            </div>

                                            <span
                                                    class="inline-flex items-center gap-2 text-[11px] font-extrabold text-white px-3 py-2 rounded-2xl ring-1 ring-white/10 sm:text-xs"
                                                    style="background: linear-gradient(90deg, rgba({{ $accentRgb }}, .95), rgba({{ $accentRgb }}, .65));"
                                            >
                                                Open →
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="rounded-blob bg-[color:var(--card)] p-6 ring-1 ring-[color:var(--border)] sm:p-8">
                                    <h4 class="text-lg font-black sm:text-xl">{{ $unit['label'] }} — {{ $unit['name'] }}</h4>
                                    <p class="mt-2 text-[13px] font-semibold text-[color:var(--muted)] sm:text-sm">
                                        Lessons will be added soon.
                                    </p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- AT A GLANCE -->
        <section class="px-4 pb-10 sm:px-10 sm:pb-12">
            <div class="rounded-blob bg-[color:var(--card)] p-5 ring-1 ring-[color:var(--border)] sm:p-10">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <h2 class="text-xl font-black tracking-tight sm:text-3xl">At a glance</h2>
                        <p class="mt-2 max-w-2xl text-[13px] font-semibold text-[color:var(--muted)] sm:text-sm">Sample metrics</p>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3 sm:mt-8 sm:gap-4 lg:grid-cols-3">
                    <div class="rounded-3xl bg-gradient-to-br from-brandPurple/15 to-white/60 p-4 ring-1 ring-black/10 dark:from-brandPurple/25 dark:to-white/5 dark:ring-white/10 sm:p-6">
                        <div class="text-xl font-black sm:text-2xl">500+</div>
                        <p class="mt-1.5 text-[12px] font-semibold text-slate-700 dark:text-white/70 sm:mt-2 sm:text-sm">Ready-to-teach lessons</p>
                    </div>
                    <div class="rounded-blob bg-[color:var(--card)] p-4 ring-1 ring-[color:var(--border)] sm:p-7">
                        <div class="text-xl font-black sm:text-2xl">4.8/5</div>
                        <p class="mt-1.5 text-[12px] font-semibold text-[color:var(--muted)] sm:mt-2 sm:text-sm">Teacher satisfaction</p>
                    </div>
                    <div class="rounded-blob bg-[color:var(--card)] p-4 ring-1 ring-[color:var(--border)] sm:p-7">
                        <div class="text-xl font-black sm:text-2xl">&lt; 48h</div>
                        <p class="mt-1.5 text-[12px] font-semibold text-[color:var(--muted)] sm:mt-2 sm:text-sm">Typical onboarding</p>
                    </div>
                    <div class="rounded-blob bg-[color:var(--card)] p-4 ring-1 ring-[color:var(--border)] sm:p-7">
                        <div class="text-xl font-black sm:text-2xl">A1–B2+</div>
                        <p class="mt-1.5 text-[12px] font-semibold text-[color:var(--muted)] sm:mt-2 sm:text-sm">Structured levels</p>
                    </div>
                    <div class="rounded-blob bg-[color:var(--card)] p-4 ring-1 ring-[color:var(--border)] sm:p-7">
                        <div class="text-xl font-black sm:text-2xl">Flexible</div>
                        <p class="mt-1.5 text-[12px] font-semibold text-[color:var(--muted)] sm:mt-2 sm:text-sm">Choose your hours</p>
                    </div>
                    <div class="rounded-blob bg-[color:var(--card)] p-4 ring-1 ring-[color:var(--border)] sm:p-7">
                        <div class="text-xl font-black sm:text-2xl">Support</div>
                        <p class="mt-1.5 text-[12px] font-semibold text-[color:var(--muted)] sm:mt-2 sm:text-sm">Responsive support</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ✅ MOBILE ONLY: move the yellow "Flexible schedule" card here -->
        <section class="px-4 -mt-6 pb-10 sm:hidden">
            <div class="rounded-blob bg-[color:var(--p3)] p-4 ring-1 ring-black/10 dark:ring-white/10">
                <div class="flex flex-wrap gap-2">
                    <span class="bg-white/50 px-2.5 py-1 rounded-full text-[9px] font-bold dark:bg-white/10">1:1 classes</span>
                    <span class="bg-white/50 px-2.5 py-1 rounded-full text-[9px] font-bold dark:bg-white/10">International students</span>
                </div>
                <h3 class="mt-3 text-lg font-black">Flexible schedule</h3>
                <p class="text-[13px] opacity-80">Teach from anywhere, at times that work for you.</p>
            </div>
        </section>

        <!-- FEATURES -->
        <section class="px-4 py-12 sm:px-10 sm:py-16" id="features">
            <div>
                <h2 class="text-2xl font-black tracking-tight sm:text-4xl">How it works</h2>
                <p class="mt-2 max-w-2xl text-[13px] font-semibold text-[color:var(--muted)] sm:mt-3 sm:text-sm">
                    A simple workflow, with support when you need it.
                </p>
            </div>

            <div class="mt-6 grid grid-cols-2 gap-3 sm:mt-10 sm:gap-5 lg:grid-cols-3">
                <article class="rounded-3xl bg-gradient-to-br from-brandPurple/15 to-white/60 p-4 ring-1 ring-black/10 dark:from-brandPurple/25 dark:to-white/5 dark:ring-white/10 sm:p-6">
                    <h3 class="text-base font-black sm:text-lg">Quick onboarding</h3>
                    <p class="mt-2 text-[12px] font-semibold text-[color:var(--muted)] sm:text-sm">Short walkthrough + demo lesson.</p>
                </article>

                <article class="rounded-blob bg-[color:var(--card)] p-4 ring-1 ring-[color:var(--border)] sm:p-7">
                    <h3 class="text-base font-black sm:text-lg">Teaching guides</h3>
                    <p class="mt-2 text-[12px] font-semibold text-[color:var(--muted)] sm:text-sm">Tips to extend each lesson.</p>
                </article>

                <article class="rounded-blob bg-[color:var(--card)] p-4 ring-1 ring-[color:var(--border)] sm:p-7">
                    <h3 class="text-base font-black sm:text-lg">Teacher community</h3>
                    <p class="mt-2 text-[12px] font-semibold text-[color:var(--muted)] sm:text-sm">Share resources and best practices.</p>
                </article>

                <article class="rounded-blob bg-[color:var(--card)] p-4 ring-1 ring-[color:var(--border)] sm:p-7">
                    <h3 class="text-base font-black sm:text-lg">Feedback & QA</h3>
                    <p class="mt-2 text-[12px] font-semibold text-[color:var(--muted)] sm:text-sm">Improve lesson delivery and outcomes.</p>
                </article>

                <article class="rounded-blob bg-[color:var(--card)] p-4 ring-1 ring-[color:var(--border)] sm:p-7">
                    <h3 class="text-base font-black sm:text-lg">Flexible scheduling</h3>
                    <p class="mt-2 text-[12px] font-semibold text-[color:var(--muted)] sm:text-sm">Set availability that fits your week.</p>
                </article>

                <article class="rounded-blob bg-[color:var(--card)] p-4 ring-1 ring-[color:var(--border)] sm:p-7">
                    <h3 class="text-base font-black sm:text-lg">Responsive support</h3>
                    <p class="mt-2 text-[12px] font-semibold text-[color:var(--muted)] sm:text-sm">We’re here when you need help.</p>
                </article>
            </div>
        </section>

        <!-- FAQ -->
        <section class="px-4 py-12 sm:px-10 sm:py-16" id="faq">
            <div>
                <h2 class="text-2xl font-black tracking-tight sm:text-4xl">FAQ</h2>
                <p class="mt-2 max-w-2xl text-[13px] font-semibold text-[color:var(--muted)] sm:mt-3 sm:text-sm">
                    Quick answers before you apply.
                </p>
            </div>

            <div class="mt-6 grid gap-3 sm:mt-10 sm:gap-4 lg:grid-cols-2">
                <details class="group rounded-blob bg-[color:var(--card)] ring-1 ring-[color:var(--border)] p-4 sm:p-6">
                    <summary class="cursor-pointer list-none flex items-start justify-between gap-4">
                        <span class="text-sm font-black sm:text-lg">Do I need teaching experience?</span>
                        <span class="mt-0.5 inline-flex h-7 w-7 items-center justify-center rounded-full bg-black/5 ring-1 ring-black/10 dark:bg-white/5 dark:ring-white/10 sm:h-8 sm:w-8">
                            <svg class="h-4 w-4 transition-transform group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 5v14M5 12h14"></path>
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-2 text-[12px] font-semibold text-[color:var(--muted)] sm:mt-3 sm:text-sm">
                        Experience helps, but it’s not required. We provide ready-to-teach materials and a simple lesson flow.
                    </p>
                </details>

                <details class="group rounded-blob bg-[color:var(--card)] ring-1 ring-[color:var(--border)] p-4 sm:p-6">
                    <summary class="cursor-pointer list-none flex items-start justify-between gap-4">
                        <span class="text-sm font-black sm:text-lg">What equipment do I need?</span>
                        <span class="mt-0.5 inline-flex h-7 w-7 items-center justify-center rounded-full bg-black/5 ring-1 ring-black/10 dark:bg-white/5 dark:ring-white/10 sm:h-8 sm:w-8">
                            <svg class="h-4 w-4 transition-transform group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 5v14M5 12h14"></path>
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-2 text-[12px] font-semibold text-[color:var(--muted)] sm:mt-3 sm:text-sm">
                        A stable internet connection, a laptop/desktop, and a clear microphone (camera recommended).
                    </p>
                </details>

                <details class="group rounded-blob bg-[color:var(--card)] ring-1 ring-[color:var(--border)] p-4 sm:p-6">
                    <summary class="cursor-pointer list-none flex items-start justify-between gap-4">
                        <span class="text-sm font-black sm:text-lg">Can I choose my schedule?</span>
                        <span class="mt-0.5 inline-flex h-7 w-7 items-center justify-center rounded-full bg-black/5 ring-1 ring-black/10 dark:bg-white/5 dark:ring-white/10 sm:h-8 sm:w-8">
                            <svg class="h-4 w-4 transition-transform group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 5v14M5 12h14"></path>
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-2 text-[12px] font-semibold text-[color:var(--muted)] sm:mt-3 sm:text-sm">
                        Yes. You set your availability and teach within the hours you choose.
                    </p>
                </details>

                <details class="group rounded-blob bg-[color:var(--card)] ring-1 ring-[color:var(--border)] p-4 sm:p-6">
                    <summary class="cursor-pointer list-none flex items-start justify-between gap-4">
                        <span class="text-sm font-black sm:text-lg">How do I start?</span>
                        <span class="mt-0.5 inline-flex h-7 w-7 items-center justify-center rounded-full bg-black/5 ring-1 ring-black/10 dark:bg-white/5 dark:ring-white/10 sm:h-8 sm:w-8">
                            <svg class="h-4 w-4 transition-transform group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 5v14M5 12h14"></path>
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-2 text-[12px] font-semibold text-[color:var(--muted)] sm:mt-3 sm:text-sm">
                        Click “Apply”, submit your details, and we’ll follow up with next steps.
                    </p>
                </details>
            </div>
        </section>

        <!-- APPLY -->
        <section id="apply" class="px-4 py-12 sm:px-10 sm:py-16 bg-black text-white rounded-t-blob">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-2xl font-black sm:text-4xl">Apply to teach online</h2>
                <p class="mt-3 text-white/60 text-[13px] sm:mt-4 sm:text-base">
                    We’re looking for confident English speakers who enjoy helping beginners succeed.
                </p>

                <form class="mt-8 grid gap-3 text-left text-black sm:mt-10 sm:gap-4">
                    <div class="grid sm:grid-cols-2 gap-3 sm:gap-4">
                        <input type="text" placeholder="Full name" class="p-3 rounded-2xl outline-none sm:p-4" required />
                        <input type="email" placeholder="Email" class="p-3 rounded-2xl outline-none sm:p-4" required />
                    </div>

                    <textarea
                            placeholder="Short note about your teaching background"
                            class="p-3 rounded-2xl h-28 outline-none sm:p-4 sm:h-32"
                    ></textarea>

                    <button class="bg-brandPurple text-white text-sm font-black py-3 rounded-2xl hover:scale-[1.02] transition sm:py-4 sm:text-base" type="submit">
                        Send application
                    </button>
                </form>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="px-4 py-8 sm:px-10 sm:py-10">
            <div class="rounded-blob bg-[color:var(--card)] p-5 ring-1 ring-[color:var(--border)] sm:p-8">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between sm:gap-4">
                    <div class="text-[12px] font-semibold text-[color:var(--muted)] sm:text-sm">
                        © <span id="year"></span> Boston English Center. All rights reserved.
                    </div>

                    <div class="flex flex-wrap gap-3 text-[12px] font-semibold text-black/60 dark:text-white/70 sm:gap-4 sm:text-sm">
                        <a href="#reasons" class="hover:text-black dark:hover:text-white">Curriculum</a>
                        <a href="#features" class="hover:text-black dark:hover:text-white">How it works</a>
                        <a href="#faq" class="hover:text-black dark:hover:text-white">FAQ</a>
                        <a href="#apply" class="hover:text-black dark:hover:text-white">Apply</a>
                    </div>
                </div>
            </div>
        </footer>

    </main>
</div>

<!-- Scroll to top button -->
<button
        id="toTop"
        class="rounded-full bg-black/80 text-white ring-1 ring-white/10 backdrop-blur px-3 py-2.5 shadow-lg hover:bg-black focus-visible:shadow-none
               dark:bg-white/10 dark:hover:bg-white/15 sm:px-4 sm:py-3"
        type="button"
        aria-label="Scroll to top"
        title="Scroll to top"
>
    <span class="inline-flex items-center gap-2 text-[12px] font-extrabold sm:text-sm">
        ↑ <span class="hidden sm:inline">Top</span>
    </span>
</button>

<script>
    // Theme toggle
    (function () {
        const btn = document.getElementById("themeToggle");
        if (!btn) return;

        btn.addEventListener("click", () => {
            const isDark = document.documentElement.classList.toggle("dark");
            localStorage.setItem("theme", isDark ? "dark" : "light");
        });
    })();

    // Footer year
    (function () {
        const yearEl = document.getElementById("year");
        if (yearEl) yearEl.textContent = new Date().getFullYear();
    })();

    // Units switcher
    (function () {
        const root = document.getElementById("reasons");
        if (!root) return;

        const tabs = Array.from(root.querySelectorAll(".unit-tab"));
        const panels = Array.from(root.querySelectorAll(".unit-panel"));
        if (!tabs.length || !panels.length) return;

        function showUnit(unitId) {
            tabs.forEach((t) => {
                const on = t.dataset.unit === unitId;
                t.classList.toggle("is-active", on);
                t.setAttribute("aria-selected", on ? "true" : "false");
            });

            panels.forEach((p) => {
                p.classList.toggle("hidden", p.dataset.unit !== unitId);
            });
        }

        root.addEventListener("click", (e) => {
            const tab = e.target.closest(".unit-tab");
            if (!tab || !root.contains(tab)) return;
            showUnit(tab.dataset.unit);
        });

        const initial = tabs.find((t) => t.classList.contains("is-active"))?.dataset.unit || tabs[0].dataset.unit;
        showUnit(initial);
    })();

    // Reveal animations
    (function () {
        const targets = [
            ...document.querySelectorAll("main > header, main > section, main > footer, main section article, main section details"),
        ];

        targets.forEach((el, i) => {
            el.classList.add("reveal");
            el.style.transitionDelay = Math.min(i * 50, 250) + "ms";
        });

        if (!("IntersectionObserver" in window)) {
            targets.forEach((el) => el.classList.add("is-visible"));
            return;
        }

        const io = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("is-visible");
                        io.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.08, rootMargin: "0px 0px -10% 0px" }
        );

        targets.forEach((el) => io.observe(el));
    })();

    // Scroll-to-top button
    (function () {
        const toTop = document.getElementById("toTop");
        if (!toTop) return;

        const showAfter = 450;

        const onScroll = () => {
            const y = window.scrollY || document.documentElement.scrollTop;
            toTop.classList.toggle("is-visible", y > showAfter);
        };

        window.addEventListener("scroll", onScroll, { passive: true });
        onScroll();

        toTop.addEventListener("click", () => {
            document.getElementById("top").scrollIntoView({ behavior: "smooth", block: "start" });
        });
    })();
</script>
</body>
</html>