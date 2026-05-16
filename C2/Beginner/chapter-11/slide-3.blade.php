<?php

$content = [
    'page_title' => 'Warm Up',
    'title'      => 'Warm Up',
    'subtitle'   => 'Each student answers in 3-4 full sentences.',
    'image'      => materialAsset('slider/C2/Beginner/chapter-10/img/slide3.webp'),

    'cards' => [
        [
            'emoji' => '🤔',
            'label' => 'Question 1',
            'text'  => 'Do you freeze when someone surprises you with a question?',
        ],
        [
            'emoji' => '🔄',
            'label' => 'Question 2',
            'text'  => 'Do you feel you talk too much just to sound correct?',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])