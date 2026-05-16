<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Touch base',
            'subtitle'         => 'Check in with someone',
            'example_subtitle' => 'I’ll touch base next week.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-5/audios/slide4/touch-base.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-5/img/slide4/touch-base.webp'),
        ],
        [
            'text'             => 'Calendar invite',
            'subtitle'         => 'Scheduled meeting notification',
            'example_subtitle' => 'Send a calendar invite to confirm.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-5/audios/slide4/calendar-invite.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-5/img/slide4/calendar-invite.webp'),
        ],
        [
            'text'             => 'Collaboration',
            'subtitle'         => 'Working together',
            'example_subtitle' => 'Looking forward to possible collaboration.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-5/audios/slide4/collaboration.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-5/img/slide4/collaboration.webp'),
        ],
        [
            'text'             => 'Professional courtesy',
            'subtitle'         => 'Polite, respectful behavior',
            'example_subtitle' => 'Always show professional courtesy.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-5/audios/slide4/professional-courtesy.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-5/img/slide4/professional-courtesy.webp'),
        ],
        [
            'text'             => 'Networking etiquette',
            'subtitle'         => 'Proper behavior in networking',
            'example_subtitle' => 'Good etiquette makes you memorable.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-5/audios/slide4/networking-etiquette.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-5/img/slide4/networking-etiquette.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])