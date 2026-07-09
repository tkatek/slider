<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen to Sarah & Omar talking about “Empathising with others can happen because of visual triggers”.',

    'people' => [
        'left'  => [
            'name'  => 'Sarah',
            'image' => materialAsset('slider/B1/Intermediate/chapter-11/img/sarah.webp'),
        ],
        'right' => [
            'name'  => 'Omar',
            'image' => materialAsset('slider/B1/Intermediate/chapter-11/img/omar.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => 'Omar, have you ever watched a film and suddenly looked away during a scene?',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/1.mp3'),
        ],
        [
            'text'   => 'Yes, definitely! Why do you think that happens?',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/2.mp3'),
        ],
        [
            'text'   => 'It can happen because of empathy. Sometimes we imagine how another person feels, and it affects us emotionally.',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/3.mp3'),
        ],
        [
            'text'   => 'Can you give me an example?',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/4.mp3'),
        ],
        [
            'text'   => "Sure. Imagine you're watching a film and something horrible is about to happen to a character. For example, someone is about to have their arm injured or their hand crushed.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/5.mp3'),
        ],
        [
            'text'   => 'Oh, I know what you mean! I usually go, "Ugh!" and turn my head away.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/6.mp3'),
        ],
        [
            'text'   => "Exactly. That's because your empathy is so strong that you can imagine what that experience might feel like if it happened to you.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/7.mp3'),
        ],
        [
            'text'   => "So, even though it isn't happening to me, I still react as if I can feel the pain?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/8.mp3'),
        ],
        [
            'text'   => "That's right. Your brain helps you put yourself in the other person's situation.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/9.mp3'),
        ],
        [
            'text'   => 'Are there any other examples of this?',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/10.mp3'),
        ],
        [
            'text'   => 'Yes. Think about getting an injection or a vaccination.',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/11.mp3'),
        ],
        [
            'text'   => 'You mean when the needle goes into your arm?',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/12.mp3'),
        ],
        [
            'text'   => 'Exactly. Some people feel uncomfortable even when they are just watching someone else get an injection.',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/13.mp3'),
        ],
        [
            'text'   => "That's true! Sometimes I feel nervous just seeing the needle.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/14.mp3'),
        ],
        [
            'text'   => "That's another example of empathy being triggered by something we see.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/15.mp3'),
        ],
        [
            'text'   => "So visual triggers can make us imagine another person's feelings or pain.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/16.mp3'),
        ],
        [
            'text'   => "Yes, and that's one of the ways empathy works.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide16/17.mp3'),
        ],
    ],
];

?>

@include("slider.vocab.image-conversation", ['content' => $content])