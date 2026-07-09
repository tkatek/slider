<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'A Planet in Danger',
    'unit_number'   => '2',
    'lesson'        => 'What can we do?',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/B1/Advanced/chapter-4/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
