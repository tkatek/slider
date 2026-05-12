<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

    'items' => [

        [
            'text'     => 'Frown',
            'emoji'    => '☹️',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide16/frown.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-11/img/slide16/frown.webp'),
        ],

        [
            'text'     => 'Scrunch up my nose',
            'emoji'    => '😖',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide16/scrunch.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-11/img/slide16/scrunch-up.webp'),
        ],

        [
            'text'     => 'Pout my lips',
            'emoji'    => '😗',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide16/pout-my-lips.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-11/img/slide16/pout.webp'),
        ],

        [
            'text'     => 'Raise eyebrows',
            'emoji'    => '🤨',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide16/raise.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-11/img/slide16/raise.webp'),
        ],

        [
            'text'     => 'Drop my jaw',
            'emoji'    => '😮',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide16/drop.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-11/img/slide16/drop.webp'),
        ],

        [
            'text'     => 'Stick my tongue out',
            'emoji'    => '😛',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide16/stick.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-11/img/slide16/stick.webp'),
        ],

        [
            'text'     => 'Yawn',
            'emoji'    => '🥱',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide16/yawn.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-11/img/slide16/yawn.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])