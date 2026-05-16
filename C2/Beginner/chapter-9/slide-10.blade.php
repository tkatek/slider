<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'You make a small mistake in front of colleagues.',
        'A tense discussion arises in a meeting.',
        'Someone teases you in a friendly way.',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])