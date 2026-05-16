<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => 'Why were you late?'],
        ['speaker' => 'B', 'text' => 'Because the road was crowded very much.'],
        ['speaker' => 'A', 'text' => 'Hmm ... you mean the road was very crowded?'],
        ['speaker' => 'B', 'text' => "Yes! That's exactly what I meant."],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'I left early, but the traffic jam was worse than usual.'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => "I understand. I'll try to plan better next time."],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])