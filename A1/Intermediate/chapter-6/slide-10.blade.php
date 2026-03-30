<?php
$content = [
    'page_title' => 'Reporting a Car Accident',
    'title'      => 'Reporting a Car Accident',
    'subtitle'   => 'Example 1',

    'show_footer_image' => 1,
    'footer_image'      => materialAsset('slider/A1/Intermediate/chapter-6/img/reporting-accident.webp'),

    'people' => [
        'left'  => [
            'name'  => 'Caller',
            'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/caller-2.webp'),
        ],
        'right' => [
            'name'  => 'Operator',
            'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/operator.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => '911, what is your emergency?',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide10/1.mp3'),
        ],
        [
            'text'   => 'There is a car accident.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide10/2.mp3'),
        ],
        [
            'text'   => 'Where are you?',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide10/3.mp3'),
        ],
        [
            'text'   => 'At Main Street and 5th Street.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide10/4.mp3'),
        ],
        [
            'text'   => 'Is anyone hurt?',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide10/5.mp3'),
        ],
        [
            'text'   => 'Yes. One person is hurt. He is not moving.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide10/6.mp3'),
        ],
        [
            'text'   => 'Okay. An ambulance is coming now. Stay on the phone.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide10/7.mp3'),
        ],
        [
            'text'   => 'Okay. I will stay here.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide10/8.mp3'),
        ],
    ],
];
?>

@include('slider.vocab.image-conversation', ['content' => $content])