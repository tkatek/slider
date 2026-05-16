<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Restaurant Complaints',
    'image'      => materialAsset('slider/A2/Advanced/chapter-11/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🍽️',
            'label' => 'Question 1',
            'text'  => 'What problems can people have in restaurants?',
        ],
        [
            'emoji' => '🥶',
            'label' => 'Question 2',
            'text'  => 'Have you ever received cold or bad food in a restaurant?',
        ],
        [
            'emoji' => '🧾',
            'label' => 'Question 3',
            'text'  => 'What do you usually do when there is a problem with your order?',
        ],
        [
            'emoji' => '🤵',
            'label' => 'Question 4',
            'text'  => 'Is it important for waiters to be polite? Why?',
        ],
        [
            'emoji' => '💬',
            'label' => 'Question 5',
            'text'  => 'How should restaurants respond to customer complaints?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])