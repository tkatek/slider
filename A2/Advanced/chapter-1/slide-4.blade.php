<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Advanced/chapter-1/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '💼',
            'label' => 'Question 1',
            'text'  => 'What do you do?',
        ],
        [
            'emoji' => '❤️',
            'label' => 'Question 2',
            'text'  => 'Do you like your job?',
        ],
        [
            'emoji' => '⭐',
            'label' => 'Question 3',
            'text'  => 'What’s the best part of your job?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 4',
            'text'  => 'Do you like the people you work with?',
        ],
        [
            'emoji' => '📝',
            'label' => 'Question 5',
            'text'  => 'How can you describe your job?',
        ],
        [
            'emoji' => '💰',
            'label' => 'Question 6',
            'text'  => 'Is it a well-paid or badly-paid job',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])