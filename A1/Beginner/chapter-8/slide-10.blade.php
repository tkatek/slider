<?php

$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Tap the play button, listen, then repeat.',
    'image'      => materialAsset('slider/A1/Beginner/chapter-8/img/c8-slide10.webp'),
    "footer_text"=>"",
    "image_alt"=>"",
    'items' => [
        [
            'text'  => 'The bus <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">leaves</span> at 8:00 AM.',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/1.mp3"),
        ],
        [
            'text'  => 'The train <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">arrives</span> at 9:15 PM.',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/2.mp3"),
        ],
        [
            'text'  => 'Bus number 5 <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">comes</span> every 30 minutes.',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/3.mp3"),
        ],
        [
            'text'  => 'The <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">next</span> train is in 20 minutes.',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/4.mp3"),
        ],
        [
            'text'  => '<span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">Arrival</span> time is 11:45 AM.',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/5.mp3"),
        ],
        [
            'text'  => 'The <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">fare</span> is two dollars.',
            'sound' => materialAsset("slider/A1/Beginner/chapter-8/audios/6.mp3"),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])
