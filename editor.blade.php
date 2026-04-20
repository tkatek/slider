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
        :root {
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
            --accent: #4f46e5;
            --border-ui: #e2e8f0;
            --sidebar-width: 280px;
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.5);
        }

        .dark {
            --bg-body: #0f172a;
            --bg-card: #1e293b;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --accent: #6366f1;
            --border-ui: #334155;
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
        body.editor-theme-orange .hover\:bg-brand-glow:hover {
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

        body.editor-theme-orange .shadow-brand\/20 {
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

        body.editor-theme-orange .cue-badge,
        body.editor-theme-orange .edit-slide-btn {
            color: var(--accent) !important;
        }

        body.editor-theme-orange .cue-badge {
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

        body.editor-theme-orange .edit-slide-btn:hover {
            color: var(--accent-deep) !important;
            background: rgba(249, 115, 22, 0.1) !important;
        }

        #desktop-sidebar-toggle-btn:hover {
            color: var(--accent) !important;
            background: color-mix(in srgb, var(--accent) 10%, transparent) !important;
        }

        body.editor-theme-orange #desktop-sidebar-toggle-btn:hover {
            color: var(--accent-deep) !important;
            background: rgba(249, 115, 22, 0.12) !important;
        }

        body {
            overflow: hidden;
        }

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
            background: var(--bg-card);
        }

        .sidebar-thumb.active .thumb-number {
            background: #4f46e5;
            color: white;
        }

        .dark .thumb-number {
            color: var(--text-primary);
            background: var(--bg-card);
            border-color: var(--border-ui);
        }

        .dark .sidebar-thumb:hover .thumb-number {
            border-color: var(--accent);
        }

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

        .code-viewer {
            margin: 0;
            width: 100%;
            min-height: 100%;
            padding: 1.5rem;
            border-radius: 1rem;
            background: #020617;
            color: #e2e8f0;
            font-family: ui-monospace, SFMono-Regular, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 0.78rem;
            line-height: 1.6;
            white-space: pre;
            overflow: auto;
            tab-size: 4;
        }

        .code-viewer-shell {
            background: var(--bg-body);
        }

        .cue-btn {
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.25rem;
            border-radius: 0.65rem;
            background: var(--accent);
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
            pointer-events: none;
        }

        #sidebar-drawer.translate-x-0 {
            pointer-events: auto;
        }

        @media (min-width: 1024px) {
            #sidebar-drawer {
                pointer-events: auto;
            }

            #sidebar-drawer.is-collapsed {
                width: 4.5rem;
                max-width: 4.5rem;
            }

            #sidebar-drawer.is-collapsed .sidebar-heading,
            #sidebar-drawer.is-collapsed .sidebar-subheading,
            #sidebar-drawer.is-collapsed .sidebar-slide-copy,
            #sidebar-drawer.is-collapsed .sidebar-actions,
            #sidebar-drawer.is-collapsed .sidebar-add-slide {
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

            #sidebar-drawer.is-collapsed .sidebar-footer {
                display: none;
            }
        }

        .translate-x-full { transform: translateX(100%); }
        .translate-x-0 { transform: translateX(0); }
    </style>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-primary);
            overflow: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.5em 1.5em;
            padding-right: 3rem;
        }

        .dark select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        }

        #add-slide-modal.hidden {
            display: none;
        }

        #add-slide-modal.flex {
            display: flex;
        }

        #add-slide-modal {
            animation: fadeIn 0.2s ease-out;
        }

        #add-slide-modal > div:first-child {
            animation: fadeInBackdrop 0.2s ease-out;
        }

        #add-slide-modal > div:last-child {
            animation: slideUp 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInBackdrop {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        #image-lightbox.hidden {
            display: none;
        }

        #image-lightbox.flex {
            display: flex;
        }
    </style>
</head>
<body class="flex h-[100dvh] flex-col editor-theme-{{ $theme["name"]}}">

<header class="px-3 py-2 md:px-8 md:py-2 glass-panel z-[85] shrink-0 relative">
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
                <button id="editor-tool-toggle" type="button" class="hidden lg:flex h-10 w-10 p-2 rounded-xl border border-[var(--border-ui)] hover:bg-[var(--bg-body)] transition-colors text-[var(--text-secondary)] hover:text-[var(--text-primary)] flex items-center justify-center shrink-0" aria-label="Open editor tools" aria-expanded="false">
                    <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                </button>
                <div id="editor-tool-popover" class="hidden lg:flex editor-tool-popover" role="toolbar" aria-label="Editor tools">
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

<div class="flex min-h-0 flex-1 relative overflow-hidden">
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

    <div id="mobile-sidebar-overlay"
         class="fixed inset-0 bg-black/50 z-[60] lg:hidden opacity-0 pointer-events-none backdrop-blur-sm"></div>

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
                <h3 class="sidebar-heading font-black text-xs uppercase tracking-[0.2em] text-[var(--text-secondary)]">Course Content</h3>
                <p class="sidebar-subheading text-sm md:text-md font-bold text-[var(--text-primary)]">Slide Navigation</p>
            </div>
            <button id="close-sidebar-btn"
                    class="lg:hidden ml-auto p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-[var(--text-secondary)]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="p-4 pb-0">
            <button id="edit-chapter-btn"
                    type="button"
                    class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl border border-[var(--border-ui)] bg-[var(--bg-body)] hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors text-[var(--text-primary)] font-semibold">
                <svg class="w-4 h-4 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.862 3.487a2.25 2.25 0 013.182 3.182L7.5 19.213 3 20.25l1.037-4.5L16.862 3.487z" />
                </svg>
                <span class="sidebar-add-slide">Edit Chapter Info</span>
            </button>
        </div>

        <div id="sidebar-list" class="flex-1 overflow-y-auto custom-scrollbar p-4 space-y-3"></div>

        <div class="sidebar-footer p-4 pt-0">
            <button id="add-slide-btn"
                    class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl border border-[var(--border-ui)] hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors text-slate-600 dark:text-slate-300 font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="sidebar-add-slide">Add New Slide</span>
            </button>
        </div>
    </aside>
</div>

<div id="edit-chapter-modal" class="fixed inset-0 z-[116] hidden items-center justify-center">
    <div id="edit-chapter-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
    <div class="relative bg-[var(--bg-card)] border border-[var(--border-ui)] rounded-2xl shadow-2xl w-full max-w-lg mx-4 max-h-[90vh] overflow-hidden flex flex-col">
        <div class="flex items-center justify-between px-6 py-4 border-b border-[var(--border-ui)]">
            <div>
                <h2 class="text-lg font-bold text-[var(--text-primary)]">Edit Chapter</h2>
                <p class="text-sm text-[var(--text-secondary)] mt-1">Update chapter title and description</p>
            </div>
            <button id="edit-chapter-close" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-[var(--text-secondary)]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form id="edit-chapter-form" method="POST" action="{{ route('tutor.chapter.updateChapterTitle', ['chapter' => $chapter->id]) }}">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="edit-chapter-title" class="block text-sm font-semibold text-[var(--text-primary)] mb-2">Title</label>
                        <input type="text" id="edit-chapter-title" name="title" value="{{ old('title', $chapter->title ?? '') }}" class="w-full px-4 py-3 rounded-xl border border-[var(--border-ui)] bg-[var(--bg-body)] text-[var(--text-primary)] focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label for="edit-chapter-description" class="block text-sm font-semibold text-[var(--text-primary)] mb-2">Description</label>
                        <textarea id="edit-chapter-description" name="description" rows="5" class="w-full px-4 py-3 rounded-xl border border-[var(--border-ui)] bg-[var(--bg-body)] text-[var(--text-primary)] focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all resize-none">{{ old('description', $chapter->description ?? '') }}</textarea>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-[var(--border-ui)] mt-4">
                    <button type="button" id="edit-chapter-cancel" class="px-4 py-2 rounded-xl border border-[var(--border-ui)] text-[var(--text-primary)] font-semibold hover:bg-[var(--bg-body)] transition-colors">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded-xl bg-brand text-white font-semibold hover:bg-brand-glow transition-colors">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="delete-slide-modal" class="fixed inset-0 z-[110] hidden items-center justify-center">
    <div id="delete-slide-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
    <div class="relative bg-[var(--bg-card)] border border-[var(--border-ui)] rounded-2xl shadow-2xl w-full max-w-md mx-4 overflow-hidden flex flex-col">
        <div class="flex items-center justify-between px-6 py-4 border-b border-[var(--border-ui)]">
            <div>
                <h2 class="text-lg font-bold text-[var(--text-primary)]">Delete Slide</h2>
                <p class="text-sm text-[var(--text-secondary)] mt-1">This action cannot be undone.</p>
            </div>
            <button id="delete-slide-close" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-[var(--text-secondary)]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <p class="text-sm text-[var(--text-secondary)]">Are you sure you want to delete <span id="delete-slide-title" class="font-semibold text-[var(--text-primary)]">this slide</span>?</p>
            <form id="delete-slide-form" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="flex items-center justify-end gap-3">
                    <button type="button" id="delete-slide-cancel" class="px-4 py-2 rounded-xl border border-[var(--border-ui)] text-[var(--text-primary)] font-semibold hover:bg-[var(--bg-body)] transition-colors">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded-xl bg-rose-600 text-white font-semibold hover:bg-rose-500 transition-colors">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="edit-slide-modal" class="fixed inset-0 z-[115] hidden items-center justify-center">
    <div id="edit-slide-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
    <div class="relative bg-[var(--bg-card)] border border-[var(--border-ui)] rounded-2xl shadow-2xl w-full max-w-lg mx-4 max-h-[90vh] overflow-hidden flex flex-col">
        <div class="flex items-center justify-between px-6 py-4 border-b border-[var(--border-ui)]">
            <div>
                <h2 class="text-lg font-bold text-[var(--text-primary)]">Edit Slide</h2>
                <p class="text-sm text-[var(--text-secondary)] mt-1">Update slide details</p>
            </div>
            <button id="edit-slide-close" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-[var(--text-secondary)]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form id="edit-slide-form" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="edit-slide-title" class="block text-sm font-semibold text-[var(--text-primary)] mb-2">Title</label>
                        <input type="text" id="edit-slide-title" name="title" class="w-full px-4 py-3 rounded-xl border border-[var(--border-ui)] bg-[var(--bg-body)] text-[var(--text-primary)] focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label for="edit-slide-path" class="block text-sm font-semibold text-[var(--text-primary)] mb-2">Path</label>
                        <input type="text" id="edit-slide-path" name="path" class="w-full px-4 py-3 rounded-xl border border-[var(--border-ui)] bg-[var(--bg-body)] text-[var(--text-primary)] focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label for="edit-slide-order" class="block text-sm font-semibold text-[var(--text-primary)] mb-2">Order</label>
                        <input type="number" id="edit-slide-order" name="order" class="w-full px-4 py-3 rounded-xl border border-[var(--border-ui)] bg-[var(--bg-body)] text-[var(--text-primary)] focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label for="edit-teacher-cue" class="block text-sm font-semibold text-[var(--text-primary)] mb-2">Teacher Cue</label>
                        <textarea id="edit-teacher-cue" name="teacher_cue" rows="4" class="w-full px-4 py-3 rounded-xl border border-[var(--border-ui)] bg-[var(--bg-body)] text-[var(--text-primary)] focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all resize-none"></textarea>
                        <p class="text-xs text-[var(--text-secondary)] mt-2">One cue per line</p>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-[var(--border-ui)] mt-4">
                    <button type="button" id="edit-slide-cancel" class="px-4 py-2 rounded-xl border border-[var(--border-ui)] text-[var(--text-primary)] font-semibold hover:bg-[var(--bg-body)] transition-colors">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded-xl bg-brand text-white font-semibold hover:bg-brand-glow transition-colors">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="show-code-modal" class="fixed inset-0 z-[113] hidden items-center justify-center">
    <div id="show-code-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
    <div class="relative bg-[var(--bg-card)] border border-[var(--border-ui)] rounded-2xl shadow-2xl w-full max-w-5xl mx-4 max-h-[90vh] overflow-hidden flex flex-col">
        <div class="flex items-start justify-between gap-4 px-6 py-4 border-b border-[var(--border-ui)]">
            <div class="min-w-0">
                <h2 id="show-code-title" class="text-lg font-bold text-[var(--text-primary)]">Slide Code</h2>
                <p id="show-code-view-name" class="text-sm text-[var(--text-secondary)] mt-1 truncate">Loading view source...</p>
            </div>
            <div class="flex items-center gap-2 shrink-0">
                <button type="button" id="copy-path-btn" class="px-3 py-2 rounded-xl border border-[var(--border-ui)] text-sm font-semibold text-[var(--text-primary)] hover:bg-[var(--bg-body)] transition-colors">
                    Copy path
                </button>
                <button type="button" id="copy-code-btn" class="px-3 py-2 rounded-xl border border-[var(--border-ui)] text-sm font-semibold text-[var(--text-primary)] hover:bg-[var(--bg-body)] transition-colors">
                    Copy code
                </button>
                <button id="show-code-close" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-[var(--text-secondary)] shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="p-6 overflow-y-auto code-viewer-shell">
            <pre id="show-slide-code" class="code-viewer">Loading...</pre>
        </div>
        <div class="flex items-center justify-end px-6 py-4 border-t border-[var(--border-ui)]">
            <button type="button" id="show-code-cancel" class="px-4 py-2 rounded-xl border border-[var(--border-ui)] text-[var(--text-primary)] font-semibold hover:bg-[var(--bg-body)] transition-colors">Close</button>
        </div>
    </div>
</div>

<div id="add-slide-modal" class="fixed inset-0 z-[100] hidden items-center justify-center">
    <div id="add-slide-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

    <div class="relative bg-[var(--bg-card)] border border-[var(--border-ui)] rounded-2xl shadow-2xl w-full max-w-lg mx-4 max-h-[90vh] overflow-hidden flex flex-col">
        <div class="flex items-center justify-between px-6 py-4 border-b border-[var(--border-ui)]">
            <div>
                <h2 class="text-xl font-bold text-[var(--text-primary)]">Add New Slide</h2>
                <p class="text-sm text-[var(--text-secondary)] mt-1">Select a type and add your slide details</p>
            </div>
            <button id="add-slide-close" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-[var(--text-secondary)]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="p-6 overflow-y-auto">
            <form id="add-slide-form" action="{{route('slider.store',['chapter_id'=>$chapter->id])}}" method="POST" class="space-y-5">
                @csrf
                <div class="hidden">
                    <label for="slide-type-id" class="block text-sm font-semibold text-[var(--text-primary)] mb-2">
                        Slide Type
                    </label>
                    <input
                            type="text"
                            id="slide-type-search"
                            placeholder="Search slide types..."
                            class="w-full mb-3 px-4 py-3 rounded-xl border border-[var(--border-ui)] bg-[var(--bg-body)] text-[var(--text-primary)] placeholder:text-[var(--text-secondary)] focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                    >
                    <select
                            id="slide-type-id"
                            name="slide_type_id"
                            class="w-full px-4 py-3 rounded-xl border border-[var(--border-ui)] bg-[var(--bg-body)] text-[var(--text-primary)] focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all cursor-pointer"
                    >
                        <option value="" disabled selected>Select a slide type...</option>
                        @if(isset($slideTypes) && count($slideTypes))
                            @foreach($slideTypes as $type)
                                <option value="{{ $type->id }}" data-image="{{ $type->getFirstMediaUrl('illustrative_image') }}">{{ $type->title }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="mt-3 flex items-center gap-3">
                        <div class="w-24 h-16 rounded-lg border border-[var(--border-ui)] bg-[var(--bg-body)] overflow-hidden flex items-center justify-center cursor-pointer relative group" id="slide-type-preview">
                            <img id="slide-type-image" alt="Slide type preview" class="w-full h-full object-cover opacity-0 transition-opacity" />
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors"></div>
                            <div class="absolute bottom-1 right-1 bg-black/70 text-white rounded-md p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4h-4v4M16 4h4v4M8 20h-4v-4M16 20h4v-4" />
                                </svg>
                            </div>
                        </div>
                        <p id="slide-type-caption" class="text-xs text-[var(--text-secondary)]">Select a slide type to preview</p>
                    </div>
                </div>

                <div>
                    <label for="slide-path" class="block text-sm font-semibold text-[var(--text-primary)] mb-2">
                        Slide Path
                    </label>
                    <input
                            type="text"
                            id="slide-path"
                            name="path"
                            placeholder="Enter slide path..."
                            class="w-full px-4 py-3 rounded-xl border border-[var(--border-ui)] bg-[var(--bg-body)] text-[var(--text-primary)] placeholder:text-[var(--text-secondary)] focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                    >
                </div>
                <div>
                    <label for="slide-title" class="block text-sm font-semibold text-[var(--text-primary)] mb-2">
                        Slide Title
                    </label>
                    <input
                            type="text"
                            id="slide-title"
                            name="title"
                            required
                            placeholder="Enter slide title..."
                            class="w-full px-4 py-3 rounded-xl border border-[var(--border-ui)] bg-[var(--bg-body)] text-[var(--text-primary)] placeholder:text-[var(--text-secondary)] focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                    >
                </div>

                <div>
                    <label for="teacher-cue" class="block text-sm font-semibold text-[var(--text-primary)] mb-2">
                        Teacher Cue
                    </label>
                    <textarea
                            id="teacher-cue"
                            name="teacher_cue"
                            rows="4"
                            placeholder="Enter teacher cues (one per line)..."
                            class="w-full px-4 py-3 rounded-xl border border-[var(--border-ui)] bg-[var(--bg-body)] text-[var(--text-primary)] placeholder:text-[var(--text-secondary)] focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all resize-none"
                    ></textarea>
                    <p class="text-xs text-[var(--text-secondary)] mt-2">Enter each cue on a new line</p>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-[var(--border-ui)]">
                    <button
                            type="button"
                            id="add-slide-cancel"
                            class="px-5 py-2.5 rounded-xl border border-[var(--border-ui)] text-[var(--text-primary)] font-semibold hover:bg-[var(--bg-body)] transition-colors"
                    >
                        Cancel
                    </button>
                    <button
                            type="submit"
                            class="px-5 py-2.5 rounded-xl bg-brand text-white font-semibold hover:bg-brand-glow shadow-lg shadow-brand/20 transition-all hover:scale-105 active:scale-95"
                    >
                        Add Slide
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="image-lightbox" class="fixed inset-0 z-[110] hidden items-center justify-center">
    <div id="image-lightbox-backdrop" class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>
    <div class="relative max-w-4xl w-[92vw] max-h-[88vh] bg-[var(--bg-card)] border border-[var(--border-ui)] rounded-2xl shadow-2xl p-4">
        <button id="image-lightbox-close" class="absolute -top-4 -right-4 bg-[var(--bg-card)] border border-[var(--border-ui)] rounded-full p-2 shadow-lg hover:bg-slate-100 dark:hover:bg-slate-800">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <img id="image-lightbox-img" alt="Slide type illustrative image" class="w-full h-full object-contain max-h-[80vh] rounded-xl" />
    </div>
</div>


<script>
    let slideData = @json($slides);
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

    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const desktopSidebarToggleBtn = document.getElementById('desktop-sidebar-toggle-btn');
    const closeSidebarBtn = document.getElementById('close-sidebar-btn');
    const sidebarDrawer = document.getElementById('sidebar-drawer');
    const sidebarOverlay = document.getElementById('mobile-sidebar-overlay');
    const toolToggleBtn = document.getElementById('editor-tool-toggle');
    const toolPopover = document.getElementById('editor-tool-popover');
    const toolButtons = document.querySelectorAll('[data-tool]');
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

    function init() {
        createSlides();
        initializeAnnotationLayers();
        createSidebar();
        updateSlides();
        toggleSidebar(state.sidebarOpen);

        applyToolMode();

        window.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight' || e.key === ' ') nextSlide();
            if (e.key === 'ArrowLeft') prevSlide();
        });

        window.addEventListener('resize', handleViewportResize);

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

        updateActiveToolButton();
    }

    function handleViewportResize() {
        syncAllAnnotationCanvasSizes();

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

    function escapeHtml(value) {
        return String(value ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function createSlides() {
        const wrapper = document.getElementById('slides-wrapper');
        const template = document.getElementById('slide-template');
        if (!wrapper || !template) return;

        wrapper.querySelectorAll('.slide').forEach((slide) => slide.remove());

        const fragment = document.createDocumentFragment();

        slideData.forEach((data) => {
            const clone = template.content.cloneNode(true);
            const slide = clone.querySelector('.slide');
            const iframe = slide.querySelector('iframe');

            slide.dataset.slideId = String(data.id ?? '');

            iframe.onload = () => {
                const isDark = document.documentElement.classList.contains('dark');
                if (iframe.contentWindow && typeof iframe.contentWindow.setTheme === 'function') {
                    iframe.contentWindow.setTheme(isDark ? 'dark' : 'light');
                }
            };

            fragment.appendChild(clone);
        });

        wrapper.appendChild(fragment);
        state.slides = Array.from(wrapper.querySelectorAll('.slide'));
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
        return TOOL_CONFIG[state.activeTool] || TOOL_CONFIG.select;
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

    function getAnnotationSnapshots() {
        const snapshots = new Map();

        state.slides.forEach((slide, index) => {
            const slideId = slideData[index]?.id;
            const canvas = slide.querySelector('.annotation-layer');
            if (!slideId || !canvas || canvas.width === 0 || canvas.height === 0) return;

            try {
                snapshots.set(String(slideId), canvas.toDataURL());
            } catch (error) {
                console.warn('Could not capture slide annotation snapshot:', error);
            }
        });

        return snapshots;
    }

    function restoreAnnotationSnapshots(snapshots) {
        state.slides.forEach((slide, index) => {
            const slideId = slideData[index]?.id;
            const canvas = slide.querySelector('.annotation-layer');
            const snapshot = slideId ? snapshots.get(String(slideId)) : null;
            if (!canvas || !snapshot) return;

            const ctx = canvas.getContext('2d');
            const width = parseFloat(canvas.style.width) || canvas.width;
            const height = parseFloat(canvas.style.height) || canvas.height;
            const image = new Image();

            image.onload = () => {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(image, 0, 0, width, height);
            };

            image.src = snapshot;
        });
    }

    function loadSlideAtIndex(index) {
        if (index < 0 || index >= slideData.length || state.loadedSlides.has(index)) return;

        const slide = state.slides[index];
        if (!slide) return;

        const iframe = slide.querySelector('iframe');
        if (!iframe) return;

        const src = slideData[index]?.src;
        if (!src || src.trim() === '') return;

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
        if (!sidebarList) return;

        sidebarList.innerHTML = '';

        if (!slideData.length) {
            sidebarList.innerHTML = `
                <div class="rounded-2xl border border-dashed border-[var(--border-ui)] p-4 text-sm text-[var(--text-secondary)]">
                    No slides yet. Use "Add New Slide" to create the first one.
                </div>
            `;
            return;
        }

        slideData.forEach((data, i) => {
            const item = document.createElement('div');
            const cueText = Array.isArray(data.cue) ? data.cue.join('\n') : String(data.cue ?? '');

            item.className = 'sidebar-thumb flex items-center gap-4 p-3 rounded-2xl group border border-transparent active:scale-95';
            item.onclick = () => goToSlide(i);
            item.innerHTML = `
                <div class="thumb-number w-8 h-8 min-w-8 rounded-lg bg-slate-50 border border-[var(--border-ui)] flex items-center justify-center text-[10px] font-black group-hover:border-brand text-[var(--text-primary)]">
                    ${String(i + 1).padStart(2, '0')}
                </div>
                <div class="sidebar-slide-copy overflow-hidden">
                    <p class="text-[10px] font-black uppercase tracking-wider text-[var(--text-secondary)]">Slide ${i + 1}</p>
                    <p class="title text-sm md:text-md font-bold leading-tight text-[var(--text-primary)] truncate">${escapeHtml(data.title)}</p>
                </div>
                <div class="sidebar-actions ml-auto flex items-center gap-1.5">
                    <button class="show-slide-btn p-1.5 rounded-lg text-sky-500 hover:text-sky-600 hover:bg-sky-50 dark:hover:bg-sky-500/10 transition-colors" title="Show code" aria-label="Show slide code" data-slide-id="${escapeHtml(data.id)}" data-slide-title="${escapeHtml(data.title)}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0a3 3 0 016 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12Z" />
                        </svg>
                    </button>
                    <button class="edit-slide-btn p-1.5 rounded-lg text-indigo-500 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/10 transition-colors" data-slide-id="${escapeHtml(data.id)}" data-slide-title="${escapeHtml(data.title)}" data-slide-path="${escapeHtml(data.path ?? data.src ?? '')}" data-slide-order="${escapeHtml(data.order ?? data.position ?? '')}" data-slide-cue="${escapeHtml(cueText)}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.862 3.487a2.25 2.25 0 013.182 3.182L7.5 19.213 3 20.25l1.037-4.5L16.862 3.487z" />
                        </svg>
                    </button>
                    <button class="delete-slide-btn p-1.5 rounded-lg text-rose-500 hover:text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-500/10 transition-colors" data-slide-id="${escapeHtml(data.id)}" data-slide-title="${escapeHtml(data.title)}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 7h12m-9 0V5a1 1 0 011-1h2a1 1 0 011 1v2m-6 0l1 12a1 1 0 001 1h6a1 1 0 001-1l1-12" />
                        </svg>
                    </button>
                </div>
            `;

            sidebarList.appendChild(item);
        });

        sidebarList.querySelectorAll('.show-slide-btn').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const slideId = btn.getAttribute('data-slide-id');
                const slideTitle = btn.getAttribute('data-slide-title') || 'Slide Code';
                if (window.openShowCodeModal) {
                    window.openShowCodeModal(slideId, slideTitle);
                }
            });
        });

        sidebarList.querySelectorAll('.delete-slide-btn').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const slideId = btn.getAttribute('data-slide-id');
                const slideTitle = btn.getAttribute('data-slide-title') || 'this slide';
                if (window.openDeleteSlideModal) {
                    window.openDeleteSlideModal(slideId, slideTitle);
                }
            });
        });

        sidebarList.querySelectorAll('.edit-slide-btn').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const slideId = btn.getAttribute('data-slide-id');
                const slideTitle = btn.getAttribute('data-slide-title') || '';
                const slidePath = btn.getAttribute('data-slide-path') || '';
                const slideOrder = btn.getAttribute('data-slide-order') || '';
                const slideCue = btn.getAttribute('data-slide-cue') || '';
                if (window.openEditSlideModal) {
                    window.openEditSlideModal(slideId, { title: slideTitle, path: slidePath, order: slideOrder, cue: slideCue });
                }
            });
        });
    }

    function updateHeaderInfo() {
        const index = state.currentSlide;
        const currentData = slideData[index];
        const numEl = document.getElementById('header-slide-num');
        const titleEl = document.getElementById('header-slide-title');

        if (numEl) {
            numEl.textContent = currentData ? String(index + 1).padStart(2, '0') : '00';
        }

        if (titleEl) {
            titleEl.textContent = currentData?.title ?? 'No slides';
        }
    }

    function updateSlides() {
        const totalSlides = state.slides.length;

        if (!totalSlides) {
            document.querySelectorAll('.teacher-cue').forEach((el) => {
                el.innerHTML = '<div><span>No teacher cue available.</span></div>';
            });

            const emptyIndexText = '00 / 00';
            const footerIndex = document.getElementById('slide-index-footer');
            const mobileHeaderIndex = document.getElementById('slide-index-header-mobile');

            if (footerIndex) footerIndex.textContent = emptyIndexText;
            if (mobileHeaderIndex) mobileHeaderIndex.textContent = emptyIndexText;

            updateHeaderInfo();
            return;
        }

        state.currentSlide = Math.min(Math.max(state.currentSlide, 0), totalSlides - 1);

        state.slides.forEach((slide, index) => {
            slide.classList.toggle('active', index === state.currentSlide);
            slide.classList.toggle('prev', index < state.currentSlide);
            slide.classList.toggle('next', index > state.currentSlide);
        });

        loadSlideAtIndex(state.currentSlide);
        preloadUpcomingSlides(state.currentSlide);

        const thumbs = document.querySelectorAll('.sidebar-thumb');
        thumbs.forEach((thumb, index) => thumb.classList.toggle('active', index === state.currentSlide));

        const activeThumb = thumbs[state.currentSlide];
        if (activeThumb) activeThumb.scrollIntoView({ behavior: 'auto', block: 'nearest' });

        const activeSlide = state.slides[state.currentSlide];
        if (activeSlide) {
            const iframe = activeSlide.querySelector('iframe');
            if (iframe && iframe.contentWindow && typeof iframe.contentWindow.resetSlide === 'function') {
                setTimeout(() => {
                    try {
                        iframe.contentWindow.resetSlide();
                    } catch (e) {
                        console.log('Reset slide not ready or failed');
                    }
                }, 100);
            }
        }

        const currentData = slideData[state.currentSlide] ?? {};
        const cues = Array.isArray(currentData.cue) ? currentData.cue : [];
        const cueHtml = cues.map((cue) => `
                <div>
                    <span class="cue-marker"></span>
                    <span>${escapeHtml(cue)}</span>
                </div>
            `).join('');

        document.querySelectorAll('.teacher-cue').forEach((el) => {
            el.innerHTML = cueHtml || '<div><span>No teacher cue available.</span></div>';
        });

        const slideIndexText = `${String(state.currentSlide + 1).padStart(2, '0')} / ${String(totalSlides).padStart(2, '0')}`;
        const footerIndex = document.getElementById('slide-index-footer');
        const mobileHeaderIndex = document.getElementById('slide-index-header-mobile');

        if (footerIndex) footerIndex.textContent = slideIndexText;
        if (mobileHeaderIndex) mobileHeaderIndex.textContent = slideIndexText;

        updateHeaderInfo();
    }

    function stopAllIframeAudio() {
        const activeSlide = state.slides[state.currentSlide];
        if (!activeSlide) return;

        const iframe = activeSlide.querySelector('iframe');
        try {
            if (iframe && iframe.contentWindow && typeof iframe.contentWindow.stopSlideAudio === 'function') {
                iframe.contentWindow.stopSlideAudio();
            }
        } catch (e) {
            console.warn('Could not stop iframe audio:', e);
        }
    }

    function renderEditor(nextSlides, options = {}) {
        const annotationSnapshots = getAnnotationSnapshots();
        const focusSlideId = options.focusSlideId ?? null;
        const fallbackIndex = options.fallbackIndex ?? state.currentSlide;

        stopAllIframeAudio();
        slideData = Array.isArray(nextSlides) ? nextSlides : [];
        state.loadedSlides = new Set();

        createSlides();
        initializeAnnotationLayers();
        restoreAnnotationSnapshots(annotationSnapshots);
        createSidebar();

        if (!slideData.length) {
            state.currentSlide = 0;
            updateSlides();
            applyToolMode();
            return;
        }

        const preferredIndex = focusSlideId === null
            ? -1
            : slideData.findIndex((slide) => String(slide.id) === String(focusSlideId));
        const clampedFallbackIndex = Math.min(Math.max(fallbackIndex, 0), slideData.length - 1);

        state.currentSlide = preferredIndex >= 0 ? preferredIndex : clampedFallbackIndex;
        updateSlides();
        applyToolMode();
    }

    function parseCueLines(value) {
        return String(value ?? '')
            .split(/\r\n|\n|\r/)
            .map((line) => line.trim())
            .filter(Boolean);
    }

    function rebuildLoadedSlidesState() {
        state.loadedSlides = new Set(
            state.slides
                .map((slide, index) => {
                    const iframe = slide.querySelector('iframe');
                    return iframe?.getAttribute('src') ? index : null;
                })
                .filter((index) => index !== null)
        );
    }

    function updateSlideLocally(slideId, updates = {}) {
        const index = slideData.findIndex((slide) => String(slide.id) === String(slideId));
        if (index === -1) return;

        slideData[index] = {
            ...slideData[index],
            ...updates,
        };

        createSidebar();
        updateSlides();
    }

    function invalidateLoadedSlide(slideId) {
        const index = slideData.findIndex((slide) => String(slide.id) === String(slideId));
        if (index === -1 || !state.loadedSlides.has(index)) return;

        const slideElement = state.slides[index];
        const iframe = slideElement?.querySelector('iframe');

        if (iframe) {
            iframe.removeAttribute('src');
        }

        state.loadedSlides.delete(index);
    }

    function removeSlideLocally(slideId) {
        const index = slideData.findIndex((slide) => String(slide.id) === String(slideId));
        if (index === -1) return;

        const slideElement = state.slides[index];
        const deletingActiveSlide = state.currentSlide === index;

        if (deletingActiveSlide) {
            stopAllIframeAudio();
        }

        if (slideElement) {
            slideElement.remove();
        }

        slideData.splice(index, 1);
        state.slides = Array.from(document.querySelectorAll('#slides-wrapper .slide'));
        rebuildLoadedSlidesState();
        createSidebar();

        if (!slideData.length) {
            state.currentSlide = 0;
            updateSlides();
            applyToolMode();
            return;
        }

        if (state.currentSlide > index) {
            state.currentSlide -= 1;
        } else if (deletingActiveSlide) {
            state.currentSlide = Math.min(index, slideData.length - 1);
        }

        updateSlides();
        applyToolMode();
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
        if (index < 0 || index >= state.slides.length) return;
        stopAllIframeAudio();
        state.currentSlide = index;
        updateSlides();
    }

    function toggleFullscreen() {
        if (!document.fullscreenElement) document.documentElement.requestFullscreen();
        else if (document.exitFullscreen) document.exitFullscreen();
    }

    document.addEventListener('DOMContentLoaded', init);

    const addSlideBtn = document.getElementById('add-slide-btn');
    const addSlideModal = document.getElementById('add-slide-modal');
    const addSlideBackdrop = document.getElementById('add-slide-backdrop');
    const addSlideClose = document.getElementById('add-slide-close');
    const addSlideCancel = document.getElementById('add-slide-cancel');
    const slideTypeSelect = document.getElementById('slide-type-id');
    const slideTypeSearch = document.getElementById('slide-type-search');
    const slideTypeImage = document.getElementById('slide-type-image');
    const slideTypeCaption = document.getElementById('slide-type-caption');
    const slideTypePreview = document.getElementById('slide-type-preview');
    const imageLightbox = document.getElementById('image-lightbox');
    const imageLightboxBackdrop = document.getElementById('image-lightbox-backdrop');
    const imageLightboxClose = document.getElementById('image-lightbox-close');
    const imageLightboxImg = document.getElementById('image-lightbox-img');
    const deleteSlideModal = document.getElementById('delete-slide-modal');
    const deleteSlideBackdrop = document.getElementById('delete-slide-backdrop');
    const deleteSlideClose = document.getElementById('delete-slide-close');
    const deleteSlideCancel = document.getElementById('delete-slide-cancel');
    const deleteSlideTitle = document.getElementById('delete-slide-title');
    const deleteSlideForm = document.getElementById('delete-slide-form');
    const deleteRouteTemplate = @json(route('slider.delete', ['slide_id' => '__ID__']));
    const editChapterBtn = document.getElementById('edit-chapter-btn');
    const editChapterModal = document.getElementById('edit-chapter-modal');
    const editChapterBackdrop = document.getElementById('edit-chapter-backdrop');
    const editChapterClose = document.getElementById('edit-chapter-close');
    const editChapterCancel = document.getElementById('edit-chapter-cancel');
    const editChapterForm = document.getElementById('edit-chapter-form');
    const editSlideModal = document.getElementById('edit-slide-modal');
    const editSlideBackdrop = document.getElementById('edit-slide-backdrop');
    const editSlideClose = document.getElementById('edit-slide-close');
    const editSlideCancel = document.getElementById('edit-slide-cancel');
    const editSlideForm = document.getElementById('edit-slide-form');
    const editSlideTitle = document.getElementById('edit-slide-title');
    const editSlidePath = document.getElementById('edit-slide-path');
    const editSlideOrder = document.getElementById('edit-slide-order');
    const editTeacherCue = document.getElementById('edit-teacher-cue');
    const editRouteTemplate = @json(route('slider.update', ['slide_id' => '__ID__']));
    const showCodeModal = document.getElementById('show-code-modal');
    const showCodeBackdrop = document.getElementById('show-code-backdrop');
    const showCodeClose = document.getElementById('show-code-close');
    const showCodeCancel = document.getElementById('show-code-cancel');
    const showCodeTitle = document.getElementById('show-code-title');
    const showCodeViewName = document.getElementById('show-code-view-name');
    const showSlideCode = document.getElementById('show-slide-code');
    const copyPathBtn = document.getElementById('copy-path-btn');
    const copyCodeBtn = document.getElementById('copy-code-btn');
    const codeRouteTemplate = @json(route('slider.code', ['slide_id' => '__ID__']));
    let showCodeRequestId = 0;
    let currentShowCodePath = '';
    let copyPathBtnResetTimeout = null;
    let copyCodeBtnResetTimeout = null;
    let toastResetTimeout = null;

    function getOrCreateToast() {
        let toast = document.getElementById('editor-toast');
        if (toast) return toast;

        toast = document.createElement('div');
        toast.id = 'editor-toast';
        toast.className = 'fixed bottom-5 left-1/2 z-[140] -translate-x-1/2 translate-y-2 rounded-2xl px-4 py-3 text-sm font-semibold shadow-2xl transition-all duration-200 opacity-0 pointer-events-none';
        document.body.appendChild(toast);

        return toast;
    }

    function showToast(message, type = 'success') {
        if (!message) return;

        const toast = getOrCreateToast();
        toast.textContent = message;
        toast.classList.remove('bg-emerald-600', 'text-white', 'bg-rose-600', 'opacity-0', 'translate-y-2');
        toast.classList.add(type === 'error' ? 'bg-rose-600' : 'bg-emerald-600', 'text-white');

        requestAnimationFrame(() => {
            toast.classList.remove('opacity-0', 'translate-y-2');
        });

        clearTimeout(toastResetTimeout);
        toastResetTimeout = setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-2');
        }, 2200);
    }

    function setFormSubmitting(form, submitting, label) {
        const submitButton = form?.querySelector('button[type="submit"]');
        if (!submitButton) return;

        if (submitting) {
            if (!submitButton.dataset.originalLabel) {
                submitButton.dataset.originalLabel = submitButton.innerHTML;
            }
            submitButton.disabled = true;
            submitButton.classList.add('opacity-70', 'cursor-not-allowed');
            if (label) submitButton.textContent = label;
            return;
        }

        submitButton.disabled = false;
        submitButton.classList.remove('opacity-70', 'cursor-not-allowed');
        if (submitButton.dataset.originalLabel) {
            submitButton.innerHTML = submitButton.dataset.originalLabel;
        }
    }

    function getMutationErrorMessage(response, payload) {
        const validationErrors = Object.values(payload?.errors ?? {}).flat();
        if (validationErrors.length) return validationErrors[0];
        if (payload?.message) return payload.message;
        return `Request failed with status ${response.status}.`;
    }

    async function submitSlideMutation(form, options = {}) {
        if (!form) return null;

        setFormSubmitting(form, true, options.loadingText);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: new FormData(form),
            });

            const payload = await response.json().catch(() => ({}));

            if (!response.ok) {
                throw new Error(getMutationErrorMessage(response, payload));
            }

            if (typeof options.onSuccess === 'function') {
                options.onSuccess(payload);
            }

            showToast(payload?.message || 'Saved successfully');
            return payload;
        } catch (error) {
            showToast(error instanceof Error ? error.message : 'Something went wrong.', 'error');
            return null;
        } finally {
            setFormSubmitting(form, false);
        }
    }

    function openAddSlideModal() {
        if (!addSlideModal) return;
        addSlideModal.classList.remove('hidden');
        addSlideModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeAddSlideModal() {
        if (!addSlideModal) return;
        addSlideModal.classList.add('hidden');
        addSlideModal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    if (addSlideBtn) addSlideBtn.addEventListener('click', openAddSlideModal);
    if (addSlideBackdrop) addSlideBackdrop.addEventListener('click', closeAddSlideModal);
    if (addSlideClose) addSlideClose.addEventListener('click', closeAddSlideModal);
    if (addSlideCancel) addSlideCancel.addEventListener('click', closeAddSlideModal);

    if (slideTypeSelect && slideTypeImage && slideTypeCaption) {
        slideTypeSelect.addEventListener('change', () => {
            const option = slideTypeSelect.options[slideTypeSelect.selectedIndex];
            const image = option?.dataset?.image;
            if (image) {
                slideTypeImage.src = image;
                slideTypeImage.classList.remove('opacity-0');
                slideTypeCaption.textContent = option.textContent.trim();
            } else {
                slideTypeImage.removeAttribute('src');
                slideTypeImage.classList.add('opacity-0');
                slideTypeCaption.textContent = 'Select a slide type to preview';
            }
        });
    }

    if (slideTypeSearch && slideTypeSelect) {
        slideTypeSearch.addEventListener('input', () => {
            const query = slideTypeSearch.value.trim().toLowerCase();
            const options = Array.from(slideTypeSelect.options);
            options.forEach((option, index) => {
                if (index === 0) return;
                const text = option.textContent.toLowerCase();
                option.hidden = query !== '' && !text.includes(query);
            });
        });
    }

    function openImageLightbox() {
        if (!imageLightbox || !slideTypeImage?.src) return;
        imageLightboxImg.src = slideTypeImage.src;
        imageLightbox.classList.remove('hidden');
        imageLightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeImageLightbox() {
        if (!imageLightbox) return;
        imageLightbox.classList.add('hidden');
        imageLightbox.classList.remove('flex');
        document.body.style.overflow = '';
    }

    if (slideTypePreview) slideTypePreview.addEventListener('click', openImageLightbox);
    if (imageLightboxBackdrop) imageLightboxBackdrop.addEventListener('click', closeImageLightbox);
    if (imageLightboxClose) imageLightboxClose.addEventListener('click', closeImageLightbox);

    window.openDeleteSlideModal = (slideId, title) => {
        if (!deleteSlideModal || !deleteSlideForm) return;
        deleteSlideForm.action = deleteRouteTemplate.replace('__ID__', slideId);
        deleteSlideForm.dataset.slideId = slideId;
        if (deleteSlideTitle) deleteSlideTitle.textContent = title || 'this slide';
        deleteSlideModal.classList.remove('hidden');
        deleteSlideModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    };

    function closeDeleteSlideModal() {
        if (!deleteSlideModal) return;
        deleteSlideModal.classList.add('hidden');
        deleteSlideModal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    if (deleteSlideBackdrop) deleteSlideBackdrop.addEventListener('click', closeDeleteSlideModal);
    if (deleteSlideClose) deleteSlideClose.addEventListener('click', closeDeleteSlideModal);
    if (deleteSlideCancel) deleteSlideCancel.addEventListener('click', closeDeleteSlideModal);

    function openEditChapterModal() {
        if (!editChapterModal) return;
        editChapterModal.classList.remove('hidden');
        editChapterModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeEditChapterModal() {
        if (!editChapterModal) return;
        editChapterModal.classList.add('hidden');
        editChapterModal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    if (editChapterBtn) editChapterBtn.addEventListener('click', openEditChapterModal);
    if (editChapterBackdrop) editChapterBackdrop.addEventListener('click', closeEditChapterModal);
    if (editChapterClose) editChapterClose.addEventListener('click', closeEditChapterModal);
    if (editChapterCancel) editChapterCancel.addEventListener('click', closeEditChapterModal);

    if (editChapterForm) {
        editChapterForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            await submitSlideMutation(editChapterForm, {
                loadingText: 'Saving...',
                onSuccess: closeEditChapterModal,
            });
        });
    }

    if (deleteSlideForm) {
        deleteSlideForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            const deletingSlideId = deleteSlideForm.dataset.slideId;
            const payload = await submitSlideMutation(deleteSlideForm, {
                loadingText: 'Deleting...',
                onSuccess: () => {
                    removeSlideLocally(deletingSlideId);
                    closeDeleteSlideModal();
                },
            });

            if (!payload) return;
        });
    }

    window.openEditSlideModal = (slideId, data) => {
        if (!editSlideModal || !editSlideForm) return;
        editSlideForm.action = editRouteTemplate.replace('__ID__', slideId);
        editSlideForm.dataset.slideId = slideId;
        if (editSlideTitle) editSlideTitle.value = data?.title ?? '';
        if (editSlidePath) editSlidePath.value = data?.path ?? '';
        if (editSlideOrder) editSlideOrder.value = data?.order ?? '';
        if (editTeacherCue) {
            const cueRaw = data?.cue ?? '';
            editTeacherCue.value = typeof cueRaw === 'string'
                ? cueRaw.replace(/\\n/g, '\n')
                : cueRaw;
        }
        editSlideModal.classList.remove('hidden');
        editSlideModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    };

    function closeEditSlideModal() {
        if (!editSlideModal) return;
        editSlideModal.classList.add('hidden');
        editSlideModal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    if (editSlideBackdrop) editSlideBackdrop.addEventListener('click', closeEditSlideModal);
    if (editSlideClose) editSlideClose.addEventListener('click', closeEditSlideModal);
    if (editSlideCancel) editSlideCancel.addEventListener('click', closeEditSlideModal);

    if (editSlideForm) {
        editSlideForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            const slideId = editSlideForm.dataset.slideId;
            const currentSlide = slideData.find((slide) => String(slide.id) === String(slideId));
            const nextTitle = editSlideTitle?.value ?? '';
            const nextCue = parseCueLines(editTeacherCue?.value ?? '');
            const nextPath = editSlidePath?.value ?? '';
            const payload = await submitSlideMutation(editSlideForm, {
                loadingText: 'Saving...',
                onSuccess: () => {
                    if ((currentSlide?.path ?? '') !== nextPath) {
                        invalidateLoadedSlide(slideId);
                    }

                    updateSlideLocally(slideId, {
                        title: nextTitle,
                        cue: nextCue,
                        path: nextPath,
                    });

                    closeEditSlideModal();
                },
            });

            if (!payload) return;
        });
    }

    window.openShowCodeModal = async (slideId, title) => {
        if (!showCodeModal || !showSlideCode) return;

        const requestId = ++showCodeRequestId;
        if (showCodeTitle) showCodeTitle.textContent = title || 'Slide Code';
        if (showCodeViewName) showCodeViewName.textContent = 'Loading view source...';
        currentShowCodePath = '';
        showSlideCode.textContent = 'Loading...';
        showCodeModal.classList.remove('hidden');
        showCodeModal.classList.add('flex');
        document.body.style.overflow = 'hidden';

        try {
            const response = await fetch(codeRouteTemplate.replace('__ID__', slideId), {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
            });

            if (!response.ok) {
                throw new Error('Unable to load this slide view.');
            }

            const data = await response.json();
            if (requestId !== showCodeRequestId) return;

            if (showCodeTitle) showCodeTitle.textContent = data?.title || title || 'Slide Code';
            if (showCodeViewName) showCodeViewName.textContent = (data?.view || '').replace(/\./g, '/') || 'View source';
            currentShowCodePath = String(data?.view || '').replace(/\./g, '/');
            showSlideCode.textContent = data?.code ?? '';
        } catch (error) {
            if (requestId !== showCodeRequestId) return;

            if (showCodeViewName) showCodeViewName.textContent = 'View source unavailable';
            currentShowCodePath = '';
            showSlideCode.textContent = error instanceof Error
                ? error.message
                : 'Unable to load this slide view.';
        }
    };

    function closeShowCodeModal() {
        if (!showCodeModal) return;
        showCodeRequestId++;
        showCodeModal.classList.add('hidden');
        showCodeModal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    function setCopyButtonLabel(label) {
        if (!copyCodeBtn) return;
        copyCodeBtn.textContent = label;
    }

    function setCopyPathButtonLabel(label) {
        if (!copyPathBtn) return;
        copyPathBtn.textContent = label;
    }

    if (copyPathBtn) {
        copyPathBtn.addEventListener('click', async () => {
            if (!currentShowCodePath) {
                setCopyPathButtonLabel('Nothing to copy');
            } else {
                try {
                    await navigator.clipboard.writeText(currentShowCodePath);
                    setCopyPathButtonLabel('Copied');
                } catch (error) {
                    setCopyPathButtonLabel('Copy failed');
                }
            }

            clearTimeout(copyPathBtnResetTimeout);
            copyPathBtnResetTimeout = setTimeout(() => {
                setCopyPathButtonLabel('Copy path');
            }, 1600);
        });
    }

    if (copyCodeBtn) {
        copyCodeBtn.addEventListener('click', async () => {
            const code = showSlideCode?.textContent ?? '';
            if (!code || code === 'Loading...' || code === 'Unable to load this slide view.') {
                setCopyButtonLabel('Nothing to copy');
            } else {
                try {
                    await navigator.clipboard.writeText(code);
                    setCopyButtonLabel('Copied');
                } catch (error) {
                    setCopyButtonLabel('Copy failed');
                }
            }

            clearTimeout(copyCodeBtnResetTimeout);
            copyCodeBtnResetTimeout = setTimeout(() => {
                setCopyButtonLabel('Copy code');
            }, 1600);
        });
    }

    if (showCodeBackdrop) showCodeBackdrop.addEventListener('click', closeShowCodeModal);
    if (showCodeClose) showCodeClose.addEventListener('click', closeShowCodeModal);
    if (showCodeCancel) showCodeCancel.addEventListener('click', closeShowCodeModal);
</script>

</body>
</html>
