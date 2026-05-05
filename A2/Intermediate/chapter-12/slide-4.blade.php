<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Intermediate/chapter-12/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '💬',
            'label' => 'Question 1',
            'text'  => 'How do you communicate? Face-to-face or online?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 2',
            'text'  => 'Do you prefer talking face-to-face or online? Why?',
        ],
        [
            'emoji' => '👀',
            'label' => 'Question 3',
            'text'  => 'What do we use in face-to-face communication? Voice, eye contact, gestures.',
        ],
        [
            'emoji' => '🗣️',
            'label' => 'Useful Phrase',
            'text'  => 'I prefer … because …',
        ],
        [
            'emoji' => '💡',
            'label' => 'Useful Phrase',
            'text'  => 'In my opinion…',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])