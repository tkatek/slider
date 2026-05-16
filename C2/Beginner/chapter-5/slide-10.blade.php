<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'You met a potential collaborator but forgot to ask for contact details.',
        'A connection hasn’t responded after a week.',
        'You want to propose a meeting without being pushy.',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])