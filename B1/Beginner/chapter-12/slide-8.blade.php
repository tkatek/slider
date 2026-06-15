<?php
$content = [
    'page_title' => 'Language Focus',
    'title'      => 'Language Focus',
    'subtitle'   => '',

    'image' => materialAsset('slider/B1/Beginner/chapter-12/img/slide8.webp'),

    'note_title' => 'Example',

    'items' => [
        [
            'emoji' => '💡',
            'text'  => 'I <span class="font-black text-red-600 dark:text-red-300">should have known</span> better.',
            'sound' => materialAsset('slider/B1/Beginner/chapter-12/audios/slide8/1.mp3'),
        ],
        [
            'emoji' => '🌯',
            'text'  => 'I <span class="font-black text-red-600 dark:text-red-300">shouldn\'t have eaten</span> that burrito.',
            'sound' => materialAsset('slider/B1/Beginner/chapter-12/audios/slide8/2.mp3'),
        ],
        [
            'emoji' => '👂',
            'text'  => 'I <span class="font-black text-red-600 dark:text-red-300">should have listened</span> to my mum.',
            'sound' => materialAsset('slider/B1/Beginner/chapter-12/audios/slide8/3.mp3'),
        ],
        [
            'emoji' => '🩺',
            'text'  => 'You <span class="font-black text-red-600 dark:text-red-300">shouldn\'t have done</span> that.',
            'sound' => materialAsset('slider/B1/Beginner/chapter-12/audios/slide8/4.mp3'),
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])