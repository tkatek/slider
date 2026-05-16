<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Disagree confidently without sounding rude or defensive.',
        ],
        [
            'label' => '',
            'text'  => 'Use soft but strong language to express opposition.',
        ],
        [
            'label' => '',
            'text'  => 'Avoid over-apologizing or weakening their opinion.',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])