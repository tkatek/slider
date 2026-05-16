<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Literal translation',
            'subtitle'         => 'Word-for-word translation',
            'example_subtitle' => 'Literal translations often sound unnatural.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-10/audios/slide4/literal-translation.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-10/img/slide4/literal-translation.webp'),
        ],
        [
            'text'             => 'Fluent',
            'subtitle'         => 'Smooth, natural speech',
            'example_subtitle' => 'She sounds fluent, not rehearsed.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-10/audios/slide4/fluent.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-10/img/slide4/fluent.webp'),
        ],
        [
            'text'             => 'Overthink',
            'subtitle'         => 'Think too much',
            'example_subtitle' => 'Don’t overthink every sentence.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-10/audios/slide4/overthink.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-10/img/slide4/overthink.webp'),
        ],
        [
            'text'             => 'Natural flow',
            'subtitle'         => 'Smooth rhythm of speech',
            'example_subtitle' => 'Focus on natural flow, not perfection.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-10/audios/slide4/natural-flow.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-10/img/slide4/natural-flow.webp'),
        ],
        [
            'text'             => 'Awkward phrasing',
            'subtitle'         => 'Strange sentence structure',
            'example_subtitle' => 'That sentence had awkward phrasing.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-10/audios/slide4/awkward-phrasing.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-10/img/slide4/awkward-phrasing.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])