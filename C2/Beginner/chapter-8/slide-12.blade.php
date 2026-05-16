<?php

$content = [
    'page_title' => '',
    'title' => 'Slang time!',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'handling-awkwardness-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Stay composed',
                    'emoji' => '🧘',
                    'description' => 'Keep calm under pressure',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide12/stay-composed.mp3'),
                ],
                [
                    'text' => 'Regain control',
                    'emoji' => '🎯',
                    'description' => 'Take charge of conversation',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide12/regain-control.mp3'),
                ],
                [
                    'text' => 'Handle gracefully',
                    'emoji' => '🤝',
                    'description' => 'Respond politely and tactfully',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide12/handle-gracefully.mp3'),
                ],
                [
                    'text' => 'Turn around awkwardness',
                    'emoji' => '🔄',
                    'description' => 'Transform embarrassment into confidence',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide12/turn-around-awkwardness.mp3'),
                ],
                [
                    'text' => 'Maintain credibility',
                    'emoji' => '✅',
                    'description' => 'Appear professional and reliable',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide12/maintain-credibility.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])