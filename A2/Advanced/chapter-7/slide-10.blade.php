<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening: Advice for the manager',
    'subtitle'   => 'Listen & role-play the dialogue:<br>A quality manager is talking with a business coach about a problem of motivation in his team. ',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Business Coach',
            'image' => materialAsset('slider/A2/Advanced/chapter-7/img/business-coach.webp'),
        ],
        'right' => [
            'name'  => 'Quality Manager',
            'image' => materialAsset('slider/A2/Advanced/chapter-7/img/quality-manager.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Tony, why is your team less motivated now?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-7/audios/slide10/1.mp3'),
        ],
        [
            'text'   => "Their goal is to keep damaged products below 1%, but they don’t seem interested anymore.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-7/audios/slide10/2.mp3'),
        ],
        [
            'text'   => "Maybe they don’t understand why quality is important. Good quality can protect customers and save lives.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-7/audios/slide10/3.mp3'),
        ],
        [
            'text'   => "Yes, especially the younger workers. That could help motivate them.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-7/audios/slide10/4.mp3'),
        ],
        [
            'text'   => "Do they have boring tasks?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-7/audios/slide10/5.mp3'),
        ],
        [
            'text'   => "Yes, they write reports every Friday and sometimes complain about them.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-7/audios/slide10/6.mp3'),
        ],
        [
            'text'   => "Do you give feedback on their reports?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-7/audios/slide10/7.mp3'),
        ],
        [
            'text'   => "Not always. I’m usually too busy.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-7/audios/slide10/8.mp3'),
        ],
        [
            'text'   => "Even a simple “thank you” can make people feel appreciated.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-7/audios/slide10/9.mp3'),
        ],
        [
            'text'   => "Yes, that’s true.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-7/audios/slide10/10.mp3'),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])