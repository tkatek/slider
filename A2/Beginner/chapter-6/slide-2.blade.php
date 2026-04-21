<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => 'Describe a memorable day using simple past tense',
            'description' => '(4–5 sentences)',
        ],
        [
            'number' => '02',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Use common past simple verbs to talk about past events',
            'description' => '(regular & irregular)',
        ],
        [
            'number' => '03',
            'badge'  => 'from-fuchsia-500 to-violet-500',
            'title'  => 'Use sequence words to organize a short story',
            'description' => '(first, then, after that, finally)',
        ],
        [
            'number' => '04',
            'badge'  => 'from-pink-500 to-rose-500',
            'title'  => 'Use “used to / didn’t use to” to describe past habits',
            'description' => '',
        ],
        [
            'number' => '05',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Ask and answer simple questions about past experiences',
            'description' => '(Did / Was / Were)',
        ],
        [
            'number' => '06',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => 'Write a short guided paragraph about a past experience',
            'description' => '',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])
