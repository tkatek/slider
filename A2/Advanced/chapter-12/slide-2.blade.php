<?php

$content = [
    'page_title' => 'Learning Objectives',
    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Describe Common Roommate And Friendship Problems',
        ],
        [
            'label' => '',
            'text'  => 'Use Vocabulary For Complaints And Annoying Habits',
        ],
        [
            'label' => '',
            'text'  => 'Describe People’s Behaviour Using Adjectives',
        ],
        [
            'label' => '',
            'text'  => 'Use Always + Present Continuous To Express Annoyance',
        ],
        [
            'label' => '',
            'text'  => 'Express Opinions And Complaints About Shared Living',
        ],
        [
            'label' => '',
            'text'  => 'Role-play Everyday Roommate Situations Naturally',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])