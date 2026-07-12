<?php

$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, students will be able to',

    'objectives' => [
        [
            'emoji' => '🏪',
            'title' => 'Identify and categorize at least 10 vocabulary items related to everyday services and service providers.',
        ],
        [
            'emoji' => '🎧',
            'title' => 'Extract the main idea and identify specific details from a listening or reading text about everyday services.',
        ],
        [
            'emoji' => '🧩',
            'title' => 'Form affirmative, negative, and interrogative sentences using the causative (have/get something done) with at least 80% accuracy.',
        ],
        [
            'emoji' => '💬',
            'title' => 'Ask and answer questions about everyday services using the target grammar in a pair-work conversation.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Produce a short spoken or written description of personal experiences using the causative and appropriate service-related vocabulary.',
        ],
    ],
];

?>

@include('slider.other.learning-objectives', ['content' => $content])