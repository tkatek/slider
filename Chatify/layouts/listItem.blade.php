@php
    $listTableClass = "messenger-list-item block w-full max-w-full overflow-hidden border-0 bg-transparent p-0 [direction:ltr] [&_tbody]:block [&_tbody]:w-full [&_tbody]:border-0 [&_tbody]:bg-transparent [&_tbody]:[direction:ltr] [&_tr]:flex [&_tr]:w-full [&_tr]:[direction:ltr] [&_td]:block [&_td]:p-0 [&_td]:text-left [&_td]:align-top [&.active>tbody>tr]:border-[#BFB4FF] [&.active>tbody>tr]:bg-[#F8F6FF] [&.m-list-active>tbody>tr]:border-[#BFB4FF] [&.m-list-active>tbody>tr]:bg-[#F8F6FF] dark:[&.active>tbody>tr]:border-violet-300/35 dark:[&.active>tbody>tr]:bg-violet-500/10 dark:[&.m-list-active>tbody>tr]:border-violet-300/35 dark:[&.m-list-active>tbody>tr]:bg-violet-500/10";
    $listRowClass = "group flex min-h-[5.75rem] w-full max-w-full cursor-pointer items-start gap-3 overflow-hidden rounded-[1.35rem] border border-slate-200 bg-white p-3.5 text-left shadow-none transition-colors active:scale-[0.99] hover:border-[#BFB4FF] hover:bg-[#FCFBFF] md:min-h-[5.5rem] dark:border-white/15 dark:bg-slate-900 dark:hover:border-violet-300/30 dark:hover:bg-[#121B2C] [&.active]:border-[#BFB4FF] [&.active]:bg-[#F8F6FF] dark:[&.active]:border-violet-300/35 dark:[&.active]:bg-violet-500/10";
    $avatarCellClass = "relative block w-12 shrink-0 p-0";
    $avatarImageClass = "avatar av-m h-12 w-12 rounded-full bg-cover bg-center";
    $avatarIconClass = "avatar av-m flex h-12 w-12 items-center justify-center rounded-full bg-[#F2EEFF] text-[#5B3FEA] dark:bg-violet-500/15 dark:text-violet-300";
    $nameClass = "m-0 min-w-0 truncate text-[15px] font-bold text-slate-950 xl:text-base dark:text-slate-100";
    $badgeClass = "inline-flex shrink-0 rounded-full bg-[#F2EEFF] px-2.5 py-0.5 text-[11px] font-medium text-[#5B3FEA] dark:bg-violet-500/15 dark:text-violet-300";
    $timeClass = "contact-item-time shrink-0 pt-0.5 text-xs font-normal text-slate-500 xl:text-sm dark:text-slate-400";
    $previewClass = "min-w-0 flex-1 overflow-hidden text-sm font-normal leading-snug text-slate-700 [display:-webkit-box] [-webkit-box-orient:vertical] [-webkit-line-clamp:2] xl:text-[15px] dark:text-slate-300";
    $searchMetaClass = "mt-2 block text-sm font-medium text-slate-500 dark:text-slate-400";
    $unreadCounterClass = "inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-xs font-semibold text-white";
    $emptyCounterClass = "hidden h-6 w-6 shrink-0";
@endphp

{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
    <table class="{{ $listTableClass }}" data-contact="{{ auth()->id() }}" data-chat-filter="saved" role="listitem">
        <tr data-action="0" class="{{ $listRowClass }}">
            <td class="{{ $avatarCellClass }}">
                <div class="saved-messages {{ $avatarIconClass }}">
                    <span class="far fa-bookmark"></span>
                </div>
            </td>
            <td class="block min-w-0 flex-1 p-0">
                <p data-id="{{ auth()->id() }}" data-type="user" class="{{ $nameClass }}">
                    Saved Messages <span class="{{ $badgeClass }}">You</span>
                </p>
                <span class="mt-1.5 block text-sm font-normal leading-snug text-slate-700 xl:text-[15px] dark:text-slate-300">Save messages secretly</span>
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
        $chatFilter = $roleLabel === 'Admin' ? 'admin' : ($roleLabel === 'Teacher' ? 'teacher' : 'user');
        $presenceState = !empty($user->active_status) ? 'online' : 'offline';
        $presenceClass = $presenceState === 'online' ? 'activeStatus bg-[#52c41a]' : 'offlineStatus bg-slate-300 dark:bg-slate-500';
        $presenceLabel = !empty($user->active_status) ? 'Online' : 'Offline';
    ?>
    <table class="{{ $listTableClass }}" data-contact="{{ $user->id }}" data-chat-filter="{{ $chatFilter }}" data-presence="{{ $presenceState }}" data-presence-label="{{ $presenceLabel }}" role="listitem">
        <tr data-action="0" class="{{ $listRowClass }}">
            <td class="{{ $avatarCellClass }}">
                <span class="{{ $presenceClass }} absolute bottom-[1px] right-[-1px] z-[1] h-3.5 w-3.5 rounded-full border-[3px] border-white dark:border-slate-900" aria-label="{{ $presenceLabel }}"></span>
                <div class="{{ $avatarImageClass }}" style="background-image: url('{{ $user->avatar }}');"></div>
            </td>
            <td class="block min-w-0 flex-1 p-0">
                <div class="flex items-start justify-between gap-2">
                    <div class="flex min-w-0 items-center gap-2">
                        <p data-id="{{ $user->id }}" data-type="user" class="{{ $nameClass }}">
                            {{ $user->name }} {{ $user->last_name }}
                        </p>
                        @if($roleLabel)
                            <span class="{{ $badgeClass }}">{{ $roleLabel }}</span>
                        @endif
                    </div>
                    <span class="{{ $timeClass }}" data-time="{{ $lastMessage->created_at }}">{{ $lastMessage->timeAgo }}</span>
                </div>
                <div class="mt-1.5 flex items-end justify-between gap-3">
                    <p class="{{ $previewClass }}">
                        {!! $lastMessage->from_id == auth()->id() ? '<span class="lastMessageIndicator font-semibold text-[#5B3FEA] dark:text-violet-300">You :</span> ' : '' !!}
                        {!! $lastMessageBody !!}
                    </p>
                    {!! $unseenCounter > 0 ? "<b class='".$unreadCounterClass."'>".$unseenCounter."</b>" : "" !!}
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
    <table class="{{ $listTableClass }}" data-contact="{{ $get.'-'.$model->id }}" data-chat-filter="{{ $get == 'group' ? 'group' : 'course' }}" role="listitem">
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
                    <div class="flex min-w-0 items-center gap-2">
                        <p data-id="{{ $get.'-'.$model->id }}" data-type="user" class="{{ $nameClass }}">
                            {{ $chatTitle }}
                        </p>
                        <span class="{{ $badgeClass }}">{{ $get == 'group' ? 'Group' : 'Course' }}</span>
                    </div>
                    <span class="{{ $timeClass }}" data-time="{{ $lastMessage->created_at }}">{{ $lastMessage->timeAgo }}</span>
                </div>
                <div class="mt-1.5 flex items-end justify-between gap-3">
                    <p class="{{ $previewClass }}">
                        <span class="lastMessageIndicator font-semibold text-[#5B3FEA] dark:text-violet-300">
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
                    {!! $unseenCounter > 0 ? "<b class='".$unreadCounterClass."'>".$unseenCounter."</b>" : "" !!}
                </div>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')
    <?php
        $presenceState = !empty($user->active_status) ? 'online' : 'offline';
        $presenceClass = $presenceState === 'online' ? 'activeStatus bg-[#52c41a]' : 'offlineStatus bg-slate-300 dark:bg-slate-500';
        $presenceLabel = !empty($user->active_status) ? 'Online' : 'Offline';
    ?>
    <table class="{{ $listTableClass }}" data-contact="{{ $id.$user->id }}" data-chat-filter="search" data-presence="{{ $presenceState }}" data-presence-label="{{ $presenceLabel }}" role="listitem">
        <tr data-action="0" class="{{ $listRowClass }}">
            <td class="{{ $avatarCellClass }}">
                <span class="{{ $presenceClass }} absolute bottom-[1px] right-[-1px] z-[1] h-3.5 w-3.5 rounded-full border-[3px] border-white dark:border-slate-900" aria-label="{{ $presenceLabel }}"></span>
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
