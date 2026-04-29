
<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Finally, don’t forget to sleep 8 hours a day❗",
    'image'    => materialAsset('slider/A2/Beginner/chapter-10/img/slide15/thanks.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
