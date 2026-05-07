<?php
$content = [
    'page_title' => 'New Language',
    'title' => 'New Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'new-language-vocabulary',
            'title' => 'Useful Language',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'To some extent',
                    'emoji' => '↔️',
                    'description' => 'Partially',
                    'sound' => null,
                ],
                [
                    'text' => 'Nuanced',
                    'emoji' => '✨',
                    'description' => 'Showing subtle differences',
                    'sound' => null,
                ],
                [
                    'text' => 'Fulfillment',
                    'emoji' => '😊',
                    'description' => 'Feeling satisfied',
                    'sound' => null,
                ],
                [
                    'text' => 'Perspective',
                    'emoji' => '👁️',
                    'description' => 'Point of view',
                    'sound' => null,
                ],
                [
                    'text' => 'Diplomatically',
                    'emoji' => '🤝',
                    'description' => 'Politely and carefully',
                    'sound' => null,
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])