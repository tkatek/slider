<?php
$content = [
    'page_title'    => 'Your Turn!',
    'title'         => 'Your Turn!',
    'subtitle'      => "Sort the phrases that you can use when a patient is at the Doctor’s",
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,
    'categories' => [
        'Doctor' => [
            'emoji' => '🩺',
            'items' => [
                "What's the problem?",
                'Where does it hurt?',
                'Let me see!',
                'You need a bandage',
                "We'll take x-ray",
                'Get well soon',
            ],
        ],
        'Patient' => [
            'emoji' => '🤕',
            'items' => [
                'Ouch!',
                "I think I've broken..",
                'I feel really bad',
                'Can I go to work?',
                'I fell off my bike.',
            ],
        ],
    ],
];
?>
@include("slider.game.drag-and-drop", ['content' => $content])