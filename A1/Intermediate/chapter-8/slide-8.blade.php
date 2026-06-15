<?php
$content = [
    'page_title' => 'Speaking Time',
    'title'      => 'Speaking Time',
    'subtitle'   => '',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => "",

    'people' => [
        'left'  => [
            'name'  => 'Michael',
            'image' => materialAsset("slider/A1/Intermediate/chapter-8/img/michael.webp"),
        ],
        'right' => [
            'name'  => 'Travel Agent',
            'image' => materialAsset("slider/A1/Intermediate/chapter-8/img/travel-agent.webp"),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "I'd like to book a holiday package.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide8/1.mp3"),
        ],
        [
            'text'   => "Great! Where are you thinking about?",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide8/2.mp3"),
        ],
        [
            'text'   => "Italy.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide8/3.mp3"),
        ],
        [
            'text'   => "Nice choice. Do you prefer a city tour?",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide8/4.mp3"),
        ],
        [
            'text'   => "Yes, a city tour sounds perfect. When is it available?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide8/5.mp3"),
        ],
        [
            'text'   => "It's available all month.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide8/6.mp3"),
        ],
        [
            'text'   => "Does it include breakfast?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide8/7.mp3"),
        ],
        [
            'text'   => "Breakfast is included every day.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide8/8.mp3"),
        ],
        [
            'text'   => "Wonderful. I'd like to book one seat.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide8/9.mp3"),
        ],
        [
            'text'   => "Payment confirmed. Here are your travel documents.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide8/10.mp3"),
        ],
        [
            'text'   => "Thank you for your help.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide8/11.mp3"),
        ],
        [
            'text'   => "My pleasure. Have a great trip to Italy.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide8/12.mp3"),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])