<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Assertive',
            'subtitle'         => 'Confident, not aggressive',
            'example_subtitle' => 'Be assertive, not rude.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-12/audios/slide4/assertive.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-12/img/slide4/assertive.webp'),
        ],
        [
            'text'             => 'Opposing view',
            'subtitle'         => 'A different opinion',
            'example_subtitle' => 'I respect your opposing view.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-12/audios/slide4/opposing-view.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-12/img/slide4/opposing-view.webp'),
        ],
        [
            'text'             => 'Tone control',
            'subtitle'         => 'Managing how you sound',
            'example_subtitle' => 'Tone control matters.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-12/audios/slide4/tone-control.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-12/img/slide4/tone-control.webp'),
        ],
        [
            'text'             => 'Stand your ground',
            'subtitle'         => 'Keep your opinion',
            'example_subtitle' => 'She stood her ground calmly.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-12/audios/slide4/stand-your-ground.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-12/img/slide4/stand-your-ground.webp'),
        ],
        [
            'text'             => 'Over-apologize',
            'subtitle'         => 'Say sorry too much',
            'example_subtitle' => 'Don’t over-apologize.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-12/audios/slide4/over-apologize.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-12/img/slide4/over-apologize.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])