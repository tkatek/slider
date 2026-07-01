{{--
This form has been inlined into Chatify/pages/app.blade.php.
Kept here as a rollback reference only.

<footer class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data" aria-label="Send a message">
        @csrf

        <label class="attachment-button" aria-label="Add attachment" tabindex="0">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"></path>
            </svg>
            <input disabled="disabled" type="file" class="upload-attachment" name="file" accept=".{{ implode(', .', config('chatify.attachments.allowed_images')) }}, .{{ implode(', .', config('chatify.attachments.allowed_files')) }}" />
        </label>

        <div class="composer-input">
            <textarea readonly="readonly" name="message" rows="1" class="m-send app-scroll" placeholder="Type a message..." aria-label="Message text"></textarea>

            <button type="button" class="emoji-button" aria-label="Emoji">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" stroke="currentColor" stroke-width="2.1"></path>
                    <path d="M8.5 9.5h.01M15.5 9.5h.01M8.5 14c.8 1.4 2 2.1 3.5 2.1s2.7-.7 3.5-2.1" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"></path>
                </svg>
            </button>

            <button type="submit" disabled="disabled" class="send-button d-none" aria-label="Send message">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M5 12 3.5 5.5 21 12 3.5 18.5 5 12Zm0 0h8" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>

            @include("Chatify.layouts.recordInclude")
        </div>
    </form>
</footer>
--}}
