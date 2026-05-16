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
            'text'  => 'Have you ever said a sentence in English and felt it sounded ... weird?',
        ],
        [
            'emoji' => '🔄',
            'label' => 'Question 2',
            'text'  => 'Do you think in Arabic first, then translate?',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])