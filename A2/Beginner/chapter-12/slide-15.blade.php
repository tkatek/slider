<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => 'Read & answer the questions:',
    'audio'           => null,
    'reading_title'   => 'The Perfect Dish',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,

    'passage' => [
        'A perfect dish has food from different food groups. It helps your body stay healthy and strong. First, your plate should have grains like rice or pasta. These foods give you energy. You should have a good amount of grains.',
        'Next, add vegetables and fruits. They are very important because they have vitamins, minerals, and fiber. Try to eat many colors like green, red, and orange. You also need protein. You can eat chicken, fish, eggs, or beans. Protein helps your body grow and repair muscles.',
        'Don’t forget dairy like yogurt or cheese. These foods are good for your bones and teeth. Finally, use only a little fat or sugar. Too much of these is not healthy. A perfect dish is colorful, balanced, and includes a little from each food group',

    ],

    'questions' => [
        [
            'prompt'  => 'A perfect dish has only one food group.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'Vegetables have vitamins and fiber.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'We should eat a lot of sugar.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'What do grains give you?',
            'correct' => 'Energy',
            'options' => [
                'Vitamins',
                'Energy',
                'Calcium',
                'Sugar',
            ],
        ],
        [
            'prompt'  => 'Which food is a protein?',
            'correct' => 'Chicken',
            'options' => [
                'Apple',
                'Rice',
                'Chicken',
                'Milk',
            ],
        ],
        [
            'prompt'  => 'Name one dairy food.',
            'correct' => 'yogurt',
            'options' => [
                'yogurt',
                'chicken',
            ],
        ],
        [
            'prompt'  => 'What makes a dish perfect?',
            'correct' => 'It is balanced and has food from different food groups',
            'options' => [
                'It is balanced and has food from different food groups',
                'It has only sugar and fat',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])