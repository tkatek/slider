<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Have you ever travelled by plane?',
    'image'      => materialAsset('slider/A1/Intermediate/chapter-10/img/slide4.webp'),
    'image_alt'  => 'Airport check-in discussion image',

    'cards' => [
        [
            'emoji' => '✈️',
            'label' => 'Question 1',
            'text'  => 'What do you do first at the airport?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '🧾',
            'label' => 'Question 2',
            'text'  => 'What is "check-in"?',
            'theme' => 'blue',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])