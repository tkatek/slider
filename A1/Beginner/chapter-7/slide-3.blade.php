<?php
$content = [
    'page_title' => 'Slide 04 - Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, you will be able to:',


    'outcomes' => [
        [
            'label' => 'Community Places',
            'text'  => 'Identify key places like the bank, library, and park.',
        ],
        [
            'label' => 'Asking Questions',
            'text'  => 'Ask for and give directions using “Where is…?”.',
        ],
        [
            'label' => 'Simple Directions',
            'text'  => 'Use directional phrases and different prepositions (e.g., “next to”) to describe locations.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])


