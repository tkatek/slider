<div class="my-2 flex items-center gap-2 rounded-2xl bg-white/80 p-2">
    <input class="form-check-input mt-0 d-none" type="checkbox" id="{{ $user->id }}" value="{{ $user->id }}" {{ ($user->restrictions_count) ? 'checked' : '' }} />
    <label class="flex min-w-0 cursor-pointer items-center gap-2 overflow-hidden whitespace-nowrap" for="{{ $user->id }}">
        <div class="check_user relative h-10 w-10 shrink-0 overflow-hidden rounded-full">
            <img class="image_profile h-full w-full object-cover" src="{{ $user->avatar }}" alt="{{ $user->id }}" />
            <iconify-icon class="absolute inset-0 m-auto hidden text-[#5B3FEA]" icon="game-icons:check-mark"></iconify-icon>
        </div>
        <span class="truncate text-base font-bold text-slate-950">{{ $user->name }}</span>
    </label>
</div>
