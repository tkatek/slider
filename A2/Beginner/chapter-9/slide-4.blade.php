<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Who is your favourite celebrity?',
    'image'      => materialAsset('slider/A2/Beginner/chapter-9/img/slide4/Discussion.webp'),
    'image_alt'  => 'Celebrity discussion',

    'cards' => [
        [
            'emoji' => '1',
            'label' => 'Question 1',
            'text'  => 'Who is your favourite celebrity?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '2',
            'label' => 'Question 2',
            'text'  => 'What does he/she look like?',
            'theme' => 'blue',
        ],
        [
            'emoji' => '3',
            'label' => 'Question 3',
            'text'  => 'Has he/she got long or short hair?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '4',
            'label' => 'Question 4',
            'text'  => 'Is he/she tall or short?',
            'theme' => 'blue',
        ],
        [
            'emoji' => '5',
            'label' => 'Question 5',
            'text'  => 'Is he/she funny, serious, or friendly?',
            'theme' => 'indigo',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
