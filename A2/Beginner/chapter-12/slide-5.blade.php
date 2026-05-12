<?php
$content = [
    'video'     => materialAsset('slider/A2/Beginner/chapter-12/video/food-groups.mp4'),
    'thumbnail' => materialAsset('slider/A2/Beginner/chapter-12/img/slide5.webp'),
    'isQuiz'    => 0,

    'questions' => [
        [
            'time' => 79500,
            'type' => 'multiple_choice',
            'question' => 'What are fruits and vegetables rich in?',
            'options' => [
                'Sugar only',
                'Vitamins, minerals, and fiber',
                'Fat only',
                'Salt',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 79800,
            'type' => 'multiple_choice',
            'question' => 'What does fiber help with?',
            'options' => [
                'Sleeping',
                'Digestion',
                'Hearing',
                'Running fast',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 84200,
            'type' => 'multiple_choice',
            'question' => 'Which nutrient helps your body fight illness?',
            'options' => [
                'Vitamins',
                'Sugar',
                'Salt',
                'Oil',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 93600,
            'type' => 'multiple_choice',
            'question' => 'What do minerals help with?',
            'options' => [
                'Watching TV',
                'Keeping the body healthy',
                'Playing games',
                'Driving',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 104500,
            'type' => 'multiple_choice',
            'question' => 'Which food group gives you many vitamins and minerals?',
            'options' => [
                'Sweets',
                'Fast food',
                'Fruits and vegetables',
                'Chips',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end' => 10,
            'text' => 'Eating a variety of foods from all five food groups is important for good health because it ensures that you get a wide range of nutrients that are important for your body.',
        ],
        [
            'start' => 10.5,
            'end' => 13.5,
            'text' => 'Let’s take a closer look at all five food groups.',
        ],
        [
            'start' => 14,
            'end' => 27,
            'text' => 'First is grains. Bread, cereal, pasta, rice, and other grains like oats and barley are all grains. They contain carbohydrates which are your body and brain’s main source of energy.',
        ],
        [
            'start' => 27,
            'end' => 46.5,
            'text' => 'Second is protein. Meat, fish, eggs, tofu, beans, and nuts and seeds are all protein foods. Proteins are necessary to build and repair muscle, skin, hair, and organs. Protein is also important to keep your immune system healthy and to make hormones like insulin.',
        ],
        [
            'start' => 47,
            'end' => 57,
            'text' => 'Third is vegetables. Carrots, peppers, broccoli, cabbage, beets, and dark leafy greens like kale are all examples of vegetables.',
        ],
        [
            'start' => 57,
            'end' => 73,
            'text' => 'Fourth is fruits. Apples, oranges, berries, mango, and pineapple are all examples of fruits. Both fruits and vegetables are low in calories and packed with vitamins and minerals and fiber.',
        ],
        [
            'start' => 73,
            'end' => 79,
            'text' => 'They’re essential for the health of your digestive system and immune system and can help you maintain a healthy weight.',
        ],
        [
            'start' => 80,
            'end' => 83.5,
            'text' => 'Try to eat a range of colors of fruits and vegetables every day.',
        ],
        [
            'start' => 84.5,
            'end' => 93,
            'text' => 'And finally, dairy. Milk, cheese, and yogurt contain protein and calcium, which are important for strong bones and teeth.',
        ],
        [
            'start' => 94,
            'end' => 104,
            'text' => 'So, to provide your body with all the nutrients it needs, eat foods from all five food groups every day: grains, protein, vegetables, fruit, and dairy.',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])