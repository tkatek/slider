<?php
$content = [
    'image' => materialAsset("slider/A1/Advanced/chapter-12/img/slide-1.webp"),
    'text' => ' What new word or phrase did you learn today❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])