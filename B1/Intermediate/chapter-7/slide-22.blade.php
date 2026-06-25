<?php
$content = [
    'type'      => 'outro',
    'title'     => 'Thank you',
    'subtitle'  => "Can you tell us 2 similarities between you & your sibling?",
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Intermediate/chapter-7/img/thankyou.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])