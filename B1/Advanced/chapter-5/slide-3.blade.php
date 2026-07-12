<?php

$content = [
    'type'       => 'image',
    'title'      => 'Warm up: Practice 1',
    'subtitle'   => 'Choose the correct answer',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.6,

    'questions' => [
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-5/img/slide3/deforestation.webp'),
            'prompt'  => 'Many animals are losing their homes because of ______.',
            'correct' => 'deforestation',
            'options' => [
                'renewable energy',
                'deforestation',
                'carbon footprint',
            ],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-5/img/slide3/air-pollution.webp'),
            'prompt'  => 'Factories and cars release harmful gases that cause ______.',
            'correct' => 'air pollution',
            'options' => [
                'air pollution',
                'drought',
                'recycling',
            ],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-5/img/slide3/renewable-energy.webp'),
            'prompt'  => 'We should use solar and wind power because they are forms of ______.',
            'correct' => 'renewable energy',
            'options' => [
                'fossil fuels',
                'greenhouse gases',
                'renewable energy',
            ],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-5/img/slide3/carbon-footprint.webp'),
            'prompt'  => 'People can reduce their ______ by walking, cycling, or using public transport.',
            'correct' => 'carbon footprint',
            'options' => [
                'ecosystem',
                'weather pattern',
                'carbon footprint',
            ],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-5/img/slide3/adapt-to.webp'),
            'prompt'  => 'Many plants and animals are struggling to ______ the changing climate.',
            'correct' => 'adapt to',
            'options' => [
                'release',
                'adapt to',
                'trap',
            ],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-5/img/slide3/take-action.webp'),
            'prompt'  => 'Governments and communities must ______ to protect the environment.',
            'correct' => 'take action',
            'options' => [
                'spread',
                'prioritize',
                'take action',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])