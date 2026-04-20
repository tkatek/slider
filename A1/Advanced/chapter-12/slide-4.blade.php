<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A1/Advanced/chapter-12/img/slide4/discussion-smart.webp'),
    'image_alt'  => 'Hotel stay discussion image',
    'cards' => [
        [
            'emoji' => '📱',
            'label' => 'Question 1',
            'text'  => 'Do you have a smart phone?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '💬',
            'label' => 'Question 2',
            'text'  => 'What do you use it for?',
            'theme' => 'blue',
        ],
        [
            'emoji' => '🛍️',
            'label' => 'Question 3',
            'text'  => 'Are you going to buy a new phone soon?',
            'theme' => 'violet',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])