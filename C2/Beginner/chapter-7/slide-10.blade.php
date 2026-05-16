<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'You’re asked a question you’re not ready for.',
        'You feel nervous during a presentation.',
        'You disagree but don’t want to sound unsure.',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])