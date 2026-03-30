<?php
$content = [
    'title'      => 'Listening: airport locations',
    'subtitle'   => 'Practice 2',
    'type'       => 'audio',

    'audio'      => materialAsset('slider/A1/Intermediate/chapter-11/audios/slide14.mp3'),

    'script' => [
        'Excuse me, do you know where I can buy some magazines?',
        'Can you tell me where I can pick up my suitcases?',
        'Excuse me. Where can I meet someone who is arriving on flight 66?',
        'I need some help. Can you tell me where I can change some money?',
        'I’m in the wrong terminal. How do I get to the International Terminal?',
    ],

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',
    'question_prompt_label'  => 'Choose the correct answer:',

    'questions' => [
        [
            'prompt'  => 'Where does the speaker need to go in conversation 1?',
            'correct' => 'the bookstore',
            'options' => ['the restroom', 'the bookstore', 'the shuttle bus stop'],
        ],
        [
            'prompt'  => 'Where does the speaker need to go in conversation 2?',
            'correct' => 'the baggage-claim area',
            'options' => ['the departure gate', 'the currency exchange', 'the baggage-claim area'],
        ],
        [
            'prompt'  => 'Where does the speaker need to go in conversation 3?',
            'correct' => 'the arrivals area',
            'options' => ['the arrivals area', 'the departure gate', 'the shuttle bus stop'],
        ],
        [
            'prompt'  => 'Where does the speaker need to go in conversation 4?',
            'correct' => 'the currency exchange',
            'options' => ['the currency exchange', 'the souvenir shop', 'the restroom'],
        ],
        [
            'prompt'  => 'Where does the speaker need to go in conversation 5?',
            'correct' => 'the shuttle bus stop',
            'options' => ['the souvenir shop', 'the newsstand', 'the shuttle bus stop'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
