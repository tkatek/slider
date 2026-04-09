<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, you will be able to:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Identify and use common bus station vocabulary such as ticket, platform, departure, arrival, and schedule.',
        ],
        [
            'label' => '',
            'text'  => 'Ask present simple questions about bus schedules and destinations.',
        ],
        [
            'label' => '',
            'text'  => 'Form present simple questions correctly using do and does.',
        ],
        [
            'label' => '',
            'text'  => 'Read and understand a simple bus schedule.',
        ],
        [
            'label' => '',
            'text'  => 'Have a short conversation at a bus station.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])