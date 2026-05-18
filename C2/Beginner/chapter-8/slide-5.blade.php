<?php

$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'handling-awkward-conversations-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'That’s a great point',
                    'emoji' => '💡',
                    'description' => 'Acknowledging politely',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide5/thats-a-great-point.mp3'),
                ],
                [
                    'text' => 'I appreciate your clarification',
                    'emoji' => '🤝',
                    'description' => 'Maintaining respect',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide5/i-appreciate-your-clarification.mp3'),
                ],
                [
                    'text' => 'Let me explain',
                    'emoji' => '🎯',
                    'description' => 'Regaining control of conversation',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide5/let-me-explain.mp3'),
                ],
                [
                    'text' => 'Thanks for pointing that out',
                    'emoji' => '✅',
                    'description' => 'Handling corrections gracefully',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide5/thanks-for-pointing-that-out.mp3'),
                ],
                [
                    'text' => 'I’m glad you asked',
                    'emoji' => '💬',
                    'description' => 'Turning awkwardness into opportunity',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide5/im-glad-you-asked.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])