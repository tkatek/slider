<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-8/video/most-deficult-encrypted/most-deficult.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-8/img/slide11.webp'),
    'isQuiz'    => 0,

    'questions' => [],

    'subtitles' => [
        [
            'start' => 6.5,
            'end' => 12,
            'text' => "English I think it's remembering the words, Vocabulary",
        ],

        [
            'start' => 13.5,
            'end' => 18.5,
            'text' => "In my opinion, it is to be able to define all the accents, which is really hard.",
        ],

        [
            'start' => 20,
            'end' => 27,
            'text' => "I think it is when you need to understand the vocabulary. I think this is the most difficult part.",
        ],
        [
            'start' => 28,
            'end' => 38.5,
            'text' => "For me, it would be the writing, you know, the way you build the sentence, I'm Spanish, so it's completely the opposite way. So that would be difficult for me.",
        ],

        [
            'start' => 38.5,
            'end' => 46.5,
            'text' => "I think that the most difficult thing is to understand what people are saying and to understand slang.",
        ],
        [
            'start' => 47,
            'end' => 55,
            'text' => "I have to say the big words, like learning the big words, How to communicate with people, like you know",
        ],
        [
            'start' => 56,
            'end' => 59.5,
            'text' => "when to say the right word. Like for example if you say",
        ],

        [
            'start' => 59.5,
            'end' => 66.5,
            'text' => "If you want to say to somebody that I understand you know, you can say I comprehend as well.",
        ],
        [
            'start' => 67,
            'end' => 72,
            'text' => "Just synonyms of other words, just knowing synonyms and stuff like that.",
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])