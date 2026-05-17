<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',

    'items' => [

        [
            'text'     => 'Check in',
            'subtitle' => 'Register for your flight.',
            'emoji'    => '🛂',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide7/Check-in.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/check-in.webp'),
        ],

        [
            'text'     => 'Check-in agent / clerk',
            'subtitle' => 'An airport worker who checks passengers’ tickets and luggage before the flight.',
            'emoji'    => '👩‍💼',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide7/Check-in-agent.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/check-in-agent.webp'),
        ],

        [
            'text'     => 'Flight',
            'subtitle' => 'A journey by plane.',
            'emoji'    => '✈️',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide7/Flight.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/flight.webp'),
        ],

        [
            'text'     => 'Window seat',
            'subtitle' => 'A seat by the window.',
            'emoji'    => '🪟',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide7/Window-seat.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/window-seat.webp'),
        ],

        [
            'text'     => 'Aisle seat',
            'subtitle' => 'A seat next to the aisle, the walking space.',
            'emoji'    => '💺',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide7/Aisle-seat.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/aisle-seat.webp'),
        ],

        [
            'text'     => 'Boarding gate',
            'subtitle' => 'The place where you go to get on the airplane.',
            'emoji'    => '🚪',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide7/Boarding-gate.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/boarding-gate.webp'),
        ],

        [
            'text'     => 'Luggage',
            'subtitle' => 'The bags you take with you when you travel.',
            'emoji'    => '🧳',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide7/Luggage.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/luggage.webp'),
        ],

        [
            'text'     => 'Suitcase',
            'subtitle' => 'A bag used to carry your clothes when you travel.',
            'emoji'    => '🧳',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide7/Suitcase.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/suitcase.webp'),
        ],

        [
            'text'     => 'Scale',
            'subtitle' => 'A machine used to weigh luggage.',
            'emoji'    => '⚖️',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide7/Scale.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/scale.webp'),
        ],

        [
            'text'     => 'Excess baggage',
            'subtitle' => 'Extra luggage that costs more.',
            'emoji'    => '➕',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide7/Excess-baggage.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/excess-baggage.webp'),
        ],

        [
            'text'     => 'Carry-on',
            'subtitle' => 'A bag you bring with you on the plane.',
            'emoji'    => '🎒',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide7/Carry-on.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/carry-on.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])