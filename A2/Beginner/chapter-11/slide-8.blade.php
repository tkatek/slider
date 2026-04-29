<?php
$content = [
    'type'=>'emoji',

    'title'    => 'Practice 3',
    'subtitle' => 'Choose the correct answer',

    'questions' => [
        [
            'emoji' => '🏃‍♂️💪',
            'prompt' => 'Doing exercise regularly keeps our body .....',
            'correct' => 'strong',
            'options' => ['sick', 'strong', 'sleepy']
        ],
        [
            'emoji' => '😴✅',
            'prompt' => 'Proper rest keeps us .....',
            'correct' => 'active',
            'options' => ['tired', 'lazy', 'active']
        ],
        [
            'emoji' => '🥦🍎',
            'prompt' => 'Fruits & vegetables should be eaten .....',
            'correct' => 'more',
            'options' => ['less', 'more', 'moderately']
        ],
        [
            'emoji' => '🍽️💚',
            'prompt' => 'Good food keeps us .....',
            'correct' => 'healthy',
            'options' => ['ill', 'tired', 'healthy']
        ],
        [
            'emoji' => '🥩🥚',
            'prompt' => 'We should eat more .....',
            'correct' => 'proteins',
            'options' => ['carbohydrates', 'fats', 'proteins']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])