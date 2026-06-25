<?php
$content = [
    'type'      => 'outro',
    'title'     => 'What do you think?',
    'subtitle'  => "80% of consumers are more likely to buy from a brand they know about.",
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Intermediate/chapter-4/img/thankyou.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])