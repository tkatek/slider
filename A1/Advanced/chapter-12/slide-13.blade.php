<?php

$content = [
    'title' => 'Listening',
    'subtitle' => 'Listen to this conversation between a woman and a shop assistant',
    'audio' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide13/buying-a-phone.mp3'),
    'tabs'=>[
        ['id' => 'empty', 'label' => 'Listen'],
        ['id' => 'script', 'label' => 'Script'],
        ['id' => 'grammar', 'label' => 'Vocabulary'],
        ['id' => 'quiz', 'label' => 'Quiz'],
    ],

    'script' => [
        [
            'topic' => '1) Buying a Cell Phone',
            'dialogue' => [
                ['speaker' => 'Woman', 'text' => 'Hello sir, is there anything I can help you with?'],
                ['speaker' => 'Man', 'text' => 'Um, yeah, I was just looking at phones.'],
                ['speaker' => 'Woman', 'text' => 'What kind of features were you looking for?'],
                ['speaker' => 'Man', 'text' => 'I want a touchscreen smartphone, with a high-res screen.'],
                ['speaker' => 'Woman', 'text' => 'What do you think of this one?'],
                ['speaker' => 'Man', 'text' => 'Looks nice. How’s the battery life?'],
                ['speaker' => 'Woman', 'text' => 'It depends how you use it. It lasts from one to three days.'],
                ['speaker' => 'Man', 'text' => 'Hmmm, OK, I think I’ll take it.'],
                ['speaker' => 'Woman', 'text' => 'Do you just want the handset, or do you want a contract with it? If you take out a contract, you only pay £50 for the phone.'],
                ['speaker' => 'Man', 'text' => 'I don’t really want a contract, but I would like a pay-as-you-go SIM card. Do you have any?'],
                ['speaker' => 'Woman', 'text' => 'Yes. The card’s free, but you have to buy £10 credit.'],
                ['speaker' => 'Man', 'text' => 'OK, that’s fine.'],
                ['speaker' => 'Woman', 'text' => 'Also, with this deal, if you top up every month, you get 50 free minutes and 100 texts.'],
                ['speaker' => 'Man', 'text' => 'Sounds good. Where do I pay?'],
                ['speaker' => 'Woman', 'text' => 'Right this way, please.'],
            ],
        ],
    ],

    'grammar' => [
        [
            'title' => 'Vocabulary 1: High-res',
            'explanation' => '',
            'examples' => [
                'High resolution means a very clear screen that can show many things at the same time.',
            ],
        ],
        [
            'title' => 'Vocabulary 2: Handset',
            'explanation' => '',
            'examples' => [
                'A handset is a mobile phone.',
            ],
        ],
        [
            'title' => 'Vocabulary 3: Contract',
            'explanation' => '',
            'examples' => [
                'A contract is a deal you sign with a phone company to pay every month.',
            ],
        ],
        [
            'title' => 'Vocabulary 4: Pay-as-you-go',
            'explanation' => '',
            'examples' => [
                'Pay-as-you-go is a deal where you add money to your phone when you need it.',
            ],
        ],
        [
            'title' => 'Vocabulary 5: Top up','grammar' => [
            [
                'title' => 'Vocabulary 1: High-res',
                'explanation' => '',
                'examples' => [
                    'High resolution means a very clear screen that can show many things at the same time.',
                ],
            ],
            [
                'title' => 'Vocabulary 2: Handset',
                'explanation' => '',
                'examples' => [
                    'A handset is a mobile phone.',
                ],
            ],
            [
                'title' => 'Vocabulary 3: Contract',
                'explanation' => '',
                'examples' => [
                    'A contract is a deal you sign with a phone company to pay every month.',
                ],
            ],
            [
                'title' => 'Vocabulary 4: Pay-as-you-go',
                'explanation' => '',
                'examples' => [
                    'Pay-as-you-go is a deal where you add money to your phone when you need it.',
                ],
            ],
            [
                'title' => 'Vocabulary 5: Top up',
                'explanation' => '',
                'examples' => [
                    'Top up means add money to your phone.',
                ],
                'note' => 'These words are useful when talking about buying a phone and choosing a phone plan.',
            ],
        ],
            'explanation' => '',
            'examples' => [
                'Top up means add money to your phone.',
            ],
            'note' => 'These words are useful when talking about buying a phone and choosing a phone plan.',
        ],
    ],
    // Task 1 + Task 2 (multiple choice)
    'quiz' => [
        [
            'question' => '1. What is the man looking for?',
            'options' => ['A laptop', 'A phone', 'A TV', 'A tablet'],
            'correct_answer' => 1,
        ],
        [
            'question' => '2. What feature does the man want?',
            'options' => ['Small screen', 'Touchscreen', 'No battery', 'No camera'],
            'correct_answer' => 1,
        ],
        [
            'question' => '3. How long does the battery last?',
            'options' => ['One hour', 'One day', 'One to three days', 'One week'],
            'correct_answer' => 2,
        ],
        [
            'question' => '4. What does the man choose?',
            'options' => ['A contract', 'No phone', 'Pay-as-you-go SIM card', 'A tablet'],
            'correct_answer' => 2,
        ],
        [
            'question' => '5. What does the man need to buy with the SIM card?',
            'options' => ['A charger', '£10 credit', 'A case', 'Headphones'],
            'correct_answer' => 1,
        ],
    ],

    'puzzle' => [
        'instruction' => '',
        'activities' => [

        ],
    ],
];

?>

@include("slider.game.audio-multi-activities",['content'=>$content])
