<?php

$content = [
    'mode' => 'choice_table',
    'page_title' => 'Listening',
    'title' => 'Listening',
    'subtitle' => 'Listen to three people talk about a talent they they wish they had or would like to learn',
    'instruction' => 'Listen and match each speaker with the correct wish.',
    'instruction_note' => '',
    'audio' => materialAsset('slider/B1/Beginner/chapter-7/audios/slide13.mp3'),

    'transcript' => [
        "Paul / England: I wish I was able to play the guitar to a high standard. I have recently bought a guitar; however, I'm not yet able to play. It's something I feel that is also kind of a social thing, where you can play music, which people will always respond to and enjoy.",

        "Tim / United States: I wish that I could sing. I can't sing very well, I feel, but there are a lot of people who think I would have a good singing voice. But since I'm not very confident with singing and never really try, I don't know how to get better. So, I wish I was just better at it automatically.",

        "Warren / Canada: I really wish I could speak some other languages. I studied French when I was a kid, and I actually have forgotten most of it now, so I would like to go back and learn that again. But I'd also be interested in learning some other languages as well.",
    ],

    'row_heading' => 'Speaker',

    'options' => [
        'a' => 'Speak other languages',
        'b' => 'Sing well',
        'c' => 'Play the guitar',
    ],

    'rows' => [
        ['number' => 1, 'item' => 'Paul', 'correct' => 'c'],
        ['number' => 2, 'item' => 'Tim', 'correct' => 'b'],
        ['number' => 3, 'item' => 'Warren', 'correct' => 'a'],
    ],
];

?>

@include('slider.game.listening-table', ['content' => $content])