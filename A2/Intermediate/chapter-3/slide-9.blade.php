<?php
$content = [
    'mode' => 'choice_table',
    'page_title' => 'Listening task',
    'title' => 'Listening task',
    'subtitle' => 'Superstitions',
    'instruction' => 'Listen. Then check your answers.',
    'instruction_note' => '',
    'audio' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide9.mp3'),

    'transcript' => [
        'A coin - a piece of money from your own country. Some people carry a lucky coin. What do you think? Check your answer.',
        "The number four. In some countries, it's considered unlucky. How do you feel about the number four? Check your answer.",
        'A horseshoe - the piece of metal that a horse wears on the bottom of its foot. Some people believe that a horseshoe brings good luck. What does a horseshoe mean to you? Check your answer.',
        "A rabbit's foot. Some people think it's lucky to carry a rabbit's foot with you. What do you think? Check your answer.",
        'Opening an umbrella indoors. In some cultures, opening an umbrella indoors brings bad luck. How do you feel about it? Check your answer.',
    ],

    'row_heading' => 'Number',

    'options' => [
        'lucky' => "It's lucky.",
        'unlucky' => "It's unlucky.",
        'none' => 'It has no special meaning.',
    ],

    'rows' => [
        ['number' => 1, 'item' => 'A coin', 'correct' => 'lucky'],
        ['number' => 2, 'item' => 'The number four', 'correct' => 'unlucky'],
        ['number' => 3, 'item' => 'A horseshoe', 'correct' => 'lucky'],
        ['number' => 4, 'item' => "A rabbit's foot", 'correct' => 'lucky'],
        ['number' => 5, 'item' => 'Opening an umbrella indoors', 'correct' => 'unlucky'],
    ],
];
?>

@include('slider.game.listening-table', ['content' => $content])
