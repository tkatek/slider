<?php
$content = [
    'type' => 'emoji',
    'title' => 'Quick Quiz',
    'subtitle' => '',

    'questions' => [
        [
            'emoji'   => '🚕💵',
            'prompt'  => 'Which phrase would you use to ask about the cost of a trip?',
            'correct' => 'How much is the fare?',
            'options' => [
                'Where is the bus stop?',
                'How much is the fare?',
                'Can you drop me off?',
                'Is this the right train?',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])