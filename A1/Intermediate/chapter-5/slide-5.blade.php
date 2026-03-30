<?php
$content = [
    'type' => 'emoji',
    'title'    => 'Interactive quiz',
    'subtitle' => 'Practice 1',

    'questions'=> [

        [
            'emoji'   => '🥄',
            'prompt'  => 'What is the recommended dosage for Cough Stop syrup?',
            'correct' => 'Take two teaspoons three times a day after meals',
            'options' => [
                'Take two teaspoons three times a day after meals',
                'Take one teaspoon twice a day after meals',
                'Take two teaspoons once a day before meals',
            ],
        ],


        [
            'emoji'   => '📋',
            'prompt'  => 'What is the recommended dosage for Cough Stop syrup?',
            'correct' => 'Two teaspoons three times a day after meals.',
            'options' => [
                'Two teaspoons once a day after meals.',
                'One teaspoon three times a day after meals.',
                'Two teaspoons three times a day after meals.',
            ],
        ],


        [
            'emoji'   => '😴',
            'prompt'  => 'What is a potential side effect of Cough Stop syrup, as mentioned by the pharmacist?',
            'correct' => 'Cough Stop syrup may cause mild drowsiness.',
            'options' => [
                'Cough Stop syrup may cause mild drowsiness.',
                'Cough Stop syrup is taken before meals.',
                'Cough Stop syrup cures sore throat quickly.',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
