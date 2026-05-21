<?php
$content = [
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4',
    'subtitle'   => 'Look at the pictures. Do you know the English words for these signs? Write the missing letters in the gaps.',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4',

    'items' => [
        [
            'number'      => 1,
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/bus-stop.webp'),
            'prefix'      => 'B',
            'suffix'      => ' STOP',
            'answer'      => 'US',
            'placeholder' => '',
        ],
        [
            'number'      => 2,
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/wifi.webp'),
            'prefix'      => 'W',
            'suffix'      => '',
            'answer'      => 'IFI', 
            'placeholder' => '',
        ],
        [
            'number'      => 3,
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/lift.webp'),
            'prefix'      => 'L',
            'suffix'      => '',
            'answer'      => 'IFT',
            'placeholder' => '',
        ],
        [
            'number'      => 4,
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/no-smoking.webp'),
            'prefix'      => 'NO S',
            'suffix'      => '',
            'answer'      => 'MOKING',
            'placeholder' => '',
        ],
        [
            'number'      => 5,
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/keep-tidy.webp'),
            'prefix'      => 'K',
            'suffix'      => ' TIDY',
            'answer'      => 'EEP',
            'placeholder' => '',
        ],
        [
            'number'      => 6,
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/first-aid.webp'),
            'prefix'      => 'F',
            'suffix'      => ' AID',
            'answer'      => 'IRST',
            'placeholder' => '',
        ],
        [
            'number'      => 7,
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/toilets.webp'),
            'prefix'      => 'T',
            'suffix'      => '',
            'answer'      => 'OILETS',
            'placeholder' => '',
        ],
        [
            'number'      => 8,
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/exit.webp'),
            'prefix'      => 'E',
            'suffix'      => '',
            'answer'      => 'XIT',
            'placeholder' => '',
        ],
    ],
];
?>
@include('slider.game.image-missing-words', ['content' => $content])


