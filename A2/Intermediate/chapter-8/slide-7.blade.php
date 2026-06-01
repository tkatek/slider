<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Phrasal Verbs',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-6',

    'items' => [
        [
            'emoji'    => '👥',
            'text'     => '<span class="text-orange-500 font-black">hang out</span>',
            'subtitle' => 'spend time with friends',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide7/1.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-8/img/slide7/hang-out.webp'),
        ],
        [
            'emoji'    => '🔍',
            'text'     => '<span class="text-orange-500 font-black">check out</span>',
            'subtitle' => 'visit, see, or try something new',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide7/2.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-8/img/slide7/check-out.webp'),
        ],
        [
            'emoji'    => '🤝',
            'text'     => '<span class="text-orange-500 font-black">run into</span>',
            'subtitle' => 'meet someone by chance',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide7/3.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-8/img/slide7/run-into.webp'),
        ],
        [
            'emoji'    => '💬',
            'text'     => '<span class="text-orange-500 font-black">catch up (on)</span>',
            'subtitle' => 'talk and share news after some time apart',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide7/4.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-8/img/slide7/catch-up.webp'),
        ],
        [
            'emoji'    => '🏠',
            'text'     => '<span class="text-orange-500 font-black">stay in</span>',
            'subtitle' => 'remain at home',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide7/5.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-8/img/slide7/stay-in.webp'),
        ],
        [
            'emoji'    => '🌧️',
            'text'     => '<span class="text-orange-500 font-black">let up</span>',
            'subtitle' => 'stop or become less strong (rain, wind, etc.)',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide7/6.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-8/img/slide7/let-up.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])