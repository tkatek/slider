@php
    $modalId = $modalId ?? 'winModal';
    $modalTitle = $modalTitle ?? 'Done!';
    $modalTitleClass = trim((string) ($modalTitleClass ?? 'text-3xl font-black text-slate-900 dark:text-white sm:text-4xl'));
    $modalEmoji = $modalEmoji ?? '🎉';
    $modalEmojiClass = trim((string) ($modalEmojiClass ?? 'mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-3xl border border-indigo-200 bg-indigo-50 text-4xl shadow-sm dark:border-indigo-500/30 dark:bg-indigo-500/15'));
@endphp

<div id="{{ $modalId }}" class="hidden fixed inset-0 z-[3000]">
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

    <div class="relative flex min-h-full w-full items-center justify-center p-5 sm:p-8">
        <div class="relative w-full max-w-2xl overflow-hidden rounded-[2rem] border border-slate-200/70 bg-white/95 shadow-2xl dark:border-slate-700/70 dark:bg-slate-900/95">
            <div class="max-h-[88dvh] overflow-y-auto">
                <div class="p-8 text-center sm:p-10">
                <div class="{{ $modalEmojiClass }}">
                    <span aria-hidden="true">{{ $modalEmoji }}</span>
                </div>

                <h2 class="{{ $modalTitleClass }}">
                    {{ $modalTitle }}
                </h2>

                <div class="mt-6 grid w-full grid-cols-1 gap-4 sm:grid-cols-3">
                    <div class="rounded-3xl border border-slate-200/70 bg-white/80 p-4 shadow dark:border-slate-700 dark:bg-slate-800/80 sm:p-5">
                        <div class="text-sm font-bold text-slate-500 dark:text-slate-400">Correct</div>
                        <div id="finalCorrect" class="text-2xl font-black text-slate-900 dark:text-white sm:text-3xl">0</div>
                    </div>
                    <div class="rounded-3xl border border-slate-200/70 bg-white/80 p-4 shadow dark:border-slate-700 dark:bg-slate-800/80 sm:p-5">
                        <div class="text-sm font-bold text-slate-500 dark:text-slate-400">Time</div>
                        <div id="finalTime" class="text-2xl font-black text-slate-900 dark:text-white sm:text-3xl">0</div>
                    </div>
                    <div class="rounded-3xl border border-slate-200/70 bg-white/80 p-4 shadow dark:border-slate-700 dark:bg-slate-800/80 sm:p-5">
                        <div class="text-sm font-bold text-slate-500 dark:text-slate-400">Mistakes</div>
                        <div id="finalMistakes" class="text-2xl font-black text-slate-900 dark:text-white sm:text-3xl">0</div>
                    </div>
                </div>

                <div id="resultsCorrectionCard" class="hidden mt-6 rounded-3xl border border-slate-200/70 bg-white/80 p-4 text-left shadow dark:border-slate-700 dark:bg-slate-800/80 sm:p-5">
                    <div class="text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                        Corrections
                    </div>
                    <div id="finalCorrection" class="mt-3 text-[15px] font-bold leading-[1.75] text-slate-900 dark:text-white sm:text-base sm:leading-[1.85]"></div>
                </div>

                <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <button
                        id="restartBtnModal"
                        type="button"
                        class="game-btn w-full border border-slate-200 bg-white px-8 py-3 text-sm text-slate-900 shadow-[0_8px_22px_#0206170D] hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700"
                    >
                        Restart
                    </button>

                    <button
                        id="continueBtnModal"
                        type="button"
                        class="game-btn w-full border border-white/20 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 px-8 py-3 text-sm text-white shadow-[0_10px_24px_#4F46E51A]"
                    >
                        Continue
                    </button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
