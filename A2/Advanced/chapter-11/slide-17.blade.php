<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What is a new word / expression have you learnt today?",
    'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
