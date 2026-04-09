<?php
$content = [
    'image'   => materialAsset('slider/A1/Advanced/chapter-1/img/thankyou.webp'),
    'text'  => 'How can you ask the receptionist for a room in a hotel❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])