<?php

$content = [
    'title'      => 'Practice 6',
    'subtitle'   => 'Unjumble the sentences',
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
        "Air pollution is getting worse.",
        "People are recycling more plastic.",
        "Many trees are being planted.",
        "Animals are losing their habitats.",
        "The Earth is getting warmer.",
        "Clean energy is being used more.",
    ],
];

?>

@include('slider.game.unscramble', ['content' => $content])