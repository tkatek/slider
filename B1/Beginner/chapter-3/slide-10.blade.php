<?php
$content = [
    'title'    => 'Practice 4',
    'subtitle' => 'Sort out the sentences to find other ways to apologize & accept apologies',

    'categories' => [
        'Apologising' => [
            'emoji' => '🙏',
            'items' => [
                'Apologising',
                'I’m really sorry.',
                'I didn’t realise.',
                'I apologise.',
                'It was an accident.',
            ],
        ],
        'Accepting Apologies' => [
            'emoji' => '🤝',
            'items' => [
                'Accepting apologies',
                'I totally understand.',
                'Never mind.',
                'It’s not your fault.',
                'These things happen.',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])