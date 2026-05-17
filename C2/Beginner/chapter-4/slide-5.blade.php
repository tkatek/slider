<?php

$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'professional-networking-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'It’s a pleasure to meet you',
                    'emoji' => '🤝',
                    'description' => 'Polite introduction',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-4/audios/slide5/its-a-pleasure-to-meet-you.mp3'),
                ],
                [
                    'text' => 'I’d love to hear more about...',
                    'emoji' => '👂',
                    'description' => 'Showing interest',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-4/audios/slide5/id-love-to-hear-more-about.mp3'),
                ],
                [
                    'text' => 'Perhaps we could collaborate',
                    'emoji' => '💼',
                    'description' => 'Suggesting partnership',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-4/audios/slide5/perhaps-we-could-collaborate.mp3'),
                ],
                [
                    'text' => 'Can I follow up with you?',
                    'emoji' => '📩',
                    'description' => 'Asking for contact / future communication',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-4/audios/slide5/can-i-follow-up-with-you.mp3'),
                ],
                [
                    'text' => 'I look forward to staying in touch',
                    'emoji' => '🌐',
                    'description' => 'Ending conversation politely',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-4/audios/slide5/i-look-forward-to-staying-in-touch.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])