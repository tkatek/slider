@php
    $modalId = $modalId ?? 'winModal';
    $modalTitle = $modalTitle ?? 'Done!';
    $modalTitleClass = trim((string) ($modalTitleClass ?? 'text-3xl font-black text-slate-900 dark:text-white sm:text-4xl'));
    $modalEmoji = $modalEmoji ?? '🎉';
    $modalEmojiClass = trim((string) ($modalEmojiClass ?? 'mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-3xl border border-slate-200 bg-slate-100 text-4xl shadow-sm dark:border-slate-600/40 dark:bg-slate-800/70'));
    $continueThemeClass = trim((string) (($theme['button_primary_color'] ?? 'bg-indigo-600 hover:bg-indigo-500')));
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
                        class="game-btn inline-flex min-h-[3.25rem] w-full items-center justify-center rounded-2xl border border-slate-200 bg-white px-8 py-3 text-sm font-black tracking-[0.01em] text-slate-900 shadow-[0_8px_22px_#0206170D] transition-all duration-200 hover:-translate-y-0.5 hover:bg-slate-50 hover:shadow-[0_16px_34px_rgba(2,6,23,.10)] active:translate-y-0 active:scale-[0.985] dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700 dark:hover:shadow-[0_16px_34px_rgba(0,0,0,.26)]"
                    >
                        Restart
                    </button>

                    <button
                        id="continueBtnModal"
                        type="button"
                        class="game-btn inline-flex min-h-[3.25rem] w-full items-center justify-center rounded-2xl border border-transparent px-8 py-3 text-sm font-black tracking-[0.01em] text-white shadow-[0_10px_24px_rgba(2,6,23,.18)] transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_18px_38px_rgba(2,6,23,.24)] active:translate-y-0 active:scale-[0.985] {{ $continueThemeClass }}"
                    >
                        Continue
                    </button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
