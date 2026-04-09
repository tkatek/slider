<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A1/Advanced/chapter-6/img/slide3.webp'),
    'image_alt'  => 'Railway station discussion image',

    'cards' => [
        [
            'emoji' => '📍',
            'label' => 'Question 1',
            'text'  => 'Where do you think we are?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '🚆',
            'label' => 'Question 2',
            'text'  => 'Have you travelled by train before?',
            'theme' => 'blue',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])