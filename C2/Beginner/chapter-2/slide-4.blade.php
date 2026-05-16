<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Justify',
            'subtitle'         => 'Give reasons.',
            'example_subtitle' => 'You need to justify your opinion.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-2/audios/slide4/justify.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-2/img/slide4/justify.webp'),
        ],
        [
            'text'             => 'Reasoning',
            'subtitle'         => 'Logical thinking.',
            'example_subtitle' => 'His reasoning was clear.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-2/audios/slide4/reasoning.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-2/img/slide4/reasoning.webp'),
        ],
        [
            'text'             => 'Evidence',
            'subtitle'         => 'Proof or support.',
            'example_subtitle' => 'She gave evidence for her idea.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-2/audios/slide4/evidence.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-2/img/slide4/evidence.webp'),
        ],
        [
            'text'             => 'Perspective',
            'subtitle'         => 'Point of view.',
            'example_subtitle' => 'From my perspective ...',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-2/audios/slide4/perspective.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-2/img/slide4/perspective.webp'),
        ],
        [
            'text'             => 'Counterargument',
            'subtitle'         => 'Opposing argument.',
            'example_subtitle' => 'He addressed the counterargument.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-2/audios/slide4/counterargument.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-2/img/slide4/counterargument.webp'),
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])