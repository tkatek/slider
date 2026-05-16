<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Buy time',
            'subtitle'         => 'Gain time to think',
            'example_subtitle' => 'He used a pause to buy time.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-7/audios/slide4/buy-time.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-7/img/slide4/buy-time.webp'),
        ],
        [
            'text'             => 'Uncertain',
            'subtitle'         => 'Not sure',
            'example_subtitle' => 'I’m uncertain about the outcome.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-7/audios/slide4/uncertain.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-7/img/slide4/uncertain.webp'),
        ],
        [
            'text'             => 'Composed',
            'subtitle'         => 'Calm and controlled',
            'example_subtitle' => 'She remained composed under pressure.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-7/audios/slide4/composed.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-7/img/slide4/composed.webp'),
        ],
        [
            'text'             => 'Assertive',
            'subtitle'         => 'Confident, not aggressive',
            'example_subtitle' => 'Be assertive, not rude.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-7/audios/slide4/assertive.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-7/img/slide4/assertive.webp'),
        ],
        [
            'text'             => 'Hesitation',
            'subtitle'         => 'Pause due to doubt',
            'example_subtitle' => 'Avoid fillers that show hesitation.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-7/audios/slide4/hesitation.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-7/img/slide4/hesitation.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])