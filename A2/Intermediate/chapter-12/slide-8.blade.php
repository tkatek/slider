<?php
$content = [
    'page_title' => 'Practice 2',
    'title' => 'Practice 2',
    'subtitle' => 'Match the gestures with their meanings',

    /*
    |--------------------------------------------------------------------------
    | Drag item type
    |--------------------------------------------------------------------------
    | Use one of these:
    | - text              = drag words / phrases
    | - image             = drag images only
    | - image-with-label  = drag image cards with text under each image
    */
    'drag_item_type' => 'image-with-label',

    // Old compatibility keys. Older slides can still use these.
    'pool_item_type' => 'image',
    'show_pool_item_labels' => true,

    /*
    |--------------------------------------------------------------------------
    | Responsive controls
    |--------------------------------------------------------------------------
    | This version follows the previous sticky UX:
    | - mobile/tablet: fixed bottom tray with next/previous controls
    | - laptop/desktop: sticky side tray
    */
    'pool_grid_class' => 'grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-8 2xl:grid-cols-10',
    'category_grid_class' => 'grid-cols-1 md:grid-cols-2',
    'slot_grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4',

    'mobile_pool_visible_cap' => 4,
    'tablet_pool_visible_cap' => 6,

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

@include('slider.game.drag-and-drop-v2', ['content' => $content])
