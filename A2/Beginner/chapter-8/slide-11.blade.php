<?php
$content = [
    'page_title' => '',
    'title' => 'What is your friend like?',
    'subtitle' => "Let’s watch this video!",

    'video' => materialAsset('slider/A2/Beginner/chapter-8/video/who-is-this-encrypted/who-is-this.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Beginner/chapter-8/img/slide12.webp'),

    'isQuiz' => 0,
    'questions' => [],

    'subtitles' => [
        ['start' => 0,  'end' => 2,  'text' => 'Hi Sean.'],
        ['start' => 3,  'end' => 5,  'text' => 'Hey Georgie.'],
        ['start' => 7,  'end' => 8.5,  'text' => "Oh, who's this?"],
        ['start' => 9,  'end' => 11, 'text' => 'This is my friend Shannon.'],
        ['start' => 12, 'end' => 14, 'text' => "What's your friend like?"],
        ['start' => 15, 'end' => 19, 'text' => "She's very busy. She's always doing something."],
        ['start' => 21, 'end' => 24, 'text' => "I'm also hardworking. I work all the time."],

        ['start' => 27.5, 'end' => 29, 'text' => "Who's this?"],
        ['start' => 29.5, 'end' => 32, 'text' => 'This is my friend Gina.'],
        ['start' => 33, 'end' => 34.5, 'text' => "What's Gina like?"],
        ['start' => 35, 'end' => 38, 'text' => 'She is very talkative. She talks a lot.'],
        ['start' => 38.5, 'end' => 42, 'text' => 'And I’m sporty. I enjoy doing lots of sports.'],

        ['start' => 44.5, 'end' => 45.5, 'text' => 'Hello.'],
        ['start' => 47, 'end' => 50, 'text' => 'Hi. Hello, Billy.'],
        ['start' => 51.5, 'end' => 52.5, 'text' => "Who's this?"],
        ['start' => 53.5, 'end' => 55, 'text' => 'This is Billy.'],
        ['start' => 55.7, 'end' => 58, 'text' => "What's Billy like?"],
        ['start' => 59, 'end' => 62.5, 'text' => 'He is very funny. He makes us all laugh.'],
        ['start' => 62.5, 'end' => 65, 'text' => "And that's how you make a lemonade."],
        ['start' => 68, 'end' => 73, 'text' => "I'm also friendly. I'm nice to everyone."],
    ],
];
?>

@include('slider.video.interactive', ['content' => $content])