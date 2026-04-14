<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A1/Advanced/chapter-7/img/slide5.webp'),

    'cards' => [
        [
            'emoji' => '🪧',
            'label' => 'Question 1',
            'text'  => 'What do these signs mean?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '📍',
            'label' => 'Question 2',
            'text'  => 'Where do you see them?',
            'theme' => 'blue',
        ],
        [
            'emoji' => '⭐',
            'label' => 'Question 3',
            'text'  => 'Why are signs important?',
            'theme' => 'violet',
        ],
        [
            'emoji' => '🚶',
            'label' => 'Question 4',
            'text'  => 'Do you follow signs in public places?',
            'theme' => 'sky',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
