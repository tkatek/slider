<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',

    // --- Image Settings ---
    'show_footer_image' => 1, // Set to 1 to show, 0 to hide
    'footer_image'      => materialAsset("slider/A1/Beginner/chapter-7/img/slide6.webp"),

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
            'text'   => "Excuse me, where is the bank?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-7/audios/3.mpeg"),
        ],
        [
            'text'   => "It’s just around the corner! opposite the hospital",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-7/audios/4.mpeg"),
        ],
        [
            'text'   => "Can you tell me how to get there?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-7/audios/5.mpeg"),
        ],
        [
            'text'   => "Go straight ahead and turn left at the park.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-7/audios/6.mpeg"),
        ],
    ],
];
?>
@include("slider.vocab.image-conversation", ['content' => $content])
