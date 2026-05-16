<?php

$content = [
    'page_title' => 'Learning Outcomes',
    'title'      => 'Learning Outcomes',
    'subtitle'   => 'By the end of this session, students will:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Approach professionals confidently in any setting.',
        ],
        [
            'label' => '',
            'text'  => 'Maintain and nurture long-term professional relationships.',
        ],
        [
            'label' => '',
            'text'  => 'Use persuasive and polite language to influence conversations.',
        ],
    ],
];

?>

@include('slider.objectives.objectives-numbered', ['content' => $content])