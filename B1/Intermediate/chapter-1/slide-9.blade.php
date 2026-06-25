<?php
$content = [
    'page_title' => 'Language Focus',
    'title'      => 'Notice the following',
    'subtitle'   => '',

    'image' => materialAsset('slider/B1/Intermediate/chapter-1/img/slide9.webp'),

    'note_title' => 'Useful Collocations',

    'items' => [
        [
            'emoji' => '•',
            'text'  => '<span class="font-black text-red-600 dark:text-red-300">send</span> a friend <span class="font-black text-blue-800 dark:text-blue-300">request</span>',
        ],
        [
            'emoji' => '•',
            'text'  => '<span class="font-black text-red-600 dark:text-red-300">accept</span> a friend <span class="font-black text-blue-800 dark:text-blue-300">request</span>',
        ],
        [
            'emoji' => '•',
            'text'  => '<span class="font-black text-red-600 dark:text-red-300">have</span> real <span class="font-black text-blue-800 dark:text-blue-300">friends</span>',
        ],
        [
            'emoji' => '•',
            'text'  => '<span class="font-black text-red-600 dark:text-red-300">reply to</span> a <span class="font-black text-blue-800 underline dark:text-blue-300">request/message</span>',
        ],
        [
            'emoji' => '•',
            'text'  => '<span class="font-black text-red-600 dark:text-red-300">close/proper</span> <span class="font-black text-blue-800 dark:text-blue-300">friends</span>',
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])