<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Lesson Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to',
    'top_badge'  => '',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'       => '🚑',
            'badge'       => 'from-orange-500 to-orange-600',
            'title'       => 'Describe Problems & Accidents',
            'description' => 'Describe problems, accidents, and things that went wrong.',
        ],
        [
            'emoji'       => '⏰',
            'badge'       => 'from-amber-400 to-orange-500',
            'title'       => 'Use Past Simple',
            'description' => 'Use past simple for completed actions.',
        ],
        [
            'emoji'       => '🔄',
            'badge'       => 'from-orange-600 to-amber-500',
            'title'       => 'Use Past Continuous',
            'description' => 'Use past continuous for actions in progress.',
        ],
        [
            'emoji'       => '🔗',
            'badge'       => 'from-yellow-400 to-orange-400',
            'title'       => 'Combine Both Tenses',
            'description' => 'Combine past simple and past continuous, for example: “I was walking when I fell.”',
        ],
        [
            'emoji'       => '🪞',
            'badge'       => 'from-amber-500 to-orange-500',
            'title'       => 'Use Reflexive Pronouns',
            'description' => 'Use at least 2 reflexive pronouns correctly, such as myself and yourself.',
        ],
        [
            'emoji'       => '✍️',
            'badge'       => 'from-orange-500 to-amber-500',
            'title'       => 'Write About a Bad Day',
            'description' => 'Write a short paragraph (5–7 sentences) describing a bad day.',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])