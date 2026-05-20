<?php

$content = [

    'title'      => 'New Vocabulary',
    'subtitle'   => 'Rooms in a Home',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5',


    'items' => [
        [
            'text'     => 'Bedroom',
            'emoji'    => '🛏️',
            'image'    => materialAsset('slider/A1/Beginner/chapter-5/img/slide7/bedroom.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/bedroom.mp3'),
            'subtitle' => 'A room where you sleep and rest.',
        ],
        [
            'text'     => 'Bathroom',
            'emoji'    => '🚿',
            'image'    => materialAsset('slider/A1/Beginner/chapter-5/img/slide7/bathroom.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/bathroom.mp3'),
            'subtitle' => 'A room where you wash and use the toilet.',
        ],
        [
            'text'     => 'Kitchen',
            'emoji'    => '🍳',
            'image'    => materialAsset('slider/A1/Beginner/chapter-5/img/slide7/kitchen.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/kitchen.mp3'),
            'subtitle' => 'A room where you cook and prepare food.',
        ],
        [
            'text'     => 'Living room',
            'emoji'    => '🛋️',
            'image'    => materialAsset('slider/A1/Beginner/chapter-5/img/slide7/living-room.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/living-room.mp3'),
            'subtitle' => 'A room where you relax, watch TV, or sit with family.',
        ],
        [
            'text'     => 'Dining room',
            'emoji'    => '🍽️',
            'image'    => materialAsset('slider/A1/Beginner/chapter-5/img/slide7/dining-room.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/dining-room.mp3'),
            'subtitle' => 'A room where you eat meals at a table.',
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])
