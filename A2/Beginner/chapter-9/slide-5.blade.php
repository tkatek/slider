<?php
$content = [
    'page_title' => '',
    'title' => "Let’s watch this video",
    'subtitle' => "Who's your favourite celebrity?",

    'video' => materialAsset('slider/A2/Beginner/chapter-9/video/encrypted/slide-5.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Beginner/chapter-9/img/slide-5.webp'),

    'maxPlaybackSeconds' => 92,
    'showCC' => false,
    'showTranscript' => false,
    'isQuiz' => 0,
    'questions' => [],

    'subtitles' => [
        ['start' => 0, 'end' => 4, 'text' => 'Hello, this is a description of Shakira.'],
        ['start' => 4, 'end' => 9, 'text' => "She's a very beautiful person. She's 34 years old, born on 2/2/1977."],
        ['start' => 9, 'end' => 15, 'text' => "She's tall, athletic, and her hair is long and blonde."],
        ['start' => 15, 'end' => 21, 'text' => "Her eyes are big and round, her eyebrows are defined, and her temperature is here."],
        ['start' => 21, 'end' => 25, 'text' => 'Shakira is a famous singer.'],
        ['start' => 25, 'end' => 33, 'text' => "She's a person with a great dose of spirit, body, and human work."],
        ['start' => 33, 'end' => 39, 'text' => "She's supportive and helpful to various organizations."],
        ['start' => 39, 'end' => 46, 'text' => 'She likes to dress in comfortable clothing. She does not like to put on makeup.'],
        ['start' => 46, 'end' => 54, 'text' => 'If I had not been a singer, I would have been a biologist.'],
        ['start' => 54, 'end' => 60, 'text' => "She likes to eat lots of chocolates. She's very famous."],
        ['start' => 60, 'end' => 63, 'text' => 'Thank you very much.'],
    ],
];
?>

@include('slider.video.interactive', ['content' => $content])
