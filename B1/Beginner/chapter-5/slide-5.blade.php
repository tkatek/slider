<?php
$content = [
    'page_title' => 'Types of Seaside Entertainment',
    'title'      => 'Types of Seaside Entertainment',
    'subtitle'   => '',

    'image'      => materialAsset('slider/B1/Beginner/chapter-5/img/slide5.webp'),



    'items' => [
        [
            'emoji' => '🏄',
            'text'  => '
                <span class="font-black text-indigo-600 dark:text-indigo-300">Water Sports & Beach Games</span><br>
                Swimming, Surfing, Kayaking<br>
                Beach Volleyball, Frisbee<br>
                Sandcastle Building
            ',
        ],
        [
            'emoji' => '🎪',
            'text'  => '
                <span class="font-black text-indigo-600 dark:text-indigo-300">Cultural Events & Relaxation</span><br>
                Seaside Festivals, Concerts<br>
                Open-air Markets<br>
                Sunbathing, Picnics, Nature Walks
            ',
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])