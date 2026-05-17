<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Key Vocabulary in Transportation',

    'grid_class' => 'grid-cols-2 sm:grid-cols-5',

    'items' => [

        [
            'text'     => 'Bus stop',
            'subtitle' => 'A designated area for waiting for buses',
            'emoji'    => '🚏',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-4/audios/slide7/bus-stop.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-4/img/slide7/bus-stop.webp'),
        ],

        [
            'text'     => 'Subway / Metro',
            'subtitle' => 'An underground train system for urban travel',
            'emoji'    => '🚇',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-4/audios/slide7/subway.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-4/img/slide7/subway.webp'),
        ],

        [
            'text'     => 'Taxi / Cab',
            'subtitle' => 'A paid vehicle service for individual transportation',
            'emoji'    => '🚕',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-4/audios/slide7/taxi.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-4/img/slide7/taxi.webp'),
        ],

        [
            'text'     => 'Ride-sharing',
            'subtitle' => 'Using apps to share rides with others',
            'emoji'    => '📱',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-4/audios/slide7/ride-sharing.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-4/img/slide7/ride-sharing.webp'),
        ],

        [
            'text'     => 'Bicycle lane',
            'subtitle' => 'A section of road designated for cyclists',
            'emoji'    => '🚲',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-4/audios/slide7/bicycle-lane.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-4/img/slide7/bicycle-lane.webp'),
        ],

        [
            'text'     => 'Traffic',
            'subtitle' => 'The flow of vehicles on streets and roads',
            'emoji'    => '🚦',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-4/audios/slide7/traffic.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-4/img/slide7/traffic.webp'),
        ],

        [
            'text'     => 'Transfer',
            'subtitle' => 'Changing from one mode of transportation to another',
            'emoji'    => '🔄',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-4/audios/slide7/transfer.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-4/img/slide7/transfer.webp'),
        ],

        [
            'text'     => 'Fare',
            'subtitle' => 'The money you pay to ride',
            'emoji'    => '💵',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-4/audios/slide7/fare.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-4/img/slide7/fare.webp'),
        ],

        [
            'text'     => 'Change',
            'subtitle' => 'Small money like coins',
            'emoji'    => '🪙',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-4/audios/slide7/change.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-4/img/slide7/change.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])