<?php
$content = [

    'type' => 'emoji',
    'title' => 'Comprehension Check',
    'subtitle' => 'Choose the correct answer',

    'questions' => [
        [
            'emoji'   => '🏨',
            'prompt'  => 'What room is Daniel staying in?',
            'correct' => ['312'],
            'options' => ['213', '312', '321'],
        ],
        [
            'emoji'   => '💷',
            'prompt'  => 'What is the £14 charge for?',
            'correct' => ['Phone calls'],
            'options' => ['Breakfast', 'Laundry', 'Phone calls'],
        ],
        [
            'emoji'   => '💳',
            'prompt'  => 'How does Daniel pay?',
            'correct' => ['Traveller’s cheques'],
            'options' => ['Credit card', 'Cash', 'Traveller’s cheques'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])