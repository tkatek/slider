<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A1/Advanced/chapter-5/img/slide4.webp'),
    'image_alt'  => 'Bus travel discussion image',

    'cards' => [
        [
            'emoji' => '🚌',
            'label' => 'Question 1',
            'text'  => 'Do you travel by bus?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '⏰',
            'label' => 'Question 2',
            'text'  => 'How often do you take the bus?',
            'theme' => 'blue',
        ],
        [
            'emoji' => '💵',
            'label' => 'Question 3',
            'text'  => 'Is the bus cheap in your city?',
            'theme' => 'violet',
        ],
        [
            'emoji' => '📍',
            'label' => 'Question 4',
            'text'  => 'Where do you usually go by bus?',
            'theme' => 'sky',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])