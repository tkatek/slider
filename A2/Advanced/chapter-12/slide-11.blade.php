<?php

$content = [
    'page_title' => 'Grammar',
    'title'      => 'Grammar',
    'subtitle'   => 'Watch this video!',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A2/Advanced/chapter-12/videos/present-continuous-encrypted/present-continuous.m3u8'),
            'thumbnail' => materialAsset('slider/A2/Advanced/chapter-12/img/slide11.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 2.5,  'end' => 6,  'text' => 'Let’s talk about an emotional use of the present continuous.'],
                ['start' => 6.7,  'end' => 10.5, 'text' => 'We sometimes use it with always to express annoying or funny habits.'],
                ['start' => 11, 'end' => 12.7, 'text' => 'He’s always losing his keys.'],
                ['start' => 13.5, 'end' => 15.5, 'text' => 'You’re always interrupting me.'],
                ['start' => 16.5, 'end' => 18, 'text' => 'She’s always complaining about work.'],
                ['start' => 19, 'end' => 22.5, 'text' => 'This shows that the habit is repeated and a little irritating.'],
                ['start' => 23.5, 'end' => 26.5, 'text' => 'Use this structure when you want to sound expressive or dramatic.'],
                ['start' => 27.5, 'end' => 29, 'text' => 'Try it now.'],
                ['start' => 29.7, 'end' => 32, 'text' => 'What’s something that always annoys you?'],
            ],
        ],
    ],
];

?>

@include("slider.video.short-video", ['content' => $content])