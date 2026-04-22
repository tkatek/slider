<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "How do people in your country greet each other?",
    'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide1.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
