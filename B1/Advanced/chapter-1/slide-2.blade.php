<?php

$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, I can...',

    'objectives' => [
        [
            'emoji' => '🔍',
            'title' => 'Identify clues that help explain what happened.',
        ],
        [
            'emoji' => '💬',
            'title' => 'Use must have, might have, could have, and can\'t have to make guesses about past events.',
        ],
        [
            'emoji' => '🗣️',
            'title' => 'Explain my ideas using evidence from a text or picture.',
        ],
        [
            'emoji' => '🤝',
            'title' => 'Discuss different theories with my classmates and listen to their opinions.',
        ],
        [
            'emoji' => '🎯',
            'title' => 'Choose the most likely explanation and explain why I think it is correct.',
        ],
        [
            'emoji' => '📢',
            'title' => 'Present my group\'s solution to a mystery using the target grammar.',
        ],
    ],
];

?>

@include('slider.other.learning-objectives', ['content' => $content])