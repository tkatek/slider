<?php
$content = [
    'image'   => materialAsset('slider/A1/Intermediate/chapter-5/thankyou.webp'),
    'text'  => 'What new word/ phrase did you learn today❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])