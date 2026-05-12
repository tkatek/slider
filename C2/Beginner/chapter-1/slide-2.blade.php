<?php
$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Express complex opinions with clarity and depth.',
        ],
        [
            'label' => '',
            'text'  => 'Use advanced connectors and softening language.',
        ],
        [
            'label' => '',
            'text'  => 'Handle disagreement diplomatically.',
        ],
    ],
];
?>
@include('slider.objectives.objectives-numbered', ['content' => $content])