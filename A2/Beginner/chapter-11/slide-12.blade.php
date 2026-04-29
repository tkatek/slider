<?php
$content = [
    'page_title' => 'New vocabulary 3',
    'title'      => 'New vocabulary 3',
    'subtitle'   => 'Which of these is a healthy choice?',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5',

    'items'      => [
        [
            'text'  => 'stir-fried noodles',
            'emoji' => '🍜',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide12/stir-fried-noodles.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide12/stir-fried-noodles.webp"),
        ],
        [
            'text'  => 'grilled shrimp',
            'emoji' => '🍤',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide12/grilled-shrimp.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide12/grilled-shrimp.webp"),
        ],
        [
            'text'  => 'steamed vegetables',
            'emoji' => '🥦',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide12/steamed-vegetables.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide12/steamed-vegetables.webp"),
        ],
        [
            'text'  => 'boiled eggs',
            'emoji' => '🥚',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide12/boiled-eggs.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide12/boiled-eggs.webp"),
        ],
        [
            'text'  => 'baked potatoes',
            'emoji' => '🥔',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide12/baked-potatoes.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide12/baked-potatoes.webp"),
        ],
        [
            'text'  => 'pickled cabbage',
            'emoji' => '🥬',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide12/pickled-cabbage.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide12/pickled-cabbage.webp"),
        ],
        [
            'text'  => 'roast lamb',
            'emoji' => '🍖',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide12/roast-lamb.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide12/roast-lamb.webp"),
        ],
        [
            'text'  => 'barbecued beef',
            'emoji' => '🥩',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide12/barbecued-beef.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide12/barbecued-beef.webp"),
        ],
        [
            'text'  => 'raw fish',
            'emoji' => '🐟',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide12/raw-fish.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide12/raw-fish.webp"),
        ],
        [
            'text'  => 'smoked fish',
            'emoji' => '🐟🔥',
            'sound' => materialAsset("slider/A2/Beginner/chapter11/audios/slide12/smoked-fish.mpeg"),
            'image' => materialAsset("slider/A2/Beginner/chapter11/img/slide12/smoked-fish.webp"),
        ],
    ],
];
?>

@include("slider.vocab.image-emoji-audio", ['content' => $content])