<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'What might have been?!',
    'unit_number'   => '1',
    'lesson'        => 'Putting the Pieces Together',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/B1/Advanced/chapter-3/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
