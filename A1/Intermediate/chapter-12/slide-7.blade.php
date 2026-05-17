<?php

$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3',

    'items' => [
        [
            'text'  => 'Welcome aboard',
            'emoji' => '✈️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide7/welcome-aboard.mp3'),
        ],
        [
            'text'  => 'Could you please help me find my seat?',
            'emoji' => '💺',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide7/could-you-please-help-me-find-my-seat.mp3'),
        ],
        [
            'text'  => 'May I see your boarding pass, please?',
            'emoji' => '🎫',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide7/may-i-see-your-boarding-pass-please.mp3'),
        ],
        [
            'text'  => 'Here it is.',
            'emoji' => '🤝',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide7/here-it-is.mp3'),
        ],
        [
            'text'  => 'You\'re in seat 14A.',
            'emoji' => '🪑',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide7/youre-in-seat-14a.mp3'),
        ],
        [
            'text'  => 'That\'s on the left side by the window.',
            'emoji' => '🪟',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide7/thats-on-the-left-side-by-the-window.mp3'),
        ],
        [
            'text'  => 'Is there still space in the overhead bin for my bag?',
            'emoji' => '🧳',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide7/is-there-still-space-in-the-overhead-bin-for-my-bag.mp3'),
        ],
        [
            'text'  => 'Please make sure your phone is in airplane mode.',
            'emoji' => '📱',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide7/please-make-sure-your-phone-is-in-airplane-mode.mp3'),
        ],
        [
            'text'  => 'May I recline my seat?',
            'emoji' => '↩️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide7/may-i-recline-my-seat.mp3'),
        ],
        [
            'text'  => 'Can I have a blanket?',
            'emoji' => '🧣',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide7/can-i-have-a-blanket.mp3'),
        ],
        [
            'text'  => 'Enjoy your flight.',
            'emoji' => '☁️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide7/enjoy-your-flight.mp3'),
        ],
        [
            'text'  => 'Thanks for your help.',
            'emoji' => '🙏',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-12/audios/slide7/thanks-for-your-help.mp3'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])