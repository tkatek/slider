<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',
    'use_objectives_typography' => true,

    'sentences' => [
        [
            'text'  => 'Station & Travel',

            'tone'  => 'blue',
        ],
        [
            'text'  => 'On the Train',

            'tone'  => 'green',
        ],
        [
            'text'  => 'During the Journey',

            'tone'  => 'orange',
        ],
    ],

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3',

    'items' => [
        ['text'=>'Ticket machine', 'emoji'=>'🎫', 'group'=>'Station & Travel',    'group_tone'=>'blue', 'subtitle'=>'A machine used to purchase travel tickets.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/ticket-machine.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/tickets.webp')],
        ['text'=>'Sleeping car',   'emoji'=>'🚆', 'group'=>'On the Train',        'group_tone'=>'green',   'subtitle'=>'A railway carriage with beds for passengers to sleep in.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/sleeping-car.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/sleeping-car.webp')],
        ['text'=>'Buffet car',     'emoji'=>'🍽️', 'group'=>'During the Journey', 'group_tone'=>'orange',   'subtitle'=>'A carriage on a train where you can buy food and drinks.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/buffet-car.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/buffet-car.webp')],

        ['text'=>'Entrance',       'emoji'=>'🚪', 'group'=>'Station & Travel',    'group_tone'=>'blue', 'subtitle'=>'The door or gate where you enter a building or place.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/entrance.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/entrance.webp')],
        ['text'=>'Seats',          'emoji'=>'💺', 'group'=>'On the Train',        'group_tone'=>'green',   'subtitle'=>'Places to sit.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/seats.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/seats.webp')],
        ['text'=>'Snack',          'emoji'=>'🍪', 'group'=>'During the Journey', 'group_tone'=>'orange',   'subtitle'=>'A small amount of food eaten between meals.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/snack.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/snack.webp')],

        ['text'=>'Timetable',      'emoji'=>'🕒', 'group'=>'Station & Travel',    'group_tone'=>'blue', 'subtitle'=>'A list of times when trains, buses, etc., arrive and depart.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/timetable.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/timetable.webp')],
        ['text'=>'Luggage rack',   'emoji'=>'🧳', 'group'=>'On the Train',        'group_tone'=>'green',   'subtitle'=>'A shelf above the seats for putting bags.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/luggage-rack.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/luggage-rack.webp')],
        ['text'=>'Journey',        'emoji'=>'🗺️', 'group'=>'During the Journey', 'group_tone'=>'orange',   'subtitle'=>'The act of traveling from one place to another.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/journey.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/journey.webp')],

        ['text'=>'Platform',       'emoji'=>'🚉', 'group'=>'Station & Travel',    'group_tone'=>'blue', 'subtitle'=>'The area at a train station where passengers get on and off trains.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/platform.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/platform.webp')],
        ['text'=>'Bunk beds',      'emoji'=>'🛏️', 'group'=>'On the Train',        'group_tone'=>'green',   'subtitle'=>'Two beds, one on top of the other.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/bunk-beds.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/bunk-beds.webp')],
        ['placeholder' => true],

        ['text'=>'Train guard',    'emoji'=>'🧑‍✈️', 'group'=>'Station & Travel', 'group_tone'=>'blue', 'subtitle'=>'A person responsible for the safety of a train.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/train-guard.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/train-guard.webp')],
        ['placeholder' => true],
        ['placeholder' => true],

        ['text'=>'Traveling',      'emoji'=>'🧳', 'group'=>'Station & Travel',    'group_tone'=>'blue', 'subtitle'=>'Going from one place to another.', 'sound'=>materialAsset('slider/A1/Advanced/chapter-6/audios/slide7/traveling.mp3'), 'image'=>materialAsset('slider/A1/Advanced/chapter-6/img/slide7/traveling.webp')],
        ['placeholder' => true],
        ['placeholder' => true],
    ],
];
?>

@include('slider.vocab.vocabulary-grid', ['content' => $content])
