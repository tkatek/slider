<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-1/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-5/img/slide5.webp'),
    'isQuiz'    => 0,

    'questions' => [],

    'subtitles'  => [
        [
            'start' => 0,
            'end'   => 8,
            'text'  => 'The hardest thing is that you kind of get homesick, of course, like missing your family. I really miss my cat.',
        ],
        [
            'start' => 8,
            'end'   => 15,
            'text'  => 'I miss a hug. I miss a kiss from my mom, you know, even her nagging.',
        ],
        [
            'start' => 15,
            'end'   => 23,
            'text'  => 'When I was homesick, I focused on my goals, so what I would like to be...',
        ],
        [
            'start' => 23,
            'end'   => 32,
            'text'  => 'Everything was new for us, so just take a map and start learning every single thing.',
        ],
        [
            'start' => 32,
            'end'   => 42,
            'text'  => 'I had a little bit of English at the beginning, and it was American English, so when I came here I had to relearn everything.',
        ],
        [
            'start' => 42,
            'end'   => 49,
            'text'  => 'I didn’t know anything.',
        ],
        [
            'start' => 49,
            'end'   => 57,
            'text'  => 'The first week was difficult because when you arrive, you live with a new person, and it is difficult.',
        ],
        [
            'start' => 57,
            'end'   => 67,
            'text'  => 'Sometimes I miss simple things, like buying food in the streets for one dollar.',
        ],
        [
            'start' => 67,
            'end'   => 74,
            'text'  => 'But these are simple things that you just need to adapt to.',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])