<?php
$content = [
    'page_title' => 'Let’s practise!',
    'title'      => 'Let’s practise!',
    'subtitle'   => 'Excuse me, How can I get to the Bank?',

    // --- Image Control ---
    'show_footer_image' => 0, // Set to 0 to hide, 1 to show
    'footer_image'      => "",

    'people' => [
        'left'  => [
            'name'  => 'Sophia',
            'image' => materialAsset("slider/A1/Beginner/chapter-7/img/3.webp"),
        ],
        'right' => [
            'name'  => 'Jack',
            'image' => materialAsset("slider/A1/Beginner/chapter-7/img/4.webp"),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Excuse me, how can I get to the bank?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-7/audios/1.mpeg"),
        ],
        [
            'text'   => "Go straight ahead, then turn left. The bank is next to the post office.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-7/audios/2.mpeg"),
        ],
    ],
];
?>
@include("slider.vocab.image-conversation", ['content' => $content])