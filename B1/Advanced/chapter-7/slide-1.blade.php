<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Getting Things Done',
    'unit_number'   => '3',
    'lesson'        => 'Get the job done!',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/B1/Advanced/chapter-7/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
