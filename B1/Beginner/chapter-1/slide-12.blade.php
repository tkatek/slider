<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen out for useful language for asking a favour. Then, role-play the dialogue:',

    'people' => [
        'left'  => [
            'name'  => 'Noelia',
            'image' => materialAsset('slider/B1/Beginner/chapter-1/img/noelia.webp'),
        ],
        'right' => [
            'name'  => 'Paul',
            'image' => materialAsset('slider/B1/Beginner/chapter-1/img/paul.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Hi, Paul. Have you got a minute? I need a favour.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/1.mp3'),
        ],
        [
            'text'   => "Sure. What do you need help with?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/2.mp3'),
        ],
        [
            'text'   => "You know the project for Active Arctic?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/3.mp3'),
        ],
        [
            'text'   => "Yes. We finally finished it!",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/4.mp3'),
        ],
        [
            'text'   => "Well… I’m really sorry, but the client wants some more changes.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/5.mp3'),
        ],
        [
            'text'   => "Really? I already changed it many times!",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/6.mp3'),
        ],
        [
            'text'   => "I know. I’m sorry. Would you be able to work on it this afternoon?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/7.mp3'),
        ],
        [
            'text'   => "I’m not really sure if I can. I’m working on another project today.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/8.mp3'),
        ],
        [
            'text'   => "Oh right. Is there any chance you could work late tonight?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/9.mp3'),
        ],
        [
            'text'   => "Sorry, Noelia. I would if I could, but I can’t.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/10.mp3'),
        ],
        [
            'text'   => "Why not?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/11.mp3'),
        ],
        [
            'text'   => "I’m taking my niece to the cinema for her birthday.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/12.mp3'),
        ],
        [
            'text'   => "OK. Then could you come early tomorrow morning?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/13.mp3'),
        ],
        [
            'text'   => "Maybe. What time?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/14.mp3'),
        ],
        [
            'text'   => "6 a.m.?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/15.mp3'),
        ],
        [
            'text'   => "That’s too early! How about 7 a.m.?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/16.mp3'),
        ],
        [
            'text'   => "OK. Deal!",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/17.mp3'),
        ],
        [
            'text'   => "Deal!",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-1/audios/slide12/18.mp3'),
        ],
    ],
];

?>

@include("slider.vocab.image-conversation", ['content' => $content])