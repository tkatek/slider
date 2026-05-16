<?php

$content = [
    'page_title' => 'Learning Objectives',
    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Describe Problems With Products Or Services',
        ],
        [
            'label' => '',
            'text'  => 'Make Complaints Politely In Shops Or Restaurants',
        ],
        [
            'label' => '',
            'text'  => 'Ask For Help Or Solutions',
        ],
        [
            'label' => '',
            'text'  => 'Use Customer Service Vocabulary',
        ],
        [
            'label' => '',
            'text'  => 'Role-play Customer Complaint Situations',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])