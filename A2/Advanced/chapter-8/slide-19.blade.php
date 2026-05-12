<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "“Don’t stop when you’re tired. Stop when you’re done.”",
    'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
