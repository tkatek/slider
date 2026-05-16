<?php

$content = [
    'page_title' => 'Warm Up',
    'title'      => 'Warm Up',
    'subtitle'   => 'Answers in 3-4 full sentences',
    'image'      => materialAsset('slider/C2/Beginner/chapter-4/img/slide3.webp'),

    'cards' => [
        [
            'emoji' => '💼',
            'label' => 'Question 1',
            'text'  => 'Do you usually follow up after meeting someone professionally?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 2',
            'text'  => 'What\'s the best way to keep in touch without seeming pushy?',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])