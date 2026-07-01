<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <title>{{ config('chatify.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="id" content="{{ $id }}">
    <meta name="groups" content="{{ $groups }}">
    <meta name="courses" content="{{ $courses }}">
    <meta name="messenger-color" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

    <script>
        window.tailwind = window.tailwind || {};
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Manrope', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'sans-serif'],
                    },
                },
            },
        };
    </script>
    {{-- Tailwind CDN is intentional for this current Chatify redesign setup. --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="{{ asset('template/core/jquery.min.js') }}"></script>
    <script src="{{ asset('template/chatify/js/font.awesome.min.js') }}"></script>
    <script src="{{ asset('template/chatify/js/autosize.min.js') }}"></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        .messenger-sendCard {
            flex-shrink: 0 !important;
            border-top: 1px solid rgba(15, 23, 42, .05) !important;
            background: rgba(250, 250, 255, .95) !important;
            padding: .75rem 1rem !important;
            backdrop-filter: blur(12px);
        }

        #message-form {
            display: flex !important;
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 auto !important;
            align-items: center !important;
            gap: .75rem !important;
            border: 0 !important;
            background: transparent !important;
            box-shadow: none !important;
            outline: 0 !important;
            position: relative !important;
        }

        #message-form > label {
            display: inline-flex !important;
            width: 3rem !important;
            height: 3rem !important;
            flex: 0 0 3rem !important;
            align-items: center !important;
            justify-content: center !important;
            border: 0 !important;
            border-radius: 999px !important;
            background: linear-gradient(135deg, #6D4CFF, #4F35D8) !important;
            color: #fff !important;
            box-shadow: 0 12px 24px rgba(91, 63, 234, .25) !important;
            cursor: pointer !important;
            line-height: 1 !important;
        }

        #message-form > label svg,
        #message-form > label .fas,
        #message-form > label .svg-inline--fa {
            width: 1.6rem !important;
            height: 1.6rem !important;
            border: 0 !important;
            border-radius: 0 !important;
            background: transparent !important;
            box-shadow: none !important;
            color: #fff !important;
            display: block !important;
            font-size: 1.25rem !important;
            line-height: 1 !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .upload-attachment {
            display: none !important;
        }

        #message-form > div {
            display: flex !important;
            height: 3rem !important;
            min-width: 0 !important;
            flex: 1 1 auto !important;
            align-items: center !important;
            gap: .75rem !important;
            border: 1px solid rgba(15, 23, 42, .05) !important;
            border-radius: 999px !important;
            background: #fff !important;
            padding: 0 1.25rem !important;
            box-shadow: 0 10px 34px rgba(15, 23, 42, .045) !important;
        }

        #message-form .m-send {
            display: block !important;
            width: 100% !important;
            height: 100% !important;
            min-width: 0 !important;
            flex: 1 1 auto !important;
            border: 0 !important;
            background: transparent !important;
            box-shadow: none !important;
            color: #0f172a !important;
            font-size: .95rem !important;
            font-weight: 500 !important;
            line-height: 1.5rem !important;
            outline: 0 !important;
            padding: .72rem 0 !important;
            resize: none !important;
        }

        #message-form > .m-send {
            order: 2 !important;
            height: 3rem !important;
            border: 1px solid rgba(15, 23, 42, .05) !important;
            border-radius: 999px !important;
            background: #fff !important;
            padding: .72rem 5.75rem .72rem 1.25rem !important;
            box-shadow: 0 10px 34px rgba(15, 23, 42, .045) !important;
        }

        #message-form .m-send::placeholder {
            color: #94a3b8 !important;
        }

        #message-form .emoji-button,
        #message-form .send-button,
        #startRecordingBtn {
            display: inline-flex !important;
            width: 1.75rem !important;
            height: 1.75rem !important;
            flex: 0 0 1.75rem !important;
            align-items: center !important;
            justify-content: center !important;
            border: 0 !important;
            background: transparent !important;
            color: #5B3FEA !important;
            cursor: pointer !important;
            line-height: 1 !important;
            outline: 0 !important;
            padding: 0 !important;
        }

        #message-form .emoji-button svg,
        #message-form .send-button svg,
        #startRecordingBtn svg {
            width: 1.65rem !important;
            height: 1.65rem !important;
        }

        #message-form .emoji-button .fas,
        #message-form .send-button .fas {
            font-size: 1.25rem !important;
        }

        #message-form .send-button.d-none,
        #message-form .box_recorder.d-none {
            display: none !important;
        }

        #message-form > .emoji-button,
        #message-form > #startRecordingBtn,
        #message-form > .send-button:not(.d-none) {
            position: absolute !important;
            top: 50% !important;
            z-index: 2 !important;
            transform: translateY(-50%) !important;
        }

        #message-form > .emoji-button {
            right: 4.35rem !important;
        }

        #message-form > #startRecordingBtn,
        #message-form > .send-button:not(.d-none) {
            right: 1.55rem !important;
        }

        #message-form .box_recorder {
            min-width: 0 !important;
            flex: 1 1 auto !important;
            align-items: center !important;
        }

        #message-form .box_start {
            display: flex !important;
            width: 100% !important;
            min-width: 0 !important;
            align-items: center !important;
            gap: .5rem !important;
        }

        #removeRecordBtn,
        #sendRecordBtn {
            display: inline-flex !important;
            width: 2.25rem !important;
            height: 2.25rem !important;
            flex: 0 0 2.25rem !important;
            align-items: center !important;
            justify-content: center !important;
            border-radius: 999px !important;
            cursor: pointer !important;
            line-height: 1 !important;
        }

        #removeRecordBtn {
            background: #fef2f2 !important;
            color: #ef4444 !important;
        }

        #sendRecordBtn {
            background: linear-gradient(135deg, #6D4CFF, #4F35D8) !important;
            color: #fff !important;
            box-shadow: 0 10px 22px rgba(91, 63, 234, .22) !important;
        }

        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        :root {
            --bec-chat-bottom-nav: 72px;
            --bec-chat-sidebar: 340px;
            color-scheme: light;
        }

        .d-none { display: none !important; }
        .d-flex, .chatify-d-flex { display: flex !important; }
        .chatify-justify-content-between { justify-content: space-between !important; }
        .chatify-align-items-center { align-items: center !important; }

        .app-scroll,
        .app-scroll-hidden,
        .bec-chat-scroll,
        .messages-container,
        .messenger-admins,
        .listOfContacts,
        .search-records {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .app-scroll::-webkit-scrollbar,
        .app-scroll-hidden::-webkit-scrollbar,
        .bec-chat-scroll::-webkit-scrollbar,
        .messages-container::-webkit-scrollbar,
        .messenger-admins::-webkit-scrollbar,
        .listOfContacts::-webkit-scrollbar,
        .search-records::-webkit-scrollbar {
            display: none; 
        }

        .bec-chat-page {
            inset: 0 0 calc(var(--bec-chat-bottom-nav) + env(safe-area-inset-bottom, 0px)) 0;
        }

        .bec-chat-page .messenger {
            width: 100% !important;
            height: 100% !important;
            min-height: 0 !important;
            max-width: 1500px !important;
            margin: 0 auto !important;
            overflow: hidden !important;
            position: relative !important;
        }

        .bec-chat-page .messenger-listView,
        .bec-chat-page .messenger-messagingView,
        .bec-chat-page .messenger-infoView {
            min-height: 0 !important;
        }

        .bec-chat-page .messenger-listView {
            min-width: 0 !important;
        }

        .bec-chat-page .messenger-messagingView {
            min-width: 0 !important;
            height: 100% !important;
            min-height: 0 !important;
            max-height: 100% !important;
            overflow: hidden !important;
            grid-template-rows: auto minmax(0, 1fr) auto !important;
        }

        .bec-chat-page .messages-container {
            height: auto !important;
            min-height: 0 !important;
            max-height: none !important;
            overflow-y: auto !important;
        }

        .bec-chat-page .messages,
        .bec-chat-page .messages-inner {
            width: 100% !important;
            max-width: min(100%, 1120px) !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .bec-chat-page .messenger-tab:not(.show) { display: none !important; }
        .bec-chat-page .messenger-tab.show { display: flex !important; }
        .bec-chat-page .search-tab.show { display: block !important; }

        .bec-chat-page .message-hint.center-el {
            position: relative !important;
            inset: auto !important;
            transform: none !important;
            margin: 0 auto !important;
        }

        .bec-chat-page .messenger-list-item,
        .bec-chat-page .messenger-list-item tbody {
            display: block !important;
            width: 100% !important;
            border: 0 !important;
            background: transparent !important;
            direction: ltr !important;
        }

        .bec-chat-page .messenger-list-item tr {
            display: flex !important;
            width: 100% !important;
            direction: ltr !important;
        }

        .bec-chat-page .messenger-list-item td {
            display: block !important;
            padding: 0 !important;
            text-align: left !important;
            vertical-align: top !important;
        }

        .bec-chat-page .messenger-list-item.active tr,
        .bec-chat-page .messenger-list-item.m-list-active tr,
        .bec-chat-page .messenger-list-item tr.active {
            background: #f7f4ff !important;
            box-shadow: 0 12px 34px rgba(91, 63, 234, .08) !important;
            outline: 1px solid rgba(91, 63, 234, .16) !important;
        }

        .bec-chat-page .avatar,
        .bec-chat-page .chat-image,
        .bec-chat-page .image-file,
        .bec-chat-page .shared-photo {
            background-position: center !important;
            background-size: cover !important;
        }

        .bec-chat-page .activeStatus {
            position: absolute !important;
            right: 0 !important;
            bottom: .1rem !important;
            width: .9rem !important;
            height: .9rem !important;
            border-radius: 999px !important;
            border: 3px solid #fff !important;
            background: #52c41a !important;
        }

        .bec-chat-page .message-card {
            display: flex !important;
            width: 100% !important;
            margin: 0 0 1.15rem !important;
            background: transparent !important;
            box-shadow: none !important;
            align-items: flex-end !important;
        }

        .bec-chat-page .message-card.mc-sender { justify-content: flex-end !important; }
        .bec-chat-page .message-card:not(.mc-sender) { justify-content: flex-start !important; }

        .bec-chat-page .message-card-content {
            max-width: min(76%, 720px) !important;
            background: transparent !important;
            box-shadow: none !important;
        }

        .bec-chat-page .message-card.mc-sender .message-card-content { margin-left: auto !important; }
        .bec-chat-page .message-card:not(.mc-sender) .message-card-content { margin-right: auto !important; }

        .bec-chat-page .message-card.mc-sender .card_container { justify-content: flex-end !important; }
        .bec-chat-page .message-card:not(.mc-sender) .card_container { justify-content: flex-start !important; }

        .bec-chat-page .message_content,
        .bec-chat-page .message_content * {
            direction: ltr !important;
            overflow-wrap: anywhere !important;
            word-break: break-word !important;
        }

        .bec-chat-page .message-card.mc-sender .message_content,
        .bec-chat-page .message-card.mc-sender .message_content * {
            text-align: right !important;
        }

        .bec-chat-page .message-card:not(.mc-sender) .message_content,
        .bec-chat-page .message-card:not(.mc-sender) .message_content * {
            text-align: left !important;
        }

        .bec-chat-page .message-card .actions {
            align-self: flex-start !important;
            margin-top: .35rem !important;
        }

        .bec-chat-page .message-card.mc-sender .actions {
            order: 2 !important;
            margin-left: .35rem !important;
        }

        .bec-chat-page .message-card:not(.mc-sender) .actions {
            order: 2 !important;
            margin-left: .35rem !important;
        }

        .bec-chat-page .message_content a {
            color: inherit !important;
            text-decoration: underline !important;
            text-underline-offset: 3px !important;
        }

        .bec-chat-page .message-time { float: none !important; }
        .bec-chat-page .typing-indicator { width: 100% !important; }
        .bec-chat-page .typing-indicator.d-none { display: none !important; }

        .app-modal,
        .imageModal {
            display: none !important;
        }

        .app-modal[style*="display: block"],
        .app-modal[style*="display:block"],
        .app-modal[style*="display: flex"],
        .app-modal[style*="display:flex"],
        .imageModal[style*="display: block"],
        .imageModal[style*="display:block"],
        .imageModal[style*="display: flex"],
        .imageModal[style*="display:flex"] {
            display: flex !important;
        }

        .bec-chat-page .messenger-infoView { display: none !important; }

        .bec-chat-page .messenger-infoView.show,
        .bec-chat-page .messenger.show-infoSide .messenger-infoView {
            display: flex !important;
        }

        .bec-chat-page .shared-photos-list {
            display: grid !important;
            grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
            gap: .5rem !important;
            min-height: 6rem !important;
        }

        .bec-chat-page .shared-photo {
            aspect-ratio: 1 / 1;
            width: 100% !important;
            border-radius: 1rem !important;
        }

        .bec-chat-page a:focus-visible,
        .bec-chat-page button:focus-visible,
        .bec-chat-page input:focus-visible,
        .bec-chat-page textarea:focus-visible,
        .bec-chat-page label:focus-visible,
        .bec-chat-page [tabindex]:not([tabindex="-1"]):focus-visible {
            outline: 0 !important;
            box-shadow: 0 0 0 4px rgba(91, 63, 234, .18) !important;
        }

        @media (max-width: 767px) {
            .bec-chat-page {
                padding: .45rem !important;
            }

            .bec-chat-page .messenger {
                position: relative !important;
                border-radius: 1.25rem !important;
            }

            .bec-chat-page .messenger-listView,
            .bec-chat-page .messenger-messagingView {
                width: 100% !important;
                height: 100% !important;
            }

            .bec-chat-page .messenger-messagingView {
                display: grid !important;
                position: relative !important;
                z-index: 1 !important;
            }

            .bec-chat-page .messenger-listView {
                position: absolute !important;
                inset: 0 !important;
                z-index: 20 !important;
                display: flex !important;
            }

            .bec-chat-page .messenger.conversation-open .messenger-listView,
            .bec-chat-page .messenger-listView.conversation-active {
                display: none !important;
            }

            .bec-chat-page .messenger.conversation-open .messenger-messagingView,
            .bec-chat-page .messenger-listView.conversation-active + .messenger-messagingView {
                display: grid !important;
            }

            .bec-chat-page .message-card-content {
                max-width: min(86%, 24rem) !important;
            }

            .bec-chat-page .messages,
            .bec-chat-page .messages-inner {
                max-width: 100% !important;
            }

            .bec-chat-page .messenger-infoView {
                position: fixed !important;
                inset: .6rem .6rem calc(var(--bec-chat-bottom-nav) + env(safe-area-inset-bottom, 0px) + .6rem) .6rem !important;
                z-index: 60 !important;
            }
        }

        @media (min-width: 768px) {
            .bec-chat-page .messenger {
                display: flex !important;
                gap: 1rem !important;
                border-radius: 2.25rem !important;
                background: rgba(255, 255, 255, .45) !important;
                padding: .75rem !important;
                box-shadow: 0 24px 70px rgba(79, 53, 216, .08) !important;
            }

            .bec-chat-page .messenger-listView {
                display: flex !important;
                width: 360px !important;
                flex-shrink: 0 !important;
            }

            .bec-chat-page .messenger-messagingView {
                display: grid !important;
                flex: 1 1 auto !important;
            }

            .bec-chat-page .messenger-infoView {
                position: absolute !important;
                top: .75rem !important;
                right: .75rem !important;
                bottom: .75rem !important;
                z-index: 40 !important;
            }
        }

        @media (min-width: 1280px) {
            .bec-chat-page {
                left: var(--bec-chat-sidebar);
                bottom: 0;
                padding: 1.125rem !important;
            }

            .bec-chat-page .messenger-listView {
                width: 400px !important;
            }

            .bec-chat-page .messages,
            .bec-chat-page .messages-inner {
                max-width: min(100%, 1180px) !important;
            }
        }
    </style>
</head>
<body class="relative h-full overflow-hidden bg-[#FAFAFF] font-sans text-slate-950 antialiased">
<div class="pointer-events-none fixed inset-0 z-0 bg-[linear-gradient(rgba(102,93,232,.035)_1px,transparent_1px),linear-gradient(90deg,rgba(102,93,232,.035)_1px,transparent_1px)] bg-[length:34px_34px]" aria-hidden="true"></div>

@include("slider.menu", ["active" => "speaking"])

<main class="bec-chat-page fixed z-[1] min-h-0 overflow-hidden p-2 md:p-4 lg:p-6" aria-label="Boston English Center messenger">
    <section class="messenger {{ !!$id ? 'conversation-open' : '' }}" dir="ltr">
        <aside class="messenger-listView {{ !!$id ? 'conversation-active' : '' }} flex h-full flex-col overflow-visible bg-[#FAFAFF] px-4 py-4 sm:px-6 md:rounded-[2rem] md:px-4 md:py-3">
            <div class="m-header mb-3 shrink-0">
                <header class="mb-3 flex shrink-0 items-center justify-between">
                    <h1 class="text-[34px] font-bold leading-none tracking-[-0.035em] text-[#081433] sm:text-[38px] md:text-[34px] xl:text-[38px]">Chats</h1>
                </header>

                <label class="flex h-14 min-w-0 flex-1 items-center gap-3 rounded-full border border-slate-900/5 bg-white px-5 shadow-[0_8px_28px_rgba(15,23,42,0.035)] sm:h-14 md:h-12 md:px-4 xl:h-14">
                    <svg viewBox="0 0 24 24" fill="none" class="h-6 w-6 shrink-0 text-slate-500 md:h-5 md:w-5 xl:h-6 xl:w-6"><path d="M10.8 18.1a7.3 7.3 0 1 1 0-14.6 7.3 7.3 0 0 1 0 14.6ZM16.1 16.1 21 21" stroke="currentColor" stroke-width="2.3" stroke-linecap="round"/></svg>
                    <input type="text" class="messenger-search h-full min-w-0 flex-1 bg-transparent text-base font-medium text-slate-900 outline-none placeholder:text-slate-400 md:text-sm xl:text-base" placeholder="{{ __('chatify.Search') }}" aria-label="{{ __('chatify.Search') }}">
                </label>
            </div>

            <div class="m-body contacts-container min-h-0 flex-1 overflow-hidden">
                <div class="show messenger-tab users-tab bec-chat-scroll flex h-full min-h-0 flex-col overflow-y-auto" data-view="users" role="list" aria-label="Chats">
                    <div class="admins-section shrink-0">
                        <p class="messenger-title px-1 pb-2 pt-1 text-xs font-bold text-slate-400"><span>{{ __('chatify.Administration') }}</span></p>
                        <div class="messenger-admins bec-chat-scroll -mx-1 mb-3 flex gap-2 overflow-x-auto px-1 pb-1"></div>
                    </div>

                    <p class="messenger-title px-1 pb-2 pt-1 text-xs font-bold text-slate-400"><span>{{ __('chatify.AllMessages') }}</span></p>
                    <div class="listOfContacts bec-chat-scroll -mx-2 min-h-0 flex-1 space-y-3 overflow-y-auto px-2 pb-6 pt-1"></div>
                </div>

                <div class="messenger-tab search-tab bec-chat-scroll h-full min-h-0 overflow-y-auto" data-view="search">
                    <p class="messenger-title px-1 pb-2 pt-1 text-xs font-bold text-slate-400"><span>{{ __('chatify.Search') }}</span></p>
                    <div class="search-records -mx-2 space-y-3 px-2 pb-6 pt-1">
                        <p class="message-hint center-el rounded-[1.5rem] bg-white px-5 py-8 text-center text-sm font-medium text-slate-500 shadow-[0_14px_40px_rgba(15,23,42,0.04)]"><span>{{ __('chatify.Type to search..') }}</span></p>
                    </div>
                </div>
            </div>
        </aside>

        <section class="messenger-messagingView h-full min-h-0 flex-col overflow-hidden bg-[#FAFAFF] md:flex md:min-w-0 md:flex-1 md:rounded-[2rem] md:border md:border-white/80" role="region" aria-label="Conversation">
            <div class="m-header m-header-messaging shrink-0 border-b border-slate-900/5 bg-[#FAFAFF]/95 px-3 pb-2 pt-3 backdrop-blur sm:px-4 md:px-6 md:py-3 xl:px-7">
                <nav class="flex items-center gap-2 sm:gap-3">
                    <a href="#" class="show-listView flex h-9 w-7 shrink-0 items-center justify-center text-[#5B3FEA] transition active:scale-95 md:hidden" aria-label="Back to chats">
                        <svg viewBox="0 0 24 24" fill="none" class="h-7 w-7"><path d="M15 5 8 12l7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>

                    <a href="#" class="show-infoSide flex min-w-0 flex-1 items-center gap-3 text-left no-underline" aria-label="Open conversation details">
                        <div class="avatar av-s header-avatar h-11 w-11 shrink-0 rounded-full bg-[#F2EEFF] bg-cover bg-center ring-2 ring-white xl:h-12 xl:w-12" style="background-image: url('{{ auth()->user()->getFirstMediaUrl('avatars','thumb') }}')"></div>
                        <div class="min-w-0 flex-1">
                            <span class="user-name block truncate text-lg font-semibold leading-tight tracking-[-0.01em] text-slate-950 sm:text-[22px] md:text-lg xl:text-xl">{{ auth()->user()->name }}</span>
                            <span class="internet-connection mt-1 flex min-w-0 items-center gap-2 text-sm font-medium text-slate-500">
                                <span class="ic-connected">{{ __('chatify.Connected') }}</span>
                                <span class="ic-connecting">{{ __('chatify.Connecting...') }}</span>
                                <span class="ic-noInternet">{{ __('chatify.No internet access') }}</span>
                            </span>
                        </div>
                    </a>

                    <div class="m-header-right ml-auto flex shrink-0 items-center text-[#5B3FEA]">
                        <a href="#" class="show-infoSide flex h-9 w-9 items-center justify-center rounded-full transition hover:bg-[#F2EEFF] active:scale-95" aria-label="Conversation details">
                            <svg viewBox="0 0 24 24" fill="none" class="h-7 w-7 md:h-6 md:w-6 xl:h-7 xl:w-7"><path d="M12 6.5h.01M12 12h.01M12 17.5h.01" stroke="currentColor" stroke-width="4" stroke-linecap="round"/></svg>
                        </a>
                    </div>
                </nav>
            </div>

            <div class="m-body messages-container bec-chat-scroll min-h-0 flex-1 overflow-y-auto px-4 py-3 sm:px-5 md:px-7 md:py-4 xl:px-8" aria-live="polite" aria-relevant="additions text">
                <div class="messages-inner mx-auto w-full max-w-[1120px] px-1 py-1 md:px-2 xl:max-w-[1180px]">
                    <div class="mb-4 text-center">
                        <span class="text-sm font-semibold text-slate-700 xl:text-base">Today</span>
                    </div>

                    <div class="messages mx-auto w-full max-w-[1120px] space-y-4 px-1 pb-2 xl:max-w-[1180px]" role="log" aria-label="Messages">
                        <p class="message-hint center-el rounded-[1.5rem] bg-white px-5 py-8 text-center text-sm font-medium text-slate-500 shadow-[0_14px_40px_rgba(15,23,42,0.04)]"><span>{{ __('chatify.Please select a chat to start messaging') }}</span></p>
                    </div>

                    <div class="typing-indicator d-none mt-3" role="status" aria-live="polite">
                        <div class="message-card typing">
                            <div class="message">
                                <span class="typing-dots inline-flex items-center gap-1 rounded-full bg-white px-4 py-3 shadow-[0_12px_32px_rgba(15,23,42,0.045)]">
                                    <span class="dot dot-1 h-2 w-2 rounded-full bg-[#5B3FEA]/50"></span>
                                    <span class="dot dot-2 h-2 w-2 rounded-full bg-[#5B3FEA]/50"></span>
                                    <span class="dot dot-3 h-2 w-2 rounded-full bg-[#5B3FEA]/50"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('Chatify.layouts.sendForm')
        </section>

        <aside class="messenger-infoView bec-chat-scroll h-full w-[320px] shrink-0 overflow-y-auto rounded-[1.6rem] border border-white/80 bg-[#FAFAFF] p-4 shadow-[0_24px_70px_rgba(79,53,216,0.12)]" aria-label="Conversation details">
            <nav class="mb-4 flex items-center justify-between gap-3">
                <p class="text-base font-bold tracking-[-.02em] text-slate-950">{{ __('chatify.UserDetails') }}</p>
                <a href="#" class="messenger-infoView-close flex h-10 w-10 items-center justify-center rounded-full bg-white text-slate-500 shadow-[0_8px_28px_rgba(15,23,42,0.035)] transition hover:bg-[#F2EEFF] hover:text-[#5B3FEA]" aria-label="Close details"><i class="fas fa-times"></i></a>
            </nav>
            {!! view('Chatify.layouts.info', ['id' => $id])->render() !!}
        </aside>
        <div class="bec-chat-backdrop hidden fixed inset-0 z-50 bg-slate-950/30 backdrop-blur-sm" aria-hidden="true"></div>
    </section>
</main>

@include('Chatify.layouts.modals')
@include('Chatify.layouts.footerLinks')
</body>
</html>
