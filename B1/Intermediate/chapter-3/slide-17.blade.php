<?php

$content = [

    'title'      => 'New Vocabulary',
    'subtitle'   => '',
    'image_text_style' => 'overlay',

    'groups' => [
        [
            'key'        => 'future-places',

            'grid_class' => 'grid-cols-2 sm:grid-cols-3',
            'items'      => [
                [
                    'text'     => 'Skyscrapers',
                    'subtitle' => 'Very tall buildings in big cities',
                    'emoji'    => '🏙️',
                    'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide17/skyscrapers.mp3'),
                    'image'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide17/skyscrapers.webp'),
                ],
                [
                    'text'     => 'Underwater cities',
                    'subtitle' => 'Cities built under the sea',
                    'emoji'    => '🌊',
                    'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide17/underwater-cities.mp3'),
                    'image'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide17/underwater-cities.webp'),
                ],
            ],
        ],
        [
            'key'        => 'future-words',

            'grid_class' => 'grid-cols-1 sm:grid-cols-3',
            'items'      => [
                [
                    'text'     => 'Experts',
                    'subtitle' => 'People who know a lot about a subject',
                    'emoji'    => '🧠',
                    'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide17/experts.mp3'),
                ],
                [
                    'text'     => 'Architecture',
                    'subtitle' => 'The design and style of buildings',
                    'emoji'    => '🏛️',
                    'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide17/architecture.mp3'),
                ],
                [
                    'text'     => 'Unbelievable',
                    'subtitle' => 'Very surprising or difficult to believe',
                    'emoji'    => '😲',
                    'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide17/unbelievable.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])