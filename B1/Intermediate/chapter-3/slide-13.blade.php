<?php
$content = [
    'page_title'    => 'Practice 4',
    'title'         => 'Practice 4',
    'subtitle'      => '',
    'type'          => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
        "{{6}}",
    ],

    'scramble' => [
        "I don't think we will drink water from plastic bottles.",
        "Supermarkets won't sell goods in plastic packaging.",
        "Robots might clean our houses and offices.",
        "I think we will reduce pollution in our cities.",
        "Many people might not learn to drive.",
        "There might be a lot of driverless cars on the roads.",
    ],
];
?>

@include('slider.game.unscramble', ['content' => $content])