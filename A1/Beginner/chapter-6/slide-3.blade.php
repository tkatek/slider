<?php
$content = [
    'page_title'    => 'Learning Objectives',
    'title'         => 'Learning Objectives',
    'subtitle'      => 'By the end of the lesson, students will be able to:',
    'objectives'    => [
        ['icon' => '🗣️', 'text' => 'Talk about their daily routines using the simple present tense.'],
        ['icon' => '🏃‍♂️', 'text' => 'Use common daily action verbs.'],
        ['icon' => '📅', 'text' => 'Use frequency adverbs (always, sometimes).'],
        ['icon' => '⏰', 'text' => 'Tell the time.'],
        ['icon' => '❓', 'text' => 'Ask and answer simple questions about daily routines and time.'],
    ],
    'button'        => 'Start Lesson',
];
?>

@include('slider.objectives.objectives-icons', ['content' => $content])