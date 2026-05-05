<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Can you nod your head?",
    'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
