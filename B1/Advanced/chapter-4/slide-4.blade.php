<?php
$content = [
    'title'      => 'Discussion',
    'subtitle'   => 'Environmental Problems',
    'image'      => materialAsset('slider/B1/Advanced/chapter-4/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🌍',
            'label' => 'Question 1',
            'text'  => 'Which environmental problem worries you the most?',
        ],
        [
            'emoji' => '🏭',
            'label' => 'Question 2',
            'text'  => 'What do you think caused this problem?',
        ],
        [
            'emoji' => '🐾',
            'label' => 'Question 3',
            'text'  => 'How do you think it affects people and wildlife?',
        ],
        [
            'emoji' => '♻️',
            'label' => 'Question 4',
            'text'  => 'What can we do to solve it?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])