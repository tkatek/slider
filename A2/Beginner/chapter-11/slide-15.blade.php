<?php
$content = [
    'page_title' => 'Grammar',
    'title'      => 'Grammar',
    'subtitle'   => 'Giving advice (Should vs Shouldn’t)',
    'image'         => materialAsset('slider/A2/Beginner/chapter11/img/slide1/introduction.webp'),
    'item_text_class' => 'text-base sm:text-lg',

    'items'      => [
        [
            'emoji' => '🥦',
            'text'  => 'You <span class="bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 bg-clip-text text-transparent font-black">should</span> eat steamed vegetables. They are very healthy.',
            'sound' => materialAsset('slider/A2/Beginner/chapter11/audios/slide15/1.mp3'),
        ],
        [
            'emoji' => '🥚',
            'text'  => 'You <span class="bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 bg-clip-text text-transparent font-black">should</span> eat boiled eggs. They are good for your body.',
            'sound' => materialAsset('slider/A2/Beginner/chapter11/audios/slide15/2.mp3'),
        ],
        [
            'emoji' => '🍤',
            'text'  => 'You <span class="bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 bg-clip-text text-transparent font-black">should</span> eat grilled shrimp. It is healthier than fried food.',
            'sound' => materialAsset('slider/A2/Beginner/chapter11/audios/slide15/3.mp3'),
        ],
        [
            'emoji' => '🍜',
            'text'  => 'You <span class="text-red-500 font-black">shouldn’t</span> eat stir-fried noodles too often. They can be oily.',
            'sound' => materialAsset('slider/A2/Beginner/chapter11/audios/slide15/4.mp3'),
        ],
        [
            'emoji' => '🥩',
            'text'  => 'You <span class="text-red-500 font-black">shouldn’t</span> eat barbecued beef too much. It has a lot of fat.',
            'sound' => materialAsset('slider/A2/Beginner/chapter11/audios/slide15/5.mp3'),
        ],
        [
            'emoji' => '🐟',
            'text'  => 'You <span class="text-red-500 font-black">shouldn’t</span> eat smoked fish too often. It can be salty.',
            'sound' => materialAsset('slider/A2/Beginner/chapter11/audios/slide15/6.mp3'),
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])
