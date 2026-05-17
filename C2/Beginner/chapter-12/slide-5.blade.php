<?php

$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'confident-disagreement-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'I see it differently.',
                    'emoji' => '💬',
                    'description' => 'Soft disagreement',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/i-see-it-differently.mp3'),
                ],
                [
                    'text' => 'I don’t agree with that.',
                    'emoji' => '✋',
                    'description' => 'Clear disagreement',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/i-dont-agree-with-that.mp3'),
                ],
                [
                    'text' => 'I understand, but...',
                    'emoji' => '🤝',
                    'description' => 'Respectful tone',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/i-understand-but.mp3'),
                ],
                [
                    'text' => 'I still think my point stands.',
                    'emoji' => '🎯',
                    'description' => 'Holding opinion',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/i-still-think-my-point-stands.mp3'),
                ],
                [
                    'text' => 'Let’s agree to disagree.',
                    'emoji' => '✅',
                    'description' => 'Ending discussion',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide5/lets-agree-to-disagree.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])