<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, you will be able to',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Use basic airport vocabulary.',
        ],
        [
            'label' => '',
            'text'  => 'Understand simple check-in questions.',
        ],
        [
            'label' => '',
            'text'  => 'Respond to check-in staff confidently.',
        ],
        [
            'label' => '',
            'text'  => 'Role-play a check-in conversation.',
        ],
        [
            'label' => '',
            'text'  => 'Ask and answer simple airport questions.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])