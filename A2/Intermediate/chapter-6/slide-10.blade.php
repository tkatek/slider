<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-6/videos/'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-6/videos/slide10.webp'),
    'isQuiz'     => 0,
    'subtitles'  => [
        ['start' => 0,  'end' => 5,  'text' => 'The Past Continuous.'],
        ['start' => 5,  'end' => 13, 'text' => 'The past continuous uses the past tense be verb, was or were, and the continuous tense verbs ending in -ing.'],
        ['start' => 13, 'end' => 18, 'text' => 'I was sleeping when you called.'],
        ['start' => 18, 'end' => 23, 'text' => 'I was jogging when it started raining.'],
        ['start' => 23, 'end' => 31, 'text' => 'The past continuous describes actions happening at a specific time in the past.'],
        ['start' => 31, 'end' => 36, 'text' => 'At 8:00 PM last night, I was studying.'],
        ['start' => 36, 'end' => 41, 'text' => 'They were walking when it started to rain.'],
        ['start' => 41, 'end' => 49, 'text' => 'The past continuous is used to express thoughts or feelings in the past.'],
        ['start' => 49, 'end' => 53, 'text' => 'I was just thinking about you.'],
        ['start' => 53, 'end' => 58, 'text' => 'We were thinking of ordering pizza.'],
        ['start' => 58, 'end' => 67, 'text' => 'The past continuous can describe an action that was interrupted by another action.'],
        ['start' => 67, 'end' => 72, 'text' => 'She was cooking dinner when the phone rang.'],
        ['start' => 72, 'end' => 77, 'text' => 'We were standing outside when the earthquake started.'],
        ['start' => 77, 'end' => 85, 'text' => 'For questions, the subject goes before the past tense be verb and the continuous tense.'],
        ['start' => 85, 'end' => 90, 'text' => 'What were you doing when I called?'],
        ['start' => 90, 'end' => 94, 'text' => 'Were you sleeping?'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])
