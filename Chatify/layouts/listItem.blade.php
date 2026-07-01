@php
    $listTableClass = "messenger-list-item block w-full overflow-visible border-0 bg-transparent p-0 [direction:ltr] [&_tbody]:block [&_tbody]:w-full [&_tbody]:border-0 [&_tbody]:bg-transparent [&_tbody]:[direction:ltr] [&_tr]:flex [&_tr]:w-full [&_tr]:[direction:ltr] [&_td]:block [&_td]:p-0 [&_td]:text-left [&_td]:align-top [&.active>tbody>tr]:border-[#DED8FF] [&.active>tbody>tr]:bg-[#F8F6FF] [&.m-list-active>tbody>tr]:border-[#DED8FF] [&.m-list-active>tbody>tr]:bg-[#F8F6FF] dark:[&.active>tbody>tr]:border-violet-300/25 dark:[&.active>tbody>tr]:bg-violet-500/10 dark:[&.m-list-active>tbody>tr]:border-violet-300/25 dark:[&.m-list-active>tbody>tr]:bg-violet-500/10";
    $listRowClass = "group flex min-h-[7rem] w-full cursor-pointer items-start gap-4 overflow-visible rounded-[1.65rem] border border-slate-900/5 bg-white p-4 text-left shadow-none transition-colors active:scale-[0.99] hover:border-[#DED8FF] hover:bg-[#FCFBFF] dark:border-white/10 dark:bg-slate-900 dark:hover:border-violet-300/20 dark:hover:bg-[#121B2C] [&.active]:border-[#DED8FF] [&.active]:bg-[#F8F6FF] dark:[&.active]:border-violet-300/25 dark:[&.active]:bg-violet-500/10";
    $avatarCellClass = "relative block w-14 shrink-0 p-0";
    $avatarImageClass = "avatar av-m h-14 w-14 rounded-full bg-cover bg-center";
    $avatarIconClass = "avatar av-m flex h-14 w-14 items-center justify-center rounded-full bg-[#F2EEFF] text-[#5B3FEA] dark:bg-violet-500/15 dark:text-violet-300";
    $nameClass = "m-0 truncate text-base font-extrabold tracking-[-0.015em] text-slate-950 dark:text-slate-100";
    $badgeClass = "mt-1 inline-flex rounded-full bg-[#F2EEFF] px-2.5 py-1 text-[11px] font-semibold text-[#5B3FEA] dark:bg-violet-500/15 dark:text-violet-300";
    $timeClass = "contact-item-time shrink-0 pt-0.5 text-xs font-medium text-slate-500 xl:text-sm dark:text-slate-400";
    $previewClass = "min-w-0 flex-1 overflow-hidden text-[15px] font-medium leading-snug text-slate-700 [display:-webkit-box] [-webkit-box-orient:vertical] [-webkit-line-clamp:2] md:text-sm xl:text-[15px] dark:text-slate-300";
    $searchMetaClass = "mt-2 block text-sm font-medium text-slate-500 dark:text-slate-400";
    $unreadCounterClass = "inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-sm font-semibold text-white md:h-7 md:w-7 md:text-xs xl:h-8 xl:w-8";
    $emptyCounterClass = "h-8 w-8 shrink-0 md:h-7 md:w-7 xl:h-8 xl:w-8";
@endphp

{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
    <table class="{{ $listTableClass }}" data-contact="{{ auth()->id() }}" role="listitem">
        <tr data-action="0" class="{{ $listRowClass }}">
            <td class="{{ $avatarCellClass }}">
                <div class="saved-messages {{ $avatarIconClass }}">
                    <span class="far fa-bookmark"></span>
                </div>
            </td>
            <td class="block min-w-0 flex-1 p-0">
                <p data-id="{{ auth()->id() }}" data-type="user" class="{{ $nameClass }}">
                    Saved Messages <span class="mt-1 block w-fit {{ $badgeClass }}">You</span>
                </p>
                <span class="mt-2 block text-[15px] font-medium leading-snug text-slate-700 md:text-sm xl:text-[15px] dark:text-slate-300">Save messages secretly</span>
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
    <table class="{{ $listTableClass }}" data-contact="{{ $user->id }}" role="listitem">
        <tr data-action="0" class="{{ $listRowClass }}">
            <td class="{{ $avatarCellClass }}">
                @if($user->active_status)
                    <span class="activeStatus absolute bottom-[.1rem] right-0 h-[.9rem] w-[.9rem] rounded-full border-[3px] border-white bg-[#52c41a] dark:border-slate-900"></span>
                @endif
                <div class="{{ $avatarImageClass }}" style="background-image: url('{{ $user->avatar }}');"></div>
            </td>
            <td class="block min-w-0 flex-1 p-0">
                <div class="flex items-start justify-between gap-2">
                    <div class="min-w-0">
                        <p data-id="{{ $user->id }}" data-type="user" class="{{ $nameClass }}">
                            {{ $user->name }} {{ $user->last_name }}
                        </p>
                        @if($roleLabel)
                            <span class="{{ $badgeClass }}">{{ $roleLabel }}</span>
                        @endif
                    </div>
                    <span class="{{ $timeClass }}" data-time="{{ $lastMessage->created_at }}">{{ $lastMessage->timeAgo }}</span>
                </div>
                <div class="mt-2 flex items-end justify-between gap-3">
                    <p class="{{ $previewClass }}">
                        {!! $lastMessage->from_id == auth()->id() ? '<span class="lastMessageIndicator font-bold text-[#5B3FEA] dark:text-violet-300">You :</span> ' : '' !!}
                        {!! $lastMessageBody !!}
                    </p>
                    {!! $unseenCounter > 0 ? "<b class='".$unreadCounterClass."'>".$unseenCounter."</b>" : "<span class='".$emptyCounterClass."'></span>" !!}
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
    <table class="{{ $listTableClass }}" data-contact="{{ $get.'-'.$model->id }}" role="listitem">
        <tr data-action="0" class="{{ $listRowClass }}">
            <td class="{{ $avatarCellClass }}">
                @if($get == 'group')
                    <div class="{{ $avatarIconClass }}">
                        <i class="fa-solid fa-user-group text-lg"></i>
                    </div>
                @else
                    <div class="{{ $avatarImageClass }}" style="background-image: url('{{ $model->avatar }}');"></div>
                @endif
            </td>
            <td class="block min-w-0 flex-1 p-0">
                <div class="flex items-start justify-between gap-2">
                    <div class="min-w-0">
                        <p data-id="{{ $get.'-'.$model->id }}" data-type="user" class="{{ $nameClass }}">
                            {{ $chatTitle }}
                        </p>
                        <span class="{{ $badgeClass }}">{{ $get == 'group' ? 'Group' : 'Course' }}</span>
                    </div>
                    <span class="{{ $timeClass }}" data-time="{{ $lastMessage->created_at }}">{{ $lastMessage->timeAgo }}</span>
                </div>
                <div class="mt-2 flex items-end justify-between gap-3">
                    <p class="{{ $previewClass }}">
                        <span class="lastMessageIndicator font-bold text-[#5B3FEA] dark:text-violet-300">
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
                    {!! $unseenCounter > 0 ? "<b class='".$unreadCounterClass."'>".$unseenCounter."</b>" : "<span class='".$emptyCounterClass."'></span>" !!}
                </div>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')
    <table class="{{ $listTableClass }}" data-contact="{{ $id.$user->id }}" role="listitem">
        <tr data-action="0" class="{{ $listRowClass }}">
            <td class="{{ $avatarCellClass }}">
                <div class="{{ $avatarImageClass }}" style="background-image: url('{{ $user->avatar }}');"></div>
            </td>
            <td class="block min-w-0 flex-1 p-0">
                <p data-id="{{ $id.$user->id }}" data-type="user" class="{{ $nameClass }}">
                    {{ $user->name }} {{ $user->last_name }}
                </p>
                <span class="{{ $searchMetaClass }}">{{ __('chatify.Search') }}</span>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
    <div class="shared-photo chat-image aspect-square min-h-[82px] w-full rounded-2xl bg-cover bg-center" style="background-image: url('{{ $image }}')"></div>
@endif
