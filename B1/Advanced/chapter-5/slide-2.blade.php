<?php

$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '🌱',
            'title' => 'Identify and describe practical ways to protect the environment.',
        ],
        [
            'emoji' => '🎧',
            'title' => 'Understand the main ideas and specific details in a listening text about environmental solutions.',
        ],
        [
            'emoji' => '♻️',
            'title' => 'Use environmental vocabulary, collocations, and expressions related to sustainability and green living accurately in context.',
        ],
        [
            'emoji' => '📊',
            'title' => 'Use comparative and superlative adjectives to compare environmental actions and solutions.',
        ],
        [
            'emoji' => '💬',
            'title' => 'Discuss and recommend environmentally friendly habits using appropriate language and supporting reasons.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write a short paragraph describing personal actions they can take to protect the environment, using lesson vocabulary and target grammar.',
        ],
    ],
];

?>

@include('slider.other.learning-objectives', ['content' => $content])