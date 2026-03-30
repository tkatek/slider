<?php
$content = [
    'image' => materialAsset("slider/A1/Beginner/chapter-2/img/slide13.webp"),
    'text' => 'What have you learned today❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])