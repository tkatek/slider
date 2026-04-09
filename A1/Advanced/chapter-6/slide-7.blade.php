<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Useful words for the station, the train, and the journey.',

    'allow_html_subtitles' => true,
    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

    'items' => [

        [
            'text' => 'Ticket machine',
            'subtitle' => 'A machine used to purchase travel tickets.',
            'emoji' => '🎫',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/ticket-machine.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/tickets.webp'),
        ],

        [
            'text' => 'Entrance',
            'subtitle' => 'The door or gate where you enter a building or place.',
            'emoji' => '🚪',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/entrance.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/entrance.webp'),
        ],

        [
            'text' => 'Timetable',
            'subtitle' => 'A list of times when trains, buses, etc., arrive and depart.',
            'emoji' => '🕒',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/timetable.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/timetable.webp'),
        ],

        [
            'text' => 'Platform',
            'subtitle' => 'The area at a train station where passengers get on and off trains.',
            'emoji' => '🚉',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/platform.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/platform.webp'),
        ],

        [
            'text' => 'Train guard',
            'subtitle' => 'A person responsible for the safety of a train.',
            'emoji' => '🧑‍✈️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/train-guard.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/train-guard.webp'),
        ],

        [
            'text' => 'Traveling',
            'subtitle' => 'Going from one place to another.',
            'emoji' => '🧳',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/traveling.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/traveling.webp'),
        ],

        [
            'text' => 'Sleeping car',
            'subtitle' => 'A railway carriage with beds for passengers to sleep in.',
            'emoji' => '🚆',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/sleeping-car.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/sleeping-car.webp'),
        ],

        [
            'text' => 'Seats',
            'subtitle' => 'Places to sit.',
            'emoji' => '💺',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/seats.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/seats.webp'),
        ],

        [
            'text' => 'Luggage rack',
            'subtitle' => 'A shelf above the seats for putting bags.',
            'emoji' => '🧳',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/luggage-rack.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/luggage-rack.webp'),
        ],

        [
            'text' => 'Bunk beds',
            'subtitle' => 'Two beds, one on top of the other.',
            'emoji' => '🛏️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/bunk-beds.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/bunk-beds.webp'),
        ],

        [
            'text' => 'Buffet car',
            'subtitle' => 'A carriage on a train where you can buy food and drinks.',
            'emoji' => '🍽️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/buffet-car.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/buffet-car.webp'),
        ],

        [
            'text' => 'Snack',
            'subtitle' => 'A small amount of food eaten between meals.',
            'emoji' => '🍪',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/snack.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/snack.webp'),
        ],

        [
            'text' => 'Journey',
            'subtitle' => 'The act of traveling from one place to another.',
            'emoji' => '🗺️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/journey.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/journey.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])