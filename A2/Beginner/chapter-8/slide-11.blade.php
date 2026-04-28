<?php
$content = [
    'page_title' => '',
    'title' => 'What is your friend like?',
    'subtitle' => "Let’s watch this video!",

    'video' => materialAsset('slider/A1/Beginner/chapter-7/video/encrypted/conversation.m3u8'),
    'thumbnail' => materialAsset(''),

    'maxPlaybackSeconds' => 84,

    'isQuiz' => 0,
    'showCC' => false,
    'showTranscript' => false,
    'questions' => [],

    'subtitles' => [
        ['start' => 0, 'end' => 10, 'text' => 'Appearances de nesreen'],
        ['start' => 10, 'end' => 11, 'text' => 'Hi Sean.'],
        ['start' => 11, 'end' => 13, 'text' => 'Hello Georgie.'],
        ['start' => 13, 'end' => 15, 'text' => "Oh, who's this?"],
        ['start' => 15, 'end' => 18, 'text' => 'This is my friend Shannon.'],
        ['start' => 18, 'end' => 21, 'text' => "What's your friend like?"],
        ['start' => 21, 'end' => 28, 'text' => "She's very busy. She's always doing something. I'm also hardworking. I work all the time."],
        ['start' => 29, 'end' => 31, 'text' => "Who's this?"],
        ['start' => 31, 'end' => 34, 'text' => 'This is my friend Gina.'],
        ['start' => 34, 'end' => 36, 'text' => "What's Gina like?"],
        ['start' => 36, 'end' => 47, 'text' => 'She is very talkative. She talks a lot. And I’m sporty. I enjoy doing lots of sports.'],
        ['start' => 53, 'end' => 53, 'text' => 'Hello.'],
        ['start' => 53, 'end' => 57, 'text' => 'Hi. Hello, Billy.'],
        ['start' => 57, 'end' => 59, 'text' => "Who's this?"],
        ['start' => 59, 'end' => 61, 'text' => 'This is Billy.'],
        ['start' => 61, 'end' => 64, 'text' => "What's Billy like?"],
        ['start' => 64, 'end' => 84, 'text' => "He is very funny. He makes us all laugh. And that's how you make a lemonade. [laughter] I'm also friendly. I'm nice to everyone."],
    ],

];
?>

@include('slider.video.interactive', ['content' => $content])