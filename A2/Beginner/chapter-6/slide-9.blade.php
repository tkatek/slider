<?php
$content = [
    'video'      => materialAsset('slider/A2/Beginner/chapter-6/video/childhood-memories-encrypted/childhood-memories.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Beginner/chapter-6/img/slide9.webp'),
    'isQuiz'     => 0,

    'questions' => [
        [
            // After: "I am 70."
            'time' => 5200,
            'type' => 'multiple_choice',
            'question' => 'How old is the speaker now?',
            'options' => ['60', '65', '70', '75'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            // After: "Ali and I used to play tags."
            'time' => 23200,
            'type' => 'multiple_choice',
            'question' => 'What did the speaker use to do with Ali?',
            'options' => ['Go fishing', 'Play tags', 'Cook food', 'Read books'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            // After: "fly my kite"
            'time' => 29900,
            'type' => 'multiple_choice',
            'question' => 'What did the speaker fly as a child?',
            'options' => ['A plane', 'A balloon', 'A kite', 'A drone'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            // After: "my uncle used to cook a kebab."
            'time' => 43800,
            'type' => 'multiple_choice',
            'question' => "What did the speaker's uncle do?",
            'options' => ['He swam', 'He fished', 'He cooked kebab', 'He rode a bike'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            // After: "Its name was Nutty."
            'time' => 55300,
            'type' => 'multiple_choice',
            'question' => "What was the name of the speaker's cat?",
            'options' => ['Kitty', 'Snowy', 'Nutty', 'Lucky'],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles'  => [
        ['start' => 0, 'end' => 5, 'text' => 'Hello birds. Today is my birthday. I am 70.'],
        ['start' => 5.5, 'end' => 9, 'text' => 'I wanted to celebrate it with you and where is my childhood past'],
        ['start' => 10, 'end' => 13, 'text' => 'Yes, my childhood memories. They are still here.'],
        ['start' => 14.8, 'end' => 17, 'text' => 'I can remember when I was a child.'],
        ['start' => 17.8, 'end' => 23, 'text' => 'Ali and I used to play tags. We used to run up and down.'],
        ['start' => 23.8, 'end' => 29.5, 'text' => 'I used to come here and fly my kite. I used to have a red cap.'],
        ['start' => 30.8, 'end' => 32.5, 'text' => 'This place used to be a beach.'],
        ['start' => 34, 'end' => 37, 'text' => 'My mother and I used to swim here. She was a great swimmer.'],
        ['start' => 38, 'end' => 43.5, 'text' => 'After the sea we used to have a picnic and my uncle used to cook a kebab.'],
        ['start' => 45, 'end' => 51, 'text' => 'I remember I used to ride my bike all day long and I used to have a cat.'],
        ['start' => 53.5, 'end' => 55, 'text' => 'Its name was Nutty.'],
        ['start' => 56.5, 'end' => 58.5, 'text' => 'I can still feel its warmth.'],
        ['start' => 60.5, 'end' => 64, 'text' => 'And of course my grandpa. We used to go fishing on a boat.'],
        ['start' => 65, 'end' => 67, 'text' => 'I miss those days.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])