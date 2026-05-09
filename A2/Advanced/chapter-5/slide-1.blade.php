<?php
$content = [
    'unit'          => "Have You Ever...?",
    'lesson'        => "First Days in a New Country",
    'unit_number'   => '2',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/A2/Advanced/chapter-5/img/slide1.webp'),
    'button'        => 'Start Session',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
