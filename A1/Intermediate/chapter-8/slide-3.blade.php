<?php
$content = [
    'page_title'    => 'Learning Objectives',
    'title'         => 'Learning Objectives',
    'subtitle'      => 'By the end of this lesson, you will be able to',
    'objectives'    => [
        ['icon' => '️️💬', 'text' => 'Use common travel words (ticket, hotel, flight, passport, price).'],
        ['icon' => '📋️', 'text' => 'Ask simple questions to book a trip.'],
        ['icon' => '📅', 'text' => 'Answer basic questions about dates, prices, and destinations.'],
        ['icon' => '💬', 'text' => 'Understand the main information in a short travel booking conversation.'],
        ['icon' => '🔮', 'text' => 'Use “going to” to talk about my travel plans.'],
        ['icon' => '✍️', 'text' => 'Use “Write 3–4 simple sentences about a future trip.'],
    ],
    'button'        => 'Start Lesson',
];
?>

@include('slider.objectives.objectives-icons', ['content' => $content])