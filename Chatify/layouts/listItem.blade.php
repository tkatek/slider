{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
    <table class="messenger-list-item block w-full border-0 bg-transparent p-0" data-contact="{{ auth()->id() }}" role="listitem">
        <tr data-action="0" class="group flex w-full cursor-pointer gap-3 rounded-[1.4rem] bg-white p-3 text-left shadow-[0_12px_34px_rgba(15,23,42,0.04)] transition hover:-translate-y-0.5 hover:shadow-[0_16px_44px_rgba(91,63,234,0.08)] active:scale-[0.99]">
            <td class="block w-12 shrink-0 p-0">
                <div class="saved-messages avatar av-m flex h-12 w-12 items-center justify-center rounded-full bg-[#F2EEFF] text-[#5B3FEA]">
                    <span class="far fa-bookmark"></span>
                </div>
            </td>
            <td class="block min-w-0 flex-1 p-0">
                <p data-id="{{ auth()->id() }}" data-type="user" class="m-0 truncate text-base font-semibold tracking-[-0.015em] text-slate-950 sm:text-[17px] md:text-sm xl:text-base">
                    Saved Messages <span class="mt-1 block w-fit rounded-full bg-[#F2EEFF] px-2.5 py-1 text-[11px] font-semibold text-[#5B3FEA]">You</span>
                </p>
                <span class="mt-2 block text-[15px] font-medium leading-snug text-slate-700 md:text-sm xl:text-[15px]">Save messages secretly</span>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Contact list -------------------- --}}
@if($get == 'users' && !!$lastMessage)
    <?php
        if($lastMessage->hasMedia("audio")){
            $lastMessageBody="<span class='audio'></span>";
        }elseif($lastMessage->hasMedia("attachments")){
            $mimType=$lastMessage->getFirstMedia("attachments")->mime_type;
            $before=\Illuminate\Support\Str::of($mimType)->before("/");
            $lastMessageBody=($before=="image")?"image":\Illuminate\Support\Str::of($mimType)->afterLast("/");
            $lastMessageBody="<span class='".$lastMessageBody."'></span>";
        }else{
            $lastMessageBody=\Illuminate\Support\Str::limit(strip_tags($lastMessage->body), 52);
            $lastMessageBody="<span>$lastMessageBody</span>";
        }

        $roleLabel = in_array($user->role_id ?? null, [1, 2]) ? 'Admin' : (($user->role_id ?? null) ? 'Teacher' : '');
    ?>
    <table class="messenger-list-item block w-full border-0 bg-transparent p-0" data-contact="{{ $user->id }}" role="listitem">
        <tr data-action="0" class="group flex w-full cursor-pointer gap-3 rounded-[1.4rem] bg-white p-3 text-left shadow-[0_12px_34px_rgba(15,23,42,0.04)] transition hover:-translate-y-0.5 hover:shadow-[0_16px_44px_rgba(91,63,234,0.08)] active:scale-[0.99]">
            <td class="relative block w-12 shrink-0 p-0">
                @if($user->active_status)
                    <span class="activeStatus"></span>
                @endif
                <div class="avatar av-m h-12 w-12 rounded-full bg-cover bg-center" style="background-image: url('{{ $user->avatar }}');"></div>
            </td>
            <td class="block min-w-0 flex-1 p-0">
                <div class="flex items-start justify-between gap-2">
                    <div class="min-w-0">
                        <p data-id="{{ $user->id }}" data-type="user" class="m-0 truncate text-base font-semibold tracking-[-0.015em] text-slate-950 md:text-sm xl:text-base">
                            {{ $user->name }} {{ $user->last_name }}
                        </p>
                        @if($roleLabel)
                            <span class="mt-1 inline-flex rounded-full bg-[#F2EEFF] px-2.5 py-1 text-[11px] font-semibold text-[#5B3FEA]">{{ $roleLabel }}</span>
                        @endif
                    </div>
                    <span class="contact-item-time shrink-0 pt-0.5 text-xs font-medium text-slate-500 xl:text-sm" data-time="{{ $lastMessage->created_at }}">{{ $lastMessage->timeAgo }}</span>
                </div>
                <div class="mt-2 flex items-end justify-between gap-3">
                    <p class="min-w-0 flex-1 overflow-hidden text-[15px] font-medium leading-snug text-slate-700 [display:-webkit-box] [-webkit-box-orient:vertical] [-webkit-line-clamp:2] md:text-sm xl:text-[15px]">
                        {!! $lastMessage->from_id == auth()->id() ? '<span class="lastMessageIndicator font-bold text-[#5B3FEA]">You :</span> ' : '' !!}
                        {!! $lastMessageBody !!}
                    </p>
                    {!! $unseenCounter > 0 ? "<b class='inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-sm font-semibold text-white shadow-[0_10px_22px_rgba(91,63,234,0.22)] md:h-7 md:w-7 md:text-xs xl:h-8 xl:w-8'>".$unseenCounter."</b>" : "<span class='h-8 w-8 shrink-0 md:h-7 md:w-7 xl:h-8 xl:w-8'></span>" !!}
                </div>
            </td>
        </tr>
    </table>
@endif

@if(in_array($get, ['group','course']) && !!$lastMessage)
    <?php
        if($lastMessage->hasMedia("audio")){
            $lastMessageBody="<span class='audio'></span>";
        }elseif($lastMessage->hasMedia("attachments")){
            $mimType=$lastMessage->getFirstMedia("attachments")->mime_type;
            $before=\Illuminate\Support\Str::of($mimType)->before("/");
            $lastMessageBody=($before=="image")?"image":\Illuminate\Support\Str::of($mimType)->afterLast("/");
            $lastMessageBody="<span class='".$lastMessageBody."'></span>";
        }else{
            $lastMessageBody=\Illuminate\Support\Str::limit(strip_tags($lastMessage->body), 52);
            $lastMessageBody="<span>$lastMessageBody</span>";
        }
        $chatTitle = ($get == "group") ? "group ".$model->id : \Illuminate\Support\Str::limit($model->name, 28);
    ?>
    <table class="messenger-list-item block w-full border-0 bg-transparent p-0" data-contact="{{ $get.'-'.$model->id }}" role="listitem">
        <tr data-action="0" class="group flex w-full cursor-pointer gap-3 rounded-[1.4rem] bg-white p-3 text-left shadow-[0_12px_34px_rgba(15,23,42,0.04)] transition hover:-translate-y-0.5 hover:shadow-[0_16px_44px_rgba(91,63,234,0.08)] active:scale-[0.99]">
            <td class="relative block w-12 shrink-0 p-0">
                @if($get == 'group')
                    <div class="avatar av-m flex h-12 w-12 items-center justify-center rounded-full bg-[#F2EEFF] text-[#5B3FEA]">
                        <i class="fa-solid fa-user-group text-lg"></i>
                    </div>
                @else
                    <div class="avatar av-m h-12 w-12 rounded-full bg-cover bg-center" style="background-image: url('{{ $model->avatar }}');"></div>
                @endif
            </td>
            <td class="block min-w-0 flex-1 p-0">
                <div class="flex items-start justify-between gap-2">
                    <div class="min-w-0">
                        <p data-id="{{ $get.'-'.$model->id }}" data-type="user" class="m-0 truncate text-base font-semibold tracking-[-0.015em] text-slate-950 sm:text-[17px] md:text-sm xl:text-base">
                            {{ $chatTitle }}
                        </p>
                        <span class="mt-1 inline-flex rounded-full bg-[#F2EEFF] px-2.5 py-1 text-[11px] font-semibold text-[#5B3FEA]">{{ $get == 'group' ? 'Group' : 'Course' }}</span>
                    </div>
                    <span class="contact-item-time shrink-0 pt-0.5 text-xs font-medium text-slate-500 xl:text-sm" data-time="{{ $lastMessage->created_at }}">{{ $lastMessage->timeAgo }}</span>
                </div>
                <div class="mt-2 flex items-end justify-between gap-3">
                    <p class="min-w-0 flex-1 overflow-hidden text-[15px] font-medium leading-snug text-slate-700 [display:-webkit-box] [-webkit-box-orient:vertical] [-webkit-line-clamp:2] md:text-sm xl:text-[15px]">
                        <span class="lastMessageIndicator font-bold text-[#5B3FEA]">
                            @if($lastMessage->from_id == auth()->id())
                                {{ __('chatify.You:') }}
                            @else
                                {{ isset($sender) ? $sender->name : '' }}:
                            @endif
                        </span>
                        @if($lastMessage->attachment == null)
                            {!! $lastMessageBody !!}
                        @else
                            <span class="fas fa-file"></span> {{ __('chatify.Attachment') }}
                        @endif
                    </p>
                    {!! $unseenCounter > 0 ? "<b class='inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-sm font-semibold text-white shadow-[0_10px_22px_rgba(91,63,234,0.22)] md:h-7 md:w-7 md:text-xs xl:h-8 xl:w-8'>".$unseenCounter."</b>" : "<span class='h-8 w-8 shrink-0 md:h-7 md:w-7 xl:h-8 xl:w-8'></span>" !!}
                </div>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')
    <table class="messenger-list-item block w-full border-0 bg-transparent p-0" data-contact="{{ $id.$user->id }}" role="listitem">
        <tr data-action="0" class="group flex w-full cursor-pointer gap-3 rounded-[1.4rem] bg-white p-3 text-left shadow-[0_12px_34px_rgba(15,23,42,0.04)] transition hover:-translate-y-0.5 hover:shadow-[0_16px_44px_rgba(91,63,234,0.08)] active:scale-[0.99]">
            <td class="block w-12 shrink-0 p-0">
                <div class="avatar av-m h-12 w-12 rounded-full bg-cover bg-center" style="background-image: url('{{ $user->avatar }}');"></div>
            </td>
            <td class="block min-w-0 flex-1 p-0">
                <p data-id="{{ $id.$user->id }}" data-type="user" class="m-0 truncate text-base font-semibold tracking-[-0.015em] text-slate-950 sm:text-[17px] md:text-sm xl:text-base">
                    {{ $user->name }} {{ $user->last_name }}
                </p>
                <span class="mt-2 block text-sm font-medium text-slate-500">{{ __('chatify.Search') }}</span>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
    <div class="shared-photo chat-image rounded-2xl bg-cover bg-center" style="background-image: url('{{ $image }}')"></div>
@endif
