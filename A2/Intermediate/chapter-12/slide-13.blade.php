<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Speaking time',
    'subtitle' => 'Body language',

    'questions' => [
        [
            'emoji' => '😊🤝',
            'prompt' => 'What does it mean when we smile?',
            'correct' => 'We are happy or friendly',
            'options' => [
                'We are angry',
                'We are happy or friendly',
                'We are shy',
                'We are nervous',
            ],
        ],
        [
            'emoji' => '🙅‍♂️😐',
            'prompt' => 'What can crossing our arms show?',
            'correct' => 'We are angry, shy, or not comfortable',
            'options' => [
                'We are tired',
                'We are happy',
                'We are angry, shy, or not comfortable',
                'We are confident',
            ],
        ],
        [
            'emoji' => '👀🤝',
            'prompt' => 'Why is eye contact important?',
            'correct' => 'Because it shows confidence and respect',
            'options' => [
                'Because it shows sadness',
                'Because it shows nervousness',
                'Because it shows confidence and respect',
                'Because it shows anger',
            ],
        ],

        [
            'emoji' => '🙅‍♀️🤔',
            'prompt' => 'Crossing arms can mean shyness.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])