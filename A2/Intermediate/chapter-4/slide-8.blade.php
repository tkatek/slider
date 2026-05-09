<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen. What happened to Ahmed? What was he doing when it happened? <br>Practice the conversation.',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Noura',
            'image' => materialAsset('slider/A2/Intermediate/chapter-4/audios/slide8/noura.webp'),
        ],
        'right' => [
            'name'  => 'Ahmed',
            'image' => materialAsset('slider/A2/Intermediate/chapter-4/audios/slide8/ahmed.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "So, how was your ski trip? Did you have a good time?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Intermediate/chapter-4/audios/slide8/1.mp3'),
        ],
        [
            'text'   => "Yeah, I guess. I sort of had an accident.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Intermediate/chapter-4/audios/slide8/2.mp3'),
        ],
        [
            'text'   => "Oh, really? What happened? Did you hurt yourself?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Intermediate/chapter-4/audios/slide8/3.mp3'),
        ],
        [
            'text'   => "Yeah, I broke my leg.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Intermediate/chapter-4/audios/slide8/4.mp3'),
        ],
        [
            'text'   => "Oh, no! How did it happen? I mean, what were you doing?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Intermediate/chapter-4/audios/slide8/5.mp3'),
        ],
        [
            'text'   => "Well, actually, I was talking on my cell phone...",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Intermediate/chapter-4/audios/slide8/6.mp3'),
        ],
        [
            'text'   => "While you were skiing? That's kind of dangerous.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Intermediate/chapter-4/audios/slide8/7.mp3'),
        ],
        [
            'text'   => "Yeah, I know. But I was by myself, so I was lucky I had my cell to call for help.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Intermediate/chapter-4/audios/slide8/8.mp3'),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])