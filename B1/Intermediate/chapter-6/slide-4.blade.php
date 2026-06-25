<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Intermediate/chapter-6/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '⚖️',
            'label' => 'Question 1',
            'text'  => 'What is more important when buying a product: price, quality, or brand?',
        ],
        [
            'emoji' => '📢',
            'label' => 'Question 2',
            'text'  => 'Have you ever bought something because of an advertisement?',
        ],
        [
            'emoji' => '⭐',
            'label' => 'Question 3',
            'text'  => 'Do online reviews influence your decisions?',
        ],
        [
            'emoji' => '🛍️',
            'label' => 'Question 4',
            'text'  => 'What are your shopping habits?',
        ],
        [
            'emoji' => '💻',
            'label' => 'Question 5',
            'text'  => 'Which do you prefer: online or offline shopping, and why?',
        ],
        [
            'emoji' => '📦',
            'label' => 'Question 6',
            'text'  => 'What are some of the things you like buying online and other things you buy offline?',
        ],
        [
            'emoji' => '🔍',
            'label' => 'Question 7',
            'text'  => 'What are some of the advantages and disadvantages of online and offline shopping?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])