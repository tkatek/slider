<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => 'Are you sure this is the right decision?'],
        ['speaker' => 'B', 'text' => 'Yes ... after careful thinking and analysis-'],
        ['speaker' => 'A', 'text' => 'Hmm.'],
        ['speaker' => 'B', 'text' => 'Sorry. Let me say that more clearly. I think it is the right decision.'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => "Because the data supports it, and we've already tested similar options before."],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => "Yes, there are some risks, but we have a backup plan if things don't work out."],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => "I'm confident. We just need to monitor the results closely."],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])