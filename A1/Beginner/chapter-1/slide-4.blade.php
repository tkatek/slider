<?php
$content = [
    'page_title' => 'Slide 04 - Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, you will be able to:',

    'outcomes' => [
        [
            'label' => 'Greetings',
            'text'  => 'Say hello in formal and informal ways.',
        ],
        [
            'label' => 'Introductions',
            'text'  => 'Introduce yourself and others.',
        ],
        [
            'label' => 'Personal Details',
            'text'  => 'Ask and answer questions about personal details (for example, where you come from, what you do in your job, and different jobs).',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])
