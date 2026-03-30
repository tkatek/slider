<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Understand basic boarding announcements.',
        ],
        [
            'label' => '',
            'text'  => 'Show and respond to boarding instructions.',
        ],
        [
            'label' => '',
            'text'  => 'Identify seat numbers (window, aisle, middle).',
        ],
        [
            'label' => '',
            'text'  => 'Ask simple questions about seats.',
        ],
        [
            'label' => '',
            'text'  => 'Follow instructions from flight attendants.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])