<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Composed',
            'subtitle'         => 'Calm under pressure',
            'example_subtitle' => 'She remained composed during the mistake.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-8/audios/slide4/composed.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-7/img/slide4/composed.webp'),
        ],
        [
            'text'             => 'Embarrassed',
            'subtitle'         => 'Feeling awkward',
            'example_subtitle' => 'He felt embarrassed after the slip.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-8/audios/slide4/embarrassed.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-8/img/slide4/embarrassed.webp'),
        ],
        [
            'text'             => 'Poise',
            'subtitle'         => 'Graceful confidence',
            'example_subtitle' => 'Maintain poise in any situation.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-8/audios/slide4/poise.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-8/img/slide4/poise.webp'),
        ],
        [
            'text'             => 'Clarify',
            'subtitle'         => 'Make clear',
            'example_subtitle' => 'I want to clarify my point.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-8/audios/slide4/clarify.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-8/img/slide4/clarify.webp'),
        ],
        [
            'text'             => 'Recover',
            'subtitle'         => 'Regain confidence',
            'example_subtitle' => 'Recover quickly from an awkward comment.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-8/audios/slide4/recover.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-8/img/slide4/recover.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])