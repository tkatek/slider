<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'       => '🔮',
            'title'       => 'Use “will / won’t”',
            'description' => 'to make simple predictions and express opinions about the future',
        ],
        [
            'emoji'       => '🔗',
            'title'       => 'Form and use the first conditional',
            'description' => 'to talk about real future situations and their results<br>If + present simple → will + base verb',
        ],
        [
            'emoji'       => '❓',
            'title'       => 'Understand and respond to questions about future events using:',
            'description' => 'What will happen if…?<br>Do you think… will…?',
        ],
        [
            'emoji'       => '🌍',
            'title'       => 'Use key vocabulary related to the future',
            'description' => 'environment, technology, life changes',
        ],
        [
            'emoji'       => '💬',
            'title'       => 'Participate in short discussions',
            'description' => 'by expressing predictions and possible results',
        ],
        [
            'emoji'       => '✍️',
            'title'       => 'Write simple sentences',
            'description' => 'combining ideas of cause and result using if and will',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])
