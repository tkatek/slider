<?php


$content = [
    'page_title' => 'Reading',
    'title' => 'Reading',
    'subtitle' => 'Steps to Fill Up Fuel',
    'grid_class' => 'grid-cols-1 md:grid-cols-2 xl:grid-cols-3',
    'items' => [
        [
            'text' => 'Step 1',
            'subtitle' => 'Pull up to the pump and park safely.',
            'emoji' => '🚘',
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide12/step1.webp'),
            'sound' => '',
        ],
        [
            'text' => 'Step 2',
            'subtitle' => 'Turn off the engine before starting the refueling process.',
            'emoji' => '🛑',
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide12/step2.webp'),
            'sound' => '',
        ],
        [
            'text' => 'Step 3',
            'subtitle' => 'Select the correct fuel type for your vehicle\'s needs.',
            'emoji' => '⛽',
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide12/step3.webp'),
            'sound' => '',
        ],
        [
            'text' => 'Step 4',
            'subtitle' => 'Insert the nozzle into the tank and begin fueling.',
            'emoji' => '🔧',
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide12/step4.webp'),
            'sound' => '',
        ],
        [
            'text' => 'Step 5',
            'subtitle' => 'Stop fueling when the tank is full or desired amount is reached.',
            'emoji' => '✅',
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide12/step5.webp'),
            'sound' => '',
        ],
        [
            'text' => 'Step 6',
            'subtitle' => 'Pay for the fuel and collect the receipt for your records.',
            'emoji' => '🧾',
            'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide12/step6.webp'),
            'sound' => '',
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])
