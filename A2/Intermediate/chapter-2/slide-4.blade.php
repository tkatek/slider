<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Intermediate/chapter-2/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🍽️',
            'label' => 'Question 1',
            'text'  => 'What is the most famous meal in your country called?',
        ],
        [
            'emoji' => '🥘',
            'label' => 'Question 2',
            'text'  => 'What are your country’s traditional foods?',
        ],
        [
            'emoji' => '🍳',
            'label' => 'Question 3',
            'text'  => 'What do you usually eat for breakfast in your country?',
        ],
        [
            'emoji' => '🎉',
            'label' => 'Question 4',
            'text'  => 'What food is usually eaten on special days in your country?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
