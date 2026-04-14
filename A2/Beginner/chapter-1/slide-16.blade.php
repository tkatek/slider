<?php
$content = [
    'title'      => 'New Language',
    'subtitle'   => 'Seasons & activities',

    'image'      => materialAsset('slider/A2/Beginner/chapter-1/slide16.webp'),

    'items'      => [
        [
            'emoji' => "\u{2744}\u{FE0F}",
            'text'  => 'What happens in winter?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide16/1.mp3'),
        ],
        [
            'emoji' => "\u{1F328}\u{FE0F}",
            'text'  => 'It snows in many places.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide16/2.mp3'),
        ],
        [
            'emoji' => "\u{2744}\u{FE0F}",
            'text'  => 'What do we love to do in winter?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide16/3.mp3'),
        ],
        [
            'emoji' => "\u{26C4}",
            'text'  => 'We love to build snowmen.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide16/4.mp3'),
        ],
        [
            'emoji' => "\u{1F6F7}\u{FE0F}",
            'text'  => 'We love to go sledding or ice skating.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide16/5.mp3'),
        ],
        [
            'emoji' => "\u{2600}\u{FE0F}",
            'text'  => 'What season is it?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide16/6.mp3'),
        ],
        [
            'emoji' => "\u{1F31E}",
            'text'  => 'It’s summer.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide16/7.mp3'),
        ],
        [
            'emoji' => "\u{1F338}",
            'text'  => 'In what season do you see flowers?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide16/8.mp3'),
        ],
        [
            'emoji' => "\u{1F337}",
            'text'  => 'In spring.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide16/9.mp3'),
        ],
    ],
];
?>
@include('slider.other.newlanguage', ['content' => $content])