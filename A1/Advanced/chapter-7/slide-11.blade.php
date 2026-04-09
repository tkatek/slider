<?php
$content = [
    'page_title'          => 'Practice 5',
    'title'               => 'Practice 5',
    'subtitle'            => 'Match the pictures with the right signs and notices',
    'type'                => 'image',
    'items_per_line'      => 4,
    'items_per_line_mobile' => 2,

    'categories' => [
        'Toilets' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/toilets.webp'),
            'items' => ['Toilets'],
        ],
        'No smoking' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/no-smoking.webp'),
            'items' => ['No smoking'],
        ],
        'Exit' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/exit.webp'),
            'items' => ['Exit'],
        ],
        'No parking' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/no-parking.webp'),
            'items' => ['No parking'],
        ],
        'Stairs' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/stairs.webp'),
            'items' => ['Stairs'],
        ],
        'Keep tidy' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/keep-tidy.webp'),
            'items' => ['Keep tidy'],
        ],
        'Bus stop' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/bus-stop.webp'),
            'items' => ['Bus stop'],
        ],
        'Fire exit' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/fire-exit.webp'),
            'items' => ['Fire exit'],
        ],
        'Wheelchair access' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/wheelchair-access.webp'),
            'items' => ['Wheelchair access'],
        ],
        'Switch off phones' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/switch-off-phones.webp'),
            'items' => ['Switch off phones'],
        ],
        'First aid' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/first-aid.webp'),
            'items' => ['First aid'],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])