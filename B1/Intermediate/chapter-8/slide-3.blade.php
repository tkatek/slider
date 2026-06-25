<?php
$content = [
    'page_title' => 'Warm up',
    'title'      => 'Practice 1 : Warm up',
    'subtitle'   => '',
    'card_type'  => 'text',
    'card_label' => 'Siblings',

    'cards' => [
        [
            'title' => '',
            'description' => 'Is it better to be an only child or to have siblings?',
        ],
        [
            'title' => '',
            'description' => 'Who matters more in life: friends or siblings?',
        ],
        [
            'title' => '',
            'description' => 'How many brothers or sisters would you like to have?',
        ],
        [
            'title' => '',
            'description' => 'Are brothers or sisters better?',
        ],
        [
            'title' => '',
            'description' => 'Do you experience competition with your siblings?',
        ],
        [
            'title' => '',
            'description' => 'What bothers you most about your siblings?',
        ],
        [
            'title' => '',
            'description' => 'Which is better: having siblings or being an only child?',
        ],
        [
            'title' => '',
            'description' => 'What are the good and bad sides of being the oldest or youngest child?',
        ],
        [
            'title' => '',
            'description' => 'What similarities do you share with your siblings?',
        ],
        [
            'title' => '',
            'description' => 'What do you and your siblings usually argue about?',
        ],
    ],
];
?>

@include('slider.game.speaking-cards-v2', ['content' => $content])