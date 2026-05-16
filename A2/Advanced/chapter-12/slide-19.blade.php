<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What's something that always annoys you?",
    'image'    => materialAsset('slider/A2/Advanced/chapter-12/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
