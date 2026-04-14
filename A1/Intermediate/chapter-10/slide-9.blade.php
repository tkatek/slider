<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Polite Requests',
    'image'      => materialAsset('slider/A1/Intermediate/chapter-10/img/slide9.webp'),

    'cards' => [
        [
            'emoji' => '🙏',
            'label' => 'Card 1 - Polite Requests',
            'text'  => "Can I have...?\nCan I see...?\nWould you like...?",
            'theme' => 'indigo',
        ],
        [
            'emoji' => '🧩',
            'label' => 'Card 2 - Structure',
            'text'  => 'Can + subject + base verb?',
            'theme' => 'blue',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
