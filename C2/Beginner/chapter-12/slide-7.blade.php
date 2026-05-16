<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => "Don't you think we should hurry?"],
        ['speaker' => 'B', 'text' => "I get your point, but I don't agree."],
        ['speaker' => 'A', 'text' => 'Why not?'],
        ['speaker' => 'B', 'text' => 'Because rushing might cause mistakes.'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => "I think it's better to slow down and check our work carefully."],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'Yes, taking a few extra minutes could actually save us time later.'],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])