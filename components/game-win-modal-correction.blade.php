@php
    $modalId = $modalId ?? 'winModal';
    $modalTitle = $modalTitle ?? 'Done!';
    $modalTitleClass = trim((string) ($modalTitleClass ?? 'text-2xl font-black text-slate-900 dark:text-white sm:text-3xl'));
    $modalEmoji = $modalEmoji ?? '🎉';
    $modalEmojiClass = trim((string) ($modalEmojiClass ?? 'mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-2xl dark:border-slate-700 dark:bg-slate-800'));
    $continueThemeClass = trim((string) (($theme['button_primary_color'] ?? 'bg-indigo-600 hover:bg-indigo-500')));
    $sectionOnly = !empty($section_only);
@endphp

@if($sectionOnly)
    <div id="resultsCorrectionCard" class="hidden mt-4 rounded-2xl border border-slate-200/80 bg-slate-50 p-4 text-left dark:border-slate-700 dark:bg-slate-800/80 sm:p-5">
        <div class="text-[11px] font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
            Corrections
        </div>
        <div id="finalCorrection" class="mt-3 text-[15px] font-bold leading-[1.55] text-slate-900 dark:text-white sm:text-base sm:leading-[1.65] [&>div]:mb-1.5 [&>div]:flex [&>div]:items-baseline [&>div]:gap-2 [&>div>span:first-child]:shrink-0 [&>div>span:first-child]:pt-0 [&>div>span:last-child]:flex [&>div>span:last-child]:min-w-0 [&>div>span:last-child]:flex-wrap [&>div>span:last-child]:items-center [&>div>span:last-child]:gap-x-2 [&>div>span:last-child]:gap-y-1.5 [&_span.inline-flex]:rounded-xl [&_span.inline-flex]:px-3 [&_span.inline-flex]:py-1"></div>
    </div>
@else
    <div id="{{ $modalId }}" class="hidden fixed inset-0 z-[3000]">
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

        <div class="relative flex min-h-full w-full items-center justify-center p-5 sm:p-8">
            <div class="relative w-full max-w-[54rem] rounded-[1.75rem] border border-slate-200/80 bg-white shadow-2xl dark:border-slate-700/80 dark:bg-slate-900">
                <div class="max-h-[88dvh] overflow-y-auto">
                    <div class="p-6 text-center sm:p-7">
                    <div class="{{ $modalEmojiClass }}">
                        <span aria-hidden="true">{{ $modalEmoji }}</span>
                    </div>

                    <h2 class="{{ $modalTitleClass }}">
                        {{ $modalTitle }}
                    </h2>

                    <div class="mt-4 grid w-full grid-cols-3 gap-2 sm:gap-3">
                        <div class="rounded-2xl border border-slate-200/80 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-800/80 sm:p-4">
                            <div class="text-[11px] font-bold text-slate-500 dark:text-slate-400 sm:text-xs">Correct</div>
                            <div id="finalCorrect" class="text-lg font-black text-slate-900 dark:text-white sm:text-2xl">0</div>
                        </div>
                        <div class="rounded-2xl border border-slate-200/80 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-800/80 sm:p-4">
                            <div class="text-[11px] font-bold text-slate-500 dark:text-slate-400 sm:text-xs">Time</div>
                            <div id="finalTime" class="text-lg font-black text-slate-900 dark:text-white sm:text-2xl">0</div>
                        </div>
                        <div class="rounded-2xl border border-slate-200/80 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-800/80 sm:p-4">
                            <div class="text-[11px] font-bold text-slate-500 dark:text-slate-400 sm:text-xs">Mistakes</div>
                            <div id="finalMistakes" class="text-lg font-black text-slate-900 dark:text-white sm:text-2xl">0</div>
                        </div>
                    </div>

                    <div id="resultsCorrectionCard" class="hidden mt-4 rounded-2xl border border-slate-200/80 bg-slate-50 p-4 text-left dark:border-slate-700 dark:bg-slate-800/80 sm:p-5">
                        <div class="text-[11px] font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
                            Corrections
                        </div>
                        <div id="finalCorrection" class="mt-3 text-[15px] font-bold leading-[1.55] text-slate-900 dark:text-white sm:text-base sm:leading-[1.65] [&>div]:mb-1.5 [&>div]:flex [&>div]:items-baseline [&>div]:gap-2 [&>div>span:first-child]:shrink-0 [&>div>span:first-child]:pt-0 [&>div>span:last-child]:flex [&>div>span:last-child]:min-w-0 [&>div>span:last-child]:flex-wrap [&>div>span:last-child]:items-center [&>div>span:last-child]:gap-x-2 [&>div>span:last-child]:gap-y-1.5 [&_span.inline-flex]:rounded-xl [&_span.inline-flex]:px-3 [&_span.inline-flex]:py-1"></div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2">
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
@endif
