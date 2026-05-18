<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => "Hello, I sent a package last week and it hasn't arrived."],
        ['speaker' => 'B', 'text' => 'Could you give me the tracking number?'],

        ['speaker' => 'A', 'text' => "Yes, it's 987654321."],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => 'I see. Could you estimate when it might arrive?'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => '[answer]'],
        ['speaker' => 'B', 'text' => "Absolutely. You'll receive an email as soon as it clears customs."],

        ['speaker' => 'A', 'text' => '[answer]'],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])