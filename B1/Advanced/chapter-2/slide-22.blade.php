<?php
$content = [
    'type'      => 'outro',
    'title'     => 'Can you make a guessing?!',
    'outro_title_class' => 'text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5xl',
    'subtitle'  => "It's impossible that I quit learning English. (use: can't)",
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Advanced/chapter-2/img/thankyou.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])