@extends("slider.simple-layout")

@php
    $content = is_array($content ?? null) ? $content : [];
    $gameType = $content['type'] ?? 'emoji';
    $hasQuestionMediaPanel = !in_array($gameType, ['questions_only', 'audio', 'text'], true);
    $initialAudio = $content['audio'] ?? ($content['questions'][0]['audio'] ?? null);
    $optionType = $content['option_type'] ?? 'text';
    $characters = $content['characters'] ?? [];
    $readingTitle = trim((string) ($content['reading_title'] ?? $content['reading_heading'] ?? ''));
    $readingAlign = trim((string) ($content['reading_align'] ?? 'justify'));
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
    $themeName = strtolower((string) ($theme['name'] ?? 'default'));
    $isOrangeTheme = $themeName === 'orange';
    $isGreenTheme = $themeName === 'green';
    $primaryButtonClass = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-tr from-blue-500 via-indigo-600 to-violet-600 hover:from-blue-600 hover:via-indigo-500 hover:to-violet-500'));
    if ($primaryButtonClass === '') {
        $primaryButtonClass = 'bg-gradient-to-tr from-blue-500 via-indigo-600 to-violet-600 hover:from-blue-600 hover:via-indigo-500 hover:to-violet-500';
    }
    if ($isGreenTheme) {
        $primaryButtonClass = 'bg-gradient-to-br from-emerald-700 via-emerald-600 to-green-500 dark:from-emerald-300 dark:via-emerald-400 dark:to-green-400 dark:text-emerald-950';
    }
    if ($isOrangeTheme && empty($theme['button_primary_color'])) {
        $primaryButtonClass = 'bg-gradient-to-br from-orange-500 via-orange-600 to-amber-500';
    }

    if ($isOrangeTheme) {
        $mcaAccentStyle = '--mca-accent-bg: rgba(255, 237, 213, .96); --mca-accent-bg-hover: rgba(254, 215, 170, .96); --mca-accent-border: rgba(251, 146, 60, .55); --mca-accent-text: rgb(194, 65, 12); --mca-accent-ring: rgba(251, 146, 60, .24); --mca-accent-bg-dark: rgba(154, 52, 18, .32); --mca-accent-bg-hover-dark: rgba(154, 52, 18, .46); --mca-accent-border-dark: rgba(251, 146, 60, .48); --mca-accent-text-dark: rgb(255, 237, 213); --mca-accent-ring-dark: rgba(251, 146, 60, .22);';
    } elseif ($isGreenTheme) {
        $mcaAccentStyle = '--mca-accent-bg: rgba(220, 252, 231, .96); --mca-accent-bg-hover: rgba(187, 247, 208, .96); --mca-accent-border: rgba(34, 197, 94, .50); --mca-accent-text: rgb(21, 128, 61); --mca-accent-ring: rgba(34, 197, 94, .22); --mca-accent-bg-dark: rgba(20, 83, 45, .34); --mca-accent-bg-hover-dark: rgba(20, 83, 45, .50); --mca-accent-border-dark: rgba(74, 222, 128, .46); --mca-accent-text-dark: rgb(220, 252, 231); --mca-accent-ring-dark: rgba(74, 222, 128, .22);';
    } else {
        $mcaAccentStyle = '--mca-accent-bg: rgba(238, 242, 255, .96); --mca-accent-bg-hover: rgba(224, 231, 255, .98); --mca-accent-border: rgba(129, 140, 248, .48); --mca-accent-text: rgb(67, 56, 202); --mca-accent-ring: rgba(99, 102, 241, .24); --mca-accent-bg-dark: rgba(67, 56, 202, .26); --mca-accent-bg-hover-dark: rgba(67, 56, 202, .38); --mca-accent-border-dark: rgba(129, 140, 248, .46); --mca-accent-text-dark: rgb(224, 231, 255); --mca-accent-ring-dark: rgba(129, 140, 248, .22);';
    }
    $rawReadingPassage = $content['passage'] ?? $content['reading'] ?? $content['reading_passage'] ?? [];
    $readingPassage = is_array($rawReadingPassage)
        ? array_values(array_filter(array_map(static fn ($paragraph) => trim((string) $paragraph), $rawReadingPassage), static fn ($paragraph) => $paragraph !== ''))
        : array_values(array_filter(
            array_map('trim', preg_split('/\R{2,}/', trim((string) $rawReadingPassage)) ?: []),
            static fn ($paragraph) => $paragraph !== ''
        ));
    $enableImageZoom = true;
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
        ?? ($gameType === 'image' ? 'sm:col-span-7' : ($gameType === 'emoji' ? '' : ($gameType === 'reading' ? 'sm:col-span-6' : 'sm:col-span-5')));
    $answerPanelColClass = $content['answer_panel_col_class']
        ?? ($gameType === 'image' ? 'sm:col-span-5' : ($gameType === 'emoji' ? '' : ($gameType === 'reading' ? 'sm:col-span-6' : ($hasQuestionMediaPanel ? 'sm:col-span-7' : 'col-span-12'))));
    $imagePanelInnerClass = $content['image_panel_inner_class'] ?? 'h-full p-3 sm:p-4 lg:p-5';
    $answerPanelInnerClass = $content['answer_panel_inner_class'] ?? 'h-full p-4 sm:p-5 lg:p-6 text-left';
    $questionPromptLabel = $content['question_prompt_label'] ?? 'Choose the correct answer:';
    if ($isOrangeTheme) {
        $readingAccentClass = 'bg-gradient-to-b from-orange-400 via-orange-500 to-orange-600';
        $readingCardGlowClass = 'bg-[radial-gradient(120%_120%_at_0%_0%,rgba(254,215,170,.30)_0%,transparent_46%),radial-gradient(120%_120%_at_100%_0%,rgba(253,186,116,.18)_0%,transparent_44%)] dark:bg-[radial-gradient(120%_120%_at_0%_0%,rgba(249,115,22,.14)_0%,transparent_46%),radial-gradient(120%_120%_at_100%_0%,rgba(251,146,60,.10)_0%,transparent_44%)]';
        $readingDropCapClass = 'first-letter:text-orange-700 dark:first-letter:text-orange-300';
    } elseif ($isGreenTheme) {
        $readingAccentClass = 'bg-gradient-to-b from-emerald-400 via-green-500 to-teal-600';
        $readingCardGlowClass = 'bg-[radial-gradient(120%_120%_at_0%_0%,rgba(187,247,208,.28)_0%,transparent_46%),radial-gradient(120%_120%_at_100%_0%,rgba(167,243,208,.20)_0%,transparent_44%)] dark:bg-[radial-gradient(120%_120%_at_0%_0%,rgba(34,197,94,.14)_0%,transparent_46%),radial-gradient(120%_120%_at_100%_0%,rgba(45,212,191,.10)_0%,transparent_44%)]';
        $readingDropCapClass = 'first-letter:text-emerald-700 dark:first-letter:text-emerald-300';
    } else {
        $readingAccentClass = 'bg-gradient-to-b from-sky-400 via-indigo-500 to-violet-500';
        $readingCardGlowClass = 'bg-[radial-gradient(120%_120%_at_0%_0%,rgba(191,219,254,.30)_0%,transparent_46%),radial-gradient(120%_120%_at_100%_0%,rgba(199,210,254,.22)_0%,transparent_44%)] dark:bg-[radial-gradient(120%_120%_at_0%_0%,rgba(59,130,246,.14)_0%,transparent_46%),radial-gradient(120%_120%_at_100%_0%,rgba(129,140,248,.10)_0%,transparent_44%)]';
        $readingDropCapClass = 'first-letter:text-indigo-700 dark:first-letter:text-blue-300';
    }

    $optionsBank = $content['optionsBank'] ?? [];
    $optionsGridClass = $content['options_grid_class'] ?? ($optionType === 'image'
        ? 'mt-4 grid grid-cols-2 gap-2.5 sm:grid-cols-3 lg:grid-cols-4 sm:gap-3'
        : 'mt-4 grid grid-cols-1 gap-2.5 sm:grid-cols-2 sm:gap-3');
    $gameCardWidth = $content['game_card_width'] ?? ($gameType === 'emoji' || $gameType === 'audio' || $gameType === 'questions_only' || $gameType === 'text' ? 'max-w-5xl' : 'max-w-[1320px]');
    $imageOptionTileClass = trim((string) ($content['image_option_tile_class'] ?? ''));
    $showImageOptionLabel = array_key_exists('show_image_option_label', $content)
        ? (bool) $content['show_image_option_label']
        : true;
    $shuffleOptions = array_key_exists('shuffle_options', $content)
        ? (bool) $content['shuffle_options']
        : true;
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

    $isContentHeavyGame = in_array($gameType, ['reading', 'image', 'character_audios'], true) || $maxPromptChars > 120 || $maxOptionCount > 6;
    $topAlignGame = $verticalAlignment === 'top' || ($verticalAlignment === 'auto' && $isContentHeavyGame);
    $mainStackClass = $topAlignGame
        ? 'justify-start py-4 sm:py-5'
        : 'justify-center py-4 sm:py-5';
    $mainFlowClass = $topAlignGame
        ? 'pt-2 sm:pt-3 lg:pt-4'
        : 'pt-0';

    $readingDropCap = array_key_exists('reading_dropcap', $content)
        ? !empty($content['reading_dropcap'])
        : false;
@endphp

@section("style")
    <style>
        #mcaReadingCard {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        #mcaReadingCard::-webkit-scrollbar {
            display: none;
            width: 0;
            height: 0;
        }

        #questionIndicator {
            min-width: 3.35rem;
            white-space: nowrap;
            line-height: 1;
        }

        #winModal h1:first-of-type,
        #winModal h2:first-of-type,
        #winModal h3:first-of-type {
            width: 100%;
            text-align: center !important;
        }

        #winModal .game-win-header,
        #winModal .win-modal-header,
        #winModal [data-game-win-header] {
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
        }
    </style>
@endsection

@section("content")
    <div class="font-sans relative isolate min-h-[100dvh] overflow-x-hidden overflow-y-auto dark:text-slate-100 transition-colors duration-300" style="{{ $mcaAccentStyle }}">
        <main id="app" class="mx-auto flex min-h-[100dvh] w-full max-w-[1500px] flex-col {{ $mainStackClass }} px-3 pb-4 sm:px-5 sm:pb-5 lg:px-7">
            <section class="{{ $mainFlowClass }} flex flex-none flex-col">
                <div class="grid place-items-center text-center gap-2 sm:gap-2.5 auto-rows-max">
                    @include('slider.components.title-subtitle', [
                        'titleWrapClass' => 'header-spacing my-1 px-4 text-center sm:my-2 sm:px-6 lg:px-8',
                        'titleSpacingClass' => 'space-y-2',
                    ])

                    <div class="w-full {{ $gameCardWidth }} px-1.5 sm:px-2.5 lg:px-3 [&>#gameStatus]:mb-0">
                        @include('slider.components.game-status', ['statusWidthClass' => 'max-w-none'])
                    </div>

                    <section id="gameCard" class="relative w-full {{ $gameCardWidth }} flex-none select-none p-1.5 sm:p-2.5 lg:p-3">
                        <div id="questionPanel" class="grid min-h-0 grid-cols-1 {{ $content['question_panel_grid_class'] ?? ($gameType === 'emoji' ? 'sm:grid-cols-[minmax(0,29.4%)_minmax(0,70.6%)]' : 'sm:grid-cols-12') }} items-stretch overflow-hidden rounded-[1.25rem] border border-slate-200/70 bg-white/95 shadow-[0_14px_40px_rgba(15,23,42,0.07)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/90">
                            @if($hasQuestionMediaPanel)
                                <div class="{{ $imagePanelColClass }}">
                                    @if($gameType === 'character_audios')
                                        <div class="h-full p-4 sm:p-5">
                                            <div class="mt-4 space-y-3">
                                                @foreach($characters as $character)
                                                    <div class="rounded-2xl border border-slate-200/70 bg-white/80 p-3 dark:border-slate-700 dark:bg-slate-800/80">
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
                                        <div class="h-full min-h-0 p-2.5 text-left sm:p-3">
                                            <div id="mcaReadingCard" class="relative min-h-[230px] overflow-hidden rounded-[1.2rem] border border-slate-200/60 bg-white/65 px-3.5 py-3 shadow-sm backdrop-blur dark:border-slate-700/55 dark:bg-slate-950/25 sm:px-4 sm:py-3.5 {{ $readingCardGlowClass }}">
                                                <div class="pointer-events-none absolute inset-y-3 left-0 w-1 rounded-full {{ $readingAccentClass }}"></div>
                                                <div class="relative z-[1] pl-1.5">
                                                    @if($readingTitle !== '')
                                                        <h2 class="mt-2.5 max-w-[28ch] text-xl font-black leading-[1.06] tracking-[-0.04em] text-slate-950 dark:text-white sm:text-2xl lg:text-[1.65rem]">
                                                            {{ $readingTitle }}
                                                        </h2>
                                                    @endif

                                                    <div class="mt-3 grid gap-2 {{ $readingAlign === 'justify' ? 'text-justify' : 'text-left' }} {{ $readingCompact ? 'sm:gap-2' : 'sm:gap-2.5' }}">
                                                        @forelse($readingPassage as $paragraph)
                                                            @if($readingAllowHtml)
                                                                <div class="min-w-0 text-sm font-semibold leading-[1.6] text-slate-600 dark:text-slate-300 sm:text-base lg:text-[1.03rem]
                                                                    [&_table]:w-full [&_table]:border-separate [&_table]:border-spacing-0 [&_table]:overflow-hidden [&_table]:rounded-2xl [&_table]:border [&_table]:border-slate-200/70 [&_table]:bg-white/85 [&_table]:shadow-sm dark:[&_table]:border-slate-700/60 dark:[&_table]:bg-slate-900/45
                                                                    [&_th]:border-b [&_th]:border-r [&_th]:border-slate-200/70 [&_th]:bg-slate-50 [&_th]:px-3 [&_th]:py-2 [&_th]:text-left [&_th]:text-sm [&_th]:font-black [&_th]:text-slate-900 dark:[&_th]:border-slate-700/60 dark:[&_th]:bg-slate-800/60 dark:[&_th]:text-slate-100
                                                                    [&_td]:border-b [&_td]:border-r [&_td]:border-slate-200/70 [&_td]:px-3 [&_td]:py-2 [&_td]:text-sm [&_td]:font-bold [&_td]:text-slate-700 dark:[&_td]:border-slate-700/60 dark:[&_td]:text-slate-200">
                                                                    {!! $paragraph !!}
                                                                </div>
                                                            @else
                                                                <p class="m-0 text-sm font-semibold leading-[1.55] tracking-[-0.01em] text-slate-600 dark:text-slate-300 sm:text-[15px] lg:text-base {{ $readingTextSize === 'small' || $readingTextSize === 'sm' ? 'lg:text-sm' : '' }} {{ $loop->first && $readingDropCap ? 'first-letter:float-left first-letter:mr-2 first-letter:mt-1 first-letter:text-4xl first-letter:font-black first-letter:leading-[0.85] ' . $readingDropCapClass : '' }}">
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
                                    @elseif($gameType=="image")
                                        <div class="{{ $imagePanelInnerClass }}">
                                            <div
                                                    id="imageViewport"
                                                    class="relative mx-auto w-full max-h-[52dvh] overflow-hidden {{ $imageRadius }} {{ $enableImageZoom ? 'cursor-zoom-in' : '' }}"
                                                    style="aspect-ratio: 4 / 3;"
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

                                    @else
                                        <div class="flex min-h-[120px] items-center justify-center p-4 sm:h-full sm:p-5">
                                            <div id="qEmoji" class="text-6xl sm:text-7xl leading-none select-none">👋</div>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <div class="{{ $answerPanelColClass }} {{ $hasQuestionMediaPanel ? 'border-t border-slate-200/70 dark:border-slate-800 sm:border-t-0 sm:border-l' : '' }}">
                                <div class="{{ $answerPanelInnerClass }}">
                                    <div class="flex flex-wrap items-center justify-between gap-2 sm:gap-3">
                                        <div class="flex min-w-0 flex-wrap items-center gap-2 text-left">
                                            <div id="questionPromptLabel" class="min-w-0 rounded-xl bg-violet-50 px-3 py-1.5 text-sm font-bold leading-relaxed text-violet-700 dark:bg-violet-500/15 dark:text-violet-300 lg:text-base">
                                                {{ $questionPromptLabel }}
                                            </div>
                                            <span id="questionIndicator" class="inline-flex shrink-0 items-center justify-center rounded-full border border-slate-200/70 bg-slate-50 px-3 py-2 text-xs font-bold text-slate-600 shadow-sm dark:border-slate-700/60 dark:bg-slate-800/60 dark:text-slate-300">
                                                1 of 1
                                            </span>
                                        </div>

                                        <button
                                                id="btnRevealCorrection"
                                                type="button"
                                                class="inline-flex min-h-9 shrink-0 items-center justify-center gap-2 whitespace-nowrap rounded-xl border border-[color:var(--mca-accent-border)] bg-white px-4 py-2 text-xs font-bold text-[color:var(--mca-accent-text)] shadow-sm transition duration-200 ease-out hover:bg-[var(--mca-accent-bg-hover)] active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--mca-accent-ring)] dark:border-[color:var(--mca-accent-border-dark)] dark:bg-[var(--mca-accent-bg-dark)] dark:text-[color:var(--mca-accent-text-dark)] dark:hover:bg-[var(--mca-accent-bg-hover-dark)] dark:focus-visible:ring-[color:var(--mca-accent-ring-dark)] lg:px-5 lg:text-sm"
                                        >
                                            Show Answer
                                        </button>
                                    </div>

                                    <div id="sharedAudioPlayerWrap" class="my-3{{ empty($playerAudio) ? ' hidden' : '' }}">
                                        @include('slider.components.audio-player')
                                    </div>

                                    <div id="qPrompt" class="my-3 flex items-start gap-3 text-left text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-xl">
                                        <span id="qPromptNumber" class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-slate-200/70 bg-white text-sm font-bold text-slate-900 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/40 dark:text-slate-200">
                                            1.
                                        </span>
                                        <span id="qPromptText" class="min-w-0 pt-0.5">
                                            ...
                                        </span>
                                    </div>

                                    <div id="optionsGrid" class="{{ $optionsGridClass }}"></div>
                                </div>
                            </div>

                            <div class="col-span-full border-t border-slate-200/70 bg-slate-50/40 px-3 py-3 dark:border-slate-800 dark:bg-slate-950/20 sm:px-4">
                                <div class="grid grid-cols-2 gap-2.5 sm:grid-cols-4 sm:gap-3">
                                    <button
                                            id="btnRestart"
                                            type="button"
                                            class="inline-flex min-h-11 w-full items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-xs font-semibold text-slate-600 shadow-sm transition duration-200 ease-out hover:bg-slate-50 active:scale-95 dark:border-slate-700/70 dark:bg-slate-900/55 dark:text-slate-200 dark:hover:bg-slate-800 md:text-sm lg:text-base"
                                    >
                                        Restart Quiz
                                    </button>

                                    <button
                                            id="btnHint"
                                            type="button"
                                            class="inline-flex min-h-11 w-full items-center justify-center gap-1 rounded-xl border border-[color:var(--mca-accent-border)] bg-[var(--mca-accent-bg)] px-3 py-2.5 text-xs font-semibold text-[color:var(--mca-accent-text)] shadow-sm transition duration-200 ease-out hover:bg-[var(--mca-accent-bg-hover)] active:scale-95 disabled:cursor-not-allowed disabled:opacity-55 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--mca-accent-ring)] dark:border-[color:var(--mca-accent-border-dark)] dark:bg-[var(--mca-accent-bg-dark)] dark:text-[color:var(--mca-accent-text-dark)] dark:hover:bg-[var(--mca-accent-bg-hover-dark)] dark:focus-visible:ring-[color:var(--mca-accent-ring-dark)] md:text-sm lg:text-base"
                                    >
                                        Hint <span aria-hidden="true">·</span> <span><span id="hintBadge">2</span> left</span>
                                    </button>

                                    <button
                                            id="btnPrev"
                                            type="button"
                                            class="inline-flex min-h-11 w-full items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-xs font-semibold text-slate-600 shadow-sm transition duration-200 ease-out hover:bg-slate-50 active:scale-95 disabled:bg-slate-100 dark:border-slate-700/70 dark:bg-slate-900/55 dark:text-slate-200 dark:hover:bg-slate-800 dark:disabled:bg-slate-800 md:text-sm lg:text-base"
                                    >
                                        Previous Question
                                    </button>

                                    <button
                                            id="btnNext"
                                            type="button"
                                            class="inline-flex min-h-11 w-full items-center justify-center gap-1.5 rounded-xl px-3 py-2.5 text-xs font-semibold text-white shadow-sm transition duration-200 ease-out hover:brightness-105 active:scale-95 md:text-sm lg:text-base {{ $primaryButtonClass }}"
                                    >
                                        Next Question
                                        <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 5 7 7-7 7"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @include('slider.components.game-win-modal', [
                            'modalExtraView' => 'slider.components.game-win-modal-correction',
                            'modalExtraData' => ['section_only' => true],
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

        <div class="hidden !border-[color:var(--mca-accent-border)] !bg-[var(--mca-accent-bg)] !text-[color:var(--mca-accent-text)] ring-[color:var(--mca-accent-ring)] dark:!border-[color:var(--mca-accent-border-dark)] dark:!bg-[var(--mca-accent-bg-dark)] dark:!text-[color:var(--mca-accent-text-dark)] dark:ring-[color:var(--mca-accent-ring-dark)] hover:border-[color:var(--mca-accent-border)] focus-visible:ring-[color:var(--mca-accent-ring)] dark:hover:border-[color:var(--mca-accent-border-dark)] dark:focus-visible:ring-[color:var(--mca-accent-ring-dark)]"></div>
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
            const QUESTION_PROMPT_LABEL = @json($questionPromptLabel);
            const GLOBAL_SCRIPT_LINES = @json($globalScriptLines);

            // Fetch and decode upcoming pictures before Next changes the question.
            // Retain the images for the lifetime of this quiz and deduplicate URLs.
            const preloadedQuestionImages = new Map();
            if (GAME_TYPE === 'image') {
                const imageSources = [@json($content['image'] ?? ''), ...QUESTIONS.map(question => question.image)];
                imageSources.forEach(src => {
                    if (!src || preloadedQuestionImages.has(src)) return;
                    const image = new Image();
                    image.decoding = 'async';
                    preloadedQuestionImages.set(src, image);
                    image.src = src;
                    if (typeof image.decode === 'function') {
                        image.decode().catch(() => {});
                    }
                });
            }

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
            const liveRegion = document.getElementById('mcaLiveRegion');
            const characterAudios = Array.from(document.querySelectorAll('.character-audio'));
            const imageViewport = document.getElementById('imageViewport');
            const questionImage = document.getElementById('questionImage');
            const IMAGE_HOVER_ZOOM = 1.4;

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
                    badge.className = 'flex h-7 w-7 items-center justify-center rounded-2xl border border-slate-200/70 bg-white/70 text-xs font-black text-slate-700 dark:border-slate-700/35 dark:bg-slate-900/20 dark:text-slate-200';
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

            function syncImageViewportAspectRatio() {
                if (!imageViewport || !questionImage) return;

                if (IMAGE_ASPECT_RATIO) {
                    const parts = String(IMAGE_ASPECT_RATIO).split('/').map((part) => Number(part.trim()));
                    const forcedWidth = parts[0];
                    const forcedHeight = parts[1];
                    const forcedRatio = forcedWidth > 0 && forcedHeight > 0 ? forcedWidth / forcedHeight : 1;

                    imageViewport.style.aspectRatio = IMAGE_ASPECT_RATIO;
                    const forcedVhFactor = window.innerHeight < 820 ? 50 : 60;
                    imageViewport.style.width = `min(100%, calc(${forcedVhFactor}vh * ${forcedRatio} * ${IMAGE_SCALE}))`;
                    return;
                }

                const { naturalWidth, naturalHeight } = questionImage;
                if (!naturalWidth || !naturalHeight) return;

                const ratio = naturalWidth / naturalHeight;
                imageViewport.style.aspectRatio = `${naturalWidth} / ${naturalHeight}`;
                const vhFactor = window.innerHeight < 820 ? 50 : 60;
                imageViewport.style.width = `min(100%, calc(${vhFactor}vh * ${ratio} * ${IMAGE_SCALE}))`;
            }

            function applyImageBaseTransform() {
                if (!questionImage) return;

                questionImage.style.transformOrigin = '50% 50%';
                questionImage.style.transform = ENABLE_IMAGE_ZOOM
                    ? `scale(${IMAGE_EXTRA_SCALE})`
                    : 'none';
            }

            function resetImageZoom() {
                applyImageBaseTransform();
            }

            function updateImageZoom(event) {
                if (!ENABLE_IMAGE_ZOOM || !imageViewport || !questionImage) return;

                const rect = imageViewport.getBoundingClientRect();
                if (!rect.width || !rect.height) return;

                const x = Math.max(0, Math.min(event.clientX - rect.left, rect.width));
                const y = Math.max(0, Math.min(event.clientY - rect.top, rect.height));

                questionImage.style.transformOrigin = `${(x / rect.width) * 100}% ${(y / rect.height) * 100}%`;
                questionImage.style.transform = `scale(${IMAGE_HOVER_ZOOM * IMAGE_EXTRA_SCALE})`;
            }

            function hideImageZoom() {
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
                const template = document.createElement('template');
                template.innerHTML = String(value ?? '');

                return escapeHtml(template.content.textContent || '')
                    .replace(/&lt;br\s*\/?&gt;/gi, '<br>')
                    .replace(/\r?\n/g, '<br>');
            }

            function buildCorrectionHTML(question, isRevealed) {
                if (!question) return '';

                if (isPersonalQuestion(question)) {
                    return `
                        <span>${formatCorrectionText(getQuestionPrompt(question))}</span>
                        <span class="inline-flex rounded-xl bg-indigo-100/80 px-3 py-1 text-indigo-900 ring-1 ring-indigo-300/70 dark:bg-indigo-400/10 dark:text-indigo-100 dark:ring-indigo-300/30">Personal answer</span>
                    `;
                }

                const answers = getExpectedOptions(question);
                const answerClass = isRevealed
                    ? 'font-black text-rose-700 dark:text-rose-300'
                    : 'font-black text-emerald-700 dark:text-emerald-300';

                const explanation = String(question?.explanation ?? '').trim();

                return `
                    <span>${formatCorrectionText(getQuestionPrompt(question))}</span>
                    ${answers.map((answer) => `
                        <span class="inline ${answerClass}">${escapeHtml(answer.label || answer.value || '')}</span>
                    `).join('')}
                    ${explanation ? `<span class="mt-1 block text-xs font-semibold text-slate-600 dark:text-slate-300 sm:text-sm">${formatCorrectionText(explanation)}</span>` : ''}
                `;
            }

            function buildAllCorrectionsHTML() {
                return QUESTIONS.map((question, questionIndex) => `
                    <div class="mb-1.5 flex items-start gap-2 last:mb-0">
                        <span class="shrink-0 text-xs font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                            ${questionIndex + 1}.
                        </span>
                        <span class="min-w-0 text-sm font-bold leading-[1.45] text-slate-900 dark:text-white sm:text-[15px]">${buildCorrectionHTML(question, revealedQuestions.has(questionIndex))}</span>
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
                if (typeof option === 'string') {
                    return {
                        value: option,
                        label: optionLabelMap[option] || option.replace(/_/g, ' '),
                        image: null,
                        alt: optionLabelMap[option] || option.replace(/_/g, ' '),
                    };
                }

                return {
                    value: option?.value ?? option?.label ?? '',
                    label: option?.label ?? optionLabelMap[option?.value] ?? option?.value ?? '',
                    image: option?.image ?? null,
                    alt: option?.alt ?? option?.label ?? optionLabelMap[option?.value] ?? option?.value ?? '',
                };
            }

            function getQuestionPrompt(question) {
                return String(question?.prompt ?? 'Choose the correct answer.');
            }

            function isPersonalQuestion(question) {
                return String(question?.type ?? '').toLowerCase() === 'personal'
                    || question?.is_personal === true;
            }

            function getExpectedOptions(question) {
                if (isPersonalQuestion(question)) return [];

                const options = Array.isArray(question?.options) ? question.options.map(normalizeOption) : [];
                const rawCorrectValues = Array.isArray(question?.correct)
                    ? question.correct
                    : [question?.correct];

                const seen = new Set();

                return rawCorrectValues
                    .map((correctValue) => {
                        const expectedValue = String(correctValue ?? '');
                        const matchedOption = options.find((option) =>
                            String(option.value) === expectedValue || String(option.label) === expectedValue
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

            function getExpectedValues(question) {
                return new Set(
                    getExpectedOptions(question).map((option) => String(option?.value ?? ''))
                );
            }

            function getCorrectMode(question) {
                return String(question?.correct_mode ?? 'all').toLowerCase() === 'any'
                    ? 'any'
                    : 'all';
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

            function isQuestionFinished(questionIndex) {
                return completedQuestions.has(questionIndex) || revealedQuestions.has(questionIndex);
            }

            function isGameComplete() {
                if (!Array.isArray(QUESTIONS) || QUESTIONS.length === 0) return false;
                return QUESTIONS.every((question, questionIndex) => isQuestionFinished(questionIndex));
            }

            function findNextOpenQuestion(fromIndex) {
                if (!Array.isArray(QUESTIONS) || QUESTIONS.length === 0) return -1;

                for (let questionIndex = fromIndex + 1; questionIndex < QUESTIONS.length; questionIndex++) {
                    if (!isQuestionFinished(questionIndex)) return questionIndex;
                }

                for (let questionIndex = 0; questionIndex <= fromIndex; questionIndex++) {
                    if (!isQuestionFinished(questionIndex)) return questionIndex;
                }

                return -1;
            }

            function advanceAfterQuestionComplete() {
                setTimeout(() => {
                    if (isGameComplete()) {
                        finishGame();
                        return;
                    }

                    const nextOpenQuestion = findNextOpenQuestion(idx);
                    if (nextOpenQuestion >= 0) {
                        idx = nextOpenQuestion;
                        renderQuestion();
                    }
                }, 600);
            }


            function updateStatusUI() {
                document.getElementById('tilesCount').textContent = `${getProgressCount()}/${QUESTIONS.length}`;
                document.getElementById('correctCount').textContent = String(firstTryCorrect);
                document.getElementById('mistakesCount').textContent = String(wrongTries);
                document.getElementById('hintBadge').textContent = String(hintsLeft);
                if (questionIndicator) questionIndicator.textContent = QUESTIONS.length > 0 ? `${idx + 1} of ${QUESTIONS.length}` : 'No questions';
                setNavDisabledState(document.getElementById('btnHint'), hintsLeft <= 0 || isPersonalQuestion(QUESTIONS[idx]));
                setNavDisabledState(btnPrev, idx <= 0);
                setNavDisabledState(btnNext, idx >= QUESTIONS.length - 1);
            }

            function renderTextOption(option) {
                const button = document.createElement('button');
                button.type = 'button';
                button.dataset.value = String(option.value);
                button.setAttribute('aria-label', String(option.label || option.value || 'Answer option'));
                button.className = "min-h-[52px] rounded-[0.9rem] border border-slate-200 bg-white px-4 py-3 text-left text-base font-semibold leading-[1.35] text-slate-900 shadow-[0_2px_4px_rgba(15,23,42,0.05)] transition duration-200 ease-out hover:border-[color:var(--mca-accent-border)] hover:bg-slate-50 hover:shadow-md active:scale-[0.98] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--mca-accent-ring)] dark:border-slate-700/60 dark:bg-slate-900/45 dark:text-slate-200 dark:hover:border-[color:var(--mca-accent-border-dark)] dark:hover:bg-slate-800 dark:hover:text-slate-50 dark:focus-visible:ring-[color:var(--mca-accent-ring-dark)] lg:text-lg";
                button.textContent = option.label;
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
                    "group relative w-full aspect-square overflow-hidden rounded-2xl p-1.5 sm:p-2 " +
                    "border border-slate-200/70 bg-white/75 shadow-[0_10px_26px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-950/40 " +
                    "transition duration-200 ease-out hover:-translate-y-0.5 hover:shadow-lg active:scale-[0.98] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--mca-accent-ring)] dark:focus-visible:ring-[color:var(--mca-accent-ring-dark)]" +
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
                    "bg-white/90 text-xs font-black text-slate-900 shadow-md dark:border-slate-700/50 dark:bg-slate-900/85 dark:text-slate-50";
                badge.textContent = String.fromCharCode(65 + visualIndex);

                const srOnly = document.createElement('span');
                srOnly.className = 'sr-only';
                srOnly.textContent = option.label || option.value || 'Option';

                button.appendChild(srOnly);
                button.appendChild(inner);
                button.appendChild(badge);
                if (SHOW_IMAGE_OPTION_LABEL) {
                    const label = document.createElement('div');
                    label.className =
                        "pointer-events-none absolute inset-x-2 bottom-2 flex min-h-[2.4rem] items-center justify-center rounded-xl border border-white/80 bg-white/95 px-3 py-2.5 text-center text-xs font-black " +
                        "text-slate-900 shadow-md backdrop-blur dark:border-slate-700/60 dark:bg-slate-950/90 dark:text-slate-50 sm:text-sm";
                    label.textContent = option.label || option.value || 'Option';
                    button.appendChild(label);
                }
                button.onclick = () => answerChoice(option.value, button);

                return button;
            }

            function setOptionsGridLayout(grid) {
                grid.className = OPTIONS_GRID_CLASS;
            }

            function markCorrect(button) {
                if (OPTION_TYPE === 'image') {
                    button.classList.add('ring-4', 'ring-emerald-400/70', 'border-emerald-400');
                    return;
                }

                button.classList.add('!border-emerald-400/80', '!bg-emerald-50', '!text-emerald-900', 'font-extrabold', 'ring-2', 'ring-emerald-300/60', 'dark:!bg-emerald-950/30', 'dark:!text-emerald-100', 'dark:ring-emerald-300/30');
            }

            function markWrong(button) {
                if (OPTION_TYPE === 'image') {
                    button.classList.add('ring-4', 'ring-rose-400/70', 'border-rose-400', 'opacity-60');
                    return;
                }

                button.classList.add('!border-rose-400/80', '!bg-rose-50', '!text-rose-900', 'font-extrabold', 'opacity-75', 'ring-2', 'ring-rose-300/60', 'dark:!bg-rose-950/30', 'dark:!text-rose-100', 'dark:ring-rose-300/30');
            }

            function markSelected(button) {
                if (OPTION_TYPE === 'image') {
                    button.classList.add('ring-4', 'ring-[color:var(--mca-accent-ring)]', 'border-[color:var(--mca-accent-border)]', 'dark:ring-[color:var(--mca-accent-ring-dark)]', 'dark:border-[color:var(--mca-accent-border-dark)]');
                    return;
                }

                button.classList.add('!border-[color:var(--mca-accent-border)]', '!bg-[var(--mca-accent-bg)]', '!text-[color:var(--mca-accent-text)]', 'font-extrabold', 'ring-2', 'ring-[color:var(--mca-accent-ring)]', 'dark:!border-[color:var(--mca-accent-border-dark)]', 'dark:!bg-[var(--mca-accent-bg-dark)]', 'dark:!text-[color:var(--mca-accent-text-dark)]', 'dark:ring-[color:var(--mca-accent-ring-dark)]');
            }

            function renderQuestion() {
                if (!Array.isArray(QUESTIONS) || QUESTIONS.length === 0) {
                    const qPromptText = document.getElementById('qPromptText');
                    const qPromptNumber = document.getElementById('qPromptNumber');
                    const grid = document.getElementById('optionsGrid');
                    if (qPromptNumber) qPromptNumber.textContent = '-';
                    if (qPromptText) qPromptText.textContent = 'No questions found.';
                    if (grid) grid.innerHTML = '';
                    updateStatusUI();
                    return;
                }

                const q = QUESTIONS[idx] || {};

                if (GAME_TYPE === 'emoji') {
                    const qEmoji = document.getElementById('qEmoji');
                    if (qEmoji) qEmoji.textContent = q.emoji || q.img || '👋';
                }

                updateSharedAudioPlayer(q);

                if (GAME_TYPE === 'image') {
                    setQuestionImage(
                        q.image || questionImage?.dataset.defaultSrc || '',
                        q.alt || getQuestionPrompt(q) || 'Question image'
                    );
                }

                const qPromptNumber = document.getElementById('qPromptNumber');
                const qPromptText = document.getElementById('qPromptText');
                const promptLabel = document.getElementById('questionPromptLabel');
                if (qPromptNumber) qPromptNumber.textContent = `${idx + 1}.`;
                if (qPromptText) {
                    qPromptText.replaceChildren(buildSafeScriptFragment(getQuestionPrompt(q)));
                }
                if (promptLabel) promptLabel.textContent = isPersonalQuestion(q) ? 'Choose your answer:' : QUESTION_PROMPT_LABEL;
                updateStatusUI();

                const grid = document.getElementById('optionsGrid');
                grid.innerHTML = "";
                setOptionsGridLayout(grid);
                const expectedValues = getExpectedValues(q);
                const selectedValues = selectedCorrectValues.get(idx) || new Set();
                const isCompletedQuestion = completedQuestions.has(idx);

                const rawOptions = Array.isArray(q.options) ? q.options : [];
                const renderedOptions = SHUFFLE_OPTIONS
                    ? shuffle(rawOptions.map(normalizeOption))
                    : rawOptions.map(normalizeOption);

                if (renderedOptions.length === 0) {
                    const empty = document.createElement('div');
                    empty.className = 'rounded-2xl border border-slate-200/70 bg-white/80 px-4 py-3 text-sm font-bold text-slate-600 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/45 dark:text-slate-300';
                    empty.textContent = 'No answer options found.';
                    grid.appendChild(empty);
                    return;
                }

                renderedOptions.forEach((option, visualIndex) => {
                    const button = OPTION_TYPE === 'image'
                        ? renderImageOption(option, visualIndex)
                        : renderTextOption(option);

                    const optionValue = String(option.value);
                    if (isPersonalQuestion(q) && selectedValues.has(optionValue)) {
                        markSelected(button);
                        button.disabled = true;
                    } else if (selectedValues.has(optionValue) || (isCompletedQuestion && expectedValues.has(optionValue))) {
                        markCorrect(button);
                        button.disabled = true;
                    } else if (isCompletedQuestion) {
                        button.disabled = true;
                    }

                    grid.appendChild(button);
                });
            }

            function answerChoice(selectedValue, button) {
                const q = QUESTIONS[idx];
                const actualValue = String(selectedValue);

                if (isPersonalQuestion(q)) {
                    if (completedQuestions.has(idx)) return;

                    selectedCorrectValues.set(idx, new Set([actualValue]));
                    completedQuestions.add(idx);
                    markSelected(button);
                    updateStatusUI();

                    Array.from(document.getElementById('optionsGrid').children).forEach((optionButton) => {
                        optionButton.disabled = true;
                    });

                    showToast("Answer saved", "OK");

                    advanceAfterQuestionComplete();
                    return;
                }

                const expectedValues = getExpectedValues(q);
                const correctMode = getCorrectMode(q);

                if (expectedValues.has(actualValue)) {
                    const selectedValues = selectedCorrectValues.get(idx) || new Set();
                    if (selectedValues.has(actualValue)) return;

                    selectedValues.add(actualValue);
                    selectedCorrectValues.set(idx, selectedValues);

                    play(audio.correct);
                    markCorrect(button);
                    button.disabled = true;

                    if (correctMode === 'any' || selectedValues.size >= expectedValues.size) {
                        completedQuestions.add(idx);

                        if (!wrongedQuestions.has(idx) && !hintedQuestions.has(idx)) {
                            firstTryCorrect++;
                        }

                        updateStatusUI();

                        Array.from(document.getElementById('optionsGrid').children).forEach((optionButton) => {
                            optionButton.disabled = true;
                        });

                        advanceAfterQuestionComplete();
                    } else {
                        updateStatusUI();
                    }
                } else {
                    play(audio.wrong);

                    wrongTries++;
                    wrongedQuestions.add(idx);

                    markWrong(button);
                    button.disabled = true;

                    updateStatusUI();
                }
            }

            document.getElementById('btnHint').onclick = () => {
                if (isPersonalQuestion(QUESTIONS[idx])) return;
                if (hintsLeft <= 0) return;

                const btns = Array.from(document.getElementById('optionsGrid').children);
                const expectedValues = getExpectedValues(QUESTIONS[idx]);
                const wrong = btns.find((btn) => !expectedValues.has(String(btn.dataset.value)) && !btn.disabled);

                if (wrong) {
                    hintsLeft--;
                    hintedQuestions.add(idx);
                    wrong.disabled = true;
                    wrong.classList.add('opacity-35', 'grayscale');
                    updateStatusUI();
                    showToast("Hint used!", "💡");
                }
            };

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
                clearInterval(timerInt);
                openResultsOverlay(true);
                showToast("Corrections revealed", "📘");
            }

            document.getElementById('btnRestart').onclick = restartGame;
            restartBtnModal?.addEventListener('click', restartGame);
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
            }

            renderQuestion();
            updateStatusUI();
            startTimer();
        })();
    </script>
@endsection
