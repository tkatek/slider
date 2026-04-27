@php
    $content = [
        'page_title'    => 'Practice 2:  Listening',
        'title'         => 'Practice 2:  Listening',
        'subtitle'      => 'Complete the conversation with the correct word and practise the conversation',
        'audio'         => materialAsset('slider/A2/Intermediate/chapter-9/audios/slide4.mp3'),

        'script'        => [
            "Man: Are we still playing football on Tuesday?",
            "Woman: Yes, I think so. Why do you ask?",
            "Man: Well, the weather forecast says it will rain.",
            "Woman: Well, if it rains, we will play in the gym. I will send an email to everyone explaining this.",
            "Man: Do you think we will have enough players?",
            "Woman: Yes, I think so. We need 8 players to play. If we don’t get enough players, we will cancel though.",
            "Man: Do you think we will get enough players to play?",
            "Woman: I think so, but if we don’t, I will let everyone know.",
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

        'sentences' => [
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> Are we still {{1}} football on Tuesday?",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> Yes, I think so. {{2}} do you ask?",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> Well, the weather forecast says it {{3}}.",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> Well, {{4}}, we will play in the gym. I {{5}} an email to everyone explaining this.",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> Do you think {{6}} have enough players?",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> Yes, I think so. We need 8 players to play. If we don’t get enough players, we {{7}} though.",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> Do you think we {{8}} enough players to play?",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> I think so, but {{9}}, I will let everyone know.",
        ],

        'answers' => [
            'playing',
            'Why',
            'will rain',
            'if it rains',
            'will send',
            'we will',
            'will cancel',
            'will get',
            "if we don’t",
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")