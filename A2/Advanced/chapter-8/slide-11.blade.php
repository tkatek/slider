<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-8/video/learning-english.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-8/img/slide11.webp'),
    'isQuiz'    => 0,

    'questions' => [],

    'subtitles' => [
        [
            'start' => 10,
            'end' => 13,
            'text' => "What's the most difficult thing about learning English?",
        ],
        [
            'start' => 13,
            'end' => 16,
            'text' => "I think it's remembering the words.",
        ],
        [
            'start' => 16,
            'end' => 19,
            'text' => "Vocabulary.",
        ],
        [
            'start' => 19,
            'end' => 21,
            'text' => "In my opinion, it is to be able to define all the accents,",
        ],
        [
            'start' => 21,
            'end' => 26,
            'text' => "which is really hard.",
        ],
        [
            'start' => 26,
            'end' => 32,
            'text' => "I think it is when you need to understand the vocabulary. I think this is the most difficult part.",
        ],
        [
            'start' => 32,
            'end' => 39,
            'text' => "For me, it would be the writing, you know, the way you build the sentence.",
        ],
        [
            'start' => 39,
            'end' => 43,
            'text' => "I'm Spanish, so it's completely the opposite way. So that would be difficult for me.",
        ],
        [
            'start' => 43,
            'end' => 51,
            'text' => "I think that the most difficult thing is to understand what people are saying and to understand slang.",
        ],
        [
            'start' => 51,
            'end' => 57,
            'text' => "I have to say the big words, like learning the big words.",
        ],
        [
            'start' => 57,
            'end' => 62,
            'text' => "How to communicate with people, like when to say the right word.",
        ],
        [
            'start' => 62,
            'end' => 70,
            'text' => "For example, if you want to say to somebody that I understand, you can say I comprehend as well.",
        ],
        [
            'start' => 70,
            'end' => 79,
            'text' => "Just synonyms of other words, just knowing synonyms and stuff like that.",
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])