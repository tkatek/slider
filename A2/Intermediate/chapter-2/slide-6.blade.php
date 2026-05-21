<?php
$content = [

    'title'      => 'New Vocabulary',
    'subtitle'   => '',
    'image_text_style' => 'overlay',
    'groups'     => [
        [
            'key'        => 'food-items',
            'title'      => 'Food Items (Common Breakfast Foods)',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4',
            'items'      => [
                [
                    'text'  => 'Pancakes',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide6/Pancakes.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide6/pancakes.webp'),
                ],
                [
                    'text'  => 'Eggs',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide6/Eggs.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide6/eggs.webp'),
                ],
                [
                    'text'  => 'Bacon',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide6/Bacon.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide6/bacon.webp'),
                ],
                [
                    'text'  => 'Toast',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide6/Toast.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide6/toast.webp'),
                ],
                [
                    'text'  => 'Bread roll',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide6/Bread roll.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide6/bread-roll.webp'),
                ],
                [
                    'text'  => 'Sausages',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide6/Sausages.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide6/sausages.webp'),
                ],
                [
                    'text'  => 'Porridge',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide6/Porridge.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide6/porridge.webp'),
                ],
                [
                    'text'  => 'Corn flakes',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide6/Corn flakes.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide6/corn-flakes.webp'),
                ],
            ],
        ],
        [
            'key'        => 'food-preparation',
            'title'      => 'Food Preparation',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',
            'items'      => [
                [
                    'text'  => 'Boiled / hard-boiled eggs',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide6/Boiled _ hard-boiled eggs.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide6/boiled-hard-boiled-eggs.webp'),
                ],
                [
                    'text'  => 'Fried eggs',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide6/Fried eggs.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide6/fried-eggs.webp'),
                ],
                [
                    'text'  => 'Grilled tomatoes',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide6/Grilled tomatoes.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide6/grilled-tomatoes.webp'),
                ],
                [
                    'text'  => 'Pickled vegetables',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide6/Pickled vegetables.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide6/pickled-vegetables.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
