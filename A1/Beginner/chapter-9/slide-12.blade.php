<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'How much or How many?!',

    // --- Image Control ---
    'show_footer_image' => 0, // 0 = hide, 1 = show
    'footer_image'      => '', // keep empty when hidden to avoid undefined key issues

    'people' => [
        'left'  => [
            'name'  => 'Kate',
            'image' => materialAsset('slider/A1/Beginner/chapter-9/img/kate.webp'),
        ],
        'right' => [
            'name'  => 'Emma',
            'image' => materialAsset('slider/A1/Beginner/chapter-9/img/emma.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "How many loaves of bread are there?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide12/kate1.mp3"),
        ],
        [
            'text'   => "There’re three loaves of bread.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide12/emma1.mp3"),
        ],
        [
            'text'   => "How much milk is there?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide12/kate2.mp3"),
        ],
        [
            'text'   => "There’s one bottle of milk.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-9/audios/slide12/emma2.mp3"),
        ],
    ],
];
?>
@include("slider.vocab.image-conversation", ['content' => $content])