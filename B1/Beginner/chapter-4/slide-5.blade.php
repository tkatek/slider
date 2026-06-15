<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Beginner/chapter-4/img/slide5.webp'),

    'cards' => [
        [
            'emoji' => '📺',
            'label' => 'Question 1',
            'text'  => 'What do you usually watch in your free time?',
        ],
        [
            'emoji' => '🎬',
            'label' => 'Question 2',
            'text'  => 'What kind of movies do you like?',
        ],
        [
            'emoji' => '🏠',
            'label' => 'Question 3',
            'text'  => 'Do you prefer watching at home or at the cinema?',
        ],
        [
            'emoji' => '⭐',
            'label' => 'Question 4',
            'text'  => 'What’s your favourite TV show?',
        ],
        [
            'emoji' => '🎤',
            'label' => 'Question 5',
            'text'  => 'Have you ever been to a concert?',
        ],
        [
            'emoji' => '🍿',
            'label' => 'Question 6',
            'text'  => 'What makes a movie interesting?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])