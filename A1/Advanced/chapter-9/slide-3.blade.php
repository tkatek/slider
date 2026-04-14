<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Identify and name new places in the community (e.g., Islamic center, community garden, skate park, farmers’ market).',
        ],
        [
            'label' => '',
            'text'  => 'Understand the meaning and function of simple relative clauses using “where” to describe places.',
        ],
        [
            'label' => '',
            'text'  => 'Use relative clauses to describe places in the community.',
        ],
        [
            'label' => '',
            'text'  => 'Describe places in their community using simple sentences with “where.”',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])