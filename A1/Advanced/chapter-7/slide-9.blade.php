<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Most Important signs',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',

    'items' => [

        ['text' => 'Exit', 'emoji' => '🚪',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/exit.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/exit.webp')],

        ['text' => 'Stairs', 'emoji' => '🪜',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/stairs.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/stairs.webp')],

        ['text' => 'Lift', 'emoji' => '🛗',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/lift.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/lift.webp')],

        ['text' => 'Wheelchair access', 'emoji' => '♿',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/wheelchair-access.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/wheelchair-access.webp')],

        ['text' => 'Information', 'emoji' => 'ℹ️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/information.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/information.webp')],

        ['text' => 'Toilets', 'emoji' => '🚻',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/toilets.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/toilets.webp')],

        ['text' => 'Ladies', 'emoji' => '🚺',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/ladies.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/ladies.webp')],

        ['text' => 'Gents', 'emoji' => '🚹',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/gents.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/gents.webp')],

        ['text' => 'No smoking', 'emoji' => '🚭',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/no-smoking.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/no-smoking.webp')],

        ['text' => 'Keep tidy', 'emoji' => '🗑️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/keep-tidy.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/keep-tidy.webp')],

        ['text' => 'WiFi', 'emoji' => '📶',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/wifi.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/wifi.webp')],

        ['text' => 'Switch off phones', 'emoji' => '📵',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/switch-off-phones.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/switch-off-phones.webp')],

        ['text' => 'First aid', 'emoji' => '🩹',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/first-aid.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/first-aid.webp')],

        ['text' => 'Parking', 'emoji' => '🅿️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/parking.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/parking.webp')],

        ['text' => 'No parking', 'emoji' => '🚫🅿️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/no-parking.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/no-parking.webp')],

        ['text' => 'Bus stop', 'emoji' => '🚏',
            'sound' => materialAsset('slider/A1/Advanced/chapter-7/audios/slide9/bus-stop.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide9/bus-stop.webp')],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])