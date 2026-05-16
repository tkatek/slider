<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Say one tip you learnt today to improve your English",
    'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
