<?php
$content = [
    'title' => 'Warm up:  Practice 1',
    'subtitle' => 'What Makes a Good Friend?<br>Drag and drop each statement into the correct group',

    'categories' => [
        'Strong Friendship' => [
            'emoji' => '🤝',
            'items' => [
                'Care for each other',
                'Count on someone',
                "Put yourself in someone's shoes",
                'Pay full attention',
                'Be there for someone',
                'Show kindness',
                'Respect feelings',
                'Make friendship stronger',
                'Take part in activities together',
                'Build trust',
            ],
        ],
        'Weak Friendship' => [
            'emoji' => '💔',
            'items' => [
                "Ignore other people's feelings",
                'Never listen carefully',
                'Break trust',
                'Refuse to help others',
                'Exclude friends from activities',
                'Show no empathy',
                'Disrespect boundaries',
                'Only care about yourself',
                'Avoid supporting friends',
                'Give up on friendships easily',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])