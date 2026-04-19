<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of this lesson, students will be able to:',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => 'Talk about past holiday experiences using the past simple',
            'description' => '',
        ],
        [
            'number' => '02',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Use regular and irregular verbs to describe past actions',
            'description' => '(went, stayed, visited, swam)',
        ],
        [
            'number' => '03',
            'badge'  => 'from-fuchsia-500 to-violet-500',
            'title'  => 'Use was / were to describe past situations and feelings',
            'description' => '',
        ],
        [
            'number' => '04',
            'badge'  => 'from-pink-500 to-rose-500',
            'title'  => 'Form and use negative sentences:',
            'description' => 'didn’t + base verb (I didn’t go)<br>wasn’t / weren’t (It wasn’t fun)',
        ],
        [
            'number' => '05',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Form and answer questions using:',
            'description' => 'Did + subject + base verb<br>Was / Were + subject',
        ],
        [
            'number' => '06',
            'badge'  => 'from-cyan-500 to-blue-500',
            'title'  => 'Ask and answer questions about holidays',
            'description' => '',
        ],
        [
            'number' => '07',
            'badge'  => 'from-pink-500 to-rose-500',
            'title'  => 'Write a short paragraph (4–5 sentences) about a past holiday',
            'description' => '',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])
