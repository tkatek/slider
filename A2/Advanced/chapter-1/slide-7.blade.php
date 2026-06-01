<?php

$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',

    'card_type'  => 'text',
    'grid_class' => 'grid-cols-1 sm:grid-cols-3',

    'items' => [
        [
            'emoji' => '💼',
            'text'  => 'What’s your <span class="font-black text-rose-700 dark:text-rose-300">role</span> in the company?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/1.mp3'),
        ],
        [
            'emoji' => '👔',
            'text'  => 'What do you <span class="font-black text-rose-700 dark:text-rose-300">do for a living</span>?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/2.mp3'),
        ],
        [
            'emoji' => '✅',
            'text'  => 'What are you <span class="font-black text-rose-700 dark:text-rose-300">responsible for</span>?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/3.mp3'),
        ],
        [
            'emoji' => '🎨',
            'text'  => 'I’m <span class="font-black text-rose-700 dark:text-rose-300">the head of</span> design.',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/4.mp3'),
        ],
        [
            'emoji' => '🧑‍🎨',
            'text'  => 'I <span class="font-black text-rose-700 dark:text-rose-300">manage</span> artists and graphic designers.',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/5.mp3'),
        ],
        [
            'emoji' => '🤝',
            'text'  => 'What about you?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/6.mp3'),
        ],
        [
            'emoji' => '🎬',
            'text'  => 'I’m a content producer.',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/7.mp3'),
        ],
        [
            'emoji' => '✍️',
            'text'  => 'I’m responsible for writing.',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/8.mp3'),
        ],
        [
            'emoji' => '❓',
            'text'  => 'What <span class="font-black text-rose-700 dark:text-rose-300">do you do</span>?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/9.mp3'),
        ],
        [
            'emoji' => '❤️',
            'text'  => 'Do you like your job?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/10.mp3'),
        ],
        [
            'emoji' => '😍',
            'text'  => 'Yes, I love it!',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/11.mp3'),
        ],
        [
            'emoji' => '⭐',
            'text'  => 'What’s the best part of your job?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/12.mp3'),
        ],
        [
            'emoji' => '👥',
            'text'  => 'Do you like the people you work with?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/13.mp3'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])