<?php
$content = [
    'page_title'    => 'Practice 3',
    'title'         => 'Practice 3',
    'subtitle'      => 'Appearance: Drag & drop each word under each picture.',
    'type'          => 'image',
    'items_per_line' => 4,
    'items_per_line_mobile' => 2,

    'categories' => [
        'afro hairstyle' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide8/afro-hairstyle.webp'),
            'items' => ['afro hairstyle'],
        ],
        'dyed blue hair' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide8/dyed-blue-hair.webp'),
            'items' => ['dyed blue hair'],
        ],
        'shaved head' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide8/shaved-head.webp'),
            'items' => ['shaved head'],
        ],
        'old' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide8/old.webp'),
            'items' => ['old'],
        ],
        'dark hair' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide8/dark-hair.webp'),
            'items' => ['dark hair'],
        ],
        'tall' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide8/tall.webp'),
            'items' => ['tall'],
        ],
        'blond hair' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide8/blond-hair.webp'),
            'items' => ['blond hair'],
        ],
        'ginger hair' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide8/ginger-hair.webp'),
            'items' => ['ginger hair'],
        ],
        'young' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide8/young.webp'),
            'items' => ['young'],
        ],
        'short' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide8/short.webp'),
            'items' => ['short'],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])