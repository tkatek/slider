<?php

$content = [
    'page_title' => 'Warm Up',
    'title'      => 'Warm Up',
    'subtitle'   => 'Answers in 3-4 full sentences',
    'image'      => materialAsset('slider/C2/Beginner/chapter-6/img/slide3.webp'),

    'cards' => [
        [
            'emoji' => '💡',
            'label' => 'Question 1',
            'text'  => 'Do you find it easy to convince others of your ideas?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 2',
            'text'  => 'What\'s the difference between persuading and forcing someone?',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])