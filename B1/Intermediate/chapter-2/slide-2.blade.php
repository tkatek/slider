<?php
$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '✅',
            'title' => 'Understand and identify past modals of deduction.',
        ],
        [
            'emoji' => '✅',
            'title' => "Use must have, might have, could have and can't have to make speculations about past events.",
        ],
        [
            'emoji' => '✅',
            'title' => 'Listen for and recognize past speculation in conversations.',
        ],
        [
            'emoji' => '✅',
            'title' => 'Discuss possible explanations for past situations.',
        ],
        [
            'emoji' => '✅',
            'title' => 'Write a short paragraph using past modals of deduction accurately.',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])