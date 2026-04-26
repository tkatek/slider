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
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/blackout.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/blackout.webp'),
                ],
                [
                    'text'     => 'Lights went out',
                    'subtitle' => 'no electricity',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/lights-went-out.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/lights-went-out.webp'),
                ],
                [
                    'text'     => 'Robbery',
                    'subtitle' => 'stealing things',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/robbery.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/robbery.webp'),
                ],
                [
                    'text'     => 'Burglars',
                    'subtitle' => 'people who steal from homes',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/burglars.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/burglars.webp'),
                ],
                [
                    'text'     => 'Break into',
                    'subtitle' => 'enter a place illegally',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/break-into.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/break-into.webp'),
                ],
                [
                    'text'     => 'Problem',
                    'subtitle' => 'something bad or difficult',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/problem.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/problem.webp'),
                ],
            ],
        ],
        [
            'key'        => 'feelings-and-reactions',
            'title'      => 'Feelings & Reactions',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
            'items'      => [
                [
                    'text'  => 'Upset',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/upset.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/upset.webp'),
                ],
                [
                    'text'  => 'Terrible',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/terrible.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/terrible.webp'),
                ],
                [
                    'text'  => 'Surprised',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/surprised.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/surprised.webp'),
                ],
                [
                    'text'  => 'Lucky',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/lucky.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/lucky.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
