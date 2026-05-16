<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Follow up effectively after meetings or events.',
        ],
        [
            'label' => '',
            'text'  => 'Keep professional relationships active over time.',
        ],
        [
            'label' => '',
            'text'  => 'Use polite and persuasive language in written and spoken follow-ups.',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])
