<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, you will be able to:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Use security vocabulary (belt, scanner, laptop, liquids, etc.).',
        ],
        [
            'label' => '',
            'text'  => 'Understand and follow security instructions.',
        ],
        [
            'label' => '',
            'text'  => 'Respond politely to security officers.',
        ],
        [
            'label' => '',
            'text'  => 'Role-play a full security conversation.',
        ],
        [
            'label' => '',
            'text'  => 'Ask and answer simple questions at security.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])