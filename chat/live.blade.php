@php
    $content = is_array($content ?? null) ? $content : [];

    if (auth()->check()) {
        $user = auth()->user();
    } else {
        $user = \App\Models\User::create([
            'id' => \Illuminate\Support\Str::uuid()->toString(),
            'name' => \Faker\Factory::create()->firstName(),
            'last_name' => \Faker\Factory::create()->lastName(),
            'email' => \Faker\Factory::create()->email(),
            'role_id' => 4,
        ]);
        auth()->login($user, true);
    }

    $userAvatar = $user->getFirstMediaUrl('avatars', 'thumb');
    if (!$userAvatar) {
        $userAvatar = 'https://ui-avatars.com/api/?name=' . urlencode($user->name)
            . ($content['avatar_query'] ?? '&background=6366f1&color=fff&bold=true');
    }

    $pusher = [
        'key' => config('chatify.pusher.key'),
        'cluster' => config('chatify.pusher.options.cluster'),
        'channel' => "slide-$slide->id",
    ];

    $storedTitle = ($content['title_from_database'] ?? true)
        ? (($slideItems ?? null)?->where('title', 'title')->first()->content ?? null)
        : null;
    $storedSubtitle = ($slideItems ?? null)?->where('title', 'subtitle')->first()->content ?? null;
    $titleFallback = $content['title_fallback'] ?? 'Writing Time';
    $subtitleFallback = $content['subtitle_fallback'] ?? 'Share your thoughts';

    if ($content['fallback_on_empty'] ?? false) {
        $finalTitle = ($content['title'] ?? null) ?: ($storedTitle ?: $titleFallback);
        $finalSubtitle = ($content['subtitle'] ?? null) ?: ($storedSubtitle ?: $subtitleFallback);
    } else {
        $finalTitle = $content['title'] ?? $customTitle ?? $storedTitle ?? $titleFallback;
        $finalSubtitle = $content['subtitle'] ?? $customSubtitle ?? $storedSubtitle ?? $subtitleFallback;
    }

    $content['user'] = $user;
    $content['user_avatar'] = $userAvatar;
    $content['pusher'] = $pusher;
    $content['title'] = $finalTitle;
    $content['subtitle'] = $finalSubtitle;
    $content['page_title'] = ($content['fallback_on_empty'] ?? false)
        ? (($content['page_title'] ?? null) ?: $finalTitle)
        : ($content['page_title'] ?? $finalTitle);
@endphp

@extends("slider.simple-layout")

@section("style")
    @php
        $isOrangeTheme = ($theme['name'] ?? null) === 'orange' || ($content['accent'] ?? null) === 'orange';
        $calloutBorderColor = $isOrangeTheme ? 'rgba(251, 146, 60, 0.26)' : 'rgba(99, 102, 241, 0.22)';
        $calloutBgStart = $isOrangeTheme ? 'rgba(251, 191, 36, 0.14)' : 'rgba(99, 102, 241, 0.12)';
        $calloutBgEnd = $isOrangeTheme ? 'rgba(249, 115, 22, 0.10)' : 'rgba(14, 165, 233, 0.08)';
        $calloutShadowColor = $isOrangeTheme ? 'rgba(249, 115, 22, 0.30)' : 'rgba(79, 70, 229, 0.35)';
        $calloutDarkBorderColor = $isOrangeTheme ? 'rgba(251, 191, 36, 0.30)' : 'rgba(129, 140, 248, 0.28)';
        $calloutDarkBgStart = $isOrangeTheme ? 'rgba(251, 146, 60, 0.24)' : 'rgba(99, 102, 241, 0.22)';
        $calloutDarkBgEnd = $isOrangeTheme ? 'rgba(245, 158, 11, 0.16)' : 'rgba(14, 165, 233, 0.14)';
        $calloutDarkShadowColor = $isOrangeTheme ? 'rgba(251, 146, 60, 0.28)' : 'rgba(14, 165, 233, 0.3)';
        $calloutTextColor = $isOrangeTheme ? '#9a3412' : '#312e81';
        $calloutDarkTextColor = $isOrangeTheme ? '#ffedd5' : '#e0e7ff';
    @endphp

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <style>
        #mainTitle,
        #mainSubtitle {
            opacity: 0;
        }

        .live-subtitle-callout {
            display: inline-block;
            width: fit-content;
            max-width: min(100%, 46rem);
            border: 1px solid {{ $calloutBorderColor }};
            background:
                    linear-gradient(135deg, {{ $calloutBgStart }}, {{ $calloutBgEnd }}),
                    rgba(255, 255, 255, 0.88);
            box-shadow: 0 18px 40px -28px {{ $calloutShadowColor }};
        }

        .dark .live-subtitle-callout {
            border-color: {{ $calloutDarkBorderColor }};
            background:
                    linear-gradient(135deg, {{ $calloutDarkBgStart }}, {{ $calloutDarkBgEnd }}),
                    rgba(15, 23, 42, 0.82);
            box-shadow: 0 18px 42px -30px {{ $calloutDarkShadowColor }};
        }

        .live-subtitle-callout-text {
            color: {{ $calloutTextColor }};
        }

        .dark .live-subtitle-callout-text {
            color: {{ $calloutDarkTextColor }};
        }

        .live-subtitle-callout-text br {
            display: block;
            content: "";
            margin-top: .55rem;
        }

        textarea::-webkit-scrollbar {
            width: 0px;
            background: transparent;
        }
        .live-writing-row { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.2fr); gap: 1.5rem; align-items: start; width: 100%; max-width: 1100px; margin: 1.5rem auto; padding: 0 1.5rem; }
        .live-writing-row .live-guide-wrap, .live-writing-row main { padding: 0; min-width: 0; }
        .live-writing-row .live-guide-wrap > div { margin-top: 0; }
        .live-writing-row .input-composer-card { max-width: none; }
        .live-submitted-answers { grid-column: 1 / -1; width: 100%; }
        .live-submitted-answers:empty { display: none; }
        .live-writing-row #myAnswer { min-height: 200px; }
        @media (max-width: 699px) { .live-writing-row { grid-template-columns: 1fr; padding-inline: 1rem; } }
    </style>
@endsection

@section("content")
    @php
        $chatCallout = trim((string) ($content['callout_text'] ?? ''));
        $calloutBeside = $chatCallout !== '' && ($content['callout_position'] ?? '') === 'beside';
        $modelAnswer = trim((string) ($content['model_answer'] ?? ''));
    @endphp

    <div class="min-h-[100dvh] flex flex-col items-center justify-center">
        @include('slider.components.title-subtitle')

        <div class="{{ $calloutBeside ? 'live-writing-row' : 'w-full' }}">
        @if($chatCallout !== '')
            <div class="live-guide-wrap w-full px-4 sm:px-6 lg:px-8">
                <div class="mx-auto mt-1 w-full text-center">
                    <div class="live-subtitle-callout rounded-[24px] p-4 text-left sm:p-5">
                        <div class="live-subtitle-callout-text text-sm font-bold leading-[1.5] sm:text-[0.95rem]">
                            {!! $chatCallout !!}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <main class="w-full max-w-[1600px] mx-auto px-4 md:px-8 py-12">
            <div id="{{ $calloutBeside ? 'composerContainer' : 'cardsContainer' }}" class="flex flex-wrap justify-center gap-6 items-start">
            </div>
        </main>
        @if($calloutBeside)
            <div id="cardsContainer" class="live-submitted-answers flex flex-wrap justify-start gap-6 items-start" aria-label="Submitted answers"></div>
        @endif
        </div>
    </div>

    <div id="toastContainer" class="fixed bottom-8 right-8 flex flex-col gap-3 z-[2000]"></div>

    @if($modelAnswer !== '')
        <div
                id="modelAnswerModal"
                class="fixed inset-0 z-[2100] hidden items-center justify-center bg-slate-950/45 p-3 backdrop-blur-sm sm:p-4"
                role="dialog"
                aria-modal="true"
                aria-labelledby="modelAnswerTitle"
        >
            <button
                    type="button"
                    class="absolute inset-0 cursor-default"
                    aria-label="Close model answer"
                    data-close-model-answer
            ></button>

            <section
                    class="relative flex max-h-[calc(100dvh-2rem)] w-full max-w-2xl flex-col overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-4 shadow-2xl shadow-slate-950/20 dark:border-slate-700 dark:bg-slate-900 sm:max-w-3xl sm:p-5"
            >
                <div class="flex shrink-0 items-center justify-between gap-4 border-b border-slate-200 pb-4 dark:border-slate-700">
                    <h2
                            id="modelAnswerTitle"
                            class="text-xl font-black leading-tight text-slate-950 dark:text-white sm:text-2xl"
                    >
                        Model answer
                    </h2>

                    <button
                            type="button"
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-slate-200 bg-slate-50 text-xl font-black leading-none text-slate-700 transition hover:bg-slate-100 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100 dark:hover:bg-slate-700 sm:h-10 sm:w-10"
                            aria-label="Close model answer"
                            data-close-model-answer
                    >
                        &times;
                    </button>
                </div>

                <div class="mt-4 min-h-0 flex-1 overflow-y-auto overscroll-contain rounded-2xl border border-orange-200 bg-orange-50/70 p-4 pr-3 dark:border-orange-500/25 dark:bg-orange-500/10 sm:p-5">
                    <p class="whitespace-pre-wrap break-words text-sm font-bold leading-relaxed text-slate-800 dark:text-slate-100 sm:text-base">
                        {{ $modelAnswer }}
                    </p>
                </div>
            </section>
        </div>
    @endif
@endsection

@section('script')
    <script>
        const PUSHER_APP_KEY = @json($content['pusher']['key']);
        const PUSHER_APP_CLUSTER = @json($content['pusher']['cluster']);
        const CHANNEL_NAME = @json($content['pusher']['channel']);
        const EVENT_NAME = 'submission';
        const EVENT_REPLY = 'reply';
        const isTeacher = @json($content['user']['role_id'] != 4);

        const myUserId = @json($content['user']['id']);
        const myName = @json($content['user']['name'] . ' ' . $content['user']['last_name']);
        const myAvatar = @json($content['user_avatar']);
        const customPlaceholder = @json($content['placeholder'] ?? 'Type here...');
        const modelAnswerText = @json(trim((string) ($content['model_answer'] ?? '')));

        const inputSideImage = @json($content['image'] ?? null);
        const hasInputSideImage = !!inputSideImage;

        window.addEventListener('DOMContentLoaded', () => {
            initPusher();
            renderInitialGrid();

            document.querySelectorAll('[data-close-model-answer]').forEach((button) => {
                button.addEventListener('click', closeModelAnswer);
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    closeModelAnswer();
                }
            });

            gsap.to("#mainTitle", {
                y: 0,
                opacity: 1,
                duration: 1,
                ease: "power4.out",
                delay: 0.2
            });

            gsap.to("#mainSubtitle", {
                y: 0,
                opacity: 1,
                duration: 1,
                ease: "power4.out",
                delay: 0.4
            });
        });

        function initPusher() {
            const pusher = new Pusher(PUSHER_APP_KEY, {
                cluster: PUSHER_APP_CLUSTER,
                forceTLS: true
            });

            const channel = pusher.subscribe(CHANNEL_NAME);

            channel.bind(EVENT_NAME, handleIncomingSubmission);
            channel.bind(EVENT_REPLY, handleIncomingReply);
        }

        function renderInitialGrid() {
            const container = document.getElementById('cardsContainer');
            container.innerHTML = '';
            const composer = document.getElementById('composerContainer');
            if (composer) composer.innerHTML = '';
            createInputCard();
        }

        function getInputCardClass(hasImage) {
            if (hasImage) {
                return 'input-composer-card w-full max-w-[820px] bg-white dark:bg-slate-900 rounded-[2rem] p-4 sm:p-5 border border-slate-200 dark:border-slate-700 shadow-sm transition-all hover:shadow-md grid grid-cols-1 md:grid-cols-[1fr_280px] gap-4 items-stretch';
            }

            return 'input-composer-card w-full max-w-[380px] bg-white dark:bg-slate-900 rounded-[2rem] p-6 border border-slate-200 dark:border-slate-700 shadow-sm transition-all hover:shadow-md';
        }

        function createInputCard() {
            const container = document.getElementById('composerContainer') || document.getElementById('cardsContainer');
            const card = document.createElement('div');

            card.className = getInputCardClass(hasInputSideImage);
            card.setAttribute('data-has-input-image', hasInputSideImage ? 'true' : 'false');

            const imageHtml = hasInputSideImage
                ? `
                    <div class="input-side-image-wrap order-first md:order-last">
                        <div class="aspect-square w-full overflow-hidden rounded-[1.5rem] bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
                            <img src="${inputSideImage}"
                                 alt=""
                                 onerror="handleInputImageError(this)"
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                `
                : '';

            card.innerHTML = `
                <div class="flex flex-col">
                    <div class="flex items-center gap-4 mb-4">
                        <img src="${myAvatar}" class="w-12 h-12 rounded-full border-2 border-white shadow-sm object-cover">

                        <div>
                            <h3 class="font-bold text-slate-900 dark:text-slate-100 leading-none">You</h3>
                            <span class="text-[0.7rem] font-bold text-slate-400 uppercase tracking-wider">${isTeacher ? 'Teacher' : 'Student'}</span>
                        </div>

                        ${modelAnswerText ? `
                            <button type="button"
                                onclick="openModelAnswer()"
                                class="ml-auto shrink-0 rounded-full border border-orange-200 bg-orange-50 px-4 py-2 text-xs font-black text-orange-700 transition hover:-translate-y-0.5 hover:bg-orange-100 dark:border-orange-500/30 dark:bg-orange-500/10 dark:text-orange-200 dark:hover:bg-orange-500/20 sm:text-sm">
                                Model answer
                            </button>
                        ` : ''}
                    </div>

                    <div class="space-y-4 flex-1 flex flex-col">
                        <textarea id="myAnswer"
                            class="w-full flex-1 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl p-4 text-slate-800 dark:text-slate-100 focus:bg-white dark:focus:bg-slate-800 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all resize-none min-h-[140px]"
                            placeholder="${customPlaceholder}"
                            oninput="updateBtnState('myAnswer', 'submit-btn-main')"></textarea>

                        <button id="submit-btn-main" onclick="submitMyAnswer()" class="w-full py-3 rounded-full font-bold text-white bg-slate-300 transition-all cursor-not-allowed">
                            Submit Answer
                        </button>
                    </div>
                </div>

                ${imageHtml}
            `;

            container.prepend(card);
        }

        function openModelAnswer() {
            if (!modelAnswerText) return;

            const modal = document.getElementById('modelAnswerModal');
            if (!modal) return;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModelAnswer() {
            const modal = document.getElementById('modelAnswerModal');
            if (!modal) return;

            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function handleInputImageError(img) {
            const card = img.closest('.input-composer-card');
            const imageWrap = img.closest('.input-side-image-wrap');

            if (imageWrap) {
                imageWrap.remove();
            }

            if (card) {
                card.className = getInputCardClass(false);
                card.setAttribute('data-has-input-image', 'false');
            }
        }

        function updateBtnState(inputId, btnId) {
            const val = document.getElementById(inputId).value.trim();
            const btn = document.getElementById(btnId);
            const activeClasses = ['bg-gradient-to-r', 'from-slate-700', 'via-zinc-700', 'to-stone-700', 'hover:from-slate-800', 'hover:via-zinc-800', 'hover:to-stone-800', 'shadow-lg', 'cursor-pointer'];

            if (val.length > 0) {
                btn.classList.remove('bg-slate-300', 'cursor-not-allowed');
                btn.classList.add(...activeClasses);
            } else {
                btn.classList.add('bg-slate-300', 'cursor-not-allowed');
                btn.classList.remove(...activeClasses);
            }
        }

        function createCard(data, isMe) {
            const container = document.getElementById('cardsContainer');
            const card = document.createElement('div');

            card.className = 'w-full max-w-[380px] bg-white dark:bg-slate-900 rounded-[2rem] p-6 border border-slate-200 dark:border-slate-700 shadow-sm transition-all hover:shadow-xl';
            card.setAttribute('data-card-id', data.cardId);

            const timeString = new Date(data.timestamp).toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });

            card.innerHTML = `
                <div class="flex items-center gap-4 mb-4">
                    <img src="${data.avatar}" class="w-12 h-12 rounded-full border-2 border-white shadow-sm object-cover">

                    <div>
                        <h3 class="font-bold text-slate-900 dark:text-slate-100 leading-none">${isMe ? 'You' : escapeHtml(data.name)}</h3>
                        <span class="text-[0.7rem] font-bold text-slate-400 uppercase tracking-wider">${timeString}</span>
                    </div>
                </div>

                <div class="mb-6">
                    <p class="text-slate-700 dark:text-slate-200 text-lg leading-relaxed whitespace-pre-wrap">${escapeHtml(data.text)}</p>
                </div>

                <hr class="border-slate-100 dark:border-slate-800 mb-4">

                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center gap-2 text-slate-400 dark:text-slate-500 font-bold text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 1 1-7.6-11.7 a8.38 8.38 0 0 1 3.8.9L21 3z"></path>
                        </svg>

                        <span id="comment-count-${data.cardId}">0</span>
                    </div>
                </div>

                <div id="replies-${data.cardId}" class="space-y-4 border-l-2 border-slate-100 dark:border-slate-800 ml-2 pl-4 mb-4"></div>

                <div class="flex items-center bg-slate-50 dark:bg-slate-800 rounded-full border border-slate-200 dark:border-slate-700 px-4 py-1 focus-within:bg-white dark:focus-within:bg-slate-800 transition-all">
                    <input type="text" id="reply-text-${data.cardId}" class="flex-1 bg-transparent border-none outline-none py-2 text-sm text-slate-700 dark:text-slate-200" placeholder="Add a comment..." onkeypress="handleReplyKey(event, '${data.cardId}')" oninput="updateReplyIconState('${data.cardId}')">

                    <button onclick="submitReply('${data.cardId}')" id="reply-btn-${data.cardId}" class="text-slate-300 dark:text-white transition-colors">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"></path>
                        </svg>
                    </button>
                </div>
            `;

            if (isMe && document.getElementById('composerContainer')) {
                container.prepend(card);
            } else {
                isMe ? container.insertBefore(card, container.children[1]) : container.appendChild(card);
            }
        }

        function submitMyAnswer() {
            const input = document.getElementById('myAnswer');
            const text = input.value.trim();

            if (!text) return;

            const payload = {
                type: 'submission',
                userId: myUserId,
                cardId: myUserId + '-' + Date.now(),
                name: myName,
                avatar: myAvatar,
                text: text,
                timestamp: Date.now(),
                channel: CHANNEL_NAME
            };

            fetch('/pusher-chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(payload)
            }).then(() => {
                createCard(payload, true);
                input.value = '';
                updateBtnState('myAnswer', 'submit-btn-main');
                showToast("Answer posted!", "success");
            });
        }

        function handleIncomingSubmission(data) {
            if (data.userId !== myUserId) {
                createCard(data, false);
            }
        }

        function handleReplyKey(event, cardId) {
            if (event.key === 'Enter') {
                submitReply(cardId);
            }
        }

        function updateReplyIconState(cardId) {
            const input = document.getElementById(`reply-text-${cardId}`);
            const btn = document.getElementById(`reply-btn-${cardId}`);

            input.value.trim()
                ? btn.classList.replace('text-slate-300', 'text-indigo-600')
                : btn.classList.replace('text-indigo-600', 'text-slate-300');
        }

        function submitReply(targetCardId) {
            const input = document.getElementById(`reply-text-${targetCardId}`);
            const text = input.value.trim();

            if (!text) return;

            const payload = {
                type: 'reply',
                targetCardId: targetCardId,
                userId: myUserId,
                name: myName,
                avatar: myAvatar,
                text: text,
                timestamp: Date.now(),
                channel: CHANNEL_NAME
            };

            fetch('/pusher-chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(payload)
            }).then(() => {
                input.value = '';
                updateReplyIconState(targetCardId);
                showToast("Comment added!", "success");
            });
        }

        function handleIncomingReply(data) {
            appendReplyToDOM(data.targetCardId, data);
        }

        function appendReplyToDOM(targetCardId, replyData) {
            const card = document.querySelector(`[data-card-id="${targetCardId}"]`);

            if (!card) return;

            const countSpan = card.querySelector(`#comment-count-${targetCardId}`);

            if (countSpan) {
                countSpan.innerText = (parseInt(countSpan.innerText) || 0) + 1;
            }

            const container = card.querySelector(`#replies-${targetCardId}`);
            const div = document.createElement('div');

            div.className = 'flex gap-3 animate-in fade-in slide-in-from-left-2 duration-300';

            div.innerHTML = `
                <img src="${replyData.avatar}" class="w-8 h-8 rounded-full object-cover flex-shrink-0 border border-slate-100 dark:border-slate-700">

                <div class="flex-1">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold text-slate-900 dark:text-slate-100">${escapeHtml(replyData.name)}</span>
                    </div>

                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-snug">${escapeHtml(replyData.text)}</p>
                </div>
            `;

            container.appendChild(div);
        }

        function escapeHtml(t) {
            return t.replace(/[&<>"']/g, m => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            }[m]));
        }

        function showToast(m, t) {
            const c = document.getElementById('toastContainer');
            const e = document.createElement('div');

            e.className = `px-6 py-3 rounded-full text-sm font-bold shadow-2xl bg-slate-900 text-white transition-all transform translate-x-full border-l-4 ${t === 'success' ? 'border-emerald-400' : 'border-indigo-400'}`;

            e.innerHTML = `<span>${m}</span>`;

            c.appendChild(e);

            setTimeout(() => e.classList.remove('translate-x-full'), 10);

            setTimeout(() => {
                e.classList.add('opacity-0', 'translate-y-2');

                setTimeout(() => e.remove(), 300);
            }, 3000);
        }
    </script>
@endsection