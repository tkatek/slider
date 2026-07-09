<?php

$content = [
    'page_title' => 'Speaking Cards',
    'title'      => 'Speaking Cards',
    'subtitle'   => 'Empathy Discussion Questions',
    'card_label' => 'Question',
    'example'    => '',

    'card_type'  => 'text',

    'cards' => [
        [
            'image'    => '',
            'sentence' => "How would you describe empathy to someone who didn't know the meaning?",
        ],
        [
            'image'    => '',
            'sentence' => 'Is having too much empathy a problem?',
        ],
        [
            'image'    => '',
            'sentence' => 'Does a lack of empathy contribute to bullying and aggression?',
        ],
        [
            'image'    => '',
            'sentence' => 'In what professions is empathy important?',
        ],
        [
            'image'    => '',
            'sentence' => 'Can empathy be taught or is it a natural ability?',
        ],
        [
            'image'    => '',
            'sentence' => 'Do you think the subject of empathy should be taught in schools?',
        ],
        [
            'image'    => '',
            'sentence' => 'Can empathy make people become better leaders?',
        ],
        [
            'image'    => '',
            'sentence' => "Do you think it's important to feel empathy towards animals as well as humans?",
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])