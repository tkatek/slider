<?php
$content = [
    'page_title' => 'Practice 1',
    'title' => 'Practice 1',
    'subtitle' => 'Read & find the match',
    'type' => 'grid',
    'items' => [
        [
            'key' => 'hotel-reception',
            'text' => 'Hotel reception',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/hotel-reception.webp'),
            'caption' => '',
        ],
        [
            'key' => 'lift-or-elevator',
            'text' => 'Lift or elevator',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/elevator.webp'),
            'caption' => '',
        ],
        [
            'key' => 'receptionist',
            'text' => 'Receptionist',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/receptionist.webp'),
            'caption' => '',
        ],
        [
            'key' => 'guests',
            'text' => 'Guests',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/guests.webp'),
            'caption' => '',
        ],
        [
            'key' => 'front-desk-or-counter',
            'text' => 'Front desk or counter',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/front-desk.webp'),
            'caption' => '',
        ],
        [
            'key' => 'double-room',
            'text' => 'Double room: a room with one double bed',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/double-room.webp'),
            'caption' => '',
        ],
        [
            'key' => 'twin-room',
            'text' => 'Twin room: a room with two single beds',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/twin-room.webp'),
            'caption' => '',
        ],
        [
            'key' => 'single-room',
            'text' => 'Single room: a room with one single bed',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/single-room.webp'),
            'caption' => '',
        ],
        [
            'key' => 'ground-floor-or-first-floor',
            'text' => 'The ground floor or first floor',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/first-floor.webp'),
            'caption' => '',
        ],
        [
            'key' => 'bar',
            'text' => 'The bar',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/bar.webp'),
            'caption' => '',
        ],
        [
            'key' => 'triple-room',
            'text' => 'Triple room: a room with three single beds',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/triple-room.webp'),
            'caption' => '',
        ],
        [
            'key' => 'four-bed-room',
            'text' => 'Four-bed room: a room with four single beds',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/four-bed-room.webp'),
            'caption' => '',
        ],
        [
            'key' => 'quad',
            'text' => 'Quad: a room for 4 guests with different types of beds',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/four-bed-room.webp'),
            'caption' => '',
        ],
        [
            'key' => 'bunk-bed',
            'text' => 'A bunk bed',
            'image' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/bunk-bed.webp'),
            'caption' => '',
        ],
    ],
];
?>

@include('slider.game.guess-who', ['content' => $content])