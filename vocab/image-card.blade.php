@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = $content['page_title'] ?? 'Slide';
    $gridClass = trim((string) ($content['grid_class'] ?? 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-4'));
    $sentenceGridClass = trim((string) ($content['sentence_grid_class'] ?? $content['sentences_grid_class'] ?? 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4'));
    $sentences = is_array($content['sentences'] ?? null) ? array_values($content['sentences']) : [];
    $items = is_array($content['items'] ?? null) ? array_values($content['items']) : [];
    $groups = is_array($content['groups'] ?? null) ? array_values($content['groups']) : [];
    $primaryGradient = trim((string) ($theme['primary_color'] ?? 'bg-[image:var(--top-bar-gradient)]'));
    $buttonGradient = trim((string) ($theme['button_primary_color'] ?? 'bg-[image:var(--top-bar-gradient)]'));
    $requestedCardType = strtolower(trim((string) ($content['card_type'] ?? $content['type'] ?? 'auto')));
    $cardType = in_array($requestedCardType, ['auto', 'image', 'text'], true)
        ? $requestedCardType
        : 'auto';
    $requestedPopup = strtolower(trim((string) ($content['popup'] ?? '')));
    $popup = in_array($requestedPopup, ['text', 'card', 'focus'], true)
        ? $requestedPopup
        : '';
    $requestedThemePopup = strtolower(trim((string) ($theme['vocab_popup'] ?? '')));
    $imagePopupDefault = in_array($requestedThemePopup, ['text', 'card'], true)
        ? $requestedThemePopup
        : 'card';
    $requestedImageTextStyle = strtolower(trim((string) ($content['image_text_style'] ?? $content['image_card_style'] ?? 'default')));
    $imageTextStyle = in_array($requestedImageTextStyle, ['default', 'overlay'], true)
        ? $requestedImageTextStyle
        : 'default';
    $hideCardSubtitle = (bool) ($content['hide_card_subtitle'] ?? false);
    $isOrangeTheme = ($theme['name'] ?? null) === 'orange';
    $audioButtonClass = 'border-white/20 ' . $buttonGradient . ' text-white shadow-lg shadow-slate-900/10 hover:shadow-xl';
    $audioButtonIdleClass = $isOrangeTheme
        ? 'border-orange-100 bg-orange-50 text-orange-600 hover:border-orange-300 hover:bg-orange-100 dark:border-orange-400/20 dark:bg-orange-950/35 dark:text-orange-200'
        : 'border-indigo-100 bg-indigo-50 text-indigo-600 hover:border-indigo-300 hover:bg-indigo-100 dark:border-indigo-400/20 dark:bg-indigo-950/35 dark:text-indigo-200';
    $groupTitleShellClass = $isOrangeTheme
        ? 'border-orange-100 bg-orange-50/85 ring-orange-100/80 dark:border-orange-400/20 dark:bg-orange-950/25 dark:ring-orange-400/20'
        : 'border-indigo-100 bg-indigo-50/85 ring-indigo-100/80 dark:border-indigo-400/20 dark:bg-indigo-950/25 dark:ring-indigo-400/20';
    $splitLeadingEmoji = static function (string $value): array {
        $value = trim($value);

        if (preg_match('/^([\x{1F000}-\x{1FAFF}\x{2190}-\x{21FF}\x{2300}-\x{23FF}\x{25A0}-\x{27BF}\x{FE0F}\x{200D}]+)\s*(.*)$/u', $value, $match)) {
            return [
                'emoji' => trim($match[1] ?? ''),
                'text' => trim($match[2] ?? ''),
            ];
        }

        return [
            'emoji' => '',
            'text' => $value,
        ];
    };
    $makeGridComfortable = static function (string $value): string {
        $value = trim($value);
        $value = str_replace('xl:grid-cols-6', 'xl:grid-cols-5 min-[1500px]:grid-cols-6', $value);
        $value = str_replace('lg:grid-cols-6', 'lg:grid-cols-5 min-[1500px]:grid-cols-6', $value);

        return $value;
    };
    $capitalizeFirst = static function (string $value): string {
        $value = trim($value);

        if ($value === '') {
            return '';
        }

        if (preg_match('/^(<[^>]+>\s*)+/u', $value, $match)) {
            $prefix = $match[0];
            $rest = mb_substr($value, mb_strlen($prefix));

            return $prefix . mb_strtoupper(mb_substr($rest, 0, 1)) . mb_substr($rest, 1);
        }

        return mb_strtoupper(mb_substr($value, 0, 1)) . mb_substr($value, 1);
    };

    $groupSections = [];

    if ($sentences !== []) {
        $groupSections[] = [
            'key' => 'sentence-group',
            'title' => trim((string) ($content['sentence_group_title'] ?? $content['sentences_title'] ?? '')),
            'sound' => trim((string) ($content['sentence_group_sound'] ?? $content['sentences_sound'] ?? '')),
            'grid_class' => $sentenceGridClass,
            'items' => $sentences,
        ];
    }

    foreach ($groups as $index => $group) {
        if (!is_array($group)) {
            continue;
        }

        $groupItems = is_array($group['items'] ?? null) ? array_values($group['items']) : [];

        if ($groupItems === []) {
            continue;
        }

        $groupSections[] = [
            'key' => (string) ($group['key'] ?? ('group-' . $index)),
            'title' => trim((string) ($group['title'] ?? '')),
            'sound' => trim((string) ($group['sound'] ?? $group['audio'] ?? '')),
            'grid_class' => trim((string) ($group['grid_class'] ?? $gridClass)),
            'items' => $groupItems,
        ];
    }

    if ($groupSections === [] && $items !== []) {
        $groupSections[] = [
            'key' => 'group-0',
            'title' => '',
            'sound' => '',
            'grid_class' => $gridClass,
            'items' => $items,
        ];
    }
@endphp

@section('title', $pageTitle)

@section('content')
    <div class="relative flex min-h-[100dvh] w-full items-start overflow-x-hidden overflow-y-auto lg:items-center">
        <main class="mx-auto w-full max-w-[1440px] px-4 pb-16 pt-8 sm:px-8 sm:pb-20 sm:pt-10 lg:-mt-2 lg:pt-12">
            @include('slider.components.title-subtitle')

            <div class="mt-6 flex flex-col gap-6 sm:mt-8 sm:gap-8 lg:gap-9">
                @foreach($groupSections as $group)
                    <section class="w-full" data-group-key="{{ $group['key'] }}">
                        <div class="mx-auto w-full max-w-[92rem]">
                            @if($group['title'] !== '')
                                @php
                                    $groupTitleParts = $splitLeadingEmoji($group['title']);
                                    $groupTitleEmoji = $groupTitleParts['emoji'];
                                    $groupTitleText = $groupTitleParts['text'];
                                @endphp
                                <h2 class="mb-4 inline-flex w-fit max-w-full items-center gap-2 rounded-2xl border px-3 py-1.5 text-left text-base font-black leading-tight shadow-sm ring-1 sm:text-lg {{ $groupTitleShellClass }}">
                                    @if($groupTitleEmoji !== '')
                                        <span class="shrink-0 text-base leading-none sm:text-lg">{{ $groupTitleEmoji }}</span>
                                    @else
                                        <span class="h-2.5 w-2.5 shrink-0 rounded-full {{ $primaryGradient }}"></span>
                                    @endif

                                    <span class="min-w-0 bg-clip-text text-transparent {{ $primaryGradient }}">
                                        {{ $groupTitleText }}
                                    </span>
                                </h2>
                            @endif

                            <div class="mx-auto grid w-full auto-rows-fr justify-center gap-3 sm:gap-4 lg:gap-5 {{ $makeGridComfortable($group['grid_class']) }}">
                                @foreach($group['items'] as $item)
                                    @php
                                        $item = is_array($item) ? $item : [];
                                        $popupGroupTitle = trim((string) ($group['title'] ?? ''));
                                        $popupGroupSound = trim((string) ($group['sound'] ?? ''));
                                        $popupGroupParts = $splitLeadingEmoji($popupGroupTitle);
                                        $popupGroupEmoji = $popupGroupParts['emoji'];
                                        $popupGroupText = $popupGroupParts['text'];
                                        $text = trim((string) ($item['text_html'] ?? $item['html'] ?? $item['text'] ?? $item['label'] ?? $item['title'] ?? $item['name'] ?? ''));
                                        $displayText = $capitalizeFirst($text);
                                        $plainText = trim(html_entity_decode(strip_tags($text), ENT_QUOTES, 'UTF-8'));
                                        $subtitle = trim((string) ($item['subtitle'] ?? $item['description'] ?? ''));
                                        $displaySubtitle = $capitalizeFirst($subtitle);
                                        $description = trim((string) ($item['description'] ?? ''));
                                        $example = trim((string) ($item['example_subtitle'] ?? $item['example'] ?? $item['sentence'] ?? ''));
                                        $displayExample = $capitalizeFirst($example);
                                        $emoji = trim((string) ($item['emoji'] ?? ''));
                                        $image = trim((string) ($item['image'] ?? ''));
                                        $hasImage = $image !== '';
                                        $itemCardType = $cardType === 'auto' ? ($hasImage ? 'image' : 'text') : $cardType;
                                        $usesImageLayout = $itemCardType === 'image' && $hasImage;
                                        $usesImageOverlay = $usesImageLayout && $imageTextStyle === 'overlay';
                                        $itemPopup = $popup !== '' ? $popup : ($itemCardType === 'text' ? 'focus' : $imagePopupDefault);

                                        if (!$usesImageLayout && $itemPopup === 'card') {
                                            $itemPopup = 'focus';
                                        }

                                        $sound = trim((string) ($item['sound'] ?? $item['audio'] ?? ''));
                                        $script = trim((string) ($item['script'] ?? ''));
                                        $fallbackLetter = mb_substr($plainText !== '' ? $plainText : '?', 0, 1);
                                        $detailParts = array_values(array_filter([
                                            $subtitle,
                                            $description !== $subtitle ? $description : '',
                                        ]));

                                        if ($script === '') {
                                            $script = trim(implode(' ', $detailParts));
                                        }

                                        if ($script === '') {
                                            $script = $text;
                                        }
                                    @endphp

                                    <article
                                            role="button"
                                            tabindex="0"
                                            class="vocab-card group relative flex w-full max-w-[28rem] justify-self-center min-w-0 cursor-pointer select-none flex-col overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/75 shadow-[0_18px_38px_-24px_rgba(15,23,42,0.38)] ring-2 ring-slate-200/75 outline-none backdrop-blur-2xl transition-all duration-300 sm:hover:-translate-y-1 sm:hover:scale-[1.01] sm:hover:border-slate-300/90 sm:hover:ring-slate-300/90 sm:hover:shadow-[0_26px_54px_-28px_rgba(2,6,23,0.30)] focus-visible:ring-4 focus-visible:ring-cyan-400/25 dark:border-white/10 dark:bg-slate-900/80 dark:ring-white/10 dark:shadow-[0_18px_40px_-26px_rgba(0,0,0,0.68)] dark:hover:ring-white/20 {{ $usesImageLayout ? ($usesImageOverlay ? 'aspect-[5/4]' : '') : 'min-h-[6.5rem] px-3.5 py-3.5 sm:min-h-[7.2rem] sm:px-5 sm:py-5' }}"
                                            data-card-type="{{ $itemCardType }}"
                                            data-popup="{{ $itemPopup }}"
                                            data-image-layout="{{ $usesImageLayout ? '1' : '0' }}"
                                            data-image-text-style="{{ $usesImageOverlay ? 'overlay' : 'default' }}"
                                            data-title="{{ $plainText }}"
                                            data-title-html="{{ $displayText }}"
                                            data-subtitle="{{ $displaySubtitle }}"
                                            data-script="{{ $script }}"
                                            data-example="{{ $displayExample }}"
                                            data-audio="{{ $sound }}"
                                            data-image="{{ $image }}"
                                            data-emoji="{{ $emoji }}"
                                            data-group-title="{{ $popupGroupTitle }}"
                                            data-group-emoji="{{ $popupGroupEmoji }}"
                                            data-group-text="{{ $popupGroupText }}"
                                            data-group-audio="{{ $popupGroupSound }}"
                                    >
                                        @if($usesImageLayout)
                                            <div class="relative flex {{ $usesImageOverlay ? 'h-full' : 'aspect-[5/4]' }} items-center justify-center overflow-hidden bg-slate-100 dark:bg-slate-800">
                                                <img
                                                        src="{{ $image }}"
                                                        alt="{{ $plainText }}"
                                                        loading="lazy"
                                                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                                                >

                                                @if($usesImageOverlay)
                                                    <div class="absolute inset-x-0 bottom-0 z-[1] bg-gradient-to-t from-white/95 via-white/70 to-transparent px-3 pb-3 pt-14 dark:from-slate-950/95 dark:via-slate-950/70 sm:px-3.5 sm:pb-3.5 sm:pt-16">
                                                        <p class="min-w-0 break-words text-sm font-extrabold leading-tight text-neutral-900 dark:text-slate-100 sm:text-base">
                                                            {!! $displayText !!}
                                                            @if($emoji !== '')
                                                                <span class="relative -top-[0.06em] ml-1.5 inline-block text-[0.98em] leading-none align-middle">{{ $emoji }}</span>
                                                            @endif
                                                        </p>

                                                        @if(!$hideCardSubtitle && $subtitle !== '')
                                                            <p class="mt-1 line-clamp-2 text-xs font-bold leading-snug text-slate-600 dark:text-slate-300 sm:text-sm">
                                                                {!! $displaySubtitle !!}
                                                            </p>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        @endif

                                        @if($sound !== '' && $usesImageLayout)
                                            <button
                                                    type="button"
                                                    class="speak-btn absolute right-2.5 top-2.5 z-10 inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full border bg-white/90 shadow-sm backdrop-blur transition-all duration-300 hover:-rotate-6 hover:scale-[1.06] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-cyan-300/35 dark:bg-slate-900/85 sm:right-3 sm:top-3 sm:h-9 sm:w-9 {{ $audioButtonIdleClass }}"
                                                    data-audio-style="image"
                                                    aria-label="Play audio"
                                            >
                                                <svg class="js-static-icon h-3.5 w-3.5 sm:h-4 sm:w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                </svg>

                                                <span class="js-wave-wrap hidden items-center gap-0.5" aria-hidden="true">
                                                <span class="h-1.5 w-[2px] animate-pulse rounded-full bg-current"></span>
                                                <span class="h-3 w-[2px] animate-pulse rounded-full bg-current [animation-delay:120ms]"></span>
                                                <span class="h-2 w-[2px] animate-pulse rounded-full bg-current [animation-delay:240ms]"></span>
                                            </span>
                                            </button>
                                        @endif

                                        @if($usesImageLayout)
                                            @if(!$usesImageOverlay)
                                                <div class="min-h-[2.75rem] bg-white px-2.5 py-2 transition-colors duration-300 dark:bg-slate-900 sm:min-h-[3rem] sm:px-3.5 sm:py-3 lg:px-4">
                                                    <div class="min-w-0 flex-1">
                                                        <p class="min-w-0 break-words text-sm font-extrabold leading-tight text-neutral-900 dark:text-slate-100 sm:text-[0.95rem] lg:text-base">
                                                            {!! $displayText !!}
                                                            @if($emoji !== '')
                                                                <span class="relative -top-[0.06em] ml-1.5 inline-block text-[0.98em] leading-none align-middle">{{ $emoji }}</span>
                                                            @endif
                                                        </p>

                                                        @if(!$hideCardSubtitle && $subtitle !== '')
                                                            <p class="mt-1.5 break-words text-xs font-bold leading-snug text-slate-500 dark:text-slate-300 sm:text-sm">
                                                                {!! $displaySubtitle !!}
                                                            </p>
                                                        @endif

                                                        @if($example !== '')
                                                            <p class="mt-2 break-words rounded-xl border border-slate-100 bg-slate-50 px-2.5 py-1.5 text-[11px] font-bold leading-snug text-slate-500 dark:border-slate-700 dark:bg-slate-800/70 dark:text-slate-300 sm:text-xs">
                                                                {!! $displayExample !!}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <div class="flex w-full items-center justify-between gap-3">
                                                <div class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-base leading-none shadow-sm ring-1 ring-slate-200/70 dark:bg-slate-800 dark:ring-slate-700 sm:h-8 sm:w-8 sm:text-lg">
                                                    {{ $emoji !== '' ? $emoji : $fallbackLetter }}
                                                </div>

                                                @if($sound !== '')
                                                    <button
                                                            type="button"
                                                            class="speak-btn inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full border bg-white/90 shadow-sm backdrop-blur transition-all duration-300 hover:-rotate-6 hover:scale-[1.06] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-cyan-300/35 sm:h-9 sm:w-9 {{ $audioButtonClass }}"
                                                            data-audio-style="sentence"
                                                            aria-label="Play audio"
                                                    >
                                                        <svg class="js-static-icon h-3.5 w-3.5 sm:h-4 sm:w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                        </svg>

                                                        <span class="js-wave-wrap hidden items-center gap-0.5" aria-hidden="true">
                                                        <span class="h-1.5 w-[2px] animate-pulse rounded-full bg-current"></span>
                                                        <span class="h-3 w-[2px] animate-pulse rounded-full bg-current [animation-delay:120ms]"></span>
                                                        <span class="h-2 w-[2px] animate-pulse rounded-full bg-current [animation-delay:240ms]"></span>
                                                    </span>
                                                    </button>
                                                @endif
                                            </div>

                                            <div class="mt-3 min-w-0 flex-1">
                                                <p class="min-w-0 break-words text-sm font-extrabold leading-tight text-slate-900 dark:text-slate-100 sm:text-[0.95rem] lg:text-base">
                                                    {!! $displayText !!}
                                                </p>

                                                @if(!$hideCardSubtitle && $subtitle !== '')
                                                    <p class="mt-1.5 break-words text-xs font-bold leading-snug text-slate-500 dark:text-slate-300 sm:text-sm">
                                                        {!! $displaySubtitle !!}
                                                    </p>
                                                @endif

                                                @if($example !== '')
                                                    <p class="mt-2 break-words rounded-xl border border-slate-100 bg-slate-50 px-2.5 py-1.5 text-[11px] font-bold leading-snug text-slate-500 dark:border-slate-700 dark:bg-slate-800/70 dark:text-slate-300 sm:text-xs">
                                                        {!! $displayExample !!}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif

                                        <div class="playing-indicator absolute bottom-0 left-0 h-1 w-full origin-left scale-x-0 {{ $buttonGradient }}"></div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        </main>

        <div
                id="imageCardSubtitleOverlay"
                class="pointer-events-none fixed bottom-4 left-1/2 z-[100] max-h-[30dvh] w-[calc(100%-1.5rem)] -translate-x-1/2 translate-y-4 scale-95 overflow-y-auto rounded-2xl border border-white/60 bg-white/85 px-3 py-2.5 text-center opacity-0 shadow-2xl shadow-slate-900/10 backdrop-blur-2xl transition-all duration-300 sm:bottom-9 sm:max-h-[34dvh] sm:w-auto sm:min-w-[42rem] sm:max-w-[82vw] sm:rounded-[1.5rem] sm:px-7 sm:py-4 dark:border-white/10 dark:bg-slate-900/85"
        >
            <p id="imageCardSubtitleText" class="text-sm font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-2xl sm:leading-[1.35]"></p>
        </div>

        <div
                id="imageCardDetailOverlay"
                class="pointer-events-none invisible fixed inset-0 z-[110] flex items-end justify-center bg-slate-950/45 px-3 py-3 opacity-0 backdrop-blur-sm transition-opacity duration-200 sm:items-center sm:px-4 sm:py-6"
                aria-hidden="true"
        >
            <article class="relative w-full max-w-[35rem] translate-y-3 scale-95 overflow-hidden rounded-[1.85rem] border border-white/80 bg-white p-2.5 shadow-2xl shadow-slate-950/25 transition-all duration-200 dark:border-white/10 dark:bg-slate-950 sm:p-3 md:max-w-[48rem] md:rounded-[2rem]">
                <button
                        id="imageCardDetailClose"
                        type="button"
                        class="absolute right-3 top-3 z-10 inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-500 shadow-sm ring-1 ring-slate-200/80 backdrop-blur transition hover:bg-slate-950 hover:text-white focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-cyan-300/30 dark:bg-slate-900/90 dark:text-slate-300 dark:ring-slate-700/80 dark:hover:bg-white dark:hover:text-slate-950 sm:right-4 sm:top-4"
                        aria-label="Close"
                >
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M6 6l12 12M18 6L6 18"/>
                    </svg>
                </button>

                <div class="max-h-[82dvh] overflow-y-auto pr-1 sm:max-h-[86dvh] md:max-h-none md:overflow-visible md:pr-0">
                    <div class="grid gap-4 md:grid-cols-2 md:items-stretch md:gap-4">
                        <div id="imageCardDetailImageWrap" class="hidden aspect-[5/4] max-h-[38dvh] overflow-hidden rounded-[1.45rem] bg-slate-100 dark:bg-slate-800 md:max-h-[17.5rem]">
                            <img id="imageCardDetailImage" src="" alt="" class="h-full w-full object-cover">
                        </div>

                        <div class="flex min-w-0 flex-col justify-center gap-3 px-1 pb-1 pt-9 sm:gap-4 md:min-h-[17.5rem] md:px-3 md:pb-3 md:pl-2 md:pr-9 md:pt-8">
                            <div class="min-w-0">
                                <div id="imageCardDetailGroupWrap" class="mb-3 hidden">
                                    <div class="inline-flex w-fit max-w-full items-center gap-2 rounded-2xl border px-3 py-1.5 text-left text-sm font-black leading-tight shadow-sm ring-1 sm:text-base {{ $groupTitleShellClass }}">
                                        <span id="imageCardDetailGroupEmoji" class="hidden shrink-0 text-base leading-none sm:text-lg"></span>
                                        <span id="imageCardDetailGroupDot" class="h-2.5 w-2.5 shrink-0 rounded-full {{ $primaryGradient }}"></span>
                                        <span id="imageCardDetailGroupText" class="min-w-0 bg-clip-text text-transparent {{ $primaryGradient }}"></span>
                                    </div>
                                </div>

                                <span id="imageCardDetailEmoji" class="mb-3 hidden h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-2xl leading-none shadow-sm ring-1 ring-slate-200/80 dark:bg-slate-900 dark:ring-slate-700 sm:h-12 sm:w-12 sm:text-[1.7rem]"></span>

                                <div class="mb-3 min-w-0">
                                    <h2 class="min-w-0 text-2xl font-black leading-tight text-slate-900 dark:text-white sm:text-3xl">
                                        <span id="imageCardDetailTitle"></span>
                                        <span id="imageCardDetailInlineEmoji" class="relative -top-[0.04em] ml-1.5 hidden text-[0.8em] leading-none align-middle"></span>
                                    </h2>
                                </div>

                                <div id="imageCardDetailSubtitleWrap" class="hidden">
                                    <div id="imageCardDetailSubtitle" class="text-base font-bold leading-snug text-slate-500 dark:text-slate-300 sm:text-lg"></div>
                                </div>

                                <div id="imageCardDetailExampleWrap" class="mt-3 hidden rounded-2xl border border-slate-200 bg-slate-50/90 px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                                    <div id="imageCardDetailExample" class="text-sm font-bold leading-snug text-slate-600 dark:text-slate-200 sm:text-base"></div>
                                </div>
                            </div>

                            <button
                                    id="imageCardDetailAudio"
                                    type="button"
                                    class="speak-btn hidden h-10 w-10 shrink-0 items-center justify-center rounded-full border bg-white/90 shadow-sm backdrop-blur transition-all duration-300 hover:-rotate-6 hover:scale-[1.06] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-cyan-300/35 sm:h-11 sm:w-11 {{ $audioButtonClass }}"
                                    data-audio-style="sentence"
                                    aria-label="Play audio"
                            >
                                <svg class="js-static-icon h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                </svg>

                                <span class="js-wave-wrap hidden items-center gap-0.5" aria-hidden="true">
                                    <span class="h-2 w-[2px] animate-pulse rounded-full bg-current"></span>
                                    <span class="h-4 w-[2px] animate-pulse rounded-full bg-current [animation-delay:120ms]"></span>
                                    <span class="h-3 w-[2px] animate-pulse rounded-full bg-current [animation-delay:240ms]"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                <div id="imageCardDetailProgress" class="absolute bottom-0 left-0 h-1 w-full origin-left scale-x-0 {{ $buttonGradient }}"></div>
            </article>
        </div>

        <div
                id="imageCardFocusOverlay"
                class="pointer-events-none invisible fixed inset-0 z-[120] flex items-center justify-center bg-slate-950/75 px-4 py-6 opacity-0 backdrop-blur-xl transition-opacity duration-200 sm:px-8 sm:py-8"
                aria-hidden="true"
        >
            <article class="relative max-h-[82dvh] w-full max-w-[38rem] translate-y-4 scale-95 overflow-y-auto rounded-[2rem] border border-white/80 bg-white px-5 pb-5 pt-6 shadow-2xl shadow-slate-950/30 transition-all duration-200 dark:border-white/10 dark:bg-slate-950 sm:max-w-[50rem] sm:p-8 lg:max-w-[48rem] lg:p-9">
                <button
                        id="imageCardFocusClose"
                        type="button"
                        class="absolute right-3 top-3 z-10 inline-flex h-9 w-9 items-center justify-center rounded-full bg-white text-slate-600 shadow-lg ring-1 ring-slate-200 transition hover:bg-slate-950 hover:text-white focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-cyan-300/30 dark:bg-slate-900 dark:text-slate-300 dark:ring-slate-700 dark:hover:bg-white dark:hover:text-slate-950 sm:right-4 sm:top-4"
                        aria-label="Close"
                >
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M6 6l12 12M18 6L6 18"/>
                    </svg>
                </button>

                <div id="imageCardFocusGroupWrap" class="mb-4 hidden pr-10 sm:mb-5 sm:pr-12">
                    <div class="inline-flex w-fit max-w-full items-center gap-2 rounded-2xl border px-3 py-1.5 text-left text-sm font-black leading-tight shadow-sm ring-1 sm:text-base {{ $groupTitleShellClass }}">
                        <span id="imageCardFocusGroupEmoji" class="hidden shrink-0 text-base leading-none sm:text-lg"></span>
                        <span id="imageCardFocusGroupDot" class="h-2.5 w-2.5 shrink-0 rounded-full {{ $primaryGradient }}"></span>
                        <span id="imageCardFocusGroupText" class="min-w-0 bg-clip-text text-transparent {{ $primaryGradient }}"></span>
                    </div>
                </div>

                <div class="flex min-w-0 flex-col gap-4 sm:gap-5">
                    <div class="min-w-0 pr-8 sm:pr-12">
                        <span id="imageCardFocusEmoji" class="mb-3 hidden h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-2xl leading-none shadow-sm ring-1 ring-slate-200/80 dark:bg-slate-900 dark:ring-slate-700 sm:mb-4 sm:h-14 sm:w-14 sm:text-3xl"></span>
                        <h2 id="imageCardFocusTitle" class="min-w-0 break-words font-black leading-[1.08] text-slate-900 dark:text-white sm:leading-tight"></h2>
                    </div>

                    <div id="imageCardFocusSubtitleWrap" class="hidden">
                        <div id="imageCardFocusSubtitle" class="max-w-[48rem] text-base font-bold leading-snug text-slate-500 dark:text-slate-300 sm:text-2xl"></div>
                    </div>

                    <div id="imageCardFocusExampleWrap" class="hidden max-w-[44rem] rounded-2xl border border-slate-200 bg-slate-50/90 px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70 sm:px-5 sm:py-4">
                        <div id="imageCardFocusExample" class="text-sm font-bold leading-snug text-slate-600 dark:text-slate-200 sm:text-lg"></div>
                    </div>

                    <button
                            id="imageCardFocusAudio"
                            type="button"
                            class="speak-btn hidden h-10 w-10 shrink-0 items-center justify-center rounded-full border bg-white/90 shadow-sm backdrop-blur transition-all duration-300 hover:-rotate-6 hover:scale-[1.06] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-cyan-300/35 sm:h-11 sm:w-11 {{ $audioButtonClass }}"
                            data-audio-style="sentence"
                            aria-label="Play audio"
                    >
                        <svg class="js-static-icon h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                        </svg>

                        <span class="js-wave-wrap hidden items-center gap-0.5" aria-hidden="true">
                            <span class="h-2 w-[2px] animate-pulse rounded-full bg-current"></span>
                            <span class="h-4 w-[2px] animate-pulse rounded-full bg-current [animation-delay:120ms]"></span>
                            <span class="h-3 w-[2px] animate-pulse rounded-full bg-current [animation-delay:240ms]"></span>
                        </span>
                    </button>
                </div>

                <div id="imageCardFocusProgress" class="absolute bottom-0 left-0 h-1 w-full origin-left scale-x-0 {{ $buttonGradient }}"></div>
            </article>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cards = Array.from(document.querySelectorAll(".vocab-card"));
            const overlay = document.getElementById("imageCardSubtitleOverlay");
            const subtitleText = document.getElementById("imageCardSubtitleText");
            const detailOverlay = document.getElementById("imageCardDetailOverlay");
            const detailPanel = detailOverlay?.querySelector("article");
            const detailClose = document.getElementById("imageCardDetailClose");
            const detailImageWrap = document.getElementById("imageCardDetailImageWrap");
            const detailImage = document.getElementById("imageCardDetailImage");
            const detailGroupWrap = document.getElementById("imageCardDetailGroupWrap");
            const detailGroupEmoji = document.getElementById("imageCardDetailGroupEmoji");
            const detailGroupDot = document.getElementById("imageCardDetailGroupDot");
            const detailGroupText = document.getElementById("imageCardDetailGroupText");
            const detailEmoji = document.getElementById("imageCardDetailEmoji");
            const detailInlineEmoji = document.getElementById("imageCardDetailInlineEmoji");
            const detailTitle = document.getElementById("imageCardDetailTitle");
            const detailSubtitleWrap = document.getElementById("imageCardDetailSubtitleWrap");
            const detailSubtitle = document.getElementById("imageCardDetailSubtitle");
            const detailExampleWrap = document.getElementById("imageCardDetailExampleWrap");
            const detailExample = document.getElementById("imageCardDetailExample");
            const detailAudio = document.getElementById("imageCardDetailAudio");
            const detailProgress = document.getElementById("imageCardDetailProgress");
            const focusOverlay = document.getElementById("imageCardFocusOverlay");
            const focusPanel = focusOverlay?.querySelector("article");
            const focusClose = document.getElementById("imageCardFocusClose");
            const focusGroupWrap = document.getElementById("imageCardFocusGroupWrap");
            const focusGroupEmoji = document.getElementById("imageCardFocusGroupEmoji");
            const focusGroupDot = document.getElementById("imageCardFocusGroupDot");
            const focusGroupText = document.getElementById("imageCardFocusGroupText");
            const focusTitle = document.getElementById("imageCardFocusTitle");
            const focusEmoji = document.getElementById("imageCardFocusEmoji");
            const focusSubtitleWrap = document.getElementById("imageCardFocusSubtitleWrap");
            const focusSubtitle = document.getElementById("imageCardFocusSubtitle");
            const focusExampleWrap = document.getElementById("imageCardFocusExampleWrap");
            const focusExample = document.getElementById("imageCardFocusExample");
            const focusAudio = document.getElementById("imageCardFocusAudio");
            const focusProgress = document.getElementById("imageCardFocusProgress");
            const audio = new Audio();
            const popupMode = @json($popup);
            const idleAudioClasses = @json(preg_split('/\s+/', trim($audioButtonIdleClass)));
            const activeAudioClasses = @json(preg_split('/\s+/', trim($audioButtonClass)));

            audio.preload = "auto";

            let currentCard = null;
            let currentButton = null;
            let currentSrc = "";
            let currentObjectUrl = "";
            let syncAnimationFrame = null;
            let detailCard = null;
            let focusCard = null;
            let currentAudioQueue = [];
            let currentAudioQueueIndex = 0;
            let currentSubtitleWords = [];

            const activeWordClasses = ["bg-slate-900", "text-white", "opacity-100", "scale-105", "dark:bg-slate-100", "dark:text-slate-950"];

            function splitWords(text) {
                return String(text || "").trim().split(/\s+/).filter(Boolean);
            }

            function normalizeText(text) {
                return stripHtml(text).toLowerCase();
            }

            function stripHtml(value) {
                const template = document.createElement("template");
                template.innerHTML = String(value || "");
                return (template.content.textContent || "").trim();
            }

            function escapeHtml(value) {
                return String(value || "")
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;");
            }

            function wrapSyncWords(root) {
                if (!root) return [];

                const words = [];
                const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, {
                    acceptNode(node) {
                        return node.nodeValue.trim() ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
                    }
                });
                const textNodes = [];

                while (walker.nextNode()) {
                    textNodes.push(walker.currentNode);
                }

                textNodes.forEach((node) => {
                    const fragment = document.createDocumentFragment();
                    const parts = node.nodeValue.split(/(\s+)/);

                    parts.forEach((part) => {
                        if (!part) return;

                        if (/^\s+$/.test(part)) {
                            fragment.appendChild(document.createTextNode(part));
                            return;
                        }

                        const span = document.createElement("span");
                        span.className = "word-span mx-[0.12rem] inline-block rounded-lg px-1.5 py-0.5 opacity-60 transition-all duration-200";
                        span.dataset.syncWord = "1";
                        span.dataset.index = String(words.length);
                        span.textContent = part;
                        words.push(part);
                        fragment.appendChild(span);
                    });

                    node.parentNode.replaceChild(fragment, node);
                });

                return words;
            }

            function fillHtmlOrText(element, value) {
                if (!element) return;

                const rawValue = String(value || "").trim();

                if (!rawValue) {
                    element.textContent = "";
                    return;
                }

                if (/<[a-z][\s\S]*>/i.test(rawValue)) {
                    element.innerHTML = rawValue;
                    return;
                }

                element.textContent = rawValue;
            }

            function renderSubtitle(title, titleHtml, text, example) {
                if (!subtitleText) return [];

                const rawTitle = String(titleHtml || title || "").trim();
                const titleMarkup = rawTitle
                    ? `<span data-title-host class="mb-1 mr-1 inline-block whitespace-normal rounded-xl bg-slate-100 px-3 py-1 text-slate-600 shadow-sm ring-1 ring-slate-200/70 dark:bg-slate-800 dark:text-slate-300 dark:ring-slate-700"></span>`
                    : "";
                const rawText = String(text || "").trim();
                const rawExample = String(example || "").trim();
                const exampleMarkup = rawExample
                    ? `<span data-example-host class="mt-2 block rounded-xl bg-slate-50/80 px-3 py-2 text-sm font-bold leading-snug text-slate-600 ring-1 ring-slate-200/70 dark:bg-slate-800/70 dark:text-slate-300 dark:ring-slate-700 sm:text-base"></span>`
                    : "";

                subtitleText.innerHTML = `${titleMarkup}<span data-script-host class="inline"></span>${exampleMarkup}`;

                const titleHost = subtitleText.querySelector("[data-title-host]");
                const scriptHost = subtitleText.querySelector("[data-script-host]");
                const exampleHost = subtitleText.querySelector("[data-example-host]");

                if (titleHost && rawTitle) {
                    fillHtmlOrText(titleHost, rawTitle);
                }

                if (scriptHost && rawText) {
                    fillHtmlOrText(scriptHost, rawText);
                }

                if (exampleHost && rawExample) {
                    fillHtmlOrText(exampleHost, rawExample);
                }

                return wrapSyncWords(scriptHost);
            }

            function showOverlay() {
                if (!overlay) return;

                overlay.classList.remove("opacity-0", "translate-y-4", "scale-95");
                overlay.classList.add("opacity-100", "translate-y-0", "scale-100");
            }

            function hideOverlay() {
                if (!overlay) return;

                overlay.classList.add("opacity-0", "translate-y-4", "scale-95");
                overlay.classList.remove("opacity-100", "translate-y-0", "scale-100");
            }

            function setVisible(element, shouldShow, visibleDisplay = "block") {
                if (!element) return;

                element.classList.toggle("hidden", !shouldShow);

                if (shouldShow && visibleDisplay !== "block") {
                    element.classList.add(visibleDisplay);
                } else if (!shouldShow && visibleDisplay !== "block") {
                    element.classList.remove(visibleDisplay);
                }
            }

            function setAdaptiveTextSize(element, text, shortClasses, mediumClasses, longClasses) {
                if (!element) return;

                element.classList.remove(...shortClasses, ...mediumClasses, ...longClasses);

                const length = stripHtml(text).length;
                const classes = length > 90 ? longClasses : (length > 38 ? mediumClasses : shortClasses);

                element.classList.add(...classes);
            }

            function openDetail(card) {
                if (!card || !detailOverlay) return;

                detailCard = card;
                const titleHtml = card.dataset.titleHtml || card.dataset.title || "";
                const title = card.dataset.title || "";
                const script = card.dataset.script || "";
                const subtitle = card.dataset.subtitle || (normalizeText(script) === normalizeText(title) ? "" : script);
                const example = card.dataset.example || "";
                const image = card.dataset.image || "";
                const sound = card.dataset.audio || "";
                const emoji = card.dataset.emoji || "";
                const groupTitle = card.dataset.groupTitle || "";
                const groupEmoji = card.dataset.groupEmoji || "";
                const groupText = card.dataset.groupText || groupTitle;

                fillHtmlOrText(detailTitle, titleHtml || title);
                fillHtmlOrText(detailGroupEmoji, groupEmoji);
                fillHtmlOrText(detailGroupText, groupText);
                fillHtmlOrText(detailEmoji, emoji);
                fillHtmlOrText(detailInlineEmoji, emoji);
                fillHtmlOrText(detailSubtitle, subtitle);
                fillHtmlOrText(detailExample, example);

                setAdaptiveTextSize(
                    detailTitle,
                    titleHtml || title,
                    ["text-3xl", "sm:text-4xl"],
                    ["text-2xl", "sm:text-3xl"],
                    ["text-xl", "sm:text-2xl"]
                );

                setAdaptiveTextSize(
                    detailSubtitle,
                    subtitle,
                    ["text-lg", "sm:text-xl"],
                    ["text-base", "sm:text-lg"],
                    ["text-sm", "sm:text-base"]
                );

                setAdaptiveTextSize(
                    detailExample,
                    example,
                    ["text-sm", "sm:text-base"],
                    ["text-xs", "sm:text-sm"],
                    ["text-xs", "sm:text-xs"]
                );

                if (detailImage && image) {
                    detailImage.src = image;
                    detailImage.alt = title;
                }

                setVisible(detailImageWrap, image !== "");
                setVisible(detailGroupWrap, groupTitle !== "");
                setVisible(detailGroupEmoji, groupTitle !== "" && groupEmoji !== "");
                setVisible(detailGroupDot, groupTitle !== "" && groupEmoji === "");
                setVisible(detailEmoji, emoji !== "" && groupTitle === "", "inline-flex");
                setVisible(detailInlineEmoji, emoji !== "" && groupTitle !== "", "inline");
                setVisible(detailSubtitleWrap, subtitle !== "");
                setVisible(detailExampleWrap, example !== "");
                setVisible(detailAudio, sound !== "", "inline-flex");

                detailOverlay.classList.remove("invisible", "pointer-events-none");
                detailOverlay.setAttribute("aria-hidden", "false");
                if (detailProgress) {
                    detailProgress.style.transform = currentCard === card && !audio.paused ? card.querySelector(".playing-indicator")?.style.transform || "scaleX(0)" : "scaleX(0)";
                }

                requestAnimationFrame(() => {
                    detailOverlay.classList.remove("opacity-0");
                    detailOverlay.classList.add("opacity-100");
                    detailPanel?.classList.remove("translate-y-3", "scale-95");
                    detailPanel?.classList.add("translate-y-0", "scale-100");
                });
            }

            function closeDetail() {
                if (!detailOverlay) return;

                if (currentButton === detailAudio) {
                    stopAll();
                }

                detailOverlay.classList.add("opacity-0");
                detailOverlay.classList.remove("opacity-100");
                detailOverlay.classList.add("pointer-events-none");
                detailPanel?.classList.add("translate-y-3", "scale-95");
                detailPanel?.classList.remove("translate-y-0", "scale-100");
                detailOverlay.setAttribute("aria-hidden", "true");
                if (detailProgress) {
                    detailProgress.style.transform = "scaleX(0)";
                }

                window.setTimeout(() => {
                    detailOverlay.classList.add("invisible");
                    detailCard = null;
                }, 180);
            }

            function openFocus(card) {
                if (!card || !focusOverlay) return;

                focusCard = card;
                const titleHtml = card.dataset.titleHtml || card.dataset.title || "";
                const title = card.dataset.title || "";
                const script = card.dataset.script || "";
                const subtitle = card.dataset.subtitle || (normalizeText(script) === normalizeText(title) ? "" : script);
                const example = card.dataset.example || "";
                const sound = card.dataset.audio || "";
                const emoji = card.dataset.emoji || "";
                const groupTitle = card.dataset.groupTitle || "";
                const groupEmoji = card.dataset.groupEmoji || "";
                const groupText = card.dataset.groupText || groupTitle;

                fillHtmlOrText(focusTitle, titleHtml || title);
                fillHtmlOrText(focusEmoji, emoji);
                fillHtmlOrText(focusSubtitle, subtitle);
                fillHtmlOrText(focusExample, example);
                fillHtmlOrText(focusGroupEmoji, groupEmoji);
                fillHtmlOrText(focusGroupText, groupText);

                setAdaptiveTextSize(
                    focusTitle,
                    titleHtml || title,
                    ["text-3xl", "sm:text-5xl"],
                    ["text-[1.7rem]", "sm:text-4xl"],
                    ["text-2xl", "sm:text-3xl"]
                );

                setAdaptiveTextSize(
                    focusSubtitle,
                    subtitle,
                    ["text-xl", "sm:text-2xl"],
                    ["text-lg", "sm:text-xl"],
                    ["text-base", "sm:text-lg"]
                );

                setAdaptiveTextSize(
                    focusExample,
                    example,
                    ["text-base", "sm:text-lg"],
                    ["text-sm", "sm:text-base"],
                    ["text-xs", "sm:text-sm"]
                );

                setVisible(focusGroupWrap, groupTitle !== "");
                setVisible(focusGroupEmoji, groupTitle !== "" && groupEmoji !== "");
                setVisible(focusGroupDot, groupTitle !== "" && groupEmoji === "");
                setVisible(focusEmoji, emoji !== "", "inline-flex");
                setVisible(focusSubtitleWrap, subtitle !== "");
                setVisible(focusExampleWrap, example !== "");
                setVisible(focusAudio, sound !== "", "inline-flex");

                focusOverlay.classList.remove("invisible", "pointer-events-none");
                focusOverlay.setAttribute("aria-hidden", "false");
                if (focusProgress) {
                    focusProgress.style.transform = currentCard === card && !audio.paused ? card.querySelector(".playing-indicator")?.style.transform || "scaleX(0)" : "scaleX(0)";
                }

                requestAnimationFrame(() => {
                    focusOverlay.classList.remove("opacity-0");
                    focusOverlay.classList.add("opacity-100");
                    focusPanel?.classList.remove("translate-y-4", "scale-95");
                    focusPanel?.classList.add("translate-y-0", "scale-100");
                });
            }

            function closeFocus() {
                if (!focusOverlay) return;

                if (currentButton === focusAudio) {
                    stopAll();
                }

                focusOverlay.classList.add("opacity-0");
                focusOverlay.classList.remove("opacity-100");
                focusOverlay.classList.add("pointer-events-none");
                focusPanel?.classList.add("translate-y-4", "scale-95");
                focusPanel?.classList.remove("translate-y-0", "scale-100");
                focusOverlay.setAttribute("aria-hidden", "true");
                if (focusProgress) {
                    focusProgress.style.transform = "scaleX(0)";
                }

                window.setTimeout(() => {
                    focusOverlay.classList.add("invisible");
                    focusCard = null;
                }, 180);
            }

            function setButtonState(button, isPlaying) {
                if (!button) return;

                const isSentenceButton = button.dataset.audioStyle === "sentence";

                if (!isSentenceButton) {
                    idleAudioClasses.forEach((className) => {
                        if (className) button.classList.toggle(className, !isPlaying);
                    });
                    activeAudioClasses.forEach((className) => {
                        if (className) button.classList.toggle(className, isPlaying);
                    });
                }

                button.querySelector(".js-static-icon")?.classList.toggle("hidden", isPlaying);
                button.querySelector(".js-wave-wrap")?.classList.toggle("hidden", !isPlaying);
                button.querySelector(".js-wave-wrap")?.classList.toggle("flex", isPlaying);
            }

            function setCardState(card, isPlaying) {
                if (!card) return;

                card.classList.toggle("speaking", isPlaying);
                card.classList.toggle("ring-slate-200/75", !isPlaying);
                card.classList.toggle("dark:ring-white/10", !isPlaying);
                card.classList.toggle("ring-cyan-400/40", isPlaying);
                card.classList.toggle("dark:ring-cyan-300/30", isPlaying);
            }

            function setProgress(card, progress) {
                const safeProgress = Math.min(Math.max(Number(progress) || 0, 0), 1);
                const transform = `scaleX(${safeProgress})`;
                const indicator = card?.querySelector(".playing-indicator");
                if (indicator) indicator.style.transform = transform;

                if (detailProgress && detailCard === card) {
                    detailProgress.style.transform = transform;
                }

                if (focusProgress && focusCard === card) {
                    focusProgress.style.transform = transform;
                }
            }

            function clearWordHighlights() {
                document.querySelectorAll("#imageCardSubtitleText [data-sync-word='1']").forEach((span) => {
                    span.classList.remove(...activeWordClasses);
                });
            }

            function highlightWord(index) {
                const wordSpans = Array.from(document.querySelectorAll("#imageCardSubtitleText [data-sync-word='1']"));

                wordSpans.forEach((span, spanIndex) => {
                    span.classList.toggle("opacity-60", spanIndex !== index);
                    span.classList.toggle("opacity-100", spanIndex === index);
                    activeWordClasses.forEach((className) => {
                        span.classList.toggle(className, spanIndex === index);
                    });
                });
            }

            function cancelSync() {
                if (!syncAnimationFrame) return;

                cancelAnimationFrame(syncAnimationFrame);
                syncAnimationFrame = null;
            }

            function revokeObjectUrl() {
                if (!currentObjectUrl) return;

                URL.revokeObjectURL(currentObjectUrl);
                currentObjectUrl = "";
            }

            function resolveAudioUrl(src) {
                try {
                    return new URL(src, document.baseURI).href;
                } catch (e) {
                    return src;
                }
            }

            function hasMpegExtension(src) {
                return /\.(mpeg|mpga)(?:[?#]|$)/i.test(String(src || ""));
            }

            async function getPlayableAudioSrc(src) {
                const resolvedSrc = resolveAudioUrl(src);

                if (!hasMpegExtension(resolvedSrc)) {
                    return resolvedSrc;
                }

                try {
                    const url = new URL(resolvedSrc);

                    if (url.origin !== window.location.origin) {
                        return resolvedSrc;
                    }

                    const response = await fetch(url.href, {
                        credentials: "same-origin",
                        cache: "force-cache",
                    });

                    if (!response.ok) {
                        return resolvedSrc;
                    }

                    const rawBlob = await response.blob();
                    const audioBlob = rawBlob.type === "audio/mpeg"
                        ? rawBlob
                        : new Blob([rawBlob], { type: "audio/mpeg" });

                    revokeObjectUrl();
                    currentObjectUrl = URL.createObjectURL(audioBlob);

                    return currentObjectUrl;
                } catch (e) {
                    return resolvedSrc;
                }
            }

            function resetCurrent() {
                setButtonState(currentButton, false);
                setCardState(currentCard, false);
                setProgress(currentCard, 0);
                currentCard = null;
                currentButton = null;
                currentSrc = "";
                currentAudioQueue = [];
                currentAudioQueueIndex = 0;
                currentSubtitleWords = [];
                clearWordHighlights();
                cancelSync();
            }

            function stopAll() {
                try {
                    audio.pause();
                    audio.currentTime = 0;
                    audio.removeAttribute("src");
                    audio.load();
                } catch (e) {}

                revokeObjectUrl();
                resetCurrent();
                hideOverlay();
            }

            function syncSubtitles(words) {
                cancelSync();

                function update() {
                    if (audio.paused || !currentCard) return;

                    const progress = audio.duration ? audio.currentTime / audio.duration : 0;
                    const safeProgress = Math.min(Math.max(progress || 0, 0), 1);
                    const currentWordIndex = Math.min(words.length - 1, Math.floor(safeProgress * words.length));

                    setProgress(currentCard, safeProgress);
                    highlightWord(currentWordIndex);

                    syncAnimationFrame = requestAnimationFrame(update);
                }

                update();
            }

            async function playQueuedAudio() {
                if (!currentCard || currentAudioQueue.length === 0) return;

                currentSrc = currentAudioQueue[currentAudioQueueIndex] || "";

                if (!currentSrc) {
                    stopAll();
                    return;
                }

                try {
                    audio.src = await getPlayableAudioSrc(currentSrc);
                    audio.currentTime = 0;
                    audio.onplay = () => {
                        if (currentAudioQueueIndex === currentAudioQueue.length - 1) {
                            syncSubtitles(currentSubtitleWords);
                        } else {
                            cancelSync();
                            clearWordHighlights();
                        }
                    };

                    const playPromise = audio.play();
                    if (playPromise && typeof playPromise.catch === "function") {
                        playPromise.catch(() => stopAll());
                    }
                } catch (e) {
                    stopAll();
                }
            }

            function playNextQueuedAudio() {
                cancelSync();
                clearWordHighlights();

                if (currentAudioQueueIndex < currentAudioQueue.length - 1) {
                    currentAudioQueueIndex += 1;
                    playQueuedAudio();
                    return;
                }

                stopAll();
            }

            async function playCard(card, buttonOverride = null) {
                if (!card) return;

                const src = card.dataset.audio || "";
                const groupSrc = card.dataset.groupAudio || "";
                const script = card.dataset.script || card.dataset.title || "";
                const title = card.dataset.title || "";
                const titleHtml = card.dataset.titleHtml || title;
                const example = card.dataset.example || "";
                const button = buttonOverride || card.querySelector(".speak-btn");
                const popupText = normalizeText(script) === normalizeText(title) ? "" : script;
                const hasImage = card.dataset.imageLayout === "1";
                const cardPopup = card.dataset.popup || popupMode || "text";
                const isFocusPopup = cardPopup === "focus" && !hasImage;

                if (currentCard === card && !audio.paused) {
                    if (cardPopup === "card" && hasImage) {
                        openDetail(card);
                    }
                    if (isFocusPopup) {
                        openFocus(card);
                    }
                    stopAll();
                    return;
                }

                stopAll();

                const words = cardPopup === "text" && hasImage
                    ? renderSubtitle(title, titleHtml, popupText, example)
                    : [];

                if (cardPopup === "text" && hasImage) {
                    showOverlay();
                }

                if (!src) {
                    return;
                }

                currentCard = card;
                currentButton = button;
                currentSubtitleWords = words;
                currentAudioQueue = [groupSrc, src].filter((value, index, list) => value && list.indexOf(value) === index);
                currentAudioQueueIndex = 0;

                setButtonState(currentButton, true);
                setCardState(currentCard, true);

                playQueuedAudio();
            }

            cards.forEach((card) => {
                card.addEventListener("click", (event) => {
                    const audioButton = event.target.closest(".speak-btn");
                    const hasImage = card.dataset.imageLayout === "1";
                    const cardPopup = card.dataset.popup || popupMode || "text";
                    const isFocusPopup = cardPopup === "focus" && !hasImage;

                    if (audioButton) {
                        event.preventDefault();
                        event.stopPropagation();

                        if (cardPopup === "card" && hasImage) {
                            openDetail(card);
                            playCard(card, audioButton);
                            return;
                        }

                        if (isFocusPopup) {
                            openFocus(card);
                            playCard(card, audioButton);
                            return;
                        }

                        playCard(card, audioButton);
                        return;
                    }

                    if (cardPopup === "card" && hasImage) {
                        openDetail(card);
                        playCard(card, card.querySelector(".speak-btn"));
                        return;
                    }

                    if (isFocusPopup) {
                        openFocus(card);
                        playCard(card, focusAudio);
                        return;
                    }

                    playCard(card);
                });
                card.addEventListener("keydown", (event) => {
                    if (event.target?.closest?.(".speak-btn")) return;
                    if (event.key !== "Enter" && event.key !== " ") return;
                    event.preventDefault();
                    const hasImage = card.dataset.imageLayout === "1";
                    const cardPopup = card.dataset.popup || popupMode || "text";
                    const isFocusPopup = cardPopup === "focus" && !hasImage;

                    if (cardPopup === "card" && hasImage) {
                        openDetail(card);
                        playCard(card, card.querySelector(".speak-btn"));
                        return;
                    }

                    if (isFocusPopup) {
                        openFocus(card);
                        playCard(card, focusAudio);
                        return;
                    }

                    playCard(card);
                });
            });

            detailAudio?.addEventListener("click", (event) => {
                event.preventDefault();
                event.stopPropagation();
                if (detailCard) playCard(detailCard, detailAudio);
            });

            focusAudio?.addEventListener("click", (event) => {
                event.preventDefault();
                event.stopPropagation();
                if (focusCard) playCard(focusCard, focusAudio);
            });

            detailClose?.addEventListener("click", closeDetail);
            focusClose?.addEventListener("click", closeFocus);

            detailOverlay?.addEventListener("click", (event) => {
                if (event.target === detailOverlay) {
                    closeDetail();
                }
            });

            focusOverlay?.addEventListener("click", (event) => {
                if (event.target === focusOverlay) {
                    closeFocus();
                }
            });

            document.addEventListener("keydown", (event) => {
                if (event.key === "Escape") { 
                    closeDetail();  
                    closeFocus();
                }
            });

            audio.addEventListener("ended", playNextQueuedAudio);
            audio.addEventListener("error", stopAll);

            document.addEventListener("visibilitychange", () => {
                if (document.hidden) stopAll();
            });

            window.addEventListener("beforeunload", stopAll);
            window.addEventListener("pagehide", stopAll);

            const observer = new MutationObserver(() => {
                if (currentCard && !document.body.contains(currentCard)) {
                    stopAll();
                }
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });

            window.stopAll = stopAll;
            window.stopSlideAudio = stopAll;
            window.resetSlide = stopAll;
        });
    </script>
@endsection
