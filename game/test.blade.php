@extends("slider.simple-layout")

@php
    $content = is_array($content ?? null) ? $content : [];
    $gameType = $content['type'] ?? 'emoji';
    $isInspectImageGame = $gameType === 'inspect-image';
    $isImageLikeGame = in_array($gameType, ['image', 'inspect-image'], true);
    $isEmojiGame = $gameType === 'emoji';
    $hasLeftPanelGame = !in_array($gameType, ['questions_only', 'audio', 'emoji'], true);
    $initialAudio = $content['audio'] ?? ($content['questions'][0]['audio'] ?? null);
    $optionType = $content['option_type'] ?? 'text';
    $characters = $content['characters'] ?? [];
    $readingTitle = trim((string) ($content['reading_title'] ?? $content['reading_heading'] ?? ''));
    $readingAlign = trim((string) ($content['reading_align'] ?? ($gameType === 'reading' ? 'left' : '')));
    $readingPlain = array_key_exists('reading_plain', $content)
        ? !empty($content['reading_plain'])
        : $gameType === 'reading';
    $readingCompact = array_key_exists('reading_compact', $content)
        ? !empty($content['reading_compact'])
        : $gameType === 'reading';
    $readingAllowHtml = array_key_exists('reading_allow_html', $content)
        ? !empty($content['reading_allow_html'])
        : false;
    $readingTextSize = trim((string) ($content['reading_text_size'] ?? ''));
    $showReadingBadge = array_key_exists('show_reading_badge', $content)
        ? !empty($content['show_reading_badge'])
        : true;
    $themeName = (string) ($theme['name'] ?? 'default');
    $isOrangeTheme = $themeName === 'orange';
    $isGreenTheme = $themeName === 'green';
    $mcaAccentStyle = match (true) {
        $isOrangeTheme => '--mca-accent-bg: rgba(255, 237, 213, .96); --mca-accent-bg-hover: rgba(254, 215, 170, .96); --mca-accent-border: rgba(251, 146, 60, .55); --mca-accent-text: rgb(194, 65, 12); --mca-accent-ring: rgba(251, 146, 60, .24); --mca-accent-bg-dark: rgba(154, 52, 18, .32); --mca-accent-bg-hover-dark: rgba(154, 52, 18, .46); --mca-accent-border-dark: rgba(251, 146, 60, .48); --mca-accent-text-dark: rgb(255, 237, 213); --mca-accent-ring-dark: rgba(251, 146, 60, .22);',
        $isGreenTheme => '--mca-accent-bg: rgba(220, 252, 231, .96); --mca-accent-bg-hover: rgba(187, 247, 208, .96); --mca-accent-border: rgba(34, 197, 94, .50); --mca-accent-text: rgb(21, 128, 61); --mca-accent-ring: rgba(34, 197, 94, .22); --mca-accent-bg-dark: rgba(20, 83, 45, .34); --mca-accent-bg-hover-dark: rgba(20, 83, 45, .50); --mca-accent-border-dark: rgba(74, 222, 128, .46); --mca-accent-text-dark: rgb(220, 252, 231); --mca-accent-ring-dark: rgba(74, 222, 128, .22);',
        default => '--mca-accent-bg: rgba(238, 242, 255, .96); --mca-accent-bg-hover: rgba(224, 231, 255, .98); --mca-accent-border: rgba(129, 140, 248, .48); --mca-accent-text: rgb(67, 56, 202); --mca-accent-ring: rgba(99, 102, 241, .24); --mca-accent-bg-dark: rgba(67, 56, 202, .26); --mca-accent-bg-hover-dark: rgba(67, 56, 202, .38); --mca-accent-border-dark: rgba(129, 140, 248, .46); --mca-accent-text-dark: rgb(224, 231, 255); --mca-accent-ring-dark: rgba(129, 140, 248, .22);',
    };
    $rawReadingPassage = $content['passage'] ?? $content['reading'] ?? $content['reading_passage'] ?? [];
    $readingPassage = is_array($rawReadingPassage)
        ? array_values(array_filter(array_map(static fn ($paragraph) => trim((string) $paragraph), $rawReadingPassage), static fn ($paragraph) => $paragraph !== ''))
        : array_values(array_filter(
            array_map('trim', preg_split('/\R{2,}/', trim((string) $rawReadingPassage)) ?: []),
            static fn ($paragraph) => $paragraph !== ''
        ));
    $enableImageZoom = $isInspectImageGame;
    if (array_key_exists('enable_image_zoom', $content)) {
        $normalizedEnableImageZoom = filter_var($content['enable_image_zoom'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        $enableImageZoom = $normalizedEnableImageZoom ?? (bool) $content['enable_image_zoom'];
    }
    $imageScale = (float) ($content['image_scale'] ?? 1);
    $imageExtraScale = (float) ($content['image_extra_scale'] ?? 1);
    $imageAspectRatio = trim((string) ($content['image_aspect_ratio'] ?? ''));
    $imageFitClass = trim((string) ($content['image_fit_class'] ?? 'object-contain'));
    $imageRadius = $content['image_radius'] ?? 'rounded-[1.6rem]';
    $imagePanelColClass = $content['image_panel_col_class']
        ?? ($isInspectImageGame
            ? 'min-[760px]:col-span-7 xl:col-span-8'
            : ($gameType === 'image'
                ? 'min-[760px]:col-span-5 xl:col-span-5'
                : ($gameType === 'reading' ? 'min-[760px]:col-span-7 xl:col-span-7' : 'min-[760px]:col-span-5')));
    $answerPanelColClass = $content['answer_panel_col_class']
        ?? ($isInspectImageGame
            ? 'min-[760px]:col-span-5 xl:col-span-4'
            : ($gameType === 'image'
                ? 'min-[760px]:col-span-7 xl:col-span-7'
                : ($gameType === 'emoji'
                    ? 'col-span-full'
                    : ($gameType === 'reading'
                    ? 'min-[760px]:col-span-5 xl:col-span-5'
                    : (($gameType != 'questions_only' && $gameType !== 'audio') ? 'min-[760px]:col-span-7' : 'col-span-12')))));
    $imagePanelInnerClass = $content['image_panel_inner_class'] ?? 'h-full p-0';
    $answerPanelInnerClass = $content['answer_panel_inner_class'] ?? 'h-full p-3.5 sm:p-4 lg:p-4 text-left';
    $questionPromptLabel = $content['question_prompt_label'] ?? 'Choose the correct answer:';
    $readingAccentClass = match (true) {
        $isOrangeTheme => 'bg-gradient-to-b from-orange-400 via-orange-500 to-orange-600',
        $isGreenTheme => 'bg-gradient-to-b from-emerald-400 via-green-500 to-teal-600',
        default => 'bg-gradient-to-b from-sky-400 via-indigo-500 to-violet-500',
    };
    $readingCardGlowClass = match (true) {
        $isOrangeTheme => 'bg-[radial-gradient(120%_120%_at_0%_0%,rgba(254,215,170,.38)_0%,transparent_46%),radial-gradient(120%_120%_at_100%_0%,rgba(253,186,116,.24)_0%,transparent_44%)] dark:bg-[radial-gradient(120%_120%_at_0%_0%,rgba(249,115,22,.16)_0%,transparent_46%),radial-gradient(120%_120%_at_100%_0%,rgba(251,146,60,.12)_0%,transparent_44%)]',
        $isGreenTheme => 'bg-[radial-gradient(120%_120%_at_0%_0%,rgba(187,247,208,.36)_0%,transparent_46%),radial-gradient(120%_120%_at_100%_0%,rgba(167,243,208,.28)_0%,transparent_44%)] dark:bg-[radial-gradient(120%_120%_at_0%_0%,rgba(34,197,94,.16)_0%,transparent_46%),radial-gradient(120%_120%_at_100%_0%,rgba(45,212,191,.12)_0%,transparent_44%)]',
        default => 'bg-[radial-gradient(120%_120%_at_0%_0%,rgba(191,219,254,.38)_0%,transparent_46%),radial-gradient(120%_120%_at_100%_0%,rgba(199,210,254,.30)_0%,transparent_44%)] dark:bg-[radial-gradient(120%_120%_at_0%_0%,rgba(59,130,246,.16)_0%,transparent_46%),radial-gradient(120%_120%_at_100%_0%,rgba(129,140,248,.12)_0%,transparent_44%)]',
    };
    $readingBadgeClass = match (true) {
        $isOrangeTheme => 'border-orange-200/70 bg-orange-50/90 text-orange-700 dark:border-orange-400/25 dark:bg-orange-950/40 dark:text-orange-200',
        $isGreenTheme => 'border-emerald-200/70 bg-emerald-50/90 text-emerald-700 dark:border-emerald-400/25 dark:bg-emerald-950/40 dark:text-emerald-200',
        default => 'border-slate-200/80 bg-white/75 text-slate-500 dark:border-slate-700/60 dark:bg-slate-900/60 dark:text-slate-300',
    };
    $readingDotClass = match (true) {
        $isOrangeTheme => 'bg-gradient-to-br from-orange-400 to-orange-600',
        $isGreenTheme => 'bg-gradient-to-br from-emerald-400 to-teal-600',
        default => 'bg-gradient-to-br from-sky-400 to-indigo-500',
    };
    $readingDropCapClass = match (true) {
        $isOrangeTheme => 'first-letter:text-orange-700 dark:first-letter:text-orange-300',
        $isGreenTheme => 'first-letter:text-emerald-700 dark:first-letter:text-emerald-300',
        default => 'first-letter:text-indigo-700 dark:first-letter:text-blue-300',
    };

    $optionsBank = $content['optionsBank'] ?? [];
    $optionsGridClass = $content['options_grid_class'] ?? ($optionType === 'image'
        ? 'mt-3 grid grid-cols-2 gap-3 sm:grid-cols-3 min-[760px]:grid-cols-2'
        : 'mt-3 grid grid-cols-1 gap-3 sm:grid-cols-2 min-[760px]:grid-cols-1 xl:grid-cols-2');
    $gameCardWidth = $content['game_card_width'] ?? ($gameType === 'emoji' || $gameType === 'audio' || $gameType === 'questions_only'
        ? 'max-w-[980px]'
        : ($isInspectImageGame ? 'max-w-[1280px]' : ($gameType === 'reading' ? 'max-w-[1220px]' : 'max-w-[1160px]')));
    $imageOptionTileClass = trim((string) ($content['image_option_tile_class'] ?? ''));
    $showImageOptionLabel = array_key_exists('show_image_option_label', $content)
        ? (bool) $content['show_image_option_label']
        : true;
    $shuffleOptions = array_key_exists('shuffle_options', $content)
        ? (bool) $content['shuffle_options']
        : true;
    $optionPagination = array_key_exists('option_pagination', $content)
        ? (filter_var($content['option_pagination'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? (bool) $content['option_pagination'])
        : true;
    $optionPageSize = max(0, (int) ($content['option_page_size'] ?? 0));
    $hasCustomOptionsGridClass = array_key_exists('options_grid_class', $content);
    $normalizeScriptLines = static function ($rawScript) {
        return is_array($rawScript)
            ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawScript), static fn ($line) => $line !== ''))
            : array_values(array_filter(
                array_map('trim', preg_split('/(?<=[.!?])\s+/', trim((string) $rawScript)) ?: []),
                static fn ($line) => $line !== ''
            ));
    };

    $rawScript = $content['script'] ?? [];
    $globalScriptLines = $normalizeScriptLines($rawScript);

    $firstAvailableQuestionAudio = null;
    $firstQuestionScriptLines = [];
    $hasQuestionScript = false;

    foreach (($content['questions'] ?? []) as $questionIndex => $question) {
        if ($firstAvailableQuestionAudio === null && !empty($question['audio'])) {
            $firstAvailableQuestionAudio = $question['audio'];
        }

        $questionScriptLines = $normalizeScriptLines($question['script'] ?? []);
        if ($questionScriptLines !== []) {
            $hasQuestionScript = true;
        }

        if ($questionIndex === 0) {
            $firstQuestionScriptLines = $questionScriptLines;
        }
    }

    $playerAudio = $initialAudio ?: $firstAvailableQuestionAudio;
    $scriptLines = $firstQuestionScriptLines !== [] ? $firstQuestionScriptLines : $globalScriptLines;
    $hasAnyScript = $globalScriptLines !== [] || $hasQuestionScript;
    $hasScript = $hasAnyScript;

    $questionMeta = array_values($content['questions'] ?? []);
    $maxPromptChars = 0;
    $maxOptionCount = 0;
    foreach ($questionMeta as $questionForMeta) {
        $maxPromptChars = max($maxPromptChars, mb_strlen(trim((string) ($questionForMeta['prompt'] ?? ''))));
        $maxOptionCount = max($maxOptionCount, is_array($questionForMeta['options'] ?? null) ? count($questionForMeta['options']) : 0);
    }

    $verticalAlignment = trim((string) ($content['vertical_alignment'] ?? 'auto'));
    if (!in_array($verticalAlignment, ['auto', 'top', 'center'], true)) {
        $verticalAlignment = 'auto';
    }

    $isContentHeavyGame = in_array($gameType, ['reading', 'image', 'inspect-image', 'character_audios'], true) || $maxPromptChars > 120 || $maxOptionCount > 6;
    $topAlignGame = $verticalAlignment === 'top' || ($verticalAlignment === 'auto' && $isContentHeavyGame);
    $mainStackClass = $topAlignGame
        ? 'justify-start py-2 sm:py-2.5 lg:py-3'
        : 'justify-center py-2 sm:py-2.5 lg:py-3';
    $mainFlowClass = $topAlignGame
        ? 'pt-0.5 sm:pt-1 lg:pt-2'
        : 'pt-0';
    $compactHeader = array_key_exists('compact_header', $content)
        ? !empty($content['compact_header'])
        : in_array($gameType, ['reading', 'image', 'inspect-image'], true);

    $readingDropCap = array_key_exists('reading_dropcap', $content)
        ? !empty($content['reading_dropcap'])
        : false;
@endphp


@section("content")
    <div class="font-sans relative isolate min-h-[100dvh] overflow-x-hidden overflow-y-auto dark:text-slate-100 transition-colors duration-300" style="{{ $mcaAccentStyle }}">
        <main id="app" class="mx-auto flex min-h-[100dvh] w-full max-w-[1400px] flex-col {{ $mainStackClass }} px-2.5 pb-3 sm:px-4 sm:pb-4 lg:px-5">
            <section class="{{ $mainFlowClass }} flex flex-none flex-col">
                <div class="grid place-items-center text-center {{ $compactHeader ? 'gap-1 sm:gap-1.5' : 'gap-1.5 sm:gap-2' }} auto-rows-max">
                    @include('slider.components.title-subtitle', [
                        'titleWrapClass' => $compactHeader
                            ? 'header-spacing my-0 px-3 text-center sm:my-0.5 sm:px-5 lg:px-7'
                            : 'header-spacing my-0.5 px-3 text-center sm:my-1 sm:px-5 lg:px-8',
                        'titleSpacingClass' => $compactHeader ? 'space-y-1 sm:space-y-1.5' : 'space-y-2',
                    ])

                    @include('slider.components.game-status')

                    <section id="gameCard" class="relative w-full {{ $gameCardWidth }} flex-none select-none p-0.5 sm:p-1">
                        <div
                                id="questionPanel"
                                class="grid min-h-0 grid-cols-1 {{ $hasLeftPanelGame ? 'min-[760px]:grid-cols-12' : 'grid-cols-1' }} items-stretch gap-3 sm:gap-3.5 lg:gap-4"
                        >
                            @if($hasLeftPanelGame)
                                <div class="{{ $imagePanelColClass }} min-w-0">
                                    @if($gameType === 'character_audios')
                                        <div class="h-full rounded-[1.35rem] border border-slate-200/80 bg-white/90 p-3.5 text-left shadow-[0_14px_34px_rgba(15,23,42,0.055)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-900/62 sm:p-4 lg:p-5">
                                            <div class="space-y-3">
                                                @foreach($characters as $character)
                                                    <div class="rounded-2xl border border-slate-200/75 bg-white/85 p-3 shadow-sm dark:border-slate-700/65 dark:bg-slate-950/35">
                                                        <div class="text-sm font-black text-slate-900 dark:text-white">
                                                            {{ $character['name'] ?? 'Character' }}
                                                        </div>

                                                        @if(!empty($character['audio']))
                                                            <audio
                                                                    class="character-audio mt-2 w-full"
                                                                    controls
                                                                    preload="auto"
                                                                    controlsList="nodownload noplaybackrate noremoteplayback"
                                                                    disableRemotePlayback
                                                                    oncontextmenu="return false;"
                                                                    src="{{ $character['audio'] }}"
                                                            ></audio>
                                                        @else
                                                            <div class="mt-2 text-xs font-bold text-slate-600 dark:text-slate-300">
                                                                Audio unavailable.
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @elseif($gameType === 'reading')
                                        <div class="h-full text-left">
                                            <div class="relative h-full max-h-[44dvh] min-h-[220px] overflow-auto rounded-[1.35rem] border border-slate-200/80 bg-white/94 p-3 shadow-[0_14px_34px_rgba(15,23,42,0.055)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-900/58 sm:max-h-[46dvh] sm:p-3.5 min-[760px]:max-h-[calc(100dvh-245px)] min-[760px]:min-h-[380px] min-[760px]:p-4 lg:p-5 {{ $readingCardGlowClass }}">
                                                <div class="pointer-events-none absolute inset-y-0 left-0 w-1.5 {{ $readingAccentClass }}"></div>
                                                <div class="relative z-[1] pl-1.5">
                                                    @if($showReadingBadge)
                                                        <div class="inline-flex items-center gap-2 rounded-full border px-3 py-1.5 text-[10px] font-black uppercase tracking-[0.16em] shadow-sm {{ $readingBadgeClass }}">
                                                            <span class="h-2 w-2 rounded-full {{ $readingDotClass }}"></span>
                                                            <span>Reading Passage</span>
                                                        </div>
                                                    @endif

                                                    @if($readingTitle !== '')
                                                        <h2 class="mt-2.5 max-w-[30ch] text-xl font-black leading-[1.08] tracking-[-0.035em] text-slate-950 dark:text-white sm:text-2xl lg:text-[1.7rem]">
                                                            {{ $readingTitle }}
                                                        </h2>
                                                    @endif

                                                    <div class="mt-2.5 grid gap-2.5 text-left sm:mt-3 {{ $readingCompact ? 'sm:gap-2.5' : 'sm:gap-3' }}">
                                                        @forelse($readingPassage as $paragraph)
                                                            @if($readingAllowHtml)
                                                                <div class="min-w-0 text-sm font-semibold leading-[1.6] text-slate-600 dark:text-slate-300 sm:text-base lg:text-[1rem]
                                                                    [&_table]:w-full [&_table]:border-separate [&_table]:border-spacing-0 [&_table]:overflow-hidden [&_table]:rounded-2xl [&_table]:border [&_table]:border-slate-200/70 [&_table]:bg-white/90 [&_table]:shadow-sm dark:[&_table]:border-slate-700/60 dark:[&_table]:bg-slate-900/50
                                                                    [&_th]:border-b [&_th]:border-r [&_th]:border-slate-200/70 [&_th]:bg-slate-50 [&_th]:px-3 [&_th]:py-2 [&_th]:text-left [&_th]:text-sm [&_th]:font-black [&_th]:text-slate-900 dark:[&_th]:border-slate-700/60 dark:[&_th]:bg-slate-800/60 dark:[&_th]:text-slate-100
                                                                    [&_td]:border-b [&_td]:border-r [&_td]:border-slate-200/70 [&_td]:px-3 [&_td]:py-2 [&_td]:text-sm [&_td]:font-bold [&_td]:text-slate-700 dark:[&_td]:border-slate-700/60 dark:[&_td]:text-slate-200">
                                                                    {!! $paragraph !!}
                                                                </div>
                                                            @else
                                                                <p class="m-0 text-sm font-semibold leading-[1.62] tracking-[-0.01em] text-slate-600 dark:text-slate-300 sm:text-base lg:text-[1rem] {{ $readingTextSize === 'small' || $readingTextSize === 'sm' ? 'lg:text-sm' : '' }} {{ $loop->first && $readingDropCap ? 'first-letter:float-left first-letter:mr-2 first-letter:mt-1 first-letter:text-4xl first-letter:font-black first-letter:leading-[0.85] ' . $readingDropCapClass : '' }}">
                                                                    {{ $paragraph }}
                                                                </p>
                                                            @endif
                                                        @empty
                                                            <p class="m-0 text-sm font-semibold leading-[1.62] text-slate-600 dark:text-slate-300 sm:text-base">
                                                                Add `passage` or `reading` in `$content` to show the reading text here.
                                                            </p>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($isImageLikeGame)
                                        <div class="{{ $imagePanelInnerClass }}">
                                            <div class="flex h-full items-center justify-center rounded-[1.35rem] border border-slate-200/80 bg-white/90 p-2 shadow-[0_14px_34px_rgba(15,23,42,0.055)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-900/60 sm:p-2.5 min-[760px]:p-3">
                                                <div
                                                        id="imageViewport"
                                                        class="relative mx-auto w-full max-w-full overflow-hidden border border-slate-200/75 bg-slate-50 shadow-[0_12px_28px_rgba(15,23,42,0.06)] dark:border-slate-700/60 dark:bg-slate-950/50 {{ $imageRadius }} {{ $enableImageZoom ? 'cursor-zoom-in' : '' }}"
                                                        style="aspect-ratio: 4 / 3; max-height: {{ $isInspectImageGame ? 'min(54dvh, 540px)' : 'min(42dvh, 390px)' }};"
                                                >
                                                    <img
                                                            id="questionImage"
                                                            src="{{ $content['image'] ?? '' }}"
                                                            data-default-src="{{ $content['image'] ?? '' }}"
                                                            alt="{{ $content['title'] ?? 'Question image' }}"
                                                            draggable="false"
                                                            class="h-full w-full {{ $imageFitClass }} {{ $imageRadius }} {{ $enableImageZoom ? 'transition-transform duration-150 ease-out will-change-transform' : '' }}"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="hidden"></div>
                                    @endif
                                </div>
                            @endif

                            <div class="{{ $answerPanelColClass }} min-w-0">
                                <div class="h-full rounded-[1.35rem] border border-slate-200/80 bg-white/94 shadow-[0_14px_34px_rgba(15,23,42,0.055)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-900/62">
                                    <div class="{{ $answerPanelInnerClass }} flex h-full flex-col">
                                        @if($isEmojiGame)
                                            <div class="mb-3 flex min-h-[86px] items-center justify-center rounded-2xl border border-slate-200/80 bg-gradient-to-br from-white via-slate-50 to-slate-100/80 px-4 py-4 shadow-sm dark:border-slate-700/70 dark:from-slate-900/80 dark:via-slate-900/55 dark:to-slate-950/45 sm:min-h-[98px]">
                                                <div id="qEmoji" class="text-5xl leading-none select-none sm:text-6xl lg:text-7xl">👋</div>
                                            </div>
                                        @endif

                                        <div class="flex items-start justify-between gap-2 sm:items-center sm:gap-3">
                                            <div class="flex min-w-0 flex-col gap-1 text-left sm:flex-row sm:items-center sm:gap-2">
                                                <div id="questionPromptLabel" class="min-w-0 text-[11px] font-black uppercase tracking-[0.08em] text-slate-500 dark:text-slate-400 sm:text-xs">
                                                    {{ $questionPromptLabel }}
                                                </div>
                                                <span id="questionIndicator" class="inline-flex w-fit rounded-full border border-slate-200/80 bg-slate-50/90 px-2.5 py-1 text-[10px] font-black text-slate-600 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/60 dark:text-slate-300">
                                                    1 of 1
                                                </span>
                                            </div>

                                            <button
                                                    id="btnRevealCorrection"
                                                    type="button"
                                                    class="inline-flex shrink-0 items-center justify-center gap-2 whitespace-nowrap rounded-xl border border-[color:var(--mca-accent-border)] bg-[var(--mca-accent-bg)] px-2.5 py-2 text-[10px] font-black text-[color:var(--mca-accent-text)] shadow-sm transition duration-200 ease-out hover:bg-[var(--mca-accent-bg-hover)] active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--mca-accent-ring)] dark:border-[color:var(--mca-accent-border-dark)] dark:bg-[var(--mca-accent-bg-dark)] dark:text-[color:var(--mca-accent-text-dark)] dark:hover:bg-[var(--mca-accent-bg-hover-dark)] dark:focus-visible:ring-[color:var(--mca-accent-ring-dark)] sm:px-3 sm:text-xs"
                                            >
                                                Reveal All Corrections
                                            </button>
                                        </div>

                                        <div id="sharedAudioPlayerWrap" class="my-2.5{{ empty($playerAudio) ? ' hidden' : '' }}">
                                            @include('slider.components.audio-player')
                                        </div>

                                        <div id="qPrompt" class="my-2.5 flex items-start gap-2.5 rounded-2xl border border-slate-200/80 bg-slate-50/80 px-3 py-3 text-left text-[15px] font-black leading-[1.42] text-slate-950 shadow-sm dark:border-slate-700/60 dark:bg-slate-950/30 dark:text-slate-100 sm:text-base lg:text-[1.02rem]">
                                            <span id="qPromptNumber" class="inline-flex h-7 min-w-7 shrink-0 items-center justify-center rounded-full border border-[color:var(--mca-accent-border)] bg-[var(--mca-accent-bg)] px-2 text-xs font-black text-[color:var(--mca-accent-text)] shadow-sm dark:border-[color:var(--mca-accent-border-dark)] dark:bg-[var(--mca-accent-bg-dark)] dark:text-[color:var(--mca-accent-text-dark)]">
                                                1.
                                            </span>
                                            <span id="qPromptText" class="min-w-0">
                                                ...
                                            </span>
                                        </div>

                                        <div id="optionsGrid" class="{{ $optionsGridClass }}"></div>

                                        <div id="optionsPager" class="mt-3 hidden items-center justify-between gap-3 rounded-2xl border border-slate-200/80 bg-slate-50/90 px-3 py-2.5 shadow-sm dark:border-slate-700/60 dark:bg-slate-950/40">
                                            <button
                                                    id="optionsPagePrev"
                                                    type="button"
                                                    class="inline-flex items-center justify-center rounded-xl border border-slate-200/80 bg-white px-3 py-2 text-xs font-black text-slate-600 shadow-sm transition hover:bg-slate-50 active:scale-95 disabled:cursor-not-allowed disabled:opacity-45 dark:border-slate-700/70 dark:bg-slate-900/70 dark:text-slate-200 dark:hover:bg-slate-800"
                                            >
                                                &lsaquo; Options
                                            </button>

                                            <div class="min-w-0 text-center">
                                                <div id="optionsPageLabel" class="text-xs font-black text-slate-700 dark:text-slate-200">Options</div>
                                                <div id="optionsHiddenLabel" class="mt-0.5 text-[10px] font-bold text-slate-500 dark:text-slate-400"></div>
                                            </div>

                                            <button
                                                    id="optionsPageNext"
                                                    type="button"
                                                    class="inline-flex items-center justify-center rounded-xl border border-[color:var(--mca-accent-border)] bg-[var(--mca-accent-bg)] px-3 py-2 text-xs font-black text-[color:var(--mca-accent-text)] shadow-sm transition hover:bg-[var(--mca-accent-bg-hover)] active:scale-95 disabled:cursor-not-allowed disabled:opacity-45 dark:border-[color:var(--mca-accent-border-dark)] dark:bg-[var(--mca-accent-bg-dark)] dark:text-[color:var(--mca-accent-text-dark)] dark:hover:bg-[var(--mca-accent-bg-hover-dark)]"
                                            >
                                                More &rsaquo;
                                            </button>
                                        </div>

                                        <div class="mt-3 grid grid-cols-2 gap-2.5 {{ $hasLeftPanelGame ? '' : 'sm:grid-cols-4' }} sm:gap-3 min-[760px]:mt-auto min-[760px]:pt-3">
                                            <button
                                                    id="btnRestart"
                                                    type="button"
                                                    class="inline-flex min-h-[46px] w-full items-center justify-center gap-2 rounded-xl border border-slate-300/75 bg-white/90 px-3 py-2.5 text-xs font-black text-slate-700 shadow-sm transition duration-200 ease-out hover:bg-white active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-slate-300/50 dark:border-slate-700/70 dark:bg-slate-900/60 dark:text-slate-200 dark:hover:bg-slate-800 sm:text-sm"
                                            >
                                                Restart
                                            </button>

                                            <button
                                                    id="btnHint"
                                                    type="button"
                                                    class="inline-flex min-h-[46px] w-full items-center justify-center gap-2 rounded-xl border border-[color:var(--mca-accent-border)] bg-[var(--mca-accent-bg)] px-3 py-2.5 text-xs font-black text-[color:var(--mca-accent-text)] shadow-sm transition duration-200 ease-out hover:bg-[var(--mca-accent-bg-hover)] active:scale-95 disabled:cursor-not-allowed disabled:opacity-55 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--mca-accent-ring)] dark:border-[color:var(--mca-accent-border-dark)] dark:bg-[var(--mca-accent-bg-dark)] dark:text-[color:var(--mca-accent-text-dark)] dark:hover:bg-[var(--mca-accent-bg-hover-dark)] dark:focus-visible:ring-[color:var(--mca-accent-ring-dark)] sm:text-sm"
                                            >
                                                Hint (<span id="hintBadge">2</span>)
                                            </button>

                                            <button
                                                    id="btnPrev"
                                                    type="button"
                                                    class="inline-flex min-h-[46px] w-full items-center justify-center gap-2 rounded-xl border border-slate-300/75 bg-white/90 px-3 py-2.5 text-xs font-black text-slate-700 shadow-sm transition duration-200 ease-out hover:bg-white active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-slate-300/50 dark:border-slate-700/70 dark:bg-slate-900/60 dark:text-slate-200 dark:hover:bg-slate-800 sm:text-sm"
                                            >
                                                &lsaquo; Previous
                                            </button>

                                            <button
                                                    id="btnNext"
                                                    type="button"
                                                    class="inline-flex min-h-[46px] w-full items-center justify-center gap-2 rounded-xl px-3 py-2.5 text-xs font-black text-white shadow-[0_12px_26px_rgba(79,70,229,.18)] transition duration-200 ease-out hover:brightness-105 active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--mca-accent-ring)] sm:text-sm {{ $theme['button_primary_color'] }}"
                                            >
                                                Next &rsaquo;
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('slider.components.game-win-modal', [
                            'modalTitleAfterEmoji' => false,
                            'modalExtraView' => 'slider.components.game-win-modal-correction',
                            'modalExtraData' => ['section_only' => true],
                            'closeButton' => [
                                'id' => 'closeGameWinModalBtn',
                                'label' => 'Close',
                                'class' => 'inline-flex h-9 w-9 items-center justify-center rounded-full border border-slate-200/80 bg-white/90 text-slate-500 shadow-sm transition hover:bg-slate-50 hover:text-slate-900 dark:border-slate-700/70 dark:bg-slate-900/70 dark:text-slate-200 dark:hover:bg-slate-800',
                            ],
                        ])
                    </section>
                </div>
            </section>
        </main>

        <div id="toastOne" class="pointer-events-none fixed bottom-24 left-1/2 z-50 -translate-x-1/2 opacity-0">
            <div class="rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-black text-slate-900 shadow-2xl dark:border-slate-700 dark:bg-slate-800 dark:text-white">
                <span id="toastIcon"></span>
                <span id="toastText"></span>
            </div>
        </div>

        <div id="mcaLiveRegion" class="sr-only" aria-live="polite" aria-atomic="true"></div>

        <div class="hidden !border-[color:var(--mca-accent-border)] !bg-[var(--mca-accent-bg)] !text-[color:var(--mca-accent-text)] ring-[color:var(--mca-accent-ring)] dark:!border-[color:var(--mca-accent-border-dark)] dark:!bg-[var(--mca-accent-bg-dark)] dark:!text-[color:var(--mca-accent-text-dark)] dark:ring-[color:var(--mca-accent-ring-dark)] hover:border-[color:var(--mca-accent-border)] focus-visible:ring-[color:var(--mca-accent-ring)] dark:hover:border-[color:var(--mca-accent-border-dark)] dark:focus-visible:ring-[color:var(--mca-accent-ring-dark)] !border-emerald-400/80 !bg-emerald-50 !text-emerald-900 ring-emerald-300/60 dark:!bg-emerald-950/30 dark:!text-emerald-100 dark:ring-emerald-300/30 !border-rose-300/80 !bg-rose-50/80 !text-rose-900 ring-rose-200/80 dark:!bg-rose-950/25 dark:!text-rose-100 dark:ring-rose-300/25 opacity-45 grayscale animate-pulse min-[760px]:grid-cols-12 min-[760px]:col-span-5 min-[760px]:col-span-7 xl:col-span-8 xl:col-span-4 xl:col-span-5 min-[760px]:grid-cols-1 xl:grid-cols-2 min-[760px]:grid-cols-2 min-[760px]:max-h-[calc(100dvh-245px)] min-[760px]:min-h-[380px] min-[760px]:p-4 lg:p-5 border-2 !border-emerald-400 !border-rose-300 !border-[color:var(--mca-accent-border)] dark:!border-[color:var(--mca-accent-border-dark)]"></div>
    </div>
@endsection

@section("script")
    <script>
        (() => {
            const GAME_TYPE = @json($gameType);
            const OPTION_TYPE = @json($optionType);
            const QUESTIONS = @json($content['questions'] ?? []);
            const DEFAULT_AUDIO = @json($content['audio'] ?? null);
            const ENABLE_IMAGE_ZOOM = @json($enableImageZoom);
            const IMAGE_SCALE = @json($imageScale);
            const IMAGE_EXTRA_SCALE = @json($imageExtraScale);
            const IMAGE_ASPECT_RATIO = @json($imageAspectRatio);
            const OPTIONS_BANK = @json($optionsBank);
            const OPTIONS_GRID_CLASS = @json($optionsGridClass);
            const IMAGE_OPTION_TILE_CLASS = @json($imageOptionTileClass);
            const SHOW_IMAGE_OPTION_LABEL = @json($showImageOptionLabel);
            const SHUFFLE_OPTIONS = @json($shuffleOptions);
            const OPTION_PAGINATION = @json($optionPagination);
            const OPTION_PAGE_SIZE = @json($optionPageSize);
            const HAS_CUSTOM_OPTIONS_GRID_CLASS = @json($hasCustomOptionsGridClass);
            const DEFAULT_TEXT_GRID_CLASS = 'mt-3 grid grid-cols-1 gap-3 sm:grid-cols-2 min-[760px]:grid-cols-1 xl:grid-cols-2';
            const DEFAULT_IMAGE_GRID_CLASS = 'mt-3 grid grid-cols-2 gap-3 sm:grid-cols-3 min-[760px]:grid-cols-2';
            const QUESTION_PROMPT_LABEL = @json($questionPromptLabel);
            const GLOBAL_SCRIPT_LINES = @json($globalScriptLines);

            let idx = 0;
            let firstTryCorrect = 0;
            let wrongTries = 0;
            let hintsLeft = 2;
            let startTime = Date.now();
            let timerInt = null;
            let wrongedQuestions = new Set();
            let completedQuestions = new Set();
            let revealedQuestions = new Set();
            let hintedQuestions = new Set();
            let selectedCorrectValues = new Map();
            let wrongSelectedValues = new Map();
            let hintedDisabledValues = new Map();
            let optionOrderCache = new Map();
            let optionPageByQuestion = new Map();
            const scoredQuestionCount = QUESTIONS.filter((question) => !isPersonalQuestion(question)).length;

            const optionLabelMap = (OPTIONS_BANK || []).reduce((acc, item) => {
                const key = String(item?.key ?? item?.value ?? '');
                const label = String(item?.word ?? item?.label ?? item?.value ?? key);
                if (key) acc[key] = label;
                return acc;
            }, {});

            const audio = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav')
            };
            const winModal = document.getElementById('winModal');
            const btnRevealCorrection = document.getElementById('btnRevealCorrection');
            const resultsCorrectionCard = document.getElementById('resultsCorrectionCard');
            const finalCorrection = document.getElementById('finalCorrection');
            const restartBtnModal = document.getElementById('restartBtnModal');
            const continueBtnModal = document.getElementById('continueBtnModal');
            const btnPrev = document.getElementById('btnPrev');
            const btnNext = document.getElementById('btnNext');
            const questionIndicator = document.getElementById('questionIndicator');
            const optionsPager = document.getElementById('optionsPager');
            const optionsPagePrev = document.getElementById('optionsPagePrev');
            const optionsPageNext = document.getElementById('optionsPageNext');
            const optionsPageLabel = document.getElementById('optionsPageLabel');
            const optionsHiddenLabel = document.getElementById('optionsHiddenLabel');
            const closeGameWinModalBtn = document.getElementById('closeGameWinModalBtn');
            const liveRegion = document.getElementById('mcaLiveRegion');
            const characterAudios = Array.from(document.querySelectorAll('.character-audio'));
            const imageViewport = document.getElementById('imageViewport');
            const questionImage = document.getElementById('questionImage');
            const IMAGE_HOVER_ZOOM = 1.4;
            let imageZoomLocked = false;

            const sharedAudioPlayerWrap = document.getElementById('sharedAudioPlayerWrap');
            const sharedAudioPlayerRoot = document.querySelector('[data-audio-player]');
            const sharedAudioPlayerMedia = sharedAudioPlayerRoot ? sharedAudioPlayerRoot.querySelector('[data-audio-player-media]') : null;
            const sharedAudioPlayerSource = sharedAudioPlayerMedia ? sharedAudioPlayerMedia.querySelector('source') : null;
            const sharedAudioPlayerScriptBtn = sharedAudioPlayerRoot ? sharedAudioPlayerRoot.querySelector('[data-audio-player-script-open]') : null;
            const sharedAudioPlayerModal = document.querySelector('[data-audio-player-modal]');
            const sharedAudioPlayerScriptList = sharedAudioPlayerModal ? sharedAudioPlayerModal.querySelector('.space-y-2') : null;

            characterAudios.forEach((currentAudio) => {
                currentAudio.addEventListener('play', () => {
                    characterAudios.forEach((otherAudio) => {
                        if (otherAudio !== currentAudio) {
                            otherAudio.pause();
                        }
                    });
                });
            });

            function play(sound) {
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function syncSharedAudioPlayerUI() {
                if (typeof window.syncAudioPlayerUI === 'function') {
                    window.syncAudioPlayerUI();
                }
            }

            function stopSharedAudioPlayer() {
                if (typeof window.stopAudioPlayer === 'function') {
                    window.stopAudioPlayer();
                    return;
                }

                if (!sharedAudioPlayerMedia) return;

                sharedAudioPlayerMedia.pause();
                sharedAudioPlayerMedia.currentTime = 0;
                syncSharedAudioPlayerUI();
            }

            function setSharedAudioPlayerSource(src) {
                if (!sharedAudioPlayerMedia) return;

                const nextSrc = String(src || '');
                const currentSrc = sharedAudioPlayerSource
                    ? String(sharedAudioPlayerSource.getAttribute('src') || '')
                    : String(sharedAudioPlayerMedia.getAttribute('src') || '');

                if (currentSrc === nextSrc) {
                    syncSharedAudioPlayerUI();
                    return;
                }

                stopSharedAudioPlayer();

                if (sharedAudioPlayerSource) {
                    sharedAudioPlayerSource.setAttribute('src', nextSrc);
                    sharedAudioPlayerMedia.load();
                } else {
                    sharedAudioPlayerMedia.src = nextSrc;
                    sharedAudioPlayerMedia.load();
                }

                syncSharedAudioPlayerUI();
            }

            function stopCharacterAudios() {
                characterAudios.forEach((characterAudio) => {
                    characterAudio.pause();
                    characterAudio.currentTime = 0;
                });
            }

            function normalizeScriptLines(rawScript) {
                if (Array.isArray(rawScript)) {
                    return rawScript
                        .map((line) => String(line ?? '').trim())
                        .filter((line) => line !== '');
                }

                if (typeof rawScript === 'string') {
                    return rawScript
                        .split(/\r?\n+/)
                        .map((line) => line.trim())
                        .filter((line) => line !== '');
                }

                return [];
            }

            function getCurrentScriptLines() {
                const questionScriptLines = normalizeScriptLines(QUESTIONS[idx]?.script);
                if (questionScriptLines.length > 0) {
                    return questionScriptLines;
                }

                return normalizeScriptLines(GLOBAL_SCRIPT_LINES);
            }

            function buildSafeScriptFragment(value) {
                const template = document.createElement('template');
                template.innerHTML = String(value ?? '');

                const allowedClass = /^[a-zA-Z0-9:_\-/\[\].!%]+$/;

                function cleanNode(node) {
                    if (node.nodeType === Node.TEXT_NODE) {
                        return document.createTextNode(node.textContent || '');
                    }

                    if (node.nodeType !== Node.ELEMENT_NODE) {
                        return document.createDocumentFragment();
                    }

                    const tagName = node.tagName.toLowerCase();

                    if (tagName === 'br') {
                        return document.createElement('br');
                    }

                    if (tagName !== 'span') {
                        const fragment = document.createDocumentFragment();
                        node.childNodes.forEach((child) => fragment.appendChild(cleanNode(child)));
                        return fragment;
                    }

                    const span = document.createElement('span');
                    const safeClasses = String(node.getAttribute('class') || '')
                        .split(/\s+/)
                        .filter((className) => className !== '' && allowedClass.test(className));

                    if (safeClasses.length > 0) {
                        span.className = safeClasses.join(' ');
                    }

                    node.childNodes.forEach((child) => span.appendChild(cleanNode(child)));
                    return span;
                }

                const fragment = document.createDocumentFragment();
                template.content.childNodes.forEach((child) => fragment.appendChild(cleanNode(child)));

                return fragment;
            }

            function renderAudioPlayerScriptContent(lines) {
                if (!sharedAudioPlayerScriptList) return 0;

                sharedAudioPlayerScriptList.innerHTML = '';

                lines.forEach((line, lineIndex) => {
                    const item = document.createElement('div');
                    item.className = 'rounded-2xl border border-slate-200/60 bg-white/70 p-2.5 dark:border-slate-700/30 dark:bg-slate-900/20';

                    const row = document.createElement('div');
                    row.className = 'flex items-start gap-2.5';

                    const badge = document.createElement('div');
                    badge.className = 'flex h-7 w-7 items-center justify-center rounded-2xl border border-slate-200/70 bg-white/70 text-xs font-black text-slate-700 dark:border-slate-700/40 dark:bg-slate-900/20 dark:text-slate-200';
                    badge.textContent = String(lineIndex + 1);

                    const textWrap = document.createElement('div');
                    textWrap.className = 'min-w-0 flex-1';

                    const text = document.createElement('div');
                    text.className = 'text-xs font-semibold text-slate-700 dark:text-slate-200 sm:text-sm';
                    text.appendChild(buildSafeScriptFragment(line));

                    textWrap.appendChild(text);
                    row.appendChild(badge);
                    row.appendChild(textWrap);
                    item.appendChild(row);
                    sharedAudioPlayerScriptList.appendChild(item);
                });

                return lines.length;
            }

            function updateSharedAudioPlayer(question) {
                const nextAudioSrc = question?.audio || DEFAULT_AUDIO || '';
                const lines = getCurrentScriptLines();
                const hasAudio = !!nextAudioSrc;
                const scriptCount = renderAudioPlayerScriptContent(lines);

                if (sharedAudioPlayerWrap) {
                    sharedAudioPlayerWrap.classList.toggle('hidden', !hasAudio);
                }

                if (sharedAudioPlayerRoot) {
                    sharedAudioPlayerRoot.classList.toggle('hidden', !hasAudio);
                }

                if (sharedAudioPlayerScriptBtn) {
                    sharedAudioPlayerScriptBtn.classList.toggle('hidden', scriptCount === 0);
                }

                if (!hasAudio) {
                    if (sharedAudioPlayerModal) {
                        sharedAudioPlayerModal.classList.add('hidden');
                    }
                    stopSharedAudioPlayer();
                    return;
                }

                setSharedAudioPlayerSource(nextAudioSrc);

                if (scriptCount === 0 && sharedAudioPlayerModal) {
                    sharedAudioPlayerModal.classList.add('hidden');
                }
            }

            function setQuestionImage(src, alt = 'Question image') {
                if (!questionImage) return;

                const nextSrc = src || questionImage.dataset.defaultSrc || '';
                if (questionImage.getAttribute('src') !== nextSrc) {
                    questionImage.src = nextSrc;
                }

                questionImage.alt = alt;
                syncImageViewportAspectRatio();
                resetImageZoom();
            }

            function getImageViewportBaseVh() {
                if (window.matchMedia('(max-width: 640px)').matches) return GAME_TYPE === 'inspect-image' ? 42 : 34;
                if (window.matchMedia('(max-width: 1023px)').matches) return GAME_TYPE === 'inspect-image' ? 50 : 42;
                return GAME_TYPE === 'inspect-image' ? 62 : 52;
            }

            function syncImageViewportAspectRatio() {
                if (!imageViewport || !questionImage) return;

                if (IMAGE_ASPECT_RATIO) {
                    const parts = String(IMAGE_ASPECT_RATIO).split('/').map((part) => Number(part.trim()));
                    const forcedWidth = parts[0];
                    const forcedHeight = parts[1];
                    const forcedRatio = forcedWidth > 0 && forcedHeight > 0 ? forcedWidth / forcedHeight : 1;

                    imageViewport.style.aspectRatio = IMAGE_ASPECT_RATIO;
                    imageViewport.style.width = `min(100%, calc(${getImageViewportBaseVh()}vh * ${forcedRatio} * ${IMAGE_SCALE}))`;
                    return;
                }

                const { naturalWidth, naturalHeight } = questionImage;
                if (!naturalWidth || !naturalHeight) return;

                const ratio = naturalWidth / naturalHeight;
                imageViewport.style.aspectRatio = `${naturalWidth} / ${naturalHeight}`;
                imageViewport.style.width = `min(100%, calc(${getImageViewportBaseVh()}vh * ${ratio} * ${IMAGE_SCALE}))`;
            }

            function isCoarsePointer() {
                return window.matchMedia('(hover: none), (pointer: coarse)').matches;
            }

            function applyImageBaseTransform() {
                if (!questionImage) return;

                questionImage.style.transformOrigin = imageZoomLocked ? questionImage.style.transformOrigin : '50% 50%';

                if (!ENABLE_IMAGE_ZOOM) {
                    questionImage.style.transform = 'none';
                    return;
                }

                if (imageZoomLocked) {
                    questionImage.style.transform = `scale(${IMAGE_HOVER_ZOOM * IMAGE_EXTRA_SCALE})`;
                    return;
                }

                questionImage.style.transform = !isCoarsePointer()
                    ? `scale(${IMAGE_EXTRA_SCALE})`
                    : 'none';
            }

            function resetImageZoom() {
                imageZoomLocked = false;
                applyImageBaseTransform();
            }

            function updateImageZoom(event) {
                if (!ENABLE_IMAGE_ZOOM || !imageViewport || !questionImage) return;
                if (isCoarsePointer()) return;

                const rect = imageViewport.getBoundingClientRect();
                if (!rect.width || !rect.height) return;

                const x = Math.max(0, Math.min(event.clientX - rect.left, rect.width));
                const y = Math.max(0, Math.min(event.clientY - rect.top, rect.height));

                questionImage.style.transformOrigin = `${(x / rect.width) * 100}% ${(y / rect.height) * 100}%`;
                questionImage.style.transform = `scale(${IMAGE_HOVER_ZOOM * IMAGE_EXTRA_SCALE})`;
            }

            function hideImageZoom() {
                if (!isCoarsePointer()) {
                    imageZoomLocked = false;
                }
                applyImageBaseTransform();
            }

            function toggleImageTouchZoom(event) {
                if (!ENABLE_IMAGE_ZOOM || !imageViewport || !questionImage || !isCoarsePointer()) return;

                const rect = imageViewport.getBoundingClientRect();
                if (!rect.width || !rect.height) return;

                const x = Math.max(0, Math.min(event.clientX - rect.left, rect.width));
                const y = Math.max(0, Math.min(event.clientY - rect.top, rect.height));

                imageZoomLocked = !imageZoomLocked;
                questionImage.style.transformOrigin = `${(x / rect.width) * 100}% ${(y / rect.height) * 100}%`;
                applyImageBaseTransform();
            }

            function formatElapsedTime() {
                const elapsed = Math.floor((Date.now() - startTime) / 1000);
                const mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                const secs = String(elapsed % 60).padStart(2, '0');
                return `${mins}:${secs}`;
            }

            function updateTimerDisplay() {
                const timerEl = document.getElementById('gameTimer');
                if (timerEl) timerEl.textContent = formatElapsedTime();
            }

            function startTimer() {
                clearInterval(timerInt);
                updateTimerDisplay();
                timerInt = setInterval(updateTimerDisplay, 1000);
            }

            let toastFallbackTimer = null;
            function showToast(text, icon = "✨") {
                const toastIcon = document.getElementById('toastIcon');
                const toastText = document.getElementById('toastText');
                const toast = document.getElementById('toastOne');
                if (toastIcon) toastIcon.textContent = icon;
                if (toastText) toastText.textContent = text;
                if (liveRegion) liveRegion.textContent = `${icon} ${text}`;
                if (!toast) return;

                if (toastFallbackTimer) {
                    clearTimeout(toastFallbackTimer);
                    toastFallbackTimer = null;
                }

                if (!window.gsap) {
                    toast.style.opacity = '1';
                    toast.style.transform = 'translateX(-50%) translateY(0)';
                    toastFallbackTimer = setTimeout(() => { toast.style.opacity = '0'; }, 1250);
                    return;
                }

                gsap.timeline()
                    .to("#toastOne", { opacity: 1, y: 0, duration: 0.3 })
                    .to("#toastOne", { opacity: 0, y: -10, duration: 0.3 }, "+=1");
            }

            function escapeHtml(value) {
                return String(value ?? '')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            function formatCorrectionText(value) {
                return escapeHtml(value)
                    .replace(/&lt;br\s*\/?&gt;/gi, '<br>')
                    .replace(/\r?\n/g, '<br>');
            }

            function buildCorrectionHTML(question, isRevealed, questionIndex = idx) {
                if (!question) return '';

                if (isPersonalQuestion(question)) {
                    return `
                        <span>${formatCorrectionText(getQuestionPrompt(question))}</span>
                        <span class="inline-flex rounded-xl border border-[color:var(--mca-accent-border)] bg-[var(--mca-accent-bg)] px-3 py-1 text-[color:var(--mca-accent-text)] dark:border-[color:var(--mca-accent-border-dark)] dark:bg-[var(--mca-accent-bg-dark)] dark:text-[color:var(--mca-accent-text-dark)]">Personal answer</span>
                    `;
                }

                const answers = getExpectedOptions(question, questionIndex);
                const answerClass = isRevealed
                    ? 'font-black text-rose-700 dark:text-rose-300'
                    : 'font-black text-emerald-700 dark:text-emerald-300';

                return `
                    <span>${formatCorrectionText(getQuestionPrompt(question))}</span>
                    ${answers.map((answer) => `
                        <span class="inline ${answerClass}">${escapeHtml(answer.label || answer.value || '')}</span>
                    `).join('')}
                `;
            }

            function buildAllCorrectionsHTML() {
                return QUESTIONS.map((question, questionIndex) => `
                    <div class="mb-1.5 flex items-start gap-2 last:mb-0">
                        <span class="shrink-0 text-xs font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                            ${questionIndex + 1}.
                        </span>
                        <span class="min-w-0 text-sm font-bold leading-[1.45] text-slate-900 dark:text-white sm:text-[15px]">${buildCorrectionHTML(question, revealedQuestions.has(questionIndex), questionIndex)}</span>
                    </div>
                `).join('');
            }

            function setResultsCorrectionVisible(visible) {
                if (!resultsCorrectionCard) return;

                resultsCorrectionCard.classList.toggle('hidden', !visible);

                if (visible && finalCorrection) {
                    finalCorrection.innerHTML = buildAllCorrectionsHTML();
                }
            }

            function openResultsOverlay(showCorrection = false) {
                document.getElementById('finalCorrect').textContent = `${firstTryCorrect}/${scoredQuestionCount}`;
                document.getElementById('finalTime').textContent = document.getElementById('gameTimer').textContent;
                document.getElementById('finalMistakes').textContent = wrongTries;
                setResultsCorrectionVisible(showCorrection);
                winModal?.classList.remove('hidden');
                document.documentElement.classList.add('overflow-hidden');
            }

            function closeResultsOverlay() {
                winModal?.classList.add('hidden');
                document.documentElement.classList.remove('overflow-hidden');
            }

            function restartGame() {
                stopSharedAudioPlayer();
                stopCharacterAudios();
                sharedAudioPlayerModal?.classList.add('hidden');
                closeResultsOverlay();
                setResultsCorrectionVisible(false);
                idx = 0;
                firstTryCorrect = 0;
                wrongTries = 0;
                hintsLeft = 2;
                wrongedQuestions = new Set();
                completedQuestions = new Set();
                revealedQuestions = new Set();
                hintedQuestions = new Set();
                selectedCorrectValues = new Map();
                wrongSelectedValues = new Map();
                hintedDisabledValues = new Map();
                optionOrderCache = new Map();
                optionPageByQuestion = new Map();
                startTime = Date.now();
                document.getElementById('tilesCount').textContent = `0/${QUESTIONS.length}`;
                document.getElementById('correctCount').textContent = '0';
                document.getElementById('mistakesCount').textContent = '0';
                startTimer();
                renderQuestion();
            }

            function finishGame() {
                clearInterval(timerInt);
                openResultsOverlay(false);
                play(audio.success);
            }

            function shuffle(items) {
                const copy = [...items];

                for (let index = copy.length - 1; index > 0; index--) {
                    const swapIndex = Math.floor(Math.random() * (index + 1));
                    [copy[index], copy[swapIndex]] = [copy[swapIndex], copy[index]];
                }

                return copy;
            }

            function normalizeOption(option) {
                if (typeof option === 'string' || typeof option === 'number') {
                    const rawValue = String(option ?? '');
                    return {
                        value: rawValue,
                        label: optionLabelMap[rawValue] || rawValue.replace(/_/g, ' '),
                        image: null,
                        alt: optionLabelMap[rawValue] || rawValue.replace(/_/g, ' '),
                    };
                }

                const rawValue = option?.value ?? option?.key ?? option?.id ?? option?.label ?? option?.text ?? option?.word ?? '';
                const label = option?.label ?? option?.text ?? option?.word ?? option?.title ?? optionLabelMap[rawValue] ?? rawValue;

                return {
                    value: String(rawValue ?? ''),
                    label: String(label ?? ''),
                    image: option?.image ?? option?.src ?? option?.thumbnail ?? option?.url ?? null,
                    alt: option?.alt ?? label ?? rawValue ?? '',
                };
            }

            function normalizeBoolean(value, fallback = false) {
                if (typeof value === 'boolean') return value;
                if (typeof value === 'string') {
                    const normalized = value.trim().toLowerCase();
                    if (['true', '1', 'yes', 'on'].includes(normalized)) return true;
                    if (['false', '0', 'no', 'off'].includes(normalized)) return false;
                }
                if (typeof value === 'number') return value !== 0;
                return fallback;
            }

            function getStoredSet(store, questionIndex) {
                return store.get(questionIndex) || new Set();
            }

            function addStoredValue(store, questionIndex, value) {
                const values = new Set(getStoredSet(store, questionIndex));
                values.add(String(value));
                store.set(questionIndex, values);
                return values;
            }

            function getQuestionPrompt(question) {
                return String(question?.prompt ?? question?.question ?? question?.text ?? 'Choose the correct answer.');
            }

            function isPersonalQuestion(question) {
                return String(question?.type ?? '').toLowerCase() === 'personal'
                    || question?.is_personal === true;
            }

            function getQuestionOptionType(question) {
                return String(question?.option_type ?? OPTION_TYPE ?? 'text').toLowerCase() === 'image' ? 'image' : 'text';
            }

            function getOptionsGridClass(question) {
                if (question?.options_grid_class) return String(question.options_grid_class);
                if (HAS_CUSTOM_OPTIONS_GRID_CLASS && OPTIONS_GRID_CLASS) return OPTIONS_GRID_CLASS;
                return getQuestionOptionType(question) === 'image' ? DEFAULT_IMAGE_GRID_CLASS : DEFAULT_TEXT_GRID_CLASS;
            }

            function getQuestionOptionPageSize(question) {
                const optionType = getQuestionOptionType(question);
                const rawSize = Number(question?.option_page_size ?? OPTION_PAGE_SIZE ?? 0);
                if (Number.isFinite(rawSize) && rawSize > 0) return Math.floor(rawSize);
                return optionType === 'image' ? 8 : 6;
            }

            function shouldPaginateOptions(question, optionCount) {
                const pageSize = getQuestionOptionPageSize(question);
                const enabled = normalizeBoolean(question?.option_pagination, OPTION_PAGINATION);
                return enabled && pageSize > 0 && optionCount > pageSize;
            }

            function getQuestionOptions(question, questionIndex = idx) {
                if (optionOrderCache.has(questionIndex)) {
                    return optionOrderCache.get(questionIndex);
                }

                const rawOptions = Array.isArray(question?.options) ? question.options : [];
                const normalizedOptions = rawOptions.map(normalizeOption).filter((option) => String(option.value) !== '');
                const orderedOptions = SHUFFLE_OPTIONS ? shuffle(normalizedOptions) : normalizedOptions;
                optionOrderCache.set(questionIndex, orderedOptions);
                return orderedOptions;
            }

            function getRawCorrectValues(question) {
                if (isPersonalQuestion(question)) return [];

                let rawCorrect = question?.correct;
                if (rawCorrect === undefined || rawCorrect === null || rawCorrect === '') rawCorrect = question?.correct_answer;
                if (rawCorrect === undefined || rawCorrect === null || rawCorrect === '') rawCorrect = question?.correct_answers;
                if (rawCorrect === undefined || rawCorrect === null || rawCorrect === '') rawCorrect = question?.answer;
                if (rawCorrect === undefined || rawCorrect === null || rawCorrect === '') rawCorrect = question?.answers;

                return (Array.isArray(rawCorrect) ? rawCorrect : [rawCorrect])
                    .map((value) => String(value ?? '').trim())
                    .filter((value) => value !== '');
            }

            function getExpectedOptions(question, questionIndex = idx) {
                if (isPersonalQuestion(question)) return [];

                const options = getQuestionOptions(question, questionIndex);
                const rawCorrectValues = getRawCorrectValues(question);
                const seen = new Set();

                return rawCorrectValues
                    .map((correctValue) => {
                        const expectedValue = String(correctValue ?? '');
                        const matchedOption = options.find((option, optionIndex) =>
                            String(option.value) === expectedValue
                            || String(option.label) === expectedValue
                            || String(optionIndex) === expectedValue
                            || String(optionIndex + 1) === expectedValue
                        );

                        return matchedOption || normalizeOption(expectedValue);
                    })
                    .filter((option) => {
                        const key = String(option?.value ?? option?.label ?? '');
                        if (!key || seen.has(key)) return false;
                        seen.add(key);
                        return true;
                    });
            }

            function getExpectedValues(question, questionIndex = idx) {
                return new Set(
                    getExpectedOptions(question, questionIndex).map((option) => String(option?.value ?? ''))
                );
            }

            function allQuestionsProgressed() {
                return QUESTIONS.every((question, questionIndex) =>
                    isPersonalQuestion(question)
                        ? completedQuestions.has(questionIndex)
                        : completedQuestions.has(questionIndex) || revealedQuestions.has(questionIndex)
                );
            }

            function findNextUnfinishedIndex(fromIndex = idx) {
                if (!Array.isArray(QUESTIONS) || QUESTIONS.length === 0) return -1;

                for (let offset = 1; offset <= QUESTIONS.length; offset++) {
                    const candidateIndex = (fromIndex + offset) % QUESTIONS.length;
                    const candidateQuestion = QUESTIONS[candidateIndex];
                    const progressed = isPersonalQuestion(candidateQuestion)
                        ? completedQuestions.has(candidateIndex)
                        : completedQuestions.has(candidateIndex) || revealedQuestions.has(candidateIndex);

                    if (!progressed) return candidateIndex;
                }

                return -1;
            }

            function setNavDisabledState(button, disabled) {
                if (!button) return;
                button.disabled = disabled;
                button.classList.toggle('opacity-60', disabled);
                button.classList.toggle('pointer-events-none', disabled);
                button.classList.toggle('cursor-not-allowed', disabled);
            }

            function getProgressCount() {
                const progressedQuestions = new Set([...completedQuestions, ...revealedQuestions]);
                return Math.min(progressedQuestions.size, QUESTIONS.length);
            }

            function updateStatusUI() {
                document.getElementById('tilesCount').textContent = `${getProgressCount()}/${QUESTIONS.length}`;
                document.getElementById('correctCount').textContent = String(firstTryCorrect);
                document.getElementById('mistakesCount').textContent = String(wrongTries);
                document.getElementById('hintBadge').textContent = String(hintsLeft);
                if (questionIndicator) questionIndicator.textContent = QUESTIONS.length > 0 ? `${idx + 1} of ${QUESTIONS.length}` : 'No questions';
                const currentQuestionClosed = completedQuestions.has(idx) || revealedQuestions.has(idx);
                setNavDisabledState(document.getElementById('btnHint'), hintsLeft <= 0 || currentQuestionClosed || isPersonalQuestion(QUESTIONS[idx]));
                setNavDisabledState(btnPrev, idx <= 0);
                setNavDisabledState(btnNext, idx >= QUESTIONS.length - 1);
            }

            function getOptionLetter(visualIndex) {
                return String.fromCharCode(65 + (Number(visualIndex) % 26));
            }

            function renderTextOption(option, visualIndex = 0) {
                const button = document.createElement('button');
                button.type = 'button';
                button.dataset.value = String(option.value);
                button.setAttribute('aria-label', String(option.label || option.value || 'Answer option'));
                button.className = "group flex min-h-[56px] w-full items-center gap-3 rounded-2xl border-2 border-slate-200/90 bg-white/95 px-3.5 py-3 text-left text-[15px] font-black leading-[1.32] text-slate-950 shadow-[0_8px_22px_rgba(15,23,42,0.045)] transition duration-200 ease-out hover:border-[color:var(--mca-accent-border)] hover:bg-white hover:shadow-md active:scale-[0.985] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--mca-accent-ring)] disabled:cursor-not-allowed disabled:hover:shadow-[0_8px_22px_rgba(15,23,42,0.045)] dark:border-slate-700/70 dark:bg-slate-900/70 dark:text-slate-50 dark:hover:border-[color:var(--mca-accent-border-dark)] dark:hover:bg-slate-900 dark:focus-visible:ring-[color:var(--mca-accent-ring-dark)] sm:min-h-[58px] sm:px-4 sm:text-base";

                const badge = document.createElement('span');
                badge.className = "flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-slate-200/80 bg-slate-100 text-xs font-black text-slate-700 transition group-hover:border-[color:var(--mca-accent-border)] group-hover:bg-[var(--mca-accent-bg)] group-hover:text-[color:var(--mca-accent-text)] dark:border-slate-700/70 dark:bg-slate-800 dark:text-slate-200 dark:group-hover:border-[color:var(--mca-accent-border-dark)] dark:group-hover:bg-[var(--mca-accent-bg-dark)] dark:group-hover:text-[color:var(--mca-accent-text-dark)]";
                badge.textContent = getOptionLetter(visualIndex);

                const label = document.createElement('span');
                label.className = 'min-w-0 flex-1';
                label.textContent = option.label || option.value || 'Option';

                button.appendChild(badge);
                button.appendChild(label);
                button.onclick = () => answerChoice(option.value, button);
                return button;
            }

            function renderImageOption(option, visualIndex) {
                const button = document.createElement('button');
                button.type = 'button';
                button.dataset.value = String(option.value);
                button.dataset.label = option.label;
                button.setAttribute('aria-label', String(option.label || option.value || 'Image answer option'));
                button.className =
                    "group relative w-full aspect-square overflow-hidden rounded-2xl border-2 border-slate-200/90 bg-white/95 p-1.5 " +
                    "shadow-[0_10px_24px_rgba(15,23,42,0.06)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-950/50 sm:p-2 " +
                    "transition duration-200 ease-out hover:border-[color:var(--mca-accent-border)] hover:shadow-lg active:scale-[0.985] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--mca-accent-ring)] dark:hover:border-[color:var(--mca-accent-border-dark)] dark:focus-visible:ring-[color:var(--mca-accent-ring-dark)]" +
                    (IMAGE_OPTION_TILE_CLASS ? ` ${IMAGE_OPTION_TILE_CLASS}` : '');

                const inner = document.createElement('div');
                inner.className = "relative h-full w-full overflow-hidden rounded-[18px] bg-slate-100 dark:bg-slate-900/60";

                if (option.image) {
                    const image = document.createElement('img');
                    image.src = option.image;
                    image.alt = option.alt || option.label || '';
                    image.draggable = false;
                    image.className = "h-full w-full object-cover transition-transform duration-300 group-hover:scale-[1.03]";
                    inner.appendChild(image);
                } else {
                    const fallback = document.createElement('div');
                    fallback.className = "flex h-full w-full items-center justify-center px-3 text-center text-sm font-extrabold text-slate-700 dark:text-slate-200";
                    fallback.textContent = option.label || 'Option';
                    inner.appendChild(fallback);
                }

                const badge = document.createElement('div');
                badge.className =
                    "absolute left-3 top-3 z-10 inline-flex h-8 w-8 items-center justify-center rounded-full border border-white/70 " +
                    "bg-white/90 text-xs font-black text-slate-900 shadow-md dark:border-slate-700/50 dark:bg-slate-900/90 dark:text-slate-50";
                badge.textContent = getOptionLetter(visualIndex);

                const srOnly = document.createElement('span');
                srOnly.className = 'sr-only';
                srOnly.textContent = option.label || option.value || 'Option';

                button.appendChild(srOnly);
                button.appendChild(inner);
                button.appendChild(badge);
                if (SHOW_IMAGE_OPTION_LABEL) {
                    const label = document.createElement('div');
                    label.className =
                        "pointer-events-none absolute inset-x-2 bottom-2 flex min-h-[2.65rem] items-center justify-center rounded-xl border border-white/90 bg-white/95 px-3 py-2.5 text-center text-[13px] font-black leading-tight " +
                        "text-slate-950 shadow-md backdrop-blur dark:border-slate-700/70 dark:bg-slate-950/90 dark:text-slate-50 sm:text-sm";
                    label.textContent = option.label || option.value || 'Option';
                    button.appendChild(label);
                }
                button.onclick = () => answerChoice(option.value, button);

                return button;
            }

            function setOptionsGridLayout(grid, question = QUESTIONS[idx] || {}) {
                if (!grid) return;
                grid.className = getOptionsGridClass(question);
            }

            function isImageOptionType(optionType = getQuestionOptionType(QUESTIONS[idx] || {})) {
                return String(optionType).toLowerCase() === 'image';
            }

            function markCorrect(button, optionType = getQuestionOptionType(QUESTIONS[idx] || {})) {
                if (!button) return;
                button.setAttribute('aria-pressed', 'true');

                if (isImageOptionType(optionType)) {
                    button.classList.add('ring-4', 'ring-emerald-300/70', '!border-emerald-400');
                    return;
                }

                button.classList.add('!border-emerald-400/90', '!bg-emerald-50/95', '!text-emerald-950', 'ring-2', 'ring-emerald-300/60', 'dark:!bg-emerald-950/40', 'dark:!text-emerald-100', 'dark:ring-emerald-300/30');
            }

            function markWrong(button, optionType = getQuestionOptionType(QUESTIONS[idx] || {})) {
                if (!button) return;
                button.setAttribute('aria-pressed', 'true');

                if (isImageOptionType(optionType)) {
                    button.classList.add('ring-4', 'ring-rose-200/70', '!border-rose-300', 'opacity-85');
                    return;
                }

                button.classList.add('!border-rose-300/90', '!bg-rose-50/90', '!text-rose-950', 'opacity-90', 'ring-2', 'ring-rose-200/75', 'dark:!bg-rose-950/30', 'dark:!text-rose-100', 'dark:ring-rose-300/25');
            }

            function markSelected(button, optionType = getQuestionOptionType(QUESTIONS[idx] || {})) {
                if (!button) return;
                button.setAttribute('aria-pressed', 'true');

                if (isImageOptionType(optionType)) {
                    button.classList.add('ring-4', 'ring-[color:var(--mca-accent-ring)]', '!border-[color:var(--mca-accent-border)]', 'dark:ring-[color:var(--mca-accent-ring-dark)]', 'dark:!border-[color:var(--mca-accent-border-dark)]');
                    return;
                }

                button.classList.add('!border-[color:var(--mca-accent-border)]', '!bg-[var(--mca-accent-bg)]', '!text-[color:var(--mca-accent-text)]', 'ring-2', 'ring-[color:var(--mca-accent-ring)]', 'dark:!border-[color:var(--mca-accent-border-dark)]', 'dark:!bg-[var(--mca-accent-bg-dark)]', 'dark:!text-[color:var(--mca-accent-text-dark)]', 'dark:ring-[color:var(--mca-accent-ring-dark)]');
            }

            function markHinted(button, optionType = getQuestionOptionType(QUESTIONS[idx] || {})) {
                if (!button) return;

                if (isImageOptionType(optionType)) {
                    button.classList.add('opacity-40', 'grayscale');
                    return;
                }

                button.classList.add('opacity-50', 'grayscale', '!bg-slate-50/90', 'dark:!bg-slate-900/40');
            }

            function updateOptionsPager(question, totalOptions, visibleCount, currentPage, totalPages) {
                if (!optionsPager) return;

                const showPager = totalPages > 1;
                optionsPager.classList.toggle('hidden', !showPager);
                optionsPager.classList.toggle('flex', showPager);

                if (!showPager) return;

                const hiddenCount = Math.max(0, totalOptions - visibleCount);
                if (optionsPageLabel) {
                    optionsPageLabel.textContent = `Options ${currentPage + 1} of ${totalPages}`;
                }
                if (optionsHiddenLabel) {
                    optionsHiddenLabel.textContent = hiddenCount > 0 ? `${hiddenCount} hidden option${hiddenCount === 1 ? '' : 's'}` : 'All visible';
                }

                setNavDisabledState(optionsPagePrev, currentPage <= 0);
                setNavDisabledState(optionsPageNext, currentPage >= totalPages - 1);
                optionsPageNext?.classList.toggle('animate-pulse', currentPage < totalPages - 1);
            }

            function renderQuestion() {
                if (!Array.isArray(QUESTIONS) || QUESTIONS.length === 0) {
                    const qPromptText = document.getElementById('qPromptText');
                    const qPromptNumber = document.getElementById('qPromptNumber');
                    const grid = document.getElementById('optionsGrid');
                    if (qPromptNumber) qPromptNumber.textContent = '-';
                    if (qPromptText) qPromptText.textContent = 'No questions found.';
                    if (grid) grid.innerHTML = '';
                    updateOptionsPager({}, 0, 0, 0, 0);
                    updateStatusUI();
                    return;
                }

                const q = QUESTIONS[idx] || {};
                const optionTypeForQuestion = getQuestionOptionType(q);

                if (GAME_TYPE === 'emoji') {
                    const qEmoji = document.getElementById('qEmoji');
                    if (qEmoji) qEmoji.textContent = q.emoji || q.img || '👋';
                }

                updateSharedAudioPlayer(q);

                if (GAME_TYPE === 'image' || GAME_TYPE === 'inspect-image') {
                    setQuestionImage(
                        q.image || questionImage?.dataset.defaultSrc || '',
                        q.alt || getQuestionPrompt(q) || 'Question image'
                    );
                }

                const qPromptNumber = document.getElementById('qPromptNumber');
                const qPromptText = document.getElementById('qPromptText');
                const promptLabel = document.getElementById('questionPromptLabel');
                if (qPromptNumber) qPromptNumber.textContent = `${idx + 1}.`;
                if (qPromptText) qPromptText.textContent = getQuestionPrompt(q);
                if (promptLabel) promptLabel.textContent = isPersonalQuestion(q) ? 'Choose your answer:' : QUESTION_PROMPT_LABEL;
                updateStatusUI();

                const grid = document.getElementById('optionsGrid');
                if (!grid) return;

                grid.innerHTML = '';
                setOptionsGridLayout(grid, q);

                const expectedValues = getExpectedValues(q, idx);
                const selectedValues = getStoredSet(selectedCorrectValues, idx);
                const wrongValues = getStoredSet(wrongSelectedValues, idx);
                const hintedValues = getStoredSet(hintedDisabledValues, idx);
                const isCompletedQuestion = completedQuestions.has(idx);
                const isRevealedQuestion = revealedQuestions.has(idx);
                const renderedOptions = getQuestionOptions(q, idx);

                if (renderedOptions.length === 0) {
                    const empty = document.createElement('div');
                    empty.className = 'rounded-2xl border border-slate-200/70 bg-white/80 px-4 py-3 text-sm font-bold text-slate-600 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-300';
                    empty.textContent = 'No answer options found.';
                    grid.appendChild(empty);
                    updateOptionsPager(q, 0, 0, 0, 0);
                    return;
                }

                const pageSize = getQuestionOptionPageSize(q);
                const paginate = shouldPaginateOptions(q, renderedOptions.length);
                const totalPages = paginate ? Math.ceil(renderedOptions.length / pageSize) : 1;
                const currentPage = Math.max(0, Math.min(Number(optionPageByQuestion.get(idx) || 0), totalPages - 1));
                optionPageByQuestion.set(idx, currentPage);

                const visibleOptions = paginate
                    ? renderedOptions.slice(currentPage * pageSize, (currentPage + 1) * pageSize)
                    : renderedOptions;

                visibleOptions.forEach((option, visualIndex) => {
                    const absoluteIndex = paginate ? currentPage * pageSize + visualIndex : visualIndex;
                    const button = optionTypeForQuestion === 'image'
                        ? renderImageOption(option, absoluteIndex)
                        : renderTextOption(option, absoluteIndex);

                    const optionValue = String(option.value);
                    const shouldDisableAll = isCompletedQuestion || isRevealedQuestion;

                    if (isPersonalQuestion(q) && selectedValues.has(optionValue)) {
                        markSelected(button, optionTypeForQuestion);
                        button.disabled = true;
                    } else if (selectedValues.has(optionValue) || (shouldDisableAll && expectedValues.has(optionValue))) {
                        markCorrect(button, optionTypeForQuestion);
                        button.disabled = true;
                    } else if (wrongValues.has(optionValue)) {
                        markWrong(button, optionTypeForQuestion);
                        button.disabled = true;
                    } else if (hintedValues.has(optionValue)) {
                        markHinted(button, optionTypeForQuestion);
                        button.disabled = true;
                    } else if (shouldDisableAll) {
                        button.disabled = true;
                    }

                    grid.appendChild(button);
                });

                updateOptionsPager(q, renderedOptions.length, visibleOptions.length, currentPage, totalPages);
            }

            function moveAfterQuestionCommit() {
                if (allQuestionsProgressed()) {
                    finishGame();
                    return;
                }

                const nextIndex = findNextUnfinishedIndex(idx);
                if (nextIndex >= 0) {
                    idx = nextIndex;
                    renderQuestion();
                }
            }

            function answerChoice(selectedValue, button) {
                const q = QUESTIONS[idx];
                if (!q) return;

                const optionTypeForQuestion = getQuestionOptionType(q);
                const actualValue = String(selectedValue);

                if (revealedQuestions.has(idx)) return;

                if (isPersonalQuestion(q)) {
                    if (completedQuestions.has(idx)) return;

                    selectedCorrectValues.set(idx, new Set([actualValue]));
                    completedQuestions.add(idx);
                    markSelected(button, optionTypeForQuestion);
                    updateStatusUI();

                    Array.from(document.getElementById('optionsGrid').children).forEach((optionButton) => {
                        optionButton.disabled = true;
                    });

                    showToast('Answer saved', 'OK');

                    setTimeout(moveAfterQuestionCommit, 600);
                    return;
                }

                const expectedValues = getExpectedValues(q, idx);

                if (expectedValues.has(actualValue)) {
                    const selectedValues = new Set(getStoredSet(selectedCorrectValues, idx));
                    if (selectedValues.has(actualValue)) return;

                    selectedValues.add(actualValue);
                    selectedCorrectValues.set(idx, selectedValues);

                    play(audio.correct);
                    markCorrect(button, optionTypeForQuestion);
                    button.disabled = true;

                    if (selectedValues.size >= expectedValues.size) {
                        completedQuestions.add(idx);

                        if (!wrongedQuestions.has(idx) && !hintedQuestions.has(idx)) {
                            firstTryCorrect++;
                        }

                        updateStatusUI();

                        Array.from(document.getElementById('optionsGrid').children).forEach((optionButton) => {
                            optionButton.disabled = true;
                        });

                        setTimeout(moveAfterQuestionCommit, 600);
                    } else {
                        updateStatusUI();
                    }
                } else {
                    play(audio.wrong);

                    wrongTries++;
                    wrongedQuestions.add(idx);
                    addStoredValue(wrongSelectedValues, idx, actualValue);

                    markWrong(button, optionTypeForQuestion);
                    button.disabled = true;

                    updateStatusUI();
                }
            }

            document.getElementById('btnHint').onclick = () => {
                const q = QUESTIONS[idx];
                if (!q || isPersonalQuestion(q)) return;
                if (hintsLeft <= 0) return;

                const expectedValues = getExpectedValues(q, idx);
                const selectedValues = getStoredSet(selectedCorrectValues, idx);
                const wrongValues = getStoredSet(wrongSelectedValues, idx);
                const hintedValues = getStoredSet(hintedDisabledValues, idx);
                const unavailableValues = new Set([...selectedValues, ...wrongValues, ...hintedValues]);
                const renderedOptions = getQuestionOptions(q, idx);
                const wrongIndex = renderedOptions.findIndex((option) => {
                    const optionValue = String(option.value);
                    return !expectedValues.has(optionValue) && !unavailableValues.has(optionValue);
                });

                if (wrongIndex < 0) {
                    showToast('No hint available', '💡');
                    return;
                }

                const wrongOption = renderedOptions[wrongIndex];
                const pageSize = getQuestionOptionPageSize(q);

                hintsLeft--;
                hintedQuestions.add(idx);
                addStoredValue(hintedDisabledValues, idx, wrongOption.value);

                if (shouldPaginateOptions(q, renderedOptions.length)) {
                    optionPageByQuestion.set(idx, Math.floor(wrongIndex / pageSize));
                }

                updateStatusUI();
                renderQuestion();
                showToast('Hint used!', '💡');
            };

            optionsPagePrev?.addEventListener('click', () => {
                const currentPage = Number(optionPageByQuestion.get(idx) || 0);
                if (currentPage <= 0) return;
                optionPageByQuestion.set(idx, currentPage - 1);
                renderQuestion();
            });

            optionsPageNext?.addEventListener('click', () => {
                const q = QUESTIONS[idx] || {};
                const renderedOptions = getQuestionOptions(q, idx);
                const pageSize = getQuestionOptionPageSize(q);
                const totalPages = Math.max(1, Math.ceil(renderedOptions.length / pageSize));
                const currentPage = Number(optionPageByQuestion.get(idx) || 0);
                if (currentPage >= totalPages - 1) return;
                optionPageByQuestion.set(idx, currentPage + 1);
                renderQuestion();
            });

            function revealCorrection() {
                if (!QUESTIONS.length) return;

                let newlyRevealed = 0;
                for (let i = 0; i < QUESTIONS.length; i++) {
                    if (isPersonalQuestion(QUESTIONS[i])) continue;

                    if (!completedQuestions.has(i) && !revealedQuestions.has(i)) {
                        revealedQuestions.add(i);
                        newlyRevealed += 1;
                    }
                }

                wrongTries += newlyRevealed;
                updateStatusUI();
                renderQuestion();
                clearInterval(timerInt);
                openResultsOverlay(true);
                showToast("Corrections revealed", "📘");
            }

            document.getElementById('btnRestart').onclick = restartGame;
            restartBtnModal?.addEventListener('click', restartGame);
            closeGameWinModalBtn?.addEventListener('click', closeResultsOverlay);
            btnRevealCorrection?.addEventListener('click', revealCorrection);
            btnPrev?.addEventListener('click', () => {
                if (idx <= 0) return;
                idx -= 1;
                renderQuestion();
            });
            btnNext?.addEventListener('click', () => {
                if (idx >= QUESTIONS.length - 1) return;
                idx += 1;
                renderQuestion();
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    closeResultsOverlay();
                    sharedAudioPlayerModal?.classList.add('hidden');
                }
            });

            continueBtnModal?.addEventListener('click', () => {
                stopSharedAudioPlayer();
                stopCharacterAudios();
                try {
                    if (window.parent && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (e) {}

                try {
                    window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                } catch (e) {}
            });

            window.resetSlide = () => {
                restartGame();
            };

            window.stopSlideAudio = () => {
                stopSharedAudioPlayer();
                stopCharacterAudios();
            };

            window.addEventListener('pagehide', window.stopSlideAudio);
            window.addEventListener('beforeunload', window.stopSlideAudio);

            if (questionImage) {
                questionImage.addEventListener('load', () => {
                    syncImageViewportAspectRatio();
                    resetImageZoom();
                });
            }

            if (imageViewport && questionImage) {
                window.addEventListener('resize', () => {
                    syncImageViewportAspectRatio();
                    resetImageZoom();
                });
            }

            if (ENABLE_IMAGE_ZOOM && imageViewport && questionImage) {
                imageViewport.addEventListener('mouseenter', (event) => {
                    updateImageZoom(event);
                });

                imageViewport.addEventListener('mousemove', updateImageZoom);
                imageViewport.addEventListener('mouseleave', hideImageZoom);
                imageViewport.addEventListener('click', toggleImageTouchZoom);
            }

            renderQuestion();
            updateStatusUI();
            startTimer();
        })();
    </script>
@endsection
