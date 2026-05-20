<?php

$content = [
    'title'      => 'New vocabulary',
    'subtitle'   => '',

    'grid_class'       => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
    'image_text_style' => 'overlay',

    'items' => [
        [
            'emoji' => '🕯️',
            'text'  => 'blow out',
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide9/blow-out.webp'),
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/blow-out.mp3'),
        ],
        [
            'emoji' => '🚶',
            'text'  => 'go out',
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide9/go-out.webp'),
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/go-out.mp3'),
        ],
        [
            'emoji' => '📣',
            'text'  => 'shout',
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide9/shout.webp'),
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/shout.mp3'),
        ],
        [
            'emoji' => '🎓',
            'text'  => 'wear a cap and gown / a costume',
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide9/cap-costume.webp'),
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/cap-costume.mp3'),
        ],
        [
            'emoji' => '🥂',
            'text'  => 'have a reception',
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide9/have-a-reception.webp'),
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/have-a-reception.mp3'),
        ],
        [
            'emoji' => '💍',
            'text'  => 'exchange rings',
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide9/exchange-rings.webp'),
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/exchange-rings.mp3'),
        ],
        [
            'emoji' => '📜',
            'text'  => 'get a degree',
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide9/get-a-degree.webp'),
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/get-a-degree.mp3'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])