<?php
$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Analyse ideas instead of giving surface opinions.',
        ],
        [
            'label' => '',
            'text'  => 'Justify opinions with clear reasons and examples.',
        ],
        [
            'label' => '',
            'text'  => 'Use advanced reasoning phrases naturally.',
        ],
    ],
];
?>
@include('slider.objectives.objectives-numbered', ['content' => $content])