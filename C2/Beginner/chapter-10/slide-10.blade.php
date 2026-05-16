<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'You know the grammar, but people look confused?',
        'You panic and start translating mid-sentence?',
        'Someone corrects your sentence casually?',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])