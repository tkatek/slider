<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4',

    'items' => [
        [
            'text_html'  => 'I\'d like to <span class="title-highlight">book a holiday package</span>.',
            'emoji' => '🧳',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/1.mp3'),
        ],
        [
            'text_html'  => 'I\'m thinking about <span class="title-highlight">Italy</span>.',
            'emoji' => '✈️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/2.mp3'),
        ],
        [
            'text_html'  => 'I prefer <span class="title-highlight">a city tour</span>.',
            'emoji' => '🏙️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/3.mp3'),
        ],
        [
            'text'  => 'When is it available?',
            'emoji' => '📅',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/4.mp3'),
        ],
        [
            'text_html'  => 'How much does it <span class="title-highlight">cost</span>?',
            'emoji' => '💳',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/5.mp3'),
        ],
        [
            'text_html'  => 'Does it <span class="title-highlight">include</span> breakfast?',
            'emoji' => '🍳',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/6.mp3'),
        ],
        [
            'text_html'  => 'Breakfast <span class="title-highlight">is included</span> every day.',
            'emoji' => '🥐',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/7.mp3'),
        ],
        [
            'text_html'  => 'I\'d like book one <span class="title-highlight">seat</span>.',
            'emoji' => '💺',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/8.mp3'),
        ],
        [
            'text_html'  => '<span class="title-highlight">Payment confirmed</span>.',
            'emoji' => '✅',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/9.mp3'),
        ],
        [
            'text_html'  => '<span class="title-highlight">Here are</span> your travel documents.',
            'emoji' => '📄',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/10.mp3'),
        ],
        [
            'text'  => 'Thank you for your help / My pleasure.',
            'emoji' => '🤝',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/11.mp3'),
        ],
        [
            'text_html'  => 'Have a great trip to <span class="title-highlight">Italy</span>.',
            'emoji' => '✈️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-8/audios/slide7/12.mp3'),
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])
