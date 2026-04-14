@php
    $modalId = $modalId ?? 'winModal';
    $modalTitle = $modalTitle ?? 'Done!';
    $modalTitleClass = trim((string) ($modalTitleClass ?? 'text-3xl font-black text-slate-900 dark:text-white sm:text-4xl'));
    $modalTitleAfterEmoji = $modalTitleAfterEmoji ?? true;
    $modalEmoji = $modalEmoji ?? '🎉';
    $modalEmojiClass = trim((string) ($modalEmojiClass ?? 'mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-3xl border border-indigo-200 bg-indigo-50 text-4xl shadow-sm dark:border-indigo-500/30 dark:bg-indigo-500/15'));
    $modalOverlayClass = trim((string) ($modalOverlayClass ?? 'absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60'));
    $modalWrapClass = trim((string) ($modalWrapClass ?? 'relative flex min-h-full w-full items-center justify-center p-5 sm:p-8'));
    $modalPanelClass = trim((string) ($modalPanelClass ?? 'relative w-full max-w-2xl max-h-[88dvh] overflow-y-auto rounded-[2rem] border border-slate-200/70 bg-white/95 shadow-2xl dark:border-slate-700/70 dark:bg-slate-900/95'));
    $modalContentClass = trim((string) ($modalContentClass ?? 'p-8 text-center sm:p-10'));
    $modalTopBarClass = trim((string) ($modalTopBarClass ?? 'mb-3 flex items-center justify-between gap-3 text-left'));
    $modalStats = $modalStats ?? [
        ['label' => 'Correct', 'id' => 'finalCorrect'],
        ['label' => 'Time', 'id' => 'finalTime'],
        ['label' => 'Mistakes', 'id' => 'finalMistakes'],
    ];
    $modalActions = $modalActions ?? [
        [
            'label' => 'Restart',
            'id' => 'restartBtnModal',
            'class' => 'game-btn w-full border border-slate-200 bg-white px-8 py-3 text-sm text-slate-900 shadow-[0_8px_22px_#0206170D] hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700',
        ],
        [
            'label' => 'Continue',
            'id' => 'continueBtnModal',
            'class' => 'game-btn w-full border border-white/20 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 px-8 py-3 text-sm text-white shadow-[0_10px_24px_#4F46E51A]',
        ],
    ];
    $closeButton = $closeButton ?? null;
@endphp

<div id="{{ $modalId }}" class="hidden fixed inset-0 z-[3000]">
    <div class="{{ $modalOverlayClass }}"></div>

    <div class="{{ $modalWrapClass }}">
        <div class="{{ $modalPanelClass }}">
            <div class="{{ $modalContentClass }}">
                @if($closeButton)
                    <div class="{{ $modalTopBarClass }}">
                        <h2 class="{{ $modalTitleClass }}">
                            {{ $modalTitle }}
                        </h2>
                        <button
                                @if(!empty($closeButton['id'])) id="{{ $closeButton['id'] }}" @endif
                                type="button"
                                class="{{ $closeButton['class'] ?? '' }}"
                                aria-label="{{ $closeButton['label'] ?? 'Close' }}"
                        >
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18"/>
                            </svg>
                        </button>
                    </div>
                @elseif(!$modalTitleAfterEmoji)
                    <h2 class="{{ $modalTitleClass }}">
                        {{ $modalTitle }}
                    </h2>
                @endif

                @if($modalEmoji !== '')
                    <div class="{{ $modalEmojiClass }}">
                        <span aria-hidden="true">{{ $modalEmoji }}</span>
                    </div>
                @endif

                @if($modalTitleAfterEmoji)
                    <h2 class="{{ $modalTitleClass }}">
                        {{ $modalTitle }}
                    </h2>
                @endif

                <div class="mt-6 grid w-full grid-cols-1 gap-4 sm:grid-cols-3">
                    @foreach ($modalStats as $item)
                        <div class="rounded-3xl border border-slate-200/70 bg-white/80 p-4 shadow dark:border-slate-700 dark:bg-slate-800/80 sm:p-5">
                            <div class="text-sm font-bold text-slate-500 dark:text-slate-400">{{ $item['label'] }}</div>
                            <div id="{{ $item['id'] }}" class="text-2xl font-black text-slate-900 dark:text-white sm:text-3xl">0</div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    @foreach ($modalActions as $action)
                        <button
                                type="{{ $action['type'] ?? 'button' }}"
                                @if(!empty($action['id'])) id="{{ $action['id'] }}" @endif
                                class="{{ $action['class'] ?? '' }}"
                                @if(!empty($action['onclick'])) onclick="{{ $action['onclick'] }}" @endif
                        >
                            {{ $action['label'] ?? '' }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
