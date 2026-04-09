<?php
$content = [
    'page_title' => 'Types of Safety signs',
    'title'      => 'Types of Safety signs',
    'subtitle'   => 'Safety Colors',
    'image'      => materialAsset('slider/A1/Advanced/chapter-7/img/slide7.webp'),
    'image_alt'  => 'Safety signs and colours discussion image',

    'cards' => [
        [
            'emoji' => '🟥',
            'label' => 'Sign Group 1',
            'text'  => 'Safety <span class="text-red-600 font-black">red</span>: <span class="text-red-600 font-black">Fire, Danger, Stop</span>',
            'theme' => 'rose',
        ],
        [
            'emoji' => '🟧',
            'label' => 'Sign Group 2',
            'text'  => 'Safety <span class="text-orange-500 font-black">orange</span>: <span class="text-orange-500 font-black">Warning</span>',
            'theme' => 'amber',
        ],
        [
            'emoji' => '🟨',
            'label' => 'Sign Group 3',
            'text'  => 'Safety <span class="text-yellow-400 font-black">yellow</span>: <span class="text-yellow-500 font-black">Caution</span>',
            'theme' => 'yellow',
        ],
        [
            'emoji' => '🟩',
            'label' => 'Sign Group 4',
            'text'  => 'Safety <span class="text-green-600 font-black">green</span>: <span class="text-green-600 font-black">Safety</span>',
            'theme' => 'emerald',
        ],
        [
            'emoji' => '🟦',
            'label' => 'Sign Group 5',
            'text'  => 'Safety <span class="text-blue-600 font-black">blue</span>: <span class="text-blue-600 font-black">Notice</span>',
            'theme' => 'blue',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])