<?php
$content = [
    'page_title' => 'Slide 04 - Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, you will be able to',


    'outcomes' => [
        [
            'label' => 'Holiday Destinations',
            'text'  => 'Name at least 6 holiday destinations',
        ],
        [
            'label' => 'Holiday Names',
            'text'  => ' Name at least 6 different types of holidays',
        ],
        [
            'label' => 'Make A Conversation',
            'text'  => 'Talk about your travel plans',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])