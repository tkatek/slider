<?php

$content = [
    'type' => 'reading',

    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Read & answer the questions.',

    'reading_title' => 'Online Shopping Vs Offline Shopping',

    'passage' => "Online shopping and offline shopping both have advantages. Online shopping allows people to buy products from home without going to a store. It offers a wide variety of products, makes it easy to compare prices, and helps customers save time. People can shop at any time of the day, find discounts, and even buy products through social media. In addition, websites often suggest products that customers may like. On the other hand, offline shopping allows people to see and touch products before buying them. Customers can take their purchases home immediately and get help from store workers when choosing products. Shopping in stores can also be a fun social activity with friends and family. Furthermore, customers do not have to pay shipping fees and can easily return products if needed. Both online and offline shopping offer unique benefits, and many people choose a combination of both.",

    'question_prompt_label' => 'Choose the correct answer',

    'questions' => [
        [
            'prompt'  => 'What is one advantage of online shopping?',
            'correct' => 'You can shop from home.',
            'options' => [
                'You can see products before buying them.',
                'You can shop from home.',
                'You can pay only with cash.',
            ],
        ],
        [
            'prompt'  => 'Why do some people prefer offline shopping?',
            'correct' => 'They can touch products before buying them.',
            'options' => [
                'They can touch products before buying them.',
                'They can shop at any time.',
                'They can compare prices easily.',
            ],
        ],
        [
            'prompt'  => 'What can websites do when you shop online?',
            'correct' => 'Suggest products you may like.',
            'options' => [
                'Deliver products immediately.',
                'Suggest products you may like.',
                'Help small businesses directly.',
            ],
        ],
        [
            'prompt'  => 'According to the text, shopping in stores can be:',
            'correct' => 'Fun',
            'options' => [
                'Stressful',
                'Expensive',
                'Fun',
            ],
        ],
        [
            'prompt'  => 'Online shopping allows people to compare prices easily.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Customers must pay shipping fees when shopping in stores.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Store workers can help customers choose products.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Online shopping is only possible during the day.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])