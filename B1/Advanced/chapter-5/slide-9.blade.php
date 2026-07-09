<?php

$content = [
    'title' => 'Practice 3',
    'subtitle' => '',
    'activity_title' => 'Match each word (1–12) with its correct definition (A–L).',
    'left_label' => 'Words',
    'right_label' => 'Definitions',

    'pairs' => [
        [
            'id' => 'precious',
            'left' => [
                'type' => 'word',
                'text' => '1. precious',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'I. very valuable and important to protect',
            ],
        ],
        [
            'id' => 'climate-change',
            'left' => [
                'type' => 'word',
                'text' => '2. climate change',
            ],
            'right' => [
                'type' => 'word',
                'text' => "D. long-term changes in the Earth’s weather patterns",
            ],
        ],
        [
            'id' => 'environmental-threats',
            'left' => [
                'type' => 'word',
                'text' => '3. environmental threats',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'H. problems or dangers that harm the environment',
            ],
        ],
        [
            'id' => 'visible',
            'left' => [
                'type' => 'word',
                'text' => '4. visible',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. able to be seen or noticed clearly',
            ],
        ],
        [
            'id' => 'air-pollution',
            'left' => [
                'type' => 'word',
                'text' => '5. air pollution',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. harmful substances in the air that damage health and the environment',
            ],
        ],
        [
            'id' => 'plastic-waste',
            'left' => [
                'type' => 'word',
                'text' => '6. plastic waste',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'J. plastic materials that are thrown away and pollute the environment',
            ],
        ],
        [
            'id' => 'energy-consumption',
            'left' => [
                'type' => 'word',
                'text' => '7. energy consumption',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. the amount of energy used by people or machines',
            ],
        ],
        [
            'id' => 'carbon-footprint',
            'left' => [
                'type' => 'word',
                'text' => '8. carbon footprint',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'G. the total amount of greenhouse gases caused by our actions',
            ],
        ],
        [
            'id' => 'effective',
            'left' => [
                'type' => 'word',
                'text' => '9. effective',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'L. successful in achieving the desired result',
            ],
        ],
        [
            'id' => 'keep-the-air-clean',
            'left' => [
                'type' => 'word',
                'text' => '10. keep (the air) clean',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'K. to make sure the air is free from pollution and harmful gases',
            ],
        ],
        [
            'id' => 'renewable-energy',
            'left' => [
                'type' => 'word',
                'text' => '11. renewable energy',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'F. energy from natural sources that can be replaced and used again',
            ],
        ],
        [
            'id' => 'reliance',
            'left' => [
                'type' => 'word',
                'text' => '12. reliance',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. the state of needing or depending on something',
            ],
        ],
    ],

    'right_order' => [
        'reliance',
        'air-pollution',
        'visible',
        'climate-change',
        'energy-consumption',
        'renewable-energy',
        'carbon-footprint',
        'environmental-threats',
        'precious',
        'plastic-waste',
        'keep-the-air-clean',
        'effective',
    ],
];

?>

@include('slider.game.matching-pairs', ['content' => $content])