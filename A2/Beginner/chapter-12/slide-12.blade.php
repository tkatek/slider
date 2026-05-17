<?php

$content = [
    'page_title' => 'New vocabulary 2',
    'title'      => 'New vocabulary 2',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3',

    'items' => [
        [
            'text'  => 'oatmeal',
            'emoji' => '🥣',
            'sound' => materialAsset("slider/A2/Beginner/chapter-12/audios/slide12/oatmeal.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter-12/img/slide13/oatmeal.webp"),
        ],
        [
            'text'  => 'flavour',
            'emoji' => '😋',
            'sound' => materialAsset("slider/A2/Beginner/chapter-12/audios/slide12/flavour.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter-12/img/slide13/flavour.webp"),
        ],
        [
            'text'  => 'blueberries',
            'emoji' => '🫐',
            'sound' => materialAsset("slider/A2/Beginner/chapter-12/audios/slide12/blueberries.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter-12/img/slide13/blueberries.webp"),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])