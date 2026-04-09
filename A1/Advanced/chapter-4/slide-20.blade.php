<?php
$content = [
    'image'   => materialAsset('slider/A1/Advanced/chapter-4/img/thankyou.webp'),
    'text'  => 'How can you order a taxi❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])