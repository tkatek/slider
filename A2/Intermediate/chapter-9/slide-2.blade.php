<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'       => '📅',
            'title'       => 'Use the present continuous',
            'description' => 'am / is / are + verb-ing<br>to talk about future arrangements',
        ],
        [
            'emoji'       => '❓',
            'title'       => 'Ask and answer questions',
            'description' => 'about planned arrangements using:<br>What are you doing…?<br>Who are you meeting…?<br>Where are you going…?',
        ],
        [
            'emoji'       => '⏰',
            'title'       => 'Use time expressions',
            'description' => 'with future arrangements, such as:<br>tonight, tomorrow, this weekend, at 5 p.m.',
        ],
        [
            'emoji'       => '💬',
            'title'       => 'Understand and respond to conversations',
            'description' => 'about arrangements in everyday situations',
        ],
        [
            'emoji'       => '🤝',
            'title'       => 'Participate in short conversations',
            'description' => 'to make and discuss plans with others',
        ],
        [
            'emoji'       => '✍️',
            'title'       => 'Write simple sentences',
            'description' => 'describing future arrangements using the present continuous',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])