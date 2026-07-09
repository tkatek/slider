@php
    $rawChatLocale = strtolower((string) (
        session('locale')
        ?? session('lang')
        ?? (auth()->check() ? (auth()->user()->locale ?? auth()->user()->language ?? auth()->user()->lang ?? null) : null)
        ?? app()->getLocale()
        ?? 'en'
    ));

    $chatLocaleMap = [
        'english' => 'en',
        'eng' => 'en',
        'en' => 'en',
        'en_us' => 'en',
        'en-us' => 'en',
        'arabic' => 'ar',
        'العربية' => 'ar',
        'ar' => 'ar',
        'french' => 'fr',
        'francais' => 'fr',
        'français' => 'fr',
        'fr' => 'fr',
    ];

    $chatLocale = $chatLocaleMap[$rawChatLocale] ?? \Illuminate\Support\Str::before(str_replace('_', '-', $rawChatLocale), '-');
    if (!empty($chatLocale)) {
        app()->setLocale($chatLocale);
    }

    $t = function (string $key, string $fallback) {
        $value = __($key);
        return $value === $key ? $fallback : $value;
    };
@endphp

<div class="messenger-sendCard !border-t !border-slate-900/5 !bg-[#FAFAFF]/95 !px-4 !py-3 !shadow-none dark:!border-white/10 dark:!bg-[#070B16]/95" aria-disabled="true">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data" class="!mx-auto !flex !w-full !max-w-[760px] !flex-col !items-stretch !gap-2">
        @csrf

        <div class="composer-row !flex !w-full !min-w-0 !items-end !gap-3">
            <label class="!m-0 !inline-flex !h-10 !w-10 !shrink-0 !cursor-pointer !items-center !justify-center !rounded-full !border-0 !bg-gradient-to-br !from-[#6D4CFF] !to-[#4F35D8] !p-0 !text-white !shadow-[0_8px_18px_rgba(91,63,234,0.22)] !transition active:!scale-95" aria-label="{{ $t('chatify.AddAttachment', 'Add attachment') }}">
                <span class="fas fa-plus !text-base"></span>
                <input disabled="disabled" type="file" class="upload-attachment !hidden" name="file" accept=".{{ implode(', .', config('chatify.attachments.allowed_images')) }}, .{{ implode(', .', config('chatify.attachments.allowed_files')) }}" />
            </label>
            <div class="composer-input !flex !min-w-0 !flex-1 !items-center !gap-2 !rounded-full !border !border-slate-900/5 !bg-white !px-4 !py-1 !shadow-[0_8px_28px_rgba(15,23,42,0.035)] dark:!border-white/10 dark:!bg-slate-900">
                <textarea readonly="readonly" name="message" class="m-send app-scroll !min-h-0 !min-w-0 !flex-1 !resize-none !border-0 !bg-transparent !px-0 !py-2 !text-[16px] md:!text-[15px] !font-medium !leading-6 !text-slate-900 !shadow-none !outline-none placeholder:!text-slate-400 dark:!text-slate-100 dark:placeholder:!text-slate-500" placeholder="Type a message..."></textarea>
                <button type="button" class="emoji-button !inline-flex !h-8 !w-8 !shrink-0 !items-center !justify-center !rounded-full !border-0 !bg-transparent !p-0 !text-[#5B3FEA] !shadow-none !outline-none !transition active:!scale-95 dark:!text-violet-300" aria-label="{{ $t('chatify.Emoji', 'Emoji') }}">
                    <span class="fas fa-smile !text-xl"></span>
                </button>
                <button disabled="disabled" class="send-button d-none !h-8 !w-8 !shrink-0 !items-center !justify-center !rounded-full !border-0 !bg-[#5B3FEA] !p-0 !text-white !shadow-none" aria-label="{{ $t('chatify.SendMessage', 'Send message') }}">
                    <span class="fas fa-paper-plane !text-sm"></span>
                </button>
                @include("Chatify.layouts.recordInclude")
            </div>
        </div>
    </form>
</div>
