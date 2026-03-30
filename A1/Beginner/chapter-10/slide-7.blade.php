<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Sizes, Colours, and Materials',
    'subtitle'   => 'I want a red t-shirt in cotton.',

    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',

    'items' => [
        [
            'text' => 'Sizes',
            'subtitle' => 'Clothes come in small, medium, and large.',
            'emoji' => '📏',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide7/sizes.mp3.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide7/sizes.webp')
        ],
        [
            'text' => 'Colours',
            'subtitle' => 'Available colours include red, blue, and black.',
            'emoji' => '🎨',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide7/colours.mp3.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide7/colours.webp')
        ],
        [
            'text' => 'Materials',
            'subtitle' => 'Common materials are cotton, leather, and metal.',
            'emoji' => '🧵',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide7/materials.mp3.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide7/materials.webp')
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])