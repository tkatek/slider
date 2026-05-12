<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Can you set a goal for tomorrow?",
    'image'    => materialAsset('slider/A2/Advanced/chapter-7/img/slide1.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
