@php
    $content = [
        'page_title' => 'Practice 3',
        'title'      => 'Listening Time',
        'subtitle'   => 'Practice 3',
        'audio'      => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide10.mp3'),

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

        'sentences' => [
            "<strong class='text-blue-600 dark:text-blue-400'>Check-in clerk:</strong> Can I have your {{1}} and {{2}}, please?",
            "<strong class='text-pink-600 dark:text-pink-400'>Daan:</strong> Yes, of course. Here you are.",

            "<strong class='text-blue-600 dark:text-blue-400'>Check-in clerk:</strong> Did you {{3}} your {{4}} yourself?",
            "<strong class='text-pink-600 dark:text-pink-400'>Daan:</strong> Yes.",

            "<strong class='text-blue-600 dark:text-blue-400'>Check-in clerk:</strong> How many bags are you {{5}} in?",
            "<strong class='text-pink-600 dark:text-pink-400'>Daan:</strong> Just one. I’m taking this hand luggage.",

            "<strong class='text-blue-600 dark:text-blue-400'>Check-in clerk:</strong> Are there any sharp items in your {{6}}?",
            "<strong class='text-pink-600 dark:text-pink-400'>Daan:</strong> No, there aren’t.",

            "<strong class='text-blue-600 dark:text-blue-400'>Check-in clerk:</strong> Would you like an aisle seat or a {{7}} seat?",
            "<strong class='text-pink-600 dark:text-pink-400'>Daan:</strong> A window seat if possible, please.",

            "<strong class='text-blue-600 dark:text-blue-400'>Check-in clerk:</strong> OK. Here you go. This is your boarding card. The flight leaves at 1.20. Go to Gate 17 around 12.30. Have a nice flight.",
            "<strong class='text-pink-600 dark:text-pink-400'>Daan:</strong> Thank you.",
        ],

        'answers' => [
            'ticket',
            'passport',
            'pack',
            'bags',
            'checking',
            'hand luggage',
            'window',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")