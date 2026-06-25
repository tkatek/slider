<?php
$content = [
    'title' => 'Practice 5',
    'subtitle' => 'Read the sentences & match with the right modal of deduction',

    'categories' => [
        'must' => [
            'emoji' => '✅',
            'items' => [
                'Come inside and get warm. You ________ be freezing out there!',
            ],
        ],
        "can't" => [
            'emoji' => '❌',
            'items' => [
                "It ________ be far now. We've been driving for hours.",
            ],
        ],
        'might/may/could' => [
            'emoji' => '🤔',
            'items' => [
                "He's not answering. He ________ be in class.",
            ],
        ],
        'to say that something now or in the future is possible.' => [
            'emoji' => '💭',
            'items' => [
                'We use might/may/could (not) + infinitive',
            ],
        ],
        'to speculate about situations in the present.' => [
            'emoji' => '🔎',
            'items' => [
                "We use must, might/may/could or can't + infinitive",
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])