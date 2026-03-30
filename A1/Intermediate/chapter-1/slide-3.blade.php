<?php
$content = [
    'page_title'    => 'Learning Objectives',
    'title'         => 'Learning Objectives',
    'subtitle'      => 'By the end of the lesson, students will be able to',
    'objectives'    => [
        ['icon' => '🏅', 'text' => 'I can name different sports and sports events.'],
        ['icon' => '⚽', 'text' => 'I can talk about the sports I like and don’t like.'],
        ['icon' => '💬', 'text' => 'I can ask someone, “Do you like…?”'],
        ['icon' => '🔁', 'text' => 'I can say how often I watch sports (always, sometimes, never).'],
        ['icon' => '🎟️', 'text' => 'I can invite someone to a sports event.'],
        ['icon' => '👍', 'text' => 'I can respond to an invitation (Yes, I’d love to / Sorry, I can’t).'],
        ['icon' => '🗨️', 'text' => 'I can have a short conversation about going to a sports game.'],
    ],
    'button'        => 'Start Lesson',
];
?>
@include('slider.objectives.objectives-icons', ['content' => $content])