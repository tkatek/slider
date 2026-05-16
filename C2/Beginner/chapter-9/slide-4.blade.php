<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Defuse tension',
            'subtitle'         => 'Reduce stress or conflict',
            'example_subtitle' => 'A joke can defuse tension in meetings.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-9/audios/slide4/defuse-tension.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-9/img/slide4/defuse-tension.webp'),
        ],
        [
            'text'             => 'Lighthearted',
            'subtitle'         => 'Funny without offense',
            'example_subtitle' => 'Lighthearted humor works well socially.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-9/audios/slide4/lighthearted.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-9/img/slide4/lighthearted.webp'),
        ],
        [
            'text'             => 'Sarcasm',
            'subtitle'         => 'Ironic humor',
            'example_subtitle' => 'Avoid sarcasm in serious situations.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-9/audios/slide4/sarcasm.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-9/img/slide4/sarcasm.webp'),
        ],
        [
            'text'             => 'Appropriateness',
            'subtitle'         => 'Suitability for context',
            'example_subtitle' => 'Humor depends on appropriateness.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-9/audios/slide4/appropriateness.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-9/img/slide4/appropriateness.webp'),
        ],
        [
            'text'             => 'Icebreaker',
            'subtitle'         => 'Something to relax people',
            'example_subtitle' => 'A small joke can act as an icebreaker.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-9/audios/slide4/icebreaker.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-9/img/slide4/icebreaker.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])