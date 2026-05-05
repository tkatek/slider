<?php
$content = [
    'page_title' => 'Practice 2',
    'title' => 'Practice 2',
    'subtitle' => 'Match the gestures with their meanings',
    'pool_item_type' => 'image',
    'desktop_game_width' => 55,
    'desktop_pool_width' => 45,

    'categories' => [
        'Positive body language' => [
            'emoji' => '✅',
            'items' => [
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/smiling.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/making-eye-contact.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/shaking-hands-firmly.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/sitting-up-straight.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/paying-attention.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/nodding-your-head.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/leaning-forward.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/open-palms.webp'),
            ],
        ],

        'Negative body language' => [
            'emoji' => '⚠️',
            'items' => [
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/staring.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/crossing-arms.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/yawning.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/slouching.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/looking-down.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/rubbing-your-nose.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/frowning.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/head-in-hands.webp'),
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])