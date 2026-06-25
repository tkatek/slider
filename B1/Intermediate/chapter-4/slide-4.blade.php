<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion Questions',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Intermediate/chapter-4/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '⭐',
            'label' => 'Question 1',
            'text'  => 'What is your favorite brand? Why do you like it?',
        ],
        [
            'emoji' => '🛍️',
            'label' => 'Question 2',
            'text'  => 'Do you usually buy famous brands or cheaper alternatives?',
        ],
        [
            'emoji' => '🔥',
            'label' => 'Question 3',
            'text'  => 'Which brands are most popular among young people in your country?',
        ],
        [
            'emoji' => '🧭',
            'label' => 'Question 4',
            'text'  => "Can a brand tell us something about a person's lifestyle?",
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])