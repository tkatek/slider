<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Describe their neighbourhood.',
        ],
        [
            'label' => '',
            'text'  => 'Use new vocabulary related to places and accommodation.',
        ],
        [
            'label' => '',
            'text'  => 'Use adjectives to describe an area.',
        ],
        [
            'label' => '',
            'text'  => 'Use simple phrases to talk about where they live.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])