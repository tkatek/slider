<?php
$content = [
    'page_title' => 'Can you guess?',
    'title'      => 'Can you guess?',
    'subtitle'   => 'Let’s watch this',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A1/Beginner/chapter-10/video/encrypted/short-2-appliances.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Beginner/chapter-10/video/short-2-appliances.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,   'end' => 2,  'text' => 'What is this appliance?'],
                ['start' => 5,   'end' => 7,  'text' => 'Refrigerator.'],
                ['start' => 7,   'end' => 10, 'text' => 'The refrigerator keeps food fresh.'],

                ['start' => 12,  'end' => 14, 'text' => 'What is this appliance?'],
                ['start' => 18,  'end' => 20, 'text' => 'Microwave.'],
                ['start' => 20,  'end' => 22, 'text' => 'The microwave heats food.'],

                ['start' => 23,  'end' => 25, 'text' => 'What is this appliance?'],
                ['start' => 29,  'end' => 31, 'text' => 'Oven.'],
                ['start' => 31,  'end' => 33, 'text' => 'The oven can bake cakes.'],

                ['start' => 35,  'end' => 37, 'text' => 'What is this appliance?'],
                ['start' => 40,  'end' => 42, 'text' => 'Stove.'],
                ['start' => 42,  'end' => 44, 'text' => 'The stove is used for cooking.'],

                ['start' => 45,  'end' => 47, 'text' => 'What is this appliance?'],
                ['start' => 51,  'end' => 53, 'text' => 'Toaster.'],
                ['start' => 53,  'end' => 55, 'text' => 'The toaster toasts bread.'],

                ['start' => 56,  'end' => 59, 'text' => 'What is this appliance?'],
                ['start' => 62,  'end' => 64, 'text' => 'Blender.'],
                ['start' => 64,  'end' => 66, 'text' => 'The blender blends juice.'],

                ['start' => 67,  'end' => 69, 'text' => 'What is this appliance?'],
                ['start' => 73,  'end' => 75, 'text' => 'Coffee maker.'],
                ['start' => 75,  'end' => 77, 'text' => 'The coffee maker makes coffee.'],

                ['start' => 79,  'end' => 81, 'text' => 'What is this appliance?'],
                ['start' => 84,  'end' => 86, 'text' => 'Rice cooker.'],
                ['start' => 86,  'end' => 88, 'text' => 'The rice cooker cooks rice.'],

                ['start' => 89,  'end' => 91, 'text' => 'What is this appliance?'],
                ['start' => 94,  'end' => 96, 'text' => 'Electric kettle.'],
                ['start' => 96,  'end' => 99, 'text' => 'The electric kettle boils water.'],

                ['start' => 100,  'end' => 102, 'text' => 'What is this appliance?'],
                ['start' => 105, 'end' => 107,'text' => 'Dishwasher.'],
                ['start' => 107, 'end' => 110,'text' => 'The dishwasher washes dishes.'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])