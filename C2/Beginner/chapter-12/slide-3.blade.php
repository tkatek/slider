<?php

$content = [
    'page_title' => 'Warm Up',
    'title'      => 'Warm Up',
    'subtitle'   => 'Each student answers in 3-4 full sentences.',
    'image'      => materialAsset('slider/C2/Beginner/chapter-12/img/slide3.webp'),

    'cards' => [
        [
            'emoji' => '🎤',
            'label' => 'Question 1',
            'text'  => 'Do you avoid disagreeing to keep the peace?',
        ],
        [
            'emoji' => '💬',
            'label' => 'Question 2',
            'text'  => "Do you feel guilty when you say 'I disagree'?",
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])