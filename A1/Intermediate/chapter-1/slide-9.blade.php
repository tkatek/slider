<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A1/Intermediate/chapter-1/img/slide9.webp'),
    'image_alt'  => 'sports language practice',

    'items' => [
        [
            'emoji' => '⚽',
            'text'  => 'My <span class="bg-gradient-to-r from-amber-500 to-orange-500 bg-clip-text text-transparent">favourite sport is</span>...',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-1/audio/slide9/1.mp3'),
        ],
        [
            'emoji' => '🎯',
            'text'  => 'I <span class="sentence-accent">really enjoy</span>... / I <span class="sentence-accent">don\'t really enjoy</span> it.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-1/audio/slide9/2.mp3'),
        ],
        [
            'emoji' => '❤️',
            'text'  => 'I <span class="bg-gradient-to-r from-amber-500 to-orange-500 bg-clip-text text-transparent">love</span> sport, but I\'m <span class="bg-gradient-to-r from-amber-500 to-orange-500 bg-clip-text text-transparent">not keen on</span> ball games.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-1/audio/slide9/3.mp3'),
        ],
        [
            'emoji' => '🏆',
            'text'  => 'I\'m <span class="bg-gradient-to-r from-amber-500 to-orange-500 bg-clip-text text-transparent">good at</span>...',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-1/audio/slide9/4.mp3'),
        ],
        [
            'emoji' => '⚽',
            'text'  => 'I <span class="sentence-accent">started a new sport</span> last year.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-1/audio/slide9/5.mp3'),
        ],
    ],
];
?>

@include("slider.other.new-language-emoji", ['content' => $content])
