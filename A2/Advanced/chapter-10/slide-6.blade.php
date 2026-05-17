<?php
$content = [

    'title' => 'New Language',
    'subtitle' => '',


    'groups' => [
        [
            'key' => 'useful-complaint-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-3 lg:sm:grid-cols-3',
            'items' => [
                [
                    'text' => 'Can you keep it down?',
                    'emoji' => '🔇',
                    'description' => 'asking someone to be quieter',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/can-you-keep-it-down.mp3'),
                ],
                [
                    'text' => 'I have to get up early.',
                    'emoji' => '⏰',
                    'description' => 'explaining a problem',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/i-have-to-get-up-early.mp3'),
                ],
                [
                    'text' => 'I want to report a problem.',
                    'emoji' => '📢',
                    'description' => 'making a complaint',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/i-want-to-report-a-problem.mp3'),
                ],
                [
                    'text' => 'Can you be more specific?',
                    'emoji' => '🔍',
                    'description' => 'asking for details',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/can-you-be-more-specific.mp3'),
                ],
                [
                    'text' => 'Our building policy doesn’t allow...',
                    'emoji' => '📋',
                    'description' => 'explaining rules',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/our-building-policy-doesnt-allow.mp3'),
                ],
                [
                    'text' => 'Don’t worry.',
                    'emoji' => '🤝',
                    'description' => 'reassuring someone',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/dont-worry.mp3'),
                ],
                [
                    'text' => 'Your problem will be solved soon.',
                    'emoji' => '✅',
                    'description' => 'offering help',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/your-problem-will-be-solved-soon.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])