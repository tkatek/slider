<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => 'I think we should consider a different marketing strategy.'],
        ['speaker' => 'B', 'text' => 'I’m not sure — it might be risky.'],
        ['speaker' => 'A', 'text' => 'I understand your concern, but based on recent data, this approach could increase engagement.'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => 'We tested a similar idea last quarter, and the results were quite positive.'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => 'Of course. I’ll prepare a detailed plan with clear goals and timelines.'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => 'If it performs well, we can expand the strategy gradually.'],
        ['speaker' => 'B', 'text' => '[answer]'],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])