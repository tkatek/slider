<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Have You Ever Stayed in a Hotel?',
    'image'      => materialAsset('slider/A1/Advanced/chapter-1/img/cover.webp'),
    'image_alt'  => 'Hotel discussion image',

    'cards' => [
        [
            'emoji' => '🏨',
            'label' => 'Question 1',
            'text'  => 'Where did you stay?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '⭐',
            'label' => 'Question 2',
            'text'  => 'Was it good or bad?',
            'theme' => 'blue',
        ],
        [
            'emoji' => '❤️',
            'label' => 'Question 3',
            'text'  => 'What did you love or dislike?',
            'theme' => 'purple',
        ],
        [
            'emoji' => '🛎️',
            'label' => 'Question 4',
            'text'  => 'What’s the very first thing you do when you enter a hotel?',
            'theme' => 'cyan',
        ],
    ],
];
?>
@include('slider.other.discussion', ['content' => $content])