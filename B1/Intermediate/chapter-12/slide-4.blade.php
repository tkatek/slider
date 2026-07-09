<?php
$content = [
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Intermediate/chapter-12/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🌍',
            'label' => 'Question 1',
            'text'  => 'What does it mean to be open-minded?',
        ],
        [
            'emoji' => '🤔',
            'label' => 'Question 2',
            'text'  => 'Do you think it is easy or difficult to change your opinion? Why?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 3',
            'text'  => 'Have you ever disagreed with someone but still respected their opinion?',
        ],
        [
            'emoji' => '👂',
            'label' => 'Question 4',
            'text'  => 'Why do some people refuse to listen to different viewpoints?',
        ],
        [
            'emoji' => '💡',
            'label' => 'Question 5',
            'text'  => 'Can we learn something from people who think differently from us?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])