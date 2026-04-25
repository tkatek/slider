<?php
$content = [
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5: Speaking Time!',
    'subtitle'   => 'What about you?!',
    'card_label' => 'Future Plans',
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

@include("slider.game.speaking-cards", ["content" => $content])
