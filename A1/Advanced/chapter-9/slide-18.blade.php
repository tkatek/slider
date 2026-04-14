<?php
$content = [
    'image'   => materialAsset('slider/A1/Advanced/chapter-9/img/slide1.webp'),
    'text'  => 'Can you say what is a library❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])