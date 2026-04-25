<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'       => '🔮',
            'title'       => 'Use different future forms',
            'description' => 'going to, will, present continuous, and present simple to talk about plans and arrangements',
        ],
        [
            'emoji'       => '❓',
            'title'       => 'Ask and answer questions about personal future plans using:',
            'description' => 'What are you going to do next?<br>Where are you going to…?<br>How old will you be next year?',
        ],
        [
            'emoji'       => '🧳',
            'title'       => 'Use relevant vocabulary',
            'description' => 'university, job, travel, study, plans',
        ],
        [
            'emoji'       => '💬',
            'title'       => 'Produce simple spoken exchanges',
            'description' => 'about future plans in pairs or small groups',
        ],
        [
            'emoji'       => '✍️',
            'title'       => 'Write a short, coherent paragraph',
            'description' => '4–6 sentences describing their own future plans using correct sentence structure',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])
