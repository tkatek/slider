<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title' => 'New Vocabulary',
    'subtitle' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',

    'groups' => [
        [
            'key' => 'verbs',
            'title' => 'Verbs',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4',
            'items' => [
                ['text' => 'arrive → arrived', 'emoji' => '📍', 'description' => 'get to a place', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/arrive.mp3')],
                ['text' => 'stay → stayed', 'emoji' => '🏨', 'description' => 'live somewhere for a short time', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/stay.mp3')],
                ['text' => 'sleep → slept', 'emoji' => '😴', 'description' => 'rest at night', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/sleep.mp3')],
                ['text' => 'go → went', 'emoji' => '🚶', 'description' => 'move / travel', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/go.mp3')],
                ['text' => 'steal → stole', 'emoji' => '👛', 'description' => 'take something bad/illegal', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/steal.mp3')],
                ['text' => 'cancel → cancelled', 'emoji' => '❌', 'description' => 'stop something', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/cancel.mp3')],
                ['text' => 'meet → met', 'emoji' => '🤝', 'description' => 'see someone for the first time', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/meet.mp3')],
            ],
        ],
        [
            'key' => 'nouns',
            'title' => 'Nouns',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 xl:grid-cols-6',
            'items' => [
                ['text' => 'vacation', 'emoji' => '🏖️', 'description' => 'holiday', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/vacation.mp3')],
                ['text' => 'flight', 'emoji' => '✈️', 'description' => 'travel by plane', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/flight.mp3')],
                ['text' => 'weather', 'emoji' => '⛅', 'description' => 'sun, rain, wind', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/weather.mp3')],
                ['text' => 'hotel', 'emoji' => '🏨', 'description' => 'place to stay', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/hotel.mp3')],
                ['text' => 'room', 'emoji' => '🚪', 'description' => 'space in a building', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/room.mp3')],
                ['text' => 'cafe', 'emoji' => '☕', 'description' => 'place to drink coffee', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/cafe.mp3')],
                ['text' => 'music', 'emoji' => '🎵', 'description' => 'sounds / song', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/music.mp3')],
                ['text' => 'food', 'emoji' => '🍽️', 'description' => 'things we eat', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/food.mp3')],
                ['text' => 'waiter', 'emoji' => '🧑‍🍳', 'description' => 'person who serves food', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/waiter.mp3')],
                ['text' => 'wallet', 'emoji' => '👛', 'description' => 'small bag for money', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/wallet.mp3')],
                ['text' => 'sun', 'emoji' => '🌞', 'description' => 'the star in the sky', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/sun.mp3')],
            ],
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])