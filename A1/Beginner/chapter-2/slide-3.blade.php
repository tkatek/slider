<?php
    $content = [
        'page_title' => 'Lesson Objectives',
        'title' => 'Lesson Objectives',
        'subtitle' => 'By the end of the lesson, you can:',
        'objectives' => [
            [
                'icon' => '📝',
                'text' => 'Fill in a simple form',
            ],
            [
                'icon' => '📄',
                'text' => 'Write a very simple resume',
            ],
        ],
        'button' => 'Start Lesson',
    ];
?>

@include('slider.objectives.objectives-icons', ['content' => $content])