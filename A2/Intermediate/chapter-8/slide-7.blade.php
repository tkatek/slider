<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Phrasal Verbs',

    'image'      => materialAsset('slider/A2/Intermediate/chapter-8/img/slide7.webp'),
    'image_alt'  => 'New vocabulary',

    'footer_text' => '',
    'play_label'  => 'Play sentence',

    'items'      => [
        [
            'emoji' => '👥',
            'text'  => '<span class="text-orange-500 font-black">hang out</span> = spend time with friends',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide7/1.mp3'),
        ],
        [
            'emoji' => '🔍',
            'text'  => '<span class="text-orange-500 font-black">check out</span> = visit, see, or try something new',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide7/2.mp3'),
        ],
        [
            'emoji' => '🤝',
            'text'  => '<span class="text-orange-500 font-black">run into</span> = meet someone by chance',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide7/3.mp3'),
        ],
        [
            'emoji' => '💬',
            'text'  => '<span class="text-orange-500 font-black">catch up (on)</span> = talk and share news after some time apart',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide7/4.mp3'),
        ],
        [
            'emoji' => '🏠',
            'text'  => '<span class="text-orange-500 font-black">stay in</span> = remain at home',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide7/5.mp3'),
        ],
        [
            'emoji' => '🌧️',
            'text'  => '<span class="text-orange-500 font-black">let up</span> = stop or become less strong (rain, wind, etc.)',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide7/6.mp3'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])
