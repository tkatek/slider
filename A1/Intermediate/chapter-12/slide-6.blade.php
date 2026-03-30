<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-6',

    'items' => [

        [
            'text'     => 'Flight Attendant',
            'subtitle' => 'A person who works on the plane and helps passengers',
            'emoji'    => '🧑‍✈️',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/flight-attendant.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/flight-attendant.webp'),
        ],

        [
            'text'     => 'Pilot',
            'subtitle' => 'The person who flies the plane',
            'emoji'    => '✈️',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/pilot.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/pilot.webp'),
        ],

        [
            'text'     => 'Passenger',
            'subtitle' => 'A person who travels on a plane',
            'emoji'    => '🧍',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/passenger.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/passenger.webp'),
        ],

        [
            'text'     => 'Boarding Pass',
            'subtitle' => 'A paper or phone ticket that lets you get on the plane',
            'emoji'    => '🎫',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/boarding-pass.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/boarding-pass.webp'),
        ],

        [
            'text'     => 'Seat',
            'subtitle' => 'The chair where you sit on the plane',
            'emoji'    => '💺',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/seat.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/seat.webp'),
        ],

        [
            'text'     => 'Overhead Bin',
            'subtitle' => 'The space above your head where you put your bag',
            'emoji'    => '🧳',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/overhead-bin.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/overhead-bin.webp'),
        ],

        [
            'text'     => 'Airplane Mode',
            'subtitle' => 'A phone setting that turns off internet and signals during a flight',
            'emoji'    => '📱',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/airplane-mode.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/airplane-mode.webp'),
        ],

        [
            'text'     => 'Flight',
            'subtitle' => 'A trip on a plane from one place to another',
            'emoji'    => '🌍',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/flight.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/flight.webp'),
        ],

        [
            'text'     => 'Tray Table',
            'subtitle' => 'The small table in front of your seat',
            'emoji'    => '🪑',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/tray-table.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/tray-table.webp'),
        ],

        [
            'text'     => 'Life Jacket',
            'subtitle' => 'A special jacket that helps you float on water in an emergency',
            'emoji'    => '🦺',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/life-jacket.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/life-jacket.webp'),
        ],

        [
            'text'     => 'Fasten Your Seatbelt',
            'subtitle' => 'To close and tighten your seatbelt for safety',
            'emoji'    => '🔒',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/fasten-your-seatbelt.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/fasten-your-seatbelt.webp'),
        ],

        [
            'text'     => 'Departure Lounge',
            'subtitle' => 'The area where you wait before getting on the plane',
            'emoji'    => '🛫',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/departure-lounge.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/departure-lounge.webp'),
        ],

        [
            'text'     => 'Take Off',
            'subtitle' => 'When the plane leaves the ground',
            'emoji'    => '🚀',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/take-off.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/take-off.webp'),
        ],

        [
            'text'     => 'Land',
            'subtitle' => 'When the plane comes down to the ground',
            'emoji'    => '🛬',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/land.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/land.webp'),
        ],

        [
            'text'     => 'Escalator',
            'subtitle' => 'Moving stairs that take people up or down',
            'emoji'    => '🪜',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/escalator.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/escalator.webp'),
        ],

        [
            'text'     => 'Trolley',
            'subtitle' => 'A small cart with wheels that you push to carry bags or food',
            'emoji'    => '🛒',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide6/trolley.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/trolley.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])