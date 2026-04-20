<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening: A clean freak!',
    'subtitle'   => 'Listen to two people talking about what they did yesterday',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Man',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/man.webp'),
        ],
        'right' => [
            'name'  => 'Woman',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/woman.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "So what did you do yesterday?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A2/Beginner/chapter-4/audios/slide15/1.mp3"),
        ],
        [
            'text'   => "Nothing much, just <span class=\"text-red-500 font-black\">chores</span>. I washed the dishes, <span class=\"text-red-500 font-black\">vacuumed</span>, and mopped the floors.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A2/Beginner/chapter-4/audios/slide15/2.mp3"),
        ],
        [
            'text'   => "Yeah, me too.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A2/Beginner/chapter-4/audios/slide15/3.mp3"),
        ],
        [
            'text'   => "Really, are you <span class=\"text-red-500 font-black\">a clean freak</span>?",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A2/Beginner/chapter-4/audios/slide15/4.mp3"),
        ],
        [
            'text'   => "Not so much, but my place needed a good cleaning.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A2/Beginner/chapter-4/audios/slide15/5.mp3"),
        ],
        [
            'text'   => "Was your place pretty dirty?",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A2/Beginner/chapter-4/audios/slide15/6.mp3"),
        ],
        [
            'text'   => "Yeah, it was pretty bad. But I cleaned the bathroom, picked up my dirty clothes, washed them and <span class=\"text-red-500 font-black\">emptied</span> the rubbish, so now it looks <span class=\"text-red-500 font-black\">respectable</span>.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A2/Beginner/chapter-4/audios/slide15/7.mp3"),
        ],
        [
            'text'   => "Yeah, you can only <span class=\"text-red-500 font-black\">put</span> things <span class=\"text-red-500 font-black\">off</span> for so long.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A2/Beginner/chapter-4/audios/slide15/8.mp3"),
        ],
        [
            'text'   => "That’s right.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A2/Beginner/chapter-4/audios/slide15/9.mp3"),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])
