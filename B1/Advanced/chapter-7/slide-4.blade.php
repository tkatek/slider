<?php

$content = [
    'title'    => 'Discussion',
    'subtitle' => '',
    'image'    => materialAsset('slider/B1/Advanced/chapter-7/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🧰',
            'label' => 'Question 1',
            'text'  => 'Which everyday services do you or your family use most often?',
        ],
        [
            'emoji' => '📱',
            'label' => 'Question 2',
            'text'  => 'Have you ever had your phone, computer, or bicycle repaired? What happened?',
        ],
        [
            'emoji' => '💇',
            'label' => 'Question 3',
            'text'  => 'How often do people visit the hairdresser or barber?',
        ],
        [
            'emoji' => '🔧',
            'label' => 'Question 4',
            'text'  => 'Would you rather repair something or buy a new one? Why?',
        ],
        [
            'emoji' => '🏠',
            'label' => 'Question 5',
            'text'  => 'What jobs around the house do you usually do yourself? Which ones do you ask someone else to do?',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])