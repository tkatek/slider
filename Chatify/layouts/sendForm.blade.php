@once
    <script>
        (function () {
            window.tailwind = window.tailwind || {};
            window.tailwind.config = window.tailwind.config || {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Manrope', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'sans-serif'],
                        },
                    },
                },
            };

            if (!document.querySelector('script[src="https://cdn.tailwindcss.com"]')) {
                var tailwindScript = document.createElement('script');
                tailwindScript.src = 'https://cdn.tailwindcss.com';
                document.head.appendChild(tailwindScript);
            }
        })();
    </script>
@endonce

<footer class="messenger-sendCard shrink-0 border-t border-slate-900/5 bg-[#FAFAFF]/95 px-4 py-3 backdrop-blur transition-colors duration-300 sm:px-6 md:px-6 xl:px-8">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data" class="mx-auto flex w-full max-w-[740px] items-center gap-3" aria-label="Send a message">
        @csrf

        <label class="flex h-12 w-12 shrink-0 cursor-pointer items-center justify-center rounded-full bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-white shadow-[0_12px_24px_rgba(91,63,234,0.25)] transition active:scale-95" aria-label="Add attachment" tabindex="0">
            <svg viewBox="0 0 24 24" fill="none" class="h-7 w-7" aria-hidden="true">
                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"></path>
            </svg>
            <input disabled="disabled" type="file" class="upload-attachment sr-only" name="file" style="display: none;" accept=".{{ implode(', .', config('chatify.attachments.allowed_images')) }}, .{{ implode(', .', config('chatify.attachments.allowed_files')) }}" />
        </label>

        <div class="flex h-12 min-w-0 flex-1 items-center gap-3 rounded-full border border-slate-900/5 bg-white px-5 shadow-[0_10px_34px_rgba(15,23,42,0.045)] transition-colors duration-300">
            <textarea readonly="readonly" name="message" rows="1" class="m-send app-scroll h-full min-h-0 min-w-0 flex-1 resize-none bg-transparent py-3 text-base font-medium leading-6 text-slate-900 outline-none placeholder:text-slate-400 md:text-sm xl:text-base" placeholder="Type a message..." aria-label="Message text"></textarea>

            <button type="button" class="emoji-button inline-flex shrink-0 items-center justify-center text-[#5B3FEA] transition active:scale-95" aria-label="Emoji">
                <svg viewBox="0 0 24 24" fill="none" class="h-7 w-7 md:h-6 md:w-6 xl:h-7 xl:w-7" aria-hidden="true">
                    <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" stroke="currentColor" stroke-width="2.1"></path>
                    <path d="M8.5 9.5h.01M15.5 9.5h.01M8.5 14c.8 1.4 2 2.1 3.5 2.1s2.7-.7 3.5-2.1" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"></path>
                </svg>
            </button>

            <button type="submit" disabled="disabled" class="send-button d-none inline-flex shrink-0 items-center justify-center text-[#5B3FEA] transition active:scale-95" aria-label="Send message">
                <svg viewBox="0 0 24 24" fill="none" class="h-7 w-7 md:h-6 md:w-6 xl:h-7 xl:w-7" aria-hidden="true">
                    <path d="M5 12 3.5 5.5 21 12 3.5 18.5 5 12Zm0 0h8" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>

            @include("Chatify.layouts.recordInclude")
        </div>
    </form>
</footer>
