<?php

$content = [
    'page_title'    => 'Practice 3',
    'title'         => 'Practice 3',
    'subtitle'      => '',
    'type'          => 'sentence',
    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
    ],
    'scramble' => [
        'They’re always making noise.',
        'He’s always leaving the lights on.',
        'They are always arguing about washing the dishes.',
        'You are always interrupting me!',
        'My roommate is always complaining about the food.',
    ],
];

?>

@include('slider.game.unscramble', ['content' => $content])