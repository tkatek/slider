<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Beginner/chapter-2/img/slide5.webp'),

    'cards' => [
        [
            'emoji' => '🤝',
            'label' => 'Question 1',
            'text'  => 'Do you usually help your friends and family?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '🙏',
            'label' => 'Question 2',
            'text'  => 'What was the last favour someone did for you?',
            'theme' => 'blue',
        ],
        [
            'emoji' => '🔁',
            'label' => 'Question 3',
            'text'  => 'Do you always return favours? Why or why not?',
            'theme' => 'violet',
        ],
        [
            'emoji' => '🙅',
            'label' => 'Question 4',
            'text'  => 'What kinds of requests are difficult to refuse?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '🎁',
            'label' => 'Question 5',
            'text'  => 'How do people usually return favours?',
            'theme' => 'blue',
        ],
        [
            'emoji' => '💛',
            'label' => 'Question 6',
            'text'  => 'How do you show yoy’re grateful?',
            'theme' => 'violet',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])