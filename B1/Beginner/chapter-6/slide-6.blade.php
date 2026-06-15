<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Beginner/chapter-6/img/slide6.webp'),
    'isQuiz'   => 0,

    'questions' => [
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 5,    'text' => "Well, I don't know about you guys, but I just love to do outdoor activities."],
        ['start' => 5.5,  'end' => 10,   'text' => "It's just so much fun to be outside, breathe in the air, and get some sun."],
        ['start' => 10.5, 'end' => 15,   'text' => "Although I also love to do activities indoors."],
        ['start' => 15.5, 'end' => 20,   'text' => "Right now, I am outdoors, but yesterday I was indoors."],
        ['start' => 20.5, 'end' => 26,   'text' => "Anyway, I just love to do activities."],
        ['start' => 26.5, 'end' => 33,   'text' => "So today in this class, we are going to check some activities that you could do outdoors and indoors."],
        ['start' => 33.5, 'end' => 35,   'text' => "Let's go!"],

        ['start' => 36,   'end' => 40,   'text' => 'Yoga.'],
        ['start' => 40.5, 'end' => 44,   'text' => 'Kite flying.'],
        ['start' => 44.5, 'end' => 48,   'text' => 'Camping.'],
        ['start' => 48.5, 'end' => 52,   'text' => 'Photography.'],
        ['start' => 52.5, 'end' => 56,   'text' => 'Picnic.'],
        ['start' => 56.5, 'end' => 60,   'text' => 'Gardening.'],
        ['start' => 60.5, 'end' => 64,   'text' => 'Rock climbing.'],
        ['start' => 64.5, 'end' => 68,   'text' => 'Swimming.'],
        ['start' => 68.5, 'end' => 72,   'text' => 'Bungee jumping.'],
        ['start' => 72.5, 'end' => 76,   'text' => 'Cycling.'],
        ['start' => 76.5, 'end' => 80,   'text' => 'Jogging.'],

        ['start' => 81,   'end' => 84,   'text' => 'Reading.'],
        ['start' => 84.5, 'end' => 88,   'text' => 'Watching TV.'],
        ['start' => 88.5, 'end' => 92,   'text' => 'Board games.'],
        ['start' => 92.5, 'end' => 96,   'text' => 'Doing crossword puzzles.'],
        ['start' => 96.5, 'end' => 100,  'text' => 'Cooking.'],
        ['start' => 100.5,'end' => 104,  'text' => 'Playing video games.'],
        ['start' => 104.5,'end' => 108,  'text' => 'Chatting.'],

        ['start' => 109,  'end' => 115,  'text' => 'So, what do you prefer?'],
        ['start' => 115.5,'end' => 122,  'text' => 'Leave me a comment and let me know if you like to do activities indoors or outdoors.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])