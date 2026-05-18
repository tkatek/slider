<?php

$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'debate-response-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'I’d like to challenge that point',
                    'emoji' => '🤔',
                    'description' => 'Polite disagreement',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-3/audios/slide5/id-like-to-challenge-that-point.mp3'),
                ],
                [
                    'text' => 'With respect, I disagree',
                    'emoji' => '🤝',
                    'description' => 'Strong but respectful',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-3/audios/slide5/with-respect-i-disagree.mp3'),
                ],
                [
                    'text' => 'Let me clarify my position',
                    'emoji' => '🎯',
                    'description' => 'Regaining control',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-3/audios/slide5/let-me-clarify-my-position.mp3'),
                ],
                [
                    'text' => 'That argument overlooks ...',
                    'emoji' => '🔍',
                    'description' => 'Countering',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-3/audios/slide5/that-argument-overlooks.mp3'),
                ],
                [
                    'text' => 'To address your concern ...',
                    'emoji' => '💬',
                    'description' => 'Responding strategically',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-3/audios/slide5/to-address-your-concern.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])