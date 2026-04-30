<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Beginner/chapter11/img/slide4/Discu.webp'),

    'cards' => [
        [
            'emoji' => '🥗',
            'label' => 'Question 1',
            'text'  => 'Why are healthy eating and active living important?',
        ],
        [
            'emoji' => '🍽️',
            'label' => 'Question 2',
            'text'  => 'What does your breakfast plate look like? What does your dinner plate look like?',
        ],
        [
            'emoji' => '💧',
            'label' => 'Question 3',
            'text'  => 'How much water do you drink?',
        ],
        [
            'emoji' => '🍎',
            'label' => 'Question 4',
            'text'  => 'How many apples do you eat?',
        ],
        [
            'emoji' => '🍭',
            'label' => 'Question 5',
            'text'  => 'Do you spend a lot of money on sugary food?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])