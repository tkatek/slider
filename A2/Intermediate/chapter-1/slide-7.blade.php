<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',
    'groups'     => [
        [
            'key'        => 'body-parts',
            'title'      => 'Body Parts',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-4',
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
        [
            'key'        => 'regions-and-people',
            'title'      => 'Regions & People',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-6',
            'items'      => [
                [
                    'text'  => 'Gulf countries',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/gulf-countries.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/gulf-countries.webp'),
                ],
                [
                    'text'  => 'European / South American countries',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/european-south-american-countries.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/european-south-american-countries.webp'),
                ],
                [
                    'text'  => 'East Asian / Southeast Asian countries',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/east-asian.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/east-asian-southeast-asian-countries.webp'),
                ],
                [
                    'text'  => 'Māori people',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/maori-people.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/maori-people.webp'),
                ],
                [
                    'text'  => 'Inuit people',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/inuit-people.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/inuit-people.webp'),
                ],
                [
                    'text'  => 'Arctic regions',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/arctic-regions.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/arctic-regions.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])