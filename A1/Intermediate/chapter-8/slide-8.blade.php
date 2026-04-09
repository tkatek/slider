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
            'name'  => 'Adam',
            'image' => materialAsset("slider/A1/Advanced/chapter-3/img/daniel.webp"),
        ],
        'right' => [
            'name'  => 'Sofia',
            'image' => materialAsset("slider/A1/Advanced/chapter-3/img/receptionist.webp"),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "I'd like to book a holiday package.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => '',
        ],
        [
            'text'   => "Great! Where are you thinking about?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => '',
        ],
        [
            'text'   => "Italy.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => '',
        ],
        [
            'text'   => "Nice choice. Do you prefer a city tour?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => '',
        ],
        [
            'text'   => "Yes, a city tour sounds perfect. When is it available?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => '',
        ],
        [
            'text'   => "It's available all month. How much does it cost?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => '',
        ],
        [
            'text'   => "Does it include breakfast?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => '',
        ],
        [
            'text'   => "Breakfast is included every day.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => '',
        ],
        [
            'text'   => "Wonderful. I'd like to book one seat.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => '',
        ],
        [
            'text'   => "Payment confirmed. Here are your travel documents.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => '',
        ],
        [
            'text'   => "Thank you for your help.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => '',
        ],
        [
            'text'   => "My pleasure. Have a great trip to Italy.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => '',
        ],
    ],
];
?>
@include("slider.vocab.image-conversation", ['content' => $content])