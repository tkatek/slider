<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Hair / Facial Hair',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

    'items' => [
        [
            'text'  => 'long hair',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/Long-hair.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/Long-hair.webp'),
        ],
        [
            'text'  => 'short hair',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/Short-hair.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/short-hair.webp'),
        ],
        [
            'text'  => 'curly hair',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/Curly-hair.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/curly.webp'),
        ],
        [
            'text'  => 'straight hair',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/Straight-hair.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/straight.webp'),
        ],
        [
            'text'  => 'wavy hair',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/Wavy-hair.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/wavy.webp'),
        ],
        [
            'text'  => 'spiky hair',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/Spiky-hair.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/spiky.webp'),
        ],
        [
            'text'  => 'shaved hair',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/Shaved-hair.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/shaved.webp'),
        ],
        [
            'text'  => 'fair hair',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/Fair-hair.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/fair-hair.webp'),
        ],
        [
            'text'  => 'dark hair',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/Dark-hair.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/dark.webp'),
        ],
        [
            'text'  => 'dyed hair',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/Dyed-hair.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/dyed-hair.webp'),
        ],
        [
            'text'  => 'black hair',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/Black-hair.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/black.webp'),
        ],
        [
            'text'  => 'blonde hair',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/Blonde-hair.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/blonde.webp'),
        ],
        [
            'text'  => 'bald',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/bald.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/bald.webp'),
        ],
        [
            'text'  => 'beard',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/beard.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide17/Sixteen.webp'),
        ],
        [
            'text'  => 'moustache',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide4/moustache.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/moustache.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])