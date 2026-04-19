<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What did you learn today?",
    'image'    => materialAsset('slider/A2/Beginner/chapter-4/img/slide1.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
