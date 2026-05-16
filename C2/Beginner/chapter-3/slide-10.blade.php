<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'Someone aggressively challenges your opinion.',
        'A debate becomes emotional.',
        'You realize your argument is weak mid-discussion.',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])