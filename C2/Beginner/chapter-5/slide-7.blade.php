<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => 'Hi, Anna. It was great meeting you at the conference yesterday.'],
        ['speaker' => 'B', 'text' => 'Thank you, Merna! I enjoyed our conversation about sustainable projects.'],
        ['speaker' => 'A', 'text' => 'I’d love to continue our discussion — perhaps a call next week?'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => 'Great. I’ll send you a calendar invite with a few time options.'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => 'Also, I’ll share the report I mentioned during our talk.'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => 'Looking forward to staying in touch and exploring possible collaboration.'],
        ['speaker' => 'B', 'text' => '[answer]'],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])