<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Let’s find out about celebrations around the world!',

    'allow_html_subtitles' => true,
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [

        [
            'text' => 'Eid al-Fitr',
            'subtitle' => 'It is a Muslim holiday. People pray, visit family, and give gifts. They say <span class="text-emerald-600 font-bold">“Eid Mubarak!”</span>',
            'emoji' => '🌙',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/eid.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/eid.webp'),
        ],

        [
            'text' => 'Halloween',
            'subtitle' => 'This is on October 31st. Children wear costumes and get candy. They say <span class="text-orange-600 font-bold">“Happy Halloween!”</span>',
            'emoji' => '🎃',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/halloween.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/halloween.webp'),
        ],

        [
            'text' => 'Christmas',
            'subtitle' => 'Many people celebrate this on December 25th. They decorate trees and give presents. They say <span class="text-red-600 font-bold">“Merry Christmas!”</span>',
            'emoji' => '🎄',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/christmas.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/christmas.webp'),
        ],

        [
            'text' => 'Chinese New Year',
            'subtitle' => 'People wear red and see fireworks. They have a big dinner with family. They say <span class="text-rose-600 font-bold">“Happy New Year!”</span>',
            'emoji' => '🧧',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/chinese.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/chinese.webp'),
        ],

        [
            'text' => 'Diwali',
            'subtitle' => 'This is the festival of lights. People light oil lamps and share sweet treats. They say <span class="text-amber-500 font-bold">“Happy Diwali!”</span>',
            'emoji' => '🪔',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/diwali.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/diwali.webp'),

        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])
