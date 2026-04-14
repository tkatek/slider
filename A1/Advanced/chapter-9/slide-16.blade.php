<?php
$content = [
    'page_title' => 'Writing',
    'title'      => 'Writing',
    'subtitle'   => 'Listen and write the words',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',

    'items' => [
        [
            'number' => 1,
            'image'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/bank.webp'),
            'sound'  => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/bank.mp3'),
            'parts'  => [
                ['text' => 'B'],
                ['answer' => 'ANK'],
            ],
        ],
        [
            'number' => 2,
            'image'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/bus-stop.webp'),
            'sound'  => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/bus-stop.mp3'),
            'parts'  => [
                ['text' => 'B'],
                ['answer' => 'US'],
                ['text' => ' '],
                ['text' => 'S'],
                ['answer' => 'TOP'],
            ],
        ],
        [
            'number' => 3,
            'image'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/cafe.webp'),
            'sound'  => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/cafe.mp3'),
            'parts'  => [
                ['text' => 'C'],
                ['answer' => 'AFE'],
            ],
        ],
        [
            'number' => 4,
            'image'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/castle.webp'),
            'sound'  => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/castle.mp3'),
            'parts'  => [
                ['text' => 'C'],
                ['answer' => 'ASTLE'],
            ],
        ],
        [
            'number' => 5,
            'image'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/cinema.webp'),
            'sound'  => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/cinema.mp3'),
            'parts'  => [
                ['text' => 'C'],
                ['answer' => 'INEMA'],
            ],
        ],
        [
            'number' => 6,
            'image'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/factory.webp'),
            'sound'  => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/factory.mp3'),
            'parts'  => [
                ['text' => 'F'],
                ['answer' => 'ACTORY'],
            ],
        ],
        [
            'number' => 7,
            'image'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/library.webp'),
            'sound'  => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/library.mp3'),
            'parts'  => [
                ['text' => 'L'],
                ['answer' => 'IBRARY'],
            ],
        ],
        [
            'number' => 8,
            'image'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/post-office.webp'),
            'sound'  => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/post-office.mp3'),
            'parts'  => [
                ['text' => 'P'],
                ['answer' => 'OST'],
                ['text' => ' '],
                ['text' => 'O'],
                ['answer' => 'FFICE'],
            ],
        ],
        [
            'number' => 9,
            'image'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/school.webp'),
            'sound'  => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/school.mp3'),
            'parts'  => [
                ['text' => 'S'],
                ['answer' => 'CHOOL'],
            ],
        ],
        [
            'number' => 10,
            'image'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/sports-centre.webp'),
            'sound'  => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/sports-centre.mp3'),
            'parts'  => [
                ['text' => 'S'],
                ['answer' => 'PORTS'],
                ['text' => ' '],
                ['text' => 'C'],
                ['answer' => 'ENTRE'],
            ],
        ],
        [
            'number' => 11,
            'image'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/supermarket.webp'),
            'sound'  => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/supermarket.mp3'),
            'parts'  => [
                ['text' => 'S'],
                ['answer' => 'UPERMARKET'],
            ],
        ],
        [
            'number' => 12,
            'image'  => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/train-station.webp'),
            'sound'  => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/train-station.mp3'),
            'parts'  => [
                ['text' => 'T'],
                ['answer' => 'RAIN'],
                ['text' => ' '],
                ['text' => 'S'],
                ['answer' => 'TATION'],
            ],
        ],
    ],
];
?>
@include('slider.game.image-missing-words', ['content' => $content])