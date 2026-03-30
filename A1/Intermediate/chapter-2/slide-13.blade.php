<?php
$content = [
    'page_title'  => 'New Language',
    'title'       => 'New Language',
    'subtitle'    => 'When’s your birthday?',

    'image'       => materialAsset('slider/A1/Intermediate/chapter-2/img/slide10.webp'),
    'image_alt'   => 'birthday date examples',
    'image_fit'   => 'contain',
    'footer_text' => 'Notice how we use <span class="text-indigo-600 dark:text-indigo-300 font-black">on</span> for days and <span class="text-violet-600 dark:text-violet-300 font-black">in</span> for months:',
    'footer_items' => [
        '- <span class="text-violet-600 dark:text-violet-300 font-black">In</span> April <span class="text-slate-500 dark:text-slate-300">(month = in)</span>',
        '- <span class="text-indigo-600 dark:text-indigo-300 font-black">On</span> April 15th <span class="text-slate-500 dark:text-slate-300">(day + month = on)</span>',
    ],

    'items' => [
        [
            'emoji' => '📅',
            'text'  => 'It’s <span class="text-indigo-600 dark:text-indigo-300 font-black">on</span> May <span class="text-violet-600 dark:text-violet-300 font-black">1st</span>.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide10-1.mp3'),
        ],
        [
            'emoji' => '🗓️',
            'text'  => 'It’s <span class="text-indigo-600 dark:text-indigo-300 font-black">in</span> May.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide10-2.mp3'),
        ],
    ],
];
?>

@include("slider.other.new-language-emoji", ['content' => $content])