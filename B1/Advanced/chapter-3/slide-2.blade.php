<?php

$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, I can...',

    'objectives' => [
        [
            'emoji' => '🧩',
            'title' => 'Use past modals of deduction to explain what probably happened.',
        ],
        [
            'emoji' => '🔮',
            'title' => 'Use expressions of certainty and possibility to make predictions.',
        ],
        [
            'emoji' => '💬',
            'title' => 'Justify my ideas using clues and evidence.',
        ],
        [
            'emoji' => '🤝',
            'title' => 'Discuss different explanations and predictions with my classmates.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write a short mystery report using language from both lessons.',
        ],
    ],
];

?>

@include('slider.other.learning-objectives', ['content' => $content])