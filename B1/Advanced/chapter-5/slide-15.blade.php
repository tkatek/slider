<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Choose the correct answer',
    'subtitle' => '',

    'questions' => [
        [
            'emoji' => '🥫',
            'prompt' => 'What happens to the metal cans?',
            'correct' => 'They are recycled.',
            'options' => [
                'They are thrown away.',
                'They are recycled.',
                'Employees take them home.',
            ],
        ],
        [
            'emoji' => '💡',
            'prompt' => 'Why do employees turn off the lights?',
            'correct' => 'To save money and reduce pollution.',
            'options' => [
                'To save money and reduce pollution.',
                'To keep the office cool.',
                'To help people sleep.',
            ],
        ],
        [
            'emoji' => '🍴',
            'prompt' => 'What has the company stopped using?',
            'correct' => 'Plastic cutlery',
            'options' => [
                'Glass cups',
                'Metal spoons',
                'Plastic cutlery',
            ],
        ],
        [
            'emoji' => '🚗',
            'prompt' => 'What is one benefit of carpooling?',
            'correct' => 'Employees reduce emissions and chat together.',
            'options' => [
                'People spend more money.',
                'Employees reduce emissions and chat together.',
                'Everyone drives separately.',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])