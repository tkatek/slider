<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Beginner/chapter-9/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🤝',
            'label' => 'Question 1',
            'text'  => 'What would you do if your friend had a problem? What would you do if you were in his /her place?',
        ],
        [
            'emoji' => '💡',
            'label' => 'Question 2',
            'text'  => 'What is the best advice you have ever given / received?',
        ],
        [
            'emoji' => '⚠️',
            'label' => 'Question 3',
            'text'  => 'What would you do if you were in trouble?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])