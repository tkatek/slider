<?php

$content = [
    'page_title' => '',
    'title' => 'Slang time!',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'networking-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Make a strong impression',
                    'emoji' => '🌟',
                    'description' => 'Be memorable professionally',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-4/audios/slide12/make-a-strong-impression.mp3'),
                ],
                [
                    'text' => 'Strategic networking',
                    'emoji' => '🎯',
                    'description' => 'Connecting with purpose',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-4/audios/slide12/strategic-networking.mp3'),
                ],
                [
                    'text' => 'Build rapport',
                    'emoji' => '🤝',
                    'description' => 'Develop a positive relationship',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-4/audios/slide12/build-rapport.mp3'),
                ],
                [
                    'text' => 'Follow up',
                    'emoji' => '📩',
                    'description' => 'Contact after meeting',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-4/audios/slide12/follow-up.mp3'),
                ],
                [
                    'text' => 'Insightful question',
                    'emoji' => '💡',
                    'description' => 'Demonstrates understanding',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-4/audios/slide12/insightful-question.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])