{{-- ---------------------- Image modal box ---------------------- --}}
<div id="imageModalBox" class="imageModal fixed inset-0 z-[9999] items-center justify-center bg-slate-950/80 p-4 backdrop-blur-sm" style="display: none;">
    <button type="button" class="imageModal-close absolute right-5 top-5 flex h-11 w-11 items-center justify-center rounded-full bg-white text-2xl font-bold text-slate-700 shadow-[0_12px_34px_rgba(0,0,0,.18)] transition hover:bg-slate-100">&times;</button>
    <img class="imageModal-content max-h-[88dvh] max-w-[92vw] rounded-[1.35rem] object-contain shadow-[0_24px_70px_rgba(0,0,0,.35)]" id="imageModalBoxSrc">
</div>

{{-- ---------------------- Delete Modal ---------------------- --}}
<div class="app-modal fixed inset-0 z-[9998] items-center justify-center bg-slate-950/45 p-4 backdrop-blur-sm" data-name="delete" style="display: none;">
    <div class="app-modal-container w-full max-w-[28rem]">
        <div class="app-modal-card rounded-[1.75rem] border border-slate-900/5 bg-white p-6 text-center shadow-[0_24px_70px_rgba(15,23,42,.16)]" data-name="delete" data-modal="0">
            <div class="app-modal-header text-xl font-bold tracking-[-.02em] text-slate-950">{{__('chatify.Are you sure you want to delete this?')}}</div>
            <div class="app-modal-body mt-2 text-sm font-medium text-slate-500">{{__('chatify.You can not undo this action')}}</div>
            <div class="app-modal-footer mt-6 flex justify-center gap-3">
                <a href="javascript:void(0)" class="app-btn cancel inline-flex h-11 min-w-28 items-center justify-center rounded-2xl border border-slate-900/10 bg-white px-5 text-sm font-bold text-slate-700 no-underline transition hover:bg-slate-50">{{__('chatify.Cancel')}}</a>
                <a href="javascript:void(0)" class="app-btn delete inline-flex h-11 min-w-28 items-center justify-center rounded-2xl bg-red-500 px-5 text-sm font-bold text-white no-underline shadow-[0_12px_24px_rgba(239,68,68,.22)] transition hover:bg-red-600">{{__('chatify.Delete')}}</a>
            </div>
        </div>
    </div>
</div>

{{-- ---------------------- Block Modal ---------------------- --}}
<div class="app-modal modal fixed inset-0 z-[9998] items-center justify-center bg-slate-950/45 p-4 backdrop-blur-sm" data-name="block" style="display: none;">
    <div class="app-modal-container relative w-full max-w-[32rem]">
        <button class="close_alert absolute -right-3 -top-3 flex h-10 w-10 items-center justify-center rounded-full bg-white text-slate-600 shadow-[0_12px_28px_rgba(0,0,0,.18)]" type="button">
            <iconify-icon icon="ep:close-bold"></iconify-icon>
        </button>
        <div class="app-modal-card rounded-[1.75rem] border border-slate-900/5 bg-white p-6 shadow-[0_24px_70px_rgba(15,23,42,.16)]" data-name="block" data-modal="0">
            <div class="app-modal-header block_header mb-4 text-lg font-bold tracking-[-.02em] text-slate-950">
                {{__('chatify.Please check users you want to block')}}
            </div>
            <div class="app-modal-body">
                <form>
                    <div id="blockUsersFromGroup">
                        <div class="user_list space-y-2"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ---------------------- Alert Modal ---------------------- --}}
<div class="app-modal fixed inset-0 z-[9998] items-center justify-center bg-slate-950/45 p-4 backdrop-blur-sm" data-name="alert" style="display: none;">
    <div class="app-modal-container w-full max-w-[28rem]">
        <div class="app-modal-card rounded-[1.75rem] border border-slate-900/5 bg-white p-6 text-center shadow-[0_24px_70px_rgba(15,23,42,.16)]" data-name="alert" data-modal="0">
            <div class="app-modal-header text-xl font-bold tracking-[-.02em] text-slate-950"></div>
            <div class="app-modal-body mt-2 text-sm font-medium text-slate-500"></div>
            <div class="app-modal-footer mt-6 flex justify-center">
                <a href="javascript:void(0)" class="app-btn cancel inline-flex h-11 min-w-28 items-center justify-center rounded-2xl bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] px-5 text-sm font-bold text-white no-underline shadow-[0_12px_24px_rgba(91,63,234,.24)]">{{__('chatify.Cancel')}}</a>
            </div>
        </div>
    </div>
</div>
