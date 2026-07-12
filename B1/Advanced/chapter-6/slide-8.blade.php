<?php

$content = [
    'title' => 'Practice 3',
    'subtitle' => '',
    'activity_title' => 'Match the Vocabulary to Its Definition',
    'left_label' => 'Vocabulary',
    'right_label' => 'Definition',

    'pairs' => [
        [
            'id' => 'wildlife',
            'left' => [
                'type' => 'word',
                'text' => '1. Wildlife',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. Animals living in their natural environment.',
            ],
        ],
        [
            'id' => 'damage',
            'left' => [
                'type' => 'word',
                'text' => '2. Damage',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'F. Harm or injury caused to something.',
            ],
        ],
        [
            'id' => 'require',
            'left' => [
                'type' => 'word',
                'text' => '3. Require',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. To need something or make something necessary.',
            ],
        ],
        [
            'id' => 'conserve_energy',
            'left' => [
                'type' => 'word',
                'text' => '4. Conserve energy',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'G. To save electricity or use less energy.',
            ],
        ],
        [
            'id' => 'carbon_emissions',
            'left' => [
                'type' => 'word',
                'text' => '5. Carbon emissions',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'H. Gases released into the air that contribute to climate change.',
            ],
        ],
        [
            'id' => 'solar_power',
            'left' => [
                'type' => 'word',
                'text' => '6. Solar power',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. Energy produced from the sun.',
            ],
        ],
        [
            'id' => 'wind_power',
            'left' => [
                'type' => 'word',
                'text' => '7. Wind power',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'J. Energy produced by the movement of wind.',
            ],
        ],
        [
            'id' => 'absorb',
            'left' => [
                'type' => 'word',
                'text' => '8. Absorb',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'I. To take in or soak up a gas or liquid.',
            ],
        ],
        [
            'id' => 'raise_awareness',
            'left' => [
                'type' => 'word',
                'text' => '9. Raise awareness',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. To make people know more about an important issue.',
            ],
        ],
        [
            'id' => 'deforestation',
            'left' => [
                'type' => 'word',
                'text' => '10. Deforestation',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. The cutting down of large areas of trees.',
            ],
        ],
    ],

    'right_order' => [
        'solar_power',
        'raise_awareness',
        'wildlife',
        'require',
        'deforestation',
        'damage',
        'conserve_energy',
        'carbon_emissions',
        'absorb',
        'wind_power',
    ],
];

?>

@include('slider.game.matching-pairs', ['content' => $content])