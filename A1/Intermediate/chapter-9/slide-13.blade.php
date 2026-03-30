<?php
$content = [
    'image'   => materialAsset('slider/A1/Intermediate/chapter-9/img/thank-you.webp'),
    'text'  => 'What new word or phrase did you learn today❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])