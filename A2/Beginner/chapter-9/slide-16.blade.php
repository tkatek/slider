
<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What did you learn today❓🤔",
    'image'    => materialAsset('slider/A2/Intermediate/chapter-9/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
