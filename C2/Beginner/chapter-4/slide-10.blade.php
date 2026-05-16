<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'You meet a senior professional at a conference and feel nervous.',
        'Someone forgets to give you their contact information.',
        'You want to suggest collaboration but don’t want to seem pushy.',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])