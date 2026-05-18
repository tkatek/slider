<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'Your package is delayed and the clerk seems busy?',
        'You accidentally wrote the wrong address?',
        'You need urgent delivery but forgot to ask for express initially?',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... ,I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])