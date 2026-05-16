<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'Someone interrupts you while disagreeing.',
        'Your opinion is unpopular in the group.',
        'Someone gets defensive when you disagree.',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])