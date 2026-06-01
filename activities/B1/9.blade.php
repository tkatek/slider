<?php
$content = [
    'page_title' => 'Introducing Yourself',
    'title'      => 'Introducing Yourself',
    'subtitle'   => '',
    'instruction' => '',
    'box_label' => 'Question',

    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 3,
            'md'   => 4,
            'lg'   => 5,
        ],

    ],

    'items' => [
        'What are you going to do after class?',
        'Why are you studying English?',
        "What's your favourite means of transport? Why?",
        "What's your favourite movie? Why?",
        'Tell us two things you are afraid of.',
        'What do you like about Christmas?',
        'What did you do yesterday afternoon?',
        'Tell us two things you love and why.',
        'Tell us two things you hate and why.',
        'Which country would you like to visit?',
        'Which famous person would you like to meet?',
        'Are you more energetic in the morning or in the evening? Why?',
        'Are you good at organising your time?',
        "What's your favourite subject at school?",
        "What's your favourite activity on a Sunday?",
        'What do you do in your free time?',
        'Tell me about your family.',
    ],
];
?>

@include("slider.game.warming-up", ['content' => $content])
