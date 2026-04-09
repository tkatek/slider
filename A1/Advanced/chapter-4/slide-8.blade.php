<?php
$content = [
    'page_title'  => 'New Language',
    'title'       => 'New Language',
    'subtitle'    => '',

    'image'       => materialAsset('slider/A1/Advanced/chapter-4/img/slide8.webp'),
    'image_alt'   => 'transportation phrases',
    'image_fit'   => 'contain',

    'footer_text' => 'Vocabulary notes:',
    'footer_items' => [
        '- <span class="text-indigo-600 dark:text-indigo-300 font-black">Main station</span> = central train station <span class="text-slate-500 dark:text-slate-300">(common shorthand)</span>',
        '- <span class="text-violet-600 dark:text-violet-300 font-black">Traffic is not bad</span> = light traffic',
        '- <span class="text-indigo-600 dark:text-indigo-300 font-black">Got it</span> = informal way of saying <span class="font-black">I understand</span>',
        '- <span class="text-violet-600 dark:text-violet-300 font-black">Keep the change</span> = you don’t need to give me the exact amount back <span class="text-slate-500 dark:text-slate-300">(a common tip gesture)</span>',
    ],

    'items' => [
        [
            'emoji' => '🚕',
            'text'  => 'Can you take me to <span class="text-indigo-600 dark:text-indigo-300 font-black">[place]</span>?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-4/audios/slide8/1.mp3'),
        ],
        [
            'emoji' => '⏰',
            'text'  => 'Can we get there before <span class="text-violet-600 dark:text-violet-300 font-black">[time]</span>?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-4/audios/slide8/2.mp3'),
        ],
        [
            'emoji' => '💵',
            'text'  => 'How much is the ride / fare?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-4/audios/slide8/3.mp3'),
        ],
        [
            'emoji' => '💳',
            'text'  => 'Do you take credit cards?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-4/audios/slide8/4.mp3'),
        ],
        [
            'emoji' => '🪙',
            'text'  => 'Keep the change.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-4/audios/slide8/5.mp3'),
        ],
        [
            'emoji' => '😊',
            'text'  => 'Have a great trip / day.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-4/audios/slide8/6.mp3'),
        ],
    ],
];
?>

@include("slider.other.new-language-emoji", ['content' => $content])