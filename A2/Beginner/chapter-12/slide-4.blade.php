<?php
$content = [
    'page_title' => 'Practice 1',
    'title' => 'Practice 1: Warm-up',
    'subtitle' => 'Drag & drop each picture in the right column',

    'pool_item_type' => 'image',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    | We force the 1280x800 "sm/tablet-style" layout on all non-mobile screens.
    | Mobile stays controlled by items_per_line_mobile.
    */
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'items_per_line_mobile' => 1,
    'items_per_line_tablet' => 2,

    // Keep desktop behaving like the mid/sm layout
    'items_per_line' => 2,
    'items_per_line_wide' => 2,

    'initial_visible_slots' => 2,
    'category_content_grid_class' => 'grid-cols-2',

    // Pool layout like the 1280x800 screenshot
    'tablet_pool_columns' => 5,
    'tablet_pool_tile_max_width' => '104px',

    // IMPORTANT: force the sm stacked layout on all screens except mobile
    'mid_screen_stack_layout' => true,
    'mid_screen_stack_max_width' => '9999px',

    'categories' => [
        'Carbohydrates' => [
            'emoji' => '🍞',
            'items' => [
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Spaghetti.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Bread.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Cereal.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Rice.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Potatoes.webp'),
            ],
        ],

        'Fruit and vegetables' => [
            'emoji' => '🥦',
            'items' => [
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Peach.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Peas.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Cucumber.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Broccoli.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Pepper.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Carrot.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Banana.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Sprouts.webp'),
            ],
        ],

        'Protein' => [
            'emoji' => '🍗',
            'items' => [
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Eggs.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Baked-beans.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Fish.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Ham.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Roast-chicken.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Sausages.webp'),
            ],
        ],

        'Dairy' => [
            'emoji' => '🥛',
            'items' => [
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Cheese.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Yoghurt.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Butter.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Milk.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/custard.webp'),
            ],
        ],

        'Fats and oils' => [
            'emoji' => '🫒',
            'items' => [
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Vegetable-oil.webp'),
                materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Olive-oil.webp'),
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])