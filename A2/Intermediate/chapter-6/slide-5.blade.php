<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'What happened while',
    'image'      => materialAsset('slider/A2/Intermediate/chapter-5/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '📞',
            'label' => 'Question 1',
            'text'  => 'What happened while you were talking on the phone?',
        ],
        [
            'emoji' => '🚗',
            'label' => 'Question 2',
            'text'  => 'What happened while you were driving?',
        ],
        [
            'emoji' => '🛍️',
            'label' => 'Question 3',
            'text'  => 'What happened while you were shopping?',
        ],
        [
            'emoji' => '😴',
            'label' => 'Question 4',
            'text'  => 'What happened while you were sleeping?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
