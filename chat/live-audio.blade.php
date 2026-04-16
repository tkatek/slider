@extends("slider.simple-layout")
@section("style")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <style>
        #mainTitle, #mainSubtitle { opacity: 0; }
        textarea::-webkit-scrollbar { width: 0px; background: transparent; }

        /* Voice note UI */
        .record-pulse {
            box-shadow: 0 0 0 0 rgba(239,68,68,.35);
            animation: pulse 1.2s infinite;
        }
        @keyframes pulse {
            0%   { box-shadow: 0 0 0 0 rgba(239,68,68,.35); }
            70%  { box-shadow: 0 0 0 14px rgba(239,68,68,0); }
            100% { box-shadow: 0 0 0 0 rgba(239,68,68,0); }
        }
    </style>
@endsection

@section("content")
    @include('slider.components.title-subtitle')

    <main class="max-w-[1600px] mx-auto px-4 md:px-8 pb-12">
        <div id="cardsContainer" class="flex flex-wrap justify-center gap-6 items-start"></div>
    </main>

    <div id="toastContainer" class="fixed bottom-8 right-8 flex flex-col gap-3 z-[2000]"></div>
@endsection

@section('script')
    <script>
        const PUSHER_APP_KEY     = @json($content['pusher']['key']);
        const PUSHER_APP_CLUSTER = @json($content['pusher']['cluster']);
        const CHANNEL_NAME       = @json($content['pusher']['channel']);
        const EVENT_NAME         = 'submission';
        const EVENT_REPLY        = 'reply';
        const isTeacher          = @json($content['user']['role_id'] != 4);

        const myUserId   = @json($content['user']['id']);
        const myName     = @json($content['user']['name'] . ' ' . $content['user']['last_name']);
        const myAvatar   = @json($content['user_avatar']);
        // ----------------------------
        // Browser storage for voice notes (IndexedDB) ✅ ADDED
        // ----------------------------
        const VN_DB_NAME = 'slide_voice_notes_db';
        const VN_STORE   = 'notes';

        function vnOpenDB() {
            return new Promise((resolve, reject) => {
                const req = indexedDB.open(VN_DB_NAME, 1);
                req.onupgradeneeded = () => {
                    const db = req.result;
                    if (!db.objectStoreNames.contains(VN_STORE)) {
                        db.createObjectStore(VN_STORE, { keyPath: 'key' });
                    }
                };
                req.onsuccess = () => resolve(req.result);
                req.onerror = () => reject(req.error);
            });
        }

        async function vnSave(key, blob, mime) {
            const db = await vnOpenDB();
            return new Promise((resolve, reject) => {
                const tx = db.transaction(VN_STORE, 'readwrite');
                tx.objectStore(VN_STORE).put({ key, blob, mime, createdAt: Date.now() });
                tx.oncomplete = () => resolve(true);
                tx.onerror = () => reject(tx.error);
            });
        }

        async function vnGet(key) {
            const db = await vnOpenDB();
            return new Promise((resolve, reject) => {
                const tx = db.transaction(VN_STORE, 'readonly');
                const req = tx.objectStore(VN_STORE).get(key);
                req.onsuccess = () => resolve(req.result || null);
                req.onerror = () => reject(req.error);
            });
        }

        // ----------------------------
        // Voice note state ✅ ADDED
        // ----------------------------
        let vnRecorder   = null;
        let vnStream     = null;
        let vnChunks     = [];
        let vnTimer      = null;
        let vnStartAt    = 0;

        // current (unsent) recording
        let vnBlob       = null;
        let vnObjectUrl  = null; // preview only
        let vnMime       = null;

        window.addEventListener('DOMContentLoaded', () => {
            initPusher();
            renderInitialGrid();

            gsap.to("#mainTitle", { y: 0, opacity: 1, duration: 1, ease: "power4.out", delay: 0.2 });
            gsap.to("#mainSubtitle", { y: 0, opacity: 1, duration: 1, ease: "power4.out", delay: 0.4 });
        });

        function initPusher() {
            const pusher  = new Pusher(PUSHER_APP_KEY, { cluster: PUSHER_APP_CLUSTER, forceTLS: true });
            const channel = pusher.subscribe(CHANNEL_NAME);
            channel.bind(EVENT_NAME, handleIncomingSubmission);
            channel.bind(EVENT_REPLY, handleIncomingReply);
        }

        function renderInitialGrid() {
            const container = document.getElementById('cardsContainer');
            container.innerHTML = '';
            createInputCard();
        }

        function micIconSVG() {
            return `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 14a3 3 0 0 0 3-3V6a3 3 0 0 0-6 0v5a3 3 0 0 0 3 3z"></path>
                <path d="M19 11a7 7 0 0 1-14 0"></path>
                <path d="M12 19v3"></path>
                <path d="M8 22h8"></path>
            </svg>
        `;
        }
        function stopIconSVG() {
            return `
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                <rect x="7" y="7" width="10" height="10" rx="2"></rect>
            </svg>
        `;
        }

        function createInputCard() {
            const container = document.getElementById('cardsContainer');
            const card = document.createElement('div');
            card.className = 'w-full max-w-[380px] bg-white dark:bg-slate-900 rounded-[2rem] p-6 border border-slate-200 dark:border-slate-700 shadow-sm transition-all hover:shadow-md';

            card.innerHTML = `
            <div class="flex items-center gap-4 mb-4">
                <img src="${myAvatar}" class="w-12 h-12 rounded-full border-2 border-white shadow-sm object-cover">
                <div>
                    <h3 class="font-bold text-slate-900 leading-none">You</h3>
                    <span class="text-[0.7rem] font-bold text-slate-400 uppercase tracking-wider">${isTeacher ? 'Teacher' : 'Student'}</span>
                </div>
            </div>

            <div class="space-y-4">
                <!-- Voice note box ✅ ADDED -->
                <div class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 p-4">
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <button id="vn-rec-btn"
                                class="w-11 h-11 rounded-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 flex items-center justify-center hover:shadow transition text-slate-700 dark:text-slate-100"
                                onclick="toggleVoiceNote()"
                                title="Record voice note">
                                <span id="vn-rec-icon">${micIconSVG()}</span>
                            </button>

                            <div class="leading-tight">
                                <div class="text-sm font-extrabold text-slate-900 dark:text-slate-100">Voice note</div>
                                <div class="text-xs font-bold text-slate-400 dark:text-slate-500">
                                    <span id="vn-status">Not recording</span>
                                    <span class="mx-2">•</span>
                                    <span id="vn-time">00:00</span>
                                </div>
                            </div>
                        </div>

                        <button id="vn-remove"
                            class="hidden text-xs font-extrabold text-rose-600 hover:text-rose-700"
                            onclick="removeVoiceNote()">
                            Remove
                        </button>
                    </div>

                    <div id="vn-preview-wrap" class="hidden mt-3">
                        <audio id="vn-preview" controls class="w-full"></audio>
                    </div>
                </div>

                <button id="submit-btn-main" onclick="submitMyAnswer()" class="w-full py-3 rounded-full font-bold text-white bg-slate-300 transition-all cursor-not-allowed">
                    Submit Answer
                </button>
            </div>
        `;

            container.prepend(card);

            hardResetVoiceNote();
            updateBtnState('submit-btn-main');
        }

        function updateBtnState(btnId) {
            const btn = document.getElementById(btnId);
            const canSubmit = btnId === 'submit-btn-main' && !!vnBlob;

            if (canSubmit) {
                btn.classList.remove('bg-slate-300', 'cursor-not-allowed');
                btn.classList.add('bg-indigo-600', 'hover:bg-indigo-600', 'shadow-lg', 'cursor-pointer');
            } else {
                btn.classList.add('bg-slate-300', 'cursor-not-allowed');
                btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-600', 'shadow-lg', 'cursor-pointer');
            }
        }

        // ----------------------------
        // Voice note controls ✅ ADDED
        // ----------------------------
        async function toggleVoiceNote() {
            if (vnRecorder && vnRecorder.state === 'recording') stopVoiceNote();
            else startVoiceNote();
        }

        async function startVoiceNote() {
            try {
                // overwrite previous recording if any
                removeVoiceNote(true);

                if (!navigator.mediaDevices || !window.MediaRecorder) {
                    showToast("Voice recording isn't supported in this browser.", "info");
                    return;
                }

                vnStream = await navigator.mediaDevices.getUserMedia({ audio: true });
                vnChunks = [];

                const preferred = [
                    'audio/webm;codecs=opus',
                    'audio/webm',
                    'audio/ogg;codecs=opus',
                    'audio/ogg'
                ];
                const mimeType = preferred.find(t => MediaRecorder.isTypeSupported(t)) || '';
                vnRecorder = new MediaRecorder(vnStream, mimeType ? { mimeType } : undefined);

                vnRecorder.ondataavailable = e => { if (e.data && e.data.size) vnChunks.push(e.data); };

                vnRecorder.onstop = () => {
                    const blob = new Blob(vnChunks, { type: vnRecorder.mimeType || 'audio/webm' });
                    vnBlob = blob;
                    vnMime = blob.type || vnRecorder.mimeType || 'audio/webm';

                    // preview URL only
                    vnObjectUrl = URL.createObjectURL(blob);

                    const wrap = document.getElementById('vn-preview-wrap');
                    const preview = document.getElementById('vn-preview');
                    const removeBtn = document.getElementById('vn-remove');

                    preview.src = vnObjectUrl;
                    wrap.classList.remove('hidden');
                    removeBtn.classList.remove('hidden');

                    setVoiceUI(false, true);
                    cleanupVoiceStream();
                    updateBtnState('submit-btn-main');
                };

                vnRecorder.start();
                vnStartAt = Date.now();
                startVoiceTimer();
                setVoiceUI(true, false);

            } catch (e) {
                cleanupVoiceStream();
                showToast("Microphone permission denied (or unavailable).", "info");
            }
        }

        function stopVoiceNote() {
            try {
                if (vnRecorder && vnRecorder.state === 'recording') vnRecorder.stop();
            } catch (e) {}
            stopVoiceTimer();
            setVoiceUI(false, false);
        }

        function setVoiceUI(isRecording, hasRecorded) {
            const status = document.getElementById('vn-status');
            const btn = document.getElementById('vn-rec-btn');
            const iconWrap = document.getElementById('vn-rec-icon');

            if (isRecording) {
                status.textContent = 'Recording...';
                iconWrap.innerHTML = stopIconSVG();
                btn.classList.add('record-pulse', 'border-rose-200');
                btn.classList.remove('text-slate-700');
                btn.classList.add('text-rose-600');
            } else {
                status.textContent = hasRecorded ? 'Recorded' : 'Not recording';
                iconWrap.innerHTML = micIconSVG();
                btn.classList.remove('record-pulse', 'border-rose-200');
                btn.classList.remove('text-rose-600');
                btn.classList.add('text-slate-700');
            }
        }

        function startVoiceTimer() {
            const t = document.getElementById('vn-time');
            t.textContent = '00:00';
            vnTimer = setInterval(() => {
                const sec = Math.floor((Date.now() - vnStartAt) / 1000);
                const mm = String(Math.floor(sec / 60)).padStart(2, '0');
                const ss = String(sec % 60).padStart(2, '0');
                t.textContent = `${mm}:${ss}`;
            }, 250);
        }

        function stopVoiceTimer() {
            if (vnTimer) clearInterval(vnTimer);
            vnTimer = null;
        }

        function cleanupVoiceStream() {
            if (vnStream) {
                vnStream.getTracks().forEach(t => t.stop());
                vnStream = null;
            }
        }

        function removeVoiceNote(silent = false) {
            stopVoiceTimer();
            cleanupVoiceStream();

            // revoke preview only (stored audio stays in IndexedDB)
            if (vnObjectUrl) URL.revokeObjectURL(vnObjectUrl);

            vnBlob = null;
            vnObjectUrl = null;
            vnMime = null;

            const wrap = document.getElementById('vn-preview-wrap');
            const preview = document.getElementById('vn-preview');
            const removeBtn = document.getElementById('vn-remove');
            const time = document.getElementById('vn-time');

            if (preview) preview.src = '';
            if (wrap) wrap.classList.add('hidden');
            if (removeBtn) removeBtn.classList.add('hidden');
            if (time) time.textContent = '00:00';

            setVoiceUI(false, false);
            updateBtnState('submit-btn-main');
            if (!silent) showToast("Voice note removed.", "info");
        }

        function hardResetVoiceNote() {
            try { if (vnRecorder && vnRecorder.state === 'recording') vnRecorder.stop(); } catch(e) {}
            stopVoiceTimer();
            cleanupVoiceStream();
            if (vnObjectUrl) URL.revokeObjectURL(vnObjectUrl);

            vnRecorder = null;
            vnChunks = [];
            vnBlob = null;
            vnObjectUrl = null;
            vnMime = null;
        }

        function stopAllAudiosExcept(active) {
            document.querySelectorAll('audio').forEach(a => {
                if (a !== active) a.pause();
            });
        }

        function createCard(data, isMe) {
            const container = document.getElementById('cardsContainer');
            const existingCard = container.querySelector(`[data-card-id="${data.cardId}"]`);

            if (existingCard) {
                const existingAudio = existingCard.querySelector('audio.card-audio');

                if (existingAudio && data.audio_url && !existingAudio.getAttribute('src')) {
                    existingAudio.src = data.audio_url;
                }

                return existingCard;
            }

            const card = document.createElement('div');
            card.className = 'w-full max-w-[380px] bg-white dark:bg-slate-900 rounded-[2rem] p-6 border border-slate-200 dark:border-slate-700 shadow-sm transition-all hover:shadow-xl';
            card.setAttribute('data-card-id', data.cardId);

            const timeString = new Date(data.timestamp).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

            // ✅ audio can be from server (audio_url) OR local storage (audio_key)
            const audioBlock = (data.audio_url || data.audio_key) ? `
            <div class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 p-3 mt-4">
                <div class="text-xs font-extrabold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">Voice note</div>
                <audio
                    controls
                    class="w-full card-audio"
                    ${data.audio_url ? `src="${escapeAttr(data.audio_url)}"` : ''}
                    ${data.audio_key ? `data-audio-key="${escapeAttr(data.audio_key)}"` : ''}></audio>
            </div>
        ` : '';

            card.innerHTML = `
            <div class="flex items-center gap-4 mb-4">
                <img src="${data.avatar}" class="w-12 h-12 rounded-full border-2 border-white shadow-sm object-cover">
                <div>
                    <h3 class="font-bold text-slate-900 dark:text-slate-100 leading-none">${isMe ? 'You' : escapeHtml(data.name)}</h3>
                    <span class="text-[0.7rem] font-bold text-slate-400 uppercase tracking-wider">${timeString}</span>
                </div>
            </div>

            <div class="mb-6">
                <p class="text-slate-700 dark:text-slate-200 text-lg leading-relaxed whitespace-pre-wrap">${escapeHtml(data.text || '')}</p>
                ${audioBlock}
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
                <input type="text" id="reply-text-${data.cardId}" class="flex-1 bg-transparent border-none outline-none py-2 text-sm text-slate-700 dark:text-slate-200"
                    placeholder="Add a comment..." onkeypress="handleReplyKey(event, '${data.cardId}')" oninput="updateReplyIconState('${data.cardId}')">
                <button onclick="submitReply('${data.cardId}')" id="reply-btn-${data.cardId}" class="text-slate-300 dark:text-white transition-colors">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"></path>
                    </svg>
                </button>
            </div>
        `;

            // Insert your own cards right after the input card, others at the end
            isMe ? container.insertBefore(card, container.children[1]) : container.appendChild(card);

            // Pause other audios when one plays
            card.querySelectorAll('audio').forEach(a => {
                a.addEventListener('play', () => stopAllAudiosExcept(a));
            });

            // ✅ Hydrate locally-stored audio from IndexedDB (so it keeps working after submit/reset)
            const localAudioEl = card.querySelector('audio[data-audio-key]');
            if (localAudioEl && !localAudioEl.src) {
                const key = localAudioEl.getAttribute('data-audio-key');
                vnGet(key).then(row => {
                    if (!row?.blob) return;
                    const url = URL.createObjectURL(row.blob);
                    localAudioEl.src = url;
                    localAudioEl.addEventListener('play', () => stopAllAudiosExcept(localAudioEl));
                }).catch(() => {});
            }
        }

        // ✅ async so we can store audio in IndexedDB before resetting state
        async function submitMyAnswer() {
            const text = '';
            const hasAudio = !!vnBlob;

            if (!hasAudio) return;

            const timestamp = Date.now();
            const cardId = `${myUserId}-${timestamp}`;

            // ✅ If NO audio: keep ORIGINAL JSON behavior (unchanged)
            if (!hasAudio) {
                const payload = {
                    type: 'submission',
                    userId: myUserId,
                    cardId: cardId,
                    name: myName,
                    avatar: myAvatar,
                    text: text,
                    timestamp: timestamp,
                    channel: CHANNEL_NAME
                };

                fetch('/pusher-chat', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                    body: JSON.stringify(payload)
                }).then(() => {
                    createCard(payload, true);
                    updateBtnState('submit-btn-main');
                    showToast("Answer posted!", "success");
                });

                return;
            }

            // ✅ Audio exists: store in browser (IndexedDB) AND upload
            const localKey = cardId;

            try {
                await vnSave(localKey, vnBlob, vnMime);
            } catch (e) {
                // If storage fails (quota/blocked), continue uploading anyway
            }

            const fd = new FormData();
            fd.append('type', 'submission');
            fd.append('userId', myUserId);
            fd.append('cardId', cardId);
            fd.append('name', myName);
            fd.append('avatar', myAvatar);
            fd.append('text', text);
            fd.append('timestamp', String(timestamp));
            fd.append('channel', CHANNEL_NAME);

            const ext = (vnMime || '').includes('ogg') ? 'ogg' : 'webm';
            fd.append('audio', vnBlob, `voice-note-${cardId}.${ext}`);

            fetch('/pusher-chat', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                body: fd
            }).then(async (res) => {
                // backend SHOULD return { audio_url: "..." } to share with other users
                let audioUrl = null;
                try {
                    const j = await res.json();
                    audioUrl = j?.audio_url || null;
                } catch(e) {
                    audioUrl = null;
                }

                // Show locally immediately; localKey ensures playback even after reset
                const payload = {
                    type: 'submission',
                    userId: myUserId,
                    cardId: cardId,
                    name: myName,
                    avatar: myAvatar,
                    text: text,
                    timestamp: timestamp,
                    channel: CHANNEL_NAME,
                    audio_url: audioUrl,
                    audio_key: localKey
                };

                createCard(payload, true);

                // ✅ allow sending another audio right away
                removeVoiceNote(true);
                updateBtnState('submit-btn-main');
                showToast("Answer posted!", "success");
            });
        }

        function handleIncomingSubmission(data) {
            createCard(data, String(data.userId) === String(myUserId));
        }

        function handleReplyKey(event, cardId) {
            if (event.key === 'Enter') submitReply(cardId);
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
            return (t || '').replace(/[&<>"']/g, m => ({
                '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'
            }[m]));
        }
        function escapeAttr(t) {
            return (t || '').replace(/"/g, '&quot;');
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
