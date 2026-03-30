<?php
$content = [
    'image'   => materialAsset('slider/A1/Intermediate/chapter-1/img/thankyou.webp'),
    'text'  => 'What new word or phrase did you learn today❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])