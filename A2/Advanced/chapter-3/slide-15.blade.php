<?php
$content = [
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5',
    'subtitle'   => 'Role-play the dialogue with the same gadgets in the previous activity.',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Pupil A',
            'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide-10/mia.webp'),
        ],
        'right' => [
            'name'  => 'Pupil B',
            'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide-10/tom.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => 'What do you use your laptop to do?',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => '',
        ],
        [
            'text'   => 'I use my laptop to work in class.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => '',
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])