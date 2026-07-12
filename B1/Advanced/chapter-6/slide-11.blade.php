<?php

$content = [
    'title' => 'Practice 3',
    'subtitle' => '',
    'activity_title' => 'Match the Sentence to Its Purpose',
    'left_label' => 'Sentence',
    'right_label' => 'Purpose',

    'pairs' => [
        [
            'id' => 'public_transportation',
            'left' => [
                'type' => 'word',
                'text' => '1. We use public transportation to get to work. 🚌',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. To reduce carbon emissions. CO₂',
            ],
        ],
        [
            'id' => 'turn_off_lights',
            'left' => [
                'type' => 'word',
                'text' => '2. She turned off the lights when leaving the room. 💡',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. To save energy and reduce electricity use. ⚡',
            ],
        ],
        [
            'id' => 'compost_food_scraps',
            'left' => [
                'type' => 'word',
                'text' => '3. We compost food scraps in our backyard. ♻️',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. To reduce waste and help the soil. ♻️',
            ],
        ],
        [
            'id' => 'planted_trees',
            'left' => [
                'type' => 'word',
                'text' => '4. They planted trees in the community. 🌳',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. To grow food and help the environment. 🥕',
            ],
        ],
        [
            'id' => 'reusable_water_bottle',
            'left' => [
                'type' => 'word',
                'text' => '5. I bring a reusable water bottle to school. 🚰',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. To reduce plastic use and avoid waste. 🚫',
            ],
        ],
    ],

    'right_order' => [
        'planted_trees',
        'public_transportation',
        'compost_food_scraps',
        'turn_off_lights',
        'reusable_water_bottle',
    ],
];

?>

@include('slider.game.matching-pairs', ['content' => $content])