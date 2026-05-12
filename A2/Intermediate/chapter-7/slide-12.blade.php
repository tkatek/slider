<?php

$content = [
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4: Speaking Time!',
    'subtitle'   => 'What about you?!',
    'card_label' => 'What about you?!',
    'example'    => '',
    'cards'      => [
        [
            'answer'   => '',
            'sentence' => 'Are you going shopping for anything soon?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What are you going to do during your next day off?',
        ],
        [
            'answer'   => '',
            'sentence' => 'Are you going on holiday this summer?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What are your plans for tomorrow?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What are you going to do tonight?',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])