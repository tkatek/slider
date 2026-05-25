<?php
$content = [
    'title'    => 'Practice 5',
    'subtitle' => 'Read the sentences & match with the right picture',

    'questions' => [
        [
            'id'    => '1',
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/1.webp'),
            'word'  => 'is a young man with glasses. He has dark skin.',
        ],
        [
            'id'    => '2',
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/2.webp'),
            'word'  => 'is a girl. She has long fair hair and brown eyes.',
        ],
        [
            'id'    => '3',
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/3.webp'),
            'word'  => 'is a bald man. He is a middle-aged man with dirty beard.',
        ],
        [
            'id'    => '4',
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/4.webp'),
            'word'  => 'is a teenager with short brown hair and brown eyes.',
        ],
        [
            'id'    => '5',
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/5.webp'),
            'word'  => 'is an old man. He is tall and medium-weight.',
        ],
        [
            'id'    => '6',
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/6.webp'),
            'word'  => 'is a young woman. She has dark skin and long straight black hair.',
        ],
        [
            'id'    => '7',
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/7.webp'),
            'word'  => 'is a young man with long beard and moustache.',
        ],
        [
            'id'    => '8',
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/8.webp'),
            'word'  => 'is a school boy with glasses. He has short fair hair and blue eyes.',
        ],
    ],
];
?>

@include('slider.game.match-picture-word', ['content' => $content])