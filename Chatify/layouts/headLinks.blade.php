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
