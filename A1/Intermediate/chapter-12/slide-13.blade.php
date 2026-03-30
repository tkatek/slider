<?php
$content = [
    'page_title' => 'Speaking',
    'title'      => 'Speaking',
    'subtitle'   => 'Matt is looking for his seat',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Matt',
            'image' => materialAsset('slider/A1/Intermediate/chapter-12/img/matt.webp'),
        ],
        'right' => [
            'name'  => 'Flight Attendant',
            'image' => materialAsset('slider/A1/Intermediate/chapter-12/img/flight-attendant.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Excuse me, could you help me find my seat?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-12/audios/slide13/1.mp3"),
        ],
        [
            'text'   => "Certainly. May I have your boarding pass?",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-12/audios/slide13/2.mp3"),
        ],
        [
            'text'   => "Here it is.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-12/audios/slide13/3.mp3"),
        ],
        [
            'text'   => "Thank you! Let me see... Your seat number is 13D. It's the aisle seat on the right side.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-12/audios/slide13/4.mp3"),
        ],
        [
            'text'   => "Thank you!",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-12/audios/slide13/5.mp3"),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])