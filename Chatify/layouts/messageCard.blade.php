<?php
$seenIcon = (!!$seen ? 'check-double' : 'check');
$timeAndSeen = "<span data-time='$created_at' class='message-time mt-2 flex items-center justify-end gap-1 text-xs font-semibold text-slate-500'>
        ".($isSender ? "<span class='fas fa-$seenIcon seen text-[#5B3FEA]'></span>" : '' )." <span class='time'>$timeAgo</span>
    </span>";
$role_id = $role_id ?? auth()->user()->role_id;
?>

<div class="message-card {{ $isSender ? 'mc-sender justify-end' : 'seen-'.$seen.' justify-start' }} flex w-full items-end gap-2 bg-transparent" data-id="{{ $id }}" role="article" aria-label="{{ $isSender ? 'Sent message' : 'Received message' }}">
    @if ($isSender && (!$seen || in_array($role_id, [1, 2])))
        <div class="actions flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-white/90 text-red-500 shadow-[0_10px_24px_rgba(15,23,42,.08)]">
            <i class="fas fa-trash delete-btn cursor-pointer" data-id="{{ $id }}"></i>
        </div>
    @endif

    <div class="message-card-content max-w-[min(76%,720px)] {{ $isSender ? 'ml-auto' : 'mr-auto' }}">
        @if ($message || $audio || $attachment)
            <div class="message">
                <div class="card_container flex items-end gap-2 {{ in_array($sender->role_id, [1, 2]) ? 'admin_user' : '' }} {{ $isSender ? 'justify-end' : 'justify-start' }}">
                    @if(!$isSender)
                        <img class="image_profile h-9 w-9 shrink-0 rounded-full object-cover" src="{{ $sender->avatar }}" alt="{{ $sender->name }}" />
                    @endif

                    <div class="min-w-0 {{ $isSender ? 'text-right' : 'text-left' }}">
                        @if (!$isSender && \Illuminate\Support\Str::of(request()->get('id'))->contains('-'))
                            <div class="mb-1 flex items-end justify-between gap-4">
                                <div class="message-sender-name text-xs font-extrabold text-[#5B3FEA]" data-id="{{ $sender->id }}">
                                    ~ {{ $sender->name }}
                                </div>
                                <span data-time="{{ $created_at }}" class="message-time block text-end text-xs font-semibold text-slate-500">
                                    <span class="time mt-1 inline-block">{{ $timeAgo }}</span>
                                </span>
                            </div>
                        @endif

                        <div dir="auto" class="message_content rounded-[1.45rem] px-4 py-3 text-sm font-semibold leading-[1.5] shadow-[0_12px_32px_rgba(15,23,42,0.045)] sm:text-[15px] md:text-sm xl:text-[15px] {{ $isSender ? 'rounded-br-lg bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-white' : 'rounded-bl-lg bg-white text-slate-950' }}">
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

                        @if($isSender)
                            {!! $timeAndSeen !!}
                        @endif
                    </div>

                    @if($isSender) 
                        <img class="image_profile h-9 w-9 shrink-0 rounded-full object-cover" src="{{ $sender->avatar }}" alt="{{ $sender->name }}" />
                    @endif
                </div>
            </div>
        @endif
    </div>

    @if (!$isSender && in_array($role_id, [1, 2]))
        <div class="actions flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-white/90 text-red-500 shadow-[0_10px_24px_rgba(15,23,42,.08)]">
            <i class="fas fa-trash delete-btn cursor-pointer" data-id="{{ $id }}"></i>
        </div>
    @endif
</div>
