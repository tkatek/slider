<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => 'It was great meeting you at the conference.'],
        ['speaker' => 'B', 'text' => 'Likewise! Here’s my LinkedIn.'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'I look forward to staying in touch and sharing ideas.'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'Absolutely. Let’s schedule a call next week to discuss potential collaboration.'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'Perfect! I’ll send you an email to confirm the time.'],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])