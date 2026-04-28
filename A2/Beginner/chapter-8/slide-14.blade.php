<?php
$content = [
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5',
    'subtitle'   => 'Scrambled sentences',
    'type'       => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
    ],

    'scramble' => [
        "What’s your friend like?",
        "Tom is hardworking.",
        "What else is he like?",
        "This is my friend Tom.",
        "Billy is very funny.",
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])