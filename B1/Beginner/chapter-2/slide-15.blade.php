<?php

$content = [
    'type' => 'reading',

    'page_title' => 'Reading Comprehension',
    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Read & answer the questions',

    'reading_title'   => '8 random acts of kindness you can do today',


    'passage' => "Call a friend that you haven’t spoken to for a while

Offer to pick up some groceries for your elderly neighbour

Make a donation to a charity

Lend your ear - listen to your colleague who is having a bad day

Take a minute to help someone who is lost

Tell someone you know that you are proud of them

Help your parents with household chores

Send an encouraging text message or voice memo to a friend who might be feeling down.",

    'question_prompt_label' => 'Choose the correct answer according to the passage you’ve just read:',

    'questions' => [
        [
            'prompt'  => 'How can you help an elderly neighbour?',
            'correct' => 'Pick up groceries for them',
            'options' => [
                'Give them money',
                'Pick up groceries for them',
                'Cook for them',
                'Buy them a gift',
            ],
        ],
        [
            'prompt'  => 'How can you help a friend who feels sad?',
            'correct' => 'Send an encouraging message',
            'options' => [
                'Send an encouraging message',
                'Give them money',
                'Take them shopping',
                'Do their homework',
            ],
        ],
        [
            'prompt'  => 'What does “Lend your ear” mean?',
            'correct' => 'Listen to someone',
            'options' => [
                'Give someone money',
                'Listen to someone',
                'Buy something for someone',
                'Help someone find the way',
            ],
        ],
        [
            'prompt'  => 'Which is a kind act for a friend you haven’t talked to?',
            'correct' => 'Call them',
            'options' => [
                'Call them',
                'Send them food',
                'Give them clothes',
                'Visit their house',
            ],
        ],
        [
            'prompt'  => 'How can you show someone you care?',
            'correct' => 'Tell them you are proud of them',
            'options' => [
                'Tell them you are proud of them',
                'Give them a car',
                'Do their job',
                'Buy them a big house',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])