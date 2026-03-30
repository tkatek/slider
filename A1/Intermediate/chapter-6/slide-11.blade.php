<?php
$content = [
    'page_title' => 'Fire in a Residential Building',
    'title'      => 'Fire in a Residential Building',
    'subtitle'   => 'Example 2',

    'show_footer_image' => 1,
    'footer_image'      => materialAsset('slider/A1/Intermediate/chapter-6/img/fire-building.webp'),

    'people' => [
        'left'  => [
            'name'  => 'Caller',
            'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/caller.webp'),
        ],
        'right' => [
            'name'  => 'Operator',
            'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/operator-2.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => '911, what is your emergency?',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide11/1.mp3'),
        ],
        [
            'text'   => 'There is a fire in my apartment building.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide11/2.mp3'),
        ],
        [
            'text'   => 'Where are you?',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide11/3.mp3'),
        ],
        [
            'text'   => 'I am on Elm Street.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide11/4.mp3'),
        ],
        [
            'text'   => 'Is everyone outside?',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide11/5.mp3'),
        ],
        [
            'text'   => 'No. Some people are still inside.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide11/6.mp3'),
        ],
        [
            'text'   => 'Are you safe?',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide11/7.mp3'),
        ],
        [
            'text'   => 'Yes, I am outside now.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide11/8.mp3'),
        ],
        [
            'text'   => 'Okay. The fire truck is coming. Stay safe.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide11/9.mp3'),
        ],
        [
            'text'   => 'Thank you.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide11/10.mp3'),
        ],
    ],
];
?>

@include('slider.vocab.image-conversation', ['content' => $content])