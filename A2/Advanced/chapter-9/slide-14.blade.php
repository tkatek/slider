<?php
$content = [
    'page_title' => 'Story Time',
    'title'      => 'Story Time!',
    'subtitle'   => 'Listen to this motivational story.',
    'story_goal_title' => '',
    'story_goals' => [
        'Say what is the moral behind it',
        'Practise reading it',
    ],

    'book' => [
        'cover_title'   => 'One Hop at a Time',
        'cover_audio'   => materialAsset('slider/A2/Advanced/chapter-9/audios/slide14/0.mp3'),
        'cover_image'   => materialAsset('slider/A2/Advanced/chapter-9/img/slide14/1.webp'),
        'cover_alt'     => '',
        'author'        => '',
        'restart_label' => 'Start over',

        'pages' => [
            [
                'type'  => 'image',
                'image' => materialAsset('slider/A2/Advanced/chapter-9/img/slide14/2.webp'),
                'alt'   => 'Squeaky the little squirrel in a big green forest',
            ],
            [
                'type' => 'text',
                'text' => 'Squeaky is a little squirrel. He lives in a big, green forest. He has a very big dream.',
                'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide14/1.mp3'),
            ],
            [
                'type'  => 'image',
                'image' => materialAsset('slider/A2/Advanced/chapter-9/img/slide14/3.webp'),
                'alt'   => 'Squeaky trying to climb a thick tree',
            ],
            [
                'type' => 'text',
                'text' => 'Squeaky wants that acorn. He tries to climb the thick tree. But his little paws slip. He slides down, down, down. Thump! Squeaky lands in a pile of soft, orange leaves. “I cannot do it,” he says. Squeaky feels very sad.',
                'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide14/2.mp3'),
            ],
            [
                'type'  => 'image',
                'image' => materialAsset('slider/A2/Advanced/chapter-9/img/slide14/4.webp'),
                'alt'   => 'Professor Hoot the owl looking down from the tree',
            ],
            [
                'type' => 'text',
                'text' => 'Above him, a big bird opens one round eye. It is Professor Hoot the owl. He is very wise. “Do not be sad,” says Professor Hoot. “The top is far away. Do not look at the top. Just look at the next branch.”',
                'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide14/3.mp3'),
            ],
            [
                'type'  => 'image',
                'image' => materialAsset('slider/A2/Advanced/chapter-9/img/slide14/5.webp'),
                'alt'   => 'Squeaky hopping onto the first branch',
            ],
            [
                'type' => 'text',
                'text' => 'Squeaky looks at the very first branch. It is not too far. He takes a big breath. Hop! He makes it! Now Squeaky looks at the next branch. He hops again. Then another hop. One branch at a time, he goes higher.',
                'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide14/4.mp3'),
            ],
            [
                'type'  => 'image',
                'image' => materialAsset('slider/A2/Advanced/chapter-9/img/slide14/6.webp'),
                'alt'   => 'Squeaky at the top of the tree holding the shiny acorn',
            ],
            [
                'type'    => 'text',
                'text'    => 'Soon, Squeaky is at the very top! The forest looks small below. He grabs the shiny acorn. It is crunchy and perfect. Squeaky is so proud. He learned a big secret. Even the tallest trees are easy to climb when you take small, steady steps.',
                'sound'   => materialAsset('slider/A2/Advanced/chapter-9/audios/slide14/5.mp3'),
                'is_last' => true,
            ],
        ],
    ],
];
?>
@include('slider.other.reading-book', ['content' => $content])
