<?php

$content = [
    'type' => 'type2',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '❓',
            'title' => 'Recognize and respond to "What if...?" questions about hypothetical situations.',
        ],
        [
            'emoji' => '💭',
            'title' => 'Use the Second Conditional to talk about imaginary or unlikely situations.',
        ],
        [
            'emoji' => '💬',
            'title' => 'Express opinions and preferences using hypothetical language.',
        ],
        [
            'emoji' => '🔁',
            'title' => 'Ask and answer questions using the pattern If + past simple, would + base verb.',
        ],
        [
            'emoji' => '👥',
            'title' => 'Participate in pair or group discussions about imaginary scenarios.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write a short paragraph describing what they would do in a hypothetical situation, e.g., winning the lottery.',
        ],
    ],
];

?>

@include('slider.other.learning-objectives', ['content' => $content])