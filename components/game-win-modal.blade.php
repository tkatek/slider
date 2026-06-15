@php
    $modalId = $modalId ?? 'winModal';
    $modalTitle = $modalTitle ?? 'Done!';
    $modalTitleClass = trim((string) ($modalTitleClass ?? 'text-2xl font-black tracking-tight text-slate-950 dark:text-white sm:text-3xl'));
    $modalTitleAfterEmoji = $modalTitleAfterEmoji ?? true;
    $modalEmoji = $modalEmoji ?? '';
    $modalEmojiHtml = $modalEmojiHtml ?? '&#127881;';
    $modalEmojiClass = trim((string) ($modalEmojiClass ?? 'game-win-emoji mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl border text-3xl shadow-lg shadow-slate-950/10 sm:h-20 sm:w-20 sm:text-4xl'));
    $modalOverlayClass = trim((string) ($modalOverlayClass ?? 'game-win-overlay absolute inset-0 bg-slate-950/45 backdrop-blur-md dark:bg-black/65'));
    $modalWrapClass = trim((string) ($modalWrapClass ?? 'relative flex min-h-full w-full items-center justify-center p-5 sm:p-8'));
    $modalPanelClass = trim((string) ($modalPanelClass ?? 'game-win-panel relative w-full max-w-2xl max-h-[88dvh] overflow-y-auto rounded-[1.75rem] border bg-white/95 shadow-2xl shadow-slate-950/20 ring-1 ring-white/70 dark:bg-slate-950/95 dark:shadow-black/30 dark:ring-white/10'));
    $modalContentClass = trim((string) ($modalContentClass ?? 'p-6 text-center sm:p-8'));
    $modalTopBarClass = trim((string) ($modalTopBarClass ?? 'mb-3 flex items-center justify-between gap-3 text-left'));
    $modalExtraView = trim((string) ($modalExtraView ?? ''));
    $modalExtraData = is_array($modalExtraData ?? null) ? $modalExtraData : [];
    $modalStats = $modalStats ?? [
        ['label' => 'Correct', 'id' => 'finalCorrect', 'icon_class' => 'fa-solid fa-check'],
        ['label' => 'Time', 'id' => 'finalTime', 'icon_class' => 'fa-regular fa-clock'],
        ['label' => 'Mistakes', 'id' => 'finalMistakes', 'icon_class' => 'fa-solid fa-xmark'],
    ];
    $modalActions = $modalActions ?? [
        [
            'label' => 'Restart',
            'id' => 'restartBtnModal',
            'class' => 'game-win-action game-win-secondary-action w-full',
        ],
        [
            'label' => 'Continue',
            'id' => 'continueBtnModal',
            'class' => 'game-win-action game-win-primary-action w-full',
        ],
    ];
    $closeButton = $closeButton ?? null;
@endphp

<style>
    #{{ $modalId }} .game-win-panel {
        border-color: rgba(226, 232, 240, .78);
        background:
            radial-gradient(circle at 50% 0%, rgba(99, 102, 241, .10), transparent 38%),
            rgba(255, 255, 255, .96);
    }

    .dark #{{ $modalId }} .game-win-panel {
        border-color: rgba(148, 163, 184, .22);
        background:
            radial-gradient(circle at 50% 0%, rgba(99, 102, 241, .20), transparent 42%),
            radial-gradient(circle at 100% 100%, rgba(34, 197, 94, .08), transparent 36%),
            rgba(15, 23, 42, .96);
        box-shadow: 0 28px 80px -34px rgba(0, 0, 0, .9);
    }

    .dark #{{ $modalId }} .game-win-overlay {
        background: rgba(2, 6, 23, .70);
    }

    #{{ $modalId }} .game-win-emoji {
        color: #fff;
        border-color: rgba(255, 255, 255, .5);
        background: var(--top-bar-gradient);
    }

    #{{ $modalId }} .game-win-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 3rem;
        border-radius: 1rem;
        padding: .75rem 1rem;
        font-size: .875rem;
        font-weight: 900;
        transition: transform .18s ease, box-shadow .18s ease, filter .18s ease, background-color .18s ease;
    }

    #{{ $modalId }} .game-win-action:hover {
        transform: translateY(-1px);
    }

    #{{ $modalId }} .game-win-action:active {
        transform: translateY(0) scale(.98);
    }

    #{{ $modalId }} .game-win-primary-action {
        color: #fff;
        border: 1px solid rgba(255, 255, 255, .28);
        background: var(--top-bar-gradient);
        box-shadow: 0 14px 28px -18px rgba(15, 23, 42, .7);
    }

    #{{ $modalId }} .game-win-primary-action:hover {
        filter: saturate(1.08) brightness(1.03);
        box-shadow: 0 18px 34px -20px rgba(15, 23, 42, .76);
    }

    #{{ $modalId }} .game-win-secondary-action {
        color: rgb(51, 65, 85);
        border: 1px solid rgba(203, 213, 225, .86);
        background: rgba(255, 255, 255, .84);
        box-shadow: 0 10px 24px -22px rgba(15, 23, 42, .48);
    }

    #{{ $modalId }} .game-win-secondary-action:hover {
        background: rgba(248, 250, 252, .96);
    }

    .dark #{{ $modalId }} .game-win-secondary-action {
        color: rgb(241, 245, 249);
        border-color: rgba(148, 163, 184, .28);
        background: rgba(30, 41, 59, .56);
    }

    .dark #{{ $modalId }} .game-win-secondary-action:hover {
        background: rgba(51, 65, 85, .66);
    }

    #{{ $modalId }} .game-win-stat-card {
        border: 1px solid rgba(226, 232, 240, .86);
        background:
            linear-gradient(180deg, rgba(255, 255, 255, .96), rgba(248, 250, 252, .88));
        box-shadow: 0 14px 30px -25px rgba(15, 23, 42, .55);
    }

    .dark #{{ $modalId }} .game-win-stat-card {
        border-color: rgba(148, 163, 184, .24);
        background:
            linear-gradient(180deg, rgba(30, 41, 59, .82), rgba(15, 23, 42, .74));
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, .06),
            0 18px 34px -28px rgba(0, 0, 0, .9);
    }

    #{{ $modalId }} .game-win-stat-label {
        color: rgb(100, 116, 139);
    }

    .dark #{{ $modalId }} .game-win-stat-label {
        color: rgb(203, 213, 225);
    }

    #{{ $modalId }} .game-win-stat-value {
        color: rgb(15, 23, 42);
    }

    .dark #{{ $modalId }} .game-win-stat-value {
        color: rgb(248, 250, 252);
        text-shadow: 0 1px 18px rgba(255, 255, 255, .08);
    }
</style>

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

                @if($modalEmoji !== '' || $modalEmojiHtml !== '')
                    <div class="{{ $modalEmojiClass }}">
                        <span aria-hidden="true">
                            @if($modalEmoji !== '')
                                {{ $modalEmoji }}
                            @else
                                {!! $modalEmojiHtml !!}
                            @endif
                        </span>
                    </div>
                @endif

                @if($modalTitleAfterEmoji)
                    <h2 class="{{ $modalTitleClass }}">
                        {{ $modalTitle }}
                    </h2>
                @endif

                <div class="mt-6 grid w-full grid-cols-1 gap-3 sm:grid-cols-3">
                    @foreach ($modalStats as $item)
                        <div class="game-win-stat-card rounded-2xl p-4">
                            <div class="game-win-stat-label flex items-center justify-center gap-1.5 text-xs font-black uppercase tracking-[0.12em]">
                                @if(!empty($item['icon_class']))
                                    <i class="{{ $item['icon_class'] }} text-[0.9em]" aria-hidden="true"></i>
                                @elseif(!empty($item['icon']))
                                    <span class="text-sm leading-none" aria-hidden="true">{{ $item['icon'] }}</span>
                                @endif
                                <span>{{ $item['label'] }}</span>
                            </div>
                            <div id="{{ $item['id'] }}" class="game-win-stat-value mt-1 text-2xl font-black leading-none sm:text-3xl">0</div>
                        </div>
                    @endforeach
                </div>

                @if($modalExtraView !== '')
                    @include($modalExtraView, $modalExtraData)
                @endif

                <div class="mt-7 grid grid-cols-1 gap-3 sm:grid-cols-2">
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
