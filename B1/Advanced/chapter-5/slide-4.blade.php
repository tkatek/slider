<?php
$content = [
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Advanced/chapter-5/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🌱',
            'label' => 'Question 1',
            'text'  => 'What simple things do you do to help the environment?',
        ],
        [
            'emoji' => '🚶‍♂️',
            'label' => 'Question 2',
            'text'  => 'Which is better for the environment: walking, cycling, or driving? Why?',
        ],
        [
            'emoji' => '♻️',
            'label' => 'Question 3',
            'text'  => 'Do you recycle at home or at school? What do you recycle?',
        ],
        [
            'emoji' => '🌍',
            'label' => 'Question 4',
            'text'  => 'How can we help protect the environment?',
        ],
        [
            'emoji' => '☀️',
            'label' => 'Question 5',
            'text'  => 'Which renewable energy sources do you know?',
        ],
        [
            'emoji' => '💡',
            'label' => 'Question 6',
            'text'  => 'What small action could everyone take every day to make a big difference?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])