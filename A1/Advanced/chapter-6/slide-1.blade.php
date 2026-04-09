<?php
$content = [
    'unit' => 'Getting Around the City',
    'lesson' => 'At the Railway Station',
    'unit_number' => '2',
    'lesson_number' => '3',
    'image' => materialAsset('slider/A1/Advanced/chapter-6/img/slide1.webp'),

    'button' => 'Start Session',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])
