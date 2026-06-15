<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen to the conversation & then, role-play it:',

    'people' => [
        'left'  => [
            'name'  => 'Alfie',
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/alfie.webp'),
        ],
        'right' => [
            'name'  => 'Abbi',
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/abbi.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => 'Hey Abbi, what do you prefer, indoor or outdoor activities?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-6/audios/slide10/1.mp3'),
        ],
        [
            'text'   => 'I would say outdoor activities, for sure. I love hiking and camping.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-6/audios/slide10/2.mp3'),
        ],
        [
            'text'   => "That's cool. I'm more of an indoor person. I like reading and watching movies at home.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-6/audios/slide10/3.mp3'),
        ],
        [
            'text'   => 'Yeah, I also like those things, but I feel like I need some fresh air and nature from time to time.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-6/audios/slide10/4.mp3'),
        ],
        [
            'text'   => 'I understand that. I just feel more comfortable indoors, I guess.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-6/audios/slide10/5.mp3'),
        ],
        [
            'text'   => "I get it. But you should try some outdoor activities with me sometime. Maybe you'll change your mind.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-6/audios/slide10/6.mp3'),
        ],
        [
            'text'   => "Sure, I'm open to new experiences. Maybe you can show me some good hiking spots.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-6/audios/slide10/7.mp3'),
        ],
    ],
];

?>

@include("slider.vocab.image-conversation", ['content' => $content])