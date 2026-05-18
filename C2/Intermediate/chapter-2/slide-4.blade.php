<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Correction Form',
            'subtitle'         => 'Document to fix details',
            'example_subtitle' => 'Fill out a correction form for the address.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-2/audios/slide4/correction-form.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-2/img/slide4/correction-form.webp'),
        ],
        [
            'text'             => 'Prioritize',
            'subtitle'         => 'Treat as urgent',
            'example_subtitle' => 'We will prioritize your package.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-2/audios/slide4/prioritize.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-2/img/slide4/prioritize.webp'),
        ],
        [
            'text'             => 'Upgrade',
            'subtitle'         => 'Change to faster service',
            'example_subtitle' => 'I want to upgrade to express delivery.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-2/audios/slide4/upgrade.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-2/img/slide4/upgrade.webp'),
        ],
        [
            'text'             => 'Estimate',
            'subtitle'         => 'Approximate time',
            'example_subtitle' => 'The estimated delivery is 2–3 days.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-2/audios/slide4/estimate.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-2/img/slide4/estimate.webp'),
        ],
        [
            'text'             => 'Issue',
            'subtitle'         => 'Problem',
            'example_subtitle' => 'I have an issue with my shipment.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-2/audios/slide4/issue.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-2/img/slide4/issue.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])