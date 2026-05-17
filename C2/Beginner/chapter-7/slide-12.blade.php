<?php

$content = [
    'page_title' => '',
    'title' => 'Slang time!',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'projecting-confidence-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Stay composed',
                    'emoji' => '🧘',
                    'description' => 'Remain calm',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide12/stay-composed.mp3'),
                ],
                [
                    'text' => 'Regain control',
                    'emoji' => '🎯',
                    'description' => 'Take charge again',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide12/regain-control.mp3'),
                ],
                [
                    'text' => 'Handle pressure',
                    'emoji' => '💪',
                    'description' => 'Manage stress',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide12/handle-pressure.mp3'),
                ],
                [
                    'text' => 'Buy yourself time',
                    'emoji' => '⏳',
                    'description' => 'Pause strategically',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide12/buy-yourself-time.mp3'),
                ],
                [
                    'text' => 'Sound assured',
                    'emoji' => '✅',
                    'description' => 'Appear confident',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide12/sound-assured.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])