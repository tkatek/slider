<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Task 3',
    'subtitle' => 'Choose the best answer for these questions.',

    'questions' => [
        [
            'emoji' => '🏭',
            'prompt' => 'What are some human activities that harm the environment?',
            'correct' => 'Deforestation, pollution, and excessive waste production',
            'options' => [
                'Recycling and planting trees',
                'Deforestation, pollution, and excessive waste production',
                'Using public transportation and solar energy',
                'Protecting wildlife and conserving water',
            ],
        ],
        [
            'emoji' => '♻️',
            'prompt' => 'What are the three Rs mentioned in the passage?',
            'correct' => 'Reduce, Reuse, Recycle',
            'options' => [
                'Reduce, Repair, Recycle',
                'Reduce, Reuse, Replace',
                'Reduce, Reuse, Recycle',
                'Remove, Recycle, Renew',
            ],
        ],
        [
            'emoji' => '💡',
            'prompt' => 'How can turning off lights help the environment?',
            'correct' => 'It conserves energy and reduces carbon emissions',
            'options' => [
                'It prevents water pollution',
                'It conserves energy and reduces carbon emissions',
                'It helps trees grow faster',
                'It increases air pollution',
            ],
        ],
        [
            'emoji' => '🌳',
            'prompt' => 'Why is planting trees important for the environment?',
            'correct' => 'Trees improve air quality and provide shelter for wildlife',
            'options' => [
                'Trees improve air quality and provide shelter for wildlife',
                'Trees produce more waste',
                'Trees use too much water',
                'Trees prevent recycling',
            ],
        ],
        [
            'emoji' => '💧',
            'prompt' => 'What should people do to protect water sources?',
            'correct' => 'Avoid wasting water and prevent pollution',
            'options' => [
                'Waste more water to clean rivers',
                'Dispose of harmful chemicals in water',
                'Avoid wasting water and prevent pollution',
                'Use plastic bottles to store river water',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])