<?php
$content = [
    'page_title'            => 'Packing Items',
    'title'                 => 'What should you pack?',
    'subtitle'              => 'Drag the word to the correct picture',
    'type'                  => 'image',
    'items_per_line'        => 4,
    'items_per_line_mobile' => 2,

    'categories' => [
        'water bottle' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-9/img/packing/water-bottle.webp'),
            'items' => ['water bottle'],
        ],
        'socks' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-9/img/packing/socks.webp'),
            'items' => ['socks'],
        ],
        'camera' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-9/img/packing/camera.webp'),
            'items' => ['camera'],
        ],
        'flip flops' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-9/img/packing/flip-flops.webp'),
            'items' => ['flip flops'],
        ],
        'swim mask' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-9/img/packing/swim-mask.webp'),
            'items' => ['swim mask'],
        ],
        'sandals' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-9/img/packing/sandals.webp'),
            'items' => ['sandals'],
        ],
        'trainers' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-9/img/packing/trainers.webp'),
            'items' => ['trainers'],
        ],
        'scarf' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-9/img/packing/scarf.webp'),
            'items' => ['scarf'],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])