<?php
$content = [
    'title' => 'Practice 7',
    'subtitle' => 'Ways to protect the environment',
    'pool_item_type' => 'image',


    'categories' => [
        'Walk instead of take the car' => [
            'emoji' => '🚶',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Advanced/chapter-5/img/slide21/walk-instead-of-take-the-car.webp'),
                    'text'  => '',
                ],
            ],
        ],
        'Recycle rubbish' => [
            'emoji' => '♻️',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Advanced/chapter-5/img/slide21/recycle-rubbish.webp'),
                    'text'  => '',
                ],
            ],
        ],
        'Keep the beach clean' => [
            'emoji' => '🏖️',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Advanced/chapter-5/img/slide21/keep-the-beach-clean.webp'),
                    'text'  => '',
                ],
            ],
        ],
        'Turn out the lights' => [
            'emoji' => '💡',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Advanced/chapter-5/img/slide21/turn-out-the-lights.webp'),
                    'text'  => '',
                ],
            ],
        ],
        'Plant trees' => [
            'emoji' => '🌳',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Advanced/chapter-5/img/slide21/plant-trees.webp'),
                    'text'  => '',
                ],
            ],
        ],
        'Pick up litter' => [
            'emoji' => '🗑️',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Advanced/chapter-5/img/slide21/pick-up-litter.webp'),
                    'text'  => '',
                ],
            ],
        ],
        "Don't waste water" => [
            'emoji' => '🚰',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Advanced/chapter-5/img/slide21/dont-waste-water.webp'),
                    'text'  => "",
                ],
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])