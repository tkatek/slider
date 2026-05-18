<?php

$content = [
    'title' => 'Slang Time!',
    'subtitle' => '',
    'groups' => [
        [
            'key' => 'shipping-slang-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'All Set',
                    'emoji' => '✅',
                    'description' => 'Ready',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/all-set.mp3'),
                ],
                [
                    'text' => 'No Worries',
                    'emoji' => '🙂',
                    'description' => 'It’s Okay',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/no-worries.mp3'),
                ],
                [
                    'text' => 'On Track',
                    'emoji' => '📈',
                    'description' => 'Proceeding As Expected',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/on-track.mp3'),
                ],
                [
                    'text' => 'Take Care Of',
                    'emoji' => '🛠️',
                    'description' => 'Handle',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/take-care-of.mp3'),
                ],
                [
                    'text' => 'All Good',
                    'emoji' => '👍',
                    'description' => 'Everything Is Fine',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/all-good.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])