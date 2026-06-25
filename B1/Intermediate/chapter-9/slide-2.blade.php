<?php
$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, I can:',

    'objectives' => [
        [
            'emoji' => '👥',
            'title' => 'Talk about friends and friendships using appropriate vocabulary.',
        ],
        [
            'emoji' => '🌟',
            'title' => 'Describe a good friend using personality adjectives and relative clauses with who.',
        ],
        [
            'emoji' => '💙',
            'title' => 'Explain why a friendship is special and meaningful.',
        ],
        [
            'emoji' => '🗣️',
            'title' => 'Use friendship-related vocabulary and expressions accurately.',
        ],
        [
            'emoji' => '❓',
            'title' => 'Ask and answer questions about friendships and personal experiences.',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])