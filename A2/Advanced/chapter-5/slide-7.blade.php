<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Advanced/chapter-5/img/slide7.webp'),
    'note_title' => 'How to get over your difficulties in a new country?',

    'items'      => [
        [
            'emoji' => '🏠',
            'text'  => 'I am homesick . . . . . Make new friends',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide7/1.mp3'),
        ],
        [
            'emoji' => '🌍',
            'text'  => 'Everything is new . . . . . You
                        <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent font-black">have to</span>
                        relearn',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide7/2.mp3'),
        ],
        [
            'emoji' => '🎯',
            'text'  => 'I miss everything . . . . . You
                        <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent font-black">need to</span>
                        adapt to achive your goals',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide7/3.mp3'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])