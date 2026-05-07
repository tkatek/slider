<?php
$content = [
    'page_title' => 'New Language',
    'title' => 'New Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'useful-opinion-expressions',
            'title' => 'Useful Language',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'From my perspective...',
                    'emoji' => '💬',
                    'description' => 'Sharing opinion',
                    'sound' => materialAsset('slider/C2/Advanced/chapter-1/audios/slide5/from-my-perspective.mp3'),
                ],
                [
                    'text' => 'I partially agree, however...',
                    'emoji' => '🤝',
                    'description' => 'Soft disagreement',
                    'sound' => materialAsset('slider/C2/Advanced/chapter-1/audios/slide5/i-partially-agree-however.mp3'),
                ],
                [
                    'text' => 'That raises an interesting point...',
                    'emoji' => '✨',
                    'description' => 'Responding',
                    'sound' => materialAsset('slider/C2/Advanced/chapter-1/audios/slide5/that-raises-an-interesting-point.mp3'),
                ],
                [
                    'text' => 'It depends on...',
                    'emoji' => '⚖️',
                    'description' => 'Avoiding absolute statements',
                    'sound' => materialAsset('slider/C2/Advanced/chapter-1/audios/slide5/it-depends-on.mp3'),
                ],
                [
                    'text' => 'I’d argue that...',
                    'emoji' => '🎯',
                    'description' => 'Strong but polite opinion',
                    'sound' => materialAsset('slider/C2/Advanced/chapter-1/audios/slide5/id-argue-that.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])