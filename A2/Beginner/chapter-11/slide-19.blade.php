
<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What did you learn today❓🤔",
    'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide19/Thank-you.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
