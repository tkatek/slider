<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'You strongly disagree with a respected colleague.',
        "You're asked an opinion on a topic you don't fully understand.",
        'A discussion becomes too emotional.',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])