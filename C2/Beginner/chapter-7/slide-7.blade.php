<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => 'What’s your opinion on this proposal?'],
        ['speaker' => 'B', 'text' => 'That’s a great question. Let me think for a moment.'],
        ['speaker' => 'A', 'text' => 'Sure.'],
        ['speaker' => 'B', 'text' => 'From what I’ve seen so far, it has strong potential.'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'One of its strengths is that it targets a wider audience without increasing costs.'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'Yes, the timeline might be tight, but with careful planning, it’s manageable.'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'Exactly! A pilot will help us evaluate results and reduce risks before full implementation.'],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])