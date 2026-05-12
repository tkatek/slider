<?php
$content = [
    'page_title' => 'Practice 1',
    'title' => 'Practice 1: Warm-up',
    'subtitle' => 'Drag & drop each picture in the right column',
    'pool_item_type' => 'image',
    'desktop_game_width' => 53,
    'desktop_pool_width' => 47,
    'items_per_line' => 3,
    'items_per_line_mobile' => 2,

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