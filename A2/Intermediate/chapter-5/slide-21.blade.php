<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What were you doing yesterday evening?",
    'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide4.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
