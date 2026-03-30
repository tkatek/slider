<?php
$content = [
    'page_title' => 'Practice 3',
    'title' => 'Practice 3',
    'subtitle' => 'Drag the sentence to the correct picture',
    'type' => 'image',
    'items_per_line' => 3,
    'items_per_line_wide' => 4,
    'items_per_line_mobile' => 2,
    'desktop_grid_breakpoint' => '768px',
    'category_max_width' => 'max-w-[1120px]',
    'desktop_grid_max_width' => '1120px',
    'mobile_pool_safe_space' => '320px',
    'mobile_layout_bottom_offset' => '18px',
    'categories' => [
        'Retirement' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide7/retirement.webp'),
            'items' => ['Retirement'],
        ],
        'Graduation' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide7/graduation.webp'),
            'items' => ['Graduation'],
        ],
        'Birth of a baby' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide7/birth-baby.webp'),
            'items' => ['Birth of a baby'],
        ],
        'Wedding anniversary' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide7/wedding-anniversary.webp'),
            'items' => ['Wedding anniversary'],
        ],
        'Engagement' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide7/engagement.webp'),
            'items' => ['Engagement'],
        ],
        'Wedding' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide7/wedding-reception.webp'),
            'items' => ['Wedding'],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])
