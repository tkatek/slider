<?php
$content = [
    'page_title' => 'Food Quantities',
    'title'      => 'Food Quantities',
    'subtitle'   => 'Spot the words you can count and the ones you can’t.',

    'image'      => materialAsset('slider/A1/Beginner/chapter-9/img/food-quantities.webp'),

    'note_title' => 'Can you describe other items in the picture?',


    'items'      => [
        [
            'emoji' => '🥛',
            'text'  => 'There <span class="text-red-500 font-black">is</span>
                        <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">much</span>
                        milk in the jug.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-9/audios/slide7/1.mp3'),
        ],
        [
            'emoji' => '🍎',
            'text'  => 'There <span class="text-red-500 font-black">are</span>
                        <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">many</span>
                        apple<span class="text-red-500 font-black">s</span> on the table.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-9/audios/slide7/2.mp3'),
        ],
        [
            'emoji' => '🍚',
            'text'  => 'There <span class="text-red-500 font-black">is</span>
                        <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">a lot</span>
                        of rice in the jar.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-9/audios/slide7/3.mp3'),
        ],
        [
            'emoji' => '🍪',
            'text'  => 'There <span class="text-red-500 font-black">are</span>
                        <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">a lot</span>
                        of cookies on the table.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-9/audios/slide7/4.mp3'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])
