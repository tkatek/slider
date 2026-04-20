<?php
$content = [
    'page_title' => 'Reading',
    'title' => 'Steps to Fill Up Fuel',
    'subtitle' => 'Read the steps below carefully.',
    'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide12.webp'),

    'items' => [
        [
            'emoji' => '1',
            'text' => 'Pull up to the pump and park safely.',
        ],
        [
            'emoji' => '2',
            'text' => 'Turn off the engine before starting the refueling process.',
        ],
        [
            'emoji' => '3',
            'text' => 'Select the correct fuel type for your vehicle\'s needs.',
        ],
        [
            'emoji' => '4',
            'text' => 'Insert the nozzle into the tank and begin fueling.',
        ],
        [
            'emoji' => '5',
            'text' => 'Stop fueling when the tank is full or the desired amount is reached.',
        ],
        [
            'emoji' => '6',
            'text' => 'Pay for the fuel and collect the receipt for your records.',
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])
