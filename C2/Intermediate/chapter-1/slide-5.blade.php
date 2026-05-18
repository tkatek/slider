<?php

$content = [
    'title' => 'Useful Language',
    'subtitle' => '',
    'groups' => [
        [
            'key' => 'shipping-service-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Could you tell me about the options?',
                    'emoji' => '📦',
                    'description' => 'Asking about services',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/could-you-tell-me-about-the-options.mp3'),
                ],
                [
                    'text' => 'How much will it cost?',
                    'emoji' => '💰',
                    'description' => 'Clarifying price',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/how-much-will-it-cost.mp3'),
                ],
                [
                    'text' => 'It contains...',
                    'emoji' => '📋',
                    'description' => 'Explaining contents',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/it-contains.mp3'),
                ],
                [
                    'text' => 'Do you know why it’s delayed?',
                    'emoji' => '⏳',
                    'description' => 'Asking about delays',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/do-you-know-why-its-delayed.mp3'),
                ],
                [
                    'text' => 'Thank you for your assistance.',
                    'emoji' => '🙏',
                    'description' => 'Polite ending',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/thank-you-for-your-assistance.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])
