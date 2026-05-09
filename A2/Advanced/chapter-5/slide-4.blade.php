<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Answer the questions. Use the phrases below to help you',
    'image'      => materialAsset('slider/A2/Advanced/chapter-5/img/slide1.webp'),

    'support_title' => '',
    'support_items' => [
        'I think... because...',
        "Yes, I have. / No, I haven't.",
        'It is difficult to...',
    ],

    'cards' => [
        [
            'emoji' => '🌍',
            'label' => 'Question 1',
            'text'  => 'Do you think living abroad is easy or difficult?',
        ],
        [
            'emoji' => '😊',
            'label' => 'Question 2',
            'text'  => 'How do people feel in a new country?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 3',
            'text'  => 'Have you ever met someone from another country?',
        ],
        [
            'emoji' => '😟',
            'label' => 'Question 4',
            'text'  => 'Have you ever felt nervous in a new place?',
        ],
        [
            'emoji' => '🏠',
            'label' => 'Question 5',
            'text'  => 'What is the most difficult thing about living abroad?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
