<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Food Groups',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-5',

    'items' => [
        [
            'text'     => 'Grains',
            'subtitle' => 'oats, barley',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-12/audios/slide6/Grains.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-12/img/slide6/grains.webp'),
        ],
        [
            'text'     => 'Protein foods',
            'subtitle' => 'tofu, seeds (new; expands beyond chicken, fish, eggs, nuts, beans)',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-12/audios/slide6/Protein-foods.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-12/img/slide6/protein-foods.webp'),
        ],
        [
            'text'     => 'Vegetables',
            'subtitle' => 'cabbage, beets, dark leafy greens, kale',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-12/audios/slide6/Vegetables.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-12/img/slide6/Vegetables.webp'),
        ],
        [
            'text'     => 'Fruits',
            'subtitle' => 'mango, pineapple',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-12/audios/slide6/Fruits.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-12/img/slide6/fruits.webp'),
        ],
        [
            'text'     => 'Dairy',
            'subtitle' => 'milk, cheese, yogurt',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-12/audios/slide6/Dairy.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-12/img/slide6/dairy.webp'),
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])