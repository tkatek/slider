<?php
$content = [
    'page_title' => "Child's Progress",
    'title'      => "Child's Progress",
    'subtitle'   => 'New Language',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Parent',
            'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide-12-parent.webp'),
        ],
        'right' => [
            'name'  => 'Teacher',
            'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide-12-teacher.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => 'Hello, Ms. Sara. How is my son doing?',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-12-parent-1.mp3'),
        ],
        [
            'text'   => 'Hello. He is doing well in class.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-12-teacher-1.mp3'),
        ],
        [
            'text'   => 'How is his schoolwork?',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-12-parent-2.mp3'),
        ],
        [
            'text'   => 'It is good. He needs a little more practice in writing.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-12-teacher-2.mp3'),
        ],
        [
            'text'   => 'How is his behaviour?',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-12-parent-3.mp3'),
        ],
        [
            'text'   => 'He is friendly and polite. Sometimes he talks too much.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-12-teacher-3.mp3'),
        ],
        [
            'text'   => 'Are there any school events soon?',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-12-parent-4.mp3'),
        ],
        [
            'text'   => 'Yes, we have Sports Day next week.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-12-teacher-4.mp3'),
        ],
        [
            'text'   => 'Thank you.',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-12-parent-5.mp3'),
        ],
        [
            'text'   => "You're welcome.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-12-teacher-5.mp3'),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])