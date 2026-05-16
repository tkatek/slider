<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Debate',
            'subtitle'         => 'Structured argument.',
            'example_subtitle' => 'We had a formal debate in class.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-3/audios/slide4/debate.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-3/img/slide4/debate.webp'),
        ],
        [
            'text'             => 'Defend',
            'subtitle'         => 'Protect your opinion.',
            'example_subtitle' => 'She defended her point calmly.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-3/audios/slide4/defend.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-3/img/slide4/defend.webp'),
        ],
        [
            'text'             => 'Counter',
            'subtitle'         => 'Respond with an opposing point.',
            'example_subtitle' => 'He countered the argument logically.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-3/audios/slide4/counter.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-3/img/slide4/counter.webp'),
        ],
        [
            'text'             => 'Claim',
            'subtitle'         => 'A stated opinion.',
            'example_subtitle' => 'His claim lacked evidence.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-3/audios/slide4/claim.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-3/img/slide4/claim.webp'),
        ],
        [
            'text'             => 'Rebuttal',
            'subtitle'         => 'Response to an argument.',
            'example_subtitle' => 'She gave a strong rebuttal.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-3/audios/slide4/rebuttal.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-3/img/slide4/rebuttal.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])