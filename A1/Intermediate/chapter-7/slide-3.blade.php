<?php

$content = [
    'page_title' => 'Holiday Preferences',
    'title'      => 'Where do you go on holiday?',
    'subtitle'   => 'Tick the places you like, then press confirm.',


    'items' => [
        [
            'label' => 'Beach',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/beach.webp'),
        ],
        [
            'label' => 'Hiking',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/mountains.webp'),
        ],
        [
            'label' => 'Cruise',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/cruise.webp'),
        ],
        [
            'label' => 'Historical places',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/historical-places.webp'),
        ],
        [
            'label' => 'Camping',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/camping.webp'),
        ],
        [
            'label' => 'Safari',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/safari.webp'),
        ],
    ],
];

?>

@include("slider.other.warm-up-preferences", ['content' => $content])

