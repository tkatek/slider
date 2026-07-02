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
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Manrope', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'sans-serif'],
                    },
                },
            },
        };

        (function () {
            const systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.documentElement.classList.toggle('dark', systemPrefersDark);
        })();
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
        html,
        body {
            width: 100%;
            height: 100%;
            min-height: 100%;
            overflow: hidden;
            overflow-x: clip;
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

        @media (min-width: 421px) and (max-width: 1279px) {
            :root {
                --bec-chat-bottom-nav: 96px;
            }
        }

        @media (min-width: 1280px) {
            :root {
                --bec-chat-bottom-nav: 0px;
            }
        }

        html.dark {
            color-scheme: dark;
        }

        html.bec-chat-conversation-open {
            --bec-chat-bottom-nav: 0px;
        }

        html.bec-chat-conversation-open .bec-chat-shell-menu {
            display: none !important;
        }

        .bec-chat-shell-menu,
        .bec-chat-shell-menu > nav {
            max-width: 100%;
            overflow-x: hidden;
        }

        .bec-chat-page,
        .bec-chat-page .messenger,
        .bec-chat-page .messenger-messagingView,
        .bec-chat-page .messenger-listView,
        .bec-chat-page .messenger-tab,
        .bec-chat-page .users-tab,
        .bec-chat-page .search-tab,
        .bec-chat-page .m-body,
        .bec-chat-page .contacts-container,
        .bec-chat-page .messages-inner,
        .bec-chat-page .messages,
        .bec-chat-page .message-card,
        .bec-chat-page .message-card-content,
        .bec-chat-page .card_container,
        .bec-chat-page .message_content,
        .bec-chat-page .messenger-sendCard,
        .bec-chat-page #message-form,
        .bec-chat-page .composer-input {
            max-width: 100%;
            overflow-x: hidden;
        }

        .bec-chat-page .messenger-listView,
        .bec-chat-page .messenger-messagingView,
        .bec-chat-page .messenger-tab,
        .bec-chat-page .m-header-messaging nav,
        .bec-chat-page .show-infoSide,
        .bec-chat-page .internet-connection,
        .bec-chat-page .listOfContacts,
        .bec-chat-page .messenger-admins,
        .bec-chat-page .search-records,
        .bec-chat-page #message-form,
        .bec-chat-page .composer-input,
        .bec-chat-page .box_recorder,
        .bec-chat-page .box_start {
            min-width: 0;
        }

        .bec-chat-page .internet-connection > span {
            min-width: 0;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .d-none { display: none !important; }
        .d-flex, .chatify-d-flex { display: flex !important; }
        .chatify-justify-content-between { justify-content: space-between !important; }
        .chatify-align-items-center { align-items: center !important; }

        .composer-input.is-recording .m-send,
        .composer-input.is-recording .send-button,
        .composer-input.is-recording #startRecordingBtn {
            display: none !important;
        }

        .composer-input.is-recording .box_recorder {
            display: flex !important;
            width: 100%;
        }

        .bec-chat-page .m-send {
            height: 1.5rem;
            max-height: 1.5rem;
            overflow: hidden;
            line-height: 1.5rem;
            scrollbar-width: none;
        }

        .bec-chat-page .m-send::-webkit-scrollbar {
            display: none;
        }

        .chat-audio-player .audio-progress::-webkit-slider-runnable-track {
            height: .375rem;
            border-radius: 999px;
            background: currentColor;
            opacity: .22;
        }

        .chat-audio-player .audio-progress::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            height: .875rem;
            width: .875rem;
            margin-top: -.25rem;
            border-radius: 999px;
            background: currentColor;
        }

        .chat-audio-player .audio-progress::-moz-range-track {
            height: .375rem;
            border-radius: 999px;
            background: currentColor;
            opacity: .22;
        }

        .chat-audio-player .audio-progress::-moz-range-thumb {
            height: .875rem;
            width: .875rem;
            border: 0;
            border-radius: 999px;
            background: currentColor;
        }

        .shared-photos-list:empty::before {
            content: "Nothing shared yet";
            grid-column: 1 / -1;
            display: grid;
            min-height: 5.5rem;
            place-items: center;
            border-radius: 1rem;
            background: #f8f8ff;
            color: #64748b;
            font-size: .875rem;
            font-weight: 500;
            text-align: center;
        }

        html.dark .shared-photos-list:empty::before {
            background: #080d19;
            color: #94a3b8;
        }

        .bec-chat-page .messages:has(> .message-hint:only-child) {
            display: grid;
            min-height: 16rem;
            place-items: center;
            padding: 2rem 1rem;
        }

        .bec-chat-page .messages > .message-hint {
            display: inline-flex;
            max-width: min(20rem, 100%);
            flex-direction: column;
            align-items: center;
            gap: .85rem;
            border: 1px solid rgba(91, 63, 234, .12);
            border-radius: 1.4rem;
            background: rgba(255, 255, 255, .86);
            padding: 1.35rem 1.45rem;
            color: #475569;
            font-size: .95rem;
            font-weight: 600;
            line-height: 1.45;
            text-align: center;
        }

        .bec-chat-page .messages > .message-hint::before {
            content: "\f4ad";
            display: grid;
            height: 2.75rem;
            width: 2.75rem;
            place-items: center;
            border-radius: 999px;
            background:
                linear-gradient(135deg, rgba(109, 76, 255, .95), rgba(79, 53, 216, .95)),
                radial-gradient(circle at 36% 36%, rgba(255, 255, 255, .9), transparent 42%);
            color: #fff;
            font-family: "Font Awesome 6 Free";
            font-size: 1.05rem;
            font-weight: 900;
            -webkit-mask: radial-gradient(circle at 50% 50%, #000 99%, transparent 100%);
            mask: radial-gradient(circle at 50% 50%, #000 99%, transparent 100%);
        }

        html.dark .bec-chat-page .messages > .message-hint {
            border-color: rgba(255, 255, 255, .08);
            background: rgba(15, 23, 42, .86);
            color: #cbd5e1;
        }

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

        .bec-chat-page .messenger-tab:not(.show) { display: none !important; }
        .bec-chat-page .messenger-tab.show { display: flex !important; }
        .bec-chat-page .search-tab.show { display: block !important; }

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
            flex-direction: column !important;
        }

        .bec-chat-page a:focus-visible,
        .bec-chat-page button:focus-visible,
        .bec-chat-page input:focus-visible,
        .bec-chat-page label:focus-visible,
        .bec-chat-page [tabindex]:not([tabindex="-1"]):focus-visible {
            outline: 0 !important;
            box-shadow: 0 0 0 4px rgba(91, 63, 234, .18) !important;
        }

        .bec-chat-page .messenger-search:focus-visible,
        .bec-chat-page .m-send:focus-visible,
        .bec-chat-page .messenger-search:focus,
        .bec-chat-page .m-send:focus,
        .bec-chat-page textarea:focus-visible {
            outline: 0 !important;
            box-shadow: none !important;
        }

        @media (max-width: 767px) {
            .bec-chat-page .messenger {
                display: block;
            }

            .bec-chat-page .messenger-listView {
                position: absolute;
                inset: 0;
                width: 100%;
                max-width: 100%;
            }

            .bec-chat-page .messenger-messagingView {
                position: fixed;
                inset: 0;
                z-index: 40;
                display: grid !important;
                width: 100%;
                max-width: 100%;
                height: 100%;
                max-height: none;
                visibility: hidden;
                transform: translateX(100%);
                transition: transform .18s ease, visibility .18s ease;
                will-change: transform;
            }

            .bec-chat-page .messenger.conversation-open .messenger-listView,
            .bec-chat-page .messenger-listView.conversation-active {
                display: none !important;
            }

            .bec-chat-page .messenger.conversation-open .messenger-messagingView,
            .bec-chat-page .messenger-listView.conversation-active + .messenger-messagingView {
                display: grid !important;
                visibility: visible;
                transform: translateX(0);
            }

        }

    </style>
</head>
<body class="relative h-full overflow-hidden bg-[#FAFAFF] font-sans text-slate-950 antialiased transition-colors duration-300 dark:bg-[#070B16] dark:text-slate-100">

<div class="bec-chat-shell-menu">
    @include("slider.menu", ["active" => "speaking"])
</div>

@php
    $isGroupConversation = \Illuminate\Support\Str::of((string) $id)->contains('-');
    $authAvatar = auth()->user()->getFirstMediaUrl('avatars','thumb');
    $conversationAvatarStyle = $isGroupConversation ? 'background-image: none;' : "background-image: url('{$authAvatar}');";
@endphp

<main class="bec-chat-page fixed inset-x-0 top-0 bottom-[calc(var(--bec-chat-bottom-nav)+env(safe-area-inset-bottom,0px))] z-[1] min-h-0 overflow-hidden p-0 xl:left-[var(--bec-chat-sidebar)] xl:bottom-0" aria-label="Boston English Center messenger">
    <section class="messenger {{ !!$id ? 'conversation-open' : '' }} relative h-full min-h-0 w-full overflow-hidden md:flex md:gap-0" dir="ltr">
        <aside class="messenger-listView {{ !!$id ? 'conversation-active' : '' }} absolute inset-0 z-20 flex h-full min-w-0 flex-col overflow-hidden bg-[#FAFAFF] px-4 py-4 sm:px-6 md:relative md:inset-auto md:z-auto md:w-[280px] md:shrink-0 md:border-r md:border-slate-900/5 md:px-4 md:py-3 lg:w-[320px] xl:w-[360px] dark:border-white/[.07] dark:bg-[#080D19]">
            <input type="text" class="messenger-search hidden" aria-hidden="true" tabindex="-1">

            <div class="m-body contacts-container min-h-0 flex-1 overflow-hidden">
                <div class="show messenger-tab users-tab bec-chat-scroll flex h-full min-h-0 flex-col overflow-y-auto" data-view="users" role="list" aria-label="Chats">
                    <div class="admins-section shrink-0">
                        <p class="messenger-title px-1 pb-2 pt-1 text-xs font-semibold text-slate-500 dark:text-slate-400"><span>All contacts</span></p>
                        <div class="messenger-admins bec-chat-scroll mb-4 flex flex-wrap gap-2 overflow-hidden px-0 pb-1"></div>
                    </div>

                    <p class="messenger-title px-1 pb-2 pt-1 text-xs font-semibold text-slate-500 dark:text-slate-400"><span>{{ __('chatify.AllMessages') }}</span></p>
                    <div class="listOfContacts mx-0 space-y-3 overflow-hidden px-0 pb-0 pt-1"></div>
                </div>

                <div class="messenger-tab search-tab bec-chat-scroll h-full min-h-0 overflow-y-auto" data-view="search">
                    <p class="messenger-title px-1 pb-2 pt-1 text-xs font-semibold text-slate-500 dark:text-slate-400"><span>{{ __('chatify.Search') }}</span></p>
                    <div class="search-records mx-0 space-y-3 px-0 pb-0 pt-1">
                        <p class="message-hint center-el relative inset-auto mx-auto transform-none rounded-[1.5rem] bg-white px-5 py-8 text-center text-sm font-medium text-slate-500 shadow-[0_14px_40px_rgba(15,23,42,0.04)] transition-colors duration-300 dark:bg-slate-900 dark:text-slate-400 dark:shadow-[0_14px_40px_rgba(0,0,0,0.24)]"><span>{{ __('chatify.Type to search..') }}</span></p>
                    </div>
                </div>
            </div>
        </aside>

        <section class="messenger-messagingView relative z-[1] grid h-full min-h-0 max-h-full w-full grid-rows-[auto_minmax(0,1fr)_auto] overflow-hidden bg-[#FAFAFF] md:min-w-0 md:flex-1 dark:bg-[#070B16]" role="region" aria-label="Conversation">
            <div class="m-header m-header-messaging shrink-0 border-b border-slate-900/5 bg-[#FAFAFF]/95 px-3 pb-2 pt-3 backdrop-blur transition-colors duration-300 sm:px-4 md:px-6 md:py-3 xl:px-7 dark:border-white/10 dark:bg-[#070B16]/95">
                <nav class="flex items-center gap-2 sm:gap-3">
                    <a href="#" class="show-listView flex h-9 w-7 shrink-0 items-center justify-center text-[#5B3FEA] transition active:scale-95 md:hidden dark:text-violet-300" aria-label="Back to chats">
                        <svg viewBox="0 0 24 24" fill="none" class="h-7 w-7"><path d="M15 5 8 12l7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>

                    <a href="#" class="show-infoSide flex min-w-0 flex-1 items-center gap-3 text-left no-underline" aria-label="Open conversation details">
                        <div class="avatar av-s header-avatar {{ $isGroupConversation ? 'is-group-avatar' : '' }} relative flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#F2EEFF] bg-cover bg-center text-[#5B3FEA] ring-2 ring-white xl:h-12 xl:w-12 dark:bg-violet-500/15 dark:text-violet-300 dark:ring-slate-900" style="{{ $conversationAvatarStyle }}">
                            <i class="group-avatar-icon fa-solid fa-user-group {{ $isGroupConversation ? 'inline-block' : 'hidden' }} text-lg"></i>
                            <span class="conversation-presence-dot hidden absolute bottom-[1px] right-[-1px] h-3.5 w-3.5 rounded-full border-[3px] border-white bg-slate-300 dark:border-slate-900 dark:bg-slate-500" aria-label="Offline"></span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <span class="user-name block truncate text-lg font-semibold leading-tight tracking-[-0.01em] text-slate-950 sm:text-[22px] md:text-lg xl:text-xl dark:text-white">{{ auth()->user()->name }}</span>
                            <span class="internet-connection mt-1 flex min-w-0 items-center gap-2 text-sm font-medium text-slate-500 dark:text-slate-400">
                                <span class="ic-connected">{{ __('chatify.Connected') }}</span>
                                <span class="ic-connecting">{{ __('chatify.Connecting...') }}</span>
                                <span class="ic-noInternet">{{ __('chatify.No internet access') }}</span>
                            </span>
                        </div>
                    </a>

                    <div class="m-header-right ml-auto flex shrink-0 items-center text-[#5B3FEA] dark:text-violet-300">
                        <a href="#" class="show-infoSide flex h-9 w-9 items-center justify-center rounded-full transition hover:bg-[#F2EEFF] active:scale-95 dark:hover:bg-white/10" aria-label="Conversation details">
                            <svg viewBox="0 0 24 24" fill="none" class="h-7 w-7 md:h-6 md:w-6 xl:h-7 xl:w-7"><path d="M12 6.5h.01M12 12h.01M12 17.5h.01" stroke="currentColor" stroke-width="4" stroke-linecap="round"/></svg>
                        </a>
                    </div>
                </nav>
            </div>

            <div class="m-body messages-container bec-chat-scroll min-h-0 flex-1 overflow-y-auto px-4 py-3 sm:px-5 md:px-7 md:py-4 xl:px-8" aria-live="polite" aria-relevant="additions text">
                <div class="messages-inner mx-auto w-full max-w-[1120px] px-1 py-1 md:px-2 xl:max-w-[1180px]">
                    <div class="mb-4 text-center">
                        <span class="text-sm font-semibold text-slate-700 xl:text-base dark:text-slate-300">Today</span>
                    </div>

                    <div class="messages mx-auto w-full max-w-[1120px] space-y-4 px-1 pb-2 xl:max-w-[1180px]" role="log" aria-label="Messages">
                        <p class="message-hint center-el relative inset-auto mx-auto transform-none rounded-[1.5rem] bg-white px-5 py-8 text-center text-sm font-medium text-slate-500 shadow-[0_14px_40px_rgba(15,23,42,0.04)] transition-colors duration-300 dark:bg-slate-900 dark:text-slate-400 dark:shadow-[0_14px_40px_rgba(0,0,0,0.24)]"><span>{{ __('chatify.Please select a chat to start messaging') }}</span></p>
                    </div>

                    <div class="typing-indicator d-none mt-3 w-full" role="status" aria-live="polite">
                        <div class="message-card typing flex w-full items-end bg-transparent">
                            <div class="message">
                                <span class="typing-dots inline-flex items-center gap-1 rounded-full bg-white px-4 py-3 transition-colors duration-300 dark:bg-slate-900">
                                    <span class="dot dot-1 h-2 w-2 rounded-full bg-[#5B3FEA]/50"></span>
                                    <span class="dot dot-2 h-2 w-2 rounded-full bg-[#5B3FEA]/50"></span>
                                    <span class="dot dot-3 h-2 w-2 rounded-full bg-[#5B3FEA]/50"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="messenger-sendCard shrink-0 border-t border-slate-900/5 bg-[#FAFAFF]/95 px-4 py-3 backdrop-blur transition-colors duration-300 dark:border-white/[.06] dark:bg-[#070B16]/95">
                <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data" aria-label="Send a message" class="relative mx-auto flex w-full max-w-full items-center gap-3 border-0 bg-transparent shadow-none outline-none">
                    @csrf

                    <label class="attachment-button inline-flex h-10 w-10 shrink-0 cursor-pointer items-center justify-center rounded-full border-0 bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-white active:scale-95" aria-label="Add attachment" tabindex="0">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-[1.2rem] w-[1.2rem]">
                            <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"></path>
                        </svg>
                        <input disabled="disabled" type="file" class="upload-attachment hidden" name="file" accept=".{{ implode(', .', config('chatify.attachments.allowed_images')) }}, .{{ implode(', .', config('chatify.attachments.allowed_files')) }}" />
                    </label>

                    <div class="composer-input flex h-12 min-w-0 flex-1 items-center gap-3 overflow-hidden rounded-full border border-slate-900/5 bg-white px-5 shadow-none transition-colors duration-300 dark:border-white/[.08] dark:bg-[#101827] dark:shadow-none">
                        <textarea readonly="readonly" name="message" rows="1" class="m-send app-scroll block min-w-0 flex-1 resize-none border-0 bg-transparent px-0 py-0 text-[.95rem] font-medium leading-6 text-slate-900 shadow-none outline-none placeholder:text-slate-400 dark:text-slate-100 dark:placeholder:text-slate-500" placeholder="Type a message..." aria-label="Message text"></textarea>

                        <button type="submit" disabled="disabled" class="send-button d-none h-7 w-7 shrink-0 items-center justify-center border-0 bg-transparent p-0 text-[#5B3FEA] outline-none transition active:scale-95 dark:text-violet-300" aria-label="Send message">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-[1.65rem] w-[1.65rem]">
                                <path d="M5 12 3.5 5.5 21 12 3.5 18.5 5 12Zm0 0h8" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>

                        <span id="startRecordingBtn" class="inline-flex h-7 w-7 shrink-0 cursor-pointer items-center justify-center border-0 bg-transparent p-0 text-[#5B3FEA] outline-none transition active:scale-95 dark:text-violet-300" aria-label="Record voice message">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-[1.65rem] w-[1.65rem]">
                                <path d="M12 14.5a3.3 3.3 0 0 0 3.3-3.3V6.3a3.3 3.3 0 0 0-6.6 0v4.9a3.3 3.3 0 0 0 3.3 3.3Z" stroke="currentColor" stroke-width="2.1"></path>
                                <path d="M5.5 11.5a6.5 6.5 0 0 0 13 0M12 18v3M8.5 21h7" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"></path>
                            </svg>
                        </span>

                        <div class="box_recorder d-none min-w-0 flex-1 items-center">
                            <div class="box_start flex w-full min-w-0 items-center gap-2">
                                <span id="removeRecordBtn" class="inline-flex h-9 w-9 shrink-0 cursor-pointer items-center justify-center rounded-full bg-red-50 text-red-500 dark:bg-red-500/15 dark:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-[1.15rem] w-[1.15rem]">
                                        <path fill="currentColor" d="M5 21V6H4V4h5V3h6v1h5v2h-1v15H5Zm2-2h10V6H7v13Zm2-2h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/>
                                    </svg>
                                </span>

                                <div class="box_start_recorder flex min-w-0 flex-1 items-center gap-2 text-sm font-bold text-slate-500 dark:text-slate-400">
                                    <span class="effect_recorder h-2.5 w-2.5 shrink-0 rounded-full bg-red-500"></span>
                                    <span class="timer_recorder shrink-0">
                                        <span class="minute_recorder">00</span><span>:</span><span class="second_recorder">00</span>
                                    </span>
                                    <span class="text_recorder min-w-0 overflow-hidden text-ellipsis whitespace-nowrap">............</span>
                                </div>

                                <span id="sendRecordBtn" class="inline-flex h-9 w-9 shrink-0 cursor-pointer items-center justify-center rounded-full bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-white">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-[1.15rem] w-[1.15rem]">
                                        <path fill="currentColor" d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </footer>
        </section>

        <aside class="messenger-infoView bec-chat-scroll fixed inset-[.6rem] bottom-[calc(var(--bec-chat-bottom-nav)+env(safe-area-inset-bottom,0px)+.6rem)] z-[60] h-auto w-auto shrink-0 overflow-y-auto rounded-[1.6rem] border border-white/80 bg-[#FAFAFF] p-4 shadow-[0_24px_70px_rgba(79,53,216,0.12)] transition-colors duration-300 md:relative md:inset-auto md:z-[1] md:h-full md:w-[320px] md:flex-[0_0_320px] md:rounded-none md:border-y-0 md:border-r-0 md:shadow-none dark:border-white/[.07] dark:bg-[#080D19] dark:shadow-none" aria-label="Conversation details">
            <nav class="mb-4 flex items-center justify-between gap-3">
                <p class="text-base font-bold tracking-[-.02em] text-slate-950 dark:text-white">{{ __('chatify.UserDetails') }}</p>
                <a href="#" class="messenger-infoView-close flex h-10 w-10 items-center justify-center rounded-full bg-white text-slate-500 shadow-[0_8px_28px_rgba(15,23,42,0.035)] transition hover:bg-[#F2EEFF] hover:text-[#5B3FEA] dark:bg-slate-900 dark:text-slate-400 dark:shadow-[0_8px_28px_rgba(0,0,0,0.24)] dark:hover:bg-white/10 dark:hover:text-violet-300" aria-label="Close details"><i class="fas fa-times"></i></a>
            </nav>
            <div class="mb-4 overflow-hidden rounded-[1.6rem] border border-white/80 bg-white p-5 text-center shadow-[0_18px_48px_rgba(91,63,234,0.08)] transition-colors duration-300 dark:border-white/10 dark:bg-slate-900 dark:shadow-[0_18px_48px_rgba(0,0,0,0.24)]">
                <div class="mx-auto mb-4 flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-[#F2EEFF] to-white shadow-[0_18px_34px_rgba(91,63,234,0.12)] ring-4 ring-white dark:from-violet-500/15 dark:to-slate-900 dark:ring-slate-950">
                    <div class="avatar av-l info-avatar chatify-d-flex {{ $isGroupConversation ? 'is-group-avatar' : '' }} relative h-20 w-20 items-center justify-center rounded-full bg-[#F2EEFF] bg-cover bg-center text-[#5B3FEA] dark:bg-violet-500/15 dark:text-violet-300" style="{{ $conversationAvatarStyle }}">
                        <i class="group-avatar-icon fa-solid fa-user-group {{ $isGroupConversation ? 'inline-block' : 'hidden' }} text-2xl"></i>
                        <span class="conversation-presence-dot hidden absolute bottom-[2px] right-[-2px] h-4 w-4 rounded-full border-[3px] border-white bg-slate-300 dark:border-slate-900 dark:bg-slate-500" aria-label="Offline"></span>
                    </div>
                </div>
                <p class="info-name truncate text-xl font-extrabold tracking-[-.03em] text-slate-950 dark:text-white">{{ auth()->user()->name }}</p>
                <p class="mt-1 text-sm font-semibold text-slate-500 dark:text-slate-400">Conversation profile</p>
            </div>

            <p class="collapsed messenger-infoView-collapse cursor-pointer d-none mb-3 rounded-[1.25rem] border border-[#DED8FF] bg-[#F8F6FF] px-4 py-3 text-sm font-bold text-[#5B3FEA] dark:border-violet-300/15 dark:bg-violet-500/10 dark:text-violet-300">
                <span class="flex items-center justify-between gap-3">
                    {{ __('chatify.ManageGroup') }}
                    <iconify-icon class="arrow_right" icon="ic:baseline-plus"></iconify-icon>
                </span>
            </p>

            <div class="messenger-infoView-btns mb-4 space-y-2">
                <a href="#" class="danger delete-conversation d-none flex w-full items-center justify-center rounded-2xl bg-red-500/10 px-4 py-3 text-sm font-extrabold text-red-600 no-underline">{{ __('chatify.DeleteConversation') }}</a>
                <a href="#" class="danger block-user d-none flex w-full items-center justify-center rounded-2xl bg-red-500/10 px-4 py-3 text-sm font-extrabold text-red-600 no-underline">{{ __('chatify.BlockUser') }}</a>
                <a href="#" class="danger block-users-from-group d-none flex w-full items-center justify-center rounded-2xl bg-red-500/10 px-4 py-3 text-sm font-extrabold text-red-600 no-underline">{{ __('chatify.BlockUsers') }}</a>
            </div>

            <div class="messenger-infoView-shared rounded-[1.6rem] border border-white/80 bg-white p-4 shadow-[0_18px_48px_rgba(15,23,42,0.045)] transition-colors duration-300 dark:border-white/10 dark:bg-slate-900 dark:shadow-[0_18px_48px_rgba(0,0,0,0.24)]" aria-label="Shared photos">
                <p class="mb-4">
                    <span class="block text-base font-extrabold tracking-[-.02em] text-slate-950 dark:text-white">{{ __('chatify.SharedPhotos') }}</span>
                    <span class="mt-1 block text-xs font-bold text-slate-400 dark:text-slate-500">Images from this conversation</span>
                </p>
                <div class="shared-photos-list grid min-h-[6rem] grid-cols-3 gap-2 rounded-[1.2rem] bg-[#FAFAFF] p-2 dark:border dark:border-white/[.04] dark:bg-[#080D19]"></div>
            </div>
        </aside>
        <div class="bec-chat-backdrop hidden fixed inset-0 z-50 bg-slate-950/30 backdrop-blur-sm md:hidden" aria-hidden="true"></div>
    </section>
</main>

<div id="imageModalBox" class="imageModal fixed inset-0 z-[9999] items-center justify-center bg-slate-950/80 p-4 backdrop-blur-sm" style="display: none;">
    <button type="button" class="imageModal-close absolute right-5 top-5 flex h-11 w-11 items-center justify-center rounded-full bg-white text-2xl font-bold text-slate-700 shadow-[0_12px_34px_rgba(0,0,0,.18)] transition hover:bg-slate-100 dark:border dark:border-white/10 dark:bg-slate-900 dark:text-slate-200">&times;</button>
    <img class="imageModal-content max-h-[88dvh] max-w-[92vw] rounded-[1.35rem] object-contain shadow-[0_24px_70px_rgba(0,0,0,.35)]" id="imageModalBoxSrc">
</div>

<div class="app-modal fixed inset-0 z-[9998] items-center justify-center bg-slate-950/45 p-4 backdrop-blur-sm" data-name="delete" style="display: none;">
    <div class="app-modal-container w-full max-w-[28rem]">
        <div class="app-modal-card rounded-[1.75rem] border border-slate-900/5 bg-white p-6 text-center shadow-[0_24px_70px_rgba(15,23,42,.16)] dark:border-white/10 dark:bg-slate-900 dark:text-slate-100 dark:shadow-[0_24px_70px_rgba(0,0,0,.35)]" data-name="delete" data-modal="0">
            <div class="app-modal-header text-xl font-bold tracking-[-.02em] text-slate-950 dark:text-slate-50">{{__('chatify.Are you sure you want to delete this?')}}</div>
            <div class="app-modal-body mt-2 text-sm font-medium text-slate-500 dark:text-slate-400">{{__('chatify.You can not undo this action')}}</div>
            <div class="app-modal-footer mt-6 flex justify-center gap-3">
                <a href="javascript:void(0)" class="app-btn cancel inline-flex h-11 min-w-28 items-center justify-center rounded-2xl border border-slate-900/10 bg-white px-5 text-sm font-bold text-slate-700 no-underline transition hover:bg-slate-50 dark:border-white/10 dark:bg-slate-900 dark:text-slate-200">{{__('chatify.Cancel')}}</a>
                <a href="javascript:void(0)" class="app-btn delete inline-flex h-11 min-w-28 items-center justify-center rounded-2xl bg-red-500 px-5 text-sm font-bold text-white no-underline shadow-[0_12px_24px_rgba(239,68,68,.22)] transition hover:bg-red-600">{{__('chatify.Delete')}}</a>
            </div>
        </div>
    </div>
</div>

<div class="app-modal modal fixed inset-0 z-[9998] items-center justify-center bg-slate-950/45 p-4 backdrop-blur-sm" data-name="block" style="display: none;">
    <div class="app-modal-container relative w-full max-w-[32rem]">
        <button class="close_alert absolute -right-3 -top-3 flex h-10 w-10 items-center justify-center rounded-full bg-white text-slate-600 shadow-[0_12px_28px_rgba(0,0,0,.18)] dark:border dark:border-white/10 dark:bg-slate-900 dark:text-slate-200" type="button">
            <iconify-icon icon="ep:close-bold"></iconify-icon>
        </button>
        <div class="app-modal-card rounded-[1.75rem] border border-slate-900/5 bg-white p-6 shadow-[0_24px_70px_rgba(15,23,42,.16)] dark:border-white/10 dark:bg-slate-900 dark:text-slate-100 dark:shadow-[0_24px_70px_rgba(0,0,0,.35)]" data-name="block" data-modal="0">
            <div class="app-modal-header block_header mb-4 text-lg font-bold tracking-[-.02em] text-slate-950 dark:text-slate-50">
                {{__('chatify.Please check users you want to block')}}
            </div>
            <div class="app-modal-body">
                <form>
                    <div id="blockUsersFromGroup">
                        <div class="user_list space-y-2"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="app-modal fixed inset-0 z-[9998] items-center justify-center bg-slate-950/45 p-4 backdrop-blur-sm" data-name="alert" style="display: none;">
    <div class="app-modal-container w-full max-w-[28rem]">
        <div class="app-modal-card rounded-[1.75rem] border border-slate-900/5 bg-white p-6 text-center shadow-[0_24px_70px_rgba(15,23,42,.16)] dark:border-white/10 dark:bg-slate-900 dark:text-slate-100 dark:shadow-[0_24px_70px_rgba(0,0,0,.35)]" data-name="alert" data-modal="0">
            <div class="app-modal-header text-xl font-bold tracking-[-.02em] text-slate-950 dark:text-slate-50"></div>
            <div class="app-modal-body mt-2 text-sm font-medium text-slate-500 dark:text-slate-400"></div>
            <div class="app-modal-footer mt-6 flex justify-center">
                <a href="javascript:void(0)" class="app-btn cancel inline-flex h-11 min-w-28 items-center justify-center rounded-2xl bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] px-5 text-sm font-bold text-white no-underline shadow-[0_12px_24px_rgba(91,63,234,.24)]">{{__('chatify.Cancel')}}</a>
            </div>
        </div>
    </div>
</div>

<script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>

<script>
    window.chatify = {
        sounds: {!! json_encode(config('chatify.sounds')) !!},
        allowedImages: {!! json_encode(config('chatify.attachments.allowed_images')) !!},
        allowedFiles: {!! json_encode(config('chatify.attachments.allowed_files')) !!},
        maxUploadSize: {{ Chatify::getMaxUploadSize() }},
        pusher: {!! json_encode(config('chatify.pusher')) !!},
        pusherAuthEndpoint: '{{ route("pusher.auth") }}'
    };
    window.chatify.allAllowedExtensions = chatify.allowedImages.concat(chatify.allowedFiles);
</script>
<script src="{{ asset('template/chatify/js/utils.min.js') }}"></script>
{{-- <script src="{{ asset('template/chatify/js/recorder.js') }}"></script> --}}
<script src="{{ asset('template/chatify/js/code.min.js') }}?v=10"></script>
<script src="{{ asset('template/core/icons/iconify-icon.min.js') }}"></script>

<script>
    window.addEventListener('DOMContentLoaded', function () {
        const root = document.querySelector('.messenger');
        const listView = document.querySelector('.messenger-listView');
        const messagingView = document.querySelector('.messenger-messagingView');
        const infoView = document.querySelector('.messenger-infoView');
        const backdrop = document.querySelector('.bec-chat-backdrop');
        const messagesContainer = document.querySelector('.messages-container');
        const systemThemeQuery = window.matchMedia('(prefers-color-scheme: dark)');
        const isMobile = () => window.matchMedia('(max-width: 767px)').matches;

        function syncSystemTheme() {
            document.documentElement.classList.toggle('dark', systemThemeQuery.matches);
        }

        syncSystemTheme();
        systemThemeQuery.addEventListener?.('change', syncSystemTheme);

        document.querySelectorAll('.app-modal, .imageModal').forEach((modal) => {
            if (!modal.dataset.forceOpen) modal.style.display = 'none';
        });

        function closeInfoView() {
            infoView?.classList.add('hidden');
            infoView?.classList.remove('show');
            root?.classList.remove('show-infoSide');
            backdrop?.classList.add('hidden');
        }

        function openInfoView() {
            infoView?.classList.remove('hidden');
            infoView?.classList.add('show');
            root?.classList.add('show-infoSide');
            if (isMobile()) {
                backdrop?.classList.remove('hidden');
            }
        }

        function showConversationList() {
            root?.classList.remove('conversation-open');
            listView?.classList.remove('conversation-active');
            document.documentElement.classList.remove('bec-chat-conversation-open');
            listView?.style.removeProperty('display');
            messagingView?.style.removeProperty('display');
            closeInfoView();
        }

        function showConversationPane() {
            if (!isMobile()) return;
            root?.classList.add('conversation-open');
            listView?.classList.add('conversation-active');
            document.documentElement.classList.add('bec-chat-conversation-open');
            listView?.style.removeProperty('display');
            messagingView?.style.removeProperty('display');
        }

        function syncConversationAvatarFallback() {
            const activeNode = document.querySelector('.messenger-list-item.active, .messenger-list-item.m-list-active, .messenger-list-item tr.active');
            const activeItem = activeNode?.matches('.messenger-list-item') ? activeNode : activeNode?.closest('.messenger-list-item');
            const contactId = activeItem?.dataset.contact || document.querySelector('meta[name="id"]')?.content || '';
            const isGroup = contactId.includes('-');
            const presenceState = activeItem?.dataset.presence || '';
            const presenceLabel = activeItem?.dataset.presenceLabel || (presenceState === 'online' ? 'Online' : 'Offline');
            const activeAvatar = activeItem?.querySelector('.avatar');
            const activeAvatarImage = activeAvatar?.style?.backgroundImage || '';

            document.querySelectorAll('.header-avatar, .info-avatar').forEach((avatar) => {
                const icon = avatar.querySelector('.group-avatar-icon');
                const presenceDot = avatar.querySelector('.conversation-presence-dot');
                avatar.classList.toggle('is-group-avatar', isGroup);
                icon?.classList.toggle('hidden', !isGroup);
                icon?.classList.toggle('inline-block', isGroup);

                if (isGroup) {
                    if (avatar.style.backgroundImage !== 'none') avatar.style.backgroundImage = 'none';
                    presenceDot?.classList.add('hidden');
                    return;
                }

                if (activeAvatarImage && activeAvatarImage !== 'none' && avatar.style.backgroundImage !== activeAvatarImage) {
                    avatar.style.backgroundImage = activeAvatarImage;
                }

                if (!presenceDot) return;
                presenceDot.classList.toggle('hidden', !presenceState);
                presenceDot.classList.toggle('bg-[#52c41a]', presenceState === 'online');
                presenceDot.classList.toggle('bg-slate-300', presenceState !== 'online');
                presenceDot.classList.toggle('dark:bg-slate-500', presenceState !== 'online');
                presenceDot.setAttribute('aria-label', presenceLabel);
            });
        }

        function syncRecorderLayout() {
            const composer = document.querySelector('.composer-input');
            const recorder = document.querySelector('.box_recorder');
            if (!composer || !recorder) return;

            const recorderIsVisible = !recorder.classList.contains('d-none') && window.getComputedStyle(recorder).display !== 'none';
            composer.classList.toggle('is-recording', recorderIsVisible);
        }

        function formatAudioTime(value) {
            const seconds = Number.isFinite(value) ? Math.max(0, Math.floor(value)) : 0;
            const minutes = Math.floor(seconds / 60);
            const remainder = String(seconds % 60).padStart(2, '0');
            return `${minutes}:${remainder}`;
        }

        function pauseOtherAudioPlayers(currentAudio) {
            document.querySelectorAll('.chat-audio-source').forEach((audio) => {
                if (audio !== currentAudio) audio.pause();
            });
        }

        function initChatAudioPlayers() {
            document.querySelectorAll('.chat-audio-player').forEach((player) => {
                if (player.dataset.audioReady) return;

                const audio = player.querySelector('.chat-audio-source');
                const button = player.querySelector('.Pause_Play');
                const icon = button?.querySelector('i');
                const progress = player.querySelector('.audio-progress');
                const currentTime = player.querySelector('.audio-current-time');
                const duration = player.querySelector('.audio-duration');

                if (!audio || !button || !progress) return;

                function syncDuration() {
                    duration && (duration.textContent = formatAudioTime(audio.duration));
                }

                function syncProgress() {
                    currentTime && (currentTime.textContent = formatAudioTime(audio.currentTime));
                    progress.value = audio.duration ? String((audio.currentTime / audio.duration) * 100) : '0';
                }

                function setPlaying(isPlaying) {
                    button.setAttribute('aria-label', isPlaying ? 'Pause audio' : 'Play audio');
                    icon?.classList.toggle('fa-play', !isPlaying);
                    icon?.classList.toggle('fa-pause', isPlaying);
                }

                button.addEventListener('click', function () {
                    if (audio.paused) {
                        pauseOtherAudioPlayers(audio);
                        audio.play().catch(() => setPlaying(false));
                    } else {
                        audio.pause();
                    }
                });

                progress.addEventListener('input', function () {
                    if (!audio.duration) return;
                    audio.currentTime = (Number(progress.value) / 100) * audio.duration;
                    syncProgress();
                });

                audio.addEventListener('loadedmetadata', syncDuration);
                audio.addEventListener('durationchange', syncDuration);
                audio.addEventListener('timeupdate', syncProgress);
                audio.addEventListener('play', () => setPlaying(true));
                audio.addEventListener('pause', () => setPlaying(false));
                audio.addEventListener('ended', function () {
                    setPlaying(false);
                    syncProgress();
                });

                syncDuration();
                syncProgress();
                player.dataset.audioReady = 'true';
            });
        }

        function adaptDynamicNodes() {
            root?.classList.add('chatify-adapter-ready');

            document.querySelectorAll('.messenger-list-item').forEach((item) => {
                item.setAttribute('role', 'listitem');
            });

            document.querySelectorAll('.message-card').forEach((card) => {
                card.setAttribute('role', 'article');
                card.classList.toggle('chatify-sent-message', card.classList.contains('mc-sender'));
                card.classList.toggle('chatify-received-message', !card.classList.contains('mc-sender'));
            });

            if (messagesContainer) {
                messagesContainer.setAttribute('aria-live', 'polite');
                messagesContainer.setAttribute('aria-relevant', 'additions text');
            }

            if (isMobile() && listView?.classList.contains('conversation-active')) {
                root?.classList.add('conversation-open');
                document.documentElement.classList.add('bec-chat-conversation-open');
            } else {
                document.documentElement.classList.remove('bec-chat-conversation-open');
            }

            syncConversationAvatarFallback();
            syncRecorderLayout();
            initChatAudioPlayers();
        }

        document.addEventListener('click', function (event) {
            const closeTrigger = event.target.closest('.messenger-infoView-close, .bec-chat-backdrop');
            if (closeTrigger) {
                event.preventDefault();
                closeInfoView();
                return;
            }

            const backTrigger = event.target.closest('a.show-listView');
            if (backTrigger) {
                window.setTimeout(showConversationList, 0);
                return;
            }

            const detailsTrigger = event.target.closest('a.show-infoSide');
            if (detailsTrigger) {
                window.setTimeout(openInfoView, 0);
                return;
            }

            const listItem = event.target.closest('.messenger-list-item');
            if (listItem && listView && isMobile()) {
                window.setTimeout(showConversationPane, 0);
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeInfoView();
        });

        adaptDynamicNodes();

        if (root) {
            const observer = new MutationObserver(() => {
                window.requestAnimationFrame(adaptDynamicNodes);
            });

            observer.observe(root, {
                childList: true,
                subtree: true,
                attributes: true,
                attributeFilter: ['class', 'style'],
            });
        }
    });
</script>
</body>
</html>
