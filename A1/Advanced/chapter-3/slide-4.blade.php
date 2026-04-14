<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A1/Advanced/chapter-1/img/cover.webp'),

    'cards' => [
        [
            'emoji' => '🏨',
            'label' => 'Question 1',
            'text'  => 'How was your stay at the hotel?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '🙂',
            'label' => 'Question 2',
            'text'  => 'Was your stay good or bad?',
            'theme' => 'blue',
        ],
        [
            'emoji' => '✨',
            'label' => 'Question 3',
            'text'  => 'What makes a hotel stay perfect?',
            'theme' => 'violet',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
