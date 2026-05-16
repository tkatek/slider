<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Stay composed in awkward or unexpected situations.',
        ],
        [
            'label' => '',
            'text'  => 'Use confident language to manage embarrassment.',
        ],
        [
            'label' => '',
            'text'  => 'Respond politely without losing credibility.',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])