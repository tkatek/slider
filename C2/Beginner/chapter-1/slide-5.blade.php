<?php
$content = [

    'title' => 'New Language',
    'subtitle' => 'Useful Language',


    'groups' => [
        [
            'key' => 'useful-opinion-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'From my perspective...',
                    'emoji' => '💬',
                    'description' => 'Sharing opinion',
                    'sound' => materialAsset('slider/C2/chapter-1/audios/from-my-perspective.mp3'),
                ],
                [
                    'text' => 'I partially agree, however...',
                    'emoji' => '🤝',
                    'description' => 'Soft disagreement',
                    'sound' => materialAsset('slider/C2/chapter-1/audios/i-partially-agree.mp3'),
                ],
                [
                    'text' => 'That raises an interesting point...',
                    'emoji' => '✨',
                    'description' => 'Responding',
                    'sound' => materialAsset('slider/C2/chapter-1/audios/that-raises-an-interesting-point.mp3'),
                ],
                [
                    'text' => 'It depends on...',
                    'emoji' => '⚖️',
                    'description' => 'Avoiding absolute statements',
                    'sound' => materialAsset('slider/C2/chapter-1/audios/it-depends-on.mp3'),
                ],
                [
                    'text' => 'I’d argue that...',
                    'emoji' => '🎯',
                    'description' => 'Strong but polite opinion',
                    'sound' => materialAsset('slider/C2/chapter-1/audios/id-argue-that.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
