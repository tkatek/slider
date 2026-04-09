<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, you will be able to:',

    'outcomes' => [
        [
            'label' => 'Polite Requests',
            'text'  => 'Request hotel services using polite expressions.',
        ],
        [
            'label' => 'Listening for Details',
            'text'  => 'Identify specific information from a hotel conversation.',
        ],
        [
            'label' => 'Complaints',
            'text'  => 'Make and respond to complaints in a hotel setting.',
        ],
        [
            'label' => 'Hotel Vocabulary',
            'text'  => 'Use target vocabulary related to hotel services accurately.',
        ],
        [
            'label' => 'Formal Writing',
            'text'  => 'Write a short formal message to hotel reception (5–6 sentences).',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])