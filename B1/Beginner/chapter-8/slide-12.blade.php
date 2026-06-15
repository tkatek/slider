<?php
$content = [
    'page_title' => '',
    'title'      => 'Speaking Time: Practice 4',
    'subtitle'   => 'What would happen if...?',
    'instruction' => 'Remember to use this pattern: If my best friend travelled to another country, I would be very sad',
    'box_label' => 'Question',

    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 3,
            'md'   => 3,
            'lg'   => 5,
        ],
    ],

    'items' => [
        '. . . your best friend moved to another country?',
        '. . . you could travel back in time?',
        '. . . you could read people’s thoughts?',
        '. . . you became famous overnight?',
        '. . . you were the only person on Earth for one day?',
    ],
];
?>

@include("slider.game.warming-up", ['content' => $content])