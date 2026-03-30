<?php
$content = [
    'type' => 'emoji',
    'title'    => 'Practice 4',
    'subtitle' => 'Choose the best answer',

    'questions'=> [
        [
            'emoji'   => '🧳',
            'prompt'  => 'What is the maximum weight allowed for a suitcase?',
            'correct' => '10kg',
            'options' => ['5kg', '8kg', '10kg']
        ],
        [
            'emoji'   => '🎒',
            'prompt'  => 'What extra item can you take with your suitcase?',
            'correct' => 'A small laptop or handbag',
            'options' => [
                'A large backpack',
                'A small laptop or handbag',
                'A sports bag'
            ]
        ],
        [
            'emoji'   => '🧴',
            'prompt'  => 'When can you take liquids over 100ml?',
            'correct' => 'Only if bought after security',
            'options' => [
                'Anytime',
                'Only before security',
                'Only if bought after security'
            ]
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])