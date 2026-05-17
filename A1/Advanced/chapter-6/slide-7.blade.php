<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'groups' => [
        [
            'key'        => 'station-travel',
            'title' => '🚉 Station & Travel',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',
            'items'      => [
                [
                    'text'     => 'Ticket machine',
                    'emoji'    => '🎫',
                    'subtitle' => 'A machine used to purchase travel tickets.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/ticket-machine.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/tickets.webp'),
                ],
                [
                    'text'     => 'Entrance',
                    'emoji'    => '🚪',
                    'subtitle' => 'The door or gate where you enter a building or place.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/entrance.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/entrance.webp'),
                ],
                [
                    'text'     => 'Timetable',
                    'emoji'    => '🕒',
                    'subtitle' => 'A list of times when trains, buses, etc., arrive and depart.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/timetable.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/timetable.webp'),
                ],
                [
                    'text'     => 'Platform',
                    'emoji'    => '🚉',
                    'subtitle' => 'The area at a train station where passengers get on and off trains.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/platform.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/platform.webp'),
                ],
                [
                    'text'     => 'Train guard',
                    'emoji'    => '🧑‍✈️',
                    'subtitle' => 'A person responsible for the safety of a train.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/train-guard.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/train-guard.webp'),
                ],
                [
                    'text'     => 'Traveling',
                    'emoji'    => '🧳',
                    'subtitle' => 'Going from one place to another.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/traveling.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/traveling.webp'),
                ],
            ],
        ],
        [
            'key'        => 'on-the-train',
            'title'      => '🚆 On the Train',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4',
            'items'      => [
                [
                    'text'     => 'Sleeping car',
                    'emoji'    => '🚆',
                    'subtitle' => 'A railway carriage with beds for passengers to sleep in.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/sleeping-car.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/sleeping-car.webp'),
                ],
                [
                    'text'     => 'Seats',
                    'emoji'    => '💺',
                    'subtitle' => 'Places to sit.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/seats.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/seats.webp'),
                ],
                [
                    'text'     => 'Luggage rack',
                    'emoji'    => '🧳',
                    'subtitle' => 'A shelf above the seats for putting bags.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/luggage-rack.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/luggage-rack.webp'),
                ],
                [
                    'text'     => 'Bunk beds',
                    'emoji'    => '🛏️',
                    'subtitle' => 'Two beds, one on top of the other.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/bunk-beds.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/bunk-beds.webp'),
                ],
            ],
        ],
        [
            'key'        => 'during-the-journey',
            'title'      => '🗺️ During the Journey',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4',
            'items'      => [
                [
                    'text'     => 'Buffet car',
                    'emoji'    => '🍽️',
                    'subtitle' => 'A carriage on a train where you can buy food and drinks.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/buffet-car.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/buffet-car.webp'),
                ],
                [
                    'text'     => 'Snack',
                    'emoji'    => '🍪',
                    'subtitle' => 'A small amount of food eaten between meals.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/snack.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/snack.webp'),
                ],
                [
                    'text'     => 'Journey',
                    'emoji'    => '🗺️',
                    'subtitle' => 'The act of traveling from one place to another.',
                    'sound'    => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/journey.mp3'),
                    'image'    => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/journey.webp'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])