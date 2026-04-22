<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Did you like any of the world cuisines, today?
    Which meal did you like? and why?",
    'image'    => materialAsset('slider/A2/Intermediate/chapter-2/img/slide4.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
