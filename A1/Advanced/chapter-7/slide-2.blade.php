<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Identify at least five common public signs.',
        ],
        [
            'label' => '',
            'text'  => 'Explain the meaning of three short written notices.',
        ],
        [
            'label' => '',
            'text'  => 'Match signs to the correct meaning with accuracy.',
        ],
        [
            'label' => '',
            'text'  => 'Write two simple sentences that describe what a sign means.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])