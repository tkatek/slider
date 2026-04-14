@extends("slider.simple-layout")



@section("style")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <style>
        #mainTitle, #mainSubtitle { opacity: 0; }
        /* Hide scrollbar for cleaner look but allow scrolling */
        textarea::-webkit-scrollbar { width: 0px; background: transparent; }
    </style>
@endsection

@section("content")
    <div class="min-h-[100dvh] flex flex-col items-center justify-center">
        @include('slider.components.title-subtitle')

        <main class="w-full max-w-[1600px] mx-auto px-4 md:px-8 py-12">
            <div id="cardsContainer" class="flex flex-wrap justify-center gap-6 items-start">
            </div>
        </main>
    </div>

    <div id="toastContainer" class="fixed bottom-8 right-8 flex flex-col gap-3 z-[2000]"></div>
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

        window.addEventListener('DOMContentLoaded', () => {
            initPusher();
            renderInitialGrid();

            // GSAP Entrance
            gsap.to("#mainTitle", { y: 0, opacity: 1, duration: 1, ease: "power4.out", delay: 0.2 });
            gsap.to("#mainSubtitle", { y: 0, opacity: 1, duration: 1, ease: "power4.out", delay: 0.4 });
        });

        function initPusher() {
            const pusher = new Pusher(PUSHER_APP_KEY, { cluster: PUSHER_APP_CLUSTER, forceTLS: true });
            const channel = pusher.subscribe(CHANNEL_NAME);
            channel.bind(EVENT_NAME, handleIncomingSubmission);
            channel.bind(EVENT_REPLY, handleIncomingReply);
        }

        function renderInitialGrid() {
            const container = document.getElementById('cardsContainer');
            container.innerHTML = '';
            createInputCard();
        }

        function createInputCard() {
            const container = document.getElementById('cardsContainer');
            const card = document.createElement('div');
            card.className = 'w-full max-w-[380px] bg-white dark:bg-slate-900 rounded-[2rem] p-6 border border-slate-200 dark:border-slate-700 shadow-sm transition-all hover:shadow-md';
            card.innerHTML = `
                <div class="flex items-center gap-4 mb-4">
                    <img src="${myAvatar}" class="w-12 h-12 rounded-full border-2 border-white shadow-sm object-cover">
                    <div>
                        <h3 class="font-bold text-slate-900 dark:text-slate-100 leading-none">You</h3>
                        <span class="text-[0.7rem] font-bold text-slate-400 uppercase tracking-wider">${isTeacher ? 'Teacher' : 'Student'}</span>
                    </div>
                </div>
                <div class="space-y-4">
                    <textarea id="myAnswer"
                        class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl p-4 text-slate-800 dark:text-slate-100 focus:bg-white dark:focus:bg-slate-800 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all resize-none min-h-[140px]"
                        placeholder="${customPlaceholder}"
                        oninput="updateBtnState('myAnswer', 'submit-btn-main')"></textarea>
                    <button id="submit-btn-main" onclick="submitMyAnswer()" class="w-full py-3 rounded-full font-bold text-white bg-slate-300 transition-all cursor-not-allowed">
                        Submit Answer
                    </button>
                </div>
            `;
            container.prepend(card);
        }

        function updateBtnState(inputId, btnId) {
            const val = document.getElementById(inputId).value.trim();
            const btn = document.getElementById(btnId);
            if (val.length > 0) {
                btn.classList.remove('bg-slate-300', 'cursor-not-allowed');
                btn.classList.add('bg-indigo-600', 'hover:bg-indigo-700', 'shadow-lg', 'cursor-pointer');
            } else {
                btn.classList.add('bg-slate-300', 'cursor-not-allowed');
                btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700', 'shadow-lg', 'cursor-pointer');
            }
        }

        function createCard(data, isMe) {
            const container = document.getElementById('cardsContainer');
            const card = document.createElement('div');
            card.className = 'w-full max-w-[380px] bg-white dark:bg-slate-900 rounded-[2rem] p-6 border border-slate-200 dark:border-slate-700 shadow-sm transition-all hover:shadow-xl';
            card.setAttribute('data-card-id', data.cardId);
            const timeString = new Date(data.timestamp).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

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
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 1 1-7.6-11.7 a8.38 8.38 0 0 1 3.8.9L21 3z"></path></svg>
                        <span id="comment-count-${data.cardId}">0</span>
                    </div>
                </div>
                <div id="replies-${data.cardId}" class="space-y-4 border-l-2 border-slate-100 dark:border-slate-800 ml-2 pl-4 mb-4"></div>
                <div class="flex items-center bg-slate-50 dark:bg-slate-800 rounded-full border border-slate-200 dark:border-slate-700 px-4 py-1 focus-within:bg-white dark:focus-within:bg-slate-800 transition-all">
                    <input type="text" id="reply-text-${data.cardId}" class="flex-1 bg-transparent border-none outline-none py-2 text-sm text-slate-700 dark:text-slate-200" placeholder="Add a comment..." onkeypress="handleReplyKey(event, '${data.cardId}')" oninput="updateReplyIconState('${data.cardId}')">
                    <button onclick="submitReply('${data.cardId}')" id="reply-btn-${data.cardId}" class="text-slate-300 dark:text-white transition-colors">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"></path></svg>
                    </button>
                </div>
            `;
            // Insert your own cards right after the input card, others at the end 
            isMe ? container.insertBefore(card, container.children[1]) : container.appendChild(card);
        }

        function submitMyAnswer() {
            const input = document.getElementById('myAnswer');
            const text = input.value.trim();
            if (!text) return;

            const payload = {
                type: 'submission', // Distinguish payload type
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
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                body: JSON.stringify(payload)
            }).then(() => {
                createCard(payload, true);
                input.value = '';
                updateBtnState('myAnswer', 'submit-btn-main');
                showToast("Answer posted!", "success");
            });
        }

        function handleIncomingSubmission(data) {
            if (data.userId !== myUserId) createCard(data, false);
        }

        function handleReplyKey(event, cardId) {
            if (event.key === 'Enter') submitReply(cardId);
        }

        function updateReplyIconState(cardId) {
            const input = document.getElementById(`reply-text-${cardId}`);
            const btn = document.getElementById(`reply-btn-${cardId}`);
            input.value.trim() ? btn.classList.replace('text-slate-300', 'text-indigo-600') : btn.classList.replace('text-indigo-600', 'text-slate-300');
        }

        function submitReply(targetCardId) {
            const input = document.getElementById(`reply-text-${targetCardId}`);
            const text = input.value.trim();

            if (!text) return;

            const payload = {
                type: 'reply', // New type
                targetCardId: targetCardId, // Who are we replying to?
                userId: myUserId, // Who am I?
                name: myName,
                avatar: myAvatar,
                text: text,
                timestamp: Date.now(),
                channel: CHANNEL_NAME
            };

            fetch('/pusher-chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
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
            if (countSpan) countSpan.innerText = (parseInt(countSpan.innerText) || 0) + 1;
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
                </div>`;
            container.appendChild(div);
        }

        function escapeHtml(t) {
            return t.replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[m]));
        }

        function showToast(m, t) {
            const c = document.getElementById('toastContainer');
            const e = document.createElement('div');
            e.className = `px-6 py-3 rounded-full text-sm font-bold shadow-2xl bg-slate-900 text-white transition-all transform translate-x-full border-l-4 ${t === 'success' ? 'border-emerald-400' : 'border-indigo-400'}`;
            e.innerHTML = `<span>${m}</span>`;
            c.appendChild(e);
            setTimeout(() => e.classList.remove('translate-x-full'), 10);
            setTimeout(() => { e.classList.add('opacity-0', 'translate-y-2'); setTimeout(() => e.remove(), 300); }, 3000);
        }
    </script>
@endsection
