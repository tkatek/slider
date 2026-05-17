<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title' => 'New Vocabulary',
    'subtitle' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',

    'groups' => [
        [
            'key' => 'verbs',
            'title' => '💭 Verbs',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4',
            'items' => [
                ['text' => 'Arrive → Arrived', 'emoji' => '📍', 'description' => 'Get to a place', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/arrive.mp3')],
                ['text' => 'Stay → Stayed', 'emoji' => '🏨', 'description' => 'Live somewhere for a short time', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/stay.mp3')],
                ['text' => 'Sleep → Slept', 'emoji' => '😴', 'description' => 'Rest at night', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/sleep.mp3')],
                ['text' => 'Go → Went', 'emoji' => '🚶', 'description' => 'Move / travel', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/go.mp3')],
                ['text' => 'Steal → Stole', 'emoji' => '👛', 'description' => 'Take something bad/illegal', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/steal.mp3')],
                ['text' => 'Cancel → Cancelled', 'emoji' => '❌', 'description' => 'Stop something', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/cancel.mp3')],
                ['text' => 'Meet → Met', 'emoji' => '🤝', 'description' => 'See someone for the first time', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/meet.mp3')],
            ],
        ],
        [
            'key' => 'nouns',
            'title' => '💭 Nouns',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',
            'items' => [
                ['text' => 'Vacation', 'emoji' => '🏖️', 'description' => 'Holiday', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/vacation.mp3')],
                ['text' => 'Flight', 'emoji' => '✈️', 'description' => 'Travel by plane', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/flight.mp3')],
                ['text' => 'Weather', 'emoji' => '⛅', 'description' => 'Sun, rain, wind', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/weather.mp3')],
                ['text' => 'Hotel', 'emoji' => '🏨', 'description' => 'Place to stay', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/hotel.mp3')],
                ['text' => 'Room', 'emoji' => '🚪', 'description' => 'Space in a building', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/room.mp3')],
                ['text' => 'Cafe', 'emoji' => '☕', 'description' => 'Place to drink coffee', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/cafe.mp3')],
                ['text' => 'Music', 'emoji' => '🎵', 'description' => 'Sounds / song', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/music.mp3')],
                ['text' => 'Food', 'emoji' => '🍽️', 'description' => 'Things we eat', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/food.mp3')],
                ['text' => 'Waiter', 'emoji' => '🧑‍🍳', 'description' => 'Person who serves food', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/waiter.mp3')],
                ['text' => 'Wallet', 'emoji' => '👛', 'description' => 'Small bag for money', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/wallet.mp3')],
                ['text' => 'Sun', 'emoji' => '🌞', 'description' => 'The star in the sky', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/sun.mp3')],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])