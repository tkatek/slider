<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Influence',
            'subtitle'         => 'Affect opinions or decisions',
            'example_subtitle' => 'His presentation influenced management.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-6/audios/slide4/influence.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-6/img/slide4/influence.webp'),
        ],
        [
            'text'             => 'Justify',
            'subtitle'         => 'Give reasons',
            'example_subtitle' => 'He justified his proposal clearly.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-6/audios/slide4/justify.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-6/img/slide4/justify.webp'),
        ],
        [
            'text'             => 'Diplomatic',
            'subtitle'         => 'Polite and careful',
            'example_subtitle' => 'She responded diplomatically.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-6/audios/slide4/diplomatic.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-6/img/slide4/diplomatic.webp'),
        ],
        [
            'text'             => 'Pushy',
            'subtitle'         => 'Too forceful',
            'example_subtitle' => 'Avoid sounding pushy.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-6/audios/slide4/pushy.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-6/img/slide4/pushy.webp'),
        ],
        [
            'text'             => 'Reasoning',
            'subtitle'         => 'Logical thinking',
            'example_subtitle' => 'His reasoning was convincing.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-6/audios/slide4/reasoning.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-6/img/slide4/reasoning.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])