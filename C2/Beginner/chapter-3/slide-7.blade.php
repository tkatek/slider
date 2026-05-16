<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => 'I believe remote work should be the future of employment.'],
        ['speaker' => 'B', 'text' => 'That’s an interesting stance. Could you explain your reasoning?'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'I see your point. Do you think it benefits both employees and employers?'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'Some people argue that remote work reduces teamwork and communication.'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'That’s a fair argument. So, would you say remote work increases productivity overall?'],
        ['speaker' => 'A', 'text' => '[answer]'],

        ['speaker' => 'B', 'text' => 'You explained your opinion very clearly. I understand your perspective now.'],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])