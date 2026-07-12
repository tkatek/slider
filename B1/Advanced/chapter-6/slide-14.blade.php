<?php

$content = [
    'type' => 'reading',

    'page_title' => 'Reading Comprehension',
    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Read the passage and complete the three exercises',

    'reading_title' => 'A Visit to Planet Earth Museum',

    // Keep options in their written A/B/C order.
    'shuffle_options' => false,

    // A single continuous paragraph, as requested.
    'passage' =>
        'Welcome to Planet Earth Museum, where you can learn amazing facts about our planet and discover why it is important to protect it. ' .
        'Forests are home to more than half of the world\'s plants and animals. Trees produce oxygen and clean the air, but every minute people destroy forests equal to more than 36 football fields. ' .
        'The oceans are home to millions of marine animals. Sadly, much of the rubbish we produce ends up in the sea. Turtles often mistake plastic bags for jellyfish, which can be deadly. ' .
        'In the Arctic and Antarctic, rising temperatures caused by burning fossil fuels are melting the ice. As a result, sea levels rise and many animals lose their habitats. ' .
        'Rivers provide fresh water for people and wildlife, but they are polluted by chemicals from farms and factories. We also waste a lot of water every day. ' .
        'We can all help protect our planet by recycling, reducing waste, saving water, and using cleaner forms of energy. Every small action makes a difference and helps create a greener, healthier future for everyone.',

    'exercises' => [
        [
            'id'          => 'exercise-1',
            'number'      => 1,
            'short_label' => 'Choose',
            'title'       => 'Choose the correct answer.',
            'instruction' => '',
            'type'        => 'multiple_choice',
        ],
        [
            'id'          => 'exercise-2',
            'number'      => 2,
            'short_label' => 'True / False',
            'title'       => 'True or False',
            'instruction' => '',
            'type'        => 'true_false',
        ],
        [
            'id'          => 'exercise-3',
            'number'      => 3,
            'short_label' => 'Find words',
            'title'       => 'Find words in the text that mean:',
            'instruction' => '',
            'type'        => 'text_input',
        ],
    ],

    'questions' => [
        // Exercise 1: multiple choice.
        [
            'exercise_id' => 'exercise-1',
            'type'        => 'multiple_choice',
            'prompt'      => 'Why are forests important?',
            'correct'     => 'B. They clean the air and produce oxygen.',
            'options'     => [
                'A. They provide food for factories.',
                'B. They clean the air and produce oxygen.',
                'C. They increase pollution.',
            ],
            'hints'       => [
                'Look near the beginning of the passage and find what trees do for the air.',
                'The answer mentions two benefits: cleaning the air and producing oxygen.',
            ],
        ],
        [
            'exercise_id' => 'exercise-1',
            'type'        => 'multiple_choice',
            'prompt'      => 'What mistake do turtles make?',
            'correct'     => 'B. They mistake plastic bags for jellyfish.',
            'options'     => [
                'A. They eat paper.',
                'B. They mistake plastic bags for jellyfish.',
                'C. They live in rivers.',
            ],
            'hints'       => [
                'Look in the part about the oceans and turtles.',
                'The object is made of plastic, and turtles think it is a jellyfish.',
            ],
        ],
        [
            'exercise_id' => 'exercise-1',
            'type'        => 'multiple_choice',
            'prompt'      => 'Why is the ice melting?',
            'correct'     => 'B. Because of burning fossil fuels.',
            'options'     => [
                'A. Because people cut down trees.',
                'B. Because of burning fossil fuels.',
                'C. Because rivers are polluted.',
            ],
            'hints'       => [
                'Look in the part about the Arctic and Antarctic.',
                'The cause is connected to the fuels people burn for energy.',
            ],
        ],
        [
            'exercise_id' => 'exercise-1',
            'type'        => 'multiple_choice',
            'prompt'      => 'What pollutes rivers?',
            'correct'     => 'B. Chemicals from farms and factories.',
            'options'     => [
                'A. Sand and rocks.',
                'B. Chemicals from farms and factories.',
                'C. Rainwater.',
            ],
            'hints'       => [
                'Look near the end of the passage, in the part about rivers and fresh water.',
                'The pollution comes from farms and factories.',
            ],
        ],
        [
            'exercise_id' => 'exercise-1',
            'type'        => 'multiple_choice',
            'prompt'      => "What is the writer's main message?",
            'correct'     => 'B. Everyone can help protect the planet.',
            'options'     => [
                'A. Only governments can protect the environment.',
                'B. Everyone can help protect the planet.',
                'C. Recycling is difficult.',
            ],
            'hints'       => [
                'Read the final sentences and focus on what all people can do.',
                'The main message is that small actions from everyone can protect Earth.',
            ],
        ],

        // Exercise 2: True or False.
        [
            'exercise_id' => 'exercise-2',
            'type'        => 'true_false',
            'prompt'      => 'Forests are home to more than half of the world\'s plants and animals.',
            'correct'     => 'True',
            'options'     => ['True', 'False'],
            'hints'       => [
                'Check the beginning of the passage, in the part about forests.',
                'Compare the statement with the phrase “more than half” in the passage.',
            ],
        ],
        [
            'exercise_id' => 'exercise-2',
            'type'        => 'true_false',
            'prompt'      => 'Plastic bags are good for marine animals.',
            'correct'     => 'False',
            'options'     => ['True', 'False'],
            'hints'       => [
                'Check the part about oceans, turtles, and plastic bags.',
                'The passage says plastic bags can be deadly to turtles.',
            ],
        ],
        [
            'exercise_id' => 'exercise-2',
            'type'        => 'true_false',
            'prompt'      => 'Burning fossil fuels makes the climate warmer.',
            'correct'     => 'True',
            'options'     => ['True', 'False'],
            'hints'       => [
                'Check the part about rising temperatures and melting ice.',
                'The passage connects burning fossil fuels with higher temperatures.',
            ],
        ],
        [
            'exercise_id' => 'exercise-2',
            'type'        => 'true_false',
            'prompt'      => 'Rivers are naturally polluted.',
            'correct'     => 'False',
            'options'     => ['True', 'False'],
            'hints'       => [
                'Check the part about rivers.',
                'The passage names chemicals from farms and factories as the cause of the pollution.',
            ],
        ],
        [
            'exercise_id' => 'exercise-2',
            'type'        => 'true_false',
            'prompt'      => 'Small actions can make a difference.',
            'correct'     => 'True',
            'options'     => ['True', 'False'],
            'hints'       => [
                'Check the final sentences of the passage.',
                'The final sentence directly explains the effect of every small action.',
            ],
        ],

        // Exercise 3: students type the answer.
        [
            'exercise_id'     => 'exercise-3',
            'type'            => 'text_input',
            'prompt'          => 'Animals that live in the sea',
            'correct'         => 'marine animals',
            'accepted_answers'=> ['marine animals', 'marine animal'],
            'placeholder'     => 'Type your answer',
            'hints'           => [
                'Look in the part about the oceans.',
                'It is a two-word phrase beginning with “m” and “a”.',
            ],
        ],
        [
            'exercise_id'     => 'exercise-3',
            'type'            => 'text_input',
            'prompt'          => 'Substances that pollute rivers',
            'correct'         => 'chemicals',
            'accepted_answers'=> ['chemicals', 'chemical'],
            'placeholder'     => 'Type your answer',
            'hints'           => [
                'Look in the part about rivers, farms, and factories.',
                'It is a plural word beginning with “c”.',
            ],
        ],
        [
            'exercise_id'     => 'exercise-3',
            'type'            => 'text_input',
            'prompt'          => 'Become liquid',
            'correct'         => 'melt',
            'accepted_answers'=> ['melt'],
            'placeholder'     => 'Type your answer',
            'hints'           => [
                'Look in the part about ice in the Arctic and Antarctic.',
                'It is a four-letter verb beginning with “m”.',
            ],
        ],
        [
            'exercise_id'     => 'exercise-3',
            'type'            => 'text_input',
            'prompt'          => 'Homes of animals',
            'correct'         => 'habitats',
            'accepted_answers'=> ['habitats', 'habitat'],
            'placeholder'     => 'Type your answer',
            'hints'           => [
                'Look in the sentence about animals losing their homes.',
                'It is a plural word beginning with “h”.',
            ],
        ],
        [
            'exercise_id'     => 'exercise-3',
            'type'            => 'text_input',
            'prompt'          => 'Use something again',
            'correct'         => 'recycle',
            'accepted_answers'=> ['recycle'],
            'placeholder'     => 'Type your answer',
            'hints'           => [
                'Look in the final sentences about actions that protect the planet.',
                'It is a seven-letter verb beginning with “r”.',
            ],
        ],
    ],
];

?>

@extends("slider.simple-layout")

@php
    $content = is_array($content ?? null) ? $content : [];
    $exercises = array_values($content['exercises'] ?? []);
    $questions = array_values($content['questions'] ?? []);
    $readingTitle = trim((string) ($content['reading_title'] ?? ''));
    $readingPassage = trim((string) ($content['passage'] ?? ''));
    $shuffleOptions = (bool) ($content['shuffle_options'] ?? false);

    $exerciseQuestionCounts = [];
    foreach ($exercises as $exercise) {
        $exerciseId = (string) ($exercise['id'] ?? '');
        $exerciseQuestionCounts[$exerciseId] = count(array_filter(
            $questions,
            static fn ($question) => (string) ($question['exercise_id'] ?? '') === $exerciseId
        ));
    }

    $themeName = strtolower((string) ($theme['name'] ?? 'default'));
    $primaryButtonClass = trim((string) ($theme['button_primary_color'] ?? ''));

    if ($primaryButtonClass === '') {
        $primaryButtonClass = match ($themeName) {
            'orange' => 'bg-gradient-to-br from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600',
            'green' => 'bg-gradient-to-br from-emerald-600 to-green-500 hover:from-emerald-700 hover:to-green-600 dark:from-emerald-300 dark:to-green-400 dark:text-emerald-950',
            'purple' => 'bg-gradient-to-br from-violet-600 to-purple-500 hover:from-violet-700 hover:to-purple-600',
            'blue' => 'bg-gradient-to-br from-blue-600 to-sky-500 hover:from-blue-700 hover:to-sky-600',
            default => 'bg-gradient-to-br from-indigo-600 to-blue-500 hover:from-indigo-700 hover:to-blue-600',
        };
    }

    $accent = match ($themeName) {
        'orange' => [
            'bg' => 'rgba(255, 237, 213, .96)',
            'hover' => 'rgba(254, 215, 170, .96)',
            'border' => 'rgba(251, 146, 60, .55)',
            'text' => 'rgb(194, 65, 12)',
            'ring' => 'rgba(251, 146, 60, .24)',
            'bgDark' => 'rgba(154, 52, 18, .32)',
            'hoverDark' => 'rgba(154, 52, 18, .46)',
            'borderDark' => 'rgba(251, 146, 60, .48)',
            'textDark' => 'rgb(255, 237, 213)',
            'ringDark' => 'rgba(251, 146, 60, .22)',
            'bar' => 'bg-gradient-to-r from-orange-400 via-orange-500 to-amber-400',
            'dropCap' => 'first-letter:text-orange-700 dark:first-letter:text-orange-300',
        ],
        'green' => [
            'bg' => 'rgba(220, 252, 231, .96)',
            'hover' => 'rgba(187, 247, 208, .96)',
            'border' => 'rgba(34, 197, 94, .50)',
            'text' => 'rgb(21, 128, 61)',
            'ring' => 'rgba(34, 197, 94, .22)',
            'bgDark' => 'rgba(20, 83, 45, .34)',
            'hoverDark' => 'rgba(20, 83, 45, .50)',
            'borderDark' => 'rgba(74, 222, 128, .46)',
            'textDark' => 'rgb(220, 252, 231)',
            'ringDark' => 'rgba(74, 222, 128, .22)',
            'bar' => 'bg-gradient-to-r from-emerald-400 via-green-500 to-teal-500',
            'dropCap' => 'first-letter:text-emerald-700 dark:first-letter:text-emerald-300',
        ],
        default => [
            'bg' => 'rgba(238, 242, 255, .96)',
            'hover' => 'rgba(224, 231, 255, .98)',
            'border' => 'rgba(129, 140, 248, .48)',
            'text' => 'rgb(67, 56, 202)',
            'ring' => 'rgba(99, 102, 241, .24)',
            'bgDark' => 'rgba(67, 56, 202, .26)',
            'hoverDark' => 'rgba(67, 56, 202, .38)',
            'borderDark' => 'rgba(129, 140, 248, .46)',
            'textDark' => 'rgb(224, 231, 255)',
            'ringDark' => 'rgba(129, 140, 248, .22)',
            'bar' => 'bg-gradient-to-r from-sky-400 via-indigo-500 to-violet-500',
            'dropCap' => 'first-letter:text-indigo-700 dark:first-letter:text-blue-300',
        ],
    };

    $accentStyle = collect([
        '--reading-accent-bg: ' . $accent['bg'],
        '--reading-accent-hover: ' . $accent['hover'],
        '--reading-accent-border: ' . $accent['border'],
        '--reading-accent-text: ' . $accent['text'],
        '--reading-accent-ring: ' . $accent['ring'],
        '--reading-accent-bg-dark: ' . $accent['bgDark'],
        '--reading-accent-hover-dark: ' . $accent['hoverDark'],
        '--reading-accent-border-dark: ' . $accent['borderDark'],
        '--reading-accent-text-dark: ' . $accent['textDark'],
        '--reading-accent-ring-dark: ' . $accent['ringDark'],
    ])->implode('; ') . ';';

    $normalizeScriptLines = static function ($rawScript) {
        if (is_array($rawScript)) {
            return array_values(array_filter(
                array_map(static fn ($line) => trim((string) $line), $rawScript),
                static fn ($line) => $line !== ''
            ));
        }

        return array_values(array_filter(
            array_map('trim', preg_split('/(?<=[.!?])\s+/', trim((string) $rawScript)) ?: []),
            static fn ($line) => $line !== ''
        ));
    };

    $globalScriptLines = $normalizeScriptLines($content['script'] ?? []);
    $playerAudio = $content['audio'] ?? null;
    $scriptLines = $globalScriptLines;

    foreach ($questions as $question) {
        if (!$playerAudio && !empty($question['audio'])) {
            $playerAudio = $question['audio'];
        }

        if ($scriptLines === []) {
            $questionScript = $normalizeScriptLines($question['script'] ?? []);
            if ($questionScript !== []) {
                $scriptLines = $questionScript;
            }
        }
    }

    $hasScript = $scriptLines !== [];
@endphp

@section("style")
    <style>
        #readingPassageBody {
            max-height: 18rem;
            overflow: hidden;
            transition: max-height 300ms ease;
        }

        #readingPassageBody.is-expanded {
            max-height: 90rem;
        }

        #readingPassageToggleIcon {
            transition: transform 200ms ease;
        }

        #readingPassageToggle[aria-expanded="true"] #readingPassageToggleIcon {
            transform: rotate(180deg);
        }

        @media (min-width: 640px) {
            #readingPassageBody {
                max-height: none !important;
                overflow: visible;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            #readingPassageBody,
            #readingPassageToggleIcon {
                transition: none;
            }
        }

        #winModal h1:first-of-type,
        #winModal h2:first-of-type,
        #winModal h3:first-of-type {
            width: 100%;
            text-align: center !important;
        }
    </style>
@endsection

@section("content")
    <div class="relative isolate min-h-[100dvh] overflow-x-hidden overflow-y-auto font-sans dark:text-slate-100" style="{{ $accentStyle }}">
        <main id="app" class="mx-auto flex min-h-[100dvh] w-full max-w-[1500px] flex-col justify-start px-3 pb-4 pt-4 sm:px-5 sm:pb-5 sm:pt-5 lg:px-7">
            <div class="grid place-items-center gap-2 text-center sm:gap-2.5">
                @include('slider.components.title-subtitle', [
                    'titleWrapClass' => 'header-spacing my-1 px-4 text-center sm:my-2 sm:px-6 lg:px-8',
                    'titleSpacingClass' => 'space-y-2',
                ])

                @include('slider.components.game-status')

                <section id="gameCard" class="relative w-full max-w-[1320px] select-none p-1.5 sm:p-2.5 lg:p-3">
                    <div class="grid min-h-0 grid-cols-1 items-stretch overflow-hidden rounded-[1.4rem] border border-slate-200/70 bg-white/80 shadow-[0_12px_32px_rgba(2,6,23,0.07)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/60 sm:grid-cols-12">
                        <div class="sm:col-span-6">
                            <div class="h-full min-h-0 p-2.5 text-left sm:p-3">
                                <article class="relative select-text overflow-hidden rounded-[1.25rem] border border-slate-200/70 bg-white/90 shadow-[0_14px_38px_rgba(15,23,42,.07)] dark:border-slate-700/60 dark:bg-slate-950/45 dark:shadow-none">
                                    <div class="h-1 w-full {{ $accent['bar'] }}"></div>

                                    <div class="relative px-3.5 pb-3.5 pt-3 sm:px-5 sm:pb-5 sm:pt-4">
                                        @if($readingTitle !== '')
                                            <header class="mb-3 border-b border-slate-200/70 pb-3 dark:border-slate-700/60 sm:mb-4 sm:pb-3.5">
                                                <h2 class="max-w-[30ch] text-[1.18rem] font-black leading-[1.12] tracking-[-0.035em] text-slate-950 dark:text-white sm:text-2xl lg:text-[1.55rem]">
                                                    {{ $readingTitle }}
                                                </h2>
                                            </header>
                                        @endif

                                        <div id="readingPassageBody" class="relative">
                                            <p class="m-0 text-pretty text-[13.5px] font-semibold leading-[1.72] tracking-[-0.006em] text-slate-600 [hyphens:auto] first-letter:float-left first-letter:mr-2.5 first-letter:mt-1 first-letter:text-5xl first-letter:font-black first-letter:leading-[0.82] dark:text-slate-300 sm:text-[15px] lg:text-[15.5px] {{ $accent['dropCap'] }}">
                                                {{ $readingPassage }}
                                            </p>

                                            <div id="readingPassageFade" class="pointer-events-none absolute inset-x-0 bottom-0 hidden h-24 bg-gradient-to-t from-white via-white/95 to-transparent dark:from-slate-950 dark:via-slate-950/95 sm:hidden"></div>
                                        </div>

                                        <button
                                                id="readingPassageToggle"
                                                type="button"
                                                class="mt-2 hidden w-full items-center justify-center gap-1.5 rounded-lg border border-slate-200/80 bg-white/85 px-3 py-2 text-xs font-black text-slate-700 shadow-sm transition hover:bg-white active:scale-[.99] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--reading-accent-ring)] dark:border-slate-700/70 dark:bg-slate-900/70 dark:text-slate-200 dark:hover:bg-slate-900 dark:focus-visible:ring-[color:var(--reading-accent-ring-dark)] sm:hidden"
                                                aria-expanded="false"
                                                aria-controls="readingPassageBody"
                                        >
                                            <span id="readingPassageToggleLabel">Show full passage</span>
                                            <svg id="readingPassageToggleIcon" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.168l3.71-3.938a.75.75 0 1 1 1.08 1.04l-4.25 4.5a.75.75 0 0 1-1.08 0l-4.25-4.5a.75.75 0 0 1 .02-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </article>
                            </div>
                        </div>

                        <div class="border-t border-slate-200/70 dark:border-slate-800 sm:col-span-6 sm:border-l sm:border-t-0">
                            <div class="h-full px-4 py-3 text-left sm:p-4 lg:p-5">
                                <div id="exerciseNav" class="mb-3 grid grid-cols-3 gap-1 rounded-xl bg-slate-100/85 p-1 dark:bg-slate-950/40 sm:gap-1.5 sm:rounded-2xl sm:p-1.5" aria-label="Exercise navigation">
                                    @foreach($exercises as $exerciseIndex => $exercise)
                                        @php
                                            $exerciseId = (string) ($exercise['id'] ?? 'exercise-' . ($exerciseIndex + 1));
                                        @endphp
                                        <button
                                                type="button"
                                                data-exercise-tab="{{ $exerciseId }}"
                                                aria-pressed="false"
                                                class="group flex min-w-0 flex-col items-center justify-center rounded-lg px-1.5 py-2 text-center text-slate-600 transition hover:bg-white/65 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--reading-accent-ring)] dark:text-slate-300 dark:hover:bg-slate-900/55 dark:focus-visible:ring-[color:var(--reading-accent-ring-dark)] sm:rounded-xl sm:px-2 sm:py-2.5"
                                        >
                                            <span class="flex min-w-0 items-center justify-center gap-1 text-[9px] font-black uppercase leading-tight tracking-[0.03em] text-current sm:text-[10px] lg:text-[11px]">
                                                <span class="opacity-55">{{ $exercise['number'] ?? ($exerciseIndex + 1) }}.</span>
                                                <span class="truncate">{{ $exercise['short_label'] ?? $exercise['title'] ?? 'Exercise' }}</span>
                                            </span>
                                            <span data-exercise-progress="{{ $exerciseId }}" class="mt-1 block text-[9px] font-bold leading-none text-current opacity-55 sm:text-[10px]">
                                                0/{{ $exerciseQuestionCounts[$exerciseId] ?? 0 }}
                                            </span>
                                        </button>
                                    @endforeach
                                </div>

                                <div class="flex items-center justify-between gap-3">
                                    <div id="questionPromptLabel" class="min-w-0 text-xs font-black tracking-[-0.01em] text-slate-600 dark:text-slate-300 sm:text-sm">
                                        Choose the correct answer.
                                    </div>

                                    <button
                                            id="btnRevealCorrection"
                                            type="button"
                                            class="inline-flex shrink-0 items-center justify-center whitespace-nowrap rounded-md px-1.5 py-1 text-[10px] font-black text-slate-500 underline decoration-slate-300 underline-offset-4 transition hover:text-[color:var(--reading-accent-text)] active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--reading-accent-ring)] dark:text-slate-400 dark:decoration-slate-600 dark:hover:text-[color:var(--reading-accent-text-dark)] dark:focus-visible:ring-[color:var(--reading-accent-ring-dark)] sm:text-xs"
                                    >
                                        Reveal answer
                                    </button>
                                </div>

                                @if($playerAudio)
                                    <div id="sharedAudioPlayerWrap" class="my-3">
                                        @include('slider.components.audio-player')
                                    </div>
                                @endif

                                <div id="qPrompt" class="mb-3 mt-2.5 flex items-start gap-2.5 text-left text-[15px] font-bold leading-[1.4] text-slate-900 dark:text-slate-100 sm:mb-3.5 sm:mt-3 sm:text-lg lg:text-[1.08rem]">
                                    <span id="qPromptNumber" class="inline-flex h-7 min-w-7 shrink-0 items-center justify-center rounded-full border border-slate-200/70 bg-white/80 px-2 text-[11px] font-black text-slate-600 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/40 dark:text-slate-200">1.</span>
                                    <span id="qPromptText" class="min-w-0">...</span>
                                </div>

                                <div id="hintPanel" class="mb-2.5 hidden rounded-lg border border-amber-200/80 bg-amber-50/80 px-3 py-2.5 text-left dark:border-amber-700/45 dark:bg-amber-950/25" aria-live="polite">
                                    <div class="flex items-start gap-2">
                                        <span class="mt-0.5 shrink-0 text-sm" aria-hidden="true">💡</span>
                                        <div id="hintText" class="min-w-0 space-y-1 text-xs font-bold leading-[1.45] text-amber-900 dark:text-amber-100 sm:text-sm"></div>
                                    </div>
                                </div>

                                <div id="optionsGrid" class="mt-3 grid grid-cols-1 gap-2.5 sm:grid-cols-2 sm:gap-3"></div>

                                <form id="typedAnswerForm" class="mt-3 hidden" novalidate>
                                    <div class="flex flex-col gap-2 sm:flex-row">
                                        <input
                                                id="typedAnswerInput"
                                                type="text"
                                                maxlength="80"
                                                autocomplete="off"
                                                autocapitalize="none"
                                                spellcheck="false"
                                                aria-label="Your answer"
                                                class="min-h-[44px] min-w-0 flex-1 rounded-lg border border-slate-300/80 bg-white px-3.5 py-2.5 text-sm font-bold text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-[color:var(--reading-accent-border)] focus:ring-4 focus:ring-[color:var(--reading-accent-ring)] dark:border-slate-700 dark:bg-slate-950/55 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-[color:var(--reading-accent-border-dark)] dark:focus:ring-[color:var(--reading-accent-ring-dark)] sm:rounded-xl sm:text-base"
                                                placeholder="Type your answer"
                                                aria-describedby="typedAnswerFeedback"
                                        >
                                        <button
                                                id="btnCheckTyped"
                                                type="submit"
                                                class="inline-flex min-h-[44px] shrink-0 items-center justify-center rounded-lg px-4 py-2.5 text-sm font-black text-white shadow-sm transition active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--reading-accent-ring)] dark:focus-visible:ring-[color:var(--reading-accent-ring-dark)] sm:rounded-xl sm:px-5 {{ $primaryButtonClass }}"
                                        >
                                            Check
                                        </button>
                                    </div>
                                    <p id="typedAnswerFeedback" class="mt-1.5 min-h-[1rem] text-left text-xs font-bold" aria-live="polite"></p>
                                </form>
                            </div>
                        </div>

                        <div class="col-span-full bg-slate-50/65 px-4 py-3 dark:bg-slate-950/20 sm:px-5 sm:py-3.5">
                            <div class="space-y-2.5">
                                <div class="grid grid-cols-[1fr_1.15fr] gap-2.5">
                                    <button id="btnPrev" type="button" class="inline-flex min-h-[42px] w-full items-center justify-center gap-2 rounded-xl border border-slate-300/70 bg-white px-3 py-2 text-xs font-black text-slate-600 transition hover:border-slate-400 hover:bg-slate-50 active:scale-[0.98] dark:border-slate-700/70 dark:bg-slate-900/55 dark:text-slate-200 dark:hover:bg-slate-800 sm:text-sm">
                                        &lsaquo; Previous
                                    </button>

                                    <button id="btnNext" type="button" class="inline-flex min-h-[42px] w-full items-center justify-center gap-2 rounded-xl px-3 py-2 text-xs font-black text-white shadow-[0_8px_20px_rgba(79,70,229,.14)] transition hover:brightness-105 active:scale-[0.98] sm:text-sm {{ $primaryButtonClass }}">
                                        Next &rsaquo;
                                    </button>
                                </div>

                                <div class="flex items-center justify-center gap-2">
                                    <button id="btnRestart" type="button" class="inline-flex min-h-8 items-center justify-center rounded-lg px-3 py-1.5 text-[11px] font-bold text-slate-500 transition hover:bg-white hover:text-slate-800 active:scale-95 dark:text-slate-400 dark:hover:bg-slate-900/55 dark:hover:text-slate-100 sm:text-xs">
                                        Restart
                                    </button>

                                    <span class="h-4 w-px bg-slate-200 dark:bg-slate-700" aria-hidden="true"></span>

                                    <button
                                            id="btnHint"
                                            type="button"
                                            class="inline-flex min-h-8 items-center justify-center gap-1.5 rounded-lg border border-[color:var(--reading-accent-border)] bg-[var(--reading-accent-bg)] px-3 py-1.5 text-[11px] font-black text-[color:var(--reading-accent-text)] transition hover:bg-[var(--reading-accent-hover)] active:scale-95 disabled:cursor-not-allowed disabled:opacity-50 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--reading-accent-ring)] dark:border-[color:var(--reading-accent-border-dark)] dark:bg-[var(--reading-accent-bg-dark)] dark:text-[color:var(--reading-accent-text-dark)] dark:hover:bg-[var(--reading-accent-hover-dark)] dark:focus-visible:ring-[color:var(--reading-accent-ring-dark)] sm:text-xs"
                                    >
                                        Hint <span aria-hidden="true">·</span> <span id="hintBadge" class="font-bold opacity-75">2 left</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('slider.components.game-win-modal', [
                        'modalExtraView' => 'slider.components.game-win-modal-correction',
                        'modalExtraData' => ['section_only' => true],
                    ])
                </section>
            </div>
        </main>

        <div id="toastOne" class="pointer-events-none fixed bottom-24 left-1/2 z-50 -translate-x-1/2 opacity-0">
            <div class="rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-black text-slate-900 shadow-2xl dark:border-slate-700 dark:bg-slate-800 dark:text-white">
                <span id="toastIcon"></span>
                <span id="toastText"></span>
            </div>
        </div>

        <div id="readingLiveRegion" class="sr-only" aria-live="polite" aria-atomic="true"></div>

        <div class="hidden !border-[color:var(--reading-accent-border)] !bg-[var(--reading-accent-bg)] !text-[color:var(--reading-accent-text)] ring-[color:var(--reading-accent-ring)] dark:!border-[color:var(--reading-accent-border-dark)] dark:!bg-[var(--reading-accent-bg-dark)] dark:!text-[color:var(--reading-accent-text-dark)] dark:ring-[color:var(--reading-accent-ring-dark)]"></div>
    </div>
@endsection

@section("script")
    <script>
        (() => {
            const QUESTIONS = @json($questions);
            const EXERCISES = @json($exercises);
            const SHUFFLE_OPTIONS = @json($shuffleOptions);
            const DEFAULT_AUDIO = @json($content['audio'] ?? null);
            const GLOBAL_SCRIPT_LINES = @json($globalScriptLines);

            const elements = {
                optionsGrid: document.getElementById('optionsGrid'),
                typedForm: document.getElementById('typedAnswerForm'),
                typedInput: document.getElementById('typedAnswerInput'),
                typedFeedback: document.getElementById('typedAnswerFeedback'),
                checkTyped: document.getElementById('btnCheckTyped'),
                promptLabel: document.getElementById('questionPromptLabel'),
                promptNumber: document.getElementById('qPromptNumber'),
                promptText: document.getElementById('qPromptText'),
                hintButton: document.getElementById('btnHint'),
                hintBadge: document.getElementById('hintBadge'),
                hintPanel: document.getElementById('hintPanel'),
                hintText: document.getElementById('hintText'),
                previous: document.getElementById('btnPrev'),
                next: document.getElementById('btnNext'),
                reveal: document.getElementById('btnRevealCorrection'),
                winModal: document.getElementById('winModal'),
                resultsCorrectionCard: document.getElementById('resultsCorrectionCard'),
                finalCorrection: document.getElementById('finalCorrection'),
                liveRegion: document.getElementById('readingLiveRegion'),
                passageBody: document.getElementById('readingPassageBody'),
                passageFade: document.getElementById('readingPassageFade'),
                passageToggle: document.getElementById('readingPassageToggle'),
                passageToggleLabel: document.getElementById('readingPassageToggleLabel'),
            };

            const exerciseTabs = Array.from(document.querySelectorAll('[data-exercise-tab]'));
            const sounds = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav'),
            };

            let index = 0;
            let firstTryCorrect = 0;
            let mistakes = 0;
            let startedAt = Date.now();
            let timer = null;
            let toastTimer = null;
            let completed = new Set();
            let revealed = new Set();
            let wronged = new Set();
            let hinted = new Set();
            let selectedAnswers = new Map();
            let wrongOptions = new Map();
            let hintLevels = new Map();
            let eliminatedOptions = new Map();
            let typedDrafts = new Map();

            const sharedAudioRoot = document.querySelector('[data-audio-player]');
            const sharedAudioMedia = sharedAudioRoot?.querySelector('[data-audio-player-media]') || null;
            const sharedAudioSource = sharedAudioMedia?.querySelector('source') || null;
            const sharedAudioScriptButton = sharedAudioRoot?.querySelector('[data-audio-player-script-open]') || null;
            const sharedAudioModal = document.querySelector('[data-audio-player-modal]');
            const sharedAudioScriptList = sharedAudioModal?.querySelector('.space-y-2') || null;

            function byId(id) {
                return document.getElementById(id);
            }

            function playSound(sound) {
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function setDisabled(button, disabled) {
                if (!button) return;
                button.disabled = disabled;
                button.classList.toggle('opacity-60', disabled);
                button.classList.toggle('pointer-events-none', disabled);
                button.classList.toggle('cursor-not-allowed', disabled);
            }

            function normalizeScriptLines(rawScript) {
                if (Array.isArray(rawScript)) {
                    return rawScript.map((line) => String(line ?? '').trim()).filter(Boolean);
                }

                if (typeof rawScript === 'string') {
                    return rawScript.split(/\r?\n+/).map((line) => line.trim()).filter(Boolean);
                }

                return [];
            }

            function currentScriptLines(question) {
                const questionLines = normalizeScriptLines(question?.script);
                return questionLines.length ? questionLines : normalizeScriptLines(GLOBAL_SCRIPT_LINES);
            }

            function renderAudioScript(lines) {
                if (!sharedAudioScriptList) return;
                sharedAudioScriptList.innerHTML = '';

                lines.forEach((line, lineIndex) => {
                    const item = document.createElement('div');
                    item.className = 'rounded-2xl border border-slate-200/60 bg-white/70 p-2.5 dark:border-slate-700/30 dark:bg-slate-900/20';

                    const row = document.createElement('div');
                    row.className = 'flex items-start gap-2.5';

                    const badge = document.createElement('div');
                    badge.className = 'flex h-7 w-7 shrink-0 items-center justify-center rounded-2xl border border-slate-200/70 bg-white/70 text-xs font-black text-slate-700 dark:border-slate-700/35 dark:bg-slate-900/20 dark:text-slate-200';
                    badge.textContent = String(lineIndex + 1);

                    const text = document.createElement('div');
                    text.className = 'min-w-0 flex-1 text-xs font-semibold text-slate-700 dark:text-slate-200 sm:text-sm';
                    text.textContent = line;

                    row.append(badge, text);
                    item.appendChild(row);
                    sharedAudioScriptList.appendChild(item);
                });
            }

            function stopAudio() {
                if (typeof window.stopAudioPlayer === 'function') {
                    window.stopAudioPlayer();
                    return;
                }

                if (!sharedAudioMedia) return;
                sharedAudioMedia.pause();
                sharedAudioMedia.currentTime = 0;
                window.syncAudioPlayerUI?.();
            }

            function updateAudio(question) {
                if (!sharedAudioRoot || !sharedAudioMedia) return;

                const source = String(question?.audio || DEFAULT_AUDIO || '');
                const lines = currentScriptLines(question);
                renderAudioScript(lines);
                sharedAudioScriptButton?.classList.toggle('hidden', lines.length === 0);

                if (!source) {
                    sharedAudioRoot.classList.add('hidden');
                    sharedAudioModal?.classList.add('hidden');
                    stopAudio();
                    return;
                }

                sharedAudioRoot.classList.remove('hidden');
                const currentSource = sharedAudioSource
                    ? String(sharedAudioSource.getAttribute('src') || '')
                    : String(sharedAudioMedia.getAttribute('src') || '');

                if (currentSource === source) {
                    window.syncAudioPlayerUI?.();
                    return;
                }

                stopAudio();
                if (sharedAudioSource) {
                    sharedAudioSource.setAttribute('src', source);
                } else {
                    sharedAudioMedia.src = source;
                }
                sharedAudioMedia.load();
                window.syncAudioPlayerUI?.();
            }

            function formatTime() {
                const elapsed = Math.floor((Date.now() - startedAt) / 1000);
                return `${String(Math.floor(elapsed / 60)).padStart(2, '0')}:${String(elapsed % 60).padStart(2, '0')}`;
            }

            function updateTimer() {
                const timerElement = byId('gameTimer');
                if (timerElement) timerElement.textContent = formatTime();
            }

            function startTimer() {
                clearInterval(timer);
                updateTimer();
                timer = setInterval(updateTimer, 1000);
            }

            function showToast(message, icon = '✨') {
                const toast = byId('toastOne');
                const toastIcon = byId('toastIcon');
                const toastText = byId('toastText');

                if (toastIcon) toastIcon.textContent = icon;
                if (toastText) toastText.textContent = message;
                if (elements.liveRegion) elements.liveRegion.textContent = `${icon} ${message}`;
                if (!toast) return;

                clearTimeout(toastTimer);
                if (window.gsap) {
                    gsap.killTweensOf(toast);
                    gsap.timeline()
                        .to(toast, { opacity: 1, y: 0, duration: 0.25 })
                        .to(toast, { opacity: 0, y: -10, duration: 0.25 }, '+=1');
                    return;
                }

                toast.style.opacity = '1';
                toastTimer = setTimeout(() => { toast.style.opacity = '0'; }, 1250);
            }

            function escapeHtml(value) {
                return String(value ?? '')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            function questionType(question) {
                const type = String(question?.type || '').toLowerCase();
                if (type === 'text_input') return 'text_input';
                if (type === 'true_false') return 'true_false';
                return 'multiple_choice';
            }

            function exerciseId(question) {
                return String(question?.exercise_id || EXERCISES?.[0]?.id || 'exercise-1');
            }

            function exerciseMeta(question) {
                const id = exerciseId(question);
                return EXERCISES.find((exercise) => String(exercise?.id) === id) || EXERCISES[0] || {};
            }

            function exerciseQuestions(id) {
                return QUESTIONS
                    .map((question, questionIndex) => ({ question, questionIndex }))
                    .filter(({ question }) => exerciseId(question) === String(id));
            }

            function questionPosition(questionIndex) {
                const questions = exerciseQuestions(exerciseId(QUESTIONS[questionIndex]));
                const position = questions.findIndex((item) => item.questionIndex === questionIndex);
                return position >= 0 ? position + 1 : questionIndex + 1;
            }

            function correctValue(question) {
                return String(question?.correct ?? '');
            }

            function normalizeOption(option) {
                if (typeof option === 'string') return { value: option, label: option };
                return {
                    value: String(option?.value ?? option?.label ?? ''),
                    label: String(option?.label ?? option?.value ?? ''),
                };
            }

            function optionsFor(question) {
                const options = Array.isArray(question?.options) ? question.options.map(normalizeOption) : [];
                if (!SHUFFLE_OPTIONS) return options;

                const copy = [...options];
                for (let i = copy.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [copy[i], copy[j]] = [copy[j], copy[i]];
                }
                return copy;
            }

            function normalizeTyped(value) {
                return String(value ?? '')
                    .normalize('NFKD')
                    .replace(/[\u0300-\u036f]/g, '')
                    .replace(/[’‘]/g, "'")
                    .trim()
                    .toLowerCase()
                    .replace(/[.!?,;:]+$/g, '')
                    .replace(/\s+/g, ' ');
            }

            function acceptedAnswers(question) {
                const answers = Array.isArray(question?.accepted_answers) && question.accepted_answers.length
                    ? question.accepted_answers
                    : [question?.correct];
                return answers.map((answer) => String(answer ?? '').trim()).filter(Boolean);
            }

            function typedAnswerIsCorrect(question, answer) {
                const normalized = normalizeTyped(answer);
                return normalized !== '' && acceptedAnswers(question).some((candidate) => normalizeTyped(candidate) === normalized);
            }

            function hintsFor(question) {
                const hints = Array.isArray(question?.hints) ? question.hints : (question?.hint ? [question.hint] : []);
                return hints.map((hint) => String(hint ?? '').trim()).filter(Boolean);
            }

            function isFinished(questionIndex) {
                return completed.has(questionIndex) || revealed.has(questionIndex);
            }

            function progressCount() {
                return new Set([...completed, ...revealed]).size;
            }

            function isComplete() {
                return QUESTIONS.length > 0 && QUESTIONS.every((_, questionIndex) => isFinished(questionIndex));
            }

            function nextOpenQuestion(fromIndex) {
                for (let i = fromIndex + 1; i < QUESTIONS.length; i++) {
                    if (!isFinished(i)) return i;
                }
                for (let i = 0; i <= fromIndex; i++) {
                    if (!isFinished(i)) return i;
                }
                return -1;
            }

            function markOption(button, state) {
                const classes = {
                    correct: ['!border-emerald-400/80', '!bg-emerald-50', '!text-emerald-900', 'font-extrabold', 'ring-2', 'ring-emerald-300/60', 'dark:!bg-emerald-950/30', 'dark:!text-emerald-100'],
                    wrong: ['!border-rose-400/80', '!bg-rose-50', '!text-rose-900', 'font-extrabold', 'opacity-75', 'ring-2', 'ring-rose-300/60', 'dark:!bg-rose-950/30', 'dark:!text-rose-100'],
                };
                button.classList.add(...(classes[state] || []));
            }

            function resetTypedStyle() {
                elements.typedInput?.classList.remove(
                    '!border-emerald-400', '!bg-emerald-50', '!text-emerald-900', 'ring-2', 'ring-emerald-300/60', 'dark:!bg-emerald-950/30', 'dark:!text-emerald-100',
                    '!border-rose-400', '!bg-rose-50', '!text-rose-900', 'ring-rose-300/60', 'dark:!bg-rose-950/30', 'dark:!text-rose-100'
                );
            }

            function setTypedFeedback(message = '', state = 'neutral') {
                if (!elements.typedFeedback) return;
                elements.typedFeedback.textContent = message;
                elements.typedFeedback.className = 'mt-1.5 min-h-[1rem] text-left text-xs font-bold ' + (
                    state === 'correct'
                        ? 'text-emerald-700 dark:text-emerald-300'
                        : state === 'wrong'
                            ? 'text-rose-700 dark:text-rose-300'
                            : 'text-slate-500 dark:text-slate-400'
                );
            }

            function markTyped(state) {
                if (!elements.typedInput) return;
                resetTypedStyle();
                if (state === 'correct') {
                    elements.typedInput.classList.add('!border-emerald-400', '!bg-emerald-50', '!text-emerald-900', 'ring-2', 'ring-emerald-300/60', 'dark:!bg-emerald-950/30', 'dark:!text-emerald-100');
                } else if (state === 'wrong') {
                    elements.typedInput.classList.add('!border-rose-400', '!bg-rose-50', '!text-rose-900', 'ring-2', 'ring-rose-300/60', 'dark:!bg-rose-950/30', 'dark:!text-rose-100');
                }
            }

            function typedHintPattern(answer) {
                return String(answer || '')
                    .split(/(\s+)/)
                    .map((part) => /^\s+$/.test(part) ? part : (part ? part[0] + '•'.repeat(Math.max(0, part.length - 1)) : ''))
                    .join('');
            }

            function renderHint(question) {
                if (!elements.hintPanel || !elements.hintText) return;
                const hints = hintsFor(question);
                const used = Math.min(Number(hintLevels.get(index) || 0), hints.length);
                const visible = hints.slice(0, used);

                if (questionType(question) === 'text_input' && used >= 2) {
                    const pattern = typedHintPattern(acceptedAnswers(question)[0] || correctValue(question));
                    if (pattern) visible.push(`Pattern: ${pattern}`);
                }

                elements.hintText.innerHTML = '';
                visible.forEach((message, hintIndex) => {
                    const line = document.createElement('div');
                    line.className = 'flex items-start gap-1.5';
                    if (visible.length > 1) {
                        const number = document.createElement('span');
                        number.className = 'shrink-0 opacity-60';
                        number.textContent = `${hintIndex + 1}.`;
                        line.appendChild(number);
                    }
                    const text = document.createElement('span');
                    text.textContent = message;
                    line.appendChild(text);
                    elements.hintText.appendChild(line);
                });

                elements.hintPanel.classList.toggle('hidden', visible.length === 0);
            }

            function eliminateWrongOption(question) {
                if (questionType(question) !== 'multiple_choice') return;
                const correct = correctValue(question);
                const buttons = Array.from(elements.optionsGrid?.children || []);
                const wrongButton = buttons.find((button) => !button.disabled && String(button.dataset.value) !== correct);
                if (!wrongButton) return;

                const eliminated = eliminatedOptions.get(index) || new Set();
                eliminated.add(String(wrongButton.dataset.value));
                eliminatedOptions.set(index, eliminated);
                wrongButton.disabled = true;
                wrongButton.classList.add('opacity-35', 'grayscale');
            }

            function updateExerciseTabs() {
                const activeId = exerciseId(QUESTIONS[index] || {});

                exerciseTabs.forEach((button) => {
                    const id = String(button.dataset.exerciseTab || '');
                    const questions = exerciseQuestions(id);
                    const done = questions.filter(({ questionIndex }) => isFinished(questionIndex)).length;
                    const progress = button.querySelector(`[data-exercise-progress="${CSS.escape(id)}"]`);
                    const active = id === activeId;
                    const complete = questions.length > 0 && done === questions.length;

                    if (progress) progress.textContent = `${done}/${questions.length}`;
                    button.setAttribute('aria-pressed', active ? 'true' : 'false');
                    button.classList.toggle('bg-white', active);
                    button.classList.toggle('shadow-sm', active);
                    button.classList.toggle('ring-1', active);
                    button.classList.toggle('ring-[color:var(--reading-accent-border)]', active);
                    button.classList.toggle('text-[color:var(--reading-accent-text)]', active);
                    button.classList.toggle('dark:bg-slate-900/80', active);
                    button.classList.toggle('dark:ring-[color:var(--reading-accent-border-dark)]', active);
                    button.classList.toggle('dark:text-[color:var(--reading-accent-text-dark)]', active);
                    button.classList.toggle('text-emerald-700', complete && !active);
                    button.classList.toggle('dark:text-emerald-300', complete && !active);
                    button.classList.toggle('opacity-70', !active && !complete);
                });
            }

            function updateStatus() {
                const tiles = byId('tilesCount');
                const correct = byId('correctCount');
                const mistakeCount = byId('mistakesCount');
                if (tiles) tiles.textContent = `${progressCount()}/${QUESTIONS.length}`;
                if (correct) correct.textContent = String(firstTryCorrect);
                if (mistakeCount) mistakeCount.textContent = String(mistakes);

                const question = QUESTIONS[index] || {};
                const hints = hintsFor(question);
                const used = Math.min(Number(hintLevels.get(index) || 0), hints.length);
                const remaining = Math.max(0, hints.length - used);
                if (elements.hintBadge) elements.hintBadge.textContent = remaining > 0 ? `${remaining} left` : 'Used';

                setDisabled(elements.hintButton, remaining === 0 || isFinished(index));
                setDisabled(elements.previous, index === 0);
                setDisabled(elements.next, index >= QUESTIONS.length - 1);
                updateExerciseTabs();
            }

            function renderOption(option, type) {
                const button = document.createElement('button');
                button.type = 'button';
                button.dataset.value = String(option.value);
                button.setAttribute('aria-label', option.label || 'Answer option');
                button.className = 'min-h-[46px] rounded-xl border border-slate-200/75 bg-white/85 px-4 py-2.5 text-sm font-bold leading-[1.35] text-slate-700 shadow-sm transition hover:border-[color:var(--reading-accent-border)] hover:bg-white hover:text-slate-900 active:scale-[0.98] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[color:var(--reading-accent-ring)] dark:border-slate-700/60 dark:bg-slate-900/45 dark:text-slate-200 dark:hover:border-[color:var(--reading-accent-border-dark)] dark:hover:bg-slate-900/70 dark:hover:text-slate-50 dark:focus-visible:ring-[color:var(--reading-accent-ring-dark)] sm:text-base ' + (type === 'true_false' ? 'min-h-[56px] text-center sm:min-h-[60px] sm:text-lg' : 'text-left');
                button.textContent = option.label;
                button.addEventListener('click', () => answerChoice(option.value, button));
                return button;
            }

            function renderQuestion() {
                if (!QUESTIONS.length) {
                    if (elements.promptNumber) elements.promptNumber.textContent = '-';
                    if (elements.promptText) elements.promptText.textContent = 'No questions found.';
                    elements.optionsGrid?.replaceChildren();
                    updateStatus();
                    return;
                }

                const question = QUESTIONS[index];
                const type = questionType(question);
                const meta = exerciseMeta(question);
                const finished = isFinished(index);
                const correct = correctValue(question);

                updateAudio(question);
                if (elements.promptNumber) elements.promptNumber.textContent = `${questionPosition(index)}.`;
                if (elements.promptText) elements.promptText.textContent = String(question.prompt || 'Choose the correct answer.');
                if (elements.promptLabel) elements.promptLabel.textContent = String(meta.title || 'Choose the correct answer.');

                renderHint(question);
                elements.optionsGrid?.classList.toggle('hidden', type === 'text_input');
                elements.typedForm?.classList.toggle('hidden', type !== 'text_input');

                if (type === 'text_input') {
                    resetTypedStyle();
                    setTypedFeedback();
                    const answer = acceptedAnswers(question)[0] || correct;
                    const done = completed.has(index);
                    const shown = revealed.has(index);

                    if (elements.typedInput) {
                        elements.typedInput.value = done || shown ? answer : String(typedDrafts.get(index) || '');
                        elements.typedInput.placeholder = String(question.placeholder || 'Type your answer');
                        elements.typedInput.disabled = done || shown;
                    }
                    if (elements.checkTyped) elements.checkTyped.disabled = done || shown;

                    if (done || shown) {
                        markTyped('correct');
                        setTypedFeedback(shown ? `Answer: ${answer}` : 'Correct answer.', 'correct');
                    }

                    updateStatus();
                    return;
                }

                if (!elements.optionsGrid) return;
                elements.optionsGrid.replaceChildren();
                elements.optionsGrid.className = type === 'true_false'
                    ? 'mt-4 grid grid-cols-2 gap-3'
                    : 'mt-3 grid grid-cols-1 gap-2.5 sm:grid-cols-2 sm:gap-3';

                const chosen = selectedAnswers.get(index);
                const previousWrong = wrongOptions.get(index) || new Set();
                const eliminated = eliminatedOptions.get(index) || new Set();

                optionsFor(question).forEach((option) => {
                    const button = renderOption(option, type);
                    const value = String(option.value);

                    if (finished) {
                        if (value === correct) markOption(button, 'correct');
                        button.disabled = true;
                    } else if (previousWrong.has(value)) {
                        markOption(button, 'wrong');
                        button.disabled = true;
                    } else if (eliminated.has(value)) {
                        button.disabled = true;
                        button.classList.add('opacity-35', 'grayscale');
                    } else if (chosen === value) {
                        markOption(button, 'correct');
                        button.disabled = true;
                    }

                    elements.optionsGrid.appendChild(button);
                });

                updateStatus();
            }

            function finishGame() {
                clearInterval(timer);
                const finalCorrect = byId('finalCorrect');
                const finalTime = byId('finalTime');
                const finalMistakes = byId('finalMistakes');
                if (finalCorrect) finalCorrect.textContent = `${firstTryCorrect}/${QUESTIONS.length}`;
                if (finalTime) finalTime.textContent = byId('gameTimer')?.textContent || '00:00';
                if (finalMistakes) finalMistakes.textContent = mistakes;
                elements.resultsCorrectionCard?.classList.add('hidden');
                elements.winModal?.classList.remove('hidden');
                document.documentElement.classList.add('overflow-hidden');
                playSound(sounds.success);
            }

            function advance() {
                setTimeout(() => {
                    if (isComplete()) {
                        finishGame();
                        return;
                    }
                    const nextIndex = nextOpenQuestion(index);
                    if (nextIndex >= 0) {
                        index = nextIndex;
                        renderQuestion();
                    }
                }, 600);
            }

            function answerChoice(value, button) {
                const question = QUESTIONS[index];
                if (!question || isFinished(index)) return;

                const selected = String(value);
                const correct = correctValue(question);
                if (selected === correct) {
                    selectedAnswers.set(index, selected);
                    completed.add(index);
                    markOption(button, 'correct');
                    Array.from(elements.optionsGrid?.children || []).forEach((option) => { option.disabled = true; });

                    if (!wronged.has(index) && !hinted.has(index)) firstTryCorrect++;
                    playSound(sounds.correct);
                    updateStatus();
                    advance();
                    return;
                }

                mistakes++;
                wronged.add(index);
                const wrongSet = wrongOptions.get(index) || new Set();
                wrongSet.add(selected);
                wrongOptions.set(index, wrongSet);
                markOption(button, 'wrong');
                button.disabled = true;
                playSound(sounds.wrong);
                updateStatus();
            }

            function checkTypedAnswer() {
                const question = QUESTIONS[index];
                if (!question || questionType(question) !== 'text_input' || isFinished(index)) return;

                const answer = String(elements.typedInput?.value || '').trim();
                typedDrafts.set(index, answer);

                if (!answer) {
                    markTyped('wrong');
                    setTypedFeedback('Type an answer before checking.', 'wrong');
                    elements.typedInput?.focus();
                    return;
                }

                if (typedAnswerIsCorrect(question, answer)) {
                    const correct = acceptedAnswers(question)[0] || correctValue(question);
                    selectedAnswers.set(index, correct);
                    completed.add(index);
                    if (!wronged.has(index) && !hinted.has(index)) firstTryCorrect++;

                    if (elements.typedInput) {
                        elements.typedInput.value = correct;
                        elements.typedInput.disabled = true;
                    }
                    if (elements.checkTyped) elements.checkTyped.disabled = true;
                    markTyped('correct');
                    setTypedFeedback('Correct answer.', 'correct');
                    playSound(sounds.correct);
                    updateStatus();
                    advance();
                    return;
                }

                mistakes++;
                wronged.add(index);
                markTyped('wrong');
                setTypedFeedback('Not quite. Check the passage and try again.', 'wrong');
                playSound(sounds.wrong);
                updateStatus();
                elements.typedInput?.focus();
                elements.typedInput?.select();
            }

            function correctionsHtml() {
                return QUESTIONS.map((question, questionIndex) => {
                    const answer = questionType(question) === 'text_input'
                        ? (acceptedAnswers(question)[0] || correctValue(question))
                        : correctValue(question);
                    const answerClass = revealed.has(questionIndex)
                        ? 'font-black text-rose-700 dark:text-rose-300'
                        : 'font-black text-emerald-700 dark:text-emerald-300';

                    return `
                        <div class="mb-1.5 flex items-start gap-2 last:mb-0">
                            <span class="shrink-0 text-xs font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400">${questionIndex + 1}.</span>
                            <span class="min-w-0 text-sm font-bold leading-[1.45] text-slate-900 dark:text-white sm:text-[15px]">
                                <span>${escapeHtml(question.prompt || '')}</span>
                                <span class="inline ${answerClass}">${escapeHtml(answer)}</span>
                            </span>
                        </div>`;
                }).join('');
            }

            function revealCorrections() {
                if (!QUESTIONS.length) return;
                let newlyRevealed = 0;

                QUESTIONS.forEach((_, questionIndex) => {
                    if (!completed.has(questionIndex) && !revealed.has(questionIndex)) {
                        revealed.add(questionIndex);
                        newlyRevealed++;
                    }
                });

                mistakes += newlyRevealed;
                clearInterval(timer);
                renderQuestion();

                const finalCorrect = byId('finalCorrect');
                const finalTime = byId('finalTime');
                const finalMistakes = byId('finalMistakes');
                if (finalCorrect) finalCorrect.textContent = `${firstTryCorrect}/${QUESTIONS.length}`;
                if (finalTime) finalTime.textContent = byId('gameTimer')?.textContent || '00:00';
                if (finalMistakes) finalMistakes.textContent = mistakes;
                if (elements.finalCorrection) elements.finalCorrection.innerHTML = correctionsHtml();
                elements.resultsCorrectionCard?.classList.remove('hidden');
                elements.winModal?.classList.remove('hidden');
                document.documentElement.classList.add('overflow-hidden');
                showToast('Corrections revealed', '📘');
            }

            function closeResults() {
                elements.winModal?.classList.add('hidden');
                document.documentElement.classList.remove('overflow-hidden');
            }

            function restart() {
                stopAudio();
                sharedAudioModal?.classList.add('hidden');
                closeResults();
                elements.resultsCorrectionCard?.classList.add('hidden');

                index = 0;
                firstTryCorrect = 0;
                mistakes = 0;
                startedAt = Date.now();
                completed = new Set();
                revealed = new Set();
                wronged = new Set();
                hinted = new Set();
                selectedAnswers = new Map();
                wrongOptions = new Map();
                hintLevels = new Map();
                eliminatedOptions = new Map();
                typedDrafts = new Map();

                startTimer();
                renderQuestion();
            }

            function setPassageExpanded(expanded) {
                if (!elements.passageBody || !elements.passageToggle) return;
                elements.passageBody.classList.toggle('is-expanded', expanded);
                elements.passageToggle.setAttribute('aria-expanded', expanded ? 'true' : 'false');
                if (elements.passageToggleLabel) elements.passageToggleLabel.textContent = expanded ? 'Show less' : 'Show full passage';
                elements.passageFade?.classList.toggle('hidden', expanded);
            }

            function syncPassageToggle() {
                if (!elements.passageBody || !elements.passageToggle) return;
                const mobile = window.matchMedia('(max-width: 639px)').matches;

                if (!mobile) {
                    elements.passageToggle.classList.add('hidden');
                    elements.passageToggle.classList.remove('flex');
                    elements.passageFade?.classList.add('hidden');
                    elements.passageBody.classList.remove('is-expanded');
                    elements.passageToggle.setAttribute('aria-expanded', 'false');
                    return;
                }

                const expanded = elements.passageBody.classList.contains('is-expanded');
                const needed = expanded || elements.passageBody.scrollHeight > elements.passageBody.clientHeight + 4;
                elements.passageToggle.classList.toggle('hidden', !needed);
                elements.passageToggle.classList.toggle('flex', needed);
                elements.passageFade?.classList.toggle('hidden', !needed || expanded);
            }

            elements.typedForm?.addEventListener('submit', (event) => {
                event.preventDefault();
                checkTypedAnswer();
            });

            elements.typedInput?.addEventListener('input', () => {
                typedDrafts.set(index, elements.typedInput.value);
                resetTypedStyle();
                setTypedFeedback();
            });

            elements.hintButton?.addEventListener('click', () => {
                const question = QUESTIONS[index];
                if (!question || isFinished(index)) return;
                const hints = hintsFor(question);
                const current = Math.min(Number(hintLevels.get(index) || 0), hints.length);
                if (current >= hints.length) return;

                const nextLevel = current + 1;
                hintLevels.set(index, nextLevel);
                hinted.add(index);
                if (nextLevel === 2) eliminateWrongOption(question);
                renderHint(question);
                updateStatus();
                showToast(`Hint ${nextLevel} of ${hints.length}`, '💡');
            });

            exerciseTabs.forEach((button) => {
                button.addEventListener('click', () => {
                    const id = String(button.dataset.exerciseTab || '');
                    const questions = exerciseQuestions(id);
                    if (!questions.length) return;
                    const target = questions.find(({ questionIndex }) => !isFinished(questionIndex)) || questions[0];
                    index = target.questionIndex;
                    renderQuestion();
                });
            });

            elements.previous?.addEventListener('click', () => {
                if (index <= 0) return;
                index--;
                renderQuestion();
            });

            elements.next?.addEventListener('click', () => {
                if (index >= QUESTIONS.length - 1) return;
                index++;
                renderQuestion();
            });

            elements.reveal?.addEventListener('click', revealCorrections);
            byId('btnRestart')?.addEventListener('click', restart);
            byId('restartBtnModal')?.addEventListener('click', restart);
            byId('continueBtnModal')?.addEventListener('click', () => {
                stopAudio();
                try {
                    if (window.parent && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (error) {}

                try {
                    window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                } catch (error) {}
            });

            elements.passageToggle?.addEventListener('click', () => {
                setPassageExpanded(elements.passageToggle.getAttribute('aria-expanded') !== 'true');
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    closeResults();
                    sharedAudioModal?.classList.add('hidden');
                }
            });

            window.addEventListener('resize', syncPassageToggle);
            window.addEventListener('pagehide', stopAudio);
            window.addEventListener('beforeunload', stopAudio);
            window.resetSlide = restart;
            window.stopSlideAudio = stopAudio;
            window.destroySlide = stopAudio;

            renderQuestion();
            startTimer();
            requestAnimationFrame(syncPassageToggle);
        })();
    </script>
@endsection