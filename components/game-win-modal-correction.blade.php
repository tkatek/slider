@php
    $modalId = $modalId ?? 'winModal';
    $modalTitle = $modalTitle ?? 'Done!';
    $modalTitleClass = trim((string) ($modalTitleClass ?? 'text-2xl font-black tracking-tight text-slate-950 dark:text-white sm:text-3xl'));
    $modalEmoji = $modalEmoji ?? '🎉';
    $modalEmojiHtml = $modalEmojiHtml ?? '';
    $continueThemeClass = trim((string) (($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500')));
    $sectionOnly = !empty($section_only);

    $modalStats = $modalStats ?? [
        ['label' => 'Correct', 'id' => 'finalCorrect', 'icon_class' => 'fa-solid fa-check'],
        ['label' => 'Time', 'id' => 'finalTime', 'icon_class' => 'fa-regular fa-clock'],
        ['label' => 'Mistakes', 'id' => 'finalMistakes', 'icon_class' => 'fa-solid fa-xmark'],
    ];
@endphp

@if($sectionOnly)
    <div id="resultsCorrectionCard" class="hidden mt-4 rounded-2xl border border-slate-200/80 bg-white p-3 text-left shadow-sm backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-900 sm:p-4">
        <div class="text-[11px] font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
            Corrections
        </div>
        <div
                id="finalCorrection"
                class="mt-2 max-h-[42dvh] overflow-y-auto pr-1 text-sm font-bold leading-[1.45] text-slate-900 dark:text-white sm:text-[15px] sm:leading-[1.5]
                   [&>div]:mb-0 [&>div]:flex [&>div]:items-start [&>div]:gap-2 [&>div]:border-b [&>div]:border-slate-200/70 [&>div]:py-1.5 [&>div]:last:border-b-0 [&>div]:dark:border-slate-700/60
                   [&>div>span:first-child]:shrink-0 [&>div>span:first-child]:pt-0.5 [&>div>span:last-child]:block [&>div>span:last-child]:min-w-0 [&>div>span:last-child]:leading-[1.55]
                   [&_span.inline-flex]:!bg-transparent [&_span.inline-flex]:!px-1 [&_span.inline-flex]:!py-0 [&_span.inline-flex]:!shadow-none [&_span.inline-flex]:!ring-0 [&_span.inline-flex]:font-black"
        ></div>
    </div>
@else
    <div id="{{ $modalId }}" class="hidden fixed inset-0 z-[3000]">
        <div class="absolute inset-0 bg-slate-950/55 backdrop-blur-sm dark:bg-black/75"></div>

        <div class="relative flex min-h-full w-full items-center justify-center p-3 sm:p-6 lg:p-8">
            <div class="relative flex max-h-[calc(100dvh-1.5rem)] w-full max-w-2xl flex-col overflow-hidden rounded-[1.75rem] border border-slate-200/80 bg-white shadow-2xl shadow-slate-950/20 ring-1 ring-white/70 dark:border-slate-700/70 dark:bg-slate-950 dark:shadow-black/40 dark:ring-white/10 sm:max-h-[88dvh]">
                <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_50%_0%,rgba(99,102,241,0.06),transparent_36%)] dark:bg-[radial-gradient(circle_at_50%_0%,rgba(99,102,241,0.10),transparent_40%)]"></div>

                <div class="relative z-[1] flex max-h-[calc(100dvh-1.5rem)] min-h-0 flex-col p-4 sm:max-h-[88dvh] sm:p-6">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex min-w-0 items-center gap-3 text-left">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-slate-200/80 bg-slate-50 text-2xl shadow-sm dark:border-slate-700/70 dark:bg-slate-900 sm:h-14 sm:w-14 sm:text-3xl">
                                <span aria-hidden="true">
                                    @if($modalEmoji !== '')
                                        {{ $modalEmoji }}
                                    @else
                                        {!! $modalEmojiHtml !!}
                                    @endif
                                </span>
                            </div>

                            <h2 class="{{ $modalTitleClass }}">
                                {{ $modalTitle }}
                            </h2>
                        </div>

                        <button
                                id="closeCorrectionModalBtn"
                                type="button"
                                class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-slate-200/80 bg-white text-slate-500 shadow-sm transition hover:bg-slate-50 hover:text-slate-900 active:scale-95 dark:border-slate-700/70 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white"
                                aria-label="Close"
                        >
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18"/>
                            </svg>
                        </button>
                    </div>

                    <div class="mt-4 grid w-full grid-cols-3 gap-2 sm:mt-5 sm:gap-3">
                        @foreach ($modalStats as $item)
                            <div class="rounded-2xl border border-slate-200/80 bg-white p-3 text-center shadow-[0_14px_30px_-25px_rgba(15,23,42,.55)] dark:border-slate-700/70 dark:bg-slate-900 dark:shadow-black/30 sm:p-4">
                                <div class="flex items-center justify-center gap-1.5 text-[10px] font-black uppercase tracking-[0.12em] text-slate-500 dark:text-slate-300 sm:text-xs">
                                    @if(!empty($item['icon_class']))
                                        <i class="{{ $item['icon_class'] }} text-[0.9em]" aria-hidden="true"></i>
                                    @elseif(!empty($item['icon']))
                                        <span class="text-sm leading-none" aria-hidden="true">{{ $item['icon'] }}</span>
                                    @endif
                                    <span>{{ $item['label'] }}</span>
                                </div>
                                <div id="{{ $item['id'] }}" class="mt-1 text-2xl font-black leading-none text-slate-950 dark:text-white sm:text-3xl">0</div>
                            </div>
                        @endforeach
                    </div>

                    <div id="resultsCorrectionCard" class="hidden mt-4 min-h-0 rounded-2xl border border-slate-200/80 bg-slate-50 p-3 text-left dark:border-slate-700/70 dark:bg-slate-900 sm:p-4">
                        <div class="text-[11px] font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
                            Corrections
                        </div>
                        <div
                                id="finalCorrection"
                                class="mt-2 max-h-[34dvh] overflow-y-auto pr-1 text-sm font-bold leading-[1.45] text-slate-900 dark:text-white sm:max-h-[32dvh] sm:text-[15px] sm:leading-[1.5]
                                   [&>div]:mb-0 [&>div]:flex [&>div]:items-start [&>div]:gap-2 [&>div]:border-b [&>div]:border-slate-200/70 [&>div]:py-1.5 [&>div]:last:border-b-0 [&>div]:dark:border-slate-700/60 sm:[&>div]:py-2
                                   [&>div>span:first-child]:shrink-0 [&>div>span:first-child]:pt-0.5 [&>div>span:last-child]:block [&>div>span:last-child]:min-w-0 [&>div>span:last-child]:leading-[1.55]
                                   [&_span.inline-flex]:!bg-transparent [&_span.inline-flex]:!px-1 [&_span.inline-flex]:!py-0 [&_span.inline-flex]:!shadow-none [&_span.inline-flex]:!ring-0 [&_span.inline-flex]:font-black"
                        ></div>
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-3 sm:mt-5">
                        <button
                                id="restartBtnModal"
                                type="button"
                                class="inline-flex min-h-12 w-full items-center justify-center rounded-2xl border border-slate-200/90 bg-white px-4 py-3 text-sm font-black text-slate-800 shadow-[0_8px_22px_rgba(2,6,23,.05)] transition hover:-translate-y-0.5 hover:bg-white hover:shadow-[0_16px_34px_rgba(2,6,23,.10)] active:translate-y-0 active:scale-[.98] dark:border-slate-700/70 dark:bg-slate-900 dark:text-white dark:hover:bg-slate-800"
                        >
                            Restart
                        </button>

                        <button
                                id="continueBtnModal"
                                type="button"
                                class="{{ $continueThemeClass }} inline-flex min-h-12 w-full items-center justify-center rounded-2xl border border-white/20 px-4 py-3 text-sm font-black text-white shadow-[0_12px_26px_rgba(15,23,42,.18)] transition hover:-translate-y-0.5 hover:brightness-105 active:translate-y-0 active:scale-[.98] dark:shadow-black/30"
                        >
                            Continue
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            (function () {
                var modal = document.getElementById(@json($modalId));
                var closeButton = document.getElementById('closeCorrectionModalBtn');

                if (!modal || !closeButton) return;

                closeButton.addEventListener('click', function () {
                    modal.classList.add('hidden');
                    document.documentElement.classList.remove('overflow-hidden');
                });
            })();
        </script>
    </div>
@endif
