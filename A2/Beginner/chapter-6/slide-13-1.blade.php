<?php
$content = [
    'title'         => 'Practice 5',
    'subtitle'      => 'Rearrange the words to make sentences',
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
        'He used to love strawberries.',
        'I used to eat chocolate everyday.',
        'We used to watch a movie at the cinema every weekend.',
        'Did you use to play with dolls?',
        'Did he use to like vegetables?',
        'I didn’t use to play video games.',
        'She didn’t use to have long hair.',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
