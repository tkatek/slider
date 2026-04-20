<?php
$content = [
    'page_title'    => 'Practice 4',
    'title'         => 'Practice 4',
    'subtitle'      => 'Match the pictures with the right airport vocabulary',
    'type' => 'image',
    'items_per_line' => 5,
    'items_per_line_mobile' => 2,
    'categories' => [
        'fill up' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide8/fill-Up.webp'),
            'items' => ['fill up'],
        ],
        'full-serve' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide8/full-serve.webp'),
            'items' => ['full-serve'],
        ],
        'gas gauge' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide8/gaz-gauge.webp'),
            'items' => ['gas gauge'],
        ],
        'self-serve' => [
            'image' =>  materialAsset('slider/A1/Advanced/chapter-11/img/slide8/Self-serve.webp'),
            'items' => ['self-serve'],
        ],
        'gas cap' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide8/gaz-cap.webp'),
            'items' => ['gas cap'],
        ],
        'types of gas' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide8/types-gaze.webp'),
            'items' => ['types of gas'],
        ],
        'gas nozzle' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide8/gas-nozzle.webp'),
            'items' => ['gas nozzle'],
        ],
        'pump' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide8/pump.webp'),
            'items' => ['pump'],
        ],

    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])