<?php

$content = [
    'title'    => 'Reading',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => 'Advanced Communication',

    'passage' => [
        'At advanced levels of communication, speaking fluently is no longer enough. What truly matters is the ability to express ideas clearly, respond thoughtfully, and adjust your language depending on the situation.',
        'Advanced speakers often avoid absolute statements. Instead, they acknowledge complexity by saying things like “to some extent” or “it depends on the context.” This flexibility allows them to communicate more persuasively and professionally.',
        'Developing this skill requires reflection, active listening, and the confidence to express incomplete or evolving ideas.',
    ],

    'questions' => [
        'What does the speaker say is not enough at advanced levels?',
        'Why do advanced speakers avoid absolute statements?',
        'Which phrase shows flexibility?',
        'What helps develop advanced communication?',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])