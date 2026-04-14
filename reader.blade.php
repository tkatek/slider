<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Boston English Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: '#4f46e5',
                        'brand-glow': '#818cf8',
                        surface: '#ffffff',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    screens: {
                        'xs': '480px', 
                    },
                }
            }
        }

    </script>
    <script src="{{asset('template/core/dark-tailwind-storage.min.js')}}"></script>
    <style>
        /* --- CSS VARIABLES & THEME CONFIGURATION --- */
        :root {
            /* Light Mode Variables */
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
            --accent: #4f46e5;
            --border-ui: #e2e8f0;
            --sidebar-width: 280px;

            /* Glass Light */
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.5);
        }

        /* Dark Mode Overrides */
        .dark {
            --bg-body: #0f172a;
            --bg-card: #1e293b;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --accent: #6366f1;
            --border-ui: #334155;

            /* Glass Dark */
            --glass-bg: rgba(15, 23, 42, 0.85);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        body.editor-theme-orange {
            --accent: #f97316;
            --accent-soft: #fed7aa;
            --accent-light: #fb923c;
            --accent-dark: #ea580c;
            --accent-deep: #c2410c;
            --accent-gradient: linear-gradient(to top right, #f59e0b, #f97316, #ea580c);
        }

        body.editor-theme-orange .sidebar-thumb:hover {
            border-color: var(--accent-light);
            box-shadow: 0 12px 24px -18px rgba(249, 115, 22, 0.45);
        }

        body.editor-theme-orange .sidebar-thumb:hover .thumb-number {
            border-color: var(--accent) !important;
            color: var(--accent-deep);
        }

        body.editor-theme-orange .sidebar-thumb.active {
            border-color: var(--accent);
            box-shadow: 0 16px 32px -22px rgba(249, 115, 22, 0.55);
        }

        body.editor-theme-orange .thumb-number {
            border-color: var(--border-ui);
        }

        body.editor-theme-orange .sidebar-thumb.active .thumb-number {
            background: var(--accent-gradient);
            border-color: transparent;
            color: #ffffff;
        }

        body.editor-theme-orange .editor-brand-logo {
            background: var(--accent-gradient) !important;
        }

        body.editor-theme-orange .editor-primary-btn {
            background: var(--accent-gradient) !important;
            box-shadow: 0 10px 20px -10px rgba(249, 115, 22, 0.55) !important;
        }

        body.editor-theme-orange .editor-primary-btn:hover {
            background: linear-gradient(to top right, #fb923c, #f97316, #c2410c) !important;
        }

        body.editor-theme-orange .editor-secondary-btn:hover {
            border-color: var(--accent-light) !important;
            color: var(--accent-deep) !important;
            box-shadow: 0 10px 20px -16px rgba(249, 115, 22, 0.45);
        }

        body.editor-theme-orange .text-brand,
        body.editor-theme-orange .hover\:text-brand:hover,
        body.editor-theme-orange .dark\:text-brand-glow {
            color: var(--accent) !important;
        }

        body.editor-theme-orange .bg-brand,
        body.editor-theme-orange .hover\:bg-brand-glow:hover,
        body.editor-theme-orange .dark\:bg-brand,
        body.editor-theme-orange .dark\:hover\:bg-brand-glow:hover {
            background: var(--accent-gradient) !important;
        }

        body.editor-theme-orange .border-brand,
        body.editor-theme-orange .hover\:border-brand:hover,
        body.editor-theme-orange .group:hover .group-hover\:border-brand {
            border-color: var(--accent) !important;
        }

        body.editor-theme-orange .focus\:ring-brand:focus {
            --tw-ring-color: rgba(249, 115, 22, 0.45) !important;
        }

        body.editor-theme-orange .shadow-brand\/20,
        body.editor-theme-orange .dark\:shadow-brand\/20 {
            --tw-shadow-color: rgba(249, 115, 22, 0.2) !important;
            --tw-shadow: var(--tw-shadow-colored) !important;
        }

        body.editor-theme-orange .cue-btn {
            background: var(--accent-gradient);
            box-shadow:
                0 0 0 1px rgba(249, 115, 22, 0.4),
                0 10px 20px -10px rgba(249, 115, 22, 0.5);
        }

        body.editor-theme-orange .cue-btn:hover {
            background: linear-gradient(to top right, #fb923c, #f97316, #c2410c);
            box-shadow:
                0 0 0 2px rgba(249, 115, 22, 0.4),
                0 8px 16px -4px rgba(249, 115, 22, 0.3);
        }

        body.editor-theme-orange .cue-tooltip {
            border-color: rgba(249, 115, 22, 0.16);
            box-shadow:
                0 40px 80px -15px rgba(15, 23, 42, 0.15),
                inset 0 0 0 1px rgba(249, 115, 22, 0.08);
        }

        body.editor-theme-orange .cue-header {
            background: rgba(249, 115, 22, 0.08);
            border-left-color: var(--accent);
        }

        body.editor-theme-orange .cue-header::before {
            background: linear-gradient(to bottom, transparent, rgba(249, 115, 22, 0.12), transparent);
        }

        body.editor-theme-orange .cue-badge {
            color: var(--accent) !important;
            text-shadow: 0 0 10px rgba(249, 115, 22, 0.22);
        }

        body.editor-theme-orange .cue-header .cue-badge::after,
        body.editor-theme-orange .cue-marker {
            background: var(--accent);
            box-shadow: 0 0 8px rgba(249, 115, 22, 0.4);
        }

        body.editor-theme-orange .teacher-cue div:hover .cue-marker {
            background: var(--accent-light);
            box-shadow: 0 0 12px rgba(251, 146, 60, 0.6);
        }

        #desktop-sidebar-toggle-btn:hover {
            color: var(--accent) !important;
            background: color-mix(in srgb, var(--accent) 10%, transparent) !important;
        }

        body.editor-theme-orange #desktop-sidebar-toggle-btn:hover {
            color: var(--accent-deep) !important;
            background: rgba(249, 115, 22, 0.12) !important;
        }
        body{
            overflow: hidden;
        }

        /* --- COMPONENT STYLES --- */
        .glass-panel {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-ui);
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
        }

        .slide-container {
            min-height: 0;
            position: relative;
            overflow: hidden;
            overscroll-behavior: none;
            background: var(--bg-body);
        }

        .slide {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.35s ease, visibility 0.35s ease;
            transform: none;
        }

        .slide.active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: none;
        }

        .slide.prev {
            transform: none;
        }

        .slide.next {
            transform: none;
        }

        .slide-stage {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .annotation-layer {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            pointer-events: none;
            touch-action: none;
            cursor: default;
        }

        .annotation-layer.is-interactive {
            pointer-events: auto;
        }

        .annotation-layer.tool-draw {
            cursor: crosshair;
        }

        .annotation-layer.tool-erase {
            cursor: cell;
        }

        .editor-tool-popover {
            position: absolute;
            top: calc(100% + 0.6rem);
            right: -1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem;
            border-radius: 1rem;
            border: 1px solid var(--border-ui);
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 18px 40px -20px rgb(15 23 42 / 0.35);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-6px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s ease;
            z-index: 90;
        }

        .editor-tool-popover.is-open {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .editor-tool-btn {
            width: 2.5rem;
            height: 2.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.9rem;
            border: 1px solid transparent;
            transition: transform 0.2s ease, border-color 0.2s ease, background-color 0.2s ease, color 0.2s ease;
        }

        .editor-tool-btn:hover {
            transform: translateY(-1px);
        }

        .editor-tool-btn.is-active {
            border-color: currentColor;
            background: color-mix(in srgb, currentColor 14%, transparent);
            box-shadow: 0 0 0 1px color-mix(in srgb, currentColor 24%, transparent);
        }

        .editor-tool-btn i,
        #editor-tool-toggle i {
            font-size: 1rem;
            line-height: 1;
        }

        /* Sidebar Styles */
        .sidebar-thumb {
            cursor: pointer;
            border: 2px solid transparent;
            background: var(--bg-card);
        }

        .sidebar-thumb:hover {
            border-color: var(--border-ui);
        }

        .sidebar-thumb.active {
            border-color: var(--accent);
            background: var(--bg-body);
        }

        .sidebar-thumb.active .thumb-number {
            background: var(--accent);
            color: white;
        }

        /* --- Sidebar Dark Mode Number Fix --- */
        .dark .thumb-number {
            color: var(--text-primary);
            background: var(--bg-card);
            border-color: var(--border-ui);
        }

        .dark .sidebar-thumb:hover .thumb-number {
            border-color: var(--accent);
        }

        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: var(--border-ui);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: var(--text-secondary);
        }

        iframe {
            width: 100%;
            height: 100%;
            flex: none;
            border: none;
            background: var(--bg-card);
            pointer-events: none;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                        width 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                        height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center center;
        }

        .slide.active iframe {
            pointer-events: auto;
        }

        .btn-action {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            padding: 0.5rem 0.85rem;
            min-height: 2.25rem;
            border-radius: 0.75rem;
            font-weight: 800;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            user-select: none;
            white-space: nowrap;
            font-size: 0.7rem;
        }

        @media (min-width: 640px) {
            .btn-action {
                gap: 0.5rem;
                padding: 0.55rem 1rem;
                min-height: 2.5rem;
                border-radius: 0.9rem;
                font-size: 0.76rem;
            }
        }

        .btn-action:active {
            transform: scale(0.95);
        }

        /* --- TEACHER CUE STYLING --- */
        .cue-btn {
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.25rem;
            border-radius: 0.65rem;
            background: #4f46e5;
            color: white;
            font-weight: 800;
            font-size: 0.7rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            box-shadow:
                0 0 0 1px rgba(79, 70, 229, 0.4),
                0 10px 20px -10px rgba(79, 70, 229, 0.5);
            transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
            cursor: pointer;
            border: none;
        }

        @media (min-width: 640px) {
            .cue-btn {
                gap: 0.75rem;
                padding: 0.7rem 1.75rem;
                border-radius: 0.75rem;
                font-size: 0.9rem;
            }
        }

        .cue-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .cue-btn:hover {
            box-shadow:
                0 0 0 2px rgba(79, 70, 229, 0.4),
                0 8px 16px -4px rgba(79, 70, 229, 0.3);
            background: #4338ca;
        }

        .cue-btn:hover::before {
            transform: translateX(100%);
        }

        .cue-icon-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        @media (min-width: 640px) {
            .cue-icon-wrap {
                width: 24px;
                height: 24px;
            }
        }

        .cue-btn:hover .cue-icon-wrap {
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
        }

        .cue-tooltip {
            position: absolute;
            top: calc(100% + 20px);
            left: 50%;
            transform: translateX(-50%) translateY(20px);
            width: 360px;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(24px) saturate(200%);
            -webkit-backdrop-filter: blur(24px) saturate(200%);
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 30px), calc(100% - 30px) 100%, 0 100%);
            border: 1px solid rgba(79, 70, 229, 0.1);
            box-shadow:
                0 40px 80px -15px rgba(15, 23, 42, 0.15),
                inset 0 0 0 1px rgba(79, 70, 229, 0.05);
            color: #475569;
            text-align: left;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            z-index: 100;
        }

        .cue-header {
            position: relative;
            background: rgba(79, 70, 229, 0.05);
            padding: 0.6rem 1.25rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            border-left: 3px solid #4f46e5;
            overflow: hidden;
        }

        .cue-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, transparent, rgba(79, 70, 229, 0.1), transparent);
            animation: scanline 3s infinite linear;
        }

        @keyframes scanline {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(100%); }
        }

        .cue-badge {
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: #4f46e5;
            text-shadow: 0 0 10px rgba(79, 70, 229, 0.2);
        }

        .cue-header .cue-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
        }

        .cue-header .cue-badge::after {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #4f46e5;
            box-shadow: 0 0 8px rgba(79, 70, 229, 0.4);
        }

        .teacher-cue {
            margin-top: 0;
        }

        .teacher-cue div {
            margin-bottom: 0.75rem;
            display: flex;
            gap: 0.75rem;
            align-items: flex-start;
            font-size: 0.9rem;
            line-height: 1.5;
            color: #475569;
            padding: 0.25rem 0;
            cursor: default;
        }

        .cue-marker {
            flex-shrink: 0;
            width: 12px;
            height: 2px;
            background: #4f46e5;
            margin-top: 1rem;
            box-shadow: 0 0 8px rgba(79, 70, 229, 0.3);
            transition: all 0.3s ease;
        }

        .teacher-cue div:hover .cue-marker {
            width: 20px;
            background: #818cf8;
            box-shadow: 0 0 12px rgba(129, 140, 248, 0.6);
        }

        .teacher-cue span:not(.cue-marker) {
            font-size: 0.9rem;
            font-weight: 500;
            line-height: 1.8;
            color: #475569;
            transition: all 0.3s ease;
        }

        .teacher-cue div:hover span:not(.cue-marker) {
            color: #0f172a;
            transform: translateX(5px);
        }

        @keyframes edge-pulse {
            0%, 100% { opacity: 0.2; filter: brightness(1); }
            50% { opacity: 0.6; filter: brightness(1.5); }
        }

        /* --- DARK MODE ADAPTATION --- */
        .dark .cue-tooltip {
            background: rgba(15, 23, 42, 0.98);
            border-color: rgba(79, 70, 229, 0.2);
            box-shadow: 0 40px 80px -15px rgba(0, 0, 0, 0.6);
            color: #f8fafc;
        }

        .dark .cue-header {
            background: rgba(79, 70, 229, 0.1);
            border-left-color: #6366f1;
        }

        .dark .teacher-cue div,
        .dark .teacher-cue span:not(.cue-marker),
        .dark .cue-header {
            color: #ffffff;
        }

        .dark .teacher-cue div:hover span:not(.cue-marker) {
            color: #ffffff;
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
        }

        .dark .cue-marker {
            background: #6366f1;
            box-shadow: 0 0 8px rgba(99, 102, 241, 0.4);
        }

        .group:hover .cue-tooltip {
            opacity: 1;
            visibility: visible;
            transform: translateX(-80%) translateY(0);
        }

        /* --- MOBILE SIDEBAR TRANSITION --- */
        #mobile-sidebar-overlay {
            transition: opacity 0.3s ease;
        }

        #sidebar-drawer {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                        width 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                        max-width 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                        opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                        border-color 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                        box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .translate-x-full { transform: translateX(100%); }
        .translate-x-0 { transform: translateX(0); }

        @media (min-width: 1024px) {
            #sidebar-drawer.is-collapsed {
                width: 4.5rem;
                max-width: 4.5rem;
            }

            #sidebar-drawer.is-collapsed .sidebar-heading,
            #sidebar-drawer.is-collapsed .sidebar-subheading,
            #sidebar-drawer.is-collapsed .sidebar-slide-copy {
                display: none;
            }

            #sidebar-drawer.is-collapsed #sidebar-list {
                padding: 0.875rem 0.5rem;
            }

            #sidebar-drawer.is-collapsed .sidebar-thumb {
                justify-content: center;
                padding: 0.5rem;
                border-radius: 1rem;
            }

            #sidebar-drawer.is-collapsed .thumb-number {
                width: 2.1rem;
                min-width: 2.1rem;
                height: 2.1rem;
                font-size: 0.65rem;
            }
        }
    </style>
</head>
<body class="flex h-[100dvh] flex-col editor-theme-{{ $theme['name'] ?? 'default' }}">
<!-- Top Header -->
<header class="px-3 py-2  md:px-8 md:py-2 glass-panel z-[85] shrink-0 relative">
    <div class="flex min-h-[2.75rem] items-center justify-between sm:min-h-[3rem]">
        <div class="flex-1 flex items-center gap-2 md:gap-3 min-w-0">
            <div class="editor-brand-logo w-8 h-8 md:w-10 md:h-10 bg-gradient-to-tr from-brand to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 md:w-6 md:h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h1 class="text-lg font-extrabold tracking-tight leading-tight text-[var(--text-primary)] truncate">Boston English Center</h1>
            </div>
        </div>
        <div class="flex-1 hidden lg:flex items-center justify-end lg:justify-center gap-2 md:gap-4">
            <div class="relative">
                <button id="editor-tool-toggle" type="button" class="hidden lg:flex h-10 w-10 p-2 rounded-xl border border-[var(--border-ui)] hover:bg-[var(--bg-body)] transition-colors text-[var(--text-secondary)] hover:text-[var(--text-primary)] flex items-center justify-center shrink-0" aria-label="Open drawing tools" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none"><path fill="currentColor" fill-rule="evenodd" d="M17.586 2a2 2 0 0 1 2.828 0L22 3.586a2 2 0 0 1 0 2.828L20.414 8L16 3.586zm-3 3l-5 5A2 2 0 0 0 9 11.414V13a2 2 0 0 0 2 2h1.586A2 2 0 0 0 14 14.414l5-5z" clip-rule="evenodd"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 14H5a2 2 0 0 0-2 2v0a2 2 0 0 0 2 2h14a2 2 0 0 1 2 2v0a2 2 0 0 1-2 2h-4"/></g></svg>
                </button>
                <div id="editor-tool-popover" class="hidden lg:flex editor-tool-popover" role="toolbar" aria-label="Drawing tools">
                    <button type="button" class="editor-tool-btn is-active text-[var(--text-primary)] bg-[var(--bg-card)]" data-tool="select" aria-label="Select tool">
                        <i class="fa-solid fa-arrow-pointer" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="editor-tool-btn text-red-500 bg-red-500/10" data-tool="draw-red" aria-label="Draw red">
                        <i class="fa-solid fa-pen" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="editor-tool-btn text-[var(--text-primary)] bg-[var(--bg-body)]" data-tool="draw-theme" aria-label="Draw theme color">
                        <i class="fa-solid fa-pen-nib" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="editor-tool-btn text-blue-500 bg-blue-500/10" data-tool="draw-blue" aria-label="Draw blue">
                        <i class="fa-solid fa-pen-clip" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="editor-tool-btn text-amber-500 bg-amber-500/10" data-tool="erase" aria-label="Eraser">
                        <i class="fa-solid fa-eraser" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="editor-tool-btn text-rose-500 bg-rose-500/10" data-tool="clear-all" aria-label="Clear all">
                        <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <button id="theme-toggle-btn" onclick="toggleThemePreference()" class="hidden lg:block p-2 rounded-xl border border-[var(--border-ui)] hover:bg-[var(--bg-body)] transition-colors text-[var(--text-secondary)] hover:text-[var(--text-primary)] flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.8A9 9 0 1111.2 3a7 7 0 009.8 9.8z" />
                </svg>
            </button>
            <button onclick="toggleFullscreen()" class="hidden lg:block p-2 rounded-xl border border-[var(--border-ui)] hover:bg-[var(--bg-body)] transition-colors text-[var(--text-secondary)] hover:text-[var(--text-primary)]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                </svg>
            </button>


        </div>
        <div class="flex-1 hidden lg:flex items-end justify-end gap-3">
            <button onclick="prevSlide()"
                    class="editor-secondary-btn btn-action min-w-[2.5rem] bg-[var(--bg-card)] border border-[var(--border-ui)] text-[var(--text-primary)] hover:border-brand hover:text-brand shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="text-[10px] md:text-[11px] uppercase tracking-[0.1em] hidden sm:inline">Previous</span>
            </button>
            <span id="slide-index-footer"
                  class="w-[90px] text-[9px] md:text-[11px] font-black tracking-[0.1em] text-[var(--text-secondary)] bg-[var(--bg-body)] px-2.5 md:px-4 py-2 rounded-xl border border-[var(--border-ui)]">01
                / {{count($slides)}}</span>
            <button onclick="nextSlide()"
                    class="editor-primary-btn btn-action min-w-[2.5rem] bg-brand text-white shadow-lg shadow-brand/20 hover:bg-brand-glow">
                <span class="text-[10px] md:text-[11px] uppercase tracking-[0.1em] hidden sm:inline">Next Slide</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
            </button>

        </div>

        <div class="flex-1 hidden lg:flex items-end justify-end">
            <div class="group relative">
                <button id="cue-toggle-btn" class="flex items-center justify-center gap-2">
                    <span class="text-[12px] sm:text-lg font-extrabold tracking-tight leading-tight text-[var(--text-primary)] truncate">Teacher Cue</span>
                    <div class="cue-icon-wrap !w-4 !h-4 md:!w-6 md:!h-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 md:w-4 md:h-4" viewBox="0 0 16 16">
                            <g fill="currentColor">
                                <path d="M9 11a1 1 0 1 1-2 0a1 1 0 0 1 2 0M7.5 4A2.5 2.5 0 0 0 5 6.5h2a.5.5 0 0 1 .5-.5h.646a.382.382 0 0 1 .17.724L7 7.382V9h2v-.382l.211-.106A2.382 2.382 0 0 0 8.146 4z" />
                                <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-6a6 6 0 1 0 0 12A6 6 0 0 0 8 2" />
                            </g>
                        </svg>
                    </div>
                </button>
                <div id="cue-tooltip" class="cue-tooltip">
                    <div class="cue-header">Instructional Insight</div>
                    <div class="teacher-cue"></div>
                </div>
            </div>
        </div>
        <div class="flex lg:hidden">
            <button id="mobile-menu-btn" type="button" aria-label="Toggle slide navigation" aria-expanded="true" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-brand dark:text-brand-glow">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <div class="flex items-center justify-center gap-2 pt-2 lg:hidden">
        <div class="flex flex-1 items-center justify-between gap-1.5 min-w-0">
            <button onclick="prevSlide()"
                    class="editor-secondary-btn btn-action min-w-[2.5rem] bg-[var(--bg-card)] border border-[var(--border-ui)] text-[var(--text-primary)] hover:border-brand hover:text-brand shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="text-[10px] md:text-[11px] uppercase tracking-[0.1em] inline">Previous</span>
            </button>

            <div id="slide-index-header-mobile" class="h-8 min-w-[62px] px-2 rounded-lg border border-[var(--border-ui)] bg-[var(--bg-body)] text-[9px] font-black tracking-[0.1em] text-[var(--text-secondary)] flex items-center justify-center">
                01 / {{ count($slides) }}
            </div>

            <button onclick="nextSlide()"
                    class="editor-primary-btn btn-action min-w-[2.5rem] bg-brand text-white shadow-lg shadow-brand/20 hover:bg-brand-glow">
                <span class="text-[10px] md:text-[11px] uppercase tracking-[0.1em] inline">Next Slide</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</header>

<div id="fullscreen-nudge"
     class="hidden fixed top-20 left-1/2 -translate-x-1/2 z-[95] w-[calc(100%-2rem)] max-w-2xl rounded-xl border border-white/10 dark:border-[var(--border-ui)] bg-black/80 dark:bg-[var(--bg-card)]/95 px-3 py-2.5 text-white dark:text-[var(--text-primary)] shadow-2xl dark:backdrop-blur-xl lg:block">
    <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3">
        <div class="editor-brand-logo flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-white/10 dark:bg-gradient-to-br dark:from-brand dark:to-indigo-600 text-white dark:shadow-lg dark:shadow-brand/20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
            </svg>
        </div>
        <p class="min-w-0 flex-1 text-center text-xs sm:text-sm font-black tracking-tight text-white dark:text-[var(--text-primary)] sm:text-left">Switch to fullscreen for a cleaner reading view?</p>
        <button id="fullscreen-nudge-accept"
                type="button"
                class="inline-flex items-center justify-center rounded-lg bg-white dark:bg-brand px-3 py-1.5 text-xs sm:text-sm font-black text-black dark:text-white dark:shadow-lg dark:shadow-brand/20 transition-colors hover:bg-white/90 dark:hover:bg-brand-glow">
            Apply Fullscreen
        </button>
        <button id="fullscreen-nudge-dismiss"
                type="button"
                class="inline-flex items-center justify-center rounded-lg border border-white/20 dark:border-[var(--border-ui)] bg-white/10 dark:bg-[var(--bg-body)] px-3 py-1.5 text-xs sm:text-sm font-black text-white dark:text-[var(--text-primary)] transition-colors hover:bg-white/15 dark:hover:bg-[var(--bg-card)]">
            Stay Small
        </button>
    </div>
</div>

<div class="flex min-h-0 flex-1 relative overflow-hidden">
    <!-- Main Content Area -->
    <main class="flex-1 min-h-0 slide-container w-full">
        <div id="slides-wrapper" class="w-full h-full relative">
            <template id="slide-template">
                <div class="slide">
                    <div class="flex h-full min-h-0 w-full items-center justify-center">
                        <div class="slide-stage">
                            <iframe src="" scrolling="auto"></iframe>
                            <canvas class="annotation-layer" aria-label="Slide annotations"></canvas>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </main>

    <!-- Mobile Sidebar Overlay -->
    <div id="mobile-sidebar-overlay"
         class="fixed inset-0 bg-black/50 z-[60] lg:hidden opacity-0 pointer-events-none backdrop-blur-sm"></div>

    <!-- Right Side Navigation Sidebar -->
    <!-- Fixed on mobile, static on desktop -->
    <aside id="sidebar-drawer"
           class="fixed lg:static inset-y-0 right-0 z-[70] w-[85%] max-w-[320px] bg-[var(--bg-card)] border-l border-[var(--border-ui)] flex flex-col translate-x-full lg:translate-x-0 shadow-2xl lg:shadow-none h-full">

        <div class="flex items-center justify-start gap-3 p-5 border-b border-[var(--border-ui)]">
            <button id="desktop-sidebar-toggle-btn"
                    type="button"
                    aria-label="Toggle slide navigation"
                    aria-expanded="true"
                    class="hidden lg:inline-flex p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-[var(--text-secondary)] transition-colors shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M21 4H7v2h14zm0 7H11v2h10zm0 7H7v2h14zM1.99 8.814L3.402 7.4L8 11.996l-4.597 4.596l-1.414-1.414l3.182-3.182z"/></svg>
            </button>
            <div class="flex flex-col gap-1">

                <h3 class="sidebar-heading font-black text-xs uppercase tracking-[0.2em] text-[var(--text-secondary)]">Course
                    Content</h3>
                <p class="sidebar-subheading text-sm md:text-md font-bold text-[var(--text-primary)]">Slide Navigation</p>
            </div>
            <!-- Mobile Close Button -->
            <button id="close-sidebar-btn"
                    class="lg:hidden p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-[var(--text-secondary)]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div id="sidebar-list" class="flex-1 overflow-y-auto custom-scrollbar p-4 space-y-3">
            <!-- Sidebar items injected via JS -->
        </div>

    </aside>
</div>
<script>
    const slideData =@json($slides);
    const PRELOAD_AHEAD_COUNT = 2;
    const state = {
        currentSlide: 0,
        slides: [],
        loadedSlides: new Set(),
        sidebarOpen: window.innerWidth >= 1024,
        activeTool: 'select',
        isDrawing: false,
        lastPoint: null
    };



    // --- RESPONSIVE SIDEBAR LOGIC ---
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const desktopSidebarToggleBtn = document.getElementById('desktop-sidebar-toggle-btn');
    const closeSidebarBtn = document.getElementById('close-sidebar-btn');
    const sidebarDrawer = document.getElementById('sidebar-drawer');
    const sidebarOverlay = document.getElementById('mobile-sidebar-overlay');
    const toolToggleBtn = document.getElementById('editor-tool-toggle');
    const toolPopover = document.getElementById('editor-tool-popover');
    const toolButtons = document.querySelectorAll('[data-tool]');
    const fullscreenNudge = document.getElementById('fullscreen-nudge');
    const fullscreenNudgeAccept = document.getElementById('fullscreen-nudge-accept');
    const fullscreenNudgeDismiss = document.getElementById('fullscreen-nudge-dismiss');
    const SIDEBAR_ICON_EXPANDED = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M21 4H7v2h14zm0 7H11v2h10zm0 7H7v2h14zM1.99 8.814L3.402 7.4L8 11.996l-4.597 4.596l-1.414-1.414l3.182-3.182z"/></svg>`;
    const SIDEBAR_ICON_COLLAPSED = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M3 18h13v-2H3zm0-5h10v-2H3zm0-7v2h13V6zm18 9.59L17.42 12L21 8.41L19.59 7l-5 5l5 5z"/></svg>`;
    const TOOL_CONFIG = {
        'select': { mode: 'select' },
        'draw-red': { mode: 'draw', color: '#dc2626' },
        'draw-theme': { mode: 'draw' },
        'draw-blue': { mode: 'draw', color: '#2563eb' },
        'erase': { mode: 'erase' },
        'clear-all': { mode: 'clear-all' }
    };
    let fullscreenNudgeDismissed = false;

    function toggleSidebar(show) {
        state.sidebarOpen = Boolean(show);
        const isDesktop = window.innerWidth >= 1024;

        [mobileMenuBtn, desktopSidebarToggleBtn].forEach((button) => {
            if (button) {
                button.setAttribute('aria-expanded', state.sidebarOpen ? 'true' : 'false');
            }
        });

        if (desktopSidebarToggleBtn) {
            desktopSidebarToggleBtn.innerHTML = state.sidebarOpen ? SIDEBAR_ICON_EXPANDED : SIDEBAR_ICON_COLLAPSED;
        }

        if (isDesktop) {
            sidebarDrawer.classList.toggle('is-collapsed', !state.sidebarOpen);
            sidebarDrawer.classList.remove('translate-x-full');
            sidebarDrawer.classList.add('translate-x-0');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
            return;
        }

        if (state.sidebarOpen) {
            sidebarDrawer.classList.remove('translate-x-full');
            sidebarDrawer.classList.add('translate-x-0');
            sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
        } else {
            sidebarDrawer.classList.add('translate-x-full');
            sidebarDrawer.classList.remove('translate-x-0');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
        }
    }

    mobileMenuBtn.addEventListener('click', () => toggleSidebar(!state.sidebarOpen));
    if (desktopSidebarToggleBtn) {
        desktopSidebarToggleBtn.addEventListener('click', () => toggleSidebar(!state.sidebarOpen));
    }
    closeSidebarBtn.addEventListener('click', () => toggleSidebar(false));
    sidebarOverlay.addEventListener('click', () => toggleSidebar(false));

    // --- TEACHER CUE HOVER ONLY ---
    // Tooltip visibility is controlled via CSS (.group:hover .cue-tooltip)

    // --- SLIDE LOGIC ---
    function init() {
        createSlides();
        initializeAnnotationLayers();
        createSidebar();
        updateSlides();
        applyToolMode();
        syncFullscreenNudge();

        window.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight' || e.key === ' ') nextSlide();
            if (e.key === 'ArrowLeft') prevSlide();
        });

        window.addEventListener('resize', handleViewportResize);
        document.addEventListener('fullscreenchange', syncFullscreenNudge);

        if (toolToggleBtn) {
            toolToggleBtn.addEventListener('click', toggleToolPopover);
        }

        toolButtons.forEach((button) => {
            button.addEventListener('click', () => handleToolChange(button.dataset.tool));
        });

        document.addEventListener('click', handleOutsideToolPopoverClick);
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeToolPopover();
            }
        });

        fullscreenNudgeAccept?.addEventListener('click', () => {
            dismissFullscreenNudge();
            toggleFullscreen();
        });

        fullscreenNudgeDismiss?.addEventListener('click', () => {
            dismissFullscreenNudge();
        });

        updateActiveToolButton();
        toggleSidebar(state.sidebarOpen);
    }

    function handleViewportResize() {
        syncAllAnnotationCanvasSizes();
        syncFullscreenNudge();

        if (window.innerWidth >= 1024) {
            sidebarDrawer.classList.remove('translate-x-full');
            sidebarDrawer.classList.add('translate-x-0');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
        } else if (!state.sidebarOpen) {
            sidebarDrawer.classList.add('translate-x-full');
            sidebarDrawer.classList.remove('translate-x-0');
        }

        toggleSidebar(state.sidebarOpen);
    }

    function syncFullscreenNudge() {
        if (!fullscreenNudge) return;

        const isLargeScreen = window.innerWidth >= 1024;
        const isFullscreen = Boolean(document.fullscreenElement);
        const shouldShow = isLargeScreen && !isFullscreen && !fullscreenNudgeDismissed;

        fullscreenNudge.style.display = shouldShow ? '' : 'none';
    }

    function dismissFullscreenNudge() {
        fullscreenNudgeDismissed = true;
        if (fullscreenNudge) {
            fullscreenNudge.style.display = 'none';
        }
    }

    function createSlides() {
        const wrapper = document.getElementById('slides-wrapper');
        const template = document.getElementById('slide-template');

        slideData.forEach((data, i) => {
            const clone = template.content.cloneNode(true);
            const slide = clone.querySelector('.slide');
            const iframe = slide.querySelector('iframe');
            // iframe.src = data.src; we will load it using ajax

            // Sync theme when iframe loads
            iframe.onload = () => {
                const isDark = document.documentElement.classList.contains('dark');
                if (iframe.contentWindow && typeof iframe.contentWindow.setTheme === 'function') {
                    iframe.contentWindow.setTheme(isDark ? 'dark' : 'light');
                }
            };

            wrapper.appendChild(clone);
        });
        state.slides = document.querySelectorAll('.slide');
    }

    function initializeAnnotationLayers() {
        state.slides.forEach((slide) => {
            const canvas = slide.querySelector('.annotation-layer');
            if (!canvas) return;

            canvas.addEventListener('pointerdown', onCanvasPointerDown);
            canvas.addEventListener('pointermove', onCanvasPointerMove);
            canvas.addEventListener('pointerup', onCanvasPointerUp);
            canvas.addEventListener('pointerleave', onCanvasPointerUp);
            canvas.addEventListener('pointercancel', onCanvasPointerUp);
        });

        syncAllAnnotationCanvasSizes();
    }

    function syncAllAnnotationCanvasSizes() {
        state.slides.forEach((slide) => syncAnnotationCanvasSize(slide));
    }

    function syncAnnotationCanvasSize(slide) {
        const canvas = slide?.querySelector('.annotation-layer');
        const stage = slide?.querySelector('.slide-stage');
        if (!canvas || !stage) return;

        const rect = stage.getBoundingClientRect();
        const width = Math.max(1, Math.round(rect.width));
        const height = Math.max(1, Math.round(rect.height));
        const dpr = window.devicePixelRatio || 1;
        const snapshot = canvas.width > 0 && canvas.height > 0 ? canvas.toDataURL() : null;

        canvas.width = Math.round(width * dpr);
        canvas.height = Math.round(height * dpr);
        canvas.style.width = `${width}px`;
        canvas.style.height = `${height}px`;

        const ctx = canvas.getContext('2d');
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        ctx.lineCap = 'round';
        ctx.lineJoin = 'round';

        if (snapshot) {
            const image = new Image();
            image.onload = () => {
                ctx.clearRect(0, 0, width, height);
                ctx.drawImage(image, 0, 0, width, height);
            };
            image.src = snapshot;
        }
    }

    function getThemeAwareDrawColor() {
        return document.documentElement.classList.contains('dark') ? '#ffffff' : '#111827';
    }

    function getToolConfig() {
        return TOOL_CONFIG[state.activeTool] || TOOL_CONFIG['select'];
    }

    function applyToolMode() {
        const config = getToolConfig();

        state.slides.forEach((slide) => {
            const iframe = slide.querySelector('iframe');
            const canvas = slide.querySelector('.annotation-layer');
            if (!iframe || !canvas) return;

            const interactive = config.mode === 'draw' || config.mode === 'erase';
            iframe.style.pointerEvents = interactive ? 'none' : '';
            canvas.classList.toggle('is-interactive', interactive);
            canvas.classList.toggle('tool-draw', config.mode === 'draw');
            canvas.classList.toggle('tool-erase', config.mode === 'erase');
        });
    }

    function openToolPopover() {
        if (!toolPopover || !toolToggleBtn) return;
        toolPopover.classList.add('is-open');
        toolToggleBtn.setAttribute('aria-expanded', 'true');
    }

    function closeToolPopover() {
        if (!toolPopover || !toolToggleBtn) return;
        toolPopover.classList.remove('is-open');
        toolToggleBtn.setAttribute('aria-expanded', 'false');
    }

    function toggleToolPopover(event) {
        event.stopPropagation();
        if (!toolPopover) return;

        if (toolPopover.classList.contains('is-open')) {
            closeToolPopover();
        } else {
            openToolPopover();
        }
    }

    function handleOutsideToolPopoverClick(event) {
        if (!toolPopover || !toolToggleBtn) return;
        if (toolPopover.contains(event.target) || toolToggleBtn.contains(event.target)) return;
        closeToolPopover();
    }

    function updateActiveToolButton() {
        toolButtons.forEach((button) => {
            button.classList.toggle('is-active', button.dataset.tool === state.activeTool);
        });
    }

    function handleToolChange(nextTool) {
        if (nextTool === 'clear-all') {
            clearAllAnnotations();
            state.activeTool = 'select';
        } else {
            state.activeTool = nextTool;
        }

        state.isDrawing = false;
        state.lastPoint = null;
        updateActiveToolButton();
        applyToolMode();
        closeToolPopover();
    }

    function clearAllAnnotations() {
        state.slides.forEach((slide) => {
            const canvas = slide.querySelector('.annotation-layer');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        });
    }

    function getCanvasPoint(canvas, event) {
        const rect = canvas.getBoundingClientRect();
        return {
            x: event.clientX - rect.left,
            y: event.clientY - rect.top
        };
    }

    function drawSegment(canvas, from, to) {
        const config = getToolConfig();
        const ctx = canvas.getContext('2d');

        ctx.save();
        ctx.lineWidth = config.mode === 'erase' ? 18 : 4;
        ctx.globalCompositeOperation = config.mode === 'erase' ? 'destination-out' : 'source-over';
        ctx.strokeStyle = config.color || getThemeAwareDrawColor();
        ctx.beginPath();
        ctx.moveTo(from.x, from.y);
        ctx.lineTo(to.x, to.y);
        ctx.stroke();
        ctx.restore();
    }

    function onCanvasPointerDown(event) {
        const config = getToolConfig();
        if (config.mode !== 'draw' && config.mode !== 'erase') return;

        const canvas = event.currentTarget;
        syncAnnotationCanvasSize(canvas.closest('.slide'));
        state.isDrawing = true;
        state.lastPoint = getCanvasPoint(canvas, event);
        canvas.setPointerCapture(event.pointerId);
        drawSegment(canvas, state.lastPoint, state.lastPoint);
    }

    function onCanvasPointerMove(event) {
        if (!state.isDrawing) return;

        const canvas = event.currentTarget;
        const nextPoint = getCanvasPoint(canvas, event);
        drawSegment(canvas, state.lastPoint, nextPoint);
        state.lastPoint = nextPoint;
    }

    function onCanvasPointerUp(event) {
        if (!state.isDrawing) return;

        const canvas = event.currentTarget;
        if (canvas.hasPointerCapture(event.pointerId)) {
            canvas.releasePointerCapture(event.pointerId);
        }

        state.isDrawing = false;
        state.lastPoint = null;
    }

    function loadSlideAtIndex(index) {
        if (index < 0 || index >= slideData.length || state.loadedSlides.has(index)) return;

        const slide = state.slides[index];
        if (!slide) return;

        const iframe = slide.querySelector('iframe');
        if (!iframe) return;

        const src = slideData[index]?.src;
        if (!src || src.trim() === "") return;

        iframe.src = src;
        state.loadedSlides.add(index);
    }

    function preloadUpcomingSlides(fromIndex) {
        for (let step = 1; step <= PRELOAD_AHEAD_COUNT; step++) {
            loadSlideAtIndex(fromIndex + step);
        }
    }

    function createSidebar() {
        const sidebarList = document.getElementById('sidebar-list');
        slideData.forEach((data, i) => {
            const item = document.createElement('div');
            item.className = `sidebar-thumb flex items-center gap-4 p-3 rounded-2xl group border border-transparent active:scale-95`;
            item.onclick = () => goToSlide(i);
            // dark:bg-slate-800
            item.innerHTML = `
                    <div class="thumb-number w-8 h-8 min-w-8 rounded-lg bg-slate-50 border border-[var(--border-ui)] flex items-center justify-center text-[10px] font-black group-hover:border-brand text-[var(--text-primary)]">
                        ${String(i + 1).padStart(2, '0')}
                    </div>
                    <div class="sidebar-slide-copy overflow-hidden">
                        <p class="text-[10px] font-black uppercase tracking-wider text-[var(--text-secondary)]">Slide ${i + 1}</p>
                        <p class="title text-sm md:text-md font-bold leading-tight text-[var(--text-primary)] truncate">${data.title}</p>
                    </div>
                `;
            sidebarList.appendChild(item);
        });
    }
    function updateHeaderInfo() {
        const index = state.currentSlide;
        const currentData = slideData[index];
        const numEl = document.getElementById('header-slide-num');
        const titleEl = document.getElementById('header-slide-title');

        // ADDED: Safety check to prevent crash if elements are missing
        if (numEl && titleEl && currentData) {
            numEl.textContent = String(index + 1).padStart(2, '0');
            titleEl.textContent = currentData.title;
        }
    }
    function updateSlides() {
        state.slides.forEach((s, i) => {
            // 1. Handle CSS Transitions
            s.classList.toggle('active', i === state.currentSlide);
            s.classList.toggle('prev', i < state.currentSlide);
            s.classList.toggle('next', i > state.currentSlide);
        });

        // Load current slide now, then preload the next slides in the background.
        loadSlideAtIndex(state.currentSlide);
        preloadUpcomingSlides(state.currentSlide);

        const thumbs = document.querySelectorAll('.sidebar-thumb');
        thumbs.forEach((t, i) => t.classList.toggle('active', i === state.currentSlide));

        const activeThumb = thumbs[state.currentSlide];
        if (activeThumb) activeThumb.scrollIntoView({ behavior: 'auto', block: 'nearest' });

        // Trigger reset/replay for slides that support it
        const activeSlide = state.slides[state.currentSlide];
        if (activeSlide) {
            const iframe = activeSlide.querySelector('iframe');
            if (iframe && iframe.contentWindow && typeof iframe.contentWindow.resetSlide === 'function') {
                // We use a small timeout to ensure the iframe is fully ready if it was just loaded
                // If it was cached, this still works fine.
                setTimeout(() => {
                    try {
                        iframe.contentWindow.resetSlide();
                    } catch(e) { console.log("Reset slide not ready or failed"); }
                }, 100);
            }
        }

        const cues = slideData[state.currentSlide].cue || [];
        const cueHtml = cues.map(c => `
                <div>
                    <span class="cue-marker"></span>
                    <span>${c}</span>
                </div>
            `).join('');

        document.querySelectorAll('.teacher-cue').forEach(el => {
            el.innerHTML = cueHtml;
        });

        const slideIndexText = `${String(state.currentSlide + 1).padStart(2, '0')} / ${String(state.slides.length).padStart(2, '0')}`;
        const footerIndex = document.getElementById('slide-index-footer');
        if (footerIndex) footerIndex.textContent = slideIndexText;

        const mobileHeaderIndex = document.getElementById('slide-index-header-mobile');
        if (mobileHeaderIndex) mobileHeaderIndex.textContent = slideIndexText;
        updateHeaderInfo();
    }

    function stopAllIframeAudio() {
        // Safely call stopSlideAudio on the current iframe if it exists
        const activeSlide = state.slides[state.currentSlide];
        if (activeSlide) {
            const iframe = activeSlide.querySelector('iframe');
            try {
                if (iframe && iframe.contentWindow && typeof iframe.contentWindow.stopSlideAudio === 'function') {
                    iframe.contentWindow.stopSlideAudio();
                }
            } catch (e) {
                // Handle potential cross-origin issues or other iframe errors
                console.warn("Could not stop iframe audio:", e);
            }
        }
    }

    function nextSlide() {
        if (state.currentSlide < state.slides.length - 1) {
            stopAllIframeAudio();
            state.currentSlide++;
            updateSlides();
        }
    }
    function prevSlide() {
        if (state.currentSlide > 0) {
            stopAllIframeAudio();
            state.currentSlide--;
            updateSlides();
        }
    }
    function goToSlide(index) {
        stopAllIframeAudio();
        state.currentSlide = index;
        updateSlides();
    }

    function toggleFullscreen() {
        dismissFullscreenNudge();
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen?.().then(() => {
                syncFullscreenNudge();
            }).catch(() => {});
            return;
        }

        if (document.exitFullscreen) {
            document.exitFullscreen();
        }
    }

    document.addEventListener('DOMContentLoaded', init);
</script>
</body>
</html>
