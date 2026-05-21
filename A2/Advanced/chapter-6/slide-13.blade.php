<?php

$content = [
    'page_title' => 'Language Focus',
    'title'      => 'Language Focus',
    'subtitle'   => 'How long have you lived here? For or since?',

    'note' => 'Listen to these 2 conversations and learn the difference between <span class="rounded-lg bg-rose-100 px-1.5 py-0.5 font-black text-rose-600 dark:bg-rose-950/50 dark:text-rose-300">since</span> and <span class="rounded-lg bg-orange-100 px-1.5 py-0.5 font-black text-orange-600 dark:bg-orange-950/50 dark:text-orange-300">for</span>.<br> Then, role-play the dialogue.',

    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Sara',
            'image' => materialAsset('slider/A2/Advanced/chapter-6/img/slide13/sara.webp'),
        ],
        'right' => [
            'name'  => 'John',
            'image' => materialAsset('slider/A2/Advanced/chapter-6/img/slide13/john.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => '<span class="mb-2 inline-flex rounded-full bg-slate-900 px-2 py-1 text-xs font-black uppercase tracking-wide text-white">Conversation 1</span><br>I\'ve been wondering, John.',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/1.mp3'),
        ],
        [
            'text'   => 'About what?',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/2.mp3'),
        ],
        [
            'text'   => 'How long have you lived here?',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/3.mp3'),
        ],
        [
            'text'   => 'I\'ve lived in Korea <span class="rounded-lg bg-orange-100 px-1.5 py-0.5 font-black text-orange-600 dark:bg-orange-950/50 dark:text-orange-300">for</span> 10 years.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/4.mp3'),
        ],
        [
            'text'   => 'Wow, that\'s a long time.',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/5.mp3'),
        ],
        [
            'text'   => '<span class="mb-2 inline-flex rounded-full bg-slate-900 px-2 py-1 text-xs font-black uppercase tracking-wide text-white">Conversation 2</span><br>She\'s very good at her job. She\'s one of the best employees here.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/6.mp3'),
        ],
        [
            'text'   => 'How long has she worked here?',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/7.mp3'),
        ],
        [
            'text'   => 'She\'s worked here <span class="rounded-lg bg-rose-100 px-1.5 py-0.5 font-black text-rose-600 dark:bg-rose-950/50 dark:text-rose-300">since</span> 2000.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/8.mp3'),
        ],
        [
            'text'   => 'She\'s been there a long time.',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/9.mp3'),
        ],
    ],
];

?>

@include('slider.vocab.image-conversation', ['content' => $content])