<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => "Good morning, I'd like to open a savings account."],
        ['speaker' => 'B', 'text' => 'Sure! Do you have an ID and proof of address?'],

        ['speaker' => 'A', 'text' => 'Yes, here they are.'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => 'Yes, please. How long does it take to arrive?'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => '[answer]'],
        ['speaker' => 'B', 'text' => "Absolutely. I'll help you register for internet and mobile banking now."],

        ['speaker' => 'A', 'text' => '[answer]'],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])