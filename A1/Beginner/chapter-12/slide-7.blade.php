<?php
$content = [
    'page_title' => 'Setting up a Bank Account',
    'title'      => 'Setting up a Bank Account',
    'subtitle'   => '',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A1/Beginner/chapter-12/video/short-2-encrypted/short-2.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Beginner/chapter-12/video/at-the-bank.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,    'end' => 1,  'text' => 'Good morning.'],
                ['start' => 1,  'end' => 3,  'text' => 'Good morning, sir.'],
                ['start' => 3,  'end' => 6,  'text' => 'How can I help you today?'],
                ['start' => 6,  'end' => 9, 'text' => "I'd like to open a new savings account."],
                ['start' => 9, 'end' => 13, 'text' => 'Sure. Do you have your ID card with you?'],
                ['start' => 13, 'end' => 15, 'text' => 'Yes, here it is.'],
                ['start' => 15, 'end' => 16, 'text' => 'Thank you.'],
                ['start' => 19, 'end' => 21, 'text' => 'Please fill out this form.'],
                ['start' => 21, 'end' => 22, 'text' => 'Here you are.'],
                ['start' => 22, 'end' => 24, 'text' => 'Thank you, Ill fill it out now '],
                ['start' => 24, 'end' => 26, 'text' => 'Take your time '],


                ['start' => 27, 'end' => 31, 'text' => 'Do I need to give a photo too?'],

                ['start' => 31, 'end' => 35, 'text' => 'Yes. One passport-size photo is required.'],
                ['start' => 35, 'end' => 39, 'text' => 'All right. I have one with me.'],
                ['start' => 41, 'end' => 44, 'text' => 'Perfect. How much would you like to deposit today?'],
                ['start' => 44, 'end' => 47, 'text' => "I'd like to deposit \$500."],
                ['start' => 47, 'end' => 50, 'text' => 'No problem. Please hand me the cash.'],

                ['start' => 51, 'end' => 54, 'text' => "Thank you. I'll enter the details into the system."],
                ['start' => 54, 'end' => 56, 'text' => 'How long will it take to get my account active?'],
                ['start' => 56, 'end' => 57.5, 'text' => "Just a moment. "],
                ['start' => 61.5, 'end' => 64, 'text' => "You'll also receive an ATM card soon."],
                ['start' => 61.5, 'end' => 64, 'text' => "You'll also receive an ATM card soon."],
                ['start' => 64, 'end' => 67, 'text' => 'Great. Thank you for your help.'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])