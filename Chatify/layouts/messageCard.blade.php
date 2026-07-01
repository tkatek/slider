<?php
$seenIcon = (!!$seen ? 'check-double' : 'check');
$timeAndSeen = "<span data-time='$created_at' class='message-time float-none mt-2 flex items-center justify-end gap-1 text-xs font-semibold text-slate-500 dark:text-slate-400'>
        ".($isSender ? "<span class='fas fa-$seenIcon seen text-[#5B3FEA] dark:text-violet-300'></span>" : '' )." <span class='time'>$timeAgo</span>
    </span>";
$role_id = $role_id ?? auth()->user()->role_id;
$canDelete = ($isSender && (!$seen || in_array($role_id, [1, 2]))) || (!$isSender && in_array($role_id, [1, 2]));
$bubbleClass = $isSender
    ? 'rounded-[1.45rem] rounded-br-lg bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-left text-white shadow-[0_16px_34px_rgba(91,63,234,.18)]'
    : 'rounded-[1.45rem] rounded-bl-lg border border-slate-900/5 bg-white text-left text-slate-950 shadow-[0_12px_32px_rgba(15,23,42,0.045)] dark:border-white/10 dark:bg-slate-900 dark:text-slate-100 dark:shadow-[0_16px_36px_rgba(0,0,0,.20)]';
$deleteAction = $canDelete
    ? '<div class="actions pointer-events-none hidden h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white text-red-500 opacity-0 shadow-[0_12px_28px_rgba(15,23,42,.08)] ring-1 ring-slate-900/5 transition hover:bg-red-50 group-hover:flex group-hover:pointer-events-auto group-hover:opacity-100 group-focus:flex group-focus:pointer-events-auto group-focus:opacity-100 group-focus-within:flex group-focus-within:pointer-events-auto group-focus-within:opacity-100 group-active:flex group-active:pointer-events-auto group-active:opacity-100 dark:bg-slate-900 dark:text-red-400 dark:ring-white/10 dark:hover:bg-red-500/10">
            <button type="button" class="delete-btn flex h-full w-full shrink-0 items-center justify-center rounded-full outline-none" data-id="'.$id.'" aria-label="Delete message">
                <i class="fas fa-trash pointer-events-none text-sm"></i>
            </button>
        </div>'
    : '';
?>

<div class="message-card group {{ $isSender ? 'mc-sender justify-end' : 'seen-'.$seen.' justify-start' }} flex w-full items-end bg-transparent outline-none" data-id="{{ $id }}" role="article" tabindex="0" aria-label="{{ $isSender ? 'Sent message' : 'Received message' }}">
    @if ($message || $audio || $attachment)
        <div class="message-card-content {{ $isSender ? 'ml-auto' : 'mr-auto' }} max-w-[min(86%,24rem)] md:max-w-[min(76%,720px)]">
            <div class="message">
                <div class="card_container flex max-w-full items-end gap-2 {{ in_array($sender->role_id, [1, 2]) ? 'admin_user' : '' }} {{ $isSender ? 'justify-end' : 'justify-start' }}">
                    @if(!$isSender)
                        <img class="image_profile hidden h-9 w-9 shrink-0 rounded-full object-cover md:block md:dark:ring-[3px] md:dark:ring-[#070B16]" src="{{ $sender->avatar }}" alt="{{ $sender->name }}" />
                    @endif

                    <div class="min-w-0 text-left">
                        @if (!$isSender && \Illuminate\Support\Str::of(request()->get('id'))->contains('-'))
                            <div class="mb-1 flex items-end justify-between gap-4">
                                <div class="message-sender-name text-xs font-extrabold text-[#5B3FEA] dark:text-violet-300" data-id="{{ $sender->id }}">
                                    ~ {{ $sender->name }}
                                </div>
                                <span data-time="{{ $created_at }}" class="message-time float-none block text-end text-xs font-semibold text-slate-500 dark:text-slate-400">
                                    <span class="time mt-1 inline-block">{{ $timeAgo }}</span>
                                </span>
                            </div>
                        @endif

                        <div class="flex items-center gap-2 {{ $isSender ? 'justify-end' : 'justify-start' }}">
                            @if($isSender)
                                {!! $deleteAction !!}
                            @endif

                            <div dir="auto" class="message_content {{ $bubbleClass }} px-4 py-3 text-sm font-semibold leading-[1.5] [overflow-wrap:anywhere] break-words [&_a]:text-inherit [&_a]:underline [&_a]:underline-offset-[3px] sm:text-[15px] md:text-sm xl:text-[15px]">
                                {!! nl2br($message) !!}

                                @if($audio)
                                    <div class="main_audio mt-2 text-current">
                                        <span class="Pause_Play"></span>
                                        <audio class="d-none">
                                            <source src="{{ $audio->getFullUrl() }}">
                                        </audio>
                                        <div class="container_listening">
                                            <div class="progress_box">
                                                <div class="audio_listening"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($attachment)
                                    @if(Str::of($attachment->mime_type)->contains('image/'))
                                        <div class="image-wrapper mt-2" style="text-align: {{ $isSender ? 'end' : 'start' }}">
                                            <div class="image-file chat-image min-h-[180px] rounded-[1.1rem] bg-cover bg-center" style="background-image: url('{{ $attachment->getFullUrl() }}')">
                                                <div class="sr-only">{{ $attachment->name }}</div>
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ $attachment->getFullUrl() }}" target="_blank" class="file-download {{ \Illuminate\Support\Str::of($attachment->file_name)->afterLast('.') }} mt-2 inline-flex items-center gap-2 rounded-2xl bg-white/15 px-3 py-2 font-bold text-current no-underline">
                                            <span class="box_icon"></span>{{ $attachment->name }}
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
