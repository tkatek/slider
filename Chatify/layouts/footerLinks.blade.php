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
        const isMobile = () => window.matchMedia('(max-width: 767px)').matches;

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
            backdrop?.classList.remove('hidden');
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
