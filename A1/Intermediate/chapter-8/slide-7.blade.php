<?php

$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3',

    'items' => [
        [
            'text'  => 'I\'d like to <span class="text-indigo-600 font-black">book a holiday package</span>.',
            'emoji' => '🧳',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/1.mp3'),
        ],
        [
            'text'  => 'I\'m thinking about <span class="text-indigo-600 font-black">Italy</span>.',
            'emoji' => '✈️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/2.mp3'),
        ],
        [
            'text'  => 'I prefer <span class="text-indigo-600 font-black">a city tour</span>.',
            'emoji' => '🏙️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/3.mp3'),
        ],
        [
            'text'  => 'When is it available?',
            'emoji' => '📅',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/4.mp3'),
        ],
        [
            'text'  => 'How much does it <span class="text-indigo-600 font-black">cost</span>?',
            'emoji' => '💳',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/5.mp3'),
        ],
        [
            'text'  => 'Does it <span class="text-indigo-600 font-black">include</span> breakfast?',
            'emoji' => '🍳',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/6.mp3'),
        ],
        [
            'text'  => 'Breakfast <span class="text-indigo-600 font-black">is included</span> every day.',
            'emoji' => '🥐',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/7.mp3'),
        ],
        [
            'text'  => 'I\'d like book one <span class="text-indigo-600 font-black">seat</span>.',
            'emoji' => '💺',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/8.mp3'),
        ],
        [
            'text'  => '<span class="text-indigo-600 font-black">Payment confirmed</span>.',
            'emoji' => '✅',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/9.mp3'),
        ],
        [
            'text'  => '<span class="text-indigo-600 font-black">Here are</span> your travel documents.',
            'emoji' => '📄',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/10.mp3'),
        ],
        [
            'text'  => 'Thank you for your help / My pleasure.',
            'emoji' => '🤝',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/11.mp3'),
        ],
        [
            'text'  => 'Have a great trip to <span class="text-indigo-600 font-black">Italy</span>.',
            'emoji' => '✈️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/12.mp3'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])