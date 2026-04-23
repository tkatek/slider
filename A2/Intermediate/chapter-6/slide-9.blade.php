<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',

    'image'      => materialAsset('slider/A2/Intermediate/chapter-6/img/slide9.webp'),
    'image_alt'  => 'New language',

    'footer_text' => '',
    'play_label'  => 'Play sentence',

    'items'      => [
        [
            'emoji' => '⏱️',
            'text'  => 'I was in a hurry.',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-6/audios/slide9/1.mp3'),
        ],
        [
            'emoji' => '🏃',
            'text'  => 'I was running late.',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-6/audios/slide9/2.mp3'),
        ],
        [
            'emoji' => '🪂',
            'text'  => 'Maybe I should take up skydiving.',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-6/audios/slide9/3.mp3'),
        ],
        [
            'emoji' => '🚿',
            'text'  => '<span class="text-red-500 font-black">While</span> I <span class="text-purple-600 font-black">was getting</span> ready to come to the comedy club, I <span class="text-purple-600 font-black">slipped</span> and <span class="text-purple-600 font-black">fell</span>, and <span class="text-purple-600 font-black">sprained</span> my ankle.',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-6/audios/slide9/4.mp3'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])
