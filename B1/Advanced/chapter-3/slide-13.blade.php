<?php

$content = [
    'title'      => 'Practice 4',
    'subtitle'   => 'Unscramble the sentences',
    'type'       => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
        "{{6}}",
    ],

    'scramble' => [
        "That person may have wanted to say something.",
        "That letter may arrive tomorrow.",
        "They must be at the train station now.",
        "Liz can’t have travelled to china. I saw her yesterday.",
        "That can’t be Julia’s suitcase. It has my name on it.",
        "Gina must have left her tablet on the plane yesterday.",
    ],
];

?>

@include('slider.game.unscramble', ['content' => $content])