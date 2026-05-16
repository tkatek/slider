<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'Your idea is rejected in a meeting.',
        'A colleague strongly disagrees with you.',
        'You want to influence a decision without authority.',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])