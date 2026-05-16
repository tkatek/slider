<?php

$content = [
    'page_title' => 'Practice 1: Warm-up',
    'title'      => 'Practice 1: Warm-up',
    'subtitle'   => 'Your experience in learning English',
    'card_label' => '',
    'example'    => '',
    'cards'      => [
        [
            'answer'   => '',
            'sentence' => 'How can you improve your English?',
        ],
        [
            'answer'   => '',
            'sentence' => 'How often do you listen or write in English?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What is the most difficult aspect of learning English?',
        ],
        [
            'answer'   => '',
            'sentence' => 'Do you know what an idiom is?',
        ],
        [
            'answer'   => '',
            'sentence' => 'When did you start learning English?',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])