<?php
$content = [
    'image'   => materialAsset('slider/A1/Advanced/chapter-8/img/slide1.webp'),
    'text'  => 'Can you describe your neighbourhood❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])