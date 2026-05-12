<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Can you remember what to say?!\n'If a phone call stops suddenly, then you get.....'",
    'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
