<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Hotel Vocabulary',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-6',

    'items' => [

        [
            'text'     => 'A reservation',
            'subtitle' => 'A booking you make to save a room',
            'emoji'    => '🛎️',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/reservation.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/reservation.webp'),
        ],

        [
            'text'     => 'A single room',
            'subtitle' => 'A room for one person',
            'emoji'    => '🛏️',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/single-room.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/single-room.webp'),
        ],

        [
            'text'     => 'Receptionist',
            'subtitle' => 'The clerk who receives guests at the hotel',
            'emoji'    => '👩‍💼',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/receptionist.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/receptionist.webp'),
        ],

        [
            'text'     => 'A registration form',
            'subtitle' => 'A paper you fill out with your details.',
            'emoji'    => '📝',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/registration-form.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/registration-form.webp'),
        ],

        [
            'text'     => 'The spa',
            'subtitle' => 'A place to relax with treatment.',
            'emoji'    => '🧖',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/spa.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/spa.webp'),
        ],

        [
            'text'     => 'A deluxe room',
            'subtitle' => 'A bigger and much better room.',
            'emoji'    => '🏨',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/deluxe-room.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/deluxe-room.webp'),
        ],

        [
            'text'     => 'The elevators',
            'subtitle' => 'Machines that take you up or down floors of a building.',
            'emoji'    => '🛗',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/elevators.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/elevator.webp'),
        ],

        [
            'text'     => 'A double bed',
            'subtitle' => 'A bed for two.',
            'emoji'    => '🛌',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/double-bed.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/double-bed.webp'),
        ],

        [
            'text'     => 'First floor',
            'subtitle' => 'The level just above the ground',
            'emoji'    => '1️⃣',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/first-floor.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/first-floor.webp'),
        ],

        [
            'text'     => 'The front desk',
            'subtitle' => 'The place where you check-in or out.',
            'emoji'    => '🏨',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/front-desk.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/front-desk.webp'),
        ],

        [
            'text'     => 'The roof',
            'subtitle' => 'The top of a building',
            'emoji'    => '🏠',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/roof.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/roof.webp'),
        ],

        [
            'text'     => 'A changing room',
            'subtitle' => 'A room to change clothes',
            'emoji'    => '🚪',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/changing-room.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/change-room.webp'),
        ],

        [
            'text'     => 'Pay a deposit',
            'subtitle' => 'Pay some money before you stay',
            'emoji'    => '💵',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/deposit.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/deposit.webp'),
        ],

        [
            'text'     => 'Upgrade',
            'subtitle' => 'To choose a higher level item or room, etc.',
            'emoji'    => '⬆️',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/upgrade.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/upgrade.webp'),
        ],

        [
            'text'     => 'Include',
            'subtitle' => 'To have as part of something',
            'emoji'    => '📦',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/include.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/include.webp'),
        ],

        [
            'text'     => 'Sign',
            'subtitle' => 'To write your name',
            'emoji'    => '✍️',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-1/audios/slide6/sign.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide6/sing.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])