<?php
$content = [
    'page_title' => 'Steps to Read a Weather Report',
    'title'      => 'Steps to Read a Weather Report',
    'subtitle'   => '',

    'image'      => materialAsset('slider/A2/Beginner/chapter-3/img/slide8.webp'),
    'image_alt'  => 'Food quantities image',

    'footer_text' => '',
    'play_label'  => 'Play sentence',

    'items'      => [
        [
            'emoji' => '🌡️',
            'text'  => 'It’s 25 <span class="text-red-500 font-black">degrees</span> today.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide8/1.mp3'),
        ],
        [
            'emoji' => '☀️',
            'text'  => 'It\'s sunny<span class="text-red-500 font-black">,</span> nice <span class="text-red-500 font-black">and</span> warm.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide8/2.mp3'),
        ],
        [
            'emoji' => '🌧️',
            'text'  => 'Later tonight, it <span class="text-red-500 font-black">will</span> rain.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide8/3.mp3'),
        ],
        [
            'emoji' => '📉',
            'text'  => 'The temperature will <span class="text-red-500 font-black">go down</span> to 51 degrees.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide8/4.mp3'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])