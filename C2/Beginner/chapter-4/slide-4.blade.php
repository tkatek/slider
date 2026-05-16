<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Follow up',
            'subtitle'         => 'Contact someone after initial meeting.',
            'example_subtitle' => 'I’ll follow up next week.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-4/audios/slide4/follow-up.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-4/img/slide4/follow-up.webp'),
        ],
        [
            'text'             => 'Professional rapport',
            'subtitle'         => 'Positive working relationship.',
            'example_subtitle' => 'He has great rapport with clients.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-4/audios/slide4/professional-rapport.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-4/img/slide4/professional-rapport.webp'),
        ],
        [
            'text'             => 'Collaborate',
            'subtitle'         => 'Work together.',
            'example_subtitle' => 'We hope to collaborate on new projects.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-4/audios/slide4/collaborate.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-4/img/slide4/collaborate.webp'),
        ],
        [
            'text'             => 'Insightful',
            'subtitle'         => 'Shows understanding.',
            'example_subtitle' => 'That’s an insightful question.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-4/audios/slide4/insightful.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-4/img/slide4/insightful.webp'),
        ],
        [
            'text'             => 'Elevator pitch',
            'subtitle'         => 'Short professional introduction.',
            'example_subtitle' => 'Prepare a clear elevator pitch.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-4/audios/slide4/elevator-pitch.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-4/img/slide4/elevator-pitch.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])