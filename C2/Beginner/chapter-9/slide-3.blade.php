<?php

$content = [
    'page_title' => 'Warm Up',
    'title'      => 'Warm Up',
    'subtitle'   => 'Answers in 3-4 full sentences',
    'image'      => materialAsset('slider/C2/Beginner/chapter-9/img/slide1.webp'),

    'cards' => [
        [
            'emoji' => '🎤',
            'label' => 'Question 1',
            'text'  => 'Have you ever used humor to calm a tense situation?',
        ],
        [
            'emoji' => '💬',
            'label' => 'Question 2',
            'text'  => 'What kind of jokes work in professional settings?',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])