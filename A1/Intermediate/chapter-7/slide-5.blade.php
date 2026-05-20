<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Different types of holidays',
    'subtitle'   => 'What’s your favourite type of holiday?',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4',

    'items' => [

        [
            'text'     => 'Beach holiday',
            'subtitle' => 'A relaxing beach vacation by the sea.',
            'emoji'    => '🏖️',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide-6/beach-holiday.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-5/beach.webp'),
        ],

        [
            'text'     => 'City break',
            'subtitle' => 'A short trip to a city to enjoy culture and shopping.',
            'emoji'    => '🏙️',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide-6/city-break.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-5/city-break.webp'),
        ],

        [
            'text'     => 'Outdoor adventure',
            'subtitle' => 'An active holiday in nature with sports and exploration.',
            'emoji'    => '🧗',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide-6/outdoor-adventure.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-5/outdoor-adventure.webp'),
        ],

        [
            'text'     => 'Cultural getaway',
            'subtitle' => 'A vacation focused on local traditions, arts and historic sites.',
            'emoji'    => '🏛️',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide-6/cultural-getaway.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-5/cultural-Holiday.webp'),
        ],

        [
            'text'     => 'Cruise',
            'subtitle' => 'A holiday trip on a big ship that travels to different places.',
            'emoji'    => '🛳️',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide-5/cruise.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-5/cruise.webp'),
        ],

        [
            'text'     => 'Hiking',
            'subtitle' => 'Walking for a long distance in nature, usually on mountains, hills, or trails.',
            'emoji'    => '🥾',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide-5/hiking.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-5/hiking.webp'),
        ],

        [
            'text'     => 'Camping',
            'subtitle' => 'Sleeping outside in a tent, usually in nature.',
            'emoji'    => '⛺',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide-5/camping.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-5/camping.webp'),
        ],

        [
            'text'     => 'Safari',
            'subtitle' => 'A trip to watch wild animals in nature.',
            'emoji'    => '🦁',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide-5/safari.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-5/safari.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])