<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'React naturally in conversations without pausing to translate',
        ],
        [
            'label' => '',
            'text'  => 'Use short, native-like reactions instead of long explanations',
        ],
        [
            'label' => '',
            'text'  => 'Avoid over-formal or "textbook" responses',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])