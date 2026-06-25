<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'SHOPPING preferences<br>Listen to a man being interviewed in the street about his shopping preferences:',

    'people' => [
        'left'  => [
            'name'  => 'Interviewer',
            'image' => materialAsset('slider/B1/Intermediate/chapter-6/img/interviewer.webp'),
        ],
        'right' => [
            'name'  => 'Speaker',
            'image' => materialAsset('slider/B1/Intermediate/chapter-6/img/shopper.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => 'Do you like shopping?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/1.mp3'),
        ],
        [
            'text'   => 'Yes, I’m a shopaholic.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/2.mp3'),
        ],
        [
            'text'   => 'What do you usually shop for?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/3.mp3'),
        ],
        [
            'text'   => 'I usually shop for clothes. I’m a big fashion fan.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/4.mp3'),
        ],
        [
            'text'   => 'Where do you go shopping?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/5.mp3'),
        ],
        [
            'text'   => 'At some fashion boutiques in my neighborhood.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/6.mp3'),
        ],
        [
            'text'   => 'Are there many shops in your neighborhood?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/7.mp3'),
        ],
        [
            'text'   => 'Yes. My area is the city center, so I have many choices of where to shop.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/8.mp3'),
        ],
        [
            'text'   => 'Do you spend much money on shopping?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/9.mp3'),
        ],
        [
            'text'   => 'Yes and I’m usually broke at the end of the month.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/10.mp3'),
        ],
        [
            'text'   => 'Do you usually shop online? What items?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/11.mp3'),
        ],
        [
            'text'   => 'Yes, but not really often. I only buy furniture online.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/12.mp3'),
        ],
        [
            'text'   => 'What’s the difference between shopping online and offline?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/13.mp3'),
        ],
        [
            'text'   => 'Unlike shopping offline, you cannot try on the pieces of clothes or check the material when shopping online.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide17/14.mp3'),
        ],
    ],
];

?>

@include("slider.vocab.image-conversation", ['content' => $content])