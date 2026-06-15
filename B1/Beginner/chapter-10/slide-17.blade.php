<?php
$content = [
    'type' => 'reading',

    'page_title' => 'Reading Comprehension',
    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Read & answer the questions',

    'reading_title' => 'Who Had Owned It? What Had They Done?',

    'passage' => [
        "The Smith family had never owned a car until they bought their first automobile in 1906. Before they bought it, they had only used horses and a buggy for transportation. They had never owned anything so expensive before they bought the car.",

        "The Smith family was very excited about their automobile. The children had never ridden in an automobile before their parents purchased the car. They had only seen a few automobiles when they went to town for supplies. But nobody they knew had ever owned an automobile before that day. They felt very lucky.",
    ],

    'questions' => [
        [
            'prompt'  => 'What had the Smith family used for transportation before they bought their first car?',
            'correct' => 'They had only used horses and a buggy for transportation.',
            'options' => [
                'They had only used trains for transportation.',
                'They had only used horses and a buggy for transportation.',
                'They had only used motorcycles for transportation.',
            ],
        ],
        [
            'prompt'  => 'Had the children ever ridden in an automobile before their parents purchased the car?',
            'correct' => 'No, they had never ridden in a car before.',
            'options' => [
                'Yes, they had ridden in a car before.',
                'No, they had never ridden in a car before.',
            ],
        ],
        [
            'prompt'  => 'When had they seen other automobiles?',
            'correct' => 'When they went to town for supplies.',
            'options' => [
                'When they went to town for supplies.',
                'When they were outside of their house.',
                "When they were at their uncle's house.",
            ],
        ],
        [
            'prompt'  => 'How many automobiles had they seen before their parents purchased the car?',
            'correct' => 'They had seen a few automobiles.',
            'options' => [
                'They had seen just one.',
                'They had seen many automobiles.',
                'They had seen a few automobiles.',
            ],
        ],
        [
            'prompt'  => 'Did they know someone who had owned a car before that day?',
            'correct' => 'Nobody they knew.',
            'options' => [
                'Nobody they knew.',
                'Someone they knew.',
                'Many people they knew.',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])