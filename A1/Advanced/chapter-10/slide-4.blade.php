<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A1/Advanced/chapter-10/img/slide4/Discussion.webp'),
    'image_alt'  => 'Discussion image',

    'cards' => [
        [
            'emoji' => '💭',
            'label' => 'Question 1',
            'text'  => 'What are you doing at the moment?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '📘',
            'label' => 'Question 2',
            'text'  => 'Are you learning English now?',
            'theme' => 'blue',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])