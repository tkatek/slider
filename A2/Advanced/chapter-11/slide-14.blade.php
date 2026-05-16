<?php
$content = [
    'page_title' => 'Practice 5',
    'title' => 'Practice 5',
    'subtitle' => 'Sort out the sentences in the right group',

    'items_per_line_mobile' => 2,
    'items_per_line_tablet' => 2,
    'items_per_line' => 2,
    'items_per_line_wide' => 2,

    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,

    'categories' => [
        'Explaining the problem' => [
            'emoji' => '⚠️',
            'items' => [
                'There seems to be a mistake.',
                'I’m afraid I can’t eat this.',
            ],
        ],
        'Making a request' => [
            'emoji' => '🙋',
            'items' => [
                'I’d like to order something else, please.',
                'Would you possibly mind waiting?',
                'Could you possibly bring me a cloth?',
            ],
        ],
        'Responding to the apology' => [
            'emoji' => '✅',
            'items' => [
                'Don’t worry about it.',
                'It’s not your fault.',
            ],
        ],
        'Making an apology' => [
            'emoji' => '🙏',
            'items' => [
                'I’m terribly sorry.',
                'I do apologize.',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])
