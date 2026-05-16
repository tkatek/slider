<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => "Can you tell me what's inside the package?"],
        ['speaker' => 'B', 'text' => "It's books and a few personal items."],

        ['speaker' => 'A', 'text' => 'Great. How much does it weigh?'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => 'Perfect. That will be $35 for express delivery.'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => 'Do you need insurance for the package?'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => 'Alright, it will be delivered within 2 business days.'],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])