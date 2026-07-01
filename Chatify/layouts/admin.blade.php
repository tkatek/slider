<div class="admin-list-item flex min-w-[58px] flex-col items-center gap-1.5 rounded-full bg-transparent px-1 py-1 text-center">
    @if($user)
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m h-10 w-10 shrink-0 rounded-full bg-cover bg-center shadow-[0_8px_20px_rgba(15,23,42,0.08)] ring-2 ring-white"
             style="background-image: url('{{ $user->getFirstMediaUrl('avatars','thumb') }}');">
        </div>
        <p class="m-0 max-w-[58px] overflow-hidden text-ellipsis whitespace-nowrap text-[11px] font-bold text-slate-950">
            {{ strlen($user->name) > 5 ? substr($user->name, 0, 6).'..' : $user->name }}
        </p>
    @endif
</div>
