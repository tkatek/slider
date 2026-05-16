<?php

$content = [
    'page_title' => '',
    'title' => 'Slang time!',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'influencing-and-persuading-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Make a strong case',
                    'emoji' => '💪',
                    'description' => 'Present convincing reasons',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-6/audios/slide12/make-a-strong-case.mp3'),
                ],
                [
                    'text' => 'Take into account',
                    'emoji' => '🧠',
                    'description' => 'Consider carefully',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-6/audios/slide12/take-into-account.mp3'),
                ],
                [
                    'text' => 'Strike a balance',
                    'emoji' => '⚖️',
                    'description' => 'Avoid extremes',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-6/audios/slide12/strike-a-balance.mp3'),
                ],
                [
                    'text' => 'Support with evidence',
                    'emoji' => '📊',
                    'description' => 'Use facts',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-6/audios/slide12/support-with-evidence.mp3'),
                ],
                [
                    'text' => 'Win someone over',
                    'emoji' => '🤝',
                    'description' => 'Persuade successfully',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-6/audios/slide12/win-someone-over.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])