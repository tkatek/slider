<?php
$content = [
    'type'      => 'outro',
    'title'     => 'Thank You!',
    'subtitle'  => "An idiom that means” willing to take risk” ?!",
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Intermediate/chapter-10/img/slide4/4.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])