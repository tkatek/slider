<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => '',
    'audio'           => materialAsset("slider/A1/Intermediate/chapter-12/audios/slide15.mp3"),
    'reading_title'   => 'What annoys me about travelling!',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,

    'passage' => [
        "Hi, my name is Adam. I’m from the U.S.",
        "The question is: What annoys you about flying?",
        "For me, there are a few annoying things.",
        "Security checks at the airport are difficult. The lines are very long. In some countries, you cannot bring small bottles of liquid. Sometimes you must take off your shoes. It is a hassle.",
        "Waiting in line is very annoying. When you get on the plane, you must wait again.",
        "There are different classes, and some people board first because they pay more. I don’t really understand that.",
        "When you are on the plane, the food is not very good.",
        "I think flying has many problems.",
    ],

    'questions' => [
        [
            'prompt'  => 'He says ____ is a hassle.',
            'correct' => 'Going through security',
            'options' => [
                'Getting to the airport',
                'Going through security',
            ],
        ],
        [
            'prompt'  => 'He is not sure why some people ____.',
            'correct' => 'Get on first',
            'options' => [
                'Recline their seats',
                'Get on first',
            ],
        ],
        [
            'prompt'  => 'He says the ____ is bad on the plane.',
            'correct' => 'Food',
            'options' => [
                'Food',
                'Air',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
