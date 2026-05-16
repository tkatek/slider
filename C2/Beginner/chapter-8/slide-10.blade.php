<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'Someone misquotes you in a meeting.',
        'You accidentally interrupt someone important.',
        'A colleague asks a personal question unexpectedly.',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])