<?php

$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'influencing-and-persuading-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'I understand your concern, but...',
                    'emoji' => '🤝',
                    'description' => 'Soft disagreement',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-6/audios/slide5/i-understand-your-concern-but.mp3'),
                ],
                [
                    'text' => 'From my perspective...',
                    'emoji' => '👀',
                    'description' => 'Giving opinion',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-6/audios/slide5/from-my-perspective.mp3'),
                ],
                [
                    'text' => 'It might be worth considering...',
                    'emoji' => '💡',
                    'description' => 'Gentle persuasion',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-6/audios/slide5/it-might-be-worth-considering.mp3'),
                ],
                [
                    'text' => 'Based on the data...',
                    'emoji' => '📊',
                    'description' => 'Supporting argument',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-6/audios/slide5/based-on-the-data.mp3'),
                ],
                [
                    'text' => 'Perhaps we could explore...',
                    'emoji' => '🔍',
                    'description' => 'Suggesting alternative',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-6/audios/slide5/perhaps-we-could-explore.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])