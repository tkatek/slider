<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('extra-config.app_title') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="referrer" content="strict-origin-when-cross-origin">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui']
                    }
                }
            }
        };
    </script>

    <script src="{{ asset('template/core/dark-tailwind-storage.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <style>
        .slide-layout {
            --layout-bg: #f8fafc;
            --layout-text: #0f172a;

            --ambient-one: rgba(99, 102, 241, 0.15);
            --ambient-two: rgba(59, 130, 246, 0.10);
            --ambient-three: rgba(16, 185, 129, 0.10);

            --top-bar-gradient: linear-gradient(to right, #3b82f6, #6366f1, #8b5cf6);

            background: var(--layout-bg);
            color: var(--layout-text);
        }

        .dark .slide-layout {
            --layout-bg: #0f172a;
            --layout-text: #f8fafc;

            --ambient-one: rgba(99, 102, 241, 0.25);
            --ambient-two: rgba(59, 130, 246, 0.20);
            --ambient-three: rgba(16, 185, 129, 0.15);
        }

        .slide-layout.slide-theme-orange {
            --ambient-one: rgba(251, 146, 60, 0.14);
            --ambient-two: rgba(252, 211, 77, 0.14);
            --ambient-three: rgba(253, 224, 71, 0.10);

            --top-bar-gradient: linear-gradient(to right, #fde047, #fb923c, #f59e0b);
        }

        .dark .slide-layout.slide-theme-orange {
            --ambient-one: rgba(251, 146, 60, 0.22);
            --ambient-two: rgba(252, 211, 77, 0.18);
            --ambient-three: rgba(253, 224, 71, 0.12);
        }

        .slide-layout.slide-theme-green {
            --ambient-one: rgba(34, 197, 94, 0.14);
            --ambient-two: rgba(16, 185, 129, 0.13);
            --ambient-three: rgba(132, 204, 22, 0.10);

            --top-bar-gradient: linear-gradient(to right, #84cc16, #22c55e, #10b981);
        }

        .dark .slide-layout.slide-theme-green {
            --ambient-one: rgba(34, 197, 94, 0.22);
            --ambient-two: rgba(16, 185, 129, 0.18);
            --ambient-three: rgba(132, 204, 22, 0.12);
        }

        .slide-layout.slide-theme-rose {
            --ambient-one: rgba(190, 24, 93, 0.13);
            --ambient-two: rgba(225, 29, 72, 0.10);
            --ambient-three: rgba(219, 39, 119, 0.09);
            --top-bar-gradient: linear-gradient(to right, #701a3d, #9d174d, #be185d);
        }

        .dark .slide-layout.slide-theme-rose {
            --ambient-one: rgba(190, 24, 93, 0.22);
            --ambient-two: rgba(225, 29, 72, 0.17);
            --ambient-three: rgba(219, 39, 119, 0.14);
        }

        .slide-ambient-one {
            background: var(--ambient-one);
        }

        .slide-ambient-two {
            background: var(--ambient-two);
        }

        .slide-ambient-three {
            background: var(--ambient-three);
        }

        .slide-top-bar {
            background: var(--top-bar-gradient);
        }

        :root {
            --scrollbar-track: rgba(226, 232, 240, 0.42);
            --scrollbar-thumb-color: rgba(100, 116, 139, 0.72);
            --scrollbar-thumb-solid: #94a3b8;
            --scrollbar-thumb-hover-solid: #64748b;
            --scrollbar-thumb-gradient: linear-gradient(135deg, #cbd5e1, #94a3b8 52%, #64748b);
            --scrollbar-thumb-hover-gradient: linear-gradient(135deg, #e2e8f0, #94a3b8 52%, #475569);
            --scrollbar-thumb-shadow: rgba(255, 255, 255, 0.32);
        }

        .dark {
            --scrollbar-track: rgba(30, 41, 59, 0.66);
            --scrollbar-thumb-color: rgba(148, 163, 184, 0.82);
            --scrollbar-thumb-solid: #94a3b8;
            --scrollbar-thumb-hover-solid: #cbd5e1;
            --scrollbar-thumb-gradient: linear-gradient(135deg, #64748b, #94a3b8 52%, #cbd5e1);
            --scrollbar-thumb-hover-gradient: linear-gradient(135deg, #94a3b8, #cbd5e1 52%, #f8fafc);
            --scrollbar-thumb-shadow: rgba(15, 23, 42, 0.38);
        }

        :is(html, body, .slide-layout, .slide-layout *, .overflow-auto, .overflow-y-auto) {
            scrollbar-width: thin;
            scrollbar-color: var(--scrollbar-thumb-color) var(--scrollbar-track);
        }

        :is(html, body, .slide-layout, .slide-layout *, .overflow-auto, .overflow-y-auto)::-webkit-scrollbar {
            width: 12px;
            height: 12px;
        }

        :is(html, body, .slide-layout, .slide-layout *, .overflow-auto, .overflow-y-auto)::-webkit-scrollbar-track {
            border-radius: 999px;
            background: var(--scrollbar-track);
        }

        :is(html, body, .slide-layout, .slide-layout *, .overflow-auto, .overflow-y-auto)::-webkit-scrollbar-thumb {
            border-radius: 999px;
            border: 3px solid transparent;
            background-color: var(--scrollbar-thumb-solid);
            background-image: var(--scrollbar-thumb-gradient);
            background-clip: content-box;
            box-shadow: inset 0 0 0 1px var(--scrollbar-thumb-shadow);
        }

        :is(html, body, .slide-layout, .slide-layout *, .overflow-auto, .overflow-y-auto)::-webkit-scrollbar-thumb:hover {
            background-color: var(--scrollbar-thumb-hover-solid);
            background-image: var(--scrollbar-thumb-hover-gradient);
        }
    </style>

    @yield("style")
</head>

<body class="h-full overflow-x-hidden">

<div class="slide-layout slide-theme-{{$theme["name"]}} isolate relative min-h-[100dvh] overflow-x-hidden overflow-y-auto">
    <div class="pointer-events-none fixed inset-0 z-0 overflow-hidden" aria-hidden="true">
        <div class="slide-ambient-one absolute -top-32 -left-32 h-96 w-96 rounded-full blur-3xl"></div>
        <div class="slide-ambient-two absolute -bottom-40 -right-32 h-[30rem] w-[30rem] rounded-full blur-3xl"></div>
        <div class="slide-ambient-three absolute left-1/2 top-[85%] h-[32rem] w-[32rem] -translate-x-1/2 rounded-full blur-3xl"></div>
    </div>

    <div class="slide-top-bar pointer-events-none fixed top-0 left-0 right-0 z-50 h-[3px]" aria-hidden="true"></div>

    <div class="relative z-10">
        @yield("content")
    </div>
</div>

@yield("script")
</body>
</html>
