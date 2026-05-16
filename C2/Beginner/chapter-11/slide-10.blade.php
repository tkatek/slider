<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'Someone asks for your opinion suddenly?',
        'You don\'t know the answer immediately?',
        'You realize mid-sentence that you disagree?',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])