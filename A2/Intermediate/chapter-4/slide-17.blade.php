<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Can you describe how was your day today?",
    'image'    => materialAsset('slider/A2/Intermediate/chapter-4/img/slide1/introduction.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
