<?php
$content = [
    'page_title' => 'Language Focus',
    'title'      => 'Language Focus',
    'subtitle'   => 'Random acts of kindness collocations',
    'image'      => materialAsset('slider/A1/Beginner/chapter-9/img/food-quantities.webp'),
    'note_title' => 'For Example: “Make a difference”',

    'items' => [
        [
            'emoji' => '🙏',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">ask for a favor</span>',
        ],
        [
            'emoji' => '🤝',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">do a favor</span>',
        ],
        [
            'emoji' => '↩️',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">return a favor</span>',
        ],
        [
            'emoji' => '🙋',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">need a favor</span>',
        ],
        [
            'emoji' => '💚',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">take care of</span> someone/something',
        ],
        [
            'emoji' => '🛠️',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">help someone</span> with something',
        ],
        [
            'emoji' => '✋',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">lend a hand</span>',
        ],
        [
            'emoji' => '😊',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">give a smile</span>',
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])