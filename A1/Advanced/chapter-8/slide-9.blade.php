<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'There is /are',

    'image'      => materialAsset('slider/A1/Advanced/chapter-8/img/slide9.webp'),
    'image_alt'  => 'There is and there are grammar image',

    'footer_text' => null,
    'play_label'  => 'Play sentence',

    'items'      => [
        [
            'emoji' => '1️⃣',
            'text'  => '<span class="text-violet-600 font-black">There is / There are</span>: Used to indicate the existence of something:',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide9/1.mp3'),
        ],
        [
            'emoji' => '•',
            'text'  => '"There\'s a real mix of people."',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide9/2.mp3'),
        ],
        [
            'emoji' => '•',
            'text'  => '"There are older people."',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide9/3.mp3'),
        ],
        [
            'emoji' => '2️⃣',
            'text'  => '<span class="text-orange-400 font-black">There isn\'t / There aren\'t</span>: Used to indicate the absence of something.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide9/4.mp3'),
        ],
        [
            'emoji' => '•',
            'text'  => '"There isn\'t <span class="text-red-500 font-black">much</span> noise."',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide9/5.mp3'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])
