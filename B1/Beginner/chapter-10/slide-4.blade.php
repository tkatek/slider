<?php
$content = [
    'page_title' => 'Story Time',
    'title'      => 'Story Time!',
    'subtitle'   => 'Listen to the story and answer the questions',
    'story_goal_title' => '',
    'story_goals' => [],

    'book' => [
        'cover_title'   => 'The Cookie Mystery',
        'cover_audio'   => materialAsset('slider/B1/Beginner/chapter-10/audios/slide4/0.mp3'),
        'cover_image'   => materialAsset('slider/B1/Beginner/chapter-10/img/slide4/1.webp'),
        'cover_alt'     => '',
        'author'        => '',
        'restart_label' => 'Start over',

        'pages' => [
            [
                'type'  => 'image',
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide4/2.webp'),
                'alt'   => 'Emma looking at the empty cooling rack',
            ],
            [
                'type' => 'text',
                'text' => 'Emma looked at the cooling rack on the counter. She had baked the cookies with extra chocolate chips. Now, they were all gone.',
                'sound' => materialAsset('slider/B1/Beginner/chapter-10/audios/slide4/1.mp3'),
            ],
            [
                'type'  => 'image',
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide4/3.webp'),
                'alt'   => 'Emma searching for clues with a magnifying glass',
            ],
            [
                'type' => 'text',
                'text' => 'Emma searched for any clues near the stove. The cookies had vanished while she was playing in the yard. She picked up her magnifying glass to investigate.',
                'sound' => materialAsset('slider/B1/Beginner/chapter-10/audios/slide4/2.mp3'),
            ],
            [
                'type'  => 'image',
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide4/4.webp'),
                'alt'   => 'Max building a robot out of blocks',
            ],
            [
                'type' => 'text',
                'text' => 'She found her brother, Max, in the playroom. He had spent the whole hour building a giant robot out of blocks. Max showed her his clean, dry hands.',
                'sound' => materialAsset('slider/B1/Beginner/chapter-10/audios/slide4/3.mp3'),
            ],
            [
                'type'  => 'image',
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide4/5.webp'),
                'alt'   => 'Barnaby the dog sleeping by the window',
            ],
            [
                'type' => 'text',
                'text' => 'Emma went to check on Barnaby the dog. The dog had snoozed soundly in his favorite spot by the window. He woke up and wagged his tail, but he did not have any crumbs on his fur.',
                'sound' => materialAsset('slider/B1/Beginner/chapter-10/audios/slide4/4.mp3'),
            ],
            [
                'type'  => 'image',
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide4/6.webp'),
                'alt'   => 'A trail of crumbs leading to the garden',
            ],
            [
                'type' => 'text',
                'text' => 'Near the back door, Emma spotted a trail. Someone had left a path of crumbs leading out to the garden. She followed the clues across the grass.',
                'sound' => materialAsset('slider/B1/Beginner/chapter-10/audios/slide4/5.mp3'),
            ],
            [
                'type'  => 'image',
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide4/7.webp'),
                'alt'   => 'Arthur sitting on a garden bench with chocolate on his cheek',
            ],
            [
                'type' => 'text',
                'text' => 'She found Dad, whose name was Arthur, sitting on a bench. He had eaten every single treat on the tray. He still had a tiny smudge of chocolate on his cheek.',
                'sound' => materialAsset('slider/B1/Beginner/chapter-10/audios/slide4/6.mp3'),
            ],
            [
                'type'  => 'image',
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide4/8.webp'),
                'alt'   => 'Emma and Arthur baking cookies together',
            ],
            [
                'type'    => 'text',
                'text'    => 'Arthur looked very sheepish as he explained. He had assumed the cookies were a special snack for the whole family. He said he was very sorry for eating them all. Emma and Arthur headed back to the kitchen to start again. They had decided to bake a double batch so there would be plenty for everyone.',
                'sound'   => materialAsset('slider/B1/Beginner/chapter-10/audios/slide4/7.mp3'),
                'is_last' => true,
            ],
        ],
    ],
];
?>

@include('slider.other.reading-book', ['content' => $content])