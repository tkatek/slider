<?php
$content = [
    'image' => materialAsset("slider/A1/Beginner/chapter-2/img/slide13.webp"),
    'text' => ' What new word or phrase did you learn today❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])