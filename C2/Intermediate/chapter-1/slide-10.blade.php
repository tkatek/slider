<?php

$content = [
    'title' => 'What Would You Do If?',

    'situations' => [
        'You forgot your return address on a package?',
        'The package is delayed in customs?',
        'The staff seems busy and impatient?',
    ],

    'instruction' => 'Practice: each student answers in 4-6 sentences, using natural fillers (Well ... , I guess ... ) and reactions.',
];

?>

@include('slider.C2.components.situation-response', ['content' => $content])