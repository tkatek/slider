<?php
$content = [
    'page_title'  => 'New Language:',
    'title'       => 'New Language:',
    'subtitle'    => 'Practice asking and talking about sizes and colors.',

    'image'       => materialAsset('slider/A1/Beginner/chapter-10/img/slide6.webp'),
    'image_alt'   => 'Sizes and colors shopping image',

    'footer_text' => '',
    'play_label'  => 'Play sentence',

    'items' => [
        [
            'emoji' => '📏',
            'text'  => 'What
                        <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">size</span>
                        are you looking for?',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide6/1.mp3'),
        ],
        [
            'emoji' => '🎨',
            'text'  => 'What
                        <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">colour</span>
                        are you looking for?',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide6/2.mp3'),
        ],
        [
            'emoji' => '🛍️',
            'text'  => 'I’m looking for....',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide6/3.mp3'),
        ],
        [
            'emoji' => '🧥',
            'text'  => 'A black jacket
                        <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">in</span>
                        medium.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide6/4.mp3'),
        ],
        [
            'emoji' => '👟',
            'text'  => 'Blue shoes
                        <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">in</span>
                        size 36.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide6/5.mp3'),
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])
