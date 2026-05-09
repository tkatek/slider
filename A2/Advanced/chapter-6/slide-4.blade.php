<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Advanced/chapter-6/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '😊',
            'label' => 'Question 1',
            'text'  => 'How do people feel in a new country?',
        ],
        [
            'emoji' => '⚠️',
            'label' => 'Question 2',
            'text'  => 'What problems can people have abroad?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 3',
            'text'  => 'How can people make new friends in another country?',
        ],
        [
            'emoji' => '🌍',
            'label' => 'Question 4',
            'text'  => 'What challenges do you face in a new country?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])