<?php
$content = [
    'type'      => 'outro',
    'title'     => 'Thank You!',
    'subtitle'  => "",
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Advanced/chapter-4/img/slide1.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])