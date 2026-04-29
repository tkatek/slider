@php
    $subtitleBubble = $subtitleBubble ?? '';

    $gameTitle = $title ?? ($content['title'] ?? '');
    $gameSubtitle = $subtitle ?? ($content['subtitle'] ?? '');

    // Extra styled practice note
    $practiceNote = $practiceNote ?? ($content['practice_note'] ?? '');

    $gameTitleClass = $titleClass ?? ($content['title_class'] ?? 'text-4xl md:text-5xl lg:text-6xl');

    // Theme fallback
    $primaryGradient = $theme['primary_color'] ?? 'bg-gradient-to-r from-indigo-500 to-blue-500';
@endphp

<div class="header-spacing my-4 space-y-3 px-4 text-center sm:my-5 sm:px-6 lg:px-8">
    <h1 class="mb-2 {{ $gameTitleClass }} font-black tracking-tight">
        <span class="bg-clip-text text-transparent {{ $primaryGradient }}">
            {!! strip_tags($gameTitle, '<br>') !!}
        </span>
    </h1>

    @if($gameSubtitle !== '')
        <p class="mx-auto max-w-4xl text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-[1.15rem]">
            {!! $gameSubtitle !!}
        </p>
    @endif

    @if($practiceNote !== '')
        <div class="mx-auto mt-2 w-fit max-w-[min(92vw,760px)] rounded-2xl border border-slate-200/80 bg-white/75 px-4 py-2.5 text-center shadow-[0_10px_28px_rgba(15,23,42,0.06)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/50 sm:px-5 sm:py-3">
            <p class="text-sm font-extrabold leading-[1.4] tracking-[-0.01em] text-slate-700 dark:text-slate-200 sm:text-[0.95rem]">
                {!! $practiceNote !!}
            </p>
        </div>
    @endif

    @if($subtitleBubble !== '')
        <div class="ddb-subtitle-bubble">
            {{ $subtitleBubble }}
        </div>
    @endif
</div>
