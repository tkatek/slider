<?php
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

$sentMessageLabel = $t('chatify.SentMessage', 'Sent message');
$receivedMessageLabel = $t('chatify.ReceivedMessage', 'Received message');
$deleteMessageLabel = $t('chatify.DeleteMessage', 'Delete message');
$playAudioLabel = $t('chatify.PlayAudio', 'Play audio');
$audioProgressLabel = $t('chatify.AudioProgress', 'Audio progress');
$audioLabel = $t('chatify.Audio', 'Audio');
$attachmentLabel = $t('chatify.Attachment', 'Attachment');

$seenIcon = (!!$seen ? 'check-double' : 'check');
$displayTimeAgo = $timeAgo;
try {
    $displayTimeAgo = \Carbon\Carbon::parse($created_at)->locale(app()->getLocale())->diffForHumans();
} catch (\Throwable $e) {
    $displayTimeAgo = $timeAgo;
}
$timeAndSeen = "<span data-time='".e($created_at)."' class='message-time float-none mt-2 flex items-center justify-end gap-1 text-xs font-normal text-slate-500 dark:text-slate-400'>
        ".($isSender ? "<span class='fas fa-$seenIcon seen text-[#5B3FEA] dark:text-violet-300'></span>" : '' )." <span class='time'>".e($displayTimeAgo)."</span>
    </span>";
$role_id = $role_id ?? auth()->user()->role_id;
$canDelete = ($isSender && (!$seen || in_array($role_id, [1, 2]))) || (!$isSender && in_array($role_id, [1, 2]));
$deleteAction = $canDelete
    ? '<div class="actions pointer-events-none hidden h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white text-red-500 opacity-0 ring-1 ring-slate-900/5 transition hover:bg-red-50 group-hover:flex group-hover:pointer-events-auto group-hover:opacity-100 group-focus:flex group-focus:pointer-events-auto group-focus:opacity-100 group-focus-within:flex group-focus-within:pointer-events-auto group-focus-within:opacity-100 group-active:flex group-active:pointer-events-auto group-active:opacity-100 dark:bg-slate-900 dark:text-red-400 dark:ring-white/10 dark:hover:bg-red-500/10">
            <button type="button" class="delete-btn flex h-full w-full shrink-0 items-center justify-center rounded-full outline-none" data-id="'.e($id).'" aria-label="'.e($deleteMessageLabel).'">
                <i class="fas fa-trash pointer-events-none text-sm"></i>
            </button> 
        </div>'
    : '';
$attachmentName = $attachment ? ($attachment->name ?? $attachment->file_name ?? $attachmentLabel) : $attachmentLabel;
$attachmentFileName = $attachment ? ($attachment->file_name ?? $attachmentName) : '';
$attachmentExtension = $attachment ? (string) \Illuminate\Support\Str::of($attachmentFileName)->afterLast('.') : '';
$attachmentExtensionClass = \Illuminate\Support\Str::slug($attachmentExtension ?: 'file');
$attachmentMimeType = $attachment ? (string) ($attachment->mime_type ?? '') : '';
$imageExtensions = collect(config('chatify.attachments.allowed_images', []))
    ->map(fn ($extension) => strtolower(ltrim((string) $extension, '.')))
    ->filter()
    ->all();
$isImageAttachment = $attachment && (
    \Illuminate\Support\Str::of($attachmentMimeType)->contains('image/')
    || in_array(strtolower($attachmentExtension), $imageExtensions, true)
);
$messageText = trim((string) $message);
$isImageOnlyMessage = $isImageAttachment && $messageText === '' && !$audio;
$bubbleClass = $isImageOnlyMessage
    ? 'bg-transparent text-left text-slate-950 dark:text-slate-100'
    : ($isSender
        ? 'rounded-[1.45rem] rounded-br-lg bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-left text-white'
        : 'rounded-[1.45rem] rounded-bl-lg border border-slate-900/5 bg-white text-left text-slate-950 dark:border-white/10 dark:bg-slate-900 dark:text-slate-100');
$bubblePaddingClass = $isImageOnlyMessage ? 'p-0' : 'px-4 py-3';
$audioPanelClass = $isSender
    ? 'bg-white/15 text-white ring-white/20'
    : 'bg-slate-100 text-slate-900 ring-slate-900/5 dark:bg-white/10 dark:text-slate-100 dark:ring-white/10';
$audioButtonClass = $isSender
    ? 'bg-white text-[#5B3FEA]'
    : 'bg-[#5B3FEA] text-white';
$audioTrackClass = $isSender
    ? 'bg-white/30 accent-white'
    : 'bg-slate-200 accent-[#5B3FEA] dark:bg-slate-700 dark:accent-violet-300';
?>

<div class="message-card group {{ $isSender ? 'mc-sender justify-end' : 'seen-'.$seen.' justify-start' }} flex w-full items-end bg-transparent outline-none" data-id="{{ $id }}" role="article" tabindex="0" aria-label="{{ $isSender ? $sentMessageLabel : $receivedMessageLabel }}">
    @if ($message || $audio || $attachment)
        <div class="message-card-content {{ $isSender ? 'ml-auto' : 'mr-auto' }} min-w-0 max-w-[min(86%,24rem)] md:max-w-[min(76%,720px)]">
            <div class="message">
                <div class="card_container flex max-w-full items-end gap-2 {{ in_array($sender->role_id, [1, 2]) ? 'admin_user' : '' }} {{ $isSender ? 'justify-end' : 'justify-start' }}">
                    @if(!$isSender)
                        <img class="image_profile hidden h-9 w-9 shrink-0 rounded-full object-cover md:block md:dark:ring-[3px] md:dark:ring-[#070B16]" src="{{ $sender->avatar }}" alt="{{ $sender->name }}" />
                    @endif

                    <div class="min-w-0 max-w-full text-left">
                        @if (!$isSender && \Illuminate\Support\Str::of(request()->get('id'))->contains('-'))
                            <div class="mb-1 flex items-end justify-between gap-4">
                                <div class="message-sender-name text-xs font-semibold text-[#5B3FEA] dark:text-violet-300" data-id="{{ $sender->id }}">
                                    ~ {{ $sender->name }}
                                </div>
                                <span data-time="{{ $created_at }}" class="message-time float-none block text-end text-xs font-normal text-slate-500 dark:text-slate-400">
                                    <span class="time mt-1 inline-block">{{ $displayTimeAgo }}</span>
                                </span>
                            </div>
                        @endif

                        <div class="flex max-w-full items-center gap-2 {{ $isSender ? 'justify-end' : 'justify-start' }}">
                            @if($isSender)
                                {!! $deleteAction !!}
                            @endif

                            <div dir="auto" class="message_content {{ $bubbleClass }} {{ $bubblePaddingClass }} min-w-0 max-w-full text-sm font-normal leading-[1.5] [overflow-wrap:anywhere] break-words [&_a]:text-inherit [&_a]:underline [&_a]:underline-offset-[3px] sm:text-[15px] md:text-sm xl:text-[15px]">
                                {!! nl2br(e($message)) !!}

                                @if($audio)
                                    <div class="main_audio chat-audio-player {{ $audioPanelClass }} mt-3 flex w-full max-w-[17rem] items-center gap-3 rounded-[1.25rem] p-2.5 ring-1" data-audio-player>
                                        <button type="button" class="Pause_Play {{ $audioButtonClass }} inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full outline-none transition active:scale-95" aria-label="{{ $playAudioLabel }}">
                                            <i class="fas fa-play text-xs"></i>
                                        </button>
                                        <div class="min-w-0 flex-1">
                                            <div class="mb-1 flex items-center justify-between gap-3 text-[11px] font-semibold opacity-80">
                                                <span class="audio-current-time">0:00</span>
                                                <span class="audio-duration">0:00</span>
                                            </div>
                                            <input type="range" min="0" max="100" value="0" step="0.1" class="audio-progress {{ $audioTrackClass }} h-1.5 w-full cursor-pointer appearance-none rounded-full outline-none" aria-label="{{ $audioProgressLabel }}">
                                        </div>
                                        <audio preload="metadata" class="chat-audio-source sr-only">
                                            <source src="{{ $audio->getFullUrl() }}">
                                            {{ $audioLabel }}
                                        </audio>
                                        <div class="container_listening hidden">
                                            <div class="progress_box">
                                                <div class="audio_listening"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($attachment)
                                    @if($isImageAttachment)
                                        <div class="image-wrapper {{ $messageText === '' ? '' : 'mt-2' }}" style="text-align: {{ $isSender ? 'end' : 'start' }}">
                                            <a href="{{ $attachment->getFullUrl() }}" class="image-file chat-image inline-flex w-[min(18rem,74vw)] max-w-full items-center justify-center overflow-hidden rounded-[1.15rem] bg-white p-1 ring-1 ring-slate-900/5 dark:bg-slate-900 dark:ring-white/10" data-src="{{ $attachment->getFullUrl() }}" aria-label="{{ $attachmentName }}">
                                                <img src="{{ $attachment->getFullUrl() }}" alt="{{ $attachmentName }}" loading="lazy" class="block max-h-[22rem] max-w-full object-contain">
                                            </a>
                                        </div>
                                    @else
                                        <a href="{{ $attachment->getFullUrl() }}" target="_blank" download class="file-download {{ $attachmentExtensionClass }} mt-3 inline-flex max-w-full items-center gap-3 rounded-2xl bg-white/15 px-3 py-2.5 text-current no-underline ring-1 ring-white/15 transition hover:bg-white/20 dark:bg-white/10 dark:hover:bg-white/15">
                                            <span class="box_icon inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-[#5B3FEA] dark:bg-slate-950 dark:text-violet-300">
                                                <i class="fas fa-file-alt text-base"></i>
                                            </span>
                                            <span class="min-w-0">
                                                <span class="block truncate text-sm font-semibold leading-5">{{ $attachmentName }}</span>
                                                @if($attachmentExtension)
                                                    <span class="block text-xs font-medium uppercase opacity-70">{{ $attachmentExtension }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    @endif
                                @endif
                            </div>

                            @if(!$isSender)
                                {!! $deleteAction !!}
                            @endif
                        </div>

                        @if($isSender)
                            {!! $timeAndSeen !!}
                        @endif
                    </div>

                    @if($isSender)
                        <img class="image_profile hidden h-9 w-9 shrink-0 rounded-full object-cover md:block md:dark:ring-[3px] md:dark:ring-[#070B16]" src="{{ $sender->avatar }}" alt="{{ $sender->name }}" />
                    @endif

                </div>
            </div>
        </div>
    @endif
</div>
