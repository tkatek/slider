<?php
$content = [
    'page_title'    => 'Practice 5',
    'title'         => 'Practice 5',
    'subtitle'      => 'Match the word with the right picture',
    'type'          => 'image',
    'items_per_line' => 4,
    'items_per_line_mobile' => 2,

    'categories' => [
        'deep fried' => [
            'image' => materialAsset('slider/A2/Beginner/chapter11/img/slide14/deep-fried.webp'),
            'items' => ['Deep fried'],
        ],
        'grilled' => [
            'image' => materialAsset('slider/A2/Beginner/chapter11/img/slide14/grilled.webp'),
            'items' => ['Grilled'],
        ],
        'steamed' => [
            'image' => materialAsset('slider/A2/Beginner/chapter11/img/slide14/steamed.webp'),
            'items' => ['Steamed'],
        ],
        'roast' => [
            'image' => materialAsset('slider/A2/Beginner/chapter11/img/slide14/roasted.webp'),
            'items' => ['Roast'],
        ],
        'stirred fried' => [
            'image' => materialAsset('slider/A2/Beginner/chapter11/img/slide14/stirred-fried.webp'),
            'items' => ['Stirred fried'],
        ],
        'pan fried' => [
            'image' => materialAsset('slider/A2/Beginner/chapter11/img/slide14/pan-fried.webp'),
            'items' => ['Pan fried'],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])