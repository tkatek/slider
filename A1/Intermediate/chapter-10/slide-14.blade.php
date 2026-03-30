<?php
$content = [
    'image'   => materialAsset('slider/A1/Intermediate/chapter-10/img/thankyou.webp'),
    'text'  => 'What new words or phrases did you learn today❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])