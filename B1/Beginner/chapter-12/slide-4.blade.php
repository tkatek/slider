<?php
$content = [
    'page_title' => 'Warm-Up Discussion',
    'title'      => 'Warm-Up Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Beginner/chapter-12/img/slide1.webp'),

    'cards' => [
        [
            'emoji' => '💭',
            'label' => 'Question 1',
            'text'  => 'Have you ever made a mistake?',
        ],
        [
            'emoji' => '💡',
            'label' => 'Question 2',
            'text'  => 'What is the best advice you didn\'t follow?',
        ],
        [
            'emoji' => '🧠',
            'label' => 'Question 3',
            'text'  => 'Have you ever forgotten something important?',
        ],
        [
            'emoji' => '🤔',
            'label' => 'Question 4',
            'text'  => 'Have you ever made a bad decision?',
        ],
        [
            'emoji' => '⭐',
            'label' => 'Question 5',
            'text'  => 'What\'s a mistake you learned from?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])