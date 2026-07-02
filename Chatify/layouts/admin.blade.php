<div class="admin-list-item flex min-w-[56px] flex-col items-center gap-1 rounded-full bg-transparent px-1 py-1 text-center">
    @if($user)
        @php
            $presenceClass = !empty($user->active_status) ? 'activeStatus bg-[#52c41a]' : 'offlineStatus bg-slate-300 dark:bg-slate-500';
            $presenceLabel = !empty($user->active_status) ? 'Online' : 'Offline';
        @endphp
        <div class="relative h-9 w-9 shrink-0">
            <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m h-full w-full rounded-full bg-cover bg-center shadow-[0_8px_20px_rgba(15,23,42,0.08)] ring-2 ring-white dark:bg-violet-500/15 dark:shadow-none dark:ring-slate-900"
                 style="background-image: url('{{ $user->getFirstMediaUrl('avatars','thumb') }}');">
            </div>
            <span class="{{ $presenceClass }} absolute bottom-0 right-[-1px] h-2.5 w-2.5 rounded-full border-2 border-white dark:border-slate-900" aria-label="{{ $presenceLabel }}"></span>
        </div>
        <p class="m-0 max-w-[56px] overflow-hidden text-ellipsis whitespace-nowrap text-[11px] font-semibold text-slate-950 dark:text-slate-200">
            {!! strlen($user->name) > 6 ? e(substr($user->name, 0, 6)).'&hellip;' : e($user->name) !!}
        </p>
    @endif
</div> 
