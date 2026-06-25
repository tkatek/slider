<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Practice 5: Listening',
    'subtitle'   => 'Listen & make a guess:',

    'card_label' => 'Listening',
    'card_type'  => 'image-audio',

    'cards' => [
        [
            'title'       => 'Listen. What can/could/must this be?',
            'description' => '',
            'audio'       => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide14/dog.mp3'),
        ],
        [
            'title'       => 'Listen. What can/could/must this be?',
            'description' => '',
            'audio'       => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide14/owl.mp3'),
        ],
        [
            'title'       => 'Listen. What can/could/must this be?',
            'description' => '',
            'audio'       => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide14/lion.mp3'),
        ],
        [
            'title'       => 'Listen. What can/could/must this be?',
            'description' => '',
            'audio'       => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide14/monkey.mp3'),
        ],
    ],
];

?>

@include('slider.game.speaking-cards-v2', ['content' => $content])