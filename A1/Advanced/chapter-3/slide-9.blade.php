<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Learn how to check out of a hotel clearly and confidently.',

    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Receptionist',
            'image' => materialAsset("slider/A1/Advanced/chapter-3/img/receptionist.webp"),
        ],
        'right' => [
            'name'  => 'Daniel Adams',
            'image' => materialAsset("slider/A1/Advanced/chapter-3/img/daniel.webp"),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Good morning. May I help you?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Advanced/chapter-3/audios/slide9/1.mp3"),
        ],
        [
            'text'   => "Yes, I'd like to check out now. My name's Adams, room 312. Here's the key.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Advanced/chapter-3/audios/slide9/2.mp3"),
        ],
        [
            'text'   => "One moment, please, sir. ... Here's your bill. Would you like to check and see if the amount is correct?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Advanced/chapter-3/audios/slide9/3.mp3"),
        ],
        [
            'text'   => "What's the 14 pounds for?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Advanced/chapter-3/audios/slide9/4.mp3"),
        ],
        [
            'text'   => "That's for the phone calls you made from your room.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Advanced/chapter-3/audios/slide9/5.mp3"),
        ],
        [
            'text'   => "Can I pay with traveller's cheques?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Advanced/chapter-3/audios/slide9/6.mp3"),
        ],
        [
            'text'   => "Certainly. May I have your passport, please?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Advanced/chapter-3/audios/slide9/7.mp3"),
        ],
        [
            'text'   => "Here you are.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Advanced/chapter-3/audios/slide9/8.mp3"),
        ],
        [
            'text'   => "Could you sign each cheque here for me?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Advanced/chapter-3/audios/slide9/9.mp3"),
        ],
        [
            'text'   => "Sure.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Advanced/chapter-3/audios/slide9/10.mp3"),
        ],
        [
            'text'   => "Here are your receipt and your change, sir. Thank you.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Advanced/chapter-3/audios/slide9/11.mp3"),
        ],
        [
            'text'   => "Thank you. Goodbye.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Advanced/chapter-3/audios/slide9/12.mp3"),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])