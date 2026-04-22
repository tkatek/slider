<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Present simple passive voice',
    'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide8.webp'),

    'items' => [
        [
            'emoji' => '•',
            'text' => 'Falafel <span class="text-cyan-300 font-black">is eaten</span> in Egypt.',

        ],
        [
            'emoji' => '•',
            'text' => 'Pizza <span class="text-cyan-300 font-black">is made</span> in Italy.',

        ],
        [
            'emoji' => '•',
            'text' => 'In America, <span class="text-pink-400 font-black">people</span> <span class="text-red-600 font-black">eat</span> burgers',

        ],
        [
            'emoji' => '•',
            'text' => '<span class="text-cyan-300 font-black">OR</span>',

        ],
        [
            'emoji' => '•',
            'text' => 'Burgers <span class="text-red-600 font-black">are eaten</span> in America.',

        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])
