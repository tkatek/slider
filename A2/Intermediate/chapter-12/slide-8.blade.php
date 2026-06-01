<?php
$content = [
    'page_title' => 'Practice 2',
    'title'      => 'Practice 2',
    'subtitle'   => 'Match the gestures with their meanings',

    'pool_item_type'   => 'image',
    'image_text_style' => 'overlay',

    'categories' => [
        'Positive body language' => [
            'emoji' => '✅',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/smiling.webp'),
                    'text'  => 'Smiling',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/making-eye-contact.webp'),
                    'text'  => 'Making eye contact',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/shaking-hands-firmly.webp'),
                    'text'  => 'Shaking hands firmly',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/sitting-up-straight.webp'),
                    'text'  => 'Sitting up straight',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/paying-attention.webp'),
                    'text'  => 'Paying attention',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/nodding-your-head.webp'),
                    'text'  => 'Nodding your head',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/leaning-forward.webp'),
                    'text'  => 'Leaning forward',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/open-palms.webp'),
                    'text'  => 'Open palms',
                ],
            ],
        ],

        'Negative body language' => [
            'emoji' => '⚠️',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/staring.webp'),
                    'text'  => 'Staring',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/crossing-arms.webp'),
                    'text'  => 'Crossing arms',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/yawning.webp'),
                    'text'  => 'Yawning',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/slouching.webp'),
                    'text'  => 'Slouching',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/looking-down.webp'),
                    'text'  => 'Looking down',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/rubbing-your-nose.webp'),
                    'text'  => 'Rubbing your nose',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/frowning.webp'),
                    'text'  => 'Frowning',
                ],
                [
                    'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/head-in-hands.webp'),
                    'text'  => 'Head in hands',
                ],
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])