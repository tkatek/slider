<?php

$content = [
    'page_title' => 'Speaking',
    'title'      => 'Speaking',
    'subtitle'   => 'Read & complete the sentences with your own words.',
    'card_label' => '',
    'example'    => '',
    'cards'      => [
        [
            'answer'   => '',
            'sentence' => 'When I looked at my phone, I realized I...',
        ],
        [
            'answer'   => '',
            'sentence' => 'By the time the police arrived, the thieves...',
        ],
        [
            'answer'   => '',
            'sentence' => 'After they had watched the film, they...',
        ],
        [
            'answer'   => '',
            'sentence' => 'I couldn’t read the menu because...',
        ],
        [
            'answer'   => '',
            'sentence' => 'I didn’t do well in the exam because...',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])