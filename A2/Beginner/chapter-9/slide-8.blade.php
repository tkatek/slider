<?php
$content = [
    'page_title' => '',
    'title' => "Let’s watch this video",
    'subtitle' => "Has he/ she got straight hair?",

    'video' => materialAsset('slider/A2/Beginner/chapter-9/video/encrypted/slide-5.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Beginner/chapter-9/img/slide-5.webp'),

    'maxPlaybackSeconds' => 92,

    'isQuiz' => 0,
    'showCC' => false,
    'showTranscript' => false,
    'questions' => [],

    'subtitles' => [
        ['start' => 12, 'end' => 15, 'text' => 'Look at these six people.'],
        ['start' => 15, 'end' => 18, 'text' => 'Number 1 has got short black hair and a moustache.'],
        ['start' => 18, 'end' => 21, 'text' => 'Number 2 has got curly brown hair and a beard.'],
        ['start' => 21, 'end' => 24, 'text' => 'Number 3 has got long straight black hair.'],
        ['start' => 24, 'end' => 27, 'text' => 'Number 4 has got long straight red hair.'],
        ['start' => 27, 'end' => 30, 'text' => 'Number 5 has got short curly blonde hair.'],
        ['start' => 30, 'end' => 33, 'text' => 'Number 6 has got short curly black hair.'],
        ['start' => 33, 'end' => 35, 'text' => 'Now listen and guess!'],

        ['start' => 35, 'end' => 39, 'text' => 'Description 1:'],
        ['start' => 39, 'end' => 42, 'text' => 'He has got curly hair.'],
        ['start' => 42, 'end' => 45, 'text' => 'He has got a beard.'],
        ['start' => 45, 'end' => 48, 'text' => 'He has got green eyes.'],
        ['start' => 48, 'end' => 52, 'text' => 'Who is it? It’s number 2!'],

        ['start' => 52, 'end' => 55, 'text' => 'Description 2:'],
        ['start' => 55, 'end' => 58, 'text' => 'She has got black hair.'],
        ['start' => 58, 'end' => 61, 'text' => 'She has got straight hair.'],
        ['start' => 61, 'end' => 64, 'text' => 'She has got brown eyes.'],
        ['start' => 64, 'end' => 68, 'text' => 'Who is it? It’s number 3!'],

        ['start' => 68, 'end' => 71, 'text' => 'Description 3:'],
        ['start' => 71, 'end' => 74, 'text' => 'He has got short black hair.'],
        ['start' => 74, 'end' => 77, 'text' => 'He has got a moustache.'],
        ['start' => 77, 'end' => 81, 'text' => 'He hasn’t got a beard.'],
        ['start' => 81, 'end' => 85, 'text' => 'Who is it? It’s number 1!'],
    ],
];
?>

@include('slider.video.interactive', ['content' => $content])