{{-- resources/views/slider/slide-empty.blade.php --}}
<?php
$content = [
    'page_title' => 'Let’s watch this',
    'title'      => 'Let’s watch this',
    'subtitle'   => 'Subject pronouns / possessive adjectives',

    'shorts'     => [
        [
            'src'       => materialAsset('slider/A1/Beginner/chapter-4/video/encrypted/short1.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Beginner/chapter-4/video/thambnail-short1.webp'),
            'showCC'    => false,
            'subtitles' => [
                ['start' => 0,  'end' => 1,  'text' => 'I'],
                ['start' => 1,  'end' => 2,  'text' => 'You'],
                ['start' => 2,  'end' => 2.5,  'text' => 'He'],
                ['start' => 2.5,  'end' => 3,  'text' => 'She'],
                ['start' => 3,  'end' => 4, 'text' => 'It'],
                ['start' => 4,  'end' => 5.5, 'text' => 'We'],
                ['start' => 5.5,  'end' => 6.5, 'text' => 'You'],
                ['start' => 6.5,  'end' => 7, 'text' => 'They'],
            ],
        ],
        [
            'src'       => materialAsset('slider/A1/Beginner/chapter-4/video/encrypted/short2.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Beginner/chapter-4/video/thambnail-short2.webp'),
            'showCC'    => false,
            'subtitles' => [
                ['start' => 0,  'end' => 2,  'text' => 'My dog'],
                ['start' => 2,  'end' => 5,  'text' => 'Your dog'],
                ['start' => 5,  'end' => 8,  'text' => 'His dog'],
                ['start' => 9,  'end' => 11,  'text' => 'Her dog'],
                ['start' => 12,  'end' => 14, 'text' => 'Its house'],
                ['start' => 15,  'end' => 17, 'text' => 'Our dogs'],
                ['start' => 19,  'end' => 21, 'text' => 'Your dogs'],
                ['start' => 21,  'end' => 24, 'text' => 'Their dogs'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])