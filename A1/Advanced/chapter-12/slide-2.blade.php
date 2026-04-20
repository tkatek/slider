<?php
$content = [

    'page_title' => 'Learning Objectives',
    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'outcomes' => [
        [
            'label' => 'Phone Vocabulary',
            'text'  => 'Identify basic mobile phone vocabulary (smartphone, data, plan, etc.)',
        ],
        [
            'label' => 'Asking Questions',
            'text'  => 'Ask about phone options using simple questions',
        ],
        [
            'label' => 'Making Comparisons',
            'text'  => 'Compare phones and plans using comparatives (cheaper, better, bigger)',
        ],
        [
            'label' => 'Functional Language',
            'text'  => 'Use functional language to buy and set up a phone',
        ],
        [
            'label' => 'Role-Play',
            'text'  => 'Participate in a simple role-play in a shop',
        ]
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])


