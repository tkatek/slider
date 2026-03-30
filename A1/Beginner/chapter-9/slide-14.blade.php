<?php
$content = [
    'page_title' => 'Time to practise!',
    'title'      => 'Time to practise!',
    'subtitle'   => 'Shopping at the Supermarket',

    // --- Image Control ---
    'show_footer_image' => 0, // 0 = hide, 1 = show
    'footer_image'      => '', // keep empty when hidden to avoid undefined key issues

    'people' => [
        'left'  => [
            'name'  => 'Customer',
            'image' => materialAsset('slider/A1/Beginner/chapter-9/img/customer.webp'),
        ],
        'right' => [
            'name'  => 'Clerk',
            'image' => materialAsset('slider/A1/Beginner/chapter-9/img/clerk.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Excuse me. Where is the butter?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide14/1.mp3"),
        ],
        [
            'text'   => "It’s in the dairy area at the back. I can show you.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide14/2.mp3"),
        ],
        [
            'text'   => "It’s okay. I can find it.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide14/3.mp3"),
        ],
        [
            'text'   => "Anything else?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide14/4.mp3"),
        ],
        [
            'text'   => "Yes. Where is the shampoo?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide14/5.mpeg"),
        ],
        [
            'text'   => "It’s in aisle 4.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide14/6.mpeg"),
        ],
        [
            'text'   => "Thank you.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide14/7.mpeg"),
        ],
        [
            'text'   => "You’re welcome. Have a good day.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide14/8.mpeg"),
        ],
    ],
];
?>
@include("slider.vocab.image-conversation", ['content' => $content])