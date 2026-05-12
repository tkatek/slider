<?php
$content = [
    'page_title'    => 'Practice 5',
    'title'         => 'Practice 5',
    'subtitle'      => 'Put the words in order',
    'type'          => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
        "{{6}}",
        "{{7}}",
    ],

    'scramble' => [
        'Work towards your goals.',
        'Set short-term goals.',
        'Set long-term goals.',
        'Work hard to achieve your goals.',
        'Give positive feedback.',
        'Stay motivated to complete your goal.',
        'Do things you can do.',
    ],
];
?>

@include('slider.game.unscramble', ['content' => $content])