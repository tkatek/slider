<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Intermediate/chapter-8/img/slide5.webp'),

    'cards' => [
        [
            'emoji' => '🥇',
            'label' => 'Question 1',
            'text'  => 'What quality did you rank number 1?',
        ],
        [
            'emoji' => '💡',
            'label' => 'Question 2',
            'text'  => 'Why is it important?',
        ],
        [
            'emoji' => '📉',
            'label' => 'Question 3',
            'text'  => 'Which quality did you rank last?',
        ],
        [
            'emoji' => '🤔',
            'label' => 'Question 4',
            'text'  => 'Why?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])