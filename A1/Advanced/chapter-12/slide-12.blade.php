<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen to this conversation between a shop assistant and a customer.',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Shop Assistant',
            'image' => materialAsset('slider/A1/Advanced/chapter-12/img/shop-assistant.webp'),
        ],
        'right' => [
            'name'  => 'Customer',
            'image' => materialAsset('slider/A1/Advanced/chapter-12/img/customer.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Hello sir, is there anything I can help you with?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/1.mp3'),
        ],
        [
            'text'   => "Um, yeah, I was just looking at phones.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/2.mp3'),
        ],
        [
            'text'   => "What kind of features were you looking for?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/3.mp3'),
        ],
        [
            'text'   => "I want a touchscreen smart phone, with a high-res screen.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/4.mp3'),
        ],
        [
            'text'   => "What do you think of this one?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/5.mp3'),
        ],
        [
            'text'   => "Looks nice. How’s the battery life?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/6.mp3'),
        ],
        [
            'text'   => "It depends how you use it. It lasts from one to three days.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/7.mp3'),
        ],
        [
            'text'   => "Hmmm, OK, I think I’ll take it.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/8.mp3'),
        ],
        [
            'text'   => "Do you just want the handset, or do you want a contract with it? If you take out a contract, you only pay £50 for the phone.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/9.mp3'),
        ],
        [
            'text'   => "I don’t really want a contract, but I would like a pay-as-you-go SIM card. Do you have any?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/10.mp3'),
        ],
        [
            'text'   => "Yes. The card’s free, but you have to buy £10 credit.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/11.mp3'),
        ],
        [
            'text'   => "OK, that’s fine.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/12.mp3'),
        ],
        [
            'text'   => "Also, with this deal, if you top up every month, you get 50 free minutes and 100 texts.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/13.mp3'),
        ],
        [
            'text'   => "Sounds good. Where do I pay?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/14.mp3'),
        ],
        [
            'text'   => "Right this way, please.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-12/audios/slide12/15.mp3'),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])