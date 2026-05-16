<?php

$content = [
    'page_title' => '',
    'title' => 'Slang time!',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'natural-reaction-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'I guess',
                    'emoji' => '🤔',
                    'description' => 'I guess it’s fine.',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/i-guess.mp3'),
                ],
                [
                    'text' => 'Kinda / Sort of',
                    'emoji' => '💬',
                    'description' => 'I kinda agree.',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/kinda-sort-of.mp3'),
                ],
                [
                    'text' => 'Yeah, maybe',
                    'emoji' => '⏳',
                    'description' => 'Yeah, maybe later.',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/yeah-maybe.mp3'),
                ],
                [
                    'text' => 'Honestly',
                    'emoji' => '🗣️',
                    'description' => 'Honestly, I didn’t like it.',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/honestly.mp3'),
                ],
                [
                    'text' => 'To be fair',
                    'emoji' => '⚖️',
                    'description' => 'To be fair, he tried.',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/to-be-fair.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])