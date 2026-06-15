<?php
$content = [
    'title'      => 'New Language Expressions',
    'subtitle'   => '',

    'groups' => [
        [
            'title'      => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4',
            'items'      => [
                [
                    'text' => 'Be outside',
                    'subtitle' => 'stay in an outdoor place',
                    'emoji' => '🌳',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-6/audios/slide8/be-outside.mp3'),
                    'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide8/be-outside.webp'),
                ],

                [
                    'text' => 'Breathe in fresh air',
                    'subtitle' => 'take clean air into your lungs',
                    'emoji' => '🌬️',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-6/audios/slide8/breathe-in-fresh-air.mp3'),
                    'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide8/breathe-in-fresh-air.webp'),
                ],

                [
                    'text' => 'Get some sun',
                    'subtitle' => 'spend time in sunlight',
                    'emoji' => '☀️',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-6/audios/slide8/get-some-sun.mp3'),
                    'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide8/get-some-sun.webp'),
                ],

                [
                    'text' => 'Right now',
                    'subtitle' => 'at this moment',
                    'emoji' => '⏰',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-6/audios/slide8/right-now.mp3'),
                    'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide8/right-now.webp'),
                ],
            ],
        ],

        [
            'title'      => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3',
            'items'      => [
                [
                    'text' => 'I love to do...',
                    'subtitle' => 'used to express strong enjoyment',
                    'emoji' => '❤️',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-6/audios/slide8/i-love-to-do.mp3'),
                ],

                [
                    'text' => "It's so much fun",
                    'subtitle' => 'used to say something is very enjoyable',
                    'emoji' => '😄',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-6/audios/slide8/its-so-much-fun.mp3'),
                ],

                [
                    'text' => 'What do you prefer?',
                    'subtitle' => "asking about someone's choice",
                    'emoji' => '🤔',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-6/audios/slide8/what-do-you-prefer.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])