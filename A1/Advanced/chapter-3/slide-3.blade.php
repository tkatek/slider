<?php
$content = [
    'page_title'            => 'Warm-up:',
    'title'                 => 'Warm-up: Practice 1',
    'subtitle'              => 'Let’s remember some of the hotel vocabulary',
    'type'                  => 'image',
    'items_per_line'        => 4,
    'items_per_line_mobile' => 2,
    'categories'            => [
        'Lift' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/lift.webp'),
            'items' => ['Lift'],
        ],
        'Double room' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/double-room.webp'),
            'items' => ['Double room'],
        ],
        'Corridor' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/corridor.webp'),
            'items' => ['Corridor'],
        ],
        'Registration form' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/registration-form.webp'),
            'items' => ['Registration form'],
        ],
        'Towel' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/towel.webp'),
            'items' => ['Towel'],
        ],
        'Fitness center' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/fitness-center.webp'),
            'items' => ['Fitness center'],
        ],
        'Bathroom' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/bathroom.webp'),
            'items' => ['Bathroom'],
        ],
        'Blanket' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/blanket.webp'),
            'items' => ['Blanket'],
        ],
        'Parking place' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/parking-place.webp'),
            'items' => ['Parking place'],
        ],
        'Swimming pool' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/swimming-pool.webp'),
            'items' => ['Swimming pool'],
        ],
        'Pillow' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/pillow.webp'),
            'items' => ['Pillow'],
        ],
        'Toilet' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/toilet.webp'),
            'items' => ['Toilet'],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])