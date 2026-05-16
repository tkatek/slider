<?php

$content = [
    'page_title' => '',
    'title' => 'Slang Time!',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'confident-disagreement-slang-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'I’m not sold',
                    'emoji' => '🤔',
                    'description' => 'Not convinced',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/im-not-sold.mp3'),
                ],
                [
                    'text' => 'That’s a stretch',
                    'emoji' => '🧐',
                    'description' => 'Hard to believe',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/thats-a-stretch.mp3'),
                ],
                [
                    'text' => 'Fair point, but...',
                    'emoji' => '🤝',
                    'description' => 'Respectful disagreement',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/fair-point-but.mp3'),
                ],
                [
                    'text' => 'I beg to differ',
                    'emoji' => '🎯',
                    'description' => 'Formal disagreement',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/i-beg-to-differ.mp3'),
                ],
                [
                    'text' => 'Let’s be real',
                    'emoji' => '💬',
                    'description' => 'Honest opinion',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/lets-be-real.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])