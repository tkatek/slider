<?php

$content = [

    'title'      => 'Speaking',
    'subtitle'   => 'Environmental Problems',
    'card_label' => '',
    'example'    => '',

    'card_type'  => 'text',

    'cards' => [
        [
            'sentence' => 'What kind of place is your hometown?',
        ],
        [
            'sentence' => 'Tell me about the most interesting place in your hometown.',
        ],
        [
            'sentence' => 'What changes would you like to make to your hometown?',
        ],
        [
            'sentence' => 'Do you think pollution is a big problem nowadays?',
        ],
        [
            'sentence' => 'What do you do to prevent our environment from pollution?',
        ],
        [
            'sentence' => 'Have you ever participated in any environmental events?',
        ],
        [
            'sentence' => 'Are there any environmental problems in your country?',
        ],
        [
            'sentence' => 'Do you take an interest in nature?',
        ],
        [
            'sentence' => 'Do you or your family take steps to help the environment?',
        ],
        [
            'sentence' => 'Do you recycle? What kinds of things do you recycle?',
        ],
        [
            'sentence' => 'Apart from recycling, what can each of us do to help protect the environment?',
        ],
        [
            'sentence' => 'Do you ever litter?',
        ],
        [
            'sentence' => 'Is there a big litter problem in your area?',
        ],
        [
            'sentence' => 'Is pollution a big problem where you live?',
        ],
        [
            'sentence' => 'Are you concerned about protecting the environment?',
        ],
        [
            'sentence' => 'Is it really possible for one person to make a difference in terms of helping protect the environment?',
        ],
        [
            'sentence' => 'Why should we try to protect the environment – why is it important?',
        ],
        [
            'sentence' => 'Is pollution a problem in your area?',
        ],
        [
            'sentence' => 'What do you do to help protect your local environment?',
        ],
        [
            'sentence' => 'What kinds of things do you recycle?',
        ],
        [
            'sentence' => 'How often do you recycle?',
        ],
        [
            'sentence' => 'Do you ever throw rubbish on the ground?',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])