<?php

$content = [
    'page_title' => 'Quick Wrap Up — Sentence Order',
    'title'      => 'Quick Wrap Up',
    'subtitle'   => 'Unscramble these sentences.',
    'type'       => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
    ],

    'scramble' => [
        'I shouldn’t have spoken so fast',
        'I should have done more research',
        'I should have checked the address.',
    ],
];

?>

@include('slider.game.unscramble', ['content' => $content])