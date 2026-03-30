<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Learn how to introduce yourself clearly and confidently.',

    // Adding these keys fixes the "Undefined Index" error in your template
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Nancy',
            'image' => materialAsset("slider/A1/Beginner/chapter-2/img/nancy2.webp"),
        ],
        'right' => [
            'name'  => 'Foley',
            'image' => materialAsset("slider/A1/Beginner/chapter-2/img/foley2.webp"),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "What's your first name?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-2/audios/slide7/whats-your-first-name.mp3"),
        ],
        [
            'text'   => "It’s Foley.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-2/audios/slide7/its-foley.mp3"),
        ],
        [
            'text'   => "What's your surname?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-2/audios/slide7/whats-your-surname.mp3"),
        ],
        [
            'text'   => "It’s Gordon.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-2/audios/slide7/its-gordon.mp3"),
        ],
        [
            'text'   => "How do you spell that?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-2/audios/slide7/how-do-you-spell-that.mp3"),
        ],
        [
            'text'   => "G-o-r-d-o-n.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-2/audios/slide7/g-o-r-d-o-n.mp3"),
        ],
        [
            'text'   => "Are you married?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-2/audios/slide7/are-you-married.mp3"),
        ],
        [
            'text'   => "No, I'm single.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-2/audios/slide7/no-im-single.mp3"),
        ],
        [
            'text'   => "What's your address?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-2/audios/slide7/whats-your-address.mp3"),
        ],
        [
            'text'   => "It's nine Horton Avenue, Manchester, M11 6JZ.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-2/audios/slide7/its-nine-horton-avenue-manchester-m11-6jz.mp3"),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])