<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        "You don't understand the bank fees?",
        'You forget a document needed to open an account?',
        'The clerk seems busy and impatient?',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... ,I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])