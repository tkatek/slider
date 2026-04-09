@php
    $content = [
        'page_title' => 'Practice 5',
        'title'      => 'Practice 5',
        'subtitle'   => 'Gap Fill: Complete the conversation with the correct word!',

        'audio'      => materialAsset('slider/A1/Advanced/chapter-1/audios/slide11/short-dialogue.mpeg'),

        'script'     => [
            "Man: Excuse me, is there a gym in the hotel?",
            "Woman: Yes, there's one on the first floor.",
            "Man: Great! And is there a pool?",
            "Woman: Yes, there's a pool up on the roof.",
            "Man: Is there a changing room there?",
            "Woman: No, there isn't, but there's a restroom.",
            "Man: OK, thanks.",
        ],

        'desktop_game_width' => 65,
        'desktop_pool_width' => 35,

        'completion' => [
            'title'       => 'Great job!',
            'description' => 'You completed the dialogue correctly.',
            'restart'     => 'Restart',
            'continue'    => 'Continue',
            'note'        => 'Continue button has no logic (you will add it).',
        ],

        'sentences' => [
            "<strong class='text-pink-600 dark:text-pink-400'>Man:</strong> Excuse me, is {{1}} a gym in the hotel?",
            "<strong class='text-blue-600 dark:text-blue-400'>Woman:</strong> Yes, there's {{2}} on the first {{3}}.",
            "<strong class='text-pink-600 dark:text-pink-400'>Man:</strong> Great! And is there a {{4}}?",
            "<strong class='text-blue-600 dark:text-blue-400'>Woman:</strong> Yes, {{5}} a pool on the roof.",
            "<strong class='text-pink-600 dark:text-pink-400'>Man:</strong> Is there a {{7}} room {{6}} there?",
            "<strong class='text-blue-600 dark:text-blue-400'>Woman:</strong> No, there isn't, but there's a {{8}}.",
            "<strong class='text-pink-600 dark:text-pink-400'>Man:</strong> OK, thanks.",
        ],

        'answers' => [
            'there',
            'one',
            'floor',
            'pool',
            "there's",
            'up',
            'changing',
            'restroom',
        ],

        'sfx' => [
            'correct' => materialAsset('slider/sounds/correct.wav'),
            'wrong'   => materialAsset('slider/sounds/wrong.wav'),
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")