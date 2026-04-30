<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Notice the use of “and”, “Both...and” here:',

    'image'      => materialAsset('slider/A2/Beginner/chapter-12/img/slide7/New-Language.webp'),

    'item_text_class' => 'text-base sm:text-lg lg:text-xl font-bold leading-[1.45]',

    'items'      => [
        [
            'emoji' => '➕',
            'text'  => '“Meat, fish, eggs, tofu, beans, <span class="text-red-500 font-black">and</span> nuts and seeds are all protein foods.”',
            'sound' => materialAsset('slider/A2/Beginner/chapter-12/audios/slide7/Meat-fish.mpeg'),
        ],
        [
            'emoji' => '🔧',
            'text'  => '“Proteins are necessary to build <span class="text-red-500 font-black">and</span> repair muscle, skin, hair, <span class="text-red-500 font-black">and</span> organs.”',
            'sound' => materialAsset('slider/A2/Beginner/chapter-12/audios/slide7/Proteins-are-necessary.mpeg'),
        ],
        [
            'emoji' => '🥦🍎',
            'text'  => '“<span class="text-red-500 font-black">Both</span> fruits <span class="text-red-500 font-black">and</span> vegetables are low in calories.”',
            'sound' => materialAsset('slider/A2/Beginner/chapter-12/audios/slide7/Both-fruits.mpeg'),
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])