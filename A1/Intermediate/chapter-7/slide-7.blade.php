<?php
$content = [
    'type' => 'reading',
    'page_title'    => 'Reading Comprehension',
    'title'         => 'Reading Comprehension',
    'subtitle'      => 'Read the passage, then answer one question at a time.',
    'reading_title' => 'My Next Summer Holiday Plan',
    'reading_align' => 'left',
    'reading_plain' => true,
    'reading_compact' => true,

    'passage' => [
        "I usually teach English at a language school in the summer. I am very busy, so I don’t enjoy the summer.",
        "This summer, I am not going to work. I’m going to have a real holiday.",
        "I’m going to buy a campervan and travel around Ireland. I’m going to visit beautiful beaches and learn to surf.",
        "I’m mostly going to travel alone, but I will visit my friends.",
        "My friend Cathy is a teacher. She has a long summer holiday, so we will spend one or two weeks together.",
        "My other friend, Joe, has a new house. I will stay with him for a few days and help him paint his house.",
    ],

    'questions' => [
        [
            'prompt'  => 'What does the writer usually do in the summer?',
            'correct' => 'Teaches English',
            'options'  => [
                'Travels to Ireland',
                'Teaches English',
                'Learns to surf',
            ],
        ],
        [
            'prompt'  => 'What is the writer going to do this summer?',
            'correct' => 'Have a holiday',
            'options'  => [
                'Work at a school',
                'Stay at home',
                'Have a holiday',
            ],
        ],
        [
            'prompt'  => 'Where is the writer going to travel?',
            'correct' => 'Ireland',
            'options'  => [
                'Spain',
                'Ireland',
                'France',
            ],
        ],
        [
            'prompt'  => 'How will the writer travel?',
            'correct' => 'By campervan',
            'options'  => [
                'By plane',
                'By campervan',
                'By train',
            ],
        ],
        [
            'prompt'  => 'Who has a new house?',
            'correct' => 'Joe',
            'options'  => [
                'Cathy',
                'Joe',
                'The teacher',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
