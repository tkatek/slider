<?php

$content = [
    'type'      => 'outro',
    'title'     => 'Thank You!',
    'subtitle'  => 'Name one indoor activity and another outdoor activity you are open to try',
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Beginner/chapter-6/img/thankyou.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])