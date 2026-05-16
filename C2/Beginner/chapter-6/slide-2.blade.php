<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Express ideas persuasively in professional settings.',
        ],
        [
            'label' => '',
            'text'  => 'Influence opinions without sounding aggressive or pushy.',
        ],
        [
            'label' => '',
            'text'  => 'Use softening language to disagree diplomatically.',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])