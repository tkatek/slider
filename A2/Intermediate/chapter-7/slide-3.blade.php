<?php

$content = [
    'page_title' => 'Practice 1',
    'title'      => 'Practice 1: Warm-up Discussion',
    'subtitle'   => 'What do you think?',
    'card_label' => 'Future Plans',
    'example'    => '',
    'cards'      => [
        [
            'answer'   => '',
            'sentence' => 'What are you eating for dinner tonight?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What are you going to do tomorrow?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What time does your English lesson start?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What are you doing after the lesson?',
        ],
        [
            'answer'   => '',
            'sentence' => 'Do you think robots will replace humans in the future?',
        ],
        [
            'answer'   => '',
            'sentence' => 'Do you think people will live on the moon in 50 years?',
        ],
        [
            'answer'   => '',
            'sentence' => 'Will you be rich in the future?',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])