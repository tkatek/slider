<?php
$content = [
    'page_title'      => 'Grammar',
    'title'           => 'Grammar',
    'subtitle'        => 'Giving advice (Should vs Shouldn’t)',
    'image'           => materialAsset('slider/A2/Beginner/chapter11/img/slide15.webp'),
    'item_text_class' => 'text-base sm:text-lg',

    'items' => [
        [
            'emoji' => '🥦',
            'text'  => 'You <span class="font-black text-emerald-600 dark:text-emerald-300">should</span> eat steamed vegetables. They are very healthy.',
        ],
        [
            'emoji' => '🥚',
            'text'  => 'You <span class="font-black text-emerald-600 dark:text-emerald-300">should</span> eat boiled eggs. They are good for your body.',
        ],
        [
            'emoji' => '🍤',
            'text'  => 'You <span class="font-black text-emerald-600 dark:text-emerald-300">should</span> eat grilled shrimp. It is healthier than fried food.',
        ],
        [
            'emoji' => '🍜',
            'text'  => 'You <span class="font-black text-rose-600 dark:text-rose-300">shouldn’t</span> eat stir-fried noodles too often. They can be oily.',
        ],
        [
            'emoji' => '🥩',
            'text'  => 'You <span class="font-black text-rose-600 dark:text-rose-300">shouldn’t</span> eat barbecued beef too much. It has a lot of fat.',
        ],
        [
            'emoji' => '🐟',
            'text'  => 'You <span class="font-black text-rose-600 dark:text-rose-300">shouldn’t</span> eat smoked fish too often. It can be salty.',
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])