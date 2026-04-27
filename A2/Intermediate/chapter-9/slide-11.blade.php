<?php

$content = [
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5',
    'subtitle'   => 'Put the sentences in order',
    'type'       => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
    ],

    'scramble' => [
        'Are you seeing friends tonight?',
        'My uncle is coming to dinner tonight.',
        'Hala is having dinner with Sama tomorrow.',
        'Where are you going after this class?',
        'We are watching a film this evening.',
    ],
];

?>

@include('slider.game.unscramble', ['content' => $content])