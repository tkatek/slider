<?php
$content = [
    'type' => 'type3',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '',
            'title' => 'Define empathy.',
        ],
        [
            'emoji' => '',
            'title' => 'Identify examples of empathetic behaviour in everyday situations.',
        ],
        [
            'emoji' => '️',
            'title' => "Use empathy-related vocabulary, expressions, and should/shouldn't accurately in speaking and writing, and infer how people may feel in different situations and respond appropriately.",
        ],
        [
            'emoji' => '️',
            'title' => 'Write an 80–100-word paragraph showing empathy toward someone in a real-life situation.',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])