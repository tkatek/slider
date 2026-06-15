<?php
$content = [
    'title'    => 'Practice 3',
    'subtitle' => 'Sort out the sentences into the right group',

    'categories' => [
        'Making Apologies' => [
            'emoji' => '🙏',
            'items' => [
                'Excuse me for ...',
                'It’s all my fault.',
                'I’m sorry.',
                'I do apologize for...',
                'Please, accept my apologies for...',
            ],
        ],
        'Responding To Apologies' => [
            'emoji' => '🤝',
            'items' => [
                'Never mind.',
                'It doesn’t matter.',
                'That’s all right.',
                'Don’t worry about it.',
                'It’s OK.',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])