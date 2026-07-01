<div class="mb-4 overflow-hidden rounded-[1.6rem] border border-white/80 bg-white p-5 text-center shadow-[0_18px_48px_rgba(91,63,234,0.08)]">
    <div class="mx-auto mb-4 flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-[#F2EEFF] to-white shadow-[0_18px_34px_rgba(91,63,234,0.12)] ring-4 ring-white">
        <div class="avatar av-l chatify-d-flex h-20 w-20 rounded-full bg-cover bg-center" style="background-image: url('{{ auth()->user()->getFirstMediaUrl('avatars','thumb') }}')"></div>
    </div>
    <p class="info-name truncate text-xl font-extrabold tracking-[-.03em] text-slate-950">{{ auth()->user()->name }}</p>
    <p class="mt-1 text-sm font-semibold text-slate-500">Conversation profile</p>
</div>

<p class="collapsed messenger-infoView-collapse cursor-pointer d-none mb-3 rounded-[1.25rem] border border-[#DED8FF] bg-[#F8F6FF] px-4 py-3 text-sm font-bold text-[#5B3FEA]">
    <span class="flex items-center justify-between gap-3">
        {{ __('chatify.ManageGroup') }}
        <iconify-icon class="arrow_right" icon="ic:baseline-plus"></iconify-icon>
    </span>
</p>

<div class="messenger-infoView-btns mb-4 space-y-2">
    <a href="#" class="danger delete-conversation d-none flex w-full items-center justify-center rounded-2xl bg-red-500/10 px-4 py-3 text-sm font-extrabold text-red-600 no-underline">{{ __('chatify.DeleteConversation') }}</a>
    <a href="#" class="danger block-user d-none flex w-full items-center justify-center rounded-2xl bg-red-500/10 px-4 py-3 text-sm font-extrabold text-red-600 no-underline">{{ __('chatify.BlockUser') }}</a>
    <a href="#" class="danger block-users-from-group d-none flex w-full items-center justify-center rounded-2xl bg-red-500/10 px-4 py-3 text-sm font-extrabold text-red-600 no-underline">{{ __('chatify.BlockUsers') }}</a>
</div>

<div class="messenger-infoView-shared rounded-[1.6rem] border border-white/80 bg-white p-4 shadow-[0_18px_48px_rgba(15,23,42,0.045)]" aria-label="Shared photos">
    <p class="collapsed cursor-pointer mb-4">
        <span class="flex items-center justify-between gap-3">
            <span>
                <span class="block text-base font-extrabold tracking-[-.02em] text-slate-950">{{ __('chatify.SharedPhotos') }}</span>
                <span class="mt-1 block text-xs font-bold text-slate-400">Images from this conversation</span>
            </span>
            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#F2EEFF] text-[#5B3FEA]">
                <iconify-icon class="arrow_right" icon="ic:baseline-plus"></iconify-icon>
            </span>
        </span>
    </p>
    <div class="shared-photos-list min-h-[6rem] rounded-[1.2rem] bg-[#FAFAFF] p-2"></div>
</div>
