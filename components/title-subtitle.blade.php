@php
    $subtitleBubble = $subtitleBubble ?? '';
    $gameTitle = $title ?? ($content['title'] ?? '');
    $gameSubtitle = $subtitle ?? ($content['subtitle'] ?? '');
    $gameTitleClass = $titleClass ?? ($content['title_class'] ?? 'text-4xl md:text-5xl lg:text-6xl');
@endphp

<div class="header-spacing my-4 space-y-4 px-4 text-center sm:my-5 sm:px-6 lg:px-8">
    <h1 class="mb-3 {{ $gameTitleClass }} font-black tracking-tight">
        <span class=" bg-clip-text text-transparent {{$theme['primary_color']}}">
            {{ $gameTitle }}
        </span>
    </h1>

    @if($gameSubtitle !== '')
        <p class="text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-[1.15rem]">
            {!! $gameSubtitle !!}
        </p>
    @endif

    @if($subtitleBubble !== '')
        <div class="ddb-subtitle-bubble">
            {{ $subtitleBubble }}
        </div>
    @endif
</div>
