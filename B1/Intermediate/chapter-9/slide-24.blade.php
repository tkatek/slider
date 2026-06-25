<?php
$content = [
    'type'      => 'outro',
    'title'     => 'Thank You!',
    'subtitle'  => "Is there anyone today who struck a spark in you today?",
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Intermediate/chapter-9/img/slide1.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])