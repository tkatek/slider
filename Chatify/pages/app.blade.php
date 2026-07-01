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

        html.dark {
            color-scheme: dark;
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
        .bec-chat-page textarea:focus-visible,
        .bec-chat-page label:focus-visible,
        .bec-chat-page [tabindex]:not([tabindex="-1"]):focus-visible {
            outline: 0 !important;
            box-shadow: 0 0 0 4px rgba(91, 63, 234, .18) !important;
        }

        @media (max-width: 767px) {
            .bec-chat-page .messenger.conversation-open .messenger-listView,
            .bec-chat-page .messenger-listView.conversation-active {
                display: none !important;
            }

            .bec-chat-page .messenger.conversation-open .messenger-messagingView,
            .bec-chat-page .messenger-listView.conversation-active + .messenger-messagingView {
                display: grid !important;
            }

        }

    </style>
</head>
<body class="relative h-full overflow-hidden bg-[#FAFAFF] font-sans text-slate-950 antialiased transition-colors duration-300 dark:bg-[#070B16] dark:text-slate-100">

@include("slider.menu", ["active" => "speaking"])

@php
    $isGroupConversation = \Illuminate\Support\Str::of((string) $id)->contains('-');
    $authAvatar = auth()->user()->getFirstMediaUrl('avatars','thumb');
    $conversationAvatarStyle = $isGroupConversation ? 'background-image: none;' : "background-image: url('{$authAvatar}');";
@endphp

<main class="bec-chat-page fixed inset-x-0 top-0 bottom-[calc(var(--bec-chat-bottom-nav)+env(safe-area-inset-bottom,0px))] z-[1] min-h-0 overflow-hidden p-0 xl:left-[var(--bec-chat-sidebar)] xl:bottom-0" aria-label="Boston English Center messenger">
    <section class="messenger {{ !!$id ? 'conversation-open' : '' }} relative h-full min-h-0 w-full overflow-hidden transition-colors duration-300 md:flex md:gap-0" dir="ltr">
        <aside class="messenger-listView {{ !!$id ? 'conversation-active' : '' }} absolute inset-0 z-20 flex h-full min-w-0 flex-col overflow-visible bg-[#FAFAFF] px-4 py-4 transition-colors duration-300 sm:px-6 md:relative md:inset-auto md:z-auto md:w-[360px] md:shrink-0 md:border-r md:border-slate-900/5 md:px-4 md:py-3 xl:w-[400px] dark:border-white/[.07] dark:bg-[#080D19]">
            <div class="m-header mb-3 shrink-0">
                <header class="mb-3 flex shrink-0 items-center justify-between">
                    <h1 class="text-[34px] font-bold leading-none tracking-[-0.035em] text-[#081433] sm:text-[38px] md:text-[34px] xl:text-[38px] dark:text-white">Chats</h1>
                </header>

                <label class="flex h-14 min-w-0 flex-1 items-center gap-3 rounded-full border border-slate-900/5 bg-white px-5 shadow-[0_8px_28px_rgba(15,23,42,0.035)] transition-colors duration-300 sm:h-14 md:h-12 md:px-4 xl:h-14 dark:border-white/10 dark:bg-slate-900 dark:shadow-[0_8px_28px_rgba(0,0,0,0.24)]">
                    <svg viewBox="0 0 24 24" fill="none" class="h-6 w-6 shrink-0 text-slate-500 md:h-5 md:w-5 xl:h-6 xl:w-6 dark:text-slate-400"><path d="M10.8 18.1a7.3 7.3 0 1 1 0-14.6 7.3 7.3 0 0 1 0 14.6ZM16.1 16.1 21 21" stroke="currentColor" stroke-width="2.3" stroke-linecap="round"/></svg>
                    <input type="text" class="messenger-search h-full min-w-0 flex-1 bg-transparent text-base font-medium text-slate-900 outline-none placeholder:text-slate-400 md:text-sm xl:text-base dark:text-slate-100 dark:placeholder:text-slate-500" placeholder="{{ __('chatify.Search') }}" aria-label="{{ __('chatify.Search') }}">
                </label> 
            </div>

            <div class="m-body contacts-container min-h-0 flex-1 overflow-hidden">
                <div class="show messenger-tab users-tab bec-chat-scroll flex h-full min-h-0 flex-col overflow-y-auto" data-view="users" role="list" aria-label="Chats">
                    <div class="admins-section shrink-0">
                        <p class="messenger-title px-1 pb-2 pt-1 text-xs font-bold text-slate-400 dark:text-slate-500"><span>{{ __('chatify.Administration') }}</span></p>
                        <div class="messenger-admins bec-chat-scroll -mx-1 mb-3 flex gap-2 overflow-x-auto px-1 pb-1"></div>
                    </div>

                    <p class="messenger-title px-1 pb-2 pt-1 text-xs font-bold text-slate-400 dark:text-slate-500"><span>{{ __('chatify.AllMessages') }}</span></p>
                    <div class="listOfContacts bec-chat-scroll mx-0 min-h-0 flex-1 space-y-4 overflow-y-auto px-0 pb-6 pt-2"></div>
                </div>

                <div class="messenger-tab search-tab bec-chat-scroll h-full min-h-0 overflow-y-auto" data-view="search">
                    <p class="messenger-title px-1 pb-2 pt-1 text-xs font-bold text-slate-400 dark:text-slate-500"><span>{{ __('chatify.Search') }}</span></p>
                    <div class="search-records mx-0 space-y-4 px-0 pb-6 pt-2">
                        <p class="message-hint center-el relative inset-auto mx-auto transform-none rounded-[1.5rem] bg-white px-5 py-8 text-center text-sm font-medium text-slate-500 shadow-[0_14px_40px_rgba(15,23,42,0.04)] transition-colors duration-300 dark:bg-slate-900 dark:text-slate-400 dark:shadow-[0_14px_40px_rgba(0,0,0,0.24)]"><span>{{ __('chatify.Type to search..') }}</span></p>
                    </div>
                </div>
            </div>
        </aside>

        <section class="messenger-messagingView relative z-[1] grid h-full min-h-0 max-h-full w-full grid-rows-[auto_minmax(0,1fr)_auto] overflow-hidden bg-[#FAFAFF] transition-colors duration-300 md:min-w-0 md:flex-1 dark:bg-[#070B16]" role="region" aria-label="Conversation">
            <div class="m-header m-header-messaging shrink-0 border-b border-slate-900/5 bg-[#FAFAFF]/95 px-3 pb-2 pt-3 backdrop-blur transition-colors duration-300 sm:px-4 md:px-6 md:py-3 xl:px-7 dark:border-white/10 dark:bg-[#070B16]/95">
                <nav class="flex items-center gap-2 sm:gap-3">
                    <a href="#" class="show-listView flex h-9 w-7 shrink-0 items-center justify-center text-[#5B3FEA] transition active:scale-95 md:hidden dark:text-violet-300" aria-label="Back to chats">
                        <svg viewBox="0 0 24 24" fill="none" class="h-7 w-7"><path d="M15 5 8 12l7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>

                    <a href="#" class="show-infoSide flex min-w-0 flex-1 items-center gap-3 text-left no-underline" aria-label="Open conversation details">
                        <div class="avatar av-s header-avatar {{ $isGroupConversation ? 'is-group-avatar' : '' }} flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#F2EEFF] bg-cover bg-center text-[#5B3FEA] ring-2 ring-white xl:h-12 xl:w-12 dark:bg-violet-500/15 dark:text-violet-300 dark:ring-slate-900" style="{{ $conversationAvatarStyle }}">
                            <i class="group-avatar-icon fa-solid fa-user-group {{ $isGroupConversation ? 'inline-block' : 'hidden' }} text-lg"></i>
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
                                <span class="typing-dots inline-flex items-center gap-1 rounded-full bg-white px-4 py-3 shadow-[0_12px_32px_rgba(15,23,42,0.045)] transition-colors duration-300 dark:bg-slate-900 dark:shadow-[0_12px_32px_rgba(0,0,0,0.24)]">
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

                    <label class="attachment-button inline-flex h-12 w-12 shrink-0 cursor-pointer items-center justify-center rounded-full border-0 bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-white shadow-[0_12px_24px_rgba(91,63,234,0.25)] active:scale-95" aria-label="Add attachment" tabindex="0">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-[1.6rem] w-[1.6rem]">
                            <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"></path>
                        </svg>
                        <input disabled="disabled" type="file" class="upload-attachment hidden" name="file" accept=".{{ implode(', .', config('chatify.attachments.allowed_images')) }}, .{{ implode(', .', config('chatify.attachments.allowed_files')) }}" />
                    </label>

                    <div class="composer-input flex h-12 min-w-0 flex-1 items-center gap-3 rounded-full border border-slate-900/5 bg-white px-5 shadow-[0_10px_34px_rgba(15,23,42,0.045)] transition-colors duration-300 dark:border-white/[.08] dark:bg-[#101827] dark:shadow-[0_14px_34px_rgba(0,0,0,0.18)]">
                        <textarea readonly="readonly" name="message" rows="1" class="m-send app-scroll block h-full min-w-0 flex-1 resize-none border-0 bg-transparent py-[.72rem] text-[.95rem] font-medium leading-6 text-slate-900 shadow-none outline-none placeholder:text-slate-400 dark:text-slate-100 dark:placeholder:text-slate-500" placeholder="Type a message..." aria-label="Message text"></textarea>

                        <button type="button" class="emoji-button inline-flex h-7 w-7 shrink-0 items-center justify-center border-0 bg-transparent p-0 text-[#5B3FEA] outline-none transition active:scale-95 dark:text-violet-300" aria-label="Emoji">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-[1.65rem] w-[1.65rem]">
                                <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" stroke="currentColor" stroke-width="2.1"></path>
                                <path d="M8.5 9.5h.01M15.5 9.5h.01M8.5 14c.8 1.4 2 2.1 3.5 2.1s2.7-.7 3.5-2.1" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"></path>
                            </svg>
                        </button>

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

                                <span id="sendRecordBtn" class="inline-flex h-9 w-9 shrink-0 cursor-pointer items-center justify-center rounded-full bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-white shadow-[0_10px_22px_rgba(91,63,234,0.22)]">
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
                    <div class="avatar av-l info-avatar chatify-d-flex {{ $isGroupConversation ? 'is-group-avatar' : '' }} h-20 w-20 items-center justify-center rounded-full bg-[#F2EEFF] bg-cover bg-center text-[#5B3FEA] dark:bg-violet-500/15 dark:text-violet-300" style="{{ $conversationAvatarStyle }}">
                        <i class="group-avatar-icon fa-solid fa-user-group {{ $isGroupConversation ? 'inline-block' : 'hidden' }} text-2xl"></i>
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
                <p class="collapsed cursor-pointer mb-4">
                    <span class="flex items-center justify-between gap-3">
                        <span>
                            <span class="block text-base font-extrabold tracking-[-.02em] text-slate-950 dark:text-white">{{ __('chatify.SharedPhotos') }}</span>
                            <span class="mt-1 block text-xs font-bold text-slate-400 dark:text-slate-500">Images from this conversation</span>
                        </span>
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#F2EEFF] text-[#5B3FEA] dark:bg-violet-500/15 dark:text-violet-300">
                            <iconify-icon class="arrow_right" icon="ic:baseline-plus"></iconify-icon>
                        </span>
                    </span>
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
<script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>

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
            listView?.style.removeProperty('display');
            messagingView?.style.removeProperty('display');
            closeInfoView();
        }

        function showConversationPane() {
            if (!isMobile()) return;
            root?.classList.add('conversation-open');
            listView?.classList.add('conversation-active');
            listView?.style.removeProperty('display');
            messagingView?.style.removeProperty('display');
        }

        function syncConversationAvatarFallback() {
            const activeNode = document.querySelector('.messenger-list-item.active, .messenger-list-item.m-list-active, .messenger-list-item tr.active');
            const activeItem = activeNode?.matches('.messenger-list-item') ? activeNode : activeNode?.closest('.messenger-list-item');
            const contactId = activeItem?.dataset.contact || document.querySelector('meta[name="id"]')?.content || '';
            const isGroup = contactId.includes('-');
            const activeAvatar = activeItem?.querySelector('.avatar');
            const activeAvatarImage = activeAvatar?.style?.backgroundImage || '';

            document.querySelectorAll('.header-avatar, .info-avatar').forEach((avatar) => {
                const icon = avatar.querySelector('.group-avatar-icon');
                avatar.classList.toggle('is-group-avatar', isGroup);
                icon?.classList.toggle('hidden', !isGroup);
                icon?.classList.toggle('inline-block', isGroup);

                if (isGroup) {
                    if (avatar.style.backgroundImage !== 'none') avatar.style.backgroundImage = 'none';
                    return;
                }

                if (activeAvatarImage && activeAvatarImage !== 'none' && avatar.style.backgroundImage !== activeAvatarImage) {
                    avatar.style.backgroundImage = activeAvatarImage;
                }
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
            }

            syncConversationAvatarFallback();
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
