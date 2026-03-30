<?php
$content = [
    'page_title' => 'Practice 5',
    'title' => 'Practice 5',
    'subtitle' => 'Match the pictures with the right travel activity',
    'type' => 'image',
    'items_per_line' => 4,
    'items_per_line_mobile' => 2,
    'categories' => [
        'Go sightseeing' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/go-sightseeing.webp'),
            'items' => ['Go sightseeing'],
        ],
        'Go shopping' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/go-shopping.webp'),
            'items' => ['Go shopping'],
        ],
        'Sunbathe on the beach' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/sunbathe-on-the-beach.webp'),
            'items' => ['Sunbathe on the beach'],
        ],
        'Go swimming' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/go-swimming.webp'),
            'items' => ['Go swimming'],
        ],
        'Buy souvenirs' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/buy-souvenirs.webp'),
            'items' => ['Buy souvenirs'],
        ],
        'Have a picnic' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/have-a-picnic.webp'),
            'items' => ['Have a picnic'],
        ],
        'Take photos' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/take-photos.webp'),
            'items' => ['Take photos'],
        ],
        'Build a sandcastle' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/build-a-sandcastle.webp'),
            'items' => ['Build a sandcastle'],
        ],
        'Walk by the sea' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide12/walk-by-the-sea.webp'),
            'items' => ['Walk by the sea'],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])
