@php
    $content = [

        'title'         => 'Practice 4',
        'subtitle'      => 'Drag the boxes onto the matching gaps',
        'audio'         => '',

        'script'        => [
            "Man: Do you play sports?",
            "Woman: I used to play sports in high school.",
            "Man: Yeah, I used to play basketball.",
            "Woman: Why did you stop?",
            "Man: No time, I guess.",
            "Woman: Yeah, I used to have so much free time.",
            "Man: Me too! I miss those days.",
            "Woman: What sports did you play?",
            "Man: Baseball and basketball. I used to be pretty good. Not anymore.",
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

        'sentences' => [
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> Do you {{1}} sports?",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> I used to play sports in {{2}} school.",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> Yeah, I used to play {{3}}.",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> Why did you {{4}}?",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> No time, I {{5}}.",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> Yeah, I used to have so much {{6}} time.",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> Me {{7}}! I {{8}} those days.",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> What sports did you play?",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> Baseball and {{9}}. I used to be pretty good. Not anymore.",
        ],

        'answers' => [
            'play',
            'high',
            'basketball',
            'stop',
            'guess',
            'free',
            'too',
            'miss',
            'basketball',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")