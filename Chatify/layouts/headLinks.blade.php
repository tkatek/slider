<title>{{ config('chatify.name') }}</title>

{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="id" content="{{ $id }}">
<meta name="groups" content="{{ $groups }}">
<meta name="courses" content="{{ $courses }}">
<meta name="messenger-color" content="{{--{{ $messengerColor }}--}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

<script>
    (function () {
        const savedTheme = localStorage.getItem('chat-theme');
        const systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        const shouldUseDark = savedTheme ? savedTheme === 'dark' : systemPrefersDark;
        document.documentElement.classList.toggle('dark', shouldUseDark);
    })();
</script>
<script src="{{ asset('template/core/jquery.min.js') }}"></script>
<script src="{{ asset('template/chatify/js/font.awesome.min.js') }}"></script>
<script src="{{ asset('template/chatify/js/autosize.min.js') }}"></script>
<script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>

<link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&display=swap" rel="stylesheet">

<script>
    window.tailwind = window.tailwind || {};
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'sans-serif'],
                },
            },
        },
    };
</script>
<script src="https://cdn.tailwindcss.com"></script>

<style>
    :root {
        --primary-color: {{--{{ $messengerColor }}--}};
        --chatify-purple: #5B3FEA;
        --chatify-purple-2: #4F35D8;
    }

    html, body {
        height: 100%;
        overflow: hidden;
        background: #FAFAFF;
    }

    .dark body, body.dark {
        background: #070B16;
    }

    .chatify-page-shell,
    .chatify-page-frame,
    .messenger,
    .messenger-listView,
    .messenger-messagingView,
    .messenger-infoView {
        min-height: 0 !important;
    }

    .messenger {
        display: flex !important;
        width: 100% !important;
        max-width: 100% !important;
        border: 0 !important;
        background: transparent !important;
        box-shadow: none !important;
        font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    .d-none {
        display: none !important;
    }

    .d-flex {
        display: flex !important;
    }

    .app-scroll,
    .app-scroll-hidden,
    .listOfContacts,
    .messages-container {
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .app-scroll::-webkit-scrollbar,
    .app-scroll-hidden::-webkit-scrollbar,
    .listOfContacts::-webkit-scrollbar,
    .messages-container::-webkit-scrollbar {
        display: none;
    }

    .messenger-listView,
    .messenger-messagingView,
    .messenger-infoView {
        position: relative !important;
        inset: auto !important;
        top: auto !important;
        right: auto !important;
        bottom: auto !important;
        left: auto !important;
        height: 100% !important;
        border: 0 !important;
        box-shadow: none !important;
    }

    .m-header,
    .m-body {
        position: relative !important;
        width: 100% !important;
        border: 0 !important;
        background: transparent !important;
        box-shadow: none !important;
    }

    .main_logo {
        width: 28px !important;
        height: 28px !important;
        margin: 0 !important;
        background-size: contain !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
    }

    .messenger-tab:not(.show) { display: none !important; }
    .messenger-tab.show { display: flex !important; }
    .search-tab.show { display: block !important; }

    .listOfContacts,
    .messenger-admins,
    .search-records,
    .messages-container,
    .messages {
        position: relative !important;
        width: 100% !important;
        height: auto !important;
    }

    .message-hint.center-el {
        position: relative !important;
        top: auto !important;
        left: auto !important;
        transform: none !important;
        display: block !important;
        margin: 0 !important;
    }

    .app-modal[style*="display: block"],
    .app-modal[style*="display:block"],
    .imageModal[style*="display: block"],
    .imageModal[style*="display:block"] {
        display: flex !important;
    }

    .avatar,
    .header-avatar,
    .shared-photo,
    .chat-image,
    .image-file {
        background-size: cover !important;
        background-position: center !important;
    }

    .activeStatus {
        position: absolute !important;
        right: 0 !important;
        bottom: .15rem !important;
        z-index: 2 !important;
        width: 1rem !important;
        height: 1rem !important;
        border-radius: 999px !important;
        border: 3px solid #fff !important;
        background: #52C41A !important;
    }

    .dark .activeStatus, body.dark .activeStatus {
        border-color: rgb(15 23 42) !important;
    }

    .message-card {
        margin: 0 0 14px !important;
        background: transparent !important;
        box-shadow: none !important;
    }

    .message-card-content,
    .message-card .message {
        background: transparent !important;
        box-shadow: none !important;
    }

    .message_content {
        word-break: break-word !important;
    }

    .message-time {
        float: none !important;
    }

    .d-none { display: none !important; }

    .messenger-infoView.active,
    .messenger-infoView.show,
    .messenger.show-infoSide .messenger-infoView,
    .messenger-infoView[style*="display: block"],
    .messenger-infoView[style*="display:block"] {
        display: flex !important;
        flex-direction: column !important;
    }

    .shared-photos-list {
        display: grid !important;
        grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
        gap: 8px !important;
    }

    .shared-photo {
        aspect-ratio: 1 / 1;
        width: 100% !important;
        min-height: 82px;
        border-radius: 1rem !important;
    }

    .internet-connection .ic-connecting,
    .internet-connection .ic-noInternet {
        display: none;
    }

    @media (max-width: 767px) {
        .chatify-page-frame { padding: 0 !important; } 
        .messenger { display: block !important; border-radius: 0 !important; }
        .messenger-listView,
        .messenger-messagingView { width: 100% !important; border-radius: 0 !important; }
        .messenger-listView.conversation-active { display: none !important; }
        .messenger-listView.conversation-active + .messenger-messagingView { display: flex !important; }
        .messenger-listView:not(.conversation-active) + .messenger-messagingView { display: none !important; }
        .message-card .image_profile { display: none !important; }
    }

    @media (min-width: 768px) {
        .messenger-listView { display: flex !important; }
        .messenger-messagingView { display: flex !important; }
    }
</style>

<script src="{{ asset('template/core/dark-mode.min.js') }}"></script>
