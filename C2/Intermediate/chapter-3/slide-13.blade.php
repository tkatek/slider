<?php

$content = [
    'type' => 'outro',

    'title'    => 'Thank You',
    'subtitle' => "Don't forget to complete your homework",
    'badge'    => 'Lesson Complete',

    'image'     => materialAsset('slider/C2/Intermediate/chapter-3/img/thankyou.webp'),

    'button'         => 'Start Again',
    'first_fallback' => 'slide-1.blade.php',
];

?>

@include('slider.C2.components.intro-outro', ['content' => $content])