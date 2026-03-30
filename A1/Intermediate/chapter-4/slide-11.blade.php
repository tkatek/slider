@php
    $content = [
        'page_title' => 'Practice',
        'title'      => 'Fill in the missing words',
        'subtitle'   => 'Listening: injury dialogue',
        'audio'      => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide11.mpeg'),
        'script'     => [
            "Maya: How did you hurt your leg, Craig?",
            "Craig: Oh, I tripped and fell when I was playing soccer.",
            "Maya: Ouch. Did you go to the hospital?",
            "Craig: Yes, I did. My leg really hurt, so I got x-rays.",
            "Maya: Really? Did you break your leg?",
            "Craig: No, it's just a sprain. But I won't be able to play soccer for the rest of the season.",
            "Maya: Oh, no. That's too bad.",
        ],


        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

        'sentences' => [
            "<strong class='text-blue-600 dark:text-blue-400'>Maya:</strong> How did you {{1}} your leg, Craig?",
            "<strong class='text-pink-600 dark:text-pink-400'>Craig:</strong> Oh, I {{2}} and fell when I was playing soccer.",
            "<strong class='text-blue-600 dark:text-blue-400'>Maya:</strong> Ouch. Did you {{3}} to the hospital?",
            "<strong class='text-pink-600 dark:text-pink-400'>Craig:</strong> Yes, I did. My leg really hurt, so I got x-rays.",
            "<strong class='text-blue-600 dark:text-blue-400'>Maya:</strong> Really? Did you {{4}} your leg?",
            "<strong class='text-pink-600 dark:text-pink-400'>Craig:</strong> No, it’s just {{5}}. But I won’t be able to play soccer for the rest of the season.",
            "<strong class='text-blue-600 dark:text-blue-400'>Maya:</strong> Oh, no. That’s too bad.",
        ],

        'answers' => [
            'hurt',
            'tripped',
            'go',
            'break',
            'a sprain',
        ],

    ];
@endphp

@include("slider.game.drag-and-drop-blanks")
