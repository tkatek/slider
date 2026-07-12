<?php

$content = [
    'title'      => 'Speaking',
    'subtitle'   => 'Turn over a card, read the question and answer using to + infinitive',
    'card_label' => '',
    'example'    => 'Why do we save water? → To protect natural resource',

    'card_type'  => 'image',

    'cards' => [
        [
            'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide15/recycle-paper.webp'),
            'sentence' => 'Why do people recycle paper?',
        ],
        [
            'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide15/plant-more-trees.webp'),
            'sentence' => 'Why should we plant more trees?',
        ],
        [
            'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide15/turn-off-lights.webp'),
            'sentence' => 'Why do we turn off the lights?',
        ],
        [
            'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide15/public-transportation.webp'),
            'sentence' => 'Why do people use public transportation?',
        ],
        [
            'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide15/reusable-bags.webp'),
            'sentence' => 'Why should we use reusable bags?',
        ],
        [
            'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide15/solar-power.webp'),
            'sentence' => 'Why do people choose solar power?',
        ],
        [
            'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide15/protect-forests.webp'),
            'sentence' => 'Why should we protect forests?',
        ],
        [
            'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide15/save-water.webp'),
            'sentence' => 'Why do we save water?',
        ],
        [
            'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide15/climate-change-awareness.webp'),
            'sentence' => 'Why do people raise awareness about climate change?',
        ],
        [
            'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide15/walk-or-ride-bike.webp'),
            'sentence' => 'Why should we walk or ride a bike?',
        ],
        [
            'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide15/recycle-plastic-bottles.webp'),
            'sentence' => 'Why do people recycle plastic bottles?',
        ],
        [
            'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide15/help-the-environment.webp'),
            'sentence' => 'Why should everyone help the environment?',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])