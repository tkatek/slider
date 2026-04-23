<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',
    'groups'     => [
        [
            'key'        => 'problems',
            'title'      => 'Problems',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-6',
            'items'      => [
                [
                    'text'     => 'Blackout',
                    'subtitle' => 'when electricity stops',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/blackout.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slideX/blackout.webp'),
                ],
                [
                    'text'     => 'Lights went out',
                    'subtitle' => 'no electricity',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/lights-went-out.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slideX/lights-went-out.webp'),
                ],
                [
                    'text'     => 'Robbery',
                    'subtitle' => 'stealing things',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/robbery.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slideX/robbery.webp'),
                ],
                [
                    'text'     => 'Burglars',
                    'subtitle' => 'people who steal from homes',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/burglars.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slideX/burglars.webp'),
                ],
                [
                    'text'     => 'Break into',
                    'subtitle' => 'enter a place illegally',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/break-into.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slideX/break-into.webp'),
                ],
                [
                    'text'     => 'Problem',
                    'subtitle' => 'something bad or difficult',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/problem.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slideX/problem.webp'),
                ],
            ],
        ],
        [
            'key'        => 'feelings-and-reactions',
            'title'      => 'Feelings & Reactions',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-4',
            'items'      => [
                [
                    'text'  => 'Upset',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/upset.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-3/img/slideX/upset.webp'),
                ],
                [
                    'text'  => 'Terrible',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/terrible.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-3/img/slideX/terrible.webp'),
                ],
                [
                    'text'  => 'Surprised',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/surprised.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-3/img/slideX/surprised.webp'),
                ],
                [
                    'text'  => 'Lucky',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/lucky.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-3/img/slideX/lucky.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
