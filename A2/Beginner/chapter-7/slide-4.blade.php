<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Adjectives / Nouns',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

    'items' => [
        [
            'text'  => 'tall',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/tall.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/Tall.webp'),
        ],
        [
            'text'  => 'short',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/short.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/Short.webp'),
        ],
        [
            'text'  => 'medium height',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/medium-height.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/Medium-height.webp'),
        ],
        [
            'text'  => 'thin',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/thin.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/thin.webp'),
        ],
        [
            'text'  => 'slim',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/slim.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/slim.webp'),
        ],
        [
            'text'  => 'plump',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/plump.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/plump.webp'),
        ],
        [
            'text'  => 'fat',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/fat.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/fat.webp'),
        ],
        [
            'text'  => 'young',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/young.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/young.webp'),
        ],
        [
            'text'  => 'old',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/old.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/old.webp'),
        ],
        [
            'text'  => 'beautiful',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/beautiful.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/beautiful.webp'),
        ],
        [
            'text'  => 'handsome',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/handsome.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/handsome.webp'),
        ],
        [
            'text'  => 'angry',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/angry.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/angry.webp'),
        ],
        [
            'text'  => 'ugly',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/ugly.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/ugly.webp'),
        ],
        [
            'text'  => 'intelligent',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/intelligent.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/intelligent.webp'),
        ],
        [
            'text'  => 'kind',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/kind.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/kind.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])