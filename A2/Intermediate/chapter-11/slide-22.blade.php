<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What new word or phrase did you learn today❓🤔",
    'image'    => materialAsset('slider/A2/Intermediate/chapter-11/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
