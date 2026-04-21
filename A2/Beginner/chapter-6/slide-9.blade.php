<?php
$content = [
    'video'      => materialAsset('slider/A2/Beginner/chapter-6/video/'),
    'thumbnail'  => materialAsset('slider/A2/Beginner/chapter-6/img/slide9.webp'),
    'isQuiz'     => 0,
    'questions' => [
        [
            'time' => 9000,
            'type' => 'multiple_choice',
            'question' => 'How old is the speaker now?',
            'options' => ['60', '65', '70', '75'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 36000,
            'type' => 'multiple_choice',
            'question' => 'What did the speaker use to do with Ali?',
            'options' => ['Go fishing', 'Play tags', 'Cook food', 'Read books'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 44000,
            'type' => 'multiple_choice',
            'question' => 'What did the speaker fly as a child?',
            'options' => ['A plane', 'A balloon', 'A kite', 'A drone'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 63000,
            'type' => 'multiple_choice',
            'question' => "What did the speaker's uncle do?",
            'options' => ['He swam', 'He fished', 'He cooked kebab', 'He rode a bike'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 80000,
            'type' => 'multiple_choice',
            'question' => "What was the name of the speaker's cat?",
            'options' => ['Kitty', 'Snowy', 'Nutty', 'Lucky'],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],
    'subtitles'  => [
        ['start' => 0, 'end' => 8, 'text' => 'Hello birds. Today is my birthday. I am 70.'],
        ['start' => 8, 'end' => 17, 'text' => 'I wanted to celebrate it with you and... where is my childhood?'],
        ['start' => 17, 'end' => 25, 'text' => 'Past... yes, my childhood memories. They are still here.'],
        ['start' => 25, 'end' => 31, 'text' => 'I can remember when I was a child.'],
        ['start' => 31, 'end' => 38, 'text' => 'Ali and I used to play tags. We used to run up and down.'],
        ['start' => 38, 'end' => 46, 'text' => 'I used to come here and fly my kite. I used to have a red cap.'],
        ['start' => 46, 'end' => 54, 'text' => 'This place used to be a beach. My mother and I used to swim here.'],
        ['start' => 54, 'end' => 64, 'text' => 'She was a great swimmer. After the sea we used to have a picnic and my uncle used to cook a kebab.'],
        ['start' => 64, 'end' => 73, 'text' => 'I remember I used to ride my bike all day long and I used to have a cat.'],
        ['start' => 73, 'end' => 81, 'text' => 'Its name was Nutty. I can still feel its warmth.'],
        ['start' => 81, 'end' => 90, 'text' => 'And of course my grandpa. We used to go fishing on a boat.'],
        ['start' => 90, 'end' => 94, 'text' => 'I miss those days.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])