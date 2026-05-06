<?php
$content = [
    'page_title' => 'Practice 5',
    'title' => 'Practice 5',
    'subtitle' => '',
    'activity_title' => 'Match each unusual job (1–4) with the correct definition (A–D).',

    'pairs' => [
        [
            'id' => 'professional-sleeper',
            'left' => [
                'type' => 'word',
                'text' => '1. Professional Sleeper',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. A person who is hired to sleep in different beds and test how comfortable they are.',
            ],
        ],
        [
            'id' => 'pet-food-taster',
            'left' => [
                'type' => 'word',
                'text' => '2. Pet Food Taster',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. A person who is paid to eat and test pet food to make sure it tastes good and is safe for animals.',
            ],
        ],
        [
            'id' => 'water-slide-tester',
            'left' => [
                'type' => 'word',
                'text' => '3. Water Slide Tester',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. A person who travels to water parks and rides slides to check their safety, speed, and fun level.',
            ],
        ],
        [
            'id' => 'professional-mourner',
            'left' => [
                'type' => 'word',
                'text' => '4. Professional Mourner',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. A person who is paid to cry and show sadness at funerals to help the family mourn.',
            ],
        ],
    ],

    'right_order' => [
        'pet-food-taster',
        'professional-sleeper',
        'professional-mourner',
        'water-slide-tester',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])