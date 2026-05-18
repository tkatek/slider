<?php

$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Answers in 3-4 full sentences',
    'image'      => materialAsset('slider/C2/Intermediate/chapter-2/img/slide3.webp'),

    'cards' => [
        [
            'emoji' => '⏰',
            'label' => 'Question 1',
            'text'  => 'Have you ever had a package delayed or lost?',
        ],
        [
            'emoji' => '🙋',
            'label' => 'Question 2',
            'text'  => 'How did you ask for help?',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])