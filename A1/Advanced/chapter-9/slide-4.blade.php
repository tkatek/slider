<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Speaking',
    'image'      => materialAsset('slider/A1/Advanced/chapter-9/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🌆',
            'label' => 'Question 1',
            'text'  => 'What is your favourite place in your town/city? Why?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '📍',
            'label' => 'Question 2',
            'text'  => 'What famous places are there in your community?',
            'theme' => 'blue',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])