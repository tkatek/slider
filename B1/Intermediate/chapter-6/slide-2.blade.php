<?php
$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '📢',
            'title' => 'Understand and use key vocabulary related to advertising and consumer choices.',
        ],
        [
            'emoji' => '🎯',
            'title' => 'Identify the purpose and target audience of advertisements.',
        ],
        [
            'emoji' => '🧩',
            'title' => 'Use Present Simple Active and Passive Voice.',
        ],
        [
            'emoji' => '🛍️',
            'title' => 'Discuss shopping habits and explain buying decisions.',
        ],
        [
            'emoji' => '💬',
            'title' => 'Express opinions and support them with reasons.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write an 80–100 word paragraph about a product, advertisement, or shopping experience.',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])