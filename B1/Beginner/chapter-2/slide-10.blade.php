<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Is it important to thank people?why? why not?<br>Listen to the conversation & role play the dialogue:',

    'people' => [
        'left'  => [
            'name'  => 'Sam',
            'image' => materialAsset('slider/B1/Beginner/chapter-2/img/sam.webp'),
        ],
        'right' => [
            'name'  => 'Neil',
            'image' => materialAsset('slider/B1/Beginner/chapter-2/img/neil.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Hello. This is 6 Minute English. I’m Sam.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/1.mp3'),
        ],
        [
            'text'   => "And I’m Neil. Today we’re talking about kindness. Sam, when was the last time you did something kind?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/2.mp3'),
        ],
        [
            'text'   => "I gave my mum flowers last week.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/3.mp3'),
        ],
        [
            'text'   => "That was kind! How did it feel?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/4.mp3'),
        ],
        [
            'text'   => "It felt really good.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/5.mp3'),
        ],
        [
            'text'   => "Scientists say people feel happy when they are kind to others.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/6.mp3'),
        ],
        [
            'text'   => "Yes. Sometimes people do small kind things for strangers. These are called random acts of kindness.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/7.mp3'),
        ],
        [
            'text'   => "Like helping someone carry bags or giving someone a smile.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/8.mp3'),
        ],
        [
            'text'   => "Exactly. One study showed that giving a smile was the most common act of kindness.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/9.mp3'),
        ],
        [
            'text'   => "Psychologists say kindness gives us a warm glow — a happy feeling inside.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/10.mp3'),
        ],
        [
            'text'   => "Kindness and compassion can also help make society better.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/11.mp3'),
        ],
        [
            'text'   => "So remember: small acts of kindness can make a big difference.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/12.mp3'),
        ],
        [
            'text'   => "And they can make both people happy!",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/13.mp3'),
        ],
    ],
];

?>

@include("slider.vocab.image-conversation", ['content' => $content])