<?php
$content = [
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Intermediate/chapter-11/img/slide2.webp'),

    'cards' => [
        [
            'emoji' => '💚',
            'label' => 'Question 1',
            'text'  => 'What does empathy mean in your own words?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 2',
            'text'  => 'How is empathy different from sympathy?',
        ],
        [
            'emoji' => '🌍',
            'label' => 'Question 3',
            'text'  => 'Why is empathy important in society?',
        ],
        [
            'emoji' => '🫶',
            'label' => 'Question 4',
            'text'  => 'Can you think of a time when someone showed empathy toward you?',
        ],
        [
            'emoji' => '👥',
            'label' => 'Question 5',
            'text'  => 'How can we show empathy to friends and colleagues who are struggling?',
        ],
        [
            'emoji' => '💡',
            'label' => 'Question 6',
            'text'  => 'Do you think empathy can be learned or improved? How?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])