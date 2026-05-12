<?php
$content = [
    'page_title' => 'Warm Up',
    'title'      => 'Warm Up',
    'subtitle'   => '',
    'image'      => materialAsset('slider/C2/Beginner/chapter-2/img/slide3.webp'),

    'cards' => [
        [
            'emoji' => '💬',
            'label' => 'Question 1',
            'text'  => "What's the difference between having an opinion and justifying it?",
        ],
        [
            'emoji' => '🎯',
            'label' => 'Question 2',
            'text'  => 'Do you usually explain why you think something?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])

