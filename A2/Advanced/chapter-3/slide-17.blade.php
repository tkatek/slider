<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What tool /gadget does a policeman use? Do you remember?<br>Name 3 gadgets/ tools you learnt today!",
    'image'    => materialAsset('slider/A2/Advanced/chapter-3/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
