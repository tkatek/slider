<?php
$content = [
    'type' => 'type4',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '',
            'title' => "Identify the meanings of must be, might be, could be, may be, and can't be with 80% accuracy.",
            'subtitle' => '',
        ],
        [
            'emoji' => '',
            'title' => 'Use modal verbs of speculation correctly in controlled practice activities with 80% accuracy.',
            'subtitle' => '',
        ],
        [
            'emoji' => '',
            'title' => 'Make and justify at least three deductions about people or situations using visual clues.',
            'subtitle' => '',
        ],
        [
            'emoji' => '',
            'title' => 'Participate in discussions using modal verbs of speculation appropriately.',
            'subtitle' => '',
        ],
        [
            'emoji' => '',
            'title' => 'Write a short paragraph using at least four examples of modal verbs of speculation correctly.',
            'subtitle' => '',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])