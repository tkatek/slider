<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Advanced/chapter-3/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '📱',
            'label' => 'Question 1',
            'text'  => 'What gadgets do you use every day?',
        ],
        [
            'emoji' => '💻',
            'label' => 'Question 2',
            'text'  => 'Which gadget do you use most at home or work?',
        ],
        [
            'emoji' => '👩‍🏫',
            'label' => 'Question 3',
            'text'  => 'What gadgets does a teacher use?',
        ],
        [
            'emoji' => '🩺',
            'label' => 'Question 4',
            'text'  => 'What gadgets does a doctor use?',
        ],
        [
            'emoji' => '🎧',
            'label' => 'Question 5',
            'text'  => 'As a student, what gadget is most helpful to you while studying?',
        ],
        [
            'emoji' => '💬',
            'label' => 'Question 6',
            'text'  => 'Is a smartphone important for work? Why?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])