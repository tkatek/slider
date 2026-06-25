<?php
$content = [
    'page_title' => 'Practice 9',
    'title'      => 'Practice 9',
    'subtitle'   => '',
    'type'       => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
    ],

    'scramble' => [
        'She may come to the party tommorow.',
        'They could travel to Paris tommorow.',
        'I might go shopping tonight.',
    ],
];
?>

@include('slider.game.unscramble', ['content' => $content])