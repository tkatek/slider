<?php

$content = [
    'page_title' => 'Warm-up: Practice 1',
    'title'      => 'Warm-up: Practice 1',
    'subtitle'   => 'Dreams and goals',
    'card_label' => 'Dreams and goals',
    'example'    => '',
    'cards'      => [
        [
            'answer'   => '',
            'sentence' => 'What are your short-term goals?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What are your long-term goals?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What is your biggest goal in life?',
        ],
        [
            'answer'   => '',
            'sentence' => 'Which of your goals have you already achieved?',
        ],
        [
            'answer'   => '',
            'sentence' => 'Are goals necessary to achieve success in life?',
        ],
        [
            'answer'   => '',
            'sentence' => 'What are your career goals?',
        ],
        [
            'answer'   => '',
            'sentence' => 'Are goals and ambitions important in life? Why?',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])