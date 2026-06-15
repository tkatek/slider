<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Trevor answers questions about what he takes to the beach.',

    'people' => [
        'left'  => [
            'name'  => 'Todd',
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/todd.webp'),
        ],
        'right' => [
            'name'  => 'Trevor',
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/trevor.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Trevor, do you like the beach?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/1.mp3'),
        ],
        [
            'text'   => "I love the beach. The beach is great.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/2.mp3'),
        ],
        [
            'text'   => "OK. Why do you love the beach?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/3.mp3'),
        ],
        [
            'text'   => "It's nice fresh air, beautiful water, you can play in the sand, and my hobby is surfing, so I like to go surfing.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/4.mp3'),
        ],
        [
            'text'   => "Oh..nice. How often do you go surfing?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/5.mp3'),
        ],
        [
            'text'   => "I try to go as often as possible, usually every weekend.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/6.mp3'),
        ],
        [
            'text'   => "OK. When do you go to the beach? Saturday? Sunday?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/7.mp3'),
        ],
        [
            'text'   => "Usually early on a Saturday morning. Try to beat the crowds.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/8.mp3'),
        ],
        [
            'text'   => "OK. What do you do at the beach besides surfing?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/9.mp3'),
        ],
        [
            'text'   => "Oh, just relax on the sand, watch the people, maybe have a swim, throw a frisbee.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/10.mp3'),
        ],
        [
            'text'   => "OK.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/11.mp3'),
        ],
        [
            'text'   => "Things like that!",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/12.mp3'),
        ],
        [
            'text'   => "How long have you been surfing?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/13.mp3'),
        ],
        [
            'text'   => "Since I was ten years old.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/14.mp3'),
        ],
        [
            'text'   => "Wow, since you were ten. That's great! -- What do you take to the beach, when you go?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/15.mp3'),
        ],
        [
            'text'   => "A towel, and my hat, my sunscreen, my surfboard, wetsuit, some food and water, and maybe a radio.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/16.mp3'),
        ],
        [
            'text'   => "OK. Now, you are from Australia. How are the beaches different in Australia than Japan?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/17.mp3'),
        ],
        [
            'text'   => "The beaches are much bigger and white sand, clean water, very nice.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/18.mp3'),
        ],
        [
            'text'   => "OK. Well, sounds good. Thanks a lot Trevor.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/19.mp3'),
        ],
        [
            'text'   => "OK. Catch you later.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-5/audios/slide14/20.mp3'),
        ],
    ],
];

?>

@include("slider.vocab.image-conversation", ['content' => $content])