<?php
$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'useful-justification-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'The main reason is ...',
                    'emoji' => '🎯',
                    'description' => 'Giving justification',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-2/audios/slide5/the-main-reason-is.mp3'),
                ],
                [
                    'text' => 'This is because ...',
                    'emoji' => '💡',
                    'description' => 'Explaining',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-2/audios/slide5/this-is-because.mp3'),
                ],
                [
                    'text' => 'One example is ...',
                    'emoji' => '📌',
                    'description' => 'Supporting ideas',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-2/audios/slide5/one-example-is.mp3'),
                ],
                [
                    'text' => 'On the other hand ...',
                    'emoji' => '⚖️',
                    'description' => 'Presenting contrast',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-2/audios/slide5/on-the-other-hand.mp3'),
                ],
                [
                    'text' => 'That being said ...',
                    'emoji' => '🔄',
                    'description' => 'Soft transition',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-2/audios/slide5/that-being-said.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])