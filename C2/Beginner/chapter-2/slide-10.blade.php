<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'Someone challenges your opinion publicly.',
        "You're asked to explain a belief you never questioned before.",
        'You disagree but want to stay professional.',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])