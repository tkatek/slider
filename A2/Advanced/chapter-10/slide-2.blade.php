<?php

$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of this lesson, students will be able to',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'outcomes' => [
        [
            'emoji'  => '🏠',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => 'Neighbour Problems',
            'description' => 'Describe common problems with neighbours.',
        ],
        [
            'emoji'  => '💬',
            'badge'  => 'from-violet-500 to-violet-600',
            'title'  => 'Polite Complaints',
            'description' => 'Make simple complaints politely and respond to them.',
        ],
        [
            'emoji'  => '🔊',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => 'Apartment Vocabulary',
            'description' => 'Use vocabulary related to noise and apartment problems.',
        ],
        [
            'emoji'  => '✋',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Annoying Behaviour',
            'description' => 'Ask someone to stop or change annoying behaviour.',
        ],
        [
            'emoji'  => '🛠️',
            'badge'  => 'from-rose-500 to-pink-500',
            'title'  => 'Simple Solutions',
            'description' => 'Suggest simple solutions to neighbourhood problems.',
        ],
        [
            'emoji'  => '✍️',
            'badge'  => 'from-indigo-500 to-sky-500',
            'title'  => 'Complaint Note',
            'description' => 'Write a short note to a neighbour complaining about an issue.',
        ],
    ],
];

?>

@include('slider.objectives.objectives', ['content' => $content])