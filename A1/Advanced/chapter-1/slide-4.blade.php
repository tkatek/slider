<?php
$content['page_title'] = 'Practice 1';
$content['title'] = 'Practice 1';
$content['subtitle'] = 'Read & find the match';

$content['professions'] = [
    [
        'id' => 'hotel-reception',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/hotel-reception.webp'),
        'color' => 'bg-card-pink',
        'desc' => 'Hotel reception',
    ],
    [
        'id' => 'lift-or-elevator',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/elevator.webp'),
        'color' => 'bg-card-blue',
        'desc' => 'Lift or elevator',
    ],
    [
        'id' => 'receptionist',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/receptionist.webp'),
        'color' => 'bg-card-green',
        'desc' => 'Receptionist',
    ],
    [
        'id' => 'guests',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/guests.webp'),
        'color' => 'bg-card-yellow',
        'desc' => 'Guests',
    ],
    [
        'id' => 'front-desk-or-counter',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/front-desk.webp'),
        'color' => 'bg-card-purple',
        'desc' => 'Front desk or counter',
    ],
    [
        'id' => 'double-room',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/double-room.webp'),
        'color' => 'bg-card-red',
        'desc' => 'Double room: a room with one double bed',
    ],
    [
        'id' => 'twin-room',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/twin-room.webp'),
        'color' => 'bg-card-cyan',
        'desc' => 'Twin room: a room with two single beds',
    ],
    [
        'id' => 'single-room',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/single-room.webp'),
        'color' => 'bg-card-orange',
        'desc' => 'Single room: a room with one single bed',
    ],
    [
        'id' => 'ground-floor-or-first-floor',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/first-floor.webp'),
        'color' => 'bg-card-teal',
        'desc' => 'The ground floor or first floor',
    ],
    [
        'id' => 'bar',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/bar.webp'),
        'color' => 'bg-card-pink',
        'desc' => 'The bar',
    ],
    [
        'id' => 'triple-room',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/triple-room.webp'),
        'color' => 'bg-card-blue',
        'desc' => 'Triple room: a room with three single beds',
    ],
    [
        'id' => 'four-bed-room',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/four-bed-room.webp'),
        'color' => 'bg-card-indigo',
        'desc' => 'Four-bed room: a room with four single beds',
    ],
    [
        'id' => 'quad',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/four-bed-room.webp'),
        'color' => 'bg-card-lime',
        'desc' => 'Quad: a room for 4 guests with different types of beds',
    ],
    [
        'id' => 'bunk-bed',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/bunk-bed.webp'),
        'color' => 'bg-card-sky',
        'desc' => 'A bunk bed',
    ],
];
?>

@include("slider.game.guess-who", ['content' => $content])