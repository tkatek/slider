<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => 'This report is late again!'],
        ['speaker' => 'B', 'text' => 'Looks like my calendar is playing hide and seek.'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => "Don't worry, I'm already working on it and fixing the final details."],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => "Yes, I'll send it to you before the end of the day."],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'Deal! I promise no more calendar problems after today.'],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])