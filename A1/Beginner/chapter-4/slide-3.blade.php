<?php
$content = [
    'page_title'    => 'Lesson Objectives',
    'title'         => 'Lesson Objectives',
    'subtitle'      => 'By the end of the lesson, students will be able to:',
    'objectives'    => [
        ['icon' => '👨‍👩‍👧‍👦', 'text' => 'Identify and use basic family vocabulary (mother, father, sister).'],
        ['icon' => '🔤',        'text' => 'Use possessive adjectives (my, your, his, her) correctly in simple sentences.'],
        ['icon' => '📏',        'text' => 'Describe family members using simple physical adjectives (tall, short, young, old).'],
    ],
    'button'        => 'Start Lesson',
];
?>
@include('slider.objectives.objectives-icons', ['content' => $content])
