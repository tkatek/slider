<?php

$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Communication problems',

    'card_type'  => 'text',
    'grid_class' => 'grid-cols-1 md:grid-cols-3',

    'items' => [
        [
            'text'  => 'Sorry, Can you say that again?',
            'emoji' => '🔁',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/1.mp3'),
        ],
        [
            'text'  => "What! I didn’t catch that!",
            'emoji' => '❓',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/2.mp3'),
        ],
        [
            'text'  => 'Sorry, I lost you. Can you repeat that again?',
            'emoji' => '📞',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/3.mp3'),
        ],
        [
            'text'  => "I can’t hear you very well.",
            'emoji' => '🔇',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/4.mp3'),
        ],
        [
            'text'  => "You’re breaking up!",
            'emoji' => '📶',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/5.mp3'),
        ],
        [
            'text'  => 'Let me turn up the volume.',
            'emoji' => '🔊',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/6.mp3'),
        ],
        [
            'text'  => 'Can you hear me?',
            'emoji' => '👂',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/7.mp3'),
        ],
        [
            'text'  => 'What about now?',
            'emoji' => '🎙️',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/8.mp3'),
        ],
        [
            'text'  => "There’s an echo now.",
            'emoji' => '🔁',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/9.mp3'),
        ],
        [
            'text'  => 'The connection is too slow.',
            'emoji' => '🐢',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/10.mp3'),
        ],
        [
            'text'  => 'Are you still there?',
            'emoji' => '📱',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/11.mp3'),
        ],
        [
            'text'  => 'We can try again.',
            'emoji' => '🔄',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/12.mp3'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])