<?php
$content['page_title'] = 'Practice 5';
$content['title'] = 'Practice 5';
$content['subtitle'] = 'Read the sentences & match with the right picture';
$content['type'] = 'grid';

$content['items'] = [
    [
        'key' => 'brian',
        'text' => 'is a young man with glasses. He has dark skin.',
        'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/1.webp'),
        'caption' => 'Brian',
    ],
    [
        'key' => 'clara',
        'text' => 'is a girl. She has long fair hair and brown eyes.',
        'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/2.webp'),
        'caption' => 'Clara',
    ],
    [
        'key' => 'ricardo',
        'text' => 'is a bald man. He is a middle-aged man with dirty beard.',
        'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/3.webp'),
        'caption' => 'Ricardo',
    ],
    [
        'key' => 'karen',
        'text' => 'is a teenager with short brown hair and brown eyes.',
        'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/4.webp'),
        'caption' => 'Karen',
    ],
    [
        'key' => 'david',
        'text' => 'is an old man. He is tall and medium-weight.',
        'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/5.webp'),
        'caption' => 'David',
    ],
    [
        'key' => 'maria',
        'text' => 'is a young woman. She has dark skin and long straight black hair.',
        'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/6.webp'),
        'caption' => 'Maria',
    ],
    [
        'key' => 'ted',
        'text' => 'is a young man with long beard and moustache.',
        'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/7.webp'),
        'caption' => 'Ted',
    ],
    [
        'key' => 'sam',
        'text' => 'is a school boy with glasses. He has short fair hair and blue eyes.',
        'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/8.webp'),
        'caption' => 'Sam',
    ],
];
?>

@include('slider.game.guess-who', ['content' => $content])