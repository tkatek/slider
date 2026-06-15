@extends("slider.simple-layout")

@php
    $content = [
        'title' => 'Reading Comprehension',
        'subtitle' => 'What’s On?!',

        'tabs' => [
            ['id' => 'pictures', 'label' => 'Pictures'],
            ['id' => 'script', 'label' => 'Reading'],
            ['id' => 'quiz', 'label' => 'Comprehension'],
            ['id' => 'puzzle', 'label' => 'Vocabulary'],
        ],

        'images' => [
            [
                'src' => materialAsset('slider/B1/Beginner/chapter-4/img/whats-on-1.webp'),

            ],
            [
                'src' => materialAsset('slider/B1/Beginner/chapter-4/img/whats-on-2.webp'),

            ],
        ],

        'picture_questions' => [
            'Where are the people?',
            'What are they doing?',
        ],

        'script' => [
            [
                'topic' => 'What’s On?!',
                'dialogue' => [
                    [
                        'speaker' => 'Reading',
                        'text' => 'Last Saturday, Jack and Karen did not go anywhere. They stayed at home all day. In the morning, they did some jobs around the house for their parents. After lunch, they both did their homework. Karen studied hard all afternoon as she had a geography project to finish, but Jack finished his homework quickly. As he had nothing else to do, he turned on the TV. Unfortunately, there were not any good programs on. So he turned it off again. Next, he went into the kitchen to get something to drink. He noticed a magazine on the kitchen table and he picked it up. He saw that a new science-fiction movie was on at the movie theater a few streets away. The name of the movie was “The Lost Empire.” His favorite actor was in it and he wanted to go and see it that evening. When Karen came downstairs, he told her about the movie, but she did not want to see it.',
                    ],
                ],
            ],
            [
                'topic' => 'Dialogue',
                'dialogue' => [
                    [
                        'speaker' => 'Karen',
                        'text' => 'You know that I don’t like science-fiction movies. I prefer comedies.',
                    ],
                    [
                        'speaker' => 'Jack',
                        'text' => 'I really want to see “The Lost Empire,” but you know I don’t like going to the movie theater alone.',
                    ],
                    [
                        'speaker' => 'Karen',
                        'text' => 'Why don’t you give your friend Phil a ring and ask him to go with you?',
                    ],
                    [
                        'speaker' => 'Jack',
                        'text' => 'That’s a great idea. I hope he isn’t doing anything. Now, where’s his phone number?',
                    ],
                ],
            ],
        ],

        'quiz' => [
            [
                'question' => 'Where did Jack and Karen stay last Saturday?',
                'options' => ['At home', 'At school', 'At the movie theater'],
                'correct_answer' => 0,
            ],
            [
                'question' => 'What did Jack and Karen do after lunch?',
                'options' => ['They watched TV', 'They did their homework', 'They went to the movies'],
                'correct_answer' => 1,
            ],
            [
                'question' => 'What did Jack decide to do after finishing his homework?',
                'options' => ['Watch TV', 'Clean the kitchen', 'Call Phil'],
                'correct_answer' => 0,
            ],
            [
                'question' => 'Where did Jack find the magazine?',
                'options' => ['On the sofa', 'On the kitchen table', 'In his bedroom'],
                'correct_answer' => 1,
            ],
            [
                'question' => 'What kind of movie did Jack want to see?',
                'options' => ['A comedy', 'A science-fiction movie', 'A horror movie'],
                'correct_answer' => 1,
            ],
            [
                'question' => 'Why didn’t Karen want to see the movie?',
                'options' => ['She was tired', 'She didn’t like science-fiction movies', 'She wanted to watch TV'],
                'correct_answer' => 1,
            ],
        ],

        'puzzle' => [
            'instruction' => 'Drag the boxes onto the matching gaps.',
            'activities' => [
                [
                    'title' => 'Comprehension Check: Put the events in order',
                    'word_bank' => ['1', '2', '3', '4', '5', '6'],
                    'gaps' => [
                        ['sentence' => '{{1}} Karen and Jack helped their parents.', 'correct' => '1'],
                        ['sentence' => '{{2}} Karen and Jack did their homework.', 'correct' => '2'],
                        ['sentence' => '{{3}} Jack decided to watch TV.', 'correct' => '3'],
                        ['sentence' => '{{4}} Jack found a magazine.', 'correct' => '4'],
                        ['sentence' => '{{5}} Jack told Karen about “The Lost Empire.”', 'correct' => '5'],
                        ['sentence' => '{{6}} Jack decided to phone Phil.', 'correct' => '6'],
                    ],
                ],
                [
                    'title' => 'Vocabulary Check: Match the columns',
                    'word_bank' => [
                        'the TV and watched a football game.',
                        'at the movie theater.',
                        'our homework yesterday.',
                        'Sarah a call later.',
                    ],
                    'gaps' => [
                        ['sentence' => 'I turned on {{1}}', 'correct' => 'the TV and watched a football game.'],
                        ['sentence' => 'A good movie is on {{2}}', 'correct' => 'at the movie theater.'],
                        ['sentence' => 'We did {{3}}', 'correct' => 'our homework yesterday.'],
                        ['sentence' => 'I want to give {{4}}', 'correct' => 'Sarah a call later.'],
                    ],
                ],
            ],
        ],
    ];

    $themeName = strtolower((string) ($theme['name'] ?? 'green'));
    $isOrangeTheme = str_contains($themeName, 'orange');

    $primaryButtonClass = trim((string) ($theme['button_primary_color'] ?? ($isOrangeTheme
        ? 'bg-gradient-to-br from-orange-500 to-amber-500'
        : 'bg-gradient-to-br from-emerald-600 to-green-500')));

    $headingGradientClass = $isOrangeTheme
        ? 'bg-gradient-to-r from-orange-600 via-amber-500 to-yellow-500 dark:from-orange-300 dark:via-amber-300 dark:to-yellow-200'
        : 'bg-gradient-to-r from-emerald-700 via-green-600 to-teal-500 dark:from-emerald-300 dark:via-green-300 dark:to-teal-200';

    $accentTextClass = $isOrangeTheme
        ? 'text-orange-700 dark:text-orange-300'
        : 'text-emerald-700 dark:text-emerald-300';

    $accentSoftClass = $isOrangeTheme
        ? 'border-orange-200/70 bg-orange-50/80 dark:border-orange-400/20 dark:bg-orange-500/10'
        : 'border-emerald-200/70 bg-emerald-50/80 dark:border-emerald-400/20 dark:bg-emerald-500/10';

    $badgeClass = $isOrangeTheme
        ? 'rounded-full bg-orange-100 px-2.5 py-1 text-xs font-black uppercase tracking-[0.12em] text-orange-700 ring-1 ring-orange-200/70 dark:bg-orange-500/20 dark:text-orange-300 dark:ring-orange-400/25'
        : 'rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-black uppercase tracking-[0.12em] text-emerald-700 ring-1 ring-emerald-200/70 dark:bg-emerald-500/20 dark:text-emerald-300 dark:ring-emerald-400/25';

    $tabThemeClass = $isOrangeTheme
        ? 'hover:border-orange-400 hover:text-orange-700 dark:hover:text-orange-300 data-[active=true]:border-orange-400 data-[active=true]:bg-orange-50 data-[active=true]:text-orange-700 dark:data-[active=true]:border-orange-400/50 dark:data-[active=true]:bg-orange-500/15 dark:data-[active=true]:text-orange-300'
        : 'hover:border-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 data-[active=true]:border-emerald-400 data-[active=true]:bg-emerald-50 data-[active=true]:text-emerald-700 dark:data-[active=true]:border-emerald-400/50 dark:data-[active=true]:bg-emerald-500/15 dark:data-[active=true]:text-emerald-300';

    $optionThemeClass = $isOrangeTheme
        ? 'data-[state=selected]:border-orange-400 data-[state=selected]:bg-orange-50 data-[state=selected]:text-orange-700 dark:data-[state=selected]:bg-orange-500/15 dark:data-[state=selected]:text-orange-300'
        : 'data-[state=selected]:border-emerald-400 data-[state=selected]:bg-emerald-50 data-[state=selected]:text-emerald-700 dark:data-[state=selected]:bg-emerald-500/15 dark:data-[state=selected]:text-emerald-300';

    $tokenThemeClass = $isOrangeTheme
        ? 'data-[selected=true]:border-orange-400 data-[selected=true]:bg-orange-50 data-[selected=true]:text-orange-700 dark:data-[selected=true]:bg-orange-500/15 dark:data-[selected=true]:text-orange-300'
        : 'data-[selected=true]:border-emerald-400 data-[selected=true]:bg-emerald-50 data-[selected=true]:text-emerald-700 dark:data-[selected=true]:bg-emerald-500/15 dark:data-[selected=true]:text-emerald-300';

    $dropThemeClass = $isOrangeTheme
        ? 'data-[over=true]:border-orange-400 data-[over=true]:bg-orange-50 data-[filled=true]:border-orange-400 data-[filled=true]:text-orange-700 dark:data-[over=true]:bg-orange-500/15 dark:data-[filled=true]:text-orange-300'
        : 'data-[over=true]:border-emerald-400 data-[over=true]:bg-emerald-50 data-[filled=true]:border-emerald-400 data-[filled=true]:text-emerald-700 dark:data-[over=true]:bg-emerald-500/15 dark:data-[filled=true]:text-emerald-300';

    $tabs = $content['tabs'] ?? [
        ['id' => 'pictures', 'label' => 'Pictures'],
        ['id' => 'script', 'label' => 'Reading'],
        ['id' => 'quiz', 'label' => 'Comprehension'],
        ['id' => 'puzzle', 'label' => 'Vocabulary'],
    ];

    $firstTab = $tabs[0]['id'] ?? 'pictures';

    $images = $content['images'] ?? [];
    $pictureQuestions = $content['picture_questions'] ?? [];
    $script = $content['script'] ?? [];
    $quiz = $content['quiz'] ?? [];
    $puzzle = $content['puzzle'] ?? ['instruction' => '', 'activities' => []];
@endphp

@section("content")
    <div id="reading-activities-root" class="overflow-x-hidden">
        <main class="relative z-10 mx-auto flex min-h-[calc(100dvh-1rem)] w-full max-w-[1320px] items-start px-3 py-3 sm:px-6 sm:py-5 lg:px-8">
            <section class="w-full rounded-[2rem] border border-slate-300/60 bg-white/88 p-4 shadow-xl shadow-slate-900/10 backdrop-blur-xl dark:border-slate-200/20 dark:bg-white/10 dark:shadow-none sm:p-6 lg:p-7">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                    <div data-anim="header" class="min-w-0 text-center sm:text-left">
                        <h1 class="mx-auto max-w-[900px] bg-clip-text text-4xl font-black leading-[1.02] tracking-[-0.045em] text-transparent sm:mx-0 sm:text-5xl lg:text-[3.6rem] {{ $headingGradientClass }}">
                            {{ $content['title'] ?? '' }}
                        </h1>

                        @if(!empty($content['subtitle']))
                            <p class="mx-auto mt-2 max-w-3xl text-base font-black leading-[1.35] tracking-[-0.01em] text-slate-900 dark:text-slate-100 sm:mx-0 sm:text-lg lg:text-xl">
                                {{ $content['subtitle'] }}
                            </p>
                        @endif
                    </div>

                    <div data-anim="badge" class="flex flex-wrap items-center justify-center gap-2 sm:justify-start lg:justify-end lg:pt-2">
                        <span class="{{ $badgeClass }}">
                            Reading Activity
                        </span>
                        <span class="rounded-full border border-slate-300/70 bg-white/80 px-3 py-1 text-xs font-black uppercase tracking-[0.12em] text-slate-600 dark:border-slate-200/20 dark:bg-slate-900/50 dark:text-slate-300">
                            {{ count($tabs) }} Parts
                        </span>
                    </div>
                </div>

                <div data-anim="tabs" class="mt-5">
                    <div role="tablist" aria-label="Reading activities" class="flex flex-wrap justify-center gap-2 sm:justify-start">
                        @foreach($tabs as $tab)
                            <button
                                    type="button"
                                    class="tab-btn rounded-xl border border-slate-300/70 bg-white/80 px-3 py-2 text-sm font-extrabold tracking-wide text-slate-700 transition-all dark:border-slate-200/20 dark:bg-slate-900/45 dark:text-slate-200 sm:text-base {{ $tabThemeClass }}"
                                    data-tab-target="{{ $tab['id'] }}"
                                    data-active="{{ $tab['id'] === $firstTab ? 'true' : 'false' }}"
                                    aria-selected="{{ $tab['id'] === $firstTab ? 'true' : 'false' }}"
                            >
                                {{ $tab['label'] }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div data-anim="panel" class="mt-5">
                    <div id="panel-pictures" class="activity-panel {{ $firstTab === 'pictures' ? '' : 'hidden' }}">
                        <div class="grid gap-4 lg:grid-cols-[minmax(0,1.15fr)_minmax(360px,0.85fr)] lg:items-start">
                            <div class="grid gap-3 sm:grid-cols-2">
                                @forelse($images as $image)
                                    <figure class="overflow-hidden rounded-2xl border border-slate-300/60 bg-white/90 shadow-sm dark:border-slate-200/20 dark:bg-slate-900/55">
                                        <div class="aspect-[5/4] overflow-hidden bg-slate-100 dark:bg-slate-950/40">
                                            <img
                                                    src="{{ $image['src'] }}"
                                                    alt="{{ $image['alt'] ?? 'Reading image' }}"
                                                    class="h-full w-full object-cover"
                                            >
                                        </div>

                                        @if(!empty($image['caption']))
                                            <figcaption class="px-4 py-3 text-sm font-black leading-[1.45] text-slate-800 dark:text-slate-100">
                                                {{ $image['caption'] }}
                                            </figcaption>
                                        @endif
                                    </figure>
                                @empty
                                    <div class="rounded-2xl border border-dashed border-slate-300 bg-white/70 p-5 text-center dark:border-slate-700 dark:bg-slate-900/50 sm:col-span-2">
                                        <p class="text-base font-black text-slate-900 dark:text-slate-100">
                                            Add images in <span class="{{ $accentTextClass }}">$content['images']</span>.
                                        </p>
                                    </div>
                                @endforelse
                            </div>

                            <article class="rounded-2xl border {{ $accentSoftClass }} p-4">
                                <h2 class="text-lg font-black tracking-[-0.02em] text-slate-900 dark:text-slate-100 sm:text-xl">
                                    A. Look at the pictures and answer the questions
                                </h2>

                                <div class="mt-4 grid gap-3">
                                    @forelse($pictureQuestions as $question)
                                        <div class="rounded-xl border border-slate-300/60 bg-white/90 p-3 dark:border-slate-200/20 dark:bg-slate-950/35">
                                            <p class="text-xs font-black uppercase tracking-[0.12em] {{ $accentTextClass }}">
                                                Question {{ $loop->iteration }}
                                            </p>
                                            <p class="mt-1 text-base font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                                {{ $question }}
                                            </p>
                                            <div class="mt-3 h-10 rounded-xl border border-dashed border-slate-300 bg-white/70 dark:border-slate-700 dark:bg-slate-900/40"></div>
                                        </div>
                                    @empty
                                        <p class="rounded-xl border border-slate-300/60 bg-white/90 px-4 py-3 text-base font-bold text-slate-700 dark:border-slate-200/20 dark:bg-slate-950/35 dark:text-slate-200">
                                            Add picture questions in <span class="font-black">$content['picture_questions']</span>.
                                        </p>
                                    @endforelse
                                </div>
                            </article>
                        </div>
                    </div>

                    <div id="panel-script" class="activity-panel {{ $firstTab === 'script' ? '' : 'hidden' }}">
                        <div class="grid gap-3 lg:grid-cols-2">
                            @forelse($script as $conversation)
                                <article class="rounded-2xl border border-slate-300/60 bg-slate-50/95 p-4 dark:border-slate-200/20 dark:bg-slate-900/55">
                                    <div class="mb-3 flex flex-wrap items-center justify-between gap-2">
                                        <h2 class="text-lg font-black tracking-[-0.02em] text-slate-900 dark:text-slate-100">
                                            {{ $conversation['topic'] ?? 'Reading' }}
                                        </h2>

                                        <span class="{{ $badgeClass }}">
                                            {{ count($conversation['dialogue'] ?? []) }} Lines
                                        </span>
                                    </div>

                                    <div class="space-y-2">
                                        @foreach(($conversation['dialogue'] ?? []) as $line)
                                            @php
                                                $speaker = trim((string) ($line['speaker'] ?? ''));
                                                $text = trim((string) ($line['text'] ?? ''));
                                                $isReadingLine = $speaker === '' || strtolower($speaker) === 'reading';
                                            @endphp

                                            @if($text !== '')
                                                @if($isReadingLine)
                                                    <p class="rounded-xl border border-slate-300/60 bg-white/90 px-4 py-3 text-base font-bold leading-[1.65] text-slate-800 dark:border-slate-200/20 dark:bg-slate-950/35 dark:text-slate-100">
                                                        {{ $text }}
                                                    </p>
                                                @else
                                                    <div class="rounded-xl border border-slate-300/60 bg-white/90 p-3 dark:border-slate-200/20 dark:bg-slate-950/35">
                                                        <p class="text-xs font-black uppercase tracking-[0.12em] {{ $accentTextClass }}">
                                                            {{ $speaker }}
                                                        </p>
                                                        <p class="mt-1 text-base font-bold leading-[1.55] text-slate-800 dark:text-slate-100">
                                                            {{ $text }}
                                                        </p>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </article>
                            @empty
                                <div class="rounded-2xl border border-dashed border-slate-300 bg-white/70 p-5 text-center dark:border-slate-700 dark:bg-slate-900/50">
                                    <p class="text-base font-black text-slate-900 dark:text-slate-100">
                                        Add the reading text in <span class="{{ $accentTextClass }}">$content['script']</span>.
                                    </p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div id="panel-quiz" class="activity-panel {{ $firstTab === 'quiz' ? '' : 'hidden' }}">
                        <div class="grid grid-cols-1 gap-3 lg:grid-cols-2">
                            @forelse($quiz as $idx => $question)
                                <article class="quiz-card rounded-2xl border border-slate-300/60 bg-slate-50/95 p-4 dark:border-slate-200/20 dark:bg-slate-900/55" data-correct="{{ $question['correct_answer'] }}">
                                    <h2 class="text-xs font-black uppercase tracking-[0.12em] {{ $accentTextClass }}">
                                        Question {{ $idx + 1 }}
                                    </h2>

                                    <p class="mt-2 text-base font-black leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg">
                                        {{ $question['question'] }}
                                    </p>

                                    <div class="mt-3 grid gap-2 sm:grid-cols-2">
                                        @foreach($question['options'] as $optIndex => $option)
                                            <button
                                                    type="button"
                                                    class="quiz-option rounded-xl border border-slate-300/70 bg-white/90 px-3 py-2 text-left text-sm font-black leading-[1.35] text-slate-700 transition-all dark:border-slate-200/20 dark:bg-slate-950/35 dark:text-slate-200 sm:text-base {{ $optionThemeClass }} data-[state=correct]:border-emerald-500/70 data-[state=correct]:bg-emerald-50 data-[state=correct]:text-emerald-700 dark:data-[state=correct]:bg-emerald-500/15 dark:data-[state=correct]:text-emerald-300 data-[state=wrong]:border-rose-500/70 data-[state=wrong]:bg-rose-50 data-[state=wrong]:text-rose-700 dark:data-[state=wrong]:bg-rose-500/15 dark:data-[state=wrong]:text-rose-300"
                                                    data-option-index="{{ $optIndex }}"
                                                    data-state="idle"
                                            >
                                                {{ $option }}
                                            </button>
                                        @endforeach
                                    </div>

                                    <p class="quiz-feedback mt-3 text-xs font-black uppercase tracking-[0.12em] text-slate-500 dark:text-slate-400 data-[state=correct]:text-emerald-600 dark:data-[state=correct]:text-emerald-300 data-[state=wrong]:text-rose-600 dark:data-[state=wrong]:text-rose-300" data-state="idle"></p>
                                </article>
                            @empty
                                <div class="rounded-2xl border border-dashed border-slate-300 bg-white/70 p-5 text-center dark:border-slate-700 dark:bg-slate-900/50">
                                    <p class="text-base font-black text-slate-900 dark:text-slate-100">
                                        Add comprehension questions in <span class="{{ $accentTextClass }}">$content['quiz']</span>.
                                    </p>
                                </div>
                            @endforelse
                        </div>

                        @if(count($quiz))
                            <div class="mt-4 flex flex-wrap items-center gap-3">
                                <button type="button" id="quiz-check-btn" class="rounded-xl px-4 py-2 text-xs font-black uppercase tracking-[0.12em] text-white transition-transform hover:scale-[1.03] {{ $primaryButtonClass }}">
                                    Check Answers
                                </button>

                                <p id="quiz-score" class="text-sm font-black text-slate-700 dark:text-slate-200">
                                    Score: 0/{{ count($quiz) }}
                                </p>
                            </div>
                        @endif
                    </div>

                    <div id="panel-puzzle" class="activity-panel {{ $firstTab === 'puzzle' ? '' : 'hidden' }}">
                        @if(!empty($puzzle['instruction']))
                            <p class="mb-4 rounded-2xl border {{ $accentSoftClass }} px-4 py-3 text-base font-black leading-[1.45] {{ $accentTextClass }}">
                                {{ $puzzle['instruction'] }}
                            </p>
                        @endif

                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            @forelse(($puzzle['activities'] ?? []) as $activityIndex => $activity)
                                <article class="puzzle-card rounded-2xl border border-slate-300/60 bg-slate-50/95 p-4 dark:border-slate-200/20 dark:bg-slate-900/55">
                                    <h2 class="text-lg font-black tracking-[-0.02em] text-slate-900 dark:text-slate-100">
                                        {{ $activity['title'] }}
                                    </h2>

                                    @php
                                        $wordBank = $activity['word_bank'] ?? [];
                                        shuffle($wordBank);
                                    @endphp

                                    <div class="word-bank mt-3 flex flex-wrap gap-2 rounded-2xl border border-slate-300/60 bg-white/70 p-3 dark:border-slate-200/20 dark:bg-slate-950/25">
                                        @foreach($wordBank as $word)
                                            <button
                                                    type="button"
                                                    draggable="true"
                                                    data-token-id="a{{ $activityIndex }}-{{ $loop->index }}"
                                                    data-word="{{ strtolower(trim($word)) }}"
                                                    data-display="{{ $word }}"
                                                    data-selected="false"
                                                    class="drag-token cursor-grab rounded-full border border-slate-300/70 bg-white/90 px-3 py-1.5 text-sm font-black text-slate-700 transition-all active:cursor-grabbing dark:border-slate-200/20 dark:bg-slate-900/60 dark:text-slate-200 {{ $tokenThemeClass }}"
                                            >
                                                {{ $word }}
                                            </button>
                                        @endforeach
                                    </div>

                                    <div class="mt-4 grid grid-cols-1 gap-3">
                                        @foreach(($activity['gaps'] ?? []) as $gapIndex => $gap)
                                            @php
                                                preg_match('/(\{\{\d+\}\}|___)/', $gap['sentence'], $placeholderMatch);
                                                $parts = preg_split('/(\{\{\d+\}\}|___)/', $gap['sentence'], 2);
                                            @endphp

                                            <div class="puzzle-drop-zone rounded-xl border border-slate-300/60 bg-white/90 p-3 dark:border-slate-200/20 dark:bg-slate-950/35">
                                                <p class="text-base font-bold leading-[2.1] text-slate-800 dark:text-slate-100">
                                                    {{ $parts[0] ?? '' }}

                                                    <span
                                                            class="blank-drop mx-1 inline-flex min-h-9 min-w-[5.5rem] cursor-pointer items-center justify-center rounded-xl border border-dashed border-slate-300 bg-white/90 px-3 py-1 text-center text-xs font-black uppercase tracking-[0.08em] text-slate-400 transition-all dark:border-slate-600 dark:bg-slate-900/70 dark:text-slate-500 {{ $dropThemeClass }} data-[state=correct]:border-emerald-500/70 data-[state=correct]:bg-emerald-50 data-[state=correct]:text-emerald-700 dark:data-[state=correct]:bg-emerald-500/15 dark:data-[state=correct]:text-emerald-300 data-[state=wrong]:border-rose-500/70 data-[state=wrong]:bg-rose-50 data-[state=wrong]:text-rose-700 dark:data-[state=wrong]:bg-rose-500/15 dark:data-[state=wrong]:text-rose-300"
                                                            data-answer="{{ strtolower(trim($gap['correct'])) }}"
                                                            data-answer-display="{{ $gap['correct'] }}"
                                                            data-token-id=""
                                                            data-value=""
                                                            data-over="false"
                                                            data-filled="false"
                                                            data-state="idle"
                                                            data-placeholder="___"
                                                    >
                                                        ___
                                                    </span>

                                                    {{ $parts[1] ?? '' }}
                                                </p>

                                                <p class="blank-correct-answer mt-2 hidden text-sm font-black text-emerald-600 dark:text-emerald-300"></p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-4 flex flex-wrap items-center gap-3">
                                        <button type="button" class="check-puzzle-btn rounded-xl px-4 py-2 text-xs font-black uppercase tracking-[0.12em] text-white transition-transform hover:scale-[1.03] {{ $primaryButtonClass }}">
                                            Check Activity
                                        </button>

                                        <p class="puzzle-feedback text-sm font-black text-slate-700 dark:text-slate-200"></p>
                                    </div>
                                </article>
                            @empty
                                <div class="rounded-2xl border border-dashed border-slate-300 bg-white/70 p-5 text-center dark:border-slate-700 dark:bg-slate-900/50">
                                    <p class="text-base font-black text-slate-900 dark:text-slate-100">
                                        Add vocabulary activities in <span class="{{ $accentTextClass }}">$content['puzzle']</span>.
                                    </p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const root = document.getElementById("reading-activities-root");
            if (!root) return;

            const tabButtons = Array.from(root.querySelectorAll(".tab-btn"));
            const panels = Array.from(root.querySelectorAll(".activity-panel"));
            const firstTab = tabButtons[0]?.dataset.tabTarget || "pictures";

            function setActiveTab(targetId) {
                tabButtons.forEach((btn) => {
                    const isActive = btn.dataset.tabTarget === targetId;
                    btn.dataset.active = isActive ? "true" : "false";
                    btn.setAttribute("aria-selected", isActive ? "true" : "false");
                });

                panels.forEach((panel) => {
                    panel.classList.toggle("hidden", panel.id !== `panel-${targetId}`);
                });
            }

            tabButtons.forEach((btn) => {
                btn.addEventListener("click", () => setActiveTab(btn.dataset.tabTarget));
            });

            const quizCards = Array.from(root.querySelectorAll(".quiz-card"));
            const quizCheckBtn = root.querySelector("#quiz-check-btn");
            const quizScore = root.querySelector("#quiz-score");
            let quizChecked = false;

            function setQuizButtonLabel() {
                if (!quizCheckBtn) return;
                quizCheckBtn.textContent = quizChecked ? "Restart Quiz" : "Check Answers";
            }

            quizCards.forEach((card) => {
                const options = Array.from(card.querySelectorAll(".quiz-option"));

                options.forEach((option) => {
                    option.addEventListener("click", () => {
                        if (quizChecked) return;

                        options.forEach((opt) => {
                            opt.dataset.state = "idle";
                        });

                        option.dataset.state = "selected";
                    });
                });
            });

            function restartQuiz() {
                quizCards.forEach((card) => {
                    const feedback = card.querySelector(".quiz-feedback");

                    card.querySelectorAll(".quiz-option").forEach((option) => {
                        option.dataset.state = "idle";
                    });

                    if (feedback) {
                        feedback.textContent = "";
                        feedback.dataset.state = "idle";
                    }
                });

                if (quizScore) {
                    quizScore.textContent = `Score: 0/${quizCards.length}`;
                }

                quizChecked = false;
                setQuizButtonLabel();
            }

            function checkQuiz() {
                let score = 0;

                quizCards.forEach((card) => {
                    const correct = card.dataset.correct;
                    const selected = card.querySelector('.quiz-option[data-state="selected"]');
                    const feedback = card.querySelector(".quiz-feedback");

                    card.querySelectorAll(".quiz-option").forEach((option) => {
                        const index = option.dataset.optionIndex;

                        if (index === correct) {
                            option.dataset.state = "correct";
                        } else if (selected && option === selected) {
                            option.dataset.state = "wrong";
                        } else {
                            option.dataset.state = "idle";
                        }
                    });

                    if (selected && selected.dataset.optionIndex === correct) {
                        score += 1;

                        if (feedback) {
                            feedback.textContent = "Correct";
                            feedback.dataset.state = "correct";
                        }
                    } else if (feedback) {
                        feedback.textContent = "Try again";
                        feedback.dataset.state = "wrong";
                    }
                });

                if (quizScore) {
                    quizScore.textContent = `Score: ${score}/${quizCards.length}`;
                }

                quizChecked = true;
                setQuizButtonLabel();
            }

            if (quizCheckBtn) {
                setQuizButtonLabel();

                quizCheckBtn.addEventListener("click", () => {
                    if (quizChecked) {
                        restartQuiz();
                        return;
                    }

                    checkQuiz();
                });
            }

            root.querySelectorAll(".puzzle-card").forEach((card) => {
                const bank = card.querySelector(".word-bank");
                const tokens = Array.from(card.querySelectorAll(".drag-token"));
                const drops = Array.from(card.querySelectorAll(".blank-drop"));
                const checkBtn = card.querySelector(".check-puzzle-btn");
                const feedback = card.querySelector(".puzzle-feedback");

                let selectedToken = null;
                let draggingToken = null;
                let checked = false;

                const normalize = (value) => {
                    return (value || "")
                        .toLowerCase()
                        .replace(/[’]/g, "'")
                        .replace(/\s+/g, " ")
                        .trim();
                };

                function clearSelection() {
                    tokens.forEach((token) => {
                        token.dataset.selected = "false";
                    });

                    selectedToken = null;
                }

                function returnToken(token) {
                    if (!token || !bank) return;

                    token.classList.remove("hidden");
                    token.dataset.selected = "false";
                    bank.appendChild(token);
                }

                function clearDrop(drop) {
                    drop.dataset.tokenId = "";
                    drop.dataset.value = "";
                    drop.dataset.filled = "false";
                    drop.dataset.over = "false";
                    drop.dataset.state = "idle";
                    drop.textContent = drop.dataset.placeholder || "___";

                    const hint = drop.closest(".puzzle-drop-zone")?.querySelector(".blank-correct-answer");
                    if (hint) {
                        hint.textContent = "";
                        hint.classList.add("hidden");
                    }
                }

                function placeToken(drop, token) {
                    if (!drop || !token || checked) return;

                    const previousTokenId = drop.dataset.tokenId;

                    if (previousTokenId) {
                        const previousToken = card.querySelector(`.drag-token[data-token-id="${previousTokenId}"]`);
                        returnToken(previousToken);
                    }

                    const oldDrop = drops.find((item) => item.dataset.tokenId === token.dataset.tokenId);

                    if (oldDrop && oldDrop !== drop) {
                        clearDrop(oldDrop);
                    }

                    drop.dataset.tokenId = token.dataset.tokenId || "";
                    drop.dataset.value = normalize(token.dataset.word || token.textContent);
                    drop.dataset.filled = "true";
                    drop.dataset.state = "idle";
                    drop.textContent = token.dataset.display || token.textContent;

                    token.classList.add("hidden");
                    token.dataset.selected = "false";
                    selectedToken = null;

                    const hint = drop.closest(".puzzle-drop-zone")?.querySelector(".blank-correct-answer");
                    if (hint) {
                        hint.textContent = "";
                        hint.classList.add("hidden");
                    }
                }

                tokens.forEach((token) => {
                    token.addEventListener("click", () => {
                        if (checked || token.classList.contains("hidden")) return;

                        if (selectedToken === token) {
                            clearSelection();
                            return;
                        }

                        clearSelection();
                        selectedToken = token;
                        token.dataset.selected = "true";
                    });

                    token.addEventListener("dragstart", (event) => {
                        if (checked) {
                            event.preventDefault();
                            return;
                        }

                        draggingToken = token;
                        clearSelection();

                        if (event.dataTransfer) {
                            event.dataTransfer.effectAllowed = "move";
                            event.dataTransfer.setData("text/plain", token.dataset.tokenId || "");
                        }
                    });

                    token.addEventListener("dragend", () => {
                        draggingToken = null;

                        drops.forEach((drop) => {
                            drop.dataset.over = "false";
                        });
                    });
                });

                drops.forEach((drop) => {
                    drop.addEventListener("dragover", (event) => {
                        if (checked) return;

                        event.preventDefault();
                        drop.dataset.over = "true";
                    });

                    drop.addEventListener("dragleave", () => {
                        drop.dataset.over = "false";
                    });

                    drop.addEventListener("drop", (event) => {
                        if (checked) return;

                        event.preventDefault();
                        drop.dataset.over = "false";

                        if (draggingToken) {
                            placeToken(drop, draggingToken);
                        }
                    });

                    drop.addEventListener("click", () => {
                        if (checked) return;

                        if (selectedToken) {
                            placeToken(drop, selectedToken);
                            return;
                        }

                        const tokenId = drop.dataset.tokenId;

                        if (tokenId) {
                            const token = card.querySelector(`.drag-token[data-token-id="${tokenId}"]`);
                            returnToken(token);
                            clearDrop(drop);
                        }
                    });
                });

                card.querySelectorAll(".puzzle-drop-zone").forEach((zone) => {
                    const drop = zone.querySelector(".blank-drop");
                    if (!drop) return;

                    zone.addEventListener("dragover", (event) => {
                        if (checked) return;

                        event.preventDefault();
                        drop.dataset.over = "true";
                    });

                    zone.addEventListener("dragleave", (event) => {
                        if (zone.contains(event.relatedTarget)) return;
                        drop.dataset.over = "false";
                    });

                    zone.addEventListener("drop", (event) => {
                        if (checked) return;

                        event.preventDefault();
                        drop.dataset.over = "false";

                        if (draggingToken) {
                            placeToken(drop, draggingToken);
                        }
                    });
                });

                function restartPuzzle() {
                    clearSelection();

                    drops.forEach((drop) => {
                        const tokenId = drop.dataset.tokenId;

                        if (tokenId) {
                            const token = card.querySelector(`.drag-token[data-token-id="${tokenId}"]`);
                            returnToken(token);
                        }

                        clearDrop(drop);
                    });

                    if (feedback) {
                        feedback.textContent = "";
                    }

                    checked = false;

                    if (checkBtn) {
                        checkBtn.textContent = "Check Activity";
                    }
                }

                function checkPuzzle() {
                    let correctCount = 0;

                    drops.forEach((drop) => {
                        const expected = normalize(drop.dataset.answer || "");
                        const actual = normalize(drop.dataset.value || "");
                        const isCorrect = expected === actual;

                        drop.dataset.state = isCorrect ? "correct" : "wrong";

                        if (isCorrect) {
                            correctCount += 1;
                        } else {
                            const hint = drop.closest(".puzzle-drop-zone")?.querySelector(".blank-correct-answer");

                            if (hint) {
                                hint.textContent = `Correct answer: ${drop.dataset.answerDisplay || drop.dataset.answer}`;
                                hint.classList.remove("hidden");
                            }
                        }
                    });

                    if (feedback) {
                        feedback.textContent = `Result: ${correctCount}/${drops.length} correct`;
                    }

                    checked = true;

                    if (checkBtn) {
                        checkBtn.textContent = "Restart Activity";
                    }
                }

                if (checkBtn) {
                    checkBtn.addEventListener("click", () => {
                        if (checked) {
                            restartPuzzle();
                            return;
                        }

                        checkPuzzle();
                    });
                }
            });

            function playIntro() {
                const elements = Array.from(root.querySelectorAll("[data-anim]"));

                if (!window.gsap) {
                    elements.forEach((element) => {
                        element.style.opacity = "1";
                        element.style.transform = "none";
                    });
                    return;
                }

                gsap.killTweensOf(elements);
                gsap.set(elements, { clearProps: "all" });

                gsap.timeline({ defaults: { ease: "power2.out" } })
                    .from(elements, {
                        opacity: 0,
                        y: 14,
                        duration: 0.38,
                        stagger: 0.08,
                    });
            }

            window.resetSlide = () => {
                setActiveTab(firstTab);
                playIntro();
            };

            setActiveTab(firstTab);
            playIntro();
        });
    </script>
@endsection
