<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-6/video/past-cont-encrypted/past-cont.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-6/img/slide10.webp'),
    'isQuiz'     => 0,
    'subtitles'  => [
        ['start' => 0,  'end' => 3,  'text' => 'The Past Continuous.'],
        ['start' => 3,  'end' => 12, 'text' => 'The past continuous uses the past tense be verb, was or were, and the continuous tense verbs ending in -ing.'],
        ['start' => 13, 'end' => 15, 'text' => 'I was sleeping when you called.'],
        ['start' => 15.7, 'end' => 18, 'text' => 'I was jogging when it started raining.'],
        ['start' => 18.7, 'end' => 24, 'text' => 'The past continuous describes actions happening at a specific time in the past.'],
        ['start' => 25, 'end' => 28, 'text' => 'At 8:00 PM last night, I was studying.'],
        ['start' => 28.7, 'end' => 31, 'text' => 'They were walking when it started to rain.'],
        ['start' => 32, 'end' => 37, 'text' => 'The past continuous is used to express thoughts or feelings in the past.'],
        ['start' => 37.7, 'end' => 39, 'text' => 'I was just thinking about you.'],
        ['start' => 40.7, 'end' => 42.5, 'text' => 'We were thinking of ordering pizza.'],
        ['start' => 43.5, 'end' => 48, 'text' => 'The past continuous can describe an action that was interrupted by another action.'],
        ['start' => 49.5, 'end' => 52, 'text' => 'She was cooking dinner when the phone rang.'],
        ['start' => 53, 'end' => 55.5, 'text' => 'We were standing outside when the earthquake started.'],
        ['start' => 56.5, 'end' => 61.5, 'text' => 'For questions, the subject goes before the past tense be verb and the continuous tense.'],
        ['start' => 63, 'end' => 65, 'text' => 'What were you doing when I called?'],
        ['start' => 65.5, 'end' => 68, 'text' => 'Were you sleeping?'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])
