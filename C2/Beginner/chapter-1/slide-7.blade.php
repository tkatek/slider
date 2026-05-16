<?php

$content = [
    'title'       => 'Practice 2',
    'subtitle'    => 'Dialogue Practice',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => 'Do you think technology improves communication?'],
        ['speaker' => 'B', 'text' => '[Write your answer]'],

        ['speaker' => 'A', 'text' => 'That’s an interesting way to look at it. Do you think social media plays a [word] role in this?'],
        ['speaker' => 'B', 'text' => 'Definitely. It helps people stay connected, but sometimes conversations become more [adjective].'],

        ['speaker' => 'A', 'text' => 'I agree. Face-to-face communication still feels more [adjective] to me.'],
        ['speaker' => 'B', 'text' => 'Exactly. Technology is useful, but we need to use it [adverb].'],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])