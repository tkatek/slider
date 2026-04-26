<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What will happen if you study English ?",
    'image'    => materialAsset('slider/A2/Intermediate/chapter-8/img/slide1.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
