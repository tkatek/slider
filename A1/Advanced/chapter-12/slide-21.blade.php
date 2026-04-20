<?php
$content = [
    'page_title' => 'Speaking Time',
    'title'      => 'Speaking Time',
    'subtitle'   => '',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'right'  => [
            'name'  => 'Sales Clerk',
            'image' => materialAsset('slider/A1/Advanced/chapter-12/img/slide12/sales-clerk.webp'),
        ],
        'left' => [
            'name'  => 'You',
            'image' => materialAsset('slider/A1/Advanced/chapter-12/img/slide12/you.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Good afternoon. How can I help you?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/Good-afternoon.mpeg.mp3'),
        ],
        [
            'text'   => "I would like to buy a new phone.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/I-would-like.mp3.mp3'),
        ],
        [
            'text'   => "Great, you've come to the right place. Are you looking for anything in particular?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/Great-you-ve .mp3.mp3'),
        ],
        [
            'text'   => "Yes, I would like a phone with a good camera and battery life.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/Yes-I-would-like.mp3.mp3'),
        ],
        [
            'text'   => "We have a couple of different models that would fit that description. How much would you like to spend?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/We-have-a-couple-of.mp3.mp3'),
        ],
        [
            'text'   => "Between 200 and 300 dollars.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/Between.mp3.mp3'),
        ],
        [
            'text'   => "Would you like your phone to be unlocked or with a carrier?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/Would-you-like-your.mp3.mp3'),
        ],
        [
            'text'   => "Unlocked, please.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/Unlocked-please.mp3.mp3'),
        ],
        [
            'text'   => "In this case, we have three phones available.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/In-this-case.mp3.mp3'),
        ],
        [
            'text'   => "What's the difference?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/What-the difference_.mp3.mp3'),
        ],
        [
            'text'   => "They are pretty similar. This one is a little more pricey but also has better battery life. The black one has more storage and the gray one is the cheapest.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/They-are-pretty.mp3.mp3'),
        ],
        [
            'text'   => "I will take the first one then. Thank you.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/I will-take.mp3.mp3'),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])
