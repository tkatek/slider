<?php
$content = [
    'title' => 'Practice 6: Present Simple <br>vs. Past Simple (Irregular)',
    'title_class' => 'text-2xl sm:text-4xl lg:text-5xl',
    'subtitle' => 'Drag & drop the verbs in the right column',

    'categories' => [
        'Present Simple Verbs' => [
            'emoji' => '🔁',
            'items' => [
                'is',
                'are',
                'do',
                'bite',
                'buy',
                'build',
                'catch',
                'eat',
                'fight',
                'freeze',
                'has/have',
                'hear',
                'learn',
                'lose',
                'make',
                'pay',
                'sleep',
                'say',
                'see',
                'take',
            ],
        ],
        'Past Simple Verbs' => [
            'emoji' => '🕰️',
            'items' => [
                'was',
                'were',
                'did',
                'bit',
                'bought',
                'built',
                'caught',
                'ate',
                'fought',
                'froze',
                'had',
                'heard',
                'learned',
                'lost',
                'made',
                'paid',
                'slept',
                'said',
                'saw',
                'took',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])