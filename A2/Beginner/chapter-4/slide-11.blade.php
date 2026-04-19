<?php
$content = [
    'page_title' => 'New Language',
    'title' => 'New Language',
    'subtitle' => '',
    'image'         => materialAsset('slider/A2/Beginner/chapter-4/img/slide11.webp'),

    'items' => [
        [
            'emoji' => 'A',
            'text' => 'What <span class="text-red-500 font-black">did</span> you <span class="text-red-500 font-black">do</span> last weekend?',
            'sound' => '',
        ],
        [
            'emoji' => 'B',
            'text' => 'I visit<span class="text-red-500 font-black">ed</span> my grandparents.',
            'sound' => '',
        ],
        [
            'emoji' => 'A',
            'text' => '<span class="text-red-500 font-black">Did</span> you <span class="text-red-500 font-black">go</span> out?',
            'sound' => '',
        ],
        [
            'emoji' => 'B',
            'text' => 'No, I <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text font-black text-transparent">didn\'t</span>.',
            'sound' => '',
        ],
        [
            'emoji' => 'A',
            'text' => '<span class="text-red-500 font-black">Did</span> you <span class="text-red-500 font-black">watch</span> TV?',
            'sound' => '',
        ],
        [
            'emoji' => 'B',
            'text' => 'Yes, I <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text font-black text-transparent">did</span>.',
            'sound' => '',
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])
