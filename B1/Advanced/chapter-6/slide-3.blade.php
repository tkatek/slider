<?php

$content = [
    'type' => 'emoji',

    'title'    => 'Warm Up: Practice 1',
    'subtitle' => 'Choose the best option to complete each sentence',

    'questions' => [
        [
            'emoji' => '🌍',
            'prompt' => 'Climate change causes long-term changes in the Earth’s __________.',
            'correct' => 'weather patterns',
            'options' => [
                'air pollution',
                'weather patterns',
                'energy consumption',
            ],
        ],
        [
            'emoji' => '🏭🚗',
            'prompt' => 'Factories and cars are major sources of __________.',
            'correct' => 'air pollution',
            'options' => [
                'visible',
                'air pollution',
                'reliance',
            ],
        ],
        [
            'emoji' => '🧴🛍️',
            'prompt' => 'Throwing plastic bottles and bags away creates __________.',
            'correct' => 'plastic waste',
            'options' => [
                'plastic waste',
                'renewable energy',
                'visible',
            ],
        ],
        [
            'emoji' => '💡💧',
            'prompt' => 'Using less electricity and water lowers our __________.',
            'correct' => 'carbon footprint',
            'options' => [
                'carbon footprint',
                'climate change',
                'environmental threats',
            ],
        ],
        [
            'emoji' => '☀️🌬️',
            'prompt' => 'Choosing solar or wind power is an example of __________.',
            'correct' => 'renewable energy',
            'options' => [
                'renewable energy',
                'air pollution',
                'visible',
            ],
        ],
        [
            'emoji' => '⚠️',
            'prompt' => '__________ are problems or dangers that harm the environment.',
            'correct' => 'Environmental threats',
            'options' => [
                'Environmental threats',
                'Effective',
                'Reliance',
            ],
        ],
        [
            'emoji' => '🗑️',
            'prompt' => 'Please __________ in the park and put it in the bin.',
            'correct' => 'pick up litter',
            'options' => [
                'pick up litter',
                'energy consumption',
                'keep the air clean',
            ],
        ],
        [
            'emoji' => '🌊🌿',
            'prompt' => 'We shouldn’t __________ clean air and fresh water.',
            'correct' => 'take for granted',
            'options' => [
                'take for granted',
                'rely on',
                'keep (the air) clean',
            ],
        ],
        [
            'emoji' => '🌳🚌',
            'prompt' => 'Planting trees and using public transport are __________ ways to help the planet.',
            'correct' => 'effective',
            'options' => [
                'effective',
                'visible',
                'reliance',
            ],
        ],
        [
            'emoji' => '🌎',
            'prompt' => 'The future of our planet depends on our __________ on clean and safe resources.',
            'correct' => 'reliance',
            'options' => [
                'reliance',
                'climate change',
                'carbon footprint',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])