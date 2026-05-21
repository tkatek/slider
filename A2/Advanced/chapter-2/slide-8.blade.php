<?php
$content = [
    'title'      => 'Useful Expressions',
    'subtitle'   => 'New Language',

    'image'      => materialAsset('slider/A2/Advanced/chapter-2/img/slide8.webp'),

    'items'      => [
        [
            'emoji' => "\u{1F914}",
            'text'  => 'Think <span class="text-red-500 dark:text-red-300 font-black">about</span> your job',
            'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide8/1.mp3'),
        ],
        [
            'emoji' => "\u{1F504}",
            'text'  => 'Try something different for your job',
            'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide8/2.mp3'),
        ],
        [
            'emoji' => "\u{1F4B5}",
            'text'  => 'Get paid <span class="text-slate-500 dark:text-slate-300">(People pay you)</span>',
            'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide8/3.mp3'),
        ],
    ],
];
?>

@include('slider.other.newlanguage', ['content' => $content])