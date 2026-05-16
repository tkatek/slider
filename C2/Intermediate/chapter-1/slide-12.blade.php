<?php

$content = [
    'page_title' => '',
    'title' => 'Slang Time!',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'shipping-slang-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'No Worries',
                    'emoji' => '🙂',
                    'description' => 'It’s Okay',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/no-worries.mp3'),
                ],
                [
                    'text' => 'Handle With Care',
                    'emoji' => '📦',
                    'description' => 'Be Careful',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/handle-with-care.mp3'),
                ],
                [
                    'text' => 'On Time',
                    'emoji' => '⏰',
                    'description' => 'Delivered As Expected',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/on-time.mp3'),
                ],
                [
                    'text' => 'Check It Out',
                    'emoji' => '🔍',
                    'description' => 'Look At It / Verify',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/check-it-out.mp3'),
                ],
                [
                    'text' => 'All Set',
                    'emoji' => '✅',
                    'description' => 'Ready',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-10/audios/slide12/all-set.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])