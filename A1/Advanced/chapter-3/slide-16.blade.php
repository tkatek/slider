<?php
$content = [
    'image'   => materialAsset('slider/A1/Advanced/chapter-3/img/slide16.webp'),
    'text'  => 'How do you say you’re checking in or out of a hotel❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])