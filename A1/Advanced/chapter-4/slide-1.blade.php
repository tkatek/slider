<?php
$content = [
    'unit' => 'Getting Around the City',
    'lesson' => 'A Taxi Ride',
    'unit_number' => '2',
    'lesson_number' => '1',
    'image' => materialAsset('slider/A1/Advanced/chapter-4/img/cover.webp'),

    'button' => 'Start Session',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])
