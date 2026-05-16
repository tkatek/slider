<?php

$content = [
    'page_title' => 'Grammar',
    'title'      => 'Grammar',
    'subtitle'   => 'Watch this video!',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A2/Advanced/chapter-12/'),
            'thumbnail' => materialAsset('slider/A2/Advanced/chapter-12/img/slide11.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,  'end' => 5,  'text' => 'Let’s talk about an emotional use of the present continuous.'],
                ['start' => 5,  'end' => 10, 'text' => 'We sometimes use it with always to express annoying or funny habits.'],
                ['start' => 10, 'end' => 14, 'text' => 'He’s always losing his keys.'],
                ['start' => 14, 'end' => 18, 'text' => 'You’re always interrupting me.'],
                ['start' => 18, 'end' => 22, 'text' => 'She’s always complaining about work.'],
                ['start' => 22, 'end' => 28, 'text' => 'This shows that the habit is repeated and a little irritating.'],
                ['start' => 28, 'end' => 34, 'text' => 'Use this structure when you want to sound expressive or dramatic.'],
                ['start' => 34, 'end' => 38, 'text' => 'Try it now.'],
                ['start' => 38, 'end' => 44, 'text' => 'What’s something that always annoys you?'],
            ],
        ],
    ],
];

?>

@include("slider.video.short-video", ['content' => $content])