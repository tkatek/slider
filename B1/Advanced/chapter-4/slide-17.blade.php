<?php

$content = [

    'title'      => 'Speaking',
    'subtitle'   => 'Environmental Problems',
    'card_label' => '',
    'example'    => '',

    'card_type'  => 'text',

    'cards' => [
        [
            'sentence' => 'How eco-friendly is your country?',
        ],
        [
            'sentence' => 'Is it possible for everyone to change their lifestyle to help the Earth?',
        ],
        [
            'sentence' => 'What causes climate change and how can we reverse it?',
        ],
        [
            'sentence' => 'Who is most responsible for creating environmental problems?',
        ],
        [
            'sentence' => 'Will we humans kill the Earth one day?',
        ],
        [
            'sentence' => 'What is the biggest environmental problem? Why do you think so?',
        ],
        [
            'sentence' => 'Will the problems get worse or will they slowly disappear?',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])