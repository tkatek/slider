<?php
$content = [
    'type'            => 'reading',
    'page_title'      => 'Reading comprehension',
    'title'           => 'Reading comprehension',
    'subtitle'        => 'Read the text & answer the questions',
    'audio'           => '',

    'reading_title'   => 'Read the text and answer the questions.',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,

    'passage' => [
        'We need regular exercise to stay fit, but sometimes we are too busy studying. So, what can we do?',
        'We can walk more. For example, we can walk to school, walk during recess, or use the stairs instead of the elevator.',
        'We should also take breaks. If we sit for a long time, we should stand up and stretch. If we stand too long, we should sit and relax.',
        'These are simple ways to stay healthy even when we are busy.',
    ],

    'questions' => [
        [
            'prompt'  => 'What do you do to stay fit when you are busy?',
            'correct' => 'I walk more and use the stairs.',
            'options' => [
                'I watch TV all day.',
                'I walk more and use the stairs.',
                'I skip all physical activity.',
                'I only sleep more.',
            ],
        ],
        [
            'prompt'  => 'Why is it important to take breaks while studying?',
            'correct' => 'Because it helps our bodies stay healthy and avoid sitting too long.',
            'options' => [
                'Because breaks make us forget everything.',
                'Because it helps our bodies stay healthy and avoid sitting too long.',
                'Because we should never move while studying.',
                'Because studying is not important.',
            ],
        ],
        [
            'prompt'  => 'What is a good way to stay fit?',
            'correct' => 'Walking more',
            'options' => [
                'Watching TV',
                'Walking more',
                'Sleeping all day',
                'Eating candy',
            ],
        ],
        [
            'prompt'  => 'What should we do if we sit for a long time?',
            'correct' => 'Stand up and stretch',
            'options' => [
                'Sleep',
                'Run outside',
                'Stand up and stretch',
                'Eat food',
            ],
        ],
        [
            'prompt'  => 'What can we use instead of the elevator?',
            'correct' => 'Stairs',
            'options' => [
                'Car',
                'Bus',
                'Stairs',
                'Bike',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])