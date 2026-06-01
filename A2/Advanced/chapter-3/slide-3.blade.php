<?php

$content = [
    'page_title' => 'Warm-up: Practice 1',
    'title'      => 'Warm-up: Practice 1',
    'subtitle'   => 'Can you guess the job?!',

    'card_type'  => 'image-audio',
    'card_label' => '',

    'cards' => [
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/singer.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/singer.mp3'),
        ],
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/nurse.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/nurse.mp3'),
        ],
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/police.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/police-officer.mp3'),
        ],
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/firefighter.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/firefighter.mp3'),
        ],
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A1/Advanced/chapter-4/img/slide7/taxi.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/taxi-driver.mp3'),
        ],
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/farmer.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/farmer.mp3'),
        ],
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/veterinarian.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/vet.mp3'),
        ],
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/doctor.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/doctor.mp3'),
        ],
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/hairdresser.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/hairdresser.mp3'),
        ],
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/barber.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/barber.mp3'),
        ],
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/salesperson.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/shop-assistant.mp3'),
        ],
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/pet-food-taster.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/pet-food-taster.mp3'),
        ],
        [
            'title'       => '',
            'description' => '',
            'image'       => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/professional-sleeper.webp'),
            'audio'       => materialAsset('slider/A2/Advanced/chapter-3/audios/slide3/professional-sleeper.mp3'),
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])