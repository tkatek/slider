<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 3',
    'subtitle' => 'Choose the correct meaning for each word',

    'questions' => [
        [
            'emoji'   => '🫂',
            'prompt'  => 'Empathy',
            'correct' => "The ability to understand and share another person's feelings",
            'options' => [
                "The ability to understand and share another person's feelings",
                'The act of giving someone advice',
                'A type of competition between friends',
                'A rule that everyone must follow',
            ],
        ],
        [
            'emoji'   => '🌧️',
            'prompt'  => 'Circumstances',
            'correct' => 'Conditions or situation someone is in',
            'options' => [
                'Conditions or situation someone is in',
                'The final result of a game',
                'An important decision',
                "A person’s favorite hobby",
            ],
        ],
        [
            'emoji'   => '🔍',
            'prompt'  => "Lens (of someone's situation)",
            'correct' => 'Way of seeing or understanding something',
            'options' => [
                'Way of seeing or understanding something',
                'A glass that helps us see things',
                'A part of a camera',
                'A tool for writing',
            ],
        ],
        [
            'emoji'   => '❤️',
            'prompt'  => 'Compassion',
            'correct' => "Strong feeling of care for others’ suffering",
            'options' => [
                "Strong feeling of care for others’ suffering",
                'A feeling of being angry',
                'The desire to win a prize',
                'The need for more attention',
            ],
        ],
        [
            'emoji'   => '🛋️',
            'prompt'  => 'Comfort zone',
            'correct' => 'Situation where someone feels safe and familiar',
            'options' => [
                'Situation where someone feels safe and familiar',
                'A place where people feel worried',
                'A time of great danger',
                'A place for outdoor activities',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])