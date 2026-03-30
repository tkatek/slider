<?php
$content = [
    'video' => materialAsset('slider/A1/Beginner/chapter-4/video/encrypted/slide4.m3u8'),
    'thumbnail'=>materialAsset('slider/A1/Beginner/chapter-4/video/my-family.webp'),
    'isQuiz' => 0, // 1 show question / 0 don't
    'questions' => [

    ],

    // Existing subtitles (used for CC overlay)
    'subtitles' => [
        ['start' => 1,  'end' => 3, 'text' => "The family tree."],
        ['start' => 3, 'end' => 5, 'text' => "A family tree is a diagram representing"],
        ['start' => 5, 'end' => 10, 'text' => "family members and how they are related."],
        ['start' => 10, 'end' => 13, 'text' => "These are my grandmother and my grandfather."],
        ['start' => 13, 'end' => 17, 'text' => "They have two children: my father and his sister."],
        ['start' => 17, 'end' => 19, 'text' => "That's my aunt."],
        ['start' => 19, 'end' => 24, 'text' => "These are also my grandparents. They are the parents of my mother. They have two children:"],
        ['start' => 24, 'end' => 27, 'text' => "my mother and her brother — that's my uncle."],
        ['start' => 27, 'end' => 30, 'text' => "My mother and my father are my parents."],
        ['start' => 30, 'end' => 36, 'text' => "They have three children: my sister, my brother, and me. We are siblings."],
        ['start' => 36, 'end' => 38, 'text' => "This is my aunt and her husband."],
        ['start' => 38, 'end' => 41, 'text' => "They have two sons. They are my cousins."],
        ['start' => 41, 'end' => 50, 'text' => "My mother's brother is my uncle. This is my second aunt, his wife. They have a daughter; she is also my cousin."],
        ['start' => 50, 'end' => 53, 'text' => "This is my family tree."],
    ],

    // Optional full transcript panel data (if empty, it falls back to subtitles)
    'transcript' => [
        // Example:
        // ['start' => 9, 'end' => 20, 'text' => 'The family tree. A family tree is a diagram representing family members and how they are related.'],
    ],
];
?>

@include("slider.video.interactive",['content'=>$content])