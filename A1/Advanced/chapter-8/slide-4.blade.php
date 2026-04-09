<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A1/Advanced/chapter-8/img/slide4.webp'),
    'image_alt'  => 'Discussion image about where you live',

    'cards' => [
        [
            'emoji' => '🏠',
            'label' => 'Question 1',
            'text'  => 'Where do you live?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '😊',
            'label' => 'Question 2',
            'text'  => 'Do you like where you live?',
            'theme' => 'blue',
        ],
        [
            'emoji' => '💬',
            'label' => 'Question 3',
            'text'  => 'Would you recommend it as a place to live? Why / Why not?',
            'theme' => 'sky',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])