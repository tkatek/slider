<?php
$content = [
    'image'   => materialAsset('slider/A1/Intermediate/chapter-7/img/thankyou.webp'),
    'text'  => 'What  did you learn today❓',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])