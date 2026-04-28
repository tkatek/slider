<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Adjectives Order',

    'image'      => materialAsset('slider/A2/Beginner/chapter-8/img/slide7/New-Language.webp'),

    'note_label' => 'Grammar',
    'note_title' => 'A quick way to follow this rule is to put:',
    'note_content' => [
        '1 - Size',
        '2 - Shape or style',
        '3 - Colour',
    ],

    'items'      => [
        [
            'emoji' => '👩',
            'text'  => 'She <span class="text-red-500 font-black">has</span> medium length wavy black hair.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide7/She-has-medium.mpeg'),
        ],
        [
            'emoji' => '👨',
            'text'  => 'He <span class="text-red-500 font-black">has</span> short black hair.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide7/He-has-short.mpeg'),
        ],
        [
            'emoji' => '👩‍🦳',
            'text'  => 'She <span class="text-red-500 font-black">has</span> curly white hair.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide7/She-has-curly.mpeg'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])