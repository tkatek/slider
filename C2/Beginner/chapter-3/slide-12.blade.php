<?php

$content = [
    'page_title' => '',
    'title' => 'Slang time!',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'debate-slang-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Play devil’s advocate',
                    'emoji' => '😈',
                    'description' => 'Argue the opposite side',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-3/audios/slide12/play-devils-advocate.mp3'),
                ],
                [
                    'text' => 'Hold your ground',
                    'emoji' => '🧍',
                    'description' => 'Stay firm',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-3/audios/slide12/hold-your-ground.mp3'),
                ],
                [
                    'text' => 'Push back',
                    'emoji' => '✋',
                    'description' => 'Resist an argument',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-3/audios/slide12/push-back.mp3'),
                ],
                [
                    'text' => 'That doesn’t fully address...',
                    'emoji' => '🔍',
                    'description' => 'Pointing out gaps',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-3/audios/slide12/that-doesnt-fully-address.mp3'),
                ],
                [
                    'text' => 'Let’s unpack that',
                    'emoji' => '🧠',
                    'description' => 'Analyze deeply',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-3/audios/slide12/lets-unpack-that.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])