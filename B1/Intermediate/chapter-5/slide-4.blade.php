<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion Questions',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Intermediate/chapter-5/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '📱',
            'label' => 'Question 1',
            'text'  => 'Do you follow any influencers online?',
        ],
        [
            'emoji' => '💬',
            'label' => 'Question 2',
            'text'  => 'Which social media platforms do you use most?',
        ],
        [
            'emoji' => '🛍️',
            'label' => 'Question 3',
            'text'  => 'Have you ever bought something because an influencer recommended it?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 4',
            'text'  => 'Why do people trust influencers?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])