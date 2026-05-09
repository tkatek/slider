<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Body Parts',
    'groups'     => [
        [
            'key'        => 'body-parts',
            'title'      => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
            'items'      => [
                [
                    'text'  => 'Tongue',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/tongue.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/tongue.webp'),
                ],
                [
                    'text'  => 'Nose',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/nose.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/nose.webp'),
                ],
                [
                    'text'  => 'Forehead',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/forehead.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/forehead.webp'),
                ],
                [
                    'text'  => 'Cheeks',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/cheeks.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/cheeks.webp'),
                ],
                [
                    'text'  => 'Palms',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/palms.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/palms.webp'),
                ],
                [
                    'text'  => 'Knuckles',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/knuckles.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/knuckles.webp'),
                ],
                [
                    'text'  => 'Fingers',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/fingers.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/fingers.webp'),
                ],
            ],
        ],

    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])