<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Intermediate/chapter-1/img/slide12.webp'),
    'isQuiz'   => 0,

    'questions' => [],

    'subtitles' => [
        ['start' => 0,    'end' => 3,    'text' => 'Hi, everyone! Welcome back to English In A Minute.'],
        ['start' => 3.5,  'end' => 8,    'text' => "We're going to look at how to use modal verbs when making a deduction."],
        ['start' => 8.5,  'end' => 12,   'text' => "That's when we make guesses about what is happening."],
        ['start' => 12.5, 'end' => 15,   'text' => "Let's look at some examples."],

        ['start' => 15.5, 'end' => 21,   'text' => 'Use must when you are certain or almost certain that something is true.'],
        ['start' => 21.5, 'end' => 26,   'text' => "For example: Phil's hair is wet – it must be rainy."],

        ['start' => 26.5, 'end' => 31,   'text' => "Use can't to say when you are certain something is not true."],
        ['start' => 31.5, 'end' => 36,   'text' => "For example: Phil's hair is wet – it can't be sunny."],

        ['start' => 36.5, 'end' => 42,   'text' => 'We can use might, may or could to talk about possibility.'],
        ['start' => 42.5, 'end' => 45,   'text' => "Let's look at some examples."],

        ['start' => 45.5, 'end' => 48,   'text' => 'Sam is late for work.'],
        ['start' => 48.5, 'end' => 53,   'text' => "We don't know why Sam is late, but we can make a guess."],
        ['start' => 53.5, 'end' => 57,   'text' => 'For example: Her car could be broken.'],
        ['start' => 57.5, 'end' => 61,   'text' => 'Another possibility is: She might still be asleep.'],
        ['start' => 61.5, 'end' => 66,   'text' => 'One final possibility now: There may be a lot of traffic.'],

        ['start' => 66.5, 'end' => 70,   'text' => 'Well, it must be time to finish now.'],
        ['start' => 70.5, 'end' => 74,   'text' => 'Thanks for joining us. Bye!'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])