<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Use humor appropriately in professional and social situations.',
        ],
        [
            'label' => '',
            'text'  => 'Defuse tension without offending anyone.',
        ],
        [
            'label' => '',
            'text'  => 'Maintain confidence while making jokes.',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])