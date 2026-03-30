@php
    $content = [
        'page_title' => 'Listening',
        'title'      => 'Listening: Talking about dates',
        'subtitle'   => 'Listen to the conversation. Fill-in the missing words.',
        'audio'      => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide13.mp3'),
        'script'     => [
            'A: When are you going on vacation, Nick?',
            "B: We're leaving on August sixteenth.",
            'A: And when are you coming back?',
            'B: On August twenty-third.',
            "A: Oh, no. That means you'll miss my party on the twenty-second.",
            "B: What do you mean? I'll be back before the twenty-seventh.",
            'A: I said the twenty-second, not the twenty-seventh, but maybe I can change the date. Are you free on the thirty-first?',
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,
        'sentence_line_class' => '!leading-[2.2]',

        'sentences' => [
            "<strong class='text-blue-600 dark:text-blue-400'>Emma:</strong> When are you going on vacation, Nick?",
            "<strong class='text-pink-600 dark:text-pink-400'>Nick:</strong> We're leaving on {{1}}.",
            "<strong class='text-blue-600 dark:text-blue-400'>Emma:</strong> And when are you coming back?",
            "<strong class='text-pink-600 dark:text-pink-400'>Nick:</strong> On {{2}}.",
            "<strong class='text-blue-600 dark:text-blue-400'>Emma:</strong> Oh, no. That means you'll miss my party on the {{3}}.",
            "<strong class='text-pink-600 dark:text-pink-400'>Nick:</strong> What do you mean? I'll be back before the {{4}}.",
            "<strong class='text-blue-600 dark:text-blue-400'>Emma:</strong> I said the {{5}}, not the twenty seventh, but maybe I can change the date. Are you free on the {{6}}?",
        ],

        'answers' => [
            'August sixteenth',
            'August twenty third',
            'twenty second',
            'twenty seventh',
            'twenty second',
            'thirty first',
        ],

        'sfx' => [
            'correct' => materialAsset('slider/sounds/correct.wav'),
            'wrong'   => materialAsset('slider/sounds/wrong.wav'),
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")
