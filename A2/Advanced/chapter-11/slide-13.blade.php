<?php
$content = [
    'page_title'    => 'Practice 4',
    'title'         => 'Practice 4',
    'subtitle'      => '',
    'type'          => 'sentence',
    'sentences'=>[
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
        "{{6}}",
        "{{7}}",
    ],
    'scramble' =>
        [
            'This dish is too spicy.',
            "There's a mistake with my order.",
            'The chicken sandwich is too spicy.',
            'The food is completely cold.',
            'The steak is overcooked.',
            'The steak is undercooked.',
            'This is the wrong order.',
        ],
];
?>
@include('slider.game.unscramble', ['content' => $content])