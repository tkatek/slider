<?php
$content = [
    'page_title' => 'Introduction to Parents Day',
    'title'      => 'Introduction to Parents Day',
    'subtitle'   => 'Why is it an important occasion?',
    'image'      => materialAsset('slider/A1/Intermediate/chapter-3/images/slide3.webp'),

    'cards' => [
        [
            'emoji' => '🎉',
            'label' => 'Special Occasion',
            'text'  => 'Parents\' Day is a special time for families to meet and work with the school.',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Why Is It Important?',
            'text'  => 'It helps teachers and parents support kids\' learning.',
            'theme' => 'blue',
        ],
    ],
];
?>
@include('slider.other.discussion', ['content' => $content])
