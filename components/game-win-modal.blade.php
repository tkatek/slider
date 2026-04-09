@php
    $finalStats = [
        ['label' => 'Correct', 'id' => 'finalCorrect'],
        ['label' => 'Time', 'id' => 'finalTime'],
        ['label' => 'Mistakes', 'id' => 'finalMistakes'],
    ];
@endphp

<div id="winModal" class="hidden fixed inset-0 z-[3000]">
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

    <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
        <div class="max-h-[85dvh] w-full max-w-lg overflow-y-auto rounded-3xl border border-slate-200/70 bg-white/95 shadow-2xl dark:border-slate-700/70 dark:bg-slate-900/95">
            <div class="p-6 text-center sm:p-8">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl border border-indigo-200 bg-indigo-50 text-3xl shadow-sm dark:border-indigo-500/30 dark:bg-indigo-500/15">
                    <span aria-hidden="true">🎉</span>
                </div>

                <h2 class="text-2xl font-black text-slate-900 dark:text-white sm:text-3xl">
                    Great job!
                </h2>

                <div class="mt-5 grid w-full grid-cols-1 gap-3 sm:grid-cols-3">
                    @foreach ($finalStats as $item)
                        <div class="rounded-2xl border border-slate-200/70 bg-white/80 p-3 shadow dark:border-slate-700 dark:bg-slate-800/80">
                            <div class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ $item['label'] }}</div>
                            <div id="{{ $item['id'] }}" class="text-xl font-black text-slate-900 dark:text-white">0</div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <button type="button" id="restartBtnModal" class="game-btn w-full border border-slate-200 bg-white px-8 py-3 text-sm text-slate-900 shadow-[0_8px_22px_#0206170D] hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700">
                        Restart
                    </button>

                    <button type="button" id="continueBtnModal" class="game-btn w-full border border-white/20 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 px-8 py-3 text-sm text-white shadow-[0_10px_24px_#4F46E51A]">
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
