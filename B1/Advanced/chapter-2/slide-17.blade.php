<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen & practise, then answer the questions.',

    'people' => [
        'left'  => [
            'name'  => 'Aisha',
            'image' => materialAsset('slider/B1/Advanced/chapter-2/img/aisha.webp'),
        ],
        'right' => [
            'name'  => 'Husband',
            'image' => materialAsset('slider/B1/Advanced/chapter-2/img/husband.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Let’s go on holiday this June.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-2/audios/slide17/1.mp3'),
        ],
        [
            'text'   => "Oh, I’m not sure I can get time off from work.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-2/audios/slide17/2.mp3'),
        ],
        [
            'text'   => "Can you ask your manager?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-2/audios/slide17/3.mp3'),
        ],
        [
            'text'   => "Well, I know for a fact he will say ‘no’. He’s been in a bad mood all week. Have you asked your manager?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-2/audios/slide17/4.mp3'),
        ],
        [
            'text'   => "Not yet, but she will probably agree.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-2/audios/slide17/5.mp3'),
        ],
        [
            'text'   => "Okay. I will try to ask him tomorrow, but I’d be surprised if he agrees.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-2/audios/slide17/6.mp3'),
        ],
    ],
];

?>

@include("slider.vocab.image-conversation", ['content' => $content])