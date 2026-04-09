<?php
$content = [
    'page_title' => 'How to buy a train ticket?',
    'title'      => 'How to buy a train ticket?',
    'subtitle'   => 'Listen to the dialogue while reading the text',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Passenger',
            'image' => materialAsset('slider/A1/Advanced/chapter-5/img/customer.webp'),
        ],
        'right' => [
            'name'  => 'Ticket seller',
            'image' => materialAsset('slider/A1/Advanced/chapter-5/img/clerk.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Good morning. How can I help you?",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide15/1.mp3'),
        ],
        [
            'text'   => "Good morning, I would like to take the train to New York City.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide15/2.mp3'),
        ],
        [
            'text'   => ' <span class="text-sky-600 dark:text-sky-300 font-extrabold">One-way</span> or <span class="text-sky-600 dark:text-sky-300 font-extrabold">round trip</span>?',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide15/3.mp3'),
        ],
        [
            'text'   => " <span class='text-sky-600 dark:text-sky-300 font-extrabold'>One-way</span>, please.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide15/4.mp3'),
        ],
        [
            'text'   => "That’s \$12, and the next train leaves in 15 minutes.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide15/5.mp3'),
        ],
        [
            'text'   => "Is there <span class='text-sky-600 dark:text-sky-300 font-extrabold'>a later one</span><span class='text-rose-500 dark:text-rose-300 font-extrabold'>?</span>",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide15/6.mp3'),
        ],
        [
            'text'   => "Yes, there is also one at 2:30.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide15/7.mp3'),
        ],
        [
            'text'   => "Thank you, I’ll take the later one. What platform does the train leave from?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide15/8.mp3'),
        ],
        [
            'text'   => "It leaves from platform 3. Just turn right here and go straight.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide15/9.mp3'),
        ],
        [
            'text'   => "Thank you.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide15/10.mp3'),
        ],
        [
            'text'   => "You’re welcome and safe travels.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide15/11.mp3'),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])