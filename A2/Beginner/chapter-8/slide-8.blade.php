<?php
$content = [
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => 'Put the words in the correct order:',
    'type'       => 'sentence',

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
        'long curly blonde hair.',
        'short straight red hair.',
        'long wavy dark hair.',
        'short spiky blonde hair.',
        'long wavy red hair.',
        'big blue eyes.',
        'long straight nose.',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])