<?php
$content = [
    'title'    => "Practice 4",
    'subtitle' => 'Listen again and answer the questions',
    'type' => 'questions_only',
    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',
    'audio'   => materialAsset("slider/A1/Advanced/chapter-12/audios/slide14.mp3"),

    'script' => [
        'Woman: Hello sir, is there anything I can help you with?',
        'Man: Um, yeah, I was just looking at phones.',
        'Woman: What kind of features were you looking for?',
        'Man: I want a touchscreen smart phone, with a high-res screen.',
        'Woman: What do you think of this one?',
        'Man: Looks nice. How’s the battery life?',
        'Woman: It depends how you use it. It lasts from one to three days.',
        'Man: Hmmm, OK, I think I’ll take it.',
        'Woman: Do you just want the handset, or do you want a contract with it? If you take out a contract, you only pay £50 for the phone.',
        'Man: I don’t really want a contract, but I would like a pay-as-you-go SIM card. Do you have any?',
        'Woman: Yes. The card’s free, but you have to buy £10 credit.',
        'Man: OK, that’s fine.',
        'Woman: Also, with this deal, if you top up every month, you get 50 free minutes and 100 texts.',
        'Man: Sounds good. Where do I pay?',
        'Woman: Right this way, please.',
    ],

    'questions' => [
        [
            'prompt'  => 'What is the man looking for?',
            'correct' => 'A phone',
            'options' => [
                'A laptop',
                'A phone',
                'A TV',
                'A tablet',
            ],
        ],
        [
            'prompt'  => 'What feature does the man want?',
            'correct' => 'Touchscreen',
            'options' => [
                'Small screen',
                'Touchscreen',
                'No battery',
                'No camera',
            ],
        ],
        [
            'prompt'  => 'How long does the battery last?',
            'correct' => 'One to three days',
            'options' => [
                'One hour',
                'One day',
                'One to three days',
                'One week',
            ],
        ],
        [
            'prompt'  => 'What does the man choose?',
            'correct' => 'Pay-as-you-go SIM card',
            'options' => [
                'A contract',
                'No phone',
                'Pay-as-you-go SIM card',
                'A tablet',
            ],
        ],
        [
            'prompt'  => 'What does the man need to buy with the SIM card?',
            'correct' => '£10 credit',
            'options' => [
                'A charger',
                '£10 credit',
                'A case',
                'Headphones',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
