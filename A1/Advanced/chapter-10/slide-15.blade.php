<?php
$content = [
    'image' => materialAsset("slider/A1/Advanced/chapter-10/img/slide15/thanks-you.webp"),
    'text' => ' What new word or phrase did you learn today❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])